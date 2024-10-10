<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\DataTables\Dashboard\Admin\AdminDataTable;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Http\Requests\Dashboard\CategoryValidationRequest;
class CategoryController extends Controller implements CategoryRepositoryInterface
{
    public function __construct(protected AdminDataTable $adminDataTable, protected CategoryRepositoryInterface $categoryInterface) {
        $this->categoryInterface = $categoryInterface;
        $this->adminDataTable = $adminDataTable;
    }

    public function index(AdminDataTable $adminDataTable) {
        return $this->categoryInterface->index($this->adminDataTable);
    }

    public function store(CategoryValidationRequest $request) {
        $this->categoryInterface->store($request);
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('dashboard.Admin.categories.edit', ['pageTitle' => trans('dashboard/admin.admins')] , compact(['category']));
    }

    public function update(Request $request , $id)
    {
        // Validate the form inputs
        $validated = $request->validate([
            'name.ar' => 'required|string|max:255',
            'name.en' => 'required|string|max:255',
            'description.ar' => 'nullable|string|max:1000',
            'description.en' => 'nullable|string|max:1000',
            'parent' => 'nullable|exists:categories,id', // Ensure parent is valid if present
        ]);

        // Find the category
        $category = Category::findOrFail($id);

        // Update category parent if it exists
        $category->parent = $request->input('parent');
        $category->save();

        // Update or create Arabic translation
        $category->details()->updateOrCreate(
            ['locale' => 'ar'], // Find translation by locale
            [
                'name' => $validated['name']['ar'], // Update the Arabic name
                'description' => $validated['description']['ar'], // Update Arabic description
            ]
        );

        // Update or create English translation
        $category->details()->updateOrCreate(
            ['locale' => 'en'], // Find translation by locale
            [
                'name' => $validated['name']['en'], // Update the English name
                'description' => $validated['description']['en'], // Update English description
            ]
        );

        // Redirect back to categories list with success message
        return redirect()->route('admin.categories.index')
            ->with('success', __('Category updated successfully'));
    }

    public function destroy(Request $request)
    {
        $ids = $request->input('ids'); // Get the array of IDs from the request

    // Ensure that the IDs are an array
    if (!is_array($ids)) {
        return response()->json(['error' => 'Invalid input'], 400);
    }

    // Perform deletion
    Category::destroy($ids);

        return redirect()->route('admin.categories.index')
            ->with('success', __('Category deleted successfully'));
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        if($category -> trashed())
        {
            $category->restore();
        }

        return back()->with('success','Restored successfully');
    }



}
