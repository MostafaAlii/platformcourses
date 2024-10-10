<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Academic;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AboutContactController extends Controller
{
    public function About()
    { 
        $courses = Course::count();
        $teachers = Teacher::count();
        $academies = Academic::count();

        return view('frontend.About', ['pageTitle' => trans('site/site.About_page_title')], compact(['courses','teachers','academies']));
    }

    public function Contact()
    {   
        return view('frontend.Contact', ['pageTitle' => trans('site/site.Contact_page_title')]);
    }
}
