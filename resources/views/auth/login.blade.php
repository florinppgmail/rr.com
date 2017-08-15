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
                                    <h3 class="text-center txt-dark mb-10">Sign In</h3>
                                    <h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
                                </div>
                                <div class="form-wrap">
                                    <form class="" role="form" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="control-label mb-10" for="email">Email address</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="password">Password</label>
                                            {{--<a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="{{ route('password.request') }}">forgot password ?</a>--}}
                                            <div class="clearfix"></div>
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                        </div>

                                        <div class="user-option">
                                            <div class="checkbox pull-left">
                                                <label for="logged"><input type="checkbox" name="logged" id="logged"> Keep me logged in </label>
                                            </div>
                                            <div class="pull-right forgot-password">
                                                <a href="{{ route('password.request') }}">Forgot password</a>
                                            </div>
                                        </div><!-- forgot-password -->
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-info btn-rounded">sign in</button>
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
