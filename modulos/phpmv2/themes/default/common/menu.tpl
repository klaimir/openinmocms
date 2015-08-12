<!-- menu -->
<ul id="menu">
{foreach from=$menu key=menuIndex item=info}
	<li>{if $page==$info.modname}<script type="text/javascript">var page_stat_name="{$info.lang|translate}";</script>{/if}
		<a href="{$url_mod}&amp;mod={$info.modname}">{$info.lang|translate}</a>
		<ul>
		{foreach from=$info.submenus key=itemIndex item=lang}
			<li>
				<a href="{$url_mod}&amp;mod={$info.modname}#a{$itemIndex + 1}">
				{$lang|translate|replace:" ":"&nbsp;"}
				</a>
			</li>
		{/foreach}
		{foreach from=$info.plugins key=pluginKey item=pluginRaw}
			<li>
				<a href="javascript:pmvUrlOpenModule('{$pluginKey}.{$pluginRaw.mod}')">
				{if $pluginRaw.langPath}{$pluginRaw.title|translate|replace:" ":"&nbsp;"}{else}{$pluginRaw.title|replace:" ":"&nbsp;"}{/if}</a>
				</a>
			</li>
		{/foreach}
		</ul>
	</li>
{/foreach}
</ul>
<!-- /menu -->