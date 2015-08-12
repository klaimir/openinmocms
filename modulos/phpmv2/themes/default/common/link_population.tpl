<p class="includexecludeall">
{if $info_sort.$id_sort.4 == "0.0"}
<a href="javascript:void(0);" onclick="javascript:changeDetails(this,'{$url_a_int_sort}&amp;a_{$id_sort}_sort={$info_sort.$id_sort.0}.{$i}.{$info_sort.$id_sort.7}');">{'generique_lowpop'|translate}</a>
{else}
<a href="javascript:void(0);" onclick="javascript:changeDetails(this,'{$url_a_int_sort}&amp;a_{$id_sort}_sort={$info_sort.$id_sort.0}.{$i}.0.0');">{'generique_allpop'|translate}</a>
{/if}
</p>