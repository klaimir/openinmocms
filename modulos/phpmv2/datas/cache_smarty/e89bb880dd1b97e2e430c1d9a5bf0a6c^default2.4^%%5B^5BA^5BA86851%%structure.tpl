431
a:4:{s:8:"template";a:10:{s:20:"common/structure.tpl";b:1;s:17:"common/logged.tpl";b:1;s:17:"common/header.tpl";b:1;s:19:"common/calendar.tpl";b:1;s:26:"common/sites_selection.tpl";b:1;s:15:"common/menu.tpl";b:1;s:26:"common/langs_selection.tpl";b:1;s:16:"common/index.tpl";b:1;s:27:"common/footer_stat_code.tpl";b:1;s:17:"common/footer.tpl";b:1;}s:9:"timestamp";i:1365747247;s:7:"expires";i:1365920047;s:13:"cache_serials";a:0:{}}<?xml version='1.0' encoding='utf-8' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='es'>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="phpMyVisites | Aplicación de gestión de estadísticas y medida de audiencia de sitios en Internet | Programa gratuito de código abierto distribuido bajo licencia GPL, desarrollado en php/MySQL" />
<meta name="keywords" content="phpmyvisites, php, script, aplicación, programa, estadísticas, medida de audiencia, audiencia, gratuito, open source, gpl, visitas, visitantes, mysql, páginas vistas, páginas, vistas, horas de visitas, gráficos, navegadores, sistema operativo, sistemas de explotación, resoluciones, día, semana, mes, récord, país, host, proveedor, buscadores, palabras claves, seguimiento, referencias, gráficos, páginas de entrada, páginas de salida, gráficos circulares" />
<meta name="robots" content="all" />
<meta name="revisit-after" content="7 day" />
<meta name="author" content="phpMyVisites Team" />
<meta http-equiv="reply-to" content="http://www.phpmyvisites.us/" />
<meta name="copyright" content="phpMyVisites" />
<meta name="version" content="2.4" />
<title>phpMyVisites | Aplicación libre y gratuita de gestión de estadísticas y medida de audiencia de sitios en Internet</title>
<link href="./themes/default/css/styles.php?dir=ltr&amp;path=./themes/default/" rel="stylesheet" type="text/css" />	
<script type="text/javascript" src="./themes/default/include/menu.js"></script>
<script type="text/javascript" src="./themes/default/include/misc.js"></script>
<script type="text/javascript" src="./themes/default/include/miscPage.js"></script>
<script type="text/javascript" src="./themes/default/include/pmvurl.js"></script>
<link rel="alternate" type="application/rss+xml" title="Estadísticas en documento RSS" href="./index.php?mod=view_rss&amp;rss_hash=47fe01dc81538f816784f3a79d69ed9e" />
<link rel="alternate" type="application/rss+xml" title="Website 'Gesticadiz' Statistics - RSS" href="./index.php?mod=view_rss&amp;rss_hash=47fe01dc81538f816784f3a79d69ed9e&amp;site=1" />
<script type="text/javascript">
	var js_direction="ltr";
	var PMV_THEME = "./themes/default/";
	pmvUrlAddParameter ("lang", "sp-utf-8.php");
	pmvUrlAddParameter ("mod", "index");
	pmvUrlAddParameter ("site", "1");
	pmvUrlAddParameter ("adminsite", "1");
	pmvUrlAddParameter ("date", "2013-04-12");
	pmvUrlAddParameter ("period", "1");
	pmvUrlAddParameter ("action", "");
	</script>
