<?php /* Smarty version 2.6.9, created on 2013-04-12 08:10:17
         compiled from common/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/footer.tpl', 20, false),)), $this); ?>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer_stat_code.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script type="text/javascript">
<!--
function loadRSS(p_url, p_id, p_name) {
  if (p_id > 0) {
    v_url = "./phpmyvisites.php?url="+escape(p_url)+"&id=" + p_id+ "&pagename=" + escape("RSS:"+p_name);
  }
  else {
    v_url = p_url;
  }
  location.href = v_url;
}
// -->
</script>
'; ?>

<?php if ($this->_tpl_vars['mod'] == view): ?>
<p class="archive">
Version : phpMyVisites <?php echo $this->_tpl_vars['PHPMV_VERSION']; ?>
 | <?php echo ((is_array($_tmp='admin_rss_feed')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

&nbsp;<a title="RSS web statistics" href="index.php?mod=view_rss&amp;rss_hash=<?php echo $this->_tpl_vars['rss_hash']; ?>
"><img src="images/logos/rss.gif" alt="RSS web statistics" /></a>
</p>
<?php endif; ?>

</body>
</html>