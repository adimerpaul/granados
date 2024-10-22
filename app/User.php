<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Symfony\Contracts\Service\Attribute\Required;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'work_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* One to One (User -> Role) */

    public function role(){
        return $this->belongsTo(Role::class);
    }

    /* Many to One (User -> Work) */

    public function work(){
        return $this->belongsTo(Work::class);
    }

    /* One to Many (User -> Requirement) */

    public function requirements(){
        return $this->hasMany(Requirement::class);
    }

    public function internalRequirements()
    {
        return $this->hasMany(InternalRequirement::class);
    }

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);;
    }

}
