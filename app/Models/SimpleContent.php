<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dimsav\Translatable\Translatable;

/**
 * Class SimpleContent
 * @package App\Models\Admin
 * @version November 12, 2017, 12:44 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection posts
 * @property \Illuminate\Database\Eloquent\Collection SimpleContentTranslation
 * @property string type
 */
class SimpleContent extends Model
{
    use SoftDeletes, Translatable;

    public $table = 'simple_content';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'category_id',
        'stage',
        'type',
        'base_extra',
    ];

    public $translatedAttributes = [
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
        'stage' => 'string',
        'type' => 'string',
        'base_extra' => 'json',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function simpleContentTranslations()
    {
        return $this->hasMany(\App\Models\SimpleContentTranslation::class);
    }
}
