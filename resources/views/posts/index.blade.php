@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
            {{-- @can('view', $post) --}}
                <div class="card my-3">
                    <div class="card-header">{{ $post->title }}</div>
                    <div class="card-body">
                        {{ $post->content }} <br>
                        <a class="btn btn-sm btn-outline-info" href="{{ route('posts.show', ['post' => $post]) }}">{{ __('Leer más') }}</a>
                    </div>
                </div>
            {{-- @endcan --}}
        @endforeach
        @if($paginate)
            {{ $posts->links() }}
        @endif
    </div>
@endsection


