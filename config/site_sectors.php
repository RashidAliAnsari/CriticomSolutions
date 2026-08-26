<?php

/*
|--------------------------------------------------------------------------
| Sector page content (CLAUDE.md §11)
|--------------------------------------------------------------------------
|
| One template — resources/views/sectors/show.blade.php — five content
| sets. `services` references the ids in config/site_services.php.
|
| Past performance is split deliberately:
|   - `criticom_work`  → the two engagements in CLAUDE.md §7.1, Criticom's
|                        own, described as "our work".
|   - `founder_work`   → CLAUDE.md §7.2, Hassan's personal record from
|                        before founding Criticom. Never described as
|                        Criticom's delivery — see `founder_intro`.
|
| A sector with nothing genuinely relevant in §7 gets an empty array
| rather than a stretched claim (CLAUDE.md §2 rule 1).
|
*/

return [

    [
        'slug' => 'energy-offshore',
        'nav_title' => 'Energy and offshore',
        'meta_description' => 'RF survey, wireless architecture and independent technical assurance for oil and gas fields, offshore platforms, FPSOs and remote wellhead connectivity.',
        'eyebrow' => 'Energy and offshore',
        'heading' => 'Wireless that keeps working when the field is remote, offshore, or unattended.',
        'intro' => 'Oil and gas operators run infrastructure where fibre does not reach and failure is not an option — offshore platforms, FPSOs, remote wellheads and SCADA networks that have to stay up regardless of weather, distance or vendor support cycles.',
        'problem_heading' => 'Where offshore wireless actually fails.',
        'problem_paragraphs' => [
            'Offshore and remote energy sites depend on wireless links that a control room may only look at closely once something has already gone wrong. Path loss, fading and interference are compounded by exposed terrain, moving vessels and licensing regimes that vary field to field.',
            'A design that looks fine on paper still has to survive years of weather, salt air and duty cycles that no OEM demonstration ever tests for.',
        ],
        'services' => [1, 3, 4, 6],
        'criticom_work' => [
            [
                'title' => 'BW Energy — offshore communications, Gabon',
                'body' => 'Criticom designed a fail-safe architecture linking an FPSO and a drilling barge using redundant point-to-point wireless, engineered so that no single link failure interrupts offshore operations.',
            ],
        ],
        'founder_intro' => 'Before founding Criticom, Hassan spent much of his career on exactly this class of problem, on the customer and OEM sides of oil and gas fields.',
        'founder_work' => [
            [
                'title' => 'Petroleum Development Oman',
                'body' => 'Nationwide broadband wireless supporting field communications and SCADA transport across 8,800+ wellheads and 250+ drilling rigs.',
            ],
            [
                'title' => 'Occidental Oman, "Digital Canopy"',
                'body' => 'Field-wide wireless across 3,000+ wellheads and 15+ rigs, Farah and Mukhaizna fields.',
            ],
            [
                'title' => 'ZADCO, Upper Zakum offshore',
                'body' => 'Contributed to deployment of 77 wireless links in a challenging offshore RF environment.',
            ],
            [
                'title' => 'Brunei Shell Petroleum',
                'body' => 'Five years as Resident Engineer supporting mission-critical wireless across offshore and onshore operations, including connectivity for vessels, barges and drilling rigs.',
            ],
            [
                'title' => 'ADCO / ADNOC Onshore',
                'body' => 'Wireless for Bu Hasa and Bin Hashim fields.',
            ],
        ],
        'show_mitigation_note' => false,
    ],

    [
        'slug' => 'defense',
        'nav_title' => 'Defense and national security',
        'meta_description' => 'Secure wide-area backhaul, deployable communications, spectrum awareness and independent technical assurance for defense and national security programmes.',
        'eyebrow' => 'Defense and national security',
        'heading' => 'Secure, resilient communications for defense and national security missions.',
        'intro' => 'Defense and government agencies need wide-area backhaul, deployable communications and spectrum awareness that hold up under contested or congested conditions — without exposing the mission to a single vendor\'s roadmap.',
        'problem_heading' => 'Contested spectrum does not forgive a generic design.',
        'problem_paragraphs' => [
            'Defense and national security programmes run communications where someone is actively trying to deny, deceive or intercept them. Backhaul has to survive contested spectrum and austere terrain, specified by people who will answer for a link that fails in the field — not by whoever is selling it.',
        ],
        'services' => [1, 2, 3, 5],
        'criticom_work' => [
            [
                'title' => 'North African government border surveillance programme',
                'body' => 'Criticom provided engineering consultancy support for a national border surveillance programme. Country and client are withheld.',
            ],
        ],
        'founder_intro' => 'Before founding Criticom, Hassan supported secure wireless backhaul for defense clients directly.',
        'founder_work' => [
            [
                'title' => 'Ministry of Defence, Oman',
                'body' => 'Secure wide-area wireless backhaul.',
            ],
        ],
        'show_mitigation_note' => true,
    ],

    [
        'slug' => 'critical-infrastructure',
        'nav_title' => 'Critical infrastructure protection',
        'meta_description' => 'Layered site security architecture — detection, identification, tracking and resilient backhaul — for airports, border crossings, remote posts and government sites.',
        'eyebrow' => 'Critical infrastructure protection',
        'heading' => 'Layered security design for the sites that cannot go dark.',
        'intro' => 'Airports, border crossings, remote check posts and government sites need detection, identification, tracking and command-and-control that work together — and communications resilient enough to keep reporting when it matters most.',
        'problem_heading' => 'Detection is only as good as the network behind it.',
        'problem_paragraphs' => [
            'A sensor is only as useful as the link carrying its data and the system fusing it with everything else on site. Layered security fails quietly when backhaul is under-specified, spectrum is congested, or one OEM\'s platform cannot talk to the next one you add to it.',
        ],
        'services' => [1, 3, 5, 6],
        'criticom_work' => [
            [
                'title' => 'North African government border surveillance programme',
                'body' => 'Criticom provided engineering consultancy support for a national border surveillance programme. Country and client are withheld.',
            ],
        ],
        'founder_intro' => null,
        'founder_work' => [],
        'show_mitigation_note' => true,
    ],

    [
        'slug' => 'industrial-transport',
        'nav_title' => 'Industrial and transport connectivity',
        'meta_description' => 'Wireless architecture, RF survey and supply/integration for industrial IoT gateways, remote monitoring, transport systems and edge connectivity.',
        'eyebrow' => 'Industrial and transport connectivity',
        'heading' => 'Connectivity for industrial sites that nobody visits every day.',
        'intro' => 'Industrial IoT gateways, remote monitoring, public transport and metro systems, and edge connectivity all depend on wireless links that keep reporting from unattended, distributed locations long after the installation team has left site.',
        'problem_heading' => 'Uptime is decided at the node nobody visits.',
        'problem_paragraphs' => [
            'Industrial and transport networks are judged on uptime at the node nobody is standing next to. A gateway that drops out for an hour a month is a rounding error in a lab and a maintenance callout in the field. The wireless layer has to be planned, not assumed.',
        ],
        'services' => [1, 2, 4, 6],
        'criticom_work' => [],
        'founder_intro' => 'Before founding Criticom, Hassan worked on the same underlying problem — wireless connectivity for distributed, unattended infrastructure — in an energy setting.',
        'founder_work' => [
            [
                'title' => 'Petroleum Development Oman',
                'body' => 'Nationwide SCADA and telemetry transport across 8,800+ wellheads and 250+ drilling rigs.',
            ],
        ],
        'show_mitigation_note' => false,
    ],

    [
        'slug' => 'telecom-spectrum',
        'nav_title' => 'Telecom operators and regulators',
        'meta_description' => 'Backhaul planning, interference resolution, spectrum management and network assurance for telecom operators and regulators.',
        'eyebrow' => 'Telecom operators and regulators',
        'heading' => 'Backhaul planning and spectrum management for telecom operators and regulators.',
        'intro' => 'Telecom operators and regulators need backhaul that is planned rather than guessed, and interference resolved rather than argued about. Both are engineering problems before they are commercial ones.',
        'problem_heading' => 'Interference cases are won or lost at the planning stage.',
        'problem_paragraphs' => [
            'Backhaul under-provisioned at the planning stage shows up as customer complaints months later, and an interference case without a proper occupancy survey behind it is difficult to make stick with a regulator.',
        ],
        'services' => [1, 2, 3],
        'criticom_work' => [],
        'founder_intro' => 'Before founding Criticom, Hassan worked directly with telecom operators on backhaul and spectrum problems.',
        'founder_work' => [
            [
                'title' => 'Omantel',
                'body' => 'B2B and specialised wireless backhaul; rural 4G/5G expansion support.',
            ],
            [
                'title' => 'Hytera, Morocco',
                'body' => 'RF optimisation and interference removal.',
            ],
        ],
        'show_mitigation_note' => false,
    ],

];
