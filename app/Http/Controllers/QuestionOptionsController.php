<?php

namespace App\Http\Controllers;

use App\Models\QuestionOptions;
use Illuminate\Http\Request;
use App\Http\Requests\CreateQuestionOptionsRequest;

/*
 *
 * Class QuestionOptionsController
 * @package App\Http\Controllers
 * @group Dynamic Fields
 *
*/

class QuestionOptionsController extends Controller
{
    /**
     * All QuestionOptions
     * @authenticated
     * @return JsonResponse
     */

    public function index(): JsonResponse
    {
        $options = QuestionOptions::all();
        return $this->commonResponse(true, 'success', options, Response::HTTP_OK);
    }

    /**
     * Create  QuestionOptions
     * @param CreateQuestionOptionsRequest $request
     * @return JsonResponse
     * @bodyParam value string required The Response value
     * @bodyParam score  integer The score of the response
     * @bodyParam question_id  integer required If the form of the question
     * @authenticated
     */

    public function create(CreateQuestionOptionsRequest $request): JsonResponse
    {
        try {
            $option = new QuestionOptions();
            $option->value = $request->value;
            $option->score = $request->score;
            $option->question_id = $request->question_id;
            if ($option->save()) {
                return $this->commonResponse(true, 'QuestionOption created successfully!', '', Response::HTTP_CREATED);
            }
            return $this->commonResponse(false, 'Failed to create QuestionOption', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Get Question by Id
     * @param  QuestionOption  $questionOption
     * @return JsonResponse
     * @urlParam id integer required The ID of the Question Example:1
     * @authenticated
     */
    public function show(QuestionOption $questionOption): JsonResponse
    {
        $questionOption = QuestionOption::findorFail($questionOptionId);
        if ($questionOption) {
            return $this->commonResponse(true, 'success', $questionOption, Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Question Option Not Found!', '', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Edit  QuestionOption
     * @param EditQuestionOptionRequest $request
     * @return JsonResponse
     * @bodyParam value string required The Response value
     * @bodyParam score  integer The score of the response
     * @bodyParam question_id  integer required If the form of the question
     * @authenticated
     */

    public function update(EditQuestionOptionRequest $request, int $questionOptionId): JsonResponse
    {
        try {
            $questionOption = QuestionOption::findorFail($questionOptionId);
            if($questionOption){
                $questionOption->value = $request->value;
                $questionOption->score = $request->score;
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
        $questionOption = QuestionOption::findorFail($questionOptionId);
        if ($questionOption) {
            $questionOption->delete();
            return $this->commonResponse(true, 'Question Option deleted', '', Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Question Option not found!', '', Response::HTTP_NOT_FOUND);
        }
    }
}
