<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function openingDate(){
		$date_format = get_date_format();
        return \Carbon\Carbon::parse($this->opening_date)->format("$date_format");
    }
}


