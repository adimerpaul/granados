<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\Pivot;

class InventoryProduct extends Pivot
{
    use Notifiable;

    protected $table = 'inventory_product';

    protected $fillable = [
        'inventory_id', 'product_id', 'stock'
    ];

    /* PIVOT to Product */

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /* PIVOT to Inventory */

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
