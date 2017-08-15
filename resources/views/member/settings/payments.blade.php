@extends('layouts.websitemember',
[
    'page' => 'Payments',
])

@section('style')

@endsection

@section('content')
    <div class="profile section">
        <div class="row">
            <div class="col-sm-8">
                <div class="user-pro-section">
                    <!-- change-password -->
                    <div class="change-password section">
                        <h2>Cash out </h2>
                        <!-- form -->
                        <hr>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 text-center">
                                <div class="form-group">
                                    <label style="width: inherit">Your ballance is : {{ $balance }} $</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                                <div class="form-group">
                                    <label></label>
                                    <select class="form-control" name="requested_sum" id="requested_sum" {{ $balance < 50 ? 'disabled' :'' }}>
                                        <option value="{{ Cache::get('settings_member_cash_out') }}">{{ Cache::get('settings_member_cash_out') }} $</option>
                                        <option value="100">100 $</option>
                                        <option value="150">150 $</option>
                                        <option value="200">200 $</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="pull-right">
                                        <a href="#" id="cashOutButton" class="btn" {{ $balance < 50 ? 'disabled' :'' }}>Ca$h out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div id="successNotification" class="alert alert-dismissable alert-style-1" style="display: none">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="zmdi zmdi-check"></i> <span id="notificationText"></span>
                        </div>
                        @if($balance < 50)
                            <div class="text-center">
                                <p>You require at least {{ Cache::get('settings_member_cash_out') }} $ in order to cash out.</p>
                            </div>
                        @endif
                        <hr>
                        <div class="row">
                            <h3>Payments requested</h3>
                            @if(Auth::user()->payments()->requested()->count() === 0)
                                <p>No payments have been requested yet.</p>
                            @endif
                            @foreach(Auth::user()->payments()->approved()->get() as $payment)
                                <div class="ad-item row">
                                    <!-- item-image -->
                                {{-- <div class="item-image-box col-sm-4">
                                     <div class="item-image">
                                         <a href="details.html"><img src="images/trending/1.jpg" alt="Image" class="img-responsive"></a>
                                     </div><!-- item-image -->
                                 </div>--}}

                                <!-- rending-text -->
                                    <div class="item-info col-sm-12">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <div class="col-md-6 col-lg-6 col-sm-6">
                                                <h3 class="item-price">ID : {{ $payment->id }}</h3>
                                                <h4 class="item-title"><a href="#">Date : {{ $payment->created_at }}</a></h4>
                                                <h4 class="item-title"><a href="#">Requested Sum : {{ $payment->requested_sum }} $</a></h4>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-6">

                                            </div>


                                        </div><!-- ad-info -->

                                        <!-- ad-meta -->
                                        <div class="ad-meta">
                                            {{--<div class="meta-content">
                                                <span class="dated pull-right"> PAID ON : <span>{{ $payment->paid_at }}</span></span>
                                            </div>--}}
                                            <!-- item-info-right -->
                                            <div class="user-option pull-right">
                                                {{--<a class="edit-item" href="#" data-toggle="tooltip" data-placement="top" title="Buy referral"><i class="fa fa-check"></i></a>--}}
                                                {{--<a class="delete-item" href="#" data-toggle="tooltip" data-placement="top" title="Delete referral"><i class="fa fa-times"></i></a>--}}
                                            </div><!-- item-info-right -->
                                        </div><!-- ad-meta -->
                                    </div><!-- item-info -->
                                </div><!-- ad-item -->
                            @endforeach
                            <hr>
                            <h3>Payments received</h3>
                            @if(Auth::user()->payments()->approved()->count() === 0)
                                <p>No payments have been made yet.</p>
                            @endif
                            @foreach(Auth::user()->payments()->approved()->get() as $payment)
                                <div class="ad-item row">
                                    <!-- item-image -->
                                {{-- <div class="item-image-box col-sm-4">
                                     <div class="item-image">
                                         <a href="details.html"><img src="images/trending/1.jpg" alt="Image" class="img-responsive"></a>
                                     </div><!-- item-image -->
                                 </div>--}}

                                <!-- rending-text -->
                                    <div class="item-info col-sm-12">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <div class="col-md-6 col-lg-6 col-sm-6">
                                                <h3 class="item-price">ID : {{ $payment->id }}</h3>
                                                <h4 class="item-title"><a href="#">Date : {{ $payment->created_at }}</a></h4>
                                                <h4 class="item-title"><a href="#">Requested Sum : {{ $payment->requested_sum }} $</a></h4>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-6">

                                            </div>


                                        </div><!-- ad-info -->

                                        <!-- ad-meta -->
                                        <div class="ad-meta">
                                            <div class="meta-content">
                                                <span class="dated pull-right"> PAID ON : <span>{{ $payment->paid_at }}</span></span>
                                            </div>
                                            <!-- item-info-right -->
                                            <div class="user-option pull-right">
                                                {{--<a class="edit-item" href="#" data-toggle="tooltip" data-placement="top" title="Buy referral"><i class="fa fa-check"></i></a>--}}
                                                {{--<a class="delete-item" href="#" data-toggle="tooltip" data-placement="top" title="Delete referral"><i class="fa fa-times"></i></a>--}}
                                            </div><!-- item-info-right -->
                                        </div><!-- ad-meta -->
                                    </div><!-- item-info -->
                                </div><!-- ad-item -->
                            @endforeach
                        </div>

                    </div><!-- change-password -->
                </div><!-- user-pro-edit -->
            </div><!-- profile -->

            <div class="col-sm-4 text-center">
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
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var formFieldsMessage = ['requested_sum'], // <- currently unused
                successNotification = $('#successNotification');

            $('#cashOutButton').on('click', function(e){
                e.preventDefault();

                $.ajax({
                    url : '{{ route('member-payments') }}',
                    type : 'POST',
                    data : getFormData(),
                    beforeSend: function (request) {
                        request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                    },
                    success : function(response){
                        clearErrors();
                        showSuccess(response[0]);
                    },
                    error : function(xhr){
                        if(xhr.status === 422 ||xhr.status === 403 ){
                            setErrors(xhr.responseJSON);
                        } else {
                            alert('Something went totaly wrong, please contact the webmaster.')
                        }
                    }
                });
            });

            function getFormData(){
                var data = {};

                data['requested_sum'] = $('#requested_sum').val();

                return data;
            }

            function setErrors(errors){
                successNotification.html(errors[0]);
                successNotification.removeClass('alert-success');
                successNotification.addClass('alert-warning')
                successNotification.slideToggle();
                setTimeout(function () {
                    successNotification.slideToggle()
                }, 3000);
            }

            function showSuccess(message){
                successNotification.html(message);
                successNotification.removeClass('alert-warning');
                successNotification.addClass('alert-success');
                successNotification.slideToggle();
                setTimeout(function () {
                    successNotification.slideToggle()
                }, 2000);
            }

            function clearForm(){
                $.each(formFieldsMessage, function(idx,val){
                    $('#'+val).html('');
                });
            }

            function clearErrors(){
                $.each(formFieldsMessage, function(idx,val){
                    if($('#message_'+val).html('').length)
                        $('#message_'+val).html('');
                });
            }
        });
    </script>
@endsection