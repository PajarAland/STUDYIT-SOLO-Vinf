<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModulComment;

class CommentController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $comments = ModulComment::with('courses')->get();
        foreach ($comments as $comment) {
            if ($comment->image) {
                $comment->image_url = asset('backend-uploads/' . $comment->image);
            }
        } // Mengambil data kursus beserta instruktur
        return view('user.comment', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    //     $comments = ModulComment::all();
    //     return view('comment.create', compact('comments'));
    // }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'comment' => 'required|string',
            'modul_id' => 'required|string',
        ]);

        // Simpan data ke database
        ModulComment::create($validated);
    
        return redirect('/admin/comments')->with('success', 'ModulComment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ModulComment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModulComment $comment)
    {
        //
        return view('comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModulComment $comment)
    {
        //
        $comment = ModulComment::findOrFail($id);
        $comment->update($request->all());
        return redirect('/admin/comments')->with('success', 'Moduls updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModulComment $comment)
    {
        //
        $comment = ModulComment::findOrFail($id);
        $comment->delete();
        return redirect('/admin/comments')->with('success', 'ModulComment deleted successfully.');
    }
}
