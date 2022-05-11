<?php
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [ \App\Http\Controllers\Admin\AuthController::class, 'loginView' ])
	->name('admin.login');
Route::name('admin.')
	->prefix('admin')
	->middleware("authorized" )
	->group(function () {
//		Route::get('preview/{image}', [ \App\Http\Controllers\Admin\ImageController::class, 'compileImage' ])->name('image');
		Route::get('/', \App\Http\Livewire\Admin\Pages\Dashboard::class)->name('home');

        Route::get('settings', \App\Http\Livewire\Admin\Pages\Settings::class)->name('settings');

        if(env('USE_LANGUAGE')){
            Route::prefix('languages')->name('languages.')->group(function () {
                Route::get('/', \App\Http\Livewire\Admin\Pages\Language::class)->name('list');
                Route::get('create', \App\Http\Livewire\Admin\Pages\WordAdd::class)->name('create');
                Route::get('{id:int?}/translate', \App\Http\Livewire\Admin\Pages\LanguageTranslate::class)->name('translate');
            });
        }

        Route::prefix('catalog')->name('catalog.')->group(function(){
            Route::get('/', \App\Http\Livewire\Admin\Pages\AdminCatalogList::class)->name('list');

            Route::prefix('items')->name('items.')->group(function(){
                Route::get('create', \App\Http\Livewire\Admin\Pages\AdminCatalogItemEdit::class)->name('create');
                Route::get('{id:int?}', \App\Http\Livewire\Admin\Pages\AdminCatalogItemEdit::class)->name('edit');
            });

            Route::get('create',\App\Http\Livewire\Admin\Pages\AdminCatalogEdit::class )->name('create');
            Route::get('{id:int?}',\App\Http\Livewire\Admin\Pages\AdminCatalogEdit::class )->name('edit');
        });

        Route::prefix('vendor')->name('vendors.')->group(function (){
            Route::get('/', \App\Http\Livewire\Admin\Pages\AdminVendorList::class)->name('list');
            Route::get('create', \App\Http\Livewire\Admin\Pages\AdminVendorsEdit::class)->name('create');
            Route::get('{id:int?}', \App\Http\Livewire\Admin\Pages\AdminVendorsEdit::class)->name('edit');
        });

        Route::get('orders', \App\Http\Livewire\Admin\Pages\AdminOrdersList::class)->name('orders');
        Route::get('message',\App\Http\Livewire\Admin\Pages\AdminMessagesList::class )->name('messages');

        Route::prefix('pages')->name('pages.')->group(function () {
            Route::get('/', \App\Http\Livewire\Admin\Pages\PageList::class)->name('list');
            Route::get('create', \App\Http\Livewire\Admin\Pages\PageEdit::class)->name('create');
            Route::get('{id:int?}', \App\Http\Livewire\Admin\Pages\PageEdit::class)->name('edit');
        });


        Route::prefix('slide')->name('slide.')->group(function (){
            Route::get('/', \App\Http\Livewire\AdminSliderList::class)->name('list');
            Route::get('create', \App\Http\Livewire\Admin\Pages\AdminSliderEdit::class)->name('create');
            Route::get('{id:int?}', \App\Http\Livewire\Admin\Pages\AdminSliderEdit::class )->name('edit');
        });

//        Route::get('menu', \App\Http\Livewire\Admin\Pages\MenuList::class)->name('menu.list');

		Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

        Route::group(['prefix' => 'filemngr', 'middleware' => ['web', 'auth']], function () {
            \UniSharp\LaravelFilemanager\Lfm::routes();
        });

        /*Route::prefix('filemngr')->group(function () {
            \UniSharp\LaravelFilemanager\Lfm::routes();
        });*/
    });
