<!DOCTYPE html>
<html lang="ID">
	<head>
		<title>KUR JOGJA - Kredit Usaha Rakyat JOGJA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, shrink-to-fit=yes" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
		<link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}" type="text/css" />
		<link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('front/css/content.css')}}">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

		<script src="https://kit.fontawesome.com/7b6d4bc42b.js" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		{{-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
		<!-- Swiper JS -->
		<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
		<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

	</head>
	<body id="app" data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0">
		<nav id="logonavbar" class="pt-3">
			<div class="container">
				<div class="text-right justify-content-end">
					<img src="{{url('/')}}/front/img/logo-top.webp" class="pl-3" alt="" style="width: 180px">
				</div>
			</div>
		</nav>
		<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
			<div class="container">
				<a class="navbar-brand" href="{{url('/')}}">
					<img src="{{url('/')}}/front/img/logo_kur_jogja_new_revisi.png" alt="" style="width: 120px">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link text-dark" href="{{url('/')}}">Beranda <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="{{url('simulasi')}}">Simulasi</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="{{url('testimoni')}}">Testimoni</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="{{url('berita')}}">Berita</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="{{url('profile-kur')}}">Profil KUR</a> 	
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="{{url('faq')}}">FAQ</a>
						</li>
						<li class="nav-item">
							<a class="btn btn-danger text-white mr-2 mb-2" href="{{url('/member/login')}}"><i class="fas fa-sign-in-alt"></i> Login</a>
						</li>
						<li class="nav-item">
							<a class="btn btn-danger text-white" href="{{url('/member/register')}}"><i class="fas fa-file"></i> Daftar</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		@yield("page")
		<footer>

			<div class="container">
				<div class="footer text-center">
					<p class="ft-13">Copyright &copy; {{date('Y')}} - Tim Percepatan Akses Keuangan Daerah DIY. All Rights Reserved</p>
				</div>
			</div>
		</footer>

		<script>
			var swiper = new Swiper(".mySwiper", {
			    slidesPerView: 2,
				spaceBetween: 10,
				breakpoints: {
					425: {
						slidesPerView: 1,
						spaceBetween: 30,
					},
					375: {
						slidesPerView: 1,
						spaceBetween: 30,
					},
					640: {
						slidesPerView: 3,
						spaceBetween: 30,
					}
				},
			    pagination: {
			        el: ".swiper-pagination",
			        clickable: true,
				},
			    navigation: {
			        nextEl: ".swiper-button-next",
			        prevEl: ".swiper-button-prev",
			    },
			});
			
			AOS.init();

			// You can also pass an optional settings object
			// below listed default settings
			AOS.init({
			    // Global settings:
			    disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
			    startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
			    initClassName: 'aos-init', // class applied after initialization
			    animatedClassName: 'aos-animate', // class applied on animation
			    useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
			    disableMutationObserver: false, // disables automatic mutations' detections (advanced)
			    debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
			    throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


			    // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
			    offset: 120, // offset (in px) from the original trigger point
			    delay: 0, // values from 0 to 3000, with step 50ms
			    duration: 400, // values from 0 to 3000, with step 50ms
			    easing: 'ease', // default easing for AOS animations
			    once: false, // whether animation should happen only once - while scrolling down
			    mirror: false, // whether elements should animate out while scrolling past them
			    anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

			});
		</script>

		<style>
			.bg-dark-dashboard{
				background-color: transparent !important;
				position: fixed;
				top: 0;
				z-index: 999999;
			}
			.bg-dark-dashboard.scrolled{
				background-color: #263c5b !important;
  				transition: background-color 200ms linear;
			}
		</style>

		<script>
			$(document).on('keydown', '.number-input', function (e) {
				var ctrlDown = e.ctrlKey || e.metaKey;

				if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
					(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
					(e.keyCode >= 35 && e.keyCode <= 40) || e.keyCode == 116 || (ctrlDown && e.keyCode == 67) || (ctrlDown && e.keyCode == 86) || (ctrlDown && e.keyCode == 88)) {

					return;
				}

				if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
					e.preventDefault();
				}
			});

			$(document).on('keyup', '.number-input', function (e) {
				let number = this.value.split(".");
				let stringVal = number.join("");

				console.log("String : " + isNaN(stringVal))
				if (isNaN(stringVal)) {
					this.value = "0";
				} else {
					this.value = stringVal && parseInt(stringVal).toLocaleString("id") || "0"
				}
			});

			$(document).on('keydown', '.number-input-comma', function (e) {
				var ctrlDown = e.ctrlKey || e.metaKey;

				if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
					(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
					(e.keyCode >= 35 && e.keyCode <= 40) || e.keyCode == 116 || (ctrlDown && e.keyCode == 67) || (ctrlDown && e.keyCode == 86) || (ctrlDown && e.keyCode == 88)) {

					return;
				}
				if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
					e.preventDefault();
				}
			});

			$(document).on('keyup', '.number-input-comma', function (e) {
				if (this.value.length > 1 && this.value.charAt(0) == 0 && this.value.charAt(1) != '.') {
					this.value = this.value.substr(1);

					return;
				}
			});

			$(document).on('keypress', '.number-input-comma', function (e) {
				let value = this.value;

				if (e.keyCode === 46 && value.indexOf('.') > -1) {
					return false;
				}
			});

			$(function () {
				$(document).scroll(function () {
					var $nav = $(".bg-dark-dashboard");
					$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
				});
			});

		</script>

		<!-- @stack('scripts') -->
    </body>
</html>

