<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

//
// Technical information
//
$lang['auteur_nom'] = "David Vidal Serra, Sergio Romero"; // nombre del traductor
$lang['auteur_email'] = "davidvs@gmail.com,mustainetrad@yahoo.es"; // mail del traductor
$lang['charset'] = "utf-8"; // charset del archivo de idioma (utf-8 predefinido)
$lang['text_dir'] = "ltr"; // ('ltr' for left to right, 'rtl' for right to left)
$lang['lang_iso'] = "es"; // iso language code
$lang['lang_libelle_en'] = "Spanish"; // nombre del idioma en inglés
$lang['lang_libelle_fr'] = "Espagnol"; // nombre del idioma en francés
$lang['unites_bytes'] = array('Octetos', 'Ko', 'Mo', 'Go', 'To', 'Po', 'Eo');
$lang['separateur_milliers'] = ' '; // tres cientos mil se escribe en español 300 000
$lang['separateur_decimaux'] = ','; // entre la parte entera de un número y la parte decimal

//
// HTML Markups
//
$lang['head_titre'] = "phpMyVisites | Aplicación libre y gratuita de gestión de estadísticas y medida de audiencia de sitios en Internet"; // Título de las  páginas de estadísticas en el header html
$lang['head_keywords'] = "phpmyvisites, php, script, aplicación, programa, estadísticas, medida de audiencia, audiencia, gratuito, open source, gpl, visitas, visitantes, mysql, páginas vistas, páginas, vistas, horas de visitas, gráficos, navegadores, sistema operativo, sistemas de explotación, resoluciones, día, semana, mes, récord, país, host, proveedor, buscadores, palabras claves, seguimiento, referencias, gráficos, páginas de entrada, páginas de salida, gráficos circulares"; // Palabras claves del header html
$lang['head_description'] = "phpMyVisites | Aplicación de gestión de estadísticas y medida de audiencia de sitios en Internet | Programa gratuito de código abierto distribuido bajo licencia GPL, desarrollado en php/MySQL"; // Descripción en el header html 
$lang['logo_description'] = "phpMyVisites : estadísticas y medida de audiencia de sitios en Internet (licencia GPL)"; // descripción para el código JS : ir al grano

//
// Main menu & submenu
//
$lang['menu_visites'] = "Visitas";
$lang['menu_pagesvues'] = "Páginas vistas";
$lang['menu_suivi'] = "Seguimiento";
$lang['menu_provenance'] = "Procedencia";
$lang['menu_configurations'] = "Configuración";
$lang['menu_affluents'] = "Afluencia";
$lang['menu_listesites'] = "Lista de sitios";
$lang['menu_bilansites'] = "Resumen";
$lang['menu_jour'] = "Día";
$lang['menu_semaine'] = "Semana";
$lang['menu_mois'] = "Mes";
$lang['menu_annee'] = "Año";
$lang['menu_periode'] = "Periodo estudiado: %s"; // Período estudiado : Lunes 11 de Noviembre
$lang['liens_siteofficiel'] = "Sitio oficial";
$lang['liens_admin'] = "Administración";
$lang['liens_contacts'] = "Contactos";

//
// Divers
//
$lang['generique_nombre'] = "Número";
$lang['generique_tauxsortie'] = "Tasa de salidas";
$lang['generique_ok'] = "OK";
$lang['generique_timefooter'] = "Página generada en %s segundos"; // tiempo en segundos
$lang['generique_divers'] = "Otros"; // (para los gráficos)
$lang['generique_inconnu'] = "Desconocido"; // (para los gráficos)
$lang['generique_vous'] = "... ¿Usted ?";
$lang['generique_traducteur'] = "Traductor";
$lang['generique_langue'] = "Idioma";
$lang['generique_autrelangure'] = "¿Otro?"; // Autre langue, appel à contribution
$lang['aucunvisiteur_titre'] = "Ningún visitante en este periodo."; 
$lang['generique_aucune_visite_bdd'] = "<b>¡Aviso ! </b> No hay ningún visitante registrado en la base de datos del sitio actual. Asegúrese de incluir el código Javascript en sus páginas con la URL correcta de phpMyVisites <u>DENTRO</u> del código Javascript. Consulte la documentación para obtener ayuda.";
$lang['generique_aucune_site_bdd'] = "¡No hay ningún sitio registrado en la base de datos ! Intente conectarse como Usuario principal de phpMyVisites para añadir un sitio nuevo.";
$lang['generique_retourhaut'] = "Arriba";
$lang['generique_tempsvisite'] = "%smin %ss"; // 3min 25s means 3 minutes and 25 seconds
$lang['generique_tempsheure'] = "%sh"; // 4h means 4 hours
$lang['generique_siteno'] = "Sitio %s"; // Site "phpmyvisites"
$lang['generique_newsletterno'] = "Boletín %s"; // Newsletter "version 2 announcement"
$lang['generique_partnerno'] = "Partner %s"; // Partner "version 2 announcement"
$lang['generique_general'] = "General";
$lang['generique_user'] = "Usuario %s"; // User "Admin"
$lang['generique_previous'] = "Anterior";
$lang['generique_next'] = "Siguiente";
$lang['generique_lowpop'] = "Exclude low population from statistics";
$lang['generique_allpop'] = "Include all the population in statistics";
$lang['generique_to'] = "a"; // 4 'to' 8
$lang['generique_total_on'] = "en"; // 4 to 8 'on' 10
$lang['generique_total'] = "TOTAL";
$lang['generique_information'] = "Información";
$lang['generique_done'] = "¡Listo!";
$lang['generique_other'] = "Otros";
$lang['generique_description'] = "Descripción:";
$lang['generique_name'] = "Nombre:";
$lang['generique_variables'] = "Variables";
$lang['generique_logout'] = "Salir";
$lang['generique_login'] = "Entrar";
$lang['generique_hits'] = "Accesos";
$lang['generique_errors'] = "Errores";
$lang['generique_site'] = "Sitio";
$lang['generique_help_novisits'] = "Tip: Have you %s installed the tracker (javascript code) %s on your pages?";

//
// Authentication
//
$lang['login_password'] = "contraseña :"; // en minúsculas
$lang['login_login'] = "usuario :"; // en minúsculas
$lang['login_error'] = "Error en de la conexión. Usuario/contraseña incorrectos.";
$lang['login_error_nopermission'] = "The user specified doesn't have any permission. Please ask the Super User to set up your website view/admin permissions in phpMyVisites.";
$lang['login_protected'] = "Intenta entrar en un área protegida de %sphpMyVisites%s.";

