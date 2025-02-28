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

				<div class="alert alert-success d-flex align-items-center justify-content-center gap-3">
					<span>{!! session('success') !!}</span>

					@if(session('deleted_post_id'))

						<form action="{{ route('post.restore', session('deleted_post_id')) }}" method="POST" class="mb-0">
							@csrf

							<button type="submit" class="btn btn-danger btn-sm"> <i class="bi bi-x-lg"></i></button>
						</form>

					@endif
				</div>

			@endif

			@if(session('error'))
			
				<div class="alert alert-danger">{{ session('error') }}</div>

			@endif

			@yield('content')

		</div>
	</body>

</html>