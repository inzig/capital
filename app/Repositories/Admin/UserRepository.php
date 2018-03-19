<?php

namespace App\Repositories\Admin;

use App\Models\User;
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
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'avatar',
        'status',
        'remember_token'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
