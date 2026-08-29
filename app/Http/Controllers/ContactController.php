<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnquiryRequest;
use App\Mail\EnquiryAutoresponse;
use App\Mail\EnquiryReceived;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

class ContactController extends Controller
{
    /**
     * Minimum seconds a human is expected to take to fill the form. Anything
     * faster is treated as a bot, alongside the honeypot field.
     */
    private const MIN_SECONDS_TO_SUBMIT = 3;

    public function create(): View
    {
        session(['contact_form_started_at' => now()->timestamp]);

        return view('contact');
    }

    public function store(StoreEnquiryRequest $request): RedirectResponse
    {
        $startedAt = session()->pull('contact_form_started_at');

        $isSpam = filled($request->input('website'))
            || ! $startedAt
            || now()->timestamp - $startedAt < self::MIN_SECONDS_TO_SUBMIT;

        if ($isSpam) {
            return redirect()->route('contact')->with('status', 'sent');
        }

        $enquiry = Enquiry::create([
            ...$request->validated(),
            'ip_address' => $request->ip(),
        ]);

        try {
            Mail::to('support@criticom.net')->send(new EnquiryReceived($enquiry));
            Mail::to($enquiry->email, $enquiry->name)->send(new EnquiryAutoresponse($enquiry));
        } catch (Throwable $e) {
            Log::error('Enquiry mail send failed.', [
                'enquiry_id' => $enquiry->id,
                'message' => $e->getMessage(),
            ]);
        }

        return redirect()->route('contact')->with('status', 'sent');
    }
}
