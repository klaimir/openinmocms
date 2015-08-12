{if $id != 'continent'}
<a id="a{$a}"></a>
<h3>{$headline|translate}</h3>
{/if}
{if $data != "null"}
{if $text}{$text} <br /><br /> {/if}
{$data}
{else}
{$lang_no_visit|translate}
{/if}
