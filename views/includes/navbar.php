<!-- Logo occupies 2 navbars -->

<div class="iconos">
    <div class="a"></div>
        <div><a href="#"><i class="fab fa-invision"></i></a></div>
        <div><a href="♥"><i class="fab fa-tiktok"></i></a></div>
        <div><a href="#"><i class="fab fa-youtube"></i></a></div>
        <div><a href="#"><i class="fas fa-envelope"></i></a></div>
        <div><a href="#"><i class="fab fa-instagram-square"></i></a></div>
        <div><a href="#"><i class="fab fa-facebook-square"></i></a></div>
    </div>
<nav class="navbar navbar-light bg-light navbar-expand-md">

    <div class="container-fluid">

        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
            &#x2630;</button> <a class="navbar-brand" href="/contigovoy/">

            <img src="<?= IMAGES ?>/logo.png" class="img-fluid" alt="logo" class="logo">

        </a>

   
        <!--container-flex-bootstrap-->
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav active">
                <li class="nav-item <?= $_SERVER['REQUEST_URI']==='/'  ? 'active' : '' ?>"><a href="/contigovoy/" class="nav-link">Home</a>
                </li>
                <li class="nav navbar-nav dropdown <?= $_SERVER['REQUEST_URI']==='/servicios'  ? 'active' : '' ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="/servicios" role="button" aria-haspopup="true" aria-expanded="false">Servicios</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/contigovoy/servicios#lenguaje">Terapia de lenguaje</a>
                        <a class="dropdown-item" href="/contigovoy/servicios#emocional">Terapia Emocional</a>
                        <a class="dropdown-item" href="/contigovoy/servicios#aprendisaje">Terapia de Aprendizaje</a>
                        <a class="dropdown-item" href="/contigovoy/servicios#psicoterapia">Psicoterapia</a>
                        <a class="dropdown-item" href="/contigovoy/servicios#otros">Otros</a>
                    </div>
                </li>
                <li class="nav-item <?= $_SERVER['REQUEST_URI']==='/conocenos'  ? 'active' : '' ?>"><a href="/contigovoy/conocenos" class="nav-link">Conocenos</a>
                </li>
                <li class="nav-item <?= $_SERVER['REQUEST_URI']==='/modalidad'  ? 'active' : '' ?>"><a href="/contigovoy/modalidad" class="nav-link">Modalidad de Trabajo</a>
                </li>
                <li class="nav-item <?= $_SERVER['REQUEST_URI']==='/contactanos'  ? 'active' : '' ?>"><a href="/contigovoy/contactanos" class="nav-link">Contactanos </a>
                </li>
                <li class="nav navbar-nav dropdown <?= $_SERVER['REQUEST_URI']==='/parati'  ? 'active' : '' ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="/parati" role="button" aria-haspopup="true" aria-expanded="false">Para ti</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/contigovoy/parati#material">Mateiral Didáctico</a>
                        <a class="dropdown-item" href="/contigovoy/parati#test">Test</a>
                        <a class="dropdown-item" href="/contigovoy/parati#blog">Blog</a>
                        <a class="dropdown-item" href="/contigovoy/parati#otros">Otros</a>
                    </div>
                </li>
            </ul>
       
            <ul class="nav navbar-nav ml-auto">

                <li class="nav-item"><a href="#" class="nav-link">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>