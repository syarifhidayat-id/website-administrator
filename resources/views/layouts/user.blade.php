
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<title>@yield('title') &raquo; Website Administrator</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	{{-- <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}"/> --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/vendor/bower_components/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/vendor/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/vendor/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/css/preload.min.css') }}">
	<style>
        .disabledbutton {
            pointer-events: none;
            opacity: 0.4;
        }
    </style>
</head>
<body class="content">
	@include('layouts.preload')

	@yield('content')

	<script src="{{ asset('styles/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('styles/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('styles/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/../assets/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="{{ asset('styles/vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset('styles/vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		// $('.js-tilt').tilt({
		// 	scale: 1.1
		// })
	</script>
	<script src="{{ asset('styles/vendor/preloader.js') }}"></script>
	<script type="text/javascript">
		$("#overlay").addClass("disabledbutton");
		$('#overlay').find('input').each(function () {
			$(this).attr('disabled', 'disabled');
		});
	</script>


</body>
</html>
