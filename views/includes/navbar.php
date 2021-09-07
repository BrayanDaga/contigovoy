<nav class="navbar navbar-primary bg-white navbar-expand-md">
  <!-- @BASE trae la url principal sin prefijos -->
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ @BASE  }}/">
      <img src="{{@BASE }}/public/img/logo.webp" width="195" height="70" alt="contigovoyIcon">
    </a>
    <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
      &#x2630;</button>
    <!--container-flex-bootstrap-->
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav ">

        <li class="nav-item {{  @URI == @BASE . '/' ? 'active' : '' }} "><a href="{{ @BASE  }}/" class="nav-link  px-2">INICIO <i class="fas fa-home"></i></a>
        </li>
        <li class="nav-item {{  @URI == @BASE . '/servicios' ? 'active' : '' }} "><a href="{{  @BASE }}/servicios " class="nav-link  px-2">SERVICIOS <i class="fas fa-list"></i></a>
        </li>
        <li class="nav-item {{  @URI == @BASE . '/conocenos' ? 'active' : '' }}"><a href="{{ @BASE  }}/conocenos" class="nav-link  px-2">CONÓCENOS <i class="fas fa-user"></i></a>
        </li>
        <li class="nav-item {{  @URI == @BASE . '/reservacita' ? 'active' : '' }} "><a href="{{ @BASE }}/reservacita" class="nav-link  px-2">RESERVA TU CITA <i class="far fa-comment-dots"></i></a>
        </li>
        <li class="nav navbar-nav dropdown {{  @URI == @BASE . '/blog' ? 'active' : (@URI == @BASE . '/material' ? 'active' : '') }}">
          <a class="nav-link dropdown-toggle px-2" data-toggle="dropdown" href="/" role="button" aria-haspopup="true" aria-expanded="false">PARAT TI <i class="fas fa-hand-point-down"></i></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ @BASE  }}/material">Material Didáctico</a>
            <a class="dropdown-item" href="{{ @BASE  }}/blog">Blog</a>
          </div>
        </li>
        <f3:check if="{{ @SESSION.user  }}">
          <li class="nav-item "><a href="#" class="nav-link  px-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT <i class="fas fa-sign-out-alt"></i></a>
          </li>

        </f3:check>
      </ul>
      <f3:check if="{{ @SESSION.user  }}">
        <form id="logout-form" action="{{ @BASE }}/logout" method="POST" class="d-none">
        </form>
      </f3:check>
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
          <a href="mailto:atencionpsicologica@contigo-voy.com" target="_blank" class="nav-link waves-effect waves-light icon-item">
            <i class="fas fa-envelope" title="atencionpsicologica@contigo-voy.com"></i>
          </a>
        </li>
        <li class="nav-item mr-1">
          <a href="https://www.instagram.com/centrocontigovoy/" target="_blank" class="nav-link waves-effect waves-light icon-item">
            <i class=" fab fa-instagram"></i>
          </a>
        </li>
        <li class="nav-item mr-1">
          <a href="https://www.facebook.com/ContigoVoy-104115145278579/" target="_blank" class="nav-link waves-effect waves-light icon-item">
            <i class="fab fa-facebook"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>