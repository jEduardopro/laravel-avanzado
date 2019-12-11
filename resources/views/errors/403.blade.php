@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h2>No tienes permisos para realizar esta accion :(
            <br><a class="btn btn-sm btn-primary" href="{{ route('posts') }}">volver</a>
        </h2>
    </div>
@endsection
