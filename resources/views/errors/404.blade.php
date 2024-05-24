<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/controlador.ico" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo.ico') }}">
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('images/logo.ico') }}">
    <title>Page Not Found</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900');
    *{
        margin:0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

        body{
            background: linear-gradient(45deg, #8500ff, #5acaff);
            height: 100vh;
        }
        #container{
            position: absolute;
            width: 100%;
            height: 100%;
            display:flex ;
            justify-content: center;
            align-items: center;

            background: url({{('images/bg3.gif')}}), #151729;
            box-shadow: 0 15px 30px rgba(0,0,0,.5);
        }

        #container .content{
            max-width: 600px;
            text-align: center;
        }


        #container .content h2{
           font-size: 18vw;
           color: #fff;
            line-height: 1em;
        }

        #container .content h4{
            position: relative;
            color: #111;
            border-radius: 20px;
            background: #fff;
            font-size: 1.5em;
            margin-bottom: 20px;

            font-weight: 300;
            padding: 10px 20px;
            display: inline-block;

        }

        #container .content p{
           color: #fff;
            font-size: 1.2em;
        }
        #container .content a{
           position: relative;
            display: inline-block;
            padding: 10px 25px;
            background: #ff0562;
            color: #fff;
            text-decoration: none;
            margin-top: 25px;
            border-radius: 25px;
            border-bottom: 4px solid #d00d56;
        }

    </style>
</head>
<body>
<div  id="container">
    <div class="content">
    <h2>404</h2>
    <h4>Upss! Pagina no encontrada</h4>
        <p>Lo sentimos, la página que estás buscando no existe</p>
    <a href="{{ url('/') }}">Volver al inicio</a>
    </div>
</div>

<script>
    var container = document.getElementById('container');
    window.onmousemove = function (e){
        var x =-e.clientX/5,
            y =- e.clientY/5;
        container.style.backgroundPositionX = x+ 'px';
        container.style.backgroundPositionY = y + 'px';

    }
</script>
</body>
</html>
