<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Inventory extends Model
{
    use Notifiable;

    protected $fillable = [
        'work_id', 'product_id', 'stock'
    ];

    /* Many to One (Inventory -> Work) */

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    /* One to One (Inventory -> Product) */

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /* Many to Many (Inventory -> Product) */

    public function products(){
        return $this->belongsToMany(Product::class, 'inventory_product')
                    ->using(InventoryProduct::class)
                    ->withPivot('stock');
    }
}
