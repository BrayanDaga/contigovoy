<?php

namespace App\Controllers;

use PDO;
use App\Models\MainModel;

class LoginController extends MainModel
{
    public function iniciar_sesion_administrador_controlador(){

        $usuario=mainModel::limpiar_cadena($_POST['username']);
        $password=mainModel::limpiar_cadena($_POST['password']);

        /*-- Comprobando campos vacios - Checking empty fields --*/
        if($usuario=="" || $password==""){
            echo'<script>
                Swal.fire({
                  title: "Ocurrió un error inesperado",
                  text: "No has llenado todos los campos que son requeridos.",
                  icon: "error",
                  confirmButtonText: "Aceptar"
                });
            </script>';
            exit();
        }


        /*-- Verificando integridad datos - Verifying data integrity --*/
        if(mainModel::verificar_datos("[a-zA-Z0-9]{4,30}",$usuario)){
            echo'<script>
                Swal.fire({
                  title: "Ocurrió un error inesperado",
                  text: "El nombre de usuario no coincide con el formato solicitado.",
                  icon: "error",
                  confirmButtonText: "Aceptar"
                });
            </script>';
            exit();
        }
        if(mainModel::verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$password)){
            echo'<script>
                Swal.fire({
                  title: "Ocurrió un error inesperado",
                  text: "La contraseña no coincide con el formato solicitado.",
                  icon: "error",
                  confirmButtonText: "Aceptar"
                });
            </script>';
            exit();
        }

        //encriptar clave

        /*-- Verificando datos de la cuenta - Verifying account details --*/
        $datos_cuenta=mainModel::datos_tabla("Normal","users WHERE username='$usuario' ","*",0);
        
        while($row = $datos_cuenta->fetch(PDO::FETCH_ASSOC)){
          
            if(password_verify($password, $row['password'])){
    $_SESSION['auth_user'] = $row;
                $datos_cuenta->closeCursor();
                $row=mainModel::desconectar($row);
        
                if(headers_sent()){
                    echo "<script> window.location.href='".$_ENV['APP_URL']."admin/home/'; </script>";
               }else{
                    return header("Location: ".$_ENV['APP_URL']."admin/home/");
                }
                    
            }else{
                echo'<script>
                    Swal.fire({
                      title: "Datos incorrectos",
                      text: "El nombre de usuario o contraseña no son correctos.",
                      icon: "error",
                      confirmButtonText: "Aceptar"
                    });
                </script>';
            }
    
        }
    } /*-- Fin controlador - End controller --*/

}
