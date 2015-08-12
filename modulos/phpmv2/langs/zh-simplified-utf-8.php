<?php
/* 
 * phpMyVisites : website statistics and audience measurements
 * Copyright (C) 2002 - 2006
 * http://www.phpmyvisites.net/ 
 * phpMyVisites is free software (license GNU/GPL)
 * Authors : phpMyVisites team
*/

//
// Technical information
//
$lang['auteur_nom'] = "赖丹蓥(Dany Lai)"; // Translator's name
$lang['auteur_email'] = "ldy413@163.com"; // Translator's email
$lang['charset'] = "utf-8"; // language file charset (utf-8 by default)
$lang['text_dir'] = "ltr"; // ('ltr' for left to right, 'rtl' for right to left)
$lang['lang_iso'] = "zh"; // iso language code
$lang['lang_libelle_en'] = "Simplified Chinese"; // english language name
$lang['lang_libelle_fr'] = "Chinois simplifié"; // french language name
$lang['unites_bytes'] = array('Bytes', 'Kb', 'Mb', 'Gb', 'Tb', 'Pb', 'Eb', 'Zb', 'Yb');
$lang['separateur_milliers'] = ','; // three thousands spells 300,000 in english
$lang['separateur_decimaux'] = '.'; // Separator for the float part of a number

//
// HTML Markups
//
$lang['head_titre'] = "phpMyVisites | 用于统计分析网站访问量的开源软件"; // Pages header's title
$lang['head_keywords'] = "phpmyvisites, 简体中文版, php, script, application, 网站流量统计, 网站流量分析, 软件, 统计, 免费, 开源, gpl, 访问量, 访客, mysql, PV, 页面, 查看, 访客数, 图表, 浏览器, 操作系统, 天, 星期, 月, 记录, 国家, 主机, 服务提供, 搜索引擎, 关键字, 进入页, 退出页 referrers, referals, stat, pie charts, resolutions"; // Header keywords
$lang['head_description'] = "phpMyVisites | 基于PHP/MySQL技术开发，采用Gnu GPL.方式发布的关于网站访问量统计的开源软件"; // Header description
$lang['logo_description'] = "phpMyVisites 免费的网站统计、流量分析软件"; // This is the JS code description. Has to be short.

//
// Main menu & submenu
//
$lang['menu_visites'] = "访问统计";
$lang['menu_pagesvues'] = "页面浏览";
$lang['menu_suivi'] = "访问轨迹";
$lang['menu_provenance'] = "访问来源";
$lang['menu_configurations'] = "客户端分析";
$lang['menu_affluents'] = "参考资料";
$lang['menu_listesites'] = "显示站点";
$lang['menu_bilansites'] = "统计摘要";
$lang['menu_jour'] = "日统计";
$lang['menu_semaine'] = "周统计";
$lang['menu_mois'] = "月统计";
$lang['menu_annee'] = "年统计";
$lang['menu_periode'] = "统计周期: %s"; // Text formated (e.g.: Studied period: Thuesday, september the 11th)
$lang['liens_siteofficiel'] = "官方网站";
$lang['liens_admin'] = "系统管理";
$lang['liens_contacts'] = "联系方式";

//
// Divers
//
$lang['generique_nombre'] = "数字";
$lang['generique_tauxsortie'] = "退出速度";
$lang['generique_ok'] = "正确";
$lang['generique_timefooter'] = "页面生成时间 %s 秒"; // Time in seconds
$lang['generique_divers'] = "其它"; // (for the graphs)
$lang['generique_inconnu'] = "未知"; // (for the graphs)
$lang['generique_vous'] = "是您吗？";
$lang['generique_traducteur'] = "翻译者";
$lang['generique_langue'] = "语言选择";
$lang['generique_autrelangure'] = "其它语言?"; // Other language, translations wanted
$lang['aucunvisiteur_titre'] = "该时段没有访客"; 
$lang['generique_aucune_visite_bdd'] = "<b>警告 ! </b> 数据库中没有目前站点的数据. 请确认您已将javascript代码放进您的网站中,包括正确的phpMyVisites url <u>所在</u> 的Javascript代码. 请查看官方文档。";
$lang['generique_aucune_site_bdd'] = "数据库中没有站点资料! 请以管理员身份登陆并添加新站点。";
$lang['generique_retourhaut'] = "回到顶部";
$lang['generique_tempsvisite'] = "%s分 %s秒"; // 3min 25s means 3 minutes and 25 seconds
$lang['generique_tempsheure'] = "%s小时"; // 4h means 4 hours
$lang['generique_siteno'] = "站点 %s"; // Site "phpmyvisites"
$lang['generique_newsletterno'] = "最新资讯 %s"; // Newsletter "version 2 announcement"
$lang['generique_partnerno'] = "友站 %s"; // Partner "version 2 announcement"
$lang['generique_general'] = "常规";
$lang['generique_user'] = "用户 %s"; // User "Admin"
$lang['generique_previous'] = "上一页";
$lang['generique_next'] = "下一页";
$lang['generique_lowpop'] = "排除较少人数的统计资料";
$lang['generique_allpop'] = "包括所有人数的统计资料";
$lang['generique_to'] = "至"; // 4 'to' 8
$lang['generique_total_on'] = "on"; // 4 to 8 'on' 10
$lang['generique_total'] = "汇总";
$lang['generique_information'] = "资讯";
$lang['generique_done'] = "完成!";
$lang['generique_other'] = "其他";
$lang['generique_description'] = "描述:";
$lang['generique_name'] = "名称:";
$lang['generique_variables'] = "变数";
$lang['generique_logout'] = "退出";
$lang['generique_login'] = "登录";
$lang['generique_hits'] = "点击";
$lang['generique_errors'] = "错误";
$lang['generique_site'] = "站点";
$lang['generique_help_novisits'] = "提示: 您是否 %s 安装追踪器(javascript代码) %s 在页面中？";

//
// Authentication
//
$lang['login_password'] = "密码: "; // lowercase
$lang['login_login'] = "帐号: "; // lowercase
$lang['login_error'] = "无法登陆，错误的登陆帐号或密码！";
$lang['login_error_nopermission'] = "该用户没有任何权限，请联系管理员来分配权限。";
$lang['login_protected'] = "您正尝试进入 %sphpMyVisites%s 的一个受保护区域。";

