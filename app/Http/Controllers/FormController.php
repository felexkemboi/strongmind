<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Form;
use App\Models\Question;
use App\Models\Client;
use App\Models\QuestionResponses;
use Illuminate\Http\Request;
use App\Models\FieldType;
use App\Models\ClientForm;
use App\Models\QuestionOptions;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateFormRequest;
use App\Http\Requests\EditFormRequest;

/**
 * APIs for managing FormController
 *
 * Class FormController
 * @package App\Http\Controllers
 * @group Forms
 *
 */

class FormController extends Controller
{
    /**
     * All Forms
     * @return JsonResponse
     * @queryParam published integer  Filter wether Published/Not Published(Either 1,0)
     * @queryParam status_id integer  Filter by the status
     * @authenticated
     */
    public function index(Request $request): JsonResponse
    {

        $published = $request->published;
        $status = $request->status_id;
        $forms = Form::select()
                ->when(
                    $published == '1',
                    function ($query) {
                    return $query->whereNotNull('published_at');
                })
                ->when(
                    $published == '0',
                    function ($query) {
                    return $query->whereNull('published_at');
                })
                ->when(
                    $status,
                    function ($query) use ($status) {
                    return $query->where('status_id', '=', $status);
                })
                ->get();
        return $this->commonResponse(true, 'success', $forms, Response::HTTP_OK);
    }

    /**
     * All Field Types
     * @authenticated
     * @return JsonResponse
     */

    public function fieldTypes(): JsonResponse
    {
        $field_types = FieldType::all();
        return $this->commonResponse(true, 'success', $field_types, Response::HTTP_OK);
    }



    /**
     * Create  Form
     * @param CreateFormRequest $request
     * @return JsonResponse
     * @bodyParam name string required The Form's Name
     * @bodyParam assessment boolean required  The Form's status
     * @bodyParam status_id integer  The Form's status
     * @authenticated
     */

