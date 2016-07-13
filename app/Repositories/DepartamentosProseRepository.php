<?php

namespace App\Repositories;

use App\Models\DepartamentosProse;
use InfyOm\Generator\Common\BaseRepository;

class DepartamentosProseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'Departamento',
        'descripcionProse',
        'Habilitado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DepartamentosProse::class;
    }
}
