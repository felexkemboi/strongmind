<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateLanguageRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Exception;

/**
 * APIs for managing languages
 *
 * Class LanguageController
 * @package App\Http\Controllers
 * @group Dynamic Fields
 *
 */

class LanguageController extends Controller
{
    /**
     * All Languages
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        $languages = Language::all();
        return $this->commonResponse(true, 'success', $languages, Response::HTTP_OK);
    }



    /**
     * Create Language
     * @param CreateLanguageRequest $request
     * @bodyParam name string required . The Language's Name
     * @return JsonResponse
     * @authenticated
     */

    public function create(CreateLanguageRequest $request): JsonResponse
    {
        try {
            $language = new Language();
            $language->name = $request->name;
            if ($language->save()) {
                return $this->commonResponse(true, 'Language created successfully!', $language, Response::HTTP_CREATED);
            }
            return $this->commonResponse(false, 'Failed to create Language', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Edit Language
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @bodyParam name string required . The Language's Name
     * @authenticated
     */

    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $language = Language::find($id);
            if($language){
                $language->name = $request->name;
                if ($language->save()) {
                    return $this->commonResponse(true, 'Language updated successfully!', $language, Response::HTTP_CREATED);
                }
            }
            return $this->commonResponse(false, 'Failed to update Language', 'Language Not Found', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Delete Language
     * @param int $id
     * @urlParam id integer required The ID of the role. Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $id): JsonResponse
    {
        $language = Language::find($id);
        if ($language) {
            $language->delete();
            return $this->commonResponse(true, 'Language deleted', '', Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Language not found!', '', Response::HTTP_NOT_FOUND);
        }
    }
}
