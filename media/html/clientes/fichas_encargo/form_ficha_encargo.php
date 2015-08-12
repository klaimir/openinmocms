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
			<!-- Teléfono -->	
			<span style="text-align:left;">Teléfono (*): </span>
			<br />
			<input class="campo_texto_blocked" readonly="readonly" name="telefono" id="telefono" type="text" size="20" title="Teléfono" value="<?php if($_POST['telefono']) echo $_POST['telefono']; else echo $row_consulta['telefono']; ?>" >
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
				<!-- Observaciones -->
				<span style="text-align:left">Observaciones: </span><br />
				<textarea name="observaciones" style="text-align:left; width:100%; margin-top:3px" id="observaciones" rows="6" title="Observaciones" onchange="modificado=true"><?php if($_POST['observaciones']) echo $_POST['observaciones']; else echo $row_consulta['observaciones']; ?></textarea>
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
			<input class="campo_texto_blocked" readonly="readonly" name="precio" id="precio" type="text" size="20" title="Precio" value="<?php if($_POST['precio']) echo $_POST['precio']; else echo $row_consulta['precio']; ?>" >
			<br  /><br  />
			<!-- Metros útiles -->	
			<span style="text-align:left;">Metros útiles (*): </span>
			<br />
			<input class="campo_texto" name="metros" id="metros" type="text" size="20" title="Metros útiles" value="<?php if($_POST['metros']) echo $_POST['metros'];  else echo $row_consulta['metros']; ?>" >
			<br  /><br  />
			<!-- Cuota comunidad  -->	
			<span style="text-align:left;">Cuota comunidad (*): </span>
			<br />
			<input class="campo_texto" name="cuota_comunidad" id="cuota_comunidad" type="text" size="20" title="Cuota comunidad " value="<?php if($_POST['cuota_comunidad']) echo $_POST['cuota_comunidad']; else echo $row_consulta['cuota_comunidad']; ?>" >
			<br  /><br  />
			<!-- Forma de pago -->	
			<span style="text-align:left;">Forma de pago (*): </span>
			<br />
			<input class="campo_texto" name="forma_pago" id="forma_pago" type="text" size="60" title="Forma de pago" value="<?php if($_POST['forma_pago']) echo $_POST['forma_pago']; else echo $row_consulta['forma_pago']; ?>" >
			<br  /><br  />
			<!-- Anejos -->	
			<span style="text-align:left;">Anejos (*): </span>
			<br />
			<input class="campo_texto" name="anejos" id="anejos" type="text" size="60" title="Anejos" value="<?php if($_POST['anejos']) echo $_POST['anejos']; else echo $row_consulta['anejos']; ?>" >
			<br  /><br  />
			<!-- Cargas de la vivienda -->	
			<span style="text-align:left;">Cargas de la vivienda (*): </span>
			<br />
			<input class="campo_texto" name="cargas_vivienda" id="cargas_vivienda" type="text" size="60" title="Cargas de la vivienda" value="<?php if($_POST['cargas_vivienda']) echo $_POST['cargas_vivienda']; else echo $row_consulta['cargas_vivienda']; ?>" >
		</div>
		<div style="float:left; margin:0 auto; text-align:left; width:50%; border-left:1px dotted #999;">
			<div style="margin-left:15px">
				<!-- Descripción de la vivienda -->
				<span style="text-align:left">Descripción de la vivienda: </span>
				<br />
				<textarea name="descripcion_vivienda" style="text-align:left; width:100%; margin-top:3px" id="descripcion_vivienda" rows="6" title="Descripción de la vivienda" onchange="modificado=true"><?php if($_POST['descripcion_vivienda']) echo $_POST['descripcion_vivienda']; else echo $row_consulta['descripcion_vivienda']; ?></textarea>
				<br /><br />
				<!-- Descripción del edificio -->
				<span style="text-align:left">Descripción del edificio: </span>
				<br />
				<textarea name="descripcion_edificio" style="text-align:left; width:100%; margin-top:3px" id="descripcion_edificio" rows="6" title="Descripción de la vivienda" onchange="modificado=true"><?php if($_POST['descripcion_edificio']) echo $_POST['descripcion_edificio']; else echo $row_consulta['descripcion_edificio']; ?></textarea>
				<br /><br />
				<!-- Antigüedad del edificio -->	
				<span style="text-align:left;">Antigüedad del edificio (*): </span>
				<br />
				<input class="campo_texto" name="antiguedad_edificio" id="antiguedad_edificio" type="text" size="30" title="Antigüedad del edificio" value="<?php if($_POST['antiguedad_edificio']) echo $_POST['antiguedad_edificio']; else echo $row_consulta['antiguedad_edificio']; ?>" >
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
		<input type="hidden" name="cliente" value="<?php echo  $_GET['id']; ?>"  />
		<input type="hidden" name="inmueble" value="<?php echo  $_GET['inmueble']; ?>"  />
		<input type="hidden" name="id_ficha_encargo" value="<?php echo  $_GET['id_ficha_encargo']; ?>"  />
		<input type="hidden" name="agente" value="<?php echo  $row_consulta['agente']; ?>"  />