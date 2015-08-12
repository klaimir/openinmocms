		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Inmuebles</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../editar.php?id=<?php echo  $_GET['id'];?>" onclick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Editar</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php?id=<?php echo  $_GET['id'];?>" onclick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Adjuntos</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Insertar Adjunto</span></div>
        <p align="justify" class="titulo_seccion">Inmuebles</p>	
		<?php
			// Control de errores
			if ($_POST)
			{
				if($_SESSION['hayerroresinsertaradjunto'])
				{
		?>
					<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroresinsertaradjunto']); ?> error(es) encontrado(s)</div>
					<div class="detalle_errores">
					<ul class="lista_errores">
		<?php
					foreach($_SESSION['erroresinsertaradjunto'] as $error)
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
		<form action="" name="formulario" id="formulario" method="post" enctype="multipart/form-data">
		<!-- Texto fichero -->
		<span style="text-align:right">Texto fichero (*): </span>
		<input class="campo_texto" name="texto" id="texto" type="text" size="79" title="Texto fichero" value="<?php if($_POST['texto']) echo $_POST['texto']; ?>" tabindex="1" onchange="modificado=true">
		<!-- Fichero -->
		<span style="text-align:right; margin-left:20px">Fichero (<?php echo  MAXTAM_FICHADJUNT;?>Mb. MAX.) (*): </span>
		<input class="campo_texto" type="file" id="fichero" name="fichero" size="40px" title="Fichero (1Mb. MAX.)" tabindex="2"  onchange="modificado=true">
		<br /><br />
		<!-- pago (oculto) -->
		<input type="hidden" id="id" name="id" value="<?php echo  $_GET['id'];?>" />
		<p align="center">
        	<!-- Botón insertar -->	
			<a href="#" onclick="document.formulario.submit();return false"><img id="boton_inserta_bd" alt="Insertar en BD" name="boton_inserta_bd" border="0" src="<?php echo  $_SESSION['rutaimg'];?>insertar.gif" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.formulario.submit();return false">Insertar en BD</a>	
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<!-- Botón resetear -->
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset();"><img src="<?php echo  $_SESSION['rutaimg'];?>no.png" border="0" align="absmiddle" /></a>&nbsp;&nbsp;
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset();">Limpiar todo</a>			
        </p>
		</form>
		<!--  Navegacion -->	
		<p align="right">
			<a onclick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }" href="index.php?id=<?php echo  $_GET['id'];?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a onclick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }" href="index.php?id=<?php echo  $_GET['id'];?>">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>