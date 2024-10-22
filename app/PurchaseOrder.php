<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'code', 
        'requirement_id',
        'status',
        'user_id'
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }

    public function purchaseRequirements()
    {
        return $this->hasMany(PurchaseRequirement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
