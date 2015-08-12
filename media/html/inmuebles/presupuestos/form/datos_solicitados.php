		<!-- DATOS SOLICITADOS -->
		<p align="justify" class="titulo_seccion_datos">
			Datos solicitados
		</p>
		<div style="float:left; margin:0 auto; text-align:left; width:100%;">
			<!-- Importe solicitado -->	
			<span style="text-align:left;">Importe solicitado (*): </span>
			<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="importe_solicitado" id="importe_solicitado" type="text" style="margin-left:10px;" size="10" title="Importe solicitado" value="<?php if($_POST['importe_solicitado']) echo $_POST['importe_solicitado']; else echo number_format($row_consulta['importe_solicitado'], 2, ',', '.'); ?>" >
			<!-- Precio Vivienda -->	
			<span style="text-align:left; margin-left:10px;">Precio (*): </span>
			<input class="campo_texto_blocked" readonly="readonly" name="precio_vivienda" id="precio_vivienda" type="text" style="margin-left:15px;" size="10" title="Precio Inmueble" value="<?php if($_POST['precio_vivienda']) echo $_POST['precio_vivienda']; else echo number_format($row_consulta['precio_vivienda'], 2, ',', '.'); ?>" >
			<!-- Impuesto A.J.D. -->	
			<span style="text-align:left; margin-left:10px;">Impuesto A.J.D. (*): </span>
			<input class="campo_texto_blocked" readonly="readonly" name="iajd" id="iajd" type="text" style="margin-left:10px;" size="3" title="Impuesto de Actos Jurídicos Documentados" value="<?php if($_POST['iajd']) echo $_POST['iajd']; else echo number_format($row_consulta['iajd'], 2, ',', '.'); ?>" >
			<!-- Comunidad Autónoma -->	
			<span style="text-align:left; margin-left:10px;">Comunidad (*): </span>
			<input class="campo_texto_blocked" readonly="readonly" name="comunidad_autonoma" id="comunidad_autonoma" type="text" style="margin-left:15px;" size="20" title="Comunidad Autónoma" value="<?php echo formatear_comunidad_autonoma($row_consulta['comunidad_autonoma']); ?>" >
			<!-- Fecha -->	
			<span style="text-align:left;  margin-left:10px;">Fecha (*):</span>
			<input class="campo_texto_blocked" name="fecha" id="fecha" type="text" size="8" title="Fecha" value="<?php echo  cambiafecha_bd($row_consulta['fecha']); ?>" readonly="true" style="text-align:center">
		</div>