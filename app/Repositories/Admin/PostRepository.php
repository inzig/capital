<?php

namespace App\Repositories\Admin;

use App\Models\Post;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PostRepository
 * @package App\Repositories\Admin
 * @version November 12, 2017, 12:48 am UTC
 *
 * @method Post findWithoutFail($id, $columns = ['*'])
 * @method Post find($id, $columns = ['*'])
 * @method Post first($columns = ['*'])
*/
class PostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category_id',
        'author_id',
        'slug',
        'status',
        'weight'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Post::class;
    }
}
