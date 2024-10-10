@extends('dashboard.layouts.master')

@section('css')

@endsection

@section('pageTitle')
    {{$pageTitle}}
@endsection

@section('content')
    @include('dashboard.layouts.common._partial.messages')
    <div id="kt_content_container" class="container-xxl">
        <div class="mb-5 card card-xxl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="pt-5 border-0 card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="mb-1 card-label fw-bolder fs-3">{{$pageTitle}}</span>
                    <span class="mt-1 text-muted fw-bold fs-7">{{$pageTitle}} ( {{Academic::count();}} )</span>
                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" >
                        <a href="{{ route('admin.academic.create') }}" class="btn btn-sm btn-light btn-active-primary" >
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                </svg>
                            </span>Add
                        </a>

                        <a href="{{-- route('admin.academic.create') --}}" class="btn btn-sm btn-light btn-active-info" >
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                </svg>
                            </span>Add Course
                        </a>
                    </div>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="py-3 card-body">
                <div class="table-responsive">
                    <table class="table table-striped gy-7 gs-7">
                        <thead>
                            <tr class="text-gray-800 border-gray-200 fw-semibold fs-6 border-bottom-2">
                                <th class="min-w-80px">#</th>
                                <th class="min-w-200px">Name</th>
                                <th class="min-w-150px">Email</th>
                                <th class="min-w-100px">Status</th>
                                <th class="min-w-200px">Created At</th>
                                <th class="min-w-200px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($academics as $key => $academic)
                                <tr>
                                    <td>{{ $key + 1 }}</td> <!-- لعرض الترتيب -->
                                    <td>{{ $academic->name }}</td> <!-- اسم الأكاديمي -->
                                    <td>{{ $academic->email }}</td> <!-- البريد الإلكتروني -->
                                    <td>{{ $academic->status ? 'Active' : 'Inactive' }}</td> <!-- الحالة (مفعل/غير مفعل) -->
                                    <td>{{ $academic->created_at->format('Y-m-d') }}</td> <!-- تاريخ الإنشاء -->
                                    <td>
                                        <a href="{{ route('admin.academic.edit', $academic->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{-- route('admin.academic.courses', $academic->id) --}}" class="btn btn-sm btn-info">Courses</a>
                                        <form action="{{ route('admin.academic.destroy', $academic->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $academics->links() }}
                </div>



                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endpush
