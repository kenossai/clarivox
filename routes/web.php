<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Multi-domain routes are defined in routes/creative.php and routes/news.php.
| This file handles the default fallback (useful in local development).
*/

Route::get('/', function () {
    return redirect('/admin');
});
