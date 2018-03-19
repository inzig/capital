<?php

namespace App\Repositories\Admin;

use App\Models\Transaction;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories\Admin
 * @version November 12, 2017, 1:09 am UTC
 *
 * @method User findWithoutFail($id, $columns = ['*'])
 * @method User find($id, $columns = ['*'])
 * @method User first($columns = ['*'])
*/
class TransactionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'dated',
        'amount',
        'discount',
        'estimated_tokens',
        'actual_tokens',
        'currency',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Transaction::class;
    }
}
