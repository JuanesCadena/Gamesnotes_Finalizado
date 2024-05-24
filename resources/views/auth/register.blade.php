
<link rel="stylesheet" href="{{asset('css/register.css')}}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/png" href="{{ asset('images/logo.ico') }}">
<link rel="shortcut icon" sizes="192x192" href="{{ asset('images/logo.ico') }}">
<title>Gamesnotes</title>
<section style="background:url({{('images/bg3.gif')}}); background-repeat: no-repeat; background-size: cover;">

    <script>
        function validatePassword() {
            var passwordInput = document.querySelector('input[name="password"]');
            var password = passwordInput.value;
            var regex = /^[a-zA-Z0-9]{6,}$/;



            if (!regex.test(password)) {
                passwordInput.setCustomValidity('La contraseña debe tener al menos 6 caracteres ');
            } else {
                passwordInput.setCustomValidity('');
            }
        }

        function validatePasswordConfirmation() {
            var passwordInput = document.querySelector('input[name="password"]');
            var confirmPasswordInput = document.querySelector('input[name="password_confirmation"]');
            var password = passwordInput.value;
            var confirmPassword = confirmPasswordInput.value;

            if (password !== confirmPassword) {
                confirmPasswordInput.setCustomValidity('Las contraseñas no coinciden.');
            } else {
                confirmPasswordInput.setCustomValidity('');
            }
        }






    </script>

    <div class="register-box">
        <a href="{{ route('home') }}" style="text-decoration: none;  margin-top:-28.5rem;">
            <button style="background: none; border: none; cursor: pointer;">
                <ion-icon name="arrow-back-outline" style="font-size: 24px;  color: white;"></ion-icon>
            </button>
        </a>
        <form method="POST" action="{{ route('register') }}" style="margin-top: 1rem">
            @csrf

            <h2 style="margin-top: -2rem">Registrarse</h2>
            <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus>
                <label>Nombre de Usuario</label>
            </div>
            <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                <input type="email" name="email" value="{{ old('email') }}" required>
                <label>Correo</label>
            </div>
            <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                <input type="password" name="password" required oninput="validatePassword()">
                <label>Contraseña</label>

            </div>
            <div class="input-box ">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                <input type="password" name="password_confirmation" required oninput="validatePasswordConfirmation()">
                <label>Confirmar Contraseña</label>
            </div>

            <button  type="submit" >Registrarse</button>




            <div class="register-link" >
                <p class="cuenta">¿Ya tienes cuenta?
                    <a style="color:yellow" href="{{ route('login') }}">Inicia sesión aquí</a>
                </p>
            </div>
        </form>
    </div>
</section>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



