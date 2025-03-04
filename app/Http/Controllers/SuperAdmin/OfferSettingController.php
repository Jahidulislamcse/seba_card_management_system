<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('SuperAdmin.offer.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'offer-img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dedline' => 'required|string',
            'admin-type' => 'required|in:word-amin,union-amin,upazilla-amin',
        ]);

        $image_name = null;

        if ($request->hasFile('offer-img')) { // Fix: Use 'offer-img' instead of 'banner'
            $image = $request->file('offer-img');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/offers'), $image_name);
        }

        Offer::create([
            'banner' => $image_name ? 'upload/offers/' . $image_name : null, // Handle case when no image is uploaded
            'deadline' => $request->dedline,
            'admin_type' => $request->input('admin-type'),
        ]);

        return redirect()->back()->with('success', 'Offer saved successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
