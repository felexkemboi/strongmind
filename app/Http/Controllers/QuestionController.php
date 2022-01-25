<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\EditQuestionRequest;
use Exception;
/**
 * Class QuestionController
 * @package App\Http\Controllers
 * @group Forms
 * APIs for managing Questions
*/

class QuestionController extends Controller
{
    /**
     * All Questions
     * @authenticated
     * @return JsonResponse
     */

    public function index(): JsonResponse
    {
        $questions = Question::all(); //with('fieldType')->get();
        return $this->commonResponse(true, 'success', $questions, Response::HTTP_OK);
    }

    /**
     * Create  Question
     * @param CreateQuestionRequest $request
     * @return JsonResponse
     * @bodyParam description          string   required The Question's description
     * @bodyParam hint                 string   required The Question's hint
     * @bodyParam form_id              integer  required The form the question belongs to
     * @bodyParam field_type_id        integer  required  If the form of the question
     * @bodyParam required             boolean  required   If the form is required
     * @bodyParam question_options_id  integer  Options of the question
     * @bodyParam multiple_selection   boolean  Options of the question
     * @authenticated
     */

    public function create(CreateQuestionRequest $request): JsonResponse
    {
        try {
            $question = new Question();
            $question->description = $request->description;
            $question->hint = $request->hint;
            $question->form_id = $request->form_id;
            $question->field_type_id = $request->field_type_id;
            $question->required = $request->required;
            $question->multiple_selection = $request->multiple_selection;
            if ($question->save()) {
                return $this->commonResponse(true, 'Question created successfully!', $question, Response::HTTP_CREATED);
            }
            return $this->commonResponse(false, 'Failed to create Question', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Get Question by Id
     * @param  Question  $question
     * @return JsonResponse
     * @urlParam id integer required The ID of the Question Example:1
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        $question = Question::with('fieldType')->firstWhere('id',$id);
        if ($question) {
            return $this->commonResponse(true, 'success', $question, Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Question Not Found!', '', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Edit  Question
     * @param EditQuestionRequest $request
     * @return JsonResponse
     * @urlParam id                    integer required The ID of the Question Example:1
     * @bodyParam description          string  required The Question's description
     * @bodyParam hint                 string           The Question's hint
     * @bodyParam form_id              integer          The form the question belongs to
     * @bodyParam field_type_id        integer          If the form of the question
     * @bodyParam required             boolean          If the question is required
     * @bodyParam question_options_id  integer          Options of the question
     * @bodyParam multiple_selection   boolean          Options of the question
     * @authenticated
     */

    public function update(EditQuestionRequest $request, int $questionId): JsonResponse
    {
        try {
            $question = Question::findorFail($questionId);
            if($question){
                $question->description = $request->description;
                $question->hint = $request->hint;
                $question->form_id = $request->form_id;
                $question->field_type_id = $request->field_type_id;
                $question->required = $request->required;
                $question->multiple_selection = $request->multiple_selection;
                if ($question->save()) {
                    return $this->commonResponse(true, 'Question updated successfully!', $question, Response::HTTP_CREATED);
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
    public function destroy(int $questionId): JsonResponse
    {
        $question = Question::findorFail($questionId);
        if ($question) {
            $question->delete();
            return $this->commonResponse(true, 'Question deleted', '', Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Question not found!', '', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Get QuestionOptions
     * @param  Question  $question
     * @return JsonResponse
     * @urlParam id integer required The ID of the Question Example:1
     * @authenticated
     */
    public function questionOptions(int $id): JsonResponse
    {
        $question = Question::with('fieldType')->firstWhere('id',$id);
        if ($question) {
            $options = $question->questionOptions;
            return $this->commonResponse(true, 'success', $options, Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Question Not Found!', '', Response::HTTP_NOT_FOUND);
        }
    }
}
