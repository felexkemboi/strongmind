<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

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
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        $languages = Language::all();
        return $this->commonResponse(true, 'success', $languages, Response::HTTP_OK);
    }
}
