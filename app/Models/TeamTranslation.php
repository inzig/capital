<?php

namespace App\Models;

use Eloquent as Model;

class TeamTranslation extends Model
{
    public $table = 'team_translations';

    public $timestamps = false;

    public $fillable = [
        'name',
        'designation',
        'description',
        'extra',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'designation' => 'string',
        'description' => 'string',
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
