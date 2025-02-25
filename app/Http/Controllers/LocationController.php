<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Union;
use App\Models\Upazila;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getDistricts($division_id)
    {
        $districts = District::where('division_id', $division_id)->get();
        return response()->json($districts);
    }

    public function getUpozilas($district_id)
    {
        $upozilas = Upazila::where('district_id', $district_id)->get();
        return response()->json($upozilas);
    }

    public function getUnions($upozila_id)
    {
        $unions = Union::where('upazilla_id', $upozila_id)->get();
        return response()->json($unions);
    }

}
