<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    use HasFactory;
    use SoftDeletes;

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