    public function create(CreateFormRequest $request): JsonResponse
    {
        try {
            $form = new Form();
            $form->name = $request->name;
            $form->assessment = $request->assessment;
            $form->status_id = $request->status_id ? $request->status_id : '';
            if ($form->save()) {
                return $this->commonResponse(true, 'Form created successfully!', $form, Response::HTTP_CREATED);
            }
            return $this->commonResponse(false, 'Failed to create Form', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Get Form by Id
     * @param int $id
     * @return JsonResponse
     * @urlParam id integer required The ID of the Form Example:1
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        $form = Form::find($id);
        if ($form) {
            return $this->commonResponse(true, 'success', $form, Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Form Not Found!', '', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Publish form
     * @param  Form  $form
     * @return JsonResponse
     * @urlParam id integer required The ID of the Form Example:1
     * @authenticated
     */
    public function publish($id): JsonResponse
    {
        $form = Form::findorFail($id);
        if ($form) {
            $form->published_at =  now();
            $form->save();
            return $this->commonResponse(true, 'Form successfully Published', $form, Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Form Not Found!', '', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Get Questions
     * @param  Form  $form
     * @return JsonResponse
     * @urlParam id integer required The ID of the Form Example:1
     * @authenticated
     */
    public function questions(int  $id): JsonResponse
    {
        $form = Form::findorFail($id);
        if ($form) {
            $questions = $form->questions;
            return $this->commonResponse(true, 'success', $questions, Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Question Not Found!', '', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Add Question Responses
     * @return JsonResponse
     * @urlParam id integer required The ID of the Form Example:1
     * @authenticated
     */
    public function createResponse(Request $request, $id): JsonResponse
    {
        $form = Form::find($id);
        $totalScore = 0;
        foreach ($request->responses as $record) {

            $existingResponse = QuestionResponses::where([['client_id', '=', $record['client_id']],['question_id', '=', $record['question_id']]])->first();


            if ($existingResponse !== null) {
                $existingResponse->update([
                    'score' => $record['score'],
                    'value' => $record['value'],
                ]);
            } else {
                $response = new QuestionResponses();
                $response->score = $record['score'];
                $response->value = $record['value'];
                $response->question_id = $record['question_id'];
                $response->client_id = $record['client_id'];
                $response->session_id = $record['session_id'];
                $response->group_id = $record['group_id'];
                $response->form_id = $form->id;
                $response->option_id = $record['option_id'];
                $response->status_id = $form->status_id;

                if ($response->save()) {
                    if (!$form->response_count) {
                        $form->response_count = $form->questionResponses->count();
                        $form->save();
                    }
                    $form->response_count = $form->questionResponses->count();
                    $form->save();
                }
            }

            if($record['score']){
                $totalScore = $totalScore + (int)$record['score'];
            }
        }

        $clientForm = new ClientForm();
        if($form->assessment){
            $clientForm->score = $totalScore;
        }
        $clientForm->status_id = $form->status_id;
        $clientForm->completed = $request->completed;
        $clientForm->client_id = $request->responses[0]['client_id'];
        $clientForm->form_id = $form->id;
        $clientForm->save();

        return $this->commonResponse(true, 'Success', 'Responses Added Successfully', Response::HTTP_OK);
    }
    /**
     * Get Form Question Responses
     * @param  Form  $form
     * @return JsonResponse
     * @urlParam id integer required The ID of the Form Example:1
     * @authenticated
     */
    public function getResponses(int $id): JsonResponse
    {
        $form = Form::find($id);
        if ($form) {
            $clients = QuestionResponses::select('client_id')->where('form_id', $form->id)->distinct()->get();
            $clientForm = ClientForm::select('score','created_at')->where('form_id', $id)->orderBy('created_at','desc')->get(); // all(); //select('score')->where('form_id', $form->id);//->orderBy('created_at','desc');//->firstWhere('form_id', $form->id)->get();
            $score = 0;
            if(count($clientForm) > 0){
                $score = $clientForm[0]->score;
            }

            $payload = array();
            foreach ($clients as $client) {
                $clientDetails   = Client::select('name','patient_id')->firstWhere('id', $client['client_id']);
                $responses = QuestionResponses::where('form_id', $form->id)->where('client_id', $client['client_id'])->get();
                $clientResponses = array();
                $mutiplechoiceResponses = array();
                foreach ($responses as $response) {
                    $question = Question::find($response->question_id);
                    if($response->option_id){
                        $questionId = (string)$response->question_id;
                        if(isset($mutiplechoiceResponses[$questionId])){
                            $mutiplechoiceResponses[$questionId]['value'] .= ', '.$response->value;
                        }else{
                            $clientResponse = array(
                                'value' => $response->value,
                                'question' => $question ? $question->description : '',
                                'question_id' => $response->question_id ? (int)$response->question_id : '',
                            );
                            $mutiplechoiceResponses[$questionId] = $clientResponse;
                        }
                    }else{
                        $clientResponse = array(
                            'value' => $response->value,
                            'question' => $question ? $question->description : '',
                            'question_id' => $response->question_id ? (int)$response->question_id : '',
                        );
                        array_push($clientResponses,$clientResponse);
                    }
                }

                $responses = array_merge($clientResponses,$mutiplechoiceResponses);

                $clients = array(
                    'score' => $score,
                    'clientId' => $client['client_id'],
                    'clientName' => !$clientDetails ? '' : ($clientDetails->name ? $clientDetails->name  : $clientDetails->patient_id),
                    'responses' => $responses
                );

                array_push($payload,$clients);
            }
            return $this->commonResponse(true, 'success', $payload, Response::HTTP_OK);
        }
        return $this->commonResponse(false, 'Form Not Found!', '', Response::HTTP_NOT_FOUND);
    }

    /**
     * Client Form  Responses
     * @param  Form  $form
     * @return JsonResponse
     * @urlParam id integer required The ID of the Form Example:1
     * @queryParam  client_id integer  The ID of the Client Example:1
     * @authenticated
     */
    public function getClientFormResponses(Request $request, int $id): JsonResponse
    {
        $form = Form::find($id);
        $clientId = $request->client_id;
        if ($form) {
            $clients = QuestionResponses::select('client_id')
                            ->where('form_id', $form->id)
                            ->when($clientId, function ($query, $clientId) {
                                return $query->where('client_id',$clientId);
                            })
                            ->distinct()
                            ->get();

            $clientForm = ClientForm::select('score','created_at')->where('form_id', $id)->orderBy('created_at','desc')->get();
            $score = 0;
            if(count($clientForm) > 0){
                $score = $clientForm[0]->score;
            }
            $payload = array();
            foreach ($clients as $client) {
                $clientDetails   = Client::select('name','patient_id')->firstWhere('id', $client['client_id']);
                $responses = QuestionResponses::where('form_id', $form->id)->where('client_id', $client['client_id'])->get();
                $clientResponses = array();
                foreach ($responses as $response) {
                    $question = Question::find($response->question_id);
                    $questionOption = QuestionOptions::find($response->option_id);
                    $clientResponse = array(
                        'value' => $response->value,
                        'question' => $question ? $question->description : '',
                        'question_option' => $questionOption ? $questionOption->value : '',
                        'question_id' => $response->question_id ? (int)$response->question_id : '',
                    );
                    array_push($clientResponses,$clientResponse);
                }
                $clients = array('score' => $score, 'clientId' => $client['client_id'],'clientName' => !$clientDetails ? '' : ($clientDetails->name ? $clientDetails->name  : $clientDetails->patient_id), 'responses' => $clientResponses);
                array_push($payload,$clients);
            }
            return $this->commonResponse(true, 'success', $payload, Response::HTTP_OK);
        }
        return $this->commonResponse(false, 'Form Not Found!', '', Response::HTTP_NOT_FOUND);
    }



    /**
     * Get Client Forms
     * @param  Form  $form
     * @return JsonResponse
     * @queryParam status_id int  The Status ID
     * @urlParam id integer required The ID of the Client Example:1
     * @authenticated
     */
    public function clientForms(Request $request, int $id): JsonResponse
    {

        $status_id = $request->status_id;
        $clientForms = ClientForm::select('form_id','score','completed','created_at')
                ->where('client_id', $id)
                ->when($status_id, function ($query, $status_id) {
                    return $query->where('status_id',$status_id);
                })
                ->get();

        return $this->commonResponse(true, 'Success', $clientForms, Response::HTTP_OK);

    }


    /**
     * Edit Form
     * @param CreateFormRequest $request
     * @return JsonResponse
     * @urlParam id integer required The ID of the Form Example:1
     * @bodyParam name string required The Form's Name
     * @bodyParam status_id integer  The Form's status
     * @authenticated
     */

    public function update(EditFormRequest $request, int $id): JsonResponse
    {
        try {
            $form = Form::find($id);
            if($form){
                $form->name = $request->name;
                $form->status_id = $request->status_id;
                $form->assessment = $request->assessment;
                if ($form->save()) {
                    return $this->commonResponse(true, 'Form updated successfully!', $form, Response::HTTP_CREATED);
                }
            }
            return $this->commonResponse(false, 'Failed to update Form', 'Form Not Found', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Delete Form
     * @param int $id
     * @urlParam id integer required The ID of the Form. Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $id): JsonResponse
    {
        $form = Form::find($id);
        if($form){

            $form->update([
                'name' => $form->name.'-deleted-'.now(),
            ]);
            if ($form->delete()) {
                return $this->commonResponse(true, 'Form deleted', '', Response::HTTP_OK);
            }
            return $this->commonResponse(false, 'Failed to delete the form', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return $this->commonResponse(false, 'Form not found!', '', Response::HTTP_NOT_FOUND);
    }
}
