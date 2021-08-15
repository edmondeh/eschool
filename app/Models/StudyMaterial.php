<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class StudyMaterial extends Model implements HasMedia
{
	use SoftDeletes;
    use HasMediaTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'studymaterials';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject_id', 'name', 'teacher_id', 'info'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


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
