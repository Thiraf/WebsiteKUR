<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <title>Login to KUR JOGJA</title>
  <meta name="description" content="Sistem Pengajuan Kredit Usaha Rakyat (KUR) JOGJA" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="{{ asset('theme/libs/assets/animate.css/animate.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('theme/libs/assets/font-awesome/css/font-awesome.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('theme/libs/assets/simple-line-icons/css/simple-line-icons.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('theme/libs/jquery/bootstrap/dist/css/bootstrap.css') }}" type="text/css" />

  <link rel="stylesheet" href="{{ asset('theme/html/css/font.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('theme/html/css/app.css') }}" type="text/css" />

  <style>
        .cover-img {
                height : 100%;
                background: linear-gradient(to bottom right, rgba(0,0,0,.4),rgba(0,0,0,.4)), url('/images/login-photo-diy.jpg');
                background-size: cover;
                background-position: center left;
                display: flex;
                align-items: center;
                justify-content: center;
        }
        .cover-img > .box {

        }
  </style>
</head>
<body>

    <div class="col-lg-8 cover-img">
        <div>
            <center>

                <h1 class="text-white" style="font-size : 4em;font-weight : 700">
                    KREDIT USAHA RAKYAT DAERAH ISTIMEWA YOGYAKARTA
                </h1>
            </center>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="app app-header-fixed ">
            <div class="container w-xxl w-auto-xs">
                <img src="{{ asset('images/logo.png') }}" alt="" style="width : 120px; margin : 0px auto;display : block">
                <a href class="navbar-brand block m-t">
                    Provinsi D.I. Yogyakarta
                </a>
                <form name="form" method="GET" action="{{route('login')}}" class="form-validation">
                       {{csrf_field()}}
			 @csrf
                    <div class="text-danger wrapper text-center" ng-show="authError">

                    </div>
                    <div class="list-group list-group-sm">
                    <div class="list-group-item">
                        <input type="email" placeholder="Email" class="form-control no-border" name="email" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="list-group-item">
                        <input type="password" placeholder="Password" class="form-control no-border" name="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-danger btn-block" ng-click="login()" ng-disabled='form.$invalid'>Log in</button>
                    <div class="text-center m-t m-b"><a ui-sref="access.forgotpwd">Lupa password?</a></div>
                    <div class="line line-dashed"></div>
                </form>
                </div>
                <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
                <p>
                <small class="text-muted">KUR D.I. YOGYAKARTA. <br>Copyright &copy; 2021</small>
            </p>
                </div>
            </div>
        </div>
    </div>




<script src="{{ asset('theme/libs/jquery/jquery/dist/jquery.js') }}"></script>
<script src="{{ asset('theme/libs/jquery/bootstrap/dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('theme/html/js/ui-load.js') }}"></script>
<script src="{{ asset('theme/html/js/ui-jp.config.js') }}"></script>
<script src="{{ asset('theme/html/js/ui-jp.js') }}"></script>
<script src="{{ asset('theme/html/js/ui-nav.js') }}"></script>
<script src="{{ asset('theme/html/js/ui-toggle.js') }}"></script>
<script src="{{ asset('theme/html/js/ui-client.js') }}"></script>
<script src="https://use.fontawesome.com/51e27bac85.js"></script>

</body>
</html>

