@extends('frontend.layouts.master')

@section('title', 'تسجيل دخول')

@section('content_page')
    <main>
        <div class="page-top d-flex justify-content-center align-items-center flex-column text-center">
            <div class="page-top__overlay"></div>
            <div class="position-relative">
                <div class="page-top__title mb-3">
                    <h2>حسابي</h2>
                </div>
                <div class="page-top__breadcrumb">
                    <a class="text-gray" href="index.html">الرئيسية</a> /
                    <span class="text-gray">حسابي</span>
                </div>
            </div>
        </div>

        <div class="page-full pb-5">
            <div class="account account--login mt-5 pt-5">
                <div class="account__tabs w-100 d-flex mb-3">
                    <div class="account__tab account__tab--login text-center fs-6 py-3 w-50">
                        تسجيل الدخول
                    </div>
                    <div class="account__tab account__tab--register text-center fs-6 py-3 w-50">
                        حساب جديد
                    </div>
                </div>
                <div class="account__login w-100">
                    <form method="POST" action="{{ route('login') }}" class="mb-5">
                        @csrf
                        <div class="input-group rounded-1 mb-3">
                            <input type="email" class="form-control p-3" placeholder="البريد الالكتروني"
                                aria-label="Email" name="email" aria-describedby="basic-addon1" />
                            <span class="input-group-text login__input-icon" id="basic-addon1">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                        </div>
                        @error('email')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="input-group rounded-1 mb-3">
                            <input type="password" class="form-control p-3" placeholder="كلمة السر" aria-label="Password"
                                name="password" aria-describedby="basic-addon1" />
                            <span class="input-group-text login__input-icon" id="basic-addon1">
                                <i class="fa-solid fa-key"></i>
                            </span>
                        </div>
                        @error('password')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="login__bottom d-flex justify-content-between mb-3">
                            <a class="login__forget-btn" href="">نسيت كلمة المرور؟</a>
                            <div>
                                <input type="checkbox" />
                                <label for="">تذكرني</label>
                            </div>
                        </div>

                        <button class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">
                            تسجيل الدخول
                        </button>
                    </form>

                    <button class="loginBtn loginBtn--facebook">
                        <a href="{{route('socialite.login',['provider'=>'facebook'])}}" style="color: white" >
                            Login with Facebook
                        </a>
                    </button>
                    <button class="loginBtn loginBtn--google">
                        <a href="{{route('socialite.login',['provider'=>'google'])}}" style="color: white">
                            Login with Google
                        </a>
                    </button>
                    <button class="loginBtn loginBtn--github">
                        <a href="{{route('socialite.login',['provider'=>'github'])}}" style="color: white">
                            Login with Github
                        </a>
                    </button>

                </div>
                <div class="account__register w-100">
                    <form method="POST" action="{{ route('register') }}" class="mb-5">
                        @csrf
                        <div class="input-group rounded-1 mb-3">
                            <input type="text" class="form-control p-3" placeholder="الاسم كامل" aria-label="name"
                                name="name" aria-describedby="basic-addon1" />
                            <span class="input-group-text login__input-icon" id="basic-addon1">
                                <i class="fa-solid fa-user"></i>
                            </span>
                        </div>
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="input-group rounded-1 mb-3">
                            <input type="email" class="form-control p-3" placeholder="البريد الالكتروني" name="email"
                                aria-label="email" name="email" aria-describedby="basic-addon1" />
                            <span class="input-group-text login__input-icon" id="basic-addon1">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                        </div>
                        @error('email')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="input-group rounded-1 mb-3">
                            <input type="password" class="form-control p-3" placeholder="كلمة السر" aria-label="password"
                                name="password" aria-describedby="basic-addon1" />
                            <span class="input-group-text login__input-icon" id="basic-addon1">
                                <i class="fa-solid fa-key"></i>
                            </span>
                        </div>
                        @error('password')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <button class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">
                            حساب جديد
                        </button>
                    </form>

                    <button class="loginBtn loginBtn--facebook">
                        <a href="{{route('socialite.login',['provider'=>'facebook'])}}" style="color: white" >
                            Login with Facebook
                        </a>
                    </button>
                    <button class="loginBtn loginBtn--google">
                        <a href="{{route('socialite.login',['provider'=>'google'])}}" style="color: white">
                            Login with Google
                        </a>
                    </button>
                    <button class="loginBtn loginBtn--github">
                        <a href="{{route('socialite.login',['provider'=>'github'])}}" style="color: white">
                            Login with Github
                        </a>
                    </button>

                </div>
                <div class="account__forget">
                    <p>
                        فقدت كلمة المرور الخاصة بك؟ الرجاء إدخال عنوان البريد الإلكتروني
                        الخاص بك. ستتلقى رابطا لإنشاء كلمة مرور جديدة عبر البريد
                        الإلكتروني.
                    </p>
                    <x-massege />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="input-group rounded-1 mb-3">
                            <input type="email" name="email" id="email" class="form-control p-3"
                                placeholder="البريد الالكتروني" aria-label="Username" aria-describedby="basic-addon1" />
                            <span class="input-group-text login__input-icon" id="basic-addon1">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                        </div>
                        <button class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">
                            اعادة تعيين كلمة المرور
                        </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

@endsection

@section('cs')
<style>
    body { padding: 2em; }


    /* Shared */
    .loginBtn {
        box-sizing: border-box;
        position: relative;
        /* width: 13em;  - apply for fixed size */
        margin: 0.2em;
        padding: 0 15px 0 46px;
        border: none;
        text-align: left;
        line-height: 34px;
        white-space: nowrap;
        border-radius: 0.2em;
        font-size: 16px;
        color: #FFF;
    }
    .loginBtn:before {
        content: "";
        box-sizing: border-box;
        position: absolute;
        top: 0;
        left: 0;
        width: 34px;
        height: 100%;
    }
    .loginBtn:focus {
        outline: none;
    }
    .loginBtn:active {
        box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
    }


    /* Facebook */
    .loginBtn--facebook {
        background-color: #4C69BA;
        background-image: linear-gradient(#4C69BA, #3B55A0);
        /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
        text-shadow: 0 -1px 0 #354C8C;
    }
    .loginBtn--facebook:before {
        border-right: #364e92 1px solid;
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
    }
    .loginBtn--facebook:hover,
    .loginBtn--facebook:focus {
        background-color: #5B7BD5;
        background-image: linear-gradient(#5B7BD5, #4864B1);
    }


    /* Google */
    .loginBtn--google {
        /*font-family: "Roboto", Roboto, arial, sans-serif;*/
        background: #DD4B39;
    }
    .loginBtn--google:before {
        border-right: #BB3F30 1px solid;
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
    }
    .loginBtn--google:hover,
    .loginBtn--google:focus {
        background: #E74B37;
    }

    /* github */
    .loginBtn--github {
        /*font-family: "Roboto", Roboto, arial, sans-serif;*/
        background: #000000;
    }
    .loginBtn--github:before {
        border-right: #000000 1px solid;
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_github.png') 6px 6px no-repeat;
    }
    .loginBtn--github:hover,
    .loginBtn--github:focus {
        background: #000000;
    }
</style>
@endsection
