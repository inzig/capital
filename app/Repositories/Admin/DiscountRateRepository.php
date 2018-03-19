<?php

namespace App\Repositories\Admin;

use App\Models\DiscountRate;
use InfyOm\Generator\Common\BaseRepository;

class DiscountRateRepository extends BaseRepository
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
        return DiscountRate::class;
    }
}
