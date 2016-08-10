<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAreasFisicasRequest;
use App\Http\Requests\UpdateAreasFisicasRequest;
use App\Repositories\AreasFisicasRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use Illuminate\Support\Collection as Collection;

class AreasFisicasController extends InfyOmBaseController
{
    /** @var  AreasFisicasRepository */
    private $areasFisicasRepository;

    public function __construct(AreasFisicasRepository $areasFisicasRepo)
    {
        $this->areasFisicasRepository = $areasFisicasRepo;
    }

    /**
     * Display a listing of the AreasFisicas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $IdArea = '';
        $Descripcion = '';
        $IdUsuario = '';
        $Idioma = '';                       
 
         
        
        $areasFisicas = DB::select("EXEC [dbo].[sc_AreasFisicas_Consulta]
                                '".$IdArea."',
                                '".$Descripcion."',
                                '".$IdUsuario."',
                                '".$Idioma."'");


        return view('areasFisicas.index')
            ->with('areasFisicas', $areasFisicas);
    }

    /**
     * Show the form for creating a new AreasFisicas.
     *
     * @return Response
     */
    public function create()
    {
        return view('areasFisicas.create');
    }

    /**
     * Store a newly created AreasFisicas in storage.
     *
     * @param CreateAreasFisicasRequest $request
     *
     * @return Response
     */
    public function store(CreateAreasFisicasRequest $request)
    {
        $input = $request->all();

        $area = $input['Area'];
        if (isset($input['Enabled'])) {
            $Enabled = '1';
        }
        else {
            $Enabled = '0';
        }
        $Idioma ='2';
        $areasFisicas = DB::statement("EXEC [dbo].[sc_AreasFisicas_Guarda]
                                '0',
                                '".$area."',
                                '".$Enabled."',
                                '1',
                                '".$Idioma."'");

        if ($areasFisicas) {
            Flash::success('Registro Guardado Corectamente.');
        }
        else {
            Flash::error('Revise Sus Datos');
        }

        return redirect(route('areasFisicas.index'));
    }

    /**
     * Display the specified AreasFisicas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
       $IdArea = $id;
        $Descripcion = '';
        $IdUsuario = '';
        $Idioma = '';                       
 
         
        
        $areasFisicas = DB::select("EXEC [dbo].[sc_AreasFisicas_Consulta]
                                '".$IdArea."',
                                '".$Descripcion."',
                                '".$IdUsuario."',
                                '".$Idioma."'")->first();

        return view('areasFisicas.show')->with('areasFisicas', $areasFisicas);
    }

    /**
     * Show the form for editing the specified AreasFisicas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
         
        $IdArea = $id;
        $Descripcion = '';
        $IdUsuario = '';
        $Idioma = '';                       
 
        
        
        $areasFisicas = DB::select("EXEC [dbo].[sc_AreasFisicas_Consulta]
                                '".$IdArea."',
                                '".$Descripcion."',
                                '".$IdUsuario."',
                                '".$Idioma."'");
        //dd($areasFisicas);
        $collection = Collection::make($areasFisicas);
        
        $areas = $collection->first();
        if (empty($areasFisicas)) {
            
            Flash::error('AreasFisicas not found');

            return redirect(route('areasFisicas.index'));
        }

        return view('areasFisicas.edit')->with('areasFisicas',  $areas );
    }

    /**
     * Update the specified AreasFisicas in storage.
     *
     * @param  int              $id
     * @param UpdateAreasFisicasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAreasFisicasRequest $request)
    {
        $input = $request->all();

        $area = $input['Area'];
        if (isset($input['Enabled'])) {
            $Enabled = '1';
        }
        else {
            $Enabled = '0';
        }
        $Idioma ='2';
        $areasFisicas = DB::statement("EXEC [dbo].[sc_AreasFisicas_Guarda]
                                '".$id."',
                                '".$area."',
                                '".$Enabled."',
                                '1',
                                '".$Idioma."'");

        if ($areasFisicas) {
            Flash::success('Registro Guardado Corectamente.');
        }
        else {
            Flash::error('Revise Sus Datos');
        }

        return redirect(route('areasFisicas.index'));
    }

    /**
     * Remove the specified AreasFisicas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        
        try {
           $areasFisicas = DB::statement("EXEC [dbo].[sc_AreasFisicas_Elimina]
                                '".$id."'");

            if (empty($areasFisicas)) {
                Flash::error('AreasFisicas not found');
                return redirect(route('areasFisicas.index'));
            }

            Flash::success('AreasFisicas deleted successfully.');
            return redirect(route('areasFisicas.index'));
           
        }
        catch(\Exception $e)
        {
            Flash::error('El registro no se puede eliminar ya que esta siendo usado');
            return redirect(route('areasFisicas.index'));
        }

    }
}
