@extends('frontend.layouts.main')
@section('tittle')
<title>Sonia Morgado</title>
@endsection
@section('content')
<section class="static-hero">
   <div class="hero-container">
       <div class="hero-inner">
           <div class="container">
               <div class="hero-text-wrap">
                   <div data-swiper-parallax="300" class="sub-title">
                       <span>Best Lawer Egency</span>
                   </div>
                   <div data-swiper-parallax="300" class="slide-title">
                       <h2>Creative solutions for legal problems</h2>
                   </div>
                   <div data-swiper-parallax="400" class="slide-text">
                       <p>Bibendum commodo nulla id amet magna sit malesada. Et sceleque scelerisque mauris
                           malesuada dui. Tortor, sit nulla odio enim neque. Enim erat augue id massa ultrices
                           ut
                           orci.</p>
                   </div>
                   <div class="clearfix"></div>
                   <div data-swiper-parallax="500" class="slide-btns">
                       <a href="about.html" class="theme-btn-s2">Free Consulting</a>
                   </div>
               </div>
               <div class="lawyer-pic">
                   <img src="{{ url('public/front/images/slider/1.png') }}" alt="">
                   <div class="lawyer-shape"></div>
                   <div class="exprience">
                       <div class="exprience-left">
                           <h4>40</h4>
                       </div>
                       <div class="exprience-right">
                           <h4>Years Of Experience</h4>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</section>
<!-- end of hero slider -->

<!-- start of wpo-about-section -->
<section class="wpo-about-section-s3 section-padding">
   <div class="container">
       <div class="wpo-section-title-s2">
           <span>Auout Us</span>
           <h2>Why Clients Choose Us?</h2>
       </div>
       <div class="wpo-about-section-wrapper">
           <div class="row align-items-center">
               <div class="col-lg-5 col-md-12 col-12">
                   <div class="wpo-about-content">
                       <h2>We Are The Most Populer Law Firm That Can Help You Perfectly!</h2>
                       <div class="wpo-about-content-inner">
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non tincidunt nullam
                               ridiculus at nec mattis consequat cursus et. Maecenas euismod quis et nunc dolor
                               enim nisl. Turpis vel, laoreet at id massa id elementum feugiat molestie.
                               Adipiscing turpis feugiat lectus posuere nulla ultrices vitae. </p>
                           <p>Lectus erat at risus quam sodales gravida interdum. Nec non posuere lacus
                               pharetra arcu lectus congue amet. Feugiat vel at senectus mattis urna nunc
                               fusce. </p>
                       </div>
                   </div>
               </div>
               <div class="col-lg-7 col-md-12 col-12">
                   <div class="wpo-about-img">
                       <img src="{{ url('public/front/images/about/about3.jpg') }}" alt="">
                       <div class="about-img-inner">
                           <img src="{{ url('public/front/images/about/about4.jpg') }}" alt="">
                       </div>
                   </div>
               </div>
           </div>
           <div class="visible-text">
               <h2>About</h2>
           </div>
       </div>
   </div>
</section>
<!-- end of wpo-about-section -->

<!-- start wpo-practice-section -->

