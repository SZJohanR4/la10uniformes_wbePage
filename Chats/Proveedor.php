<?php
if ($_POST) {

    $sala = "Cliente";
    include('config.php');
    $Proveedor=
    $user = addslashes("Proveedor ".$_POST['var_php']);
    $n = mysql_num_rows(mysql_query("SELECT * FROM online WHERE user='" . $user . "'"));
    if ($n == 0) {
        $campos = array('time', 'user', 'sala');
        $datos = array((time()) + $seg_inac, $user, $sala);
        $c = implode(',', $campos);
        $d = '\'' . implode("','", $datos) . '\'';
        $sSQL = sprintf("INSERT INTO %s (%s) VALUES (%s)", "online", $c, $d);
        $query = mysql_query($sSQL);
    } else {
        $key = "";
        for ($i = 0; $i <= 10; $i++)
            $key.=rand(0, 9);
        $user = $user . "(" . $key . ")";
        $nn = mysql_num_rows(mysql_query("SELECT * FROM online WHERE user='" . $user . "'"));
        if ($nn == 0) {
            $campos = array('time', 'user', 'sala');
            $datos = array((time()) + $seg_inac, $user, $sala);
            $c = implode(',', $campos);
            $d = '\'' . implode("','", $datos) . '\'';
            $sSQL = sprintf("INSERT INTO %s (%s) VALUES (%s)", "online", $c, $d);
            $query = mysql_query($sSQL);
        } else {
            die("El nick ya existe.");
        }
    }
    ?> 
    <script type="text/javascript">
    <!-- 
        var segundos = 1;
        var user = "<?= stripslashes($user) ?>";
        var sala = "cliente";
        var acSegMill = (segundos == 0 || segundos > 10) ? 1000 : segundos * 1000;
    --> 
    </script> 

    <script type="text/javascript" src="chat.js"></script> 
    <style type="text/css"> 
        <!-- 
        h1                              { color: #000000; font: 90px Helvetica, Sans-Serif; margin: 0 10 10px 0;
                                         text-align: center;   }
        body{
            background-color: #666666;

        }
        #coment_tr { 
            background-color: #FFFFFF; 
            border-top-width: 2px; 
            border-right-width: 1px; 
            border-bottom-width: 1px; 
            border-left-width: 2px; 
            border-top-style: solid; 
            border-right-style: solid; 
            border-bottom-style: solid; 
            border-left-style: solid; 
            border-top-color: #000000; 
            border-right-color: #666666; 
            border-bottom-color: #666666; 
            border-left-color: #000000; 
            padding: 3px; 
            height: 198px; 
            width: auto; 
            display: block; 
            overflow: auto; 
        } 
        .date_envi { 
            background-color: #EEEEEE; 
            margin-top: 3px; 
            margin-right: 3px; 
            margin-bottom: 1px; 
            margin-left: 3px; 
            padding-top: 3px; 
            padding-right: 3px; 
            padding-bottom: 1px; 
            padding-left: 3px; 
            border-right-width: 1px; 
            border-bottom-width: 1px; 
            border-left-width: 1px; 
            border-right-style: solid; 
            border-bottom-style: solid; 
            border-left-style: solid; 
            border-right-color: #000000; 
            border-bottom-color: #000000; 
            border-left-color: #000000; 
        } 
        .botom { 
            color: #000000; 
            background-color: #FFFFFF; 
            border: 1px solid #999999; 
            height: 20px; 
            width: 100px; 
        } 
        .tabs { 
            background-color: #FFFFFF; 
            float: left; 
            height: auto; 
            width: 98px; 
            display: block; 
            cursor: pointer; 
            text-align: center; 
            padding-bottom: 4px; 
            margin-bottom: 4px; 
        } 
        .tabs_ac { 
            background-color: #E4E5E5; 
            float: left; 
            height: auto; 
            width: 98px; 
            display: block; 
            cursor: pointer; 
            text-align: center; 
            text-decoration: underline; 
            background-position: top; 
            margin-bottom: 4px; 
            padding-bottom: 4px; 
        } 
        #mensaje { 
            background-color: #FFFFFF; 
            padding: 5px; 
            border: 1px solid #000000; 
        } 
        #config { 
            color: #000000; 
            background-color: #EEEEEE; 
            margin: 1px; 
            padding: 1px; 
            height: auto; 
            width: 100px; 
            border: 1px solid #000000; 
            position: relative; 
            visibility: hidden; 
        } 
        .sala { 
            color: #000000; 
            background-color: #EEEEEE; 
            height: auto; 
            width: auto; 
            cursor: pointer; 
            display: block; 
            margin-right: 2px; 
            padding-right: 3px; 
            text-align: center; 
            margin-bottom: 2px; 
            padding-top: 2px; 
            padding-bottom: 2px; 
        } 
        .sala_ac { 
            color: #000000; 
            background-color: #F3F3F3; 
            height: auto; 
            width: auto; 
            cursor: pointer; 
            display: block; 
            margin-right: 2px; 
            padding-right: 3px; 
            text-align: center; 
            margin-bottom: 2px; 
            padding-top: 2px; 
            padding-bottom: 2px; 
            font-weight: bold; 
        } 
        .table { 
            border: 1px solid #000000; 
        } 
        #usuarios { 
            overflow: auto; 
            height: 270px; 
            width: auto; 
        } 
        .cargando { 
            background-color: #FF0000; 
            height: auto; 
            width: 100px; 
            position: absolute; 
            left: 0px; 
            top: 0px; 
            clip: rect(0px,auto,auto,0px); 
            visibility: visible; 
            padding-right: 3px; 
            padding-top: 2px; 
            padding-bottom: 4px; 
            padding-left: 5px; 
        } 
        #bbcode { 
            position:relative; 
            border: thin solid #333333; 
            background-color: #EEEEEE; 
            visibility: hidden; 
            margin: 1px; 
            padding: 1px; 
            height: auto; 
            width: 100px; 
        } 
        --> 
    </style> 
    <h1>Chat Proveedor</h1>
    <a href="../Proveedor.php"><h1>Pagina Principal </h1></a>
    <div class="cargando" id="cargando"><strong>Cargando...</strong></div> 
    <div id="box" style="visibility:hidden;"> 
        <table width="904" id="chat-tr-ct" border="0" align="center" cellpadding="0" cellspacing="0" class="table"> 
            <tr> 
                <td width="702" height="198" valign="top"><div id="coment_tr">&nbsp;Presione conectar para entrar al chat. </div></td> 
                <td width="200" rowspan="2" valign="top"> 
                    <table border="0" cellpadding="0" cellspacing="0"> 
                        <tr> 
                            <td> 
                                <div class="tabs_ac" id="users">Usuarios</div> 
                                <div class="tabs" id="salas">Salas</div> 
                            </td> 
                        </tr> 
                        <tr> 
                            <td> 
                                <div id="usuarios" style="display:block;"></div> 

                                <div id="sala" style="visibility:none; display:none; overflow:auto; height:270px;"> 
                                    <div class="sala_ac" sala="Cliente">Clientes</div> 
                                    <div class="sala" sala="Administrador">Administrador</div> 
