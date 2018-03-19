<?php

namespace App\Models;

use Eloquent as Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dimsav\Translatable\Translatable;

/**
 * Class Post
 * @package App\Models\Admin
 * @version November 12, 2017, 12:48 am UTC
 *
 * @property \App\Models\User user
 * @property \App\Models\Category category
 * @property \Illuminate\Database\Eloquent\Collection PostTranslation
 * @property integer category_id
 * @property integer author_id
 * @property string slug
 * @property boolean status
 * @property integer weight
 */
class Post extends Model
{
    use SoftDeletes, Translatable;

    public $table = 'posts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at', 'published_at'];

    public $fillable = [
        'category_id',
        'author_id',
        'slug',
        'status',
        'weight',
        'published_at',
        'base_extra',
    ];

    public $translatedAttributes = [
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
        'category_id' => 'integer',
        'author_id' => 'integer',
        'slug' => 'string',
        'status' => 'boolean',
        'weight' => 'integer',
        'published_at' => 'date',
        'base_extra' => 'json',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'published_at' => 'date_format:Y-m-d'
    ];

    /**
     * Get the published_at date only.
     *
     * @param string $value
     * @return string
     */
    public function getPublishedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->toDateString();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

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
    public function postTranslations()
    {
        return $this->hasMany(\App\Models\PostTranslation::class);
    }
}
