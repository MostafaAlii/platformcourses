<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CourseRepositoryInterface;
use App\DataTables\Dashboard\Admin\CourseDataTable;
use App\Models\Category;
use App\Models\Course;
use App\Models\Playlist;
use App\Models\Teacher;

class CoursesController extends Controller implements CourseRepositoryInterface
{
    public function __construct(protected CourseDataTable $courseDataTable, protected CourseRepositoryInterface $courseRepositoryInterface) {
        $this->courseRepositoryInterface = $courseRepositoryInterface;
        $this->courseDataTable = $courseDataTable;
    }

    public function index(CourseDataTable $courseDataTable) {
        return $this->courseRepositoryInterface->index($this->courseDataTable);
    }

    public function create()
    {
        $categories = Category::all();
        $teachers = Teacher::all();
        return view('dashboard.Admin.courses.create', ['pageTitle' => trans('dashboard/admin.courses')] , compact(['categories','teachers']));

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'teacher_id' => 'required|exists:teachers,id',
            'image' => 'nullable|image', // Validate image
            'Price'=>'required',
            'category_id'=>'nullable'
        ]);

        
    
        $course = Course::create([
            'name' => $validatedData['name'],
            'desc' => $validatedData['description'],
            'teacher_id' => $validatedData['teacher_id'],
            'Price'=> $validatedData['Price'],
            'category_id'=>$validatedData['category_id'],
        ]);

        if ($request->hasFile('image')) {
            $course->addMediaFromRequest('image')->toMediaCollection('courses');
        }
        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return back()->with('success','Deleted successfully');
    }

    public function restore($id)
    {
        $course = Course::withTrashed()->findOrFail($id);
        if($course -> trashed())
        {
            $course->restore();
        }
        
        return back()->with('success','Restored successfully');
    }


    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $categories = Category::all();
        $teachers = Teacher::all();

        return view('dashboard.Admin.courses.edit', ['pageTitle' => trans('dashboard/admin.courses')] , compact(['course','categories','teachers']));
    }

    public function update(Request $request,$id)
    {
        $course = Course::findOrFail($id);


        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'teacher_id' => 'required|exists:teachers,id',
            'image' => 'nullable|image', // Validate image
            'Price'=>'required',
            'category_id'=>'nullable'
        ]);

        
    
        if ($course) {
            // Update the course with validated data
            $course->update($validatedData);
    
            // Redirect with a success message
            return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
        } 
        
        else {
            // Handle the case where the course is not found
            return redirect()->route('dashboard.Admin.courses.edit')->with('error', 'Course not found.');
        }

        if ($request->hasFile('image')) {

            $course->clearMediaCollection('courses');
           
        }

        $course->addMediaFromRequest('image')->toMediaCollection('courses');

      


    }

}


