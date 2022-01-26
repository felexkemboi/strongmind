<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\QuestionOptions;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateQuestionOptionsRequest;

/**
 * Class QuestionOptionsController
 * @package App\Http\Controllers
 * @group Forms
 * APIs for managing Question Options
*/

class QuestionOptionsController extends Controller
{

    /**
     * All Question options
     * @authenticated
     * @return JsonResponse
    */

    public function index(): JsonResponse
    {
        $questionOptions = QuestionOptions::all();
        return $this->commonResponse(true, 'success', $questionOptions, Response::HTTP_OK);
    }

    /**
     * Create  QuestionOptions
     * @param CreateQuestionOptionsRequest $request
     * @return JsonResponse
     * @bodyParam value string required The Response value
     * @bodyParam score  integer  optional The score of the response
     * @bodyParam question_id  integer required If the form of the question
     * @authenticated
     */

    public function create(CreateQuestionOptionsRequest $request): JsonResponse
    {
        try {
            $option = new QuestionOptions();
            $option->value = $request->value;
            $option->score = $request->score ?? $request->score ;
            $option->question_id = $request->question_id;
            if ($option->save()) {
                return $this->commonResponse(true, 'Question Option created successfully!', '', Response::HTTP_CREATED);
            }
            return $this->commonResponse(false, 'Failed to create Question Option', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Edit  QuestionOption
     * @param CreateQuestionOptionsRequest $request
     * @return JsonResponse
     * @bodyParam value string required The Response value
     * @bodyParam score  integer The score of the response
     * @bodyParam question_id  integer required If the form of the question
     * @authenticated
     */

    public function update(CreateQuestionOptionsRequest $request, int $questionOptionId): JsonResponse
    {
        try {
            $questionOption = QuestionOptions::findorFail($questionOptionId);
            if($questionOption){
                $questionOption->value = $request->value;
                $questionOption->score = $request->score ?? $request->score;
                $questionOption->question_id = $request->question_id;
                if ($questionOption->save()) {
                    return $this->commonResponse(true, 'Question updated successfully!', '', Response::HTTP_CREATED);
                }
            }
            return $this->commonResponse(false, 'Failed to update Question', 'Question Not Found', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Delete Question
     * @param  Question  $question
     * @urlParam id integer required The ID of the Question. Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $questionOptionId): JsonResponse
    {

        $questionOption = QuestionOptions::find($questionOptionId);
        if($questionOption){
            if ($questionOption->delete()) {
                return $this->commonResponse(true, 'Question Option deleted', '', Response::HTTP_OK);
            }
            return $this->commonResponse(false, 'Failed to delete the Question Option', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return $this->commonResponse(false, 'Question Option not found!', '', Response::HTTP_NOT_FOUND);
    }
}