//
// Contacts & "Others ?"
//
$lang['contacts_titre'] = "联系人";
$lang['contacts_langue'] = "中文翻译";
$lang['contacts_merci'] = "特别鸣谢";
$lang['contacts_auteur'] = "作者、文档、以及 phpMyVisites 项目发起人为 <strong>Matthieu Aubry</strong> 先生。";
$lang['contacts_questions'] = "关于 <strong>技术问题、程序缺陷、各类建议</strong> 请访问官方论坛 %s ；如有其它问题，请使用官方网站提供的平台与作者联系。"; // adresse du site
$lang['contacts_trad1'] = "您想将 phpMyVisites 翻译成您的语言，请不要犹豫！<strong>phpMyVisites 需要您！</strong>";
$lang['contacts_trad2'] = "翻译 phpMyVisites 将会花费一些时间(几个小时),需要有好的语言基础; 但请记住 <strong>我们所做的工作将是许多人受益</strong>。  如果你对翻译 phpMyVisites 有兴趣，你能够在官方文档 %s 找到所有需要的信息%s."; // lien vers la doc
$lang['contacts_doc'] = "请参考 %s phpMyVisites 官方文档 %s，它将提供给你大量关于安装，配置，以及能让您了解 phpMyVisites 的信息. "; // lien vers la doc
$lang['contacts_thanks_dev'] = "感谢你们 <strong>%s</strong>, phpMyVisites的核心开发者们, 该项目就是你们的优质工作成果！";
$lang['contacts_merci3'] = "在感激页面上，还有许许多多参与过 phpMyVisites 工作的朋友。";
$lang['contacts_merci2'] = "非常感谢所有参与翻译 phpMyVisites 的朋友:";

//
// Rss & Mails
//
$lang['rss_titre'] = "站点 %s 于 %s"; // Site MyHomePage on Sunday 29 
$lang['rss_go'] = "查看统计详情";
$lang['mail_sender_name'] = "网站统计资料(自动生成)";

//
// Visits Part
//
$lang['visites_titre'] = "访客统计资料"; 
$lang['visites_statistiques'] = "统计报告";
$lang['visites_periodesel'] = "给定时间段";
$lang['visites_visites'] = "访问次数";
$lang['visites_uniques'] = "独立访客";
$lang['visites_pagesvues'] = "浏览页面总数";
$lang['visites_pagesvisiteurs'] = "人均访问页面数"; 
$lang['visites_pagesvisites'] = "每次平均访问页面数"; 
$lang['visites_pagesvisitessign'] = "平均有效访问页面数"; 
$lang['visites_tempsmoyen'] = "平均访问停留时间";
$lang['visites_tempsmoyenpv'] = "平均每个页面访问时间";
$lang['visites_tauxvisite'] = "单页面访问率"; 
$lang['visites_average_visits_per_day'] = "日均访问率"; 
$lang['visites_recapperiode'] = "时间段汇总";
$lang['visites_nbvisites'] = "访问次数";
$lang['visites_aucunevivisite'] = "未访问"; // in the table, must be short
$lang['visites_recap'] = "统计概况";
$lang['visites_unepage'] = "一页"; // (graph)
$lang['visites_pages'] = "%s 页"; // 1-2 pages (graph)
$lang['visites_min'] = "%s 分钟"; // 10-15 min (graph)
$lang['visites_sec'] = "%s 秒"; // 0-30 s (seconds, graph)
$lang['visites_grapghrecap'] = "统计概况图表";
$lang['visites_grapghrecaplongterm'] = "长期统计概况";
$lang['visites_graphtempsvisites'] = "时段访问量";
$lang['visites_graphtempsvisitesimg'] = "某时段内访问量";
$lang['visites_graphheureserveur'] = "每小时访问量"; 
$lang['visites_graphheureserveurimg'] = "按服务器时间"; 
$lang['visites_graphheurevisiteur'] = "每小时访问量";
$lang['visites_graphheurelocalimg'] = "当地时间访问量"; 
$lang['visites_longterm_statd'] = "每日走势";
$lang['visites_longterm_statm'] = "每月走势";

//
// Sites Summary
//
$lang['summary_title'] = "网站统计概况";
$lang['summary_stitle'] = "统计概况";

//
// Frequency Part
//
$lang['frequence_titre'] = "回访频率";
$lang['frequence_nouveauxconnusgraph'] = "新旧访客对比";
$lang['frequence_nouveauxconnus'] = "新旧访客对比";
$lang['frequence_titremenu'] = "回访频率";
$lang['frequence_visitesconnues'] = "回访次数";
$lang['frequence_nouvellesvisites'] = "新访次数";
$lang['frequence_visiteursconnus'] = "回访";
$lang['frequence_nouveauxvisiteurs'] = "新访";
$lang['frequence_returningrate'] = "回访率";
$lang['pagesvues_vispervisgraph'] = "人均访问次数";
$lang['frequence_vispervis'] = "人均访问次数";
$lang['frequence_vis'] = "次";
$lang['frequence_visit'] = "1 次"; // (graph)
$lang['frequence_visits'] = "%s 次"; // (graph)

//
// Seen Pages
//
$lang['pagesvues_titre'] = "页面浏览信息";
$lang['pagesvues_joursel'] = "指定日期";
$lang['pagesvues_jmoins7'] = "指定日一周内";
$lang['pagesvues_jmoins14'] = "指定日两周内";
$lang['pagesvues_moyenne'] = "(平均)";
$lang['pagesvues_pagesvues'] = "页面浏览";
$lang['pagesvues_pagesvudiff'] = "单页浏览";
$lang['pagesvues_recordpages'] = "访问最多访问的页";
$lang['pagesvues_tabdetails'] = "浏览页 (从 %s 到 %s)"; // (de 1   21)
$lang['pagesvues_graphsnbpages'] = "图示每页访问量";
$lang['pagesvues_graphnbvisitespageimg'] = "每页访问量";
$lang['pagesvues_graphheureserveur'] = "服务器时间内的访问量图表";
$lang['pagesvues_graphheureserveurimg'] = "服务器时间内的访问量";
$lang['pagesvues_graphheurevisiteur'] = "当地时间的访问量图表";
$lang['pagesvues_graphpageslocalimg'] = "当地时间的访问量";
$lang['pagesvues_tempsparpage'] = "页面浏览时间";
$lang['pagesvues_total_time'] = "总时间";
$lang['pagesvues_avg_time'] = "平均时间";
$lang['pagesvues_help_pagename'] = "您可以给页面起一个友善的名称。";
$lang['pagesvues_help_track_dls'] = "您可以追踪下载次数或其他url的导向。";

