<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('change-lang/{lang}', [\App\Http\Controllers\HelperController::class, 'changeLang'])->name('changeLang');

foreach (\App\Models\Language::all() as $lang){
    Route::middleware('locale')->prefix(( $lang->is_default ? '/' : $lang->code ))->group(function () use ($lang) {
        Route::get('/', [\App\Http\Controllers\StaticPageController::class, 'index'])->name('home');

        Route::get('catalog', [\App\Http\Controllers\StaticPageController::class, 'catalog'])->name('catalog');

        Route::get('catalog/{id:int}-{slug:string}', \App\Http\Livewire\Client\Pages\DetailedCatalogClient::class)->name('catalogItem');

        Route::get('popular', [\App\Http\Controllers\StaticPageController::class, 'popular'])->name('popular');

        Route::get('new', [\App\Http\Controllers\StaticPageController::class, 'new'])->name('new');

        Route::get('contacts', [\App\Http\Controllers\StaticPageController::class, 'contacts'])->name('contacts');

        Route::get('preview-gallery/{image}', [ \App\Http\Controllers\Admin\ImageCompileController::class, 'renderGalleryAdminPreview' ])->name('renderGalleryAdminPreview');

        Route::get('service', [\App\Http\Controllers\StaticPageController::class, 'service'])->name('service');

        Route::get('about', [\App\Http\Controllers\StaticPageController::class, 'about'])->name('about');

        foreach (\App\Models\Page::languageCode()->get() as $page){
            Route::get("{$page->slug}", function () use ($page) {
                return view('welcome', [ 'page' => $page ]);
            });
        }
        Route::get('gallery', [ \App\Http\Controllers\StaticPageController::class, 'galleryPage' ])->name('gallery');
    });
}
