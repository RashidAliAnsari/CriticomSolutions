<x-layout
    title="Credentials"
    description="Criticom Solutions' legal entity, registrations, compliance status and OEM relationships — for procurement and technical evaluators verifying the company."
>
    {{-- Hero --}}
    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24">
        <x-mono-label>Credentials</x-mono-label>

        <h1 class="mt-4 max-w-3xl text-3xl font-semibold tracking-tight text-ink sm:text-4xl">
            Legal entity, registrations and compliance.
        </h1>

        <p class="mt-6 max-w-2xl text-lg text-body">
            The facts below are for procurement and technical evaluators verifying Criticom as a vendor.
            Where a registration or document is still in progress, that is stated rather than left blank.
        </p>
    </section>

    {{-- Legal entity --}}
    <section class="border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-section-heading eyebrow="Legal entity">
                Registered details.
            </x-section-heading>

            <dl class="mt-10 grid gap-8 sm:grid-cols-2">
                <div class="border-t border-line pt-4">
                    <dt><x-mono-label>Trading and legal name</x-mono-label></dt>
                    <dd class="mt-3 text-body">Criticom Solutions</dd>
                </div>

                <div class="border-t border-line pt-4">
                    <dt><x-mono-label>Structure</x-mono-label></dt>
                    <dd class="mt-3 text-body">Sole proprietorship, registered with SECP</dd>
                </div>

                <div class="border-t border-line pt-4">
                    <dt><x-mono-label>Location</x-mono-label></dt>
                    <dd class="mt-3 text-body">Lahore, Pakistan</dd>
                </div>

                <div class="border-t border-line pt-4">
                    <dt><x-mono-label>SECP registration number</x-mono-label></dt>
                    <dd class="mt-3 text-body">[TODO: SECP registration number]</dd>
                </div>

                <div class="border-t border-line pt-4">
                    <dt><x-mono-label>NTN</x-mono-label></dt>
                    <dd class="mt-3 text-body">[TODO: NTN]</dd>
                </div>

                <div class="border-t border-line pt-4">
                    <dt><x-mono-label>Office address</x-mono-label></dt>
                    <dd class="mt-3 text-body">[TODO: office address]</dd>
                </div>

                <div class="border-t border-line pt-4">
                    <dt><x-mono-label>Email</x-mono-label></dt>
                    <dd class="mt-3 text-body">
                        <a href="mailto:support@criticom.net" class="text-accent hover:text-ink">support@criticom.net</a>
                    </dd>
                </div>

                <div class="border-t border-line pt-4">
                    <dt><x-mono-label>Phone / WhatsApp</x-mono-label></dt>
                    <dd class="mt-3 text-body">
                        <a href="tel:+923053555440" class="text-accent hover:text-ink">+92 305 3555 440</a>
                    </dd>
                </div>
            </dl>
        </div>
    </section>

    {{-- Registrations and compliance --}}
    <section class="border-t border-line bg-ink">
        <div class="mx-auto max-w-6xl px-4 py-20 sm:px-6 sm:py-28">
            <x-section-heading eyebrow="Registrations and compliance" :dark="true">
                Regulatory and standards status.
            </x-section-heading>

            <dl class="mt-10 grid gap-8 sm:grid-cols-2">
                <div class="border-t border-white/20 pt-4">
                    <dt><x-mono-label :dark="true">PPRA</x-mono-label></dt>
                    <dd class="mt-3 text-paper/80">Registered — Lahore, telecom systems integrator category</dd>
                </div>

                <div class="border-t border-white/20 pt-4">
                    <dt><x-mono-label :dark="true">ISO</x-mono-label></dt>
                    <dd class="mt-3 text-paper/80">In progress — [TODO: which standard, expected date]</dd>
                </div>
            </dl>
        </div>
    </section>

    {{-- OEM relationships --}}
    <section class="border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-section-heading eyebrow="OEM relationships">
                Routes to supply, not endorsements.
            </x-section-heading>

            <p class="mt-6 max-w-2xl text-body">
                Criticom is vendor-agnostic. It is not a distributor, reseller, or authorised service partner of
                any manufacturer. The two relationships below are registrations that give Criticom a route to
                supply specific equipment — nothing more.
            </p>

            <div class="mt-10 grid gap-6 sm:grid-cols-2">
                <x-card>
                    <h3 class="font-semibold text-ink">Aviat Networks</h3>
                    <p class="mt-2 text-sm text-body">
                        Criticom is a registered consultant vendor with Aviat's Singapore office.
                    </p>
                </x-card>

                <x-card>
                    <h3 class="font-semibold text-ink">KingSat</h3>
                    <p class="mt-2 text-sm text-body">
                        Vendor registration permitting Criticom to take customer requirements and have them
                        resolved into a technical proposal by KingSat. KingSat's M-series is a 3-axis
                        mechanically stabilised tracking parabolic for coast-to-vessel (50–60 km) and
                        vessel-to-vessel (40 km) links — directly relevant to offshore mobile-asset connectivity.
                    </p>
                </x-card>
            </div>
        </div>
    </section>

    {{-- Personnel qualifications --}}
    <section class="border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-section-heading eyebrow="Personnel qualifications">
                Held by the founder, not the company.
            </x-section-heading>

            <p class="mt-6 max-w-2xl text-body">
                Offshore HSE certifications, industry certifications and planning-tool proficiency listed on the
                <a href="/founder" class="text-accent hover:text-ink">founder page</a> were earned by Hassan
                Muhammad Mushtaq personally, in the course of his employment before founding Criticom. They are
                not certifications held by Criticom Solutions as a company.
            </p>
        </div>
    </section>

    {{-- Documentation --}}
    <section class="border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-section-heading eyebrow="Documentation">
                Verification documents on request.
            </x-section-heading>

            <p class="mt-6 max-w-2xl text-body">
                Registration certificates and other supporting documentation for procurement due diligence are
                available on request at
                <a href="mailto:support@criticom.net" class="text-accent hover:text-ink">support@criticom.net</a>.
            </p>
        </div>
    </section>

    {{-- Contact CTA --}}
    <section class="border-t border-line bg-ink">
        <div class="mx-auto max-w-6xl px-4 py-16 text-center sm:px-6">
            <x-section-heading eyebrow="Get in touch" :dark="true" align="center">
                Verifying Criticom for a shortlist or tender?
            </x-section-heading>

            <p class="mx-auto mt-4 max-w-xl text-paper/80">
                Tell us what you need confirmed and we will get back to you.
            </p>

            <div class="mt-8 flex justify-center">
                <x-button href="/contact" :dark="true">Request a consultation</x-button>
            </div>
        </div>
    </section>
</x-layout>
