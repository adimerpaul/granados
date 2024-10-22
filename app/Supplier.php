<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Supplier extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'phone', 'ubication', 'ruc'
    ];

}
