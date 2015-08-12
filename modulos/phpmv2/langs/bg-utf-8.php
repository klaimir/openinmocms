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
$lang['auteur_nom'] = "Петър и Руми Чилев - Pierre et Romy Tchilev"; // Translator's name
$lang['auteur_email'] = "promy.club@noyon.com"; // Translator's email
$lang['charset'] = "utf-8"; // language file charset (utf-8 by default)
$lang['text_dir'] = "ltr"; // ('ltr' for left to right, 'rtl' for right to left)
$lang['lang_iso'] = "bg"; // iso language code
$lang['lang_libelle_en'] = "Bulgarian"; // english language name
$lang['lang_libelle_fr'] = "Bulgare"; // french language name
$lang['unites_bytes'] = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
$lang['separateur_milliers'] = ' '; // three thousands spells 300 000 in bulgarian
$lang['separateur_decimaux'] = ','; // Separator for the float part of a number

//
// HTML Markups
//
$lang['head_titre'] = "phpMyVisites | уеб приложение с отворен код за статистика и анализ на посещаемост"; // Pages header's title
$lang['head_keywords'] = "phpmyvisites, php, скрипт, приложение, софтуер, статистика, безплатен, open source, gpl, посещения, посетители, mysql, посетени страници, страници, посетители, брой на посетителите, графики, прелиствачи, ОС, операционни системи, резолюции, ден, седмица, месец, данни, страни, гост, доставчик на услуга, търсачки, ключови думи, препоръчители, графики, входни страници, изходни страници, кръгови диаграми"; // Header keywords
$lang['head_description'] = "phpMyVisites | Приложение с отворен код за статистика разработена с PHP/MySQL и разпространявана под GNU GPL."; // Header description
$lang['logo_description'] = "phpMyVisites : приложение с отворен код за статистика разработена с PHP/MySQL и разпространявана под GPL."; // This is the JS code description. Has to be short.

//
// Main menu & submenu
//
$lang['menu_visites'] = "Посещения";
$lang['menu_pagesvues'] = "Посетени страници";
$lang['menu_suivi'] = "Проследяване";
$lang['menu_provenance'] = "Произход";
$lang['menu_configurations'] = "Конфигурация";
$lang['menu_affluents'] = "Входящи";
$lang['menu_listesites'] = "Списък на страниците";
$lang['menu_bilansites'] = "Резюме";
$lang['menu_jour'] = "Ден";
$lang['menu_semaine'] = "Седмица";
$lang['menu_mois'] = "Месец";
$lang['menu_annee'] = "Година";
$lang['menu_periode'] = "Анализиран период: %s"; // Text formated (e.g.: Studied period: Thuesday, september the 11th)
$lang['liens_siteofficiel'] = "Официална уеб страница";
$lang['liens_admin'] = "Администрация";
$lang['liens_contacts'] = "Контакти";

//
// Divers
//
$lang['generique_nombre'] = "Брой";
$lang['generique_tauxsortie'] = "Изходящ процент";
$lang['generique_ok'] = "ОК";
$lang['generique_timefooter'] = "Страницата е генерирана за %s секунди"; // Time in seconds
$lang['generique_divers'] = "Други"; // (for the graphs)
$lang['generique_inconnu'] = "Неизвестно."; // (for the graphs)
$lang['generique_vous'] = "... Вие ?";
$lang['generique_traducteur'] = "Преводач";
$lang['generique_langue'] = "Език";
$lang['generique_autrelangure'] = "Други?"; // Other language, translations wanted
$lang['aucunvisiteur_titre'] = "Няма посещения за този период."; 
$lang['generique_aucune_visite_bdd'] = "<b>Внимание ! </b> Не са отбелязани посещения в базата данни. Уверете се, че Javascript кода е коректно вложен във вашите страници с точния URL сочещ към Вашата инсталация на phpMyVisites. В случай на нужда потърсете помощ в приложената документация.";
$lang['generique_aucune_site_bdd'] = "Не е регистрирана нито една уеб страница в базата данни ! Регистрирайте се с права на Супер Администратор в phpMyVisites за да добавите нова страница.";
$lang['generique_retourhaut'] = "Нагоре";
$lang['generique_tempsvisite'] = "%sмин %sсек"; // 3min 25s means 3 минути и 25 секунди
$lang['generique_tempsheure'] = "%sч"; // 4h means 4 часа
$lang['generique_siteno'] = "Страница %с"; // Site "phpmyvisites"
$lang['generique_newsletterno'] = "Последни новини %s"; // Newsletter "version 2 announcement"
$lang['generique_partnerno'] = "Партньор %s"; // Partner "version 2 announcement"
$lang['generique_general'] = "Основен";
$lang['generique_user'] = "Потребител %s"; // User "Admin"
$lang['generique_previous'] = "Предходен";
$lang['generique_next'] = "Следващ";
$lang['generique_lowpop'] = "Изключи малките райони от статистиките";
$lang['generique_allpop'] = "Включи цялата райони в статистиките";
$lang['generique_to'] = "до"; // 4 'до' 8
$lang['generique_total_on'] = "върху"; // 4 to 8 'върху' 10
$lang['generique_total'] = "Сума";
$lang['generique_information'] = "Информации";
$lang['generique_done'] = "Потвърди!";
$lang['generique_other'] = "Друг";
$lang['generique_description'] = "Описание:";
$lang['generique_name'] = "Име:";
$lang['generique_variables'] = "Променливи";
$lang['generique_logout'] = "Изход";
$lang['generique_login'] = "Вход";
$lang['generique_hits'] = "Попадения";
$lang['generique_errors'] = "Грешки";
$lang['generique_site'] = "Страница";
$lang['generique_help_novisits'] = "Пример: Убедени ли сте, че разполагате с инсталиран %s тракер (javascript код) на вашата уеб страница?";

//
// Authentication
//
$lang['login_password'] = "парола : "; // lowercase
$lang['login_login'] = "потребител : "; // lowercase
$lang['login_error'] = "Достъпът е отказан. Грешно потребителско име или парола";
$lang['login_error_nopermission'] = "Потребителят, който указахте не разполага с никакви права. Моля, обърнете се към Администратор да настрои преглед/административни права в phpMyVisites.";
$lang['login_protected'] = "Не разполагате с право на достъп до тази защитена зона в %sphpMyVisites%s .";

