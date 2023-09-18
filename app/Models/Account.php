<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    
    public function openingDate(){
		$date_format = get_date_format();
        return \Carbon\Carbon::parse($this->opening_date)->format("$date_format");
    }
}
