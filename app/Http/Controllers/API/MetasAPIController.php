<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMetasAPIRequest;
use App\Http\Requests\API\UpdateMetasAPIRequest;
use App\Models\Metas;
use App\Repositories\MetasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MetasController
 * @package App\Http\Controllers\API
 */

class MetasAPIController extends InfyOmBaseController
{
    /** @var  MetasRepository */
    private $metasRepository;

    public function __construct(MetasRepository $metasRepo)
    {
        $this->metasRepository = $metasRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/metas",
     *      summary="Get a listing of the Metas.",
     *      tags={"Metas"},
     *      description="Get all Metas",
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
     *                  @SWG\Items(ref="#/definitions/Metas")
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
        $this->metasRepository->pushCriteria(new RequestCriteria($request));
        $this->metasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $metas = $this->metasRepository->all();

        return $this->sendResponse($metas->toArray(), 'Metas retrieved successfully');
    }

    /**
     * @param CreateMetasAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/metas",
     *      summary="Store a newly created Metas in storage",
     *      tags={"Metas"},
     *      description="Store Metas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Metas that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Metas")
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
     *                  ref="#/definitions/Metas"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMetasAPIRequest $request)
    {
        $input = $request->all();

        $metas = $this->metasRepository->create($input);

        return $this->sendResponse($metas->toArray(), 'Metas saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/metas/{id}",
     *      summary="Display the specified Metas",
     *      tags={"Metas"},
     *      description="Get Metas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Metas",
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
     *                  ref="#/definitions/Metas"
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
        /** @var Metas $metas */
        $metas = $this->metasRepository->find($id);

        if (empty($metas)) {
            return Response::json(ResponseUtil::makeError('Metas not found'), 404);
        }

        return $this->sendResponse($metas->toArray(), 'Metas retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMetasAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/metas/{id}",
     *      summary="Update the specified Metas in storage",
     *      tags={"Metas"},
     *      description="Update Metas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Metas",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Metas that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Metas")
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
     *                  ref="#/definitions/Metas"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMetasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Metas $metas */
        $metas = $this->metasRepository->find($id);

        if (empty($metas)) {
            return Response::json(ResponseUtil::makeError('Metas not found'), 404);
        }

        $metas = $this->metasRepository->update($input, $id);

        return $this->sendResponse($metas->toArray(), 'Metas updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/metas/{id}",
     *      summary="Remove the specified Metas from storage",
     *      tags={"Metas"},
     *      description="Delete Metas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Metas",
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
        /** @var Metas $metas */
        $metas = $this->metasRepository->find($id);

        if (empty($metas)) {
            return Response::json(ResponseUtil::makeError('Metas not found'), 404);
        }

        $metas->delete();

        return $this->sendResponse($id, 'Metas deleted successfully');
    }
}
