<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $notices = Notice::latest()->get();
        return view('SuperAdmin.notice.create', compact('notices'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'file' => 'required|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = 'upload/notices/' . $fileName;

            // Move the file to 'public/upload/notices'
            $file->move(public_path('upload/notices'), $fileName);
        } else {
            $filePath = null;
        }

        Notice::create([
            'title' => $request->title,
            'date' => $request->date,
            'file' => $filePath ? 'storage/' . $filePath : null,
        ]);

        return redirect()->back()->with('success', 'Notice saved successfully!');
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
        $notice = Notice::findOrFail($id);
        $notice->delete();

        return redirect()->route('super-admin.notice.create')->with('success', 'নোটিশটি সফলভাবে মুছে ফেলা হয়েছে।');
    }
}
