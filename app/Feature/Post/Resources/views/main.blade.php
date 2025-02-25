<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>BooyahApp</title>

		@vite('resources/js/app.js')
	</head>
 
	<body>
		<div class="container pt-5 pb-5">
			@if(session('success'))
				<div class="alert alert-success">{{ session('success') }}</div>
			@endif

			@if(session('error'))
				<div class="alert alert-danger">{{ session('error') }}</div>
			@endif

			@yield('content')

		</div>
	</body>

</html>