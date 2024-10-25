@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- Mostrar mensaje de éxito -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="my-4 text-center" style="color: #333">Gestionar Meditaciones</h1>

        <!-- Botón para redirigir a la vista de añadir nueva meditación -->
        <div class="text-center mb-5">
            <button>
                <a href="{{ route('admin.meditations.create') }}">Añadir Nuevo Tema de
                    Meditación</a>
            </button>
        </div>

        <!-- Lista de meditaciones existentes -->
        <div class="bg-white p-4 shadow-sm rounded my-5" style="background-color: rgba(255, 255, 255, 0.9);">
            <h2 class="my-4 text-center">Meditaciones Existentes</h2>
            <ul class="list-group">
                @foreach ($themes as $theme)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $theme->name }}</strong> <br>
                            <small>{{ $theme->description }}</small>
                        </div>
                        <div class="d-flex">
                            <form method="GET" action="{{ route('admin.meditations.edit', $theme->id) }}" class="me-2">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                            </form>
                            <form method="POST" action="{{ route('admin.meditations.destroy', $theme->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
