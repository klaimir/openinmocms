{if $includeFromPage!="true"}
<div>
{/if}
{counter print=false assign=cwtb start=0}
{foreach from=$zoom[$idtouse].1 key=key item=info}
{if $info.$idtouse != 0}
<tr {if $info.type == 'category'} class="expandcollapse" onclick="loadDetailXML ('{$idtouse}', this, '{$url_pages_details}&amp;mod=view_pages_details&amp;idtouse={$idtouse}&amp;c_id_zoom={$info.id}');"{/if}>
{counter print=false assign=cwtb}
<td class="libelle">
{if $info.type == 'category'}
<img src="{$PMV_THEME}images/groupswitcha.png" alt="expend collapse" style="margin-left: -15px;" />
{/if}
{$info.data|truncate:50:"..."}
	{if $info.type == 'file'}
		<img src="{$PMV_THEME}images/download.png" />
	{elseif $info.type == 'rss'}
		<img src="{$PMV_THEME}images/rss.png" />
	{elseif $info.type == 'podcast'}
		<img src="{$PMV_THEME}images/podcast.png" />
{/if}
	{if sizeof($info.vars) != 0 && $idtouse == 'sum'}
	<span style="cursor:pointer;color:red;font-size:x-small;vertical-align:50%;" onmouseover="pointer(this)"
	  onclick="displayVariables( this.parentNode );"> + </span>
		<div style="display:none;">
				<table cellspacing="0" align="right">
				<tr><th colspan="2">
				{'generique_variables'|translate}
				</th></tr>
				{foreach from=$info.vars key=var_name item=a_var}
					<tr><td colspan="2" class="header">{$var_name}</td></tr>
					{foreach from=$a_var key=var_value item=var_count}
					<tr><td class="data">{$var_value}</td><td class="nb"> {$var_count}</td></tr>
					{/foreach}
				{/foreach}
				</table>
		</div>
	{/if}
</td>
<td class="columndetail">
{if $idtouse == "sumtime"}{$info.$idtouse|time}{else}
{$info.$idtouse}
{/if}
</td>
{if $idtouse == "sum"}
<td class="columndetail">{$info.percentn1|print_percent} <small>({$info.sumn1})</small></td>
<td class="columndetail">{$info.percentn2|print_percent} <small>({$info.sumn2})</small></td>
{/if}
{if $idtouse == "exit"}
<td class="columndetail">{$info.exitrate|string_format:"%.2f"} %</td>
{/if}
{if $idtouse == "sumtime"}
<td class="columndetail">{$info.avgtime|time}</td>
{/if}
</tr>
{/if}
{/foreach}
{if $includeFromPage!="true"}
</div>
{/if}
