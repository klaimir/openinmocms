		<!-- Texto de enlace -->
		<span style="text-align:left; float:left; width:75px;">Texto (*):</span>
		<input class="campo_texto" name="texto_enlace" id="texto_enlace" style="float:left;" type="text" size="70" title="Texto del enlace" value="<?php if($_POST['texto_enlace']) echo $_POST['texto_enlace']; else echo $row_consulta['texto_enlace']; ?>" onchange="modificado=true">
		<!-- URL -->
		<span style="text-align:left; float:left; margin-left:15px; width:70px;">URL (*):</span>
		<input class="campo_texto" name="url" id="url" style="float:left;" type="text" size="95" title="URL" value="<?php if($_POST['url']) echo $_POST['url']; else echo $row_consulta['url']; ?>" onchange="modificado=true">