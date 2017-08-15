@extends('layouts.vendor')

@section('style')

@endsection

@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">

            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Profile page</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin') }}">Dashboard</a></li>
                        <li><a href="#"><span>Settings</span></a></li>
                        <li class="active"><span>Profile</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                {{--<h6 class="panel-title txt-dark">with two columns horizontal form</h6>--}}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-wrap">
                                            <form action="#" id="updateUserForm" class="form-horizontal">
                                                <div class="form-body">
                                                    <h6 class="txt-dark"><i class="zmdi zmdi-account mr-10"></i>Personal Info</h6>
                                                    <hr class="light-grey-hr"/>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Full Name</label>
                                                                <div class="col-md-9">
                                                                    <input name="name" id="name" type="text" class="form-control" placeholder="Bill Thompson" value="{{ Auth::user()->name }}">
                                                                    <span id="message_name" class="help-block"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Email</label>
                                                                <div class="col-md-9">
                                                                    <input name="email" id="email" type="text" class="form-control" placeholder="email@email.com" value="{{ Auth::user()->email }}">
                                                                    <span id="message_email" class="help-block"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!-- /Row -->
                                                    <div class="form-actions mt-10">
                                                        <div class="row">
                                                            <div class="col-md-6"> </div>
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-9">
                                                                        <button id="cancelButtonUserForm" type="button" class="btn btn-default pull-right">Cancel</button>
                                                                        <button id="submitButtonUserForm" type="submit" class="btn btn-success  mr-10 pull-right">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                    <div class="seprator-block"></div>
                                                <form action="#" id="updateUserProfileForm">
                                                    <h6 class="txt-dark "><i class="zmdi zmdi-account mr-10"></i>Social info</h6>
                                                    <hr class="light-grey-hr"/>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Description</label>
                                                                <div class="col-md-9">
                                                                    <textarea class="form-control" name="description" id="description" style="min-width: 100%"
                                                                              rows="15">{{ Auth::user()->profile->description }}</textarea>
                                                                    <span id="message_description" class="help-block"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Website</label>
                                                                <div class="col-md-9">
                                                                    <input name="website" id="website" type="text" class="form-control" placeholder="www.yourwebsite.com" value="{{ Auth::user()->profile->website }}">
                                                                    <span id="message_website" class="help-block"> </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Facebook</label>
                                                                <div class="col-md-9">
                                                                    <input name="facebook" id="facebook" type="text" class="form-control" placeholder="www.facebook.com/yourfacebookpage" value="{{ Auth::user()->profile->facebook }}">
                                                                    <span id="message_facebook" class="help-block"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Linkedin</label>
                                                                <div class="col-md-9">
                                                                    <input name="linkedin" id="linkedin" type="text" class="form-control" placeholder="www.linkedin.com/yourlinkedinpage" value="{{ Auth::user()->profile->linkedin }}">
                                                                    <span id="message_linkedin" class="help-block"> </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Twitter</label>
                                                                <div class="col-md-9">
                                                                    <input name="twitter" id="twitter" type="text" class="form-control" placeholder="www.linkedin.com/yourtwitterpage" value="{{ Auth::user()->profile->twitter }}">
                                                                    <span id="message_twitter" class="help-block"> </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Youtube</label>
                                                                <div class="col-md-9">
                                                                    <input name="youtube" id="youtube" type="text" class="form-control" placeholder="www.youtube.com/youryoutubenpage" value="{{ Auth::user()->profile->youtube }}">
                                                                    <span id="message_youtube" class="help-block"> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- /Row -->



                                                    <h6 class="txt-dark "><i class="zmdi zmdi-home mr-10"></i>address - (undisclosed)</h6>
                                                    <hr class="light-grey-hr"/>
                                                    <!-- /Row -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Address</label>
                                                                <div class="col-md-9">
                                                                    <input name="address" id="address" type="text" class="form-control" value="{{ Auth::user()->profile->address }}">
                                                                    <span id="message_address" class="help-block"> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">City</label>
                                                                <div class="col-md-9">
                                                                    <input name="city" id="city" type="text" class="form-control" value="{{ Auth::user()->profile->city }}">
                                                                    <span id="message_city" class="help-block"> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Zip</label>
                                                                <div class="col-md-9">
                                                                    <input name="zip" id="zip" type="text" class="form-control" value="{{ Auth::user()->profile->zip }}">
                                                                    <span id="message_zip" class="help-block"> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">State</label>
                                                                <div class="col-md-9">
                                                                    <select id="state" name="state" class="form-control">
                                                                        @foreach($states as $key => $state)
                                                                            @if($key === Auth::user()->profile->state)
                                                                                <option value="{{ $key }}" selected>{{ $state }}</option>
                                                                            @endif
                                                                            <option value="{{ $key }}">{{ $state }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span id="message_state" class="help-block"> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!-- /Row -->
                                                </div>
                                                <div class="form-actions mt-10">
                                                    <div class="row">
                                                        <div class="col-md-6"> </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button id="cancelButtonProfileForm" type="button" class="btn btn-default pull-right">Cancel</button>
                                                                    <button id="submitButtonProfileForm" type="submit" class="btn btn-success  mr-10 pull-right">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->

        <!-- Footer -->
        <footer class="footer container-fluid pl-30 pr-30">
            <div class="row">
                <div class="col-sm-12">
                    <p>2017 &copy; RyansReferrals.com.</p>
                </div>
            </div>
        </footer>
        <!-- /Footer -->

    </div>
    <!-- /Main Content -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var submittedForm,
                successNotification = $('#successNotification'),
                updateUserForm = $('#updateUserForm'),
                updateUserProfileForm = $('#updateUserProfileForm'),
                updateUserFormFields = ['name', 'email'],
                updateUserProfileFormFields = ['description', 'address', 'city', 'state', 'zip',
                'website', 'facebook', 'linkedin', 'twitter', 'youtube'];

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

            function getFormData(formType){
                var data = {};
                submittedForm = formType === 'user' ? updateUserFormFields : updateUserProfileFormFields;

                $.each(submittedForm, function(idx,val){
                    console.log(val,$('#'+val).val());
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
                console.log(submittedForm);
                $.each(submittedForm, function(idx,val){
                    if($('#message_'+val).html().length)
                        $('#message_'+val).html('');
                });
            }
        });
    </script>
@endsection