<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grains - Login</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('dashboard') }}">Grains</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">
                    Thanks for signing up! Before getting started, could you verify your email address by
                    clicking on the link we just emailed to you? If you didn\'t receive the email, we will
                    gladly send you another
                </p>

                <div class="d-flex justify-content-between">
                    <form method="post" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-block">Resend Verification</button>
                    </form>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-block">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/dist/js/adminlte.min.js"></script>
</body>
</html>

