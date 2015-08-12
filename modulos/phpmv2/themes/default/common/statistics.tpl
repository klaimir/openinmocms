<h3>{'visites_statistiques'|translate}</h3>
<div class="centrer">
<table class="resultats expansive">
<tbody>
<tr>
	<th colspan="2">
			<strong>{'visites_periodesel'|translate}</strong>
	</th>
</tr>
<tr>
	<td class="damieralign">
		{'visites_visites'|translate}
	</td>
	<td>
		<strong>{$statistics.nb_vis}</strong>
	</td>
</tr>
<tr>
	<td class="align">{'visites_uniques'|translate}</td>
	<td class="damier"><strong>{$statistics.nb_uniq_vis}</strong></td>
</tr>

<tr>
	<td class="damieralign">{'visites_pagesvues'|translate}</td>
	<td><strong>{$statistics.nb_pag}</strong></td>
</tr>
<tr>
	<td class="align">{'visites_pagesvisiteurs'|translate}</td>
	<td class="damier"><strong>{$statistics.nb_pag_per_vis|string_format:"%.1f"}</strong></td>
</tr>
<tr>
	<td class="damieralign">{'visites_pagesvisitessign'|translate}</td>
	<td><strong>{$statistics.nb_pag_per_vis_sig|string_format:"%.1f"}</strong></td>
</tr>
<tr>
	<td class="align">{'visites_tempsmoyen'|translate}</td>
	<td class="damier"><strong>{$statistics.time_per_vis|time_visit}</strong></td>
</tr>
<tr>
	<td class="damieralign">{'visites_tempsmoyenpv'|translate}</td>
	<td><strong>{$statistics.time_per_pag|time_visit}</strong></td>
</tr>
<tr>
	<td class="align">{'visites_tauxvisite'|translate}</td>
	<td class="damier"><strong>{$statistics.one_page_rate|string_format:"%.0f"}%</strong></td>
</tr>
{if $statistics.average_visits_per_day}
<tr>
	<td class="damieralign">{'visites_average_visits_per_day'|translate}</td>
	<td><strong>{$statistics.average_visits_per_day|string_format:"%d"}</strong></td>
</tr>
{/if}
</tbody>
</table>
</div>
