<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponser
{
    /**
     * Success Response
     *
     * @param mixed $data
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function successResponse($data, $code = Response::HTTP_OK){
         // old code
         // return response()->json(['data' => $data, 'site' => 1], $code);
         // this code is changes since the message to return is already
         return response($data, $code)->header('Content-Type','application/json');
    }

    public function validResponse($data, $code = Response::HTTP_OK) {
        return response()->json(['data' => $data], $code);
    }

    /**
     * Error Response
     *
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function errorResponse($message, $code){
        return response()->json(['error' => $message, 'code' => $code],$code);
    }

    protected function errorMessage($message, $code){
        return response($message, $code)->header('Content-Type','application/json');
    }
}
