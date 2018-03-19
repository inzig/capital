<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dimsav\Translatable\Translatable;

/**
 * Class Team
 * @package App\Models\Admin
 * @version November 12, 2017, 12:46 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection posts
 * @property \Illuminate\Database\Eloquent\Collection TeamTranslation
 * @property string type
 * @property string image
 * @property string facebook
 * @property string twitter
 * @property string linkedin
 * @property integer weight
 */
class Team extends Model
{
    use SoftDeletes, Translatable;

    public $table = 'team';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'type',
        'image',
        'facebook',
        'twitter',
        'linkedin',
        'weight',
        'base_extra',
    ];

    public $translatedAttributes = [
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
        'type' => 'string',
        'image' => 'string',
        'facebook' => 'string',
        'twitter' => 'string',
        'linkedin' => 'string',
        'weight' => 'integer',
        'base_extra' => 'json',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'weight' => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function teamTranslations()
    {
        return $this->hasMany(\App\Models\TeamTranslation::class);
    }
}
