<?php

namespace App\View\Components\Components\Tree;

use App\Models\Catalog;
use Illuminate\View\Component;

class ParentElement extends Component
{
    public ?Catalog $catalog = null;

    public bool $hasChild = false;

    public ?int  $idActiveCategory = null;

    public function __construct(Catalog $cat, ?int $isActive = null)
    {
        $this->catalog = $cat;
        $this->idActiveCategory = $isActive;
        if(method_exists(get_class($this->catalog->getModel()), 'hasChildren')) $this->hasChild = $this->catalog->hasChildren() ? true : false;
    }

    public function render()
    {
        return view('components.components.tree.parent-element');
    }
}