//
// Follows-Up
//
$lang['suivi_titre'] = "访客动作";
$lang['suivi_pageentree'] = "入口页";
$lang['suivi_pagesortie'] = "跳出页";
$lang['suivi_tauxsortie'] = "跳出率";
$lang['suivi_pageentreehits'] = "入口页访问次数";
$lang['suivi_pagesortiehits'] = "跳出页访问次数";
$lang['suivi_singlepage'] = "仅单页访问次数";

//
// Origin
//
$lang['provenance_titre'] = "访客来源";
$lang['provenance_recappays'] = "访客来源国家摘要";
$lang['provenance_pays'] = "国家";
$lang['provenance_paysimg'] = "访客来源国家图表";
$lang['provenance_fai'] = "Internet服务商";
$lang['provenance_nbpays'] = "不同国家的数量 : %s";
$lang['provenance_provider'] = "服务商"; // same as $lang['provenance_fai'], but not if $lang['provenance_fai'] is too long
$lang['provenance_continent'] = "大陆";
$lang['provenance_mappemonde'] = "世界地图";
$lang['provenance_interetspays'] = "客源国家分析";

//
// Setup
//
$lang['configurations_titre'] = "客户端设置";
$lang['configurations_os'] = "操作系统";
$lang['configurations_osimg'] = "操作系统图表";
$lang['configurations_navigateurs'] = "浏览器";
$lang['configurations_navigateursimg'] = "浏览器图表";
$lang['configurations_resolutions'] = "屏幕分辨率";
$lang['configurations_resolutionsimg'] = "屏幕分辨率图表";
$lang['configurations_couleurs'] = "屏幕颜色";
$lang['configurations_couleursimg'] = "屏幕颜色图表";
$lang['configurations_rapport'] = "普通 / 宽屏";
$lang['configurations_large'] = "宽屏";
$lang['configurations_normal'] = "普通";
$lang['configurations_double'] = "双屏";
$lang['configurations_plugins'] = "插件"; // TODO : translate
$lang['configurations_navigateursbytype'] = "浏览器(按类型)"; // TODO : translate
$lang['configurations_navigateursbytypeimg'] = "浏览器类型图表"; // TODO : translate
$lang['configurations_os_interest'] = "操作系统偏好";
$lang['configurations_navigateurs_interest'] = "浏览器偏好";
$lang['configurations_resolutions_interest'] = "分辨率偏好";
$lang['configurations_couleurs_interest'] = "色深偏好";
$lang['configurations_configurations'] = "最高设置";

//
// Referers
//
$lang['affluents_titre'] = "查阅";
$lang['affluents_recapimg'] = "图示到访情况";
$lang['affluents_directimg'] = "直接";
$lang['affluents_sitesimg'] = "站点";
$lang['affluents_moteursimg'] = "搜索引擎";
$lang['affluents_referrersimg'] = "查阅";
$lang['affluents_moteurs'] = "搜索引擎";
$lang['affluents_nbparmoteur'] = "通过搜索引擎得到的访问量 : %s";
$lang['affluents_aucunmoteur'] = "搜索引擎没有提供访问量.";
$lang['affluents_motscles'] = "关键字";
$lang['affluents_nbmotscles'] = "独特的关键字 : %s";
$lang['affluents_aucunmotscles'] = "没有找到关键字.";
$lang['affluents_sitesinternet'] = "其他站点";
$lang['affluents_nbautressites'] = "其它站点提供的访问量 : %s";
$lang['affluents_nbautressitesdiff'] = "不同站点的数量 : %s";
$lang['affluents_aucunautresite'] = "站点没有提供访问量.";
$lang['affluents_entreedirecte'] = "直接输入网址";
$lang['affluents_nbentreedirecte'] = "直接请求量 : %s";
$lang['affluents_nbpartenaires'] = "推介网站提供的访问 : %s";
$lang['affluents_aucunpartenaire'] = "没有来自推介网站提供的访问。";
$lang['affluents_nbnewsletters'] = "最新快讯提供的访问 : %s";
$lang['affluents_aucunnewsletter'] = "没有来自最新快讯提供的访问。";
$lang['affluents_details'] = "详细情况"; // In the results of the referers array
$lang['affluents_interetsmoteurs'] = "搜索引擎偏好";
$lang['affluents_interetsmotscles'] = "关键字偏好";
$lang['affluents_interetssitesinternet'] = "其他网站偏好";
$lang['affluents_partenairesimg'] = "推介网站";
$lang['affluents_partenaires'] = "推介网站";
$lang['affluents_interetspartenaires'] = "推介网站偏好";
$lang['affluents_newslettersimg'] = "最新快讯";
$lang['affluents_newsletters'] = "最新快讯";
$lang['affluents_interetsnewsletters'] = "最新快讯偏好";
$lang['affluents_type'] = "类型参照";
$lang['affluents_interetstype'] = "访问类型偏好";

