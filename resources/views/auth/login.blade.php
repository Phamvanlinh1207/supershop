@extends('master')
@section('title', __('login.title'))

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Store</a></li>
                <li class="active">Login</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>Login</h1>
                    <!-- BEGIN CHECKOUT PAGE -->
                    <div class="panel-group checkout-page accordion scrollable" id="checkout-page">
                        <div id="checkout" class="panel panel-default">

                            <div id="checkout-content" class="panel-collapse collapse in">
                                <div class="panel-body row">
                                    <div class="col-md-6 col-sm-6">
                                        <h3>New Customer</h3>
                                        <p>Checkout Options:</p>
                                        <div class="radio-list">
                                            <label>
                                                <input type="radio" name="account" value="register"> Register Account
                                            </label>
                                            <label>
                                                <input type="radio" name="account" value="guest"> Guest Checkout
                                            </label>
                                        </div>
                                        <p>By creating an account you will be able to shop faster, be up to date on an
                                            order's status, and keep
                                            track of the orders you have previously made.</p>
                                        <button class="btn btn-primary" type="submit" data-toggle="collapse"
                                            data-parent="#checkout-page"
                                            data-target="#payment-address-content">Continue</button>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <h3>Customer Login</h3>
                                        <p>I am a returning customer.</p>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email-login" {{ __('Email Address') }}>E-Mail</label>
                                                <input type="text" id="email-login"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password-login" {{ __('Password') }}>Password</label>
                                                <input type="password" id="password-login"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" value="{{ old('password') }}" required
                                                    autocomplete="password" autofocus>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif

                                            @if (Route::has('register'))
                                                <a class="btn btn-link"
                                                    href="{{ route('register') }}">{{ __('
                                                                                                        No Account? Register') }}</a>
                                            @endif
                                            <div class="padding-top-20">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                            <hr>
                                            <div class="login-socio">
                                                <p class="text-muted">or login using:</p>
                                                <ul class="social-icons">
                                                    <li><a href="javascript:;" data-original-title="facebook"
                                                            class="facebook" title="facebook"></a></li>
                                                    <li><a href="javascript:;" data-original-title="Twitter" class="twitter"
                                                            title="Twitter"></a></li>
                                                    <li><a href="javascript:;" data-original-title="Google Plus"
                                                            class="googleplus" title="Google Plus"></a></li>
                                                    <li><a href="javascript:;" data-original-title="Linkedin"
                                                            class="linkedin" title="LinkedIn"></a></li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END CONFIRM -->
                </div>
                <!-- END CHECKOUT PAGE -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>

@endsection
