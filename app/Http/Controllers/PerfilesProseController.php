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
        $idEmpresa             = '';   
        $idDepartamento        = '';
        $idArea                = '';
        $idPuesto              = '';
        $idPerfil              = '';
        $nombre                = '';
        $IdUsuario             = '';    
        $esAdministrador       = '';
        $esAdministradorProse  = '';
        $Idioma                = '';                   
 
         
        
        $perfilesProses = DB::select("EXEC [dbo].[sc_usuariosProse_Busca]
                                '".$idEmpresa."', 
                                '".$idDepartamento."', 
                                '".$idArea."', 
                                '".$idPuesto."',
                                '".$idPerfil."', 
                                '".$nombre."',
                                '".$IdUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$Idioma."'" );


        return view('perfilesProses.index')
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

        $idusuario  = $input['ID_Usuario'];
        $perfil     = $input['Perfil prose actual'];
        $anno       = '2016';
        $mes        = '07';
        $dia        = '13';      
        
        $perfilesProses = DB::statement("EXEC [dbo].[sc_usuariosProse_Agregar]
                                '1',
                                '".$idusuario."',
                                '".$perfil."',
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
        $idEmpresa             = '';   
        $idDepartamento        = '';
        $idArea                = '';
        $idPuesto              = '';
        $idPerfil              = '';
        $nombre                = '';
        $IdUsuario             = '';    
        $esAdministrador       = '';
        $esAdministradorProse  = '';
        $Idioma                = '';                   
 
         
        
        $perfilesProses = DB::select("EXEC [dbo].[sc_usuariosProse_Busca]
                                '".$idEmpresa."', 
                                '".$idDepartamento."', 
                                '".$idArea."', 
                                '".$idPuesto."',
                                '".$idPerfil."', 
                                '".$nombre."',
                                '".$IdUsuario."',
                                '".$esAdministrador."',
                                '".$esAdministradorProse."',
                                '".$Idioma."'" );


        return view('perfilesProses.index')
            ->with('perfilesProses', $perfilesProses);
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

        $idusuario  = $input['ID_Usuario'];
        $perfil     = $input['Perfil prose actual'];
        $anno       = '2016';
        $mes        = '07';
        $dia        = '13';       
        
        $perfilesProses = DB::statement("EXEC [dbo].[sc_usuariosProse_Agregar]
                                '1',
                                '".$idusuario."',
                                '".$perfil."',
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
         $perfilesProses = DB::statement("EXEC [dbo].[sc_usuariosProse_Eliminar]
                                '".$id."',
                                '".$perfil."',
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
}
