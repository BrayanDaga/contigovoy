<?php 
require_once "config.php";
require_once "app/controllers/ViewController.php";

$plantilla = new ViewController();
$plantilla->obtener_plantilla_controlador();