//
// Contacts & "Others ?"
//
$lang['contacts_titre'] = "Контакти";
$lang['contacts_langue'] = "Преводи";
$lang['contacts_merci'] = "Благодарности";
$lang['contacts_auteur'] = "Автор на приложението, документацията и проекта phpMyVisites е <strong>Матийо Обри (Matthieu Aubry)</strong>.";
$lang['contacts_questions'] = "За всички<strong>технически въпроси, съобщения за грешки или предложения</strong>, посетете форумите, създадени за целта в официалния уебсайт %s. За други искания, моля свържете се с автора чрез формуляра в официалния уебсайт"; // adresse du site
$lang['contacts_trad1'] = "Вие желаете да ползвате phpMyVisites на вашия език? Не се колебайте да допринесете за превода, <strong>phpMyVisites има нужда от Вас!</strong>";
$lang['contacts_trad2'] = "Преводът на phpMyVisites е дейност, която може да отнеме малко време (няколко часа) и за която е нужно добро познаване на езика; но помнете, че <strong>всяка помощ, ще бъде от полза на много други потребители</strong>, които ще могат по-пълноценно да използват phpMyVisites. Ако сте заинтересовани, ще намерите всичко нужно в %s официалната документация на phpMyVisites %s."; // lien vers la doc
$lang['contacts_doc'] = "Не се колебайте да разгледате %s официалната документация на phpMyVisites %s, която съдържа много информация за инсталирането, конфигурация и функциониране на phpMyVisites. Документацията е достъпна директно във всяка изтеглена версия на phpMyVisites."; // lien vers la doc
$lang['contacts_thanks_dev'] = "Благодарим много на <strong>%s</strong>, сътрудници в развитието на phpMyVisites, за тяхната изключителна работа и интереса им към този проект.";
$lang['contacts_merci3'] = "Посетете страницата с благодарности на официалния уебсайт за да видите пълния списък на приятелите на phpMyVisites.";
$lang['contacts_merci2'] = "Голяма благодарност също и на всички онези, които помогнаха за превеждането на phpMyVisites:";

//
// Rss & Mails
//
$lang['rss_titre'] = "Site %s on %s"; // Site MyHomePage on Sunday 29 
$lang['rss_go'] = "Към подробни статистики";
$lang['mail_sender_name'] = "Уеб статистика (Автоматично)";

//
// Visits Part
//
$lang['visites_titre'] = "Информация за посещения"; 
$lang['visites_statistiques'] = "Статистика";
$lang['visites_periodesel'] = "За избран период";
$lang['visites_visites'] = "Посещения";
$lang['visites_uniques'] = "Уникални посетители";
$lang['visites_pagesvues'] = "Посетени страници";
$lang['visites_pagesvisiteurs'] = "Страници на посетител"; 
$lang['visites_pagesvisites'] = "Страници на посещение"; 
$lang['visites_pagesvisitessign'] = "Страници с висока посещаемост"; 
$lang['visites_tempsmoyen'] = "Средно времетраене на посещението";
$lang['visites_tempsmoyenpv'] = "Средно време на посетена страница";
$lang['visites_tauxvisite'] = "Посетеност на 1 страница"; 
$lang['visites_average_visits_per_day'] = "Средно посещения за ден"; 
$lang['visites_recapperiode'] = "Общо за периода";
$lang['visites_nbvisites'] = "Посещения";
$lang['visites_aucunevivisite'] = "Няма посещ."; // in the table, must be short
$lang['visites_recap'] = "Общо";
$lang['visites_unepage'] = "1 страница"; // (graph)
$lang['visites_pages'] = "%s страници"; // 1-2 pages (graph)
$lang['visites_min'] = "%s мин"; // 10-15 min (graph)
$lang['visites_sec'] = "%s сек"; // 0-30 s (seconds, graph)
$lang['visites_grapghrecap'] = "Обобщена графика на статистики";
$lang['visites_grapghrecaplongterm'] = "Графика на дългосрочен отчет";
$lang['visites_graphtempsvisites'] = "Графика за времетраене на посещенията на посетител";
$lang['visites_graphtempsvisitesimg'] = "Времетраене на посещенията на посетител";
$lang['visites_graphheureserveur'] = "Графика на посщенията на час на сървъра"; 
$lang['visites_graphheureserveurimg'] = "Посещения според времето на сървъра "; 
$lang['visites_graphheurevisiteur'] = "Графика на посещения на час за посетител";
$lang['visites_graphheurelocalimg'] = "Посещения според локалното време"; 
$lang['visites_longterm_statd'] = "Дългосрочен анализ (Дни от периода)";
$lang['visites_longterm_statm'] = " Дългосрочен анализ (Месеци от периода)";

//
// Sites Summary
//
$lang['summary_title'] = "Отчет за страниците";
$lang['summary_stitle'] = "Накратко";

//
// Frequency Part
//
$lang['frequence_titre'] = "Честота на посещенията";
$lang['frequence_nouveauxconnusgraph'] = "Графика на нови и познати посетители";
$lang['frequence_nouveauxconnus'] = "Нови и познати посетители";
$lang['frequence_titremenu'] = "Честота";
$lang['frequence_visitesconnues'] = "Познати посещения";
$lang['frequence_nouvellesvisites'] = "Нови посещения";
$lang['frequence_visiteursconnus'] = " Познати посетители ";
$lang['frequence_nouveauxvisiteurs'] = " Нови посетители ";
$lang['frequence_returningrate'] = "Процент връщания";
$lang['pagesvues_vispervisgraph'] = "Графика на посещенията на посетител";
$lang['frequence_vispervis'] = " Брой на посещенията на посетител ";
$lang['frequence_vis'] = "посещение";
$lang['frequence_visit'] = "1 посещение "; // (graph)
$lang['frequence_visits'] = "%s посещения "; // (graph)

//
// Seen Pages
//
$lang['pagesvues_titre'] = "Информация за посетени страници";
$lang['pagesvues_joursel'] = "Избран ден";
$lang['pagesvues_jmoins7'] = "Ден - 7";
$lang['pagesvues_jmoins14'] = "Ден - 14";
$lang['pagesvues_moyenne'] = "(средно)";
$lang['pagesvues_pagesvues'] = "Посетени страници";
$lang['pagesvues_pagesvudiff'] = "Посещения на различни страници";
$lang['pagesvues_recordpages'] = "Макс. брой страници на 1 посетител";
$lang['pagesvues_tabdetails'] = "Посетени страници (от %s до %s)"; // (de 1   21)
$lang['pagesvues_graphsnbpages'] = "Графика на посещенията по брой посетени страници";
$lang['pagesvues_graphnbvisitespageimg'] = "Посещения по брой на посетени страници";
$lang['pagesvues_graphheureserveur'] = "График на посещения според времето на сървъра";
$lang['pagesvues_graphheureserveurimg'] = "Посещения според времето на сървъра";
$lang['pagesvues_graphheurevisiteur'] = "График на посещенията според локалното време";
$lang['pagesvues_graphpageslocalimg'] = "Посещения според локалното време";
$lang['pagesvues_tempsparpage'] = "Време на страница";
$lang['pagesvues_total_time'] = "Общо време";
$lang['pagesvues_avg_time'] = "Средно време";
$lang['pagesvues_help_pagename'] = "Знаете ли, че можете да дадете 'приятелски' изглед на вашите страници?";
$lang['pagesvues_help_track_dls'] = "Знаете ли, че можете да проследите изтеглянето на файлове и външни препратки към страниците ви?";

