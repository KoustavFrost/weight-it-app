<?php

namespace App\Library;

use Response;

class Api
{

    /**
     * Formatting json result
     * @param type $statusCode
     * @param type $data
     * @param type $message
     * @param type $http_response only sent when exception is thrown
     * @return type
     */
    public static function renderResponse($statusCode, $message, $data, $http_response = false)
    {
        $response = array(
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => $data
        );
        return $http_response ? Response::json($response, $statusCode) : Response::json($response);
    }
}
