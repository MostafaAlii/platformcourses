@extends('dashboard.layouts.master')

@section('css')
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
</style>
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
                    <span class="mt-1 text-muted fw-bold fs-7">{{$pageTitle}}</span>
                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" >
                    </div>
                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" >
                        <a href="{{ route('admin.videos.create') }}" class="btn btn-sm btn-light btn-active-primary" >
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->اضافة فيديو جديدة</a>
                    </div>
                </h3>
            </div>
            <div class="py-3 card-body">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-striped table-row-bordered gy-5 gs-7">
                        {!! $dataTable->table() !!}
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
                <!-- Start Video Modal -->
                <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="videoModalLabel">Video Player</h5>
                                <button type="button" class="btn" data-dismiss="modal" aria-label="Close" onclick="pauseVideo()">
                                    <span class="btn-close" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <video id="videoPlayer" controls style="width: 100%; border-radius: 3px;">
                                    <source src="" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Video Modal -->
            </div>
            <!--end::Header-->
        </div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{!! $dataTable->scripts() !!}

<script>
function playVideo(videoUrl) {
    var videoPlayer = document.getElementById('videoPlayer');
    videoPlayer.src = videoUrl;
    $('#videoModal').modal('show');
}

function pauseVideo() {
    var videoPlayer = document.getElementById('videoPlayer');
    videoPlayer.pause();
    videoPlayer.currentTime = 0;
    $('#videoModal').modal('hide');
}
</script>
@endpush
