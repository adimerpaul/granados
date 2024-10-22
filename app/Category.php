<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use Notifiable;

    protected $fillable = [
        'name'
    ];

    /* One to Many (Category -> Product) */

    public function products(){
        return $this->hasMany(Product::class);
    }
}
