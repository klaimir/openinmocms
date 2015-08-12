		<div>
			<?php
			if(!$sesion_iniciada)
			{
			?>
			<div class="css3splitmenu nocss3splitmenu">
				<?php if($seccion=="buscador") {?><a class="activo" href="<?php echo  $_SESSION['rutaraiz']; ?>app/buscador/index.php" title="<?php echo  $textos['buscador']; ?>" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }"><?php echo  $textos['buscador']; ?></a> <input type="checkbox" /><?php } else {?><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/buscador/index.php" title="<?php echo  $textos['buscador']; ?>" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }"><?php echo  $textos['buscador']; ?></a> <input type="checkbox" /><?php }?>
			</div>
			<div class="css3splitmenu nocss3splitmenu">
				<?php if($seccion=="noticias") {?><a class="activo" href="<?php echo  $_SESSION['rutaraiz']; ?>app/noticias/rss.php" title="<?php echo  $textos['noticias']; ?>" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }"><?php echo  $textos['noticias']; ?></a> <input type="checkbox" /><?php } else {?><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/noticias/rss.php" title="<?php echo  $textos['noticias']; ?>" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }"><?php echo  $textos['noticias']; ?></a> <input type="checkbox" /><?php }?>
			</div>
			<div class="css3splitmenu nocss3splitmenu">
				<?php if($seccion=="certificacion_energetica") {?><a class="activo" href="<?php echo  $_SESSION['rutaraiz']; ?>app/certificacion_energetica/index.php" title="<?php echo  $textos['certificacion_energetica']; ?>" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }"><?php echo  $textos['certificacion_energetica']; ?></a> <input type="checkbox" /><?php } else {?><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/certificacion_energetica/index.php" title="<?php echo  $textos['certificacion_energetica']; ?>" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }"><?php echo  $textos['certificacion_energetica']; ?></a> <input type="checkbox" /><?php }?>
			</div>
			<?php
			}
			else
			{		
			?>
			<div class="css3splitmenu nocss3splitmenu">
				<?php if($seccion=="inmuebles") {?><a class="activo" href="<?php echo  $_SESSION['rutaraiz']; ?>app/inmuebles/index.php" title="Gestión de inmuebles" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Inmuebles</a> <input type="checkbox" /><?php } else {?><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/inmuebles/index.php" title="Gestión de inmuebles" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Inmuebles</a> <input type="checkbox" /><?php }?>
			</div>
			<div class="css3splitmenu nocss3splitmenu">
				<?php if($seccion=="usuarios") {?><a class="activo" href="<?php echo  $_SESSION['rutaraiz']; ?>app/usuarios/index.php" title="Gestión de usuarios" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Usuarios</a> <input type="checkbox" /><?php } else {?><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/usuarios/index.php" title="Gestión de usuarios" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Usuarios</a> <input type="checkbox" /><?php }?>
			</div>
			<div class="css3splitmenu nocss3splitmenu">
				<?php if($seccion=="clientes") {?><a class="activo" href="<?php echo  $_SESSION['rutaraiz']; ?>app/clientes/index.php" title="Gestión de clientes" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Clientes</a> <input type="checkbox" /><?php } else {?><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/clientes/index.php" title="Gestión de clientes" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Clientes</a> <input type="checkbox" /><?php }?>
			</div>
			<div class="css3splitmenu">
				<?php if($seccion=="noticias") {?><a class="activo" href="<?php echo  $_SESSION['rutaraiz']; ?>app/noticias/index.php" title="Gestión de noticias" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Noticias</a> <input type="checkbox" /><?php } else {?><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/noticias/index.php" title="Gestión de noticias" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Noticias</a> <input type="checkbox" /><?php }?>
				<ul>
					<li><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/noticias/publicacion/index.php" title="Publicación de noticias" style="margin-left:10px">Publicación de noticias</a></li>
					<li><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/noticias/subscripcion/index.php" title="Subscripción de noticias" style="margin-left:10px">Subscripción de noticias</a></li>
				</ul>
			</div>
			<div class="css3splitmenu">
				<?php if($seccion=="informes") {?><a class="activo" href="<?php echo  $_SESSION['rutaraiz']; ?>app/informes/index.php" title="Gestión de informes" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Informes</a> <input type="checkbox" /><?php } else {?><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/informes/index.php" title="Gestión de informes" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Informes</a> <input type="checkbox" /><?php }?>
				<ul>
					<li><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/informes/informe_provincias.php" title="Generar informe por provincias" style="margin-left:10px">Informe por provincias</a></li>
					<li><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/informes/informe_poblaciones.php" title="Generar informe por poblaciones" style="margin-left:10px">Informe por poblaciones</a></li>
					<li><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/informes/informe_regiones.php" title="Generar informe por regiones" style="margin-left:10px">Informe por regiones</a></li>
					<li><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/informes/informe_tipologia.php" title="Generar informe por tipología" style="margin-left:10px">Informe por tipología</a></li>
					<li><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/informes/informe_zonas.php" title="Generar informe por zonas" style="margin-left:10px">Informe por zonas</a></li>
					<li><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/informes/informe_opciones.php" title="Generar informe por opciones" style="margin-left:10px">Informe por opción</a></li>
					<li><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/informes/informe_captadores.php" title="Generar informe por captadores" style="margin-left:10px">Informe por captadores</a></li>
				</ul>
			</div>
			<div class="css3splitmenu">
				<?php if($seccion=="plantillas") {?><a class="activo" href="<?php echo  $_SESSION['rutaraiz']; ?>app/plantillas/index.php" title="Modelos de plantillas" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Plantillas</a> <input type="checkbox" /><?php } else {?><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/plantillas/index.php" title="Modelos de plantillas" onClick="if (modificado==true) { if(confirm('Va a salir sin guardar los datos. &iquest;Desea salir de todas formas?')) return true; else return false; }">Plantillas</a> <input type="checkbox" /><?php }?>
				<ul>
					<li><a target="_blank" href="<?php echo  $_SESSION['rutaraiz']; ?>app/plantillas/generar_ficha_encargo.php" title="Generar modelo de ficha de encargo" style="margin-left:10px">Modelo de ficha de encargo</a></li>
					<li><a target="_blank" href="<?php echo  $_SESSION['rutaraiz']; ?>app/plantillas/generar_ficha_visita.php" title="Generar modelo de ficha de visita" style="margin-left:10px">Modelo de ficha de visita</a></li>
					<li><a target="_blank" href="<?php echo  $_SESSION['rutaraiz']; ?>app/plantillas/generar_contrato_compra_venta.php" title="Generar modelo de contrato de compra-venta" style="margin-left:10px">Modelo de contrato de compra-venta</a></li>
					<li><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/plantillas/contratos_arrendamiento/index.php" title="Generar modelos de contrato de arrendamiento" style="margin-left:10px">Modelos de contrato de arrendamiento</a></li>
					<li><a href="<?php echo  $_SESSION['rutaraiz']; ?>app/plantillas/facturas/index.php" title="Generar modelos de facturas" style="margin-left:10px">Modelos de facturas</a></li>
					<li><a target="_blank" href="<?php echo  $_SESSION['rutaraiz']; ?>app/plantillas/generar_aviso_certificacion_energetica.php" title="Generar modelo de aviso de certificación energética" style="margin-left:10px">Modelo de aviso de certificación energética</a></li>
				</ul>
			</div>
		</div>
		<?php } ?>
		<!-- Script below should follow all split menus -->
		<script type="text/javascript">		
		( function(){ // local scope
		
			if (!document.querySelectorAll || !document.addEventListener)
				return
			var uls = document.querySelectorAll('div.css3splitmenu > ul'),
					docbody = document.documentElement || document.body,
					checkboxes = document.querySelectorAll('div.css3splitmenu > input[type="checkbox"]'),
					zindexvalue = 100
		
			for (var i=0; i<uls.length; i++){
				( function(x){ // closure to capture each i value
					checkboxes[i].addEventListener('click', function(e){
						uls[x].style.zIndex = ++zindexvalue
						for (var y=0; y<uls.length; y++){ // loop through checkboxes other than current and uncheck them (since Chrome doesn't respond to onblur event on checkboxes)
							if (y != x)
								checkboxes[y].checked = false
						}
						e.cancelBubble = true
					})
					checkboxes[i].addEventListener('blur', function(e){
						setTimeout(function(){checkboxes[x].checked = false}, 100) // delay before menu closes, for Opera's sake (otherwise links are un-navigatable)
						e.cancelBubble = true
					})
				}) (i)
			}
		
			docbody.addEventListener('click', function(e){
				for (var i=0; i<uls.length; i++){
					checkboxes[i].checked = false
				}
			})
		
		})();	
		</script>
		<hr  />