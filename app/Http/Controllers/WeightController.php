<?php

namespace App\Http\Controllers;

use App\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class WeightController extends Controller
{
    public function addWeights(Request $request)
    {
        $data = array(
            'weight' => $request['weight']
        );
        $returnData = Weight::create($data);
        Log::debug(__METHOD__ . "The return data =>", (array)$returnData);

        if ($returnData) {
            $notification = array(
                'message' => 'Data Inserted Successfully'
            );
        }

        return Redirect::to('/')->with($notification);
    }

    public function getWeights()
    {
        $returnData = Weight::getWeightFromDB();
        Log::debug(__METHOD__ . "The return data =>", (array)$returnData);
        return Redirect::to('/')->with($returnData);
    }
}
