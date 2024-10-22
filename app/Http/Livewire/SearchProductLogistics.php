<?php

namespace App\Http\Livewire;

use App\Inventory;
use App\InventoryProduct;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SearchProductLogistics extends Component
{
    public $searchLogistics = null;
    public $searchResultsLogistics;
    public $requirement;

    public function mount($requirement){

        $this->requirement = $requirement;

    }
    
    public function render()
    {
        if ($this->searchLogistics != null) {

            $this->searchResultsLogistics = InventoryProduct::whereHas('product', function ($query) {
                                                                    $query->where('name', 'like', '%' . $this->searchLogistics . '%');
                                                                })
                                                                ->whereNotIn('inventory_id', function ($query) {
                                                                    $query->select('id')
                                                                        ->from('inventories')
                                                                        ->where('work_id', $this->requirement->work->id);
                                                                })
                                                                ->get();
        }
      
        return view('livewire.search-product-logistics');
    }

}
