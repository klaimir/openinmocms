<?php /* Smarty version 2.6.9, created on 2013-04-12 08:10:17
         compiled from common/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/header.tpl', 2, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version='1.0' encoding='<?php echo ((is_array($_tmp='charset')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
' <?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='<?php echo ((is_array($_tmp='lang_iso')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
'>
<head>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo ((is_array($_tmp='charset')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
	<meta name="description" content="<?php echo ((is_array($_tmp='head_description')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
	<meta name="keywords" content="<?php echo ((is_array($_tmp='head_keywords')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" />
	<meta name="robots" content="all" />
	<meta name="revisit-after" content="7 day" />
	<meta name="author" content="phpMyVisites Team" />
	<meta http-equiv="reply-to" content="http://www.phpmyvisites.us/" />
	<meta name="copyright" content="phpMyVisites" />
	<meta name="version" content="<?php echo $this->_tpl_vars['PHPMV_VERSION']; ?>
" />
	<title><?php echo ((is_array($_tmp='head_titre')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</title>
	<link href="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
css/styles.php?dir=<?php echo ((is_array($_tmp='text_dir')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp));  if ($this->_tpl_vars['admin']): ?>&amp;admin=<?php echo $this->_tpl_vars['admin'];  endif; ?>&amp;path=<?php echo $this->_tpl_vars['PMV_THEME']; ?>
" rel="stylesheet" type="text/css" />	
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
include/menu.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
include/misc.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
include/miscPage.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
include/pmvurl.js"></script>
	<link rel="alternate" type="application/rss+xml" title="<?php echo ((is_array($_tmp='admin_rss_feed')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" href="./index.php?mod=view_rss&amp;rss_hash=<?php echo $this->_tpl_vars['rss_hash']; ?>
" />
	<link rel="alternate" type="application/rss+xml" title="<?php echo ((is_array($_tmp='admin_rss_feed_specific_site')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['site_selected_name']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['site_selected_name'])); ?>
" href="./index.php?mod=view_rss&amp;rss_hash=<?php echo $this->_tpl_vars['rss_hash']; ?>
&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
" />
	<script type="text/javascript">
	var js_direction="<?php echo ((is_array($_tmp='text_dir')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";
	var PMV_THEME = "<?php echo $this->_tpl_vars['PMV_THEME']; ?>
";
	pmvUrlAddParameter ("lang", "<?php echo $this->_tpl_vars['lang_selected']; ?>
");
	pmvUrlAddParameter ("mod", "<?php echo $this->_tpl_vars['page']; ?>
");
	pmvUrlAddParameter ("site", "<?php echo $this->_tpl_vars['site_selected']; ?>
");
	pmvUrlAddParameter ("adminsite", "<?php echo $this->_tpl_vars['site_selected']; ?>
");
	pmvUrlAddParameter ("date", "<?php echo $this->_tpl_vars['date_ask']; ?>
");
	pmvUrlAddParameter ("period", "<?php echo $this->_tpl_vars['period']; ?>
");
	pmvUrlAddParameter ("action", "<?php echo $this->_tpl_vars['action']; ?>
");
	</script>
</head>
<body>
<?php if ($this->_tpl_vars['header_message']): ?>
<p class='archive'><?php echo $this->_tpl_vars['header_message']; ?>
</p>
<?php endif; ?>
<!-- http://www.phpmyvisites.net/ -->	
<?php if ($this->_tpl_vars['header_error_message']): ?>
	<h2>
	<?php echo $this->_tpl_vars['header_error_message']; ?>
	
	<?php if ($this->_tpl_vars['mod'] == 'admin'): ?> <?php echo ((is_array($_tmp='admin_db_log')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 <?php endif; ?>
	</h2>
<?php endif; ?>
<?php if (( ! isset ( $this->_tpl_vars['showLogin'] ) ) || ( $this->_tpl_vars['showLogin'] == 'true' )): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/logged.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<div id="main">