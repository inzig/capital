<?php

namespace App\Models;

use Eloquent as Model;

class DatedContentTranslation extends Model
{
    public $table = 'dated_content_translations';

    public $timestamps = false;

    public $fillable = [
        'title',
        'description',
        'image',
        'video',
        'extra',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'image' => 'string',
        'video' => 'string',
        'extra' => 'json',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
