{if $data|count_words > 25}
<a class="moreinterrest" href="#" onclick="displayInterest(this);return(false);">
<span>+</span> {$link|translate}
</a>
<div class="center hiddendetails">
{$data}
</div>
{/if}