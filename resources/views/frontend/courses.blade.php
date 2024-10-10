@extends('frontend.includes.site')
@push('css')
@endpush
@section('pageTitle', $pageTitle)

@section('content')

    <div>

        <div class="container-fluid justify-content-center align-items-center SubHeader">
            <div class="container align-items-center justify-content-center">
                <div class="row justify-content-center align-items-center">
                    <div class="container pt-5">
                        <h3 class="text-center text-light py-4">Courses and trainings</h3>

                    </div>
                    <div class="container d-flex text-center justify-content-center pb-5">
                        <a class="text-decoration-none" href="{{ route('site.home') }}">
                            <h5 class="text-light pr-1">Home </h5>
                        </a>
                        <h6 class="text-danger d-flex">🔴</h6>
                        <a href="{{ route('site.courses') }}" class="text-decoration-none">
                            <h5 class="text-light pl-1">Courses</h5>
                        </a>

                    </div>


                </div>

            </div>

        </div>


        <div class="container align-items-center mt-5">
            <div class="row justify-content-between g-3 d-flex align-items-center">
                <div class="col-sm align-items-center text-center">
                    <div class="container align-items-center d-flex">
                        <button class="btn btn-light text-danger">

                            <img width="15" height="15" src="https://img.icons8.com/ios/50/EF0000/filter--v1.png"
                                alt="filter--v1" />

                            Recommendations</button>
                        <p class="ml-2 mt-2 mx-2">There are {{ count($courses) }} courses Here</p>
                    </div>


                </div>



                <div class="col-sm text-right d-flex align-items-center">
                    <div class="container text-right">
                        <div class="search-container text-right d-flex mb-2">

                            <form class="search-container" action="" method="GET">
                                <input value="" type="text" class="search-input"
                                    placeholder="Look for Courses" name="search">
                                <button class="search-button mx-2" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-search text-danger" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>




        <div class="container mt-2">


            <div class="row g-3">
                @if (count($courses) <= 0)
                    <div class="container justify-content-center align-items-center text-center my-5">
                        <script src="https://cdn.lordicon.com/lordicon.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/pagmnkiz.json" trigger="loop" stroke="bold"
                            colors="primary:#c71f16,secondary:#ee6d66" style="width:250px;height:250px">
                        </lord-icon>
                        <h3 class="text-center">Can't find what you are looking for</h3>
                    </div>
                @else
                    @foreach ($courses as $course)
                        <div class="col-md-3 mb-4" id="courses-list">
                            @include('frontend.includes.components.coursecard')
                        </div>
                    @endforeach
                @endif

                <!-- Pagination -->

            </div>





            <!-- Content Sections -->







            <!-- <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center navpagUl text-center align-items-center">
                                        <li class="page-item">
                                            <a id="prev" class="navPag text-decoration-none text-center align-items-center"
                                                href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item text-center align-items-center active"><a
                                                class="navPag text-decoration-none text-center align-items-center" href="#"
                                                data-page="1">1</a></li>
                                        <li class="page-item align-items-center text-center"><a
                                                class="navPag text-decoration-none text-center align-items-center" href="#"
                                                data-page="2">2</a></li>
                                        <li class="page-item align-items-center text-center"><a
                                                class="navPag text-decoration-none text-center align-items-center" href="#"
                                                data-page="3">3</a></li>
                                        <li class="page-item align-items-center text-center"><a
                                                class="navPag text-decoration-none text-center align-items-center" href="#"
                                                data-page="4">4</a></li>
                                        <li class="page-item align-items-center text-center"><a
                                                class="navPag text-decoration-none text-center align-items-center" href="#"
                                                data-page="5">5</a></li>
                                        <li class="page-item align-items-center text-center"><a
                                                class="navPag text-decoration-none text-center align-items-center" href="#"
                                                data-page="6">6</a></li>
                                        <li class="page-item">
                                            <a id="next" class="navPag text-decoration-none text-center align-items-center"
                                                href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>-->
        </div>

    </div>

    @push('js')
    @endpush
@endsection
