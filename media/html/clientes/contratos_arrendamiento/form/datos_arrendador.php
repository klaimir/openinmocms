		<p align="justify">Antes de rellenar el formulario asegúrese de que todos los datos sombreados han sido debidamente cumplimentados. En caso contrario, edite las secciones que considere oportunas para no tener que volver a introducirlos nuevamente:</p>
		<!-- DATOS DE ARRENDADOR -->
		<p align="justify" class="titulo_seccion_datos">
			Datos del arrendador
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?php echo  $_SESSION['rutaraiz']."app/clientes/editar.php?id=".$_GET['id'];?>&enlace=<?php echo  $enlace; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>editar.gif" align="absmiddle" /></a>
		</p>
		<div style="float:left; margin:0 auto; text-align:left; width:30%;">
			<!-- Nombre -->	
			<span style="text-align:left;">Nombre (*): </span>
			<br />
			<input class="campo_texto_blocked" readonly="readonly" name="nombre" id="nombre" type="text" size="20" title="Nombre" value="<?php if($_POST['nombre']) echo $_POST['nombre']; else echo $row_consulta['nombre']; ?>" >
			<br  /><br  />
			<!-- Apellidos -->	
			<span style="text-align:left;">Apellidos (*): </span>
			<br />
			<input class="campo_texto_blocked" readonly="readonly" name="apellidos" id="apellidos" type="text" size="30" title="Apellidos" value="<?php if($_POST['apellidos']) echo $_POST['apellidos'];  else echo $row_consulta['apellidos']; ?>" >
			<br  /><br  />
			<!-- NIF -->	
			<span style="text-align:left;">NIF (*): </span>
			<br />
			<input class="campo_texto_blocked" readonly="readonly" name="nif" id="nif" type="text" size="15" title="NIF" value="<?php if($_POST['nif']) echo $_POST['nif']; else echo $row_consulta['nif']; ?>" >
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
				<br /><br />
				<!-- Domicilio -->
				<span style="text-align:left">Domicilio (*): </span><br />
				<input readonly="readonly" class="campo_texto_blocked" name="domicilio" id="domicilio" type="text" size="135" title="Domicilio" value="<?php if($_POST['domicilio']) echo $_POST['domicilio']; else echo $row_consulta['domicilio']; ?>" onchange="modificado=true">
				<br  /><br  />
				<!-- Estado civil -->	
				<span style="text-align:left;">Estado civil (*): </span>
				<br />
				<input class="campo_texto_blocked" readonly="readonly" name="estado_civil" id="estado_civil" type="text" size="20" title="Estado civil" value="<?php if($_POST['estado_civil']) echo $_POST['estado_civil']; else echo $row_consulta['estado_civil']; ?>" >
			</div>
		</div>