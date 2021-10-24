<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Cycle;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateCycleRequest;
/**
 * Class CycleController
 * @package App\Http\Controllers
 * @group Cycle
 * APIs for managing Cycle
 */

class CycleController extends Controller
{
    /**
     * All Cycle.
     * @group Cycle
     * @authenticated
     * @return \Illuminate\Http\Response
     */

    public function index(): JsonResponse
    {
        $cycleses = Cycle::all();
        return $this->commonResponse(true, 'success', $cycleses, Response::HTTP_OK);
    }


    /**
     * Create  Cycle
     * @group  Cycle
     * @param CreateCycleRequest $request
     * @bodyParam name string required The Cycle' Name
     * @return \Illuminate\Http\Response
     * @authenticated
     */


    public function create(CreateCycleRequest $request): JsonResponse
    {
        try {
            $cycle = new Cycle();
            $cycle->name = $request->name;
            if ($cycle->save()) {
                return $this->commonResponse(true, 'Cycle created successfully!', '', Response::HTTP_CREATED);
            }
            return $this->commonResponse(false, 'Failed to create Cycle', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Get Cycle by Id
     * @group Cycle.
     * @param int $id
     * @urlParam id integer required The ID of the Cycle.Example:1
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        $cycle = Cycle::find($id);
        if ($cycle) {
            return $this->commonResponse(true, 'success', $cycle, Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Cycle Not Found!', '', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Edit Cycle
     * @group Cycle
     * @param CreateCycleRequest $request
     * @bodyParam name string required The Cycle' Name
     * @return JsonResponse
     * @authenticated
     */

    public function update(CreateCycleRequest $request, int $id): JsonResponse
    {
        try {
            $cycle = Cycle::find($id);
            if($cycle){
                $cycle->name = $request->name;
                if ($cycle->save()) {
                    return $this->commonResponse(true, 'Cycle updated successfully!', '', Response::HTTP_CREATED);
                }
            }
            return $this->commonResponse(false, 'Failed to update Cycle', 'Cycle Not Found', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Delete Cycle
     * @group  Cycle
     * @param int $id
     * @urlParam id integer required The ID of the Cycle. Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $id): JsonResponse
    {
        $cycle = Cycle::find($id);
        if ($cycle) {
            $cycle->delete();
            return $this->commonResponse(true, 'Cycle deleted', '', Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Cycle not found!', '', Response::HTTP_NOT_FOUND);
        }
    }
}
