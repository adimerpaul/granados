<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\InventoryProduct;
use App\Inventory as Inventories;
use Illuminate\Support\Facades\Auth;

class Inventory extends Component
{
    public $searchKardex = '';
    public $inventoryResult;

    public function render()
    {
        $this->inventoryResult = InventoryProduct::whereHas('product', function ($query) {
                                                        $query->where('name', 'like', '%' . $this->searchKardex . '%');
                                                    })
                                                    ->whereHas('inventory', function ($query) {
                                                        $query->where('work_id', Auth::user()->work_id);
                                                    })
                                                    ->join('products', 'inventory_product.product_id', '=', 'products.id')
                                                    ->orderBy('products.name') // Ordena por el nombre del producto
                                                    ->get();

        return view('livewire.inventory');
    }
}
