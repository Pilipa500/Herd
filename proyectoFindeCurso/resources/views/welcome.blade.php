@include('navegacion');
    <main>
        <div class="container-fluid text-center">
            <h1>Busca a tus compañeros</h1>
            <p>En esta web podrás buscar a los compañeros de tus estudios.</p>
        </div>
        <!-- carrusel de fotos -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img\imagenes\isabel.jpg" class="d-block w-30 mx-auto" alt="ceipIsabel">
                </div>
                <div class="carousel-item">
                    <img src="img\imagenes\puntadelverde.jpg" class="d-block w-30 mx-auto" alt="puntadelverde">
                </div>
                <div class="carousel-item">
                    <img src="img\imagenes\sanpedro.jpg" class="d-block w-30 mx-auto" alt="sanpedro">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <h2 class="text-center m-4">A continuacion selecciona tu colegio:</h2>
        <!-- listado organizado -->
        <div class="container-fluid text-center list-group">
            <a href="http://sanpedrocrisologo.com/" target="_blank"
                class="list-group-item list-group-item-action active" aria-current="true">
                Colegio Público San Pedro Crisólogo
            </a>
            <a href="https://blogsaverroes.juntadeandalucia.es/iescarloshaya/" target="_blank"
                class="list-group-item list-group-item-action">IES Carlos Haya</a>
            <a href="https://isabelinacat.blogspot.com/" target="_blank"
                class="list-group-item list-group-item-action">CEIP Isabel la Católica</a>
            <a href="https://blogceipinoflores.blogspot.com/" target="_blank"
                class="list-group-item list-group-item-action">CEIP Pinos Flores</a>
        </div>
        <!-- aqui pongo las cards -->

        <div class="row">
            <div class="col-6 col-md-6 mt-5">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="img\imagenes\egb.jpeg" class="card-img-top" alt="egb">
                    <div class="card-body">
                        <h5 class="card-title">Yo soy de EGB</h5>
                        <p class="card-text">Si has cursado la EGB y quieres encontrar a tus compis, prueba a
                            buscarlos en nuestra web.</p>
                        <!-- <a href="#" class="btn btn-primary">Ir al buscador</a> -->
                        <a href="{{ route('inscripcion')}}" class="btn btn-primary">Inscribete</a>
                    </div>
                </div>
            </div>
                <div class="col-6 col-md-6 mt-5">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="img\imagenes\universidad.jpg" class="card-img-top" alt="egb">
                        <div class="card-body">
                            <h5 class="card-title">Yo fui a la Uni</h5>
                            <p class="card-text">Si has cursado en la univ de Sevilla y quieres encontrar a tus compis, prueba a
                                buscarlos en nuestra web.</p>
                            <!-- <a href="#" class="btn btn-primary">Ir al buscador</a> -->
                            <a href="{{ route('inscripcion')}}" class="btn btn-primary">Inscribete</a>
                        </div>
                    </div>

                </div>
            </div>


    </main>
    @include('footer');
          
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>
    </body>
</html>
