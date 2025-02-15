@extends('main')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('post.index') }}" class="btn btn-outline-secondary"><i class="bi bi-chevron-double-left"></i></a>

        <div class="d-flex">
            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-outline-warning me-2"><i class="bi bi-pencil"></i></a>

            <form class="mb-0" action="{{ route('post.destroy', $post->id) }}" method="post">
                @csrf
                @method('delete')
                
                <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
            </form>
        </div>
    </div>

    <hr>

    <h2>{{ $post->title }}</h2>

    <p>{{ $post->content }}</p>

    <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid rounded mt-3 w-100">

@endsection
