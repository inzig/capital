<?php

namespace App\Models;

use Eloquent as Model;

class PostTranslation extends Model
{
    public $table = 'post_translations';

    public $timestamps = false;

    public $fillable = [
        'title',
        'body',
        'excerpt',
        'image',
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
        'body' => 'string',
        'excerpt' => 'string',
        'image' => 'string',
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
