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
$lang['auteur_nom'] = "Alessandro Fiorotto"; // Nome del traduttore
$lang['auteur_email'] = "info@prozone.it"; // email del traduttore
$lang['charset'] = "utf-8"; // set di caratteri (utf-8 per default)
$lang['text_dir'] = "ltr"; // ('ltr' se scritto da sinistra a destra, 'rtl' altrimenti)
$lang['lang_iso'] = "it"; // codice lingua ISO
$lang['lang_libelle_en'] = "Italian"; // nome della lingua in inglese
$lang['lang_libelle_fr'] = "Italien"; // nome della lingua in francese
$lang['unites_bytes'] = array('Byte', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
$lang['separateur_milliers'] = ' '; // per separare le migliaia si usa uno spazio
$lang['separateur_decimaux'] = ','; // per indicare la parte decimale si usa la virgola

//
// HTML Markups
//
$lang['head_titre'] = "phpMyVisites | sistema opensource di statistiche ed analisi del traffico web"; // titolo della pagina
$lang['head_keywords'] = "phpmyvisites, php, script, applicazione, software, statistiche, riferimenti, referer, stat, gratuito, open source, gpl, contatti, visitatori, mysql, pagine richieste, pagine, richieste, numero di contatti, grafici, browser, os, sistema operativo, risoluzione, giorno, settimana, mese, record, paese, host, provider, motore di ricerca, parole chiave, referrers, grafici, pagina di ingresso, pagina di uscita, grafico a torta"; // Chiavi nell'header
$lang['head_description'] = "phpMyVisites | un sistema opensource di statistiche per siti web sviluppato in PHP/MySQL e distribuito in accordo alla licenza Gnu GPL."; // Descrizione dell'header
$lang['logo_description'] = "phpMyVisites: sistema opensource di statistiche per web in PHP/MySQL, basato su licenza GPL."; // Descrizione del javascript (dev'essere breve!)

//
// Main menu & submenu
//
$lang['menu_visites'] = "Visite";
$lang['menu_pagesvues'] = "Pagine";
$lang['menu_suivi'] = "Trasferimenti";
$lang['menu_provenance'] = "Provenienza";
$lang['menu_configurations'] = "Impostazioni";
$lang['menu_affluents'] = "Riferimenti";
$lang['menu_listesites'] = "Elenco dei siti";
$lang['menu_bilansites'] = "Sommario";
$lang['menu_jour'] = "Giorno";
$lang['menu_semaine'] = "Settimana";
$lang['menu_mois'] = "Mese";
$lang['menu_annee'] = "Anno";
$lang['menu_periode'] = "Periodo di analisi: %s"; // Testo formattato (es.: Periodo di analisi: marted 12 ottobre)
$lang['liens_siteofficiel'] = "Sito ufficiale";
$lang['liens_admin'] = "Amministrazione";
$lang['liens_contacts'] = "Come contattarci";

//
// Divers
//
$lang['generique_nombre'] = "Numero";
$lang['generique_tauxsortie'] = "Percentuale di uscita";
$lang['generique_ok'] = "OK";
$lang['generique_timefooter'] = "Pagine generate in %s secondi"; // Time in seconds
$lang['generique_divers'] = "Altri"; // (per i grafici)
$lang['generique_inconnu'] = "Sconosciuto"; // (per i grafici)
$lang['generique_vous'] = "...te?";
$lang['generique_traducteur'] = "Traduttore";
$lang['generique_langue'] = "Lingua";
$lang['generique_autrelangure'] = "Non in elenco?"; // Altre lingue, si cercano traduttori
$lang['aucunvisiteur_titre'] = "Nessun visitatore nel periodo selezionato."; 
$lang['generique_aucune_visite_bdd'] = "<b>Attenzione! </b> Per questo sito non ci sono statistiche. Accertarsi di aver inserito il codice javascript nelle pagine da monitorare. Controllare la documentazione per ulteriore aiuto.";
$lang['generique_aucune_site_bdd'] = "Nessun sito inserito nel database! Autenticarsi come amministratore per aggiungere un sito da monitorare.";
$lang['generique_retourhaut'] = "Su";
$lang['generique_tempsvisite'] = "%sm %ss"; // 3min 25s means 3 minutes and 25 seconds
$lang['generique_tempsheure'] = "%sh"; // 4h means 4 hours
$lang['generique_siteno'] = "Sito %s"; // Site "phpmyvisites"
$lang['generique_newsletterno'] = "Newsletter %s"; // Newsletter "version 2 announcement"
$lang['generique_partnerno'] = "Siti amici %s"; // Partner "version 2 announcement"
$lang['generique_general'] = "Generale";
$lang['generique_user'] = "Utente %s"; // User "Admin"
$lang['generique_previous'] = "Precedente";
$lang['generique_next'] = "Prossima";
$lang['generique_lowpop'] = "Escludi nazioni con valori bassi di popolazione";
$lang['generique_allpop'] = "Includi tutte le nazioni nelle statistiche";
$lang['generique_to'] = "a"; // 4 'to' 8
$lang['generique_total_on'] = "acceso"; // 4 to 8 'on' 10
$lang['generique_total'] = "Totale";
$lang['generique_information'] = "Informazioni";
$lang['generique_done'] = "Fatto!";
$lang['generique_other'] = "Altro";
$lang['generique_description'] = "Descrizione:";
$lang['generique_name'] = "Nome:";
$lang['generique_variables'] = "Variabili";
$lang['generique_logout'] = "Esci";
$lang['generique_login'] = "Accedi";
$lang['generique_hits'] = "Contatti";
$lang['generique_errors'] = "Errori";
$lang['generique_site'] = "Sito";
$lang['generique_help_novisits'] = "Avviso: Hai %s installato il codice javascript %s nelle tue pagine?";

//
// Authentication
//
$lang['login_password'] = "password: "; // tutto minuscolo
$lang['login_login'] = "nome utente: "; // tutto minuscolo
$lang['login_error'] = "Accesso non riuscito, nome utente o password errati.";
$lang['login_error_nopermission'] = "The user specified doesn't have any permission. Please ask the Super User to set up your website view/admin permissions in phpMyVisites.";
$lang['login_protected'] = "Stai per accedere all'area protetta %sphpMyVisites%s.";

//
// Contacts & "Others ?"
//
$lang['contacts_titre'] = "Contatti";
$lang['contacts_langue'] = "Traduzioni";
$lang['contacts_merci'] = "Grazie";
$lang['contacts_auteur'] = "<strong>Matthieu Aubry</strong> ha ideato, documentato e realizzato il progetto phpMyVisites.";
$lang['contacts_questions'] = "Per <strong>domande tecniche, bug, suggerimenti</strong> fare riferimento ai forum sul sito ufficiale %s. Per altre richieste, contattare l'autore usando l'apposito form sul sito ufficiale."; // indirizzo del sito
$lang['contacts_trad1'] = "Ti piacerebbe tradurre phpMyVisites nella tua lingua? Non esitare: <strong>phpMyVisites ha bisogno di te!</strong>";
$lang['contacts_trad2'] = "Tradurre phpMyVisites richieder&agrave; qualche ora ed una buona conoscenza dei linguaggi di programmazione utilizzati: per&ograve; tieni presente che <strong>moltissimi utenti trarranno un beneficio da questo lavoro</strong>. Se desideri tradurre phpMyVisites, in %s troverai la documentazione ufficiale di phpMyVisites %s."; // lien vers la doc
$lang['contacts_doc'] = "Non esitare a consultare %s la documentazione ufficiale di phpMyVisites %s, che fornisce un sacco di informazioni su installazione, configurazione e funzionalit&agrave; di phpMyVisites: la puoi trovare nella versione di phpMyVisites in tuo possesso."; // puntatore ai documenti
$lang['contacts_thanks_dev'] = "Grazie <strong>%s</strong>, co-sviluppatori di phpMyVisites, per il loro inestimabile contributo al progetto.";
$lang['contacts_merci3'] = "Consultate la pagina dei ringraziamenti sul sito ufficiale per avere l'elenco completo degli amici di phpMyVisites.";
$lang['contacts_merci2'] = "Un immenso 'grazie' a quanto condividono il proprio bagaglio culturale contribuendo a tradurre phpMyVisites:";

//
// Rss & Mails
//
$lang['rss_titre'] = "Sito %s, %s"; // Site MyHomePage on Sunday 29 
$lang['rss_go'] = "Vai alle statistiche dettagliate";
$lang['mail_sender_name'] = "Statistiche web (automatiche)";

//
// Visits Part
//
$lang['visites_titre'] = "Informazioni sulle visite"; 
$lang['visites_statistiques'] = "Statistiche";
$lang['visites_periodesel'] = "Per il periodo selezionato";
$lang['visites_visites'] = "Visite";
$lang['visites_uniques'] = "Contatti";
$lang['visites_pagesvues'] = "Pagine visualizzate";
$lang['visites_pagesvisiteurs'] = "Pagine per visitatore"; 
$lang['visites_pagesvisites'] = "Pagine per visita"; 
$lang['visites_pagesvisitessign'] = "Pagine per visita unica"; 
$lang['visites_tempsmoyen'] = "Durata media di una visita";
$lang['visites_tempsmoyenpv'] = "Permanenza media in una pagina";
$lang['visites_tauxvisite'] = "Percentuale di visite ad una sola pagina"; 
$lang['visites_average_visits_per_day'] = "Media giornaliera visite"; 
$lang['visites_recapperiode'] = "Riepiloghi del periodo";
$lang['visites_nbvisites'] = "Visite";
$lang['visites_aucunevivisite'] = "Nessuna visita"; // nella tabella, dev'essere breve
$lang['visites_recap'] = "Riepilogo";
$lang['visites_unepage'] = "1 pag."; // (graph)
$lang['visites_pages'] = "%s pag."; // 1-2 pages (graph)
$lang['visites_min'] = "%sm"; // 10-15 min (graph)
$lang['visites_sec'] = "%ss"; // 0-30 s (seconds, graph)
$lang['visites_grapghrecap'] = "Grafico di riepilogo delle statistiche";
$lang['visites_grapghrecaplongterm'] = "Grafico con riepilogo lungo delle statistiche";
$lang['visites_graphtempsvisites'] = "Grafico durata delle visite, per visitatore";
$lang['visites_graphtempsvisitesimg'] = "Durata delle visite, per visitatore";
$lang['visites_graphheureserveur'] = "Grafico visite orarie al server"; 
$lang['visites_graphheureserveurimg'] = "Visite per ora (orario server)"; 
$lang['visites_graphheurevisiteur'] = "Grafico visite orarie al server, per visitatore";
$lang['visites_graphheurelocalimg'] = "Visite per ora (orario visitatore)"; 
$lang['visites_longterm_statd'] = "Analisi a lungo termine (giorni)";
$lang['visites_longterm_statm'] = "Analisi a lungo termine (mesi)";

//
// Sites Summary
//
$lang['summary_title'] = "Sommario sito";
$lang['summary_stitle'] = "Sommario";

//
// Frequency Part
//
$lang['frequence_titre'] = "Visitatori di ritorno";
$lang['frequence_nouveauxconnusgraph'] = "Grafico delle visite nuove e di ritorno";
$lang['frequence_nouveauxconnus'] = "Visite nuove e di ritorno";
$lang['frequence_titremenu'] = "Frequenza";
$lang['frequence_visitesconnues'] = "Visite di ritorno";
$lang['frequence_nouvellesvisites'] = "Nuove visite";
$lang['frequence_visiteursconnus'] = "Visitatori di ritorno";
$lang['frequence_nouveauxvisiteurs'] = "Nuovi visitatori";
$lang['frequence_returningrate'] = "Percentuale visitatori di ritorno";
$lang['pagesvues_vispervisgraph'] = "Grafico delle visite per visitatore";
$lang['frequence_vispervis'] = "Numero di visite per visitatore";
$lang['frequence_vis'] = "visite";
$lang['frequence_visit'] = "1 visita"; // (graph)
$lang['frequence_visits'] = "%s visite"; // (graph)

//
// Seen Pages
//
$lang['pagesvues_titre'] = "Pagine visualizzate";
$lang['pagesvues_joursel'] = "Giorno selezionato";
$lang['pagesvues_jmoins7'] = "7 giorni prima";
$lang['pagesvues_jmoins14'] = "14 giorni prima";
$lang['pagesvues_moyenne'] = "(media)";
$lang['pagesvues_pagesvues'] = "Pagine visualizzate";
$lang['pagesvues_pagesvudiff'] = "Pagine uniche visualizzate";
$lang['pagesvues_recordpages'] = "Pi&ugrave; alto numero di pagine per visitatore";
$lang['pagesvues_tabdetails'] = "Pagine visualizzate (dalla %s alla %s)"; // (dalla 1 alla 21)
$lang['pagesvues_graphsnbpages'] = "Grafico del numero di visite per pagina";
$lang['pagesvues_graphnbvisitespageimg'] = "visite per pagina";
$lang['pagesvues_graphheureserveur'] = "Grafico delle visite ordinate per ora (fuso server)";
$lang['pagesvues_graphheureserveurimg'] = "Visite ordinate per ora (fuso locale)";
$lang['pagesvues_graphheurevisiteur'] = "Grafico delle visite ordinate per ora (fuso utente)";
$lang['pagesvues_graphpageslocalimg'] = "Visite ordinate per ora (fuso utente)";
$lang['pagesvues_tempsparpage'] = "Tempo per pagina";
$lang['pagesvues_total_time'] = "Tempo totale";
$lang['pagesvues_avg_time'] = "Tempo medio";
$lang['pagesvues_help_pagename'] = "Sapevi che puoi assegnare un nome semplice alle tue pagine?";
$lang['pagesvues_help_track_dls'] = "Sapevi che puoi tenere traccia di download e di redirezioni a URL esterni?";

//
// Follows-Up
//
$lang['suivi_titre'] = "Trasferimenti da una pagina all'altra";
$lang['suivi_pageentree'] = "Trasferimenti in ingresso";
$lang['suivi_pagesortie'] = "Trasferimenti in uscita";
$lang['suivi_tauxsortie'] = "Percentuale di uscita";
$lang['suivi_pageentreehits'] = "Contatti in entrata";
$lang['suivi_pagesortiehits'] = "Contatti in uscita";
$lang['suivi_singlepage'] = "Visite di una sola pagina";

//
// Origin
//
$lang['provenance_titre'] = "Provenienza dei visitatori";
$lang['provenance_recappays'] = "Riepilogo dei Paesi";
$lang['provenance_pays'] = "Paesi";
$lang['provenance_paysimg'] = "Grafico dei visitatori per Paese";
$lang['provenance_fai'] = "Provider Internet";
$lang['provenance_nbpays'] = "Numero di diverse nazioni: %s";
$lang['provenance_provider'] = "Provider"; // same as $lang['provenance_fai'], but not if $lang['provenance_fai'] is too long
$lang['provenance_continent'] = "Continente";
$lang['provenance_mappemonde'] = "Planisfero";
$lang['provenance_interetspays'] = "Nazioni interessate";

//
// Setup
//
$lang['configurations_titre'] = "Configurazione di sistema e software";
$lang['configurations_os'] = "Sistema operativo";
$lang['configurations_osimg'] = "Grafico dei sistemi operativi";
$lang['configurations_navigateurs'] = "Browser";
$lang['configurations_navigateursimg'] = "Grafico dei browser";
$lang['configurations_resolutions'] = "Risoluzione video";
$lang['configurations_resolutionsimg'] = "Grafico delle risoluzioni video";
$lang['configurations_couleurs'] = "Profondità di colore";
$lang['configurations_couleursimg'] = "Grafico delle profondità di colore";
$lang['configurations_rapport'] = "Normale/Schermo intero";
$lang['configurations_large'] = "Schermo intero";
$lang['configurations_normal'] = "Normale";
$lang['configurations_double'] = "Doppio video";
$lang['configurations_plugins'] = "Plug-in"; 
$lang['configurations_navigateursbytype'] = "Browser"; 
$lang['configurations_navigateursbytypeimg'] = "Grafico dei browser utilizzati"; 
$lang['configurations_os_interest'] = "Sistemi operativi interessati";
$lang['configurations_navigateurs_interest'] = "Browser interessati";
$lang['configurations_resolutions_interest'] = "Risoluzione video interessate";
$lang['configurations_couleurs_interest'] = "Profondita' colore interessate";
$lang['configurations_configurations'] = "Classifica impostazioni";

//
// Referers
//
$lang['affluents_titre'] = "Riferimenti";
$lang['affluents_recapimg'] = "Grafico dei visitatori in base ai riferimenti";
$lang['affluents_directimg'] = "Richieste dirette";
$lang['affluents_sitesimg'] = "Siti web";
$lang['affluents_moteursimg'] = "Motori di ricerca";
$lang['affluents_referrersimg'] = "Riferimenti";
$lang['affluents_moteurs'] = "Motori di ricerca";
$lang['affluents_nbparmoteur'] = "Visite provenienti da motori di ricerca: %s";
$lang['affluents_aucunmoteur'] = "Nessuna visita ha avuto origine da un motore di ricerca.";
$lang['affluents_motscles'] = "Parole chiave";
$lang['affluents_nbmotscles'] = "Parole chiave distinte: %s";
$lang['affluents_aucunmotscles'] = "Nessuna parola chiave presente.";
$lang['affluents_sitesinternet'] = "Siti web";
$lang['affluents_nbautressites'] = "Visite provenienti da altri siti web: %s";
$lang['affluents_nbautressitesdiff'] = "Numero di siti web: %s";
$lang['affluents_aucunautresite'] = "Nessuna visita ha avuto origine da altri siti web.";
$lang['affluents_entreedirecte'] = "Richieste dirette";
$lang['affluents_nbentreedirecte'] = "Visite direttamente all'indirizzo del sito: %s";
$lang['affluents_nbpartenaires'] = "Visite dai siti amici: %s";
$lang['affluents_aucunpartenaire'] = "Nessuna visita proveniente da siti amici.";
$lang['affluents_nbnewsletters'] = "Visite da newsletter: %s";
$lang['affluents_aucunnewsletter'] = "Nessuna visita proveniente da newsletter.";
$lang['affluents_details'] = "Dettagli"; // In the results of the referers array
$lang['affluents_interetsmoteurs'] = "Motori di ricerca interessati";
$lang['affluents_interetsmotscles'] = "Parole chiave interessate";
$lang['affluents_interetssitesinternet'] = "Siti web interessati";
$lang['affluents_partenairesimg'] = "Sito amico";
$lang['affluents_partenaires'] = "Sito amico";
$lang['affluents_interetspartenaires'] = "Siti amici interessati";
$lang['affluents_newslettersimg'] = "Newsletter";
$lang['affluents_newsletters'] = "Newsletter";
$lang['affluents_interetsnewsletters'] = "Newsletters interessate";
$lang['affluents_type'] = "Tipo di riferimento";
$lang['affluents_interetstype'] = "Tipo di accesso interessato";

//
// Summary
//
$lang['purge_titre'] = "Riepilogo delle visite e dei referer";
$lang['purge_intro'] = "Questo periodo &egrave; stato rimosso dall'amministratore, quindi rimangono solo i dati statistici essenziali.";
$lang['admin_purge'] = "Manutenzione database";
$lang['admin_purgeintro'] = "Questa sezione permette di operare sulle tabelle di phpMyVisites. Da qui si pu&ograve; vedere lo spazio occupato dalle tabelle, ottimizzarle o rimuovere vecchi dati, in modo da limitare lo spazio utilizzato dal database.";
$lang['admin_optimisation'] = "Ottimizzazione di [ %s ]..."; // Tables names
$lang['admin_postopt'] = "Lo spazio occupato &egrave; diminuito di %chiffres% %unites%"; // 28 Kb
$lang['admin_purgeres'] = "Rimuovere questo periodo: %s";
$lang['admin_purge_fini'] = "Cancellazione tabelle ultimata.";
$lang['admin_bdd_nom'] = "Nome";
$lang['admin_bdd_enregistrements'] = "Registrazioni";
$lang['admin_bdd_taille'] = "Dim. tabella";
$lang['admin_bdd_opt'] = "Ottimizza";
$lang['admin_bdd_purge'] = "Criteri di pulizia";
$lang['admin_bdd_optall'] = "Ottimizza tutte";
$lang['admin_purge_j'] = "Rimuovi dati pi&ugrave; vecchi di %s giorni";
$lang['admin_purge_s'] = "Rimuovi dati pi&ugrave; vecchi di %s settimane";
$lang['admin_purge_m'] = "Rimuovi dati pi&ugrave; vecchi di %s mesi";
$lang['admin_purge_y'] = "Rimuove registrazioni piu' vecchie di %s anni";
$lang['admin_purge_logs'] = " Agisci su tutti i dati";
$lang['admin_purge_autres'] = "Pulizia effettuata pulendo la tabella '%s'";
$lang['admin_purge_none'] = "Nessuna azione possibile";
$lang['admin_purge_cal'] = "Calcolo e cancellazione (pu&ograve; durare qualche minuto)";
$lang['admin_alias_title'] = "Alias di siti web e URL";
$lang['admin_partner_title'] = "Siti web amici";
$lang['admin_newsletter_title'] = "Website newsletters";
$lang['admin_ip_exclude_title'] = "Serie di indirizzi IP da escludere dalle statistiche";
$lang['admin_name'] = "Nome:";
$lang['admin_error_ip'] = "IP deve essere inserito nel formato: %s";
$lang['admin_site_name'] = "Nome sito";
$lang['admin_site_url'] = "URL principale sito";
$lang['admin_db_log'] = "Autenticati come amministratore di phpMyVisites per cambiare le impostazioni del database.";
$lang['admin_error_critical'] = "Deve essere corretto un errore critico affinche' phpMyVisites funzioni.";
$lang['admin_warning'] = "Attenzione, phpMyVisites lavorera' correttamente, ma alcune caratteristiche saranno disabilitate.";
$lang['admin_move_group'] = "Sposta al gruppo:";
$lang['admin_move_select'] = "Seleziona un gruppo";
$lang['admin_site_select'] = "Site to administrate";

//
// Setup
//
$lang['admin_intro'] = "Benvenuti nella configurazione di phpMyVisites. Da qui &egrave; possibile modificare tutte le informazioni relative all'installazione. In caso di problemi non esitate a consultare %s la documentazione ufficiale di phpMyVisites %s."; // link to the doc
$lang['admin_configetperso'] = "Impostazioni generali";
$lang['admin_afficherjavascript'] = "Codice javascript da inserire nelle pagine";
$lang['admin_cookieadmin'] = "Non includere l'amministratore nelle statistiche";
$lang['admin_ip_ranges'] = "Non contare un IP o una serie di IP nelle statistiche";
$lang['admin_sitesenregistres'] = "Siti web presenti:";
$lang['admin_retour'] = "Indietro";
$lang['admin_cookienavigateur'] = "Si pu&ograve; escludere l'amministratore dalle statistiche; Questo metodo richiede che il browser supporti i cookies. L'opzione pu&ograve; essere modificata in qualsiasi momento.";
$lang['admin_prendreencompteadmin'] = "Includi l'amministratore nelle statistiche (cancella il cookie)";
$lang['admin_nepasprendreencompteadmin'] = "Escludi l'amministratore dalle statistiche (crea il cookie)";
$lang['admin_etatcookieoui'] = "L'amministratore viene incluso nelle statistiche (questa &egrave; la configurazione di default: l'amministratore viene considerato un normale visitatore";
$lang['admin_etatcookienon'] = "L'amministratore non viene incluso nelle statistiche (quindi le visite dell'amministratore al sito non vengono prese in considerazione)";
$lang['admin_deleteconfirm'] = "Confermi di procedere alla cancellazione di %s?";
$lang['admin_sitedeletemessage'] = "Please <u>be very careful</u>: all data associated to that Site will be deleted <br>and there won't be any way to recover the data loss.";
$lang['admin_confirmyes'] = "Si, lo confermo";
$lang['admin_confirmno'] = "No, ho cambiato idea";
$lang['admin_nonewsletter'] = "Nessuna newsletter trovata per questo sito!";
$lang['admin_nopartner'] = "Nessun sito amico trovato per questo sito!";
$lang['admin_get_question'] = "Registra le variagili GET? (variabili via URL)";
$lang['admin_get_a1'] = "Registra tutte le varibili GET";
$lang['admin_get_a2'] = "Non registrare le variabili GET";
$lang['admin_get_a3'] = "Registra solo delle variabili specifiche";
$lang['admin_get_a4'] = "Registra tutte ad eccezione di";
$lang['admin_get_default_pdf'] = "Resoconto PDF:";
$lang['admin_get_default_pdfdefault'] = "Preimpostazioni resoconto PDF"; 
$lang['admin_get_default_theme'] = "Tema visuale per questo sito:";
$lang['admin_get_list'] = "Nomi variabili (lista separata da <b>;</b>) <br/>Esempio: %s";
$lang['admin_required'] = "%s e' richiesto.";
$lang['admin_title_required'] = "Richiesto";
$lang['admin_write_dir'] = "Cartella con permessi di scrittura";
$lang['admin_chmod_howto'] = "Devono essere impostati i permessi di scrittura per questa cartella. Questo significa che devi impostarla a 777, attraverso il tuo client FTP (tasto destro sulla cartella -> Permessi (o chmod))";
$lang['admin_optional'] = "Opzionale";
$lang['admin_memory_limit'] = "Limite memoria";
$lang['admin_allowed'] = "permesso";
$lang['admin_webserver'] = "Server web";
$lang['admin_server_os'] = "OS server";
$lang['admin_server_time'] = "Ora server";
$lang['admin_legend'] = "Legenda:";
$lang['admin_error_url'] = "URL deve essere inserito correttamente: %s (senza barra alla fine)";
$lang['admin_url_n'] = "URL %s:";
$lang['admin_url_aliases'] = "Alias URL";
$lang['admin_logo_question'] = "Visualizza immagine?";
$lang['admin_type_again'] = "(riscrivi)";
$lang['admin_admin_mail'] = "E-mail amministratore";
$lang['admin_admin'] = "Amministratore";
$lang['admin_phpmv_path'] = "Percorso completo di phpMyVisites";
$lang['admin_valid_email'] = "L'indirizzo e-mail deve essere valido";
$lang['admin_valid_pass'] = "La password deve essere più sicura (minimo 6 caratteri e deve contenere dei numeri)";
$lang['admin_match_pass'] = "Le password non corrispondono";
$lang['admin_no_user_group'] = "Nessun utente del gruppo per questo sito";
$lang['admin_recorded_nl'] = "Newsletter registrate:";
$lang['admin_recorded_partners'] = "Siti amici registrati:";
$lang['admin_recorded_users'] = "Utenti registrati:";
$lang['admin_select_site_title'] = "Seleziona un sito";
$lang['admin_select_user_title'] = "Seleziona un utente";
$lang['admin_no_user_registered'] = "Nessun utente registrato!";
$lang['admin_configuration'] = "Configurazione";
$lang['admin_general_conf'] = "impostazioni generali";
$lang['admin_group_title'] = "Gestione gruppi (permessi)";
$lang['admin_user_title'] = "Gestione utente";
$lang['admin_user_add'] = "Aggiungi utente";
$lang['admin_user_mod'] = "Modifica utente";
$lang['admin_user_del'] = "Elimina utente";
$lang['admin_user_oldPwd'] = "Vecchia password"; 
$lang['admin_user_oldPwd_bad'] = "La vecchia password non è corretta."; 
$lang['admin_server_info'] = "Informazioni server";
$lang['admin_send_mail'] = "Invia statistiche via mail";
$lang['admin_rss_feed'] = "Statistiche via feed RSS";
$lang['admin_rss_feed_specific_site'] = "Website '%s' Statistics - RSS"; // site 2
$lang['admin_site_admin'] = "Amministrazione sito";
$lang['admin_site_add'] = "Aggiungi sito";
$lang['admin_site_mod'] = "Modifica sito";
$lang['admin_site_del'] = "Elimina sito";
$lang['admin_nl_add'] = "Aggiungi newsletter";
$lang['admin_nl_mod'] = "Modifica newsletter";
$lang['admin_nl_del'] = "Elimina newsletter";
$lang['admin_partner_add'] = "Aggiungi sito amico";
$lang['admin_partner_mod'] = "Modifica sito amico";
$lang['admin_partner_del'] = "Elimina sito amico";
$lang['admin_url_alias'] = "Impostazioni alias URL";
$lang['admin_group_admin_n'] = "Vede statistiche e amministra";
$lang['admin_group_admin_d'] = "L'utente puo' vedere le statistiche e amministrare il sistema cambiando ogni tipo di configurazione.";
$lang['admin_group_view_n'] = "Vede statistiche";
$lang['admin_group_view_d'] = "L'utente puo' solamente visionare le statistiche. Nessuna funzione di amministrazione.";
$lang['admin_group_noperm_n'] = "Nessun permesso";
$lang['admin_group_noperm_d'] = "L'utente di questo gruppo non ha nessun tipo di permesso.";
$lang['admin_group_stitle'] = "Puoi modificare i gruppi di appartenenza selezionando gli utenti interessati e poi selezionando il gruppo del quale si desidera questi utenti facciano parte.";
$lang['admin_url_generate_download_link_example'] = "Indirizzo del download o del link/URL esterno";
$lang['admin_url_generate_title'] = "Download file/Redirezione URL: Generatore indirizzo";
$lang['admin_url_generate_intro'] = "phpMyVisites puo' contare i download di un determinato file e puo' anche tenere traccia dei click  a indirizzi/URL esterni. I download e gli indirizzi esterni saranno visibili nella sezione 'Pagine visualizzate'.</p><p class='texte'> Per ottenere questa tracciatura si deve utilizzare un indirizzo generato da phpmyvistes, indirizzo che punterà alla risorsa (file o URL) desiderata. La procedura per generare l'indirizzo personalizzato è semplice; basta completare il modulo con l'indirizzo della risorsa di cui tenere traccia (file/indirizzo esterno) e poi cliccare su 'Genera URL'!";
$lang['admin_url_generate_site_selection'] = "Sito per il quale si desidera tracciare un file download o un click a indirizzo esterno";
$lang['admin_url_generate_tag_selection'] = "Etichetta di identificazione del file download o del click a indirizzo esterno"; 
$lang['admin_url_generate_enter_url'] = "Inserire l'indirizzo completo del file o del link esterno di cui tenere traccia:";
$lang['admin_url_generate_help_enter_url'] = "Esempio: Puoi inserire qualcosa come '<b>http://www.tuosito.com/file/il-mio-bel-file.zip</b>' o in caso di redirezione a URL esterno qualcosa come '<b>http://www.sitoesterno.net</b>'";
$lang['admin_url_generate_friendly_name'] = "Etichetta del file/URL che sarà usata come identificazione nella tabella delle statistiche:"; 
$lang['admin_url_generate_help_friendly_name'] = "Esempio: Puoi inserire anche una categoria per un miglior riscontro in fase di visualizzazione delle statistiche. Separa la cetegoria dalla specifica dell'indirizzo attraverso il carattere '<b>/</b>'. Per esempio, le etichette '<b>my photos download / vacanze in italia</b>' e '<b>partners / sito www.prozone.it</b>' classificano rispettivamente la tracciatura di un file download e quella di un click a indirizzo esterno e saranno mostrate, alla voce 'pagine visualizzate', rispettivamente nel gruppo '<b>download</b>' e nel gruppo '<b>indirizzo</b>'.";
$lang['admin_url_generate_result_url'] = "Questo è l'indirizzo da utilizzare:";
$lang['admin_url_generate_html_result'] = "Questo è il medesimo indirizzo in codice HTML già pronto per l'uso:";
$lang['admin_url_generate_html_onclick'] = "Questo è il codice HTML ere is the HTML using onclick event:";
$lang['admin_url_generate_image_legend'] = "Esempio di come apparirà la sezione 'pagine visualizzate' durante la tracciatura di file e di indirizzi URL esterni:";
$lang['admin_site_link_javascript'] = "%s Ora devi solo inserire il seguente codice javascript nelle pagine che ti interessa includere nelle statistiche. Clicca per visualizzare il codice javascript. %s";
$lang['admin_last_version'] = "Hai l'ultima versione? (E' raccomandato aggiornare sempre all'ultima versione disponibile!)";
$lang['admin_general_config_firstday'] = "Primo giorno della settimana?";
$lang['admin_default_language'] = "Lingua predefinita? <br/>Sarà la lingua predefinita anche nei messaggi e-mail.";
$lang['admin_back_statisitics'] = "Vai alle statistiche"; 

//
// Pdf export
//
$lang['pdf_generate_link'] = "Genera un PDF con tutte le statistiche per il sito %s";
$lang['pdf_summary_generate_link'] = "Generate un PDF con il riepilogo delle statistiche";
$lang['pdf_free_page'] = "Nuova pagina vuota";
$lang['pdf_free_chapter'] = "Titolo capitolo vuoto";
$lang['pdf_page_break'] = "Interruzione pagina";
$lang['pdf_page_summary'] = "Sommario";
$lang['generique_pdfno'] = "PDF %s"; // Newsletter "version 2 announcement" 
$lang['admin_pdf_title'] = "PDF per il sito web"; 
$lang['admin_nopdf'] = "Nessun PDF trovato per questo sito!";
$lang['admin_recorded_pdf'] = "PDF salvati:";
$lang['admin_pdf_add'] = "Aggiungi PDF"; 
$lang['admin_pdf_mod'] = "Modifica PDF"; 
$lang['admin_pdf_del'] = "Elimina PDF"; 
$lang['generique_pdf'] = "PDF";
$lang['pdf_lib_show_interest'] = "L'array desiderato è visualizzato";
$lang['pdf_lib_hide_interest'] = "L'array desiderato è nascosto";
$lang['pdf_lib_show_all'] = "I dettagli sono visualizzati"; 
$lang['pdf_lib_hide_all'] = "I dati sono limitati in dimensioni";
$lang['pdf_lib_edit_text'] = "Modifica questo testo"; 
$lang['pdf_lib_need_at_least_one_page'] = "Prima devi creare una 'pagina vuota'"; 
$lang['pdf_lib_can_not_add_chapter'] = "Non posso inserire un elemento prima della creazione di una pagina.";
$lang['pdf_lib_pdf_name_mandatory'] = "Il nome è obbligatorio"; 
$lang['pdf_lib_pdf_expand_all'] = "Espandi tutto"; 
$lang['pdf_lib_pdf_collapse_all'] = "Riduci tutto";
$lang['pdf_create_from_interface'] = "Crea un resoconto PDF personalizzato";
$lang['pdf_complete'] = "Resoconto completo in PDF"; 

//
// Installation Step
//
$lang['install_loginmysql'] = "Nome utente database";
$lang['install_mdpmysql'] = "Password database";
$lang['install_serveurmysql'] = "Indirizzo server MySQL";
$lang['install_basemysql'] = "Nome del database";
$lang['install_prefixetable'] = "Prefisso delle tabelle";
$lang['install_utilisateursavances'] = "Utenti avanzati (opzionale)";
$lang['install_oui'] = "S&igrave;";
$lang['install_non'] = "No";
$lang['install_ok'] = "OK";
$lang['install_probleme'] = "Problema: ";
$lang['install_DirectoriesWriteError'] = "<b>Problema! </b><br/>Non posso scrivere nella cartella/e %s Verifica che siano impostati i necessari permessi di scrittura nel tuo spazio web (prova ad impostare la cartella/e a CHMOD 755 attraverso il tuo client FTP: tasto destro del mouse sulla cartella -> Permessi o CHMOD. <br/><br/>Se la funzione CHMOD non è presente o non funziona, prova a cancellare la cartella e a ricrearla attraverso il tuo client FTP.";
$lang['install_loginadmin'] = "Nome utente amministratore: ";
$lang['install_mdpadmin'] = "Password amministratore: ";
$lang['install_chemincomplet'] = "Percorso completo dell'applicazione phpMyVisites (qualcosa del tipo http://www.mysite.com/rep1/rep3/phpmyvisites/). Il percorso deve finire con <strong>/</strong>.";
$lang['install_afficherlogo'] = "Mostrare il logo nelle pagine? %s <br />Acconsentendo a visualizzare il logo nel tuo sito web, contribuirai a far conoscere phpMyVisites, ci aiuterai così a crescere più rapidamente ed inoltre rappresenta un modo tangibile di dire 'grazie' all'autore di questa applicazione gratuita e Open Source."; // %s replaced by the logo image
$lang['install_affichergraphique'] = "Mostrare statistiche in forma grafica.";
$lang['install_valider'] = "Invia"; 
$lang['install_popup_logo'] = "Seleziona un logo"; 
$lang['install_logodispo'] = "Vedi i diversi loghi disponibili";
$lang['install_welcome'] = "Benvenuto!";
$lang['install_system_requirements'] = "Requisiti di sistema";
$lang['install_database_setup'] = "Impostazioni database";
$lang['install_create_tables'] = "Creazione tabelle";
$lang['install_general_setup'] = "Impostazioni generali";
$lang['install_create_config_file'] = "Creazione file di configurazione";
$lang['install_first_website_setup'] = "Aggiungere il primo sito web";
$lang['install_display_javascript_code'] = "Visualizza codice javascript";
$lang['install_finish'] = "Finito!";
$lang['install_txt2'] = "Al termine dell'installazione, l'applicativo si connetter&agrave; al sito ufficiale, per aiutarci a tenere traccia di quante persone usano phpMyVisites. Grazie per la comprensione!";
$lang['install_database_setup_txt'] = "Inserire i parametri del database.";
$lang['install_general_config_text'] = "phpMyVisites avra' un unico amministratore che ha pieno accesso a tutte le funzioni di amministrazione. Scegliere il nome utente e la password per l'amministratore. In seguito potrai aggiungere altri utenti.";
$lang['install_config_file'] = "informazioni dell'amministratore inserite con successo.";
$lang['install_js_code_text'] = "<p>Per conteggiare tutti i visitatori si dovra' inserire il codice javascript in ogni pagina.</p> <p><strong>phpMyVisites lavora con tutti i tipi di pagine (come HTML, ASP, Perl, PHP ed ogni tipo di linguaggio).</strong> </p><p> Di seguito il codice da inserire, da copiare e incollare nelle pagine da monitorare:</p>";
$lang['install_intro'] = "Benvenuto all'installazione di phpMyVisites."; 
$lang['install_intro2'] = "Questa procedura è suddivisa in %s facili passi che potrai completare in pochi minuti.";
$lang['install_next_step'] = "Vai al prossimo passo";
$lang['install_status'] = "Stato installazione";
$lang['install_done'] = "Installazione %s%% completa"; // Install 25% complete
$lang['install_site_success'] = "Sito web creato con successo!";
$lang['install_site_info'] = "Inserire tutte le informazioni del primo sito web.";
$lang['install_go_phpmv'] = "Vai a phpMyVisites!";
$lang['install_congratulation'] = "Congratulazioni! L'installazione di phpMyVisites e' completa.";
$lang['install_end_text'] = "Accertati che il codice javascript sia presente nelle pagine del tuo sito e aspetta il primo visitatore!";
$lang['install_db_ok'] = "Connessione al database ok!";
$lang['install_table_exist'] = "Le tabelle phpMyVisites sono gia' presenti nel database.";
$lang['install_table_choice'] = "Scegli se riutilizzare le tabelle esistenti o se effettuare un'installazione partendo da zero.";
$lang['install_table_erase'] = "Elimina tutte le tabelle (sicuro?)";
$lang['install_table_reuse'] = "Riutilizza le tabelle esistenti";
$lang['install_table_success'] = "Tabelle create con successo!";
$lang['install_send_mail'] = "Desideri ricevere una mail giornaliera contenente il sommario delle statistiche?";

//
// Update Step
//
$lang['update_title'] = "Aggiorna phpMyVisites";
$lang['update_subtitle'] = "Stai per aggiornare phpMyVisites.";
$lang['update_versions'] = "La tua versione precedente %s sara' aggiornata alla %s.";
$lang['update_db_updated'] = "Il database e' stato aggiornato con successo!";
$lang['update_continue'] = "Continua con phpMyVisites";
$lang['update_jschange'] = "Attenzione! <br /> Il codice javascript di phpMyVisites e' stato modificato. Si deve procedere all'aggiornamento delle pagine del tuo sito web che lo contengono.<br /> I cambiamenti effettuati al codice javascript sono rari, ci scusiamo per il disagio causato attraverso questa modifica."; 

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
$lang['tdate3'] = "Settimana dal %daynumeric% %monthlong% al %daynumeric2% %monthlong2% %yearlong%";

// February 2004 Month
$lang['tdate4'] = "%monthlong% %yearlong% Month";

// December 2003
$lang['tdate5'] = "%monthlong% %yearlong%";

// 10 Febuary week
$lang['tdate6'] = "Sett.%daynumeric% %monthshort%";

// 10-02-2003 // February 2 2003
$lang['tdate7'] = "%daynumeric%-%monthnumeric%-%yearlong%";

// Mon 10 (Only for Graphs purpose)
$lang['tdate8'] = "%dayshort% %daynumeric%";

// Week 10 Feb (Only for Graphs purpose)
$lang['tdate9'] = "Sett. %daynumeric% %monthshort%";

// Dec 04 (Only for Graphs purpose)
$lang['tdate10'] = "%monthshort% %yearshort%";

// Year 2004
$lang['tdate11'] = "Anno %yearlong%";

// 2004
$lang['tdate12'] = "%yearlong%";

// 31
$lang['tdate13'] = "%daynumeric%";

// Months
$lang['moistab']['01'] = "Gennaio";
$lang['moistab']['02'] = "Febbraio";
$lang['moistab']['03'] = "Marzo";
$lang['moistab']['04'] = "Aprile";
$lang['moistab']['05'] = "Maggio";
$lang['moistab']['06'] = "Giugno";
$lang['moistab']['07'] = "Luglio";
$lang['moistab']['08'] = "Agosto";
$lang['moistab']['09'] = "Settembre";
$lang['moistab']['10'] = "Ottobre";
$lang['moistab']['11'] = "Novembre";
$lang['moistab']['12'] = "Dicembre";

// Months (Graph purpose, 4 chars max)
$lang['moistab_graph']['01'] = "Gen";
$lang['moistab_graph']['02'] = "Feb";
$lang['moistab_graph']['03'] = "Mar";
$lang['moistab_graph']['04'] = "Apr";
$lang['moistab_graph']['05'] = "Mag";
$lang['moistab_graph']['06'] = "Giu";
$lang['moistab_graph']['07'] = "Lug";
$lang['moistab_graph']['08'] = "Ago";
$lang['moistab_graph']['09'] = "Set";
$lang['moistab_graph']['10'] = "Ott";
$lang['moistab_graph']['11'] = "Nov";
$lang['moistab_graph']['12'] = "Dic";

// Day of the week
$lang['jsemaine']['Mon'] = "Lunedi";
$lang['jsemaine']['Tue'] = "Martedi";
$lang['jsemaine']['Wed'] = "Mercoledi";
$lang['jsemaine']['Thu'] = "Giovedi";
$lang['jsemaine']['Fri'] = "Venerdi";
$lang['jsemaine']['Sat'] = "Sabato";
$lang['jsemaine']['Sun'] = "Domenica";

// Day of the week (Graph purpose, 4 chars max)
$lang['jsemaine_graph']['Mon'] = "Lun";
$lang['jsemaine_graph']['Tue'] = "Mar";
$lang['jsemaine_graph']['Wed'] = "Mer";
$lang['jsemaine_graph']['Thu'] = "Gio";
$lang['jsemaine_graph']['Fri'] = "Ven";
$lang['jsemaine_graph']['Sat'] = "Sab";
$lang['jsemaine_graph']['Sun'] = "Dom";

// First letter of each day, weekdays ordered
$lang['calendrier_jours'][0] = "L";
$lang['calendrier_jours'][1] = "M";
$lang['calendrier_jours'][2] = "M";
$lang['calendrier_jours'][3] = "G";
$lang['calendrier_jours'][4] = "V";
$lang['calendrier_jours'][5] = "S";
$lang['calendrier_jours'][6] = "D";

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
$lang['afr'] = "Africa";
$lang['asi'] = "Asia";
$lang['ams'] = "America centrale e Sudamerica";
$lang['amn'] = "Nordamerica";
$lang['oce'] = "Oceania";

// Oceans
$lang['oc_pac'] = "Oceano Pacifico"; 
$lang['oc_atl'] = "Oceano Atlantico"; 
$lang['oc_ind'] = "Oceano Indiano"; 

// Countries
$lang['domaines'] = array(
    "xx" => "Sconosciuta",
    "ac" => "Isole Ascension",
    "ad" => "Andorra",
    "ae" => "Emirati Arabi Uniti",
    "af" => "Afghanistan",
    "ag" => "Antigua e Barbuda",
    "ai" => "Anguilla",
    "al" => "Albania",
    "am" => "Armenia",
    "an" => "Antille Olandesi",
    "ao" => "Angola",
    "aq" => "Antartide",
    "ar" => "Argentina",
    "as" => "Samoa Americana",
    "at" => "Austria",
    "au" => "Australia",
    "aw" => "Aruba",
    "az" => "Azerbaijan",
    "ba" => "Bosnia-Erzegovina",
    "bb" => "Barbados",
    "bd" => "Bangladesh",
    "be" => "Belgio",
    "bf" => "Burkina Faso",
    "bg" => "Bulgaria",
    "bh" => "Bahrain",
    "bi" => "Burundi",
    "bj" => "Benin",
    "bm" => "Bermuda",
    "bn" => "Bruneo",
    "bo" => "Bolivia",
    "br" => "Brasile",
    "bs" => "Bahamas",
    "bt" => "Bhutan",
    "bv" => "Isole Bouvet",
    "bw" => "Botswana",
    "by" => "Belarus",
    "bz" => "Belize",
    "ca" => "Canada",
    "cc" => "Isole Cocos (Keeling)",
    "cd" => "Repubblica democratica del Congo",
    "cf" => "Repubblica Centrale Africana",
    "cg" => "Congo",
    "ch" => "Svizzera",
    "ci" => "Costa d''Avorio",
    "ck" => "Isole Cook",
    "cl" => "Cile",
    "cm" => "Camerun",
    "cn" => "Cina",
    "co" => "Colombia",
    "cr" => "Costa Rica",
	"cs" => "Serbia Montenegro",
    "cu" => "Cuba",
    "cv" => "Capo Verde",
    "cx" => "Isole Natale",
    "cy" => "Cipro",
    "cz" => "Repubblica Ceca",
    "de" => "Germania",
    "dj" => "Djibouti",
    "dk" => "Danimarca",
    "dm" => "Dominica",
    "do" => "Repubblica Dominicana",
    "dz" => "Algeria",
    "ec" => "Ecuador",
    "ee" => "Estonia",
    "eg" => "Egitto",
    "eh" => "Sahara Occidentale",
    "er" => "Eritrea",
    "es" => "Spagna",
    "et" => "Etiopia",
    "fi" => "Finlandia",
    "fj" => "Isole Fiji",
    "fk" => "Isole Falkland (Malvinas)",
    "fm" => "Stati Federati della Micronesia",
    "fo" => "Isole Faroe",
    "fr" => "Francia",
    "ga" => "Gabon",
    "gd" => "Grenada",
    "ge" => "Georgia",
    "gf" => "Guyana Francese",
    "gg" => "Guernsey",
    "gh" => "Ghana",
    "gi" => "Gibilterra",
    "gl" => "Groenlandia",
    "gm" => "Gambia",
    "gn" => "Guinea",
    "gp" => "Guadalupe",
    "gq" => "Guinea Equatoriale",
    "gr" => "Grecia",
    "gs" => "Georgia del Sud ed isole Sandwich",
    "gt" => "Guatemala",
    "gu" => "Guam",
    "gw" => "Guinea-Bissau",
    "gy" => "Guyana",
    "hk" => "Hong Kong",
    "hm" => "Isole Heard e McDonald",
    "hn" => "Honduras",
    "hr" => "Croazia",
    "ht" => "Haiti",
    "hu" => "Ungheria",
    "id" => "Indonesia",
    "ie" => "Irlanda",
    "il" => "Israele",
    "im" => "Isole Man",
    "in" => "India",
    "io" => "Territorio Inglese nell''Oceano Indiano",
    "iq" => "Iraq",
    "ir" => "Iran, Repubblica Islamica del",
    "is" => "Islanda",
    "it" => "Italia",
    "je" => "Jersey",
    "jm" => "Giamaica",
    "jo" => "Giordania",
    "jp" => "Giappone",
    "ke" => "Kenya",
    "kg" => "Kyrgyzstan",
    "kh" => "Cambogia",
    "ki" => "Kiribati",
    "km" => "Comoros",
    "kn" => "Saint Kitts and Nevis",
    "kp" => "Corea, Repubblica Popolare Democratica della",
    "kr" => "Corea, Repubblica della",
    "kw" => "Kuwait",
    "ky" => "Isole Cayman",
    "kz" => "Kazakhstan",
    "la" => "Laos",
    "lb" => "Libano",
    "lc" => "Saint Lucia",
    "li" => "Liechtenstein",
    "lk" => "Sri Lanka",
    "lr" => "Liberia",
    "ls" => "Lesotho",
    "lt" => "Lituania",
    "lu" => "Lussemburgo",
    "lv" => "Latvia",
    "ly" => "Libia",
    "ma" => "Marocco",
    "mc" => "Monaco",
    "md" => "Moldavia, Repubblica della",
    "mg" => "Madagascar",
    "mh" => "Isole Marshall",
    "mk" => "Macedonia",
    "ml" => "Mali",
    "mm" => "Myanmar",
    "mn" => "Mongolia",
    "mo" => "Macau",
    "mp" => "Isole Marianne del nord",
    "mq" => "Martinica",
    "mr" => "Mauritania",
    "ms" => "Montserrat",
    "mt" => "Malta",
    "mu" => "Mauritius",
    "mv" => "Maldive",
    "mw" => "Malawi",
    "mx" => "Messico",
    "my" => "Malesia",
    "mz" => "Mozambico",
    "na" => "Namibia",
    "nc" => "Nuova Caledonia",
    "ne" => "Nigeria",
    "nf" => "Isole Norfolk",
    "ng" => "Nigeria",
    "ni" => "Nicaragua",
    "nl" => "Olanda",
    "no" => "Norvegia",
    "np" => "Nepal",
    "nr" => "Nauru",
    "nu" => "Niue",
    "nz" => "Nuova Zelanda",
    "om" => "Oman",
    "pa" => "Panama",
    "pe" => "Peru",
    "pf" => "Polinesia Francese",
    "pg" => "Papuasia Nuova Guinea",
    "ph" => "Filippine",
    "pk" => "Pakistan",
    "pl" => "Polonia",
    "pm" => "Saint Pierre e Miquelon",
    "pn" => "Pitcairn",
    "pr" => "Porto Rico",
	"ps" => "Palestinian Territory",
    "pt" => "Portogallo",
    "pw" => "Palau",
    "py" => "Paraguay",
    "qa" => "Qatar",
    "re" => "Isole Reunion",
    "ro" => "Romania",
    "ru" => "Federazione Russa",
    "rs" => "Russia",
    "rw" => "Ruanda",
    "sa" => "Arabia Saudita",
    "sb" => "Isole Solomon",
    "sc" => "Seychelles",
    "sd" => "Sudan",
    "se" => "Svezia",
    "sg" => "Singapore",
    "sh" => "Sant Elena",
    "si" => "Slovenia",
    "sj" => "Svalbard",
    "sk" => "Slovacchia",
    "sl" => "Sierra Leone",
    "sm" => "San Marino",
    "sn" => "Senegal",
    "so" => "Somalia",
    "sr" => "Suriname",
    "st" => "Sao Tome e Principe",
    "su" => "Ex U.R.S.S.",
    "sv" => "El Salvador",
    "sy" => "Repubblica Araba Siriana",
    "sz" => "Swaziland",
    "tc" => "Isole Turks e Caicos",
    "td" => "Ciad",
    "tf" => "Territori Francesi del Sud",
    "tg" => "Togo",
    "th" => "Tailandia",
    "tj" => "Tajikistan",
    "tk" => "Tokelau",
    "tm" => "Turkmenistan",
    "tn" => "Tunisia",
    "to" => "Tonga",
    "tp" => "Timor Est",
    "tr" => "Turchia",
    "tt" => "Trinidad e Tobago",
    "tv" => "Tuvalu",
    "tw" => "Taiwan, Provincia della Cina",
    "tz" => "Tanzania, Repubbliche Unite della",
    "ua" => "Ucraina",
    "ug" => "Uganda",
    "uk" => "Inghilterra",
    "gb" => "Gran Bretagna",
    "um" => "Isole Minori degli U.S.A.",
    "us" => "Stati Uniti d''America",
    "uy" => "Uruguay",
    "uz" => "Uzbekistan",
    "va" => "Vaticano",
    "vc" => "Saint Vincent e le Grenadines",
    "ve" => "Venezuela",
    "vg" => "Isole Vergini, Inghilterra",
    "vi" => "Isole Vergini, U.S.",
    "vn" => "Vietnam",
    "vu" => "Vanuatu",
    "wf" => "Wallis e Futuna",
    "ws" => "Samoa",
    "ye" => "Yemen",
    "yt" => "Mayotte",
    "yu" => "Jugoslavia",
    "za" => "Sudafrica",
    "zm" => "Zambia",
    "zr" => "Zaire",
    "zw" => "Zimbabwe",
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