<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use SoftDeletes;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dep_id', 'class_id', 'section_id', 'subject_id', 'date', 'name', 'teacher_id', 'info'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function departaments()
    {
        return $this->belongsTo('App\Models\Departament', 'dep_id');
    }
    public function dep()
    {
        return $this->departaments()->select('id', 'name');
    }

    public function classes()
    {
        return $this->belongsTo('App\Models\Classe', 'class_id');
    }
    public function class()
    {
        return $this->classes()->select('id', 'name');
    }

    public function sections()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }
    public function sec()
    {
        return $this->sections()->select('id', 'name');
    }

    public function subjects()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id');
    }
    public function sub()
    {
        return $this->subjects()->select('id', 'name');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Professor', 'teacher_id');
    }
    public function teach()
    {
        return $this->teacher()->select('id', 'first_name', 'last_name');
    }
}
