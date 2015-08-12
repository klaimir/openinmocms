		<?php			
		if($hay_errores)
		{
?>
			<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($errores); ?> error(es) encontrado(s)</div>
			<div class="detalle_errores">
			<ul class="lista_errores">
	<?php
			foreach($errores as $error)
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
			unset($hay_errores);
			unset($errores);
		}
?>