//
// Summary
//
$lang['purge_titre'] = "汇总访问量和参考量";
$lang['purge_intro'] = "除了重要的统计量被保存外，其它时间段的资料已被移走.";
$lang['admin_purge'] = "数据库维护";
$lang['admin_purgeintro'] = "这个部分用来管理phpMyVisites所使用的数据表. 你能看到表所占用的磁盘空间,你可以优化，删除它们,或者移走老的纪录. 这将有利于你限制在数据库中表的大小.";
$lang['admin_optimisation'] = "优化 [ %s ]..."; // Tables names
$lang['admin_postopt'] = "总共空间大小减少至 %chiffres% %unites%"; // 28 Kb
$lang['admin_purgeres'] = "移走以下时间段: %s";
$lang['admin_purge_fini'] = "删除数据表成功...";
$lang['admin_bdd_nom'] = "名字";
$lang['admin_bdd_enregistrements'] = "纪录";
$lang['admin_bdd_taille'] = "表大小";
$lang['admin_bdd_opt'] = "优化";
$lang['admin_bdd_purge'] = "清出条件";
$lang['admin_bdd_optall'] = "全部优化";
$lang['admin_purge_j'] = "删除 %s 天前的纪录";
$lang['admin_purge_s'] = "删除 %s 周前的纪录";
$lang['admin_purge_m'] = "删除 %s 月前的纪录";
$lang['admin_purge_y'] = "删除 %s 年前的记录";
$lang['admin_purge_logs'] = "删除所有的日志";
$lang['admin_purge_autres'] = "对表 '%s'内容进行清理";
$lang['admin_purge_none'] = "无可能的动作";
$lang['admin_purge_cal'] = "计算清理中 (需要花费几分钟的时间)";
$lang['admin_alias_title'] = "站点别名和其他url";
$lang['admin_partner_title'] = "推介网站";
$lang['admin_newsletter_title'] = "站点公告";
$lang['admin_ip_exclude_title'] = "排除统计的IP地址范围";
$lang['admin_name'] = "名称:";
$lang['admin_error_ip'] = "IP地址格式错误: %s";
$lang['admin_site_name'] = "站点名称：";
$lang['admin_site_url'] = "站点url （必须以http://开头）：";
$lang['admin_db_log'] = "尝试以系统管理员的身份进入修改数据库配置";
$lang['admin_error_critical'] = "错误，请修复使之能正常运行";
$lang['admin_warning'] = "警告, phpMyVisites正常运行，但部分功能可能无法正确使用";
$lang['admin_move_group'] = "转移到群组:";
$lang['admin_move_select'] = "选择群组";
$lang['admin_site_select'] = "进行管理的站点";

//
// Setup
//
$lang['admin_intro'] = "欢迎来到phpMyVisites配置区. 你能够修改相关你安装的信息. 如果你有任何问题请参考 %s 官方文档资料 %s."; // link to the doc
$lang['admin_configetperso'] = "通用设定";
$lang['admin_afficherjavascript'] = "显示JavaScript统计代码";
$lang['admin_cookieadmin'] = "不统计管理者访问信息";
$lang['admin_ip_ranges'] = "例外的IP或IP范围";
$lang['admin_sitesenregistres'] = "被纪录的站点:";
$lang['admin_retour'] = "后退";
$lang['admin_cookienavigateur'] = "你可以将管理者排除在统计量外. 需要cookies支持，而且这个选项只针对当前的浏览器有用，不过你可以随时修改这个选项.";
$lang['admin_prendreencompteadmin'] = "将管理者信息统计在内(删除 cookie)";
$lang['admin_nepasprendreencompteadmin'] = "不将管理者信息统计在内 (创建一个cookie)";
$lang['admin_etatcookieoui'] = "这个站点管理者信息统计在内(这是缺省设置, 被认为是一个普通的访问者)";
$lang['admin_etatcookienon'] = "你未被这个站点统计在内(你的访问量不被这个站点所统计)";
$lang['admin_deleteconfirm'] = "请确认删除 %s?";
$lang['admin_sitedeletemessage'] = "请<u>慎重</u>: 所有相关资料将被删除<br>并且不可恢复。";
$lang['admin_confirmyes'] = "是的,我要删除";
$lang['admin_confirmno'] = "不,暂时不删除";
$lang['admin_nonewsletter'] = "该网站没有公告！";
$lang['admin_nopartner'] = "该站点没有合作伙伴！";
$lang['admin_get_question'] = "记录变量？ (url变量)";
$lang['admin_get_a1'] = "记录所有url变量";
$lang['admin_get_a2'] = "不记录url变量";
$lang['admin_get_a3'] = "记录指定变量";
$lang['admin_get_a4'] = "记录除指定外变量";
$lang['admin_get_default_pdf'] = "PDF报告:";
$lang['admin_get_default_pdfdefault'] = "默认PDF报告"; 
$lang['admin_get_default_theme'] = "用户可视界面:";
$lang['admin_get_list'] = "变量名 (<b>;</b> 独立列表) <br/>例如 : %s";
$lang['admin_required'] = "需要%s";
$lang['admin_title_required'] = "需求";
$lang['admin_write_dir'] = "目录可写";
$lang['admin_chmod_howto'] = "这些目录必须设置为可写。使用FTP软件将其权限设置为777 (右键单击目录 -> 权限 (或 chmod))";
$lang['admin_optional'] = "选项";
$lang['admin_memory_limit'] = "内存限制";
$lang['admin_allowed'] = "允许";
$lang['admin_webserver'] = "网页服务器";
$lang['admin_server_os'] = "服务器操作系统";
$lang['admin_server_time'] = "服务器时间";
$lang['admin_legend'] = "图例:";
$lang['admin_error_url'] = "url 格式应为 : %s (末端无须斜杠)";
$lang['admin_url_n'] = "url %s:";
$lang['admin_url_aliases'] = "urls 别名";
$lang['admin_logo_question'] = "显示logo?";
$lang['admin_type_again'] = "确认密码：";
$lang['admin_admin_mail'] = "超级管理员Email";
$lang['admin_admin'] = "超级管理员";
$lang['admin_phpmv_path'] = "程序的完整访问路径";
$lang['admin_valid_email'] = "Email不正确";
$lang['admin_valid_pass'] = "密码过于简单(不少于6字符,必须包含数字)";
$lang['admin_match_pass'] = "两次输入的密码不相同！";
$lang['admin_no_user_group'] = "该站点的用户组中没有用户";
$lang['admin_recorded_nl'] = "已记录公告:";
$lang['admin_recorded_partners'] = "已记录伙伴:";
$lang['admin_recorded_users'] = "已记录用户:";
$lang['admin_select_site_title'] = "请选择一个站点";
$lang['admin_select_user_title'] = "请选择一个用户";
$lang['admin_no_user_registered'] = "没有注册用户!";
$lang['admin_configuration'] = "配置";
$lang['admin_general_conf'] = "常规配置";
$lang['admin_group_title'] = "组管理员(权限)";
$lang['admin_user_title'] = "用户管理";
$lang['admin_user_add'] = "添加用户";
$lang['admin_user_mod'] = "修改用户";
$lang['admin_user_del'] = "删除用户";
$lang['admin_user_oldPwd'] = "原密码"; 
$lang['admin_user_oldPwd_bad'] = "原密码错误"; 
$lang['admin_server_info'] = "服务器信息";
$lang['admin_send_mail'] = "用email发送统计表";
$lang['admin_rss_feed'] = "用RSS方式阅读";
$lang['admin_rss_feed_specific_site'] = "站点 '%s' 统计表 - RSS"; // site 2
$lang['admin_site_admin'] = "站点管理员";
$lang['admin_site_add'] = "添加站点";
$lang['admin_site_mod'] = "修改站点";
$lang['admin_site_del'] = "删除站点";
$lang['admin_nl_add'] = "添加公告";
$lang['admin_nl_mod'] = "修改公告";
$lang['admin_nl_del'] = "删除公告";
$lang['admin_partner_add'] = "添加伙伴";
$lang['admin_partner_mod'] = "修改伙伴名称和url";
$lang['admin_partner_del'] = "删除伙伴";
$lang['admin_url_alias'] = "url别名管理";
$lang['admin_group_admin_n'] = "查看统计表 + 管理权限";
$lang['admin_group_admin_d'] = "该组用户可见并可编辑站点信息(名称, 添加cookie, 屏蔽IP范围, 管理url 别名/伙伴/公告等等)";
$lang['admin_group_view_n'] = "查看统计信息";
$lang['admin_group_view_d'] = "该组用户只能够查看统计信息，无任何管理权限";
$lang['admin_group_noperm_n'] = "禁止访问";
$lang['admin_group_noperm_d'] = "该组用户没有任何查看或更改信息的权限";
$lang['admin_group_stitle'] = "You can edit user's groups by selecting the users you want to change, and then select a group in which you want to move the selected users.";
$lang['admin_url_generate_download_link_example'] = "下载文件或url地址";
$lang['admin_url_generate_title'] = "文件下载 / url重定向 : url生成器";
$lang['admin_url_generate_intro'] = "phpMyVisites可用于统计文件下载次数，或追踪外部地址，统计结果将在“页面浏览”项中显示。</p><p class='texte'>您需要指定一个url给phpmyvisites，它将帮助您重定向到该指定的url。请您在下列表格中输入指定的url，然后按“Generate url”按钮，程序将自动生成新的链接。";
$lang['admin_url_generate_site_selection'] = "选择使用该统计功能的站点：";
$lang['admin_url_generate_tag_selection'] = "选择您所需要的统计类型标签"; 
$lang['admin_url_generate_enter_url'] = "输入文件完整路径或使用统计的外部链接：";
$lang['admin_url_generate_help_enter_url'] = "注意：路径格式 '<b>http://www.yoursite.com/file/brilliant-software.zip</b>' 或重定向路径 '<b>http://www.the-site-to-redirect.com</b>'";
$lang['admin_url_generate_friendly_name'] = "文件或路径的自定义名称(在“页面浏览”中显示)："; 
$lang['admin_url_generate_help_friendly_name'] = "提示：您可以在“页面浏览”中给'文件/url重定向'指定一个分类的显示名称，用'<b>/</b>'符号给予分类。<br>例如，命名'<b>my photos download/Summer in France</b>' 或者 '<b>Partners/PHP.net website</b>' : 这两个统计信息将分别存放在'<b>my photos downloads</b>'和'<b>Partners</b>'两个文件夹中 : 这两个文件夹将在“页面浏览”中显示";
$lang['admin_url_generate_result_url'] = "url链接";
$lang['admin_url_generate_html_result'] = "HTML链接代码";
$lang['admin_url_generate_html_onclick'] = "HTML中的onclick事件";
$lang['admin_url_generate_image_legend'] = "“页面浏览”中重定向和下载追踪的示例";
$lang['admin_site_link_javascript'] = "%s 请将追踪代码（Javascript代码）复制并粘贴到网页页面中，点击显示Javascript代码。 %s";
$lang['admin_last_version'] = "您的phpMyVisites是否最新版本？（推荐！）";
$lang['admin_general_config_firstday'] = "每周开始时间";
$lang['admin_default_language'] = "默认语言? <br/>也作为Email的默认语言";
$lang['admin_back_statisitics'] = "回到统计页面"; 

