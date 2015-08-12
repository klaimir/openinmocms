		<!-- DATOS DE LA VIVIENDA -->
		<p align="justify" class="titulo_seccion_datos">
			Datos de la vivienda
		</p>
		<div style="float:left; margin:0 auto; text-align:left; width:100%;">
			<!-- Población -->		
			<span style="text-align:left;">Municipio (*): </span>
			<input readonly="readonly" class="campo_texto_blocked" style="margin-left:15px;" name="nombre_poblacion" id="nombre_poblacion" type="text" size="35" title="Municipio" value="<?php echo  formatear_poblacion($row_consulta['poblacion']); ?>" onchange="modificado=true">
			<input type="hidden" name="poblacion" value="<?php echo  $row_consulta['poblacion']; ?>"  />
			<!-- Zona -->		
			<span style="text-align:left; margin-left:15px;">Zona: </span>
			<input readonly="readonly" class="campo_texto_blocked" style="margin-left:15px;" name="nombre_zona" id="nombre_zona" type="text" size="35" title="Zona" value="<?php echo  formatear_zona($row_consulta['zona']); ?>" onchange="modificado=true">
			<input type="hidden" name="zona" value="<?php echo  $row_consulta['zona']; ?>"  />
			<!-- Dirección vivienda -->	
			<span style="text-align:left; margin-left:15px;">Dirección (*): </span>
			<input class="campo_texto_blocked" style="margin-left:15px;" readonly="readonly" name="direccion" id="direccion" type="text" size="60" title="Dirección vivienda" value="<?php if($_POST['direccion']) echo $_POST['direccion'];  else echo $row_consulta['direccion']; ?>" >
			<br  /><br  />
			<!-- Precio compra Vivienda -->	
			<span style="text-align:left;">Precio compra (*): </span>
			<input class="campo_texto_blocked" readonly="readonly" name="precio_compra" id="precio_compra" type="text" style="margin-left:10px;" size="10" title="Precio compra Inmueble" value="<?php if($_POST['precio_compra']) echo $_POST['precio_compra']; else echo number_format($row_consulta['precio_compra'], 2, ',', '.'); ?>" >
			<!-- Precio alquiler Vivienda -->	
			<span style="text-align:left; margin-left:10px;">Precio alquiler (*): </span>
			<input class="campo_texto_blocked" readonly="readonly" name="precio_alquiler" id="precio_alquiler" type="text" style="margin-left:10px;" size="10" title="Precio alquiler Inmueble" value="<?php if($_POST['precio_alquiler']) echo $_POST['precio_alquiler']; else echo number_format($row_consulta['precio_alquiler'], 2, ',', '.'); ?>" >
			<!-- Metros -->	
			<span style="text-align:left; margin-left:10px;">Metros (*): </span>
			<input class="campo_texto_blocked" readonly="readonly" name="metros" id="metros" type="text" style="margin-left:10px;" size="6" title="Metros" value="<?php if($_POST['metros']) echo $_POST['metros']; else echo number_format($row_consulta['metros'], 2, ',', '.'); ?>" >
			<!-- Habitaciones -->	
			<span style="text-align:left; margin-left:10px;">Habitaciones: </span>
			<input class="campo_texto_blocked" readonly="readonly" name="habitaciones" id="habitaciones" type="text" style="margin-left:10px;" size="2" title="Habitaciones" value="<?php if($_POST['habitaciones']) echo $_POST['habitaciones']; else echo $row_consulta['habitaciones']; ?>" >
			<!-- Baños -->	
			<span style="text-align:left; margin-left:10px;">Baños: </span>
			<input class="campo_texto_blocked" readonly="readonly" name="banios" id="banios" type="text" style="margin-left:10px;" size="2" title="Baños" value="<?php if($_POST['banios']) echo $_POST['banios']; else echo $row_consulta['banios']; ?>" >
			<!-- Certificación -->	
			<span style="text-align:left; margin-left:10px;">Certificación: </span>
			<input class="campo_texto_blocked" readonly="readonly" name="nombre_certificacion_energetica" id="nombre_certificacion_energetica" type="text" style="margin-left:10px;" size="2" title="Certificación energética" value="<?php echo  formatear_tipo_certificacion_energetica($row_consulta['certificacion_energetica']); ?>" >
			<input type="hidden" name="certificacion_energetica" value="<?php echo  $row_consulta['certificacion_energetica']; ?>"  />
		</div>