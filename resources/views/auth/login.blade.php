<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>  
	<!--begin::Head-->
	<head>
		{{-- <base href="../../../../"> --}}
		<meta charset="utf-8" />
        <title>{{ config('app.name') }} | @yield('title', $page_title ?? 'Login Page')</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{ asset('css/pages/login/classic/login-3.css ') }}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{ asset('css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url({{ asset('/media/bg/bg-1.jpg') }}">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="{{ asset('/media/logos/logo-default.png') }}" class="max-h-100px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3>Login Administrator</h3>
								<p class="opacity-60 font-weight-bold">Enter your details to login to your account:</p>
							</div>

							{{-- {{dd(session()->all())}} --}}
							@if(Session::get('error'))			
							<div class="alert alert-danger" role="alert">
								{{Session::get('error')}}
							</div>
							@endif

							<form class="form" method="POST" action="{{url('postlogin')}}">
								{{ csrf_field() }}
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="text" placeholder="Username" name="name" autocomplete="off" required value=""/>
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="password" placeholder="Password" name="password" required/>
								</div>
								<div class="form-group text-center mt-10">
									<button type="submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Sign In</button>
								</div>
							</form>
						</div>
						<!--end::Login Sign in form-->
						<!--begin::Login Sign up form-->
					
						<!--end::Login Sign up form-->
						<!--begin::Login forgot password form-->
						<div class="login-forgot">
							<div class="mb-20">
								<h3>Forgotten Password ?</h3>
								<p class="opacity-60">Enter your email to reset your password</p>
							</div>
							<form class="form" id="kt_login_forgot_form">
								<div class="form-group mb-10">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
								</div>
								<div class="form-group">
									<button id="kt_login_forgot_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Request</button>
									<button id="kt_login_forgot_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
								</div>
							</form>
						</div>
						<!--end::Login forgot password form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>
