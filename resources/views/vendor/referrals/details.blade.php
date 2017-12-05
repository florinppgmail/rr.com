@extends('layouts.vendor',
[
    'page' => 'Referral details',
    'referralsBoughtCount' => $referralsBought->count(),
    'subscribedCategoriesCount' => $subscribedCategories->count(),
])

@section('style')
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
@endsection

@section('content')
    <div class="section slider">
        <div class="row">
            <!-- carousel -->
            <div class="col-md-7">
                <div class="slider-text">
                    <h2>Name: {{ $referral->name }}</h2>
                    <h4 class="title">Category : {{ $referral->category->name }}</h4>
                    <p><span>Offered by: <a href="#">{{ $referral->member->name }}</a></span>
                        <span> Referral ID:<a href="#" class="time"> {{ $referral->id }}</a></span></p>
                    {{--<span class="icon"><i class="fa fa-clock-o"></i><a href="#">7 Jan, 16  10:10 pm</a></span>--}}
                    <span class="icon"><i class="fa fa-clock-o"></i><a href="#"> {{ $referral->created_at }}</a></span>
                    <span class="icon"><i class="fa fa-map-marker"></i><a href="#">{{ $referral->city .', '. $referral->state }}</a></span>
                    <!-- short-info -->
                    <div class="short-info">
                        <h4>Short Info</h4>
                        <p><strong>Needed At: </strong><a href="#"> {{ $referral->needed_at }}</a> </p>
                        <p><strong>Best contact time: </strong><a href="#">{{ $referral->contact_time }}</a> </p>
                        <p><strong>Is urgent : </strong><a href="#"> {{ $referral->urgent ? 'YES' : 'NO' }}</a> </p>
                    </div><!-- short-info -->

                    <div class="">
                        <h4>Description</h4>
                        <p>{{ $referral->description }}</p><br>
                    </div>

                </div>
            </div><!-- Controls -->

            <!-- slider-text -->
            <div class="col-md-5">
                <!-- contact-with -->
                <div class="contact-with">
                    <span class="btn btn-red show-number" style="width: 100%; {{$referral->pending === 1  ? 'visibility:hidden;' : ''}}" id="contactButton" onclick="contactReferralOwner({{$referral->id}})">
                        <i class="fa fa-paypal"></i>
                        <span class="hide-text" style="">Click to buy this referral </span>
                    </span>
                    <div class="short-info" id="referralOwnerContactDetails" style=" {{$referral->pending === 0  ? 'visibility:hidden;' : ''}}">
                        <p>Before paying for the referral, you can contact it's owner</p>
                        <!-- social-icon -->
                        <ul>
                            <li><i class="fa fa-phone"></i><a href="#"> {{ strlen($referral->member->phone) ? $referral->member->phone : 'Not available' }}</a></li>
                            <li><i class="fa fa-envelope"></i><a href="#"> {{ $referral->member->email }}</a></li>
                        </ul><!-- social-icon -->
                        <div id="paypal-button"></div>
                    </div>
                </div><!-- contact-with -->
            </div><!-- slider-text -->
        </div>
    </div><!-- slider -->
@endsection

@section('script')
    <script src="{{ asset('dashboard/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            if('{{ $referral->pending }}' == 1){
                paypal.Button.render({

                    env: 'sandbox', // Or 'sandbox',

                    client: {
                        sandbox : 'ARz2a4X_79iH5yyLEjR54V3OQUUmiEJR48bDH3Freb7mHg1cMNxutzJkFzZ_n1-pvXSXEQDbbhA9_TnT'
                    },

                    commit: true, // Show a 'Pay Now' button

                    payment: function(data, actions) {
                        return actions.payment.create({
                            payment: {
                                transactions: [
                                    {
                                        amount: { total: '10.00', currency: 'USD' },
                                        description : 'Selling of referral with id:  {{ $referral->id }}'
                                    }
                                ]
                            }
                         });
                    },

                    onAuthorize: function(data, actions) {
                        return actions.payment.execute().then(function(payment) {
                            window.alert('Payment Complete!');
                            console.log('payment -----------');
                            console.log(payment);
                            buyReferral('{{$referral->id}}', data)
                        });
                    },

                    style: {
                        size: 'large',
                        color: 'blue',
                        shape: 'rect',
                        label: 'checkout'
                    },

                }, '#paypal-button');
            }
        });

        function contactReferralOwner(referralId){
            $.ajax({
                url: '/vendor/referrals/' + referralId + '/pending',
                type: 'POST',
                beforeSend: function (request) {
                    request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                },
                success: function (response) {
                    location.reload();
                    /*$('#contactButton').hide();
                    $('#referralOwnerContactDetails').show();*/
                },
                error: function (xhr) {
                    alert('Something went totaly wrong, please contact the webmaster.')
                }
            });
        }

        function buyReferral(id, transaction) {
            $.ajax({
                url: '/vendor/referrals/' + id + '/buy',
                type: 'POST',
                data: {
                    transaction: transaction
                },
                beforeSend: function (request) {
                    request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                },
                success: function (response) {
                   window.location.replace('{{ route('vendor-referrals-bought') }}');
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        /*setErrors(xhr.responseJSON);
                         showErrorNotification()*/
                    } else {
                        alert('Something went totally wrong, please contact the webmaster.')
                    }
                }
            });
        }

    </script>
@endsection