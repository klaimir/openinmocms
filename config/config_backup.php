<?php	
	// Rutas para dominio
	define('DOMINIO_BACKUP_FRAMEWORK', 'localhost');
	//define('DOMINIO_BACKUP_FRAMEWORK', 'inmueblesgesticadiz.es');
	// Rutas para temp
	define('TEMP_BACKUP_FRAMEWORK', $_SERVER['DOCUMENT_ROOT'].'/gesticadiz/docs/temp/');
	// Rutas para copia
	define('DIR_BACKUP_FRAMEWORK', '');
	// Rutas para comando de compresión directorios
	define('COMANDO_COMPRESION_DIR_FRAMEWORK', '"c:\\Program Files\\7-zip\\7z.exe" a');
	//define('COMANDO_COMPRESION_DIR_FRAMEWORK', 'tar cf ');
	// Rutas para comando de compresión final
	define('COMANDO_COMPRESION_FINAL_BACKUP_FRAMEWORK', '"c:\\Program Files\\7-zip\\7z.exe" a');
	//define('COMANDO_COMPRESION_FINAL_BACKUP_FRAMEWORK', 'tar czf ');
	// Rutas para extensión de compresión directorios
	define('EXTENSION_COMPRESION_DIR_BACKUP_FRAMEWORK', 'zip');
	//define('EXTENSION_COMPRESION_DIR_BACKUP_FRAMEWORK', 'tar');
	// Rutas para extensión de compresión final
	define('EXTENSION_COMPRESION_FINAL_BACKUP_FRAMEWORK', 'zip');
	//define('EXTENSION_COMPRESION_FINAL_BACKUP_FRAMEWORK', 'tgz');
	// Email del backup
	define('EMAIL_BACKUP_FRAMEWORK', CORREO_ADMINISTRADOR_FRAMEWORK);
?>