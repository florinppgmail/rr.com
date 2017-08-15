@extends('layouts.websitemember',
[
    'page' => 'Dashboard',
])

@section('style')

@endsection

@section('content')
    <div class="ads-info">
        <div class="row">
            <div class="col-sm-8">
                <div class="my-ads section">
                    <h2>Referrals Status</h2>
                    <div class="row">
                        <div class="col-md-4 m-b-lg">
                            <div class="panel panel-default panel-profile m-b-0 text-center">
                                <div class="panel-heading " >FREE</div>
                                <div class="panel-body">
                                    <h1 class="panel-title">{{ $totalFreeReferrals }}</h1>

                                    <a href="{{ route('member-referrals-free') }}" class="btn btn-primary-outline btn-sm m-b">
                                        <span class="icon icon-add-user"></span> View all
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 m-b-lg">
                            <div class="panel panel-default panel-profile m-b-0 text-center">
                                <div class="panel-heading " >SOLD</div>
                                <div class="panel-body">
                                    <h1 class="panel-title">{{ $totalSoldReferrals }}</h1>

                                    <a href="{{ route('member-referrals-sold') }}" class="btn btn-primary-outline btn-sm m-b">
                                        <span class="icon icon-add-user"></span> View all
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 m-b-lg">
                            <div class="panel panel-default panel-profile m-b-0 text-center">
                                <div class="panel-heading " >EXPIRED</div>
                                <div class="panel-body">
                                    <h1 class="panel-title">{{ $totalExpiredReferrals }}</h1>

                                    <a href="{{ route('member-referrals-expired') }}" class="btn btn-primary-outline btn-sm m-b">
                                        <span class="icon icon-add-user"></span> View all
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- my-ads -->

            <!-- recommended-cta-->
            <div class="col-sm-4 text-center">
                <!-- recommended-cta -->
                <div class="recommended-cta">
                    <div class="cta">
                        <!-- single-cta -->
                        <div class="single-cta">
                            <!-- cta-icon -->
                            <div class="cta-icon icon-secure">
                                <img src="{{ asset('website/images/icon/13.png') }}" alt="Icon" class="img-responsive">
                            </div><!-- cta-icon -->

                            <h4>Secure Trading</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div><!-- single-cta -->


                        <!-- single-cta -->
                        <div class="single-cta">
                            <!-- cta-icon -->
                            <div class="cta-icon icon-support">
                                <img src="{{ asset('website/images/icon/14.png') }}" alt="Icon" class="img-responsive">
                            </div><!-- cta-icon -->

                            <h4>24/7 Support</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div><!-- single-cta -->


                        <!-- single-cta -->
                        <div class="single-cta">
                            <!-- cta-icon -->
                            <div class="cta-icon icon-trading">
                                <img src="{{ asset('website/images/icon/15.png') }}" alt="Icon" class="img-responsive">
                            </div><!-- cta-icon -->

                            <h4>Easy Trading</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div><!-- single-cta -->

                        <!-- single-cta -->
                        <div class="single-cta">
                            <h5>Need Help?</h5>
                            <p><span>Give a call on</span><a href="tellto:08048100000"> 08048100000</a></p>
                        </div><!-- single-cta -->
                    </div>
                </div><!-- cta -->
            </div><!-- recommended-cta-->

        </div><!-- row -->
    </div><!-- row -->
@endsection

@section('script')
    <script>

    </script>
@endsection