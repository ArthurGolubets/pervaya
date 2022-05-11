<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\CatalogItem;
use App\Models\Page;

class StaticPageController extends Controller
{
    public function index()
    {
        $category = Catalog::where('parent_id', null)->get();

        $popular = CatalogItem::where('is_popular', '=', 1)->limit(12)->get();
        $newItem = CatalogItem::where('is_new', '=', 1)->limit(12)->get();

        return view('client.pages.index',compact('category', 'newItem', 'popular'));
    }

    public function catalog()
    {
        $popular = CatalogItem::where('is_popular', '=', 1)->limit(12)->get();
        $category = Catalog::where('parent_id', null)->get();
        return view('client.pages.catalog', compact('category', 'popular'));
    }

    public function contacts(){
        return view('client.pages.contacts');
    }

    public function detailCatalog(int $id, string $slug)
    {
        $catalog = Catalog::findWithIdAndSlug($id, $slug);
        $catalogs = Catalog::whereNull('parent_id')->orderBy('priority','asc')->get();
        return view('client.pages.detail-catalog', compact('catalog', 'catalogs'));
    }

    public function about()
    {
        return view('client.pages.about');
    }

    public function galleryPage()
    {
        $page = Page::findByLanguageCodeAndId(5);
        if($page->count() > 0) return view('client.pages.gallery', compact('page'));
        else return view('client.pages.404');
    }

    public function service()
    {
        return view('client.pages.service');
    }

        public function popular()
    {
        $title = 'Популярные';
        $items = CatalogItem::where('is_popular', '=', 1)->limit(12)->get();
        return view('client.pages.akcii',compact('items', 'title'));
    }

    public function new()
    {
        $title = 'Новинки';
        $items = CatalogItem::where('is_new', '=', 1)->limit(12)->get();
        return view('client.pages.akcii', compact('items', 'title'));
    }

}
