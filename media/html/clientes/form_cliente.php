		<!-- DATOS DE USUARIO-->
		<p align="justify" class="titulo_seccion_datos">Datos de cliente</p>
		<div style="float:left; margin:0 auto; text-align:left; width:35%;">
			<!-- Nombre -->	
			<span style="text-align:left;">Nombre (*): </span>
			<br />
			<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="nombre" id="nombre" type="text" size="20" title="Nombre" value="<?php if($_POST['nombre']) echo $_POST['nombre']; else echo $row_consulta['nombre']; ?>" >
			<br  /><br  />
			<!-- Apellidos -->	
			<span style="text-align:left;">Apellidos (*): </span>
			<br />
			<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="apellidos" id="apellidos" type="text" size="30" title="Apellidos" value="<?php if($_POST['apellidos']) echo $_POST['apellidos'];  else echo $row_consulta['apellidos']; ?>" >
			<br  /><br  />
			<!-- Correo -->
			<span style="text-align:left;">E-mail:  </span>
			<br  />
			<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="correo" id="correo" size="50" title="E-mail" value="<?php if($_POST['correo']) echo $_POST['correo']; else echo $row_consulta['correo']; ?>" >
			<br  /><br  />
			<div style="float:left; width:150px">			
				<!-- Teléfono -->	
				<span style="text-align:left;">Teléfono: </span>
				<br />
				<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="telefono" id="telefono" type="text" size="20" title="Teléfono" value="<?php if($_POST['telefono']) echo $_POST['telefono']; else echo $row_consulta['telefono']; ?>" >
			</div>
			<div style="float:left">
				<!-- Estado civil -->
				<span style="text-align:left; float:left;">Estado civil: </span>
				<br  />
				<select id="estado_civil" name="estado_civil" class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> style="float:left; ">
					<option value="" <?php if ($_POST) { if ($_POST['estado_civil'] == '') echo "selected"; } else { if($row_consulta['estado_civil'] == "") echo "selected"; } ?>>Seleccione estado civil...</option>
					<option value="Soltero/a" <?php if ($_POST) { if ($_POST['estado_civil'] == 'Soltero/a') echo "selected"; } else { if($row_consulta['estado_civil'] == "Soltero/a") echo "selected"; } ?>>Soltero/a</option>
					<option value="Casado/a" <?php if ($_POST) { if ($_POST['estado_civil'] == 'Casado/a') echo "selected"; } else { if($row_consulta['estado_civil'] == "Casado/a") echo "selected"; } ?>>Casado/a</option>
				</select>
			</div>		
			<br clear="all"  /><br  />
			<div style="float:left; width:150px">
				<!-- NIF -->	
				<span style="text-align:left;">NIF: </span>
				<br />
				<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="nif" id="nif" type="text" size="15" title="NIF" value="<?php if($_POST['nif']) echo $_POST['nif']; else echo $row_consulta['nif']; ?>" >
			</div>
			<div style="float:left">
				<?php
				if(isset($_GET['id']))
				{
				?>
				<!-- Estado -->
				<span style="text-align:left; float:left; width:70px;">Estado: </span>
				<br  />
				<select id="estado" name="estado" class="campo_texto" style="float:left; ">
					<option value="activo" <?php if ($_POST) { if ($_POST['estado'] == 'activo') echo "selected"; } else { if($row_consulta['estado'] == "activo") echo "selected"; } ?>>Activo</option>
					<option value="cerrado" <?php if ($_POST) { if ($_POST['estado'] == 'cerrado') echo "selected"; } else { if($row_consulta['estado'] == "cerrado") echo "selected"; } ?>>Cerrado</option>
				</select>
				<?php
				}
				?>
			</div>
		</div>
		<div style="float:left; margin:0 auto; text-align:left; width:62%; border-left:1px dotted #999;">
			<div style="margin-left:15px">
				<div id="provdivcliente" style="float:left;">
					<!-- Provincia -->
					<span style="text-align:left; float:left; width:100px;">Provincia (*): </span>
					<?php
					if($row_consulta['estado']=="activo")
					{
					?>
						<select id="provincia" name="provincia" onchange="carga_poblaciones_cliente(this.value,'');" class="campo_texto" style="float:left;">
						<option value="" <?php if ($_POST) { if ($_POST['provincia'] == "") echo "selected"; } else { if($row_consulta['provincia'] == "") echo "selected"; } ?>>Seleccione provincia ...</option>
						<?php
							do
							{
						?>
								<option <?php if ($_POST) { if ($_POST['provincia'] == $provincia_cliente['id_provincia']) echo "selected"; } else { if($row_consulta['provincia'] == $provincia_cliente['id_provincia']) echo "selected"; } ?> value="<?php echo  $provincia_cliente['id_provincia'];?>"><?php echo  $provincia_cliente['provincia'];?></option>
						<?php
							} while ($provincia_cliente = $provincias_cliente->FetchRow());
						?>
						</select>
					<?php
					}
					else
					{
					?>
						<span style="text-align:left; float:left;"><?php echo  formatear_provincia($row_consulta['provincia']); ?></span>
						<input type="hidden" name="provincia" value="<?php echo  $row_consulta['provincia']; ?>"  />
					<?php
					}
					?>
				</div>			
				<span style="text-align:left; float:left;; width:100px; margin-left:25px;">Municipio (*): </span>
				<!-- Población -->
				<div id="poblaciondivcliente" style="float:left;">
				<?php
				if($row_consulta['estado']=="activo")
				{
				?>
					<select id="poblacion" name="poblacion" class="campo_texto">
						<option value="">Seleccione municipio...</option>
					</select>
				<?php
				}
				else
				{
				?>
					<span style="text-align:left; float:left;"><?php echo  formatear_poblacion($row_consulta['poblacion']); ?></span>
					<input type="hidden" name="poblacion" value="<?php echo  $row_consulta['poblacion']; ?>"  />
				<?php
				}
				?>
				</div>
				<br /><br />
				<!-- Dirección -->
				<span style="text-align:left">Dirección: </span><br />
				<input class="<?php echo  $class_campo; ?>" <?php echo  $readonly; ?> name="direccion_cliente" id="direccion_cliente" type="text" size="129" title="Dirección" value="<?php if($_POST['direccion_cliente']) echo $_POST['direccion_cliente']; else echo $row_consulta['direccion']; ?>" onchange="modificado=true">
				<br  /><br  />
				<!-- Observaciones -->
				<span style="text-align:left">Observaciones: </span><br />
				<textarea class="<?php echo  $class_campo; ?>" name="observaciones_cliente" <?php echo  $readonly; ?> style="text-align:left; width:100%; margin-top:3px" id="observaciones" rows="10" title="Observaciones" onchange="modificado=true"><?php if($_POST['observaciones_cliente']) echo $_POST['observaciones_cliente']; else echo $row_consulta['observaciones']; ?></textarea>
			</div>
		</div>
		<br clear="all" />
		<!-- OPCIONES -->
		<p align="justify" class="titulo_seccion_datos">Opciones del cliente</p>
		<center>
		<!-- Agente asignado -->
		<span style="text-align:left;">Agente asignado: </span>
		<?php
		if($row_consulta['estado']=="activo")
		{
		?>
			<select id="agente_asignado" name="agente_asignado" class="<?php echo  $class_campo; ?>" style="margin-left:10px;">
			<option value="" <?php if ($_POST) { if ($_POST['agente_asignado'] == "") echo "selected"; } else { if($row_consulta['agente_asignado'] == "") echo "selected"; } ?>>Seleccione agente ...</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['agente_asignado'] == $agente_asignado['id_usuario']) echo "selected"; } else { if($row_consulta['agente_asignado'] == $agente_asignado['id_usuario']) echo "selected"; } ?> value="<?php echo  $agente_asignado['id_usuario'];?>"><?php echo  $agente_asignado['apellidos'].", ".$agente_asignado['nombre'];?></option>
			<?php
				} while ($agente_asignado = $agentes_asignados->FetchRow());
			?>
			</select>
		<?php
		}
		else
		{
		?>
			<input class="<?php echo  $class_campo; ?>" name="nombre_agente_asignado" id="nombre_agente_asignado" <?php echo  $readonly; ?> style="float:left; margin-left:15px;" type="text" size="15" title="Nombre de agente_asignado" value="<?php echo  formatear_usuario($row_consulta['agente_asignado']); ?>" onchange="modificado=true">			
			<input type="hidden" name="agente_asignado" value="<?php echo  $row_consulta['agente_asignado']; ?>"  />
		<?php
		}
		?>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<!-- Desea vender -->
		<input name="busca_vender" value="1" id="busca_vender" type="checkbox" <?php if ($_POST['busca_vender']) echo "checked"; else {if($row_consulta['busca_vender'] == 1) echo "checked";} ?>>&nbsp;&nbsp;Desea vender 
		<!-- Busca comprar -->
		<input name="busca_comprar" value="1" id="busca_comprar" type="checkbox" style="margin-left:30px" <?php if ($_POST['busca_comprar']) echo "checked"; else {if($row_consulta['busca_comprar'] == 1) echo "checked";} ?>>&nbsp;&nbsp;Busca comprar
		<!-- Desea alquilar -->
		<input name="busca_alquilar" value="1" id="busca_alquilar" type="checkbox" style="margin-left:30px" <?php if ($_POST['busca_alquilar']) echo "checked"; else {if($row_consulta['busca_alquilar'] == 1) echo "checked";} ?>>&nbsp;&nbsp;Desea alquilar
		<!-- Busca un alquiler -->
		<input name="busca_alquiler" value="1" id="busca_alquiler" type="checkbox" style="margin-left:30px" <?php if ($_POST['busca_alquiler']) echo "checked"; else {if($row_consulta['busca_alquiler'] == 1) echo "checked";} ?>>&nbsp;&nbsp;Busca un alquiler
		</center>