@extends('layouts.website')

@section('style')

@endsection

@section('content')
    <!-- main -->
    <section id="main" class="clearfix about-us page">
        <div class="container">

            <div class="breadcrumb-section">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>About</li>
                </ol><!-- breadcrumb -->
                <h2 class="title">About Us</h2>
            </div><!-- banner -->

            <div class="section about">
                <div class="about-info" style="margin-bottom:inherit;">
                    <div class="row">


                        <div class="col-md-12">

                            <p>Ryan's Referrals was created by a group of business owners that were faced with the day to day struggle of finding the next job to bid on to put food on the table for their families. Along with this struggle we realized that there are people out that are having a different struggle. The struggle of finding the right company to complete a job for them. There is always that fear of not knowing the background of the company your hiring to complete these jobs. Do they have the proper license to do the job? Are they properly insured so I am covered if something happens?</p><br>

                            <p>Ryan's Referrals was created to help you face these struggles. Business owners will receive notifications of verified jobs that are ready to receive your quotes.</p><br>

                            <p>Homeowners will receive a list of prescreened companies that are qualified to complete your project. These companies will be calling you. No more headaches from calling tons of companies and not receiving calls back. We do the work for you at no cost to you.</p><br>

                            <p>Have you ever been asked if you know someone that provides some type of service? Well now you do and with Ryan's Referrals we feel that you should be compensated for it. By referring a friend to our site or using one of our qualified companies we give you a cash referral bonus for it.</p>

                        </div>


                        {{--<!-- about-us-images -->--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="about-us-images">--}}
                                {{--<img src="{{ asset('website/images/about-us/1.jpg') }}" alt="About us Image" class="img-responsive">--}}
                            {{--</div>--}}
                        {{--</div><!-- about-us-images -->--}}

                        {{--<!-- about-text -->--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="about-text">--}}
                                {{--<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do</h3>--}}
                                {{--<!-- description-paragraph -->--}}
                                {{--<div class="description-paragraph">--}}
                                    {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
                                {{--</div><!-- description-paragraph -->--}}

                                {{--<!-- description-paragraph -->--}}
                                {{--<div class="description-paragraph"><p> velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.</p></div>--}}
                            {{--</div><!-- description-paragraph -->--}}
                        {{--</div><!-- about-text -->--}}
                    </div>
                </div><!-- about-info -->


                {{--<div class="approach">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-4 text-center">--}}
                            {{--<div class="our-approach">--}}
                                {{--<h3>Backgrounds</h3>--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
                            {{--</div>--}}
                        {{--</div><!-- about-text -->--}}

                        {{--<!-- about-text -->--}}
                        {{--<div class="col-sm-4 text-center">--}}
                            {{--<div class="our-approach">--}}
                                {{--<h3>Our Approach</h3>--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>--}}
                            {{--</div>--}}
                        {{--</div><!-- about-text -->--}}

                        {{--<!-- about-text -->--}}
                        {{--<div class="col-sm-4 text-center">--}}
                            {{--<div class="our-approach">--}}
                                {{--<h3>Methodology</h3>--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
                            {{--</div>--}}
                        {{--</div><!-- about-text -->--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="team-section">--}}
                    {{--<h3>Trade Team Member</h3>--}}
                    {{--<div class="team-members">--}}
                        {{--<div class="team-member">--}}
                            {{--<!-- team-member-image -->--}}
                            {{--<div class="team-member-image">--}}
                                {{--<img src="{{ asset('website/images/about-us/2.jpg') }}" alt="Team Member" class="img-responsive">--}}
                                {{--<!-- social -->--}}
                                {{--<div class="team-social">--}}
                                    {{--<ul class="social">--}}
                                        {{--<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>--}}
                                    {{--</ul><!-- social -->--}}
                                {{--</div>--}}
                            {{--</div><!-- team-member-image -->--}}
                            {{--<h4>Leaf Corcoran</h4>--}}
                        {{--</div><!-- team-member -->--}}

                        {{--<!-- team-member -->--}}
                        {{--<div class="team-member">--}}
                            {{--<!-- team-member-image -->--}}
                            {{--<div class="team-member-image">--}}
                                {{--<img src="{{ asset('website/images/about-us/3.jpg') }}" alt="Team Member" class="img-responsive">--}}
                                {{--<!-- social -->--}}
                                {{--<div class="team-social">--}}
                                    {{--<ul class="social">--}}
                                        {{--<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>--}}
                                    {{--</ul><!-- social -->--}}
                                {{--</div>--}}
                            {{--</div><!-- team-member-image -->--}}
                            {{--<h4>Mike Lewis</h4>--}}
                        {{--</div><!-- team-member -->--}}

                        {{--<!-- team-member -->--}}
                        {{--<div class="team-member">--}}
                            {{--<!-- team-member-image -->--}}
                            {{--<div class="team-member-image">--}}
                                {{--<img src="{{ asset('website/images/about-us/4.jpg') }}" alt="Team Member" class="img-responsive">--}}
                                {{--<!-- social -->--}}
                                {{--<div class="team-social">--}}
                                    {{--<ul class="social">--}}
                                        {{--<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>--}}
                                    {{--</ul><!-- social -->--}}
                                {{--</div>--}}
                            {{--</div><!-- team-member-image -->--}}
                            {{--<h4>Julie MacKay</h4>--}}
                        {{--</div><!-- team-member -->--}}

                        {{--<!-- team-member -->--}}
                        {{--<div class="team-member">--}}
                            {{--<!-- team-member-image -->--}}
                            {{--<div class="team-member-image">--}}
                                {{--<img src="{{ asset('website/images/about-us/5.jpg') }}" alt="Team Member" class="img-responsive">--}}
                                {{--<!-- social -->--}}
                                {{--<div class="team-social">--}}
                                    {{--<ul class="social">--}}
                                        {{--<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>--}}
                                    {{--</ul><!-- social -->--}}
                                {{--</div>--}}
                            {{--</div><!-- team-member-image -->--}}
                            {{--<h4>Christine Marquardt</h4>--}}
                        {{--</div><!-- team-member -->--}}

                        {{--<!-- team-member -->--}}
                        {{--<div class="team-member">--}}
                            {{--<!-- team-member-image -->--}}
                            {{--<div class="team-member-image">--}}
                                {{--<img src="{{ asset('website/images/about-us/6.jpg') }}" alt="Team Member" class="img-responsive">--}}
                                {{--<!-- social -->--}}
                                {{--<div class="team-social">--}}
                                    {{--<ul class="social">--}}
                                        {{--<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>--}}
                                    {{--</ul><!-- social -->--}}
                                {{--</div>--}}
                            {{--</div><!-- team-member-image -->--}}
                            {{--<h4>Loren Heiman</h4>--}}
                        {{--</div><!-- team-member -->--}}

                        {{--<!-- team-member -->--}}
                        {{--<div class="team-member">--}}
                            {{--<!-- team-member-image -->--}}
                            {{--<div class="team-member-image">--}}
                                {{--<img src="{{ asset('website/images/about-us/7.jpg') }}" alt="Team Member" class="img-responsive">--}}
                                {{--<!-- social -->--}}
                                {{--<div class="team-social">--}}
                                    {{--<ul class="social">--}}
                                        {{--<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>--}}
                                    {{--</ul><!-- social -->--}}
                                {{--</div>--}}
                            {{--</div><!-- team-member-image -->--}}
                            {{--<h4>Chris Taylor</h4>--}}
                        {{--</div><!-- team-member -->--}}

                        {{--<!-- team-member -->--}}
                        {{--<div class="team-member">--}}
                            {{--<!-- team-member-image -->--}}
                            {{--<div class="team-member-image">--}}
                                {{--<img src="{{ asset('website/images/about-us/8.jpg') }}" alt="Team Member" class="img-responsive">--}}
                                {{--<!-- social -->--}}
                                {{--<div class="team-social">--}}
                                    {{--<ul class="social">--}}
                                        {{--<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>--}}
                                    {{--</ul><!-- social -->--}}
                                {{--</div>--}}
                            {{--</div><!-- team-member-image -->--}}
                            {{--<h4>Alex Posey</h4>--}}
                        {{--</div><!-- team-member -->--}}

                        {{--<!-- team-member -->--}}
                        {{--<div class="team-member">--}}
                            {{--<!-- team-member-image -->--}}
                            {{--<div class="team-member-image">--}}
                                {{--<img src="{{ asset('website/images/about-us/9.jpg') }}" alt="Team Member" class="img-responsive">--}}
                                {{--<!-- social -->--}}
                                {{--<div class="team-social">--}}
                                    {{--<ul class="social">--}}
                                        {{--<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>--}}
                                    {{--</ul><!-- social -->--}}
                                {{--</div>--}}
                            {{--</div><!-- team-member-image -->--}}
                            {{--<h4>Teddy Newell</h4>--}}
                        {{--</div><!-- team-member -->--}}

                        {{--<!-- team-member -->--}}
                        {{--<div class="team-member">--}}
                            {{--<!-- team-member-image -->--}}
                            {{--<div class="team-member-image">--}}
                                {{--<img src="{{ asset('website/images/about-us/10.jpg') }}" alt="Team Member" class="img-responsive">--}}
                                {{--<!-- social -->--}}
                                {{--<div class="team-social">--}}
                                    {{--<ul class="social">--}}
                                        {{--<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>--}}
                                    {{--</ul><!-- social -->--}}
                                {{--</div>--}}
                            {{--</div><!-- team-member-image -->--}}
                            {{--<h4>Eli Amesefe</h4>--}}
                        {{--</div><!-- team-member -->--}}

                        {{--<!-- team-member -->--}}
                        {{--<div class="team-member">--}}
                            {{--<!-- team-member-image -->--}}
                            {{--<div class="team-member-image">--}}
                                {{--<img src="{{ asset('website/images/about-us/11.jpg') }}" alt="Team Member" class="img-responsive">--}}
                                {{--<!-- social -->--}}
                                {{--<div class="team-social">--}}
                                    {{--<ul class="social">--}}
                                        {{--<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>--}}
                                        {{--<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>--}}
                                    {{--</ul><!-- social -->--}}
                                {{--</div>--}}
                            {{--</div><!-- team-member-image -->--}}
                            {{--<h4>Andrei Patru</h4>--}}
                        {{--</div><!-- team-member -->--}}

                    {{--</div><!-- team-members -->--}}
                {{--</div><!-- team-members -->--}}
            {{--</div><!-- about -->--}}
        </div><!-- container -->
    </section>
    <!-- main -->
@endsection

@section('script')

@endsection
