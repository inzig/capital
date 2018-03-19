<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Transaction extends Model
{
    use SoftDeletes;

    public $table = 'transactions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at', 'dated'];

    public $fillable = [
        'user_id',
        'dated',
        'amount',
        'discount',
        'estimated_tokens',
        'actual_tokens',
        'currency',
        'destination_address',
        'source_address',
        'transaction_id'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'dated' => 'date',
        'amount' => 'float',
        'discount' => 'float',
        'estimated_tokens' => 'float',
        'actual_tokens' => 'float',
        'currency' => 'string',
        'destination_address' => 'string',
        'source_address' => 'string',
        'transaction_id' => 'string',
        'is_approved' => 'boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
