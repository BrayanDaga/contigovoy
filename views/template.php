<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contigo voy, centro especializado que brinda servicios de apoyo psicológicos a niños, adolescentes y adultos.">
    <meta name="keywords" content="Contigovoy,Psicología,Psicólogas,Lima,Perú,Terapia,centro psicológico,consulta psicológica,autoestima,depresió">
    <meta name="Resource-type" content="Homepage">
    <meta name="DateCreated" content="Sun, 1 August 2021 00:00:00 GMT+1">
    <meta name="Revisit-after" content="7 days">
    <meta name="robots" content="ALL">
    <title>Contigo Voy {{ @title }} </title>
    <link rel="shortcut icon" href="{{ @BASE }}/public/img/logo.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" async>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin async>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Fredoka+One&display=swap" rel="stylesheet" async>
    <link rel="stylesheet" href="{{ @BASE }}/public/css/app.css" type="text/css" async>

</head>

<body>
    <include href="views/includes/navbar.php" />
    <include href="{{ 'views/'.@content }}" />
    <include href="views/includes/footer.php" />





    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- f3:check es igual a if -->
    <f3:check if="{{ @scripts }}">
        <!-- Si hay scripts, los incluyo -->
        <include href="{{ 'views/scripts/'.@scripts }}" />
    </f3:check>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css">

    <script src="{{@BASE }}/public/js/app.min.js"></script>
</body>

</html>