<!-- end wpo-practice-section -->
<!-- start wpo-testimonials-section -->
<section class="wpo-testimonials-section-s2 section-padding">
   <div class="container">
       <div class="wpo-testimonials-wrap">
           <div class="row align-items-center">
               <div class="col-lg-6 col-12">
                   <div class="wpo-testimonials-active owl-carousel">
                       <div class="wpo-testimonials-item">
                           <p>“Elementum viverra tortor rhoncus nunc. Nunc proin lacinia interdum nulla fusce
                               nam. Sagittis dolor hendrerit donec in eu, facilisis lobortis. Hendr laoret
                               pretium veslum egestas.” </p>
                           <div class="wpo-testimonial-info">
                               <div class="wpo-testimonial-info-img">
                                   <img src="{{ url('public/front/images/testimonial/img-1.jpg') }}" alt="">
                               </div>
                               <div class="wpo-testimonial-info-text">
                                   <h5>Milani Harverd</h5>
                                   <span>CEO Of GRK Egency</span>
                               </div>
                           </div>
                       </div>
                       <div class="wpo-testimonials-item">
                           <p>“Elementum viverra tortor rhoncus nunc. Nunc proin lacinia interdum nulla fusce
                               nam. Sagittis dolor hendrerit donec in eu, facilisis lobortis. Hendr laoret
                               pretium veslum egestas.” </p>
                           <div class="wpo-testimonial-info">
                               <div class="wpo-testimonial-info-img">
                                   <img src="{{ url('public/front/images/testimonial/img-3.jpg') }}" alt="">
                               </div>
                               <div class="wpo-testimonial-info-text">
                                   <h5>Aliza Anney</h5>
                                   <span>Model Belarus</span>
                               </div>
                           </div>
                       </div>
                       <div class="wpo-testimonials-item">
                           <p>“Elementum viverra tortor rhoncus nunc. Nunc proin lacinia interdum nulla fusce
                               nam. Sagittis dolor hendrerit donec in eu, facilisis lobortis. Hendr laoret
                               pretium veslum egestas.” </p>
                           <div class="wpo-testimonial-info">
                               <div class="wpo-testimonial-info-img">
                                   <img src="{{ url('public/front/images/testimonial/img-2.jpg') }}" alt="">
                               </div>
                               <div class="wpo-testimonial-info-text">
                                   <h5>David Miller</h5>
                                   <span>Designer UK</span>
                                   <span>Designer UK</span>
                               </div>
                           </div>
                       </div>
                       <div class="wpo-testimonials-item">
                           <p>“Elementum viverra tortor rhoncus nunc. Nunc proin lacinia interdum nulla fusce
                               nam. Sagittis dolor hendrerit donec in eu, facilisis lobortis. Hendr laoret
                               pretium veslum egestas.” </p>
                           <div class="wpo-testimonial-info">
                               <div class="wpo-testimonial-info-img">
                                   <img src="{{ url('public/front/images/testimonial/img-3.jpg') }}" alt="">
                               </div>
                               <div class="wpo-testimonial-info-text">
                                   <h5>David Miller</h5>
                                   <span>Designer UK</span>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-6">
                   <img src="{{ url('public/front/images/testimonial/r-img.jpg') }}" alt="">
               </div>
           </div>
       </div>

   </div> <!-- end container -->
</section>
<!-- end wpo-testimonials-section -->
<!-- start wpo-case-section -->

<!-- end case-section -->
<!-- start wpo-fun-fact-section -->
<section class="wpo-fun-fact-section">
   <div class="container">
       <div class="row">
           <div class="col col-xs-12">
               <div class="wpo-fun-fact-grids clearfix">
                   <div class="grid">
                       <div class="info">
                           <h3><span class="odometer" data-count="235">00</span>+</h3>
                           <p>Trusted Clients</p>
                       </div>
                   </div>
                   <div class="grid">
                       <div class="info">
                           <h3><span class="odometer" data-count="95">00</span>%</h3>
                           <p>Cases Won</p>
                       </div>
                   </div>
                   <div class="grid">
                       <div class="info">
                           <h3><span class="odometer" data-count="120">00</span>+</h3>
                           <p>Dedicated Lawyer</p>
                       </div>
                   </div>
                   <div class="grid">
                       <div class="info">
                           <h3><span class="odometer" data-count="15">00</span>%</h3>
                           <p>Case Dismissed</p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div> <!-- end container -->
