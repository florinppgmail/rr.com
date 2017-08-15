@extends('layouts.websitemember',
[
    'page' => 'Account',
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
                        <h2>Change password</h2>
                        <!-- form -->
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" id="new_password" name="new_password" class="form-control" >
                        </div>
                        <div>
                            <span id="message_new_password"></span>
                        </div>
                        <div class="form-group">
                            <label>Confirm password</label>
                            <input type="password"  id="new_password_confirmation" name="new_password_confirmation" class="form-control">
                        </div>
                        <br>

                        <div id="successNotification" class="alert alert-success alert-dismissable alert-style-1" style="display: none">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="zmdi zmdi-check"></i>Password change successfully.
                        </div>

                        <div class="pull-right">
                            <a href="{{ route('member-dashboard') }}" class="btn cancle">Cancel</a>
                            <a href="#" id="updatePasswordButton" class="btn">Update password</a>
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
            var formFieldsMessage = ['new_password'],
                successNotification = $('#successNotification');

            $('#updatePasswordButton').on('click', function(e){
                e.preventDefault();

                $.ajax({
                    url : '{{ route('member-settings-password') }}',
                    type : 'POST',
                    data : getFormData(),
                    beforeSend: function (request) {
                        request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                    },
                    success : function(response){
                        clearErrors();
                        showSuccess();
                    },
                    error : function(xhr){
                        console.log(xhr);
                        if(xhr.status === 422){
                            setErrors(xhr.responseJSON);
                        } else {
                            alert('Something went totaly wrong, please contact the webmaster.')
                        }
                    }
                });
            });

            function getFormData(){
                var data = {};

                data['new_password'] = $('#new_password').val();
                data['new_password_confirmation'] = $('#new_password_confirmation').val();

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

            function showSuccess(){
                successNotification.slideToggle();
                clearForm();
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