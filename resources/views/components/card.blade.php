@extends('layouts.app')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col col-lg-6">
            <div class="card mt-2">
                <div class="card-header text-center">
                    {{ $titulo }}
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $subtitulo }}</p>
                    {{ $contenido }}
                </div>
                <div class="card-footer text-body-secondary">
                    {{ $fecha }}
                </div>
            </div>
        </div>
    </div>
@endsection
