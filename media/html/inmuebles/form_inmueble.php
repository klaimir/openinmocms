		<p class="titulo_seccion_datos">Información General</p>	
		<!-- Precio compra -->
		<span style="text-align:left; float:left;">Precio compra (*):</span>
		<input class="<?php echo  $class_campo; ?>" name="precio_compra" id="precio_compra" <?php echo  $readonly; ?> style="float:left; margin-left:15px;" type="text" size="15" title="Precio" value="<?php if($_POST['precio_compra']) echo $_POST['precio_compra']; else echo number_format($row_consulta['precio_compra'], 2, ',', '.'); ?>" onchange="modificado=true">
		<!-- Precio alquiler -->
		<span style="text-align:left; float:left; margin-left:15px;">Precio alquiler (*):</span>
		<input class="<?php echo  $class_campo; ?>" style="text-align:left; float:left; margin-left:15px;" name="precio_alquiler" id="precio_alquiler" <?php echo  $readonly; ?> type="text" size="15" title="Precio" value="<?php if($_POST['precio_alquiler']) echo $_POST['precio_alquiler']; else echo number_format($row_consulta['precio_alquiler'], 2, ',', '.'); ?>" onchange="modificado=true">
		<!-- Tipos -->
		<span style="text-align:left; float:left; margin-left:15px;">Tipologia (*): </span>
		<?php
		if($row_consulta['estado']=="activo")
		{
		?>
		<select id="tipo" name="tipo" class="<?php echo  $class_campo; ?>" style="text-align:left; float:left; margin-left:15px;">
		<option value="" <?php if ($_POST) { if ($_POST['tipo'] == "") echo "selected"; } else { if($row_consulta['tipo'] == "") echo "selected"; } ?>>Seleccione tipología ...</option>
		<?php
			do
			{
		?>
				<option <?php if ($_POST) { if ($_POST['tipo'] == $tipo['id_tipo']) echo "selected"; } else { if($row_consulta['tipo'] == $tipo['id_tipo']) echo "selected"; } ?> value="<?php echo  $tipo['id_tipo'];?>"><?php echo  $tipo['nombre_tipo'];?></option>
		<?php
			} while ($tipo = $tipos->FetchRow());
		?>
		</select>
		<?php
		}
		else
		{
		?>
			<input class="<?php echo  $class_campo; ?>" name="nombre_tipo" id="nombre_tipo" <?php echo  $readonly; ?> style="float:left; margin-left:15px;" type="text" size="15" title="Nombre de tipología" value="<?php echo  formatear_tipo($row_consulta['tipo']); ?>" onchange="modificado=true">
			<input type="hidden" name="tipo" value="<?php echo  $row_consulta['tipo']; ?>"  />
		<?php
		}
		?>
		<!-- Antigüedad -->
		<span style="text-align:left; float:left; margin-left:15px;">Antigüedad: </span>
		<?php
		if($row_consulta['estado']=="activo")
		{
		?>
		<select id="antiguedad" name="antiguedad" class="campo_texto" style="text-align:left; float:left; margin-left:15px;">
			<option value="inmueble_usado" <?php if ($_POST) { if ($_POST['antiguedad'] == 'inmueble_usado') echo "selected"; } else { if($row_consulta['antiguedad'] == "inmueble_usado") echo "selected"; } ?>>Inmueble usado</option>
			<option value="nuevo_inmueble" <?php if ($_POST) { if ($_POST['antiguedad'] == 'nuevo_inmueble') echo "selected"; } else { if($row_consulta['antiguedad'] == "nuevo_inmueble") echo "selected"; } ?>>Nuevo inmueble</option>
		</select>
		<?php
		}
		else
		{
		?>
			<input class="<?php echo  $class_campo; ?>" name="nombre_antiguedad" id="nombre_antiguedad" <?php echo  $readonly; ?> style="float:left; margin-left:15px;" type="text" size="15" title="Nombre de antigüedad" value="<?php echo  formatear_antiguedad_inmueble($row_consulta['antiguedad']); ?>" onchange="modificado=true">
			<input type="hidden" name="antiguedad" value="<?php echo  $row_consulta['antiguedad']; ?>"  />
		<?php
		}
		?>
		<br  /><br  />
		<!-- Observaciones -->
		<span style="text-align:left">Observaciones: </span><br />
		<textarea name="observaciones" class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> style="text-align:left; width:100%; margin-top:3px" id="observaciones" rows="5" title="Observaciones" onchange="modificado=true"><?php if($_POST['observaciones']) echo $_POST['observaciones']; else echo $row_consulta['observaciones']; ?></textarea>
		<br clear="all" />
		<p class="titulo_seccion_datos">Características</p>	
		<!-- Metros -->
		<span style="text-align:left; float:left;">Metros (*):</span>
		<input class="<?php echo  $class_campo; ?>" name="metros" id="metros" <?php echo  $readonly; ?> style="float:left; margin-left:15px;" type="text" size="10" title="Metros" value="<?php if($_POST['metros']) echo $_POST['metros']; else echo number_format($row_consulta['metros'], 2, ',', '.'); ?>" onchange="modificado=true">
		<!-- Metros útiles -->
		<span style="text-align:left; float:left; margin-left:15px;">Metros útiles (*):</span>
		<input class="<?php echo  $class_campo; ?>" name="metros_utiles" id="metros_utiles" <?php echo  $readonly; ?> style="float:left; margin-left:15px;" type="text" size="10" title="Metros útiles" value="<?php if($_POST['metros_utiles']) echo $_POST['metros_utiles']; else echo number_format($row_consulta['metros_utiles'], 2, ',', '.'); ?>" onchange="modificado=true">
		<!-- Habitaciones -->
		<span style="text-align:left; float:left; margin-left:15px;">Habitaciones: </span>
		<?php
		if($row_consulta['estado']=="activo")
		{
		?>
		<select id="habitaciones" name="habitaciones" class="campo_texto" style="float:left; margin-left:15px;">
			<option value="0" <?php if ($_POST) { if ($_POST['habitaciones'] == '0') echo "selected"; } else { if($row_consulta['habitaciones'] == "0") echo "selected"; } ?>>0</option>
			<option value="1" <?php if ($_POST) { if ($_POST['habitaciones'] == '1') echo "selected"; } else { if($row_consulta['habitaciones'] == "1") echo "selected"; } ?>>1</option>
			<option value="2" <?php if ($_POST) { if ($_POST['habitaciones'] == '2') echo "selected"; } else { if($row_consulta['habitaciones'] == "2") echo "selected"; } ?>>2</option>
			<option value="3" <?php if ($_POST) { if ($_POST['habitaciones'] == '3') echo "selected"; } else { if($row_consulta['habitaciones'] == "3") echo "selected"; } ?>>3</option>
			<option value="4" <?php if ($_POST) { if ($_POST['habitaciones'] == '4') echo "selected"; } else { if($row_consulta['habitaciones'] == "4") echo "selected"; } ?>>4</option>
			<option value="5" <?php if ($_POST) { if ($_POST['habitaciones'] == '5') echo "selected"; } else { if($row_consulta['habitaciones'] == "5") echo "selected"; } ?>>5</option>
			<option value="6" <?php if ($_POST) { if ($_POST['habitaciones'] == '6') echo "selected"; } else { if($row_consulta['habitaciones'] == "6") echo "selected"; } ?>>6</option>
			<option value="7" <?php if ($_POST) { if ($_POST['habitaciones'] == '7') echo "selected"; } else { if($row_consulta['habitaciones'] == "7") echo "selected"; } ?>>7</option>
			<option value="8" <?php if ($_POST) { if ($_POST['habitaciones'] == '8') echo "selected"; } else { if($row_consulta['habitaciones'] == "8") echo "selected"; } ?>>8</option>
			<option value="9" <?php if ($_POST) { if ($_POST['habitaciones'] == '9') echo "selected"; } else { if($row_consulta['habitaciones'] == "9") echo "selected"; } ?>>9</option>
			<option value="10" <?php if ($_POST) { if ($_POST['habitaciones'] == '10') echo "selected"; } else { if($row_consulta['habitaciones'] == "10") echo "selected"; } ?>>10</option>
		</select>
		<?php
		}
		else
		{
		?>
			<input class="<?php echo  $class_campo; ?>" name="habitaciones" id="habitaciones" <?php echo  $readonly; ?> style="float:left; margin-left:15px;" type="text" size="3" title="Habitaciones" value="<?php echo  $row_consulta['habitaciones']; ?>" onchange="modificado=true">
		<?php
		}
		?>
		<!-- Baños -->
		<span style="text-align:left; float:left; margin-left:15px;">Baños: </span>
		<?php
		if($row_consulta['estado']=="activo")
		{
		?>
		<select id="banios" name="banios" class="campo_texto" style="float:left; margin-left:15px;">
			<option value="0" <?php if ($_POST) { if ($_POST['banios'] == '0') echo "selected"; } else { if($row_consulta['banios'] == "0") echo "selected"; } ?>>0</option>
			<option value="1" <?php if ($_POST) { if ($_POST['banios'] == '1') echo "selected"; } else { if($row_consulta['banios'] == "1") echo "selected"; } ?>>1</option>
			<option value="2" <?php if ($_POST) { if ($_POST['banios'] == '2') echo "selected"; } else { if($row_consulta['banios'] == "2") echo "selected"; } ?>>2</option>
			<option value="3" <?php if ($_POST) { if ($_POST['banios'] == '3') echo "selected"; } else { if($row_consulta['banios'] == "3") echo "selected"; } ?>>3</option>
			<option value="4" <?php if ($_POST) { if ($_POST['banios'] == '4') echo "selected"; } else { if($row_consulta['banios'] == "4") echo "selected"; } ?>>4</option>
			<option value="5" <?php if ($_POST) { if ($_POST['banios'] == '5') echo "selected"; } else { if($row_consulta['banios'] == "5") echo "selected"; } ?>>5</option>
			<option value="6" <?php if ($_POST) { if ($_POST['banios'] == '6') echo "selected"; } else { if($row_consulta['banios'] == "6") echo "selected"; } ?>>6</option>
			<option value="7" <?php if ($_POST) { if ($_POST['banios'] == '7') echo "selected"; } else { if($row_consulta['banios'] == "7") echo "selected"; } ?>>7</option>
			<option value="8" <?php if ($_POST) { if ($_POST['banios'] == '8') echo "selected"; } else { if($row_consulta['banios'] == "8") echo "selected"; } ?>>8</option>
			<option value="9" <?php if ($_POST) { if ($_POST['banios'] == '9') echo "selected"; } else { if($row_consulta['banios'] == "9") echo "selected"; } ?>>9</option>
			<option value="10" <?php if ($_POST) { if ($_POST['banios'] == '10') echo "selected"; } else { if($row_consulta['banios'] == "10") echo "selected"; } ?>>10</option>
		</select>
		<?php
		}
		else
		{
		?>
			<input class="<?php echo  $class_campo; ?>" name="habitaciones" id="habitaciones" <?php echo  $readonly; ?> style="float:left; margin-left:15px;" type="text" size="3" title="Baños" value="<?php echo  $row_consulta['banios']; ?>" onchange="modificado=true">
		<?php
		}
		?>
		<!-- Cerficación energética -->
		<span style="text-align:left; float:left; margin-left:15px;">Cerficación energética: </span>
		<?php
		if($row_consulta['estado']=="activo")
		{
		?>
		<select id="certificacion_energetica" name="certificacion_energetica" class="<?php echo  $class_campo; ?>" style="text-align:left; float:left; margin-left:15px;">
			<option value="" <?php if ($_POST) { if ($_POST['certificacion_energetica'] == "") echo "selected"; } else { if($row_consulta['certificacion_energetica'] == "") echo "selected"; } ?>>Seleccione categoría ...</option>
		<?php
			do
			{
		?>
				<option <?php if ($_POST) { if ($_POST['certificacion_energetica'] == $certificacion['id_tipo_certificacion_energetica']) echo "selected"; } else { if($row_consulta['certificacion_energetica'] == $certificacion['id_tipo_certificacion_energetica']) echo "selected"; } ?> value="<?php echo  $certificacion['id_tipo_certificacion_energetica'];?>"><?php echo  $certificacion['nombre_tipo_certificacion_energetica'];?></option>
		<?php
			} while ($certificacion = $certificaciones->FetchRow());
		?>
		</select>
		<?php
		}
		else
		{
		?>
			<input class="<?php echo  $class_campo; ?>" name="nombre_certificacion_energetica" id="nombre_certificacion_energetica" <?php echo  $readonly; ?> style="float:left; margin-left:15px;" type="text" size="3" title="Habitaciones" value="<?php echo  formatear_tipo_certificacion_energetica($row_consulta['certificacion_energetica']); ?>" onchange="modificado=true">
			<input type="hidden" name="certificacion_energetica" value="<?php echo  $row_consulta['certificacion_energetica']; ?>"  />
		<?php
		}
		?>
		<br clear="all" />
		<p class="titulo_seccion_datos">Ubicación</p>
		<!-- Provincia -->
		<span style="text-align:left; float:left;">Provincia (*): </span>
		<?php
		if($row_consulta['estado']=="activo")
		{
		?>
			<select id="provincia_inmueble" name="provincia_inmueble" onchange="carga_regiones_inmueble(this.value,''); carga_poblaciones_inmueble('',''); carga_zonas('','');" class="<?php echo  $class_campo; ?>" style="float:left; margin-left:15px;">
			<option value="" <?php if ($_POST) { if ($_POST['provincia_inmueble'] == "") echo "selected"; } else { if($row_consulta['provincia_inmueble'] == "") echo "selected"; } ?>>Seleccione provincia ...</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['provincia_inmueble'] == $provincia['id_provincia']) echo "selected"; } else { if($row_consulta['provincia_inmueble'] == $provincia['id_provincia']) echo "selected"; } ?> value="<?php echo  $provincia['id_provincia'];?>"><?php echo  $provincia['provincia'];?></option>
			<?php
				} while ($provincia = $provincias->FetchRow());
			?>
			</select>
		<?php
		}
		else
		{
		?>
			<input class="<?php echo  $class_campo; ?>" name="nombre_provincia_inmueble" id="nombre_provincia_inmueble" <?php echo  $readonly; ?> style="float:left; margin-left:15px;" type="text" size="15" title="Nombre de provincia" value="<?php echo  formatear_provincia($row_consulta['provincia_inmueble']); ?>" onchange="modificado=true">			
			<input type="hidden" name="provincia_inmueble" value="<?php echo  $row_consulta['provincia_inmueble']; ?>"  />
		<?php
		}
		?>
		<!-- Región -->
		<span style="text-align:left; float:left; margin-left:15px;">Región (*): </span>
		<div id="regiondiv" style="float:left; margin-left:15px;">
			<?php
			if($row_consulta['estado']=="activo")
			{
			?>
				<select id="region" name="region" class="<?php echo  $class_campo; ?>" style="float:left;">
				<option value="" <?php if ($_POST) { if ($_POST['region'] == "") echo "selected"; } else { if($row_consulta['region'] == "") echo "selected"; } ?>>Seleccione region ...</option>
				</select>
			<?php
			}
			else
			{
			?>
				<input class="<?php echo  $class_campo; ?>" name="nombre_region" id="nombre_region" <?php echo  $readonly; ?> style="float:left; margin-left:15px;" type="text" size="20" title="Nombre de región" value="<?php echo  formatear_region($row_consulta['region']); ?>" onchange="modificado=true">
				<input type="hidden" name="region" value="<?php echo  $row_consulta['region']; ?>"  />
			<?php
			}
			?>
		</div>
		<span style="text-align:left; float:left;; margin-left:15px;">Municipio (*): </span>
		<div id="poblaciondiv" style="float:left; margin-left:15px;">
			<?php
			if($row_consulta['estado']=="activo")
			{
			?>
				<select id="poblacion_inmueble" name="poblacion_inmueble" class="<?php echo  $class_campo; ?>" style="float:left;">
				<option value="" <?php if ($_POST) { if ($_POST['poblacion_inmueble'] == "") echo "selected"; } else { if($row_consulta['poblacion_inmueble'] == "") echo "selected"; } ?>>Seleccione municipio ...</option>
				</select>
			<?php
			}
			else
			{
			?>
				<input class="<?php echo  $class_campo; ?>" name="nombre_poblacion_inmueble" id="nombre_poblacion_inmueble" <?php echo  $readonly; ?> style="float:left; margin-left:15px;" type="text" size="20" title="Nombre de población" value="<?php echo  formatear_poblacion($row_consulta['poblacion_inmueble']); ?>" onchange="modificado=true">
				<input type="hidden" name="poblacion_inmueble" value="<?php echo  $row_consulta['poblacion_inmueble']; ?>"  />
			<?php
			}
			?>
		</div>
		<span style="text-align:left; float:left;; margin-left:15px;">Zona: </span>
		<!-- Zona -->
		<div id="zonadiv" style="float:left; margin-left:15px;">
			<?php
			if($row_consulta['estado']=="activo")
			{
			?>
			<select id="zona" name="zona" class="<?php echo  $class_campo; ?>">
				<option value="">Seleccione zona...</option>
			</select>
			<?php
			}
			else
			{
			?>
				<input class="<?php echo  $class_campo; ?>" name="nombre_zona" id="nombre_zona" <?php echo  $readonly; ?> style="float:left; margin-left:15px;" type="text" size="20" title="Nombre de zona" value="<?php echo  formatear_zona($row_consulta['zona']); ?>" onchange="modificado=true">
				<input type="hidden" name="zona" value="<?php echo  $row_consulta['zona']; ?>"  />
			<?php
			}
			?>
		</div>
		<br /><br />
		<!-- Dirección -->
		<span style="text-align:left;">Dirección: </span>
		<input class="<?php echo  $class_campo; ?>" name="direccion" id="direccion" type="text" <?php echo  $readonly; ?> size="72" title="Dirección" value="<?php if($_POST['direccion']) echo $_POST['direccion']; else echo $row_consulta['direccion']; ?>" style="text-align:left; margin-left:15px;" onchange="modificado=true">
		<!-- Dirección aproximada -->
		<span style="text-align:left; margin-left:15px;">Dirección aproximada: </span>
		<input class="<?php echo  $class_campo; ?>" name="direccion_aprox" id="direccion_aprox" <?php echo  $readonly; ?> type="text" size="68" title="Dirección aproximada" value="<?php if($_POST['direccion_aprox']) echo $_POST['direccion_aprox']; else echo $row_consulta['direccion_aprox']; ?>" style="text-align:left; margin-left:15px;" onchange="modificado=true">
		<br clear="all" />
		<p class="titulo_seccion_datos">Opciones</p>
		<!-- Bloquear -->
		<span style="text-align:left; float:left;">Bloquear: </span>
		<?php
		if($row_consulta['estado']=="activo")
		{
		?>
		<input style="float:left; margin-left:15px;" name="bloqueado" value="1" id="bloqueado" type="checkbox" <?php if ($_POST['bloqueado']) echo "checked"; else {if($row_consulta['bloqueado'] == 1) echo "checked";} ?>>
		<?php
		}
		else
		{
		?>
			<input class="<?php echo  $class_campo; ?>" name="nombre_bloqueado" id="nombre_bloqueado" <?php echo  $readonly; ?> style="float:left; margin-left:15px;" type="text" size="5" title="Nombre de bloqueado" value="<?php echo  formatear_ckeck($row_consulta['bloqueado']); ?>" onchange="modificado=true">
			<input type="hidden" name="bloqueado" value="<?php echo  $row_consulta['bloqueado']; ?>"  />
		<?php
		}
		?>
		<?php
		if(isset($_GET['id']))
		{
		?>
		<!-- Estado -->
		<span style="text-align:left; float:left; margin-left:15px;">Estado: </span>
		<select id="estado" name="estado" class="campo_texto" style="float:left; margin-left:15px;">
			<option value="activo" <?php if ($_POST) { if ($_POST['estado'] == 'activo') echo "selected"; } else { if($row_consulta['estado'] == "activo") echo "selected"; } ?>>Activo</option>
			<option value="cerrado" <?php if ($_POST) { if ($_POST['estado'] == 'cerrado') echo "selected"; } else { if($row_consulta['estado'] == "cerrado") echo "selected"; } ?>>Cerrado</option>
		</select>
		<?php
		}
		else
		{
		?>
			<input type="hidden" name="estado" value="activo"  />
		<?php
		}
		?>
		<!-- Captador -->
		<span style="text-align:left; float:left;  margin-left:15px;">Captador: </span>
		<?php
		if($row_consulta['estado']=="activo")
		{
		?>
			<select id="captador" name="captador" class="<?php echo  $class_campo; ?>" style="float:left; margin-left:15px;">
			<option value="" <?php if ($_POST) { if ($_POST['captador'] == "") echo "selected"; } else { if($row_consulta['captador'] == "") echo "selected"; } ?>>Seleccione captador ...</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['captador'] == $captador['id_usuario']) echo "selected"; } else { if($row_consulta['captador'] == $captador['id_usuario']) echo "selected"; } ?> value="<?php echo  $captador['id_usuario'];?>"><?php echo  $captador['apellidos'].", ".$captador['nombre'];?></option>
			<?php
				} while ($captador = $captadores->FetchRow());
			?>
			</select>
		<?php
		}
		else
		{
		?>
			<input class="<?php echo  $class_campo; ?>" name="nombre_captador" id="nombre_captador" <?php echo  $readonly; ?> style="float:left; margin-left:15px;" type="text" size="15" title="Nombre de captador" value="<?php echo  formatear_usuario($row_consulta['captador']); ?>" onchange="modificado=true">			
			<input type="hidden" name="captador" value="<?php echo  $row_consulta['captador']; ?>"  />
		<?php
		}
		?>
		<br clear="all" /><br  />
		<?php
		if($_GET['cliente']==1 && !isset($_GET['id']))
		{
			include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/form_cliente.php');
		?>
			<input type="hidden" name="fecha_alta" value="<?php echo  date("d/m/Y"); ?>"  />
		<?php
		}
		?>
		<br clear="all" /><br  />