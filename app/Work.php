<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Work extends Model
{
    use Notifiable;

    protected $fillable = [
        'entity', 'name', 'work_cost', 'contractual_term', 'work_executor'
    ];

    /* One to Many (Work -> User) */

    public function users()
    {
        return $this->hasMany(User::class);
    }

    /* One to Many (Work -> Inventory) */

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    /* One to Many (Work -> Requirement) */
    
    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function internalRequirements()
    {
        return $this->hasMany(InternalRequirement::class);
    }

    public function entryProductsWarehouse()
    {
        return $this->hasMany(EntryProductWarehouse::class);
    }

    public function exitProductsWarehouses()
    {
        return $this->hasMany(ExitProductWarehouse::class);
    }

}
