<?php


namespace App\Actions;


use App\Http\Requests\PermissionRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Services\PermissionRoleService;
use App\Traits\ApiResponser;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\Permission\Exceptions\PermissionAlreadyExists;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;
use Exception;
class PermissionAction
{
    use ApiResponser;
    public $permissionService;
    public function __construct(PermissionRoleService $permissionRoleService)
    {
        $this->permissionService = $permissionRoleService;
    }

    public function listPermissions(): JsonResponse
    {
        try {
            $permissions = Permission::select(['id as permission_id','name','slug','description','module'])->get();
            return $this->commonResponse(true,'success', $permissions,Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to list permissions. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function createPermission(PermissionRequest $request): JsonResponse
    {
        try{
            if($newPermission = Permission::create(array_merge($request->validated(),
                ['guard_name' => PermissionRoleService::API_GUARD,
                    'slug' => Str::slug($request->name,'-')]
            ))){
                return $this->commonResponse(
                    true,
                    'Permission created successfully',
                    $this->permissionService->fetchPermissionData(Permission::findOrFail($newPermission->id)),
                    Response::HTTP_CREATED);
            }
            return $this->commonResponse(false,'Failed to create permission','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (ModelNotFoundException $modelNotFoundException){
            return $this->commonResponse(false,'Permission Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (PermissionDoesNotExist $permissionDoesNotExist){
            return $this->commonResponse(false,"Permission Does Not Exist","", Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false, $queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $ex){
            Log::critical('Failed to create permission. ERROR: '.$ex->getTraceAsString());
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function displayPermission(int $id): JsonResponse
    {
        try {
            $permission = Permission::findOrFail($id);
            return $this->commonResponse(true,'success',$this->permissionService->fetchPermissionData($permission), Response::HTTP_OK);
        }catch (ModelNotFoundException $modelNotFoundException){
            return $this->commonResponse(false,'Permission Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (PermissionDoesNotExist $exception){
            return $this->commonResponse(false,'Permission Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2], '',Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to display permission details. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updatePermission(PermissionUpdateRequest $request, int $id): JsonResponse
    {
        try{
            $permission = Permission::findById($id, $this->permissionService::API_GUARD);
            if($permission->update(
                [
                    'name' => $request->name ?? $permission->name,
                    'module' => $request->module ?? $permission->module,
                    'description' => $request->description ?? $permission->description,
                    'slug' => Str::slug($request->name,'-') ?? $permission->slug
                ]
            )){
                return $this->commonResponse(true,'Permission updated successfully',$this->permissionService->fetchPermissionData($permission), Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed to update permission','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        catch (PermissionDoesNotExist $exception){
            return $this->commonResponse(false,'Permission Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (PermissionAlreadyExists $exception){
            return $this->commonResponse(false,'Permission Already Exists','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to update permission details. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deletePermission(int $id): JsonResponse
    {
        try{
            $permission = Permission::findById($id,$this->permissionService::API_GUARD);
            if($permission->delete()){
                return $this->commonResponse(true,'Permission deleted successfully','', Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed to delete permission','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (PermissionDoesNotExist $exception){
            return $this->commonResponse(false,'Permission Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException) {
            return $this->commonResponse(false, $queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        catch (Exception $exception){
            Log::critical('Failed to delete permission. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
