<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="PerfilesProse",
 *      required={Nombre, Perfil prose actual, Participa en prose, idPerfil},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Nombre",
 *          description="Nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Perfil prose actual",
 *          description="Perfil prose actual",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Participa en prose",
 *          description="Participa en prose",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="A partir de",
 *          description="A partir de",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="idPerfil",
 *          description="idPerfil",
 *          type="integer",
 *          format="int32"
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
class PerfilesProse extends Model
{
    use SoftDeletes;

    public $table = 'perfiles_proses';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'ID_Usuario',
        'Nombre',
        'Perfil prose actual',
        'Participa en prose',
        'A partir de',
        'idPerfil'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Nombre' => 'string',
        'Perfil prose actual' => 'string',
        'Participa en prose' => 'string',
        'A partir de' => 'date',
        'idPerfil' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Nombre'              => 'required',
        'Perfil prose actual' => 'required',
        'Participa en prose'  => 'required',
        'A partir de'         => 'required',
        'idPerfil'            => 'required'
    ];
}
