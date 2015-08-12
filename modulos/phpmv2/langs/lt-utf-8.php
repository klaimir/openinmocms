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
$lang['auteur_nom'] = "Žygimantas Beručka"; // Translator's name
$lang['auteur_email'] = "uid0@akl.lt"; // Translator's email
$lang['charset'] = "utf-8"; // language file charset (utf-8 by default)
$lang['text_dir'] = "ltr"; // ('ltr' for left to right, 'rtl' for right to left)
$lang['lang_iso'] = "lt"; // iso language code
$lang['lang_libelle_en'] = "Lithuanian"; // english language name
$lang['lang_libelle_fr'] = "Lituanien"; // french language name
$lang['unites_bytes'] = array('Baitai', 'Kb', 'Mb', 'Gb', 'Tb', 'Pb', 'Eb', 'Zb', 'Yb');
$lang['separateur_milliers'] = ''; // three thousand spells 3,000 in english
$lang['separateur_decimaux'] = ','; // Separator for the float part of a number

//
// HTML Markups
//
$lang['head_titre'] = "phpMyVisites | atviro kodo žiniatinklio analizė bei statistika"; // Pages header's title
$lang['head_keywords'] = "statistika, analizė, analizavimas, referalai, laisva, nemokama, atviro kodo, apsilankymai, vizitai, paieškos varikliai, paieškos svetainės, raktažodžiai, žiniatinklis, žiniatinklio svetainės"; // Header keywords
$lang['head_description'] = "phpMyVisites | Atvirojo kodo žiniatinklio svetainių statistikos ir žiniatinklio analizavimo programa platina GNU GPL licencijos sąlygomis."; // Header description
$lang['logo_description'] = "Laisva žiniatinklio analizė, svetainės statistika"; // This is the JS code description. Has to be short.

//
// Main menu & submenu
//
$lang['menu_visites'] = "Apsilankymai";
$lang['menu_pagesvues'] = "Peržiūrėta puslapių";
$lang['menu_suivi'] = "Tęsinys";
$lang['menu_provenance'] = "Šaltinis";
$lang['menu_configurations'] = "Nustatymai";
$lang['menu_affluents'] = "Referalai";
$lang['menu_listesites'] = "Rodyti svetaines";
$lang['menu_bilansites'] = "Suvestinė";
$lang['menu_jour'] = "Diena";
$lang['menu_semaine'] = "Savaitė";
$lang['menu_mois'] = "Mėnuo";
$lang['menu_annee'] = "Metai";
$lang['menu_periode'] = "Tiriamas laikotarpis: %s"; // Text formatted (e.g.: Studied period: Sunday, July the 14th)
$lang['liens_siteofficiel'] = "Oficiali svetainė";
$lang['liens_admin'] = "Administracija";
$lang['liens_contacts'] = "Kontaktai";

//
// Divers
//
$lang['generique_nombre'] = "Skaičius";
$lang['generique_tauxsortie'] = "Išėjimų proporcija";
$lang['generique_ok'] = "Gerai";
$lang['generique_timefooter'] = "Puslapis buvo sugeneruotas per %s sek."; // Time in seconds
$lang['generique_divers'] = "Kiti"; // (for the graphs)
$lang['generique_inconnu'] = "Nežinomi"; // (for the graphs)
$lang['generique_vous'] = "... Jūs?";
$lang['generique_traducteur'] = "Vertėjas";
$lang['generique_langue'] = "Kalba";
$lang['generique_autrelangure'] = "Kita?"; // Other language, translations wanted
$lang['aucunvisiteur_titre'] = "Šiuo laikotarpiu lankytojų nebuvo."; 
$lang['generique_aucune_visite_bdd'] = "<b>Dėmesio!</b> You have no visitor recorded in the database for the current site. Please be sure you've installed your javascript code on your pages, with the correct phpMyVisites URL <u>IN</u> the Javascript code. Try documentation for help.";
$lang['generique_aucune_site_bdd'] = "Duomenų bazėjė nėnurodyta nei viena svetainė! Norėdami pridėti naują svetainę pabandykite prisijungti kaip phpMyVisites administratorius.";
$lang['generique_retourhaut'] = "Top";
$lang['generique_tempsvisite'] = "%smin %ss"; // 3min 25s means 3 minutes and 25 seconds
$lang['generique_tempsheure'] = "%sh"; // 4h means 4 hours
$lang['generique_siteno'] = "Svetainė %s"; // Site "phpmyvisites"
$lang['generique_newsletterno'] = "Informacinis biuletenis %s"; // Newsletter "version 2 announcement"
$lang['generique_partnerno'] = "Partneris %s"; // Partner "version 2 announcement"
$lang['generique_general'] = "Bendra";
$lang['generique_user'] = "Naudotojas %s"; // User "Admin"
$lang['generique_previous'] = "Ankstesnis";
$lang['generique_next'] = "Kitas";
$lang['generique_lowpop'] = "Neįtraukti mažo lankomumo į statistiką";
$lang['generique_allpop'] = "Įtraukti visą lankomumą į statistiką";
$lang['generique_to'] = "iki"; // 4 'to' 8
$lang['generique_total_on'] = " "; // 4 to 8 'on' 10
$lang['generique_total'] = "Iš viso"; // 4 to 8 'on' 10
$lang['generique_information'] = "Informacija";
$lang['generique_done'] = "Atlikta!";
$lang['generique_other'] = "Kita";
$lang['generique_description'] = "Aprašymas:";
$lang['generique_name'] = "Pavadinimas:";
$lang['generique_variables'] = "Kintamieji";
$lang['generique_logout'] = "Atsijungti";
$lang['generique_login'] = "Prisijungti";
$lang['generique_hits'] = "Pataikymai";
$lang['generique_errors'] = "Klaidos";
$lang['generique_site'] = "Svetainė";
$lang['generique_help_novisits'] = "Patarimas: ar jūs %s įdiegėte sekimo kodą (javascript kodą) %s jūsų puslapiuose?";

//
// Authentication
//
$lang['login_password'] = "slaptažodis: "; // lowercase
$lang['login_login'] = "naudotojo vardas: "; // lowercase
$lang['login_error'] = "Prisijungti nepavyko. Neteisingas slaptažodis arba naudotojo vardas.";
$lang['login_error_nopermission'] = "Nurodytas naudotojas neturi leidimo. Paprašykite administratoriaus, kad jis jums suteiktų jūsų svetainės žiūrėjimo/administravimo teises phpMyVisites.";
$lang['login_protected'] = "Jūs bandote patekti į %sphpMyVisites%s apsaugotą vietą.";

