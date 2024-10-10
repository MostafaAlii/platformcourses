<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Academic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\AcademicRepositoryInterface;
use App\DataTables\Dashboard\Admin\AcademicDataTable;
use Illuminate\Support\Facades\Hash;

class AcademicController extends Controller {

    public function index() {
        $academics = Academic::paginate(10);
        return view('dashboard.Admin.academic.index', ['pageTitle' => 'Academic', 'academics' => $academics]);
    }

    public function show($uuid) {
        $admin = Academic::whereHas('profile', function ($query) use ($uuid) {
            $query->whereUuid($uuid);
        })->firstOrFail();
        //return view('admin.show', compact('admin'));
        return $admin;
    }

    public function create() {
        return view('dashboard.Admin.admins.create', ['pageTitle' => trans('dashboard/admin.admins')]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed', // Ensure passwords match
            'status' => 'required|in:active,inactive',
            'role' => 'required|in:Admin,Supervisor',
        ]);
        Academic::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => bcrypt($validated['password']), // Hash the password
            'status' => $validated['status'],
        ]);
        return redirect()->route('admin.admins.index')->with('success', 'Admin created successfully.');
    }

    public function destroy($id) {
        $admin = Academic::findOrFail($id);
        $admin->delete();
        return back()->with('success', 'Deleted successfully');
    }
    
    public function restore($id) {
        $admin = Academic::withTrashed()->findOrFail($id);
        if ($admin->trashed()) {
            $admin->restore();
        }
        return back()->with('success', 'Restored successfully');
    }

    public function edit($id) {
        $admin = Academic::findOrFail($id);
        return view('dashboard.Admin.admins.edit', ['pageTitle' => trans('dashboard/admin.admins')], compact(['admin']));
    }

    public function update(Request $request, $id) {
        $admin = Academic::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
            'phone' => 'required|string|max:20',
            'password' => 'nullable|string|min:6|confirmed', // Ensure passwords match
            'status' => 'required|in:active,inactive',
            'role' => 'required|in:Admin,Supervisor',
        ]);

        if (!empty($request->password))
            $validatedData['password'] = Hash::make($request->password);
        unset($validatedData['password']);

        if ($admin) {
            $admin->update($validatedData);
            return redirect()->route('admin.admins.index')->with('success', 'Admin updated successfully.');
        } else {
            return redirect()->route('admin.admins.index')->with('error', 'Course not found.');
        }
    }
}
