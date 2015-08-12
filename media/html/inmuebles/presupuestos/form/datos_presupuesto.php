		<!-- DATOS DE PRESUPUESTO -->
		<p align="justify" class="titulo_seccion_datos">Datos de Presupuesto</p>
		<div style="float:left; margin:0 auto; text-align:left; width:100%;">
			<!-- Observaciones -->
			<span style="text-align:left">Observaciones: </span><br />
			<textarea class="campo_texto" name="observaciones" style="text-align:left; width:100%; margin-top:3px" id="observaciones" rows="6" title="Observaciones" onchange="modificado=true"><?php if($_POST['observaciones']) echo $_POST['observaciones']; else echo $row_consulta['observaciones']; ?></textarea>
		</div>