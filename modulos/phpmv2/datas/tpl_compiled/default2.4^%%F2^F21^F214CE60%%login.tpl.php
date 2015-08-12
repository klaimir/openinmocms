<?php /* Smarty version 2.6.9, created on 2013-04-12 08:14:52
         compiled from common/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/login.tpl', 14, false),array('modifier', 'ucfirst', 'common/login.tpl', 21, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array('showLogin' => 'false')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  echo '
<script type="text/javascript">
function focusit() {
	document.getElementById(\'log\').focus();
}
window.onload = focusit;
</script>
'; ?>

<div id="login">
<a href="http://www.phpmyvisites.us"><img src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
images/logo-phpmyvisites.gif" alt="login" title="login" /></a>
<div class="both"></div>
<?php if ($this->_tpl_vars['error_login'] == 1): ?>
	<h2><?php echo ((is_array($_tmp='login_error')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
<?php elseif ($this->_tpl_vars['error_login'] == 2): ?>
	<h2><?php echo ((is_array($_tmp='login_error_nopermission')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
<?php endif;  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/form_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form <?php echo $this->_tpl_vars['form_data']['attributes']; ?>
>
<p><?php echo ((is_array($_tmp='login_protected')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['a_link_phpmv']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['a_link_phpmv'])); ?>
</p>
<p><label><?php echo ((is_array($_tmp=((is_array($_tmp='login_login')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)))) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : ucfirst($_tmp)); ?>
</label></p>
<p><input type="text" name="form_login" id="log" value="" size="20" tabindex="1" /></p>
<p><label><?php echo ((is_array($_tmp=((is_array($_tmp='login_password')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)))) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : ucfirst($_tmp)); ?>
</label></p>
<p><input type="password" name="form_password" id="pwd" value="" size="20" tabindex="2" /></p>
<p class="submit">
<?php echo $this->_tpl_vars['form_data']['hidden']; ?>

<input type="submit" name="submit" id="submit" value="Login &raquo;" tabindex="4" />
</p>
</form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>