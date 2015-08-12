{* Source's menu *}
<h1>{'provenance_titre'|translate}</h1>

{counter name=a}
<a id="a{$a}"></a>
<h3>{'provenance_mappemonde'|translate}</h3>

<!-- Map of the world -->
<div class="centrer">
{if $map == 'world'}
{assign var=index_lang_detail value=provenance_continent}
<map id="worldmap" name="worldmap">
	{foreach from=$html_area_location key=id item=info}
	<area shape="poly" coords="{$info}" 
	href="{$url_continent}&amp;id_details_continent={$id}#a{$a}" 
	alt="{$id|translate}" 
	title="{$id|translate}" 
	onmouseout="window.status=''; return true"  
	onmouseover="window.status='{$id|translate}'; return true" />
	{/foreach}
</map>
{/if}

{if $map == 'continent'}
{assign var=index_lang_detail value=provenance_pays}
<a href="{$url_continent}#a{$a}">
{/if}
<img src="{$url_mod}&amp;mod=view_world_map{if $map == 'continent'}&amp;id_details_continent={$continent_asked}{/if}" {if $map == 'world'}usemap="#worldmap"{/if} class="generic" alt="map" />
<img src="{$path_maps}/scale.png" class="detail" alt="" />
{if $map == 'continent'}
</a>
{/if}
</div>

<!-- Details Map Of The World (all continent OR all countries in the zoomed continent) -->

{pmv_data_array	
	data=$continentcountries
	id=continent
	template="common/display_data_array.tpl"
}

<!-- Coutries -->
{counter name=a}
{pmv_data_array
	headline='provenance_recappays'
	text='provenance_nbpays'|translate:"<strong>$countriesdistinct</strong>"
	data=$countries
	template="common/display_data_array.tpl"
}

<!-- Countries Interest -->
{counter name=i}
{pmv_data_array
	link='provenance_interetspays'
	data=$countriesinterest
	template="common/display_data_array_interest.tpl"
}
<div class="centrer">
<img class="detail" src="{$url_mod}&amp;mod=view_graph&amp;graph_type=3&amp;graph_data=source_countries" alt="" />
</div>
<!-- Providers -->
{counter name=a}
{pmv_data_array
	headline='provenance_fai'
	data=$providers
	template="common/display_data_array.tpl"
}