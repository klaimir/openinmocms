<!-- sites selection id="sites" -->
<div id="sites">
<form action="{$url_site}" method="post" id="form_site">
{if (($admin) && ($admin=="true"))}<input type="hidden" name="adminsite" value="{$site_selected}" />
<fieldset>
	<legend> &nbsp; {'admin_site_select'|translate}  &nbsp; </legend>{/if}
	<p><select name="site" onchange="pmvUrlOnChangeSite (this)" dir="{$dir}">
	{if (($admin) && ($admin=="true"))}
	   {foreach from=$sites_view_available key=id item=info}
	   		<option label="{$info}" value="{$id}" {if $site_selected==$id} selected="selected"{/if}>{$info}</option>
	   {/foreach}
	{else}
		<option value ="-1" {if $site_selected==-1} selected="selected"{/if}> {'menu_bilansites'|translate} </option>
		<optgroup label="Sites">
		   {foreach from=$sites_view_available key=id item=info}
		   		<option label="{$info}" value="{$id}" {if $site_selected==$id} selected="selected"{/if}>{$info}</option>
		   {/foreach}
		</optgroup>
	{/if}
	</select></p>
{if (($admin) && ($admin=="true"))}</fieldset>{/if}
</form>
</div>