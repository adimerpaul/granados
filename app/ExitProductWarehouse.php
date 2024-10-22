<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExitProductWarehouse extends Model
{
    protected $fillable = [
        'work_id',
        'product_id',
        'quantity_removed_from_inventory', 
        'departure_date'
    ];


    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
