<?php

namespace App\Models;

use Eloquent as Model;

class CategoryTranslation extends Model
{
    public $table = 'category_translations';

    public $timestamps = false;

    public $fillable = [
        'title',
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
