<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternalRequiredProduct extends Model
{
    protected $fillable = [
        'internal_requirement_id', 'product_id', 'quantity', 'status'
    ];

    public function internalRequirement()
    {
        return $this->belongsTo(InternalRequirement::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
