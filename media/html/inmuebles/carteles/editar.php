		<a name="top"></a>
		<div class="breadcrumbs_publico">
		<img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Inmuebles</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../editar.php?id=<?php echo  $_GET['id']; ?>">Editar</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?id=<?php echo  $_GET['id']; ?>">Carteles</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Editar</span>
		</div>
        <p align="justify" class="titulo_seccion">Inmuebles</p>
		<div class="regla_horizontal_superior">
			<div style="float:left;">
				<!-- Generar cartel -->
				<a href="#" onclick="document.editar.submit();return false"><img id="boton_inserta_bd" alt="Insertar en BD" name="boton_inserta_bd" border="0" src="<?php echo  $_SESSION['rutaimg'];?>actualizar.gif" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.editar.submit();return false">Generar cartel</a>
			</div>
			<div style="float:right; padding-top:4px;">
				<a href="index.php?id=<?php echo  $_GET['id']; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php?id=<?php echo  $_GET['id']; ?>">Volver</a>
			</div>			
		</div>
		<br clear="all" />
		<?php
		if($_POST)
		{
			// Control de errores
			if($_SESSION['hayerroreseditarcartel'])
			{
	?>
				<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroreseditarcartel']); ?> error(es) encontrado(s)</div>
				<div class="detalle_errores">
				<ul class="lista_errores">
	<?php
				foreach($_SESSION['erroreseditarcartel'] as $error)
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
			<?php include('form_cartel.php'); ?>
		</form>
		<br clear="all" /><br  />
		<div class="regla_horizontal_inferior">
			<div style="float:left;">
				<!-- Generar cartel -->
				<a href="#" onclick="document.editar.submit();return false"><img id="boton_inserta_bd" alt="Insertar en BD" name="boton_inserta_bd" border="0" src="<?php echo  $_SESSION['rutaimg'];?>actualizar.gif" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.editar.submit();return false">Generar cartel</a>
			</div>
			<div style="float:right; padding-top:7px;">
				<a href="index.php?id=<?php echo  $_GET['id']; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php?id=<?php echo  $_GET['id']; ?>">Volver</a>
			</div>			
		</div>
		<br clear="all" />