//
// Pdf export
//
$lang['pdf_generate_link'] = "将网站'%s'的统计信息生成PDF文件（暂不支持中文PDF，请先改为英文界面）";
$lang['pdf_summary_generate_link'] = "将统计概况生成PDF文件（暂不支持中文PDF，请先改为英文界面）";
$lang['pdf_free_page'] = "自定义页面";
$lang['pdf_free_chapter'] = "自定义文字";
$lang['pdf_page_break'] = "分页符";
$lang['pdf_page_summary'] = "摘要";
$lang['generique_pdfno'] = "PDF %s"; // Newsletter "version 2 announcement" 
$lang['admin_pdf_title'] = "网站PDF"; 
$lang['admin_nopdf'] = "找不到该网站的PDF文件！";
$lang['admin_recorded_pdf'] = "PDF记录文件:";
$lang['admin_pdf_add'] = "添加PDF"; 
$lang['admin_pdf_mod'] = "修改PDF"; 
$lang['admin_pdf_del'] = "删除PDF"; 
$lang['generique_pdf'] = "PDF";
$lang['pdf_lib_show_interest'] = "Interest array is displayed";
$lang['pdf_lib_hide_interest'] = "Interest array is hidden";
$lang['pdf_lib_show_all'] = "Details are displayed"; 
$lang['pdf_lib_hide_all'] = "Data are limited in size";
$lang['pdf_lib_edit_text'] = "编辑文字"; 
$lang['pdf_lib_need_at_least_one_page'] = "需要建立新的页面（主分类）"; 
$lang['pdf_lib_can_not_add_chapter'] = "Can't set an element before a page is created.";
$lang['pdf_lib_pdf_name_mandatory'] = "请输入文件名"; 
$lang['pdf_lib_pdf_expand_all'] = "全部展开"; 
$lang['pdf_lib_pdf_collapse_all'] = "全部收起";
$lang['pdf_create_from_interface'] = "创建自定义报告";
$lang['pdf_complete'] = "PDF完整报告"; 

