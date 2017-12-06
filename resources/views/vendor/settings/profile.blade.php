@extends('layouts.vendor',
[
    'page' => 'Dashboard',
    'referralsBoughtCount' => $referralsBought->count(),
    'subscribedCategoriesCount' => $subscribedCategories->count(),
])

@section('style')

@endsection

@section('content')
    <div class="profile section">
        <div class="row">
            <div class="col-sm-8">
                <div class="user-pro-section">
                    <!-- profile-details -->
                    <div class="profile-details section">
                        <h2>Personal info</h2>
                        <!-- form -->
                        <form action="#" id="updateUserForm" class="form-horizontal">

                            <div class="form-group">
                                <label>Full name</label>
                                <input name="name" id="name" type="text" class="form-control" placeholder="Your name" value="{{ Auth::user()->name }}">
                                <span id="message_name" class="help-block  col-lg-offset-3 col-xs-offset-4"></span>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" id="email" type="text" class="form-control" placeholder="email@email.com" value="{{ Auth::user()->email }}">
                                <span id="message_email" class="help-block col-lg-offset-3 col-xs-offset-4"></span>
                            </div>

                            <div class="form-group">
                                <label>Discovery range <br>(1-100miles) </label>
                                <input name="range" id="range" type="text" class="form-control" value="{{ Auth::user()->range }}">
                                <span id="message_range" class="help-block col-lg-offset-3 col-xs-offset-4"></span>
                            </div>

                            <div id="personalInfoSuccessNotification" class="alert alert-success alert-dismissable alert-style-1" style="display: none">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="zmdi zmdi-check"></i>Details updated.
                            </div>

                            <div class="form-group pull-right">
                                <a href="#" id="submitButtonUserForm" class="btn">Update</a>
                                <a href="{{ route('vendor-dashboard') }}" id="cancelButtonUserForm" class="btn cancle">Cancel</a>
                            </div>
                        </form>
                    </div><!-- profile-details -->

                    <!-- social-details -->
                    <div class="profile-details section">
                        <h2>Social info</h2>
                        <!-- form -->
                        <form action="#" id="updateUserProfileForm">

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="description" name="description" data-id="description" placeholder="Write few lines about yourself" rows="8">{{ Auth::user()->profile->description }}</textarea>
                                <span id="message_description" class="help-block"></span>
                            </div>

                            <div class="form-group">
                                <label>Website</label>
                                <input name="website" id="website" type="text" class="form-control" placeholder="www.yourwebsite.com" value="{{ Auth::user()->profile->website }}">
                                <span id="message_website" class="help-block"> </span>
                            </div>

                            <div class="form-group">
                                <label for="name-three">Facebook</label>
                                <input name="facebook" id="facebook" type="text" class="form-control" placeholder="www.facebook.com/yourfacebookpage" value="{{ Auth::user()->profile->facebook }}">
                                <span id="message_facebook" class="help-block"></span>
                            </div>

                            <div class="form-group">
                                <label for="name-three">Linkedin</label>
                                <input name="linkedin" id="linkedin" type="text" class="form-control" placeholder="www.linkedin.com/yourlinkedinpage" value="{{ Auth::user()->profile->linkedin }}">
                                <span id="message_linkedin" class="help-block"> </span>
                            </div>

                            <div class="form-group">
                                <label for="name-three">Twitter</label>
                                <input name="twitter" id="twitter" type="text" class="form-control" placeholder="www.linkedin.com/yourtwitterpage" value="{{ Auth::user()->profile->twitter }}">
                                <span id="message_twitter" class="help-block"> </span>
                            </div>

                            <div class="form-group">
                                <label for="name-three">Youtube</label>
                                <input name="youtube" id="youtube" type="text" class="form-control" placeholder="www.youtube.com/youryoutubenpage" value="{{ Auth::user()->profile->youtube }}">
                                <span id="message_youtube" class="help-block"> </span>
                            </div>
                        </form>
                    </div><!-- social-details -->

                    <!-- address-details -->
                    <div class="profile-details section">
                        <h2>Address (undisclosed)</h2>
                        <!-- form -->
                        <div class="form-group">
                            <label>Input your address</label>
                            <input name="autocomplete" id="autocomplete" type="text" class="form-control" onFocus="geolocate()">
                            <span id="message_address" class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input name="address" id="address" type="text" class="form-control" value="{{ Auth::user()->profile->address }}" disabled>
                            <span id="message_address" class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label>Zip</label>
                            <input name="zip" id="zip"  type="text" class="form-control" value="{{ Auth::user()->profile->zip }}" disabled>
                            <span id="message_zip" class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input name="city" id="city" type="text" class="form-control" value="{{ Auth::user()->profile->city }}" disabled>
                            <span id="message_city" class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label>State</label>
                            <input name="state" id="state"  type="text" class="form-control" value="{{ Auth::user()->profile->state }}" disabled>
                            <span id="message_state" class="help-block"> </span>
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <input name="country" id="country"  type="text" class="form-control" value="{{ Auth::user()->profile->country }}" disabled>
                            <span id="message_country" class="help-block"> </span>
                        </div>

                        <input type="hidden" id="gps_lat">
                        <input type="hidden" id="gps_lng">
                        <span style="visibility: hidden" id="message_gps_lat" class="help-block"> </span>
                        <span style="visibility: hidden" id="message_gps_lng" class="help-block"> </span>


                        <div id="profileInfoSuccessNotification" class="alert alert-success alert-dismissable alert-style-1" style="display: none">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="zmdi zmdi-check"></i>Details updated.
                        </div>


                        <div class="form-group pull-right">
                            <a href="#" id="submitButtonProfileForm" class="btn">Update</a>
                            <a href="{{ route('vendor-dashboard') }}" id="cancelButtonProfileForm" class="btn cancle">Cancel</a>
                        </div>
                    </div><!-- address-details -->
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

    </div>	@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvN2aWCmTBbYkTLns6R-ttDD_KM-QKwgs&libraries=places&callback=initAutocomplete"
            async defer></script>
    <script>
        var submittedForm,
            successNotification = $('#successNotification'),
            updateUserForm = $('#updateUserForm'),
            updateUserProfileForm = $('#updateUserProfileForm'),
            updateUserFormFields = ['name', 'email', 'range'],
            updateUserProfileFormFields = ['description',
                'address', 'city', 'state', 'zip', 'country', 'gps_lat', 'gps_lng',
                'website', 'facebook', 'linkedin', 'twitter', 'youtube'];

        $(document).ready(function() {

            $('#cancelButtonUserForm, #cancelButtonProfileForm').on('click', function(e){
                window.location.replace('/vendor');
            });

            $('#submitButtonUserForm').on('click', function(e){
                e.preventDefault();

                $.ajax({
                    url : '{{ route('vendor-update-vendor') }}',
                    type : 'POST',
                    data : getFormData('user'),
                    beforeSend: function (request) {
                        request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                    },
                    success : function(response){
                        clearErrors();
                        showSuccess('#personalInfoSuccessNotification')
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

            $('#submitButtonProfileForm').on('click', function(e){
                e.preventDefault();

                $.ajax({
                    url : '{{ route('vendor-settings-profile-update') }}',
                    type : 'POST',
                    data : getFormData(),
                    beforeSend: function (request) {
                        request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                    },
                    success : function(response){
                        clearErrors();
                        showSuccess('#profileInfoSuccessNotification')
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

            function getFormData(formType){
                var data = {};
                submittedForm = formType === 'user' ? updateUserFormFields : updateUserProfileFormFields;

                $.each(submittedForm, function(idx,val){
                    console.log(val);
                    if($('#'+val).val().length)
                        data[val] = $('#'+val).val();
                });

                return data;
            }

            function setErrors(errors){
                $.each(submittedForm, function(idx,val){
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
                    text: 'Your settings have been updated.',
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
                $.each(submittedForm, function(idx,val){
                    if($('#message_'+val).html().length)
                        $('#message_'+val).html('');
                });
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
            $.each(updateUserProfileFormFields, function(idx, itm){
                if(itm !== 'description' && typeof document.getElementById(itm) !== 'undefined'){
                    document.getElementById(itm).value = '';
                }

            });

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
                    case 'country':
                        document.getElementById('country').value = longValue;
                        break;
                    case 'route':
                        locationAddress = longValue;
                        document.getElementById('address').value = longValue;
                        break;
                    case 'postal_code':
                        document.getElementById('zip').value = shortValue;
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