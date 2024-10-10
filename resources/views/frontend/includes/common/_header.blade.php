<header>
    <!-- Top Header -->
    <div class="py-2 top-header bg-light">
        <div class="container d-flex justify-content-between">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <i class="mx-1 mt-0 fa fa-phone tph-icons"></i> <span class="text-dark infos">{{ setting('phone') }}</span>
                </div>
                <div class="col-md-6 d-flex align-items-center infoContainer">
                    <img width="16" height="16" class="mx-1 mt-0"
                        src="https://img.icons8.com/material-sharp/128/DB0000/mail.png" alt="mail" />
                    <span class="text-dark infos">{{ setting('email') }}</span>
                </div>


            </div>
            <div class="text-center user-actions align-items-center justify-content-center row g-0">

                <div class="text-center justify-content-center col-md-8 d-flex ">
                    <div class="container d-flex">
                        <a href="" class="mr-2 text-center text-dark cardentials">{{ __('site/site.login') }}</a>
                        <a href="" class="px-2 mx-2 text-dark cardentials infoContainer">{{ __('site/site.register')}}</a>
                    </div>
                </div>

                <div class="container justify-content-center d-flex col-md-4">
                    <a href="{{ setting('Facebook') }}" class="mx-1"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ setting('Instagram') }}" class="mx-1"><i class="fab fa-instagram"></i></a>
                    <a href="{{ setting('LinkedIn') }}" class="mx-1"><i class="fab fa-linkedin-in"></i></a>
                    <a href="{{ setting('Twitter') }}" class="mx-1"><i class="fab fa-twitter"></i></a>
                </div>

            </div>
        </div>
    </div>
    <!-- Main Header -->
    <div class="py-3 main-header bg-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href=""><img src="{{ asset('dashboard/assets/img/white-logo.png') }}" alt=""></a>
            </div>

            <nav class="navbar navbar-expand-lg">

                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="text-center navbar-nav align-items-center">
                        <li class="nav-item  {{ request()->routeIS('site.home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('site.home') }}">{{ __('site/site.home_page_title')}}</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('site.courses') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('site.courses') }}">{{ __('site/site.course_page_title')}}</a>
                        </li>
                        <!-- Start Academic -->
                        <li class="nav-item dropdownmenu">
                            <a class="nav-link buttonDrop" href="#">
                                Academic
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                                </svg>
                            </a>
                            <div class="text-center dropdown-content" aria-labelledby="otherDropdown">
                                @foreach($activeAcademics as $academic)
                                    <a class="py-2 text-center" href="#">{{ $academic->name }}</a>
                                @endforeach
                            </div>
                        </li>
                        <!-- End Academic -->

                        <li class="nav-item  {{ request()->routeIs('site.About') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('site.About') }}">
                                {{ __('site/site.About_page_title')}}
                            </a>
                        </li>
                        <li class="nav-item  {{ request()->routeIs('site.Contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('site.Contact') }}">
                                {{ __('site/site.Contact_page_title')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Arabic
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item " href="#" data-value="en">
                                            <img width="20" height="20"
                                                src="https://img.icons8.com/color/120/great-britain-circular.png"
                                                alt="great-britain-circular" />
                                            English</a></li>
                                    <li><a class="dropdown-item" href="#" data-value="ar">
                                            <img width="20" height="20"
                                                src="https://img.icons8.com/color/120/saudi-arabia-circular.png"
                                                alt="saudi-arabia-circular" />
                                            Arabic</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>




            </nav>


            <div class="d-flex cartContainer">

                <div class="text-right cart d-flex justify-content-end">
                    <a href="{{ route('site.Cart') }}" id="cart-btn">
                        <script src="https://cdn.lordicon.com/lordicon.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/taymdfsf.json" trigger="hover" stroke="bold"
                            colors="primary:#ffffff,secondary:#ffffff" style="width:30px;height:30px">
                        </lord-icon></i>


                        <span class="badge rounded-pill badge-danger"></span>



                    </a>
                </div>


            </div>

            <!--MObile Menu-->
            <div class="d-lg-none Burger">
                <nav id="sidebar" class="sidebar">
                    <div class="sidebar-header">
                        <img class="SideBarLogo" src="img/Switch-container.png" alt="">
                        <button type="button" class="close" aria-label="Close" id="sidebarCollapse">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <ul class="list-unstyled components">
                        <li class="MenuItem {{ request()->routeIS('site.home') ? 'active' : '' }}"><a href="{{ route('site.home') }}"
                                class="linkItem">{{ __('site/site.home_page_title')}}</a></li>
                        <li class="MenuItem {{ request()->routeIs('site.courses') ? 'active' : '' }}"><a
                                href="{{ route('site.courses') }}" class="linkItem">{{ __('site/site.courses_page_title')}}</a>
                        </li>
                        <li class="MenuItem"><a href="#otherSubmenu" data-bs-toggle="collapse"
                                aria-expanded="false" class="dropdown-toggle linkItem">Other</a>
                            <ul class="collapse list-unstyled" id="otherSubmenu">
                                <li><a href="ErrorPage.html" class="linkItem">Submenu 1</a></li>
                                <li><a href="ErrorPage.html" class="linkItem">Submenu 2</a></li>
                                <li><a href="ErrorPage.html" class="linkItem">Submenu 3</a></li>
                            </ul>
                        </li>
                        <li class="MenuItem {{ request()->routeIS('site.About') ? 'active' : '' }}"><a href="{{ route('site.About') }}"
                                class="linkItem">{{ __('site/site.About_page_title')}}</a></li>
                        <li class="MenuItem {{ request()->routeIS('site.Contact') ? 'active' : '' }}"><a
                                href="{{ route('site.Contact') }}" class="linkItem">{{ __('site/site.Contact_page_title')}}</a></li>

                                <li class="MenuItem">
                                    <div class="dropdown">
                                        <button class="btn btn-light dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Choose language
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item " href="#" data-value="en">
                                                    <img width="20" height="20"
                                                        src="https://img.icons8.com/color/120/great-britain-circular.png"
                                                        alt="great-britain-circular" />
                                                    English</a></li>
                                            <li><a class="dropdown-item" href="#" data-value="ar">
                                                    <img width="20" height="20"
                                                        src="https://img.icons8.com/color/120/saudi-arabia-circular.png"
                                                        alt="saudi-arabia-circular" />
                                                    Arabic</a></li>
                                        </ul>
                                    </div>
                                </li>
                    </ul>

                    <!-- Auth section -->
                    <div class="container justify-content-center">

                            <div class="container d-flex">
                                <a href=""
                                    class="mr-2 text-center text-light text-decoration-none cardentials">Log in</a>
                                <a href=""
                                    class="pl-2 text-light text-decoration-none cardentials border-left border-light border-1">Register</a>
                            </div>

                    </div>

                </nav>

                <button type="button" id="sidebarCollapseBtn">
                    <i class="fas fa-align-left menuburgericon"></i>
                </button>

            </div>


        </div>
    </div>
</header>
