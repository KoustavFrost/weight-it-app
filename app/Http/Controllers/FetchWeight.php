<?php

namespace App\Http\Controllers;

use App\Weight;
use Illuminate\Support\Facades\Log;
use App\Library\Api;

class FetchWeight extends Controller
{
    protected $weight;
    public function __construct()
    {
        $this->weight = new Weight();
    }
    public function getWeights()
    {
        $message = "Fetched Successfully";
        $statusCode = 'SUCCESS';
        $returnData = $this->weight->getWeightFromDB();
        Log::debug(__METHOD__ . "The return data =>", (array)$returnData);
        return Api::renderResponse($statusCode, $message, $returnData);
    }
}
