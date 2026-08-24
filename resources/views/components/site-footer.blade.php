<footer class="border-t border-line bg-ink text-paper">
    <div class="mx-auto max-w-6xl px-4 py-12 sm:px-6">
        <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
            <div>
                <p class="text-lg font-bold text-paper">Criticom Solutions</p>
                <p class="mt-4 text-sm text-paper/80">
                    Registration: [TODO: SECP registration number]
                </p>
                <p class="mt-2 text-sm text-paper/80">
                    [TODO: office address]
                </p>
            </div>

            <div>
                <p class="font-mono text-xs uppercase tracking-mono-label text-accent-2">Contact</p>
                <ul class="mt-4 space-y-2 text-sm">
                    <li><a href="mailto:support@criticom.net" class="hover:text-accent-2">support@criticom.net</a></li>
                    <li><a href="tel:+923053555440" class="hover:text-accent-2">+92 305 3555 440</a></li>
                </ul>
            </div>

            <div>
                <p class="font-mono text-xs uppercase tracking-mono-label text-accent-2">Sectors</p>
                <ul class="mt-4 space-y-2 text-sm">
                    <li><a href="/sectors/energy-offshore" class="hover:text-accent-2">Energy and offshore</a></li>
                    <li><a href="/sectors/defense" class="hover:text-accent-2">Defense and national security</a></li>
                    <li><a href="/sectors/critical-infrastructure" class="hover:text-accent-2">Critical infrastructure protection</a></li>
                    <li><a href="/sectors/industrial-transport" class="hover:text-accent-2">Industrial and transport connectivity</a></li>
                    <li><a href="/sectors/telecom-spectrum" class="hover:text-accent-2">Telecom operators and regulators</a></li>
                </ul>
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-2 border-t border-white/10 pt-6 text-xs text-paper/60 sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ now()->year }} Criticom Solutions. Lahore, Pakistan.</p>
            <a href="/privacy" class="hover:text-accent-2">Privacy</a>
        </div>
    </div>
</footer>
