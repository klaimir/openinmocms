</div>
{include file="common/footer_stat_code.tpl"}
{literal}
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
{/literal}
{if $mod==view}
<p class="archive">
Version : phpMyVisites {$PHPMV_VERSION} | {'admin_rss_feed'|translate}
&nbsp;<a title="RSS web statistics" href="index.php?mod=view_rss&amp;rss_hash={$rss_hash}"><img src="images/logos/rss.gif" alt="RSS web statistics" /></a>
</p>
{/if}

</body>
</html>