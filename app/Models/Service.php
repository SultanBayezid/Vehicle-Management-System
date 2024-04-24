<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function issues()
    {
        return $this->belongsToMany(Issue::class);
    }
    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle')->withDefault();
    }
}
