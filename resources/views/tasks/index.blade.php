@extends('layouts.app')

@section('content')
    @component('components.card')
        @slot('titulo', 'Lista de tareas')
        @slot('subtitulo', 'Toda tarea se puede editar y eliminar.')
        @slot('contenido')
            <div class="d-flex mb-3">
                <a class="btn btn-dark" href="{{ route('tasks.create') }}">{{ __('Crear tarea') }}</a>
            </div>
            <form action="/tasks/delete" method="post">
                @csrf
                @method('delete')
                @forelse ($tasks as $task)
                    <ul class="list-group mb-2">
                        <li class="list-group-item d-flex justify-content-between align-items-star">
                            <input class="form-check-input" type="checkbox" name="tasksToDelete[]" value="{{ $task->id }}">

                            <label class="form-check-label" for="firstCheckbox">{{ $task->titulo }}</label>
                            <div class="btn-group btn-group-sm d-grid gap-2 d-md-flex justify-content-md-end" role="group"
                                aria-label="Small button group">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#taskModal{{ $task->id }}">
                                    Ver
                                </button>

                                <a href="{{ route('tasks.edit', $task->id) }}" type="button"
                                    class="btn btn-outline-primary btn-sm">Editar</a>
                                <button type="button"
                                    class="btn
                            @if ($task->status === 'Pendiente') btn-info
                            @elseif ($task->status === 'Proceso') btn-warning
                            @else btn-success @endif btn-sm rounded-pill"
                                    disabled> <strong>{{ $task->status }} </strong></button>
                            </div>
                        </li>
                    </ul>
                    <div class="modal fade" id="taskModal{{ $task->id }}" tabindex="-1"
                        aria-labelledby="taskModal{{ $task->id }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-titulo" id="taskModal{{ $task->id }}Label">Detalles de la Tarea:
                                        {{ $task->titulo }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Título:</strong> {{ $task->titulo }}</p>
                                    <p><strong>Descripción:</strong> {{ $task->descripcion }}</p>
                                    <p><strong>Estado:</strong> {{ $task->status }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No hay datos a mostrar</p>
                @endforelse

                <div class="d-grid gap-1 col-6 mx-auto">
                    <button class="btn btn-danger" type="submit">Eliminar Tareas Seleccionadas</button>
                </div>
            </form>
        @endslot
    @endcomponent
@endsection
