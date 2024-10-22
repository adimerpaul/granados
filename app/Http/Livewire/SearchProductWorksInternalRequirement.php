<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\InventoryProduct;
use Illuminate\Support\Facades\Auth;

class SearchProductWorksInternalRequirement extends Component
{
    public $searchInternalProduct = '';
    public $searchResultsInternalProduct;
    

    public function render()
    {

        $this->searchResultsInternalProduct = InventoryProduct::whereHas('product', function ($query) {
                                                                    $query->where('name', 'like', '%' . $this->searchInternalProduct . '%');
                                                                })
                                                                ->whereHas('inventory', function ($query) {
                                                                    $query->where('work_id', Auth::user()->work_id);
                                                                })
                                                                ->join('products', 'inventory_product.product_id', '=', 'products.id')
                                                                ->orderBy('products.name')
                                                                ->get();

        return view('livewire.search-product-works-internal-requirement');
    }
}
