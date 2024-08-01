@extends('tasks.layouts')

@section('content')
    <div class="container py-3">
        <h1 class="mb-4">Crear Tarea</h1>
        <hr>
        <form action="/tasks" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" name="description" id="description" rows="4"></textarea>
            </div>
            <div>
                <section>
                    <label for="priority" class="form-label">Prioridad</label>
                    <select class="form-select" name="priority" id="priority">
                        @foreach ($priorities as $priority)
                            <option value="{{ $priority->id }}"
                                    style="color: black; background-color:
                                    @if ($priority->id == 1) red
                                    @elseif ($priority->id == 2) yellow
                                    @elseif ($priority->id == 3) green
                                    @endif;">
                                {{ $priority->name }}
                            </option>
                        @endforeach
                    </select>
                </section>
            </div>
            <div>
                <label for="status" class="form-label">Usuarios</label>
                <select class="form-select" name="user" id="user">
                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                </select>
            </div>            
            <div class="mb-4">
                <label for="labels" class="form-label">Etiquetas</label>
                <div class="list-group">
                    @foreach ($labels as $label)
                        <div class="list-group-item">
                            <input type="checkbox" name="labels[]" value="{{ $label->id }}"
                                id="label-{{ $label->id }}">
                            <label for="label-{{ $label->id }}">{{ $label->name }}</label>
                        </div>
                        @if (!$loop->last)
                            <div class="border-bottom"></div>
                        @endif
                    @endforeach
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Crear Tarea</button>
        </form>
    </div>
@endsection
