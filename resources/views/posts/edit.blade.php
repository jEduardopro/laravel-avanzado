@extends('layouts.app')
@section('content')
    @if (Session::has('message'))
        <div class="container alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif
    <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST">
        @csrf()
        @method('PUT')
        <div class="row d-flex justify-content-center">
            <div class="col-sm-7">
                <div class="form-group">
                    <label for="">Titulo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Titulo del Post" value="{{ $post->title }}">
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Contenido</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Titulo del Post">{{ $post->content }}</textarea>
                    @error('content')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-7 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
