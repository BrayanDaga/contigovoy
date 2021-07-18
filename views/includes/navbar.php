<!-- Logo occupies 2 navbars -->
<nav class="navbar navbar-light bg-white navbar-expand-md">
    <div class="container-fluid">

        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
            &#x2630;</button> <a class="navbar-brand" href="/">

            <img src="<?= IMAGES ?>/logo.png" class="img-fluid" alt="logo" class="logo">

        </a>

        <!--container-flex-bootstrap-->
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav active">
                <li class="nav-item <?= $_SERVER['REQUEST_URI']==='/'  ? 'active' : '' ?>"><a href="/" class="nav-link">Home <i class="fas fa-home"></i></a>
                </li>
                <li class="nav navbar-nav dropdown <?= $_SERVER['REQUEST_URI']==='/servicios'  ? 'active' : '' ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="/servicios" role="button" aria-haspopup="true" aria-expanded="false">Servicios <i class="fas fa-list"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/servicios#lenguaje">Terapia de lenguaje</a>
                        <a class="dropdown-item" href="/servicios#emocional">Terapia Emocional</a>
                        <a class="dropdown-item" href="/servicios#aprendizaje">Terapia de Aprendizaje</a>
                        <a class="dropdown-item" href="/servicios#psicoterapia">Psicoterapia</a>
                        <a class="dropdown-item" href="/servicios#otros">Otros</a>
                    </div>
                </li>
                <li class="nav-item <?= $_SERVER['REQUEST_URI']==='/conocenos'  ? 'active' : '' ?>"><a href="/conocenos" class="nav-link">Conocenos <i class="fas fa-user"></i></a>
                </li>
                <li class="nav-item <?= $_SERVER['REQUEST_URI']==='/modalidad'  ? 'active' : '' ?>"><a href="/modalidad" class="nav-link">Modalidad de Trabajo <i class="fas fa-chart-network"></i></a>
                </li>
                <li class="nav-item <?= $_SERVER['REQUEST_URI']==='/contactanos'  ? 'active' : '' ?>"><a href="/contactanos" class="nav-link">Contactanos <i class="far fa-comment-dots"></i></a>
                </li>
                <li class="nav navbar-nav dropdown <?= $_SERVER['REQUEST_URI']==='/parati'  ? 'active' : '' ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="/parati" role="button" aria-haspopup="true" aria-expanded="false">Para ti <i class="fas fa-hand-point-down"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/parati#material">Mateiral Didáctico</a>
                        <a class="dropdown-item" href="/parati#test">Test</a>
                        <a class="dropdown-item" href="/parati#blog">Blog</a>
                        <a class="dropdown-item" href="/parati#otros">Otros</a>
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