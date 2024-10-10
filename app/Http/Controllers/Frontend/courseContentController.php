<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class courseContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __invoke($id) {
        $course = Course::with([
            'teacher',
            'playlists.videos', // Fetch playlists and their related videos
            'category', // Assuming you have a relatedCourses relationship defined
        ])->findOrFail($id);
    
        // Get the teacher and other related data directly from the $course object
        $teacher = $course->teacher;
        $courseCount = $teacher->course->count(); // Assuming 'courses' relationship exists on the teacher model
        $playlists = $course->playlists;
        $category = $course->category;
        $relatedCourses = $course->relatedCourses();
        $totalVideos = $course->playlists->sum(function ($playlist) {
            return $playlist->videos->count();
        });

        return view('frontend.courseContent', ['pageTitle' => trans('site/site.Content_page_title')] , compact('course', 'teacher', 'courseCount', 'playlists', 'category', 'relatedCourses','totalVideos'));
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
