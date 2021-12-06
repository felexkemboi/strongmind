<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateQuestionResponseRequest;
use App\Http\Requests\EditQuestionResponseRequest;
use App\Models\QuestionResponses;

/*
 *
 * Class QuestionResponsesController
 * @package App\Http\Controllers
 * @group Dynamic Fields
 *
*/

class QuestionResponsesController extends Controller
{
    /**
     * All QuestionResponses
     * @authenticated
     * @return JsonResponse
     */

    public function index(): JsonResponse
    {
        $options = QuestionResponses::all();
        return $this->commonResponse(true, 'success', options, Response::HTTP_OK);
    }

    /**
     * Create  QuestionResponse
     * @param CreateQuestionResponseRequest $request
     * @return JsonResponse
     * @bodyParam value string required The Response value
     * @bodyParam score  integer The score of the response
     * @bodyParam question_id  integer required If the form of the question
     * @authenticated
     */

    public function create(CreateQuestionResponseRequest $request): JsonResponse
    {
        try {
            $option = new QuestionResponse();
            $option->value = $request->value;
            $option->score = $request->score;
            $option->question_id = $request->question_id;
            if ($option->save()) {
                return $this->commonResponse(true, 'Question Response created successfully!', '', Response::HTTP_CREATED);
            }
            return $this->commonResponse(false, 'Failed to create Question Response', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Get Question by Id
     * @param  QuestionResponse  $questionOption
     * @return JsonResponse
     * @urlParam id integer required The ID of the Question Example:1
     * @authenticated
     */
    public function show(QuestionResponse $questionResponseId): JsonResponse
    {
        $questionResponse = QuestionResponse::findorFail($questionResponseId);
        if ($questionResponse) {
            return $this->commonResponse(true, 'success', $questionResponse, Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Question Response Not Found!', '', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Edit  EditQuestionResponse
     * @param EditQuestionResponseRequest $questionResponseId
     * @return JsonResponse
     * @bodyParam value string required The Response value
     * @bodyParam score  integer The score of the response
     * @bodyParam question_id  integer required If the form of the question
     * @authenticated
     */

    public function update(EditQuestionResponseRequest $request, int $questionResponseId): JsonResponse
    {
        try {
            $questionResponse = QuestionResponse::findorFail($questionOptionId);
            if($questionResponse){
                $questionResponse->value = $request->value;
                $questionResponse->option_id = $request->option_id;
                $questionOption->question_id = $request->question_id;
                $questionOption->client_id = $request->client_id;
                if ($questionOption->save()) {
                    return $this->commonResponse(true, 'Question Response updated successfully!', '', Response::HTTP_CREATED);
                }
            }
            return $this->commonResponse(false, 'Failed to update Question Response', 'Question Response Not Found', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Delete QuestionResponse
     * @param  QuestionResponse  $questionResponse
     * @urlParam id integer required The ID of the Question. Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $questionResponseId): JsonResponse
    {
        $questionResponse = QuestionResponse::findorFail($questionResponseId);
        if ($questionResponse) {
            $questionResponse->delete();
            return $this->commonResponse(true, 'Question Response deleted', '', Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Question Response not found!', '', Response::HTTP_NOT_FOUND);
        }
    }
}
