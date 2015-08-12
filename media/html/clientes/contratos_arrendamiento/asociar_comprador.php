		<a name="top"></a>
		<div class="breadcrumbs_publico">
		<img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Clientes</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../editar.php?id=<?php echo  $_GET['id']; ?>">Editar</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?id=<?php echo  $_GET['id']; ?>&inmueble=<?php echo  $_GET['inmueble']; ?>">Contrato de arrendamiento</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Asociar arrendatario</span>
		</div>
        <p align="justify" class="titulo_seccion">Clientes</p>
		<?php
		if($_POST)
		{
			// Control de errores
			if($_SESSION['hayerroresasociarcomprador'])
			{
	?>
				<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroresasociarcomprador']); ?> error(es) encontrado(s)</div>
				<div class="detalle_errores">
				<ul class="lista_errores">
	<?php
				foreach($_SESSION['erroresasociarcomprador'] as $error)
				{
	?>		
					<li><?php echo  $error; ?></li>
	<?php
				}
	?>
				</ul>
				</div>
				<br />
	<?php
			}
		}
		?>
		<form action=""  name="insertar" id="insertar" method="post" enctype="multipart/form-data">
		<center>
			<span>Seleccione el arrendatario del inmueble:</span>
			<select id="cliente_comprador" name="cliente_comprador" class="campo_texto" onchange="modificado=true" style="margin-left:10px;">
				<option value="" <?php if ($_POST) { if ($_POST['cliente_comprador'] == '') echo "selected"; } ?>>Seleccione arrendatario...</option>
			<?php
				do
				{
			?>
					<option <?php if ($_POST) { if ($_POST['cliente_comprador'] == $cliente['id_cliente']) echo "selected"; } ?> value="<?php echo  $cliente['id_cliente'];?>"><?php echo  $cliente['nombre']." ".$cliente['apellidos'];?></option>	
			<?php
				} while ($cliente = $clientes->FetchRow());
			?>
			</select>
		</center>
		</form>
		<br clear="all" /><br  />
		<p align="center">
        	<!-- Botón insertar -->	
			<a href="#" onclick="document.insertar.submit();return false"><img id="boton_inserta_bd" alt="Insertar en BD" name="boton_inserta_bd" border="0" src="<?php echo  $_SESSION['rutaimg'];?>insertar.gif" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.insertar.submit();return false">Asociar arrendatario</a>	
        	<!-- Botón resetear -->	
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('insertar').reset();"><img src="<?php echo  $_SESSION['rutaimg'];?>no.png" border="0" align="absmiddle" /></a>&nbsp;&nbsp;
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('insertar').reset();">Limpiar todo</a>
		</p>
		<!--  Navegacion -->
		<p align="right">
			<a href="<?php echo  enlace_volver_general(); ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="<?php echo  enlace_volver_general(); ?>">Volver</a>
		</p>