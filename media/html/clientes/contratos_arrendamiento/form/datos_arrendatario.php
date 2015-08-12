		<!-- DATOS DE ARRENDATARIO -->
		<p align="justify" class="titulo_seccion_datos">
			Datos del arrendatario
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?php echo  $_SESSION['rutaraiz']."app/clientes/editar.php?id=".$id_cliente_comprador;?>&enlace=<?php echo  $enlace; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>editar.gif" align="absmiddle" /></a>
		</p>
		<div style="float:left; margin:0 auto; text-align:left; width:30%;">
			<!-- Nombre -->	
			<span style="text-align:left;">Nombre (*): </span>
			<br />
			<input class="campo_texto_blocked" readonly="readonly" name="nombre_comprador" id="nombre_comprador" type="text" size="20" title="Nombre" value="<?php if($_POST['nombre_comprador']) echo $_POST['nombre_comprador']; else echo $row_consulta['nombre_comprador']; ?>" >
			<br  /><br  />
			<!-- Apellidos -->	
			<span style="text-align:left;">Apellidos (*): </span>
			<br />
			<input class="campo_texto_blocked" readonly="readonly" name="apellidos_comprador" id="apellidos_comprador" type="text" size="30" title="Apellidos" value="<?php if($_POST['apellidos_comprador']) echo $_POST['apellidos_comprador'];  else echo $row_consulta['apellidos_comprador']; ?>" >
			<br  /><br  />
			<!-- NIF -->	
			<span style="text-align:left;">NIF (*): </span>
			<br />
			<input class="campo_texto_blocked" readonly="readonly" name="nif_comprador" id="nif_comprador" type="text" size="15" title="NIF" value="<?php if($_POST['nif_comprador']) echo $_POST['nif_comprador']; else echo $row_consulta['nif_comprador']; ?>" >
		</div>
		<div style="float:left; margin:0 auto; text-align:left; width:67%; border-left:1px dotted #999;">
			<div style="margin-left:15px">
				<!-- Provincia -->
				<span style="text-align:left;">Provincia (*): </span>
				<input readonly="readonly" style="margin-left:15px;" class="campo_texto_blocked" name="provincia_comprador" id="provincia_comprador" type="text" size="25" title="Provincia" value="<?php echo  formatear_provincia($row_consulta['provincia_comprador']); ?>" onchange="modificado=true">
				<input type="hidden" name="provincia_comprador" value="<?php echo  $row_consulta['provincia_comprador']; ?>"  />
				<!-- Población -->		
				<span style="text-align:left; margin-left:15px;">Municipio (*): </span>
				<input readonly="readonly" style="margin-left:15px;" class="campo_texto_blocked" name="poblacion_comprador" id="poblacion_comprador" type="text" size="52" title="Municipio" value="<?php echo  formatear_poblacion($row_consulta['poblacion_comprador']); ?>" onchange="modificado=true">
				<input type="hidden" name="poblacion_comprador" value="<?php echo  $row_consulta['poblacion_comprador']; ?>"  />
				<br /><br />
				<!-- Domicilio -->
				<span style="text-align:left">Domicilio (*): </span><br />
				<input readonly="readonly" class="campo_texto_blocked" name="domicilio_comprador" id="domicilio_comprador" type="text" size="135" title="Domicilio" value="<?php if($_POST['domicilio_comprador']) echo $_POST['domicilio_comprador']; else echo $row_consulta['domicilio_comprador']; ?>" onchange="modificado=true">
				<br  /><br  />
				<!-- Estado civil -->	
				<span style="text-align:left;">Estado civil (*): </span>
				<br />
				<input class="campo_texto_blocked" readonly="readonly" name="estado_civil_comprador" id="estado_civil_comprador" type="text" size="20" title="Estado civil" value="<?php if($_POST['estado_civil_comprador']) echo $_POST['estado_civil_comprador']; else echo $row_consulta['estado_civil_comprador']; ?>" >
			</div>
		</div>