<?php /* Smarty version 2.6.9, created on 2013-04-12 08:10:17
         compiled from common/logged.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/logged.tpl', 4, false),)), $this); ?>
<div id="loggued">
<small>
	<strong><?php echo $this->_tpl_vars['user_login']; ?>
</strong>
	<?php if ($this->_tpl_vars['user_login'] == 'anonymous'): ?> (<?php echo $this->_tpl_vars['user_alias']; ?>
) | <a href="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=login"><?php echo ((is_array($_tmp='generique_login')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a><?php else: ?>
	<?php if ($this->_tpl_vars['user_is_su']): ?> (<?php echo $this->_tpl_vars['user_alias']; ?>
) | <?php else: ?> (<a href="./index.php?mod=admin_user&amp;action=modCur&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo $this->_tpl_vars['user_alias']; ?>
</a>) | <?php endif; ?>
	<a href="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=logout"><em><?php echo ((is_array($_tmp='generique_logout')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</em></a><?php endif; ?>
</small>
</div>