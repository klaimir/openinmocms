{if $zoom}
<table width="100%" id="detail" align="center" cellpadding="5">
<tr class="details">
<th colspan="2" class="subLevel">
<img src="{$PMV_THEME}images/f6ltr.png" alt="" />{'affluents_details'|translate} ({if $nb_elements > 0}{$offset+1}{else}0{/if} {'generique_to'|translate} {if $offset+$data_limit > $nb_elements} {$nb_elements} {else} {$offset+$data_limit} {/if} {'generique_total'|translate} {$nb_elements})
</th>
</tr>
{foreach from=$zoom item=raw name=boucle}
<tr class="details">
<td class="subLevel1 data">
{if $raw.url}<a href="{$raw.url|utf8_encode}" target="_blank">{/if}
{if $raw.img}<img src="{$path.$id}/{$raw.img}" />{/if}
{if $id =='refererssearchenginesdetails'}
	{assign var=limit value=40} 
{else}
	{assign var=limit value=55}
{/if}
{$raw.data|mb_truncate:$limit:"...":true}
{if $raw.url}</a>{/if}
</td>
<td class="subLevel nb"  width="120px" nowrap="nowrap">{$raw.sum} ({$raw.percent|string_format:"%.2f"} %)</td>
</tr>
{/foreach}
{include file='common/page_index.tpl'}
</table>
{else}
{'generique_inconnu'|translate}
{/if}