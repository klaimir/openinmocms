<div id="loggued">
<small>
	<strong>{$user_login}</strong>
	{if $user_login == 'anonymous'} ({$user_alias}) | <a href="{$url_mod}&amp;mod=login">{'generique_login'|translate}</a>{else}
	{if $user_is_su} ({$user_alias}) | {else} (<a href="./index.php?mod=admin_user&amp;action=modCur&amp;site={$site_selected}&amp;adminsite={$site_selected}">{$user_alias}</a>) | {/if}
	<a href="{$url_mod}&amp;mod=logout"><em>{'generique_logout'|translate}</em></a>{/if}
</small>
</div>