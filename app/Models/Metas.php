<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Metas",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Usuario",
 *          description="Usuario",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Inspecciones",
 *          description="Inspecciones",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Observaciones",
 *          description="Observaciones",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Reuniones",
 *          description="Reuniones",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Charlas",
 *          description="Charlas",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Interacciones",
 *          description="Interacciones",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Empresa",
 *          description="Empresa",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Departamento",
 *          description="Departamento",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Metas extends Model
{
    use SoftDeletes;

    public $table = 'metas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Usuario' => 'string',
        'Inspecciones' => 'string',
        'Observaciones' => 'string',
        'Reuniones' => 'string',
        'Charlas' => 'string',
        'Interacciones' => 'string',
        'Empresa' => 'string',
        'Departamento' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
