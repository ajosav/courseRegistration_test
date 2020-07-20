@extends('layouts.app')

    @section('links')
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">
            Home
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#howto">
            How to
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#about">
            About
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#resources">
            Tools and Resources
            </a>
        </li>
    @stop

    
    @if (Route::has('login'))
        @section('auth-links') 
            @auth
                <li class="nav-item">
                    <a  href="{{ url('/home') }}">Dashboard</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="auth auth-reg" href="{{ route('login') }}">Login</a>
                </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="auth auth-log" href="{{ route('register') }}">Register</a>
                </li>
            @endif
            @endauth
        @stop
    @endif

    @section('hero-area')
      <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="contents">
            <h2 class="head-title">COURSE REGISTRATION SYSTEM</h2>
            <p>Allows students to login and register courses per semester</p>
            <div class="header-button">
            <a href="#howto" class="btn btn-common">Read More</i></a>
            <a href="{{url('/login')}}" class="btn btn-border video-popup">Try it Out</i></a>
            </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <div class="intro-img">
              <img class="img-fluid" src="assets/img/intro-mobile.png" alt="">
          </div>            
      </div>
    @stop
    @section('body')
        <!-- Services Section Start -->
    <section id="howto" class="section-padding">
      <div class="container">
        <div class="section-header text-center">
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">How It Works</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row">
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="0.3s">
              <div class="icon">
                <i class="lni-cog"></i>
              </div>
              <div class="services-content">
                <h3><a href="{{url('/register')}}">Register/Login</a></h3>
                <p>If youare a new user, you need to create an account first before you can use the application.<br/> If you have registered before, You only need to login</p>
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="1.5s">
              <div class="icon">
                <i class="lni-mobile"></i>
              </div>
              <div class="services-content">
                <h3><a href="{{url('/home')}}">Dashboard</a></h3>
                <p>On login, you'll be taken to a dashboard where you can several activities</p>
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="1.2s">
              <div class="icon">
                <i class="lni-layers"></i>
              </div>
              <div class="services-content">
                <h3><a href="{{url('/recommendation')}}">Course Recommendation</a></h3>
                <p>Navigate to the Course Recommendation link of the dashboard and select the preferred level and session</p>
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
              <div class="icon">
                <i class="lni-stats-up"></i>
              </div>
              <div class="services-content">
                <h3><a href="{{url('/recommendation')}}">Recomendations</a></h3>
                <p>After selecting the level and session, you'll be taken to a page where you see trending courses base on past history and activities</p>
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="0.9s">
              <div class="icon">
                <i class="lni-cog"></i>
              </div>
              <div class="services-content">
                <h3><a href="{{url('/recommndation')}}">Select Course</a></h3>
                <p>Tick your preferred course from the courses recommended by the system, and the click on the submit button</p>
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="1.8s">
              <div class="icon">
                <i class="lni-rocket"></i>
              </div>
              <div class="services-content">
                <h3><a href="https://github.com/ajosav">Go to your GITHUB</a></h3>
                <p>For more information about this work, please checkout my github repository</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Services Section End -->

    <!-- Team Section Start -->
    <section id="about" class="section-padding bg-gray">
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">About the Taks</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-12 col-xs-12 info">
            <div class="about-wrapper wow fadeInLeft" data-wow-delay="0.3s">
              <div>
                <div class="site-heading">
                  <h2 class="section-title">Course Recommender System</h2>
                </div>
                <div class="content">
                  <p>
                   This is a simple course registration system given to test my programming knowledge and delivery speed. 
                  </p>
                  <br>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
            <img class="img-fluid" src="assets/img/about/img-1.png" alt="" >
          </div>
        </div>
      </div>
    </section>
    <!-- Team Section End -->
    <section id="resources" class="section-padding bg-pink">
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown animated" data-wow-delay="0.3s" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">Resources</h2>
          <div class="shape wow fadeInDown animated" data-wow-delay="0.3s" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;"></div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-12 col-xs-12">
            <!-- Team Item Starts -->
            <div class="team-item wow fadeInRight animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
              <div class="team-img">
                <img class="img-fluid" src="assets/img/resources/laravel.png" alt="">
              </div>
              <div class="contetn">
                <div class="info-text">
                  <h3><a href="#">Laravel</a></h3>
                  <p>PHP Framework</p>
                </div>
                <p>A free, open-source PHP web framework, intended for the development of web applications following (MVC) architectural pattern and based on Symfony.</p>
                <ul class="social-icons">
                  <li><a href="https://www.laravel.com">Official Website</a></li>
                </ul>
              </div>
            </div>
            <!-- Team Item Ends -->
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12">
            <!-- Team Item Starts -->
            <div class="team-item wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
              <div class="team-img">
                <img class="img-fluid" src="assets/img/resources/vue.jpg" alt="">
              </div>
              <div class="contetn">
                <div class="info-text">
                  <h3><a href="#">Vue.js</a></h3>
                  <p>Javascript Framework</p>
                </div>
                <p>Vue.js is an open-source Model–view–viewmodel JavaScript framework for building user interfaces and single-page applications.</p>
                <ul class="social-icons">
                  <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </div>
            <!-- Team Item Ends -->
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12">
            <!-- Team Item Starts -->
            <div class="team-item wow fadeInRight animated" data-wow-delay="0.6s" style="visibility: visible;-webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">
              <div class="team-img">
                <img class="img-fluid" src="assets/img/resources/boostrap4.png" alt="">
              </div>
              <div class="contetn">
                <div class="info-text">
                  <h3><a href="#">Bootstrap 4</a></h3>
                  <p>CSS Framework</p>
                </div>
                <p>A free and open-source CSS framework directed at responsive, mobile-first front-end web development. It contains CSS- and JavaScript-based design templates for typography, forms, buttons, navigation and other interface components.</p>
                <ul class="social-icons">
                  <li><a href="https://bootstrap.org">Official Website</a></li>
                  
                </ul>
              </div>
            </div>
            <!-- Team Item Ends -->
          </div>
          {{-- <div class="col-lg-6 col-md-12 col-xs-12">
            <!-- Team Item Starts -->
            <div class="team-item wow fadeInRight animated" data-wow-delay="0.8s" style="visibility: visible;-webkit-animation-delay: 0.8s; -moz-animation-delay: 0.8s; animation-delay: 0.8s;">
              <div class="team-img">
                <img class="img-fluid" src="assets/img/team/team-04.png" alt="">
              </div>
              
            </div>
            <!-- Team Item Ends -->
          </div> --}}
        </div>
      </div>
    </section>
    <!-- Footer Section Start -->
    <footer id="footer" class="footer-area section-padding">
      <div id="copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="copyright-content">
                <p>Developed by: <strong>Adebayo Joshua O.</strong> All rights reserved.</p>
              </div>
            </div>
          </div>
        </div>
      </div>   
    </footer> 
    <!-- Footer Section End -->

    <!-- Go to Top Link -->
    <a href="#" class="back-to-top">
    	<i class="lni-arrow-up"></i>
    </a>
    
    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->
    @stop

