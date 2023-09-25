<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public function issues()
    {
        return $this->belongsToMany(Issue::class);
    }
    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle')->withDefault();
    }
}
