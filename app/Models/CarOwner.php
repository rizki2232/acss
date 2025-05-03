<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarOwner extends Model
{
    /** @use HasFactory<\Database\Factories\CarOwnerFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
