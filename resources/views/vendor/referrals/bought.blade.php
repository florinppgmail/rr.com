@extends('layouts.vendor',
[
    'page' => 'Dashboard',
    'referralsBoughtCount' => $referralsBought->count(),
    'subscribedCategoriesCount' => $subscribedCategories->count(),
])

@section('style')

@endsection

@section('content')
    <div class="ads-info">
        <div class="row">
            <div class="col-sm-8">
                <div class="my-ads section">
                    <h2>Referrals bought</h2>
                    <!-- ad-item -->
                    @if(!$referrals->count())
                        <h3>You haven't bought any referrals yet.</h3>
                    @endif
                    @foreach($referrals as $referral)
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
                                    <h3 class="item-price">{{ $referral->name }}</h3>
                                    <h4 class="item-title"><a href="#">Category : {{ $referral->category->name }}</a></h4>

                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"> Referred by: <span>{{ $referral->member->name }}</span></span>
                                        <span class="visitors"> Posted On: <a href="#">{{ $referral->created_at }}</a></span>
                                        <span><a href="#"><strong>Bought on : </strong>{{ $referral->pivot->created_at }}</a></span>
                                    </div>
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        {{--<a class="edit-item" href="#" data-toggle="tooltip" data-placement="top" title="Buy referral"><i class="fa fa-check"></i></a>
                                        <a class="delete-item" href="#" data-toggle="tooltip" data-placement="top" title="Reject referral"><i class="fa fa-times"></i></a>--}}
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- ad-item -->
                    @endforeach
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
    <!-- Bootstrap Datetimepicker JavaScript -->
    <script type="text/javascript" src="{{ asset('dashboard/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var datepicker, successNotification = $('#successNotification'), addReferralForm = $('#addReferralForm'),
                formFieldsMessage = ['name', 'category_id', 'email', 'phone', 'description',
                    'needed_at', 'contact_time','city', 'state', 'urgent'];


            successNotification.toggle();

            datepicker = $('#needed_at_datepicker').datetimepicker({
                format: 'YYYY-MM-DD',
                inline:true,
                sideBySide: true,
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                minDate : new Date()
            });

            $('#cancelButton').on('click', function(e){
                clearForm();
            });

            $('#createReferralButton').on('click', function(e){
                e.preventDefault();

                $.ajax({
                    url : '{{ route('member-referrals-create') }}',
                    type : 'POST',
                    data : getFormData(),
                    beforeSend: function (request) {
                        request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                    },
                    success : function(response){
                        clearErrors();
                        clearForm();
                        showSuccessNotification();
                    },
                    error : function(xhr){
                        if(xhr.status === 422){
                            setErrors(xhr.responseJSON);
                            showErrorNotification()
                        } else {
                            alert('Something went totaly wrong, please contact the webmaster.')
                        }
                    }
                });
            });

            function getFormData(){
                var data = {};

                $.each(formFieldsMessage, function(idx,val){
                    data[val] = $('#'+val).val();
                });
                data['needed_at'] = datepicker.data('date');
                data['urgent'] = $('#urgent').is(":checked") ? 1 : 0;

                return data;
            }

            function setErrors(errors){
                $.each(formFieldsMessage, function(idx,val){
                    if(errors[val]){
                        $('#message_'+val).html(errors[val]);
                    } else if(errors[val] === undefined){
                        $('#message_'+val).html('<i class="zmdi zmdi-check">OK</i>');
                    }
                });
            }

            function showSuccessNotification(){
                $.toast().reset('all');
                $("body").removeAttr('class').addClass("bottom-center-fullwidth");
                $.toast({
                    heading: 'SUCCESS',
                    text: 'Your referral has been added.',
                    position: 'bottom-center',
                    loaderBg:'#ea6c41',
                    bgColor:'#469408',
                    hideAfter: 3500
                });
                return false;
            }

            function showErrorNotification(){
                $.toast().reset('all');
                $("body").removeAttr('class').addClass("bottom-center-fullwidth");
                $.toast({
                    heading: 'OOPS',
                    text: 'You missed something, please check for error mesages.',
                    position: 'bottom-center',
                    loaderBg:'#469408',
                    bgColor:'#ea6c41',
                    hideAfter: 3500
                });
                return false;
            }

            function clearErrors(){
                $.each(formFieldsMessage, function(idx,val){
                    if($('#message_'+val).html('').length)
                        $('#message_'+val).html('');
                });
            }

            function clearForm(){
                addReferralForm.trigger('reset');
            }
        });

    </script>
@endsection