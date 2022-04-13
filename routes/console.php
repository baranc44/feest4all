<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment('you are dumb');
    // $this->comment(Inspiring::quote().' test');
})->purpose('Display an inspiring quote');

Artisan::command('lnspire', function () {
    $this->comment('you are strong ');
})->purpose('Display an inspiring quote2');