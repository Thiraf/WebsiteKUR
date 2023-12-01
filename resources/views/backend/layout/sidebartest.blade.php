<aside id="aside" class="app-aside hidden-xs bg-dark">
    <div class="aside-wrap">
      <div class="navi-wrap">
        <!-- user -->
        <div class="clearfix hidden-xs text-center hide" id="aside-user">
          <div class="dropdown wrapper">
            <a href="app.page.profile">
              <span class="thumb-lg w-auto-folded avatar m-t-sm">
                <img src="{{asset('theme/html/img/a0.jpg')}}" class="img-full" alt="...">
              </span>
            </a>
            <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
              <span class="clear">
                <span class="block m-t-sm">
                  <strong class="font-bold text-lt">John.Smith</strong>
                  <b class="caret"></b>
                </span>
                <span class="text-muted text-xs block">Art Director</span>
              </span>
            </a>
            <!-- dropdown -->
            <ul class="dropdown-menu  w hidden-folded">
              <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                <span class="arrow top hidden-folded arrow-info"></span>
                <div>
                  <p>300mb of 500mb used</p>
                </div>
                <div class="progress progress-xs m-b-none dker">
                  <div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                </div>
              </li>
              <li>
                <a href>Settings</a>
              </li>
              <li>
                <a href="page_profile.html">Profile</a>
              </li>
              <li>
                <a href>
                  <span class="badge bg-danger pull-right">3</span>
                  Notifications
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="page_signin.html">Logout</a>
              </li>
            </ul>
            <!-- / dropdown -->
          </div>
          <div class="line dk hidden-folded"></div>
        </div>
        <!-- / user -->

        <!-- nav -->
        <nav ui-nav class="navi clearfix">
          <ul class="nav">
              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>Dashboard</span>
              </li>
              <li>
                <a href="{{ url('manage') }}">
                  {{-- <b class="badge bg-info pull-right">9</b> --}}
                  <i class="fa fa-dashboard"></i>
                  <span class="">Dashboard</span>
                </a>
              </li>

              @if(auth()->user()->role_id == 0)
              <li>
                    <a href="{{ route('manage.statistik.index') }}">
                      {{-- <b class="badge bg-info pull-right">9</b> --}}
                      <i class="fa fa-pie-chart"></i>
                      <span class="">Statistik</span>
                  </a>
              </li>
              @endif

            @if(auth()->user()->role_id == 0)
            <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
              <span>Master Data</span>
            </li>
            @endif


            @if (auth()->user()->role_id == 1)
            <li>
                <a href="{{ route('manage.user.index') }}">
                    {{-- <b class="badge bg-info pull-right">9</b> --}}
                    <i class="glyphicon glyphicon-user icon"></i>
                    <span class="">Pengguna</span>
                </a>
            </li>
            @endif
            @if(auth()->user()->role_id == 0)
            <li>
              <a href="{{ route('manage.bank.index') }}">
                {{-- <b class="badge bg-info pull-right">9</b> --}}
                <i class="fa fa-university"></i>
                <span class="">Bank Penyalur KUR</span>
              </a>
            </li>
            {{-- <li>
              <a href="{{ route('manage.financial-institution-umi.index') }}">
                <i class="fa fa-credit-card"></i>
                <span class="">Bank Penyalur UMI</span>
              </a>
            </li> --}}
            <li>
              <a href="{{ route('manage.business-type.index') }}">
                {{-- <b class="badge bg-info pull-right">9</b> --}}
                <i class="fa fa-list icon"></i>
                <span class="">Jenis Usaha</span>
              </a>
            </li>
            <li>
              <a href="{{ route('manage.business-permit.index') }}">
                {{-- <b class="badge bg-info pull-right">9</b> --}}
                <i class="fa fa-envelope"></i>
                <span class="">Izin Usaha</span>
              </a>
            </li>
            <li>
              <a href="{{ route('manage.kur-type.index') }}">
                {{-- <b class="badge bg-info pull-right">9</b> --}}
                <i class="fa fa-inbox"></i>
                <span class="">Jenis KUR</span>
              </a>
            </li>
            <li>
              <a href="{{ route('manage.termin.index') }}">
                {{-- <b class="badge bg-info pull-right">9</b> --}}
                <i class="glyphicon glyphicon-calendar icon"></i>
                <span class="">Termin</span>
              </a>
            </li>
            @endif
            @if(auth()->user()->role_id == 0)
            <li>
                <a href="{{ route('manage.user.index') }}">
                    {{-- <b class="badge bg-info pull-right">9</b> --}}
                    <i class="glyphicon glyphicon-user icon"></i>
                    <span class="">Pengguna</span>
                </a>
            </li>
            @endif
            <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
              <span>KUR</span>
            </li>
            <li>
                <a href="{{ route('manage.credit-request.index') }}">
                    {{-- <b class="badge bg-info pull-right">9</b> --}}
                    <i class="icon-credit-card icon"></i>
                    <span class="">Pengajuan KUR</span>
                </a>
            </li>
            <li>
                <a href="{{ route('manage.credit-request.history') }}">
                    {{-- <b class="badge bg-info pull-right">9</b> --}}
                    <i class="icon-credit-card icon"></i>
                    <span class="">Riwayat Pengajuan</span>
                </a>
            </li>

            @if(auth()->user()->role_id == 0)
            <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
              <span>Member</span>
            </li>
            <li>
                <a href="{{ route('manage.member.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="">Data Member</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->role_id == 0)
            <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>Content Management System</span>
            </li>
            <li>
              <a href="{{ route('manage.news-category.index') }}">
                  {{-- <b class="badge bg-info pull-right">9</b> --}}
                  <i class="fa fa-bars"></i>
                  <span class="">Kategori Berita</span>
              </a>
          </li>
            <li>
                <a href="{{ route('manage.news.index') }}">
                    {{-- <b class="badge bg-info pull-right">9</b> --}}
                    <i class="fa fa-newspaper-o icon"></i>
                    <span class="">Berita</span>
                </a>
            </li>

            <li>
                <a href="{{ route('manage.requirement.index') }}">
                    {{-- <b class="badge bg-info pull-right">9</b> --}}
                    <i class="fa fa-list-alt icon"></i>
                    <span class="">Profil & Syarat KUR</span>
                </a>
            </li>

            <li>
                <a href="{{ route('manage.faq.index') }}">
                    {{-- <b class="badge bg-info pull-right">9</b> --}}
                    <i class="fa fa-question-circle-o icon"></i>
                    <span class="">FAQ</span>
                </a>
            </li>

            <li>
              <a href="{{ route('manage.testimoni.index') }}">
                  {{-- <b class="badge bg-info pull-right">9</b> --}}
                  <i class="fa fa-comments icon"></i>
                  <span class="">Testimoni</span>
              </a>
          </li>
            @endif

          </ul>
        </nav>
        <!-- nav -->

        <!-- aside footer -->
        <div class="wrapper m-t">

        </div>
        <!-- / aside footer -->
      </div>
    </div>
</aside>
