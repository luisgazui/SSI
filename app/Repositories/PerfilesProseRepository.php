<?php

namespace App\Repositories;

use App\Models\PerfilesProse;
use InfyOm\Generator\Common\BaseRepository;

class PerfilesProseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_Usuario',
        'Nombre',
        'Perfil prose actual',
        'Participa en prose',
        'A partir de',
        'idPerfil'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PerfilesProse::class;
    }
}
