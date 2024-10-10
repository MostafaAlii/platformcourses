<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
class FrontendController extends Controller {
    public function __invoke() {
        $courses = Course::all();
        $categories = Category::all();

        return view('frontend.home', ['pageTitle' => trans('site/site.home_page_title')] ,compact(['courses','categories']));
    }
}
