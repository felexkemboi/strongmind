<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Form;
use App\Models\Question;
use App\Exports\ResponseExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use App\Models\QuestionResponses;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\EditQuestionResponseRequest;
use App\Http\Requests\CreateQuestionResponseRequest;

/**
 * Class QuestionResponsesController
 * @package App\Http\Controllers
 * @group Forms
 * APIs for managing Question Responses
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
        return $this->commonResponse(true, 'success', $options, Response::HTTP_OK);
    }

    /**
     * Download Question Responses
     * @urlParam id integer required The ID of the Form. Example:1
     * @authenticated
     * @return JsonResponse
    */

    public function downloadResponses($formId)
    {
        $form = Form::findorFail($formId);
        $responses =  DB::table('questionresponses')
        ->leftjoin('questions',       'questionresponses.question_id','=', 'questions.id')
        ->leftjoin('clients',         'questionresponses.client_id','=',   'clients.id')
        ->leftjoin('groups',          'questionresponses.group_id','=',    'groups.id')
        // ->leftjoin('questionsoptions', DB::raw("CAST('questionresponses.option_id' AS INTEGER)"),'=',   'questionsoptions.id')
        ->leftjoin('forms',           'questionresponses.form_id','=',     'forms.id')
        ->leftjoin('group_sessions',  'questionresponses.session_id','=',  'group_sessions.id')
        ->leftjoin('statuses',        'questionresponses.status_id','=',   'statuses.id')
        ->select(
            DB::raw('
                questions.description,
                clients.name,
                clients.patient_id,
                groups.name,
                forms.name,
                questionsoptions.value,
                statuses.name,
                questionsoptions.score
            ')
        )
        ->where(function($query) use ($form){
            $query->where('questionresponses.form_id',$form->id);
        })
        ->get();
        return Excel::download(new ResponseExport($responses), $form->name.' Responses.csv');
    }

    /**
     * Create  QuestionResponse
     * @param CreateQuestionResponseRequest $request
     * @return JsonResponse
     * @bodyParam value string required The Response value
     * @bodyParam score  integer The score of the response
     * @bodyParam question_id  integer required If the form of the question
     * @bodyParam client_id  integer  required The client
     * @authenticated
     */

    public function create(CreateQuestionResponseRequest $request): JsonResponse
    {
        try {

            $question = Question::findorFail($request->question_id);
            $form = Form::findorFail($question->form_id);

            $response = new QuestionResponses();
            $response->value = $request->value;
            $response->score = $request->score;
            $response->question_id = $request->question_id;
            $response->client_id = $request->client_id;
            $response->form_id = $form->id;
            $response->option_id = $question->question_options_id;

            if ($response->save()) {

                if(!$form->response_count){
                    $form->response_count = $form->questionResponses->count();
                    $form->save();
                    return $this->commonResponse(true, 'Question Response created successfully!', $question, Response::HTTP_CREATED);
                }
                $form->response_count = $form->questionResponses->count();
                $form->save();
                return $this->commonResponse(true, 'Question Response created successfully!', $question, Response::HTTP_CREATED);
            }
            return $this->commonResponse(false, 'Failed to create Question Response', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
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
            $questionResponse = QuestionResponses::findorFail($questionResponseId);
            if($questionResponse){
                $questionResponse->value = $request->value;
                $questionResponse->score = $request->score;
                $questionResponse->option_id = $request->option_id;
                $questionResponse->question_id = $request->question_id;
                $questionResponse->client_id = $request->client_id;
                if ($questionResponse->save()) {
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

        $questionResponse = QuestionResponses::find($questionResponseId);
        if($questionResponse){
            if ($questionResponse->delete()) {

                $question = Question::findorFail($questionResponse->question_id);
                $form = Form::findorFail($question->id);
                if($form->response_count){
                    $count = $form->response_count - 1;
                    $form->response_count = $count;
                    $form->save();
                    return $this->commonResponse(true, 'Question Response created successfully!', '', Response::HTTP_CREATED);
                }
                return $this->commonResponse(true, 'Question Response deleted', '', Response::HTTP_OK);
            }
            return $this->commonResponse(false, 'Failed to delete the Question Response', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return $this->commonResponse(false, 'Question Response not found!', '', Response::HTTP_NOT_FOUND);
    }
}