//
// Contacts & "Others ?"
//
$lang['contacts_titre'] = "Kontaktai";
$lang['contacts_langue'] = "Vertimai";
$lang['contacts_merci'] = "Padėkos";
$lang['contacts_auteur'] = "phpMyVisites projekto autorius, dokumentatorius ir kūrėjas yra <strong>Matthieu Aubry</strong>.";
$lang['contacts_questions'] = "<strong>Techniniams klausimams, pranešimui apie klaidas, pasiūlymams</strong> naudokite oficialios svetainės forumus %s. Kitais pageidavimais susisiekite su autoriais naudodami oficialios svetainės formą."; // adresse du site
$lang['contacts_trad1'] = "Ar norite išversti phpMyVisites į jūsų kalbą? Nesivaržykite, <strong>phpMyVisites reikia jūsų!</strong>";
$lang['contacts_trad2'] = "phpMyVisites išvertimas šiek tiek užtruks (keletą valandų) ir tam reikia gero susijusių kalbų mokėjimo; tačiau atminkite, kad <strong>bet koks jūsų atliktas darbas bus naudingas didelei naudotojų grupei</strong>. Jeigu norite išversti phpMyVisites, galite rasti visą jums reikalingą informaciją %s oficialioje phpMyVisites dokumentacijoje %s."; // Documentation link
$lang['contacts_doc'] = "Nebijokite žvilgtelti į %s oficialią phpMyVisites dokumentaciją %s, kurioje rasite daug informacijos apie phpMyVisites diegimą, konfigūravimą ir funkcionalumą. Ją galite rasti jūsų phpMyVisites versijoje."; // lien vers la doc
$lang['contacts_thanks_dev'] = "Dėkojame <strong>%s</strong>, phpMyVisites kūrimo bendrininkams, už jų aukštos kokybės darbą projekte.";
$lang['contacts_merci3'] = "Nesivaržykite pažiūrėti padėkų puslapio oficialioje svetainėje norėdami pamatyti visą phpMyVisites draugų sąrašą.";
$lang['contacts_merci2'] = "Labai ačiū visiems, kurie pasidalino savo kultūra išversdami phpMyVisites:";

//
// Rss & Mails
//
$lang['rss_titre'] = "Svetainė %s - %s"; // Site MyHomePage on Sunday 29 
$lang['rss_go'] = "Žiūrėti išsamią statistiką";
$lang['mail_sender_name'] = "Žiniatinklio statistika (Automatiška)";

//
// Visits Part
//
$lang['visites_titre'] = "Lankytojo informacija"; 
$lang['visites_statistiques'] = "Statistika";
$lang['visites_periodesel'] = "Pasirinkto laikotarpio";
$lang['visites_visites'] = "Apsilankymai";
$lang['visites_uniques'] = "Unikalūs lankytojai";
$lang['visites_pagesvues'] = "Peržiūrėta puslapių";
$lang['visites_pagesvisiteurs'] = "Puslapiai 1 lankytojui"; 
$lang['visites_pagesvisites'] = "Puslapiai 1 apsilankymui"; 
$lang['visites_pagesvisitessign'] = "Puslapiai 1 reikšmingam apsilankymui"; 
$lang['visites_tempsmoyen'] = "Vidutinio apsilankymo trukmė";
$lang['visites_tempsmoyenpv'] = "Vidutinis puslapio žiūrėjimo laikas";
$lang['visites_tauxvisite'] = "1 puslapio aplankymo dažnis"; 
$lang['visites_average_visits_per_day'] = "Dienos apsilankymų vidurkis"; 
$lang['visites_recapperiode'] = "Laikotarpio suvestinės";
$lang['visites_nbvisites'] = "Apsilankymai";
$lang['visites_aucunevivisite'] = "Nėra apsilankymų"; // in the table, must be short
$lang['visites_recap'] = "Suvestinė";
$lang['visites_unepage'] = "1 puslapis"; // (graph)
$lang['visites_pages'] = "%s puslapiai"; // 1-2 pages (graph)
$lang['visites_min'] = "%smin"; // 10-15 min (graph)
$lang['visites_sec'] = "%ss"; // 0-30 s (seconds, graph)
$lang['visites_grapghrecap'] = "Diagrama rodanti statistikos suvestinę";
$lang['visites_grapghrecaplongterm'] = "Diagrama rodanti ilgo laikotarpio statistikos suvestinę";
$lang['visites_graphtempsvisites'] = "Diagrama rodanti lankytojų apsilankymų trukmę";
$lang['visites_graphtempsvisitesimg'] = "Lankytojų apsilankymų trukmė";
$lang['visites_graphheureserveur'] = "Diagrama rodanti apsilankymus per valandą serveriui"; 
$lang['visites_graphheureserveurimg'] = "Apsilankymai pagal serverio laiką"; 
$lang['visites_graphheurevisiteur'] = "Diagrama rodanti apsilankymus per valandą vietinio naudotojui";
$lang['visites_graphheurelocalimg'] = "Apsilankymai pagal vietinį laiką"; 
$lang['visites_longterm_statd'] = "Ilgo laikotarpio analizė (Laikotarpio dienos)";
$lang['visites_longterm_statm'] = "Ilgo laikotarpio analizė (Laikotarpio mėnesiai)";

//
// Sites Summary
//
$lang['summary_title'] = "Svetainės suvestinė";
$lang['summary_stitle'] = "Suvestinė";

//
// Frequency Part
//
$lang['frequence_titre'] = "Sugrįžtantys naudotojai";
$lang['frequence_nouveauxconnusgraph'] = "Diagrama rodanti naujus ir sugrįžtamuosius apsilankymus";
$lang['frequence_nouveauxconnus'] = "Nauji ir sugrįžtamieji apsilankymai";
$lang['frequence_titremenu'] = "Dažnumas";
$lang['frequence_visitesconnues'] = "Grįžtamieji apsilankymai";
$lang['frequence_nouvellesvisites'] = "Nauji apsilankymai";
$lang['frequence_visiteursconnus'] = "Sugrįžtantys lankytojai";
$lang['frequence_nouveauxvisiteurs'] = "Nauji lankytojai";
$lang['frequence_returningrate'] = "Sugrįžimo proporcija";
$lang['pagesvues_vispervisgraph'] = "Diagrama rodanti lankytojo apsilankymų skaičių";
$lang['frequence_vispervis'] = "Lankytojo apsilankymų skaičius";
$lang['frequence_vis'] = "apsilankymas";
$lang['frequence_visit'] = "1 apsilankymas"; // (graph)
$lang['frequence_visits'] = "%s apsilankymai"; // (graph)

//
// Seen Pages
//
$lang['pagesvues_titre'] = "Puslapių peržiūrėjimų informacija";
$lang['pagesvues_joursel'] = "Pasirinkta diena";
$lang['pagesvues_jmoins7'] = "Diena - 7";
$lang['pagesvues_jmoins14'] = "Diena - 14";
$lang['pagesvues_moyenne'] = "(vidurkis)";
$lang['pagesvues_pagesvues'] = "Puslapių peržiūrėjimų";
$lang['pagesvues_pagesvudiff'] = "Unikalių puslapių peržiūrėjimų";
$lang['pagesvues_recordpages'] = "Didžiausias vieno naudotojo peržiūrėtų puslapių skaičius";
$lang['pagesvues_tabdetails'] = "Peržiūrėti puslapiai ir grupės";
$lang['pagesvues_graphsnbpages'] = "Diagrama rodanti apsilankymų skaičių peržiūrėtam puslapiui";
$lang['pagesvues_graphnbvisitespageimg'] = "Apsilankymai peržiūrėtų puslapių skaičiui";
$lang['pagesvues_graphheureserveur'] = "Diagrama rodanti apsilankymus pagal serverio laiką";
$lang['pagesvues_graphheureserveurimg'] = "Apsilankymai pagal serverio laiką";
$lang['pagesvues_graphheurevisiteur'] = "Diagrama rodanti apsilankymus pagal vietinį laiką";
$lang['pagesvues_graphpageslocalimg'] = "Apsilankymai pagal vietinį laiką";
$lang['pagesvues_tempsparpage'] = "Laikas puslapiui";
$lang['pagesvues_total_time'] = "Bendras laikas";
$lang['pagesvues_avg_time'] = "Vidutinis laikas";
$lang['pagesvues_help_pagename'] = "Ar žinojote, kad galite puslapiams galite nurodyti patogų pavadinimą?";
$lang['pagesvues_help_track_dls'] = "Ar žinojote, kad galite sekti atsisiuntimus, ir nukreipimus į išorinius URL?";

