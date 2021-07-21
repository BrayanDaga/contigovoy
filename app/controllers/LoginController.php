<?php

namespace App\Controllers;

use App\Models\MainModel;

class LoginController extends MainModel
{
    public function iniciar_sesion_administrador_controlador(){

        $usuario=mainModel::limpiar_cadena($_POST['dashboard_usuario']);
        $clave=mainModel::limpiar_cadena($_POST['dashboard_clave']);

        /*-- Comprobando campos vacios - Checking empty fields --*/
        if($usuario=="" || $clave==""){
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
        if(mainModel::verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$clave)){
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
        $datos_cuenta=mainModel::datos_tabla("Normal","usuario WHERE usuario_usuario='$usuario' AND 	usuario_clave='$clave' AND usuario_cuenta_estado='Activa'","*",0);

        if($datos_cuenta->rowCount()==1){

            $row=$datos_cuenta->fetch();

            $datos_cuenta->closeCursor();
            $datos_cuenta=mainModel::desconectar($datos_cuenta);

            $_SESSION['id_sto']=$row['usuario_id'];
            $_SESSION['nombre_sto']=$row['usuario_nombre'];
            $_SESSION['apellido_sto']=$row['usuario_apellido'];
            $_SESSION['genero_sto']=$row['usuario_genero'];
            $_SESSION['usuario_sto']=$row['usuario_usuario'];
            $_SESSION['cargo_sto']=$row['usuario_cargo'];
            $_SESSION['foto_sto']=$row['usuario_foto'];

            // if(headers_sent()){
            //     echo "<script> window.location.href='".SERVERURL.DASHBOARD."/home/'; </script>";
            // }else{
            //     return header("Location: ".SERVERURL.DASHBOARD."/home/");
            // }

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
    } /*-- Fin controlador - End controller --*/

}
