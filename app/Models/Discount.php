<?php

namespace App\Models;

use Eloquent as Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use SoftDeletes;

    public $table = 'discounts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at', 'start_date', 'end_date'];

    public $fillable = [
        'title',
        'start_date',
        'end_date',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'start_date' => 'date_format:Y-m-d',
        'end_date' => 'date_format:Y-m-d'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function discount_rates()
    {
        return $this->hasMany(\App\Models\DiscountRate::class);
    }
}
