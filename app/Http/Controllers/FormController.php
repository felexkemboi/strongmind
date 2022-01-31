<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Form;
use App\Models\Question;
use App\Models\QuestionResponses;
use Illuminate\Http\Request;
use App\Models\FieldType;
use App\Models\QuestionOptions;
use App\Models\ClientBioData;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateFormRequest;
use App\Http\Requests\EditFormRequest;
use App\Http\Requests\CreateResponsesRequest;

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
     * @authenticated
     * @return JsonResponse
     */

    public function index(): JsonResponse
    {
        $forms = Form::all();
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
            $form->status_id = $request->status_id ?? '';
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
     * @param  CreateResponsesRequest  $request
     * @return JsonResponse
     * @urlParam id integer required The ID of the Form Example:1
     * @bodyParam value string required
     * @bodyParam question_id int required
     * @bodyParam client_id int  required
     * @bodyParam option_id int
     * @authenticated
     */
    public function createResponse(Request $request, $id): JsonResponse
    {
        // foreach ($request->responses as $response) {
        //     $response = new QuestionResponses();
        //     $response->value = $response->value;
        //     $response->question_id = $response->question_id;
        //     $response->client_id = $response->client_id;
        //     $response->form_id = $form->id;
        //     $response->option_id = $response->option_id;
        //     if ($response->save()) {
        //         if (!$form->response_count) {
        //             $form->response_count = 1;
        //             $form->save();
        //         }
        //         $form->response_count = $form->response_count + 1;
        //         $form->save();
        //     }

        // }

        $form = Form::find($id);

        $response = new QuestionResponses();
        $response->value = $request->value;
        $response->question_id = $request->question_id;
        $response->client_id = $request->client_id;
        $response->form_id = $form->id;
        $response->option_id = $request->option_id;
        if ($response->save()) {
            if (!$form->response_count) {
                $form->response_count = 1;
                $form->save();
            }
            $form->response_count = $form->response_count + 1;
            $form->save();
        }

        return $this->commonResponse(true, 'Success', 'Responses Added Successfully', Response::HTTP_OK);
    }

    /**
     * Get Question Responses
     * @param  Form  $form
     * @return JsonResponse
     * @urlParam id integer required The ID of the Form Example:1
     * @authenticated
     */
    public function getResponses(Form $form): JsonResponse
    {
        $responses = QuestionResponses::where('form_id', $form->id)->get();
        $payload = collect();
        foreach ($responses as $response) {
            $question = Question::find($response->question_id);
            $option = QuestionOptions::find($response->option_id);
            $client   = ClientBioData::select('first_name','last_name')->firstWhere('client_id', $response->client_id);
            $payload->push([
                'value' => $response->value,
                'question' => $question->description,
                'client' => $client ? $client->first_name .' '.$client->last_name : '',
                'question_option' => $option ? $option->value : '' ,
            ]);
        }

        if ($payload) {
            return $this->commonResponse(true, 'success', $payload, Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Question Responses Not Found!', '', Response::HTTP_NOT_FOUND);
        }
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

            if (!$form->response_count > 0 ) {
                if ($form->delete()) {
                    return $this->commonResponse(true, 'Form deleted', '', Response::HTTP_OK);
                }
                return $this->commonResponse(false, 'Failed to delete the form', '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            return $this->commonResponse(false, 'Failed to delete the form', 'The form has responses', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return $this->commonResponse(false, 'Form not found!', '', Response::HTTP_NOT_FOUND);
    }
}
