<?php

namespace App\View\Components\Components\Tree;

use App\Models\Catalog;
use Illuminate\View\Component;

class ChildElement extends Component
{
    public ?Catalog $item = null;

    public ?int  $isActiveCategory = null;

    public function __construct(Catalog $itm, ?int $active = null)
    {
        $this->item = $itm;
        $this->isActiveCategory = $active;


    }

    public function render()
    {
        return view('components.components.tree.child-element');
    }
}
