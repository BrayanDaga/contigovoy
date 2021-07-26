<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">

    <div class="carousel-item active">

      <img src="<?= IMAGES ?>/img1.webp" class="d-block w-100" alt="contigo">

      <div class="carousel-caption d-none d-md-block form1">



        <form class="formulario">
          <h1>APRENDE CON</h1>
          <h3>nosotros de la mejor forma</h3>
          <p>Dejanos tus datos para ponernos en contacto contigo y asi recibir más informacion y conocernos más</p>
          <input type="text" placeholder="Correo electronico" /> <br /><br />
          <input type="text" placeholder="Núnmero de contacto" /> <br /><br />

          <input class="sumit" type="submit" value="Enviar">
        </form>



      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= IMAGES ?>/img2.webp" class="d-block w-100" alt="terapia">
      <!-- <div class="carousel-caption d-none d-md-block">
                          <h5>Second slide label</h5>
                          <p>Some representative placeholder content for the second slide.</p>
                        </div>-->
    </div>
    <div class="carousel-item">
      <img src="<?= IMAGES ?>/img3.webp" class="d-block w-100" alt="didactico">
      <!-- <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                          <p>Some representative placeholder content for the third slide.</p>
                        </div>-->
    </div>
    <div class="carousel-item">
      <img src="<?= IMAGES ?>/img4.webp" class="d-block w-100" alt="material">
      <!-- <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                          <p>Some representative placeholder content for the third slide.</p>
                        </div>-->
    </div>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>