//
// Contacts & "Others ?"
//
$lang['contacts_titre'] = "Contactos";
$lang['contacts_langue'] = "Traducciones";
$lang['contacts_merci'] = "Agradecimientos";
$lang['contacts_auteur'] = "El autor de la aplicación, de la documentación y creador del proyecto phpMyVisites es <strong>Matthieu Aubry</strong>.";
$lang['contacts_questions'] = "Si tiene <strong>preguntas de tipo técnico o sugerencias, o ha detectado un fallo en el programa</strong>, por favor <strong>utilice los foros previstos para tal efecto</strong> en la página oficial %s. Para otro tipo de preguntas, por favor póngase en contacto con el autor usando el formulario de la página oficial."; // dirección del sitio
$lang['contacts_trad1'] = "¿Desea utilizar phpMyVisites en otro idioma? Puede contribuir a la traducción de la aplicación, <strong>¡phpMyVisites le necesita!</strong>";
$lang['contacts_trad2'] = "Traducir phpMyVisites es un trabajo que requiere un poco de tiempo (algunas horas) y que precisa un perfecto dominio de ambos idiomas; pero <strong>dicho trabajo será muy útil para el resto de usuarios</strong>, los cuales podrán utilizar plenamente phpMyVisites. Si está interesado en traducir phpMyVisites, encontrará todas la información necesaria en %s la documentación oficial de phpMyVisites %s."; // vínculo hacia la doc
$lang['contacts_doc'] = "No dude en consultar %s la documentación oficial de phpMyVisites %s para obtener más información sobre la instalación, la configuración, las funciones de phpMyVisites, etc. Está disponible directamente en su versión de phpMyVisites."; // vínculo hacia la doc
$lang['contacts_thanks_dev'] = "Gracias a <strong>%s</strong>, que ayudaron a programar phpMyVisites, por el trabajo de calidad realizado en este proyecto.";
$lang['contacts_merci3'] = "No dude en consultar la página de agradecimientos en el sitio oficial de phpMyVisites para obtener una lista completa de los amigos de phpMyVisites.";
$lang['contacts_merci2'] = "Muchísimas gracias también a todos los que han compartido sus conocimientos al traducir phpMyVisites :";

//
// Rss & Mails
//
$lang['rss_titre'] = "Sitio %s el %s"; // Site MyHomePage on Sunday 29 
$lang['rss_go'] = "Ir a estadísticas detalladas";
$lang['mail_sender_name'] = "Web statistics (Automatic)";

//
// Visits Part
//
$lang['visites_titre'] = "Información de visitas";
$lang['visites_statistiques'] = "Estadísticas";
$lang['visites_periodesel'] = "Para el período seleccionado";
$lang['visites_visites'] = "Visitas";
$lang['visites_uniques'] = "Visitantes únicos";
$lang['visites_pagesvues'] = "Páginas vistas";
$lang['visites_pagesvisiteurs'] = " Páginas vistas por visitante";
$lang['visites_pagesvisites'] = "Páginas por visita"; 
$lang['visites_pagesvisitessign'] = "Páginas por visita significativa"; 
$lang['visites_tempsmoyen'] = "Tiempo medio de visita";
$lang['visites_tempsmoyenpv'] = "Tiempo medio por página vista";
$lang['visites_tauxvisite'] = "Tasa de visitas de una página";
$lang['visites_average_visits_per_day'] = "Average visits per day"; 
$lang['visites_recapperiode'] = "Resumen del período";
$lang['visites_nbvisites'] = "Visitas";
$lang['visites_aucunevivisite'] = "Sin visitas"; // en un cuadro, ir al grano 
$lang['visites_recap'] = "Resumen";
$lang['visites_unepage'] = "1 página"; // (gráfico)
$lang['visites_pages'] = "%s páginas"; // 1-2 páginas (gráfico)
$lang['visites_min'] = "%s min"; // 10-15 min (gráfico)
$lang['visites_sec'] = "%s s"; // 0-30 s (segundos, gráfico)
$lang['visites_grapghrecap'] = "Gráfico resumen de las estadísticas";
$lang['visites_grapghrecaplongterm'] = "Gráfico resumen de estadísticas a largo plazo";
$lang['visites_graphtempsvisites'] = "Gráfico de duración de visitas por visitante";
$lang['visites_graphtempsvisitesimg'] = "Duración de visitas por visitante";
$lang['visites_graphheureserveur'] = "Gráfico de visitas por hora del servidor";
$lang['visites_graphheureserveurimg'] = "Visitantes por hora del servidor";
$lang['visites_graphheurevisiteur'] = "Gráfico de visitas por hora del visitante";
$lang['visites_graphheurelocalimg'] = "Visitas por hora local";
$lang['visites_longterm_statd'] = "Análisis a largo plazo (Días del periodo)";
$lang['visites_longterm_statm'] = "Análisis a largo plazo (Meses del periodo)";

//
// Sites Summary
//
$lang['summary_title'] = "Resumen del sitio";
$lang['summary_stitle'] = "Resumen";

//
// Frequency Part
//
$lang['frequence_titre'] = "Visitantes asiduos";
$lang['frequence_nouveauxconnusgraph'] = "Gráfico de visitas nuevas y frecuentes";
$lang['frequence_nouveauxconnus'] = "Visitas nuevas y frecuentes";
$lang['frequence_titremenu'] = "Frecuencia";
$lang['frequence_visitesconnues'] = "Visitas frecuentes";
$lang['frequence_nouvellesvisites'] = "Visitas nuevas";
$lang['frequence_visiteursconnus'] = "Visitantes asiduos";
$lang['frequence_nouveauxvisiteurs'] = "Visitantes nuevos";
$lang['frequence_returningrate'] = "Tasa de asiduidad";
$lang['pagesvues_vispervisgraph'] = "Gráfico de número de visitas por visitante";
$lang['frequence_vispervis'] = "Número de visitas por visitante";
$lang['frequence_vis'] = "visita";
$lang['frequence_visit'] = "1 visita"; // (graph)
$lang['frequence_visits'] = "%s visitas"; // (graph)

//
// Seen Pages
//
$lang['pagesvues_titre'] = "Información de páginas vistas";
$lang['pagesvues_joursel'] = "Día seleccionado";
$lang['pagesvues_jmoins7'] = "Día D-7";
$lang['pagesvues_jmoins14'] = "Día D-14";
$lang['pagesvues_moyenne'] = "(media)";
$lang['pagesvues_pagesvues'] = "Páginas vistas";
$lang['pagesvues_pagesvudiff'] = "Páginas diferentes vistas";
$lang['pagesvues_recordpages'] = "Máx. número de páginas vistas por un visitante";
$lang['pagesvues_tabdetails'] = "Cuadro de detalles de las páginas vistas (de %s a %s)"; // (de 1 à 21)
$lang['pagesvues_graphsnbpages'] = "Gráfico de las visitas por número de páginas vistas";
$lang['pagesvues_graphnbvisitespageimg'] = "Visitas por número de páginas vistas";
$lang['pagesvues_graphheureserveur'] = "Gráfico de las páginas vistas por hora del servidor";
$lang['pagesvues_graphheureserveurimg'] = "Páginas vistas por hora del servidor";
$lang['pagesvues_graphheurevisiteur'] = "Gráfico de las páginas vistas por hora del visitante";
$lang['pagesvues_graphpageslocalimg'] = "Páginas vistas por hora local";
$lang['pagesvues_tempsparpage'] = "Tiempo por página";
$lang['pagesvues_total_time'] = "Tiempo total";
$lang['pagesvues_avg_time'] = "Tiempo medio";
$lang['pagesvues_help_pagename'] = "Did you know that you can give a friendly name to your pages?";
$lang['pagesvues_help_track_dls'] = "Did you know that you can track Downloads, and external Urls redirection?";

