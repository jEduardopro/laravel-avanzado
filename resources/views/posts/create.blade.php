@extends('layouts.app')
@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf()
        <div class="row d-flex justify-content-center">
            <div class="col-sm-7">
                <div class="form-group">
                    <label for="">Titulo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Titulo del Post">
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Contenido</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Titulo del Post"></textarea>
                    @error('content')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-7 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary">Enviar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
