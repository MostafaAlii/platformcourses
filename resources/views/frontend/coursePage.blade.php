@extends('frontend.includes.site')
@push('css')
    <link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet" />
@endpush
@section('pageTitle', $pageTitle)

@section('content')


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

                <div class="container mt-3 d-flex">
                    <img src="../img/Bannerwoman.png" width="30" class="rounded-circle" alt="">
                    <h6 class="pt-2 pl-3 text-light">{{ $teacher->name }}</h6>
                    <h6 class="pt-2 pl-3 text-light">|</h6>
                    <h6 class="pt-2 pl-3 text-light">Released At: {{ $course->created_at }}</h6>
                </div>
                {{-- <div class="container py-4 mb-3 d-flex">
                    <img width="25" height="25"
                        src="https://img.icons8.com/pastel-glyph/264/ffffff/person-male--v3.png" alt="person-male--v3" />
                    <h6 class="pt-2 text-light">20 Student enrolled</h6>
                </div> --}}

                <div class="mt-5 col-sm">
                    <div class="mb-5">

                        <div class="">
                            <button class="btn btn-danger" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Join Them Now</button>
                        </div>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                            aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasRightLabel">{{ $course->name }}</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div class="shadow-sm card">
                                    <div class="card-img-top">

                                        @if ($course->hasMedia('courses'))
                                            <img src="{{ $course->getFirstMediaUrl('courses') }}" class="w-100"
                                                alt="{{ $course->name }}">
                                        @else
                                            <svg class="image" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z">
                                                </path>
                                            </svg>
                                        @endif


                                    </div>
                                    <div class="card-body">
                                        <div class="container mb-5">
                                            <div class="justify-content-between d-flex">
                                                @if ($course->Price == 0)
                                                    <h5 class="text-danger">FREE</h5>
                                                @else
                                                    <h5 class="text-danger">{{ $course->Price }} USD</h5>
                                                @endif
                                                {{-- <button class="badgeSail">-39%</button> --}}
                                            </div>
                                            <div class="justify-content-between d-flex border-bottom ">
                                                <p> <img class="mr-1" width="18" height="18"
                                                        src="https://img.icons8.com/material-outlined/128/vertical-settings-mixer.png"
                                                        alt="vertical-settings-mixer" />Level</p>
                                                <p>{{ $course->courseLevel }}</p>
                                            </div>
                                            <div class="justify-content-between d-flex border-bottom ">

                                                <p> <img class="mr-1" width="18" height="18"
                                                        src="https://img.icons8.com/ios-glyphs/128/clock--v1.png"
                                                        alt="clock--v1" />Watch Time</p>
                                                <p>16 Hours</p>
                                            </div>
                                            <div class="justify-content-between d-flex border-bottom ">

                                                <p> <img class="mr-1" width="18" height="18"
                                                        src="https://img.icons8.com/ios-filled/128/circled-play.png"
                                                        alt="vertical-settings-mixer" />Videos</p>
                                                <p>{{ $totalVideos }} videos</p>
                                            </div>
                                            <div class="justify-content-between d-flex border-bottom ">

                                                <p> <img class="mr-1" width="18" height="18"
                                                        src="https://img.icons8.com/material-sharp/128/price-tag.png"
                                                        alt="vertical-settings-mixer" />Category</p>
                                                <p>{{ $category->name }}</p>
                                            </div>
                                            <div class="justify-content-between d-flex border-bottom ">

                                                <p> <img class="mr-1" width="18" height="18"
                                                        src="https://img.icons8.com/ios-filled/128/language.png"
                                                        alt="vertical-settings-mixer" />Language</p>
                                                <p>{{ $course->courseLanguage }}</p>
                                            </div>

                                            {{-- <h5>Course Includes: </h5>
                                            <ul>
                                                <li>Angular</li>
                                                <li>FrameWorks</li>
                                                <li>DB</li>
                                            </ul> --}}

                                        </div>

                                        <div class="container">
                                            <a href="{{ route('site.courseContent', $course->id) }}"
                                                class="text-decoration-none">

                                                <button class="LogINBtn" style="font-weight: 700;">
                                                    Enroll Now
                                                </button>
                                            </a>
                                        </div>

                                        <div class="mt-3">
                                            <h4>
                                                Related courses
                                            </h4>

                                            @foreach ($relatedCourses as $relatedCourse)
                                                <div class="mb-3 row d-flex">
                                                    <div class="col-sm-6">

                                                        <a href="{{ route('site.courses.show', $course->id) }}">
                                                            @if ($relatedCourse->hasMedia('courses'))
                                                                <img src="{{ $relatedCourse->getFirstMediaUrl('courses') }}"
                                                                    class="w-100" alt="{{ $relatedCourse->name }}">
                                                            @else
                                                                <svg class="image" xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24">
                                                                    <path
                                                                        d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z">
                                                                    </path>
                                                                </svg>
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <a href="{{ route('site.courses.show', $course->id) }}"
                                                            class="font-weight-bold text-decoration-none text-dark">
                                                            <h6>{{ $relatedCourse->name }}</h6>
                                                        </a>
                                                        <h6 class="text-danger">Price: {{ $relatedCourse->Price }}$</h6>
                                                    </div>

                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <h3>About This Course</h3>
            <p>
                {{ $course->desc }}
            </p>

        </div>

    </div>

    {{-- <div class="container CourseINclud">
        <div class="row">
            <h3 class="mt-3">what you will learn</h3>
            <div class="col-md">
                <div class="container justify-content-start">
                    <ul class="LearnList">
                        <li>you gonna leratn about Learn modern Angular, including standalone components & signals from the
                            ground up & in great detail!</li>
                        <li>you gonna leratn about Develop modern, complex, responsive and scalable web applications with
                            Angular</li>
                        <li>you gonna leratn about Learn TypeScript, a modern JavaScript superset, along the way </li>
                        <li>you gonna leratn about Create single-page or fullstack applications with one of the most modern
                            JavaScript frameworks out there</li>
                        <li>you gonna leratn about Create single-page or fullstack applications with one of the most modern
                            JavaScript frameworks out there</li>
                    </ul>

                </div>

            </div>

            <div class="col-md">
                <div class="container justify-content-end">
                    <ul class="LearnList">
                        <li>you gonna leratn about Learn modern Angular, including standalone components & signals from the
                            ground up & in great detail!</li>
                        <li>you gonna leratn about Develop modern, complex, responsive and scalable web applications with
                            Angular</li>
                        <li>you gonna leratn about Learn TypeScript, a modern JavaScript superset, along the way </li>
                        <li>you gonna leratn about Create single-page or fullstack applications with one of the most modern
                            JavaScript frameworks out there</li>
                        <li>you gonna leratn about Create single-page or fullstack applications with one of the most modern
                            JavaScript frameworks out there</li>
                    </ul>

                </div>

            </div>
        </div>
    </div> --}}


    <div class="container my-5">
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
                        {{--<div class="accordion-body">
                            @foreach ($playlist->videos as $video)
                                <div class="container d-flex align-items-center">
                                    <svg id="play-video-{{ $video->id }}" class="mx-3 mb-2"
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-display" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4q0 1 .25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75Q6 13 6 12H2s-2 0-2-2zm1.398-.855a.76.76 0 0 0-.254.302A1.5 1.5 0 0 0 1 4.01V10c0 .325.078.502.145.602q.105.156.302.254a1.5 1.5 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.76.76 0 0 0 .254-.302 1.5 1.5 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.76.76 0 0 0-.302-.254A1.5 1.5 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145" />
                                    </svg>
                                    <p id="video-title-{{ $video->id }}" class="mt-1">{{ $video->name }}</p>
                                    <p class="list__duration">Duration: {{ $video->getDuration() }}</p>
                                    <video id="my-video" class="video-js" controls preload="auto" width="640"
                                        height="264">
                                        <source src="{{ asset('storage/' . $video->path) }}" type="video/webm">
                                        Your browser does not support the video tag.
                                    </video>

                                </div>
                            @endforeach
                        </div>--}}
                        <div class="accordion-body">
                            @foreach ($playlist->videos as $video)
                                <div class="container d-flex align-items-center">
                                    <svg id="play-video-{{ $video->id }}" class="mx-3 mb-2 play-video-icon"
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-display" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4q0 1 .25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75Q6 13 6 12H2s-2 0-2-2zm1.398-.855a.76.76 0 0 0-.254.302A1.5 1.5 0 0 0 1 4.01V10c0 .325.078.502.145.602q.105.156.302.254a1.5 1.5 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.76.76 0 0 0 .254-.302 1.5 1.5 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.76.76 0 0 0-.302-.254A1.5 1.5 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145" />
                                    </svg>
                                    <p id="video-title-{{ $video->id }}" class="mt-1">{{ $video->name }}</p>
                                    <p class="list__duration">Duration: {{ $video->getDuration() }}</p>
                                    <video id="my-video-{{ $video->id }}" class="video-js" controls preload="auto" width="640" height="264">
                                        <source src="{{ asset('storage/' . $video->path) }}" type="video/webm">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>








    <div class="container my-5">
        <h3 class="mb-5">The Tutor of the course</h3>
        <div class="row">
            <div class="col-sm-2">
                <img style="max-width: 100%" src="../img/GirlHomeBanner.png" alt="">

            </div>

            <div class="col-sm-5 ">
                <h3>{{ $teacher->name }}</h3>
                {{-- <div class="flex-row mt-1 mb-4 d-flex text-danger">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <span class="pl-3 text-secondary">4.7/5</span>
                </div> --}}
                <div class="flex-row d-flex">
                    <img width="18" height="18" src="https://img.icons8.com/ios-filled/128/circled-play.png"
                        alt="circled-play" />
                    <p class="pb-3 mx-2">{{ $courseCount }} courses</p>
                    <img width="18" height="18" src="https://img.icons8.com/ios-glyphs/128/speech-bubble--v1.png"
                        alt="speech-bubble--v1" />
                    <p class="pb-3 mx-2">125 Videos</p>
                    <img width="18" height="18" src="https://img.icons8.com/ios-glyphs/128/person-male.png"
                        alt="person-male" />
                    {{-- <p class="pb-3 mx-2">120 Students Enrolled</p> --}}
                </div>
                <button class="btn btn-outline-danger">Show More</button>




            </div>

        </div>

    </div>

    {{-- <div class="container my-5">
        <h3 class="my-5">Our students Reveiws</h3>
        <div class="row">
            <div class="my-5 shadow-sm col-sm-2">
                <h2 class="text-center text-danger">4.4</h2>
                <p class="text-center">8 Reviews</p>
            </div>

            <div class="text-center col-sm-7 justify-content-center align-items-center">
                <div class="container text-center justify-content-center align-items-center d-flex">
                    <p>75%</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                            aria-valuemax="100" style="width:70%">
                            <span class="sr-only">70% Complete</span>
                        </div>
                    </div>
                    <div class="flex-row mt-1 mb-4 d-flex text-danger">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span class="pl-3 text-secondary">4.7/5</span>
                    </div>
                </div>
                <div class="container text-center justify-content-center align-items-center d-flex">
                    <p>75%</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                            aria-valuemax="100" style="width:70%">
                            <span class="sr-only">70% Complete</span>
                        </div>
                    </div>
                    <div class="flex-row mt-1 mb-4 d-flex text-danger">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span class="pl-3 text-secondary">4.7/5</span>
                    </div>
                </div>
                <div class="container text-center justify-content-center align-items-center d-flex">
                    <p>75%</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                            aria-valuemax="100" style="width:70%">
                            <span class="sr-only">70% Complete</span>
                        </div>
                    </div>
                    <div class="flex-row mt-1 mb-4 d-flex text-danger">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span class="pl-3 text-secondary">4.7/5</span>
                    </div>
                </div>
                <div class="container text-center justify-content-center align-items-center d-flex">
                    <p>75%</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                            aria-valuemax="100" style="width:70%">
                            <span class="sr-only">70% Complete</span>
                        </div>
                    </div>
                    <div class="flex-row mt-1 mb-4 d-flex text-danger">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span class="pl-3 text-secondary">4.7/5</span>
                    </div>
                </div>

            </div>

        </div>

    </div> --}}


    @push('js')
        <script src="https://vjs.zencdn.net/7.15.4/video.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
    // الحصول على جميع أيقونات التشغيل
    const playIcons = document.querySelectorAll('.play-video-icon');

    playIcons.forEach(icon => {
        // إضافة مستمع للأحداث لكل أيقونة تشغيل
        icon.addEventListener('click', function() {
            const videoId = this.id.replace('play-video-', ''); // الحصول على ID الفيديو
            const video = document.getElementById(`my-video-${videoId}`);

            // تشغيل الفيديو عند الضغط على الأيقونة
            video.play();
        });
    });
});

        </script>

        <script>
    var player = videojs('my-video');
</script>

    @endpush
@endsection
