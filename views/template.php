<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; ISO-8859-1">
    <meta name="DC.Language" SCHEME="RFC1766" content="Spanish">
    <meta name="description" content="Contigo voy, centro especializado que brinda servicios de apoyo psicológicos a niños, adolescentes y adultos.">
    <meta name="keywords" content="Contigovoy,Psicología,Psicólogas,Lima,Perú,Terapia,centro psicológico,consulta psicológica,autoestima,depresió">
    <meta name="Resource-type" content="Homepage">
    <meta name="DateCreated" content="Sun, 1 August 2021 00:00:00 GMT+1">
    <meta name="Revisit-after" content="7 days">
    <meta name="robots" content="ALL">
    <title>Contigo Voy {{ @title }} </title>
    <link rel="shortcut icon" type="image" href="public/img/logo.ico" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="public/css/app.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>

<body>
    <include href="views/includes/navbar.php" />
    <include href="{{ 'views/'.@content }}" />
    <script src="public/js/app.min.js"></script>
</body>

</html>