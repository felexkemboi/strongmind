<?php


namespace App\Traits;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponser
{
    /**
     * Build  response
     * //     *
     * @param boolean $status
     * @param string|array|mixed|null $message
     * @param array|string|mixed|null $result
     * @param  $code
     * @return JsonResponse
     */
    public function commonResponse(bool $status, $message, $result, $code): JsonResponse
    {
        return response()->json(['success'=>$status,'message'=>$message,'result'=>$result],$code);
    }
}