//
// Follows-Up
//
$lang['suivi_titre'] = "Seguimiento del visitante";
$lang['suivi_pageentree'] = "Páginas de entrada";
$lang['suivi_pagesortie'] = "Páginas de salida";
$lang['suivi_tauxsortie'] = "Tasa de salida";
$lang['suivi_pageentreehits'] = "Entradas";
$lang['suivi_pagesortiehits'] = "Salidas";
$lang['suivi_singlepage'] = "Visitas a una sola página";

//
// Origin
//
$lang['provenance_titre'] = "Procedencia";
$lang['provenance_recappays'] = "Resumen por países";
$lang['provenance_pays'] = "País";
$lang['provenance_paysimg'] = "Gráfico de los países de los visitantes";
$lang['provenance_fai'] = "Proveedores de Internet";
$lang['provenance_nbpays'] = "Número de países diferentes : %s";
$lang['provenance_provider'] = "Proveedores"; // el mismo que $lang['provenance_fai'], excepto si $lang['provenance_fai'] demasiado largo
$lang['provenance_continent'] = "Continente";
$lang['provenance_mappemonde'] = "Mapamundi";
$lang['provenance_interetspays'] = "Representación de países";

//
// Setup
//
$lang['configurations_titre'] = "Configuración de visitantes";
$lang['configurations_os'] = "Sistema operativo (SO)";
$lang['configurations_osimg'] = "Gráfico de SO por visitante";
$lang['configurations_navigateurs'] = "Navegadores";
$lang['configurations_navigateursimg'] = "Graficó de navegadores por visitante";
$lang['configurations_resolutions'] = "Resolución de pantalla";
$lang['configurations_resolutionsimg'] = "Gráfico de resoluciones por visitante";
$lang['configurations_couleurs'] = "Colores de pantalla";
$lang['configurations_couleursimg'] = "Gráfico de colores de pantalla por visitante";
$lang['configurations_rapport'] = "Pantalla ancha/normal";
$lang['configurations_large'] = "Pantalla ancha";
$lang['configurations_normal'] = "Pantalla normal";
$lang['configurations_double'] = "Pantalla doble";
$lang['configurations_plugins'] = "Aplicaciones"; // TODO : translate
$lang['configurations_navigateursbytype'] = "Navegadores (por tipo)"; // TODO : translate
$lang['configurations_navigateursbytypeimg'] = "Gráfico de tipos de navegador"; // TODO : translate
$lang['configurations_os_interest'] = "Representación de sistemas operativos";
$lang['configurations_navigateurs_interest'] = "Representación de navegadores";
$lang['configurations_resolutions_interest'] = "Representación de resoluciones de pantalla";
$lang['configurations_couleurs_interest'] = "Representación de colores de pantalla";
$lang['configurations_configurations'] = "Configuraciones";

//
// Referers
//
$lang['affluents_titre'] = "Afluencia";
$lang['affluents_recapimg'] = "Gráfico resumen de afluencia";
$lang['affluents_directimg'] = "Directa";
$lang['affluents_sitesimg'] = "Sitios Web";
$lang['affluents_moteursimg'] = "Buscadores";
$lang['affluents_referrersimg'] = "Afluencia";
$lang['affluents_moteurs'] = "Buscadores";
$lang['affluents_nbparmoteur'] = "Número de visitantes que han llegado al sitio mediante buscador: %s";
$lang['affluents_aucunmoteur'] = "Ningún visitante ha llegado al sitio mediante buscador.";
$lang['affluents_motscles'] = "Palabras clave";
$lang['affluents_nbmotscles'] = "Número de distintas palabras clave: %s";
$lang['affluents_aucunmotscles'] = "No se han encontrado palabras clave.";
$lang['affluents_sitesinternet'] = "Sitios de Internet";
$lang['affluents_nbautressites'] = "Número de visitantes que han llegado al sitio mediante vínculos en otro sitios de Internet: %s";
$lang['affluents_nbautressitesdiff'] = "Número de sitios diferentes: %s";
$lang['affluents_aucunautresite'] = "Ningún visitante ha llegado al sitio mediante otro sitios de Internet.";
$lang['affluents_entreedirecte'] = "Entradas directas";
$lang['affluents_nbentreedirecte'] = "Número de visitantes que han llegado directamente al sitio: %s";
$lang['affluents_nbpartenaires'] = "Visitas mediante asociados : %s";
$lang['affluents_aucunpartenaire'] = "No se han producido visitas mediante sitios asociados.";
$lang['affluents_nbnewsletters'] = "Visitas mediante boletínes : %s";
$lang['affluents_aucunnewsletter'] = "No se han producido visitas mediante boletínes.";
$lang['affluents_details'] = "Detalles"; // en el cuadro bajo los resultados de sitios referrers
$lang['affluents_interetsmoteurs'] = "Representación de buscadores";
$lang['affluents_interetsmotscles'] = "Representación de palabras clave";
$lang['affluents_interetssitesinternet'] = "Representación de sitios Web";
$lang['affluents_partenairesimg'] = "Asociados";
$lang['affluents_partenaires'] = "Asociados";
$lang['affluents_interetspartenaires'] = "Representación de asociados";
$lang['affluents_newslettersimg'] = "Boletines";
$lang['affluents_newsletters'] = "Boletines";
$lang['affluents_interetsnewsletters'] = "Representación de boletines";
$lang['affluents_type'] = "Tipo de afluencia";
$lang['affluents_interetstype'] = "Representación de tipos de acceso";

