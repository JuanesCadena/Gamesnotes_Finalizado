@extends('layouts.public')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Videojuego</title>
        <style>
            body {
                text-align: center;
                min-height: 100vh;
                background: url({{ asset('images/color3.jpg') }});
                background-size: cover;
                background-repeat: no-repeat;
            }

            .form-container {
                max-width: 80%;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-label {
                font-weight: bold;
                font-size: 14px; /* Tamaño de fuente reducido */
            }

            .form-control {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }

            .checkbox-group {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }

            .checkbox-label {
                margin-right: 10px;
                font-size: 14px; /* Tamaño de fuente reducido */
            }

            .btn-primary {
                background-color: #007bff;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .btn-primary:hover {
                background-color: #0056b3;
            }
        </style>
    </head>

    <body>

    <div class="form-container" style="margin-top: 5rem">
        <h1>Crear Videojuego</h1>

        <form method="POST" action="{{ route('admin.video_games.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Nombre del juego -->
            <div class="form-group">
                <label for="name" class="form-label">Nombre del juego</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <!-- Descripción -->
            <div class="form-group">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="7" required></textarea>
            </div>

            <!-- fecha de lanzamiento -->
            <div class="form-group">
                <label for="release" class="form-label">Fecha de lanzamiento</label>
                <input type="date" class="form-control" id="release" name="release" required>
            </div>
            <!-- Portada -->
            <div class="form-group">
                <label for="cover" class="form-label">Portada</label>
                <input type="file" class="form-control" id="cover" name="cover" required>
            </div>

            <!-- Box Art -->
            <div class="form-group">
                <label for="box_art" class="form-label">Carátula</label>
                <input type="file" class="form-control" id="box_art" name="box_art" required>
            </div>

            <!-- Plataformas -->
            <div class="form-group text-center">
                <label class="form-label form-check-inline">Plataformas:</label><br>
                <div class="checkbox-group" style="display: inline-block; text-align: left;">
                    <div style="display: inline-block; margin-right: 10px;">
                        <input type="checkbox" id="steam" name="platforms[]" value="steam" class="form-check-input">
                        <label for="steam" class="checkbox-label">Steam</label>
                    </div>
                    <div style="display: inline-block; margin-right: 10px;">
                        <input type="checkbox" id="nintendo_switch" name="platforms[]" value="nintendo_switch" class="form-check-input">
                        <label for="nintendo_switch" class="checkbox-label">Nintendo Switch</label>
                    </div>
                    <div style="display: inline-block; margin-right: 10px;">
                        <input type="checkbox" id="playstation_5" name="platforms[]" value="playstation_5" class="form-check-input">
                        <label for="playstation_5" class="checkbox-label">PlayStation 5</label>
                    </div>
                    <div style="display: inline-block;">
                        <input type="checkbox" id="xbox_series" name="platforms[]" value="xbox_series" class="form-check-input">
                        <label for="xbox_series" class="checkbox-label">Xbox Series</label>
                    </div>
                </div>
            </div>
            <div class="form-group"  style="padding-right: 2rem; padding-left: 2rem">
                <label class="form-label" style="">Géneros:</label><br>
                <div class="checkbox-group form-check-inline text-center" style="font-size: 14px">
                    <input type="checkbox" id="rpg" name="genres[]" value="RPG" class="form-check-input">
                    <label for="rpg" class="form-check-label">RPG</label>
                    <input type="checkbox" id="jrpg" name="genres[]" value="JRPG" class="form-check-input">
                    <label for="jrpg" class="form-check-label">JRPG</label>
                    <input type="checkbox" id="accion" name="genres[]" value="Acción" class="form-check-input">
                    <label for="accion" class="form-check-label">Acción</label>
                    <input type="checkbox" id="aventura" name="genres[]" value="Aventura" class="form-check-input">
                    <label for="aventura" class="form-check-label">Aventura</label>
                    <input type="checkbox" id="hack&slash" name="genres[]" value="Hack & Slash" class="form-check-input">
                    <label for="hack&slash" class="form-check-label">Hack & Slash</label>
                    <input type="checkbox" id="estrategia" name="genres[]" value="Estrategia" class="form-check-input">
                    <label for="estrategia" class="form-check-label">Estrategia</label>
                    <input type="checkbox" id="tactico" name="genres[]" value="Tactico" class="form-check-input">
                    <label for="tactico" class="form-check-label">Tactico</label>
                    <input type="checkbox" id="online" name="genres[]" value="Online" class="form-check-input">
                    <label for="online" class="form-check-label">Online</label>
                    <input type="checkbox" id="beat'em'up" name="genres[]" value="Beat'Em Up" class="form-check-input">
                    <label for="beat'em'up" class="form-check-label">Beat 'Em Up</label>
                    <input type="checkbox" id="beat'em'up" name="genres[]" value="Aventura Grafica" class="form-check-input">
                    <label for="rpg" class="form-check-label">Aventura Grafica</label>
                    <input type="checkbox" id="moba" name="genres[]" value="MOBA" class="form-check-input">
                    <label for="moba" class="form-check-label">MOBA</label>
                    <input type="checkbox" id="simulacion" name="genres[]" value="Simulación" class="form-check-input">
                    <label for="simulacion" class="form-check-label">Simulación</label>
                    <input type="checkbox" id="puzzle" name="genres[]" value="Puzzle" class="form-check-input">
                    <label for="puzzle" class="form-check-label">Puzzle</label>
                    <input type="checkbox" id="idle" name="genres[]" value="Idle" class="form-check-input">
                    <label for="idle" class="form-check-label">Idle</label>
                    <input type="checkbox" id="deporte" name="genres[]" value="Deporte" class="form-check-input">
                    <label for="deporte" class="form-check-label">Deporte</label>
                    <input type="checkbox" id="carreras" name="genres[]" value="Carreras" class="form-check-input">
                    <label for="carreras" class="form-check-label">Carreras</label>
                    <input type="checkbox" id="lucha" name="genres[]" value="Lucha" class="form-check-input">
                    <label for="lucha" class="form-check-label">Lucha</label>
                    <input type="checkbox" id="terror" name="genres[]" value="Terror" class="form-check-input">
                    <label for="terror" class="form-check-label">Terror</label>
                    <input type="checkbox" id="shooter" name="genres[]" value="Shooter" class="form-check-input">
                    <label for="shooter" class="form-check-label">Shooter</label>
                    <input type="checkbox" id="sandbox" name="genres[]" value="Sandbox" class="form-check-input">
                    <label for="sandbox" class="form-check-label">Sandbox</label>
                    <input type="checkbox" id="plataformas" name="genres[]" value="Plataformas" class="form-check-input">
                    <label for="plataformas" class="form-check-label">Plataformas</label>
                    <input type="checkbox" id="mmo" name="genres[]" value="MMO" class="form-check-input">
                    <label for="mmo" class="form-check-label">MMO</label>
                    <input type="checkbox" id="novela_visual" name="genres[]" value="Novela Visual" class="form-check-input">
                    <label for="novela_visual" class="form-check-label">Novela Visual</label>
                    <input type="checkbox" id="roguelike" name="genres[]" value="Roguelike" class="form-check-input">
                    <label for="roguelike" class="form-check-label">Roguelike</label>
                    <input type="checkbox" id="metroidvania" name="genres[]" value="Metroidvania" class="form-check-input">
                    <label for="metroidvania" class="form-check-label">Metroidvania</label>
                    <input type="checkbox" id="soulslike" name="genres[]" value="Soulslike" class="form-check-input">
                    <label for="soulslike" class="form-check-label">Soulslike</label>
                    <input type="checkbox" id="mundoabierto" name="genres[]" value="Mundo Abierto" class="form-check-input">
                    <label for="mundoabierto" class="form-check-label">Mundo Abierto</label>
                </div>
            </div>

            <!-- Botón de enviar -->
            <button type="submit"  id="submitButton" class="btn btn-primary">Agregar Videojuego</button>
        </form>
    </div>
    <script>
        // JavaScript para verificar si al menos un checkbox está seleccionado antes de enviar el formulario
        document.getElementById('submitButton').addEventListener('click', function(event) {
            // Obtener todos los checkboxes de plataformas
            var platformCheckboxes = document.querySelectorAll('input[name="platforms[]"]');
            var platformChecked = false;
            platformCheckboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    platformChecked = true;
                }
            });

            // Obtener todos los checkboxes de géneros
            var genreCheckboxes = document.querySelectorAll('input[name="genres[]"]');
            var genreChecked = false;
            genreCheckboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    genreChecked = true;
                }
            });

            // Validar si al menos una plataforma y un género están seleccionados
            if (!platformChecked || !genreChecked) {
                if (!platformChecked) {
                    alert('Debe seleccionar al menos una plataforma.');
                }
                if (!genreChecked) {
                    alert('Debe seleccionar al menos un género.');
                }
                event.preventDefault(); // Evitar la acción por defecto del botón de enviar
            }

            // Validar nombre del juego
            var name = document.getElementById('name').value;
            if (name.trim() === '') {
                alert('El nombre del juego es obligatorio.');
                event.preventDefault();
            }

            // Validar descripción
            var description = document.getElementById('description').value;
            if (description.trim() === '') {
                alert('La descripción es obligatoria.');
                event.preventDefault();
            }

            // Validar fecha de lanzamiento
            var release = document.getElementById('release').value;
            if (release.trim() === '') {
                alert('La fecha de lanzamiento es obligatoria.');
                event.preventDefault();
            }
        });
    </script>

    </body>
@endsection
