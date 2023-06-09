<?php


namespace App\Actions;

use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Services\PermissionRoleService;
use App\Traits\ApiResponser;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class RoleAction
{
    use ApiResponser;

    public $permissionRoleService;

    public function __construct(PermissionRoleService $permissionRoleService)
    {
        $this->permissionRoleService = $permissionRoleService;
    }

    public function listRoles(): JsonResponse
    {
        try{
            $roles = Role::with('permissions')->latest()->get()->transform(function( $role ){
                return $this->permissionRoleService->fetchRoleData($role);
            });
            return $this->commonResponse(true,'success', $roles,Response::HTTP_OK);
        }catch (QueryException $queryException){
            return $this->commonResponse(false, $queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to List Roles. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function createRole(RoleRequest $request): JsonResponse
    {
        try{
            if($newRole = Role::create(['name' => $request->name,'role_code' => strtoupper($request->role_code),'guard_name' => PermissionRoleService::API_GUARD, 'description' => $request->description])){
                $role = Role::findById($newRole->id, PermissionRoleService::API_GUARD);
                $permissions = Permission::whereIn('id', $request->permission_id)->get();
                foreach ($permissions as $permission){
                    $role->givePermissionTo($permission);
                }
                return $this->commonResponse(true,'Role Created Successfully',$this->permissionRoleService->fetchRoleData($newRole), Response::HTTP_CREATED);
            }
            return $this->commonResponse(false,'Failed to create role','', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (RoleAlreadyExists $roleAlreadyExists){
            return $this->commonResponse(false,$roleAlreadyExists->getMessage(),'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to create role. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function displayRole(int $id): JsonResponse
    {
        try {
            $role = Role::findById($id,PermissionRoleService::API_GUARD);
            return $this->commonResponse(true,'success',$this->permissionRoleService->fetchRoleData($role), Response::HTTP_OK);
        } catch (PermissionDoesNotExist $exception){
            return $this->commonResponse(false,'Permission Does Not Exist','', Response::HTTP_NOT_FOUND);
        } catch (RoleDoesNotExist $exception){
            return $this->commonResponse(false,'Role Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2], '',Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to display role details. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateRole(RoleUpdateRequest $request, int $id): JsonResponse
    {
        try{
            $role = Role::findById($id, PermissionRoleService::API_GUARD);
            if($role->update([
                'name' => $request->name ?? $role->name,
                'role_code' => $request->role_code ?? $role->role_code,
                'description' => $request->description ?? $role->description
            ])){
                $permissions = Permission::whereIn('id', $request->permission_id)->get();
                $role->syncPermissions($permissions);
                return $this->commonResponse(true,'Role Updated Successfully',$this->permissionRoleService->fetchRoleData($role), Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed to update role','', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (PermissionDoesNotExist $exception){
            return $this->commonResponse(false,'Permission Does Not Exist','', Response::HTTP_NOT_FOUND);
        } catch (RoleDoesNotExist $exception){
            return $this->commonResponse(false,'Role Does Not Exist','', Response::HTTP_NOT_FOUND);
        }
        catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2], '',Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to update role. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteRole(int $id): JsonResponse
    {
        try{
            $role = Role::findById($id, PermissionRoleService::API_GUARD);
            if($role->delete()){
                return $this->commonResponse(true,'Role deleted successfully','', Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed to delete role','', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (PermissionDoesNotExist $exception){
            return $this->commonResponse(false,'Permission Does Not Exist','', Response::HTTP_NOT_FOUND);
        } catch (RoleDoesNotExist $exception){
            return $this->commonResponse(false,'Role Does Not Exist','', Response::HTTP_NOT_FOUND);
        } catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2], '',Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to update role. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
