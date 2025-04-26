<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;

class ReplyController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $replys = Reply::with('courses')->get();
        foreach ($replys as $reply) {
            if ($reply->image) {
                $reply->image_url = asset('backend-uploads/' . $reply->image);
            }
        } // Mengambil data kursus beserta instruktur
        return view('user.reply', compact('replys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    //     $replys = Reply::all();
    //     return view('reply.create', compact('replys'));
    // }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'replies' => 'required|string',
            'comment_id' => 'required|string',
        ]);

        // Simpan data ke database
        Reply::create($validated);
    
        return redirect('/admin/replys')->with('success', 'Reply added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reply $reply)
    {
        //
        return view('reply.edit', compact('reply'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reply $reply)
    {
        //
        $reply = Reply::findOrFail($id);
        $reply->update($request->all());
        return redirect('/admin/replys')->with('success', 's updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply)
    {
        //
        $reply = Reply::findOrFail($id);
        $reply->delete();
        return redirect('/admin/replys')->with('success', 'Reply deleted successfully.');
    }
}