//
// Installation Step
//
$lang['install_loginmysql'] = "数据库帐号：";
$lang['install_mdpmysql'] = "数据库密码：";
$lang['install_serveurmysql'] = "数据服务器：";
$lang['install_basemysql'] = "数据库名称：";
$lang['install_prefixetable'] = "数据表前缀：";
$lang['install_utilisateursavances'] = "高级选项(可选)";
$lang['install_oui'] = "是";
$lang['install_non'] = "否";
$lang['install_ok'] = "OK";
$lang['install_probleme'] = "问题: ";
$lang['install_DirectoriesWriteError'] = "<b>系统错误！</b><br/>无法写入文件夹%s，请确定服务器是否有写权限（尝试使用FTP软件将文件夹属性改为755 : 右键点击文件夹 -> 权限（或CHMOD）。<br/><br/>如果CHMOD属性无法通过FTP软件设置，尝试将文件夹删除，然后重新建立。";
$lang['install_loginadmin'] = "超级管理员帐号:";
$lang['install_mdpadmin'] = "超级管理员密码:";
$lang['install_chemincomplet'] = "phpMyVisites应用程序完成的路径(如http://www.mysite.com/rep1/rep3/phpmyvisites/). 路径必须以<strong>/</strong>结尾.";
$lang['install_afficherlogo'] = "需要在您的页面上显示logo吗? %s <br />如果在您的网站上显示logo，将使更多的用户知道phpMyVisites，并将令它更快的发展，以感谢所有参与开发这款开源（免费）软件的作者们。"; // %s replaced by the logo image
$lang['install_affichergraphique'] = "显示统计图片.";
$lang['install_valider'] = "提交"; //  during installation and for login
$lang['install_popup_logo'] = "请选择一个logo"; // TODO : translate
$lang['install_logodispo'] = "更多可选择的logo"; // TODO : translate
$lang['install_welcome'] = "欢迎使用安装向导";
$lang['install_system_requirements'] = "系统环境";
$lang['install_database_setup'] = "数据库设置";
$lang['install_create_tables'] = "建立数据表";
$lang['install_general_setup'] = "管理配置";
$lang['install_create_config_file'] = "建立配置文件";
$lang['install_first_website_setup'] = "加入首个统计网站";
$lang['install_display_javascript_code'] = "显示javascript调用代码";
$lang['install_finish'] = "完成安装";
$lang['install_txt2'] = "安装完毕后,为了让我们能够更好的跟踪人们使用 phpMyVisites 情况，我们将给官方站点回馈一些信息，谢谢您的理解.";
$lang['install_database_setup_txt'] = "请输入数据库设置";
$lang['install_general_config_text'] = "phpMyVisites 仅提供一个拥有全部权限的超级管理员，请输入该管理员的用户名及密码，此后您可以添加其他不同权限的用户。";
$lang['install_config_file'] = "管理员信息输入成功";
$lang['install_js_code_text'] = "<p>要实现网站统计, 您需要将javascript代码插入到要统计的页面中。 </p><p>您的网站不一定要使用PHP语言编写, <strong>phpMyVisites 适用于所有的网页语言 (包括 HTML, ASP, Perl 等语言)。</strong></p><p>一下是您需要插入页面的代码：(复制并粘贴在您的页面中)。</p>";
$lang['install_intro'] = "欢迎进入 phpMyVisites 安装向导。"; 
$lang['install_intro2'] = "本安装过程分为 %s 个简单的步骤，大概需要10分钟。";
$lang['install_next_step'] = "下一步";
$lang['install_status'] = "安装情况";
$lang['install_done'] = "完成度 %s%% "; // Install 25% complete
$lang['install_site_success'] = "成功建立站点!";
$lang['install_site_info'] = "请输入新站点的完整信息";
$lang['install_go_phpmv'] = "进入 phpMyVisites!";
$lang['install_congratulation'] = "恭喜! 您的 phpMyVisites 已经成功安装";
$lang['install_end_text'] = "请确认您的页面中已经放置javascript代码, 并等待第一位访客!";
$lang['install_db_ok'] = "数据库连接成功!";
$lang['install_table_exist'] = "数据库中存在 phpMyVisites 数据表";
$lang['install_table_choice'] = "选择使用现有数据表或使用纯净安装擦除数据库中的数据";
$lang['install_table_erase'] = "删除所有数据表(慎重操作!)";
$lang['install_table_reuse'] = "使用现有数据表";
$lang['install_table_success'] = "建立表单成功!";
$lang['install_send_mail'] = "每日接收各站点统计Email？";

//
// Update Step
//
$lang['update_title'] = "升级phpMyVisites";
$lang['update_subtitle'] = "检测到您正在升级phpMyVisites.";
$lang['update_versions'] = "您的上一个版本是 %s 并将升级到 %s.";
$lang['update_db_updated'] = "数据库成功升级!";
$lang['update_continue'] = "继续phpMyVisites";
$lang['update_jschange'] = "警告! <br /> phpMyVisites javascript代码已经更新. 您必须更新您的站点的统计代码。 <br /> 我们对升级所带来的不便深表歉意. 我们将带您到相关页面"; // TODO : translate

//
// Dates
//

/*
%daylong% // Monday
%dayshort% // Mon
%daynumeric% // 27
%monthlong% // Febuary
%monthshort% // Feb
%monthnumeric% // 02
%yearlong% // 2004
%yearshort% // 04
*/

// Monday February 10 2004
$lang['tdate1'] = "%daylong% %monthlong% %daynumeric% %yearlong%";

// Monday 10
$lang['tdate2'] = "%daylong% %daynumeric%";

// Week February 10 To February 17 2004
$lang['tdate3'] = "Week %monthlong% %daynumeric% To %monthlong2% %daynumeric2% %yearlong%";

// February 2004 Month
$lang['tdate4'] = "%monthlong% %yearlong% Month";

// December 2003
$lang['tdate5'] = "%monthlong% %yearlong%";

// 10 Febuary week
$lang['tdate6'] = "%daynumeric% %monthlong% week";

// 10-02-2003 // February 2 2003
$lang['tdate7'] = "%daynumeric%-%monthnumeric%-%yearlong%";

// Mon 10 (Only for Graphs purpose)
$lang['tdate8'] = "%dayshort% %daynumeric%";

// Week 10 Feb (Only for Graphs purpose)
$lang['tdate9'] = " Week %daynumeric% %monthshort%";

// Dec 04 (Only for Graphs purpose)
$lang['tdate10'] = "%monthshort% %yearshort%";

// Year 2004
$lang['tdate11'] = "Year %yearlong%";

// 2004
$lang['tdate12'] = "%yearlong%";

// 31
$lang['tdate13'] = "%daynumeric%";

// Months
$lang['moistab']['01'] = "一月";
$lang['moistab']['02'] = "二月";
$lang['moistab']['03'] = "三月";
$lang['moistab']['04'] = "四月";
$lang['moistab']['05'] = "五月";
$lang['moistab']['06'] = "六月";
$lang['moistab']['07'] = "七月";
$lang['moistab']['08'] = "八月";
$lang['moistab']['09'] = "九月";
$lang['moistab']['10'] = "十月";
$lang['moistab']['11'] = "十一月";
$lang['moistab']['12'] = "十二月";

