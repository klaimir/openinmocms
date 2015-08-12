		<!-- DATOS DEL AGENTE COMERCIAL -->
		<p align="justify" class="titulo_seccion_datos">
			Datos del agente comercial
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?php echo  $_SESSION['rutaraiz']."app/usuarios/editar.php?usuario=".$nick_usuario;?>&enlace=<?php echo  $enlace; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>editar.gif" align="absmiddle" /></a>
		</p>
		<div style="float:left; margin:0 auto; text-align:left; width:100%;">
			<!-- Nombre -->	
			<span style="text-align:left;">Nombre (*): </span>
			<input readonly="readonly" class="campo_texto_blocked" style="margin-left:10px;" name="nombre_agente" id="nombre_agente" type="text" size="30" title="Nombre" value="<?php if($_POST['nombre_agente']) echo $_POST['nombre_agente']; else echo $row_consulta['nombre_agente']; ?>" >
			<!-- Apellidos -->	
			<span style="text-align:left; margin-left:20px;">Apellidos (*): </span>
			<input readonly="readonly" class="campo_texto_blocked" style="margin-left:10px;" name="apellidos_agente" id="apellidos_agente" type="text" size="40" title="Apellidos" value="<?php if($_POST['apellidos_agente']) echo $_POST['apellidos_agente'];  else echo $row_consulta['apellidos_agente']; ?>" >
			<!-- NIF -->	
			<span style="text-align:left; margin-left:20px;">NIF (*): </span>
			<input readonly="readonly" class="campo_texto_blocked" style="margin-left:10px;" name="nif_agente" id="nif_agente" type="text" size="15" title="NIF" value="<?php if($_POST['nif_agente']) echo $_POST['nif_agente']; else echo $row_consulta['nif_agente']; ?>" >
		</div>