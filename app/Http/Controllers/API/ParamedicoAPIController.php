<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParamedicoAPIRequest;
use App\Http\Requests\API\UpdateParamedicoAPIRequest;
use App\Models\Paramedico;
use App\Repositories\ParamedicoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ParamedicoController
 * @package App\Http\Controllers\API
 */

class ParamedicoAPIController extends InfyOmBaseController
{
    /** @var  ParamedicoRepository */
    private $paramedicoRepository;

    public function __construct(ParamedicoRepository $paramedicoRepo)
    {
        $this->paramedicoRepository = $paramedicoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/paramedicos",
     *      summary="Get a listing of the Paramedicos.",
     *      tags={"Paramedico"},
     *      description="Get all Paramedicos",
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
     *                  @SWG\Items(ref="#/definitions/Paramedico")
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
        $this->paramedicoRepository->pushCriteria(new RequestCriteria($request));
        $this->paramedicoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $paramedicos = $this->paramedicoRepository->all();

        return $this->sendResponse($paramedicos->toArray(), 'Paramedicos retrieved successfully');
    }

    /**
     * @param CreateParamedicoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/paramedicos",
     *      summary="Store a newly created Paramedico in storage",
     *      tags={"Paramedico"},
     *      description="Store Paramedico",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Paramedico that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Paramedico")
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
     *                  ref="#/definitions/Paramedico"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateParamedicoAPIRequest $request)
    {
        $input = $request->all();

        $paramedicos = $this->paramedicoRepository->create($input);

        return $this->sendResponse($paramedicos->toArray(), 'Paramedico saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/paramedicos/{id}",
     *      summary="Display the specified Paramedico",
     *      tags={"Paramedico"},
     *      description="Get Paramedico",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Paramedico",
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
     *                  ref="#/definitions/Paramedico"
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
        /** @var Paramedico $paramedico */
        $paramedico = $this->paramedicoRepository->find($id);

        if (empty($paramedico)) {
            return Response::json(ResponseUtil::makeError('Paramedico not found'), 404);
        }

        return $this->sendResponse($paramedico->toArray(), 'Paramedico retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateParamedicoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/paramedicos/{id}",
     *      summary="Update the specified Paramedico in storage",
     *      tags={"Paramedico"},
     *      description="Update Paramedico",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Paramedico",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Paramedico that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Paramedico")
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
     *                  ref="#/definitions/Paramedico"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateParamedicoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Paramedico $paramedico */
        $paramedico = $this->paramedicoRepository->find($id);

        if (empty($paramedico)) {
            return Response::json(ResponseUtil::makeError('Paramedico not found'), 404);
        }

        $paramedico = $this->paramedicoRepository->update($input, $id);

        return $this->sendResponse($paramedico->toArray(), 'Paramedico updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/paramedicos/{id}",
     *      summary="Remove the specified Paramedico from storage",
     *      tags={"Paramedico"},
     *      description="Delete Paramedico",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Paramedico",
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
        /** @var Paramedico $paramedico */
        $paramedico = $this->paramedicoRepository->find($id);

        if (empty($paramedico)) {
            return Response::json(ResponseUtil::makeError('Paramedico not found'), 404);
        }

        $paramedico->delete();

        return $this->sendResponse($id, 'Paramedico deleted successfully');
    }
}
