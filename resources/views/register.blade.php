<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

    <title>Sign Up</title>

    <link href="{{URL::asset('css/app.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>
<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Đăng kí người dùng quản trị</h1>
                            <p class="lead">

                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    <form id="frm" action="{{ route('register.custom') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Họ tên</label>
                                            <input class="form-control form-control-lg" type="text" name="name" placeholder="Nhập họ tên" />
                                            @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Nhập email" />
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mật khẩu</label>
                                            <input class="form-control form-control-lg" type="password" id="password" name="password" placeholder="Nhập mật khẩu" />
                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Xác nhận mật khẩu</label>
                                            <input class="form-control form-control-lg" type="password" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu" />
                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>

                                    </form>
                                    <div class="d-grid gap-2 mt-3">
                                        <button type="" onclick="checkMatch()" id="btn-register" class="btn btn-lg btn-primary">Đăng kí</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            Đã có tài khoản ? <a href="{{URL::asset('login')}}">Log In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{URL::asset('js/app.js')}}"></script>
    <script>
        /// re-match password
        // $(document).ready(function() {
        let password = $('#password').val();
        let repassword = $('#repassword').val();
        //
        function checkMatch() {
            if ((password === repassword)) {
                alert('OK');
                $('#frm').submit();
            } else if ((password.trim() == "") && (repassword.trim() == "")) {
                alert('Mật khẩu không trùng khớp');
            }

        }

        // });

    </script>
</body>

</html>
