@php
    $allServices = config('site_services');
@endphp

<x-layout
    :title="$sector['nav_title']"
    :description="$sector['meta_description']"
    :body-class="$sector['slug'] === 'defense' ? 'sector-defense' : null"
>
    {{-- Hero --}}
    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24">
        <x-mono-label>{{ $sector['eyebrow'] }}</x-mono-label>

        <h1 class="mt-4 max-w-3xl text-3xl font-semibold tracking-tight text-ink sm:text-4xl">
            {{ $sector['heading'] }}
        </h1>

        <p class="mt-6 max-w-2xl text-lg text-body">
            {{ $sector['intro'] }}
        </p>

        <div class="mt-8 flex flex-wrap gap-4">
            <x-button href="/contact">Request a consultation</x-button>
        </div>
    </section>

    {{-- The problem --}}
    <section class="border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-section-heading eyebrow="The problem">
                {{ $sector['problem_heading'] }}
            </x-section-heading>

            <div class="mt-6 max-w-2xl space-y-4">
                @foreach ($sector['problem_paragraphs'] as $paragraph)
                    <p class="text-body">{{ $paragraph }}</p>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Where this applies --}}
    <section class="border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-section-heading eyebrow="Where this applies">
                Services that apply to {{ mb_strtolower($sector['nav_title']) }}.
            </x-section-heading>

            <div class="mt-10 grid gap-6 sm:grid-cols-2">
                @foreach ($sector['services'] as $serviceId)
                    @php $service = $allServices[$serviceId]; @endphp
                    <x-card href="/services#{{ $service['anchor'] }}">
                        <x-mono-label>{{ str_pad($serviceId, 2, '0', STR_PAD_LEFT) }}</x-mono-label>
                        <h3 class="mt-3 font-semibold text-ink">{{ $service['title'] }}</h3>
                        <p class="mt-2 text-sm text-body">{{ $service['summary'] }}</p>
                    </x-card>
                @endforeach
            </div>

            @if ($sector['show_mitigation_note'])
                <p class="mt-8 max-w-2xl text-sm text-body">
                    Mitigation options are scoped only for duly authorised end users, under applicable law and
                    licensing.
                </p>
            @endif
        </div>
    </section>

    {{-- Past performance --}}
    @if (! empty($sector['criticom_work']) || ! empty($sector['founder_work']))
        <section class="border-t border-line">
            <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
                <x-section-heading eyebrow="Past performance">
                    Relevant work.
                </x-section-heading>

                @if (! empty($sector['criticom_work']))
                    <div class="mt-10">
                        <h3 class="font-semibold text-ink">Selected work</h3>
                        <div class="mt-4 grid gap-6 sm:grid-cols-2">
                            @foreach ($sector['criticom_work'] as $item)
                                <x-card>
                                    <h4 class="font-semibold text-ink">{{ $item['title'] }}</h4>
                                    <p class="mt-2 text-sm text-body">{{ $item['body'] }}</p>
                                </x-card>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (! empty($sector['founder_work']))
                    <div class="mt-10">
                        <h3 class="font-semibold text-ink">Founder's track record</h3>
                        <p class="mt-3 max-w-2xl text-sm text-body">
                            {{ $sector['founder_intro'] }}
                        </p>
                        <ul class="mt-6 grid max-w-3xl gap-x-8 gap-y-4 sm:grid-cols-2">
                            @foreach ($sector['founder_work'] as $item)
                                <li class="border-t border-line pt-3">
                                    <p class="font-medium text-ink">{{ $item['title'] }}</p>
                                    <p class="mt-1 text-sm text-body">{{ $item['body'] }}</p>
                                </li>
                            @endforeach
                        </ul>
                        <a href="/founder" class="mt-6 inline-block font-medium text-accent hover:text-ink">
                            More on the founder's background &rarr;
                        </a>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Contact CTA --}}
    <section class="border-t border-line bg-ink">
        <div class="mx-auto max-w-6xl px-4 py-16 text-center sm:px-6">
            <x-section-heading eyebrow="Get in touch" :dark="true" align="center">
                Talk to someone who has sat on the other side of the table.
            </x-section-heading>

            <p class="mx-auto mt-4 max-w-xl text-paper/80">
                Tell us about the project and we will get back to you.
            </p>

            <div class="mt-8 flex justify-center">
                <x-button href="/contact" :dark="true">Request a consultation</x-button>
            </div>
        </div>
    </section>
</x-layout>
