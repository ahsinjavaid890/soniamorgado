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
                            <li><i class="fi flaticon-009-telephone"></i>(307) 555-0133</li>
                            <li><i class="fi flaticon-010-email"></i>demo.Avukat@gmail.com</li>
                            <li><i class="fi flaticon-011-maps-and-flags"></i> 244 Royal Ln. Mesa, New Jersey
                                463</li>
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
                        <a class="top-btn" href="contact.html">Company Profile</a>
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
                                <li class="menu-item-has-children">
                                    <a href="#">Practice</a>
                                    <ul class="sub-menu">
                                        <li><a href="practice.html">Practice</a></li>
                                        <li><a href="practice-s2.html">Practice Style 2</a></li>
                                        <li><a href="practice-s3.html">Practice Style 3</a></li>
                                        <li><a href="practice-single.html">Practice Single</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Servivces</a>
                                    <ul class="sub-menu">
                                        <li><a href="case.html">Cases</a></li>
                                        <li><a href="case-s2.html">Cases Style 2</a></li>
                                        <li><a href="case-s3.html">Cases Style 3</a></li>
                                        <li><a href="case-single.html">Cases Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">News and Updates</a></li>
                                <li><a href="contact.html">Contact</a></li>
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