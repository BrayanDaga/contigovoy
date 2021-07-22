<!-- Logo occupies 2 navbars -->

<div class="iconos">
    <div class="a"></div>
        <div><a href="#"><i class="fab fa-invision"></i></a></div>
        <div><a href="#"><i class="fab fa-tiktok"></i></a></div>
        <div><a href="#"><i class="fab fa-youtube"></i></a></div>
        <div><a href="#"><i class="fas fa-envelope"></i></a></div>
        <div><a href="https://www.instagram.com/contigovoyperu/"><i class="fab fa-instagram-square"></i></a></div>
        <div><a href="https://www.facebook.com/Contigo-voy-108528551483244"><i class="fab fa-facebook-square"></i></a></div>
    </div>
<nav class="navbar navbar-light bg-light navbar-expand-md">

    <div class="container-fluid">

        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
            &#x2630;</button> <a class="navbar-brand" href="/">

            <img src="<?= IMAGES ?>/logo.png" class="img-fluid" alt="logo" class="logo">

        </a>

   
        <!--container-flex-bootstrap-->
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav active">
                <li class="nav-item <?= $_SERVER['REQUEST_URI']==='/'  ? 'active' : '' ?> li"><a href="/" class="nav-link">INICIO&nbsp;<i class="fas fa-home"></i></a>
                </li>
                <li class="nav navbar-nav dropdown <?= $_SERVER['REQUEST_URI']==='/servicios'  ? 'active' : '' ?> li">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="/servicios" role="button" aria-haspopup="true" aria-expanded="false">SERVICIOS&nbsp;<i class="fas fa-list"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/servicios#lenguaje">Terapia de lenguaje</a>
                        <a class="dropdown-item" href="/servicios#emocional">Terapia Emocional</a>
                        <a class="dropdown-item" href="/servicios#aprendizaje">Terapia de Aprendizaje</a>
                        <a class="dropdown-item" href="/servicios#psicoterapia">Psicoterapia</a>
                        <a class="dropdown-item" href="/servicios#otros">Otros</a>
                    </div>
                </li>
                <li class="nav-item <?= $_SERVER['REQUEST_URI']==='/conocenos'  ? 'active' : '' ?> li"><a href="/conocenos" class="nav-link">CONOCENOS&nbsp;<i class="fas fa-user"></i></a>
                </li>
                <li class="nav-item <?= $_SERVER['REQUEST_URI']==='/modalidad'  ? 'active' : '' ?> li"><a href="/contigovoy/modalidad" class="nav-link">MODALIDAD DE TRABAJO&nbsp;<i class="fas fa-chart-network"></i></a>
                </li>
                <li class="nav-item <?= $_SERVER['REQUEST_URI']==='/contactanos'  ? 'active' : '' ?> li"><a href="/contactanos" class="nav-link">CONTACTANOS&nbsp;<i class="far fa-comment-dots"></i></a>
                </li>
                <li class="nav navbar-nav dropdown <?= $_SERVER['REQUEST_URI']==='/parati'  ? 'active' : '' ?> li">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="/parati" role="button" aria-haspopup="true" aria-expanded="false">PARAT TI&nbsp;<i class="fas fa-hand-point-down"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/parati#material">Material Didáctico</a>
                        <a class="dropdown-item" href="/parati#blog">Blog</a>
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