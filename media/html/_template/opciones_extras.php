		<span style="margin-left:20px;">
		<?php
		if(!$sesion_iniciada)
		{
		?>
		<a href="<?php echo  $_SESSION['rutaraiz']."app/set_language.php?language=es|es";?>" title="Espa�ol"> <img  src="<?php echo  $_SESSION['rutaimg'];?>flags/es.png" alt="Espa�ol" border="0" /> </a>
		&nbsp;&nbsp;
		<a href="<?php echo  $_SESSION['rutaraiz']."app/set_language.php?language=es|en";?>" title="Ingl�s"> <img  src="<?php echo  $_SESSION['rutaimg'];?>flags/en.png" alt="Ingl�s" border="0" /> </a>
		&nbsp;&nbsp;
		<a href="<?php echo  $_SESSION['rutaraiz']."app/set_language.php?language=es|de";?>" title="Alem�n"> <img  src="<?php echo  $_SESSION['rutaimg'];?>flags/de.png" alt="Alem�n" border="0" /> </a>
		&nbsp;&nbsp;
		<a href="<?php echo  $_SESSION['rutaraiz']."app/set_language.php?language=es|fr";?>" title="Franc�s"> <img  src="<?php echo  $_SESSION['rutaimg'];?>flags/fr.png" alt="Franc�s" border="0" /> </a>
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