<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Encuentra a tus compañeros de estudios y conecta con ellos a través de esta plataforma moderna y sencilla.">
    <title>Conecta con tus Compañeros</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDJ8fHNjaG9vbHxlbnwwfHx8fDE2ODI1NjY0NzA&ixlib=rb-1.2.1&q=80&w=1080');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .container {
            position: relative;
            z-index: 2;
            color: #fff;
            text-align: center;
        }
        .hero-text {
            margin-top: 50px;
            padding: 20px;
        }
        .btn-registro {
            margin-top: 20px;
        }
        footer {
            text-align: center;
            color: #fff;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <header class="p-3 bg-dark text-white">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4">Conecta con tus Compañeros</h1>
            <a href="/registro" class="btn btn-primary">Registrarse</a>
        </div>
    </header>
    <main class="container">
        <div class="hero-text">
            <h1>Bienvenido a la Plataforma para Reencontrarte</h1>
            <p>
                Encuentra a tus compañeros de colegio, instituto o universidad, y conecta con ellos. 
                Regístrate y accede a una base de datos diseñada para ayudarte a localizar a tus viejos amigos.
            </p>
            <a href="{{ route('registro')}}" class="btn btn-success btn-lg btn-register">Comienza Ahora</a>
        </div>
        <div class="row text-white mt-5">
            <div class="col-md-6">
                <img src="/imagenes/jovenes_400x300.jpg" alt="Jóvenes charlando" class="img-fluid rounded">
                <h3 class="mt-3">Conversa en el Foro</h3>
                <p>Deja mensajes, organiza reuniones y mantente en contacto.</p>
            </div>
            <div class="col-md-6">
                <img src="/imagenes/400x300Niños_Jugando.png" alt="Niños jugando" class="img-fluid rounded">
                <h3 class="mt-3">Recuerda los Buenos Tiempos</h3>
                <p>Comparte momentos y recuerdos con tus amigos del pasado.</p>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Conecta con tus Compañeros - Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
