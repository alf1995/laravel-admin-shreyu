<link rel="shortcut icon" href="{{ URL::asset('images/setting'). Settings::sistema()['favicon'] }}">

@yield('css')

<link href="{{ URL::asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

@if(isset($isDark) && $isDark)
<link href="{{ URL::asset('assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" />
@else
<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    @if(isset($isRTL) && $isRTL)
    <link href="{{ URL::asset('assets/css/app-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    @else
    <link href="{{ URL::asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    @endif
@endif
