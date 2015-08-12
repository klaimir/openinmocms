<?php /* Smarty version 2.6.9, created on 2013-04-12 08:10:17
         compiled from common/langs_selection.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/langs_selection.tpl', 5, false),array('function', 'html_options', 'common/langs_selection.tpl', 8, false),)), $this); ?>
<!-- lang selection -->
<div id="choixlangue">
<form action="<?php echo $this->_tpl_vars['url_lang']; ?>
" method="post" name="form_lang" id="form_lang">
<fieldset>
	<legend> &nbsp; <?php echo ((is_array($_tmp='generique_langue')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
  &nbsp; </legend>
		<!-- select id="lang" name="lang" onchange="this.form.submit()" dir="<?php echo $this->_tpl_vars['dir']; ?>
" -->
		<select id="lang" name="lang" onchange="pmvUrlOnChangeLang (this)" dir="<?php echo $this->_tpl_vars['dir']; ?>
">
		   <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['langs_available'],'selected' => $this->_tpl_vars['lang_selected']), $this);?>

		</select>
		<input type="text" id="langTmp" onfocus="blur()" style="display:none;width:130px" />
</fieldset>
</form>
</div>