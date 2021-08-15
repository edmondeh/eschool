<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
//use Laratrust\Traits\LaratrustUserTrait;

class Student_Parent extends Model
{
    //use LaratrustUserTrait;
    use Notifiable;
    use HasRoles;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_parents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'address', 'phone', 'birthday', 'gender', 'profession', 'email', 'password', 'photo', 'profile'
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