//
// Summary
//
$lang['purge_titre'] = "Resumen de visitas y afluencia";
$lang['purge_intro'] = "Este período se ha borrado de la administración: sólo se han guardado las estadísticas más relevantes.";
$lang['admin_purge'] = "Borrado y optimización de la base de datos";
$lang['admin_purgeintro'] = "Esta sección le permite gestionar los datos de phpMyVisites. Puede consultar el espacio ocupado por los datos, optimizarlos (aconsejado para datos de gran tamaño), o borrar datos remotos. Esto le permitirá limitar el tamaño de los datos de la base de datos.";
$lang['admin_optimisation'] = "Optimización de [ %s ]..."; // nombre de las tablas
$lang['admin_postopt'] = "El tamaño total ha disminuido %chiffres% %unites%"; // Ex : 28 Ko
$lang['admin_purgeres'] = "Borrado de períodos siguientes: %s";
$lang['admin_purge_fini'] = "Fin de la operación de borrado de tablas...";
$lang['admin_bdd_nom'] = "Nombre";
$lang['admin_bdd_enregistrements'] = "Registros";
$lang['admin_bdd_taille'] = "Tamaño de la tabla";
$lang['admin_bdd_opt'] = "Optimizar";
$lang['admin_bdd_purge'] = "Borrado de tablas";
$lang['admin_bdd_optall'] = "Optimizar todo";
$lang['admin_purge_j'] = "Borrado de elementos con más de %s días";
$lang['admin_purge_s'] = "Borrado de elementos con más de %s semanas";
$lang['admin_purge_m'] = "Borrado de elementos con más de %s meses";
$lang['admin_purge_y'] = "Borrado de elementos con más de %s años";
$lang['admin_purge_logs'] = "Borrado de registros (Archivar cada día transcurrido)";
$lang['admin_purge_autres'] = "Purga comuna a la tabla '%s'";
$lang['admin_purge_none'] = "No es posible realizar una acción";
$lang['admin_purge_cal'] = "Calcular y borrar (el proceso puede durar unos minutos)";
$lang['admin_alias_title'] = "Alias de sitios Web y URLs";
$lang['admin_partner_title'] = "Sitios Web asociados";
$lang['admin_newsletter_title'] = "Boletines de sitios Web";
$lang['admin_ip_exclude_title'] = "Rangos de dirección IP que excluir de la estadística";
$lang['admin_name'] = "Nombre:";
$lang['admin_error_ip'] = "La dirección IP debe tener el formato correcto: %s";
$lang['admin_site_name'] = "Nombre del sitio";
$lang['admin_site_url'] = "URL principal del sitio";
$lang['admin_db_log'] = "Intente conectarse como Usuario principal de phpMyVisites para cambiar la configuración de la BBDD.";
$lang['admin_error_critical'] = "Error. Debe solucionarse para el correcto funcionamiento de phpMyVisites.";
$lang['admin_warning'] = "Atención, phpMyVisites funcionará correctamente pero es posible que otras funciones no.";
$lang['admin_move_group'] = "Mover al grupo:";
$lang['admin_move_select'] = "Seleccionar un grupo";
$lang['admin_site_select'] = "Site to administrate";

