<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <title>{!! Settings::sistema()['title'] !!}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @if(isset($isDark) && $isDark)
        @include('layouts.shared.head', ['isDark' => true])
    @elseif(isset($isRTL) && $isRTL)
        @include('layouts.shared.head', ['isRTL' => true])
    @else
        @include('layouts.shared.head')
    @endif

</head>

@if(isset($isScrollable) && $isScrollable)
    <body class="scrollable-layout">
@elseif(isset($isBoxed) && $isBoxed)
    <body class="left-side-menu-condensed boxed-layout" data-left-keep-condensed="true">
@elseif(isset($isDarkSidebar) && $isDarkSidebar)
    <body class="left-side-menu-dark">
@elseif(isset($isCondensedSidebar) && $isCondensedSidebar)
    <body class="left-side-menu-condensed" data-left-keep-condensed="true">
@else
    <body>
@endif

@if(isset($withLoader) && $withLoader)
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
        </div>
    </div>
</div>
@endif
    <div id="wrapper">
        @include('layouts.shared.header')
        @include('layouts.shared.sidebar')
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    @yield('breadcrumb')
                    @yield('content')
                </div>
            </div>
            @include('layouts.shared.footer')
        </div>
    </div>
    @include('layouts.shared.footer-script')

</body>
</html>