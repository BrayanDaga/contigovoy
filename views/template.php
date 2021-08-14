<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contigo Voy | {{ @title }} </title>
    <link rel="shortcut icon" type="image/jpg" href="pu/logo.ico" />
    <link rel="stylesheet" href="public/css/app.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>
    <include href="views/includes/navbar.php" />
    <script src="public/js/jquery-3.5.1.min.js"></script>
    <script src="public/js/bundle.js"></script>
</head>

<body>
    <include href="{{ 'views/'.@content }}" />
    <check if="{{ @content=='reservatucita.php' }}">
        <script type="text/javascript" src="public/js/reservacita.js"></script>
    </check>
</body>

</html>