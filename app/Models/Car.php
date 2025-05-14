<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }
    public function carMovements()
    {
        return $this->hasMany(\App\Models\CarMovement::class, 'car_id');
    }


    public function movements()
    {
        return $this->hasMany(CarMovement::class);
    }


}
