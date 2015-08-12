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
$lang['auteur_nom'] = "Yuki KODAMA (original: Tadashi Jokagi)"; // Translator's name
$lang['auteur_email'] = "yuki [[dot]] kodama [[at]] gmail [[dot]] com"; // Translator's email
$lang['charset'] = "utf-8"; // language file charset (utf-8 by default)
$lang['text_dir'] = "ltr"; // ('ltr' for left to right, 'rtl' for right to left)
$lang['lang_iso'] = "ja"; // iso language code
$lang['lang_libelle_en'] = "Japanese"; // english language name
$lang['lang_libelle_fr'] = "Japonais"; // french language name
$lang['unites_bytes'] = array('バイト', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
$lang['separateur_milliers'] = ','; // three thousand spells 3,000 in english
$lang['separateur_decimaux'] = '.'; // Separator for the float part of a number

//
// HTML Markups
//
$lang['head_titre'] = "phpMyVisites | オープンソースのアクセス解析とサイト統計"; // Pages header's title
$lang['head_keywords'] = "統計, 解析, オープンソース, 検索エンジン, statistics, analytics, analysis, referals, stats, free, open source, visits, search engines, keywords, web, websites"; // Header keywords
$lang['head_description'] = "phpMyVisites | GNU GPL の元で配布されているオープンソースのウェブサイト統計とアクセス解析を行うアプリケーションです。"; // Header description
$lang['logo_description'] = "phpMyVisites | オープンソースアクセス解析"; // This is the JS code description. Has to be short.

//
// Main menu & submenu
//
$lang['menu_visites'] = "アクセス";
$lang['menu_pagesvues'] = "ページビュー";
$lang['menu_suivi'] = "追跡";
$lang['menu_provenance'] = "アクセス元";
$lang['menu_configurations'] = "ユーザ環境";
$lang['menu_affluents'] = "検索";
$lang['menu_listesites'] = "サイト一覧";
$lang['menu_bilansites'] = "概要";
$lang['menu_jour'] = "日間";
$lang['menu_semaine'] = "週間";
$lang['menu_mois'] = "月間";
$lang['menu_annee'] = "年間";
$lang['menu_periode'] = "調査する期間: %s"; // Text formatted (e.g.: Studied period: Sunday, July the 14th)
$lang['liens_siteofficiel'] = "公式サイト";
$lang['liens_admin'] = "管理ページ";
$lang['liens_contacts'] = "連絡先";

//
// Divers
//
$lang['generique_nombre'] = "数";
$lang['generique_tauxsortie'] = "退出率";
$lang['generique_ok'] = "OK";
$lang['generique_timefooter'] = "ページ生成時間: %s秒"; // Time in seconds
$lang['generique_divers'] = "その他"; // (for the graphs)
$lang['generique_inconnu'] = "不明"; // (for the graphs)
$lang['generique_vous'] = "...あなた?";
$lang['generique_traducteur'] = "翻訳者";
$lang['generique_langue'] = "言語";
$lang['generique_autrelangure'] = "その他?"; // Other language, translations wanted
$lang['aucunvisiteur_titre'] = "この期間にアクセスはありません。"; 
$lang['generique_aucune_visite_bdd'] = "<b>警告 ! </b> 現在のサイトのデータベースに記録された訪問者は居ません。Please be sure you've installed your javascript code on your pages, with the correct phpMyVisites URL <u>IN</u> the Javascript code. Try documentation for help.";
$lang['generique_aucune_site_bdd'] = "データベースにサイトが登録されていません ! phpMyVisites スーパーユーザーとしてログインし、新規サイトの追加を試みてください。";
$lang['generique_retourhaut'] = "トップ";
$lang['generique_tempsvisite'] = "%1\$s 分 %2\$s 秒";
$lang['generique_tempsheure'] = "%s 時間"; // 4 h means 4 hours
$lang['generique_siteno'] = "サイト「%s」"; // Site "phpmyvisites"
$lang['generique_newsletterno'] = "ニュースレター「%s」"; // Newsletter "version 2 announcement"
$lang['generique_partnerno'] = "パートナー「%s」"; // Newsletter "version 2 announcement"
$lang['generique_general'] = "一般";
$lang['generique_user'] = "ユーザー %s"; // User "Admin"
$lang['generique_previous'] = "前へ";
$lang['generique_next'] = "次へ";
$lang['generique_lowpop'] = "統計から低い個体数を除外する";
$lang['generique_allpop'] = "統計にすべての個体数を含む";
$lang['generique_to'] = "から"; // 4 'to' 8
$lang['generique_total_on'] = "on"; // 4 to 8 'on' 10
$lang['generique_total'] = "合計"; // 4 to 8 'on' 10
$lang['generique_information'] = "情報";
$lang['generique_done'] = "終了!";
$lang['generique_other'] = "その他";
$lang['generique_description'] = "説明:";
$lang['generique_name'] = "名前:";
$lang['generique_variables'] = "変数";
$lang['generique_logout'] = "ログアウト";
$lang['generique_login'] = "ログイン";
$lang['generique_hits'] = "ヒット";
$lang['generique_errors'] = "エラー";
$lang['generique_site'] = "サイト";
$lang['generique_help_novisits'] = "ヒント：%sトラッカー(JavaScript集計プログラム)%sをページに挿入しましたか？";

//
// Authentication
//
$lang['login_password'] = "パスワード: "; // lowercase
$lang['login_login'] = "ログイン名: "; // lowercase
$lang['login_error'] = "ログインできません。ログイン名かパスワードが間違っています。";
$lang['login_error_nopermission'] = "このユーザアカウントは何も権限を持っていません。閲覧または管理の権限を設定してもらうように管理者に問い合わせてください。";
$lang['login_protected'] = "%sphpMyVisites%sの保護エリアに入ろうとしています。";

//
// Contacts & "Others ?"
//
$lang['contacts_titre'] = "連絡先";
$lang['contacts_langue'] = "翻訳";
$lang['contacts_merci'] = "ご協力ありがとうございます";
$lang['contacts_auteur'] = "phpMyVisites プロジェクトの作成と著作、ドキュメントは <strong>Matthieu Aubry</strong> です。";
$lang['contacts_questions'] = "<strong>技術的な質問、バグ報告、提案</strong>については、公式サイトのフォーラム(掲示板)「%s」を利用してください。その他の要望については、公式サイトのフォームを利用して、開発者と連絡をとってください。"; // adresse du site
$lang['contacts_trad1'] = "phpMyVisitesをあなたの言語に翻訳したいですか？ <strong>phpMyVisitesはあなたを必要としている</strong>ので是非参加してください！";
$lang['contacts_trad2'] = "phpMyVisitesの翻訳作業には長い時間(数時間)と対象となる言語についてのある程度の知識が必要です。しかし<strong>あなたがする仕事は多くのユーザのためになる</strong>ということを覚えておいてください。phpMyVisitesの翻訳に興味がある方は %s 公式ドキュメント %s をご覧ください。"; // lien vers la doc
$lang['contacts_doc'] = "%s 公式ドキュメント %s にはインストール方法、設定方法、各種機能の使い方など多くの情報があります。"; // lien vers la doc
$lang['contacts_thanks_dev'] = "<strong>%s</strong>、共同開発者の皆様、質の高い仕事をありがとう！";
$lang['contacts_merci3'] = "phpMyVisitesの公式サイトでは貢献者の全リストを見ることができます。";
$lang['contacts_merci2'] = "phpMyVisitesの翻訳者の方々に大変感謝しています:";

//
// Rss & Mails
//
$lang['rss_titre'] = "サイト名:%1\$s 日付:%2\$s"; // Site MyHomePage on Sunday 29
$lang['rss_go'] = "詳細な統計に移動する";
$lang['mail_sender_name'] = "サイト統計 (自動)";

//
// Visits Part
//
$lang['visites_titre'] = "アクセス情報";
$lang['visites_statistiques'] = "統計";
$lang['visites_periodesel'] = "指定された期間";
$lang['visites_visites'] = "アクセス数";
$lang['visites_uniques'] = "ユニーク訪問者数";
$lang['visites_pagesvues'] = "ページビュー";
$lang['visites_pagesvisiteurs'] = "１ページ当たりの訪問者";
$lang['visites_pagesvisites'] = "１ページ当りのアクセス数";
$lang['visites_pagesvisitessign'] = "１ページ当りの有効アクセス数";
$lang['visites_tempsmoyen'] = "訪問者の平均滞在時間";
$lang['visites_tempsmoyenpv'] = "１ページ当たりの平均閲覧時間";
$lang['visites_tauxvisite'] = "１ページ当たりの訪問率";
$lang['visites_average_visits_per_day'] = "１日当たりの平均アクセス数";
$lang['visites_recapperiode'] = "指定期間の概要";
$lang['visites_nbvisites'] = "アクセス数";
$lang['visites_aucunevivisite'] = "アクセスなし"; // in the table, must be short
$lang['visites_recap'] = "概要";
$lang['visites_unepage'] = "１ページ"; // (graph)
$lang['visites_pages'] = "%sページ"; // 1-2 pages (graph)
$lang['visites_min'] = "%s分"; // 10-15 min (graph)
$lang['visites_sec'] = "%s秒"; // 0-30 s (seconds, graph)
$lang['visites_grapghrecap'] = "統計概要";
$lang['visites_grapghrecaplongterm'] = "長期間統計概要";
$lang['visites_graphtempsvisites'] = "訪問者滞在時間の分布";
$lang['visites_graphtempsvisitesimg'] = "訪問者滞在時間の分布グラフ";
$lang['visites_graphheureserveur'] = "１時間ごとのアクセス数分布(サーバ時間)"; 
$lang['visites_graphheureserveurimg'] = "１時間ごとのアクセス数分布グラフ(サーバ時間)";
$lang['visites_graphheurevisiteur'] = "１時間ごとのアクセス数分布(ローカル時間)";
$lang['visites_graphheurelocalimg'] = "１時間ごとのアクセス数分布グラフ(ローカル時間)";
$lang['visites_longterm_statd'] = "長期間解析 (数日間の期間)";
$lang['visites_longterm_statm'] = "長期間解析 (数ヶ月の期間)";

//
// Sites Summary
//
$lang['summary_title'] = "サイト概要";
$lang['summary_stitle'] = "概要";

//
// Frequency Part
//
$lang['frequence_titre'] = "２回目以上の訪問者数";
$lang['frequence_nouveauxconnusgraph'] = "新規と２度目以上の比較グラフ";
$lang['frequence_nouveauxconnus'] = "新規および２度目以上の訪問者数";
$lang['frequence_titremenu'] = "周期";
$lang['frequence_visitesconnues'] = "２回目以上の訪問者数数";
$lang['frequence_nouvellesvisites'] = "新規訪問者";
$lang['frequence_visiteursconnus'] = "２回目以上の訪問者数";
$lang['frequence_nouveauxvisiteurs'] = "新規訪問者数";
$lang['frequence_returningrate'] = "リターン率";
$lang['pagesvues_vispervisgraph'] = "訪問者当たりのアクセス数のグラフ";
$lang['frequence_vispervis'] = "訪問者当たりのアクセス数";
$lang['frequence_vis'] = "アクセス";
$lang['frequence_visit'] = "1アクセス"; // (graph)
$lang['frequence_visits'] = "%sアクセス"; // (graph)

//
// Seen Pages
//
$lang['pagesvues_titre'] = "ページビュー情報";
$lang['pagesvues_joursel'] = "指定日";
$lang['pagesvues_jmoins7'] = "指定日から１週間前";
$lang['pagesvues_jmoins14'] = "指定日から２週間前";
$lang['pagesvues_moyenne'] = "(平均)";
$lang['pagesvues_pagesvues'] = "ページビュー";
$lang['pagesvues_pagesvudiff'] = "ユニークページビュー";
$lang['pagesvues_recordpages'] = "１人の訪問者が最も高いページビュー";
$lang['pagesvues_tabdetails'] = "ページビュー (%s 位から %s 位)"; // (from 1 to 21)
$lang['pagesvues_graphsnbpages'] = "１ページ当たりのアクセス数グラフ";
$lang['pagesvues_graphnbvisitespageimg'] = "ページビュー数でのアクセス数";
$lang['pagesvues_graphheureserveur'] = "サーバ時間でのアクセス数を表示するグラフ";
$lang['pagesvues_graphheureserveurimg'] = "サーバ時間でのアクセス数";
$lang['pagesvues_graphheurevisiteur'] = "地域時間でのアクセス数を表示するグラフ";
$lang['pagesvues_graphpageslocalimg'] = "地域時間でのアクセス数";
$lang['pagesvues_tempsparpage'] = "ページごとの閲覧時間";
$lang['pagesvues_total_time'] = "合計閲覧時間";
$lang['pagesvues_avg_time'] = "平均閲覧時間";
$lang['pagesvues_help_pagename'] = "各ページにわかりやすい名前を設定できることをしっていますか？";
$lang['pagesvues_help_track_dls'] = "ダウンロードや外部リンクのリダイレクトを統計に含められることを知っていますか？";

//
// Follows-Up
//
$lang['suivi_titre'] = "訪問者の動き";
$lang['suivi_pageentree'] = "入ったページ";
$lang['suivi_pagesortie'] = "出たページ";
$lang['suivi_tauxsortie'] = "退出率";
$lang['suivi_pageentreehits'] = "入った回数";
$lang['suivi_pagesortiehits'] = "出た回数";
$lang['suivi_singlepage'] = "特定の１ページのみのアクセス数";

//
// Origin
//
$lang['provenance_titre'] = "訪問者のアクセス元";
$lang['provenance_recappays'] = "国ごとの概要";
$lang['provenance_pays'] = "国";
$lang['provenance_paysimg'] = "国ごとの訪問者図";
$lang['provenance_fai'] = "プロバイダ";
$lang['provenance_nbpays'] = "異なる国籍の数 : %s";
$lang['provenance_provider'] = "プロバイダ"; // must be short
$lang['provenance_continent'] = "大陸";
$lang['provenance_mappemonde'] = "世界地図";
$lang['provenance_interetspays'] = "国の動向";

//
// Setup
//
$lang['configurations_titre'] = "ユーザ環境";
$lang['configurations_os'] = "OS";
$lang['configurations_osimg'] = "訪問者のOSを表示するグラフ";
$lang['configurations_navigateurs'] = "ブラウザ";
$lang['configurations_navigateursimg'] = "訪問者のブラウザを表示するグラフ";
$lang['configurations_resolutions'] = "画面解像度";
$lang['configurations_resolutionsimg'] = "訪問者の画面解像度を表示するグラフ";
$lang['configurations_couleurs'] = "色深度";
$lang['configurations_couleursimg'] = "訪問者の色深度を表示するグラフ";
$lang['configurations_rapport'] = "通常/ワイド";
$lang['configurations_large'] = "ワイド";
$lang['configurations_normal'] = "通常";
$lang['configurations_double'] = "デュアルモニタ";
$lang['configurations_plugins'] = "プラグイン";
$lang['configurations_navigateursbytype'] = "ブラウザ (種類別)";
$lang['configurations_navigateursbytypeimg'] = "ブラウザの種類を表示するグラフ";
$lang['configurations_os_interest'] = "OSの動向";
$lang['configurations_navigateurs_interest'] = "ブラウザの動向";
$lang['configurations_resolutions_interest'] = "画面解像度の動向";
$lang['configurations_couleurs_interest'] = "色深度の動向";
$lang['configurations_configurations'] = "環境";

//
// Referers
//
$lang['affluents_titre'] = "検索";
$lang['affluents_recapimg'] = "検索での訪問図";
$lang['affluents_directimg'] = "直接アクセス";
$lang['affluents_sitesimg'] = "ウェブサイト";
$lang['affluents_moteursimg'] = "検索エンジン";
$lang['affluents_referrersimg'] = "リファラ";
$lang['affluents_moteurs'] = "検索エンジン";
$lang['affluents_nbparmoteur'] = "検索エンジンにより提供されたアクセス数 : %s";
$lang['affluents_aucunmoteur'] = "検索エンジンにより提供された訪問はありません。";
$lang['affluents_motscles'] = "キーワード";
$lang['affluents_nbmotscles'] = "個別キーワード数 : %s";
$lang['affluents_aucunmotscles'] = "キーワードが見つかりません。";
$lang['affluents_sitesinternet'] = "ウェブサイト";
$lang['affluents_nbautressites'] = "他のウェブサイトからのアクセス数 : %s";
$lang['affluents_nbautressitesdiff'] = "異なるウェブサイトの数 : %s";
$lang['affluents_aucunautresite'] = "ウェブサイトからの訪問はありません。";
$lang['affluents_entreedirecte'] = "直接アクセス";
$lang['affluents_nbentreedirecte'] = "直接アクセス数 : %s";
$lang['affluents_nbpartenaires'] = "パートナーにより提供されたアクセス数 : %s";
$lang['affluents_aucunpartenaire'] = "パートナーサイトにより提供されたアクセス数はありません。";
$lang['affluents_nbnewsletters'] = "ニュースレターにより提供されたアクセス数 : %s";
$lang['affluents_aucunnewsletter'] = "ニュースレターにより提供されたアクセス数はありません。";
$lang['affluents_details'] = "詳細"; // In the results of the referers array
$lang['affluents_interetsmoteurs'] = "検索エンジンの動向";
$lang['affluents_interetsmotscles'] = "キーワードの動向";
$lang['affluents_interetssitesinternet'] = "ウェブサイトの動向";
$lang['affluents_partenairesimg'] = "パートナー";
$lang['affluents_partenaires'] = "パートナー";
$lang['affluents_interetspartenaires'] = "パートナーの動向";
$lang['affluents_newslettersimg'] = "ニュースレター";
$lang['affluents_newsletters'] = "ニュースレター";
$lang['affluents_interetsnewsletters'] = "ニュースレターの動向";
$lang['affluents_type'] = "リファラの種類";
$lang['affluents_interetstype'] = "アクセスの種類の動向";

//
// Summary
//
$lang['purge_titre'] = "アクセス数と検索の概要";
$lang['purge_intro'] = "この期間は管理に削除されました、本質的な統計だけが保存されました。";
$lang['admin_purge'] = "データベースメンテナナス";
$lang['admin_purgeintro'] = "このセクションは phpMyVisites により使用されるテーブルを管理します。テーブルによって使用されるディスク容量を参照したり、それらを最適化したり、古いレコードを削除することができます。これにより、データベース中のテーブルのサイズを制限することができるでしょう。";
$lang['admin_optimisation'] = "[ %s ]の最適化中..."; // Tables names
$lang['admin_postopt'] = "合計サイズは %chiffres% %unites% 減少しました。"; // 28 Kb
$lang['admin_purgeres'] = "次の期間を削除します: %s";
$lang['admin_purge_fini'] = "テーブルの削除を終了しました...";
$lang['admin_bdd_nom'] = "名前";
$lang['admin_bdd_enregistrements'] = "レコード数";
$lang['admin_bdd_taille'] = "テーブル容量";
$lang['admin_bdd_opt'] = "最適化";
$lang['admin_bdd_purge'] = "Purge Criteria";
$lang['admin_bdd_optall'] = "全て最適化";
$lang['admin_purge_j'] = "%s 日より古い記録を削除する";
$lang['admin_purge_s'] = "%s 週より古い記録を削除する";
$lang['admin_purge_m'] = "%s ヶ月より古い記録を削除する";
$lang['admin_purge_y'] = "%s 年より古い記録を削除する";
$lang['admin_purge_logs'] = "すべてのログを削除する";
$lang['admin_purge_autres'] = "テーブル「%s」への共通項目を削除する";
$lang['admin_purge_none'] = "できる操作はありません";
$lang['admin_purge_cal'] = "演算と除去 (これには数分かかる場合があります)";
$lang['admin_alias_title'] = "ウェブサイトのエイリアスとURL";
$lang['admin_partner_title'] = "ウェブサイトパートナー";
$lang['admin_newsletter_title'] = "ウェブサイトニュースレター";
$lang['admin_ip_exclude_title'] = "統計から除外するべき IP アドレスの範囲";
$lang['admin_name'] = "名前:";
$lang['admin_error_ip'] = "IP アドレスは、正確な書式でなければなりません。";
$lang['admin_site_name'] = "サイト名";
$lang['admin_site_url'] = "サイトのメインURL";
$lang['admin_db_log'] = "データベース設定を変更するためにphpMyVisitesスーパーユーザーとしてログインします。";
$lang['admin_error_critical'] = "エラー。phpMyVisitesを正常に動作させるために修復が必要です。";
$lang['admin_warning'] = "警告。いくつかのオプション機能を除いて、phpMyVisitesは正常に動作します。";
$lang['admin_move_group'] = "グループを移動する:";
$lang['admin_move_select'] = "グループを選択してください";
$lang['admin_site_select'] = "Site to administrate";

//
// Setup
//
$lang['admin_intro'] = "phpMyVisitesの管理ページにようこそ。ここでは全ての設定を変更することができます。何か問題があった場合は公式サイトの%sドキュメント%sを参照してください。"; // link to the doc
$lang['admin_configetperso'] = "一般設定";
$lang['admin_afficherjavascript'] = "JavaScript集計プログラムを表示する";
$lang['admin_cookieadmin'] = "統計の集計管理をしない";
$lang['admin_ip_ranges'] = "統計でIP アドレス/IP アドレスの範囲をカウントしない";
$lang['admin_sitesenregistres'] = "対象ウェブサイト:";
$lang['admin_retour'] = "戻る";
$lang['admin_cookienavigateur'] = "統計から管理を除外してもいいでしょう。この方法は cookie を用います。また、このオプションは現在のブラウザでのみ処理されます。いつでもこのオプションは変更できます。";
$lang['admin_prendreencompteadmin'] = "統計を集計管理する (cookieを削除します)";
$lang['admin_nepasprendreencompteadmin'] = "統計を集計管理しない  (cookieを作成します)";
$lang['admin_etatcookieoui'] = "管理者はこのウェブサイト用統計値に数えます (これはデフォルト設定で、通常の訪問者と見なされます)";
$lang['admin_etatcookienon'] = "あなたをこのウェブサイトの統計値に数えません (あなたの訪問は、このウェブサイトで数えられないでしょう)";
$lang['admin_deleteconfirm'] = "本当に%sを削除してもよろしいですか？";
$lang['admin_sitedeletemessage'] = "<u>注意</u>：このサイトに関連する全てのデータが削除されます。削除されたデータを元に戻す方法はありません。";
$lang['admin_confirmyes'] = "はい、削除します";
$lang['admin_confirmno'] = "いいえ、削除しません";
$lang['admin_nonewsletter'] = "このサイトのニュースレターが見つかりません!";
$lang['admin_nopartner'] = "このサイトのパートナーが見つかりません!";
$lang['admin_get_question'] = "GET変数(URL変数)を記録しますか?";
$lang['admin_get_a1'] = "全て記録する";
$lang['admin_get_a2'] = "いくつかのURL変数は記録しない";
$lang['admin_get_a3'] = "指定した変数のみ記録する";
$lang['admin_get_a4'] = "指定した変数以外は全て記録する";
$lang['admin_get_default_pdf'] = "PDF report :";
$lang['admin_get_default_pdfdefault'] = "Defaut PDF report"; 
$lang['admin_get_default_theme'] = "Visual theme for this site:";
$lang['admin_get_list'] = "変数名 (<b>;</b> で分割されたリスト) <br/>例 : %s";
$lang['admin_required'] = "%sは必須入力項目です。";
$lang['admin_title_required'] = "必須項目";
$lang['admin_write_dir'] = "書き込み可能なディレクトリ";
$lang['admin_chmod_howto'] = "これらのディレクトリはサーバにより書き込み可能である必要があります。これは、あなたがFTPソフトウェアで、それらに対して chmod 777 を行うことを意味します。 (ディレクトリで右クリックからパーミッション(もしくは chmod))";
$lang['admin_optional'] = "オプション項目";
$lang['admin_memory_limit'] = "メモリ制限";
$lang['admin_allowed'] = "が使用可能";
$lang['admin_webserver'] = "ウェブサーバ";
$lang['admin_server_os'] = "サーバ OS";
$lang['admin_server_time'] = "サーバ時間";
$lang['admin_legend'] = "凡例:";
$lang['admin_error_url'] = "URLは正確なフォーマットでなければなりません : %s (最後のスラッシュ(「/」)は外します)";
$lang['admin_url_n'] = "URL %s:";
$lang['admin_url_aliases'] = "URLエイリアス";
$lang['admin_logo_question'] = "ロゴを表示しますか?";
$lang['admin_type_again'] = "(再度入力)";
$lang['admin_admin_mail'] = "上級管理者のEメール";
$lang['admin_admin'] = "上級管理者";
$lang['admin_phpmv_path'] = "phpMyVisitesの絶対URL";
$lang['admin_valid_email'] = "Eメールは有効なEメールでなければなりません。";
$lang['admin_valid_pass'] = "パスワードはより複雑でなければいけません (最低 6 文字で、数字を含まなければなりません)";
$lang['admin_match_pass'] = "パスワードが一致しません";
$lang['admin_no_user_group'] = "このサイトのこのグループにユーザーが居ません。";
$lang['admin_recorded_nl'] = "記録済ニュースレター:";
$lang['admin_recorded_partners'] = "記録済パートナー:";
$lang['admin_recorded_users'] = "記録済ユーザー:";
$lang['admin_select_site_title'] = "サイトを選択してください。";
$lang['admin_select_user_title'] = "ユーザーを選択してください。";
$lang['admin_no_user_registered'] = "登録されたユーザーは居ません!";
$lang['admin_configuration'] = "設定";
$lang['admin_general_conf'] = "一般設定";
$lang['admin_group_title'] = "グループ管理 (権限)";
$lang['admin_user_title'] = "ユーザー管理";
$lang['admin_user_add'] = "ユーザーを追加する";
$lang['admin_user_mod'] = "ユーザーを修正する";
$lang['admin_user_del'] = "ユーザーを削除する";
$lang['admin_user_oldPwd'] = "Old password"; 
$lang['admin_user_oldPwd_bad'] = "Old password incorrect."; 
$lang['admin_server_info'] = "サーバ情報";
$lang['admin_send_mail'] = "Eメールで統計を送信する";
$lang['admin_rss_feed'] = "統計のRSSフィード配信";
$lang['admin_rss_feed_specific_site'] = "Website '%s' Statistics - RSS"; // site 2
$lang['admin_site_admin'] = "サイト管理";
$lang['admin_site_add'] = "サイトを追加する";
$lang['admin_site_mod'] = "サイトを修正する";
$lang['admin_site_del'] = "サイトを削除する";
$lang['admin_nl_add'] = "ニュースレターを追加する";
$lang['admin_nl_mod'] = "ニュースレターを修正する";
$lang['admin_nl_del'] = "ニュースレターを削除する";
$lang['admin_partner_add'] = "パートナーを追加する";
$lang['admin_partner_mod'] = "パートナー名と URL を修正する";
$lang['admin_partner_del'] = "パートナーを削除する";
$lang['admin_url_alias'] = "別名 URL 管理";
$lang['admin_group_admin_n'] = "統計閲覧と管理権限";
$lang['admin_group_admin_d'] = "ユーザーはサイト統計の閲覧とサイト情報の編集ができます";
$lang['admin_group_view_n'] = "統計を閲覧する";
$lang['admin_group_view_d'] = "ユーザーはサイト統計の閲覧のみできます。管理権限はありません。";
$lang['admin_group_noperm_n'] = "権限がありません";
$lang['admin_group_noperm_d'] = "このグループのユーザーは、閲覧統計または情報の編集の許可を持っていません。";
$lang['admin_group_stitle'] = "変更したいユーザーの選択、また選択済ユーザーの移動をしたいグループを選択することでユーザーを編集できます。";
$lang['admin_url_generate_download_link_example'] = "サンプル";
$lang['admin_url_generate_title'] = "ファイルダウンロード / URLリダイレクト : URL生成";
$lang['admin_url_generate_intro'] = "phpMyVisitesはファイルのダウンロードや外部リンクのクリックをカウントすることができます。結果は「ページビュー」に表示されます。</p><p class='texte'>これらの機能を達成するためにphpMyVisitesのカウント用プログラムファイルへのリンクを使用する必要があります(カウント後は指定された本来のURLにリダイレクトされます)。そのような特殊なURLを生成するのは少し面倒であり、またphpMyVisitesは誰にとってもシンプルなのに強力なツールでなければならないため、簡単に使えるツールを用意しました。説明に従って各項目を入力して、「Generate URL」ボタンを押してください。そうすればとても簡単にファイルのダウンロードや外部リンクのリダイレクトをカウントすることができます！";
$lang['admin_url_generate_site_selection'] = "ダウンロードまたは外部リンクをカウントしたいサイトを選んでください：";
$lang['admin_url_generate_tag_selection'] = "Select the tag for which you want to count a file download or a URL redirection"; 
$lang['admin_url_generate_enter_url'] = "統計に含めたいファイルの絶対URLまたは外部リンクのURLを入力してください：";
$lang['admin_url_generate_help_enter_url'] = "ヘルプ：ファイルであれば '<b>http://www.yoursite.com/file/brilliant-software.zip</b>'、リダイレクトであれば'<b>http://www.the-site-to-redirect.com</b>'というようなURLである必要があります。";
$lang['admin_url_generate_friendly_name'] = "ページビューに表示されるわかりやすい名前を入力してください：";
$lang['admin_url_generate_help_friendly_name'] = "ヘルプ：ページビューにおける表示を見やすくするためにファイルまたはURLリダイレクトをカテゴリ分けすることができます。カテゴリの区切り文字として<b>「/(スラッシュ)」</b>を用います。例えば名前を<b>「my photos download/Summer in France」</b>と<b>「Partners/PHP.net website」</b>にした場合、分類されるフォルダはそれぞれ<b>「my photos download」</b>と<b>「Partners」</b>になります。これらはページビューで見ることができます。";
$lang['admin_url_generate_result_url'] = "これが生成されたリンクです：";
$lang['admin_url_generate_html_result'] = "これはHTMLリンクです：";
$lang['admin_url_generate_html_onclick'] = "Here is the HTML using onclick event:";
$lang['admin_url_generate_image_legend'] = "ページビューの表示例：";
$lang['admin_site_link_javascript'] = "%sページに集計プログラムをインストールする必要があります(JavaScript集計プログラムをコピー＆ペースト)。クリックするとJavaScript集計プログラムが表示されます。%s";
$lang['admin_last_version'] = "phpMyVisitesを最新バージョンに保ちますか？(推奨)";
$lang['admin_general_config_firstday'] = "週の最初の曜日";
$lang['admin_default_language'] = "デフォルトの言語 <br/>各種メールはここで設定した言語が使用されます。";
$lang['admin_back_statisitics'] = "Go to statistics"; 

//
// Pdf export
//
$lang['pdf_generate_link'] = "%sサイト全ての統計情報のPDFを生成する";
$lang['pdf_summary_generate_link'] = "統計概要のPDFを生成する";
$lang['pdf_free_page'] = "新規ページ";
$lang['pdf_free_chapter'] = "新規チャプター";
$lang['pdf_page_break'] = "改ページ";
$lang['pdf_page_summary'] = "概要";
$lang['generique_pdfno'] = "PDF %s"; // Newsletter "version 2 announcement"
$lang['admin_pdf_title'] = "サイトPDF"; 
$lang['admin_nopdf'] = "このサイトのPDFはありません！";
$lang['admin_recorded_pdf'] = "保存済みPDF:";
$lang['admin_pdf_add'] = "PDFの追加";
$lang['admin_pdf_mod'] = "PDFの変更";
$lang['admin_pdf_del'] = "PDFの削除";
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
$lang['install_loginmysql'] = "データベースログイン名";
$lang['install_mdpmysql'] = "データベースパスワード";
$lang['install_serveurmysql'] = "データベースサーバ";
$lang['install_basemysql'] = "データベース名";
$lang['install_prefixetable'] = "テーブル接頭辞";
$lang['install_utilisateursavances'] = "高度なユーザー (オプション)";
$lang['install_oui'] = "はい";
$lang['install_non'] = "いいえ";
$lang['install_ok'] = "OK";
$lang['install_probleme'] = "エラー：";
$lang['install_DirectoriesWriteError'] = "<b>エラー</b><br/>次のフォルダーに書き込みできません。%s ";
$lang['install_loginadmin'] = "上級管理者のログイン名";
$lang['install_mdpadmin'] = "上級管理者のパスワード";
$lang['install_chemincomplet'] = "phpMyVisites アプリケーションへの完全パス (http://www.mysite.com/rep1/rep3/phpmyvisites/ のように)パスは「<strong>/</strong>」で終わらなければなりません。";
$lang['install_afficherlogo'] = "サイト上にロゴを表示しますか? %s <br />ロゴを表示することによって、phpMyVisitesの宣伝になり、急速な発展につながります。さらにこのオープンソースアプリケーションに多くの時間を割いた開発者に感謝するための手軽な方法でもあります。"; // %s replaced by the logo image
$lang['install_affichergraphique'] = "統計グラフを表示します。";
$lang['install_valider'] = "設定"; // during installation and for login
$lang['install_popup_logo'] = "ロゴを選択してください";
$lang['install_logodispo'] = "他のロゴを見る";
$lang['install_welcome'] = "ようこそ！";
$lang['install_system_requirements'] = "動作環境";
$lang['install_database_setup'] = "データベース設定";
$lang['install_create_tables'] = "テーブル作成";
$lang['install_general_setup'] = "一般設定";
$lang['install_create_config_file'] = "設定ファイルの作成";
$lang['install_first_website_setup'] = "最初のウェブサイトの追加";
$lang['install_display_javascript_code'] = "JavaScript集計プログラムの表示";
$lang['install_finish'] = "完了！";
$lang['install_txt2'] = "インストール完了時にphpMyVisitesの利用者数を知るために公式サイトに情報を送信します。ご協力のほど宜しくお願い致します。";
$lang['install_database_setup_txt'] = "データベースに関する設定を入力してください。";
$lang['install_general_config_text'] = "";
$lang['install_config_file'] = " 管理者ユーザー情報の入力に成功しました。";
$lang['install_js_code_text'] = "<p>全てのアクセスをカウントするには、全てのページにJavaScript集計プログラムを挿入する必要があります。</p><p> PHPを使用していないサイトでも問題ありません。<strong>phpMyVisitesは全ての種類のサイトで動作します。(それがHTML・ASP・Perlまたはそれ以外のいかなる言語でも).</strong> </p><p>以下が挿入しなければならないプログラムです: (これをコピーして全てのページに貼り付けてください)</p>";
$lang['install_intro'] = "phpMyVisitesのインストールへようこそ。";
$lang['install_intro2'] = "インストールは簡単な%sつのステップに分かれており、10分程度で終わります。";
$lang['install_next_step'] = "次のステップへ";
$lang['install_status'] = "インストールの進行状況";
$lang['install_done'] = "インストール%s%%完了"; // Install 25% complete
$lang['install_site_success'] = "ウェブサイトの作成に成功しました!";
$lang['install_site_info'] = "最初のウェブサイトに関する情報を全て入力してください。";
$lang['install_go_phpmv'] = "phpMyVisitesにアクセス！";
$lang['install_congratulation'] = "おめでとうございます! phpMyVisitesのインストールが完了しました。";
$lang['install_end_text'] = "JavaScript集計プログラムがページに正しく設定されていることを確認し、最初の訪問者を待ってください！";
$lang['install_db_ok'] = "データベースサーバに正しく接続できました！";
$lang['install_table_exist'] = "データベース上に 既に phpMyVisites テーブルが存在します。";
$lang['install_table_choice'] = "既存のデータベーステーブルを再利用するか、既存のデータベースのデータを全て削除し、クリーンインストールするか、どちらかを選んでください。";
$lang['install_table_erase'] = "すべてのテーブルを消去する (注意深く!)";
$lang['install_table_reuse'] = "既に存在するテーブルを再利用する";
$lang['install_table_success'] = "テーブルの作成に成功しました!";
$lang['install_send_mail'] = "サイトごとの統計概要を毎日メールで受信しますか？";

//
// Update Step
//
$lang['update_title'] = "phpMyVisitesの更新";
$lang['update_subtitle'] = "phpMyVisitesの更新を検出しました。";
$lang['update_versions'] = "古いバージョンの%sから新しい%sに更新されました。";
$lang['update_db_updated'] = "データベースの更新に成功しました!";
$lang['update_continue'] = "phpMyVisitesを続ける";
$lang['update_jschange'] = "警告! <br /> phpMyVisitesのJavaScript集計プログラムが変更されました。";

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
$lang['tdate1'] = "%yearlong% 年 %monthlong% %daynumeric% 日(%daylong%)";

// Monday 10
$lang['tdate2'] = "%daylong% %daynumeric%";

// Week February 10 To February 17 2004
$lang['tdate3'] = "%yearlong% 年 %monthlong% %daynumeric% 日から %monthlong2% %daynumeric2% の週";

// February 2004 Month
$lang['tdate4'] = "%yearlong% 年 %monthlong%の月";

// December 2003
$lang['tdate5'] = "%yearlong% 年 %monthlong%";

// 10 Febuary week
$lang['tdate6'] = "%monthlong% %daynumeric%の週";

// 10-02-2003 // February 2 2003
$lang['tdate7'] = "%yearlong% 年 %monthnumeric% %daynumeric%";

// Mon 10 (Only for Graphs purpose)
$lang['tdate8'] = "%daynumeric%(%dayshort%)";

// Week 10 Feb (Only for Graphs purpose)
$lang['tdate9']  = " %daynumeric% %monthshort%の週";

// Dec 04 (Only for Graphs purpose)
$lang['tdate10'] = "%yearshort%-%monthshort%";

// Year 2004
$lang['tdate11'] = "%yearlong%年";

// 2004
$lang['tdate12'] = "%yearlong%年";

// 31
$lang['tdate13'] = "%daynumeric% ";

// Months
$lang['moistab']['01'] = "1月";
$lang['moistab']['02'] = "2月";
$lang['moistab']['03'] = "3月";
$lang['moistab']['04'] = "4月";
$lang['moistab']['05'] = "5月";
$lang['moistab']['06'] = "6月";
$lang['moistab']['07'] = "7月";
$lang['moistab']['08'] = "8月";
$lang['moistab']['09'] = "9月";
$lang['moistab']['10'] = "10月";
$lang['moistab']['11'] = "11月";
$lang['moistab']['12'] = "12月";

// Months (Graph purpose, 4 chars max)
$lang['moistab_graph']['01'] = "1";
$lang['moistab_graph']['02'] = "2";
$lang['moistab_graph']['03'] = "3";
$lang['moistab_graph']['04'] = "4";
$lang['moistab_graph']['05'] = "5";
$lang['moistab_graph']['06'] = "6";
$lang['moistab_graph']['07'] = "7";
$lang['moistab_graph']['08'] = "8";
$lang['moistab_graph']['09'] = "9";
$lang['moistab_graph']['10'] = "10";
$lang['moistab_graph']['11'] = "11";
$lang['moistab_graph']['12'] = "12";

// Day of the week
$lang['jsemaine']['Mon'] = "月曜日";
$lang['jsemaine']['Tue'] = "火曜日";
$lang['jsemaine']['Wed'] = "水曜日";
$lang['jsemaine']['Thu'] = "木曜日";
$lang['jsemaine']['Fri'] = "金曜日";
$lang['jsemaine']['Sat'] = "土曜日";
$lang['jsemaine']['Sun'] = "日曜日";

// Day of the week (Graph purpose, 4 chars max)
$lang['jsemaine_graph']['Mon'] = "月";
$lang['jsemaine_graph']['Tue'] = "火";
$lang['jsemaine_graph']['Wed'] = "水";
$lang['jsemaine_graph']['Thu'] = "木";
$lang['jsemaine_graph']['Fri'] = "金";
$lang['jsemaine_graph']['Sat'] = "土";
$lang['jsemaine_graph']['Sun'] = "日";

// First letter of each day, weekdays ordered
$lang['calendrier_jours'][0] = "月";
$lang['calendrier_jours'][1] = "火";
$lang['calendrier_jours'][2] = "水";
$lang['calendrier_jours'][3] = "木";
$lang['calendrier_jours'][4] = "金";
$lang['calendrier_jours'][5] = "土";
$lang['calendrier_jours'][6] = "日";

// DO NOT ALTER!
$lang['weekdays']['Mon'] = '1';
$lang['weekdays']['Tue'] = '2';
$lang['weekdays']['Wed'] = '3';
$lang['weekdays']['Thu'] = '4';
$lang['weekdays']['Fri'] = '5';
$lang['weekdays']['Sat'] = '6';
$lang['weekdays']['Sun'] = '7';

// Continents
$lang['eur'] = "ヨーロッパ";
$lang['afr'] = "アフリカ";
$lang['asi'] = "アジア";
$lang['ams'] = "南と中央アメリカ";
$lang['amn'] = "北アメリカ";
$lang['oce'] = "オセアニア";

// Oceans
$lang['oc_pac'] = "太平洋";
$lang['oc_atl'] = "大西洋";
$lang['oc_ind'] = "インド洋";

// Countries
$lang['domaines'] = array(
    "xx" => "不明",
    "ac" => "アセンション島",
    "ad" => "アンドラ",
    "ae" => "アラブ首長国連邦",
    "af" => "アフガニスタン",
    "ag" => "アンティグア・バーブーダ",
    "ai" => "アングイラ",
    "al" => "アルバニア",
    "am" => "アルメニア",
    "an" => "オランダ領アンティル",
    "ao" => "アンゴラ",
    "aq" => "南極大陸",
    "ar" => "アルゼンチン",
    "as" => "アメリカ領サモア",
    "at" => "オーストリア",
    "au" => "オーストラリア",
    "aw" => "アルーバ",
    "az" => "アゼルバイジャン",
    "ba" => "ボスニア-ヘルツェゴヴィナ",
    "bb" => "バルバドス",
    "bd" => "バングラデッシュ",
    "be" => "ベルギー",
    "bf" => "ブルキナファソ",
    "bg" => "ブルガリア",
    "bh" => "バーレーン",
    "bi" => "ブルンディ",
    "bj" => "ベニン",
    "bm" => "バーミューダ",
    "bn" => "ブルネイ・ダルサラーム",
    "bo" => "ボリビア",
    "br" => "ブラジル",
    "bs" => "バハマ",
    "bt" => "ブータン",
    "bv" => "ブーヴェ島",
    "bw" => "ボツワナ",
    "by" => "ベラルーシ",
    "bz" => "ベリーズ",
    "ca" => "カナダ",
    "cc" => "ココス(キーリング)島",
    "cd" => "コンゴ民主主義共和国",
    "cf" => "中央アフリカ共和国",
    "cg" => "コンゴ人民共和国",
    "ch" => "スイス",
    "ci" => "コートディボワール",
    "ck" => "クック諸島",
    "cl" => "チリ共和国",
    "cm" => "カメルーン共和国",
    "cn" => "中国",
    "co" => "コロンビア",
    "cr" => "コスタリカ共和国",
	"cs" => "セルビア・モンテネグロ",
    "cu" => "キューバ",
    "cv" => "カーボベルデ",
    "cx" => "クリスマス島",
    "cy" => "キプロス",
    "cz" => "チェコ共和国",
    "de" => "ドイツ",
    "dj" => "ジブチ共和国",
    "dk" => "デンマーク",
    "dm" => "ドミニカ国",
    "do" => "ドミニカ共和国",
    "dz" => "アルジェリア民主人民共和国",
    "ec" => "エクアドル共和国",
    "ee" => "エストニア共和国",
    "eg" => "エジプト",
    "eh" => "西サハラ",
    "er" => "エリトリア",
    "es" => "スペイン",
    "et" => "エチオピア人民民主共和国",
    "fi" => "フィンランド共和国",
    "fj" => "フィジー共和国",
    "fk" => "フォークランド(マルビナス)諸島",
    "fm" => "ミクロネシア連邦",
    "fo" => "フェロー諸島",
    "fr" => "フランス",
    "ga" => "ガボン",
    "gd" => "グレナダ",
    "ge" => "ジョージア",
    "gf" => "フランスガイアナ協同共和国",
    "gg" => "ガーンジー島",
    "gh" => "ガーナ",
    "gi" => "ジブラルタル",
    "gl" => "グリーンランド",
    "gm" => "ガンビア共和国",
    "gn" => "ギニア共和国",
    "gp" => "グアドループ",
    "gq" => "赤道ギニア共和国",
    "gr" => "ギリシア",
    "gs" => "サウスジョージアとサウスサンドイッチ諸島",
    "gt" => "グアテマラ",
    "gu" => "グアム",
    "gw" => "ギニアビサウ共和国",
    "gy" => "ガイアナ協同共和国",
    "hk" => "香港",
    "hm" => "ハード島とマクドナルド島",
    "hn" => "ホンジュラス共和国",
    "hr" => "クロアチア",
    "ht" => "ハイチ",
    "hu" => "ハンガリー",
    "id" => "インドネシア",
    "ie" => "アイルランド",
    "il" => "イスラエル",
    "im" => "マン島",
    "in" => "インディア",
    "io" => "英国のインド洋領域",
    "iq" => "イラク",
    "ir" => "イラン、イスラム共和国",
    "is" => "アイスランド",
    "it" => "イタリア",
    "je" => "ジャージー島",
    "jm" => "ジャマイカ",
    "jo" => "ヨルダン共和国",
    "jp" => "日本",
    "ke" => "ケニア",
    "kg" => "キルギスタン共和国",
    "kh" => "カンボジア国",
    "ki" => "キリバス共和国",
    "km" => "コモロ・イスラム連邦共和国",
    "kn" => "セントキッツとネヴィス",
    "kp" => "北朝鮮",
    "kr" => "韓国",
    "kw" => "クゥェート",
    "ky" => "ケイマン諸島",
    "kz" => "カザフスタン",
    "la" => "ラオ人民民主共和国",
    "lb" => "レバノン共和国",
    "lc" => "セントルシア",
    "li" => "リヒテンシュタイン公国",
    "lk" => "スリランカ民主社会主義共和国",
    "lr" => "リベリア共和国",
    "ls" => "レソト王国",
    "lt" => "リトアニア",
    "lu" => "ルクセンブルク大公国",
    "lv" => "ラトビア共和国",
    "ly" => "リビア",
    "ma" => "モロッコ",
    "mc" => "モナコ",
    "md" => "モルドバ共和国",
    "mg" => "マダガスカル",
    "mh" => "マーシャル諸島",
    "mk" => "マケドニア",
    "ml" => "マリ",
    "mm" => "ミャンマー",
    "mn" => "モンゴル",
    "mo" => "マカオ",
    "mp" => "北マリアナ諸島",
    "mq" => "マルティニーク島",
    "mr" => "モーリタニア・イスラム共和国",
    "ms" => "モントセラト",
    "mt" => "マルタ共和国",
    "mu" => "モーリシャス共和国",
    "mv" => "モルディブ共和国",
    "mw" => "マラウイ共和国",
    "mx" => "メキシコ",
    "my" => "マレーシア連邦",
    "mz" => "モザンビーク人民共和国",
    "na" => "ナミビア共和国",
    "nc" => "ニューカレドニア",
    "ne" => "ニジェール共和国",
    "nf" => "ノーフォーク島",
    "ng" => "ナイジェリア連邦共和国",
    "ni" => "ニカラグア共和国",
    "nl" => "オランダ王国",
    "no" => "ノルウェイ",
    "np" => "ネパール",
    "nr" => "ナウル共和国",
    "nu" => "ニウエ",
    "nz" => "ニュージーランド",
    "om" => "オマン",
    "pa" => "パナマ",
    "pe" => "ペルー",
    "pf" => "仏領ポリネシア",
    "pg" => "パプアニューギニア",
    "ph" => "フィリピン",
    "pk" => "パキスタン",
    "pl" => "ポーランド",
    "pm" => "サンピエール・エ・ミクロン",
    "pn" => "ピトケアン",
    "pr" => "プエルトリコ",
	"ps" => "パレスチナ自治政府",
    "pt" => "ポルトガル",
    "pw" => "パラオ",
    "py" => "パラグアイ",
    "qa" => "カタール",
    "re" => "レユニオン島",
    "ro" => "ルーマニア",
    "ru" => "ロシア連邦",
    "rs" => "ロシア",
    "rw" => "ルワンダ",
    "sa" => "サウジアラビア",
    "sb" => "ソロモン諸島",
    "sc" => "セーシェル共和国",
    "sd" => "スーダン",
    "se" => "スウェーデン",
    "sg" => "シンガポール",
    "sh" => "セントヘレナ",
    "si" => "スロベニア共和国",
    "sj" => "スバールバル諸島",
    "sk" => "スロヴァキア",
    "sl" => "シエラレオネ共和国",
    "sm" => "サンマリノ共和国",
    "sn" => "セネガル共和国",
    "so" => "ソマリア民主共和国",
    "sr" => "スリナム共和国",
    "st" => "サントメプリンシペ共和国",
    "su" => "旧ソビエト連邦",
    "sv" => "エルサルバドル",
    "sy" => "シリアアラブ共和国",
    "sz" => "スイス",
    "tc" => "タークスアンドカイコス諸島",
    "td" => "チャド",
    "tf" => "フランスの南部テリトリ",
    "tg" => "トーゴ共和国",
    "th" => "タイ王国",
    "tj" => "タジキスタン共和国",
    "tk" => "トケラウ",
    "tm" => "トルクメニスタン",
    "tn" => "チュニジア共和国",
    "to" => "トンガ",
    "tp" => "東ティモール",
    "tr" => "トルコ共和国",
    "tt" => "トリニダード・トバゴ共和国",
    "tv" => "ツバル",
    "tw" => "中国の台湾および州",
    "tz" => "タンザニア連合共和国",
    "ua" => "ウクライナ",
    "ug" => "ウガンダ",
    "uk" => "イギリス",
    "gb" => "グレートブリテン",
    "um" => "アメリカ島嶼部",
    "us" => "アメリカ合衆国",
    "uy" => "ウルグアイ東方共和国",
    "uz" => "ウズベキスタン共和国",
    "va" => "バチカン市国",
    "vc" => "セントヴィンセント・グレナディン",
    "ve" => "ベネズエラ",
    "vg" => "バージン群島、英国",
    "vi" => "バージン群島、米国",
    "vn" => "ベトナム社会主義共和国",
    "vu" => "バヌアツ共和国",
    "wf" => "ウォリス・フツナ",
    "ws" => "サモア",
    "ye" => "イエメン",
    "yt" => "マヨット",
    "yu" => "ユーゴスラビア",
    "za" => "南アフリカ",
    "zm" => "ザンビア",
    "zr" => "ザイール",
    "zw" => "ジンバブエ",
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
    "tv" => "ツバル",
    "ws" => "サモア",
);
?>