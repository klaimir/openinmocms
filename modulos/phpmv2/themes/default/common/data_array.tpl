{if $data}
<div class="centrer">
<table class="resultats expansive" width="{if $id=='refererskeywords'}600{elseif $id=='settingsconfig' || $id=='refererssites'}500{else}400{/if}px">
<tr>
<th>{$headline}</th>
<th width="130px">{'generique_nombre'|translate}</th>
</tr>
{foreach from=$data item=raw name=boucle}
<tr	{if $raw.id}class="expandcollapse" onclick="viewRowsDetails(this,'{$url_mod}&amp;mod=view_data_array&amp;method_name={$id}details&amp;id_details={$raw.id}');"{elseif $raw.continent}class="expandcollapse" onclick="window.location.href='{$url_mod}&amp;mod=view_source&amp;id_details_continent={$raw.continent}#a1';"{/if}>
{cycle values=",damier" assign=style}
<td class="{$style}align" >
<strong>
{if $raw.img}
<img src="{$path.$id}/{$raw.img}" alt="" />
{elseif $raw.id}
<img src="{$PMV_THEME}images/f5switcha.png" alt="" />
{elseif $raw.url}
<a href="{$raw.url}">
{elseif $id == 'world'}
<a href="{$url}&amp;continent_zoom={$raw.continent}#a{$a}">
{/if}
	{$raw.data|mb_truncate:60:'...'}
	{if $raw.url || $id == 'world' }</a>
{/if}
</strong>
</td>
<td {if $style}class="{$style}"{/if}>
{$raw.sum} ({$raw.percent|string_format:"%.2f"} %)
</td>
</tr>
{/foreach}
{include file='common/page_index.tpl'}
</table>
</div>
{else}null{/if}