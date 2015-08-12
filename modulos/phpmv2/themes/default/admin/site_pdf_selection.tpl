{if sizeof($pdf_available) != 0}
	<h1>{'admin_pdf_title'|translate}</h1>
	<div class="centrer">
	<p>{'admin_recorded_pdf'|translate}</p>
	<ul>
	{foreach from=$pdf_available key=id item=info}
		 <li><a href="{$url_current}&amp;idPdf={$id}">{$info->pdfName} {if $info->isPublic}[public] {/if}(nid = {$id})</a></li>
	{/foreach}
	</ul>
	</div>
{else}
	<h2>{'admin_nopdf'|translate}</h2>
	{include file="admin/go_back.tpl"}
{/if} 