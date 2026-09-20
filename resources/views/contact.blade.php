<x-layout
    title="Contact"
    description="Get in touch with Criticom Solutions — request a consultation, or reach us directly by email or phone."
>
    {{-- Hero --}}
    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24">
        <x-mono-label>Contact</x-mono-label>

        <h1 class="mt-4 max-w-3xl text-3xl font-semibold tracking-tight text-ink sm:text-4xl">
            Tell us about the project.
        </h1>

        <p class="mt-6 max-w-2xl text-lg text-body">
            Whether you are shortlisting for a tender or want a second opinion on a design, describe what you
            need and we will get back to you.
        </p>
    </section>

    {{-- Form + direct channels --}}
    <section class="border-t border-line">
        <div class="mx-auto grid max-w-6xl gap-12 px-4 py-16 sm:px-6 lg:grid-cols-3 lg:gap-16">
            <div class="lg:col-span-2">
                @if (session('status') === 'sent')
                    <div class="mb-10 border border-line bg-paper p-6" role="status">
                        <p class="font-semibold text-ink">Thanks — your message has been sent.</p>
                        <p class="mt-2 text-sm text-body">We will get back to you as soon as possible.</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" novalidate>
                    @csrf

                    {{-- Honeypot — hidden from sighted and assistive-tech users, left for bots to fill --}}
                    <div class="honeypot-field" aria-hidden="true">
                        <label for="website">Leave this field blank</label>
                        <input
                            type="text"
                            id="website"
                            name="website"
                            tabindex="-1"
                            autocomplete="off"
                        >
                    </div>

                    <p class="text-sm text-body">Fields marked * are required.</p>

                    <div class="mt-8 grid gap-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <x-mono-label as="label" for="name" class="block">Name *</x-mono-label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                required
                                value="{{ old('name') }}"
                                class="mt-3 w-full border bg-paper px-4 py-3 text-body {{ $errors->has('name') ? 'border-red-600' : 'border-line' }}"
                                @error('name') aria-invalid="true" aria-describedby="name-error" @enderror
                            >
                            @error('name')
                                <p id="name-error" class="mt-2 text-sm text-red-700">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-1">
                            <x-mono-label as="label" for="company" class="block">Company</x-mono-label>
                            <input
                                type="text"
                                id="company"
                                name="company"
                                value="{{ old('company') }}"
                                class="mt-3 w-full border bg-paper px-4 py-3 text-body {{ $errors->has('company') ? 'border-red-600' : 'border-line' }}"
                                @error('company') aria-invalid="true" aria-describedby="company-error" @enderror
                            >
                            @error('company')
                                <p id="company-error" class="mt-2 text-sm text-red-700">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-1">
                            <x-mono-label as="label" for="email" class="block">Email *</x-mono-label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                required
                                value="{{ old('email') }}"
                                class="mt-3 w-full border bg-paper px-4 py-3 text-body {{ $errors->has('email') ? 'border-red-600' : 'border-line' }}"
                                @error('email') aria-invalid="true" aria-describedby="email-error" @enderror
                            >
                            @error('email')
                                <p id="email-error" class="mt-2 text-sm text-red-700">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-1">
                            <x-mono-label as="label" for="phone" class="block">Phone</x-mono-label>
                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                value="{{ old('phone') }}"
                                class="mt-3 w-full border bg-paper px-4 py-3 text-body {{ $errors->has('phone') ? 'border-red-600' : 'border-line' }}"
                                @error('phone') aria-invalid="true" aria-describedby="phone-error" @enderror
                            >
                            @error('phone')
                                <p id="phone-error" class="mt-2 text-sm text-red-700">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <x-mono-label as="label" for="sector" class="block">Sector</x-mono-label>
                            <select
                                id="sector"
                                name="sector"
                                class="mt-3 w-full border bg-paper px-4 py-3 text-body {{ $errors->has('sector') ? 'border-red-600' : 'border-line' }}"
                                @error('sector') aria-invalid="true" aria-describedby="sector-error" @enderror
                            >
                                <option value="" @selected(old('sector', '') === '')>Not sure / general enquiry</option>
                                @foreach (config('site_sectors') as $sector)
                                    <option value="{{ $sector['slug'] }}" @selected(old('sector') === $sector['slug'])>
                                        {{ $sector['nav_title'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sector')
                                <p id="sector-error" class="mt-2 text-sm text-red-700">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <x-mono-label as="label" for="message" class="block">Message *</x-mono-label>
                            <textarea
                                id="message"
                                name="message"
                                required
                                minlength="20"
                                rows="6"
                                class="mt-3 w-full border bg-paper px-4 py-3 text-body {{ $errors->has('message') ? 'border-red-600' : 'border-line' }}"
                                @error('message') aria-invalid="true" aria-describedby="message-error" @enderror
                            >{{ old('message') }}</textarea>
                            <p class="mt-2 text-xs text-body/80">Minimum 20 characters.</p>
                            @error('message')
                                <p id="message-error" class="mt-2 text-sm text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <p class="mt-8 max-w-lg text-xs text-body/80">
                        By submitting this form you agree to our
                        <a href="/privacy" class="text-accent hover:text-ink">privacy notice</a>.
                    </p>

                    <div class="mt-6">
                        <x-button type="submit">Send message</x-button>
                    </div>
                </form>
            </div>

            <div class="border-t border-line pt-8 lg:col-span-1 lg:border-t-0 lg:border-l lg:pt-0 lg:pl-16">
                <x-mono-label>Direct channels</x-mono-label>
                <ul class="mt-4 space-y-3 text-body">
                    <li>
                        <a href="mailto:support@criticom.net" class="text-accent hover:text-ink">support@criticom.net</a>
                    </li>
                    <li>
                        <a href="tel:+923053555440" class="text-accent hover:text-ink">+92 305 3555 440</a>
                    </li>
                </ul>
                <p class="mt-4 text-sm text-body">Email or WhatsApp, if you would rather not use the form.</p>
            </div>
        </div>
    </section>
</x-layout>
