		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php">Usuarios</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Datos de usuario</span></div>
        <p align="justify" class="titulo_seccion">Usuarios</p>
        <p align="justify" style="border-bottom:1px solid #666666; padding-bottom:2px; color:#999999"><strong>1. Información general</strong></p>
		<p align="justify">
			<strong>Usuario:</strong>&nbsp;&nbsp;<?php echo  $usuario['apellidos'] . ", " . $usuario['nombre'];?>
			<span style="margin-left:280px"><strong>Fecha alta:</strong>&nbsp;&nbsp;<?php echo  cambiafecha_bd($usuario['fecha_alta']);?></span>
		</p>
		<p align="justify"><img src="<?php echo  $_SESSION['rutaimg'];?>mail.png" align="absmiddle" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php
        	if(!is_null($usuario['correo']))
			{
		?>
        		<a href="mailto:<?php echo  $usuario['correo'];?>"><?php echo  $usuario['correo'];?></a>
        <?php
			}
			else
			{
				echo "sin determinar";
			}
		?>
        </p>
		<!--  Navegacion -->	
		<p align="right">
			<a href="javascript:history.back(1)"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="javascript:history.back(1)">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>