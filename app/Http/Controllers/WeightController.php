<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weight;

class WeightController extends Controller
{
    public function addWeights(Request $request)
    {
        $data = array(
            'weight' => $request['weight']
        );
        Weight::create($data);
    }
}
