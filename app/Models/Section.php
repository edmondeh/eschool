<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
	use SoftDeletes;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_id', 'name', 'teacher_id', 'info'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function classes()
    {
        return $this->belongsTo('App\Models\Classe', 'class_id');
    }
    public function class()
    {
        return $this->classes()->select('id', 'name');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Professor', 'teacher_id');
    }
    public function teach()
    {
        return $this->teacher()->select('id', 'first_name', 'last_name');
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }
}
