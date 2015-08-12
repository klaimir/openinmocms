		<!-- DATOS DE CONTRATO -->
		<p align="justify" class="titulo_seccion_datos">Datos de Contrato</p>
		<div style="float:left; margin:0 auto; text-align:left; width:100%;">
			<!-- Cuota mensual -->	
			<span style="text-align:left;">Cuota mensual (*): </span>
			<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="cuota_mensual" id="cuota_mensual" type="text" style="margin-left:15px;" size="15" title="Cuota mensual" value="<?php if($_POST['cuota_mensual']) echo $_POST['cuota_mensual']; else echo number_format($row_consulta['cuota_mensual'], 2, ',', '.'); ?>" >
			<?php
			if($row_consulta['tipo_arrendamiento']==2 || $row_consulta['tipo_arrendamiento']==3)
			{
			?>
			<!-- Cuota total -->	
			<span style="text-align:left;  margin-left:10px;">Cuota total (*): </span>
			<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="cuota_total" id="cuota_total" type="text" style="margin-left:15px;" size="15" title="Cuota total" value="<?php if($_POST['cuota_total']) echo $_POST['cuota_total']; else echo number_format($row_consulta['cuota_total'], 2, ',', '.'); ?>" >
			<?php
			}
			?>	
			<!-- Fecha inicio -->	
			<span style="text-align:left; margin-left:10px;">Fecha inicio (*): </span>
			<input class="<?php echo  $class_campo; ?>" style="margin-left:10px;" name="fecha_inicio_contrato" id="fecha_inicio_contrato" type="text" size="8" title="Fecha inicio" value="<?php if($_POST['fecha_inicio_contrato']) {echo $_POST['fecha_inicio_contrato'];} else { echo cambiafecha_bd($row_consulta['fecha_inicio_contrato']); }  ?>" readonly="true" style="text-align:center">
			<?php
			if($acceso_borrar_contrato>0)
			{
			?>
			&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>calendar.gif" align="absmiddle" id="yyy" style="cursor:pointer" onclick="displayCalendar(document.forms[0].fecha_inicio_contrato,'dd/mm/yyyy',this)" />
			<?php
			}
			?>
			<!-- Fecha finalización -->	
			<span style="text-align:left; margin-left:15px;">Fecha finalización (*): </span>
			<input class="<?php echo  $class_campo; ?>" style="margin-left:10px;" name="fecha_fin_contrato" id="fecha_fin_contrato" type="text" size="8" title="Fecha finalización" value="<?php if($_POST['fecha_inicio_contrato']) {echo $_POST['fecha_fin_contrato'];} else { echo cambiafecha_bd($row_consulta['fecha_fin_contrato']); }  ?>" readonly="true" style="text-align:center">
			<?php
			if($acceso_borrar_contrato>0)
			{
			?>
			&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>calendar.gif" align="absmiddle" id="yyy" style="cursor:pointer" onclick="displayCalendar(document.forms[0].fecha_fin_contrato,'dd/mm/yyyy',this)" />
			<?php
			}
			?>
			<?php
			if($row_consulta['tipo_arrendamiento']==1)
			{
			?>
				<!-- Fecha primer pago -->	
				<span style="text-align:left; margin-left:15px;">Fecha primer pago (*): </span>
				<input class="<?php echo  $class_campo; ?>" style="margin-left:10px;" name="fecha_primer_pago" id="fecha_primer_pago" type="text" size="8" title="Fecha primer pago" value="<?php if($_POST['fecha_primer_pago']) {echo $_POST['fecha_primer_pago'];} else { echo cambiafecha_bd($row_consulta['fecha_primer_pago']); }  ?>" readonly="true" style="text-align:center">
				<?php
				if($acceso_borrar_contrato>0)
				{
				?>
				&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>calendar.gif" align="absmiddle" id="yyy" style="cursor:pointer" onclick="displayCalendar(document.forms[0].fecha_primer_pago,'dd/mm/yyyy',this)" />
				<?php
				}
				?>
			<?php
			}
			?>
			<?php
			if($row_consulta['tipo_arrendamiento']==2 || $row_consulta['tipo_arrendamiento']==3)
			{
			?>
			<br  /><br  />
			<!-- Número de cuenta para realizar ingresos -->	
			<span style="text-align:left;">Número de cuenta (*): </span>
			<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="banco" id="banco" type="text" size="2" title="Entidad bancaria" value="<?php if($_POST['banco']) echo $_POST['banco'];  else { echo $row_consulta['banco']; } ?>"  style="margin-left:15px" maxlength="4" onchange="modificado=true;" onkeypress="return solamenteNumero(event);">&nbsp;&nbsp;
			<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="sucursal" id="sucursal" type="text" size="2" title="Sucursal" value="<?php if($_POST['sucursal']) echo $_POST['sucursal']; else { echo $row_consulta['sucursal']; } ?>"  style="margin-left:5px" maxlength="4" onchange="modificado=true;" onkeypress="return solamenteNumero(event);">&nbsp;&nbsp;
			<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="dc" id="dc" type="text" size="1" title="Dígito de control" value="<?php if($_POST['dc']) echo $_POST['dc']; else { echo $row_consulta['dc']; } ?>"  style="margin-left:5px" maxlength="2" onchange="modificado=true;" onkeypress="return solamenteNumero(event);">&nbsp;&nbsp;
			<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="cuenta" id="cuenta" type="text" size="12" title="Nº de cuenta" value="<?php if($_POST['cuenta']) echo $_POST['cuenta']; else { echo $row_consulta['cuenta']; } ?>"  style="margin-left:5px" maxlength="10" onchange="modificado=true;" onkeypress="return solamenteNumero(event);">
				<?php
				if($row_consulta['tipo_arrendamiento']==3)
				{
				?>
					<!-- Mes de actualización de renta -->	
					<span style="text-align:left; margin-left:15px;">Mes de actualización de renta (*): </span>
					<?php
					if($acceso_borrar_contrato>0)
					{
					?>
					<select id="mes_actualizacion_renta" name="mes_actualizacion_renta" class="campo_texto">
					<option value="" <?php if ($_POST) { if ($_POST['mes_actualizacion_renta'] == "") echo "selected"; } else { if($row_consulta['mes_actualizacion_renta'] == "") echo "selected"; } ?>>Seleccione mes ...</option>
					<?php
						do
						{
					?>
							<option <?php if ($_POST) { if ($_POST['mes_actualizacion_renta'] == $mes['id_mes']) echo "selected"; } else { if($row_consulta['mes_actualizacion_renta'] == $mes['id_mes']) echo "selected"; } ?> value="<?php echo  $mes['id_mes'];?>"><?php echo  $mes['nombre_mes'];?></option>
					<?php
						} while ($mes = $meses->FetchRow());
					?>
					</select>
					<?php
					}
					else
					{
					?>
						<strong style="text-align:left; margin-left:10px;"><?php echo  formatear_mes($row_consulta['mes_actualizacion_renta']); ?></strong>
						<input type="hidden" name="mes_actualizacion_renta" value="<?php echo  $row_consulta['mes_actualizacion_renta']; ?>"  />
					<?php
					}
					?>
				<?php
				}
				?>
				&nbsp;&nbsp;&nbsp;&nbsp;
			<?php
			}
			?>
			<?php
			if($row_consulta['tipo_arrendamiento']==1)
			{
			?>
			<br  /><br  />
			<?php
			}
			?>
			<!-- Estado -->
			<span style="text-align:left;">Estado (*): </span>
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