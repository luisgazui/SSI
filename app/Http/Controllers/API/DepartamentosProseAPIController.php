<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDepartamentosProseAPIRequest;
use App\Http\Requests\API\UpdateDepartamentosProseAPIRequest;
use App\Models\DepartamentosProse;
use App\Repositories\DepartamentosProseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
/**
 * Class DepartamentosProseController
 * @package App\Http\Controllers\API
 */

class DepartamentosProseAPIController extends InfyOmBaseController
{
    /** @var  DepartamentosProseRepository */
    private $departamentosProseRepository;

    public function __construct(DepartamentosProseRepository $departamentosProseRepo)
    {
        $this->departamentosProseRepository = $departamentosProseRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/departamentosProses",
     *      summary="Get a listing of the DepartamentosProses.",
     *      tags={"DepartamentosProse"},
     *      description="Get all DepartamentosProses",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/DepartamentosProse")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $idDepartamento = '';
        $Departamento = '';
        $IdUsuario = '';
        $Idioma = '';          
                $departamentosProse = DB::select("EXEC [dbo].[sc_DepartamentosProse_Consulta]
                                '".$idDepartamento."',
                                '".$Departamento."',
                                '".$IdUsuario."',
                                '".$Idioma."'");

        return $this->sendResponse($departamentosProse->toArray(), 'departamentosProse retrieved successfully');
    }

    /**
     * @param CreateDepartamentosProseAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/departamentosProses",
     *      summary="Store a newly created DepartamentosProse in storage",
     *      tags={"DepartamentosProse"},
     *      description="Store DepartamentosProse",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="DepartamentosProse that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/DepartamentosProse")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/DepartamentosProse"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateDepartamentosProseAPIRequest $request)
    {
        $input = $request->all();

        $departamentosProses = $this->departamentosProseRepository->create($input);

        return $this->sendResponse($departamentosProses->toArray(), 'DepartamentosProse saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/departamentosProses/{id}",
     *      summary="Display the specified DepartamentosProse",
     *      tags={"DepartamentosProse"},
     *      description="Get DepartamentosProse",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DepartamentosProse",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/DepartamentosProse"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var DepartamentosProse $departamentosProse */
        $departamentosProse = $this->departamentosProseRepository->find($id);

        if (empty($departamentosProse)) {
            return Response::json(ResponseUtil::makeError('DepartamentosProse not found'), 404);
        }

        return $this->sendResponse($departamentosProse->toArray(), 'DepartamentosProse retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateDepartamentosProseAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/departamentosProses/{id}",
     *      summary="Update the specified DepartamentosProse in storage",
     *      tags={"DepartamentosProse"},
     *      description="Update DepartamentosProse",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DepartamentosProse",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="DepartamentosProse that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/DepartamentosProse")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/DepartamentosProse"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateDepartamentosProseAPIRequest $request)
    {
        $input = $request->all();

        /** @var DepartamentosProse $departamentosProse */
        $departamentosProse = $this->departamentosProseRepository->find($id);

        if (empty($departamentosProse)) {
            return Response::json(ResponseUtil::makeError('DepartamentosProse not found'), 404);
        }

        $departamentosProse = $this->departamentosProseRepository->update($input, $id);

        return $this->sendResponse($departamentosProse->toArray(), 'DepartamentosProse updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/departamentosProses/{id}",
     *      summary="Remove the specified DepartamentosProse from storage",
     *      tags={"DepartamentosProse"},
     *      description="Delete DepartamentosProse",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DepartamentosProse",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var DepartamentosProse $departamentosProse */
        $departamentosProse = $this->departamentosProseRepository->find($id);

        if (empty($departamentosProse)) {
            return Response::json(ResponseUtil::makeError('DepartamentosProse not found'), 404);
        }

        $departamentosProse->delete();

        return $this->sendResponse($id, 'DepartamentosProse deleted successfully');
    }
}
