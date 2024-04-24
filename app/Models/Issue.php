<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use HasFactory;
    use SoftDeletes;

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
