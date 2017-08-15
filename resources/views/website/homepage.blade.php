@extends('layouts.website')

@section('style')

@endsection

@section('content')
    <!-- home-one-info -->
    <section id="home-one-info" class="clearfix home-one">
        <!-- world -->
        <div id="banner-two" class="parallax-section">
            <div class="row text-center">
                <!-- banner -->
                <div class="col-sm-12 ">
                    <div class="banner">
                        <h1 class="title" style="text-shadow: 2px 1px lightgrey">Ryans Referrals  </h1>
                        <h3 style="color: transparent">Search from over 15,00,000 classifieds & Post unlimited classifieds free!</h3>
                        <!-- banner-form -->
                        <div class="banner-form">
                            <form method="post" id="searchForm" action="{{ url('/all/all') }}">
                                {{ csrf_field() }}
                                <input type="hidden" id="urgent">
                                <input type="hidden" id="contact_time">

                                <!-- category-change -->
                                <div class="dropdown category-dropdown">
                                    <a data-toggle="dropdown" href="#"><span class="change-text">Select Category</span> <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu category-change">
                                        @foreach($categories as $category)
                                            @if($category->subcategories()->count())
                                                <li><a href="javascript:void(0)">{{$category->name}}</a></li>
                                                @foreach($category->subcategories as $subCategory)
                                                    <li onclick="setFormAction('{{ url('/' . implode('-', explode(' ', $category->name)) . '/' . implode('-', explode(' ', $subCategory->name))) }}')"><a href="#"> - {{$subCategory->name}}</a></li>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </ul>
                                </div><!-- category-change -->

                                <!-- language-dropdown -->
                            {{--<div class="dropdown category-dropdown language-dropdown ">
                                <a data-toggle="dropdown" href="#"><span class="change-text">United Kingdom</span> <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu  language-change">
                                    <li><a href="#">United Kingdom</a></li>
                                    <li><a href="#">United States</a></li>
                                    <li><a href="#">China</a></li>
                                    <li><a href="#">Russia</a></li>
                                </ul>
                            </div>--}}
                            <!-- language-dropdown -->

                                <input name="query" type="text" class="form-control" placeholder="Type Your key word">
                                <button type="submit" class="form-control" value="Search">Search</button>
                            </form>
                        </div><!-- banner-form -->

                        <!-- banner-socail -->
                        {{--<ul class="banner-socail">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>--}}
                        <!-- banner-socail -->
                    </div>
                </div><!-- banner -->
            </div><!-- row -->
        </div><!-- world -->

        <div class="container">
            <div class="section category-ad text-center" style="width: 100%">
                <ul class="category-list">
                    @foreach($categories as $category)
                        <li class="category-item">
                            <a href="#" data-toggle="modal" data-target="#modal-{{$category->id}}">
                                {{--<div class="category-icon"><img src="{{ asset('website/images/icon/1.png') }}" alt="images" class="img-responsive"></div>--}}
                                <div class="category-icon"><i class="fa fa-3x {{ $category->icon }}"></i></div>

                                <span class="category-title">{{ $category->name }}</span>
                                <span class="category-quantity">({{ $category->subcategories->count() }})</span>
                            </a>
                        </li><!-- category-item -->
                    @endforeach
                </ul>
            </div><!-- category-ad -->

            <!-- cta -->
            <div class="cta text-center how-it-works">
                <div class="how-it-works-inside">
                    <div class="row">
                        <!-- single-cta -->
                        <div class="col-md-12" style="color: white;">
                            <h1><strong>HOW IT WORKS</strong></h1>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-cta" >
                                <!-- cta-icon -->
                                <div class="cta-icon icon-secure" style="color: white;text-align: center">
                                    {{--<img src="{{ asset('website/images/icon/13.png') }}" alt="Icon" class="img-responsive">--}}
                                    <div class="numberCircle center-block">1</div>
                                </div><!-- cta-icon -->
                                <br>
                                <ul>
                                    <li><strong>DESCRIPTION</strong></li>
                                    <li>Tell us about your project</li>
                                </ul>
                            </div>
                        </div><!-- single-cta -->
                        <div class="col-sm-3">
                            <div class="single-cta" >
                                <!-- cta-icon -->
                                <div class="cta-icon icon-secure" style="color: white;text-align: center">
                                    {{--<img src="{{ asset('website/images/icon/13.png') }}" alt="Icon" class="img-responsive">--}}
                                    <div class="numberCircle center-block">2</div>
                                </div><!-- cta-icon -->
                                <br>
                                <ul>
                                    <li><strong>RECEIVE QUOTES</strong></li>
                                    <li>We match you with prescreened profesionals to receive Quotes from.</li>
                                </ul>
                            </div>
                        </div><!-- single-cta -->
                        <div class="col-sm-3">
                            <div class="single-cta" >
                                <!-- cta-icon -->
                                <div class="cta-icon icon-secure" style="color: white;text-align: center">
                                    {{--<img src="{{ asset('website/images/icon/13.png') }}" alt="Icon" class="img-responsive">--}}
                                    <div class="numberCircle center-block">3</div>
                                </div><!-- cta-icon -->
                                <br>
                                <ul>
                                    <li><strong>HIRE A PRO</strong></li>
                                    <li>Compare quotes, then hire the right pro for you.</li>
                                </ul>
                            </div>
                        </div><!-- single-cta -->
                        <div class="col-sm-3">
                            <div class="single-cta" >
                                <!-- cta-icon -->
                                <div class="cta-icon icon-secure" style="color: white;text-align: center">
                                    {{--<img src="{{ asset('website/images/icon/13.png') }}" alt="Icon" class="img-responsive">--}}
                                    <div class="numberCircle center-block">4</div>
                                </div><!-- cta-icon -->
                                <br>
                                <ul>
                                    <li><strong>GET PAID</strong></li>
                                    <li>Wheather you are reffering a friend OR hire a pro, you get a referral bonus.</li>
                                </ul>
                            </div>
                        </div><!-- single-cta -->

                    </div><!-- row -->
                </div>
            </div><!-- cta -->
        </div><!-- container -->
    </section><!-- home-one-info -->

    <!-- download -->
    {{--<section id="download" class="clearfix parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>Download on App Store</h2>
                </div>
            </div><!-- row -->

            <!-- row -->
            <div class="row">
                <!-- download-app -->
                <div class="col-sm-4">
                    <a href="#" class="download-app">
                        <img src="images/icon/16.png" alt="Image" class="img-responsive">
                        <span class="pull-left">
							<span>available on</span>
							<strong>Google Play</strong>
						</span>
                    </a>
                </div><!-- download-app -->

                <!-- download-app -->
                <div class="col-sm-4">
                    <a href="#" class="download-app">
                        <img src="images/icon/17.png" alt="Image" class="img-responsive">
                        <span class="pull-left">
							<span>available on</span>
							<strong>App Store</strong>
						</span>
                    </a>
                </div><!-- download-app -->

                <!-- download-app -->
                <div class="col-sm-4">
                    <a href="#" class="download-app">
                        <img src="images/icon/18.png" alt="Image" class="img-responsive">
                        <span class="pull-left">
							<span>available on</span>
							<strong>Windows Store</strong>
						</span>
                    </a>
                </div><!-- download-app -->
            </div><!-- row -->
        </div><!-- contaioner -->
    </section>--}}
    <!-- download -->
    <!-- Subcategories Modals -->
    @foreach($categories as $category)
        <div id="modal-{{ $category->id }}" class="modal fade subcategories-modal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="text-align: center">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{ strtoupper($category->name) }}</h4>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            @if($category->subcategories->count())
                                @foreach($category->subcategories as $subcat)
                                    <li class="list-group-item subcategory-item"  onclick="setFormAction('{{ url('/' . implode('-', explode(' ', $category->name)) . '/' . implode('-', explode(' ', $subcat->name))) }}')">
                                        <a href=" {{ url( implode('-', explode(' ', $category->name)) . '/' . implode('-', explode(' ', $subcat->name))) }}">{{ $subcat->name }}</a>
                                    </li>
                                @endforeach
                            @else
                                <p>No subcategories</p>
                            @endif
                        </ul>
                    </div>
                    {{--<div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>--}}
                </div>

            </div>
        </div>
    @endforeach
    <!-- Subcategories Modals -->

@endsection

@section('script')
    <script>
        let form = $('#searchForm');

        function setFormAction(url){
            form.attr('action', url);
        }
    </script>
@endsection
