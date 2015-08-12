{if $form_data.header.headertext}
	<h1>{$form_data.header.headertext}</h1>
{/if}
{if $form_data.errors}
	<div id="adminErrors">
	<strong>{'generique_errors'|translate}</strong>
	<ul>
	{foreach from=$form_data.errors item=data}
	<li>{$data}</li>
	{/foreach}
	</ul>	
	</div>
{/if}
{if $form_text}
<p>{$form_text}</p>
{/if}