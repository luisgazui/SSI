<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateParamedicoRequest;
use App\Http\Requests\UpdateParamedicoRequest;
use App\Repositories\ParamedicoRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use Illuminate\Support\Collection as Collection;

class ParamedicoController extends InfyOmBaseController
{
    /** @var  ParamedicoRepository */
    private $paramedicoRepository;

    public function __construct(ParamedicoRepository $paramedicoRepo)
    {
        $this->paramedicoRepository = $paramedicoRepo;
    }

    /**
     * Display a listing of the Paramedico.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        //dd($input);
        if (isset($input['Empresa'])) { $idEmpresaResponsable = $input['Empresa']; }
        else { $idEmpresaResponsable = ''; } 
        if (isset($input['Departamento'])) { $idDepartamento = $input['Departamento']; }
        else { $idDepartamento = ''; }  
        if (isset($input['Area'])) { $idArea = $input['Area']; }
        else { $idArea = ''; } 
        if (isset($input['Supervisor'])) { $idPersonaSupervisor = $input['Supervisor']; }
        else { $idPersonaSupervisor = ''; } 
         if (isset($input['Turno'])) { $idTurno = $input['Turno']; }
        else { $idTurno = ''; }
        if (isset($input['Falta'])) { $idFaltaRegla = $input['Falta']; }
        else { $idFaltaRegla = ''; }
        if (isset($input['Incidentado'])) { $idPersonaIncidentado = $input['Incidentado']; }
        else { $idPersonaIncidentado = ''; }
         if (isset($input['Parte'])) { $idParteDelcuerpo = $input['Parte']; }
        else { $idParteDelcuerpo = ''; }
         if (isset($input['Categoria'])) { $idCategoria = $input['Categoria']; }
        else { $idCategoria = ''; }
        if (isset($input['Severidad'])) { $idSeveridad = $input['Severidad']; }
        else { $idSeveridad = ''; }
        if (isset($input['Reporte'])) { $idReporte = $input['Reporte']; }
        else { $idReporte = ''; }
       
$Lesion='';
$CAS ='';
  
       
      /* if (isset($input['per1'])) {$Ayo_inicial = $date[2];}
        else { $Ayo_inicial = '';} 
        if (isset($input['per1'])) {$Mes_inicial = $date[1];}
        else { $Mes_inicial = '';}
        if (isset($input['per1'])) {$Dia_inicial = $date[0];}
        else { $Dia_inicial = '';}
        if(isset($input ['per2'])){
        $date2 = explode("-", $input['per2']);
         }
        if (isset($input['per2'])) {$Ayo_final = $date2[2];}
        else { $Ayo_final = '';} 
        if (isset($input['per2'])) {$Mes_final = $date2[1];}
        else { $Mes_final = '';}
        if (isset($input['per2'])) {$Dia_final = $date2[0];}
        else { $Dia_final = '';}*/
//dd($date[2]);
$Ayo_inicial ='2016';
$Mes_inicial ='08';
$Dia_inicial ='01';
$Ayo_final ='2016';
$Mes_final ='08';
$Dia_final ='31';
$idUsuario ='';
$esAdministrador ='';
$esAdministradorProse ='';
$idioma='';


  
        $paramedicos= DB::select("EXEC [dbo].[sc_prose_ParamedicoB_Consulta]
                                '".$idEmpresaResponsable."',
                                '".$idDepartamento."' ,
                                '".$idArea."' ,
                                '".$Lesion."' ,
                                '".$idPersonaSupervisor."',
                                '".$idTurno."',
                                '".$idFaltaRegla."',
                                '".$CAS."',
                                '".$idPersonaIncidentado."',
                                '".$idParteDelcuerpo."',
                                '".$idCategoria."',
                                '".$idSeveridad."',
                                '".$idReporte."',
                                '".$Ayo_inicial."' ,
                                '".$Mes_inicial."' ,
                                '".$Dia_inicial."' ,
                                '".$Ayo_final."' ,
                                '".$Mes_final."' ,
                                '".$Dia_final."' ,
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."' ,
                                '".$idioma."'");
 
  
    // llemar select list empresa
        $idUsuario = '';
        $esAdministrador = '';
        $esAdministradorProse = '';
        $idioma = '';

        $Empresa = DB::select("EXEC [dbo].[sc_prose_ParamedicoB_EmpresaResponsable ]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'");
        
        $collection = Collection::make($Empresa);
        
        $Empresa = $collection->lists('descripcion','incidentadoIdEmpresa');
        // llenar select list departamento

        $Departamento = DB::select("EXEC [dbo].[sc_prose_ParamedicoB_Departamento ]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Departamento);
      
        $Departamento = $collection->lists('descripcion','incidentadoIdDepartamento');
        
        //llenar select list area
        $Area = DB::select("EXEC [dbo].[sc_prose_paramedicoB_areaConsulta ]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Area);
      
        $Area = $collection->lists('descripcion','id_area');

        //llenar select list turno
        $Turno = DB::select("EXEC [dbo].[sc_prose_ParamedicoB_TurnosConsulta]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Turno);
      
        $Turno = $collection->lists('Trunos','id_turno');

         //llenar select list Incidentado
        $Incidentado = DB::select("EXEC [dbo].[sc_prose_ParamedicoB_IncidentadosConsulta]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Incidentado);
      
        $Incidentado = $collection->lists('Nombre','Id_persona');

         //llenar select list Parte lesionada
        $Plesionada = DB::select("EXEC [dbo].[sc_prose_ParamedicoB_ParteDelCuerpoLesionada]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Plesionada);
      
        $Plesionada = $collection->lists('ParteCuerpo','id_pCuerpo');

        // llenar select list categoria
        
        $Categoria = DB::select("EXEC [dbo].[sc_prose_ParamedicoB_CategoriaConsulta]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Categoria);
      
        $Categoria = $collection->lists('Categorias','idCategoria');

         // llenar select list severidad
        
        $Severidad = DB::select("EXEC [dbo].[sc_prose_ParamedicoB_SeveridadConsulta]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Severidad);
      
        $Severidad = $collection->lists('Severidades','idSeveridad');

         // llenar select list sup en turno
        
        $SupTurno = DB::select("EXEC [dbo].[sc_prose_ParamedicoB_Supervisor]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($SupTurno);
      
        $SupTurno = $collection->lists('Nombre','id_persona');

        // llenar select list falta a la regla
        
        $Falta = DB::select("EXEC [dbo].[sc_prose_ParamedicoB_FaltaAlaRegla ]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Falta);
      
        $Falta = $collection->lists('Reglas','id_regla');

        // llenar select list Reporte
        
        $Reporte = DB::select("EXEC [dbo].[sc_prose_ParamedicoB_Reportes]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Reporte);
      
        $Reporte = $collection->lists('reportes','idReporte');

return view('paramedicos.index', compact('Empresa','Departamento', 'Area', 'Turno', 'Incidentado', 'Plesionada','Categoria', 'Severidad', 'SupTurno','Falta','Reporte',  'idReporte'))->with('paramedicos', $paramedicos);
      
            
    }

    /**
     * Show the form for creating a new Paramedico.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $input = $request->all();
        $idUsuario = '';
        $esAdministrador = '';
        $esAdministradorProse = '';
        $idioma = '';

        //llenar select list area
        $Area = DB::select("EXEC [dbo].[sc_prose_paramedicoB_areaConsulta ]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Area);
      
        $Area = $collection->lists('descripcion','id_area');

         //llenar select list turno
        $Turno = DB::select("EXEC [dbo].[sc_prose_ParamedicoB_TurnosConsulta]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Turno);
      
        $Turno = $collection->lists('Trunos','id_turno');
         // llenar select list sup en turno
        
        $SupTurno = DB::select("EXEC [dbo].[sc_prose_ParamedicoB_Supervisor]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($SupTurno);
      
        $SupTurno = $collection->lists('Nombre','id_persona');

         //llenar select list Incidentado
        $Incidentado = DB::select("EXEC [dbo].[sc_prose_ParamedicoB_IncidentadosConsulta]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Incidentado);
      
        $Incidentado = $collection->lists('Nombre','Id_persona');

         //llenar select list Parte lesionada
        $Plesionada = DB::select("EXEC [dbo].[sc_prose_ParamedicoB_ParteDelCuerpoLesionada]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Plesionada);
      //$ples= $input['Parte'];
        $Plesionada = $collection->lists('ParteCuerpo','id_pCuerpo');

        // llenar select list falta a la regla
        
        $Falta = DB::select("EXEC [dbo].[sc_prose_ParamedicoB_FaltaAlaRegla ]
                                '".$idUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$idioma."'"); 
       
        $collection = Collection::make($Falta);
      
        $Falta = $collection->lists('Reglas','id_regla');

        return view('paramedicos.create', compact('Area', 'Turno','SupTurno','Incidentado','Plesionada','Falta'))->with('paramedicos', $Area);
    }

    /**
     * Store a newly created Paramedico in storage.
     *
     * @param CreateParamedicoRequest $request
     *
     * @return Response
     */
    public function store(CreateParamedicoRequest $request)
    {
        $input = $request->all();

       


        Flash::success('Paramedico saved successfully.');

        
    }

    /**
     * Display the specified Paramedico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paramedico = $this->paramedicoRepository->findWithoutFail($id);

        if (empty($paramedico)) {
            Flash::error('Paramedico not found');

            return redirect(route('paramedicos.index'));
        }

        return view('paramedicos.show')->with('paramedico', $paramedico);
    }

    /**
     * Show the form for editing the specified Paramedico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paramedico = $this->paramedicoRepository->findWithoutFail($id);

        if (empty($paramedico)) {
            Flash::error('Paramedico not found');

            return redirect(route('paramedicos.index'));
        }

        return view('paramedicos.edit')->with('paramedico', $paramedico);
    }

    /**
     * Update the specified Paramedico in storage.
     *
     * @param  int              $id
     * @param UpdateParamedicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParamedicoRequest $request)
    {
        $paramedico = $this->paramedicoRepository->findWithoutFail($id);

        if (empty($paramedico)) {
            Flash::error('Paramedico not found');

            return redirect(route('paramedicos.index'));
        }

        $paramedico = $this->paramedicoRepository->update($request->all(), $id);

        Flash::success('Paramedico updated successfully.');

        return redirect(route('paramedicos.index'));
    }

    /**
     * Remove the specified Paramedico from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paramedico = $this->paramedicoRepository->findWithoutFail($id);

        if (empty($paramedico)) {
            Flash::error('Paramedico not found');

            return redirect(route('paramedicos.index'));
        }

        $this->paramedicoRepository->delete($id);

        Flash::success('Paramedico deleted successfully.');

        return redirect(route('paramedicos.index'));
    }
}