//
// Follows-Up
//
$lang['suivi_titre'] = "Lankytojų judėjimas";
$lang['suivi_pageentree'] = "Įėjimo puslapiai";
$lang['suivi_pagesortie'] = "Išėjimo puslapiai";
$lang['suivi_tauxsortie'] = "Išėjimo dažnis";
$lang['suivi_pageentreehits'] = "Įėjimai";
$lang['suivi_pagesortiehits'] = "Išėjimai";
$lang['suivi_singlepage'] = "Apsilankymai viename puslapyje";

//
// Origin
//
$lang['provenance_titre'] = "Lankytojų kilmė";
$lang['provenance_recappays'] = "Šalių suvestinė";
$lang['provenance_pays'] = "Šalys";
$lang['provenance_paysimg'] = "Lankytojų diagrama pagal šalį";
$lang['provenance_fai'] = "Interneto paslaugų tiekėjai";
$lang['provenance_nbpays'] = "Skirtingų šalių skaičius: %s";
$lang['provenance_provider'] = "Tiekėjai"; // must be short
$lang['provenance_continent'] = "Žemynas";
$lang['provenance_mappemonde'] = "Pasaulio žemėlapis";
$lang['provenance_interetspays'] = "Interesai pagal šalis";

//
// Setup
//
$lang['configurations_titre'] = "Lankytojo nustatymai";
$lang['configurations_os'] = "Operacinės sistemos";
$lang['configurations_osimg'] = "Diagrama rodanti lankytojų operacines sistemas";
$lang['configurations_navigateurs'] = "Naršyklės";
$lang['configurations_navigateursimg'] = "Diagrama rodanti lankytojų naršykles";
$lang['configurations_resolutions'] = "Ekrano raiškos";
$lang['configurations_resolutionsimg'] = "Diagrama rodanti lankytojų ekrano raiškas";
$lang['configurations_couleurs'] = "Spalvų gylis";
$lang['configurations_couleursimg'] = "Diagrama rodanti lankytojų spalvų gylį";
$lang['configurations_rapport'] = "Normalus/plačiaekranis";
$lang['configurations_large'] = "Plačiaekranis";
$lang['configurations_normal'] = "Normalus";
$lang['configurations_double'] = "Dvigubas ekranas";
$lang['configurations_plugins'] = "Įskiepiai";
$lang['configurations_navigateursbytype'] = "Naršyklės (pagal tipą)";
$lang['configurations_navigateursbytypeimg'] = "Diagrama rodanti naršyklių tipus";
$lang['configurations_os_interest'] = "Interesai pagal operacines sistemas";
$lang['configurations_navigateurs_interest'] = "Interesai pagal naršykles";
$lang['configurations_resolutions_interest'] = "Interesai pagal ekrano raiškas";
$lang['configurations_couleurs_interest'] = "Interesai pagal spalvų gylį";
$lang['configurations_configurations'] = "Populiariausi nustatymai";

//
// Referers
//
$lang['affluents_titre'] = "Nukreipėjai";
$lang['affluents_recapimg'] = "Lankytojų grafikas pagal nukreipėjus";
$lang['affluents_directimg'] = "Tiesioginiai";
$lang['affluents_sitesimg'] = "Svetainės";
$lang['affluents_moteursimg'] = "Varikliukai";
$lang['affluents_referrersimg'] = "Nukreipėjai";
$lang['affluents_moteurs'] = "Paieškos svetainės";
$lang['affluents_nbparmoteur'] = "Apsilankymai iš paieškos svetainių: %s";
$lang['affluents_aucunmoteur'] = "Iš paieškos svetainių nebuvo nei vieno apsilankymo.";
$lang['affluents_motscles'] = "Raktažodžiai";
$lang['affluents_nbmotscles'] = "Skirtingi raktažodžiai: %s";
$lang['affluents_aucunmotscles'] = "Raktažodžių nerasta.";
$lang['affluents_sitesinternet'] = "Svetainės";
$lang['affluents_nbautressites'] = "Apsilankymai iš kitų svetainių: %s";
$lang['affluents_nbautressitesdiff'] = "Skirtingų svetainių skaičius: %s";
$lang['affluents_aucunautresite'] = "Apsilankymų iš kitų svetainių nebuvo.";
$lang['affluents_entreedirecte'] = "Tiesioginės užklausos";
$lang['affluents_nbentreedirecte'] = "Tiesioginių užklausų apsilankymai: %s";
$lang['affluents_nbpartenaires'] = "Apsilankymai iš partnerių: %s";
$lang['affluents_aucunpartenaire'] = "Iš svetainių-partnerių nebuvo nei vieno apsilankymo.";
$lang['affluents_nbnewsletters'] = "Apsilankymai iš informacinių biuletenių: %s";
$lang['affluents_aucunnewsletter'] = "Apsilankymų iš informacinių biuletenių nebuvo.";
$lang['affluents_details'] = "Detaliau";
$lang['affluents_interetsmoteurs'] = "Interesai pagal paieškos svetaines";
$lang['affluents_interetsmotscles'] = "Interesai pagal raktažodžius";
$lang['affluents_interetssitesinternet'] = "Interesai pagal svetaines";
$lang['affluents_partenairesimg'] = "Partneriai";
$lang['affluents_partenaires'] = "Partneriai";
$lang['affluents_interetspartenaires'] = "Interesai pagal partnerius";
$lang['affluents_newslettersimg'] = "Informaciniai biuleteniai";
$lang['affluents_newsletters'] = "Informaciniai biuleteniai";
$lang['affluents_interetsnewsletters'] = "Interesai pagal informacinius biuletenius";
$lang['affluents_type'] = "Nukreipėjo tipas";
$lang['affluents_interetstype'] = "Interesai pagal prieigos tipą";

