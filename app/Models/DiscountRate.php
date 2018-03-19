<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountRate extends Model
{
    use SoftDeletes;

    public $table = 'discount_rates';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'discount_id',
        'currency',
        'min_amount',
        'max_amount',
        'rate',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'discount_id' => 'integer',
        'currency' => 'string',
        'min_amount' => 'float',
        'max_amount' => 'float',
        'rate' => 'float',
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
    public function discount()
    {
        return $this->belongsTo(\App\Models\Discount::class);
    }
}