// Months (Graph purpose, 4 chars max)
$lang['moistab_graph']['01'] = "一月";
$lang['moistab_graph']['02'] = "二月";
$lang['moistab_graph']['03'] = "三月";
$lang['moistab_graph']['04'] = "四月";
$lang['moistab_graph']['05'] = "五月";
$lang['moistab_graph']['06'] = "六月";
$lang['moistab_graph']['07'] = "七月";
$lang['moistab_graph']['08'] = "八月";
$lang['moistab_graph']['09'] = "九月";
$lang['moistab_graph']['10'] = "十月";
$lang['moistab_graph']['11'] = "十一月";
$lang['moistab_graph']['12'] = "十二月";

// Day of the week
$lang['jsemaine']['Mon'] = "星期一";
$lang['jsemaine']['Tue'] = "星期二";
$lang['jsemaine']['Wed'] = "星期三";
$lang['jsemaine']['Thu'] = "星期四";
$lang['jsemaine']['Fri'] = "星期五";
$lang['jsemaine']['Sat'] = "星期六";
$lang['jsemaine']['Sun'] = "星期日";

// Day of the week (Graph purpose, 4 chars max)
$lang['jsemaine_graph']['Mon'] = "周一";
$lang['jsemaine_graph']['Tue'] = "周二";
$lang['jsemaine_graph']['Wed'] = "周三";
$lang['jsemaine_graph']['Thu'] = "周四";
$lang['jsemaine_graph']['Fri'] = "周五";
$lang['jsemaine_graph']['Sat'] = "周六";
$lang['jsemaine_graph']['Sun'] = "周日";

// First letter of each day, weekdays ordered
$lang['calendrier_jours'][0] = "M";
$lang['calendrier_jours'][1] = "T";
$lang['calendrier_jours'][2] = "W";
$lang['calendrier_jours'][3] = "T";
$lang['calendrier_jours'][4] = "F";
$lang['calendrier_jours'][5] = "S";
$lang['calendrier_jours'][6] = "S";

// DO NOT ALTER!
$lang['weekdays']['Mon'] = '1';
$lang['weekdays']['Tue'] = '2';
$lang['weekdays']['Wed'] = '3';
$lang['weekdays']['Thu'] = '4';
$lang['weekdays']['Fri'] = '5';
$lang['weekdays']['Sat'] = '6';
$lang['weekdays']['Sun'] = '7';

// Continents
$lang['eur'] = "欧洲";
$lang['afr'] = "非洲";
$lang['asi'] = "亚洲";
$lang['ams'] = "南美洲和中美洲";
$lang['amn'] = "北美洲";
$lang['oce'] = "大洋洲";

// Oceans
$lang['oc_pac'] = "太平洋"; // TODO : translate
$lang['oc_atl'] = "大西洋"; // TODO : translate
$lang['oc_ind'] = "印度洋"; // TODO : translate

