<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAreasFisicasAPIRequest;
use App\Http\Requests\API\UpdateAreasFisicasAPIRequest;
use App\Models\AreasFisicas;
use App\Repositories\AreasFisicasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
/**
 * Class AreasFisicasController
 * @package App\Http\Controllers\API
 */

class AreasFisicasAPIController extends InfyOmBaseController
{
    /** @var  AreasFisicasRepository */
    private $areasFisicasRepository;

    public function __construct(AreasFisicasRepository $areasFisicasRepo)
    {
        $this->areasFisicasRepository = $areasFisicasRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/areasFisicas",
     *      summary="Get a listing of the AreasFisicas.",
     *      tags={"AreasFisicas"},
     *      description="Get all AreasFisicas",
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
     *                  @SWG\Items(ref="#/definitions/AreasFisicas")
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

        $IdArea = '';
        $Descripcion = '';
        $IdUsuario = '';
        $Idioma = '';          
                $areasFisicas = DB::select("EXEC [dbo].[sc_AreasFisicas_Consulta]
                                '".$IdArea."',
                                '".$Descripcion."',
                                '".$IdUsuario."',
                                '".$Idioma."'");

        return $this->sendResponse($areasFisicas->toArray(), 'AreasFisicas retrieved successfully');
    }

    /**
     * @param CreateAreasFisicasAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/areasFisicas",
     *      summary="Store a newly created AreasFisicas in storage",
     *      tags={"AreasFisicas"},
     *      description="Store AreasFisicas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AreasFisicas that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AreasFisicas")
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
     *                  ref="#/definitions/AreasFisicas"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAreasFisicasAPIRequest $request)
    {
        $input = $request->all();

        $areasFisicas = $this->areasFisicasRepository->create($input);

        return $this->sendResponse($areasFisicas->toArray(), 'AreasFisicas saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/areasFisicas/{id}",
     *      summary="Display the specified AreasFisicas",
     *      tags={"AreasFisicas"},
     *      description="Get AreasFisicas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AreasFisicas",
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
     *                  ref="#/definitions/AreasFisicas"
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
        /** @var AreasFisicas $areasFisicas */
        $areasFisicas = $this->areasFisicasRepository->find($id);

        if (empty($areasFisicas)) {
            return Response::json(ResponseUtil::makeError('AreasFisicas not found'), 404);
        }

        return $this->sendResponse($areasFisicas->toArray(), 'AreasFisicas retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAreasFisicasAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/areasFisicas/{id}",
     *      summary="Update the specified AreasFisicas in storage",
     *      tags={"AreasFisicas"},
     *      description="Update AreasFisicas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AreasFisicas",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AreasFisicas that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AreasFisicas")
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
     *                  ref="#/definitions/AreasFisicas"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAreasFisicasAPIRequest $request)
    {
        $input = $request->all();

        /** @var AreasFisicas $areasFisicas */
        $areasFisicas = $this->areasFisicasRepository->find($id);

        if (empty($areasFisicas)) {
            return Response::json(ResponseUtil::makeError('AreasFisicas not found'), 404);
        }

        $areasFisicas = $this->areasFisicasRepository->update($input, $id);

        return $this->sendResponse($areasFisicas->toArray(), 'AreasFisicas updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/areasFisicas/{id}",
     *      summary="Remove the specified AreasFisicas from storage",
     *      tags={"AreasFisicas"},
     *      description="Delete AreasFisicas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AreasFisicas",
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
        /** @var AreasFisicas $areasFisicas */
        $areasFisicas = $this->areasFisicasRepository->find($id);

        if (empty($areasFisicas)) {
            return Response::json(ResponseUtil::makeError('AreasFisicas not found'), 404);
        }

        $areasFisicas->delete();

        return $this->sendResponse($id, 'AreasFisicas deleted successfully');
    }
}