//
// Setup
//
$lang['admin_intro'] = "Bienvenido a la sección de configuración de phpMyVisites. Puede modificar y configurar todos los datos relativos a la instalación. Si tiene problemas al utilizar algunas funciones, visite %s la documentación oficial de phpMyVisites %s."; // vínculo hacia la documentación
$lang['admin_configetperso'] = "Configuración general";
$lang['admin_afficherjavascript'] = "Visualizar el código Javascript que incluir en las páginas";
$lang['admin_cookieadmin'] = "No aparecer en las estadísticas";
$lang['admin_ip_ranges'] = "No tomar en cuenta rangos IP/IP en las estadísticas";
$lang['admin_sitesenregistres'] = "Lista de sitios registrados:";
$lang['admin_retour'] = "Volver";
$lang['admin_cookienavigateur'] = "Tiene la opción de no aparecer en las estadísticas de phpMyVisites cuando visite el sitio gracias a las cookies. Esta opción sólo será válida con el navegador que use al configurar phpMyVisites. Podrá cambiar aquí esta configuración cuando lo desee.";
$lang['admin_prendreencompteadmin'] = "Tomar en cuenta al administrador en las estadísticas (borrar cookie)";
$lang['admin_nepasprendreencompteadmin'] = "No tomar en cuenta al administrador en las estadísticas (crear cookie)";
$lang['admin_etatcookieoui'] = "Actualmente se le toma en cuenta en las estadísticas de este sitio (según la configuración por defecto, se le considerará como visitante normal).";
$lang['admin_etatcookienon'] = "Actualmente no se le toma en cuenta en las estadísticas de este sitio (no aparecerá en las estadísticas de phpMyVisites cuando visite el sitio).";
$lang['admin_deleteconfirm'] = "Confirme que desea eliminar %s?";
$lang['admin_sitedeletemessage'] = "<u>Precaución</u>: todos los datos asociados al sitio se eliminarán <br>de manera permanente.";
$lang['admin_confirmyes'] = "Sí, eliminar";
$lang['admin_confirmno'] = "No, no eliminar";
$lang['admin_nonewsletter'] = "¡No se encontró ningún boletín para este sitio!";
$lang['admin_nopartner'] = "¡No se encontró ningún Asociado para este sitio!";
$lang['admin_get_question'] = "¿Registrar las variables GET? (variables URL)";
$lang['admin_get_a1'] = "Registrar TODAS las variables URL";
$lang['admin_get_a2'] = "NO registrar variables URL";
$lang['admin_get_a3'] = "Registrar SÓLO variables especificadas";
$lang['admin_get_a4'] = "Registrar todas EXCEPTO las variables especificadas";
$lang['admin_get_default_pdf'] = "PDF report :";
$lang['admin_get_default_pdfdefault'] = "Defaut PDF report"; 
$lang['admin_get_default_theme'] = "Visual theme for this site:";
$lang['admin_get_list'] = "Nombres de variables (separados por <b>;</b>) <br/>Ejemplo : %s";
$lang['admin_required'] = "Se requiere %s.";
$lang['admin_title_required'] = "Requerido";
$lang['admin_write_dir'] = "Directorios que permiten escritura";
$lang['admin_chmod_howto'] = "Estos directorios deben permitir la escritura del servidor. Debe asignar permiso a los mismos (chmod 777) con su programa de FTP (haga clic con el botón secundario del ratón en el directorio -> Permissions (o chmod))";
$lang['admin_optional'] = "Optativo";
$lang['admin_memory_limit'] = "Límite de memoria";
$lang['admin_allowed'] = "permitido";
$lang['admin_webserver'] = "Servidor Web";
$lang['admin_server_os'] = "SO del servidor";
$lang['admin_server_time'] = "Hora del servidor";
$lang['admin_legend'] = "Leyenda:";
$lang['admin_error_url'] = "La dirección URL debe estar en formato correcto : %s (sin la barra oblicua al final)";
$lang['admin_url_n'] = "URL %s:";
$lang['admin_url_aliases'] = "Alias de URL";
$lang['admin_logo_question'] = "¿Mostrar logo?";
$lang['admin_type_again'] = "(escribir de nuevo)";
$lang['admin_admin_mail'] = "Correo-e del Administrador principal";
$lang['admin_admin'] = "Administrador principal";
$lang['admin_phpmv_path'] = "Ruta completa de la aplicación phpMyVisites";
$lang['admin_valid_email'] = "El correo-e debe ser valido";
$lang['admin_valid_pass'] = "La contraseña debe ser más compleja (al menos 6 caracteres, debe contener números)";
$lang['admin_match_pass'] = "Las contraseñas no coinciden";
$lang['admin_no_user_group'] = "No hay usuarios para este sitio en este grupo";
$lang['admin_recorded_nl'] = "Boletines registrados:";
$lang['admin_recorded_partners'] = "Asociados registrados:";
$lang['admin_recorded_users'] = "Usuarios registrados:";
$lang['admin_select_site_title'] = "Seleccione un sitio";
$lang['admin_select_user_title'] = "Seleccione un usuario";
$lang['admin_no_user_registered'] = "¡No hay usuarios registrados!";
$lang['admin_configuration'] = "Configuración";
$lang['admin_general_conf'] = "Configuración general";
$lang['admin_group_title'] = "Administración de grupos (permisos)";
$lang['admin_user_title'] = "Administración de usuarios";
$lang['admin_user_add'] = "Añadir usuario";
$lang['admin_user_mod'] = "Modificar usuario";
$lang['admin_user_del'] = "Eliminar usuario";
$lang['admin_user_oldPwd'] = "Old password"; 
$lang['admin_user_oldPwd_bad'] = "Old password incorrect."; 
$lang['admin_server_info'] = "Información del servidor";
$lang['admin_send_mail'] = "Enviar estadísticas por correo-e";
$lang['admin_rss_feed'] = "Estadísticas en documento RSS";
$lang['admin_rss_feed_specific_site'] = "Website '%s' Statistics - RSS"; // site 2
$lang['admin_site_admin'] = "Administración del sitio";
$lang['admin_site_add'] = "Añadir sitio";
$lang['admin_site_mod'] = "Modificar sitio";
$lang['admin_site_del'] = "Eliminar sitio";
$lang['admin_nl_add'] = "Añadir boletín";
$lang['admin_nl_mod'] = "Modificar boletín";
$lang['admin_nl_del'] = "Eliminar boletín";
$lang['admin_partner_add'] = "Añadir asociado";
$lang['admin_partner_mod'] = "Modificar URL y nombre del asociado";
$lang['admin_partner_del'] = "Eliminar asociado";
$lang['admin_url_alias'] = "Administrador de alias de URL";
$lang['admin_group_admin_n'] = "Ver estadísticas + permisos de Administrador";
$lang['admin_group_admin_d'] = "Los usuarios pueden ver las estadísticas del sitio Y editar su información (nombre, añadir cookies, excluir rangos de IP, administrar alias de URL/asociados/boletines, etc.)";
$lang['admin_group_view_n'] = "Ver estadísticas";
$lang['admin_group_view_d'] = "El usuario sólo puede ver las estadísticas del sitio, sin permiso de Administrador.";
$lang['admin_group_noperm_n'] = "Sin permiso";
$lang['admin_group_noperm_d'] = "Los usuarios de este grupo no tienen permiso para ver estadísticas y editar información.";
$lang['admin_group_stitle'] = "Puede editar los usuarios del grupo seleccionando aquellos que desee cambiar y luego seleccionando el grupo al que desea trasladar los usuarios seleccionados.";
$lang['admin_url_generate_download_link_example'] = "Download file adress Or URL redirection to an external website";
$lang['admin_url_generate_title'] = "File download / Url redirection : Url generator";
$lang['admin_url_generate_intro'] = "phpMyVisites can count your file downloads, and can also track external clicks to URLs. Downloads and URLs tracked will appear in the 'Pages views' section of phpMyVisites.</p><p class='texte'> To achieve this, you have to use a URL that points to the phpmyvisites file, then it will redirect to the URL you need. Because it is not trivial to generate such a URL, here is a tool that will make it simple (because phpMyVisites must be a simple but powerful experience for all of us). Simply fill in the form, click the 'Generate URL' button, and you will count your file downloads or external URL redirections very easily!";
$lang['admin_url_generate_site_selection'] = "Select the site for which you want to count a file download or a URL redirection";
$lang['admin_url_generate_tag_selection'] = "Select the tag for which you want to count a file download or a URL redirection"; 
$lang['admin_url_generate_enter_url'] = "Enter your file complete adress or the external Url you want to track in the statistics:";
$lang['admin_url_generate_help_enter_url'] = "Help: It must be like '<b>http://www.yoursite.com/file/brilliant-software.zip</b>' or for any URL redirection '<b>http://www.the-site-to-redirect.com</b>'";
$lang['admin_url_generate_friendly_name'] = "Friendly name of the file / URL that will be used in the page views table:"; 
$lang['admin_url_generate_help_friendly_name'] = "Help: You can classify the 'files / Url redirection' in categories for a better display in the Pages view section in phpMyVisites. You can separate the category and the files or Url redirections with the character '<b>/</b>'. For example, the Name can be '<b>my photos download/Summer in France</b>' or '<b>Partners/PHP.net website</b>' : it will classify respectively in the folder '<b>my photos downloads</b>' or in the folder '<b>Partners</b>' : you will see them in folders in the 'Pages view' section in your phpMyVisites interface.";
$lang['admin_url_generate_result_url'] = "Here is the URL you can link to: ";
$lang['admin_url_generate_html_result'] = "If it is useful for you, here is the HTML Link you can use:";
$lang['admin_url_generate_html_onclick'] = "Here is the HTML using onclick event:";
$lang['admin_url_generate_image_legend'] = "Example of Pages views with URL redirection and file download tracking:";
$lang['admin_site_link_javascript'] = "%s Now you have to install the tracker on your pages (copy paste the Javascript code). Click to display the javascript code. %s";
$lang['admin_last_version'] = "Do you have phpMyVisites last version? (Recommended!)";
$lang['admin_general_config_firstday'] = "First day of the calendar?";
$lang['admin_default_language'] = "Default language? <br/>It will also be the default language for emails.";
$lang['admin_back_statisitics'] = "Go to statistics"; 

//
// Pdf export
//
$lang['pdf_generate_link'] = "Generate a PDF presenting all statistics for site %s";
$lang['pdf_summary_generate_link'] = "Generate a PDF presenting a statistics summary";
$lang['pdf_free_page'] = "Free new page";
$lang['pdf_free_chapter'] = "Free title chapter";
$lang['pdf_page_break'] = "Page break";
$lang['pdf_page_summary'] = "Summary";
$lang['generique_pdfno'] = "PDF %s"; 
$lang['admin_pdf_title'] = "Website PDF"; 
$lang['admin_nopdf'] = "No pdf found for this site!";
$lang['admin_recorded_pdf'] = "Recorded PDFs:";
$lang['admin_pdf_add'] = "Add PDF"; 
$lang['admin_pdf_mod'] = "Modify PDF"; 
$lang['admin_pdf_del'] = "Delete PDF"; 
$lang['generique_pdf'] = "PDF";
$lang['pdf_lib_show_interest'] = "Interest array is displayed";
$lang['pdf_lib_hide_interest'] = "Interest array is hidden";
$lang['pdf_lib_show_all'] = "Details are displayed"; 
$lang['pdf_lib_hide_all'] = "Data are limited in size";
$lang['pdf_lib_edit_text'] = "Edit this text"; 
$lang['pdf_lib_need_at_least_one_page'] = "You first have to create an 'empty page'"; 
$lang['pdf_lib_can_not_add_chapter'] = "Can't set an element before a page is created.";
$lang['pdf_lib_pdf_name_mandatory'] = "Name is mandatory"; 
$lang['pdf_lib_pdf_expand_all'] = "Expand all"; 
$lang['pdf_lib_pdf_collapse_all'] = "Collapse all";
$lang['pdf_create_from_interface'] = "Create a personalized pdf report!";
$lang['pdf_complete'] = "PDF Complete report"; 

