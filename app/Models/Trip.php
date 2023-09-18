<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function customer()
    {
        return $this->belongsTo(Contact::class);
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
