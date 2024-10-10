@extends('frontend.includes.site')
@push('css')
@endpush
@section('pageTitle', $pageTitle)

@section('content')
<div class="container-fluid justify-content-center align-items-center SubHeader">
    <div class="container align-items-center justify-content-center">
        <div class="row justify-content-center align-items-center">
            <div class="container pt-5">
                <h3 class="text-center text-light py-4">Contact Us</h3>

            </div>
            <div class="container d-flex text-center justify-content-center pb-5">
                <a class="text-decoration-none" href="{{ route('site.home') }}">
                    <h5 class="text-light pr-1">Home </h5>
                </a>
                <h6 class="text-danger d-flex">🔴</h6>
                <a href="{{ route('site.Contact') }}" class="text-decoration-none">
                    <h5 class="text-light pl-1">Contact</h5>
                </a>

            </div>


        </div>

    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="container mt-5">
                <h2>
                    Keep the Communication open
                </h2>
                <div class="container mt-5">
                    <img class="mb-2" width="30" height="30"
                        src="https://img.icons8.com/ios-filled/128/D30000/marker.png" alt="marker" />
                    <span class="TitleOfIcon mt-3">Location</span> <br>
                    <p class="text-secondary">{{ setting('location') }}</p>

                </div>
                <hr>
                <div class="container">
                    <img class="mb-2" width="30" height="30"
                        src="https://img.icons8.com/ios-glyphs/128/D30000/iphone14-pro.png" alt="marker" />
                    <span class="TitleOfIcon mt-3">Phone</span> <br>
                    <p class="text-secondary">Phone Number: {{ setting('phone') }}</p>
                    <p class="text-secondary">Hotline: {{ setting('hotline') }}</p>

                </div>
                <hr>
                <div class="container">
                    <img class="mb-2" width="30" height="30"
                        src="https://img.icons8.com/ios-filled/128/D30000/marker.png" alt="marker" />
                    <span class="TitleOfIcon mt-3">E-mail</span> <br>
                    <p class="text-secondary">{{ setting('email') }}</p>

                </div>

            </div>


        </div>
        <div class="col-md-6">
            <div class="container mt-5">
                <h2 class="text-center"></h2>
                <div id="map" style="width: 100%; height: 500px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3626.9179470867343!2d46.70616377521606!3d24.626512778082834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f050a0d2799e3%3A0x5a1d063d405738b8!2z2LPZiNmCINin2YTYr9mK2LHZhyDZhNmE2YLZh9mI2Yc!5e0!3m2!1sen!2seg!4v1721055124427!5m2!1sen!2seg"
                        class="w-100" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="form">
        <div class="row my-4 g-3">
            <div class="col-md-6">
                <input type="text" placeholder="Name" class="w-100 ContantFieldStyling px-3">
            </div>
            <div class="col-md-6">
                <input type="text" placeholder="E-mail" class="w-100 ContantFieldStyling px-3">
            </div>

        </div>
        <div class="row my-4">
            <div class="col-md-12">
                <input type="text" placeholder="Message" class="w-100 MessageFieldStyling px-3">
            </div>

        </div>
        <div class="container">
            <input class="ContactSubmit text-center" type="submit">
        </div>


    </div>

</div>
    @push('js')
    @endpush
@endsection
