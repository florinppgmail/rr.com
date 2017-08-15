@extends('layouts.member')

@section('style')

@endsection

@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">

            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Update password</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Dashboard</a></li>
                        <li><a href="#"><span>Settings</span></a></li>
                        <li class="active"><span>Update password</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3"></div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div id="successNotification" class="alert alert-success alert-dismissable alert-style-1">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="zmdi zmdi-check"></i>Password change successfully.
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-wrap">
                                            <form id="updatePasswordForm" class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="exampleInputpwd_32" class="col-sm-3 control-label">New Password*</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password">
                                                        </div>
                                                        <div>
                                                            <span id="message_new_password"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputpwd_4" class="col-sm-3 control-label">New Password again*</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm your new password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <div class="col-sm-12 ">
                                                        <button type="submit" id="updatePasswordButton" class="btn btn-success pull-right ">Update</button>
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
                <div class="col-lg-3 col-md-3 col-sm-3"></div>
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
    </div>
    <!-- /Main Content -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var formFieldsMessage = ['new_password'],
                successNotification = $('#successNotification');
            successNotification.toggle();

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