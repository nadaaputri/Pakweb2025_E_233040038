<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    //Kolom yang boleh diisi secara mass assignment
    protected $fillable = [
        'name',          //Nama lengkap user
        'username',      //Username unik untuk login
        'email',         //email unik untuk login
        'password',      //password yang akan di-hash otomatis
    ];

    
    //Kolom yang disembunyikan saat serialisasi (response JSON/Array)
    protected $hidden = [
        'password',         //Jangan tampilkan password di response
        'remember_token',   //Jangan tampilkan token di response
    ];

    //Tipe data casting untuk kolom tertentu
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',  //Cast ke object DateTime
            'password' => 'hashed',             //Otomatis hash password saat insert/update
        ];
    }

    //Relasi: Satu user memiliki banyak post (One-to-Many)
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