//
// Installation Step
//
$lang['install_loginmysql'] = "Usuario MySQL";
$lang['install_mdpmysql'] = "Contraseña MySQL";
$lang['install_serveurmysql'] = "Servidor MySQL";
$lang['install_basemysql'] = "Base MySQL";
$lang['install_prefixetable'] = "Prefijo de las tablas";
$lang['install_utilisateursavances'] = "Usuarios expertos (optativo)";
$lang['install_oui'] = "Sí";
$lang['install_non'] = "No";
$lang['install_ok'] = "OK";
$lang['install_probleme'] = "Problema: ";
$lang['install_DirectoriesWriteError'] = "<b>Problem! </b><br/>Cannot write in the folder(s) %s Please verify that you have the rights necessary to create files on the server (try to CHMOD 755 the folder with your FTP software : right click on the directory -> Permissions (or CHMOD). <br/><br/>If the CHMOD doesn't work with your FTP software, try to delete (if it exists) the directories, and create them with your FTP software.";
$lang['install_loginadmin'] = "Id. de usuario del Administrador principal :";
$lang['install_mdpadmin'] = "Contraseña de acceso del Administrador principal :";
$lang['install_chemincomplet'] = "Ruta completa de acceso a phpMyVisites (de la forma 'http://www.misitio.com/carp1/carp3/phpmyvisites/'). La ruta debe terminar con '<strong>/</strong>'.";
$lang['install_afficherlogo'] = "¿Mostrar el logo %s en las páginas indexadas? <strong>Autorizar el logo en su sitio de Internet permitirá que phpMyVisites se dé a conocer y que su evolución sea mayor: es una forma de dar las gracias a los programadores</strong> que han dedicado horas de trabajo para crear esta aplicación gratuita de código abierto."; // %s imagen del logo
$lang['install_affichergraphique'] = "¿Visualizar los gráficos cuando se consultan las estadísticas ?";
$lang['install_valider'] = "Aceptar"; // a la instalación y al login
$lang['install_popup_logo'] = "Seleccione un logo"; // TODO : translate
$lang['install_logodispo'] = "Vea los logos disponibles"; // TODO : translate
$lang['install_welcome'] = "¡Bienvenido!";
$lang['install_system_requirements'] = "Requisitos de sistema";
$lang['install_database_setup'] = "Configuración de la BBDD";
$lang['install_create_tables'] = "Creación de tabla";
$lang['install_general_setup'] = "Configuración general";
$lang['install_create_config_file'] = "Crear archivo de configuración";
$lang['install_first_website_setup'] = "Añadir su primer sitio";
$lang['install_display_javascript_code'] = "Mostrar código Javascript";
$lang['install_finish'] = "Finalizado";
$lang['install_txt2'] = "Al final de la instalación, se enviará información al sitio oficial, <strong>con el fin de contabilizar el número de usuarios de phpMyVisites</strong> (por supuesto, no se enviará información confidencial). Gracias por su colaboración.";
$lang['install_database_setup_txt'] = "Introduzca los valores de configuración de su BBDD.";
$lang['install_general_config_text'] = "phpMyVisites dará acceso total a un solo administrador para ver/modificar los datos. Elija un nombre de usuario y una contraseña para su cuenta de Administrador principal. Después podrá añadir más usuarios.";
$lang['install_config_file'] = " Datos de administrador introducidos con éxito.";
$lang['install_js_code_text'] = "<p>Para contar todos los visitantes, debe introducir el código Javascript en todas sus páginas. </p><p> No es necesario que sus páginas estén programadas con PHP, <strong>phpMyVisites funcionará en todas las páginas (HTML, ASP, Perl y cualquier lenguaje).</strong> </p><p> Éste es el código que debe introducir: (copie y péguelo en todas sus páginas) </p>";
$lang['install_intro'] = "Bienvenido a la instalación de phpMyVisites."; 
$lang['install_intro2'] = "El proceso se divide en %s pasos sencillos. Sólo tardará unos diez minutos.";
$lang['install_next_step'] = "Ir al paso siguiente";
$lang['install_status'] = "Estado de la instalación";
$lang['install_done'] = "Instalación %s%% completa"; // Install 25% complete
$lang['install_site_success'] = "¡Sitio web creado con éxito!";
$lang['install_site_info'] = "Introduzca los datos de su primer sitio Web.";
$lang['install_go_phpmv'] = "¡Ir a phpMyVisites!";
$lang['install_congratulation'] = "¡Enhorabuena! La instalación de phpMyVisites ha finalizado.";
$lang['install_end_text'] = "Asegúrese de introducir el código Javascript en todas sus páginas ¡y ya sólo tendrá que esperar a sus primeros vistantes!";
$lang['install_db_ok'] = "¡Conexión establecida con el servidor de la BBDD!";
$lang['install_table_exist'] = "Las tablas de phpMyVisites ya existen en la BBDD.";
$lang['install_table_choice'] = "Puede reutilizar las tablas existentes o instalar de nuevo y borrar todos los datos de la BBDD.";
$lang['install_table_erase'] = "Borrar todas las tablas (¡Precaución!)";
$lang['install_table_reuse'] = "Reutilizar las tablas existentes";
$lang['install_table_success'] = "¡Tablas creadas con éxito!";
$lang['install_send_mail'] = "¿Recibir un mensaje de correo todos los días con las estadísticas de sus sitios Web?";

//
// Update Step
//
$lang['update_title'] = "Actualizar phpMyVisites";
$lang['update_subtitle'] = "Actualización de phpMyVisites detectada.";
$lang['update_versions'] = "Su versión anterior %s se ha actualizado a %s.";
$lang['update_db_updated'] = "¡Su BBDD se ha actualizado con éxito!";
$lang['update_continue'] = "Continuar con phpMyVisites";
$lang['update_jschange'] = "¡Precaución! <br /> El código Javascript de phpMyVisites ha sido modificado. Es necesario que actualice sus páginas y copie y pegue el nuevo código en todos los sitios que haya configurado. <br /> Los cambios en el código Javascript son infrecuentes, disculpe las molestias."; // TODO : translate

//
// Dates
//

/*
%daylong% // Monday
%dayshort% // Mon
%daynumeric% // 27
%monthlong% // Febuary
%monthshort% // Feb
%monthnumeric% // 02
%yearlong% // 2004
%yearshort% // 04
*/

// Monday February 10 2004
$lang['tdate1'] = "%daylong% %monthlong% %daynumeric% %yearlong%";

// Monday 10
$lang['tdate2'] = "%daylong% %daynumeric%";

// Week February 10 To February 17 2004
$lang['tdate3'] = "Semana de %monthlong% %daynumeric% a %monthlong2% %daynumeric2% %yearlong%";

// February 2004 Month
$lang['tdate4'] = "Mes de %monthlong% %yearlong%";

