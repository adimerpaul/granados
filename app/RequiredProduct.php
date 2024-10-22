<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RequiredProduct extends Model
{
    use Notifiable;

    protected $fillable = [
        'requirement_id','product_id', 'observation', 'status','quantity'
    ];

    /* One to One (RequiredProduct -> Requirement) */

    public function requirement(){
        return $this->belongsTo(Requirement::class);
    }

    /* One to One (RequiredProduct -> Product*/

    public function product(){
        return $this->belongsTo(Product::class);
    }

    /* One to One (RequiredProduct -> Measure) */

    public function measure(){
        return $this->hasOne(Measure::class);
    }
}
