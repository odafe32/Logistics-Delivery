<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'job_title',
        'account_type',
        'company_name',
        'industry',
        'role',
        'profile_image',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Get full name attribute
    public function getNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    // Check if user is admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Check if user is regular user
    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    // Check if user has business account
    public function isBusinessAccount(): bool
    {
        return $this->account_type === 'business';
    }

    public function supportMessages()
    {
        return $this->hasMany(SupportMessage::class);
    }
}
