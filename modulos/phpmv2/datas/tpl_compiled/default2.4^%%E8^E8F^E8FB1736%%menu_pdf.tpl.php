<?php /* Smarty version 2.6.9, created on 2013-04-12 08:14:14
         compiled from common/menu_pdf.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/menu_pdf.tpl', 5, false),array('modifier', 'replace', 'common/menu_pdf.tpl', 5, false),)), $this); ?>
<ul id="menuPDF">
<li>
<a id="selectPDFImg" href="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_pdf_v2&amp;rss_hash=<?php echo $this->_tpl_vars['rss_hash']; ?>
"
<?php if ($this->_tpl_vars['PMV_STAT_ID_SITE'] > 0): ?>
  onclick="pmv_click (phpmyvisitesURL, phpmyvisitesSite, '<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_pdf_v2&amp;rss_hash=<?php echo $this->_tpl_vars['rss_hash']; ?>
', getPathStatName('<?php echo $this->_tpl_vars['site_selected_name']; ?>
', '<?php echo ((is_array($_tmp=((is_array($_tmp='admin_get_default_pdf')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ":", "") : smarty_modifier_replace($_tmp, ":", "")); ?>
'), 'FILE')"
<?php endif; ?>
><img src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
images/pdfMenu.png" alt="Pdf selection" /></a>

	<ul>
		<li>
			<a class="pdfAdmin" href="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_pdf_v2&amp;rss_hash=<?php echo $this->_tpl_vars['rss_hash']; ?>
"
			<?php if ($this->_tpl_vars['PMV_STAT_ID_SITE'] > 0): ?>
			onclick="pmv_click (phpmyvisitesURL, phpmyvisitesSite, '<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_pdf_v2&amp;rss_hash=<?php echo $this->_tpl_vars['rss_hash']; ?>
', getPathStatName('<?php echo $this->_tpl_vars['site_selected_name']; ?>
', '<?php echo ((is_array($_tmp='pdf_complete')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
'), 'FILE')"
			<?php endif; ?>
			>
			<?php echo ((is_array($_tmp=((is_array($_tmp='pdf_complete')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', "&nbsp;") : smarty_modifier_replace($_tmp, ' ', "&nbsp;")); ?>

			</a>
		</li>
		<?php if (( count ( $this->_tpl_vars['site_pdf_list'] ) > 0 )): ?>
	
			<?php $_from = $this->_tpl_vars['site_pdf_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['info']):
?>
				<?php if ($this->_tpl_vars['info']->isAdminPdf()): ?>
					<?php $this->assign('classA', 'pdfAdmin'); ?>
				<?php else: ?>
					<?php $this->assign('classA', 'pdfUser'); ?>
				 <?php endif; ?>
			<li>
				<a class="<?php echo $this->_tpl_vars['classA']; ?>
" href="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_pdf_v2&amp;rss_hash=<?php echo $this->_tpl_vars['rss_hash']; ?>
&amp;idPdf=<?php echo $this->_tpl_vars['id']; ?>
"
				<?php if ($this->_tpl_vars['PMV_STAT_ID_SITE'] > 0): ?>
				onclick="pmv_click (phpmyvisitesURL, phpmyvisitesSite, '<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_pdf_v2&amp;rss_hash=<?php echo $this->_tpl_vars['rss_hash']; ?>
&amp;idPdf=<?php echo $this->_tpl_vars['id']; ?>
', getPathStatName('<?php echo $this->_tpl_vars['site_selected_name']; ?>
', '<?php echo $this->_tpl_vars['info']->pdfName; ?>
'), 'FILE')"
				<?php endif; ?>
				>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['info']->pdfName)) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', "&nbsp;") : smarty_modifier_replace($_tmp, ' ', "&nbsp;")); ?>

				</a>
			</li>
			<?php endforeach; endif; unset($_from); ?>
		<?php else: ?>
			<li>
				<a class="pdfAdmin" href="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=admin_site_pdf_config&amp;action=add&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
">
				<?php echo ((is_array($_tmp=((is_array($_tmp='pdf_create_from_interface')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', "&nbsp;") : smarty_modifier_replace($_tmp, ' ', "&nbsp;")); ?>

				</a>
			</li>	
		<?php endif; ?>
	</ul>
</li>
</ul>