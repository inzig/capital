<?php

namespace App\Repositories\Admin;

use App\Models\Discount;
use InfyOm\Generator\Common\BaseRepository;

class DiscountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'field'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Discount::class;
    }
}
