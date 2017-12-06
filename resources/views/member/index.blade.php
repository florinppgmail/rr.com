@extends('layouts.websitemember',
[
    'page' => 'Dashboard',
])

@section('style')
    <!-- Bootstrap Datetimepicker CSS -->
    <link href="{{ asset('dashboard/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="profile section">
        <div class="row">
            <div class="col-sm-8">
                <div class="user-pro-section">
                    <!-- profile-details -->
                    <div class="profile-details section">
                        <h2><i class="fa fa-plus"></i> Add new referral</h2>
                        <!-- form -->
                        <form action="#" id="addReferralForm" class="form-horizontal">

                            <div class="form-group">
                                <label>Referr myself</label>
                                <select id="auto_referr" name="auto_referr" class="form-control" {{ !$isLocationSet ? 'disabled' : '' }}>
                                    <option value="no" selected> No</option>
                                    <option value="yes"> Yes</option>
                                </select>
                                @if(!$isLocationSet)
                                    <span id="message_auto_referr" class="help-block col-lg-offset-3 col-xs-offset-4">To referr yourself, you need first to set your address on <a
                                                href="{{ route('member-settings-profile') }}">Profile</a> page.</span>
                                @endif
                            </div>
                            <hr>

                            <div class="form-group">
                                <label>Category</label>
                                <select id="category_id" name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="" disabled> {{ $category->name }}</option>
                                        @if($category->subcategories()->count())))
                                        @foreach($category->subcategories()->get() as $cat)
                                            <option value="{{ $cat->id }}"> - {{ $cat->name }}</option>
                                        @endforeach
                                        @endif
                                    @endforeach
                                </select>
                                <span id="message_category_id" class="help-block col-lg-offset-3 col-xs-offset-4"></span>
                            </div>

                            <div class="form-group">
                                <label>Full name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full name" required min="3">
                                <span id="message_name" class="help-block col-lg-offset-3 col-xs-offset-4"></span>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                                <span id="message_email" class="help-block col-lg-offset-3 col-xs-offset-4"></span>
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                                <span id="message_phone" class="help-block col-lg-offset-3 col-xs-offset-4"></span>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="description" name="description" data-id="description" placeholder="Write few lines about yourself" rows="8"></textarea>
                                <span id="message_description" class="help-block col-lg-offset-3 col-xs-offset-4"></span>
                            </div>

                            <div class="form-group" >
                                    <label>Needed At</label>
                                    <input type="text" class="form-control" placeholder="Click to select" id="needed_at_datepicker">
                                    <span id="message_needed_at" class="help-block col-lg-offset-3 col-xs-offset-4"></span>
                            </div>

                            <div class="form-group">
                                <label>Input the referral address</label>
                                <input name="autocomplete" id="autocomplete" type="text" class="form-control" onFocus="geolocate()">
                                <span id="message_autocomplete" class="help-block"></span>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" id="address" name="address" disabled>
                                <span id="message_address" class="help-block col-lg-offset-3 col-xs-offset-4"></span>
                            </div>

                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" id="city" name="city" disabled>
                                <span id="message_city" class="help-block col-lg-offset-3 col-xs-offset-4"></span>
                            </div>

                            <div class="form-group">
                                <label>State</label>
                                <input type="text" class="form-control" id="state" name="state" disabled>
                                <span id="message_state" class="help-block col-lg-offset-3 col-xs-offset-4"></span>
                            </div>

                            <input type="hidden" id="gps_lat">
                            <input type="hidden" id="gps_lng">
                            <span style="visibility: hidden" id="message_gps_lat" class="help-block"> </span>
                            <span style="visibility: hidden" id="message_gps_lng" class="help-block"> </span>

                            <div class="form-group">
                                <label>Best contact time</label>
                                <select id="contact_time" name="contact_time" class="form-control">
                                    <option value="ANY">Anytime</option>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                                <span id="message_contact_time" class="help-block col-lg-offset-3 col-xs-offset-4"></span>
                            </div>

                            <div class="form-group">
                                <label>Urgent ?</label>
                                <select id="urgent" name="urgent" class="form-control">
                                    <option value="0" selected>No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>

                            <div id="referralSuccessNotification" class="alert alert-success alert-dismissable alert-style-1" style="display: none">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="zmdi zmdi-check"></i>Referral created.
                            </div>

                            <div class="form-group pull-right">
                                <a href="#" id="cancelButton" class="btn cancle">Cancel</a>
                                <a href="#" id="createReferralButton" class="btn">Create</a>
                            </div>
                        </form>
                    </div><!-- profile-details -->
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
    <!-- Bootstrap Datetimepicker JavaScript -->
    <script src="{{ asset('dashboard/vendors/bower_components/moment/min/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashboard/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvN2aWCmTBbYkTLns6R-ttDD_KM-QKwgs&libraries=places&callback=initAutocomplete"
            async defer></script>

    <script>
        $(document).ready(function() {
            var datepicker, successNotification = $('#successNotification'), addReferralForm = $('#addReferralForm'),
                formFieldsMessage = ['name', 'category_id', 'email', 'phone', 'description', 'needed_at',
                    'contact_time', 'address', 'city', 'state', 'gps_lat', 'gps_lng', 'urgent'],
                currentUser = {};

            currentUser = {
                name : '{{ Auth::user()->name }}',
                email : '{{ Auth::user()->email }}',
                phone : '{{ Auth::user()->profile->phone }}',
                description : '{{ Auth::user()->profile->description }}',
                address : '{{ Auth::user()->profile->address }}',
                city : '{{ Auth::user()->profile->city }}',
                state : '{{ Auth::user()->profile->state }}',
                gps_lat : '{{ Auth::user()->profile->gps_lat }}',
                gps_lng : '{{ Auth::user()->profile->gps_lng }}'
            };

            successNotification.toggle();

            /*datepicker = $('#needed_at_datepicker').datetimepicker({
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
            });*/

            datepicker = $('#needed_at_datepicker').datetimepicker({
                format: 'YYYY-MM-DD',
                widgetPositioning: {
                    horizontal: 'right',
                    vertical: 'bottom'
                },
                useCurrent: false,
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                minDate : new Date()
            }).on('dp.show', function() {
                if($(this).data("DateTimePicker").date() === null)
                    $(this).data("DateTimePicker").date(moment());
            });

            $('#cancelButton').on('click', function(e){
                e.preventDefault();
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
                        showSuccess('#referralSuccessNotification')
                    },
                    error : function(xhr){
                        if(xhr.status === 422){
                            setErrors(xhr.responseJSON);
                        } else {
                            alert('Something went totaly wrong, please contact the webmaster.')
                        }
                    }
                });
            });

            $('#auto_referr').change(function(){
                val = $('#auto_referr').val();
                if(val === 'yes'){
                    fillReferralFormWithCurrentUser();
                } else if(val === 'no') {
                    clearForm();
                }
            });

            function getFormData(){
                var data = {};

                $.each(formFieldsMessage, function(idx,val){
                    data[val] = $('#'+val).val();
                });
                data['needed_at'] = datepicker.data('date');

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

            function clearErrors(){
                $.each(formFieldsMessage, function(idx,val){
                    if($('#message_'+val).html('').length)
                        $('#message_'+val).html('');
                });
            }

            function clearForm(){
                addReferralForm.trigger('reset');
            }

            function fillReferralFormWithCurrentUser(){
                formFieldsMessage.forEach(function(itm, idx){
                    if(currentUser[itm]){
                        $('#'+itm).val(currentUser[itm]);
                    }
                })
            }

            function showSuccess(form){
                let successDiv = $(form);
                successDiv.slideToggle();
                setTimeout(function () {
                    successDiv.slideToggle()
                }, 2000);
            }
        });

        // Google Places

        // This example displays an address form, using the autocomplete feature
        // of the Google Places API to help users fill in the information.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        var autocomplete;

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                {types: ['geocode']});

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();


            // Get each component of the address from the place details
            // and fill the corresponding field on the form.

            document.getElementById('address').value = '';
            document.getElementById('city').value = '';
            document.getElementById('state').value = '';

            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                shortValue = place.address_components[i].short_name;
                longValue = place.address_components[i].long_name;

                switch (addressType) {
                    case 'locality':
                        document.getElementById('city').value = longValue;
                        break;
                    case 'administrative_area_level_1':
                        document.getElementById('state').value = shortValue;
                        break;
                    case 'route':
                        locationAddress = longValue;
                        document.getElementById('address').value = longValue;
                        break;
                }

                // setting the gps coordinates too
                document.getElementById('gps_lat').value = place.geometry.location.lat();
                document.getElementById('gps_lng').value = place.geometry.location.lng();

            }
            //document.getElementById(addressType).value = val;
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });
                    autocomplete.setBounds(circle.getBounds());
                });
            }
        }
    </script>
@endsection