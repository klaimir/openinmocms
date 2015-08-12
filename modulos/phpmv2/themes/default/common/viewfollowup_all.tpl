{* Follow up's menu *}
<h1>{'suivi_titre'|translate}</h1>
<!-- Entry Pages -->
{assign var="idtouse" value="entry"}
{counter name=a}
{counter name=i}
<a id="a{$a}"></a>
<a id="i{$i}"></a>
<a id="ancre1"></a>
<h3>{'suivi_pageentree'|translate}</h3>
<table class="resultats full">
<tr>
<th></th>
<th>
{'suivi_pageentreehits'|translate}
<em>
<a href="{$url_a_entry_sort}&amp;a_entry_sort=entry.asc.{$a}.{$info_sort.$idtouse.4}#a{$a}">
<img src="{$PMV_THEME}images/sortasc{if $info_sort.$idtouse.0 == "entry.asc"}r{/if}.gif" alt="" />
</a> 
<a href="{$url_a_entry_sort}&amp;a_entry_sort=entry.desc.{$a}.{$info_sort.$idtouse.4}#a{$a}">
<img src="{$PMV_THEME}images/sortdesc{if $info_sort.$idtouse.0 == "entry.desc"}r{/if}.gif" alt="" />
</a>
</em>
</th>
</tr>
{include file="common/viewpages_details.tpl" includeFromPage="true"}
</table>
{pmv_data_array 
	id="entry"
	data="entry"
	template="common/link_population_pages.tpl"
}
<!-- Exit pages -->
{assign var="idtouse" value="exit"}
{counter name=a}
{counter name=i}
<a id="a{$a}"></a>
<a id="i{$i}"></a><a id="ancre2"></a>
<h3>{'suivi_pagesortie'|translate}</h3>
<table class="resultats full">
<tr>
<th></th>
<th>
{'suivi_pagesortiehits'|translate}
<em>
<a href="{$url_a_exit_sort}&amp;a_exit_sort=exit.asc.{$a}.{$info_sort.$idtouse.4}#a{$a}"><img src="{$PMV_THEME}images/sortasc{if $info_sort.$idtouse.0 == "exit.asc"}r{/if}.gif" alt="" /></a> 
<a href="{$url_a_exit_sort}&amp;a_exit_sort=exit.desc.{$a}.{$info_sort.$idtouse.4}#a{$a}"><img src="{$PMV_THEME}images/sortdesc{if $info_sort.$idtouse.0 == "exit.desc"}r{/if}.gif" alt="" /></a>
</em>
</th>
<th>
{'suivi_tauxsortie'|translate}
<em>
<a href="{$url_a_exit_sort}&amp;a_exit_sort=exitrate.asc.{$a}.{$info_sort.$idtouse.4}#a{$a}"><img src="{$PMV_THEME}images/sortasc{if $info_sort.$idtouse.0 == "exitrate.asc"}r{/if}.gif" alt="" /></a> 
<a href="{$url_a_exit_sort}&amp;a_exit_sort=exitrate.desc.{$a}.{$info_sort.$idtouse.4}#a{$a}"><img src="{$PMV_THEME}images/sortdesc{if $info_sort.$idtouse.0 == "exitrate.desc"}r{/if}.gif" alt="" /></a>
</em>
</th>
</tr>
{include file="common/viewpages_details.tpl" includeFromPage="true"}
</table>
{pmv_data_array 
	id="exit"
	data="exit"
	template="common/link_population_pages.tpl"
} 

<!-- Single pages visit -->
{assign var="idtouse" value="singlepage"}
{counter name=a}
{counter name=i}
<a id="a{$a}"></a>
<a id="i{$i}"></a>
<a id="ancre3"></a>
<h3>{'suivi_singlepage'|translate}</h3>
<table class="resultats full">
<tr>
<th></th>
<th>
Hits
<em>
<a href="{$url_a_exit_sort}&amp;a_singlepage_sort=exit.asc.{$a}.{$info_sort.$idtouse.4}#a{$a}"><img src="{$PMV_THEME}images/sortasc{if $info_sort.$idtouse.0 == "singlepage.asc"}r{/if}.gif" alt="" /></a> 
<a href="{$url_a_exit_sort}&amp;a_singlepage_sort=exit.desc.{$a}.{$info_sort.$idtouse.4}#a{$a}"><img src="{$PMV_THEME}images/sortdesc{if $info_sort.$idtouse.0 == "singlepage.desc"}r{/if}.gif" alt="" /></a>
</em>
</th>
</tr>
{include file="common/viewpages_details.tpl" includeFromPage="true"}
</table>
{pmv_data_array 
	id="singlepage"
	data="singlepage"
	template="common/link_population_pages.tpl"
} 