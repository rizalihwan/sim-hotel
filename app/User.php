<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, Uuid;

    protected $primaryKey = "id";
    protected $keyType = 'string';
    public $incrementing = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password', 'avatar'
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

    public function getImgProfileAttribute()
    {
        return "/storage/".$this->avatar;
    }

    public function getRoleSectionAttribute()
    {
        if($this->hasRole('admin'))
        {
            return '<span class="badge badge-danger">ADMIN<span>';
        } else if($this->hasRole('customer'))
        {
            return '<span class="badge badge-info">CUSTOMER<span>';
        } else if($this->hasRole('boss'))
        {
            return '<span class="badge badge-success">BOSS<span>';
        } else {
            return '<span class="badge badge-light">Not Have Role<span>';
        }
    }
}
