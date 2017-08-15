@extends('layouts.admin')

@section('style')

@endsection

@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">

            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Website settings</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Dashboard</a></li>
                        <li><a href="#"><span>Settings</span></a></li>
                        <li class="active"><span>Website</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->

            <!-- Content -->
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Website settings</h6>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                        </div>
                        <div class="panel-wrapper collapse in" style="min-height: 200px">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-wrap">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label  for="exampleInputEmail_3" class="col-sm-3 control-label">Contact Email</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                            <input type="email" class="form-control" name="contact_email" id="contact_email" placeholder="Enter email" value="{{Cache::get('settings_contact_email')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputweb_31" class="col-sm-3 control-label">Contact address</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="icon-home"></i></div>
                                                            <input type="text" class="form-control" name="contact_address"  id="contact_address" placeholder="Enter address" value="{{Cache::get('settings_contact_address')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputpwd_32" class="col-sm-3 control-label">Contact phone</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                            <input type="text" class="form-control" name="contact_phone" id="contact_phone" placeholder="Enter phone" value="{{Cache::get('settings_contact_phone')}}">
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
                <div class="col-md-6">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Payment settings</h6>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                        </div>
                        <div class="panel-wrapper collapse in" style="min-height: 200px">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-wrap">
                                            <form>
                                                <div class="form-group">
                                                    <label  for="member_cash_out" class="col-sm-3 control-label">Cash Out</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="icon-wallet"></i></div>
                                                            <input type="text" class="form-control" id="member_cash_out" placeholder="Enter ammount" value="{{Cache::get('settings_member_cash_out')}}">
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
                <div class="col-md-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-wrap">
                                            <div class="form-group mb-0">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" id="saveSettingsButton" class="btn btn-info pull-right">Save setting</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
    </div>
    <!-- /Main Content -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var formFieldsMessage = ['contact_email', 'contact_address', 'contact_phone',
                    'member_cash_out', 'vendor_membership'],
                successNotification = $('#successNotification');
            successNotification.toggle();

            $('#saveSettingsButton').on('click', function(e){
                e.preventDefault();

                $.ajax({
                    url : '{{ route('admin-settings-update') }}',
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

                $.each(formFieldsMessage, function(idx,val){
                    data[val] = $('#'+val).val();
                });

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