<!--                                    <div class="sala" sala="Cine">Cine</div> 
                                    <div class="sala" sala="Chistes">Chistes</div> 
                                    <div class="sala" sala="Otros">Otros</div> -->
                                </div> 
                            </td> 
                        </tr> 
                    </table> 
                </td> 
            </tr> 
            <tr> 
                <td bgcolor="#CCCCCC" class="date_envi"><div align="center"> 
                        <textarea name="mensaje"  tabindex="1" rows="4" disabled="disabled" id="mensaje" style="width:694px;" onkeypress="return envAUT(event);"></textarea><br /> 
                        <input name="enviar" onClick="enviarGET($('mensaje'));" type="button" class="botom" id="enviar" value="Enviar" disabled="disabled"> 
    <!--                        <input name="icono" type="button" class="botom" onClick="verGET('bbcode');" id="icono" value="BBcode">  
                        <input name="conf" type="button" class="botom" onClick="verGET('config');" id="conf" value="Configurar">  -->
                        <input name="conection" onClick="conectarGET(this);" type="button" class="botom" id="conection" value="Conectar"> 
                        <br /> 
                        <font id="nik"><strong>Nick: </strong></font> | <strong>Sala: </strong> <font id="salaET"><?= $sala ?></font><div id="result"></div> 
                    </div></td> 
            </tr> 
        </table> 
        <div style="position:absolute; left:81px; top:276px;"> 
            <div id="config"><div style="background-color:#CCCCCC">Configurar</div> 
                Actualizar cada:  
                <br /> 
                <select name="seg_act" onchange="actualizarTime(this.value);"> 
                    <option value="1">1 segundo</option> 
                    <option value="2">2 segundo</option> 
                    <option value="3">3 segundo</option> 
                    <option value="4">4 segundo</option> 
                    <option value="5">5 segundo</option> 
                    <option value="6">6 segundo</option> 
                    <option value="7">7 segundo</option> 
                    <option value="8">8 segundo</option> 
                    <option value="9">9 segundo</option> 
                </select> 
                <br /> 
                <input name="cerrar-c" type="button" class="botom" id="cerrar-c" onclick="cerrarGET('config');" value=" - Cerrar -" /> 
            </div> 
        </div> 
        <div style="position:absolute; left:81px; top:8px;"> 
            <div align="center" id="bbcode"> 
                <div style="background-color:#CCCCCC;">BBcode</div> 
                <div id="menu-td-edit"> 
                    <a href="javascript:b();"><strong>B</strong></a> 
                    <a href="javascript:it();"><i>I</i></a> 
                    <a href="javascript:u();"><u>U</u></a> 
                    <br /> 
                    <a href="javascript:colo();">Color</a> 
                    <a href="javascript:imagen();">Imagen</a> 
                    <a href="javascript:escribir_web();">URL</a> 
                </div> 
                <input name="cerrar" type="button" class="botom" id="cerrar" onclick="cerrarGET('bbcode');" value=" - Cerrar -" /> 
            </div> 
        </div> <!--
        -->    </div> 
    <?php
    
} else {
    ?> 
    <!--
        <form name="form1" method="post" action=""> 
            Tu nick: <br> 
            <input name="nick" type="text" id="nick"> 
            <br> 
            <input type="submit" name="Submit" value="Entrar al chat"> 
        </form>  -->
    <?php
    echo "<script language='javascript'>
	var nombre;
	nombre=prompt('Introduce tu nombre');
     </script> ";

//Ya tenemos capturada la variable con javascript

    echo "<form name='enviar' action='' method='post' >
              <input type=hidden name=var_php></form>";

    echo "<script language='javascript'>
              document.enviar.var_php.value=nombre;
              document.enviar.submit();
</script>";
}
?>