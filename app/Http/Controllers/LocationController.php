<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getDistricts($division_id)
    {
        $districts = District::where('division_id', $division_id)->get();
        return response()->json($districts);
    }
}
