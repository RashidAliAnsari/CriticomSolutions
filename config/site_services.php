<?php

/*
|--------------------------------------------------------------------------
| Service catalogue (CLAUDE.md §10)
|--------------------------------------------------------------------------
|
| Single source of truth for the six service lines, keyed 1-6 in the order
| they appear on /services. Sector pages reference these by id so the
| wording never drifts between the services page and the sector pages.
|
*/

return [

    1 => [
        'title' => 'RF survey, path and link planning',
        'summary' => 'Path profiling, LOS verification, link budgets, coverage prediction, frequency planning, PTA/regulator coordination support.',
        'anchor' => 'rf-survey',
    ],

    2 => [
        'title' => 'Spectrum monitoring and interference resolution',
        'summary' => 'Occupancy surveys, interference hunting, emitter characterisation, regulatory case support.',
        'anchor' => 'spectrum-monitoring',
    ],

    3 => [
        'title' => 'Independent technical assurance',
        'summary' => 'Vendor proposal review, bid evaluation, design validation, acceptance testing witness, second-opinion engineering for clients procuring from OEMs.',
        'anchor' => 'technical-assurance',
    ],

    4 => [
        'title' => 'Wireless architecture for harsh and remote environments',
        'summary' => 'Offshore and mobile-asset connectivity, redundant path design, SCADA and telemetry transport, private LTE/5G.',
        'anchor' => 'wireless-architecture',
    ],

    5 => [
        'title' => 'Security and surveillance system design',
        'summary' => 'Layered site security architecture for critical infrastructure, borders, airports and remote posts. Detection, identification, tracking, C2 integration and resilient backhaul.',
        'anchor' => 'security-surveillance',
    ],

    6 => [
        'title' => 'Supply, integration and commissioning',
        'summary' => 'Vendor-agnostic equipment selection, procurement routing, staging, installation supervision, FAT/SAT, handover documentation and training.',
        'anchor' => 'supply-integration',
    ],

];
