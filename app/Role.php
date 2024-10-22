<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use Notifiable;

    protected $fillable = [
        'name'
    ];

    /* One to One (Role -> User) */

    public function user(){
        return $this->hasOne(User::class);
    }
}
