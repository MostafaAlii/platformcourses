<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function __invoke() {


        return view('frontend.Cart', ['pageTitle' => trans('site/site.Cart_page_title')]);
    }
}
