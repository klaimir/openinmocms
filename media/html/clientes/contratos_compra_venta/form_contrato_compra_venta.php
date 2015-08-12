		<p align="justify">Antes de rellenar el formulario asegúrese de que todos los datos sombreados han sido debidamente cumplimentados. En caso contrario, edite las secciones que considere oportunas para no tener que volver a introducirlos nuevamente:</p>
		<!-- DATOS DE VENDEDOR-->
		<p align="justify" class="titulo_seccion_datos">
			Datos del vendedor
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
			</div>
		</div>
		<br clear="all" /><br  />
		<!-- DATOS DE COMPRADOR-->
		<p align="justify" class="titulo_seccion_datos">
			Datos del comprador
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
			</div>
		</div>
		<br clear="all" /><br  />
		<!-- DATOS DE LA VIVIENDA -->
		<p align="justify" class="titulo_seccion_datos">
			Datos de la vivienda
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?php echo  $_SESSION['rutaraiz']."app/inmuebles/editar.php?id=".$_GET['inmueble'];?>&enlace=<?php echo  $enlace; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>editar.gif" align="absmiddle" /></a>
		</p>
		<div style="float:left; margin:0 auto; text-align:left; width:40%;">
			<!-- Precio -->	
			<span style="text-align:left;">Precio (*): </span>
			<br />
			<input class="campo_texto_blocked" readonly="readonly" name="precio" id="precio" type="text" size="20" title="Precio" value="<?php if($_POST['precio']) echo $_POST['precio']; else echo number_format($row_consulta['precio'], 2, ',', '.'); ?>" >
			<br  /><br  />
			<!-- Metros -->	
			<span style="text-align:left;">Metros (*): </span>
			<br />
			<input class="campo_texto_blocked" readonly="readonly" name="metros" id="metros" type="text" size="20" title="Metros" value="<?php if($_POST['metros']) echo $_POST['metros'];  else echo number_format($row_consulta['metros'], 2, ',', '.'); ?>" >
			<br  /><br  />
			<!-- Municipio -->		
			<span style="text-align:left;">Municipio (*): </span>
			<br />
			<input readonly="readonly" class="campo_texto_blocked" name="nombre_poblacion_vivienda" id="nombre_poblacion_vivienda" type="text" size="52" title="Municipio" value="<?php echo  formatear_poblacion($row_consulta['poblacion_vivienda']); ?>" onchange="modificado=true">
			<input type="hidden" name="poblacion_vivienda" value="<?php echo  $row_consulta['poblacion_vivienda']; ?>"  />
			<br  /><br  />
			<!-- Dirección vivienda -->	
			<span style="text-align:left;">Dirección vivienda (*): </span>
			<br />
			<input class="campo_texto_blocked" readonly="readonly" name="direccion_vivienda" id="direccion_vivienda" type="text" size="70" title="Dirección vivienda" value="<?php if($_POST['direccion_vivienda']) echo $_POST['direccion_vivienda'];  else echo $row_consulta['direccion_vivienda']; ?>" >
		</div>
		<div style="float:left; margin:0 auto; text-align:left; width:50%; border-left:1px dotted #999;">
			<div style="margin-left:15px">
				<!-- Consta de -->
				<span style="text-align:left">Consta de (*): </span>
				<br />
				<textarea class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="consta_de" style="text-align:left; width:100%; margin-top:3px" id="consa_de" rows="4" title="consta_de de" onchange="modificado=true"><?php if($_POST['consta_de']) echo $_POST['consta_de']; else echo $row_consulta['consta_de']; ?></textarea>
				<br /><br />
				<!-- Amueblado con -->
				<span style="text-align:left">Amueblado con (*): </span>
				<br />
				<textarea class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="amueblado" style="text-align:left; width:100%; margin-top:3px" id="amueblado" rows="4" title="Amueblado con" onchange="modificado=true"><?php if($_POST['amueblado']) echo $_POST['amueblado']; else echo $row_consulta['amueblado']; ?></textarea>
			</div>
		</div>
		<br clear="all" /><br  />
		<!-- DATOS DE REGISTRO -->
		<p align="justify" class="titulo_seccion_datos">Datos de Registro</p>
		<div style="float:left; margin:0 auto; text-align:left; width:40%;">
			<!-- Cantidad efectiva -->	
			<span style="text-align:left;">Cantidad efectiva (*): </span>
			<br />
			<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="cantidad_efectiva" id="cantidad_efectiva" type="text" size="20" title="Cantidad efectiva" value="<?php if($_POST['cantidad_efectiva']) echo $_POST['cantidad_efectiva']; else echo number_format($row_consulta['cantidad_efectiva'], 2, ',', '.'); ?>" >
			<br  /><br  />
			<!-- Cantidad para escritura -->	
			<span style="text-align:left;">Cantidad para escritura (*): </span>
			<br />
			<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="cantidad_escritura" id="cantidad_escritura" type="text" size="20" title="Cantidad para escritura" value="<?php if($_POST['cantidad_escritura']) echo $_POST['cantidad_escritura'];  else echo number_format($row_consulta['cantidad_escritura'], 2, ',', '.'); ?>" >
			<br  /><br  />
			<!-- Fecha de aplicación del contrato -->	
			<span style="text-align:left;">Fecha de aplicación del contrato (*): </span>
			<br />
			<input class="<?php echo  $class_campo; ?>" name="fecha" id="fecha" type="text" size="8" title="Fecha de aplicación del contrato" value="<?php if($_POST['fecha']) {echo $_POST['fecha'];} else { echo cambiafecha_bd($row_consulta['fecha']); }  ?>" readonly="true" style="text-align:center">
			<?php
			if($acceso_borrar_contrato>0)
			{
			?>
			&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>calendar.gif" align="absmiddle" id="yyy" style="cursor:pointer" onclick="displayCalendar(document.forms[0].fecha,'dd/mm/yyyy',this)" />
			<?php
			}
			?>
			<br  /><br  />
			<!-- Fecha límite en la que debe hacerse el documento público -->	
			<span style="text-align:left;">Fecha límite en la que debe hacerse el documento público (*): </span>
			<br />
			<input class="<?php echo  $class_campo; ?>" name="fecha_documento_publico" id="fecha_documento_publico" type="text" size="8" title="Fecha límite en la que debe hacerse el documento público" value="<?php if($_POST['fecha_documento_publico']) {echo $_POST['fecha_documento_publico'];} else { echo cambiafecha_bd($row_consulta['fecha_documento_publico']); }  ?>" readonly="true" style="text-align:center">
			<?php
			if($acceso_borrar_contrato>0)
			{
			?>
			&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>calendar.gif" align="absmiddle" id="yyy" style="cursor:pointer" onclick="displayCalendar(document.forms[0].fecha_documento_publico,'dd/mm/yyyy',this)" />
			<?php
			}
			?>
			<br  /><br  />
			<!-- Días para que se aplique la cláusula suspensiva -->	
			<span style="text-align:left;">Días para que se aplique la cláusula suspensiva (*): </span>
			<br />
			<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="dias_clausula_suspensiva" id="dias_clausula_suspensiva" type="text" size="5" title="Días para que se aplique la cláusula suspensiva" value="<?php if($_POST['dias_clausula_suspensiva']) echo $_POST['dias_clausula_suspensiva'];  else echo $row_consulta['dias_clausula_suspensiva']; ?>" >
			<br  /><br  />
			<!-- Estado -->
			<span style="text-align:left; float:left;">Estado (*): </span>
			<br  />
			<select id="estado" name="estado" class="campo_texto" style="float:left; ">
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
		</div>
		<div style="float:left; margin:0 auto; text-align:left; width:13%; border-left:1px dotted #999;">
			<div style="margin-left:15px">
				<!-- Número -->	
				<span style="text-align:left;">Número (*): </span>
				<br />
				<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="registro_numero" id="registro_numero" type="text" size="12" title="Número" value="<?php if($_POST['registro_numero']) echo $_POST['registro_numero']; else echo $row_consulta['registro_numero']; ?>" >
				<br  /><br  />
				<!-- Boletín -->	
				<span style="text-align:left;">Boletín (*): </span>
				<br />
				<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="registro_boletin" id="registro_boletin" type="text" size="12" title="Boletín" value="<?php if($_POST['registro_boletin']) echo $_POST['registro_boletin']; else echo $row_consulta['registro_boletin']; ?>" >
				<br  /><br  />
				<!-- Finca -->	
				<span style="text-align:left;">Finca (*): </span>
				<br />
				<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="registro_finca" id="registro_finca" type="text" size="12" title="Finca" value="<?php if($_POST['registro_finca']) echo $_POST['registro_finca']; else echo $row_consulta['registro_finca']; ?>" >
				<br  /><br  />
				<!-- Libro -->	
				<span style="text-align:left;">Libro (*): </span>
				<br />
				<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="registro_libro" id="registro_libro" type="text" size="12" title="Libro" value="<?php if($_POST['registro_libro']) echo $_POST['registro_libro']; else echo $row_consulta['registro_libro']; ?>" >
				<br  /><br  />
				<!-- Tomo -->	
				<span style="text-align:left;">Tomo (*): </span>
				<br />
				<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="registro_tomo" id="registro_tomo" type="text" size="12" title="Tomo" value="<?php if($_POST['registro_tomo']) echo $_POST['registro_tomo']; else echo $row_consulta['registro_tomo']; ?>" >
				<br  /><br  />
				<!-- Folio -->	
				<span style="text-align:left;">Folio (*): </span>
				<br />
				<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="registro_folio" id="registro_folio" type="text" size="12" title="Folio" value="<?php if($_POST['registro_folio']) echo $_POST['registro_folio']; else echo $row_consulta['registro_folio']; ?>" >
				<br  /><br  />
			</div>
		</div>
		<div style="float:left; margin:0 auto; text-align:left; width:45%; border-left:1px dotted #999;">
			<div style="margin-left:15px">
				<!-- Observaciones -->
				<span style="text-align:left">Observaciones: </span><br />
				<textarea class="campo_texto" name="observaciones" style="text-align:left; width:100%; margin-top:3px" id="observaciones" rows="20" title="Observaciones" onchange="modificado=true"><?php if($_POST['observaciones']) echo $_POST['observaciones']; else echo $row_consulta['observaciones']; ?></textarea>
			</div>
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
			<input readonly="readonly" class="campo_texto_blocked" style="margin-left:10px;" name="nombre_agente" id="nombre_agente" type="text" size="30" title="Nombre" value="<?php if($_POST['nombre_agente']) echo $_POST['nombre_agente']; else echo $row_consulta['nombre_agente']; ?>" >
			<!-- Apellidos -->	
			<span style="text-align:left; margin-left:20px;">Apellidos (*): </span>
			<input readonly="readonly" class="campo_texto_blocked" style="margin-left:10px;" name="apellidos_agente" id="apellidos_agente" type="text" size="40" title="Apellidos" value="<?php if($_POST['apellidos_agente']) echo $_POST['apellidos_agente'];  else echo $row_consulta['apellidos_agente']; ?>" >
			<!-- NIF -->	
			<span style="text-align:left; margin-left:20px;">NIF (*): </span>
			<input readonly="readonly" class="campo_texto_blocked" style="margin-left:10px;" name="nif_agente" id="nif_agente" type="text" size="15" title="NIF" value="<?php if($_POST['nif_agente']) echo $_POST['nif_agente']; else echo $row_consulta['nif_agente']; ?>" >
		</div>	
		<input type="hidden" name="cliente_vendedor" value="<?php echo  $_GET['id']; ?>"  />
		<input type="hidden" name="cliente_comprador" value="<?php echo  $_GET['cliente_comprador']; ?>"  />
		<input type="hidden" name="inmueble" value="<?php echo  $_GET['inmueble']; ?>"  />
		<input type="hidden" name="agente" value="<?php echo  $row_consulta['agente']; ?>"  />
		<input type="hidden" name="id_contrato_compra_venta" value="<?php echo  $_GET['id_contrato_compra_venta']; ?>"  />