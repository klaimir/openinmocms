<?php /* Smarty version 2.6.9, created on 2013-04-12 08:14:07
         compiled from common/menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/menu.tpl', 4, false),array('modifier', 'replace', 'common/menu.tpl', 10, false),)), $this); ?>
<!-- menu -->
<ul id="menu">
<?php $_from = $this->_tpl_vars['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menuIndex'] => $this->_tpl_vars['info']):
?>
	<li><?php if ($this->_tpl_vars['page'] == $this->_tpl_vars['info']['modname']): ?><script type="text/javascript">var page_stat_name="<?php echo ((is_array($_tmp=$this->_tpl_vars['info']['lang'])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";</script><?php endif; ?>
		<a href="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=<?php echo $this->_tpl_vars['info']['modname']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['lang'])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>
		<ul>
		<?php $_from = $this->_tpl_vars['info']['submenus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itemIndex'] => $this->_tpl_vars['lang']):
?>
			<li>
				<a href="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=<?php echo $this->_tpl_vars['info']['modname']; ?>
#a<?php echo $this->_tpl_vars['itemIndex']; ?>
">
				<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang'])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', "&nbsp;") : smarty_modifier_replace($_tmp, ' ', "&nbsp;")); ?>

				</a>
			</li>
		<?php endforeach; endif; unset($_from); ?>
		<?php $_from = $this->_tpl_vars['info']['plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pluginKey'] => $this->_tpl_vars['pluginRaw']):
?>
			<li>
				<a href="javascript:pmvUrlOpenModule('<?php echo $this->_tpl_vars['pluginKey']; ?>
.<?php echo $this->_tpl_vars['pluginRaw']['mod']; ?>
')">
				<?php if ($this->_tpl_vars['pluginRaw']['langPath']):  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pluginRaw']['title'])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', "&nbsp;") : smarty_modifier_replace($_tmp, ' ', "&nbsp;"));  else:  echo ((is_array($_tmp=$this->_tpl_vars['pluginRaw']['title'])) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', "&nbsp;") : smarty_modifier_replace($_tmp, ' ', "&nbsp;"));  endif; ?></a>
				</a>
			</li>
		<?php endforeach; endif; unset($_from); ?>
		</ul>
	</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<!-- /menu -->