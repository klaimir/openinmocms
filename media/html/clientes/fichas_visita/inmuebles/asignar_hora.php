		<a name="top"></a>
		<div class="breadcrumbs_publico">
		<img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../../index.php">Clientes</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../../editar.php?id=<?php echo  $_GET['id']; ?>">Editar</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php?id=<?php echo  $_GET['id']; ?>">Ficha de visita</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../editar.php?id=<?php echo  $_GET['id']; ?>&id_ficha_visita=<?php echo  $_GET['ficha_visita']; ?>">Editar</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?id=<?php echo  $_GET['id']; ?>&ficha_visita=<?php echo  $_GET['ficha_visita']; ?>">Buscador de inmueble</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Asignar hora</span>
		</div>
        <p align="justify" class="titulo_seccion">Clientes</p>
		<?php
		if($_POST)
		{
			// Control de errores
			mostrar_errores($_SESSION['hayerroresasignarhorainmueblefichavisita'],$_SESSION['erroresasignarhorainmueblefichavisita']);
		}
		?>
		<form action=""  name="insertar" id="insertar" method="post" enctype="multipart/form-data">
		<p align="center">
			<!-- Hora -->	
			<span style="text-align:left; width:100px;">Hora (*): </span>
			
			<select id="hora" name="hora" class="campo_texto">
				<option value="" <?php if ($_POST) { if ($_POST['precio_compra'] == '') echo "selected"; } ?>>Seleccione hora...</option>
				<?php
				foreach($intervalos_hora as $hora)
				{
				?>				
				<option value="<?php echo  $hora; ?>" <?php if ($_POST) { if ($_POST['hora'] == $hora) echo "selected"; } else { if ($row_consulta['hora'] == $hora) echo "selected"; } ?> ><?php echo  $hora; ?></option>
				<?php
				}
				?>
			</select>
		</p>
		</form>
		<p align="center">
        	<!-- Botón insertar -->	
			<a href="#" onclick="document.insertar.submit();return false"><img id="boton_inserta_bd" alt="Insertar en BD" name="boton_inserta_bd" border="0" src="<?php echo  $_SESSION['rutaimg'];?>insertar.gif" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.insertar.submit();return false">Asignar hora</a>	
		</p>		
		<!--  Navegacion -->
		<p align="right">
			<a href="<?php echo  enlace_volver_general(); ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="<?php echo  enlace_volver_general(); ?>">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>