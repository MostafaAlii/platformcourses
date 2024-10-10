@extends('frontend.includes.site')
@push('css')
@endpush
@section('pageTitle', $pageTitle)

@section('content')
    <div class="container">

        <div class="container d-flex align-items-center"><h1 class="my-3">Cart <span style="font-size: 12px">( 0 Course)</span></h1></div>

        <div class="container mb-3 text-left justify-content-end"></div>

        <div class="row g-3 mb-5">
            <div class="container justify-content-center align-items-center text-center my-5 col-sm-3">
                <script src="https://cdn.lordicon.com/lordicon.js"></script>
                <lord-icon src="https://cdn.lordicon.com/taymdfsf.json" trigger="loop" stroke="bold"
                    state="loop-oscillate-empty" colors="primary:#c71f16,secondary:#911710"
                    style="width:250px;height:250px">
                </lord-icon>
                <h3 class="text-center">Your Cart is Empty</h3>
                <a class="text-decoration-none text-center" href="{{ route('site.courses') }}"><button class="LogINBtn text-center">Back To courses</button></a>

            </div>




        </div>

    </div>



    <script>
        // script.js
        window.addEventListener('scroll', function() {
            var sidebar = document.getElementById('sidebar');
            var stopElement = document.getElementById('stop'); // The element where the sidebar should stop

            var sidebarRect = sidebar.getBoundingClientRect();
            var stopElementRect = stopElement.getBoundingClientRect();

            if (stopElementRect.top <= sidebarRect.bottom) {
                sidebar.style.position = 'absolute';
                sidebar.style.top = (stopElementRect.top - sidebarRect.height) + 'px';
            } else {
                sidebar.style.position = 'fixed';
                sidebar.style.top = '0';
            }
        });
    </script>





    @push('js')
    @endpush
@endsection
