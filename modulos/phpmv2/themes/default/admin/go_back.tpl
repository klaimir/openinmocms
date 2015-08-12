{if $mod=='admin' && $action !=='modCur'}
<div class="boutonsAction">
<form enctype="multipart/form-data" name"go_back" method="post" action="./index.php?mod=admin_index&amp;site={$site_selected}&amp;adminsite={$site_selected}">
<input name="back" value=" {'admin_retour'|translate} " type="submit">
</form>
</div>
{/if}
