<?php


namespace App\Helpers;


use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientFormHelper
{

    public static function getFormClients(int $form)
    {
        $clientIDs = DB::table("client_form")->where('form_id', $form)->pluck('client_id');
        $clients = Client::findMany($clientIDs);
        return $clients;
    }
}
