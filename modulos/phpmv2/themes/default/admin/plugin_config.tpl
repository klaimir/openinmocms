<div align="center">
	<form {$form_data.attributes}>
<H1>Available plugins & Configuration</H1><br />
<p>This is HIGHLY experimental and under heavy development! <br/>If you have suggestions, try the official forums.</p>

<table id="centrer" cellpadding="8" border="1">
<tr>
<td><b>Enabled</b></td>
<td><b>Title</b></td>
<td><b>Version</b></td>
<td><b>Display Type</b></td>
<td><b>Description</b></td>
<td>&nbsp;</td>
</tr>
{foreach from=$listPlugin item=raw name=boucle key=key}
<tr>
<td valign="top"><input type="checkbox" name="PluginInstall{$key}" value="true" {if $raw.pmv_install}checked="true"{/if} /></td>
<td valign="top">{if $raw.langPath}{$raw.title|translate}{else}{$raw.title}{/if}</td>
<td valign="top">{$raw.version}</td>
<td valign="top"><select name="type{$key}">
{foreach from=$listType item=valType name=boucle key=keyType}
<option value="{$keyType}" {if $raw.pmv_type==$keyType}selected="selected"{/if}>{if $raw.type==$keyType}[{$valType}]{else}{$valType}{/if}</option>
{/foreach}
</select><br />
<select name="menuModName{$key}">
{foreach from=$listMenu item=valMenu name=boucle key=keyMenu}
<option value="{$keyMenu}" {if $raw.pmv_menuModName==$keyMenu}selected="selected"{/if}>{if $raw.menuModName==$keyMenu}[{$valMenu|translate}]{else}{$valMenu|translate}{/if}</option>
{/foreach}
</select></td>
<td valign="top">{$raw.description}</td>
<td valign="top">{if $raw.url}<a href="{$raw.url}" target="_blank">More info ...</a>{/if}</td>
</tr>
{/foreach}
</table>
	<div class="boutonsAction">
	<input name="btsubmit" value="{'install_valider'|translate}" type="submit"/>
	{if $mod=='admin'}
	{$form_data.back.html}
	{/if}
	</div>
	</form> 
</div>