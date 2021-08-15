<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\Models\Media;
//use Laratrust\Traits\LaratrustUserTrait;

class Professor extends Model implements HasMedia
{
    //use LaratrustUserTrait;
    use Notifiable;
    use HasRoles;
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'designation', 'phone', 'address', 'gender', 'birthday', 'email', 'password', 'photo', 'bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt($password);
    }
}
