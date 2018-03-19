<?php

namespace App\Repositories\Admin;

use App\Models\Payment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaymentRepository
 * @package App\Repositories\Admin
 * @version November 12, 2017, 12:48 am UTC
 *
 * @method Payment findWithoutFail($id, $columns = ['*'])
 * @method Payment find($id, $columns = ['*'])
 * @method Payment first($columns = ['*'])
*/
class PaymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'transaction_id',
        'amount',
        'meta',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Payment::class;
    }
}
