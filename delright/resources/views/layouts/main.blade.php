<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
	<title>@yield('title','') | Delright - Laravel Admin Starter</title>
	<!-- initiate head with meta tags, css and script -->
	@include('include.head')

</head>
@if ( Auth::user()->role == 3 )
<body id="app" >
    <div class="wrapper">
    	<!-- initiate header-->
    	@include('include.header')
    	<div class="page-wrap">
	    	<!-- initiate sidebar-->
	    	@include('include.sidebar')

	    	<div class="main-content">
	    		<!-- yeild contents here -->
	    		@yield('content')
	    	</div>

	    	<!-- initiate chat section-->
	    	@include('include.chat')


	    	<!-- initiate footer section-->
	    	@include('include.footer')

    	</div>
    </div>
    
	<!-- initiate modal menu section-->
	@include('include.modalmenu')

	<!-- initiate scripts-->
	@include('include.script')	
</body>
@else
<body id="app" >
	  <div class="wrapper">
		@include('include.header')
			@include('include.header')
    	<div class="page-wrap">

<div class="main-content">
	<h1>Sorry You are now allowed to access this Admin panel</h1>
	</div></div>
</body>
@endif
</html>