<x-layout
    title="Privacy notice"
    description="How Criticom Solutions handles information submitted through the contact form."
>
    {{-- Hero --}}
    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24">
        <x-mono-label>Privacy notice</x-mono-label>

        <h1 class="mt-4 max-w-3xl text-3xl font-semibold tracking-tight text-ink sm:text-4xl">
            How we handle information you send us.
        </h1>

        <p class="mt-6 max-w-2xl text-lg text-body">
            This notice covers the information collected through the contact form on this site. It does not
            cover any other data source, because Criticom does not operate any other data collection on this
            site.
        </p>
    </section>

    {{-- What we collect --}}
    <section class="border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-section-heading eyebrow="What we collect">
                Only what the contact form asks for.
            </x-section-heading>

            <p class="mt-6 max-w-2xl text-body">
                When you submit the contact form, we collect the name, company, email address, phone number,
                sector and message you provide, plus the IP address and time of submission. Two hidden fields
                are used to filter automated spam submissions — a blank field bots tend to fill in, and a
                minimum time-to-submit check — neither collects any information beyond what is needed to make
                that check.
            </p>
        </div>
    </section>

    {{-- How we use it --}}
    <section class="border-t border-line bg-ink">
        <div class="mx-auto max-w-6xl px-4 py-20 sm:px-6 sm:py-28">
            <x-section-heading eyebrow="How we use it" :dark="true">
                To respond to your enquiry, nothing else.
            </x-section-heading>

            <p class="mt-6 max-w-2xl text-lg text-paper/80">
                Submitted information is used to respond to your enquiry and to keep an internal record of
                enquiries received. We do not sell or share it with third parties, and we do not use it for
                marketing.
            </p>
        </div>
    </section>

    {{-- How it's stored --}}
    <section class="border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-section-heading eyebrow="How it's stored">
                In our own database, not a third-party platform.
            </x-section-heading>

            <p class="mt-6 max-w-2xl text-body">
                Enquiries are stored in Criticom's database and are accessible only through a
                password-protected internal admin panel. We do not use a third-party form or CRM platform to
                collect or store this information.
            </p>

            <p class="mt-4 max-w-2xl text-body">
                [TODO: confirm data retention period for enquiry records]
            </p>
        </div>
    </section>

    {{-- Cookies --}}
    <section class="border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-section-heading eyebrow="Cookies">
                One session cookie, nothing else.
            </x-section-heading>

            <p class="mt-6 max-w-2xl text-body">
                This site sets a single session cookie, required for basic site functionality, form security
                and the spam checks described above. We do not use advertising or analytics cookies, and we do
                not track visitors across other sites.
            </p>
        </div>
    </section>

    {{-- Your rights / contact --}}
    <section class="border-t border-line">
        <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
            <x-section-heading eyebrow="Your data">
                Questions or requests.
            </x-section-heading>

            <p class="mt-6 max-w-2xl text-body">
                To ask what information we hold about you, or to request that it be corrected or deleted,
                email <a href="mailto:support@criticom.net" class="text-accent hover:text-ink">support@criticom.net</a>.
            </p>

            <p class="mt-4 max-w-2xl text-body">
                [TODO: confirm applicable data protection law/registration, if any]
            </p>
        </div>
    </section>
</x-layout>
