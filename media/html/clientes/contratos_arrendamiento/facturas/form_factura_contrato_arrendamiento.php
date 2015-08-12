		<!-- DATOS DE VENDEDOR-->
		<p align="justify" class="titulo_seccion_datos">
			Datos del vendedor
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
				<!-- Estado -->
				<span style="text-align:left; float:left;">Estado (*): </span>
				<br  />
				<select id="estado" name="estado" class="campo_texto" style="float:left; ">
					<option value="" <?php if ($_POST) { if ($_POST['estado'] == '') echo "selected"; } else { if($row_consulta['estado'] == "") echo "selected"; } ?>>Seleccione estado...</option>
					<option value="Firmada" <?php if ($_POST) { if ($_POST['estado'] == 'Firmada') echo "selected"; } else { if($row_consulta['estado'] == "Firmada") echo "selected"; } ?>>Firmada</option>
					<option value="Pendiente de firma" <?php if ($_POST) { if ($_POST['estado'] == 'Pendiente de firma') echo "selected"; } else { if($row_consulta['estado'] == "Pendiente de firma") echo "selected"; } ?>>Pendiente de firma</option>
				</select>
			</div>
		</div>
		<br clear="all" /><br  />
		<!-- DATOS DE REGISTRO -->
		<p align="justify" class="titulo_seccion_datos">Datos de Registro</p>
		<div style="float:left; margin:0 auto; text-align:left; width:100%;">
		    <!-- Fecha -->	
			<span style="text-align:left;">Fecha (*): </span>
			<input class="campo_texto" name="fecha_emision" id="fecha_emision" type="text" size="8" title="Fecha límite en la que debe hacerse el documento público" value="<?php if($_POST['fecha_emision']) {echo $_POST['fecha_emision'];} else { echo cambiafecha_bd($row_consulta['fecha_emision']); }  ?>" readonly="true" style="text-align:center">
			<?php
			if($row_consulta['estado']!="Firmada")
			{
			?>
			&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>calendar.gif" align="absmiddle" id="yyy" style="cursor:pointer" onclick="displayCalendar(document.forms[0].fecha_emision,'dd/mm/yyyy',this)" />
			<?php
			}
			?>
			<!-- Cantidad parcial -->	
			<span style="margin-left:15px; text-align:left;">Cantidad parcial (*): </span>
			<input class="campo_texto_blocked" style="margin-left:15px;" name="cantidad_parcial" id="cantidad_parcial" readonly="readonly" type="text" size="15" title="Cantidad parcial" value="<?php if($_POST['cantidad_parcial']) echo $_POST['cantidad_parcial']; else echo number_format($row_consulta['cantidad_parcial'], 2, ',', '.'); ?>" >
			<!-- IVA -->	
			<span style="margin-left:15px; text-align:left;">IVA (*): </span>
			<input class="campo_texto_blocked" style="margin-left:15px;" name="iva" id="iva" readonly="readonly" type="text" size="5" title="IVA" value="<?php if($_POST['iva']) echo $_POST['iva']; else echo number_format($row_consulta['iva'], 2, ',', '.'); ?>" >
			<input class="campo_texto_blocked" style="margin-left:10px;" name="cantidad_iva" id="cantidad_iva" readonly="readonly" type="text" size="5" title="Cantidad aplicada de IVA" value="<?php if($_POST['cantidad_iva']) echo $_POST['cantidad_iva']; else echo number_format($row_consulta['cantidad_iva'], 2, ',', '.'); ?>" >
			<!-- Cantidad total -->	
			<span style="margin-left:15px; text-align:left;">Cantidad total (*): </span>
			<input class="campo_texto_blocked" style="margin-left:15px;" name="cantidad_total" id="cantidad_total" readonly="readonly" type="text" size="15" title="Cantidad total" value="<?php if($_POST['cantidad_total']) echo $_POST['cantidad_total'];  else echo number_format($row_consulta['cantidad_total'], 2, ',', '.'); ?>" >
			<br  /><br  />
			<!-- Observaciones -->
			<span style="text-align:left">Observaciones: </span><br />
			<textarea name="observaciones" style="text-align:left; width:100%; margin-top:3px" id="observaciones" rows="6" title="Observaciones" onchange="modificado=true"><?php if($_POST['observaciones']) echo $_POST['observaciones']; else echo $row_consulta['observaciones']; ?></textarea>
		</div>
		<br clear="all" /><br  />
		<input type="hidden" name="contrato_arrendamiento" value="<?php echo  $_GET['contrato_arrendamiento']; ?>"  />