</section>
<!-- end wpo-fun-fact-section -->
<!-- start wpo-Team-section -->
<section class="wpo-team-section section-padding pt-0">
   <div class="container">
       <div class="wpo-team-wrap">
           <div class="row align-items-center">
               <div class="col-lg-5">
                   <div class="wpo-section-title">
                       <span>Qualified Attorneys</span>
                       <h2>Meet Our Experts</h2>
                   </div>
               </div>
           </div>
           <div class="wpo-team-active owl-carousel">
               <div class="wpo-team-item">
                   <div class="wpo-team-img">
                       <img src="{{ url('public/front/images/team/img-1.jpg') }}" alt="">
                   </div>
                   <div class="wpo-team-text">
                       <h2><a href="attorneys-single.html">Robert Fox</a></h2>
                       <span>Family Lawyer</span>
                       <div class="social">
                           <ul>
                               <li><a href="#"><i class="ti-facebook"></i></a></li>
                               <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                               <li><a href="#"><i class="ti-instagram"></i></a></li>
                           </ul>
                       </div>
                   </div>
               </div>
               <div class="wpo-team-item">
                   <div class="wpo-team-img">
                       <img src="{{ url('public/front/images/team/img-2.jpg') }}" alt="">
                   </div>
                   <div class="wpo-team-text">
                       <h2><a href="attorneys-single.html">Jane Cooper</a></h2>
                       <span>Divorce Lawer</span>
                       <div class="social">
                           <ul>
                               <li><a href="#"><i class="ti-facebook"></i></a></li>
                               <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                               <li><a href="#"><i class="ti-instagram"></i></a></li>
                           </ul>
                       </div>
                   </div>
               </div>
               <div class="wpo-team-item">
                   <div class="wpo-team-img">
                       <img src="{{ url('public/front/images/team/img-3.jpg') }}" alt="">
                   </div>
                   <div class="wpo-team-text">
                       <h2><a href="attorneys-single.html">Jacob Jones</a></h2>
                       <span>Criminal Lawer</span>
                       <div class="social">
                           <ul>
                               <li><a href="#"><i class="ti-facebook"></i></a></li>
                               <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                               <li><a href="#"><i class="ti-instagram"></i></a></li>
                           </ul>
                       </div>
                   </div>
               </div>
               <div class="wpo-team-item">
                   <div class="wpo-team-img">
                       <img src="{{ url('public/front/images/team/img-4.jpg') }}" alt="">
                   </div>
                   <div class="wpo-team-text">
                       <h2><a href="attorneys-single.html">Jerome Bell</a></h2>
                       <span>Family Lawer</span>
                       <div class="social">
                           <ul>
                               <li><a href="#"><i class="ti-facebook"></i></a></li>
                               <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                               <li><a href="#"><i class="ti-instagram"></i></a></li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div> <!-- end container -->
