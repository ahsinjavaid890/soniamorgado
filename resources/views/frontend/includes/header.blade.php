@php
    $url = request()->segment(count(request()->segments()));
@endphp
<header id="header">
    <div class="topbar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col col-lg-7 col-sm-12 col-12">
                    <div class="contact-intro">
                        <ul>
                            <li><i class="fi flaticon-009-telephone"></i>{{ Cmf::get_store_value('site_phonenumber') }}</li>
                            <li><i class="fi flaticon-010-email"></i>{{ Cmf::get_store_value('site_email') }}</li>
                            @if(Cmf::get_store_value('site_address') == '.')

                            @else
                            <li><i class="fi flaticon-011-maps-and-flags"></i> {{ Cmf::get_store_value('site_address') }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col col-lg-5 col-sm-12 col-12">
                    <div class="contact-info">
                        <ul class="social">
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                            <li><a href="#"><i class="ti-google"></i></a></li>
                        </ul>
                        @if(Cmf::get_store_value('company_profile'))
                        <a download="" class="top-btn" href="{{ url('public/images') }}/{{ Cmf::get_store_value('company_profile') }}">Company Profile</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wpo-site-header wpo-header-style-2">
        <nav class="navigation navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">
                        <div class="mobail-menu">
                            <button type="button" class="navbar-toggler open-btn">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar first-angle"></span>
                                <span class="icon-bar middle-angle"></span>
                                <span class="icon-bar last-angle"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{ url('') }}">
                                <img src="{{ url('public/images') }}/{{ Cmf::get_store_value('header_logo') }}"alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-1 col-1">
                        <div id="navbar" class="collapse navbar-collapse navigation-holder">
                            <button class="menu-close"><i class="ti-close"></i></button>
                            <ul class="nav navbar-nav mb-2 mb-lg-0">
                                <li class="@if($url) @else active @endif"><a href="{{ url('') }}">Home</a></li>
                                <li><a href="{{ url('aboutus') }}">About US</a></li>
                                <li class="@if($url) @else active @endif"><a href="{{ url('services') }}">Services</a></li>
                                <li><a href="{{ url('blogs') }}">News and Updates</a></li>
                                <li><a href="{{ url('contactus') }}">Contact</a></li>
                            </ul>
                        </div><!-- end of nav-collapse -->
                    </div>
                    <div class="col-lg-2 col-md-2 col-2">
                        
                    </div>
                </div>
            </div><!-- end of container -->
        </nav>
    </div>
</header>