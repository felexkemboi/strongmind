<?php


namespace App\Actions;

use App\Http\Requests\ModeOfDeliveryRequest;
use App\Http\Requests\ModeOfDeliveryUpdateRequest;
use App\Http\Resources\ModeOfDeliveryResource;
use App\Models\ModeOfDelivery;
use App\Traits\ApiResponser;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ModeOfDeliveryAction
{
    use ApiResponser;

    public function listModesOfDelivery(): JsonResponse
    {
        try{
            $deliveryModes = ModeOfDelivery::latest()->get();
            return $this->commonResponse(true,'success',ModeOfDeliveryResource::collection($deliveryModes),Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function createModeOfDelivery(ModeOfDeliveryRequest $request): JsonResponse
    {
        try{
            $newDeliveryMode = ModeOfDelivery::create(array_merge($request->validated(),['slug' => Str::slug($request->name,'-')]));
            return $this->commonResponse(true,'success', new ModeOfDeliveryResource($newDeliveryMode),Response::HTTP_CREATED);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function viewModeOfDelivery(int $id): JsonResponse
    {
        try{
            $deliveryMode = ModeOfDelivery::findOrFail($id);
            return $this->commonResponse(true,'success',new ModeOfDeliveryResource($deliveryMode), Response::HTTP_OK);
        }catch(ModelNotFoundException $exception){
            return $this->commonResponse(false,'Delivery Mode Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateModeOfDelivery(ModeOfDeliveryUpdateRequest $request, int $id): JsonResponse
    {
        try{
            $deliveryMode = ModeOfDelivery::findOrFail($id);
            $deliveryMode->update([
                'name' => $request->name ?? $deliveryMode->name,
                'slug' => $request->name !== null ? Str::slug($request->name,'-') : $deliveryMode->slug
            ]);
            return $this->commonResponse(true,'success',new ModeOfDeliveryResource($deliveryMode),Response::HTTP_OK);
        }catch(ModelNotFoundException $exception){
            return $this->commonResponse(false,'Delivery Mode Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteModeOfDelivery(int $id): JsonResponse
    {
        try{
            $deliveryMode = ModeOfDelivery::findOrFail($id);
            $deliveryMode->delete();
            return $this->commonResponse(true,'success','',Response::HTTP_OK);
        }catch(ModelNotFoundException $exception){
            return $this->commonResponse(false,'Delivery Mode Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
