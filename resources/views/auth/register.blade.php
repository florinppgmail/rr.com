@extends('layouts.website')

@section('content')
    <!-- Main Content -->
    <div class="page-wrapper pa-0 ma-0 auth-page">
        <div class="container-fluid">
            <!-- Row -->
            <div class="table-struct full-width full-height">
                <div class="table-cell vertical-align-middle auth-form-wrap">
                    <div class="auth-form  ml-auto mr-auto no-float">
                        <div class="row user-account">
                            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                                <div class="mb-30">
                                    <h3 class="text-center txt-dark mb-10">Sign Up</h3>
                                    <h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
                                </div>
                                <div class="form-wrap">
                                    <form class="" role="form" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}
                                        @if ($errors->has('role_id'))
                                            <span class="help-block text-center has-error">
                                                    <strong>{{ $errors->first('role_id') }}</strong>
                                        </span>
                                        @endif

                                        <input type="hidden" name="role_id" value="{{ \Request::route()->getName() == 'vendor-register' ? 3 : 2 }}">
                                        {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label class="control-label mb-10" for="name">Full Name</label>
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>--}}
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
                                            <input id="password" type="password" class="form-control" name="password" required placeholder="Enter password">

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="exampleInputpwd_3">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" required="" id="password_confirmation" placeholder="Confirm password">
                                        </div>
                                        {{--<div class="form-group">
                                            <div class="checkbox checkbox-primary pr-10 pull-left">
                                                <input id="checkbox_2" required="" type="checkbox">
                                                <label for="checkbox_2"> I agree to all <span class="txt-primary">Terms</span></label>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>--}}
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-info btn-rounded">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->
        </div>

    </div>
    <!-- /Main Content -->
@endsection