//
// Follows-Up
//
$lang['suivi_titre'] = "Движение на посетителя";
$lang['suivi_pageentree'] = "Входящи страници";
$lang['suivi_pagesortie'] = "Изходящи страници";
$lang['suivi_tauxsortie'] = "Процент на изходящи";
$lang['suivi_pageentreehits'] = "Входящи хитове";
$lang['suivi_pagesortiehits'] = "Изходящи хитове";
$lang['suivi_singlepage'] = "Посещение само на 1 страница";

//
// Origin
//
$lang['provenance_titre'] = "Произход на посетителите";
$lang['provenance_recappays'] = "Преглед на страните";
$lang['provenance_pays'] = "Страни";
$lang['provenance_paysimg'] = "Графика на посетителите по страни";
$lang['provenance_fai'] = "Интернет доставчици";
$lang['provenance_nbpays'] = "Брой различни националности : %s";
$lang['provenance_provider'] = "Доставчици"; // same as $lang['provenance_fai'], but not if $lang['provenance_fai'] is too long
$lang['provenance_continent'] = "Континент";
$lang['provenance_mappemonde'] = "Карта на света";
$lang['provenance_interetspays'] = "Интерес по страни";

//
// Setup
//
$lang['configurations_titre'] = "Настройки на посетителите";
$lang['configurations_os'] = "Операционна система";
$lang['configurations_osimg'] = "Графика на операционните системи";
$lang['configurations_navigateurs'] = "Търсачки";
$lang['configurations_navigateursimg'] = "Графика на търсачките";
$lang['configurations_resolutions'] = "Резолюция на екрана";
$lang['configurations_resolutionsimg'] = "Графика на резолюциите на екрана";
$lang['configurations_couleurs'] = "Качество на цветовете";
$lang['configurations_couleursimg'] = "Графика на качество на цветовете";
$lang['configurations_rapport'] = "Нормален/широк екран";
$lang['configurations_large'] = "Широк екран";
$lang['configurations_normal'] = "Нормален";
$lang['configurations_double'] = "Двоен Екран";
$lang['configurations_plugins'] = "Допълнителни модули";
$lang['configurations_navigateursbytype'] = "Браузери (по видове)"; 
$lang['configurations_navigateursbytypeimg'] = "Графика на видовете броузери"; 
$lang['configurations_os_interest'] = "Интерес по операционни системи";
$lang['configurations_navigateurs_interest'] = "Интерес по браузери";
$lang['configurations_resolutions_interest'] = "Интерес по резолюция на екрана";
$lang['configurations_couleurs_interest'] = "Интерес по качество на цветовете";
$lang['configurations_configurations'] = "Конфигурация";

//
// Referers
//
$lang['affluents_titre'] = "Препоръчители";
$lang['affluents_recapimg'] = "График на посетители по препоръка";
$lang['affluents_directimg'] = "Директно";
$lang['affluents_sitesimg'] = "Уеб страници";
$lang['affluents_moteursimg'] = "Търсачки";
$lang['affluents_referrersimg'] = "Препоръчители";
$lang['affluents_moteurs'] = "Търсачки";
$lang['affluents_nbparmoteur'] = "Брой посетители стигнали до сайта чрез търсачка : %s";
$lang['affluents_aucunmoteur'] = "Няма посетители стигнали до сайта чрез търсачка.";
$lang['affluents_motscles'] = "Ключови думи";
$lang['affluents_nbmotscles'] = "Брой различни ключови думи : %s";
$lang['affluents_aucunmotscles'] = "Нито една ключова дума не е открита.";
$lang['affluents_sitesinternet'] = "Уеб страници";
$lang['affluents_nbautressites'] = "Посещения през други уеб страници : %s";
$lang['affluents_nbautressitesdiff'] = "Брой различни уеб страници : %s";
$lang['affluents_aucunautresite'] = "Няма посетители през други уеб сайтове.";
$lang['affluents_entreedirecte'] = "Директно търсене";
$lang['affluents_nbentreedirecte'] = "Брой директни : %s";
$lang['affluents_nbpartenaires'] = "Посещения идващи през партньори : %s";
$lang['affluents_aucunpartenaire'] = "Няма посещения идващи от партньори.";
$lang['affluents_nbnewsletters'] = "Посещения идващи от Новинарски Съобшения : %s";
$lang['affluents_aucunnewsletter'] = "Няма посещения идващи от Новинарски Съобшения.";
$lang['affluents_details'] = "Детайли"; // In the results of the referers array
$lang['affluents_interetsmoteurs'] = "Интереси по търсачки";
$lang['affluents_interetsmotscles'] = "Интереси по ключови думи";
$lang['affluents_interetssitesinternet'] = "Интереси по уеб страници";
$lang['affluents_partenairesimg'] = "Партньори";
$lang['affluents_partenaires'] = "Партньори";
$lang['affluents_interetspartenaires'] = "Интереси по страници на партньори";
$lang['affluents_newslettersimg'] = "Новинарски Съобщения";
$lang['affluents_newsletters'] = "Новинарски Съобшения";
$lang['affluents_interetsnewsletters'] = " Интереси по Новинарски Съобшения";
$lang['affluents_type'] = "Вид Препоръчител";
$lang['affluents_interetstype'] = "Интереси по типове достъп";

