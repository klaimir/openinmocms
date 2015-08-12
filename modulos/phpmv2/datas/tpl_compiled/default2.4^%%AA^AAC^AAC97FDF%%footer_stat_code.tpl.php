<?php /* Smarty version 2.6.9, created on 2013-04-12 08:10:17
         compiled from common/footer_stat_code.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/footer_stat_code.tpl', 26, false),)), $this); ?>
<?php if ($this->_tpl_vars['PMV_STAT_ID_SITE'] > 0 && $this->_tpl_vars['internal_stats'] == true): ?>
<p class="archive">
	<?php echo '
	<script type="text/javascript">
	<!--
	function getPathStatName (siteName, pageName) {
		// Get current lang
		var lang_name = "";
		var oFormLang = document.form_lang;
		if (typeof(oFormLang) != "undefined")
		  lang_name = \'/\' + oFormLang.lang.options[oFormLang.lang.selectedIndex].text;
		
		return siteName+lang_name+\'/\'+pageName;
	}
	// -->
	</script>
	'; ?>

	
	<script type="text/javascript">
	<!--
	var a_vars = Array();
	<?php if ($this->_tpl_vars['PMV_STAT_SAVE_USER']): ?>
	a_vars['Login'] = "<?php echo $this->_tpl_vars['user_login']; ?>
 (<?php echo $this->_tpl_vars['user_alias']; ?>
)";
	<?php endif; ?>
	if (typeof(page_stat_name) == "undefined") 
	  page_stat_name = '<?php echo ((is_array($_tmp='liens_admin')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
';
			
	
	var pagename= getPathStatName('<?php echo $this->_tpl_vars['site_selected_name']; ?>
', page_stat_name);
	var phpmyvisitesSite = <?php echo $this->_tpl_vars['PMV_STAT_ID_SITE']; ?>
;
	var phpmyvisitesURL = "./phpmyvisites.php";
	//-->
	</script>
	<script type="text/javascript" src="./phpmyvisites.js"></script>
</p>
<?php endif; ?>