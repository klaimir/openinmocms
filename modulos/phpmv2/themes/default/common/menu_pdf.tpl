<ul id="menuPDF">
<li>
<a id="selectPDFImg" href="{$url_mod}&amp;mod=view_pdf_v2&amp;rss_hash={$rss_hash}"
{if $PMV_STAT_ID_SITE > 0}
  onclick="pmv_click (phpmyvisitesURL, phpmyvisitesSite, '{$url_mod}&amp;mod=view_pdf_v2&amp;rss_hash={$rss_hash}', getPathStatName('{$site_selected_name}', '{'admin_get_default_pdf'|translate|replace:":":""}'), 'FILE')"
{/if}
><img src="{$PMV_THEME}images/pdfMenu.png" alt="Pdf selection" /></a>

	<ul>
		<li>
			<a class="pdfAdmin" href="{$url_mod}&amp;mod=view_pdf_v2&amp;rss_hash={$rss_hash}"
			{if $PMV_STAT_ID_SITE > 0}
			onclick="pmv_click (phpmyvisitesURL, phpmyvisitesSite, '{$url_mod}&amp;mod=view_pdf_v2&amp;rss_hash={$rss_hash}', getPathStatName('{$site_selected_name}', '{'pdf_complete'|translate}'), 'FILE')"
			{/if}
			>
			{'pdf_complete'|translate|replace:" ":"&nbsp;"}
			</a>
		</li>
		{if (count($site_pdf_list) > 0) }
	
			{foreach from=$site_pdf_list key=id item=info}
				{if $info->isAdminPdf()}
					{assign var=classA value=pdfAdmin}
				{else}
					{assign var=classA value=pdfUser}
				 {/if}
			<li>
				<a class="{$classA}" href="{$url_mod}&amp;mod=view_pdf_v2&amp;rss_hash={$rss_hash}&amp;idPdf={$id}"
				{if $PMV_STAT_ID_SITE > 0}
				onclick="pmv_click (phpmyvisitesURL, phpmyvisitesSite, '{$url_mod}&amp;mod=view_pdf_v2&amp;rss_hash={$rss_hash}&amp;idPdf={$id}', getPathStatName('{$site_selected_name}', '{$info->pdfName}'), 'FILE')"
				{/if}
				>
				{$info->pdfName|replace:" ":"&nbsp;"}
				</a>
			</li>
			{/foreach}
		{else}
			<li>
				<a class="pdfAdmin" href="{$url_mod}&amp;mod=admin_site_pdf_config&amp;action=add&amp;site={$site_selected}&amp;adminsite={$site_selected}">
				{'pdf_create_from_interface'|translate|replace:" ":"&nbsp;"}
				</a>
			</li>	
		{/if}
	</ul>
</li>
</ul>