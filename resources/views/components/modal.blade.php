<div class="modal fade" id="taskModal{{ $task->id }}" tabindex="-1" aria-labelledby="taskModal{{ $task->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-titulo" id="taskModal{{ $task->id }}Label">Detalles de la Tarea: {{ $task->titulo }}
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
