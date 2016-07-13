<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePerfilesProseAPIRequest;
use App\Http\Requests\API\UpdatePerfilesProseAPIRequest;
use App\Models\PerfilesProse;
use App\Repositories\PerfilesProseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PerfilesProseController
 * @package App\Http\Controllers\API
 */

class PerfilesProseAPIController extends InfyOmBaseController
{
    /** @var  PerfilesProseRepository */
    private $perfilesProseRepository;

    public function __construct(PerfilesProseRepository $perfilesProseRepo)
    {
        $this->perfilesProseRepository = $perfilesProseRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/perfilesProses",
     *      summary="Get a listing of the PerfilesProses.",
     *      tags={"PerfilesProse"},
     *      description="Get all PerfilesProses",
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
     *                  @SWG\Items(ref="#/definitions/PerfilesProse")
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
        $this->perfilesProseRepository->pushCriteria(new RequestCriteria($request));
        $this->perfilesProseRepository->pushCriteria(new LimitOffsetCriteria($request));
        $perfilesProses = $this->perfilesProseRepository->all();

        return $this->sendResponse($perfilesProses->toArray(), 'PerfilesProses retrieved successfully');
    }

    /**
     * @param CreatePerfilesProseAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/perfilesProses",
     *      summary="Store a newly created PerfilesProse in storage",
     *      tags={"PerfilesProse"},
     *      description="Store PerfilesProse",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PerfilesProse that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PerfilesProse")
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
     *                  ref="#/definitions/PerfilesProse"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePerfilesProseAPIRequest $request)
    {
        $input = $request->all();

        $perfilesProses = $this->perfilesProseRepository->create($input);

        return $this->sendResponse($perfilesProses->toArray(), 'PerfilesProse saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/perfilesProses/{id}",
     *      summary="Display the specified PerfilesProse",
     *      tags={"PerfilesProse"},
     *      description="Get PerfilesProse",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PerfilesProse",
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
     *                  ref="#/definitions/PerfilesProse"
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
        /** @var PerfilesProse $perfilesProse */
        $perfilesProse = $this->perfilesProseRepository->find($id);

        if (empty($perfilesProse)) {
            return Response::json(ResponseUtil::makeError('PerfilesProse not found'), 404);
        }

        return $this->sendResponse($perfilesProse->toArray(), 'PerfilesProse retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePerfilesProseAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/perfilesProses/{id}",
     *      summary="Update the specified PerfilesProse in storage",
     *      tags={"PerfilesProse"},
     *      description="Update PerfilesProse",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PerfilesProse",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PerfilesProse that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PerfilesProse")
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
     *                  ref="#/definitions/PerfilesProse"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePerfilesProseAPIRequest $request)
    {
        $input = $request->all();

        /** @var PerfilesProse $perfilesProse */
        $perfilesProse = $this->perfilesProseRepository->find($id);

        if (empty($perfilesProse)) {
            return Response::json(ResponseUtil::makeError('PerfilesProse not found'), 404);
        }

        $perfilesProse = $this->perfilesProseRepository->update($input, $id);

        return $this->sendResponse($perfilesProse->toArray(), 'PerfilesProse updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/perfilesProses/{id}",
     *      summary="Remove the specified PerfilesProse from storage",
     *      tags={"PerfilesProse"},
     *      description="Delete PerfilesProse",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PerfilesProse",
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
        /** @var PerfilesProse $perfilesProse */
        $perfilesProse = $this->perfilesProseRepository->find($id);

        if (empty($perfilesProse)) {
            return Response::json(ResponseUtil::makeError('PerfilesProse not found'), 404);
        }

        $perfilesProse->delete();

        return $this->sendResponse($id, 'PerfilesProse deleted successfully');
    }
}
