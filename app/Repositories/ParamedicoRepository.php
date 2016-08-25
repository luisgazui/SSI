<?php

namespace App\Repositories;

use App\Models\Paramedico;
use InfyOm\Generator\Common\BaseRepository;

class ParamedicoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'IdReporte',
        'Fecha',
        'Turno',
        'Incidentado',
        'Descripci¢n',
        'Categoria',
        'Severidad'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Paramedico::class;
    }
}
