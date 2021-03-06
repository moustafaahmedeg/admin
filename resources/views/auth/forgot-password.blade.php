@extends('auth.auth')

@section('title', 'Login')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('dashboard') }}">Grains</a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Enter Your Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                    </div>
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="{{ route('login') }}">Login</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Register</a>
            </p>
        </div>
    </div>
</div>
@endsection