</section>
<!-- end Team-section -->
<!-- start of wpo-contact-section -->
<section class="wpo-contact-section-s2 section-padding">
   <div class="container">
       <div class="wpo-contact-section-wrapper">
           <div class="row justify-content-center">
               <div class="col col-xl-5 col-lg-6">
                   <div class="contact-info-wrap">
                       <div class="contact-info-title">
                           <h3>Contact Info</h3>
                           <p>Amet turpis urna malesuada sed augue ut. Orci neque elit massa semper turpis vel. Enim tortor at hac quis odio. Quam nulla gravida sit gravida vitae fermentum parturient.</p>
                       </div>
                       <div class="contact-info-item">
                           <div class="contact-info-icon">
                               <i class="fi flaticon-001-house"></i>
                           </div>
                           <div class="contact-info-text">
                               <h4>Office Address</h4>
                               <p>244 Royal Ln. Mesa, New Jersey </p>
                           </div>
                       </div>
                       <div class="contact-info-item">
                           <div class="contact-info-icon">
                               <i class="fi flaticon-002-open"></i>
                           </div>
                           <div class="contact-info-text">
                               <h4>Email Address</h4>
                               <p>justuprodemo@gmail.com</p>
                           </div>
                       </div>
                       <div class="contact-info-item">
                           <div class="contact-info-icon">
                               <i class="fi flaticon-003-headphone"></i>
                           </div>
                           <div class="contact-info-text">
                               <h4>Phone</h4>
                               <p>(684) 555-0102</p>
                           </div>
                       </div>
                       <div class="contact-info-item">
                           <div class="contact-info-icon">
                               <i class="fi flaticon-004-clock"></i>
                           </div>
                           <div class="contact-info-text">
                               <h4>Office Hour</h4>
                               <p>Mon-Sun: 10am – 7pm</p>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col col-xl-5 col-lg-6 col-md-12 col-12">
                   <div class="wpo-contact-form-area">
                       <div class="form-title">
                           <span>Contact Us</span>
                           <h3>Free Consulting</h3>
                       </div>
                       <form method="post" class="contact-validation-active" id="contact-form-main">
                           <div>
                               <input type="text" class="form-control" name="name" id="name"
                                   placeholder="Your Name*">
                           </div>
                           <div>
                               <input type="email" class="form-control" name="email" id="email"
                                   placeholder="Your Email*">
                           </div>
                           <div>
                               <input type="text" class="form-control" name="email" id="phone"
                                   placeholder="Phone">
                           </div>
                           <div>
                               <select name="subject" class="form-control">
                                   <option disabled="disabled" selected>Subject</option>
                                   <option>Family Law</option>
                                   <option>Personal Injury</option>
                                   <option>Criminal Law</option>
                                   <option>Education Law</option>
                                   <option>Business Law</option>
                               </select>
                           </div>
                           <div class="fullwidth">
                               <textarea class="form-control" name="note" id="c-note"
                                   placeholder="Case Description..."></textarea>
                           </div>
                           <div class="submit-area">
                               <button type="submit" class="theme-btn">Free Consultation</button>
                               <div id="c-loader">
                                   <i class="ti-reload"></i>
                               </div>
                           </div>
                           <div class="clearfix error-handling-messages">
                               <div id="c-success">Thank you</div>
                               <div id="c-error"> Error occurred while sending email. Please try again later.
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
</section>
<!-- end of wpo-contact-section -->
<!-- start wpo-blog-section -->
<section class="wpo-blog-section section-padding">
   <div class="container">
       <div class="wpo-blog-wrap">
           <div class="row align-items-center">
               <div class="col-lg-5 col-md-8">
                   <div class="wpo-section-title">
                       <span>Blog</span>
                       <h2>Latest News Update</h2>
                   </div>
               </div>
               <div class="col-lg-5 offset-lg-2 col-md-4">
                   <div class="see-more-btn">
                       <a href="blog.html">See All News</a>
                   </div>
               </div>
           </div>
           <div class="wpo-blog-items">
               <div class="row">
                   <div class="col col-xl-4 col-lg-6 col-md-6 col-12">
                       <div class="wpo-blog-item">
                           <div class="wpo-blog-img">
                               <img src="{{ url('public/front/images/blog/img-1.jpg') }}" alt="">
                           </div>
                           <div class="wpo-blog-content">
                               <ul>
                                   <li>Sep 03, 2021</li>
                                   <li><a href="blog-single.html">Anne William</a></li>
                                   <li>1 comment</li>
                               </ul>
                               <h2><a href="blog.html">Journalists devoted to coverage of the Supreme Court</a>
                               </h2>
                               <a class="b-btn" href="blog.html">Read More</a>
                           </div>
                       </div>
                   </div>
                   <div class="col col-xl-4 col-lg-6 col-md-6 col-12">
                       <div class="wpo-blog-item">
                           <div class="wpo-blog-img">
                               <img src="{{ url('public/front/images/blog/img-2.jpg') }}" alt="">
                           </div>
                           <div class="wpo-blog-content">
                               <ul>
                                   <li>Jan 15, 2023</li>
                                   <li><a href="blog-single.html">Ken William</a></li>
                                   <li>5 comment</li>
                               </ul>
                               <h2><a href="blog.html">Justice May For You If You Are Innocent </a></h2>
                               <a class="b-btn" href="blog.html">Read More</a>
                           </div>
                       </div>
                   </div>
                   <div class="col col-xl-4 col-lg-6 col-md-6 col-12">
                       <div class="wpo-blog-item">
                           <div class="wpo-blog-img">
                               <img src="{{ url('public/front/images/blog/img-3.jpg') }}" alt="">
                           </div>
                           <div class="wpo-blog-content">
                               <ul>
                                   <li>Feb 22, 2021</li>
                                   <li><a href="blog-single.html">Anne Aliza</a></li>
                                   <li>2 comment</li>
                               </ul>
                               <h2><a href="blog.html">Who Can a Victim Sue after a Car Accident?</a></h2>
                               <a class="b-btn" href="blog.html">Read More</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div> <!-- end container -->
</section>
@endsection