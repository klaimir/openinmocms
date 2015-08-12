{if $PMV_STAT_ID_SITE > 0 && $internal_stats == true}
<p class="archive">
	{literal}
	<script type="text/javascript">
	<!--
	function getPathStatName (siteName, pageName) {
		// Get current lang
		var lang_name = "";
		var oFormLang = document.form_lang;
		if (typeof(oFormLang) != "undefined")
		  lang_name = '/' + oFormLang.lang.options[oFormLang.lang.selectedIndex].text;
		
		return siteName+lang_name+'/'+pageName;
	}
	// -->
	</script>
	{/literal}
	
	<script type="text/javascript">
	<!--
	var a_vars = Array();
	{if $PMV_STAT_SAVE_USER }
	a_vars['Login'] = "{$user_login} ({$user_alias})";
	{/if}
	if (typeof(page_stat_name) == "undefined") 
	  page_stat_name = '{"liens_admin"|translate}';
			
	
	var pagename= getPathStatName('{$site_selected_name}', page_stat_name);
	var phpmyvisitesSite = {$PMV_STAT_ID_SITE};
	var phpmyvisitesURL = "./phpmyvisites.php";
	//-->
	</script>
	<script type="text/javascript" src="./phpmyvisites.js"></script>
</p>
{/if}