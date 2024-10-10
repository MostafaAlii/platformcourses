<?php
namespace  App\Repositories\Contracts;

use App\Http\Requests\Dashboard\CategoryValidationRequest;
use App\DataTables\Dashboard\Admin\AdminDataTable;
interface CategoryRepositoryInterface {
    public function index(AdminDataTable $adminDataTable);
    public function store(CategoryValidationRequest $request);
    //public function update($request);
    //public function destroy($request);
}
