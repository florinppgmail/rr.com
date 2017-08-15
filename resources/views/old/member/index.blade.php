@extends('layouts.member')

@section('style')
    <!-- Bootstrap Datetimepicker CSS -->
    <link href="{{ asset('dashboard/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid pt-25">
            <!-- /Row -->

            <!-- Row -->
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box bg-green">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="txt-light block counter"><span class="counter-anim">{{ $totalFreeReferrals }}</span></span>
                                                    <span class="weight-500 uppercase-font txt-light block font-13">Free</span>
                                                </div>
                                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                    <i class="zmdi zmdi-lock-open txt-light data-right-rep-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box bg-blue">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="txt-light block counter"><span class="counter-anim">{{ $totalSoldReferrals }}</span></span>
                                                    <span class="weight-500 uppercase-font txt-light block font-13">Sold</span>
                                                </div>
                                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                    <i class="zmdi zmdi-money txt-light data-right-rep-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box bg-grey">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="txt-light block counter"><span class="counter-anim">{{ $totalExpiredReferrals }}</span></span>
                                                    <span class="weight-500 uppercase-font txt-light block font-13">Expired</span>
                                                </div>
                                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                    <i class="zmdi zmdi-money-off txt-light data-right-rep-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box bg-red">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="txt-light block counter"><span class="counter-anim">{{ $totalReferrals }}</span></span>
                                                    <span class="weight-500 uppercase-font txt-light block">Total</span>
                                                </div>
                                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                    <i class="zmdi zmdi-link txt-light data-right-rep-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default card-view panel-refresh">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">Latest referrals sold</h6>
                                </div>
                                {{--<div class="pull-right">
                                    <a href="#" class="pull-left inline-block refresh mr-15">
                                        <i class="zmdi zmdi-replay"></i>
                                    </a>
                                    <a href="#" class="pull-left inline-block full-screen mr-15">
                                        <i class="zmdi zmdi-fullscreen"></i>
                                    </a>
                                    <div class="pull-left inline-block dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
                                        <ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Edit</a></li>
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>Delete</a></li>
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>New</a></li>
                                        </ul>
                                    </div>
                                </div>--}}
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body row pa-0">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                <tr>
                                                    <th style="width: 40%">Name</th>
                                                    <th style="width: 40%">Bough By</th>
                                                    <th style="width: 20%">Bought On</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($referralsSold as $sold)
                                                    <tr>
                                                        <td style="width: 40%"><span class="txt-dark weight-500">{{ $sold->name }}</span></td>
                                                        <td style="width: 40%"><span class="txt-success"></i><span>Buyer Name</span></span></td>
                                                        <td style="width: 20%">
                                                            <span class="txt-dark weight-500">{{ date("F j, Y", strtotime($sold->sold_at)) }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark"><i id="showAddCategoryForm" class="fa fa-plus-circle pull-right"> New referral</i></h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-wrap">
                                            <form id="addReferralForm">
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="state">Referr myself</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="icon-user"></i></div>
                                                        <select id="auto_referr" name="auto_referr" class="form-control">
                                                            <option value="no" selected> No</option>
                                                            <option value="yes"> Yes</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="category_id">Category</label>
                                                    <select id="category_id" name="category_id" class="form-control">
                                                        <option value="1">OTHER</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" disabled> {{ $category->name }}</option>
                                                            @if($category->subcategories()->count())))
                                                            @foreach($category->subcategories()->get() as $cat)
                                                                <option value="{{ $cat->id }}"> - {{ $cat->name }}</option>
                                                            @endforeach
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="name">Name</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="icon-user"></i></div>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Full name" required min="3">
                                                    </div>
                                                    <div>
                                                        <span id="message_name" class="help-block has-error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="email">Email address</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                                                    </div>
                                                    <div>
                                                        <span id="message_email" class="help-block has-error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="phone">Phone</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                        <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                                                    </div>
                                                    <div>
                                                        <span id="message_phone" class="help-block has-error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="phone">Description</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="icon-list"></i></div>
                                                        <textarea data-id="description" name="description" class="form-control" id="description" cols="30" rows="3"></textarea>
                                                    </div>
                                                    <div>
                                                        <span id="message_description" class="help-block has-error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10 text-left">Needed At</label>
                                                           {{-- <div class="form-group">
                                                                <div class='input-group date' id='needed_at_datepicker'></div>
                                                                <input type="hidden" id="needed_at" name="needed_at">
                                                            </div>--}}
                                                            <div class='input-group date' id='needed_at_datepicker'>
                                                                <input type='text' class="form-control" />
                                                                <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span id="message_needed_at" class="help-block has-error"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label mb-10" for="contact_time">Best contact time</label>
                                                            <div class="input-group">
                                                                <select id="contact_time" name="contact_time" class="form-control">
                                                                    <option value="Anytime">Anytime</option>
                                                                    <option value="AM">AM</option>
                                                                    <option value="PM">PM</option>
                                                                </select>
                                                                <div class="input-group-addon"><i class="icon-hourglass"></i></div>

                                                            </div>
                                                            <div>
                                                                <span id="message_contact_time" class="help-block has-error"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10" for="city">City</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="icon-home"></i></div>
                                                                <input type="text" class="form-control" id="city" name="city" placeholder="City">
                                                            </div>
                                                            <div>
                                                                <span id="message_city" class="help-block has-error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label mb-10" for="state">State</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="icon-picture"></i></div>
                                                                <select id="state" name="state" class="form-control">
                                                                    @foreach($states as $key => $state)
                                                                        <option value="{{ $key }}"> {{ $state }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label mb-10" for="state">Urgent?</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="icon-picture"></i></div>
                                                                <select id="state" name="state" class="form-control">
                                                                        <option value="0"> No</option>
                                                                        <option value="1"> Yes</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                    <button type="button" id="cancelButton" class="btn btn-default pull-right">Cancel</button>
                                                    <button type="submit" id="createReferralButton" class="btn btn-success mr-10 pull-right">Submit</button>
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
            <!-- Row -->
        </div>

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
    <!-- Bootstrap Datetimepicker JavaScript -->
    <script type="text/javascript" src="{{ asset('dashboard/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var datepicker, successNotification = $('#successNotification'), addReferralForm = $('#addReferralForm'),
                formFieldsMessage = ['name', 'category_id', 'email', 'phone', 'description',
                    'needed_at', 'contact_time','city', 'state', 'urgent'], currentUser = {};

            currentUser = {
                name : '{{ Auth::user()->name }}',
                email : '{{ Auth::user()->email }}',
                phone : '{{ Auth::user()->profile->phone }}',
                description : '{{ Auth::user()->profile->description }}',
                city : '{{ Auth::user()->profile->city }}',
                state : '{{ Auth::user()->profile->state }}',
            };
            console.log(currentUser);
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

            function fillReferralFormWithCurrentUser(){
                console.log(currentUser);
                formFieldsMessage.forEach(function(itm, idx){
                    if(currentUser[itm]){
                        $('#'+itm).val(currentUser[itm]);
                    }
                })
            }
        });

    </script>
@endsection