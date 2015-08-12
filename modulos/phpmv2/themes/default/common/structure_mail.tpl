<img alt="{'menu_visites'|translate}" src="cid:my-attach">

{counter print=false assign=a name=a start=0}

{assign var=mod value=rss}
{include file="common/statistics.tpl"}

<a href="{$url_phpmv}">{'rss_go'|translate}</a>
