@extends('frontend.includes.site')
@push('css')

@endpush
@section('pageTitle', $pageTitle)

@section('content')

    <!--
            Source Code:  https://github.com/PrisonBreak8/CODEPEN/tree/main/responsive-video
            -->

    <div class="container-fluid justify-content-center align-items-center SubHeader"
        style="background-image: url({{ $course->getFirstMediaUrl('courses') }})">
        <div class="container align-items-center justify-content-center">
            <div class="row justify-content-center align-items-center">
                <div class="container pt-5 mt-3 d-flex">
                    <a class="text-decoration-none" href="{{ route('site.home') }}">
                        <h5 class="pr-1 text-light">Home </h5>
                    </a>
                    <h6 class="text-danger d-flex">🔴</h6>
                    <a href="{{ route('site.courses') }}" class="text-decoration-none">
                        <h5 class="pl-1 text-light">Courses</h5>
                    </a>

                    <h6 class="text-danger d-flex">🔴</h6>
                    <a href="#" class="text-decoration-none">
                        <h5 class="pl-1 text-light">{{ $course->name }}</h5>
                    </a>

                </div>

                <div class="container mt-3 d-flex">
                    {{-- <button class="mt-2 badgeSail">-39%</button> --}}
                    <p class="pt-2 ml-2 text-danger">{{ $category->name }}</p>

                </div>

                <div class="container mt-3">
                    <h3 class=" text-light">{{ $course->name }}</h3>
                </div>

                <div class="container mt-3 mb-5 d-flex">
                    <img src="../img/Bannerwoman.png" width="30" class="rounded-circle" alt="">
                    <h6 class="pt-2 pl-3 text-light">{{ $teacher->name }}</h6>
                    <h6 class="pt-2 pl-3 text-light">|</h6>
                    <h6 class="pt-2 pl-3 text-light">Released At: {{ $course->created_at }}</h6>
                </div>

                <div class="container mb-5 d-flex">
                    <img src="../img/Bannerwoman.png" width="30" class="rounded-circle" alt="">
                    <h6 class="pt-2 pl-3 text-light font-weight-bold"><span class="text-danger">This course Talks About: </span>{{ $course-> desc }}</h6>

                </div>
                {{-- <div class="container py-4 mb-3 d-flex">
                    <img width="25" height="25"
                        src="https://img.icons8.com/pastel-glyph/264/ffffff/person-male--v3.png" alt="person-male--v3" />
                    <h6 class="pt-2 text-light">20 Student enrolled</h6>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="container videoplaylist-container">
        <div class="main-video-container">
            <video class="main-video" src="img/vid-1.mp4" loop controls></video>
            <h3 class="main-video__title">house flood animation</h3>
            <p class="main-video__desc">Description:</p>
        </div>

        <div class="video-list-container">

            <h3 class="my-4 font-weight-bold">Course Content</h3>
            <div class="accordion" id="accordionExample">

                @foreach ($course->playlists as $playlist)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $playlist->id }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $playlist->id }}" aria-expanded="true"
                                aria-controls="collapse{{ $playlist->id }}">
                                {{ $playlist->name }}
                            </button>
                        </h2>
                        <div id="collapse{{ $playlist->id }}" class="accordion-collapse collapse show"
                            aria-labelledby="heading{{ $playlist->id }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @foreach ($playlist->videos as $video)
                                        <div class="list">
                                            <video class="list__video" src="img/vid-1.mp4"></video>
                                            <h3 class="list__title">{{ $video->name }}</h3>
                                            <p class="list__desc" hidden> <span class="my-3 font-weight-bold">Description:</span>
                                                <br>{{ $video->description }}</p>
                                        </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach


                {{--
            <div class="list active">
                <video class="list__video" src="img/vid-1.mp4"></video>
                <h3 class="list__title">house flood animation</h3>
            </div>

            <div class="list">
                <video class="list__video" src="img/vid-2.mp4"></video>
                <h3 class="list__title">zoombie walking animation</h3>
            </div>

            <div class="list">
                <video class="list__video" src="img/vid-3.mp4"></video>
                <h3 class="list__title">emoji falling animation</h3>
            </div>

            <div class="list">
                <video class="list__video" src="img/vid-4.mp4"></video>
                <h3 class="list__title">3D town animation</h3>
            </div>

            <div class="list">
                <video class="list__video" src="img/vid-5.mp4"></video>
                <h3 class="list__title">man chasing carrot animation</h3>
            </div>

            <div class="list">
                <video class="list__video" src="img/vid-6.mp4"></video>
                <h3 class="list__title">door hinge animation</h3>
            </div>

            <div class="list">
                <video class="list__video" src="img/vid-7.mp4"></video>
                <h3 class="list__title">poeple walking in town animation</h3>
            </div>

            <div class="list">
                <video class="list__video" src="img/vid-8.mp4"></video>
                <h3 class="list__title">knight chasing virus animation</h3>
            </div>

            <div class="list">
                <video class="list__video" src="img/vid-9.mp4"></video>
                <h3 class="list__title">3D helicopter animation</h3>
            </div> --}}

            </div>

        </div>
    </div>


        @push('js')
        <script>
            let videoList = document.querySelectorAll(".video-list-container .list");

            // Function to set the first video in the main container on page load
            function setFirstVideo() {
                if (videoList.length > 0) {
                    // Select the first video element in the list
                    let firstVideo = videoList[0];

                    // Add the 'active' class to the first video
                    firstVideo.classList.add("active");

                    // Get the source, title, and description of the first video
                    let src = firstVideo.querySelector(".list__video").src;
                    let title = firstVideo.querySelector(".list__title").innerHTML;
                    let desc = firstVideo.querySelector(".list__desc").innerHTML;

                    // Set the main video container with the first video's details
                    document.querySelector(".main-video-container .main-video").src = src;
                    document.querySelector(".main-video-container .main-video").play();

                    document.querySelector(".main-video-container .main-video__title").innerHTML = title;
                    document.querySelector(".main-video-container .main-video__desc").innerHTML = desc;
                }
            }

            // Call the function to set the first video
            setFirstVideo();

            // Event listener for clicking on videos
            videoList.forEach((vid) => {
                vid.onclick = () => {
                    videoList.forEach((remove) => {
                        remove.classList.remove("active");
                    });
                    vid.classList.add("active");

                    let src = vid.querySelector(".list__video").src;
                    let title = vid.querySelector(".list__title").innerHTML;
                    let desc = vid.querySelector(".list__desc").innerHTML;

                    document.querySelector(".main-video-container .main-video").src = src;
                    document.querySelector(".main-video-container .main-video").play();

                    document.querySelector(".main-video-container .main-video__title").innerHTML = title;
                    document.querySelector(".main-video-container .main-video__desc").innerHTML = desc;
                };
            });
        </script>

            @endpush
        @endsection
