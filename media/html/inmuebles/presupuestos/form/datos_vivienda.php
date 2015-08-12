		<!-- DATOS DE LA VIVIENDA -->
		<p align="justify" class="titulo_seccion_datos">
			Datos de la vivienda
		</p>
		<div style="float:left; margin:0 auto; text-align:left; width:100%;">
			<!-- Provincia -->
			<span style="text-align:left;">Provincia (*): </span>
			<input readonly="readonly" style="margin-left:15px;" class="campo_texto_blocked" name="nombre_provincia_vivienda" id="nombre_provincia_vivienda" type="text" size="10" title="Provincia" value="<?php echo  formatear_provincia($row_consulta['provincia_vivienda']); ?>" onchange="modificado=true">
			<input type="hidden" name="provincia_vivienda" value="<?php echo  $row_consulta['provincia_vivienda']; ?>"  />
			<!-- Población -->		
			<span style="text-align:left; margin-left:15px;">Municipio (*): </span>
			<input readonly="readonly" style="margin-left:15px;" class="campo_texto_blocked" name="nombre_poblacion_vivienda" id="nombre_poblacion_vivienda" type="text" size="45" title="Municipio" value="<?php echo  formatear_poblacion($row_consulta['poblacion_vivienda']); ?>" onchange="modificado=true">
			<input type="hidden" name="poblacion_vivienda" value="<?php echo  $row_consulta['poblacion_vivienda']; ?>"  />
			<!-- Dirección vivienda -->	
			<span style="text-align:left; margin-left:15px;">Dirección (*): </span>
			<input class="campo_texto_blocked" readonly="readonly" name="direccion_vivienda" id="direccion_vivienda" type="text" size="70" title="Dirección vivienda" value="<?php if($_POST['direccion_vivienda']) echo $_POST['direccion_vivienda'];  else echo $row_consulta['direccion_vivienda']; ?>" >
		</div>