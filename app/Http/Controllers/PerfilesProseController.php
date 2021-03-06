<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePerfilesProseRequest;
use App\Http\Requests\UpdatePerfilesProseRequest;
use App\Repositories\PerfilesProseRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use Illuminate\Support\Collection as Collection;

class PerfilesProseController extends InfyOmBaseController
{
    /** @var  PerfilesProseRepository */
    private $perfilesProseRepository;

    public function __construct(PerfilesProseRepository $perfilesProseRepo)
    {
        $this->perfilesProseRepository = $perfilesProseRepo;
    }

    /**
     * Display a listing of the PerfilesProse.
     *
     * @param Request $request
     * @return Response
     */


    public function index(Request $request)
    {
        $input = $request->all();
        //dd($input);
        if (isset($input['Empresa'])) { $idEmpresa = $input['Empresa']; }
        else { $idEmpresa = ''; } 
        if (isset($input['Perfil'])) { $idPerfil = $input['Perfil']; }
        else { $idPerfil = ''; }  
        if (isset($input['Departamento'])) { $idDepartamento = $input['Departamento']; }
        else { $idDepartamento = ''; }  
        if (isset($input['Area'])) { $idArea = $input['Area']; }
        else { $idArea = ''; }  
        if (isset($input['Puesto'])) { $idPuesto = $input['Puesto']; }
        else { $idPuesto = ''; }             
        if (isset($input['Nombre'])) { $nombre = $input['Nombre']; }
        else { $nombre = ''; }            
            $idUsuario = '';    
            $esAdministrador = '';
            $esAdministradorProse = '';
            $idioma = '';            

        $perfilesProses = DB::select("EXEC [dbo].[sc_usuariosProse_Busca]
                                '".$idEmpresa."', 
                                '".$idDepartamento."', 
                                '".$idArea."', 
                                '".$idPuesto."',
                                '".$idPerfil."', 
                                '".$nombre."',
                                '".$idUsuario."',
                               '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'" );
         $array = json_decode(json_encode($perfilesProses), true);
         $perfile_new= array();
         $datos  = array();
         $cont = 0;
         foreach ($array as $value) {
              $cont = $cont + 1;

              $perfile_new["ID_Usuario"]  =  $value["ID_Usuario"];
              $perfile_new["Nombre"]      =  $value["Nombre"];
              $perfile_new["Perfil_ac"]   =  $value["Perfil prose actual"];
              $perfile_new["Participa_pr"]=  $value["Participa en prose"];
              $perfile_new["A_partir"]    =  $value["A partir de"];
              $perfile_new["idPerfil"]    =  $value["idPerfil"];
              $datos[$cont] = (object) $perfile_new;
        
         }
               

         $collection = Collect($datos);
         $unique = $collection->unique('ID_Usuario'); 
         $perfilesProses=$unique->values()->all();

        // llemar select list empresa
        $idUsuario = '';
        $esAdministrador = '';
        $esAdministradorProse = '';
        $idioma = '';

        $Empresa = DB::select("EXEC [dbo].[sc_usuariosProse_Empresa]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'");
        
        $collection = Collection::make($Empresa);
        
        $Empresa = $collection->lists('Descripcion','id_empresa');
        
        // llemar select list perfil
        $Perfiles = DB::select("EXEC [dbo].[sc_usuariosProse_Perfiles]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       // dd($Perfiles);
        $collection = Collection::make($Perfiles);
      
        $Perfil = $collection->lists('descripcion','id_prosePerfil');
        // llemar select list puesto

        $Puesto = DB::select("EXEC [dbo].[sc_usuariosProse_Puesto]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Puesto);
      
        $Puesto = $collection->lists('Descripcion','id_puesto');
        // llemar select list Departamento

        $Departamento = DB::select("EXEC [dbo].[sc_usuariosProse_Departamento]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Departamento);
      
        $Departamento = $collection->lists('Descripcion','id_departamento');
        
        // llemar select list Area
        $Area = DB::select("EXEC [dbo].[sc_usuariosProse_Area]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Area);
      
        $Area = $collection->lists('Descripcion','id_area');

        return view('perfilesProses.index', compact('Empresa','Perfil','Puesto', 'Departamento', 'Area'))
             ->with('perfilesProses', $perfilesProses);
        
    } 

    /**
     * Show the form for creating a new PerfilesProse.
     *
     * @return Response
     */
    public function create()
    {
        return view('perfilesProses.create');
    }

    /**
     * Store a newly created PerfilesProse in storage.
     *
     * @param CreatePerfilesProseRequest $request
     *
     * @return Response
     */
    public function store(CreatePerfilesProseRequest $request)
    {
         $input = $request->all();
         $date = strtotime($input['fecha']);

        $idusuario  = $input['ID_Usuario'];
        $perfil2    = $input['Perfil_ac'];
        $anno       = date("Y", $date);
        $mes        = date("m", $date);
        $dia        = date("d", $date);      
        
        $perfilesProses = DB::statement("EXEC [dbo].[sc_usuariosProse_Agregar]
                                1,
                                '".$idusuario."',
                                '".$perfil2."',
                                '".$anno."',
                                '".$mes."',
                                '".$dia."'");

        if ($perfilesProses) {
            Flash::success('Registro Guardado Corectamente.');
        }
        else {
            Flash::error('Revise Sus Datos');
        }

        return redirect(route('perfilesProses.index'));
    }

    /**
     * Display the specified PerfilesProse.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $perfilesProse = $this->perfilesProseRepository->findWithoutFail($id);

        if (empty($perfilesProse)) {
            Flash::error('PerfilesProse not found');

            return redirect(route('perfilesProses.index'));
        }

        return view('perfilesProses.show')->with('perfilesProse', $perfilesProse);
    }

    /**
     * Show the form for editing the specified PerfilesProse.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
       
        $IdUsuario             = $id;    
        $Idioma                = '';                   
 
      $perfilesProses = DB::select("EXEC [dbo].[sc_usuariosProse_Busca_grid]
                               '".$IdUsuario."',
                               '".$Idioma."'" );

       
      $collection = Collection::make($perfilesProses);
      $perfil = $collection->first();
        //dd($perfil);
       
        // llenado de la tabla
        $tabla = DB::select("EXEC [dbo].[sc_usuariosProse_Busca_grid]
                               '".$IdUsuario."',
                               '".$Idioma."'" );

         $array = json_decode(json_encode($tabla), true);
         $perfile_new= array();
         $datos  = array();
         $cont = 0;
         foreach ($array as $value) {
              $cont = $cont + 1;
              $perfile_new["ID_Usuario"]  =  $value["ID_Usuario"];
              $perfile_new["Nombre"]  =  $value["Nombre"];
              $perfile_new["Perfil_ac"]  =  $value["Perfil prose"];
              $perfile_new["A_partir"]  =  $value["A partir de"];
              $perfile_new["idPerfil"]  =  $value["perfilProse"];
              $datos[$cont] = (object) $perfile_new;
         }
         $p = $datos;
         $collection = Collection::make($p);
         $per= $collection->all();
        //var_dump($collection->all());

        $idUsuario = '';
        $esAdministrador = '';
        $esAdministradorProse = '';
        $idioma = '';
        
        $Perfiles = DB::select("EXEC [dbo].[sc_usuariosProse_Perfiles]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Perfiles);
      
        $Perfil = $collection->lists('descripcion','id_prosePerfil');

        if (empty($perfilesProses)) {
            
            Flash::error('DepartamentosProse not found');

            return redirect(route('perfilesProses.index'));
        }

        return view('perfilesProses.edit', compact('Perfil', 'per'))->with('perfilesProses',  $perfil);
    }

    /**
     * Update the specified PerfilesProse in storage.
     *
     * @param  int              $id
     * @param UpdatePerfilesProseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePerfilesProseRequest $request)
    {
        $input = $request->all();

        $date = strtotime($input['fech']);

        $idusuario  = $input['ID_Usuario'];
        $perfil2     = $input['Perfil'];
        $anno       = date("Y", $date);
        $mes        = date("m", $date);
        $dia        = date("d", $date);      
        
        $perfilesProses = DB::statement("EXEC [dbo].[sc_usuariosProse_Agregar]
                                1,
                                '".$idusuario."',
                                '".$perfil2."',
                                '".$anno."',
                                '".$mes."',
                                '".$dia."'");

        if ($perfilesProses) {
            Flash::success('Registro Guardado Corectamente.');
        }
        else {
            Flash::error('Revise Sus Datos');
        }

        return redirect(route('perfilesProses.index'));
    }

    /**
     * Remove the specified PerfilesProse from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
   public function destroy($id)
    {
        $date = strtotime($input['fech']);

        $idusuario  = $input['ID_Usuario'];
        $perfil2     = $input['Perfil_actl'];
        $anno       = date("Y", $date);
        $mes        = date("m", $date);
        $dia        = date("d", $date);    
         $perfilesProses = DB::statement("EXEC [dbo].[sc_usuariosProse_Eliminar]
                                '".$id."',
                                '".$perfil2."',
                                '".$anno."',
                                '".$mes."',
                                '".$dia."'");

        if (empty($perfilesProses)) {
            Flash::error('perfiles Prose not found');
            return redirect(route('perfilesProses.index'));
        }

        Flash::success('perfiles Prose deleted successfully.');
        return redirect(route('perfilesProses.index'));
    }

    public function buscar(Request $request)
    {
            $input = $request->all();
            //dd($input);
          return redirect(route('perfilesProses.index'));
    }
    
}