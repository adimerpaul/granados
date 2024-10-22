<?php

namespace App\Http\Livewire;

use App\Product;
use App\Inventory;
use Livewire\Component;
use App\InventoryProduct;
use Illuminate\Support\Facades\Auth;
use Whoops\Run;

class SearchProductWorksRequirement extends Component
{

    public $search = '';
    public $searchResults;
    

    public function render()
    {

        $this->searchResults = $this->searchResults = InventoryProduct::join('products', 'inventory_product.product_id', '=', 'products.id')
                                                                        ->where('products.name', 'like', '%' . $this->search . '%')
                                                                        ->whereHas('inventory', function ($query) {
                                                                            $query->where('work_id', Auth::user()->work_id);
                                                                        })
                                                                        ->orderBy('products.name')
                                                                        ->get();

        return view('livewire.search-product-works-requirement');
    }

}
