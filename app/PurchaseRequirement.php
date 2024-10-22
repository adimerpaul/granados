<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PurchaseRequirement extends Model
{
    use Notifiable;

    protected $fillable = [
        'requirement_id', 
        'required_product_id',
        'quantity', 
        'cost_price', 
        'amount' , 
        'status', 
        'quantity_entered_into_the_warehouse',
        'quantity_entered_into_the_inventory', 
        'observation',
        'purchase_order_id'
    ];


    public function requiredProduct()
    {
        return $this->belongsTo(RequiredProduct::class);
    }

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

}