// Countries
$lang['domaines'] = array(
    "xx" => "未知",
    "ac" => "阿森松岛屿",
    "ad" => "安道尔共和国",
    "ae" => "阿拉伯联合酋长国",
    "af" => "阿富汗",
    "ag" => "安提瓜岛和巴布达岛",
    "ai" => "安圭拉岛",
    "al" => "阿尔巴尼亚",
    "am" => "亚美尼亚",
    "an" => "印度尼西亚",
    "ao" => "安哥拉",
    "aq" => "南极洲",
    "ar" => "阿根廷",
    "as" => "萨摩亚群岛",
    "at" => "奥地利",
    "au" => "澳大利亚",
    "aw" => "阿鲁巴岛",
    "az" => "阿塞拜疆",
    "ba" => "波斯尼亚",
    "bb" => "巴巴多斯岛",
    "bd" => "孟加拉国",
    "be" => "比利时",
    "bf" => "布基纳法索",
    "bg" => "保加利亚",
    "bh" => "巴林群岛",
    "bi" => "布隆迪",
    "bj" => "贝宁",
    "bm" => "百慕大",
    "bn" => "布鲁力",
    "bo" => "玻利维亚",
    "br" => "巴西",
    "bs" => "巴哈马群岛",
    "bt" => "不丹",
    "bv" => "布维岛",
    "bw" => "博茨瓦纳",
    "by" => "贝拉鲁斯",
    "bz" => "伯利兹城",
    "ca" => "加拿大",
    "cc" => "苏格兰岛",
    "cd" => "刚果民主共和国",
    "cf" => "中非共和国",
    "cg" => "刚果",
    "ch" => "瑞士",
    "ci" => "科特迪瓦",
    "ck" => "库克群岛",
    "cl" => "智利",
    "cm" => "喀麦隆",
    "cn" => "中国",
    "co" => "哥伦比亚",
    "cr" => "哥斯达黎加",
	"cs" => "塞尔维亚黑山",
    "cu" => "古巴",
    "cv" => " 佛得角",
    "cx" => "圣诞岛",
    "cy" => "塞浦路斯",
    "cz" => "捷克",
    "de" => "德国",
    "dj" => "吉布提",
    "dk" => "丹麦",
    "dm" => "多米尼加",
    "do" => "多米尼加共和国",
    "dz" => "阿尔及利亚",
    "ec" => "厄瓜多尔",
    "ee" => "爱沙尼亚",
    "eg" => "埃及",
    "eh" => "西萨摩亚",
    "er" => "厄立特里亚",
    "es" => "西班牙",
    "et" => "埃塞俄比亚",
    "fi" => "芬兰",
    "fj" => "斐济",
    "fk" => "福克兰群岛",
    "fm" => "密克罗尼西亚",
    "fo" => "法罗群岛",
    "fr" => "法国",
    "ga" => "加蓬",
    "gd" => "格林纳达",
    "ge" => "乔治亚州",
    "gf" => "圭亚那",
    "gg" => "格恩西",
    "gh" => "加纳",
    "gi" => "直布罗陀",
    "gl" => "格陵兰",
    "gm" => "冈比亚",
    "gn" => "几内亚",
    "gp" => "瓜德罗普岛",
    "gq" => "赤道几内亚",
    "gr" => "希腊",
    "gs" => "三维治岛",
    "gt" => "危地马拉",
    "gu" => "关岛",
    "gw" => "几内亚比绍共和国",
    "gy" => "圭亚那",
    "hk" => "中国香港",
    "hm" => "赫尔德岛及麦当劳群岛",
    "hn" => "洪都拉斯",
    "hr" => "克罗地亚",
    "ht" => "海地",
    "hu" => "匈牙利",
    "id" => "印尼",
    "ie" => "爱尔兰",
    "il" => "以色列",
    "im" => "Man Island",
    "in" => "印度",
    "io" => "不列颠群岛",
    "iq" => "伊拉克",
    "ir" => "伊朗",
    "is" => "冰岛",
    "it" => "意大利",
    "je" => "泽西",
    "jm" => "牙买加",
    "jo" => "约旦",
    "jp" => "日本",
    "ke" => "肯尼亚",
    "kg" => "吉尔吉斯斯坦",
    "kh" => "柬埔寨",
    "ki" => "基里巴斯",
    "km" => "科摩罗",
    "kn" => "圣路易",
    "kp" => "北朝鲜",
    "kr" => "南韩",
    "kw" => "科威特",
    "ky" => "开曼群岛",
    "kz" => "哈萨克",
    "la" => "老挝",
    "lb" => "黎巴嫩",
    "lc" => "圣卢西亚岛",
    "li" => "列支敦士登",
    "lk" => "斯里兰卡",
    "lr" => "利比里亚",
    "ls" => "莱索托",
    "lt" => "立陶宛",
    "lu" => "卢森堡",
    "lv" => "拉脱维亚",
    "ly" => "利比亚",
    "ma" => "摩洛哥",
    "mc" => "摩纳哥",
    "md" => "摩尔多瓦",
    "mg" => "马达加斯加岛",
    "mh" => "马绍尔群岛",
    "mk" => "马其顿",
    "ml" => "马里",
    "mm" => "缅甸",
    "mn" => "蒙古",
    "mo" => "澳门",
    "mp" => "北马里亚纳群岛",
    "mq" => "马提尼克岛",
    "mr" => "毛利塔尼亚",
    "ms" => "蒙特塞拉特岛",
    "mt" => "马耳他",
    "mu" => "毛里求斯",
    "mv" => "马尔代夫",
    "mw" => "马拉维",
    "mx" => "墨西哥",
    "my" => "马来西亚",
    "mz" => "莫桑比克",
    "na" => "纳米比亚",
    "nc" => "新喀里多尼亚",
    "ne" => "尼日尔",
    "nf" => "诺福克岛",
    "ng" => "尼日利亚",
    "ni" => "尼加拉瓜",
    "nl" => "荷兰",
    "no" => "挪威",
    "np" => "尼泊尔",
    "nr" => "瑙鲁",
    "nu" => "纽埃",
    "nz" => "新西兰",
    "om" => "阿曼",
    "pa" => "巴拿马",
    "pe" => "秘鲁",
    "pf" => "玻利尼西亚",
    "pg" => "巴布亚新几内亚",
    "ph" => "菲律宾",
    "pk" => "巴基斯坦",
    "pl" => "波兰",
    "pm" => " 圣皮埃尔和克隆 ",
    "pn" => "皮特克恩岛",
    "pr" => "波多黎各",
	"ps" => "巴勒斯坦",
    "pt" => "葡萄牙",
    "pw" => "帕劳群岛",
    "py" => "巴拉圭",
    "qa" => "卡塔尔",
    "re" => "留尼旺岛",
    "ro" => "罗马尼亚",
    "ru" => "俄罗斯联盟",
    "rs" => "俄国",
    "rw" => "卢旺达",
    "sa" => "沙特阿拉伯",
    "sb" => "所罗门",
    "sc" => "塞舌尔",
    "sd" => "苏丹",
    "se" => "瑞典",
    "sg" => "新加坡",
    "sh" => "圣路易",
    "si" => "斯洛文尼亚",
    "sj" => "斯瓦尔巴特群岛",
    "sk" => "斯洛伐克",
    "sl" => "塞拉利昂",
    "sm" => "圣马力诺",
    "sn" => "塞内加尔",
    "so" => "索马里",
    "sr" => "苏里南",
    "st" => "爱尔兰自由邦",
    "su" => "Old U.R.S.S.",
    "sv" => "萨尔瓦多",
    "sy" => "叙利亚",
    "sz" => "斯威士兰",
    "tc" => "特克斯和凯科斯群岛",
    "td" => "乍得",
    "tf" => "法国南部",
    "tg" => "多哥",
    "th" => "泰国",
    "tj" => "塔吉克斯坦",
    "tk" => "托克劳群岛",
    "tm" => "土库曼斯坦",
    "tn" => "突尼斯",
    "to" => "汤加",
    "tp" => "东帝汶",
    "tr" => "土耳其",
    "tt" => "特立尼达和多巴哥",
    "tv" => "图瓦卢",
    "tw" => "台湾",
    "tz" => "坦桑尼亚",
    "ua" => "乌克兰",
    "ug" => "乌干达",
    "uk" => "(大不列颠)联合王国",
    "gb" => "英国",
    "um" => "美国外岛",
    "us" => "美国",
    "uy" => "乌拉圭",
    "uz" => "乌兹别克斯坦",
    "va" => "梵蒂冈",
    "vc" => "圣文森特岛",
    "ve" => "委内瑞拉",
    "vg" => "大不列颠处女岛",
    "vi" => "美国处女岛",
    "vn" => "越南",
    "vu" => "瓦努阿图",
    "wf" => "沃利斯群岛",
    "ws" => "萨摩亚群岛",
    "ye" => "也门",
    "yt" => "马约特岛",
    "yu" => "南斯拉夫",
    "za" => "南非",
    "zm" => "赞比亚",
    "zr" => "扎伊尔",
    "zw" => "津巴布韦",
    "com" => "-",
    "net" => "-",
    "org" => "-",
    "edu" => "-",
    "int" => "-",
    "arpa" => "-",
    "gov" => "-",
    "mil" => "-",
    "reverse" => "-",
    "biz" => "-",
    "info" => "-",
    "name" => "-",
    "pro" => "-",
    "coop" => "-",
    "aero" => "-",
    "museum" => "-",
    "tv" => "图瓦卢",
    "ws" => "萨摩亚群岛",
);
?>