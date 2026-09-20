<?php

/*
|--------------------------------------------------------------------------
| Admin panel path (CLAUDE.md §13.3)
|--------------------------------------------------------------------------
|
| The panel must not live at a guessable segment in production. Set
| FILAMENT_PATH in the server .env to an unguessable value. Defaults to
| "admin" for local development only.
|
*/

return [
    'path' => env('FILAMENT_PATH', 'admin'),
];
