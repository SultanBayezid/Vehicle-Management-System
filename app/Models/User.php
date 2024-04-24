<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
	protected $fillable = [
        'name', 'email', 'password', 'user_type', 'status', 'profile_picture',
    ];
    
    public function client(){
		return $this->hasMany('App\Models\Contact','user_id');
	}
	

    public function role(){
        return $this->belongsTo('App\Models\Role','role_id')->withDefault();
    }
	


  

	


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function validUntil()
    {
		$date_format = get_date_format();
        return \Carbon\Carbon::parse($this->valid_to)->format("$date_format");
    }
}
