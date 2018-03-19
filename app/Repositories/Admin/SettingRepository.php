<?php

namespace App\Repositories\Admin;

use App\Models\Setting;
use InfyOm\Generator\Common\BaseRepository;

class SettingRepository extends BaseRepository
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
        return Setting::class;
    }
}
