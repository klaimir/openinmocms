<?php /* Smarty version 2.6.9, created on 2013-04-12 08:14:14
         compiled from common/error.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/error.tpl', 4, false),)), $this); ?>
<?php if ($this->_tpl_vars['content_message']): ?>
<h2><?php echo $this->_tpl_vars['content_message']; ?>
</h2>
<?php endif; ?>
<h2><?php echo ((is_array($_tmp='aucunvisiteur_titre')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
<?php if ($this->_tpl_vars['error_message_bis']): ?>
<p class="centrer"><small><i><?php echo $this->_tpl_vars['error_message_bis']; ?>
</i></small></p>
<?php endif; ?>