//
// Summary
//
$lang['purge_titre'] = "Преглед на посещенията и потоците";
$lang['purge_intro'] = "Този период е отстранен от администрацията, запазена е само основната статистика.";
$lang['admin_purge'] = "Почистване и оптимизация на базата данни";
$lang['admin_purgeintro'] = "Този отдел ви позволява да работите с таблиците на phpMyVisites. Можете да видите използването на диска от страна на таблиците, да ги оптимизирате или да отстраните стари записи. Това ще ви помогне да ограничите големината на таблиците във вашата база данни.";
$lang['admin_optimisation'] = "Оптимизиране на [ %s ]..."; // Tables names
$lang['admin_postopt'] = "Общата големина е намалена с %chiffres% %unites%"; // 28 Kb
$lang['admin_purgeres'] = "Почистване на следните периоди: %s";
$lang['admin_purge_fini'] = "Изтриването на таблиците е завършено...";
$lang['admin_bdd_nom'] = "Име";
$lang['admin_bdd_enregistrements'] = "Записи";
$lang['admin_bdd_taille'] = "Големина на таблицата";
$lang['admin_bdd_opt'] = "Оптимизирай";
$lang['admin_bdd_purge'] = "Почистване на таблиците";
$lang['admin_bdd_optall'] = "Оптимизирай всичко";
$lang['admin_purge_j'] = "Отстрани записите по-стари от %s дни";
$lang['admin_purge_s'] = "Отстрани записите по-стари от %s седмици";
$lang['admin_purge_m'] = "Отстрани записите по-стари от %s месеца";
$lang['admin_purge_y'] = " Отстрани записите по-стари от %s години ";
$lang['admin_purge_logs'] = "Отстрани всички логове";
$lang['admin_purge_autres'] = "Общо почистване на таблица '%s'";
$lang['admin_purge_none'] = "Действиетп е забранено";
$lang['admin_purge_cal'] = "Пресметни и отстрани (това може да трае няколко минути)";
$lang['admin_alias_title'] = "Придадени имена и URL на уеб старницата";
$lang['admin_partner_title'] = "Уеб страници партньори";
$lang['admin_newsletter_title'] = "Новинарски Съобщения на страницата";
$lang['admin_ip_exclude_title'] = "IP адреси, които трябва да се изключат от статистиките";
$lang['admin_name'] = "Име:";
$lang['admin_error_ip'] = "IP трябва да бъде в коректен формат : %s";
$lang['admin_site_name'] = "Име на страницата";
$lang['admin_site_url'] = "Основен URL на страницата";
$lang['admin_db_log'] = "Използвайте права на Администратор на phpMyVisites за да промените конфигурацията на достъпа до базата данни.";
$lang['admin_error_critical'] = "Грешка, необходимо е да се поправи, за да може phpMyVisites да работи коректно.";
$lang['admin_warning'] = "Внимание, phpMyVisites би могла да работи коректно, но някои функции ще бъдат недостъпни.";
$lang['admin_move_group'] = "Премести в група :";
$lang['admin_move_select'] = "Избери група";
$lang['admin_site_select'] = "Страница за конфигуриране";

