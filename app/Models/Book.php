<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Book extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_id', 'name', 'author', 'description', 'price', 'class_id', 'section_id'
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

    public function sections()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }
    public function sec()
    {
        return $this->sections()->select('id', 'name');
    }
}
