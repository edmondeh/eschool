<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classe extends Model
{
	use SoftDeletes;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_id', 'name', 'numeric', 'dep_id', 'teacher_id', 'info'
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

    public function teacher()
    {
        return $this->belongsTo('App\Models\Professor', 'teacher_id');
    }
    public function teach()
    {
        return $this->teacher()->select('id', 'first_name', 'last_name');
    }
}
