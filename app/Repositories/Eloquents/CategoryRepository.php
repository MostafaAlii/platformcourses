<?php
namespace  App\Repositories\Eloquents;
use App\Models\{Category,CategoryTranslation};
use App\Http\Requests\Dashboard\CategoryValidationRequest;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\DataTables\Dashboard\Admin\AdminDataTable;
class CategoryRepository implements CategoryRepositoryInterface {
    public function index(AdminDataTable $adminDataTable) {
        return $adminDataTable->render('dashboard.Admin.categories.index', ['pageTitle' => trans('dashboard/admin.categories')]);
    }

    public function store(CategoryValidationRequest $request) {
        dd(__CLASS__);
        $category = Category::create($request->only('parent'));
        $translations = collect($request->activeLocales())->map(function ($locale) use ($request) {
            return [
                'locale' => $locale,
                'name' => $request->input("name.$locale"),
                'description' => $request->input("description.$locale") ?? null,
            ];
        })->toArray();
        $category->details()->createMany($translations);
        return $category;
    }

    /*public function update($request) {

    }

    public function destroy($request) {

    }*/
}
