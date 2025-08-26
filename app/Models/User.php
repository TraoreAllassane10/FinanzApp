<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public const USER_ROLE = "user";
    public const ADMIN_ROLE = "admin";
    
    protected $fillable = [
        'first_name',
        'last_name',
        'role',
        'image',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    public function getImageUrl() {
        return Storage::url($this->image);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, "user_id", "id");
    }

    public function activeSubscription()
    {
        return $this->subscriptions()->where("status", Subscription::STATUS_ACTIF)->first();
    }
}
