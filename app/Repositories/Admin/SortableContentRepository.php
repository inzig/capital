<?php

namespace App\Repositories\Admin;

use App\Models\SortableContent;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SortableContentRepository
 * @package App\Repositories\Admin
 * @version November 12, 2017, 12:44 am UTC
 *
 * @method SortableContent findWithoutFail($id, $columns = ['*'])
 * @method SortableContent find($id, $columns = ['*'])
 * @method SortableContent first($columns = ['*'])
*/
class SortableContentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'weight'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SortableContent::class;
    }
}
