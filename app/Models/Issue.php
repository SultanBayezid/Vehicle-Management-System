<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver')->withDefault();
    }
    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle')->withDefault();
    }
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    
}
