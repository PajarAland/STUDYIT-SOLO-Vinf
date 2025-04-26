<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;

class TaskController extends Controller
{
    //
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks = Task::with('moduls')->get();
        foreach ($tasks as $modul) {
            if ($modul->image) {
                $modul->image_url = asset('backend-uploads/' . $modul->image);
            }
        } // Mengambil data kursus beserta instruktur
        return view('modul.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    //     $tasks = Task::all();
    //     return view('modul.create', compact('tasks'));
    // }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'FileTask' => 'required|file|mimes:jpg,png,pdf,doc,docx|max:2048',
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Simpan data ke database
        Task::create($validated);
    
        return redirect('/admin/tasks')->with('success', 'Task added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $modul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $modul)
    {
        //
        return view('modul.edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $modul)
    {
        //
        $modul = Task::findOrFail($id);
        $modul->update($request->all());
        return redirect('/admin/tasks')->with('success', 'Tasks updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/admin/tasks')->with('success', 'Task deleted successfully.');
    }

    public function enroll($modul_id)
    {
        $modul = Task::find($modul_id);
        if (!$modul) {
            abort(404, ' not found');
        } //
        return view('modul.index',['modul_id' => $modul_id]);
    }

    public function enrolll($user_id)
    {
        $user = Task::find($user_id);
        if (!$user) {
            abort(404, ' not found');
        } //
        return view('modul.index',['user_id' => $user_id]);
    }
}