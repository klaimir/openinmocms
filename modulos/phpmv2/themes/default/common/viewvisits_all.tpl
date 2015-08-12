{* Visits's menu *}
<h1>{'visites_titre'|translate}</h1>
{counter name=a}
<a id="a{$a}"></a>

{include file="common/statistics.tpl"}

{counter name=a}
<a id="a{$a}"></a>
<h3>{'visites_recapperiode'|translate}</h3>
<div class="centrer">

<table class="resultats full">
<tr>
	<td class="vide"></td>
{foreach from=$periodsummaries item=info}
	<th>{$info.date}</th>
{/foreach}
</tr>
<tr>
	<td><strong>{'visites_nbvisites'|translate}</strong></td>
{foreach from=$periodsummaries item=info}
	<td>
		{if $info.visits == 0} {'visites_aucunevivisite'|translate}
		{else}{$info.visits_percent|print_percent} <small>({$info.visits})</small>
		{/if}
	</td>
{/foreach}
</tr>
<tr>
	<td><strong>{'visites_pagesvues'|translate}</strong></td>
{foreach from=$periodsummaries item=info}
	<td>
		{if $info.visits == 0} {'visites_aucunevivisite'|translate}
		{else}{$info.pages_percent|print_percent} <small>({$info.pages})</small>
		{/if}
	</td>
{/foreach}

</tr>
</table>

{counter name=a}
<a id="a{$a}"></a>
<h3>{'visites_grapghrecap'|translate}</h3>
<img src="{$url_mod}&amp;mod=view_graph&amp;graph_type=1&amp;graph_data=visits_period_summaries" alt="" />

{counter name=a}
<a id="a{$a}"></a>
<h3>{'visites_grapghrecaplongterm'|translate}</h3>
<img src="{$url_mod}&amp;mod=view_graph&amp;graph_type=1&amp;graph_data=visits_all_period_summary" alt="" />

{counter name=a}
<a id="a{$a}"></a>
<h3>{'visites_graphtempsvisites'|translate}</h3>
<img src="{$url_mod}&amp;mod=view_graph&amp;graph_type=2&amp;graph_data=visits_time" alt="" />

{counter name=a}
<a id="a{$a}"></a>
<h3>{'visites_graphheureserveur'|translate}</h3>
<img src="{$url_mod}&amp;mod=view_graph&amp;graph_type=2&amp;graph_data=visits_server_time" alt="" />

{counter name=a}
<a id="a{$a}"></a>
<h3>{'visites_graphheurevisiteur'|translate}</h3>
<img src="{$url_mod}&amp;mod=view_graph&amp;graph_type=2&amp;graph_data=visits_local_time" alt="" />
</div>