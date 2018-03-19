<?php

namespace App\Repositories\Admin;

use App\Models\DatedContent;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DatedContentRepository
 * @package App\Repositories\Admin
 * @version November 12, 2017, 12:42 am UTC
 *
 * @method DatedContent findWithoutFail($id, $columns = ['*'])
 * @method DatedContent find($id, $columns = ['*'])
 * @method DatedContent first($columns = ['*'])
*/
class DatedContentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'dated_on'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DatedContent::class;
    }
}
