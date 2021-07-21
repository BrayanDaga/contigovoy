<!-- Page Content -->
<main class="container-fluid" id="servicios">
    <h1 class="page-header text-center text-primary font-weight-bold">SERVICIOS</h1>
    <hr>
    <div class="row">
        <div class="col-12">
            <section class="m-3" id="lenguaje">
                <img src="<?= IMAGES ?>/lenguaje.webp" class="img-fluid" width="100%">
            </section>
            <section class="m-3" id="emocional">
                <img src="<?= IMAGES ?>/emocional.webp" class="img-fluid" width="100%">
            </section>
            <section class="m-3" id="aprendizaje">
                <img src="<?= IMAGES ?>/aprendizaje.webp" class="img-fluid" width="100%">
            </section>
            <section class="m-3" id="test">
                <img src="<?= IMAGES ?>/test.webp" class="img-fluid" width="100%">
            </section>
            <section class="m-3" id="psicoterapia">
                <img src="<?= IMAGES ?>/psicoterapia.webp" class="img-fluid" width="100%">
            </section>

            <!-- Por si alguna vez desean utilizar este tipo de section -->
            <script type="text/x-template" id="services-item">
                <section class="container-fluid my-3" id="services-item">
                <div class="d-flex p-5 justify-content-around align-items-center row">
                <div class="col-md-6 col-sm-12 px-3">
                        <h2 class="text-white bg-secondary">Psicoterapia</h2>
                        <p class="text-white">¿Te cuesta manejar tus emociones, no puedes dormir en las noches, te sientes desmotivado, no te sientes listo o tienes miedo de enfrentar cambios en tu vida?</p>
                    </div>
                    <div class="col-md-6 col-sm-12 px-3">
                        <img class="img-fluid rounded-circle" src="https://picsum.photos/500/500">
                    </div>
                </div>
            </section>
            </script>
            <!-- fin componente -->

        </div>
    </div>
</main>