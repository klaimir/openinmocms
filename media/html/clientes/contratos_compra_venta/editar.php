		<a name="top"></a>
		<div class="breadcrumbs_publico">
		<img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Clientes</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../editar.php?id=<?php echo  $_GET['id']; ?>">Editar</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?id=<?php echo  $_GET['id']; ?>&inmueble=<?php echo  $_GET['inmueble']; ?>">Contrato de compra-venta</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Editar</span>
		</div>
        <p align="justify" class="titulo_seccion">Clientes</p>
		<div class="regla_horizontal_superior">
			<div style="float:left;">
				<!-- Generar contrato -->
				<a href="#" onclick="document.editar.submit();return false"><img id="boton_inserta_bd" alt="Insertar en BD" name="boton_inserta_bd" border="0" src="<?php echo  $_SESSION['rutaimg'];?>actualizar.gif" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.editar.submit();return false">Generar Contrato de compra-venta</a>
				&nbsp;&nbsp;
				<!-- Factura -->
				<?php
				// Dependiendo del enlace se activan unas opciones
				if($num_facturas==0)
				{
				?>
					<?php
					if($acceso_generar_factura==1)
					{
					?>
						<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="facturas/insertar.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $_GET['inmueble']; ?>&contrato_compra_venta=<?php echo  $_GET['id_contrato_compra_venta']; ?>">Generar Factura</a>
					<?php
					}
					?>
				<?php
				}
				else
				{
				?>
					<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a target="_blank" href="<?php echo  $_SESSION['rutadocs']."clientes/cliente_".$_GET['id']."/inmueble_".$_GET['inmueble']."/factura_contrato_compra_venta_".$_GET['id_contrato_compra_venta'].".pdf";?>">Factura</a>
					<?php
					if($acceso_generar_factura==1)
					{
					?>
						<!-- Editar factura -->
						<a href="facturas/editar.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $_GET['inmueble']; ?>&contrato_compra_venta=<?php echo  $_GET['id_contrato_compra_venta']; ?>"><img alt="Editar factura" border="0" src="<?php echo  $_SESSION['rutaimg'];?>editar.gif" align="absmiddle" /></a>
					<?php
					}
					?>
					<?php
					if($acceso_borrar_factura==1)
					{
					?>
					<!-- Borrar factura -->
					<a href="facturas/estas_seguro.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $_GET['inmueble']; ?>&contrato_compra_venta=<?php echo  $_GET['id_contrato_compra_venta']; ?>"><img alt="Borrar factura" border="0" src="<?php echo  $_SESSION['rutaimg'];?>borrar.gif" align="absmiddle" /></a>
					<?php
					}
					?>
				<?php
				}
				?>
			</div>
			<div style="float:right; padding-top:4px;">
				<a href="index.php?id=<?php echo  $_GET['id']; ?>&inmueble=<?php echo  $_GET['inmueble']; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php?id=<?php echo  $_GET['id']; ?>&inmueble=<?php echo  $_GET['inmueble']; ?>">Volver</a>
			</div>			
		</div>
		<br clear="all" />
		<?php
		if($_POST)
		{
			// Control de errores
			if($_SESSION['hayerroreseditarcontratocompraventa'])
			{
	?>
				<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroreseditarcontratocompraventa']); ?> error(es) encontrado(s)</div>
				<div class="detalle_errores">
				<ul class="lista_errores">
	<?php
				foreach($_SESSION['erroreseditarcontratocompraventa'] as $error)
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
		<form action=""  name="editar" id="editar" method="post" enctype="multipart/form-data">
			<?php include('form_contrato_compra_venta.php'); ?>
		</form>
		<br clear="all" /><br  />
		<div class="regla_horizontal_inferior">
			<div style="float:left;">
				<!-- Generar contrato -->
				<a href="#" onclick="document.editar.submit();return false"><img id="boton_inserta_bd" alt="Insertar en BD" name="boton_inserta_bd" border="0" src="<?php echo  $_SESSION['rutaimg'];?>actualizar.gif" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.editar.submit();return false">Generar Contrato de compra-venta</a>
				&nbsp;&nbsp;
				<!-- Factura -->
				<?php
				// Dependiendo del enlace se activan unas opciones
				if($num_facturas==0)
				{
				?>
					<?php
					if($acceso_generar_factura==1)
					{
					?>
						<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a href="facturas/insertar.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $_GET['inmueble']; ?>&contrato_compra_venta=<?php echo  $_GET['id_contrato_compra_venta']; ?>">Generar Factura</a>
					<?php
					}
					?>
				<?php
				}
				else
				{
				?>
					<img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" />&nbsp;<a target="_blank" href="<?php echo  $_SESSION['rutadocs']."clientes/cliente_".$_GET['id']."/inmueble_".$_GET['inmueble']."/factura_contrato_compra_venta_".$_GET['id_contrato_compra_venta'].".pdf";?>">Factura</a>
					<?php
					if($acceso_generar_factura==1)
					{
					?>
						<!-- Editar factura -->
						<a href="facturas/editar.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $_GET['inmueble']; ?>&contrato_compra_venta=<?php echo  $_GET['id_contrato_compra_venta']; ?>"><img alt="Editar factura" border="0" src="<?php echo  $_SESSION['rutaimg'];?>editar.gif" align="absmiddle" /></a>
					<?php
					}
					?>
					<?php
					if($acceso_borrar_factura==1)
					{
					?>
					<!-- Borrar factura -->
					<a href="facturas/estas_seguro.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $_GET['inmueble']; ?>&contrato_compra_venta=<?php echo  $_GET['id_contrato_compra_venta']; ?>"><img alt="Borrar factura" border="0" src="<?php echo  $_SESSION['rutaimg'];?>borrar.gif" align="absmiddle" /></a>
					<?php
					}
					?>
				<?php
				}
				?>
			</div>
			<div style="float:right; padding-top:7px;">
				<a href="index.php?id=<?php echo  $_GET['id']; ?>&inmueble=<?php echo  $_GET['inmueble']; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php?id=<?php echo  $_GET['id']; ?>&inmueble=<?php echo  $_GET['inmueble']; ?>">Volver</a>
			</div>			
		</div>
		<br clear="all" />