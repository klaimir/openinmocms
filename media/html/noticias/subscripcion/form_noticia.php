		<!-- DATOS DE CANAL DE NOTICIAS -->
		<p align="justify" class="titulo_seccion_datos">Datos del canal de noticias</p>
		<div style="float:left; margin:0 auto; text-align:left; width:50%;">
			<!-- T�tulo -->	
			<span style="text-align:left;">T�tulo: </span>
			<br />
			<input class="campo_texto" name="titulo" id="titulo" type="text" size="90" title="T�tulo" value="<?php if($_POST['titulo']) echo $_POST['titulo']; else echo $row_consulta['titulo']; ?>" >
			<br  /><br  />
			<!-- Enlace -->
			<span style="text-align:left">Enlace: </span>
			<br />
			<input class="campo_texto" name="enlace" id="enlace" type="text" size="80" title="Direcci�n" value="<?php if($_POST['enlace']) echo $_POST['enlace']; else echo $row_consulta['enlace']; ?>" onchange="modificado=true">
		</div>
		<div style="float:left; margin:0 auto; text-align:left; width:47%; border-left:1px dotted #999;">
			<div style="margin-left:15px">
			<!-- Descripci�n -->
			<span style="text-align:left">Descripci�n: </span><br />
			<textarea name="descripcion" style="text-align:left; width:100%; margin-top:3px" id="descripcion" rows="10" title="Descripci�n" onchange="modificado=true"><?php if($_POST['descripcion']) echo $_POST['descripcion']; else echo $row_consulta['descripcion']; ?></textarea>
			</div>
		</div>
		<br clear="all" />