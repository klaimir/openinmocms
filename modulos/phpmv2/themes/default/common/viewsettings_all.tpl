{* Settings's menu *}
<h1>{'configurations_titre'|translate}</h1>

<!-- Settings -->
{counter name=a}
{pmv_data_array
	headline='configurations_configurations'
	data=$config
	template="common/display_data_array.tpl"
}

<!-- Os -->
{counter name=a}
{pmv_data_array
	headline="configurations_os"
	data=$os
	template="common/display_data_array.tpl"
}

<!-- Os interests -->
{counter name=i}
{pmv_data_array
	link="configurations_os_interest"
	data=$osinterest
	template="common/display_data_array_interest.tpl"
}
<div class="centrer">
<img class="detail" src="{$url_mod}&amp;mod=view_graph&amp;graph_type=3&amp;graph_data=settings_os" alt="" />
</div>
<!-- Browsers by type -->
{counter name=a}
{pmv_data_array
	headline='configurations_navigateursbytype'
	data=$browserstype
	template="common/display_data_array.tpl"
}
<div class="centrer">
<img class="detail" src="{$url_mod}&amp;mod=view_graph&amp;graph_type=3&amp;graph_data=settings_browsers_type" alt="" />
</div>
<!-- Browsers -->
{counter name=a}
{pmv_data_array
	headline="configurations_navigateurs"
	data=$browsers
	template="common/display_data_array.tpl"
}

<!-- Browsers interests -->
{counter name=i}
{pmv_data_array
	link="configurations_navigateurs_interest"
	data=$browsersinterest
	template="common/display_data_array_interest.tpl"
}
<div class="centrer">
<img class="detail" src="{$url_mod}&amp;mod=view_graph&amp;graph_type=3&amp;graph_data=settings_browsers" alt="" />
</div>
<!-- Plugins -->
{counter name=a}
{pmv_data_array
	headline='configurations_plugins'
	data=$plugins
	template="common/display_data_array.tpl"
}
<div class="centrer">
<img class="detail" src="{$url_mod}&amp;mod=view_graph&amp;graph_type=2&amp;graph_data=settings_plugins" alt="" />
</div>
<!-- Resolution -->
{counter name=a}
{pmv_data_array
	headline='configurations_resolutions'
	data=$resolutions
	template="common/display_data_array.tpl"
}

<!-- Resolution Interest -->
{counter name=i}
{pmv_data_array
	link="configurations_resolutions_interest"
	data=$resolutionsinterest
	template="common/display_data_array_interest.tpl"
}

<div class="centrer">
<img class="detail" src="{$url_mod}&amp;mod=view_graph&amp;graph_type=3&amp;graph_data=settings_resolutions" alt="" />
</div>
<!-- NormalWidescreen -->
{counter name=a}
{pmv_data_array
	headline='configurations_rapport'
	data=$normalwidescreen
	template="common/display_data_array.tpl"
}