//
// Setup
//
$lang['admin_intro'] = "Добре дошли в раздела за конфигурация на phpMyVisites. Тук можете да промените данни свързани с вашата инсталация на приложението. Ако имате някакви проблеми консултирайте се с %s официалната документация на phpMyVisites %s."; // link to the doc
$lang['admin_configetperso'] = "Общи настройки";
$lang['admin_afficherjavascript'] = "Покажи JavaScript кода за статистика";
$lang['admin_cookieadmin'] = "Не включвай администратора в статистиката";
$lang['admin_ip_ranges'] = "Не включвай реда IP/IP в статистиката";
$lang['admin_sitesenregistres'] = "Списък на добавените уеб страници:";
$lang['admin_retour'] = "Назад";
$lang['admin_cookienavigateur'] = "Можете да изключите администратора от статистиката. Този метод е базиран на cookies и тази опция ще работи само с конкретния браузер, с който работите в момента на конфигурирането. Разбира се, можете да промените тази настройка по всяко време.";
$lang['admin_prendreencompteadmin'] = "Включи администратора в статистиката (cookie-то ще бъде изтрито)";
$lang['admin_nepasprendreencompteadmin'] = "Изключи администратора от статистиката (ще бъде създадено cookie)";
$lang['admin_etatcookieoui'] = "Администраторът е включен в статистиката за този уеб сайт (Това е основната настройка, третирани сте като обикновен посетител)";
$lang['admin_etatcookienon'] = "Не сте включени в статистиката за тази уеб страница (Вашите посещения няма да бъдат регистрирани)";
$lang['admin_deleteconfirm'] = "Моля, потвърдете че желаете да изтриете %s?";
$lang['admin_sitedeletemessage'] = "Моля <u>бъдете внимателни</u>: всички данни, свързани с тази страница, ще бъдат унищожени<br>загубата на данните е необратима.";
$lang['admin_confirmyes'] = "Да, желая да ги унищожа";
$lang['admin_confirmno'] = "Не, не желая да ги унищожа";
$lang['admin_nonewsletter'] = "Няма намерени Новинарски Съобщения за тази страница!";
$lang['admin_nopartner'] = "Няма намерена страница-партньор на тази страница!";
$lang['admin_get_question'] = "Запис на променливата GET ? (в URL)";
$lang['admin_get_a1'] = "Запис на всички променливи";
$lang['admin_get_a2'] = "Не записвай променливите";
$lang['admin_get_a3'] = "Запиши само споменатите променливи";
$lang['admin_get_a4'] = "Запиши всички освен споменатите променливи";
$lang['admin_get_default_pdf'] = "PDF доклад :";
$lang['admin_get_default_pdfdefault'] = "PDF доклад по подразбиране"; 
$lang['admin_get_default_theme'] = "Визуална тема за тази страница:";
$lang['admin_get_list'] = "Имена на променливите (разделени с<b>;</b>) <br/>Пример : %s";
$lang['admin_required'] = "%s изисква се.";
$lang['admin_title_required'] = "Изисква";
$lang['admin_write_dir'] = "Директория с право на запис";
$lang['admin_chmod_howto'] = "Тази директория на сървъра трябва да има осигурено право на запис. За това е достатъчно да изпълните командата chmod 777, посредством FTP клиент (кликвате с десния бутон на мишката върху директорията -> Права (или chmod))";
$lang['admin_optional'] = "По желание";
$lang['admin_memory_limit'] = "Ограничена памет";
$lang['admin_allowed'] = "Разрешено";
$lang['admin_webserver'] = "Уеб сървър";
$lang['admin_server_os'] = "Сървър OS";
$lang['admin_server_time'] = "Сървър Време";
$lang['admin_legend'] = "Легенда :";
$lang['admin_error_url'] = "URL трябва да има коректен формат : %s (без slash в края)";
$lang['admin_url_n'] = "URL %s:";
$lang['admin_url_aliases'] = "URL добавени имена";
$lang['admin_logo_question'] = "Покажи логото?";
$lang['admin_type_again'] = "(напиши отново)";
$lang['admin_admin_mail'] = "Еmail на Администратора";
$lang['admin_admin'] = "Администратор";
$lang['admin_phpmv_path'] = "Пълен път за достъп до директорията на phpMyVisites";
$lang['admin_valid_email'] = "Email трябва да бъде валиден email";
$lang['admin_valid_pass'] = "Паролата трябва да бъде по-сложна (6 знака минимум, необходимо е да има и цифри)";
$lang['admin_match_pass'] = "Паролите не съответстват";
$lang['admin_no_user_group'] = "Няма потребител в тази група за тази страница";
$lang['admin_recorded_nl'] = "Регистрирани Новинарски Съобщения:";
$lang['admin_recorded_partners'] = "Регистрирани партньори:";
$lang['admin_recorded_users'] = "Регистрирани потребители:";
$lang['admin_select_site_title'] = "Моля, изберете страница";
$lang['admin_select_user_title'] = "Моля, изберете потребител";
$lang['admin_no_user_registered'] = "Няма регистриран потребител!";
$lang['admin_configuration'] = "Настройка";
$lang['admin_general_conf'] = "Обща настройка";
$lang['admin_group_title'] = "Управление на групите (права)";
$lang['admin_user_title'] = "Управление на потребителите";
$lang['admin_user_add'] = "Добави потребител";
$lang['admin_user_mod'] = "Промени потребител";
$lang['admin_user_del'] = "Изтрий потребител";
$lang['admin_user_oldPwd'] = "Old password"; 
$lang['admin_user_oldPwd_bad'] = "Old password incorrect."; 
$lang['admin_server_info'] = "Информация за сървъра";
$lang['admin_send_mail'] = "Изпрати статистиките с email";
$lang['admin_rss_feed'] = "Статистиките в един RSS канал";
$lang['admin_rss_feed_specific_site'] = "Уеб '%s' Статистика - RSS"; // site 2
$lang['admin_site_admin'] = "Администрация на страницата";
$lang['admin_site_add'] = "Добави страница";
$lang['admin_site_mod'] = "Промени страница";
$lang['admin_site_del'] = "Изтрий страница";
$lang['admin_nl_add'] = "Добави Новинарски Съобщения";
$lang['admin_nl_mod'] = "Промени Новинарски Съобщения";
$lang['admin_nl_del'] = " Изтрий Новинарски Съобщения";
$lang['admin_partner_add'] = "Добави партньор";
$lang['admin_partner_mod'] = " Промени име и URL на партньор ";
$lang['admin_partner_del'] = " Изтрий партньор ";
$lang['admin_url_alias'] = "Управление на URL alias";
$lang['admin_group_admin_n'] = "Виж статистиките + Права на Администратора";
$lang['admin_group_admin_d'] = "Потребителите могат да разглеждат статистиките и да разполагат с достъп до информацията за страницата (име, добави cookie, да изключват IP редове, да управляват URLs добавени имена/партньори/Новинарски Съобщения, и т.н.)";
$lang['admin_group_view_n'] = "Виж статистиките";
$lang['admin_group_view_d'] = "Потребителите могат само да разглеждат статистики. Нямат права на Администратори.";
$lang['admin_group_noperm_n'] = "Не разполагат с никакви права";
$lang['admin_group_noperm_d'] = "Потребителите от тази група нямат право да гредат или променят статистиките на тази страница.";
$lang['admin_group_stitle'] = "Можете да променяте групите потребители, избирайки потребители, после отново избирайки в разгънатия списък групата в която искате да ги преместите.";
$lang['admin_url_generate_download_link_example'] = "Адрес за изтегляне или URL пренасочване към външна уеб страница";
$lang['admin_url_generate_title'] = "Изтегляне Файл / Url пренасочване : Url генератор";
$lang['admin_url_generate_intro'] = "phpMyVisites може да отчита брой Изтегляне на Файл, също така и препратки към външни страници. Изтегляне и URLs отчетите можете да разгледате в раздел 'Посетени Страници' на phpMyVisites.</p><p class='texte'> To achieve this, you have to use a URL that points to the phpmyvisites file, then it will redirect to the URL you need. Because it is not trivial to generate such a URL, here is a tool that will make it simple (because phpMyVisites must be a simple but powerful experience for all of us). Simply fill in the form, click the 'Generate URL' button, and you will count your file downloads or external URL redirections very easily!";
$lang['admin_url_generate_site_selection'] = "Изберете страница, за която желаете да проследите Изтегляне на Файл/URL пренасочване";
$lang['admin_url_generate_tag_selection'] = "Select the tag for which you want to count a file download or a URL redirection"; 
$lang['admin_url_generate_enter_url'] = "Въведете пълният път до файл или външен Url, който желаете да проследите в статистиката:";
$lang['admin_url_generate_help_enter_url'] = "Помощ: Трябва да изглежда така: '<b>http://www.yoursite.com/file/brilliant-software.zip</b>' или за всякакви URL пренасочвания '<b>http://www.the-site-to-redirect.com</b>'";
$lang['admin_url_generate_friendly_name'] = "Приятелско име на Файл / URL което ще се използва в таблицата Посетени Страници:"; 
$lang['admin_url_generate_help_friendly_name'] = "Помощ: Можете да подредите 'Файл / Url пренасочване' по категории за по-добър изглед в раздел Посетени Страници на phpMyVisites. Можете да разделите категориите и файл / Url пренасочване със знака '<b>/</b>'. Пример, '<b>my photos download/Summer in France</b>' or '<b>Partners/PHP.net website</b>' : ще бъдат категоризирани респективно в папката '<b>my photos downloads</b>' или в папката '<b>Partners</b>' : ще ги видите в раздела Посетени страници на phpMyVisites.";
$lang['admin_url_generate_result_url'] = "Here is the URL you can link to: ";
$lang['admin_url_generate_html_result'] = "If it is useful for you, here is the HTML Link you can use:";
$lang['admin_url_generate_html_onclick'] = "Here is the HTML using onclick event:";
$lang['admin_url_generate_image_legend'] = "Example of Pages views with URL redirection and file download tracking:";
$lang['admin_site_link_javascript'] = "%s Now you have to install the tracker on your pages (copy paste the Javascript code). Click to display the javascript code. %s";
$lang['admin_last_version'] = "Do you have phpMyVisites last version? (Recommended!)";
$lang['admin_general_config_firstday'] = "First day of the calendar?";
$lang['admin_default_language'] = "Default language? <br/>It will also be the default language for emails.";
$lang['admin_back_statisitics'] = "Go to statistics"; 

