<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Form;
use App\Models\Client;
use App\Models\Question;
use App\Models\ClientForm;
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

        $questions = Question::select('id','description')->where('form_id', $form->id)->get();

        $heads = array('Client');
        foreach($questions as $question){
            array_push($heads,$question->description);
        }
        array_push($heads,'Score');

        $clientForms = ClientForm::select('client_id','score')->where('form_id', $form->id)->get();

        $responses = array();

        foreach($clientForms as $clientForm){
            $client = Client::find($clientForm->client_id);
            $clientResponses = array($client ? ($client->name ? $client->name : 'No Name') : 'No Name');
            foreach($questions as $question){
                $response = QuestionResponses::select('value')
                                ->where('question_id', $question->id)
                                ->where('client_id',$clientForm->client_id)
                                ->first();

                array_push($clientResponses,$response ? $response->value : 'No Response');
            }
            array_push($clientResponses,$clientForm->score ? $clientForm->score : 0);
            array_push($responses,$clientResponses);
        }

        return Excel::download(new ResponseExport(['data' => $responses, 'heads' => $heads]), $form->name.' Responses.csv');
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
