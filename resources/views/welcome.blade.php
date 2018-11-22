<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="header">

                <div class="logo m-b-md">
                    <img src="{{ asset('assets/images/logo.png') }}">
                </div>

            @if (Route::has('login'))
                <div class="top-right links menu">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                        <a href="#">Repayments</a>
                </div>
            @endif
            </div>

            <div class="content">
                <div class="slider">
                    <div class="img-slider">
                        <div class="slider-content">
                            <div style="line-height: 35px;font-size: 20px;opacity: .66;margin-bottom: 18px;">100% Online. Same Day</div>
                            <div style="font-size: 40px;margin-top:20px;margin-bottom: 50px;line-height: 50px;font-weight: 700;">Finance your business the right way</div>
                            <button style="font-size: 18px;line-height: 30px;padding: 10px 30px;height: 50px;border-radius: 4px;background-color: #00d367;border-color: #00d367;">Apply Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
