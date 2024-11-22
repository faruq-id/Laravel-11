<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Storage;

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
        'username',
        'phone_number',
        'email',
        //'password',
        'is_admin',
        'profile_picture',
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
     *
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

    /**
     * Digunakan untuk mengambil data profile_picture dari storage. di view tinggal manggil $user->profile_picture
     *
     * @return string
     */
    public function getProfilePictureAttribute(): string
    {
        return $this->profile_picture && Storage::has($this->profile_picture) ? Storage::url($this->profile_picture) : Storage::url('/users/no-image.png');
    }
}
