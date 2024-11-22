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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //proteksi yang boleh di insert (create) secara massal
    protected $fillable = [
        'name',
        'usename',
        'email',
        'profile_picture',
        'is_admin',
        'status',
        'last_login_at',
        'last_login_ip',
    ];

    //proteksi yang tidak boleh di insert secara massal
    protected $guarded =[
        'id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *Properti $hidden sangat penting untuk mencegah atribut tertentu tampil dalam output model, 
     *memberikan kontrol lebih besar atas privasi data, dan meningkatkan keamanan aplikasi.
     *kolom ini disembunyikan agar tidak dikirimkan ke pengguna lain atau terlihat dalam output API
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }
}
