<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8" />
    <title>KUR JOGJA | @yield('title')</title>
    <meta name="description" content="Sistem Pengajuan Kredit Usaha Rakyat (KUR) JOGJA" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="stylesheet" href="{{ asset('theme/animate.css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/dropify/css/dropify.min.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ asset('theme/font-awesome/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/simple-line-icons/css/simple-line-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/jquery/bootstrap/dist/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/jquery/plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}"
        type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('theme/datepicker/css/bootstrap-datepicker.min.css') }}">

    <!-- Font & CSS -->
    <link rel="stylesheet" href="{{ asset('css/font.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" />
    <style>
    .action-button {
        text-align: right;
    }
    </style>
    @stack('styles')

</head>

<body id="app">
    <div class="app app-header-fixed ">


        @include('backend.layout.navbar')

        <!-- aside -->
        {{-- @include('backend.layout.sidebartest') --}}
        @include('backend.layout.sidebartest')
        {{-- ini buat nampilin sidebar --}}

        <!-- / aside -->


        <!-- content -->
        <div id="content" class="app-content" role="main">
            <div class="app-content-body ">

                <div class="bg-light lter b-b wrapper-md">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="m-n font-thin h3">@yield('title')</h1>
                        </div>
                        <div class="col-md-6">
                            <div class="action-button">
                                @yield('actions')
                            </div>
                        </div>
                    </div>

                </div>
                <div class="wrapper-md" ng-controller="FormDemoCtrl">

                    @yield('content')

                </div>
            </div>
        </div>
        <!-- /content -->

        @include('backend.layout.footer')
        @include('backend.layout.modals.confirmation')



    </div>

    <script src="{{ asset('theme/jquery/jquery/dist/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{ asset('theme/jquery/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/html/js/ui-load.js') }}"></script>
    <script src="{{ asset('theme/html/js/vue.min.js') }}"></script>
    <script src="{{ asset('theme/html/js/axios.min.js') }}"></script>
    <script src="{{ asset('theme/html/js/ui-jp.config.js') }}"></script>
    <script src="{{ asset('theme/html/js/ui-jp.js') }}"></script>
    <script src="{{ asset('theme/html/js/ui-nav.js') }}"></script>
    <script src="{{ asset('theme/html/js/ui-toggle.js') }}"></script>
    <script src="{{ asset('theme/html/js/ui-client.js') }}"></script>
    <script src="{{ asset('theme/dropify/js/dropify.min.js') }}"></script>
    <script src="https://use.fontawesome.com/51e27bac85.js"></script>
    <script src="{{ asset('theme/jquery/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/jquery/plugins/integration/bootstrap/3/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('theme/datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <script>
    $(document).on('keydown', '.number-input', function(e) {
        var ctrlDown = e.ctrlKey || e.metaKey;

        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            (e.keyCode >= 35 && e.keyCode <= 40) || e.keyCode == 116 || (ctrlDown && e.keyCode == 67) || (
                ctrlDown && e.keyCode == 86) || (ctrlDown && e.keyCode == 88)) {

            return;
        }

        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $(document).on('keyup', '.number-input', function(e) {
        if (this.value.length > 1 && this.value.charAt(0) == 0) {
            this.value = this.value.substr(1);
            // $(this).val(($val))
            return;
        }

        let number = this.value.split(".");
        let stringVal = number.join("");

        if (String(parseInt(stringVal).toLocaleString("id")) === "NaN") {
            this.value = null;
        } else {
            this.value = parseInt(stringVal).toLocaleString("id")
        }
    });

    $(document).on('keydown', '.number-input-comma', function(e) {
        var ctrlDown = e.ctrlKey || e.metaKey;

        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            (e.keyCode >= 35 && e.keyCode <= 40) || e.keyCode == 116 || (ctrlDown && e.keyCode == 67) || (
                ctrlDown && e.keyCode == 86) || (ctrlDown && e.keyCode == 88)) {

            return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $(document).on('keyup', '.number-input-comma', function(e) {
        if (this.value.length > 1 && this.value.charAt(0) == 0 && this.value.charAt(1) != '.') {
            this.value = this.value.substr(1);

            return;
        }
    });

    $(document).on('keypress', '.number-input-comma', function(e) {
        let value = this.value;

        if (e.keyCode === 46 && value.indexOf('.') > -1) {
            return false;
        }
    });
    </script>
    @stack('scripts')
</body>

</html>
