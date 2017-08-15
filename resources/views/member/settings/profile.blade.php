@extends('layouts.websitemember',
[
    'page' => 'Profile',
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

                            <div id="personalInfoSuccessNotification" class="alert alert-success alert-dismissable alert-style-1" style="display: none">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="zmdi zmdi-check"></i>Details updated.
                            </div>

                            <div class="form-group pull-right">
                                <a href="#" id="submitButtonUserForm" class="btn">Update</a>
                                <a href="{{ route('member-dashboard') }}" id="cancelButtonUserForm" class="btn cancle">Cancel</a>
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
                        </form>
                    </div><!-- social-details -->

                    <!-- address-details -->
                    <div class="profile-details section">
                        <h2>Address (undisclosed)</h2>
                        <!-- form -->
                        <div class="form-group">
                            <label>Address</label>
                            <input name="address" id="address" type="text" class="form-control" placeholder="Address" value="{{ Auth::user()->profile->address }}">
                            <span id="message_address" class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input name="city" id="city" type="text" class="form-control" placeholder="City" value="{{ Auth::user()->profile->city }}">
                            <span id="message_city" class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label>Zip</label>
                            <input name="zip" id="zip"  type="text" class="form-control" placeholder="Zip code" value="{{ Auth::user()->profile->zip }}">
                            <span id="message_zip" class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label>State</label>
                            <select id="state" name="state" class="form-control">
                                @foreach($states as $key => $state)
                                    @if($key === Auth::user()->profile->state)
                                        <option value="{{ $key }}" selected>{{ $state }}</option>
                                    @else
                                    <option value="{{ $key }}">{{ $state }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span id="message_state" class="help-block"> </span>
                        </div>

                        <div id="profileInfoSuccessNotification" class="alert alert-success alert-dismissable alert-style-1" style="display: none">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="zmdi zmdi-check"></i>Details updated.
                        </div>


                        <div class="form-group pull-right">
                            <a href="#" id="submitButtonProfileForm" class="btn">Update</a>
                            <a href="{{ route('member-dashboard') }}" id="cancelButtonProfileForm" class="btn cancle">Cancel</a>
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
    <script>
        $(document).ready(function() {
            var submittedForm,
                successNotification = $('#successNotification'),
                updateUserForm = $('#updateUserForm'),
                updateUserProfileForm = $('#updateUserProfileForm'),
                updateUserFormFields = ['name', 'email'],
                updateUserProfileFormFields = ['description', 'address', 'city', 'state', 'zip'];

            $('#cancelButtonUserForm, #cancelButtonProfileForm').on('click', function(e){
                window.location.replace('/member');
            });

            $('#submitButtonUserForm').on('click', function(e){
                e.preventDefault();

                $.ajax({
                    url : '{{ route('member-update-member') }}',
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
                    url : '{{ route('member-settings-profile-update') }}',
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
    </script>
@endsection