// December 2003
$lang['tdate5'] = "%monthlong% %yearlong%";

// 10 Febuary week
$lang['tdate6'] = "Semana del %daynumeric% %monthlong%";

// 10-02-2003 // February 2 2003
$lang['tdate7'] = "%daynumeric%-%monthnumeric%-%yearlong%";

// Mon 10 (Only for Graphs purpose)
$lang['tdate8'] = "%dayshort% %daynumeric%";

// Week 10 Feb (Only for Graphs purpose)
$lang['tdate9'] = " Sem %daynumeric% %monthshort%";

// Dec 04 (Only for Graphs purpose)
$lang['tdate10'] = "%monthshort% %yearshort%";

// Year 2004
$lang['tdate11'] = "Año %yearlong%";

// 2004
$lang['tdate12'] = "%yearlong%";

// 31
$lang['tdate13'] = "%daynumeric%";

// Months
$lang['moistab']['01'] = "Enero";
$lang['moistab']['02'] = "Febrero";
$lang['moistab']['03'] = "Marzo";
$lang['moistab']['04'] = "Abril";
$lang['moistab']['05'] = "Mayo";
$lang['moistab']['06'] = "Junio";
$lang['moistab']['07'] = "Julio";
$lang['moistab']['08'] = "Agosto";
$lang['moistab']['09'] = "Septiembre";
$lang['moistab']['10'] = "Octubre";
$lang['moistab']['11'] = "Noviembre";
$lang['moistab']['12'] = "Diciembre";

// Months (Graph purpose, 4 chars max)
$lang['moistab_graph']['01'] = "Ene";
$lang['moistab_graph']['02'] = "Feb";
$lang['moistab_graph']['03'] = "Marz";
$lang['moistab_graph']['04'] = "Abr";
$lang['moistab_graph']['05'] = "May";
$lang['moistab_graph']['06'] = "Jun";
$lang['moistab_graph']['07'] = "Jul";
$lang['moistab_graph']['08'] = "Ago";
$lang['moistab_graph']['09'] = "Sept";
$lang['moistab_graph']['10'] = "Oct";
$lang['moistab_graph']['11'] = "Nov";
$lang['moistab_graph']['12'] = "Dic";

// Day of the week
$lang['jsemaine']['Mon'] = "Lunes";
$lang['jsemaine']['Tue'] = "Martes";
$lang['jsemaine']['Wed'] = "Miércoles";
$lang['jsemaine']['Thu'] = "Jueves";
$lang['jsemaine']['Fri'] = "Viernes";
$lang['jsemaine']['Sat'] = "Sábado";
$lang['jsemaine']['Sun'] = "Domingo";

// Day of the week (Graph purpose, 4 chars max)
$lang['jsemaine_graph']['Mon'] = "Lun";
$lang['jsemaine_graph']['Tue'] = "Mar";
$lang['jsemaine_graph']['Wed'] = "Mier";
$lang['jsemaine_graph']['Thu'] = "Jue";
$lang['jsemaine_graph']['Fri'] = "Vie";
$lang['jsemaine_graph']['Sat'] = "Sáb";
$lang['jsemaine_graph']['Sun'] = "Dom";

// First letter of each day, weekdays ordered
$lang['calendrier_jours'][0] = "M";
$lang['calendrier_jours'][1] = "T";
$lang['calendrier_jours'][2] = "W";
$lang['calendrier_jours'][3] = "T";
$lang['calendrier_jours'][4] = "F";
$lang['calendrier_jours'][5] = "S";
$lang['calendrier_jours'][6] = "S";

// DO NOT ALTER!
$lang['weekdays']['Mon'] = '1';
$lang['weekdays']['Tue'] = '2';
$lang['weekdays']['Wed'] = '3';
$lang['weekdays']['Thu'] = '4';
$lang['weekdays']['Fri'] = '5';
$lang['weekdays']['Sat'] = '6';
$lang['weekdays']['Sun'] = '7';

// Continents
$lang['eur'] = "Europa";
$lang['afr'] = "África";
$lang['asi'] = "Asia";
$lang['ams'] = "América Central/Sur";
$lang['amn'] = "América del Norte";
$lang['oce'] = "Oceanía";

// Oceans
$lang['oc_pac'] = "Océano Pacífico"; // TODO : translate
$lang['oc_atl'] = "Océano Atlántico"; // TODO : translate
$lang['oc_ind'] = "Océano Índico"; // TODO : translate

