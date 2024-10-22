<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntryProductWarehouse extends Model
{
    protected $fillable = [
        'work_id',
        'product_id',
        'quantity_entered',
        'date_of_admission',
        'product_id'
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
