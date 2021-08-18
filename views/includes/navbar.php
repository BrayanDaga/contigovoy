<nav class="navbar navbar-primary bg-white navbar-expand-md">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
    <img src="public/img/logo.webp" width="195" height="70" alt="">
    </a>
    <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
      &#x2630;</button>
    <!--container-flex-bootstrap-->
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav ">

        <li class="nav-item {{  @title == 'Home' ? 'active' : '' }} "><a href="{{ @menu['Home'] }}" class="nav-link  px-2">INICIO <i class="fas fa-home"></i></a>
        </li>
        <li class="nav-item {{  @title == 'Servicios' ? 'active' : '' }} "><a href="{{ @menu['Servicios'] }}" class="nav-link  px-2">SERVICIOS <i class="fas fa-list"></i></a>
        </li>
        <li class="nav-item {{  @title == 'Conocenos' ? 'active' : '' }}"><a href="{{ @menu['Conocenos'] }}" class="nav-link  px-2">CONÓCENOS <i class="fas fa-user"></i></a>
        </li>
        <li class="nav-item {{  @title == 'Reserva tu Cita' ? 'active' : '' }} "><a href="{{ @menu['Reserva tu Cita'] }}" class="nav-link  px-2">RESERVA TU CITA <i class="far fa-comment-dots"></i></a>
        </li>
        <li class="nav navbar-nav dropdown {{  @title == 'Blog' ? 'active' : (@title == 'Material' ? 'active' : '') }}">
          <a class="nav-link dropdown-toggle px-2" data-toggle="dropdown" href="/" role="button" aria-haspopup="true" aria-expanded="false">PARAT TI <i class="fas fa-hand-point-down"></i></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ @menu['Material'] }}">Material Didáctico</a>
            <a class="dropdown-item" href="{{ @menu['Blog'] }}">Blog</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto d-flex flex-row my-nav-icons">
        <li class="nav-item mr-1">
          <a href="https://www.linkedin.com/company/centro-voy/about/" target="_blank" class="nav-link waves-effect waves-light icon-item">
            <i class="fab fa-linkedin"></i>
          </a>
        </li>

        <li class="nav-item mr-1">
          <a href="https://www.youtube.com/channel/UCeQo5xI5_rcgdspexoxfL5w" target="_blank" class="nav-link waves-effect waves-light icon-item">
            <i class="fab fa-youtube"></i>
          </a>
        </li>
        <li class="nav-item mr-1">
          <a href="mailto:contigovoyperu@gmail.com" target="_blank" class="nav-link waves-effect waves-light icon-item">
            <i class="fas fa-envelope" title="contigovoyperu@gmail.com"></i>
          </a>
        </li>
        <li class="nav-item mr-1">
          <a href="https://www.instagram.com/centrocontigovoy/" target="_blank" class="nav-link waves-effect waves-light icon-item"">
              <i class=" fab fa-instagram"></i>
          </a>
        </li>
        <li class="nav-item mr-1">
          <a href="https://www.facebook.com/ContigoVoy-104115145278579/" target="_blank" class="nav-link waves-effect waves-light icon-item">
            <i class="fab fa-facebook"></i>
          </a>
        </li>

      </ul>

      <!-- <ul class="nav navbar-nav ml-auto">

                <li class="nav-item"><a href="#" class="nav-link">Login</a>
                </li>
            </ul>  -->
    </div>
  </div>
</nav>