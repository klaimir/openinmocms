<?php /* Smarty version 2.6.9, created on 2013-04-12 08:19:27
         compiled from admin/structureAdmin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'admin/structureAdmin.tpl', 9, false),array('modifier', 'translate', 'admin/structureAdmin.tpl', 9, false),array('function', 'counter', 'admin/structureAdmin.tpl', 20, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array('admin' => 'true')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="contenu">
	<div id="logo">

		<div id="adminLangSite">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/langs_selection.tpl", 'smarty_include_vars' => array('admin' => 'true')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/sites_selection.tpl", 'smarty_include_vars' => array('admin' => 'true')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<p><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['url_lang'])) ? $this->_run_mod_handler('replace', true, $_tmp, "mod=", "oldMod=") : smarty_modifier_replace($_tmp, "mod=", "oldMod=")); ?>
"><?php echo ((is_array($_tmp='admin_back_statisitics')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></p>
		</div>
		<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['url_lang'])) ? $this->_run_mod_handler('replace', true, $_tmp, "mod=", "oldMod=") : smarty_modifier_replace($_tmp, "mod=", "oldMod=")); ?>
">
		<img border="0" title="<?php echo ((is_array($_tmp='logo_description')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
images/logo-phpmyvisites.gif" />
		</a>
		<div class="both"></div>
	</div>
	<div id="siteSelected">Site selected for administration : <b><?php echo $this->_tpl_vars['site_selected_name']; ?>
</b> (id = <?php echo $this->_tpl_vars['site_selected']; ?>
)</div>
	
	<div class="both"></div>
	
	<?php echo smarty_function_counter(array('print' => false,'assign' => 'a','name' => 'a','start' => 0), $this);?>

	<?php echo smarty_function_counter(array('print' => false,'assign' => 'i','name' => 'i','start' => 0), $this);?>

	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['contentpage']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<!--
		We request you retain the link to www.phpmyvisites.net.
		This not only gives respect to the large amount of time given freely by the developers
		but also helps build interest, traffic and use of phpmyvisites.net. 
		If you refuse to include even this then support on our forums may be affected.
	
		phpMyVisites developpers : 2006
	-->

	<div class="centrer">
		<a href="#" class="movetop">
			<img src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
images/top.png" alt="<?php echo ((is_array($_tmp='generique_retourhaut')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" /> <?php echo ((is_array($_tmp='generique_retourhaut')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

		</a>
	</div>
	
	<div class="both"></div>
	
	<!-- bottom menu -->
	<ul id="admin">
		<li class="site"><a href="http://www.phpmyvisites.us" title="open source free web analytics" onclick="window.open(this.href);return(false);"><?php echo ((is_array($_tmp='liens_siteofficiel')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li class="install"><a href="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=admin_index"><?php echo ((is_array($_tmp='liens_admin')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li class="contacts"><a href="./index.php?mod=contacts"><?php echo ((is_array($_tmp='liens_contacts')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
	</ul>
	
	<div class="both"></div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>