<?php

use App\Http\Controllers\Creative\HomeController as CreativeHomeController;
use App\Http\Controllers\Creative\PageController;
use App\Http\Controllers\Creative\ServiceController;
use App\Http\Controllers\Creative\PortfolioController;
use App\Http\Controllers\Creative\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Creative Agency Routes — clarivoxcreatives.com
|--------------------------------------------------------------------------
*/

Route::domain(config('cms.domains.creative'))->group(function () {

  Route::middleware(['web', 'resolve.site'])->group(function () {

    Route::get('/', [CreativeHomeController::class, 'index'])->name('creative.home');

    // Services
    Route::get('/services', [ServiceController::class, 'index'])->name('creative.services.index');
    Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('creative.services.show');

    // Portfolio
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('creative.portfolio.index');
    Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('creative.portfolio.show');

    // Contact
    Route::get('/contact', [ContactController::class, 'show'])->name('creative.contact.show');
    Route::post('/contact', [ContactController::class, 'submit'])->name('creative.contact.submit');

    // Dynamic CMS pages (must come last)
    Route::get('/{slug}', [PageController::class, 'show'])->name('creative.page.show');
  });
});
