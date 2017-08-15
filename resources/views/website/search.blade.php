@extends('layouts.website')

@section('style')

@endsection

@section('content')
    <?php
    $cat = implode(' ', explode('-', Request::segment(1)));
    $subCat = implode(' ', explode('-', Request::segment(2)));
    ?>
    <!-- main -->
    <section id="main" class="clearfix category-page main-categories">
        <div class="container">
            <div class="breadcrumb-section">
                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>{{ $cat }}</li>
                </ol><!-- breadcrumb -->
                <h2 class="title">{{  $subCat }}</h2>
            </div>
            <div class="banner">

                <!-- banner-form -->
                <div class="banner-form banner-form-full">
                    <form method="post" id="searchForm" action="{{ url('/' . $cat . '/' . $subCat) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="urgent" id="urgent">
                        <input type="hidden" name="contact_time" id="contact_time">

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
            </div>

            <div class="category-info">
                <div class="row">
                    <!-- accordion-->
                    <div class="col-md-3 col-sm-4">
                        <div class="accordion">
                            <!-- panel-group -->
                            <div class="panel-group" id="accordion">

                                <!-- panel -->
                                {{--<div class="panel-default panel-faq">
                                    <!-- panel-heading -->
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordion-one">
                                            <h4 class="panel-title">All Categories<span class="pull-right"><i class="fa fa-minus"></i></span></h4>
                                        </a>
                                    </div><!-- panel-heading -->

                                    <div id="accordion-one" class="panel-collapse collapse in">
                                        <!-- panel-body -->
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="categories.html"><i class="icofont icofont-laptop-alt"></i>Electronics & Gedget<span>(1029)</span></a></li>
                                                <li><a href="#"><i class="icofont icofont-police-car-alt-2"></i>Cars & Vehicles<span>(1228)</span></a></li>
                                                <li><a href="#"><i class="icofont icofont-building-alt"></i>Property<span>(178)</span></a></li>
                                                <li><a href="#"><i class="icofont icofont-ui-home"></i>Home & Garden<span>(7163)</span></a></li>
                                                <li><a href="#"><i class="icofont icofont-animal-dog"></i>Pets & Animals<span>(8709)</span></a></li>
                                                <li><a href="#"><i class="icofont icofont-nurse"></i>Health & Beauty<span>(3129)</span></a></li>
                                                <li><a href="#"><i class="icofont icofont-hockey"></i>Hobby, Sport & Kids<span>(2019)</span></a></li>
                                                <li><a href="#"><i class="icofont icofont-burger"></i>Food & Agriculture<span>(323)</span></a></li>
                                                <li><a href="#"><i class="icofont icofont-girl-alt"></i>Women & Children<span>(425)</span></a></li>
                                                <li><a href="#"><i class="icofont icofont-gift"></i>Gift & Presentation<span>(3223)</span></a></li>
                                                <li><a href="#"><i class="icofont icofont-architecture-alt"></i>Office Product<span>(3283)</span></a></li>
                                                <li><a href="#"><i class="icofont icofont-animal-cat-alt-1"></i>Arts, Crafts & Sewing<span>(3221)</span></a></li>
                                                <li><a href="#"><i class="icofont icofont-abc"></i>Others<span>(3129)</span></a></li>
                                            </ul>
                                        </div><!-- panel-body -->
                                    </div>
                                </div>--}}<!-- panel -->

                                <!-- panel -->
                                <div class="panel-default panel-faq">
                                    <!-- panel-heading -->
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordion-two">
                                            <h4 class="panel-title">Urgent<span class="pull-right">{{--<i class="fa fa-plus"></i>--}}</span></h4>
                                        </a>
                                    </div><!-- panel-heading -->

                                    <div id="accordion-two" class="panel-collapse collapse in">
                                        <!-- panel-body -->
                                        <div class="panel-body">
                                            <div class="dropdown category-dropdown language-dropdown ">
                                                <a data-toggle="dropdown" href="#"><span class="change-text">All</span> <i class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown-menu  language-change">
                                                    <li  onclick="setInput('urgent', false)" ><a href="#">All</a></li>
                                                    <li  onclick="setInput('urgent', 1)" ><a href="#">Yes</a></li>
                                                    <li  onclick="setInput('urgent', 0)" ><a href="#">No</a></li>
                                                </ul>
                                            </div>
                                        </div><!-- panel-body -->
                                    </div>
                                </div><!-- panel -->

                                <!-- panel -->
                                <div class="panel-default panel-faq">
                                    <!-- panel-heading -->
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordion-four">
                                            <h4 class="panel-title">
                                                Best contact time
                                                <span class="pull-right">{{--<i class="fa fa-plus"></i>--}}</span>
                                            </h4>
                                        </a>
                                    </div><!-- panel-heading -->

                                    <div id="accordion-four" class="panel-collapse collapse in">
                                        <!-- panel-body -->
                                        <div class="panel-body">
                                            <div class="dropdown category-dropdown language-dropdown ">
                                                <a data-toggle="dropdown" href="#"><span class="change-text">All</span> <i class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown-menu  language-change">
                                                    <li  onclick="setInput('contact_time', false)" ><a href="#">All</a></li>
                                                    <li  onclick="setInput('contact_time', 'Anytime')" ><a href="#">Anytime</a></li>
                                                    <li  onclick="setInput('contact_time', 'AM')" ><a href="#">AM</a></li>
                                                    <li  onclick="setInput('contact_time', 'PM')" ><a href="#">PM</a></li>
                                                </ul>
                                            </div>
                                        </div><!-- panel-body -->
                                    </div>
                                </div><!-- panel -->
                            </div><!-- panel-group -->
                        </div>
                    </div><!-- accordion-->

                    <!-- recommended-ads -->
                    <div class="col-sm-8 col-md-7">
                        <div class="section recommended-ads">
                            <!-- featured-top -->
                            <div class="featured-top">
                                <h4>Recommended Ads for You</h4>
                                <div class="dropdown pull-right">

                                    <!-- category-change -->
                                    {{--<div class="dropdown category-dropdown">
                                        <h5>Sort by:</h5>
                                        <a data-toggle="dropdown" href="#"><span class="change-text">Popular</span><i class="fa fa-caret-square-o-down"></i></a>
                                        <ul class="dropdown-menu category-change">
                                            <li><a href="#">Featured</a></li>
                                            <li><a href="#">Newest</a></li>
                                            <li><a href="#">All</a></li>
                                            <li><a href="#">Bestselling</a></li>
                                        </ul>
                                    </div>--}}
                                <!-- category-change -->
                                </div>
                            </div><!-- featured-top -->

                            @foreach($results as $referral)
                                <!-- ad-item -->
                                    <div class="ad-item row">
                                        <!-- rending-text -->
                                        <div class="item-info col-sm-12">
                                            <!-- ad-info -->
                                            <div class="ad-info">
                                                <h3 class="item-price">{{ $referral->name }}</h3>
                                                <h4 class="item-title"><a href="#">{{ $referral->category->name }}</a></h4>
                                                <div class="item-cat">
                                                    <span><strong>Description : </strong>{{ $referral->description }}</span>
                                                </div>
                                            </div><!-- ad-info -->

                                            <!-- ad-meta -->
                                            <div class="ad-meta">
                                                <div class="meta-content">
                                                    <span class="visitors"> Posted On: <a href="#">{{ $referral->created_at }}</a></span>
                                                </div>
                                                <!-- item-info-right -->
                                                <div class="user-option pull-right">
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                                    <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>
                                                </div><!-- item-info-right -->
                                            </div><!-- ad-meta -->
                                        </div><!-- item-info -->
                                    </div><!-- ad-item -->
                            @endforeach

                            <!-- pagination  -->
                            {{--<div class="text-center">
                                <ul class="pagination ">
                                    <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">10</a></li>
                                    <li><a href="#">20</a></li>
                                    <li><a href="#">30</a></li>
                                    <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                                </ul>
                            </div>--}}
                            <!-- pagination  -->
                        </div>
                    </div><!-- recommended-ads -->

                    <div class="col-md-2 hidden-xs hidden-sm">
                        <div class="advertisement text-center">
                            <a href="#"><img src="{{ asset('website/images/ads/2.jpg') }}" alt="" class="img-responsive"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- container -->
    </section><!-- main -->


    <section id="something-sell" class="clearfix parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="title">Do you have a referral to post?</h2>
                    <h4>Post your ad for free on RyansReferrals.com</h4>
                    <a href="ad-post.html" class="btn btn-primary">Sign up as a member</a>
                </div>
            </div><!-- row -->
        </div><!-- contaioner -->
    </section><!-- something-sell -->

@endsection

@section('script')
    <script>
        let form = $('#searchForm');

        function setFormAction(url){
            console.log('intra', url);
            form.attr('action', url);
        }

        function setInput(name, value = false){
            if(value === false){
                $('#' + name).val('')
            } else {
                if($('#' + name).val().length === 0){
                    $('#' + name).val(value);
                } else {
                    $('#' + name).val('')
                }
            }
        }
    </script>
@endsection
