<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'make',
        'model',
        'model',
        'year',
        'vin',
        'color',
        'mileage',
        'license_plate',
        'engine_number',
        'chassis_number',
        'seating_capacity',
        'weight',
        'horsepower',
        'purchase_date',
        'purchase_price',
        'last_service_date',
        'odometer_reading',
    ];
}