//
// Summary
//
$lang['purge_titre'] = "Apsilankymų ir nukreipėjų suvestinė";
$lang['purge_intro'] = "Šis laikotarpis administruojant buvo pašalintas, palikta tik pagrindinė statistika.";
$lang['admin_purge'] = "Duomenų bazės priežiūra";
$lang['admin_purgeintro'] = "Šiame skyriuje galite valdyti phpMyVisites naudojamas lenteles. Galite matyti lentelių užimamą vietą diske, optimizuoti jas, ar pašalinti senus įrašus. Taip galėsite apriboti jūsų duomenų bazės lentelių dydį.";
$lang['admin_optimisation'] = "[ %s ] optimizuojama..."; // Tables names
$lang['admin_postopt'] = "Bendras dydis sumažėjo %chiffres% %unites%"; // 28 Kb
$lang['admin_purgeres'] = "Pašalinti šiuos laikotarpius: %s";
$lang['admin_purge_fini'] = "Lentelės ištrintos...";
$lang['admin_bdd_nom'] = "Vardas";
$lang['admin_bdd_enregistrements'] = "Įrašai";
$lang['admin_bdd_taille'] = "Lentelės dydis";
$lang['admin_bdd_opt'] = "Optimizuoti";
$lang['admin_bdd_purge'] = "Išvalyti kriterijus";
$lang['admin_bdd_optall'] = "Optimizuoti visas";
$lang['admin_purge_j'] = "Pašalinti senesnius nei %s dienų įrašus";
$lang['admin_purge_s'] = "Pašalinti senesnius nei %s savaičių įrašus";
$lang['admin_purge_m'] = "Pašalinti senesnius nei %s mėnesių įrašus";
$lang['admin_purge_y'] = "Pašalinti senesnius nei %s metų įrašus";
$lang['admin_purge_logs'] = "Pašalinti visus žurnalus";
$lang['admin_purge_autres'] = "Išvalyti bendrus į lentelę „%s“";
$lang['admin_purge_none'] = "Nėra galimų veiksmų";
$lang['admin_purge_cal'] = "Suskaičiuoti ir išvalyti (tai gali užtrukti keletą minučių)";
$lang['admin_alias_title'] = "Svetainės aliasai ir URL";
$lang['admin_partner_title'] = "Svetainės partneriai";
$lang['admin_newsletter_title'] = "Svetainės informaciniai biuleteniai";
$lang['admin_ip_exclude_title'] = "IP adresų diapazonas neįtrauktinas į statistiką";
$lang['admin_name'] = "Pavadinimas:";
$lang['admin_error_ip'] = "IP formatas turi būti teisingas: %s";
$lang['admin_site_name'] = "Svetainės pavadinimas";
$lang['admin_site_url'] = "Svetainės pagrindinis URL";
$lang['admin_db_log'] = "Norėdami pakeisti duomenų bazės nustatymus pabandykite prisijungti kaip phpMyVisites super naudotojas.";
$lang['admin_error_critical'] = "Klaida: norint, kad phpMyVisites veiktų, ji turi būti ištaisyta.";
$lang['admin_warning'] = "Dėmesio: phpMyVisites veiks, tačiau gali būti, kad keletas papildomų funkcijų neveiks.";
$lang['admin_move_group'] = "Perkelti į grupę:";
$lang['admin_move_select'] = "Pasirinkite grupę";
$lang['admin_site_select'] = "Site to administrate";

