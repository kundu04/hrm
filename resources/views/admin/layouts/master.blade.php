<!DOCTYPE html>
<html>
    

    <head>
       @include('admin/layouts/_head')
    </head>
    <body>
        <div class="main-wrapper">
           {{-- header--}}
           @include('admin/layouts/_header')
           {{-- sidebar --}}
           @include('admin/layouts/_sideBar')
        <div class="page-wrapper">
           @yield('content')
        </div>
        </div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        {{--script--}}
        @include('admin/layouts/_script')
		{{--bottom script--}}
        @yield('scripts')
    </body>

<!-- Mirrored from dreamguys.co.in/smarthr/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Sep 2018 08:40:28 GMT -->
</html>