<?php

namespace App\Repositories;

use App\Models\Metas;
use InfyOm\Generator\Common\BaseRepository;

class MetasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idUsuario',
        'Usuario',
        'Inspecciones',
        'Observaciones',
        'Reuniones',
        'Charlas',
        'Interacciones',
        'Empresa',
        'Departamento'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Metas::class;
    }
}
