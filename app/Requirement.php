<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Requirement extends Model
{
    use Notifiable;

    protected $fillable = [
        'code', 
        'type', 
        'user_id', 
        'work_id', 
        'status',
        'area'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requiredProducts()
    {
        return $this->hasOne(RequiredProduct::class);
    }

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
    
    public function purchaseRequirements()
    {
        return $this->hasMany(PurchaseRequirement::class);
    }

    public function dispatchRequirements()
    {
        return $this->hasMany(DispatchRequirement::class);
    }

    public function purchaseOrder()
    {
        return $this->hasOne(PurchaseOrder::class);
    }
}
