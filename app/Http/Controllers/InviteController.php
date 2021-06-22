<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Postmark\PostmarkClient;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class InviteController
 * @package App\Http\Controllers
 * @group Teams
 * Invite Member
 */
class InviteController extends Controller
{

    public function invite(Request $request) : JsonResponse
    {
        try {
            info(config('mail.from.address'));
            $email='davidmucioca@gmail.com';
            $client = new PostmarkClient(config('postmark.token'));
            $client->sendEmailWithTemplate(
                config('mail.from.address'),
                $email,
                'user-invitation',
                [
                        'name' => 'david musyoka',
                        'action_url' => 'https://skwea.com',
                        'support_email' => config('mail.from.address')
                    ]
            );

            return $this->commonResponse(true, 'email sent successfully!', '', Response::HTTP_CREATED);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
