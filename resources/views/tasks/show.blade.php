@extends('tasks.layouts')

@section('content')
    <div class="container py-5">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="card-title">Tarea #: {{ $task->id }}</h1>
                <hr>
                <h2 class="card-subtitle mb-4">Tarea: {{ $task->name }}</h2>
                <hr>
                <h2 class="card-subtitle mb-4">Descripción:</h2>
                <p class="card-text">{{ $task->description }}</p>
                <hr>
                <h2 class="card-subtitle mb-4">Prioridad:</h2>
                <span class="badge"
                    style="
                    background-color:
                    @if ($task->priority->id == 1) red
                    @elseif ($task->priority->id == 2) yellow
                    @elseif ($task->priority->id == 3) green
                    @endif;
                    color: black;">
                    {{ $task->priority->name }}
                </span>
                <hr>
                <h2 class="card-subtitle mb-4">Usuario:</h2>
                <p class="card-text">{{ $task->user->name }}</p>
                <hr>
                <h2 class="card-subtitle mb-4">Etiquetas:</h2>
                <ul class="list-group">
                    @foreach ($task->labels as $label)
                        <li class="list-group-item">{{ $label->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="d-flex">
            <a href="/tasks/{{ $task->id }}/edit" class="btn btn-warning me-2">
                <i class="fas fa-edit"></i> Editar
            </a>
            <form action="/tasks/{{ $task->id }}/delete" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> Eliminar
                </button>
            </form>
        </div>
    </div>
@endsection