//
// Setup
//
$lang['admin_intro'] = "Sveiki atvykę į phpMyVisites konfigūravimo sritį. Galite pakeisti visą su įdiegimu susijusią informaciją. Jeigu iškils sunkumų, nebijokite pasižiūrėti į %s oficialią phpMyVisites dokumentaciją %s."; // link to the doc
$lang['admin_configetperso'] = "Bendri nustatymai";
$lang['admin_afficherjavascript'] = "Rodyti JavaScript statistikos kodą";
$lang['admin_cookieadmin'] = "Statistikoje neskaičiuoti administratoriaus (slapukas)";
$lang['admin_ip_ranges'] = "Statistikoje neskaičiuoti IP/IP diapazonų";
$lang['admin_sitesenregistres'] = "Įrašytos svetainės:";
$lang['admin_retour'] = "Atgal";
$lang['admin_cookienavigateur'] = "Galite išskirti administratorių iš statistikos. Šis metodas paremtas slapukais ir ši parinktis veiks tik su šia naršykle. Galite pakeisti šią parinktį bet kuriuo metu.";
$lang['admin_prendreencompteadmin'] = "Įtraukti administratorių į statistiką (ištrinti slapuką)";
$lang['admin_nepasprendreencompteadmin'] = "Neįtraukti administratoriaus statistikoje (sukurti slapuką)";
$lang['admin_etatcookieoui'] = "Administratorius įskaičiuojamas į šios svetainės statistiką (tai numatytoji konfigūracija, jūs laikomas normaliu lankytoju)";
$lang['admin_etatcookienon'] = "Jūs neįskaičiuojamas į šios svetainės statistiką (Jūsų apsilankymai šioje svetainėje įskaičiuojami nebus)";
$lang['admin_deleteconfirm'] = "Ar tikrai norite ištrinti %s?";
$lang['admin_sitedeletemessage'] = "Būkite <u>labai atsargus</u>: visi duomenys susiję su ta svetaine bus ištrinti <br>ir tų duomenų nebebus galima atkurti.";
$lang['admin_confirmyes'] = "Taip, noriu ištrinti";
$lang['admin_confirmno'] = "Ne, nenoriu ištrinti";
$lang['admin_nonewsletter'] = "Šios svetainės informacinio biuletenio nerasta!";
$lang['admin_nopartner'] = "Šios svetainės partnerio nerasta!";
$lang['admin_get_question'] = "Įrašyti GET kintamąjį? (URL kintamieji)";
$lang['admin_get_a1'] = "Įrašyti VISUS URL kintamuosius";
$lang['admin_get_a2'] = "NEĮRAŠYTI jokių URL kintamųjų";
$lang['admin_get_a3'] = "Įrašyti TIK nurodytus kintamuosius";
$lang['admin_get_a4'] = "Įrašyti visus IŠSKYRUS nurodytus kintamuosius";
$lang['admin_get_default_pdf'] = "PDF report :";
$lang['admin_get_default_pdfdefault'] = "Defaut PDF report"; 
$lang['admin_get_default_theme'] = "Visual theme for this site:";
$lang['admin_get_list'] = "Kintamųjų pavadinimai (<b>;</b> atskirtas sąrašas) <br/>Pavyzdys: %s";
$lang['admin_required'] = "%s yra būtinas.";
$lang['admin_title_required'] = "Būtinas";
$lang['admin_write_dir'] = "Įrašomi aplankai";
$lang['admin_chmod_howto'] = "Į šiuos aplankus serveris turi galėti rašyti. Tai reiškia, kad turite jų leidimus pakeisti į 777 su jūsų FTP programa (spragtelėkite dešiniuoju pelės mygtuku ant aplanko -> Leidimai (ar chmod))";
$lang['admin_optional'] = "Neprivaloma";
$lang['admin_memory_limit'] = "Atminties limitas";
$lang['admin_allowed'] = "leidžiama";
$lang['admin_webserver'] = "Žiniatinklio serveris";
$lang['admin_server_os'] = "Serverio OS";
$lang['admin_server_time'] = "Serverio laikas";
$lang['admin_legend'] = "Legenda:";
$lang['admin_error_url'] = "URL turi būti teisingo formato: %s (be įžambaus brūkšnio gale)";
$lang['admin_url_n'] = "URL %s:";
$lang['admin_url_aliases'] = "URL aliasai";
$lang['admin_logo_question'] = "Rodyti logotipą?";
$lang['admin_type_again'] = "(įveskite dar kartą)";
$lang['admin_admin_mail'] = "Super administratoriaus el.paštas";
$lang['admin_admin'] = "Super administratorius";
$lang['admin_phpmv_path'] = "Visas kelias iki phpMyVisites programos";
$lang['admin_valid_email'] = "El. pašto adresas turi būti galiojantis el. pašto adresas";
$lang['admin_valid_pass'] = "Slaptažodis turi būti sudėtingesnis (mažiausiai 6 simboliai, turi būti skaitmenų)";
$lang['admin_match_pass'] = "Slaptažodžiai nesutampa";
$lang['admin_no_user_group'] = "Šios svetainės šioje grupėje nėra naudotojo";
$lang['admin_recorded_nl'] = "Įrašyti informaciniai biuleteniai:";
$lang['admin_recorded_partners'] = "Įrašyti partneriai:";
$lang['admin_recorded_users'] = "Įrašyti naudotojai:";
$lang['admin_select_site_title'] = "Pasirinkite svetainę";
$lang['admin_select_user_title'] = "Pasirinkite naudotoją";
$lang['admin_no_user_registered'] = "Neregistruotas joks naudotojas!";
$lang['admin_configuration'] = "Konfigūracija";
$lang['admin_general_conf'] = "Bendra konfigūracija";
$lang['admin_group_title'] = "Grupių valdymas (leidimai)";
$lang['admin_user_title'] = "Naudotojų valdymas";
$lang['admin_user_add'] = "Pridėti naudotoją";
$lang['admin_user_mod'] = "Keisti naudotoją";
$lang['admin_user_del'] = "Ištrinti naudotoją";
$lang['admin_user_oldPwd'] = "Old password"; 
$lang['admin_user_oldPwd_bad'] = "Old password incorrect."; 
$lang['admin_server_info'] = "Serverio informacija";
$lang['admin_send_mail'] = "Išsiųsti statistiką el.paštu";
$lang['admin_rss_feed'] = "Statistika RSS kanalu";
$lang['admin_rss_feed_specific_site'] = "Website '%s' Statistics - RSS"; // site 2
$lang['admin_site_admin'] = "Svetainių administravimas";
$lang['admin_site_add'] = "Pridėti svetainę";
$lang['admin_site_mod'] = "Keisti svetainę";
$lang['admin_site_del'] = "Ištrinti svetainę";
$lang['admin_nl_add'] = "Pridėti informacinį biuletenį";
$lang['admin_nl_mod'] = "Keisti informacinį biuletenį";
$lang['admin_nl_del'] = "Ištrinti informacinį biuletenį";
$lang['admin_partner_add'] = "Pridėti partnerį";
$lang['admin_partner_mod'] = "Keisti partnerio pavadinimą ir URL";
$lang['admin_partner_del'] = "Ištrinti partnerį";
$lang['admin_url_alias'] = "URL aliasų valdymas";
$lang['admin_group_admin_n'] = "Žiūrėti statistiką + administravimo teisė";
$lang['admin_group_admin_d'] = "Naudotojai gali žiūrėti statistiką IR redaguoti svetainės informaciją (pavadinimą, pridėti slapuką, išskirti IP diapazonus, valdyti URL aliasus/partnerius/informacinius biuletenius, t.t.)";
$lang['admin_group_view_n'] = "Žiūrėti statistiką";
$lang['admin_group_view_d'] = "Naudotojai gali tik žiūrėti svetainės statistiką. Be teisės administruoti.";
$lang['admin_group_noperm_n'] = "Be teisių";
$lang['admin_group_noperm_d'] = "Šioje grupėje esantys naudotojai neturi leidimo žiūrėti statistiką ar redaguoti informaciją.";
$lang['admin_group_stitle'] = "Galite redaguoti naudotojo grupes pasirinkdami norimus pakeisti naudotojus, tada pasirinkti grupę, į kurią norite perkelti pasirinktus naudotojus.";
$lang['admin_url_generate_download_link_example'] = "Failų atsisiuntimo adresas ar URL nukreipimas į išorinę svetainę";
$lang['admin_url_generate_title'] = "Failių atisiuntimas / URL nukreipimas : URL generatorius";
$lang['admin_url_generate_intro'] = "phpMyVisites gali skaičiuoti jūsų failų atsisiuntimus, o taip pat ir sekti išorinių svetainių URL paspaudimus. Susekti atsiuntimai ir URL bus rodomi phpMyVisites peržiūrėtų puslapių skyriuje.</p><p> class='texte'> Norėdami tai pasiekti, turite naudoti URL rodantį į phpmyvisites rinkmeną, tada ji nukreips į jūsų pageidaujamą URL. Kadangi sugeneruoti tokį URL nėra paprasta, štai įrankis supaprastinantis šį veiksmą (todėl, kad phpMyVisites turi būti paprastas, tačiau galingas įrankis mums visiems). Paprasčiausiai užpildykite formą, paspauskite mygtuką „Generuoti URL“ ir galėsite skaičiuoti failų atsisiuntimus ar nukreipimus į išorinius URL labai lengvai!";
$lang['admin_url_generate_site_selection'] = "Pasirinkite svetainę, kurios failų atsisiuntimus ar URL nukreipimus norite skaičiuoti";
$lang['admin_url_generate_tag_selection'] = "Select the tag for which you want to count a file download or a URL redirection"; 
$lang['admin_url_generate_enter_url'] = "Įveskite visą failo adresą ar išorinį URL, kurio statistiką norite matyti:";
$lang['admin_url_generate_help_enter_url'] = "Pagalba: tai turi būti panašu į „<b>http://www.jūsųsvetainė.lt/failas/nuostabi-programa.zip</b>“ ar bet kokio URL nukreipimui „<b>http://www.nukreiptina-svetainė.lt</b>“";
$lang['admin_url_generate_friendly_name'] = "Patogus failo / URL pavadinimas, kuris bus rodomas puslapių peržiūrėjimo lentelėje:"; 
$lang['admin_url_generate_help_friendly_name'] = "Pagalba: galite klasifikuoti „failus / URL nukreipimus“ į kategorijas norėdami geresnio parodymo phpMyVisites peržiūrėtų puslapių skyriuje. Galite atskirti kategoriją ir failus ar URL nukreipimus simboliu „<b>/</b>“. Pavyzdžiui, pavadinimas gali būti „<b>mano nuotraukų atsisiuntimai/Vasara Prancūzijoje</b>“ ar „<b>Partneriai/PHP.net svetainė</b>“: atitinkamai bus klasifikuojama aplanke „<b>mano nuotraukų atsisiuntimai</b>“ ar aplanke „<b>Partneriai</b>“: jūs matysite juos phpMyVisites sąsajos peržiūrėtų puslapių skyriaus aplankuose.";
$lang['admin_url_generate_result_url'] = "Štai URL į kurį galite sukurti nuorodą: ";
$lang['admin_url_generate_html_result'] = "Jeigu jums tai naudinga, galite naudoti šią HTML nuorodą:";
$lang['admin_url_generate_html_onclick'] = "Here is the HTML using onclick event:";
$lang['admin_url_generate_image_legend'] = "Žiūrėtų puslapių su URL nukreipimų ir failų atsisiuntimų sekimu pavyzdys:";
$lang['admin_site_link_javascript'] = "%s Dabar turite įdiegti sekimo kodą jūsų puslapiuose (nukopijuokite Javascript kodą). Paspauskite norėdami pamatyti javascript kodą. %s";
$lang['admin_last_version'] = "Ar turite naujausią phpMyVisites versiją? (Rekomenduojama!)";
$lang['admin_general_config_firstday'] = "Pirma kalendoriaus diena?";
$lang['admin_default_language'] = "Numatytoji kalba? <br/> Ji taip pat bus numatytoji el. laiškų kalba.";
$lang['admin_back_statisitics'] = "Go to statistics"; 

