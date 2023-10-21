<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <title>Login to KUR JOGJA</title>
  <meta name="description" content="Sistem Pengajuan Kredit Usaha Rakyat (KUR) JOGJA" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" />

  <style>
        .cover-img {
                height : 100%;
                background: linear-gradient(to bottom right, rgba(0,0,0,.4),rgba(0,0,0,.4)), url('{{ asset('images/login-photo-diy.jpg') }}');
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
<body class="d-flex">

    <div class="col-lg-8 cover-img">
        <div>
            <center>
                <h1 class="text-white" style="font-size : 4em; font-weight : 700">
                    KREDIT USAHA RAKYAT DAERAH ISTIMEWA YOGYAKARTA
                </h1>
            </center>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="app app-header-fixed ">
            <div class="container w-xxl w-auto-xs">
                <img src= "{{asset('images/logo.png')}}" alt="" style="width : 120px; margin : 0px auto;display : block">
                <a href class="navbar-brand block m-t">
                    Provinsi D.I. Yogyakarta
                </a>
                {{-- <form name="form" method="POST"  class="form-validation"> --}}
                    <form name="form" method="POST" action="{{ route('actionlogin') }}" class="form-validation">

                    {{-- action="route('login')" --}}


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
                    <button type="submit" class="btn btn-lg btn-danger btn-block w-100" ng-click="login()" ng-disabled='form.$invalid'>Log in</button>
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





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script>


<!-- Vue.js app container -->
<div id="app">
    <!-- Komponen-komponen Vue Anda -->
  </div>

  <!-- Tambahkan script Vue.js -->
  {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.16"></script> --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script> --}}

  <!-- Tambahkan script Axios (contoh menggunakan CDN) -->
  <script src="https://cdn.jsdelivr.net/npm/axios@0.22.0/dist/axios.min.js"></script>

  <script>
  new Vue({
    el: '#app',
    data: {
      // Data-data komponen Vue Anda
    },
    methods: {
      // Metode-metode untuk mengelola permintaan HTTP
      loginUser() {
        // Buat permintaan HTTP untuk login ke Laravel Sanctum di sini
        axios.post('/api/login', {
          email: 'email@example.com',
          password: 'password'
        })
        .then(response => {
          // Handle responsenya di sini
        })
        .catch(error => {
          // Handle kesalahan di sini
        });
      }
    }
  });
  </script>


</body>
</html>

