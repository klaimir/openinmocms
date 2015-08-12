		<span style="margin-left:20px;">
		<?php
		if(!$sesion_iniciada)
		{
		?>
		<a href="<?php echo  $_SESSION['rutaraiz']."app/set_language.php?language=es|es";?>" title="Español"> <img  src="<?php echo  $_SESSION['rutaimg'];?>flags/es.png" alt="Español" border="0" /> </a>
		&nbsp;&nbsp;
		<a href="<?php echo  $_SESSION['rutaraiz']."app/set_language.php?language=es|en";?>" title="Inglés"> <img  src="<?php echo  $_SESSION['rutaimg'];?>flags/en.png" alt="Inglés" border="0" /> </a>
		&nbsp;&nbsp;
		<a href="<?php echo  $_SESSION['rutaraiz']."app/set_language.php?language=es|de";?>" title="Alemán"> <img  src="<?php echo  $_SESSION['rutaimg'];?>flags/de.png" alt="Alemán" border="0" /> </a>
		&nbsp;&nbsp;
		<a href="<?php echo  $_SESSION['rutaraiz']."app/set_language.php?language=es|fr";?>" title="Francés"> <img  src="<?php echo  $_SESSION['rutaimg'];?>flags/fr.png" alt="Francés" border="0" /> </a>
		&nbsp;&nbsp;
		<?php
		}
		?>
		<a href="<?php echo  URL_EMPRESA; ?>" title="Inicio"> <img  src="<?php echo  $_SESSION['rutaimg'];?>home.png" alt="Inicio" border="0" /> </a>
		&nbsp;&nbsp;
		<a href="#" title="Reducir letra" onClick="reducir();"> <img src="<?php echo  $_SESSION['rutaimg'];?>fuentemenos.jpg" border="0" alt="Disminuir letra" /> </a>
		&nbsp;&nbsp;
		<a href="#" title="Aumentar letra" onClick="aumentar();" height="18" width="18"> <img border="0" src="<?php echo  $_SESSION['rutaimg'];?>fuentemas.jpg" alt="Aumentar letra" /> </a>
		</span>