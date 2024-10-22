<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Measure extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'symbol'
    ];

    /* One to Many (Measure -> Product) */

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
