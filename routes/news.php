<?php

use App\Http\Controllers\News\HomeController as NewsHomeController;
use App\Http\Controllers\News\ArticleController;
use App\Http\Controllers\News\CategoryController;
use App\Http\Controllers\News\TagController;
use App\Http\Controllers\News\AuthorController;
use App\Http\Controllers\News\SearchController;
use App\Http\Controllers\News\NewsletterController;
use App\Http\Controllers\News\PageController as NewsPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| News Website Routes — clarivoxnews.com
|--------------------------------------------------------------------------
*/

Route::domain(config('cms.domains.news'))->group(function () {

  Route::middleware(['web', 'resolve.site'])->group(function () {

    Route::get('/', [NewsHomeController::class, 'index'])->name('news.home');

    // Articles
    Route::get('/article/{slug}', [ArticleController::class, 'show'])->name('news.article.show');
    Route::post('/article/{slug}/comment', [ArticleController::class, 'comment'])->name('news.article.comment');

    // Categories
    Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('news.category.show');

    // Tags
    Route::get('/tag/{slug}', [TagController::class, 'show'])->name('news.tag.show');

    // Authors
    Route::get('/author/{slug}', [AuthorController::class, 'show'])->name('news.author.show');

    // Search
    Route::get('/search', [SearchController::class, 'index'])->name('news.search');

    // Newsletter
    Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('news.newsletter.subscribe');
    Route::get('/newsletter/unsubscribe/{token}', [NewsletterController::class, 'unsubscribe'])->name('news.newsletter.unsubscribe');

    // Sitemap
    Route::get('/sitemap.xml', [NewsHomeController::class, 'sitemap'])->name('news.sitemap');

    // Static pages
    Route::get('/about', [NewsPageController::class, 'about'])->name('news.about');
    Route::get('/subscribe', [NewsPageController::class, 'subscribe'])->name('news.subscribe');
    Route::post('/subscribe', [NewsPageController::class, 'subscribeTrial'])->name('news.subscribe.trial');
  });
});
