		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<title><?php echo  NOMBRE_EMPRESA; ?>. Buscador de inmuebles</title>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
            <link rel="stylesheet" type="text/css" href="<?php echo  $_SESSION['rutacssbootstrap']; ?>bootstrap.css">
		</head>
		<body>
				<?php //InterfazBootStrap::Cabecera(); ?>
				<?php InterfazBootStrap::Menu($opcion_menu); ?>
                <br /><br /><br />
				<div class="container">
					<?php $interfaz();  ?>
				</div>			
				<br clear="all">	
				<?php InterfazBootStrap::Pie(); ?>
		</body>
		</html>