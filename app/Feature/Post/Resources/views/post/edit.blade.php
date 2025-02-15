@extends('main')

@section('content')

	<div class="d-flex justify-content-between mb-3">
		<a href="{{ route('post.show', $post->id) }}" class="btn btn-outline-secondary"><i class="bi bi-chevron-double-left"></i></a>
	</div>

	<hr>

	<form class="row g-3" action="{{ route('post.update', $post->id) }}" method="post">
		@csrf
		@method('patch')

		<div class="form-group col-md-6">
			<label for="title" class="form-label">Title</label>

			<input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
				id="title" placeholder="Придумайте заголовок..." value="{{ old('title') ?? $post->title }}">

			@error('title')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-group col-md-6">
			<label for="image" class="form-label">Image</label>

			<input name="image" type="text" class="form-control @error('image') is-invalid @enderror"
				id="image" placeholder="Укажите ссылку на изображение..." value="{{ old('image') ?? $post->image }}">

			@error('image')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-group col-md-6">
			<label for="description" class="form-label">Description</label>

			<input name="description" type="text" class="form-control @error('description') is-invalid @enderror"
			id="description" placeholder="Коротко..." value="{{ old('description') ?? $post->description }}">

			@error('description')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-group col-12">
			<label for="content" class="form-label">Content</label>

			<textarea name="content" class="form-control @error('content') is-invalid @enderror overflow-hidden"
				id="content" rows="3" placeholder="Пишите...">{{ old('content') ?? $post->content }}</textarea>
				
			@error('content')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="col-12">
			<button type="submit" class="btn btn-outline-success"><i class="bi bi-save"></i></button>
		</div>
	</form>

@endsection