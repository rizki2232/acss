<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    /** @use HasFactory<\Database\Factories\OwnerFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function carOwners()
    {
        return $this->hasMany(CarOwner::class);
    }
}
