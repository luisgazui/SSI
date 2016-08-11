<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMetasRequest;
use App\Http\Requests\UpdateMetasRequest;
use App\Repositories\MetasRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use Illuminate\Support\Collection as Collection;

class MetasController extends InfyOmBaseController
{
    /** @var  MetasRepository */
    private $metasRepository;

    public function __construct(MetasRepository $metasRepo)
    {
        $this->metasRepository = $metasRepo; 
    }

    /**
     * Display a listing of the Metas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        dd($input);
        $date = strtotime($input['fecha']);
        $anno= date("Y", $date);
        $mes1= date("m", $date);
         if (isset($input['Empresa'])) { $idEmpresa = $input['Empresa']; }
        else { $idEmpresa = ''; } 
        if (isset($input['Departamento'])) { $idDepartamento = $input['Departamento']; }
        else { $idDepartamento = ''; }  
        if (isset($input['Nombre'])) { $Nombre = $input['Nombre']; }
        else { $Nombre = ''; }  
        if (isset($input['fecha'])) {$ayo = $anno; $mes= $mes1; }
        else { $ayo = ''; $mes= ''; }  
        if (isset($input['Reporte'])) { $idReporte = $input['Reporte']; }
        else { $idReporte = ''; }
        $idUsuario = '';
        $esAdministrador = '';
        $esAdministradorProse = '';
        $idioma = '';
        $idArea = '';
        $idSupervisor = '';
        $NumEmpleado = '';
               
        $metas= DB::select("EXEC [dbo].[sc_prose_MetasBusca02]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."' ,
                                '".$idioma."',
                                '".$idEmpresa."' ,
                                '".$idDepartamento."' ,
                                '".$idArea."' ,
                                '".$idSupervisor."',
                                '".$NumEmpleado."',
                                '".$Nombre."' ,
                                '".$ayo."' ,
                                '".$mes."' ,
                                '".$idReporte."'");
    // llemar select list empresa
        $idUsuario = '';
        $esAdministrador = '';
        $esAdministradorProse = '';
        $idioma = '';

        $Empresa = DB::select("EXEC [dbo].[sc_prose_MetasEmpresas]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'");
        
        $collection = Collection::make($Empresa);
        
        $Empresa = $collection->lists('Descripcion','id_empresa');
        // llenar select list departamento

        $Departamento = DB::select("EXEC [dbo].[sc_prose_MetasDepartamentos]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Departamento);
      
        $Departamento = $collection->lists('descripcionProse','id_departamento');

        // llenar select list Reporte
        
        $Reporte = DB::select("EXEC [dbo].[sc_prose_MetasReportes]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Reporte);
      
        $Reporte = $collection->lists('descripcion','id_Reporte');

        return view('metas.index', compact('Empresa','Departamento', 'Reporte'))->with('metas', $metas);
    }

    /**
     * Show the form for creating a new Metas.
     *
     * @return Response
     */
    public function create()

    {
        $idUsuario = '';
        $esAdministrador = '';
        $esAdministradorProse = '';
        $idioma = '';
        $idEmpresa='';
        $idArea= '';
        $idDepartamento= '';

         $Supervisor = DB::select("EXEC [dbo].[sc_prose_MetasSupervisores]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."',
                                '".$idEmpresa."',
                                '".$idArea."',
                                '".$idDepartamento."'"); 
       
        $collection = Collection::make($Supervisor);
      
        $Supervisor = $collection->lists('nombre','id_usuario');
        return view('metas.create', compact('Supervisor'));
    }

    /**
     * Store a newly created Metas in storage.
     *
     * @param CreateMetasRequest $request
     *
     * @return Response
     */
    public function store(CreateMetasRequest $request)

    {
         $input = $request->all();
         $date1 = strtotime($input['des']);
         $date2 = strtotime($input['al']);
        $idUsuario = '';
        $esAdministrador = '';
        $esAdministradorProse = '';
        $idioma = '';
        $idSupervisor = '';
        $AyoInicial = date("Y", $date1);
        $MesInicial = date("m", $date1);
        $Ayofinal= date("Y", $date2);
        $MesFinal= date("m", $date2);
        $Inspecciones= $input['Inspecciones'];
        $Observaciones= $input['Observaciones'];
        $Reuniones= $input['Reuniones'];
        $Charlas=  $input['Charlas'];
        $Interacciones=  $input['Interaciones'];
       
        
        $metas= DB::statement("EXEC [dbo].[sc_prose_MetasAsignacionesGuarda]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."' ,
                                '".$idioma."',
                                '".$idSupervisor."',
                                '".$AyoInicial."',
                                '".$MesInicial."' ,
                                '".$Ayofinal."' ,
                                '".$MesFinal."' ,
                                '".$Inspecciones."',
                                '".$Observaciones."',
                                '".$Reuniones."',
                                '".$Charlas."',
                                '".$Interacciones."'");

       
        if ($metas) {
            Flash::success('Registro Guardado Corectamente.');
        }
        else {

            Flash::error('Revise Sus Datos');
        }

        return redirect(route('metas.index'));

    }

    /**
     * Display the specified Metas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $metas = $this->metasRepository->findWithoutFail($id);

        if (empty($metas)) {
            Flash::error('Metas not found');

            return redirect(route('metas.index'));
        }

        return view('metas.show')->with('metas', $metas);
    }

    /**
     * Show the form for editing the specified Metas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $metas = $this->metasRepository->findWithoutFail($id);

        if (empty($metas)) {
            Flash::error('Metas not found');

            return redirect(route('metas.index'));
        }

        return view('metas.edit')->with('metas', $metas);
    }

    /**
     * Update the specified Metas in storage.
     *
     * @param  int              $id
     * @param UpdateMetasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMetasRequest $request)
    {
        $metas = $this->metasRepository->findWithoutFail($id);

        if (empty($metas)) {
            Flash::error('Metas not found');

            return redirect(route('metas.index'));
        }

        $metas = $this->metasRepository->update($request->all(), $id);

        Flash::success('Metas updated successfully.');

        return redirect(route('metas.index'));
    }

    /**
     * Remove the specified Metas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
       $id_usuario =$id;
       $ayoInicial ='';
       $mesInicial ='';
       $ayoFinal ='';
       $mesFinal ='';
        
           $metas = DB::statement("EXEC [dbo].[sc_prose_MetasAsignacionesElimina]
                                '".$id_usuario."',
                                '".$ayoInicial."',
                                '".$mesInicial."',
                                '".$ayoFinal."',
                                '".$mesFinal."'");
           //dd($metas);

            if (empty($metas)) {
                Flash::error('Metas no encontrada');
                return redirect(route('metas.index'));
            }

            Flash::success('Metas Borrada Correctamente.');
            return redirect(route('metas.index'));
           
        
    }
     public function buscar(Request $request)
    {
            $input = $request->all();
            //dd($input);
          return redirect(route('metas.index'));
    }
}
