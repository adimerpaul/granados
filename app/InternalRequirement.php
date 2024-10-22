<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternalRequirement extends Model
{
    protected $fillable = [
        'user_id', 'work_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function internalRequiredProducts()
    {
        return $this->hasMany(InternalRequiredProduct::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
