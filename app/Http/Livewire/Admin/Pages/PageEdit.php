<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Http\Livewire\Admin\Components\Language\Content;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\PageTranslation;
use Illuminate\Support\Str;
use Livewire\Component;

class PageEdit extends Component
{
    public bool $isEditMode;
    public Page $page;
    public ?string $temp_id = null;
    //    public PageTranslation $pageTranslation;

    /*protected $rules = [
        'pageTranslation.title' => 'string'
    ];*/

    protected $listeners = ['savedTranslate'];

    public function savedTranslate()
    {
        $slug = Str::slug(Page::findByLanguageCodeAndId($this->page->id)->name);
        $this->page->slug = $slug;
        $this->page->save();

        return redirect()->route('admin.pages.list');
    }

    public function cancel()
    {
        return redirect()->route('admin.pages.list');
    }

    public function save()
    {
        $this->page->save();

        $gallery = Gallery::findByModelTypeAndTempId(Page::class, $this->temp_id);

        foreach ($gallery as $img){
            $img->temp_id = null;
            $img->model_id = $this->page->id;
            $img->save();
        }

        $this->emitTo(Content::class, 'saveTranslate', $this->page->id);
    }

    public function mount( ?int $id = null )
    {
        $this->isEditMode = $id != null;
        $this->page = $this->isEditMode ? Page::findByLanguageCodeAndId($id) : new Page();
        $this->temp_id = uniqid();
    }

    public function render()
    {
        return view( 'livewire.admin.pages.page-edit' )->layout('components.layouts.admin.authorized');
    }
}
