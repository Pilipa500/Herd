<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Buscar Antiguos Alumnos</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero {
            position: relative;
            background: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDJ8fHNjaG9vbHxlbnwwfHx8fDE2ODI1NjY0NzA&ixlib=rb-1.2.1&q=80&w=1080') no-repeat center center;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Overlay oscuro */
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            width: 100%;
        }
        .images {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }
        .images img {
            max-width: 80%;
            border-radius: 10px;
        }
        .form-container {
            flex: 1;
            max-width: 40%; /* Limitar el ancho del formulario */
            background: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 10px;
        }
        .hero h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .hero p {
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="container hero-content">
            <!-- Imágenes del lado izquierdo -->
            <div class="images">
                <img src="https://images.unsplash.com/photo-1597029743623-6b1c8d165c4e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDN8fGZyaWVuZHN8ZW58MHx8fHwxNjgyNTY2NTUw&ixlib=rb-1.2.1&q=80&w=800" alt="Jóvenes hablando">
                <img src="https://images.unsplash.com/photo-1542036082-857f51458638?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDl8fGZyaWVuZHN8ZW58MHx8fHwxNjgyNTY2NTUw&ixlib=rb-1.2.1&q=80&w=800" alt="Jóvenes charlando">
            </div>
            <!-- Formulario central -->
            <div class="form-container">
                <h1>Encuentra a tus antiguos compañeros</h1>
                <p>Conéctate con antiguos alumnos de tu colegio o instituto</p>
                <form action="buscar.php" method="GET">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe aquí el nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="colegio" class="form-label">Colegio:</label>
                        <input type="text" class="form-control" id="colegio" name="colegio" placeholder="Nombre del colegio" required>
                    </div>
                    <div class="mb-3">
                        <label for="anio_graduacion" class="form-label">Año de Graduación:</label>
                        <input type="number" class="form-control" id="anio_graduacion" name="anio_graduacion" placeholder="Año de graduación" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Buscar</button>
                </form>
            </div>
            <!-- Imágenes del lado derecho -->
            <div class="images">
                <img src="https://images.unsplash.com/photo-1502808997823-cf1a7ef74f2e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDd8fGtpZHN8ZW58MHx8fHwxNjgyNTY2NTUw&ixlib=rb-1.2.1&q=80&w=800" alt="Niños pequeños jugando">
                <img src="https://images.unsplash.com/photo-1558036125-1e8174fc81e2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDN8fGtpZHN8ZW58MHx8fHwxNjgyNTY2NTUw&ixlib=rb-1.2.1&q=80&w=800" alt="Niños divirtiéndose">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+6p6m5Y"
