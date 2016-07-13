<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDepartamentosProseRequest;
use App\Http\Requests\UpdateDepartamentosProseRequest;
use App\Repositories\DepartamentosProseRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use Illuminate\Support\Collection as Collection;

class DepartamentosProseController extends InfyOmBaseController
{
    /** @var  DepartamentosProseRepository */
    private $departamentosProseRepository;

    public function __construct(DepartamentosProseRepository $departamentosProseRepo)
    {
        $this->departamentosProseRepository = $departamentosProseRepo;
    }

    /**
     * Display a listing of the DepartamentosProse.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $idDepartamento = '';
        $Departamento = '';
        $idUsuario = '';
        $idioma = '';                       
 
         
        
        $departamentosProses = DB::select("EXEC [dbo].[sc_DepartamentosProse_Consulta]
                                '".$idDepartamento."',
                                '".$Departamento."',
                                '".$idUsuario."',
                                '".$idioma."'");

//dd($departamentosProses);
        return view('departamentosProses.index')
            ->with('departamentosProses', $departamentosProses);
    }

    /**
     * Show the form for creating a new DepartamentosProse.
     *
     * @return Response
     */
    public function create()
    {
        return view('departamentosProses.create');
    }

    /**
     * Store a newly created DepartamentosProse in storage.
     *
     * @param CreateDepartamentosProseRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartamentosProseRequest $request)
    {
        $input = $request->all();

        $departamentosProse = $this->departamentosProseRepository->create($input);

        Flash::success('DepartamentosProse saved successfully.');

        return redirect(route('departamentosProses.index'));
    }

    /**
     * Display the specified DepartamentosProse.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $departamentosProses = $this->departamentosProseRepository->findWithoutFail($id);

        if (empty($departamentosProses)) {
            Flash::error('DepartamentosProse not found');

            return redirect(route('departamentosProses.index'));
        }

        return view('departamentosProses.show')->with('departamentosProse', $departamentosProses);
    }

    /**
     * Show the form for editing the specified DepartamentosProse.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $idDepartamento = $id;
        $Departamento = '';
        $idUsuario = '';
        $idioma = '';                       
 
         
        
        $departamentosProses = DB::select("EXEC [dbo].[sc_DepartamentosProse_Consulta]
                                '".$idDepartamento."',
                                '".$Departamento."',
                                '".$idUsuario."',
                                '".$idioma."'");
       // dd($departamentosProses);
        $collection = Collection::make($departamentosProses);
        
        $departamentos = $collection->first();
        if (empty($departamentosProses)) {
            
            Flash::error('DepartamentosProse not found');

            return redirect(route('departamentosProses.index'));
        }

        return view('departamentosProses.edit')->with('departamentosProses',  $departamentos );
    }

    /**
     * Update the specified DepartamentosProse in storage.
     *
     * @param  int              $id
     * @param UpdateDepartamentosProseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartamentosProseRequest $request)
    {
        $input = $request->all();
        //$departamentosO = $input['Departamento_OnePeople'];
        $departamentosP = $input['Departamento_PROSE'];

        if (isset($input['Habilitado'])) 
        {
            $Habilitado = '1';
        }
        else
        {
            $Habilitado = '0';
        }
        $idioma ='2';

        $departamentosProses = DB::statement("EXEC [dbo].[sc_DepartamentosProse_Actualiza]
                                '".$id."',
                                '".$departamentosP."',
                                '1',
                                '".$idioma."'");

        if ($departamentosProses) 
        {
            Flash::success('Registro Guardado Corectamente.');
        }
        else 
        {
            Flash::error('Revise Sus Datos');
        }

        return redirect(route('departamentosProses.index'));
    }

    /**
     * Remove the specified DepartamentosProse from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $departamentosProse = $this->departamentosProseRepository->findWithoutFail($id);

        if (empty($departamentosProse)) {
            Flash::error('DepartamentosProse not found');

            return redirect(route('departamentosProses.index'));
        }

        $this->departamentosProseRepository->delete($id);

        Flash::success('DepartamentosProse deleted successfully.');

        return redirect(route('departamentosProses.index'));
    }
}
