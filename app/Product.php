<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    protected $fillable = [
        'code', 'name', 'category_id', 'measure_id',
    ];


    /* Many to One (Product -> Category) */

    public function category(){
        return $this->belongsTo(Category::class);
    }

    /* Many to One (Measure -> Product) */

    public function measure(){
        return $this->belongsTo(Measure::class);
    }

    /* One to One (Product -> Inventory) */

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    /* One to One (Product -> RequiredProduct)*/

    public function requiredProduct(){
        return $this->hasOne(RequiredProduct::class);
    }

    /* Many to Many (Product -> Inventory) */

    public function inventories(){
        return $this->belongsToMany(Inventory::class, 'inventory_product')
                    ->using(InventoryProduct::class)
                    ->withPivot('stock');
    }

}
