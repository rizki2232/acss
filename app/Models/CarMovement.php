<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMovement extends Model
{
    /** @use HasFactory<\Database\Factories\CarMovementFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
