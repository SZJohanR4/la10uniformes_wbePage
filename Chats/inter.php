<?php

include('config.php'); // Incluimos las configuraciones 
if ($_POST) {
    if ($_POST['t'] == "user") {
        $user = array();
        $in = 0;
        $ac = 0;
        $Sqll = mysql_query("SELECT * FROM online WHERE sala='" . $_POST['sala'] . "'", $con) or die(mysql_error());
        while ($dat = mysql_fetch_array($Sqll)) {
            $use = stripslashes($dat['user']);
            $time = $dat['time'];
            if (abs(time() - $time) < (200 + $seg_inac)) {
                if ($time > time()) {
                    $ac++;
                    $user[] = '<strong>' . $use . '</strong>';
                } else {
                    $in++;
                    $user[] = '<i>' . $use . '</i>';
                }
            } else {
                if ($use != $_POST['user']) {
                    $consulta = "DELETE FROM online WHERE id ='" . $dat['id'] . "'";
                    $resultado = mysql_query($consulta) or die(mysql_error());
                }
            }
        }
        if (empty($user))
            echo "No hay usuarios conectados.";
        else {
            $user[] = "<hr />Hay " . $ac . " usuarios activos y " . $in . " inactivos.(" . ($ac + $in) . ")";
            echo implode('<br />', $user);
        }
    } elseif ($_POST['t'] == "conectar") {
        $name = $_POST['name'];
        $sala = $_POST['sala'];
        $n = mysql_num_rows(mysql_query("SELECT * FROM online WHERE user='" . $name . "'"));
        if ($n == 0) {
            $campos = array('time', 'user', 'sala');
            $datos = array((time()) + $seg_inac, $name, $sala);
            $c = implode(',', $campos);
            $d = '\'' . implode("','", $datos) . '\'';
            $sSQL = sprintf("INSERT INTO %s (%s) VALUES (%s)", "online", $c, $d);
            $query = mysql_query($sSQL);
        } elseif ($n == 1) {
            $consulta = "Update online set time='" . (time() + $seg_inac) . "', sala='" . $sala . "' WHERE user ='" . $name . "'";
            @$resultado = mysql_query($consulta) or die(mysql_error());
        }
    } elseif ($_POST['t'] == "desconectar") {
        $consulta = "DELETE FROM online WHERE user ='" . $_POST['user'] . "'";
        $resultado = mysql_query($consulta) or die(mysql_error());
    } elseif ($_POST['t'] == "ver") {
        $post = array();
        $Sqll = @mysql_query("SELECT * FROM contenido WHERE sala='" . $_POST['sala'] . "' ORDER BY id ASC", $con) or die(mysql_error());
        while ($dat = mysql_fetch_array($Sqll)) {
            $mensaje = stripslashes($dat['cont']);
            $mensaje = str_replace("[b]", "<b>", $mensaje);
            $mensaje = str_replace("[/b]", "</b>", $mensaje);
            $mensaje = str_replace("[img]", "<img src=\"", $mensaje);
            $mensaje = str_replace("[/img]", "\" border=\"0\" onerror=this.onerror='this.src=\'\';'>", $mensaje);
            $mensaje = preg_replace("/\[color=((#)?[0-9a-z]+)\]/i", "<font color=\"\\1\">", $mensaje);
            $mensaje = str_replace("[/color]", "</font>", $mensaje);
            $mensaje = preg_replace("/\[color=((#)?[0-9a-z]+)\]/i", "<font color=\"\\1\">", $mensaje);
            $mensaje = str_replace("[/color]", "</font>", $mensaje);
            $mensaje = preg_replace("/\[url\](www\..+)\[\/url\]/i", "<a href=\"http://\\1\" target=\"_blank\">\\1</a>", $mensaje);
            $mensaje = preg_replace("/\[url\](.+)\[\/url\]/i", "<a href=\"\\1\" target=\"_blank\">\\1</a>", $mensaje);
            $mensaje = preg_replace("/\[url=(www\..+)\](.+)\[\/url\]/i", "<a href=\"http://\\1\" target=\"_blank\">\\2</a>", $mensaje);
            $mensaje = preg_replace("/\[url=(.+)\](.+)\[\/url\]/i", "<a href=\"\\1\" target=\"_blank\">\\2</a>", $mensaje);
            $mensaje = str_replace("[i]", "<i>", $mensaje);
            $mensaje = str_replace("[/i]", "</i>", $mensaje);
            $mensaje = str_replace("[u]", "<u>", $mensaje);
            $mensaje = str_replace("[/u]", "</u>", $mensaje);
            $post[] = '<strong>' . $dat['name'] . ':</strong> ' . $mensaje;
        }
        if (!empty($post))
            echo implode('<br>', $post);
        else
            echo "No hay comentarios.";
        echo '<div id="ultimo"></div>';
    }elseif ($_POST['t'] == "insert") {
        $name = $_POST['name'];
        $fecha = @date('d-m-Y');
        $sala = $_POST['sala'];
        $cont = nl2br(addslashes(strip_tags($_POST['cont'])));
        $campos = array('name', 'fecha', 'cont', 'sala');
        $datos = array($name, $fecha, $cont, $sala);
        $c = implode(',', $campos);
        $d = '\'' . implode("','", $datos) . '\'';
        $sSQL = sprintf("INSERT INTO %s (%s) VALUES (%s)", "contenido", $c, $d);
        $query = mysql_query($sSQL);
        $n = mysql_num_rows(mysql_query("SELECT * FROM online WHERE user='" . $name . "'"));
        if ($n == 0) {
            $campos = array('time', 'user', 'sala');
            $datos = array((time()) + $seg_inac, $name, $sala);
            $c = implode(',', $campos);
            $d = '\'' . implode("','", $datos) . '\'';
            $sSQL = sprintf("INSERT INTO %s (%s) VALUES (%s)", "online", $c, $d);
            $query = mysql_query($sSQL);
        } elseif ($n == 1) {
            $consulta = "Update online set time='" . (time() + $seg_inac) . "', sala='" . $_POST['sala'] . "' WHERE user ='" . $name . "'";
            @$resultado = mysql_query($consulta) or die(mysql_error());
        }
    }
   
}
?>