<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Cart;

class CategoryComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $pagesize;
    public $category_slug;

    public function mount($category_slug) {
        $this->sorting = 'default';
        $this->pagesize = 8;
        $this->category_slug = $category_slug;
    }

    public function store($product_id, $product_name, $product_price) {
        Cart::add($product_id, $product_name, 1, $product_price)
            ->associate('App\Models\Product');
        session()->flash('success_message', 'Товар успішно доданий до кошика');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        // 1 - Target Category:
        $category = Category::where('slug', $this->category_slug)->first();
        $category_name = $category->name;
        $category_id = $category->id;
        
        // 2 - Filter && Sort Config:
        if ($this->sorting == 'date') {
            $products = Product::where('category_id', $category_id)->orderBy('created_at', 'DESC')->paginate($this->pagesize);    
        } else if ($this->sorting == 'price') {
            $products = Product::where('category_id', $category_id)->orderBy('regular_price', 'ASC')->paginate($this->pagesize);    
        } else if ($this->sorting == 'price-desc') {
            $products = Product::where('category_id', $category_id)->orderBy('regular_price', 'DESC')->paginate($this->pagesize);    
        } else {
            $products = Product::where('category_id', $category_id)->paginate($this->pagesize);
        }

        // 3 - All categories:
        $categories = Category::all();
        
        // ->
        return view('livewire.category-component', [
            'products' => $products,
            'categories' => $categories,
            'category_name' => $category_name
        ])->layout('layouts.base');
    }
}
