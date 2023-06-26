<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'phone',
        'tempat_lahir',
        'tanggal_lahir',
        'image'
    ];

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
    ];

     public static function getGuard(){

        if(isset(Auth::guard('web')->user()->id)){
            return 'web';
        }else if(isset(Auth::guard('admin')->user()->id)){
            return 'admin';
        }
    }

    public function ojt()
    {
        return $this->hasOne('App\Models\Ojt', 'user_id');
    }

    public function laporan(){
        return $this->hasOne('App\Models\Laporan', 'id_user');
    }
}
