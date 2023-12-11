<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, CanResetPassword, Notifiable;

    // Nama tabel yang akan diakses oleh model
    protected $primaryKey = 'id';
    protected $table = 'users';

    // Kolom-kolom yang dapat diisi (fillable)
    protected $fillable = [
        'name', 'email', 'password', 'warna', 'last_login'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function valins()
    {
        return $this->hasMany(Valin::class);
    }
}
