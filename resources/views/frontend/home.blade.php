@extends('frontend.includes.site')
@push('css')
@endpush
@section('pageTitle', $pageTitle)

@section('content')
    <div>
        <div class="container-fluid Home-Banner justify-content-center align-items-center mt-3">
            <div class="row g-3 justify-content-center align-items-center">
                <div class="col-md p-5 g-3 justify-content-center align-items-center">
                    <div class="container">
                        <h2> {{ __('content/home-content.home_banner_title') }}</h2>
                        <p>{{ __('content/home-content.home_banner_subtitle') }}</p>
                    </div>
                    <div class="container mt-4">
                        <a href="{{ route('site.courses') }}"><button class="StartButton text-center">
                                {{ __('content/home-content.home_banner_start_button') }} </button></a> <a href="">
                            <button class="WVideo text-center"> {{ __('content/home-content.home_banner_video_button') }}
                            </button></a>
                    </div> <br>
                    <div class="container py-2">
                        <button class="text-center USersBtn">170+ <br> <span
                                class="text-danger USersTitle">{{ __('content/home-content.home_banner_users_number') }}</span></button>
                        <button class="text-center USersBtn">{{ count($courses) }} <br> <span
                                class="text-danger USersTitle">{{ __('content/home-content.home_banner_Courses_number') }}</span></button>

                    </div>
                </div>

                <div class="col-md">
                    <img width="560px" class="homeBannerGirl"
                        src="  {{ asset('dashboard/assets/img/GirlHomeBanner.png') }}" alt="">
                </div>

            </div>

        </div>

        <div class="mt-4 col-md-12">
            <!--Margin Space-->
        </div>


        <div class="container align-items-center">
            <div class="row justify-content-between g-3 d-flex align-items-center">
                <div class="col-sm align-items-center text-center">
                    <h3 class="text-center">{{ trans('content/home-content.home_course_category_title1') }} <span
                            class="text-danger" style="font-weight: 700;">COURSES</span>
                        {{ trans('content/home-content.home_course_category_title2') }}</h3>

                </div>

                <div class="col-sm text-right d-flex align-items-center">
                    <div class="container text-right">
                        <div class="search-container text-right d-flex">

                            <input type="text" class="search-input"
                                placeholder="{{ __('content/home-content.home_course_search') }}">
                            <button class="search-button mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search text-danger" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        
        <div class="container my-4 carouselContainer">
            <div id="categoryCarousel" class="carousel slide carousel-dark" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($categories->chunk(5) as $chunkIndex => $chunk)
                        <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                            <div class="d-flex justify-content-center flex-wrap">
                                @foreach ($chunk as $category)
                                    <button class="text-center category-Btn m-1" data-content-id="content-{{ $category->id }}">
                                        {{ $category->name }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev mr-5" href="#categoryCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon CarousalControl" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next ml-5" href="#categoryCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon CarousalControl" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        
        







        <div id="contentDisplay" class="mt-4">

            @foreach ($categories as $category)
                <div id="content-{{ $category->id }}" class="content">

                    <div class="container">

                        <div class="row g-3">

                            @foreach ($courses as $course)
                                @if ($course->category_id == $category->id)
                                    <!-- Display only related courses -->
                                    <div class="col-md-3 mb-4">
                                        @include('frontend.includes.components.coursecard', [
                                            'course' => $course,
                                        ])
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            @endforeach
            <!-- Default content -->
        </div>

        <div class="mt-4 col-md-12">
            <!--Margin Space-->
        </div>
        <div class="mt-4 col-md-12">
            <!--Margin Space-->
        </div>
        <div class="mt-4 col-md-12">
            <!--Margin Space-->
        </div>


        <div class="container justify-content-center">

            <div class="container text-center">
                <h2 class="text-center">{{ __('content/home-content.home_parteners_title') }}</h2>

            </div>
            <div class="row g-3 justify-content-center">
                <div class="col-sm justify-content-center text-center">

                    <img src="{{ asset('dashboard/assets/Parteners/Image.png') }}" alt="">

                </div>
                <div class="col-sm text-center">
                    <img src="{{ asset('dashboard/assets/Parteners/Image-2.png') }}">
                </div>
                <div class="col-sm text-center">

                    <img src="{{ asset('dashboard/assets/Parteners/Image-3.png') }}">

                </div>
                <div class="col-sm text-center">

                    <img src="{{ asset('dashboard/assets/Parteners/Image-4.png') }}">

                </div>


            </div>
            <div class="mt-4 col-md-12">
                <!--Margin Space-->
            </div>

            <div class="row g-3">
                <div class="col-sm text-center">
                    <img src="{{ asset('dashboard/assets/Parteners/Image-5.png') }}" alt="">

                </div>
                <div class="col-sm text-center">

                    <img src="{{ asset('dashboard/assets/Parteners/Image-6.png') }}">

                </div>
                <div class="col-sm text-center">

                    <img src="{{ asset('dashboard/assets/Parteners/Image-7.png') }}">

                </div>
                <div class="col-sm text-center">

                    <img src="{{ asset('dashboard/assets/Parteners/Image-1.png') }}">

                </div>


            </div>


        </div>

        <div class="mt-5 col-md-12">
            <!--Margin Space-->
        </div>

        <div class="mt-5 col-md-12">
            <!--Margin Space-->
        </div>
        <div class="mt-5 col-md-12">
            <!--Margin Space-->
        </div>
    </div>

    @push('js')
    @endpush
@endsection
