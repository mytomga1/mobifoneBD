<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Mobifone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'><link rel="stylesheet" href="{{asset('backend')}}/bower_components/login/logincss.css">

</head>
<body>

<div >
    <span><img src="{{asset('frontend\img\logo\mobifone-vector-logo-ai.png')}}"  alt=""></span>
</div>

<div class='box'>

    <div class='box-form'>
        <div class='box-login-tab'></div>
        <div class='box-login-title'>
            <div class='i i-login'></div><h2>LOGIN</h2>
        </div>
        <div class='box-login'>
            <div class='fieldset-body' id='login_form'>
                <button onclick="openLoginInfo();" class='b b-form i i-more'></button>
                <form action="{{ route('admin.postLogin') }}" method="post">
                    @csrf
                    <div class="show-error">
                        <br/>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <li style="color: red">{{ $error }}</li>
                            @endforeach
                        @endif
                    </div>

                    <p class='field'>
                        <label for='email'>E-MAIL</label>
                        <input type='text' id='email' name='email' title='Username' />
                        <span id='valida' class='i i-warning'></span>
                    </p>
                    <p class='field'>
                        <label for='password'>MẬT KHẨU</label>
                        <input type='password' id='password' name='password' title='Password' />
                        <span id='valida' class='i i-close'></span>
                    </p>

                    <label class='checkbox'>
                        <input type='checkbox' value='TRUE' title='Keep me Signed in' name="remember_token" /> Duy trì đăng nhập
                    </label>

                    <input type='submit' id='do_login' value='Đăng nhập' title='đăng nhập' />

                </form>
            </div>
        </div>
    </div>

    <div class='box-info'>
        <p><button onclick="closeLoginInfo();" class='b b-info i i-left' title='Back to Sign In'></button><h3>Bạn Cần Giúp Đỡ?</h3>
        </p>
        <div class='line-wh'></div>
        <button onclick="" class='b-support' title='Forgot Password?'> Quên Mật Khẩu?</button>
        <button onclick="" class='b-support' title='Contact Support'> Liên hệ giúp đỡ</button>
        <div class='line-wh'></div>
        {{--        <button onclick="" class='b-cta' title='Sign up now!'> CREATE ACCOUNT</button>--}}
    </div>

</div>

<!-- partial -->
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script><script  src="{{asset('backend')}}/bower_components/login/logincss.js"></script>

</body>
</html>
