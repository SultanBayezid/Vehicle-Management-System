<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'license_number',
        'license_expiry_date',
        'address',
        'city',
        'state',
        'postal_code',
        'phone_number',
        'email',
        'date_of_birth',
        'nationality',
        'emergency_contact',
        'emergency_phone',
        'blood_group',
        'nid',
        'passport',
        'photo',
        // Add any other fields here
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

}
