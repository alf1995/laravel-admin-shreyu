<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'last_name', 
        'email', 
        'phone' , 
        'image',
        'password',  
        'is_actived',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 
     * Scope
     * 
     */
    public function scopeSearch($query, $value)
    {
        if(!empty($name)){
            return $query->where('name','LIKE',"%$value%")->orWhere('email', 'LIKE', "%$value%");
        }
    }

    /**
     * 
     *
     * 
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }

    /**
     * 
     *
     * 
     */
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

}
