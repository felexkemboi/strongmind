<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateLanguageRequest;
use Illuminate\Database\QueryException;
use Exception;

/**
 * Class LanguageController
 * @package App\Http\Controllers
 * @group Languages
 * APIs for managing languages
 */

class LanguageController extends Controller
{
    /**
     * All Languages
     * @group Languages
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
     * @group Languages
     * @param CreateLanguageRequest $request
     * @bodyParam name string required . The Language's Name
     * @return JsonResponse
     * @authenticated
     */

    public function create(CreateLanguageRequest $request): JsonResponse
    {
        try {
            $client = new Language();
            $client->name = $request->name;
            if ($client->save()) {
                return $this->commonResponse(true, 'Language created successfully!', '', Response::HTTP_CREATED);
            }
            return $this->commonResponse(false, 'Failed to create Language', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}