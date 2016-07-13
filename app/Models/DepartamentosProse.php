<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="DepartamentosProse",
 *      required={Departamento, descripcionProse},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Departamento",
 *          description="Departamento",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="descripcionProse",
 *          description="descripcionProse",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Habilitado",
 *          description="Habilitado",
 *          type="boolean"
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
class DepartamentosProse extends Model
{
    use SoftDeletes;

    public $table = 'departamentos_proses';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'Departamento',
        'descripcionProse',
        'Habilitado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Departamento' => 'string',
        'descripcionProse' => 'string',
        'Habilitado' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_departamento'
    ];
}
