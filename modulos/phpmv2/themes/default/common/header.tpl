<?xml version='1.0' encoding='{'charset'|translate}' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='{'lang_iso'|translate}'>
<head>
	<meta http-equiv="content-type" content="text/html; charset={'charset'|translate}" />
	<meta name="description" content="{'head_description'|translate}" />
	<meta name="keywords" content="{'head_keywords'|translate}" />
	<meta name="robots" content="all" />
	<meta name="revisit-after" content="7 day" />
	<meta name="author" content="phpMyVisites Team" />
	<meta http-equiv="reply-to" content="http://www.phpmyvisites.us/" />
	<meta name="copyright" content="phpMyVisites" />
	<meta name="version" content="{$PHPMV_VERSION}" />
	<title>{'head_titre'|translate}</title>
	<link href="{$PMV_THEME}css/styles.php?dir={'text_dir'|translate}{if $admin}&amp;admin={$admin}{/if}&amp;path={$PMV_THEME}" rel="stylesheet" type="text/css" />	
	<script type="text/javascript" src="{$PMV_THEME}include/menu.js"></script>
	<script type="text/javascript" src="{$PMV_THEME}include/misc.js"></script>
	<script type="text/javascript" src="{$PMV_THEME}include/miscPage.js"></script>
	<script type="text/javascript" src="{$PMV_THEME}include/pmvurl.js"></script>
	<link rel="alternate" type="application/rss+xml" title="{'admin_rss_feed'|translate}" href="./index.php?mod=view_rss&amp;rss_hash={$rss_hash}" />
	<link rel="alternate" type="application/rss+xml" title="{'admin_rss_feed_specific_site'|translate:$site_selected_name}" href="./index.php?mod=view_rss&amp;rss_hash={$rss_hash}&amp;site={$site_selected}" />
	<script type="text/javascript">
	var js_direction="{'text_dir'|translate}";
	var PMV_THEME = "{$PMV_THEME}";
	pmvUrlAddParameter ("lang", "{$lang_selected}");
	pmvUrlAddParameter ("mod", "{$page}");
	pmvUrlAddParameter ("site", "{$site_selected}");
	pmvUrlAddParameter ("adminsite", "{$site_selected}");
	pmvUrlAddParameter ("date", "{$date_ask}");
	pmvUrlAddParameter ("period", "{$period}");
	pmvUrlAddParameter ("action", "{$action}");
	</script>
</head>
<body>
{if $header_message}
<p class='archive'>{$header_message}</p>
{/if}
<!-- http://www.phpmyvisites.net/ -->	
{if $header_error_message}
	<h2>
	{$header_error_message}	
	{if $mod=="admin"} {'admin_db_log'|translate} {/if}
	</h2>
{/if}
{if  (!isset($showLogin)) || ($showLogin == "true")}
{include file="common/logged.tpl"}
{/if}
<div id="main">
