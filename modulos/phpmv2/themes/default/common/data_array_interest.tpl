<table class="resultats expansive">
{foreach from=$data item=raw name=boucle}
{if $smarty.foreach.boucle.iteration == 1}
<tr>
<th>{$headline}</th>
<th>
{'generique_nombre'|translate}
<em>
<a onclick="changeDetails(this,'{$url_a_int_sort}&amp;a_{$id_sort}_sort=sum.asc.{$i}.{$info_sort.$id_sort.4}#i{$i}')">
<img src="{$PMV_THEME}images/sortasc{if $info_sort.$id_sort.0 == "sum.asc"}r{/if}.gif" alt="" />
</a> 
<a onclick="changeDetails(this,'{$url_a_int_sort}&amp;a_{$id_sort}_sort=sum.desc.{$i}.{$info_sort.$id_sort.4}#i{$i}')"><img src="{$PMV_THEME}images/sortdesc{if $info_sort.$id_sort.0 == "sum.desc"}r{/if}.gif" alt="" /></a>
</em>
</th>
<th>
{'visites_pagesvisites'|translate}
<em>
<a onclick="changeDetails(this,'{$url_a_int_sort}&amp;a_{$id_sort}_sort=page_per_visit.asc.{$i}.{$info_sort.$id_sort.4}#i{$i}')"><img src="{$PMV_THEME}images/sortasc{if $info_sort.$id_sort.0 == "page_per_visit.asc"}r{/if}.gif" alt="" /></a>
<a onclick="changeDetails(this,'{$url_a_int_sort}&amp;a_{$id_sort}_sort=page_per_visit.desc.{$i}.{$info_sort.$id_sort.4}#i{$i}')"><img src="{$PMV_THEME}images/sortdesc{if $info_sort.$id_sort.0 == "page_per_visit.desc"}r{/if}.gif" alt="" /></a>
</em>
</th>
<th>
{'visites_pagesvisitessign'|translate}
<em>
<a onclick="changeDetails(this,'{$url_a_int_sort}&amp;a_{$id_sort}_sort=page_per_visit_significant.asc.{$i}.{$info_sort.$id_sort.4}#i{$i}')"><img src="{$PMV_THEME}images/sortasc{if $info_sort.$id_sort.0 == "page_per_visit_significant.asc"}r{/if}.gif" alt="" /></a>
<a onclick="changeDetails(this,'{$url_a_int_sort}&amp;a_{$id_sort}_sort=page_per_visit_significant.desc.{$i}.{$info_sort.$id_sort.4}#i{$i}')"><img src="{$PMV_THEME}images/sortdesc{if $info_sort.$id_sort.0 == "page_per_visit_significant.desc"}r{/if}.gif" alt="" /></a>
</em>
</th>
<th>
{'visites_tauxvisite'|translate}
<em>
<a onclick="changeDetails(this,'{$url_a_int_sort}&amp;a_{$id_sort}_sort=one_page_rate.asc.{$i}.{$info_sort.$id_sort.4}#i{$i}')"><img src="{$PMV_THEME}images/sortasc{if $info_sort.$id_sort.0 == "one_page_rate.asc"}r{/if}.gif" alt="" /></a>
<a onclick="changeDetails(this,'{$url_a_int_sort}&amp;a_{$id_sort}_sort=one_page_rate.desc.{$i}.{$info_sort.$id_sort.4}#i{$i}')"><img src="{$PMV_THEME}images/sortdesc{if $info_sort.$id_sort.0 == "one_page_rate.desc"}r{/if}.gif" alt="" /></a>
</em>
</th>
<th>
{'visites_tempsmoyen'|translate}
<em>
<a onclick="changeDetails(this,'{$url_a_int_sort}&amp;a_{$id_sort}_sort=time_per_visit.asc.{$i}.{$info_sort.$id_sort.4}#i{$i}')"><img src="{$PMV_THEME}images/sortasc{if $info_sort.$id_sort.0 == "time_per_visit.asc"}r{/if}.gif" alt="" /></a>
<a onclick="changeDetails(this,'{$url_a_int_sort}&amp;a_{$id_sort}_sort=time_per_visit.desc.{$i}.{$info_sort.$id_sort.4}#i{$i}')"><img src="{$PMV_THEME}images/sortdesc{if $info_sort.$id_sort.0 == "time_per_visit.desc"}r{/if}.gif" alt="" /></a>
</em>
</th>
</tr>
{/if}
<tr>
<td class="{if $smarty.foreach.boucle.iteration is even}damier{/if}align">
{if $raw.img}<img src="{$path.$id}/{$raw.img}" alt="" /> {/if}
<strong>
{if $id == 'sites'}<a href="http://{$raw.data}" target="_blank">
{elseif $raw.url}<a href="{$raw.url}" target="_blank">{/if}
{$raw.data|truncate:50:'...'}
{if $id == 'sites'}</a>{/if}
</strong>
</td>
<td {if $smarty.foreach.boucle.iteration is even}class="damier"{/if}>{$raw.sum}</td>
<td {if $smarty.foreach.boucle.iteration is even}class="damier"{/if}>{$raw.page_per_visit|string_format:"%.1f"}</td>
<td {if $smarty.foreach.boucle.iteration is even}class="damier"{/if}>{$raw.page_per_visit_significant|string_format:"%.1f"}</td>
<td {if $smarty.foreach.boucle.iteration is even}class="damier"{/if}>{$raw.one_page_rate|string_format:"%.0f"} %</td>
<td {if $smarty.foreach.boucle.iteration is even}class="damier"{/if}>{$raw.time_per_visit}</td>
</tr>	
{/foreach}
{if $info_sort.$id_sort.4 == "0.0"}
{include file='common/page_index_interrest.tpl'}
{/if}
</table>
{pmv_data_array 
	id=$id
	template="common/link_population.tpl"
}