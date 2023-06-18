<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountryStateCityController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function getState(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)
            ->get(["name", "id"]);
        return response()->json($data);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function getCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)
            ->get(["name", "id"]);
        return response()->json($data);
    }
}