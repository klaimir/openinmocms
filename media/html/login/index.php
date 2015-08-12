		<p class="titulo_formulario_login"><?php echo  $textos['titulo_seccion']; ?></p>
		<form action="" method="POST" class="formulario_login" name="login" enctype="application/x-www-form-urlencoded" >
			<label><?php echo  $campos['usuario']; ?>:</label>&nbsp;&nbsp;<input name="usuario" type="text" class="campo_formulario_login" id="usuario" value="<?php if ($_POST['usuario']) echo $_POST['usuario']; else echo "Usuario"; ?>" tabindex="1" onfocus="this.select();" />&nbsp;&nbsp;&nbsp;
			<label><?php echo  $campos['password']; ?>:</label>&nbsp;&nbsp;<input name="password" type="password" class="campo_formulario_login" id="password" value="password" tabindex="2"  onfocus="this.select();" />
			&nbsp;&nbsp;<input name="aceptar" id="aceptar" type="submit" value="Login" class="boton_formulario_login" style="cursor:pointer" />
		</form>
		<p align="center"><a href="recordar_password.php" title="Problemas al acceder a <?php echo  NOMBRE_EMPRESA; ?>"><?php echo  $textos['problemas_acceso']; ?></a></p>
		<?php
			// Control de errores
			if ($_POST)
			{
				if($_SESSION['hayerroreslogin'])
				{
		?>
						<p align="center" style="margin:0 auto; text-align:center; border:1px dotted #003366; margin-top:15px; padding-top:2px; padding-bottom:2px">							
							<img src="<?php echo  $_SESSION['rutaimg'];?>acceso.png" align="absmiddle" />&nbsp;&nbsp;<?php echo  $_SESSION['erroreslogin']; ?>
						</p>		
		<?php
				}
			}
		?>