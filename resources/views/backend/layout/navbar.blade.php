<header id="header" class="app-header navbar" role="menu">
    <!-- navbar header -->
    <div class="navbar-header bg-white">
        <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
            <i class="glyphicon glyphicon-cog"></i>
        </button>
        <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
            <i class="glyphicon glyphicon-align-justify"></i>
        </button>
        <!-- brand -->
        <a href="#/" class="navbar-brand text-lt">
            <img src="{{url('/')}}/images/logo2.png" alt="." class="" style="max-height : 40px">
        </a>
        <!-- / brand -->
    </div>
    <!-- / navbar header -->

    <!-- navbar collapse -->
    <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
        <!-- buttons -->
        <div class="nav navbar-nav hidden-xs">
            <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
                <i class="fa fa-dedent fa-fw text"></i>
                <i class="fa fa-indent fa-fw text-active"></i>
            </a>
        </div>
        <!-- / buttons -->




        <!-- nabar right -->

        <ul class="nav navbar-nav navbar-right">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                {{--<i class="icon-bell fa-fw"></i>
                <span class="visible-xs-inline">Notifications</span>
                <span class="badge badge-sm up bg-danger pull-right-xs">2</span>--}}
            </a>
            <!-- dropdown -->
            {{--
            <div class="dropdown-menu w-xl ">
                <div class="panel bg-white">
                    <div class="panel-heading b-light bg-light">
                        <strong>You have <span>2</span> notifications</strong>
                    </div>
                    <div class="list-group">
                        <a href class="list-group-item">
                            <span class="pull-left m-r thumb-sm">
                                <img src="{{asset('theme/html/img/a0.jpg')}}/" alt="..." class="img-circle">
                            </span>
                            <span class="clear block m-b-none">
                                Use awesome animate.css<br>
                                <small class="text-muted">10 minutes ago</small>
                            </span>
                        </a>
                        <a href class="list-group-item">
                            <span class="clear block m-b-none">
                                1.0 initial released<br>
                                <small class="text-muted">1 hour ago</small>
                            </span>
                        </a>
                    </div>
                    <div class="panel-footer text-sm">
                        <a href class="pull-right"><i class="fa fa-cog"></i></a>
                        <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                    </div>
                </div>
            </div>
            <!-- / dropdown -->
            </li> --}}
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
                    <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                    </span>
                    <span class="hidden-sm hidden-md">{{-- auth()->user()->name --}}</span> <b class="caret"></b>
                </a>
                <!-- dropdown -->
                <ul class="dropdown-menu  w">
                    <li>
                        <a ui-sref="app.page.profile">Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{-- route('logout') --}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form id="logout-form" action="route('actionlogout')" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
                <!-- / dropdown -->
            </li>
        </ul>
        <!-- / navbar right -->
    </div>
    <!-- / navbar collapse -->
</header>
