<?php

namespace App\Repositories\Admin;

use App\Models\Wallet;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class WalletRepository
 * @package App\Repositories\Admin
 * @version November 12, 2017, 12:48 am UTC
 *
 * @method Wallet findWithoutFail($id, $columns = ['*'])
 * @method Wallet find($id, $columns = ['*'])
 * @method Wallet first($columns = ['*'])
*/
class WalletRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'type',
        'address',
        'is_active'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Wallet::class;
    }
}
