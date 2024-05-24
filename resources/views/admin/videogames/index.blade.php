<style>
    /* Media query para dispositivos con un ancho máximo de 767px */
    @media (max-width: 767px) {
        table {
            width: 100% !important; /* Hace que la tabla ocupe el 100% del ancho */
        }
        td{
            font-size: 10px;
        }

    }

</style>
@extends('layouts.admin')
@section('content')
    <div class=" p-4 mt-5 ">
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
                <h2 class=" text-center" style="color: #000; margin-bottom: -2rem">LISTA DE VIDEOJUEGOS</h2>
                <div class="d-flex align-items-center justify-content-lg-between mt-5">
                    <form action="{{ route('admin.video_games.index') }}" method="GET" class="d-flex">
                        <label class="">
                            <input type="text" name="search" placeholder="Buscar por nombre..." class="form-control">
                        </label>
                        <button type="submit" class="btn btn-primary  ">Buscar</button>
                        @if(isset($search))
                            <a href="{{ route('admin.video_games.index') }}" class="btn btn-info  ">Mostrar Todos</a>
                        @endif
                    </form>
                    <a href="{{ route('admin.video_games.create') }}" class="btn btn-success mb-4">Añadir videojuego</a>

                </div>
                @if(request('search') && $videoGames->isEmpty())
                    <p class="mt-3" style="color: black !important;">No se encontraron coincidencias.</p>
                @endif
                <table class="table table-bordered mx-auto">
                    <thead>
                    <tr>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Lanzamiento</th>
                        <th class="text-center">Portada</th>
                        <th class="text-center">Carátula</th>
                        <th class="text-center">Géneros</th>
                        <th class="text-center">Plataformas</th>
                        <th class="text-center">Calificación</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($videoGames as $videoGame)
                        <tr>
                            <td class="text-center">{{ $videoGame->name }}</td>
                            <td class="text-center">{{ $videoGame->description }}</td>
                            <td class="text-center"> {{ \Carbon\Carbon::parse($videoGame->release)->format('d/m/Y') }}</td>


                            <td class="text-center">
                                <img src="{{ Storage::url($videoGame->cover) }}" alt="Portada" style="max-width: 100px;">
                            </td>
                            <td class="text-center">
                                <img src="{{ Storage::url($videoGame->box_art) }}" alt="Carátula" style="max-width: 100px;">
                            </td>

                            <td class="text-center">
                                @if ($videoGame->genres)
                                    @foreach (json_decode($videoGame->genres) as $genre)
                                        {{ $genre }}
                                        @if (!$loop->last)
                                            , <!-- Agrega una coma si no es el último género -->
                                        @endif
                                    @endforeach
                                @else
                                    No hay géneros asociados a este videojuego.
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($videoGame->platform)
                                    <!-- Utilizamos flexbox para centrar los logos -->
                                    @if (in_array('steam', json_decode($videoGame->platform)))
                                        <img style="width: 50px" src="{{ asset('images/steam_logo.png') }}" alt="Steam Logo" class="logo">
                                    @endif

                                    @if (in_array('nintendo_switch', json_decode($videoGame->platform)))
                                        <img style="width: 50px"  src="{{ asset('images/nintendo_switch_logo.png') }}" alt="Nintendo Switch Logo" class="logo">
                                    @endif

                                    @if (in_array('playstation_5', json_decode($videoGame->platform)))
                                        <img style="width: 50px" src="{{ asset('images/playstation_5_logo.png') }}" alt="PlayStation 5 Logo" class="logo">
                                    @endif

                                    @if (in_array('xbox_series', json_decode($videoGame->platform)))
                                        <img  style="width: 50px" src="{{ asset('images/xbox_series_logo.png') }}" alt="Xbox Series Logo" class="logo">
                                    @endif
                                @else
                                    <p>No hay plataformas asociadas a este videojuego.</p>
                                @endif
                            </td>
                            <td class="text-center">
                                @php
                                    $rating = isset($videoGame->rating) ? $videoGame->rating : null;
                                    // Verificar si el rating está definido y no es nulo
                                    if ($rating !== null) {
                                        // Verificar si el rating es un número entero
                                        if ($rating == intval($rating)) {
                                            // Si es un número entero, formatearlo sin decimales
                                            $formattedRating = number_format($rating, 0);
                                        } else {
                                            // Si no es un número entero, formatearlo con un decimal
                                            $formattedRating = number_format($rating, 1);
                                        }
                                    } else {
                                        // Si el rating está indefinido o es nulo, mostrar 'Aún no hay nota asociada'
                                        $formattedRating = 'Aún no hay nota asociada';
                                    }
                                @endphp
                                {{ $formattedRating }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('video_games.show', ['id' => $videoGame->id]) }}" class="btn btn-info mb-3" data-toggle="tooltip" data-placement="top" title="Ver Videojuego">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a title="Editar videojuego" href="{{ route('admin.video_games.edit', ['id' => $videoGame->id]) }}" class="btn btn-warning mb-3">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form title="Eliminar videojuego" action="{{ route('deleteVideoGame', ['id' => $videoGame->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button style="width: 43px" type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este videojuego?')">
                                        <i class="fas fa-trash"  style="color: black;"></i>
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
    <div class="text-center" >
    </div>
@endsection
