@extends('layouts.admin')
@section('content')
    <div class="p-4 mt-5">
        <div class="bg-white p-4 rounded">
            <div class="table-responsive">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h2 class="text-center" style="color: #000; margin-bottom: -2rem">LISTA DE SUGERENCIAS</h2>
                <div class="d-flex align-items-center justify-content-lg-between mt-5 mb-3">
                    <form action="{{ route('admin.suggestions.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre..." value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                                @if(request('search'))
                                    <a href="{{ route('admin.suggestions.index') }}" class="btn btn-info">Mostrar Todas</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>

                @if(request('search') && $suggestions->isEmpty())
                    <p class="mt-3" style="color: black !important;">No se encontraron coincidencias.</p>
                @endif
                <table class="table table-bordered mx-auto">
                    <thead>
                    <tr>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($suggestions as $suggestion)
                        <tr>
                            <td class="text-center">{{ $suggestion->name }}</td>
                            <td class="text-center">

                                <form action="{{ route('deleteSuggestion', ['id' => $suggestion->id]) }}" method="POST" style="display: inline;" title="Eliminar sugerencia" data-toggle="tooltip" data-placement="top">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta sugerencia?');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="text-center">

    </div>
@endsection