//
// Pdf export
//
$lang['pdf_generate_link'] = "Създаване на PDF файл съдържащ всички статистики за страница %s";
$lang['pdf_summary_generate_link'] = "Създаване на PDF файл съдържащ обобщени статистики";
$lang['pdf_free_page'] = "Free new page";
$lang['pdf_free_chapter'] = "Free title chapter";
$lang['pdf_page_break'] = "Нова Страница";
$lang['pdf_page_summary'] = "Обобщено";
$lang['generique_pdfno'] = "PDF файл %s"; // Newsletter "version 2 announcement" 
$lang['admin_pdf_title'] = "Създаване на PDF файл"; 
$lang['admin_nopdf'] = "Не е създаван PDF файл за тази страница!";
$lang['admin_recorded_pdf'] = "Запазени PDF:";
$lang['admin_pdf_add'] = "Добави PDF"; 
$lang['admin_pdf_mod'] = "Промени PDF"; 
$lang['admin_pdf_del'] = "Изтрий PDF"; 
$lang['generique_pdf'] = "PDF";
$lang['pdf_lib_show_interest'] = "Interest array is displayed";
$lang['pdf_lib_hide_interest'] = "Interest array is hidden";
$lang['pdf_lib_show_all'] = "Details are displayed"; 
$lang['pdf_lib_hide_all'] = "Data are limited in size";
$lang['pdf_lib_edit_text'] = "Edit this text"; 
$lang['pdf_lib_need_at_least_one_page'] = "You first have to create an 'empty page'"; 
$lang['pdf_lib_can_not_add_chapter'] = "Can't set an element before a page is created.";
$lang['pdf_lib_pdf_name_mandatory'] = "Name is mandatory"; 
$lang['pdf_lib_pdf_expand_all'] = "Expand all"; 
$lang['pdf_lib_pdf_collapse_all'] = "Collapse all";
$lang['pdf_create_from_interface'] = "Create a personalized pdf report!";
$lang['pdf_complete'] = "PDF Complete report"; 

//
// Installation Step
//
$lang['install_loginmysql'] = "Потребител за базата данни";
$lang['install_mdpmysql'] = "Парола";
$lang['install_serveurmysql'] = "Сървър база данни";
$lang['install_basemysql'] = "Име на база данни";
$lang['install_prefixetable'] = "Префикс на таблица";
$lang['install_utilisateursavances'] = "Напреднали потребители";
$lang['install_oui'] = "Да";
$lang['install_non'] = "Не";
$lang['install_ok'] = "Потвърждавам";
$lang['install_probleme'] = "Внимание: ";
$lang['install_DirectoriesWriteError'] = "<b>Problem! </b><br/>Cannot write in the folder(s) %s Please verify that you have the rights necessary to create files on the server (try to CHMOD 755 the folder with your FTP software : right click on the directory -> Permissions (or CHMOD). <br/><br/>If the CHMOD doesn't work with your FTP software, try to delete (if it exists) the directories, and create them with your FTP software.";
$lang['install_loginadmin'] = "Администратор:";
$lang['install_mdpadmin'] = "Парола:";
$lang['install_chemincomplet'] = "Пълният път до приложението phpMyVisites (пример: http://www.mysite.com/rep1/rep3/phpmyvisites/). Пътят може да завършва със символа <strong>/</strong>.";
$lang['install_afficherlogo'] = "Показване лого на вашите страници?<br />%s"; // %s replaced by the logo image
$lang['install_affichergraphique'] = "Покажи статистически графики.";
$lang['install_valider'] = "Изпрати"; //  during installation and for login
$lang['install_popup_logo'] = "Моля, изберете лого";
$lang['install_logodispo'] = "Разгледайте възможни варианти за лого";
$lang['install_welcome'] = "Добре дошли!";
$lang['install_system_requirements'] = "Изисквания към системата";
$lang['install_database_setup'] = "Настройка на база данни";
$lang['install_create_tables'] = "Създаване на таблици";
$lang['install_general_setup'] = "Обща настройка";
$lang['install_create_config_file'] = "Създай конфигурационен файл";
$lang['install_first_website_setup'] = "Добави Първа уеб страница";
$lang['install_display_javascript_code'] = "Покажи Javascript кода";
$lang['install_finish'] = "Край!";
$lang['install_txt2'] = "След приключване на инсталацията ще бъде изпратено съобщение до официалния сайт в помощ на статистика за брой ползватели на phpMyVisites. Благодарим за разбирането.";
$lang['install_database_setup_txt'] = "Моля, въведете информацията за вашата база данни.";
$lang['install_general_config_text'] = "phpMyVisites може да има само един единствен Администратор. Моля, изберете потребителско име и парола за този account. Можете да въведете останалите потребители впоследствие.";
$lang['install_config_file'] = " Информацията за Администратора е въведена успешно.";
$lang['install_js_code_text'] = "<p>За да отчитате посетителите, трябва да интегрирате javascript кода във всички ваши страници. </p><p> Не е задължително вашите страници да са създадени с PHP, <strong>phpMyVisites може да работи с всякакъв вид страници (HTML, ASP, Perl или друг език).</strong> </p><p> Ето кодът който трябва да присъства в страниците: </p>";
$lang['install_intro'] = "Добре дошли във фазата 'Инсталиране на phpMyVisites'."; 
$lang['install_intro2'] = "Инсталацията е разделена на %s лесни етапи и отнема около 10 минути.";
$lang['install_next_step'] = "Следващ етап";
$lang['install_status'] = "Процес на инсталиране";
$lang['install_done'] = "Инсталацията е %s%% завършена"; // Install 25% complete
$lang['install_site_success'] = "Уеб страницата е създадена успешно!";
$lang['install_site_info'] = "Моля, въведете всички данни относно интернет страницата.";
$lang['install_go_phpmv'] = "Към phpMyVisites!";
$lang['install_congratulation'] = "Поздравления! Инсталация на phpMyVisites е завършена.";
$lang['install_end_text'] = "Проверете дали сте въвели кода във всички ваши страници и после остава само да очаквате първите посетители!";
$lang['install_db_ok'] = "Свързване със сървъра на база данни е потвърдено!";
$lang['install_table_exist'] = "Таблиците на phpMyVisites присъстват в базата данни.";
$lang['install_table_choice'] = "Имате избор да използвате отново съществуващите таблици на база данни или да започнете с нова инсталация, като унищожите досегашните таблици.";
$lang['install_table_erase'] = "Изтрий всички таблици";
$lang['install_table_reuse'] = "Използвай присъстващите таблици";
$lang['install_table_success'] = "Таблиците са създадени успешно!";
$lang['install_send_mail'] = "Желаете ли да получавате ежедневно електронна поща с отчета на всяка страница, за която се води статистика?";

