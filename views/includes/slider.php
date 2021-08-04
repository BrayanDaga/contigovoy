<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">

    <div class="carousel-item active" data-interval="3000">
      <img src="<?= IMAGES ?>/img1.webp" class="d-block w-100" alt="contigo">
    </div>
    <div class="carousel-item" data-interval="3000">
      <img src="<?= IMAGES ?>/img2.webp" class="d-block w-100" alt="terapia">   
    </div>
    <div class="carousel-item" data-interval="3000">
      <img src="<?= IMAGES ?>/img3.webp" class="d-block w-100" alt="didactico">
    </div>
    <div class="carousel-item" data-interval="3000">
      <img src="<?= IMAGES ?>/img4.webp" class="d-block w-100" alt="material">
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