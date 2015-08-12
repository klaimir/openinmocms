<?php /* Smarty version 2.6.9, created on 2013-04-12 08:14:14
         compiled from common/period_selection.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/period_selection.tpl', 3, false),)), $this); ?>
<!-- period selection -->
<p class="periodevisu">
	<?php echo ((is_array($_tmp='menu_periode')) ? $this->_run_mod_handler('translate', true, $_tmp, "<strong> ".($this->_tpl_vars['date_litteral'])." </strong>") : smarty_modifier_translate($_tmp, "<strong> ".($this->_tpl_vars['date_litteral'])." </strong>")); ?>
 
	
</p>

<p class="choixperiode">
	(<a href="javascript:pmvUrlOnChangePeriod ('1')"><?php echo ((is_array($_tmp='menu_jour')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a> |
	<a href="javascript:pmvUrlOnChangePeriod ('2')"><?php echo ((is_array($_tmp='menu_semaine')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a> |
	<a href="javascript:pmvUrlOnChangePeriod ('3')"><?php echo ((is_array($_tmp='menu_mois')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a> |
	<a href="javascript:pmvUrlOnChangePeriod ('4')"><?php echo ((is_array($_tmp='menu_annee')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>
	)

</p>
