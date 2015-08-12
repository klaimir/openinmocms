{if sizeof($partners_available) != 0}
	<h1>{'admin_partner_title'|translate}</h1>
	<h3>{'admin_recorded_partners'|translate}</h3>
	<div class="centrer">
	<table class="centrer"><tr><td>
	<ul>
	{foreach from=$partners_available key=id item=info}
		 <li><a href="{$url_current}&amp;adminpartner={$id}">{$info} ({$PARAM_URL_PARTNER} = {$id})</a></li>
	{/foreach}
	</ul>
	</td></tr></table>
	</div>
{else}
	<h2>{'admin_nopartner'|translate}</h2>
	{include file="admin/go_back.tpl"}
{/if} 