<h1>{'liens_admin'|translate}</h1>
<div id="administration">
	<p class="texte">{'admin_intro'|translate:$link_doc}</p>
	<div id="generalAdmin">
		<h3>{'install_general_setup'|translate}</h3>
		<h5>{'admin_configuration'|translate}</h5>
		<ul>
		<li><a href="./index.php?mod=admin_general_config">{'admin_general_conf'|translate}</a></li>
		<li><a href="./index.php?mod=admin_db_config">{'install_database_setup'|translate}</a></li>
		</ul>
		<h5>{'admin_user_title'|translate}</h5>
		<ul>
		<li><a href="./index.php?mod=admin_group&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_group_title'|translate}</a></li>
		<li><a href="./index.php?mod=admin_user&amp;action=add&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_user_add'|translate}</a></li>
		<li><a href="./index.php?mod=admin_user&amp;action=mod&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_user_mod'|translate}</a></li>
		<li><a href="./index.php?mod=admin_user&amp;action=del&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_user_del'|translate}</a></li>
		</ul>
		<h5>{'admin_server_info'|translate}</h5>
		<ul>
		<li><a href="./index.php?mod=admin_server_info">{'admin_server_info'|translate}</a></li>
		</ul>
		<h5>Plugins</h5>
		<ul>
		<li><a href="./index.php?mod=admin_plugin_config&amp;site={$site_selected}&amp;adminsite={$site_selected}">Manage plugins</a></li>
		{foreach from=$installedPlugin item=raw name=boucle key=key}
			{if $raw.type == "admin"}
			<li><a href="./index.php?mod={$key}.{$raw.mod}&amp;site={$site_selected}&amp;adminsite={$site_selected}">{if $raw.langPath}{$raw.title|translate}{else}{$raw.title}{/if}</a></li>
			{/if}
		{/foreach}
		</ul>
		<h5>{'generique_other'|translate}</h5>
		<ul>
		<li><a href="./index.php?mod=send_mail">{'admin_send_mail'|translate}</a></li>
		<li><a href="./index.php?mod=view_rss&amp;rss_hash={$rss_hash}">{'admin_rss_feed'|translate}</a></li>
		<li><a href="./index.php?mod=view_rss&amp;rss_hash={$rss_hash}&amp;site={$site_selected}">{'admin_rss_feed_specific_site'|translate:$site_selected}</a></li>
		<li><a href="./index.php?mod=view_pdf_v2&amp;rss_hash={$rss_hash}&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'pdf_generate_link'|translate:$site_selected}</a></li>
		<li><a href="./index.php?mod=view_pdf_v2&amp;rss_hash={$rss_hash}">{'pdf_summary_generate_link'|translate:$site_selected}</a></li>
		</ul>
		<h5>{'admin_last_version'|translate}</h5>
		<a href="http://www.phpmyvisites.us/"><img src="http://www.phpmyvisites.net/test-last-version-available.php?version={$PHPMV_VERSION}"></a>
	</div>
	<div id="detailAdmin">
		<h3>{'admin_site_admin'|translate}</h3>
		<h5>{'install_general_setup'|translate}</h5>
		<ul>
		<li><a href="./index.php?mod=admin_site_general&amp;action=add">{'admin_site_add'|translate}</a></li>
		<li><a href="./index.php?mod=admin_site_general&amp;action=mod&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_site_mod'|translate}</a></li>
		<li><a href="./index.php?mod=admin_site_general&amp;action=del&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_site_del'|translate}</a></li>
		<li><a href="./index.php?mod=admin_site_urls&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_url_alias'|translate}</a></li>
		</ul>
		
		<h5>{'generique_other'|translate}</h5>
		<ul>
		<li><a href="./index.php?mod=admin_site_javascript_code&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_afficherjavascript'|translate}</a></li>
		<li><a href="./index.php?mod=admin_url_redirection_generate&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_url_generate_title'|translate}</a></li>
		<li><a href="./index.php?mod=admin_help_pagename&amp;site={$site_selected}&amp;adminsite={$site_selected}"><b>How to give a friendly name to your pages?</b></a></li>
		<br/>
		<li><a href="./index.php?mod=admin_site_cookie_exclude&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_cookieadmin'|translate}</a></li>
		<li><a href="./index.php?mod=admin_site_ip_exclude&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_ip_ranges'|translate}</a></li>
		</ul>
		
		<h5>{'affluents_newslettersimg'|translate}</h5>
		<p class="helpAdmintext">To detect a visitor from a newsletter in the Referrers section of phpMyVisites, you have
		to add the parameter "{$PARAM_URL_NEWSLETTER}" in the URLs in your newsletters.</p>
		<p class="helpAdmintext">For example if you have a link in your newsletter which is "http://www.site.com/index.php?part=misc"</p>
		<p class="helpAdmintext">You have to change it to "http://www.site.com/index.php?part=misc&{$PARAM_URL_NEWSLETTER}=XXXXXXX" where XXXXXXX is the {$PARAM_URL_NEWSLETTER}
		of the newsletter you've saved in phpmyvisites.</p>
		<p class="helpAdmintext">Another example : "http://www.site.com/" will be "http://www.site.com/?{$PARAM_URL_NEWSLETTER}=XXXXXXX".</p>
		<ul>
		<li><a href="./index.php?mod=admin_site_newsletters&amp;action=add&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_nl_add'|translate}</a></li>
		<li><a href="./index.php?mod=admin_site_newsletters&amp;action=mod&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_nl_mod'|translate}</a></li>
		<li><a href="./index.php?mod=admin_site_newsletters&amp;action=del&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_nl_del'|translate}</a></li>
		</ul>
		
		<h5>{'affluents_partenairesimg'|translate}</h5>

		<p class="helpAdmintext">To detect a partner website as is, you have to enter its url or add a parameters to the link from its site
		to your site (as in the newsletters). This parameter's name is "{$PARAM_URL_PARTNER}".</p>
		<p class="helpAdmintext">For example if the partner "Tourloutiti" has a "{$PARAM_URL_PARTNER}=14", you can ask him to change its link to your site adding "{$PARAM_URL_PARTNER}=14" as an URL parameter.
		But the simplest is to save all its urls and "Tourloutiti" will be automatically recognized as a partner website in the Referers part.</p>

		<ul>	
		<li><a href="./index.php?mod=admin_site_partners&amp;action=add&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_partner_add'|translate}</a></li>
		<li><a href="./index.php?mod=admin_site_partners&amp;action=mod&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_partner_mod'|translate}</a></li>
		<li><a href="./index.php?mod=admin_site_partners&amp;action=del&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_partner_del'|translate}</a></li>
		</ul>
		
		<h5>[ beta ] {'generique_pdf'|translate}</h5>
		<p class="helpAdmintext">You can create personalized PDF report to create the PDF containing only the statistics you need!</p>
		<ul>
		<li><a href="./index.php?mod=admin_site_pdf_config&amp;action=add&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_pdf_add'|translate}</a></li>
		<li><a href="./index.php?mod=admin_site_pdf_config&amp;action=mod&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_pdf_mod'|translate}</a></li>
		<li><a href="./index.php?mod=admin_site_pdf_config&amp;action=del&amp;site={$site_selected}&amp;adminsite={$site_selected}">{'admin_pdf_del'|translate}</a></li>
		</ul>
		
	</div>
	
	<div class="both"></div>
</div>
<div class="centrer">
<p>Version : phpMyVisites {$PHPMV_VERSION}</p>
</div>
