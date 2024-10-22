<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\InventoryProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ShowInventoryForManagement extends Component
{
    public $searchProductInventoryManagement = '';
    public $inventoryResultManagement;
    public $workId = 0;

    protected $listeners = ['updateWorkId' => 'updateWorkId'];

    public function render()
    {
        $this->inventoryResultManagement = InventoryProduct::whereHas('product', function ($query) {
                                                                $query->where('name', 'like', '%' . $this->searchProductInventoryManagement . '%');
                                                            })
                                                            ->whereHas('inventory', function ($query) {
                                                                $query->where('work_id', $this->workId);
                                                            })
                                                            ->join('products', 'inventory_product.product_id', '=', 'products.id')
                                                            ->orderBy('products.name') // Ordena por el nombre del producto
                                                            ->get();
        return view('livewire.show-inventory-for-management');
    }

    public function updateWorkId($workId)
    {
        $this->workId = $workId;
    }
}