</head>
<body>
<!-- http://www.phpmyvisites.net/ -->	
<div id="loggued">
<small>
<strong>admin</strong>
(Administrador principal) | 	<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=logout"><em>Salir</em></a></small>
</div><div id="main"><div id="contenu">
<div id="logo">
<!-- month selection -->
<div id="calendrier">
<form action="index.php?site=1&amp;period=1&amp;mod=index" method="post">
<p>
<select onchange="pmvUrlOnChangeMonth (this)" name="date">
<option label="Abril 2013" value="2013-04-12" selected="selected">Abril 2013</option>
</select>	
</p>
</form>
<!-- /month selection -->
<!-- calendar -->
<table>
<tr>
<th>M</th>
<th>T</th>
<th>W</th>
<th>T</th>
<th>F</th>
<th>S</th>
<th>S</th>
</tr>
<tr>
<td>
1
</td>
<td>
2
</td>
<td>
3
</td>
<td>
4
</td>
<td>
5
</td>
<td>
6
</td>
<td>
7
</td>
</tr>
<tr>
<td>
8
</td>
<td>
9
</td>
<td>
10
</td>
<td>
11
</td>
<td>
<a  class="selection"  href="javascript:pmvUrlOnChangeDay ('2013-04-12')">				12
</a>			</td>
<td>
13
</td>
<td>
14
</td>
</tr>
<tr>
<td>
15
</td>
<td>
16
</td>
<td>
17
</td>
<td>
18
</td>
<td>
19
</td>
<td>
20
</td>
<td>
21
</td>
</tr>
<tr>
<td>
22
</td>
<td>
23
</td>
<td>
24
</td>
<td>
25
</td>
<td>
26
</td>
<td>
27
</td>
<td>
28
</td>
</tr>
<tr>
<td>
29
</td>
<td>
30
</td>
<td>
<br />
</td>
<td>
<br />
</td>
<td>
<br />
</td>
<td>
<br />
</td>
<td>
<br />
</td>
</tr>
</table>
</div>
<!-- /calendar -->		
<!-- sites selection id="sites" -->
<div id="sites">
<form action="index.php?date=2013-04-11&amp;period=1&amp;mod=index" method="post" id="form_site">
<p><select name="site" onchange="pmvUrlOnChangeSite (this)" dir="ltr">
<option value ="-1" > Resumen </option>
<optgroup label="Sites">
<option label="Gesticadiz" value="1"  selected="selected">Gesticadiz</option>
</optgroup>
</select></p>
</form>
</div>		
<a href="./index.php">
<img title="phpMyVisites : estadísticas y medida de audiencia de sitios en Internet (licencia GPL)" src="./themes/default/images/phpmv.png" alt="phpMyVisites" width="485" height="132" />
</a>
<div class="both"></div>
</div>
<!-- menu -->
<ul id="menu">
<li>		<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_visits">Visitas</a>
<ul>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_visits#a1">
Estadísticas
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_visits#a2">
Resumen&nbsp;del&nbsp;período
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_visits#a3">
Gráfico&nbsp;resumen&nbsp;de&nbsp;las&nbsp;estadísticas
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_visits#a4">
Gráfico&nbsp;resumen&nbsp;de&nbsp;estadísticas&nbsp;a&nbsp;largo&nbsp;plazo
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_visits#a5">
Gráfico&nbsp;de&nbsp;duración&nbsp;de&nbsp;visitas&nbsp;por&nbsp;visitante
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_visits#a6">
Gráfico&nbsp;de&nbsp;visitas&nbsp;por&nbsp;hora&nbsp;del&nbsp;servidor
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_visits#a7">
Gráfico&nbsp;de&nbsp;visitas&nbsp;por&nbsp;hora&nbsp;del&nbsp;visitante
</a>
</li>
</ul>
</li>
<li>		<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_frequency">Frecuencia</a>
<ul>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_frequency#a1">
Estadísticas
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_frequency#a2">
Visitas&nbsp;nuevas&nbsp;y&nbsp;frecuentes
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_frequency#a3">
Gráfico&nbsp;de&nbsp;visitas&nbsp;nuevas&nbsp;y&nbsp;frecuentes
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_frequency#a4">
Gráfico&nbsp;de&nbsp;número&nbsp;de&nbsp;visitas&nbsp;por&nbsp;visitante
</a>
</li>
</ul>
</li>
<li>		<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_pages">Páginas vistas</a>
<ul>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_pages#a1">
Páginas&nbsp;vistas
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_pages#a2">
Tiempo&nbsp;por&nbsp;página
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_pages#a3">
Gráfico&nbsp;de&nbsp;las&nbsp;visitas&nbsp;por&nbsp;número&nbsp;de&nbsp;páginas&nbsp;vistas
</a>
</li>
</ul>
</li>
<li>		<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_followup">Seguimiento</a>
<ul>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_followup#a1">
Páginas&nbsp;de&nbsp;entrada
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_followup#a2">
Páginas&nbsp;de&nbsp;salida
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_followup#a3">
Visitas&nbsp;a&nbsp;una&nbsp;sola&nbsp;página
</a>
</li>
</ul>
</li>
<li>		<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_source">Procedencia</a>
<ul>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_source#a1">
Mapamundi
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_source#a2">
Resumen&nbsp;por&nbsp;países
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_source#a3">
Proveedores&nbsp;de&nbsp;Internet
</a>
</li>
</ul>
</li>
<li>		<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_settings">Configuración</a>
<ul>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_settings#a1">
Configuraciones
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_settings#a2">
Sistema&nbsp;operativo&nbsp;(SO)
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_settings#a3">
Navegadores&nbsp;(por&nbsp;tipo)
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_settings#a4">
Navegadores
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_settings#a5">
Aplicaciones
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_settings#a6">
Resolución&nbsp;de&nbsp;pantalla
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_settings#a7">
Pantalla&nbsp;ancha/normal
</a>
</li>
</ul>
</li>
<li>		<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_referers">Afluencia</a>
<ul>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_referers#a1">
Gráfico&nbsp;resumen&nbsp;de&nbsp;afluencia
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_referers#a2">
Buscadores
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_referers#a3">
Palabras&nbsp;clave
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_referers#a4">
Sitios&nbsp;de&nbsp;Internet
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_referers#a5">
Asociados
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_referers#a6">
Boletines
</a>
</li>
<li>
<a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=view_referers#a7">
Entradas&nbsp;directas
</a>
</li>
</ul>
</li>
</ul>
<!-- /menu -->	<!-- lang selection -->
<div id="choixlangue">
<form action="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=index" method="post" name="form_lang" id="form_lang">
<fieldset>
<legend> &nbsp; Idioma  &nbsp; </legend>
<!-- select id="lang" name="lang" onchange="this.form.submit()" dir="ltr" -->
<select id="lang" name="lang" onchange="pmvUrlOnChangeLang (this)" dir="ltr">
<option label="Arabic" value="ar-utf-8.php">Arabic</option>
<option label="Bulgarian" value="bg-utf-8.php">Bulgarian</option>
<option label="Catalan" value="ca-utf-8.php">Catalan</option>
<option label="Czech" value="cz-utf-8.php">Czech</option>
<option label="Danish" value="da-utf-8.php">Danish</option>
<option label="German" value="de-utf-8.php">German</option>
<option label="Greek" value="el-utf-8.php">Greek</option>
<option label="English" value="en-utf-8.php">English</option>
<option label="Persian" value="fa-utf-8.php">Persian</option>
<option label="Finnish" value="fi-utf-8.php">Finnish</option>
<option label="French" value="fr-utf-8.php">French</option>
<option label="Hebrew" value="he-utf-8.php">Hebrew</option>
<option label="Croatian" value="hr-utf-8.php">Croatian</option>
<option label="Hungarian" value="hu-utf-8.php">Hungarian</option>
<option label="Indonesian" value="id-utf-8.php">Indonesian</option>
<option label="Italian" value="it-utf-8.php">Italian</option>
<option label="Japanese" value="ja-utf-8.php">Japanese</option>
<option label="Lithuanian" value="lt-utf-8.php">Lithuanian</option>
<option label="Macedonian" value="mk-utf-8.php">Macedonian</option>
<option label="Dutch" value="nl-utf-8.php">Dutch</option>
<option label="Norwegian" value="no-utf-8.php">Norwegian</option>
<option label="Polski" value="pl-utf-8.php">Polski</option>
<option label="Portuguese" value="pt-br-utf-8.php">Portuguese</option>
<option label="Romanian" value="ro-utf-8.php">Romanian</option>
<option label="Russian" value="ru-utf-8.php">Russian</option>
<option label="Swedish" value="se-utf-8.php">Swedish</option>
<option label="Slovenian" value="si-utf-8.php">Slovenian</option>
<option label="Slovak" value="sk-utf-8.php">Slovak</option>
<option label="Spanish" value="sp-utf-8.php" selected="selected">Spanish</option>
<option label="Serbian" value="sr-utf-8.php">Serbian</option>
<option label="Turkish" value="tr-utf-8.php">Turkish</option>
<option label="Taiwanese" value="tw-utf-8.php">Taiwanese</option>
<option label="Simplified Chinese" value="zh-simplified-utf-8.php">Simplified Chinese</option>
<option label="¿Otro?" value="other">¿Otro?</option>
</select>
<input type="text" id="langTmp" onfocus="blur()" style="display:none;width:130px" />
</fieldset>
</form>
</div>	
<div class="both"></div>
<h1>Welcome in phpmyvisites 2.3</h1>
<p>You can enable the Heatmap plugin in the administration panel, then click the plugins section</p>
<p>You can read <a href="CHANGELOG">the changelog</a> for this release</p>
<p>If you have problems, <a href="http://www.phpmyvisites.us/forums/">try the official forums</a>.</p>
<p>If you are satisfied with phpMyVisites, please send us a message to fill in our "Use Cases" part on the website ; you can also help with the translation, or giving support on the forums...</p>
<p>Our objective is that phpMyVisites becomes a great web analytics solution, stable and professional. To reach this objective, we need your help : don't hesitate, post feature requests, ask for ergonomic changes, interface improvements, give us ideas! What you or your company need to use phpMyVisites instead of a commercial tool? What is your "dream feature" that we could implement in phpMyVisites?</p>
<p><a href="http://www.phpmyvisites.us/"> phpMyVisites needs your help!</a></p>
<h4>Enjoy your statistics!</h4>	
<!--
We request you retain the link to www.phpmyvisites.net.
This not only gives respect to the large amount of time given freely by the developers
but also helps build interest, traffic and use of phpmyvisites.net. 
If you refuse to include even this then support on our forums may be affected.
phpMyVisites developpers : 2006
-->
<div class="centrer">
<a href="#" class="movetop">
<img src="./themes/default/images/top.png" alt="Arriba" /> Arriba
</a>
</div>
<div class="both"></div>
<!-- bottom menu -->
<ul id="admin">
<li class="site"><a href="http://www.phpmyvisites.us" title="open source free web analytics" onclick="window.open(this.href);return(false);">Sitio oficial</a></li>
<li class="install"><a href="index.php?site=1&amp;date=2013-04-11&amp;period=1&amp;mod=admin_index">Administración</a></li>
<li class="contacts"><a href="./index.php?mod=contacts">Contactos</a></li>
</ul>
<div class="both"></div>
</div>
</div>
<script type="text/javascript">
<!--
function loadRSS(p_url, p_id, p_name) {
  if (p_id > 0) {
    v_url = "./phpmyvisites.php?url="+escape(p_url)+"&id=" + p_id+ "&pagename=" + escape("RSS:"+p_name);
  }
  else {
    v_url = p_url;
  }
  location.href = v_url;
}
// -->
</script>
</body>
</html>