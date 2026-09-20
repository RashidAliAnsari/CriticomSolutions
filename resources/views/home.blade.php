<x-layout
    description="Independent engineering consultancy for mission-critical wireless. RF, spectrum and communications systems for energy, defense, industrial and telecom clients — no OEM allegiance."
>
    {{-- Organization JSON-LD — facts from CLAUDE.md §5 only, nothing invented. --}}
    @push('head')
        <script type="application/ld+json">
            {{-- Blade compiles a bare "@context" as its own directive even inside
                 this string literal, so it must be escaped with "@@". --}}
            {!! json_encode([
                '@@context' => 'https://schema.org',
                '@type' => 'Organization',
                'name' => 'Criticom Solutions',
                'legalName' => 'Criticom Solutions',
                'url' => url('/'),
                'email' => 'support@criticom.net',
                'telephone' => '+923053555440',
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => 'Lahore',
                    'addressCountry' => 'PK',
                ],
            ], JSON_UNESCAPED_SLASHES) !!}
        </script>
    @endpush

    {{-- 1. Hero --}}
    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24">
        <x-mono-label>Independent engineering consultancy</x-mono-label>

        <h1 class="mt-4 max-w-3xl text-3xl font-semibold tracking-tight text-ink sm:text-4xl">
            We plan, specify, supply and integrate mission-critical wireless — with no OEM allegiance.
        </h1>

        <p class="mt-6 max-w-2xl text-lg text-body">
            Criticom Solutions is an independent engineering consultancy based in Lahore, Pakistan. We work across
            RF, spectrum and communications systems for energy, defense, industrial and telecom clients — built on
            eight years of experience inside the vendors we evaluate.
        </p>

        <div class="mt-8 flex flex-wrap gap-4">
            <x-button href="/contact">Request a consultation</x-button>
            <x-button href="/founder" variant="secondary">Meet the founder</x-button>
        </div>
    </section>

    {{-- 2. Path profile --}}
    <x-path-profile />

    {{-- 3. Data cells --}}
    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
        <div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-4">
            <x-data-cell value="17+" label="Years across telecom & ICT" />
            <x-data-cell value="8" label="Years on the OEM side" />
            <x-data-cell value="Vendor-agnostic" label="No OEM allegiance" />
            <x-data-cell value="SECP-registered" label="Sole proprietorship, Lahore" />
        </div>
    </section>

    {{-- 4. The differentiator --}}
    <section class="border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-section-heading eyebrow="The differentiator">
                We used to sit on the other side of the table.
            </x-section-heading>

            <p class="mt-6 max-w-2xl text-body">
                Our founder spent eight years on the OEM side — at Redline Communications, then Aviat Networks
                after Aviat's acquisition of Redline, latterly in technical sales. He has seen how vendors scope
                and price work, and where proposals get padded. Criticom now works for the customer: reviewing designs,
                evaluating bids and specifying systems without an OEM relationship to protect. That is a position
                competitors cannot copy.
            </p>

            <a href="/founder" class="mt-4 inline-block font-medium text-accent hover:text-ink">
                Read the founder's background &rarr;
            </a>
        </div>
    </section>

    {{-- 5. Services --}}
    <section class="border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-section-heading eyebrow="What we do">
                Six service lines, one independent view.
            </x-section-heading>

            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <x-card href="/services">
                    <h3 class="font-semibold text-ink">RF survey, path and link planning</h3>
                    <p class="mt-2 text-sm text-body">
                        Path profiling, LOS verification, link budgets, coverage prediction, frequency planning
                        and PTA/regulator coordination support.
                    </p>
                </x-card>

                <x-card href="/services">
                    <h3 class="font-semibold text-ink">Spectrum monitoring and interference resolution</h3>
                    <p class="mt-2 text-sm text-body">
                        Occupancy surveys, interference hunting, emitter characterisation and regulatory case
                        support.
                    </p>
                </x-card>

                <x-card href="/services">
                    <h3 class="font-semibold text-ink">Independent technical assurance</h3>
                    <p class="mt-2 text-sm text-body">
                        Vendor proposal review, bid evaluation, design validation, acceptance testing witness and
                        second-opinion engineering for clients procuring from OEMs.
                    </p>
                </x-card>

                <x-card href="/services">
                    <h3 class="font-semibold text-ink">Wireless architecture for harsh and remote environments</h3>
                    <p class="mt-2 text-sm text-body">
                        Offshore and mobile-asset connectivity, redundant path design, SCADA and telemetry
                        transport, and private LTE/5G.
                    </p>
                </x-card>

                <x-card href="/services">
                    <h3 class="font-semibold text-ink">Security and surveillance system design</h3>
                    <p class="mt-2 text-sm text-body">
                        Layered site security architecture for critical infrastructure, borders, airports and
                        remote posts — detection, identification, tracking, C2 integration and resilient backhaul.
                    </p>
                </x-card>

                <x-card href="/services">
                    <h3 class="font-semibold text-ink">Supply, integration and commissioning</h3>
                    <p class="mt-2 text-sm text-body">
                        Vendor-agnostic equipment selection, procurement routing, staging, installation
                        supervision, FAT/SAT, and handover documentation and training.
                    </p>
                </x-card>
            </div>
        </div>
    </section>

    {{-- 6. Sectors --}}
    <section class="border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-section-heading eyebrow="Sectors">
                Five sectors, the same engineering discipline.
            </x-section-heading>

            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
                <x-card href="/sectors/energy-offshore">
                    <span class="font-semibold text-ink">Energy and offshore</span>
                </x-card>

                <x-card href="/sectors/defense">
                    <span class="font-semibold text-ink">Defense and national security</span>
                </x-card>

                <x-card href="/sectors/critical-infrastructure">
                    <span class="font-semibold text-ink">Critical infrastructure protection</span>
                </x-card>

                <x-card href="/sectors/industrial-transport">
                    <span class="font-semibold text-ink">Industrial and transport connectivity</span>
                </x-card>

                <x-card href="/sectors/telecom-spectrum">
                    <span class="font-semibold text-ink">Telecom operators and regulators</span>
                </x-card>
            </div>
        </div>
    </section>

    {{-- 7. Selected work --}}
    <section class="border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-section-heading eyebrow="Selected work">
                Selected work.
            </x-section-heading>

            <div class="mt-10 grid gap-6 sm:grid-cols-2">
                <x-card>
                    <h3 class="font-semibold text-ink">North African government border surveillance programme</h3>
                    <p class="mt-2 text-sm text-body">
                        Engineering consultancy support for a national border surveillance programme. Country and
                        client are withheld.
                    </p>
                </x-card>

                <x-card>
                    <h3 class="font-semibold text-ink">BW Energy &mdash; offshore communications, Gabon</h3>
                    <p class="mt-2 text-sm text-body">
                        Fail-safe architecture linking an FPSO and a drilling barge using redundant point-to-point
                        wireless.
                    </p>
                </x-card>
            </div>
        </div>
    </section>

    {{-- 8. Contact CTA --}}
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
