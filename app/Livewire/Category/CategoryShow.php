<?php

namespace App\Livewire\Category;

use App\Models\categorias;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Ver categoria')]
class CategoryShow extends Component
{
    public categorias $category;
    public function render()
    {
        return view('livewire.category.category-show');
    }
}
