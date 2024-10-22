<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DispatchRequirement extends Model
{
    use Notifiable;

    protected $fillable = [
        'requirement_id','required_product_id', 'work_id', 'quantity', 'status'
    ];


    public function requiredProduct()
    {
        return $this->belongsTo(RequiredProduct::class);
    }

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

}
