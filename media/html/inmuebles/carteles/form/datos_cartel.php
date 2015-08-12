		<!-- DATOS DE PRESUPUESTO -->
		<p align="justify" class="titulo_seccion_datos">Datos de Cartel</p>
		<div style="float:left; margin:0 auto; text-align:left; width:100%;">
			<!-- Fecha -->	
			<span style="text-align:left;">Fecha (*):</span>
			<input class="campo_texto_blocked" name="fecha" id="fecha" type="text" size="8" title="Fecha" value="<?php echo  cambiafecha_bd($row_consulta['fecha']); ?>" readonly="true" style="text-align:center; margin-left:15px;">
			<!-- Formato -->
			<span style="text-align:left; margin-left:15px;">Formato: </span>
			<select id="tipo_cartel" name="tipo_cartel" class="campo_texto" style="text-align:left; margin-left:15px;">
			<option value="" <?php if ($_POST) { if ($_POST['tipo_cartel'] == "") echo "selected"; } else { if($row_consulta['tipo_cartel'] == "") echo "selected"; } ?>>Seleccione tipo ...</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['tipo_cartel'] == $tipo_cartel['id_tipo_cartel']) echo "selected"; } else { if($row_consulta['tipo_cartel'] == $tipo_cartel['id_tipo_cartel']) echo "selected"; } ?> value="<?php echo  $tipo_cartel['id_tipo_cartel'];?>"><?php echo  $tipo_cartel['nombre_tipo'];?></option>
			<?php
				} while ($tipo_cartel = $tipos_cartel->FetchRow());
			?>
			</select>
			<!-- Disposición -->
			<span style="text-align:left; margin-left:15px;">Disposición: </span>
			<select id="disposicion_fotos" name="disposicion_fotos" class="campo_texto" style="text-align:left; margin-left:15px;">
				<option value="" <?php if ($_POST) { if ($_POST['disposicion_fotos'] == "") echo "selected"; } else { if($row_consulta['disposicion_fotos'] == "") echo "selected"; } ?>>Seleccione disposición ...</option>
				<option <?php if ($_POST) { if ($_POST['disposicion_fotos'] == "juntas") echo "selected"; } else { if($row_consulta['disposicion_fotos'] == "juntas") echo "selected"; } ?> value="juntas">juntas</option>
				<option <?php if ($_POST) { if ($_POST['disposicion_fotos'] == "separadas") echo "selected"; } else { if($row_consulta['disposicion_fotos'] == "separadas") echo "selected"; } ?> value="separadas">separadas</option>
			</select>
			<!-- Opcion -->
			<span style="text-align:left; margin-left:15px;">Opción: </span>
			<select id="opcion_vivienda" name="opcion_vivienda" class="campo_texto" style="text-align:left; margin-left:15px;">
			<option value="" <?php if ($_POST) { if ($_POST['opcion_vivienda'] == "") echo "selected"; } else { if($row_consulta['opcion_vivienda'] == "") echo "selected"; } ?>>Seleccione tipo ...</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['opcion_vivienda'] == $opcion['id_opcion']) echo "selected"; } else { if($row_consulta['opcion_vivienda'] == $opcion['id_opcion']) echo "selected"; } ?> value="<?php echo  $opcion['id_opcion'];?>"><?php echo  $opcion['nombre_opcion'];?></option>
			<?php
				} while ($opcion = $opciones->FetchRow());
			?>
			</select>
			<br /><br />
			<!-- Máxima Anchura -->	
			<span style="text-align:left;">Máxima Anchura (*): </span>
			<input class="campo_texto" name="max_anchura" id="max_anchura" type="text" style="margin-left:10px;" size="5" title="Máxima Anchura que ocupará una fotografía" value="<?php if($_POST['max_anchura']) echo $_POST['max_anchura']; else echo number_format($row_consulta['max_anchura'], 2, ',', '.'); ?>" >
			<!-- Máxima Altura -->	
			<span style="text-align:left; margin-left:10px;">Máxima Altura (*): </span>
			<input class="campo_texto" name="max_altura" id="max_altura" type="text" style="margin-left:10px;" size="5" title="Máxima Altura que ocupará una fotografía" value="<?php if($_POST['max_altura']) echo $_POST['max_altura']; else echo number_format($row_consulta['max_altura'], 2, ',', '.'); ?>" >
			<br  /><br  />
			<!-- Observaciones -->
			<span style="text-align:left">Observaciones: </span><br />
			<textarea class="campo_texto" name="observaciones" style="text-align:left; width:100%; margin-top:3px" id="observaciones" rows="6" title="Observaciones" onchange="modificado=true"><?php if($_POST['observaciones']) echo $_POST['observaciones']; else echo $row_consulta['observaciones']; ?></textarea>
		</div>