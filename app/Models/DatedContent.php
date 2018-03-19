<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Dimsav\Translatable\Translatable;

/**
 * Class DatedContent
 * @package App\Models\Admin
 * @version November 12, 2017, 12:42 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection DatedContentTranslation
 * @property \Illuminate\Database\Eloquent\Collection posts
 * @property string type
 * @property date dated_on
 */
class DatedContent extends Model
{
    use SoftDeletes, Translatable;

    public $table = 'dated_content';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at', 'dated_on'];

    public $fillable = [
        'category_id',
        'stage',
        'type',
        'dated_on',
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
        'dated_on' => 'date',
        'base_extra' => 'json',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dated_on' => 'required|date_format:Y-m-d'
    ];

    /**
     * Get the dated_on date only.
     *
     * @param string $value
     * @return string
     */
    public function getDatedOnAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->toDateString();
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
    public function datedContentTranslations()
    {
        return $this->hasMany(\App\Models\DatedContentTranslation::class);
    }
}
