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
        'body_type_id',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function brand()
    {
        return $this->belongsTo(CarBrand::class);
    }
    public function model()
    {
        return $this->belongsTo(CarModel::class);
    }

   
    public function carBodyType()
    {
        return $this->belongsTo(CarBodyType::class, 'body_type_id');
    }

    public function fuelTypes()
{
    return $this->belongsToMany(FuelType::class, 'vehicle_fuel_type', 'vehicle_id', 'fuel_type_id');
}

public function myear()
{
    return $this->belongsTo(Year::class, 'manufacture_year');
}
public function ryear()
{
    return $this->belongsTo(Year::class, 'register_year');
}

}
