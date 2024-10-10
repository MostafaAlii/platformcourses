<footer class="footer mt-auto py-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5>FAQs</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('site.About') }}">About us</a></li>
                    <li><a href="{{ route('site.Contact') }}">Contact us</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Company</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Best Seller</a></li>
                    <li><a href="#">New Release</a></li>
                    <li><a href="#">Favourite</a></li>
                    <li><a href="#">Lorem ipsum</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Details</h5>
                <ul class="list-unstyled">
                    <li class="text-light">{{ setting('location') }}</li>
                    <li class="text-light">{{ setting('phone') }}</li>
                    <li><a href="mailto:email@email.com">{{ setting('email') }}</a></li>
                </ul>
            </div>
            <div class="col-md-3 text-center">
                <a href="{{ route('site.home') }}" class="text-decoration-none text-light fw-bold display-6">SUBUL</a>
                <p class="text-light">Subul is your gate to gain alot of knowledge and raise your information capacity
                </p>
                <div class="social-links justify-content-center text-center my-3">
                    <a href="{{ setting('Facebook') }}"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ setting('Instagram') }}"><i class="fab fa-instagram"></i></a>
                    <a href="{{ setting('LinkedIn') }}"><i class="fab fa-linkedin-in"></i></a>
                    <a href="{{ setting('Twitter') }}"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-2  text-center">
                <a href="#">Privacy policy</a>
            </div>
            <div class="col-md-2 text-center">
                <a href="#">Legal notice</a>
            </div>
            <div class="col-md-2 text-center">
                <a href="#">Terms of service</a>
            </div>
            <div class="col-md-6 text-center">
                <p class="text-light copyright">&copy; 2024 is Proudly Powered by <a href="#"
                        class="text-danger">Subul</a></p>
            </div>
        </div>
    </div>
</footer>