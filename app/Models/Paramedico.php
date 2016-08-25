<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Paramedico",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="IdReporte",
 *          description="IdReporte",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Fecha",
 *          description="Fecha",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="Turno",
 *          description="Turno",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Incidentado",
 *          description="Incidentado",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Descripci¢n",
 *          description="Descripci¢n",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Categoria",
 *          description="Categoria",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Severidad",
 *          description="Severidad",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Empresa",
 *          description="Empresa",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Area",
 *          description="Area",
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
class Paramedico extends Model
{
    use SoftDeletes;

    public $table = 'paramedicos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'IdReporte',
        'Fecha',
        'Turno',
        'Incidentado',
        'Descripci¢n',
        'Categoria',
        'Severidad',
        'CAS',
        'Empresa',
        'Area'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'IdReporte' => 'integer',
        'Fecha' => 'date',
        'Turno' => 'string',
        'Incidentado' => 'string',
        'Descripci¢n' => 'string',
        'Categoria' => 'string',
        'Severidad' => 'string',
        'Empresa' => 'string',
        'Area' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
