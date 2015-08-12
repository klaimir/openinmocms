<table>
{counter print=false assign=cwtb start=0}
{foreach from=$zoom[$idtouse].1 key=key item=info}
{if $info.$idtouse != 0}
<tr{if $info.type == 'category'} class="expandcollapse" onclick="viewRowsDetails(this,'{$url_pages_details}&amp;mod=view_pages_details&amp;idtouse={$idtouse}&amp;c_id_zoom={$info.id}');"{/if}>
{counter print=false assign=cwtb}
<td class="libelle">
{if $info.type == 'category'}
<img src="{$PMV_THEME}images/groupswitcha.png" alt="expend collapse" class="expendcollapse" />
{/if}
{$info.data|truncate:50:"..."}
</td>
<td>
{if $idtouse == "sumtime"}{$info.$idtouse|time}{else}
{$info.$idtouse}
{/if}
</td>
{if $idtouse == "sum"}
<td>{$info.percentn1|print_percent} <small>({$info.sumn1})</small></td>
<td>{$info.percentn2|print_percent} <small>({$info.sumn2})</small></td>
{/if}	
{if $idtouse == "exit"}
<td>{$info.exitrate|string_format:"%.2f"} %</td>
{/if}
{if $idtouse == "sumtime"}
<td>{$info.avgtime|time}</td>
{/if}
</tr>
{/if}
{/foreach}
</table>