<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::with('instructor')->get();
        foreach ($courses as $course) {
            if ($course->image) {
                $course->image_url = asset('backend-uploads/' . $course->image);
            }
        } // Mengambil data kursus beserta instruktur
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $instructors = Instructor::all();
        return view('course.create', compact('instructors'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // Simpan data ke database
        Course::create($validated);
    
        return redirect('/admin/courses')->with('success', 'Course added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //

        
        return view('course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
        $course = Course::findOrFail($id);
        $course->update($request->all());
        return redirect('/admin/courses')->with('success', 'Courses updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect('/admin/courses')->with('success', 'Course deleted successfully.');
    }
}
