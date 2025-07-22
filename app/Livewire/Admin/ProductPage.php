<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class ProductPage extends Component
{
    public $size;
    public $stock;

    public function save()
    {
        $this->validate([
            'size' => 'required|string',
            'stock' => 'required|integer|min:1'
        ]);

        Product::create([
            'size' => $this->size,
            'stock' => $this->stock
        ]);

        session()->flash('success', 'Shirt size added!');
        $this->reset(['size', 'stock']);
    }

    public function render()
    {
        return view('livewire.admin.product-page', [
            'products' => Product::all()
        ])->layout('layouts.app');
    }
}
