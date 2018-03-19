<?php

namespace App\Repositories\Admin;

use App\Models\Team;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TeamRepository
 * @package App\Repositories\Admin
 * @version November 12, 2017, 12:46 am UTC
 *
 * @method Team findWithoutFail($id, $columns = ['*'])
 * @method Team find($id, $columns = ['*'])
 * @method Team first($columns = ['*'])
*/
class TeamRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'image',
        'facebook',
        'twitter',
        'linkedin',
        'weight'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Team::class;
    }
}