// Countries
$lang['domaines'] = array(
    "xx" => "Desconocido",
    "ac" => "La Ascensión (isla)",
    "ad" => "Andorra",
    "ae" => "Emiratos Árabes Unidos",
    "af" => "Afganistán",
    "ag" => "Antigua y Barbuda",
    "ai" => "Anguilla",
    "al" => "Albania",
    "am" => "Armenia",
    "an" => "Antillas Neerlandesas",
    "ao" => "Angola",
    "aq" => "Antártida",
    "ar" => "Argentina",
    "as" => "Samoa Americana",
    "at" => "Austria",
    "au" => "Australia",
    "aw" => "Aruba",
    "az" => "Azerbaiján",
    "ba" => "Bosnia Herzegovina",
    "bb" => "Barbada",
    "bd" => "Bangladesh",
    "be" => "Bélgica",
    "bf" => "Burkina Faso",
    "bg" => "Bulgaria",
    "bh" => "Bahrain",
    "bi" => "Burundi",
    "bj" => "Benin",
    "bm" => "Bermudas",
    "bn" => "Brunei Darussalam",
    "bo" => "Bolivia",
    "br" => "Brasil",
    "bs" => "Bahamas",
    "bt" => "Bhután",
    "bv" => "Bouvet (isla)",
    "bw" => "Botswana",
    "by" => "Bielorrusia",
    "bz" => "Belice",
    "ca" => "Canadá",
    "cc" => "Cocos (Keeling) islas",
    "cd" => "Rep. dem. del Congo",
    "cf" => "Centroafricana (Rep)",
    "cg" => "Congo",
    "ch" => "Suiza",
    "ci" => "Costa de Marfil",
    "ck" => "Cook (islas)",
    "cl" => "Chile",
    "cm" => "Camerún",
    "cn" => "China",
    "co" => "Colombia",
    "cr" => "Costa Rica",
	"cs" => "Serbia Montenegro",
    "cu" => "Cuba",
    "cv" => "Cabo Verde",
    "cx" => "Christmas (isla)",
    "cy" => "Chipre",
    "cz" => "Chequia",
    "de" => "Alemania",
    "dj" => "Yibuti",
    "dk" => "Dinamarca",
    "dm" => "Dominica",
    "do" => "Dominicana (Rep)",
    "dz" => "Argelia",
    "ec" => "Ecuador",
    "ee" => "Estonia",
    "eg" => "Egipto",
    "eh" => "Sahara Occidental",
    "er" => "Eritreo",
    "es" => "España",
    "et" => "Etiopía",
    "fi" => "Finlandia",
    "fj" => "Fiji",
    "fk" => "Falkland (Malvinas) islas",
    "fm" => "Micronesia",
    "fo" => "Faroe (islas)",
    "fr" => "Francia",
    "ga" => "Gabón",
    "gd" => "Granada",
    "ge" => "Georgia",
    "gf" => "Guyana Francesa",
    "gg" => "Guernsey",
    "gh" => "Ghana",
    "gi" => "Gibraltar",
    "gl" => "Groenlandia",
    "gm" => "Gambia",
    "gn" => "Guinea",
    "gp" => "Guadalupe",
    "gq" => "Guinea Ecuatorial",
    "gr" => "Grecia",
    "gs" => "Georgia del Sur",
    "gt" => "Guatemala",
    "gu" => "Guam",
    "gw" => "Guinea-Bissau",
    "gy" => "Guyana",
    "hk" => "Hong Kong",
    "hm" => "Heard y McDonald (islas)",
    "hn" => "Honduras",
    "hr" => "Croacia",
    "ht" => "Haití",
    "hu" => "Hungría",
    "id" => "Indonesia",
    "ie" => "Irlanda",
    "il" => "Israel",
    "im" => "Isla de Man",
    "in" => "India",
    "io" => "Ter. Brit. Océano Indiano",
    "iq" => "Irak",
    "ir" => "Irán",
    "is" => "Islandia",
    "it" => "Italia",
    "je" => "Jersey",
    "jm" => "Jamaica",
    "jo" => "Jordania",
    "jp" => "Japón",
    "ke" => "Kenya",
    "kg" => "Kirguistán",
    "kh" => "Camboya",
    "ki" => "Kiribati",
    "km" => "Comores",
    "kn" => "Saint Kitts y Nevis",
    "kp" => "Corea del Norte",
    "kr" => "Corea del Sur",
    "kw" => "Kuwait",
    "ky" => "Caimanes (islas)",
    "kz" => "Kazajstán",
    "la" => "Laos",
    "lb" => "Líbano",
    "lc" => "Santa Lucia",
    "li" => "Liechtenstein",
    "lk" => "Sri Lanka",
    "lr" => "Liberia",
    "ls" => "Lesotho",
    "lt" => "Lituania",
    "lu" => "Luxemburgo",
    "lv" => "Letonia",
    "ly" => "Libia",
    "ma" => "Marruecos",
    "mc" => "Mónaco",
    "md" => "Moldova",
    "mg" => "Madagascar",
    "mh" => "Marshall (islas)",
    "mk" => "Macedonia",
    "ml" => "Mal",
    "mm" => "Myanmar",
    "mn" => "Mongolia",
    "mo" => "Macao",
    "mp" => "Marianas del Norte (islas)",
    "mq" => "Martinica",
    "mr" => "Mauritania",
    "ms" => "Montserrat",
    "mt" => "Malta",
    "mu" => "Mauricio (isla)",
    "mv" => "Maldivas",
    "mw" => "Malawi",
    "mx" => "México",
    "my" => "Malasia",
    "mz" => "Mozambique",
    "na" => "Namibia",
    "nc" => "Nueva Caledonia",
    "ne" => "Nigeria",
    "nf" => "Norfolk (isla)",
    "ng" => "Nigeria",
    "ni" => "Nicaragua",
    "nl" => "Países Bajos",
    "no" => "Noruega",
    "np" => "Nepal",
    "nr" => "Nauru",
    "nu" => "Niue",
    "nz" => "Nueva Zelanda",
    "om" => "Omán",
    "pa" => "Panamá",
    "pe" => "Perú",
    "pf" => "Polinesia Francesa",
    "pg" => "Papúa Nueva Guinea",
    "ph" => "Filipinas",
    "pk" => "Pakistán",
    "pl" => "Polonia",
    "pm" => "Sto. Pierre y Miquelon",
    "pn" => "Pitcairn (isla)",
    "pr" => "Puerto Rico",
	"ps" => "Palestinian Territory",
    "pt" => "Portugal",
    "pw" => "Palau",
    "py" => "Paraguay",
    "qa" => "Qatar",
    "re" => "Reunión (isla de la)",
    "ro" => "Rumania",
    "ru" => "Rusia",
    "rs" => "Rusia",
    "rw" => "Ruanda",
    "sa" => "Arabia Saudita",
    "sb" => "Salomón (islas)",
    "sc" => "Seychelles",
    "sd" => "Sudán",
    "se" => "Suecia",
    "sg" => "Singapur",
    "sh" => "Sta. Helena",
    "si" => "Eslovenia",
    "sj" => "Svalbard/Jan Mayen (islas)",
    "sk" => "Eslovaquia",
    "sl" => "Sierra Leona",
    "sm" => "San Marino",
    "sn" => "Senegal",
    "so" => "Somalia",
    "sr" => "Surinam",
    "st" => "Santo Tomé y Príncipe",
    "su" => "Ex URSS",
    "sv" => "El Salvador",
    "sy" => "Siria",
    "sz" => "Swazilandia",
    "tc" => "Turks y Caicos (islas)",
    "td" => "Chad",
    "tf" => "Territorios Fr. del Sur",
    "tg" => "Togo",
    "th" => "Tailandia",
    "tj" => "Tayikistán",
    "tk" => "Tokelau",
    "tm" => "Turkmenistán",
    "tn" => "Túnez",
    "to" => "Tonga",
    "tp" => "Timor Oriental",
    "tr" => "Turquía",
    "tt" => "Trinidad y Tobago",
    "tv" => "Tuvalu",
    "tw" => "Taiwán",
    "tz" => "Tanzania",
    "ua" => "Ucrania",
    "ug" => "Uganda",
    "uk" => "Reino Unido",
    "gb" => "Gran Bretaña",
    "um" => "US Minor Outlying (islas)",
    "us" => "Estados Unidos",
    "uy" => "Uruguay",
    "uz" => "Uzbekistán",
    "va" => "Vaticano",
    "vc" => "San Vicente y Granadinas",
    "ve" => "Venezuela",
    "vg" => "Vírgenes Brit. (islas)",
    "vi" => "Vírgenes EEUU (islas)",
    "vn" => "Vietnam",
    "vu" => "Vanuatu",
    "wf" => "Wallis y Futuna (islas)",
    "ws" => "Samoa Oeste",
    "ye" => "Yemen",
    "yt" => "Mayote",
    "yu" => "Yugoslavia",
    "za" => "Sudáfrica",
    "zm" => "Zambia",
    "zr" => "Zaire",
    "zw" => "Zimbabwe",
    "com" => "-",
    "net" => "-",
    "org" => "-",
    "edu" => "-",
    "int" => "-",
    "arpa" => "-",
    "gov" => "-",
    "mil" => "-",
    "reverse" => "-",
    "biz" => "-",
    "info" => "-",
    "name" => "-",
    "pro" => "-",
    "coop" => "-",
    "aero" => "-",
    "museum" => "-",
    "tv" => "Tuvalu",
    "ws" => "Samoa Oeste",
);
?>