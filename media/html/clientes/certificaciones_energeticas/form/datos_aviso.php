		<!-- DATOS DE CONTRATO -->
		<p align="justify" class="titulo_seccion_datos">Datos de Contrato</p>
		<div style="float:left; margin:0 auto; text-align:left; width:100%;">
			<!-- Fecha -->	
			<span style="text-align:left;">Fecha (*): </span>
			<input class="<?php echo  $class_campo; ?>" style="margin-left:10px;" name="fecha" id="fecha" type="text" size="8" title="Fecha finalización" value="<?php if($_POST['fecha']) {echo $_POST['fecha'];} else { echo cambiafecha_bd($row_consulta['fecha']); }  ?>" readonly="true" style="text-align:center">
			<?php
			if($acceso_borrar>0)
			{
			?>
			&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>calendar.gif" align="absmiddle" id="yyy" style="cursor:pointer" onclick="displayCalendar(document.forms[0].fecha,'dd/mm/yyyy',this)" />
			<?php
			}
			?>
			<!-- Estado -->
			<span style="text-align:left; margin-left:15px;">Estado (*): </span>
			<select id="estado" name="estado" class="campo_texto" style=" margin-left:10px;">
				<?php
				if($acceso_cambiar_estado)
				{
				?>
				<option value="" <?php if ($_POST) { if ($_POST['estado'] == '') echo "selected"; } else { if($row_consulta['estado'] == "") echo "selected"; } ?>>Seleccione estado...</option>
				<?php
				}
				?>
				<option value="Firmado" <?php if ($_POST) { if ($_POST['estado'] == 'Firmado') echo "selected"; } else { if($row_consulta['estado'] == "Firmado") echo "selected"; } ?>>Firmado</option>
				<?php
				if($acceso_cambiar_estado)
				{
				?>
				<option value="Pendiente de firma" <?php if ($_POST) { if ($_POST['estado'] == 'Pendiente de firma') echo "selected"; } else { if($row_consulta['estado'] == "Pendiente de firma") echo "selected"; } ?>>Pendiente de firma</option>
				<?php
				}
				?>
			</select>
			<br  /><br  />
			<!-- Observaciones -->
			<span style="text-align:left">Observaciones: </span><br />
			<textarea class="campo_texto" name="observaciones" style="text-align:left; width:100%; margin-top:3px" id="observaciones" rows="6" title="Observaciones" onchange="modificado=true"><?php if($_POST['observaciones']) echo $_POST['observaciones']; else echo $row_consulta['observaciones']; ?></textarea>
		</div>