@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card my-3">
            <div class="card-header d-flex justify-content-end">
                {{-- <p>Vistas {{ $counter }}</p> --}}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }} </h5>
                <p class="card-text">{{ $post->content }}</p>
            </div>
        </div>
    </div>
@endsection
