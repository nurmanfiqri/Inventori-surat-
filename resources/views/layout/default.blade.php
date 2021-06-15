{{--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
 --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
    <head>
        <meta charset="utf-8"/>

        {{-- Title Section --}}
        <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

        {{-- Meta Data --}}
        <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"/>

        {{-- Fonts --}}
        {{ Metronic::getGoogleFontsInclude() }}

        {{-- Global Theme Styles (used by all pages) --}}
        @foreach(config('layout.resources.css') as $style)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Layout Themes (used by all pages) --}}
        @foreach (Metronic::initThemes() as $theme)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Includable CSS --}}
        @yield('styles')
        <style>
            td.no-wrap {
                white-space: nowrap !important;
            }
        </style>
    </head>

    <body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

        @if (config('layout.page-loader.type') != '')
            @include('layout.partials._page-loader')
        @endif

        @include('layout.base._layout')

        <script>var HOST_URL = "{{ route('quick-search') }}";</script>

        
		<script src="{{ asset('plugins/global/plugins.bundle.js ') }}"></script>
		<script src="{{ asset('js/scripts.bundle.js ') }}"></script>

        <script src="{{asset('js/inputmask/inputmask.js')}}"></script>
        <script src="{{asset('js/inputmask/jquery.inputmask.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            getInbox();
            setInterval(getInbox, 60000);

            function getInbox(){
                $.ajax({
                    url: '{{url("api/common/chat/get-notif")}}',
                    method: 'GET',
                    dataType: "JSON",
                    success: function (data) {
                        if(data > 0){
                            $('#inbox-r').html(`
                            <span class="label label-rounded label-light-success font-weight-bolder">${data}</span>
                            `);
                        }else{
                            $('#inbox-r').html(`
                            <span class="label label-rounded label-light-primary font-weight-bolder">0</span>
                            `);
                        }
                    },
                    error: function (response) {

                    },
                    complete: function () {

                    }
                });
            }

            $('.datepicker').datepicker({
                autoclose: true,
                format: "dd-mm-yyyy",
                immediateUpdates: true,
                todayBtn: true,
                todayHighlight: true
            });
                
            Inputmask.extendAliases({
			'numeric': {
				'groupSeparator': ',',
				'radixPoint': '.',
				'autoGroup': true,
				'removeMaskOnSubmit': true,
				'rightAlign': true,
				'autoUnmask': true,
				'digits': 2,
				'unmaskAsNumber': true,
				// 'placeholder': '0.00',
				// 'digitsOptional': false
			}
		});
        </script>

        {{-- Includable JS --}}
        @yield('scripts')
    

    </body>
</html>

