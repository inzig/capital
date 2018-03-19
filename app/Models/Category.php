<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dimsav\Translatable\Translatable;

/**
 * Class Category
 * @package App\Models\Admin
 * @version November 12, 2017, 12:47 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection CategoryTranslation
 * @property \Illuminate\Database\Eloquent\Collection Post
 * @property string slug
 */
class Category extends Model
{
    use SoftDeletes, Translatable;

    public $table = 'categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'slug',
        'type',
        'base_extra',
    ];

    public $translatedAttributes = [
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
        'slug' => 'string',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function categoryTranslations()
    {
        return $this->hasMany(\App\Models\CategoryTranslation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function posts()
    {
        return $this->hasMany(\App\Models\Post::class);
    }
}
