		<div id="cabecera">			
			<a href="<?php echo  URL_EMPRESA; ?>" target="_blank"><img style="border:0" height="220px" width="100%" src="<?php echo  $_SESSION['rutaimg']; ?>cabecera.png" alt="<?php echo  NOMBRE_EMPRESA; ?>" title="" /></a>
			<br  />
			<hr  />
				<?php
				if($sesion_iniciada)
				{ 
				?>
					<div style="width: 32%; float:left; text-align:left">
						<span><img src="<?php echo  $_SESSION['rutaimg']; ?>user_gris.png" alt="Usuario" title="Usuario"/ align="absmiddle"> :&nbsp; <?php echo  $_SESSION['nom'] . ' ' . $_SESSION['apell']; ?></span>
						<br  /><br  />	
						<span><img border="0" src="<?php echo  $_SESSION['rutaimg']; ?>logout.png" alt="Desconectar" title="Desconectar"/ align="absmiddle">&nbsp;&nbsp;&nbsp;<a href="<?php echo  $_SESSION['rutaraiz']; ?>app/login/desconectar.php" title="Salir" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Salir</a></span>
					</div>
					<div class="css3splitmenu nocss3splitmenu" style="width: 35%;  float:left; text-align:center">
						<a class="activo" href="<?php echo  URL_EMPRESA; ?>" target="_blank" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }"><h2><?php echo  NOMBRE_EMPRESA; ?> INMOBILIARIA</h2></a> <input type="checkbox" />
					</div>
					<div style="width: 30%;  float:left; text-align:right">
						<span id="reloj" title="Hora"><script type="text/javascript">muestra_reloj();</script></span>
						&nbsp;&nbsp;<span id="fecha_actual" title="Fecha"><script type="text/javascript">muestra_fecha();</script></span>
						<br  /><br  />
						<?php Interfaz::OpcionesExtras(); ?>
					</div>
				<?php
				}
				else
				{
				?>
					<div style="width: 32%; float:left; text-align:left">						
						<span id="reloj" title="Hora"><script type="text/javascript">muestra_reloj();</script></span>
						&nbsp;&nbsp;<span id="fecha_actual" title="Fecha"><script type="text/javascript">muestra_fecha();</script></span>
					</div>
					<div class="css3splitmenu nocss3splitmenu" style="width: 35%;  float:left">
						<a class="activo" href="<?php echo  URL_EMPRESA; ?>" target="_blank" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }"><h2><?php echo  NOMBRE_EMPRESA; ?> INMOBILIARIA</h2></a> <input type="checkbox" />
					</div>
					<div style="width: 30%;  float:left; text-align:right">
						<?php Interfaz::OpcionesExtras(); ?>
					</div>
				<?php
				}
				?>
		</div>
		<br  />
		<hr  />