//
// Update Step
//
$lang['update_title'] = "Обновяване на phpMyVisites";
$lang['update_subtitle'] = "phpMyVisites е обновен до последна версия на приложението.";
$lang['update_versions'] = "Вашата предходна версия бе %s желаете ли да преминете към %s.";
$lang['update_db_updated'] = "Вашата база данни бе обновена успешно!";
$lang['update_continue'] = "Към phpMyVisites";
$lang['update_jschange'] = "Внимание! <br /> Javascript кодът на phpMyVisites е изменен. ТРЯБВА да актуализирате наблюдаваните страници и да въведете новия phpMyVisites Javascript код във ВСИЧКИ страници. <br /> Промените на javascript кода се извършват много рядко и се извиняваме за неудобствата, предизвикани от тази промяна.";

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
$lang['moistab']['01'] = "Януари";
$lang['moistab']['02'] = "Февруари";
$lang['moistab']['03'] = "Март";
$lang['moistab']['04'] = "Април";
$lang['moistab']['05'] = "Май";
$lang['moistab']['06'] = "Юни";
$lang['moistab']['07'] = "Юли";
$lang['moistab']['08'] = "Август";
$lang['moistab']['09'] = "Септември";
$lang['moistab']['10'] = "Октомври";
$lang['moistab']['11'] = "Ноември";
$lang['moistab']['12'] = "Декември";

// Months (Graph purpose, 4 chars max)
$lang['moistab_graph']['01'] = "Яну";
$lang['moistab_graph']['02'] = "Фев";
$lang['moistab_graph']['03'] = "Мар";
$lang['moistab_graph']['04'] = "Апр";
$lang['moistab_graph']['05'] = "Май";
$lang['moistab_graph']['06'] = "Юни";
$lang['moistab_graph']['07'] = "Юли";
$lang['moistab_graph']['08'] = "Авг";
$lang['moistab_graph']['09'] = "Сеп";
$lang['moistab_graph']['10'] = "Окт";
$lang['moistab_graph']['11'] = "Ное";
$lang['moistab_graph']['12'] = "Дек";

// Day of the week
$lang['jsemaine']['Mon'] = "Понеделник";
$lang['jsemaine']['Tue'] = "Вторник";
$lang['jsemaine']['Wed'] = "Сряда";
$lang['jsemaine']['Thu'] = "Четвъртък";
$lang['jsemaine']['Fri'] = "Петък";
$lang['jsemaine']['Sat'] = "Събота";
$lang['jsemaine']['Sun'] = "Неделя";

// Day of the week (Graph purpose, 4 chars max)
$lang['jsemaine_graph']['Mon'] = "Пон";
$lang['jsemaine_graph']['Tue'] = "Вто";
$lang['jsemaine_graph']['Wed'] = "Сря";
$lang['jsemaine_graph']['Thu'] = "Чет";
$lang['jsemaine_graph']['Fri'] = "Пет";
$lang['jsemaine_graph']['Sat'] = "Съб";
$lang['jsemaine_graph']['Sun'] = "Нед";

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
$lang['eur'] = "Европа";
$lang['afr'] = "Африка";
$lang['asi'] = "Азия";
$lang['ams'] = "Южна и Централна Америка";
$lang['amn'] = "Северна Америка";
$lang['oce'] = "Океания";

// Oceans
$lang['oc_pac'] = "Тихи Океан";
$lang['oc_atl'] = "Атлантически Океан";
$lang['oc_ind'] = "Индийски Океан";

