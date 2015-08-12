{* Pages viewed's menu *}
<h1>{'pagesvues_titre'|translate}</h1>

<!-- Summary Pages -->
{assign var="idtouse" value="sum"}
<table class="resultats full">
	<tr>
		<th></th>
		<th>{if $period==1} {'pagesvues_joursel'|translate} <small>({/if}{$zoom.$idtouse.0.0}{if $period==1})</small>{/if}</th>	
		<th>{if $period==1}	{'pagesvues_jmoins7'|translate} <small>({/if}{$zoom.$idtouse.0.1}{if $period==1})</small>{/if}</th>
		<th>{if $period==1} {'pagesvues_jmoins14'|translate} <small>({/if}{$zoom.$idtouse.0.2}{if $period==1})</small>{/if}</th>
	</tr>
	<tr>
		<td class="libelle">{'pagesvues_pagesvues'|translate}</td>
		<td class="columndetail">{$zoom.$idtouse.2.0.nb_pag}</td>
		<td class="columndetail">{$zoom.$idtouse.2.1.nb_pag}</td>
		<td class="columndetail">{$zoom.$idtouse.2.2.nb_pag}</td>
	</tr>
	<tr>
		<td class="libelle">{'pagesvues_pagesvudiff'|translate}</td>
		<td class="columndetail">{$zoom.$idtouse.2.0.nb_uniq_pag}</td>
		<td class="columndetail">{$zoom.$idtouse.2.1.nb_uniq_pag}</td>
		<td class="columndetail">{$zoom.$idtouse.2.2.nb_uniq_pag}</td>
	</tr>
	<tr>
		<td class="libelle">{'pagesvues_recordpages'|translate}</td>
		<td class="columndetail">{$zoom.$idtouse.2.0.nb_max_pag}</td>
		<td class="columndetail">{$zoom.$idtouse.2.1.nb_max_pag}</td>
		<td class="columndetail">{$zoom.$idtouse.2.2.nb_max_pag}</td>
	</tr>
</table>

<!-- Pages table -->
{counter name=a}
{counter name=i}
<a id="a{$a}"></a>
<a id="i{$i}"></a>
<h3>{'pagesvues_pagesvues'|translate}</h3>
<table class="resultats full">
	{include file="common/viewpages_details.tpl" includeFromPage="true"}
</table>
{pmv_data_array 
	id="pag"
	data="pag"
	template="common/link_population_pages.tpl"
}
<p>
<a class="help_pagename" href="./index.php?mod=admin_help_pagename">{'pagesvues_help_pagename'|translate}</a>
<br/>
<a class="help_pagename" href="./index.php?mod=admin_url_redirection_generate">{'pagesvues_help_track_dls'|translate}</a>
</p>
<!-- Time per pages -->
{assign var="idtouse" value="sumtime"}
{counter name=a}
{counter name=i}
<a id="a{$a}"></a>
<a id="i{$i}"></a>
<a id="ancre1"></a>
<h3>{'pagesvues_tempsparpage'|translate}</h3>
<table class="resultats full">
	<tr>
		<th>
		</th>
		<th>
			{'pagesvues_total_time'|translate}
			<em>
			<a href="{$url_a_exit_sort}&amp;a_sumtime_sort=sumtime.asc.{$a}.{$info_sort.$idtouse.4}#a{$a}"><img src="{$PMV_THEME}images/sortasc{if $info_sort.$idtouse.0 == "sumtime.asc"}r{/if}.gif" alt="" /></a> 
			<a href="{$url_a_exit_sort}&amp;a_sumtime_sort=sumtime.desc.{$a}.{$info_sort.$idtouse.4}#a{$a}"><img src="{$PMV_THEME}images/sortdesc{if $info_sort.$idtouse.0 == "sumtime.desc"}r{/if}.gif" alt="" /></a>
			</em>
		</th>
		<th>
			{'pagesvues_avg_time'|translate}
			<em>
			<a href="{$url_a_exit_sort}&amp;a_sumtime_sort=avgtime.asc.{$a}.{$info_sort.$idtouse.4}#a{$a}"><img src="{$PMV_THEME}images/sortasc{if $info_sort.$idtouse.0 == "avgtime.asc"}r{/if}.gif" alt="" /></a> 
			<a href="{$url_a_exit_sort}&amp;a_sumtime_sort=avgtime.desc.{$a}.{$info_sort.$idtouse.4}#a{$a}"><img src="{$PMV_THEME}images/sortdesc{if $info_sort.$idtouse.0 == "avgtime.desc"}r{/if}.gif" alt="" /></a>
			</em>
		</th>
	</tr>
	{include file="common/viewpages_details.tpl" includeFromPage="true"}
</table>

{pmv_data_array 
	id="sumtime"
	data="sumtime"
	template="common/link_population_pages.tpl"
} 
<div class="centrer">
{counter name=a}
<a id="a{$a}"></a>
<h3>{'pagesvues_graphsnbpages'|translate}</h3>
<img src="{$url_mod}&amp;mod=view_graph&amp;graph_type=2&amp;graph_data=pages_by_visit" alt="" />
</div>
