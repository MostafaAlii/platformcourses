<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    public function __invoke() {

        $courses = Course::whenSearch(request()->search)->paginate(15);

        return view('frontend.courses', ['pageTitle' => trans('site/site.course_page_title')],compact('courses'));
    }

    public function show($id)
    {
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



        return view(
            'frontend.coursePage' ,['pageTitle' => trans('site/site.course_page_title')],
            compact('course', 'teacher', 'courseCount', 'playlists', 'category', 'relatedCourses','totalVideos'));
    }
}