// Countries
$lang['domaines'] = array(
    "xx" => "Непозната",
    "ac" => "Асенсионови Острови",
    "ad" => "Андора",
    "ae" => "ОАЕ",
    "af" => "Афганистан",
    "ag" => "Антигуа и Барбуда",
    "ai" => "Ангвила",
    "al" => "Албания",
    "am" => "Армения",
    "an" => "Антилски О-ви",
    "ao" => "Ангола",
    "aq" => "Антарктик",
    "ar" => "Аржентина",
    "as" => "Американска Самоа",
    "at" => "Австрия",
    "au" => "Австралия",
    "aw" => "Аруба",
    "az" => "Азербайджан",
    "ba" => "Босна и Херцеговина",
    "bb" => "Барбадос",
    "bd" => "Бангладеш",
    "be" => "Белгия",
    "bf" => "Буркина Фасо",
    "bg" => "България",
    "bh" => "Бахрейн",
    "bi" => "Бурунди",
    "bj" => "Бенин",
    "bm" => "Бермудски О-ви",
    "bn" => "Бруней",
    "bo" => "Боливия",
    "br" => "Бразилия",
    "bs" => "Бахамски О-ви",
    "bt" => "Бутан",
    "bv" => "О-в Буве",
    "bw" => "Ботсуана",
    "by" => "Белорусия",
    "bz" => "Белиз",
    "ca" => "Канада",
    "cc" => "Кокосови (Килинг) О-ви",
    "cd" => "Конго, Демократична Република",
    "cf" => "Централно Африканска Република",
    "cg" => "Конго",
    "ch" => "Швейцария",
    "ci" => "Бряг на Слоновата Кост",
    "ck" => "Кукови О-ви",
    "cl" => "Чили",
    "cm" => "Камерун",
    "cn" => "Кина",
    "co" => "Колумбия",
    "cr" => "Коста Рика",
    "cs" => "Сърбия - Черна Гора",
    "cu" => "Куба",
    "cv" => "Кап Вер",
    "cx" => "Рождество О-в",
    "cy" => "Кипър",
    "cz" => "Чешка Република",
    "de" => "Германия",
    "dj" => "Джибути",
    "dk" => "Данска",
    "dm" => "Доминика",
    "do" => "Доминиканска Република",
    "dz" => "Алжир",
    "ec" => "Еквадор",
    "ee" => "Естония",
    "eg" => "Египет",
    "eh" => "Западна Сахара",
    "er" => "Еритрея",
    "es" => "Испания",
    "et" => "Етиопия",
    "fi" => "Финландия",
    "fj" => "Фиджи",
    "fk" => "Фолкландски О-ви",
    "fm" => "Микронезия",
    "fo" => "Фарое О-ви",
    "fr" => "Франция",
    "ga" => "Габон",
    "gd" => "Гренада",
    "ge" => "Грузия",
    "gf" => "Франенска Гвияна",
    "gg" => "Гернси",
    "gh" => "Гана",
    "gi" => "Гибралтар",
    "gl" => "Гренландия",
    "gm" => "Гамбия",
    "gn" => "Гвинея",
    "gp" => "Гвадалупа",
    "gq" => "Екваториална Гвинея",
    "gr" => "Гърция",
    "gs" => "Южна Джорджия и Южен Сендвич О-ви",
    "gt" => "Гватемала",
    "gu" => "Гуам",
    "gw" => "Гвинея-Бисао",
    "gy" => "Гвияна",
    "hk" => "Хонг Конг",
    "hm" => "О-ви на Херд и Мекдоналд",
    "hn" => "Хондурас",
    "hr" => "Хърватска",
    "ht" => "Хаити",
    "hu" => "Унгария",
    "id" => "Индонезия",
    "ie" => "Ирландия",
    "il" => "Израел",
    "im" => "О-в Мен",
    "in" => "Индия",
    "io" => "Британска Територия в Индиския Океан",
    "iq" => "Ирак",
    "ir" => "Иран",
    "is" => "Исландия",
    "it" => "Италия",
    "je" => "Джерзи",
    "jm" => "Ямайка",
    "jo" => "Йордания",
    "jp" => "Япония",
    "ke" => "Кения",
    "kg" => "Киргизстан",
    "kh" => "Камбоджа",
    "ki" => "Кирибати",
    "km" => "Комори",
    "kn" => "Св. Кийтс и Невис",
    "kp" => "Корея, Демократична Народна Република",
    "kr" => "Корея",
    "kw" => "Кувейт",
    "ky" => "Каймански О-ви",
    "kz" => "Казахстан",
    "la" => "Лаос",
    "lb" => "Ливан",
    "lc" => "Санта Лучия",
    "li" => "Лихтенштайн",
    "lk" => "Шри Ланка",
    "lr" => "Либерия",
    "ls" => "Лесото",
    "lt" => "Литва",
    "lu" => "Люксембург",
    "lv" => "Латвия",
    "ly" => "Либия",
    "ma" => "Мароко",
    "mc" => "Монако",
    "md" => "Република Молдавия",
    "mg" => "Мадагаскар",
    "mh" => "Маршалски О-ви",
    "mk" => "Македония",
    "ml" => "Мали",
    "mm" => "Мианмар",
    "mn" => "Монголия",
    "mo" => "Макао",
    "mp" => "Северни Мариянски О-ви",
    "mq" => "Мартиника",
    "mr" => "Мавритания",
    "ms" => "Монсерат",
    "mt" => "Малта",
    "mu" => "Мавриций",
    "mv" => "Малдиви",
    "mw" => "Малави",
    "mx" => "Мексико",
    "my" => "Малайзия",
    "mz" => "Мозамбик",
    "na" => "Намибия",
    "nc" => "Нова Каледония",
    "ne" => "Нигер",
    "nf" => "Норфолкски О-ви",
    "ng" => "Нигерия",
    "ni" => "Никарагуа",
    "nl" => "Холандия",
    "no" => "Норвегия",
    "np" => "Непал",
    "nr" => "Науру",
    "nu" => "Ние",
    "nz" => "Нова Зеландия",
    "om" => "Оман",
    "pa" => "Панама",
    "pe" => "Перу",
    "pf" => "Полинезия",
    "pg" => "Папуа Нова Гвинея",
    "ph" => "Филипини",
    "pk" => "Пакистан",
    "pl" => "Полша",
    "pm" => "Сен-Пиер и Микелон",
    "pn" => "Питкерн",
    "pr" => "Порто Рико",
	"ps" => "Palestinian Territory",
    "pt" => "Португалия",
    "pw" => "Пало",
    "py" => "Парагвай",
    "qa" => "Катар",
    "re" => "О-ви Реюнион",
    "ro" => "Румъния",
    "ru" => "Руска Федерация",
    "rs" => "Русия",
    "rw" => "Руанда",
    "sa" => "Саудитска Арабия",
    "sb" => "Соломонови О-ви",
    "sc" => "Сейшели",
    "sd" => "Судан",
    "se" => "Швеция",
    "sg" => "Сингапур",
    "sh" => "Св. Елена",
    "si" => "Словения",
    "sj" => "Сволбар/Ян Майен О-ви",
    "sk" => "Словакия",
    "sl" => "Сиера Леоне",
    "sm" => "Сан Марино",
    "sn" => "Сенегал",
    "so" => "Сомалия",
    "sr" => "Суринам",
    "st" => "Сан Томе и Принсипе",
    "su" => "СССР (бивш)",
    "sv" => "Ел Салвадор",
    "sy" => "Сирия",
    "sz" => "Swaziland",
    "tc" => "Турски и Кайкоски О-ви",
    "td" => "Чад",
    "tf" => "Южни Френски Територии",
    "tg" => "Того",
    "th" => "Тайланд",
    "tj" => "Таджикистан",
    "tk" => "Токело",
    "tm" => "Туркменистан",
    "tn" => "Тунис",
    "to" => "Тонго",
    "tp" => "Източен Тимор",
    "tr" => "Турция",
    "tt" => "Тринидад и Тобаго",
    "tv" => "Тувалу",
    "tw" => "Тайван",
    "tz" => "Танзания",
    "ua" => "Украйна",
    "ug" => "Уганда",
    "uk" => "Обединено Кралство",
    "gb" => "Великобритания",
    "um" => "О-ви на САД",
    "us" => "САД",
    "uy" => "Уругвай",
    "uz" => "Узбекистан",
    "va" => "Ватикана",
    "vc" => "Св. Винсент",
    "ve" => "Венецуела",
    "vg" => "Девствени О-ви, Великобритания",
    "vi" => "Девствени О-ви, САД",
    "vn" => "Виетнам",
    "vu" => "Вануату",
    "wf" => "Волис и Футуна",
    "ws" => "Самоа",
    "ye" => "Йемен",
    "yt" => "Майота",
    "yu" => "Югославия",
    "za" => "Южна Африка",
    "zm" => "Замбия",
    "zr" => "Заир",
    "zw" => "Зимбабве",
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
    "tv" => "Тувалу",
    "ws" => "Самоа",
);
?>