//
// Pdf export
//
$lang['pdf_generate_link'] = "Generuoti PDF dokumentą su visa svetainės %s statistika";
$lang['pdf_summary_generate_link'] = "Generuoti PDF su visa statistikos suvestine";
$lang['pdf_free_page'] = "Laisvas naujas puslapis";
$lang['pdf_free_chapter'] = "Laisvas titulinis skyrius";
$lang['pdf_page_break'] = "Puslapio lūžis";
$lang['pdf_page_summary'] = "Suvestinė";
$lang['generique_pdfno'] = "PDF %s"; // Newsletter "version 2 announcement" 
$lang['admin_pdf_title'] = "Svetainės PDF"; 
$lang['admin_nopdf'] = "Šios svetainės PDF nerastas!";
$lang['admin_recorded_pdf'] = "Įrašyti PDF:";
$lang['admin_pdf_add'] = "Pridėti PDF"; 
$lang['admin_pdf_mod'] = "Keisti PDF"; 
$lang['admin_pdf_del'] = "Ištrinti PDF"; 
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
$lang['install_loginmysql'] = "Duomenų bazės prisijungimo vardas";
$lang['install_mdpmysql'] = "Duomenų bazės slaptažodis";
$lang['install_serveurmysql'] = "Duomenų bazės serveris";
$lang['install_basemysql'] = "Duomenų bazės pavadinimas";
$lang['install_prefixetable'] = "Lentelės prefiksas";
$lang['install_utilisateursavances'] = "Pažengę naudototojai (neprivaloma)";
$lang['install_oui'] = "Taip";
$lang['install_non'] = "Ne";
$lang['install_ok'] = "Gerai";
$lang['install_probleme'] = "Problema: ";
$lang['install_DirectoriesWriteError'] = "<b>Problema! </b><br/>Nepavyko įrašyti į aplanką(us) %s. Įsitikinkite, kad turite teises leidžiančias serveryje kurti failus (pabandykite įvykdyti aplankui CHMOD 775 su FTP programa: ant aplanko paspauskite dešinįjį pelės mygtuką -> Leidimai (ar CHMOD). <br/><br/>Jeigu CHMOD neveikia su jūsų FTP programa, pabandykite ištrinti (jei jie egzistuoja) aplankus, ir juos sukurti juos su jūsų FTP programa.";
$lang['install_loginadmin'] = "Super administratoriaus prisijungimo vardas";
$lang['install_mdpadmin'] = "Super administratoriaus slaptažodis";
$lang['install_chemincomplet'] = "Visas kelias iki phpMyVisites programos (kaip http://www.manosvetainė.lt/rep1/rep3/phpmyvisites/). Kelias turi baigtis <strong>/</strong>.";
$lang['install_afficherlogo'] = "Rodyti jūsų puslapiuose logotipą? %s <br />Leisdami rodyti logotipą jūsų svetainėje, padėsite reklamuoti phpMyVisites ir taip padėsite jam sparčiau vystytis. Tai taip pat būtų gražus būdas padėkoti autoriams praleidusiems daug valandų kuriant šią Atvirojo Kodo, Laisvą programą."; // %s replaced by the logo image
$lang['install_affichergraphique'] = "Rodyti statistikos diagramas.";
$lang['install_valider'] = "Pateikti"; // during installation and for login
$lang['install_popup_logo'] = "Pasirinkite logotipą";
$lang['install_logodispo'] = "Pamatykite įvairius prieinamus logotipus";
$lang['install_welcome'] = "Sveiki!";
$lang['install_system_requirements'] = "Sisteminiai reikalavimai";
$lang['install_database_setup'] = "Duomenų bazės sąranka";
$lang['install_create_tables'] = "Lentelių kūrimas";
$lang['install_general_setup'] = "Bendra sąranka";
$lang['install_create_config_file'] = "Sukurti konfigūracijos failą";
$lang['install_first_website_setup'] = "Pridėti pirmą svetainę";
$lang['install_display_javascript_code'] = "Rodyti Javascript kodą";
$lang['install_finish'] = "Baigta!";
$lang['install_txt2'] = "Įdiegimo pabaigoje, bus įvykdyta užklausa į mūsų oficialią svetainę, taip padedant mums suskaičiuoti kiek žmonių naudojasi phpMyVisites. Dėkojame už supratingumą.";
$lang['install_database_setup_txt'] = "Įveskite jūsų duomenų bazės nustatymus.";
$lang['install_general_config_text'] = "phpMyVisites bus tik vienas naudotojas administratorius turintis visas teises viską žiūrėti/keisti. Pasirinkite jūsų super administratoriaus abonemento naudotojo vardą ir slaptažodį. Papildomus naudotoju galėsite pridėti vėliau.";
$lang['install_config_file'] = " Administratoriaus naudotojo informacija įvesta sėkmingai.";
$lang['install_js_code_text'] = "<p>Norėdami suskaičiuoti visus lankytojus, turite įterpti javascript kodą visuose jūsų puslapiuose. </p><p> Jūsų puslapiai nebūtinai turi būti sukurti su PHP, <strong>phpMyVisites veiks visų rūšių puslapiuose (ar tai HTML, ASP, Perl ar bet kokios kitos kalbos).</strong> </p><p> Štai įterptinas kodas: (nukopijuokite jį į visus jūsų puslapius) </p>";
$lang['install_intro'] = "Sveiki paleidę phpMyVisites įdiegimą."; 
$lang['install_intro2'] = "Šis procesas yra suskaidytas į %s paprastus žingsnelius, tai užtruks apie 10 minučių.";
$lang['install_next_step'] = "Eiti į kitą žingsnelį";
$lang['install_status'] = "Diegimo būsena";
$lang['install_done'] = "Diegimas %s%% baigtas"; // Install 25% complete
$lang['install_site_success'] = "Svetainė sėkmingai sukurta!";
$lang['install_site_info'] = "Įveskite visą informaciją apie pirmąją svetainę.";
$lang['install_go_phpmv'] = "Eiti į phpMyVisites!";
$lang['install_congratulation'] = "Sveikiname! Jūsų phpMyVisites diegimas baigtas.";
$lang['install_end_text'] = "Įsitikinkite, kad javascript kodas įvestas jūsų puslapiuose ir laukite pirmųjų lankytojų!";
$lang['install_db_ok'] = "Prie duomenų bazės serverio prisijungta!";
$lang['install_table_exist'] = "phpMyVisites lentelės duomenų bazėje jau yra.";
$lang['install_table_choice'] = "Arba pasirinkite naudoti esančias duomenų bazės lenteles, arba pasirinkite švarų įdiegimą norėdami ištrinti visą duomenų bazėje esančią informaciją.";
$lang['install_table_erase'] = "Ištrinti visas lenteles (būkite atsargūs!)";
$lang['install_table_reuse'] = "Naudoti esančias lenteles";
$lang['install_table_success'] = "Lentelės sėkmingai sukurtos!";
$lang['install_send_mail'] = "Kasdien gauti el. laišką su svetainės statistikos suvestine?";

