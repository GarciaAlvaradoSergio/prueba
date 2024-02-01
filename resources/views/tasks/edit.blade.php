@extends('layouts.app')

@section('content')
    @component('components.card')
        @slot('titulo', 'Crear nueva tarea')
        @slot('subtitulo', 'Completa todos los campos.')
        @slot('contenido')
            <form action="{{ route('tasks.update', $task->id) }}" method="post">
                @method('put')
                @csrf
                <label class="form-label" for="titulo">Título:</label>
                <input class="form-control" type="text" id="titulo" name="titulo" value="{{ $task->titulo }}">
                <label class="form-label" for="descripcion">Descripción:</label><br>
                <textarea class="form-control" id="descripcion" name="descripcion">{{ $task->descripcion }}</textarea><br>
                <label class="form-label" for="status">Estado:</label><br>
                <select class="form-select" name="status" id="status">
                    <option value="Pendiente" {{ $task->status == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="Proceso" {{ $task->status == 'Proceso' ? 'selected' : '' }}>Proceso</option>
                    <option value="Finalizado" {{ $task->status == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                </select><br>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-success" type="submit">Guardar Tarea</button>
                </div>
                <a href="{{ url('/') }}">Regresar</a>
            </form>
        @endslot
        @slot('boton')
            @slot('fecha')
            @endcomponent
        @endsection
