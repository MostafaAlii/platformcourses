<?php
namespace  App\Repositories\Contracts;
use App\DataTables\Dashboard\Admin\VideoDataTable;
interface VideoRepositoryInterface {
    public function index(VideoDataTable $courseDataTable);
    /*public function store($request);
    public function update($request);
    public function destroy($request);*/
}