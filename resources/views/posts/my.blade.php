@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
            <div class="card my-3">
                <div class="card-header">{{ $post->title }}</div>
                <div class="card-body">
                    {{ $post->content }} <br>
                    <form class="form-inline" action="{{ route('posts.destroy',['post' => $post]) }}" method="POST">
                        <a class="btn btn-sm btn-outline-info" href="{{ route('posts.show', ['post' => $post]) }}">{{ __('Leer más') }}</a>
                        <a class="btn mx-3 text-dark btn-sm btn-outline-warning" href="{{ route('posts.edit', ['post' => $post]) }}">{{ __('Editar') }}</a>
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        @endforeach
        @if (isset($posts->links))
            {{ $posts->links() }}
        @endif
    </div>
@endsection


