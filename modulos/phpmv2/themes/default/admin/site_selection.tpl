<h1>{'admin_select_site_title'|translate}</h1>
<h3>{'admin_sitesenregistres'|translate}</h3>
<div class="centrer">
<table class="centrer"><tr><td>
<ul>
{foreach from=$sites_admin_available key=id item=info}
	 <li><a href="{$url_current}&amp;adminsite={$id}">{$id} - {$info}</a></li>
{/foreach}
</ul>
</td></tr></table>
</div>