//
// Update Step
//
$lang['update_title'] = "Atnaujinti phpMyVisites";
$lang['update_subtitle'] = "Aptikome, kad jūs atnaujinate phpMyVisites.";
$lang['update_versions'] = "Jūsų ankstesnė versija buvo %s ir mes ją atnaujinome į %s.";
$lang['update_db_updated'] = "Jūsų duomenų bazė sėkmingai atnaujinta!";
$lang['update_continue'] = "Eiti į phpMyVisites";
$lang['update_jschange'] = "Dėmesio! <br /> phpMyVisites javascript kodas buvo pakeistas. TURITE atnaujinti jūsų puslapius ir nukopijuoti naują phpMyVisites Javascript kodą į VISAS jūsų sukonfigūruotas svetaines. <br /> Javascript kodo pakeitimai yra reti, atsiprašome už nepatogumus, kuriuos sukėlėme šiuo pakeitimu.";

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
$lang['tdate1'] = "%yearlong% %monthlong% %daynumeric% %daylong%";

// Monday 10
$lang['tdate2'] = "%daynumeric% %daylong%";

// Week February 10 To February 17 2004
$lang['tdate3'] = "Savaitė nuo %yearlong% %monthlong% %daynumeric% iki %yearlong% %monthlong2% %daynumeric2%";

// February 2004 Month
$lang['tdate4'] = "%yearlong% %monthlong% mėnuo";

// December 2003
$lang['tdate5'] = "%yearlong% %monthlong%";

// 10 Febuary week
$lang['tdate6'] = "%monthlong% %daynumeric% savaitė";

// 10-02-2003 // February 2 2003
$lang['tdate7'] = "%yearlong%-%monthnumeric%-%daynumeric%";

// Mon 10 (Only for Graphs purpose)
$lang['tdate8'] = "%daynumeric% %dayshort% ";

// Week 10 Feb (Only for Graphs purpose)
$lang['tdate9'] = "%monthshort% %daynumeric% savaitė";

// Dec 04 (Only for Graphs purpose)
$lang['tdate10'] = "%yearshort% %monthshort%";

// Year 2004
$lang['tdate11'] = "%yearlong% metai";

// 2004
$lang['tdate12'] = "%yearlong%";

// 31
$lang['tdate13'] = "%daynumeric%";

// Months
$lang['moistab']['01'] = "Sausis";
$lang['moistab']['02'] = "Vasaris";
$lang['moistab']['03'] = "Kovas";
$lang['moistab']['04'] = "Balandis";
$lang['moistab']['05'] = "Gegužė";
$lang['moistab']['06'] = "Birželis";
$lang['moistab']['07'] = "Liepa";
$lang['moistab']['08'] = "Rugpjūtis";
$lang['moistab']['09'] = "Rugsėjis";
$lang['moistab']['10'] = "Spalis";
$lang['moistab']['11'] = "Lapkritis";
$lang['moistab']['12'] = "Gruodis";

// Months (Graph purpose, 4 chars max)
$lang['moistab_graph']['01'] = "Sau";
$lang['moistab_graph']['02'] = "Vas";
$lang['moistab_graph']['03'] = "Kov";
$lang['moistab_graph']['04'] = "Bal";
$lang['moistab_graph']['05'] = "Geg";
$lang['moistab_graph']['06'] = "Bir";
$lang['moistab_graph']['07'] = "Lie";
$lang['moistab_graph']['08'] = "Rgp";
$lang['moistab_graph']['09'] = "Rgs";
$lang['moistab_graph']['10'] = "Spa";
$lang['moistab_graph']['11'] = "Lap";
$lang['moistab_graph']['12'] = "Gru";

// Day of the week
$lang['jsemaine']['Mon'] = "Pirmadienis";
$lang['jsemaine']['Tue'] = "Antradienis";
$lang['jsemaine']['Wed'] = "Trečiadienis";
$lang['jsemaine']['Thu'] = "Ketvirtadienis";
$lang['jsemaine']['Fri'] = "Penktadienis";
$lang['jsemaine']['Sat'] = "Šeštadienis";
$lang['jsemaine']['Sun'] = "Sekmadienis";

// Day of the week (Graph purpose, 4 chars max)
$lang['jsemaine_graph']['Mon'] = "Pir";
$lang['jsemaine_graph']['Tue'] = "Ant";
$lang['jsemaine_graph']['Wed'] = "Tre";
$lang['jsemaine_graph']['Thu'] = "Ket";
$lang['jsemaine_graph']['Fri'] = "Pen";
$lang['jsemaine_graph']['Sat'] = "Šeš";
$lang['jsemaine_graph']['Sun'] = "Sek";

// First letter of each day, weekdays ordered
$lang['calendrier_jours'][0] = "P";
$lang['calendrier_jours'][1] = "A";
$lang['calendrier_jours'][2] = "T";
$lang['calendrier_jours'][3] = "K";
$lang['calendrier_jours'][4] = "P";
$lang['calendrier_jours'][5] = "Š";
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
$lang['eur'] = "Europa";
$lang['afr'] = "Afrika";
$lang['asi'] = "Azija";
$lang['ams'] = "Pietų ir Centrinė Amerika";
$lang['amn'] = "Šiaurės Amerika";
$lang['oce'] = "Okeanija";

// Oceans
$lang['oc_pac'] = "Ramusis vandenynas";
$lang['oc_atl'] = "Atlanto vandenynas";
$lang['oc_ind'] = "Indijos vandenynas";

