		<!-- DATOS DE REPRESENTANTE-->
		<p align="justify" class="titulo_seccion_datos">
			Datos del cliente
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?php echo  $_SESSION['rutaraiz']."app/clientes/editar.php?id=".$_GET['id'];?>&enlace=<?php echo  $enlace; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>editar.gif" align="absmiddle" /></a>
		</p>
		<div style="float:left; margin:0 auto; text-align:left; width:30%;">
			<!-- Nombre -->	
			<span style="text-align:left;">Nombre (*): </span>
			<br />
			<input class="campo_texto_blocked" readonly="readonly" name="nombre" id="nombre" type="text" size="20" title="Nombre del cliente" value="<?php if($_POST['nombre']) echo $_POST['nombre']; else echo $row_consulta['nombre']; ?>" >
			<br  /><br  />
			<!-- Apellidos -->	
			<span style="text-align:left;">Apellidos (*): </span>
			<br />
			<input class="campo_texto_blocked" readonly="readonly" name="apellidos" id="apellidos" type="text" size="30" title="Apellidos del cliente" value="<?php if($_POST['apellidos']) echo $_POST['apellidos'];  else echo $row_consulta['apellidos']; ?>" >
			<br  /><br  />
			<!-- NIF -->	
			<span style="text-align:left;">NIF (*): </span>
			<br />
			<input class="campo_texto_blocked" readonly="readonly" name="nif" id="nif" type="text" size="15" title="NIF del cliente" value="<?php if($_POST['nif']) echo $_POST['nif']; else echo $row_consulta['nif']; ?>" >
		</div>
		<div style="float:left; margin:0 auto; text-align:left; width:67%; border-left:1px dotted #999;">
			<div style="margin-left:15px">			
				<!-- Provincia -->
				<span style="text-align:left;">Provincia (*): </span>
				<input readonly="readonly" style="margin-left:15px;" class="campo_texto_blocked" name="provincia" id="provincia" type="text" size="25" title="Provincia" value="<?php echo  formatear_provincia($row_consulta['provincia']); ?>" onchange="modificado=true">
				<input type="hidden" name="provincia" value="<?php echo  $row_consulta['provincia']; ?>"  />
				<!-- Población -->		
				<span style="text-align:left; margin-left:15px;">Municipio (*): </span>
				<input readonly="readonly" style="margin-left:15px;" class="campo_texto_blocked" name="poblacion" id="poblacion" type="text" size="52" title="Municipio" value="<?php echo  formatear_poblacion($row_consulta['poblacion']); ?>" onchange="modificado=true">
				<input type="hidden" name="poblacion" value="<?php echo  $row_consulta['poblacion']; ?>"  />
				<br  /><br  />
				<!-- Observaciones -->
				<span style="text-align:left">Observaciones: </span><br />
				<textarea name="observaciones" style="text-align:left; width:100%; margin-top:3px" id="observaciones" rows="6" title="Observaciones" onchange="modificado=true"><?php if($_POST['observaciones']) echo $_POST['observaciones']; else echo $row_consulta['observaciones']; ?></textarea>
			</div>
		</div>
		<br clear="all" /><br  />
		<!-- DATOS DE LA FICHA -->
		<p align="justify" class="titulo_seccion_datos">
			Datos de la ficha
		</p>
		<div style="float:left; margin:0 auto; text-align:left; width:100%;">
			<!-- Fecha -->	
			<span style="text-align:left;">Fecha (*): </span>
			<input class="campo_texto" name="fecha" id="fecha" style="margin-left:15px;" type="text" size="8" title="Fecha" value="<?php if($_POST['fecha']) {echo $_POST['fecha'];} else { echo cambiafecha_bd($row_consulta['fecha']); }  ?>" readonly="true" style="text-align:center">&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>calendar.gif" align="absmiddle" id="yyy" style="cursor:pointer" onclick="displayCalendar(document.forms[0].fecha,'dd/mm/yyyy',this)" />
		</div>
		<br clear="all" /><br  />
		<!-- DATOS DEL AGENTE COMERCIAL -->
		<p align="justify" class="titulo_seccion_datos">
			Datos del agente comercial
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?php echo  $_SESSION['rutaraiz']."app/usuarios/editar.php?usuario=".$nick_usuario;?>&enlace=<?php echo  $enlace; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>editar.gif" align="absmiddle" /></a>
		</p>
		<div style="float:left; margin:0 auto; text-align:left; width:100%;">
			<!-- Nombre -->	
			<span style="text-align:left;">Nombre (*): </span>
			<input readonly="readonly" class="campo_texto_blocked" style="margin-left:10px;" name="nombre_agente" id="nombre_agente" type="text" size="30" title="Nombre del agente comercial" value="<?php if($_POST['nombre_agente']) echo $_POST['nombre_agente']; else echo $row_consulta['nombre_agente']; ?>" >
			<!-- Apellidos -->	
			<span style="text-align:left; margin-left:20px;">Apellidos (*): </span>
			<input readonly="readonly" class="campo_texto_blocked" style="margin-left:10px;" name="apellidos_agente" id="apellidos_agente" type="text" size="40" title="Apellidos del agente comercial" value="<?php if($_POST['apellidos_agente']) echo $_POST['apellidos_agente'];  else echo $row_consulta['apellidos_agente']; ?>" >
			<!-- NIF -->	
			<span style="text-align:left; margin-left:20px;">NIF (*): </span>
			<input readonly="readonly" class="campo_texto_blocked" style="margin-left:10px;" name="nif_agente" id="nif_agente" type="text" size="15" title="NIF del agente comercial" value="<?php if($_POST['nif_agente']) echo $_POST['nif_agente']; else echo $row_consulta['nif_agente']; ?>" >
		</div>	
		<input type="hidden" name="cliente" value="<?php echo  $_GET['id']; ?>"  />
		<input type="hidden" name="agente" value="<?php echo  $row_consulta['agente']; ?>"  />
		<input type="hidden" name="id_ficha_visita" value="<?php echo  $_GET['id_ficha_visita']; ?>"  />