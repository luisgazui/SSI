<?php

namespace App\Repositories;

use App\Models\AreasFisicas;
use InfyOm\Generator\Common\BaseRepository;

class AreasFisicasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'Area',
        'Enabled'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AreasFisicas::class;
    }
}
