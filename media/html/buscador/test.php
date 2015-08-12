		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php"><?php echo  $textos['buscador']; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace"><?php echo  $textos['titulo_seccion']; ?></span></div>
		<p align="justify" class="titulo_seccion"><?php echo  $textos['titulo_seccion']; ?></p>
		
        <form action="" name="formulario" id="formulario" method="post" enctype="multipart/form-data">
            <textarea name="content" style="width:100%"></textarea>
        </form>
        
        <p align="center">
        	<!-- Botón formulario -->	
			<a href="#" onclick="document.formulario.submit();return false"><img id="boton_inserta_bd" alt="Enviar" name="boton_inserta_bd" border="0" src="<?php echo  $_SESSION['rutaimg'];?>mail.png" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="document.formulario.submit();return false">Enviar</a>	
        	<!-- Botón resetear -->	
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset();"><img src="<?php echo  $_SESSION['rutaimg'];?>no.png" border="0" align="absmiddle" /></a>&nbsp;&nbsp;
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('formulario').reset();">Reset</a>
		</p>
        
        <br clear="all" /><br  />
		<!--  Navegacion -->	
		<p align="right">
			<a href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>