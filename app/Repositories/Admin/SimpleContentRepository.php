<?php

namespace App\Repositories\Admin;

use App\Models\SimpleContent;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SimpleContentRepository
 * @package App\Repositories\Admin
 * @version November 12, 2017, 12:44 am UTC
 *
 * @method SimpleContent findWithoutFail($id, $columns = ['*'])
 * @method SimpleContent find($id, $columns = ['*'])
 * @method SimpleContent first($columns = ['*'])
*/
class SimpleContentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SimpleContent::class;
    }
}
