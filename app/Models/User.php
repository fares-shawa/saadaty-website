<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    protected $casts = [
        'learning_methods' => 'array',
    ];

    // الفئة (براعم / أشبال)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // ولي الأمر -> أطفال
    public function children()
    {
        return $this->belongsToMany(User::class, 'child_parents', 'parent_id', 'child_id');
    }

    // الطفل -> أولياء الأمور
    public function parents()
    {
        return $this->belongsToMany(User::class, 'child_parents', 'child_id', 'parent_id');
    }

    // المجموعات اللي ينتمي لها الطفل
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_user');
    }

    // المجموعات اللي يشرف عليها (لو هو مشرف)
    public function supervisedGroups()
    {
        return $this->hasMany(Group::class, 'supervisor_id');
    }

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
}
