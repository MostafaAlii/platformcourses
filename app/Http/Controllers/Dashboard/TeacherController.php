<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\TeacherRepositoryInterface;
use App\DataTables\Dashboard\Admin\TeacherDataTable;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;



class TeacherController extends Controller implements TeacherRepositoryInterface
{
    public function __construct(protected TeacherDataTable $teacherDataTable, protected TeacherRepositoryInterface $teacherInterface) {
        $this->teacherInterface = $teacherInterface;
        $this->teacherDataTable = $teacherDataTable;
    }

    public function index(TeacherDataTable $teacherDataTable) {
        return $this->teacherInterface->index($this->teacherDataTable);
    }

    public function show($uuid) {
        $teacher = Teacher::whereHas('profile', function($query) use ($uuid) {
            $query->whereUuid($uuid);
        })->firstOrFail();
        //return view('admin.show', compact('admin'));
        return $teacher;
    }


    public function create()
    {
        return view('dashboard.Admin.teachers.create', ['pageTitle' => trans('dashboard/admin.teachers')]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed', // Ensure passwords match
            'status' => 'required|in:active,inactive',
        ]);

        Teacher::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => bcrypt($validated['password']), // Hash the password
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher created successfully.');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        

        return back()->with('success','Deleted successfully');
    }
    public function restore($id)
    {
        $teacher = Teacher::withTrashed()->findOrFail($id);
        if($teacher -> trashed())
        {
            $teacher->restore();
        }
        return back()->with('success','Restored successfully');
    }


    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('dashboard.Admin.teachers.edit', ['pageTitle' => trans('dashboard/admin.teachers')] , compact(['teacher']));
    }

    public function update(Request $request,$id)
    {
        $teacher = Teacher::findOrFail($id);


        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
            'phone' => 'required|string|max:20',
            'password' => 'nullable|string|min:6|confirmed', // Ensure passwords match
            'status' => 'required|in:active,inactive',
        ]);

        if (!empty($request->password)) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            // Remove the password field from the validated data if the user didn't change it
            unset($validatedData['password']);
        }

        
    
        if ($teacher) {
            // Update the playlist with validated data
            $teacher->update($validatedData);
    
            // Redirect with a success message
            return redirect()->route('admin.teachers.index')->with('success', 'Teacher updated successfully.');
        } 
        
        else {
            // Handle the case where the playlist is not found
            return redirect()->route('admin.teachers.index')->with('error', 'Course not found.');
        }
    }
}
