@extends('main')

@section('content')

    <div class="d-flex mb-3 gap-4 justify-content-between">     
        <h1 class="align-self-center mb-0">Booyah!</h1>

        <a href="{{ route('post.create') }}" class="btn btn-outline-success shadow-sm align-self-center"><i class="bi bi-arrow-90deg-down"></i></a>
    </div>

    <hr>

    @if ($posts->isEmpty())

        <div class="alert alert-danger">
            <p class="m-0">Posts not found</p>
        </div>

    @endif

    @foreach ($posts as $post)

        <div class="card mb-5 shadow">
            <div class="row g-0">
                
                <div class="col-md-3 d-flex align-items-start justify-content-center image-container p-3">
                    <img src="{{ $post->image }}" class="img-fluid rounded shadow hover-effect" alt="{{ $post->title }}">
                </div>
                
                <div class="col-md-9 card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>

                    <p class="card-text">{{ $post->description }}</p>
                    <hr>

                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-outline-primary d-flex align-items-center justify-content-center">
                            <i class="bi bi-eye"></i>
                        </a>     

                        <form class="mb-0" action="{{ route('post.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-outline-danger align-self-center"><i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    @endforeach

@endsection
