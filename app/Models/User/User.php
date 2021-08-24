<?php

namespace App\Models\User;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'token',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
        'email_verified_at'
    ];

    public function token()
    {
        return $this->token;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function authorized($permission)
    {
        return $this->role->permissions()->where('permission_id', $permission)->exists() ? true : false;
    }
}
