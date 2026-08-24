<x-layout
    title="Services"
    description="Six service lines from RF survey and link planning to independent technical assurance and supply, integration and commissioning — for energy, defense, industrial and telecom clients."
>
    {{-- Hero --}}
    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24">
        <x-mono-label>What we do</x-mono-label>

        <h1 class="mt-4 max-w-3xl text-3xl font-semibold tracking-tight text-ink sm:text-4xl">
            Six service lines, one independent view.
        </h1>

        <p class="mt-6 max-w-2xl text-lg text-body">
            Criticom works across the full lifecycle of a mission-critical wireless system — from first path
            profile to handover documentation — without an OEM relationship to protect.
        </p>
    </section>

    {{-- Overview cards --}}
    <section class="border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <x-card href="#rf-survey">
                    <x-mono-label>01</x-mono-label>
                    <h3 class="mt-3 font-semibold text-ink">RF survey, path and link planning</h3>
                    <p class="mt-2 text-sm text-body">
                        Path profiling, LOS verification, link budgets, coverage prediction and frequency
                        planning.
                    </p>
                </x-card>

                <x-card href="#spectrum-monitoring">
                    <x-mono-label>02</x-mono-label>
                    <h3 class="mt-3 font-semibold text-ink">Spectrum monitoring and interference resolution</h3>
                    <p class="mt-2 text-sm text-body">
                        Occupancy surveys, interference hunting, emitter characterisation and regulatory case
                        support.
                    </p>
                </x-card>

                <x-card href="#technical-assurance" :dark="true" class="lg:col-span-1">
                    <x-mono-label :dark="true">03 — the differentiator</x-mono-label>
                    <h3 class="mt-3 font-semibold text-paper">Independent technical assurance</h3>
                    <p class="mt-2 text-sm text-paper/80">
                        Vendor proposal review, bid evaluation, design validation and second-opinion engineering
                        for clients procuring from OEMs.
                    </p>
                </x-card>

                <x-card href="#wireless-architecture">
                    <x-mono-label>04</x-mono-label>
                    <h3 class="mt-3 font-semibold text-ink">Wireless architecture for harsh and remote environments</h3>
                    <p class="mt-2 text-sm text-body">
                        Offshore and mobile-asset connectivity, redundant path design, SCADA and telemetry
                        transport, private LTE/5G.
                    </p>
                </x-card>

                <x-card href="#security-surveillance">
                    <x-mono-label>05</x-mono-label>
                    <h3 class="mt-3 font-semibold text-ink">Security and surveillance system design</h3>
                    <p class="mt-2 text-sm text-body">
                        Layered site security architecture for critical infrastructure, borders, airports and
                        remote posts.
                    </p>
                </x-card>

                <x-card href="#supply-integration">
                    <x-mono-label>06</x-mono-label>
                    <h3 class="mt-3 font-semibold text-ink">Supply, integration and commissioning</h3>
                    <p class="mt-2 text-sm text-body">
                        Vendor-agnostic equipment selection, procurement routing, staging and installation
                        supervision.
                    </p>
                </x-card>
            </div>
        </div>
    </section>

    {{-- 01 RF survey, path and link planning --}}
    <section id="rf-survey" class="scroll-mt-20 border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-mono-label>01</x-mono-label>
            <h2 class="mt-4 text-2xl font-semibold tracking-tight text-ink sm:text-3xl">
                RF survey, path and link planning
            </h2>
            <p class="mt-6 max-w-2xl text-body">
                Before a link is bought or installed, we establish whether it will work — and put a number on it.
            </p>
            <ul class="mt-8 grid max-w-3xl gap-x-8 gap-y-3 sm:grid-cols-2">
                <li class="border-t border-line pt-3 text-body">Path profiling</li>
                <li class="border-t border-line pt-3 text-body">Line-of-sight verification</li>
                <li class="border-t border-line pt-3 text-body">Link budgets</li>
                <li class="border-t border-line pt-3 text-body">Coverage prediction</li>
                <li class="border-t border-line pt-3 text-body">Frequency planning</li>
                <li class="border-t border-line pt-3 text-body">PTA / regulator coordination support</li>
            </ul>
        </div>
    </section>

    {{-- 02 Spectrum monitoring and interference resolution --}}
    <section id="spectrum-monitoring" class="scroll-mt-20 border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-mono-label>02</x-mono-label>
            <h2 class="mt-4 text-2xl font-semibold tracking-tight text-ink sm:text-3xl">
                Spectrum monitoring and interference resolution
            </h2>
            <p class="mt-6 max-w-2xl text-body">
                When a link underperforms or a regulator raises a case, we find the cause rather than guess at
                it.
            </p>
            <ul class="mt-8 grid max-w-3xl gap-x-8 gap-y-3 sm:grid-cols-2">
                <li class="border-t border-line pt-3 text-body">Occupancy surveys</li>
                <li class="border-t border-line pt-3 text-body">Interference hunting</li>
                <li class="border-t border-line pt-3 text-body">Emitter characterisation</li>
                <li class="border-t border-line pt-3 text-body">Regulatory case support</li>
            </ul>
        </div>
    </section>

    {{-- 03 Independent technical assurance — the differentiator --}}
    <section id="technical-assurance" class="scroll-mt-20 border-t border-line bg-ink">
        <div class="mx-auto max-w-6xl px-4 py-20 sm:px-6 sm:py-28">
            <x-section-heading eyebrow="03 — the differentiator" :dark="true">
                Independent technical assurance
            </x-section-heading>

            <p class="mt-6 max-w-2xl text-lg text-paper/80">
                Eight years of experience inside the vendors we now evaluate means we know how proposals are
                scoped, priced and padded. This service turns that experience over to the customer.
            </p>

            <div class="mt-10 grid gap-4 sm:grid-cols-2">
                <div class="border-t border-white/20 pt-4 text-paper">Vendor proposal review</div>
                <div class="border-t border-white/20 pt-4 text-paper">Bid evaluation</div>
                <div class="border-t border-white/20 pt-4 text-paper">Design validation</div>
                <div class="border-t border-white/20 pt-4 text-paper">Acceptance testing witness</div>
                <div class="border-t border-white/20 pt-4 text-paper sm:col-span-2">
                    Second-opinion engineering for clients procuring from OEMs
                </div>
            </div>

            <a href="/founder" class="mt-10 inline-block font-medium text-accent-2 hover:text-paper">
                Why this is different &rarr;
            </a>
        </div>
    </section>

    {{-- 04 Wireless architecture for harsh and remote environments --}}
    <section id="wireless-architecture" class="scroll-mt-20 border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-mono-label>04</x-mono-label>
            <h2 class="mt-4 text-2xl font-semibold tracking-tight text-ink sm:text-3xl">
                Wireless architecture for harsh and remote environments
            </h2>
            <p class="mt-6 max-w-2xl text-body">
                Systems designed to keep working where sites are remote, exposed, or moving.
            </p>
            <ul class="mt-8 grid max-w-3xl gap-x-8 gap-y-3 sm:grid-cols-2">
                <li class="border-t border-line pt-3 text-body">Offshore and mobile-asset connectivity</li>
                <li class="border-t border-line pt-3 text-body">Redundant path design</li>
                <li class="border-t border-line pt-3 text-body">SCADA and telemetry transport</li>
                <li class="border-t border-line pt-3 text-body">Private LTE/5G</li>
            </ul>
        </div>
    </section>

    {{-- 05 Security and surveillance system design --}}
    <section id="security-surveillance" class="scroll-mt-20 border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-mono-label>05</x-mono-label>
            <h2 class="mt-4 text-2xl font-semibold tracking-tight text-ink sm:text-3xl">
                Security and surveillance system design
            </h2>
            <p class="mt-6 max-w-2xl text-body">
                Layered site security architecture for critical infrastructure, borders, airports and remote
                posts — detection, identification, tracking, command-and-control integration and resilient
                backhaul.
            </p>
            <ul class="mt-8 grid max-w-3xl gap-x-8 gap-y-3 sm:grid-cols-2">
                <li class="border-t border-line pt-3 text-body">Detection</li>
                <li class="border-t border-line pt-3 text-body">Identification</li>
                <li class="border-t border-line pt-3 text-body">Tracking</li>
                <li class="border-t border-line pt-3 text-body">Command-and-control integration</li>
                <li class="border-t border-line pt-3 text-body sm:col-span-2">Resilient backhaul</li>
            </ul>
            <p class="mt-8 max-w-2xl text-sm text-body">
                Mitigation options are scoped only for duly authorised end users, under applicable law and
                licensing.
            </p>
        </div>
    </section>

    {{-- 06 Supply, integration and commissioning --}}
    <section id="supply-integration" class="scroll-mt-20 border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-mono-label>06</x-mono-label>
            <h2 class="mt-4 text-2xl font-semibold tracking-tight text-ink sm:text-3xl">
                Supply, integration and commissioning
            </h2>
            <p class="mt-6 max-w-2xl text-body">
                Vendor-agnostic delivery, from equipment selection through to a documented, trained handover.
            </p>
            <ul class="mt-8 grid max-w-3xl gap-x-8 gap-y-3 sm:grid-cols-2">
                <li class="border-t border-line pt-3 text-body">Vendor-agnostic equipment selection</li>
                <li class="border-t border-line pt-3 text-body">Procurement routing</li>
                <li class="border-t border-line pt-3 text-body">Staging</li>
                <li class="border-t border-line pt-3 text-body">Installation supervision</li>
                <li class="border-t border-line pt-3 text-body">FAT/SAT</li>
                <li class="border-t border-line pt-3 text-body">Handover documentation and training</li>
            </ul>
        </div>
    </section>

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
