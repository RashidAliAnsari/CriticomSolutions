<header class="sticky top-0 z-40 border-b border-line bg-paper">
    <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-4 py-4 sm:px-6">
        <a href="/" class="text-lg font-bold tracking-tight text-ink">
            Criticom
        </a>

        <input
            type="checkbox"
            id="nav-toggle"
            class="peer absolute h-px w-px overflow-hidden whitespace-nowrap [clip:rect(0,0,0,0)]"
        />
        <label
            for="nav-toggle"
            class="flex h-11 w-11 cursor-pointer items-center justify-center text-ink peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-accent md:hidden"
        >
            <span class="sr-only">Menu</span>
            <svg aria-hidden="true" viewBox="0 0 20 20" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" d="M3 5h14M3 10h14M3 15h14" />
            </svg>
        </label>

        <nav
            aria-label="Primary"
            class="hidden w-full flex-col gap-6 border-t border-line py-4 peer-checked:flex md:static md:flex md:w-auto md:flex-row md:items-center md:border-0 md:py-0"
        >
            <ul class="flex flex-col gap-4 text-sm md:flex-row md:items-center md:gap-8">
                <li><a href="/services" class="text-ink hover:text-accent">Services</a></li>
                <li class="relative">
                    <details>
                        <summary class="list-none text-ink hover:text-accent [&::-webkit-details-marker]:hidden">
                            Sectors
                        </summary>
                        <ul class="mt-2 flex flex-col gap-2 border-l border-line pl-4 md:absolute md:mt-3 md:min-w-64 md:border md:border-line md:bg-paper md:p-3 md:pl-3">
                            <li><a href="/sectors/energy-offshore" class="block text-ink hover:text-accent">Energy and offshore</a></li>
                            <li><a href="/sectors/defense" class="block text-ink hover:text-accent">Defense and national security</a></li>
                            <li><a href="/sectors/critical-infrastructure" class="block text-ink hover:text-accent">Critical infrastructure protection</a></li>
                            <li><a href="/sectors/industrial-transport" class="block text-ink hover:text-accent">Industrial and transport connectivity</a></li>
                            <li><a href="/sectors/telecom-spectrum" class="block text-ink hover:text-accent">Telecom operators and regulators</a></li>
                        </ul>
                    </details>
                </li>
                <li><a href="/founder" class="text-ink hover:text-accent">Founder</a></li>
                <li><a href="/credentials" class="text-ink hover:text-accent">Credentials</a></li>
                <li><a href="/contact" class="text-ink hover:text-accent">Contact</a></li>
            </ul>

            <a
                href="/contact"
                class="inline-flex items-center justify-center bg-accent px-5 py-2.5 text-sm font-medium text-paper hover:bg-ink md:ml-4"
            >
                Request a consultation
            </a>
        </nav>
    </div>
</header>
