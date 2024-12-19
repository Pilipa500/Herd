<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Busca a tus compis</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-info bg-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">AAA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="\inscripcion1">Inscripción</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Busca a tus compis</a>
                        </li>
                    </ul>
        </nav>
    </header>
    <main>
        <div class="container-fluid text-center">
            <h1>Ahora inscríbete:</h1>
            <p>En esta web nos dirás tus datos, para que posteriormente te añadamos
                a la base de datos y consigas localizar a tus amigos.</p>
        </div>
        <!-- Formulario de inscripción para insertar en la bbdd -->
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-xl-5 col-md-8">
                    <form class="bg-white rounded shadow-5-strong p-5" method="get" action="edicion">
                        <fieldset class="form">
                            <legend>Datos personales:</legend>
                            <!-- Nombre input -->
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <label class="form-name" for="formInscripcion1">Nombre:</label>
                                <input type="text" id="formInscripcion1" value="<?php echo $nombre; ?>"
                                    class="form-control" required />

                            </div>

                            <!-- Apellidos input -->
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <label class="form-label" for="formInscripcion1">Apellidos:</label>
                                <input type="text" id="formInscripcion" value="<?php echo $apellidos; ?>"
                                    class="form-control" required />

                            </div>

                            <!-- email imput -->
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <label class="form-label" for="formInscripcion1">email:</label>
                                <input type="email" id="formInscripcion" value="<?php echo $email; ?>"
                                    class="form-control" required />

                            </div>
                            <!-- añadir provincia andaluza donde cursó los estudios -->
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <label class="form-label" for="formInscripcion1">Selecciona la provincia donde cursaste:
                                </label>
                                <select class="form-label" name=“provincias” value="<?php echo $provincia; ?>">
                                    <option value=“and”>Andalucia</option>
                                    <option value=“alm” selecte=“selected”>Almeria</option>
                                    <option value="ca">Cádiz</option>
                                    <option value="co">Córdoba</option>
                                    <option value="gra">Granada</option>
                                    <option value="hu">Huelva</option>
                                    <option value="ja">Jaén</option>
                                    <option value="ma">Málaga</option>
                                    <option value="se">Sevilla</option>
                                </select>


                            </div>

                            <!-- centro en el que curso sus estudios -->
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <label class="form-label" for="formInscripcion1">Nombre del CEIP o IES o Universidad en
                                    el que cursaste: </label>
                                <input type="text" id="formInscripcion" value="<?php echo $centro; ?>"
                                    class="form-control" required />

                            </div>

                            <!-- elige el curso escolar en el que terminastes tus estudios -->

                            <div class="form-outline mb-4" data-mdb-input-init>
                                <label class="form-label" for="formInscripcion1">Elije una fecha en la que terminaste
                                    los estudios en los que buscas a tus compañeros: </label>
                                <input type="number" id="formInscripcion" value="<?php echo $fecha_terminacion; ?>"
                                    class="form-control" required />

                            </div>
                </div>



                <!-- Submit button -->
                <div class="form-outline mb-4" data-mdb-input-init>
                    <button type="submit" class="btn btn-primary btn-block" data-mdb-ripple-init>Inscríbete</button>
                </div>
                </fieldset>
                </form>
            </div>
        </div>

        <!-- aqui pongo las cards -->




    </main>
    <footer>
        <!-- place footer here -->


    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>
</body>

</html>
