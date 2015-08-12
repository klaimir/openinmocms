{if sizeof($newsletters_available) != 0}
	<h1>{'admin_newsletter_title'|translate}</h1>
	<h3>{'admin_recorded_nl'|translate}</h3>
	<div class="centrer">
	<table class="centrer"><tr><td>
	<ul>
	{foreach from=$newsletters_available key=id item=info}
		 <li><a href="{$url_current}&amp;adminnewsletter={$id}">{$info} (nid = {$id})</a></li>
	{/foreach}
	</ul>
	</td></tr></table>
	</div>
{else}
	<h2>{'admin_nonewsletter'|translate}</h2>
	{include file="admin/go_back.tpl"}
{/if} 