{{--
    Signature hero figure — illustrative microwave path profile. See CLAUDE.md §4.
    Terrain, two towers, line-of-sight and first Fresnel zone clearance.
    The line-of-sight draws on load; respects prefers-reduced-motion.
--}}
@php
    // Lattice mast: two converging legs, evenly spaced cross-rungs, alternating
    // diagonal cross-bracing between them, and a dish on a bracket near the
    // top, angled toward the opposite tower.
    $buildTower = function (float $baseX, float $baseY, float $apexY, int $dishSide) {
        $baseHalf = 12;
        $topHalf = 6;
        $rungCount = 7;
        $panelCount = $rungCount + 1;

        $shapes = [];

        $shapes[] = ['line', $baseX - $baseHalf, $baseY, $baseX - $topHalf, $apexY];
        $shapes[] = ['line', $baseX + $baseHalf, $baseY, $baseX + $topHalf, $apexY];

        $levels = [];
        for ($i = 0; $i <= $panelCount; $i++) {
            $t = $i / $panelCount;
            $y = $baseY + ($apexY - $baseY) * $t;
            $half = $baseHalf + ($topHalf - $baseHalf) * $t;
            $levels[] = ['y' => $y, 'left' => $baseX - $half, 'right' => $baseX + $half];
        }

        for ($i = 1; $i < $panelCount; $i++) {
            $shapes[] = ['line', $levels[$i]['left'], $levels[$i]['y'], $levels[$i]['right'], $levels[$i]['y']];
        }

        for ($i = 0; $i < $panelCount; $i++) {
            $bottom = $levels[$i];
            $top = $levels[$i + 1];

            $shapes[] = $i % 2 === 0
                ? ['brace', $bottom['left'], $bottom['y'], $top['right'], $top['y']]
                : ['brace', $bottom['right'], $bottom['y'], $top['left'], $top['y']];
        }

        $dishT = 0.82;
        $dishY = $baseY + ($apexY - $baseY) * $dishT;
        $mastHalf = $baseHalf + ($topHalf - $baseHalf) * $dishT;
        $mastEdgeX = $baseX + $dishSide * $mastHalf;
        $dishRadius = 9;
        $dishX = $mastEdgeX + $dishSide * ($dishRadius + 8);

        $shapes[] = ['line', $mastEdgeX, $dishY, $dishX - $dishSide * $dishRadius, $dishY];
        $shapes[] = ['circle', $dishX, $dishY, $dishRadius];

        return $shapes;
    };

    $towers = [
        $buildTower(240, 385, 140, 1),
        $buildTower(1360, 380, 145, -1),
    ];
@endphp

<figure {{ $attributes->merge(['class' => 'w-full bg-ink']) }}>
    <svg
        viewBox="0 60 1600 400"
        preserveAspectRatio="xMidYMid slice"
        class="h-[320px] w-full sm:h-[420px] lg:h-[480px]"
        role="img"
        aria-label="Illustrative path profile diagram: two microwave towers connected by a line-of-sight path, with the first Fresnel zone clearing the terrain between them."
    >
        <!-- Elevation grid -->
        <g class="stroke-deep" stroke-width="1">
            <line x1="0" y1="138" x2="1600" y2="138" />
            <line x1="0" y1="207" x2="1600" y2="207" />
            <line x1="0" y1="276" x2="1600" y2="276" />
            <line x1="0" y1="345" x2="1600" y2="345" />
            <line x1="0" y1="414" x2="1600" y2="414" />
        </g>

        <!-- First Fresnel zone -->
        <path
            d="M240,140 Q800,87 1360,145 Q800,197 240,140 Z"
            class="fill-accent-2/12"
        />

        <!-- Line of sight -->
        <line
            x1="240" y1="140" x2="1360" y2="145"
            pathLength="100"
            class="path-profile-los stroke-accent-2"
            stroke-width="2"
        />

        <!-- Terrain silhouette -->
        <path
            d="M0,400 C40,397.5 160,384.2 240,385 C320,385.8 386.7,410 480,405 C573.3,400 693.3,355.8 800,355 C906.7,354.2 1026.7,395.8 1120,400 C1213.3,404.2 1280,380.3 1360,380 C1440,379.7 1560,395 1600,398 L1600,460 L0,460 Z"
            class="fill-accent/20 stroke-accent"
            stroke-width="1.5"
        />

        <!-- Towers -->
        <g class="stroke-paper" fill="none" stroke-width="2" stroke-linecap="round">
            @foreach ($towers as $tower)
                @foreach ($tower as $shape)
                    @if ($shape[0] === 'line')
                        <line x1="{{ $shape[1] }}" y1="{{ $shape[2] }}" x2="{{ $shape[3] }}" y2="{{ $shape[4] }}" />
                    @elseif ($shape[0] === 'brace')
                        <line x1="{{ $shape[1] }}" y1="{{ $shape[2] }}" x2="{{ $shape[3] }}" y2="{{ $shape[4] }}" stroke-width="1" />
                    @else
                        <circle cx="{{ $shape[1] }}" cy="{{ $shape[2] }}" r="{{ $shape[3] }}" />
                    @endif
                @endforeach
            @endforeach
        </g>

        <style>
            .path-profile-los {
                stroke-dasharray: 100;
                stroke-dashoffset: 100;
                animation: path-profile-draw 1.4s 0.2s ease-out forwards;
            }

            @media (prefers-reduced-motion: reduce) {
                .path-profile-los {
                    animation: none;
                    stroke-dashoffset: 0;
                }
            }

            @keyframes path-profile-draw {
                to {
                    stroke-dashoffset: 0;
                }
            }
        </style>
    </svg>

    <figcaption class="border-t border-white/10 px-4 py-3 text-center font-mono text-xs uppercase tracking-mono-label text-accent-2 sm:px-6">
        Path profile with first Fresnel zone clearance — illustrative.
    </figcaption>
</figure>