// Countries
$lang['domaines'] = array(
	"xx" => "Nežinoma",
	"ac" => "Ascension salos",
	"ad" => "Andora",
	"ae" => "Jungtiniai Arabų Emiratai",
	"af" => "Afganistanas",
	"ag" => "Antigva ir Barbuda",
	"ai" => "Anguilla",
	"al" => "Albanija",
	"am" => "Armėnija",
	"an" => "Nyderlandų Antilai",
	"ao" => "Angola",
	"aq" => "Antarktika",
	"ar" => "Argentina",
	"as" => "Amerikos Samoa",
	"at" => "Austrija",
	"au" => "Australija",
	"aw" => "Aruba",
	"az" => "Azerbaidžanas",
	"ba" => "Bosnija ir Hercegovina",
	"bb" => "Barbados",
	"bd" => "Bangladešas",
	"be" => "Belgija",
	"bf" => "Burkina Fasas",
	"bg" => "Bulgarija",
	"bh" => "Bahreinas",
	"bi" => "Burundi",
	"bj" => "Beninas",
	"bm" => "Bermudai",
	"bn" => "Brunėjus",
	"bo" => "Bolivija",
	"br" => "Brazilija",
	"bs" => "Bahamai",
	"bt" => "Butanas",
	"bv" => "Bouvet salos",
	"bw" => "Botsvana",
	"by" => "Baltarusija",
	"bz" => "Belizas",
	"ca" => "Kanada",
	"cc" => "Kokoso (Kylingo) salos",
	"cd" => "Demokratinė Kongo Respublika",
	"cf" => "Centrinės Afrikos Respublika",
	"cg" => "Kongas",
	"ch" => "Šveicarija",
	"ci" => "Cote D'Ivoire",
	"ck" => "Kuko salos",
	"cl" => "Čilė",
	"cm" => "Kamerūnas",
	"cn" => "Kinija",
	"co" => "Kolumbija",
	"cr" => "Kosta Rika",
	"cs" => "Serbija ir Juodkalnija",
	"cu" => "Kuba",
	"cv" => "Cape Verde",
	"cx" => "Kalėdų sala",
	"cy" => "Kipras",
	"cz" => "Čekijos Respublika",
	"de" => "Vokietija",
	"dj" => "Džibutas",
	"dk" => "Danija",
	"dm" => "Dominika",
	"do" => "Dominikos Respublika",
	"dz" => "Algerija",
	"ec" => "Ekvadoras",
	"ee" => "Estija",
	"eg" => "Egiptas",
	"eh" => "Vakarinė Sachara",
	"er" => "Eritrėja",
	"es" => "Ispanija",
	"et" => "Etiopija",
	"fi" => "Suomija",
	"fj" => "Fidžis",
	"fk" => "Folklendo salos (Malvinai)",
	"fm" => "Federacinės Mikronezijos Valstijos",
	"fo" => "Farerų salos",
	"fr" => "Prancūzija",
	"ga" => "Gabonas",
	"gd" => "Grenada",
	"ge" => "Gruzija",
	"gf" => "Prancūzijos Gujana",
	"gg" => "Guernsey",
	"gh" => "Gana",
	"gi" => "Gibraltaras",
	"gl" => "Grenlandija",
	"gm" => "Gambija",
	"gn" => "Gvinėja",
	"gp" => "Gvadalupė",
	"gq" => "Pusiaujo Gvinėja",
	"gr" => "Graikija",
	"gs" => "Pietų Gruzija ir Pietų Sandvičo salos",
	"gt" => "Gvatemala",
	"gu" => "Guamas",
	"gw" => "Bisau Gvinėja",
	"gy" => "Gujana",
	"hk" => "Honkongas",
	"hm" => "Herdo ir Makdonaldo salos",
	"hn" => "Hondūras",
	"hr" => "Kroatija",
	"ht" => "Haitis",
	"hu" => "Vengrija",
	"id" => "Indonezija",
	"ie" => "Airija",
	"il" => "Izraelis",
	"im" => "Mano sala",
	"in" => "Indija",
	"io" => "Britų Indijos Vandenyno Teritorija",
	"iq" => "Irakas",
	"ir" => "Irano Islamo Respublika",
	"is" => "Islandija",
	"it" => "Italija",
	"je" => "Džersis",
	"jm" => "Jamaika",
	"jo" => "Jordanija",
	"jp" => "Japonija",
	"ke" => "Kenija",
	"kg" => "Kirgiztanas",
	"kh" => "Kambodža",
	"ki" => "Kiribatis",
	"km" => "Komorai",
	"kn" => "Sent Kitsas ir Nevis",
	"kp" => "Korėjos Demokratinė Liaudies Respublika",
	"kr" => "Korėjos Respublika",
	"kw" => "Kuveitas",
	"ky" => "Kaimanų salos",
	"kz" => "Kazakstanas",
	"la" => "Laosas",
	"lb" => "Libanas",
	"lc" => "Sent Liučija",
	"li" => "Lichtenšteinas",
	"lk" => "Šri Lanka",
	"lr" => "Liberija",
	"ls" => "Lesotas",
	"lt" => "Lietuva",
	"lu" => "Liuksemburgas",
	"lv" => "Latvija",
	"ly" => "Libija",
	"ma" => "Marokas",
	"mc" => "Monakas",
	"md" => "Moldovos Respublika",
	"mg" => "Madagaskaras",
	"mh" => "Maršalo salos",
	"mk" => "Makedonija",
	"ml" => "Malis",
	"mm" => "Mianmaras",
	"mn" => "Mongolija",
	"mo" => "Makau",
	"mp" => "Šiaurinės Marianų salos",
	"mq" => "Martinika",
	"mr" => "Mauritanija",
	"ms" => "Montserrat",
	"mt" => "Malta",
	"mu" => "Mauricijus",
	"mv" => "Maldyvai",
	"mw" => "Malavis",
	"mx" => "Meksika",
	"my" => "Malaizija",
	"mz" => "Mozambikas",
	"na" => "Namibija",
	"nc" => "Naujoji Kaledonija",
	"ne" => "Nigeris",
	"nf" => "Norfolko sala",
	"ng" => "Nigerija",
	"ni" => "Nikaragva",
	"nl" => "Nyderlandai",
	"no" => "Norvegija",
	"np" => "Nepalas",
	"nr" => "Nauru",
	"nu" => "Niujė",
	"nz" => "Naujoji Zelandija",
	"om" => "Omanas",
	"pa" => "Panama",
	"pe" => "Peru",
	"pf" => "Prancūzų Polinezija",
	"pg" => "Papua Naujoji Gvinėja",
	"ph" => "Filipinai",
	"pk" => "Pakistanas",
	"pl" => "Lenkija",
	"pm" => "Sent Pjeras ir Mikelonas",
	"pn" => "Pitcairn",
	"pr" => "Puerto Rikas",
	"ps" => "Palestinos Teritorija",
	"pt" => "Portugalija",
	"pw" => "Palau",
	"py" => "Paragvajus",
	"qa" => "Kataras",
	"re" => "Reunion Island",
	"ro" => "Rumunija",
	"ru" => "Rusijos Federacija",
	"rs" => "Rusija",
	"rw" => "Ruanda",
	"sa" => "Saudo Arabija",
	"sb" => "Saliamono salos",
	"sc" => "Seišeliai",
	"sd" => "Sudanas",
	"se" => "Švedija",
	"sg" => "Singapūras",
	"sh" => "Sent Elena",
	"si" => "Slovėnija",
	"sj" => "Svalbard",
	"sk" => "Slovakija",
	"sl" => "Siera Leonė",
	"sm" => "San Marinas",
	"sn" => "Senegalas",
	"so" => "Somalis",
	"sr" => "Surinama",
	"st" => "San Tome ir Principė",
	"su" => "Senoji SSRS",
	"sv" => "El Salvadoras",
	"sy" => "Sirijos Arabų Respublika",
	"sz" => "Svazilendas",
	"tc" => "Turkų ir Kaikos salos",
	"td" => "Čadas",
	"tf" => "Prancūzijos Pietinės Teritorijos",
	"tg" => "Togas",
	"th" => "Tailandas",
	"tj" => "Tadžikistanas",
	"tk" => "Tokelau",
	"tm" => "Turkmėnistanas",
	"tn" => "Tunisas",
	"to" => "Tongas",
	"tp" => "Rytų Timoras",
	"tr" => "Turkija",
	"tt" => "Trinidadas ir Tobagas",
	"tv" => "Tuvalu",
	"tw" => "Taivanas",
	"tz" => "Jungtinė Tanzanijos Respublika",
	"ua" => "Ukraina",
	"ug" => "Uganda",
	"uk" => "Jungtinė Karalystė",
	"gb" => "Didžioji Britanija",
	"um" => "Jungtinių Valstijų Mažosios Nuošaliosios salos",
	"us" => "Jungtinės Valstijos",
	"uy" => "Urugvajus",
	"uz" => "Uzbekistanas",
	"va" => "Vatikano miestas",
	"vc" => "Sent Vincentas ir Grenadinai",
	"ve" => "Venesuela",
	"vg" => "Britų Mergelės salos",
	"vi" => "JAV Mergelės salos",
	"vn" => "Vietnamas",
	"vu" => "Vanuatu",
	"wf" => "Valis ir Futuna",
	"ws" => "Samoa",
	"ye" => "Jemenas",
	"yt" => "Mayotte",
	"yu" => "Jugoslavija",
	"za" => "Pietų Afrika",
	"zm" => "Zambija",
	"zr" => "Zairas",
	"zw" => "Zimbabvė",
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
	"tv" => "Tuvalu",
	"ws" => "Samoa",
);
?>