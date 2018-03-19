<?php

namespace App\Repositories\Admin;

use App\Models\Category;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CategoryRepository
 * @package App\Repositories\Admin
 * @version November 12, 2017, 12:47 am UTC
 *
 * @method Category findWithoutFail($id, $columns = ['*'])
 * @method Category find($id, $columns = ['*'])
 * @method Category first($columns = ['*'])
*/
class CategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Category::class;
    }
}
