<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: auto;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        input,
        button {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <h1>Formulario de Registro</h1> <!-- Mensajes de éxito -->
    @if (session('mensaje'))
        <div style="color: green;"> {{ session('mensaje') }} </div>
        @endif <!-- Mensajes de error -->
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif <!-- Formulario -->
        <form action="/prueba" method="POST"> @csrf <label for="nombre">Nombre:</label> <input type="text"
                id="nombre" name="nombre" required> <label for="email">Email:</label> <input type="email"
                id="email" name="email" required> <button type="submit">Registrar</button> </form>
</body>

</html>
