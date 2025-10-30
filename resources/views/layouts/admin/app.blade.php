<!--

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
	<title>CRUD WARGA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
	<meta name="author" content="Themesberg">

	<!-- Favicon -->
	{{-- <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets-admin/img/favicon/apple-touch-icon.png')}}"> --}}
	{{-- <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets-admin/img/favicon/favicon-32x32.png')}}"> --}}
	{{-- <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets-admin/img/favicon/favicon-16x16.png')}}"> --}}
	{{-- <link rel="manifest" href="{{asset('assets-admin/img/favicon/site.webmanifest')}}">
	<link rel="mask-icon" href="{{asset('assets-admin/img/favicon/safari-pinned-tab.svg')}}" color="#ffffff">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff"> --}}

    {{-- START CSS --}}
    @include('layouts.admin.css') 
    {{-- END CSS --}}
</head>


  
         <body>
       
    <div class="position-fixed top-0 start-50 translate-middle-x mt-3 z-3" style="width: 90%; max-width: 600px;">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    {{-- START SIDEBAR --}}
       @include('layouts.admin.sidebar')
    {{-- END SIDEBAR --}}

    <main class="content">

        {{-- START HEADER --}}
            @include('layouts.admin.header')
        {{-- END HEADER --}}

      @yield('content')

        {{-- START FOOTER --}}
        @include('layouts.admin.footer')
        {{-- END FOOTER --}}
    </main>

    {{-- START JS --}}
    @include('layouts.admin.js')
    {{-- END JS --}}
</body>

</html>
