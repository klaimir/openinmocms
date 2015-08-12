<?php /* Smarty version 2.6.9, created on 2013-04-12 08:10:42
         compiled from admin/form.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/form_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form <?php echo $this->_tpl_vars['form_data']['attributes']; ?>
>
<!-- Output hidden fields -->
<?php echo $this->_tpl_vars['form_data']['hidden']; ?>

<!-- Display the fields -->
<?php $_from = $this->_tpl_vars['list_elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['title'] => $this->_tpl_vars['data']):
?>
	<h3><?php echo $this->_tpl_vars['title']; ?>
</h3>
	<div class="centrer">
	<table class="centrer">
	<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fieldname']):
?>
				<?php if ($this->_tpl_vars['form_data'][$this->_tpl_vars['fieldname']]['label']): ?>
		<tr>
			<td><?php echo $this->_tpl_vars['form_data'][$this->_tpl_vars['fieldname']]['label']; ?>
</td>
			<td><?php echo $this->_tpl_vars['form_data'][$this->_tpl_vars['fieldname']]['html']; ?>
</td>
		</tr>
				<?php else: ?>
			<?php $_from = $this->_tpl_vars['form_data'][$this->_tpl_vars['fieldname']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['radio']):
?>
			<tr>
				<td><?php echo $this->_tpl_vars['radio']['label']; ?>
</td>
				<td><?php echo $this->_tpl_vars['radio']['html']; ?>
</td>
			</tr>
			<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	</table>
	</div>
<?php endforeach; endif; unset($_from); ?>
<div class="boutonsAction">
<?php echo $this->_tpl_vars['form_data']['submit']['html']; ?>

<?php if ($this->_tpl_vars['mod'] == 'admin' && $this->_tpl_vars['action'] !== 'modCur'): ?>
	<?php echo $this->_tpl_vars['form_data']['back']['html']; ?>

<?php endif; ?>
</div>
</form> 