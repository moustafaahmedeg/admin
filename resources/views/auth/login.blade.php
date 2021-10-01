@extends('auth.auth')

@section('title', 'Login')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('login') }}">Grains</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Register New User</p>

            <form method="post" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <div class="input-group ">
                        <input name="email" type="email" class="form-control" placeholder="Enter Your Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="input-group ">
                        <input name="password" type="password" class="form-control" placeholder="Enter Your Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </div>
            </form>
            <p class="mb-1 mt-2">
                <a href="{{ route('password.email') }}">Forget Password</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Register</a>
            </p>
        </div>
    </div>
</div>
@endsection

