<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<!-- https://stackoverflow.com/questions/44769250/incompatible-units-rem-and-px-with-bootstrap-4-alpha-6-->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu-icon.css') }}">
		<link rel="stylesheet" href="{{ asset('css/toggle-button.css') }}">
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-dialog-fix.css') }}">
    
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap4.min.css">-->
    
    <link rel="shortcut icon" href="{{ asset('img/music_note.png') }}">
		<link rel="search" type="application/opensearchdescription+xml" title="Search through LyricDB" href="https://lyricdb.tk/opensearch.xml">
		@section('title')
      <title>{{ config('app.name', 'Laravel') }}</title>
    @endsection
    @yield('title')
    <style>
  		@yield('css')
		</style>
		<script>
			window.Laravel = {!! json_encode([
				'csrfToken' => csrf_token(),
			]) !!};
		</script>
	</head>
	<body>
		@include('shared.header')
		<div class="app-body">
			<div class="sidebar-nav">
				@include('shared.navbar')
			</div>
			<div class="content">
				<ol class="breadcrumb">
					@if(!empty($breadcrumb))
						@foreach($breadcrumb as $text => $url_or_array)
              @if(is_array($url_or_array))
                <li>
                  <ol>
                    @foreach($url_or_array as $item_text => $item_url)
                      @if(empty($item_url))
                        <li>{{ $item_text }}</li>
                      @else
                        <li><a href="{{ $item_url }}">{{ $item_text }}</a></li>
                      @endif
                    @endforeach
                  </ol>
                </li>
							@elseif(empty($url_or_array))
								<li>{{ $text }}</li>
							@else
								<li><a href="{{ $url_or_array }}">{{ $text }}</a></li>
							@endif
						@endforeach
					@endif
				</ol>
				<div class="container-fluid">
					@yield('content')
          @include('shared.pager')
				</div>
			</div>
		</div>
		@include('shared.footer')
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!--<script type="text/javascript" src="/js/assets/TestApp.js"></script>-->
		<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!--<script src="//cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script>-->
    <script type="text/javascript">
        $(document).ready(function(){
            $.fn.dataTable.render.moment = function ( from, to, locale ) {
            	// Argument shifting
              debugger;
            	if ( arguments.length === 1 ) {
            		locale = 'en';
            		to = from;
            		from = 'YYYY-MM-DD';
            	}
            	else if ( arguments.length === 2 ) {
            		locale = 'en';
            	}
            
            	return function ( d, type, row ) {
            		var m = window.moment( d, from, locale, true );
            
            		// Order and type get a number value from Moment, everything else
            		// sees the rendered value
            		return m.format( type === 'sort' || type === 'type' ? 'x' : to );
            	};
            };
        });
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
    <!--<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap4.min.js"></script>-->
    <script type="text/javascript" src="https://www.youtube.com/iframe_api"></script>
    <script type="text/javascript">
    		@yield('javascript')
    </script>
	</body>
</html>