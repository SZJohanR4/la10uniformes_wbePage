<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SistemaApp
 *
 * @author GOMEZ
 */
class SistemaApp {

    function ingresarAlSistema($usuario, $contraseña) {
        include 'dataBase.php';
       
        $db = new dataBase();
        $db->conectar();
        $consulta = mysql_query("SELECT * FROM password WHERE usuario='$usuario'");
        if ($f2 = mysql_fetch_array($consulta)) {
            if ($contraseña == $f2['password']) {
                echo '<script>alert("Bienvenido al sistema")</script>';
                if ($f2['rol'] == "PROVEEDOR") {

                    header("Location: ../GUI/Proveedor/indexproveedor.php?doc=$usuario");
                } else {
                    header("Location: ../GUI/Administrador/Paginas/Inicio.php?doc=$usuario");
                }
            } else {
                echo '<script>alert("CONTRASEÑA INCORRECTA!!! VERIFIQUE")</script>';
                echo "<script>location.href='../GUI/Administrador/Paginas/login.php?'</script>";
            }
        } else {
            echo '<script>alert("ESTE USURIO NO EXISTE")</script>';
            echo "<script>location.href='../GUI/Administrador/Paginas/login.php?'</script>";
        }
    }

}
