{if $offset>0 || $nb_elements > $offset + $data_limit}
<tr>
	<td colspan="6" class="nextpreview">
{/if}
		{if $offset>0}
			<a href="#" onclick="viewNextPreviousRowsDetails(this,'{$url_offset}&amp;offset={$offset-$data_limit}{if $continent_asked}&amp;id_details_continent={$continent_asked}{/if}');return(false);">
			&lt; {'generique_previous'|translate}
			</a>
		{/if}
		{if $offset > 0 && $nb_elements > $offset + $data_limit} | {/if}
		{if $nb_elements > $offset + $data_limit}
			<a href="#" onclick="viewNextPreviousRowsDetails(this,'{$url_offset}&amp;offset={$offset+$data_limit}{if $continent_asked}&amp;id_details_continent={$continent_asked}{/if}');return(false);">
			{'generique_next'|translate} &gt;
			</a>
		{/if}
{if $offset>0 || $nb_elements > $offset + $data_limit}
		</td>
	</tr>
{/if}