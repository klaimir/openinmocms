<?php
header('Content-type: text/css; charset=utf-8');
$theme_path = "";
$theme_site = "themes/default/";
$direction = $_GET["dir"];
$adminStyle = ((isset($_GET["admin"])) && ($_GET["admin"] == "true"));

if ($direction == "rtl")
{
	$rightouleft = "right";
	$leftouright = "left";
}
else
{
	$rightouleft = "left";
	$leftouright = "right";
}

print "
/* styles par defaut pour tous les elements */
* {
font-family: verdana, tahoma, Trebuchet MS,arial, sans-serif;
}

/* style de la page */
BODY {
background: #FFFFFF;
margin: 0;
}
/* Gros titres */
H1 {
padding-top:10px;
padding-bottom:10px;
direction: $direction;
font-size: 150%;
text-align: center;
color: #00008B;
}
/* Gros titres rouges */
H2 {
direction: $direction;
font-size: large;
text-align: center;
line-height:1.5em;
color: #FF0000;
}
/* titres moyens (rubriques par exemple) */
H3 {
direction: $direction;
text-align: $rightouleft;
background-image: url('../images/f1ltr.png');
background-repeat: no-repeat;
padding-left:20px;
font-size: medium;
background-position: 0%;
color: #00008B;
margin-top: 2em;
margin-left: 2em;
margin-bottom: 2em;
}
/* green big messages */
H4 {
direction: $direction;
font-size: large;
text-align: center;
line-height:1.5em;
color: #1bbd1b;
}
/* small titles */
H5 {
direction: $direction;
text-align: $rightouleft;
font-size: 95%;
color: #000000;
margin-top: 1.5em;
margin-left: 2em;
margin-bottom: 0.3em;
}
/* Cadre general */
#main {
margin: 5px;
margin-top:3px;
text-align: center;
background: #FFFFFF;
}
/* cadre dans lequel se trouve les donnees */

#contenu {
font-size: 90%;
line-height: 1.4em;
width: 860px;
border: 1px solid #00008B;
text-align: $rightouleft;
margin: auto;
padding: 0.5em;
}

/* Comportement des liens par defaut */
A {
color: #00008B;
text-decoration: none;
padding: 0;
}
/* Comportement par defaut de la balise <SMALL> */
SMALL {
font-size: x-small;
}
/* Comportement par defaut de la balise <FORM> */
FORM {
margin: 0;
padding: 0;
}
/* Comportement par defaut des listes deroulantes */
SELECT {
font-size:0.8em;
direction: $direction;
}
SELECT > OPTION {
background-color: #F8FBFF;
}
/* DIV generique permettant de remettre les position a zero (notament apres des float) */
DIV.both {
clear: both;
}
IMG.generic {
display: block;
margin-left: auto;
margin-right: auto;
}
/* DIV generique permettant de faire un centrage de contenu */
DIV.centrer {
text-align: center;
}
/* loggued info */
#loggued {
text-align:right;
margin-right: 20px;
margin-bottom: 10px;
}
/* menu haut */
#menu {
margin: 0;
padding: 0;
text-align: center;
}
#menu LI {
display: inline;
margin: 0;
padding: 0;
margin-top:8px;
float: left;
text-align: center;
voice-family: \"\\\"}\\\"\";
voice-family:inherit;
width: 108px;
}
html>body #menu LI {
width: 122px;
}
#menu LI UL { /* listes de deuxieme niveau */
padding: 0;
position: absolute;
background: #ffffff;
border: 1px solid #00008B;
left: -999em; /* on met left plutot que display pour cacher les menus parce que display: none n'est pas lu par les lecteurs d'ecran */
}
#menu LI UL LI { /* sous-listes */
float: none;
width: auto;
}
#menu LI UL LI A { /* sous-listes */
border-width: 0;
border-top: 1px solid #ffffff;
border-bottom: 1px solid #ffffff;
font-variant: normal;
font-weight: normal;
text-align: left;
}
#menu LI UL LI A:hover { /* sous-listes */
border-top: 1px solid #00008B;
border-bottom: 1px solid #00008B;
}
#menu LI:hover UL { /* listes imbriquees sous les items de listes survoles */
left: auto;
}
#menu LI.sfhover UL { /* listes imbriquees sous les items de listes survoles */
left: auto;
margin-left: -54px;
}
#menu A {
display: block;
padding: 0.2em;
color: #00008B;
border: 1px solid #00008B;
font-size: 92%;
font-variant: 10pt-caps;
font-variant: small-caps;
font-weight: bolder;
text-decoration: none;
}
#menu A:hover {
background-color: #f0f7ff;
}
/* Menu PDF */
#menuPDF {
margin: 0;
padding: 0;
text-align: center;
}
#menuPDF LI {
display: inline;
margin: 0;
padding: 0;
margin-top:3px;
float: $leftouright;
text-align: center;
voice-family: \"\\\"}\\\"\";
voice-family:inherit;
width: 50px;
}
html>body #menuPDF LI {
width: 50px;
}
#menuPDF LI UL { /* listes de deuxieme niveau */
padding: 0;
position: absolute;
background: #ffffff;
border: 1px solid #00008B;
left: -999em; /* on met left plutot que display pour cacher les menus parce que display: none n'est pas lu par les lecteurs d'ecran */
}
#menuPDF LI UL LI { /* sous-listes */
float: none;
width: auto;
}
#menuPDF LI UL LI A { /* sous-listes */
border-width: 0;
border-top: 1px solid #ffffff;
border-bottom: 1px solid #ffffff;
font-variant: normal;
font-weight: normal;
text-align: left;
}
#menuPDF LI UL LI A:hover { /* sous-listes */
border-top: 1px solid #00008B;
border-bottom: 1px solid #00008B;
}
#menuPDF LI:hover UL { /* listes imbriquees sous les items de listes survoles */
left: auto;
}
#menuPDF LI.sfhover UL { /* listes imbriquees sous les items de listes survoles */
left: auto;
margin-left: -54px;
}
#menuPDF A {
display: block;
padding: 0.2em;
color: #00008B;
border: 0px solid #00008B;
font-size: 92%;
font-variant: 10pt-caps;
font-variant: small-caps;
font-weight: bolder;
text-decoration: none;
}
#menuPDF A:hover {
 background-color: #f0f7ff; 
}
#menuPDF LI UL LI A.pdfAdmin {
font-weight: bold;
}
#menuPDF LI UL LI A.pdfUser {

}
.pdfTrSelected {
	background-color: #fbc074;
}
TABLE.pdfTableLine TD {
	border: 0px;
}
.pdfPlusMoins {
	width: 20px;
}
.pdfBtAddRemove {
	padding: 0px;
	padding-top:0px;
	padding-bottom:0px;
}
.pdfAction:hover {
	text-decoration: underline ;
}
/* Fin des menu pour les PDF */
/* pour install & contacts */
P.texte {
direction: $direction;
text-align: justify;
margin-left: 100px;
margin-right: 100px;
}
P.texte:first-letter {
margin-left: 3em;
}
/* Paragraphe generique avec texte centre */
P.centrer {
text-align: center;
}
/* Affichage de code (javascript par ex) */
CODE {
direction: $direction;
text-align: left;
display: block;
font-size: 90%;
border-style: dashed dashed dashed solid;
border-color: rgb(0, 0, 139);
border-width: 1px 1px 1px 5px;
margin: 2px;
margin-bottom: 20px;
padding: 4px;
background-color: rgb(240, 247, 255);
}
CODE STRONG {
font-size: 100%;
font-weight: bold;
}
/* style par defaut de toutes les images */
IMG {
border: 0;
}
/* champs de formulaire */
input, textarea {
background: #FBFBFF;
border: #b3b3b3 1px solid;
color: #0c183a;
}
/* boutons radio dans config */
DIV.boutonsAction {
text-align: center;
}
DIV.boutonsAction INPUT {
margin: 2em;
}
/* boutons radio dans config */
input.bouton {
background: #FFFFFF;
border: #FFFFFF 1px solid;
}

LI.futureStep {
color: #d3d3d3;
}
LI.actualStep {
font-weight: bold;
}
LI.pastStep {
color: #008000;
}

/* liste des liens vers les contacts, site et admin */
#adminLangSite {
float: right;
width: 170px;
text-align: center;
margin: 0;
}
#adminLangSite p {
margin: 0;
padding: 3px;
font-size: 90%;
}
#admin {
width: 100%;
padding: 0;
padding-top: 50px;
margin: 0;
text-align: center;
}
#admin LI {
display: inline;
margin: 0;
padding: 0;
float: left;
text-align: center;
}
#admin LI.site {
width: 25%;
}
#admin LI.install {
width: 49%;
}
#admin LI.contacts {
width: 25%;
}
#admin LI A {
padding-top: 0.5em;
font-size: 100%;
}
#admin LI.site  A {
border-top: 1px dashed #00008B;
}
#admin LI.install A {
border-top: 1px dashed #00008B;
border-right: 1px dashed #00008B;
border-left: 1px dashed #00008B;
}
#admin LI.contacts A {
border-top: 1px dashed #00008B;
}
#admin A {
display: block;
padding: 0.2em;
color: #00008B;
text-decoration: none;
}
/* div containing the site selected for administration*/
#siteSelected {
font-size:110%;
margin-left:20px;
font-style: italic;
}
/* DIV contenant le logo + le choix des sites + le calendrier */
#logo {
width: 100%;
}
/* Choix des sites */
#sites {
". ($adminStyle ? "" : "bottom: 0;")  ."
". ($adminStyle ? "" : "float: right;")  ."
". ($adminStyle ? "" : "padding-right: 15px;")  ."
". ($adminStyle ? "" : "height: 130px;")  ."
}
#sites SELECT {
border: #000000 1px solid;
". ($adminStyle ? "" : "margin: auto;")  ."
". ($adminStyle ? "" : "margin-top: 110px;")  ."
}
#sites FIELDSET {
width: 155px;
padding: 5px;
}
#sites LEGEND {
". ($adminStyle ? "text-align: center;" : "")  ."
color: rgb(0, 0, 139);
font-weight: bold;
font-size:90%;
}
#sites P {
margin: 0;
}
#sites OPTGROUP {
padding-left: 3px;
}
/* Calendrier */
#calendrier {
float: right;
text-align: $rightouleft;
}
#calendrier P {
margin: 0;
}
#calendrier TABLE {
direction: $direction;
border: 1px solid rgb(80, 100, 133);
border-bottom: 1px solid #506485;
border-left: 1px solid #506485;
border-collapse: collapse;
line-height: 100%;
}
#calendrier A.selection {
color: red;
}
#calendrier TH {
border-top: 1px solid rgb(80, 100, 133);
border-right: 1px solid rgb(80, 100, 133);
font-weight: bold;
text-align: center;
background-color: #f0f7ff;
width: 16px;
padding: 0.1em;
margin: 0;
font-size: x-small;
}
#calendrier TD {
border-top: 1px solid rgb(80, 100, 133);
border-right: 1px solid rgb(80, 100, 133);
text-align: center;
color: #c0c0c0;
padding: 0.2em;
margin: 0;
font-size: x-small;
}
#calendrier A.selection {
color: red;
}
#calendrier SELECT {
border: #000000 1px solid;
}
/* Choix de la langue */
#choixlangue {
". ($adminStyle ? "" : "float: $leftouright;")  ."
". ($adminStyle ? "" : "margin: auto;")  ."
". ($adminStyle ? "width: 160px;" : "")  ."
text-align: center;
}
#choixlangue FIELDSET {
width: 155px;
padding: 5px;
}
#choixlangue LEGEND {
". ($adminStyle ? "text-align: center;" : "")  ."
color: rgb(0, 0, 139);
font-weight: bold;
font-size:90%;
}
#choixlangue P {
margin: 0;
}
/* styles pour les infos techniques */
P.gristrans {
color: #cdcaca;
}
P.archivefait {
font-size: 10pt;
color: #ffffff;
}
P.gristrans A {
color: #cdcaca;
}
P.gristrans EM A{
font-style: italic;
}
P.archive {
font-size: 70%;
color: #bcbcbc;
margin: 0;
text-align: center;
}
P.archive EM {
font-size: 100%;
font-style: italic;
}
P.gristrans STRONG {
font-weight: bold;
}
P.archive STRONG {
font-weight: bold;
}
SPAN.oktrans {
color: #9ec2a7;
}
SPAN.errortrans {
color: red;
}
/* Information de la periode visualisee */
P.periodevisu {
margin: 0;
font-size:90%;
}
P.choixperiode {
margin: 0;
margin-right: 2em;
color: #818181;
}
P.choixperiode A {
font-style: italic;
color: #818181;
font-size:90%;
}
/* Tableau de saisie de donnee dans l'admin */
TABLE.centrer {
margin: auto;
text-align: $rightouleft;
}
SPAN.error{
color:red;
font-size:100%;
font-weight:bold;
}
/* Tableau d'infos dans l'admin */
TABLE.infos {
font-size:90%;
direction: $direction;
margin: auto;
empty-cells: hide;
font-size: 90%;
cellspacing:0;
border:0;
width:75%;
empty-cells: hide;
}
TABLE.infos TD {
font-size:90%;
border: 1px solid rgb(226, 227, 228);
color: #00008B;
padding-top:3px;
padding-bottom:3px;
}
TABLE.infos TD.libelle {
width: 150px;
white-space: nowrap;
}
TABLE.infos UL {
direction: $direction;
text-align: $rightouleft;
list-style-type: none;
margin: 0;
padding: 0;
}
/* Liste de choix du logo */
UL.listLogos {
list-style-type: none;
padding: 0;
margin: 0;
}
UL.listLogos LI {
display: inline;
}
.helpAdmintext {
font-size:75%;
}
#generalAdmin {
width: 50%;
float: left;
}
#detailAdmin {
width: 50%;
float: right;
}
#adminErrors {
color:red;
font-size:120%;
}
#generalInstall {
width: 40%;
float: left;
}
#detailInstall {
width: 60%;
float: right;
}
#detailAdmin UL {
list-style-type: decimal;
list-style-position: inside;
padding: 0;
}
#generalAdmin UL {
list-style-type: decimal;
list-style-position: inside;
padding: 0;
}
P.next_step {
font-weight: bold;
background-color: #eee;
border: 1px solid #ddd;
padding: 0.5em;
}
P.next_step A {
color: #ae0000;
text-decoration: underline;
}
#instalpercent {
width: 100%;
height: 1.5em;
margin: 0;
padding: 0;
background-color: #eee;
border: 1px solid #ddd;
}
#instalpercent P {
height: 1.5em;
background-color: #8aaecc;
margin: 0;
padding: 0;
}
/* Tous les tableaux de resultats */
TABLE.resultats  {
font-size:90%;
direction: $direction;
margin: auto;
empty-cells: hide;
font-size: 90%;
cellspacing:0;
border:0
}
TABLE.full {
width: 100%;
}
TABLE.expansive TD {
padding: 1em;
}
TABLE.resultats TH {
font-size:90%;
border-top: 1px solid rgb(80, 100, 133);
border-right: 1px solid rgb(80, 100, 133);
font-weight: bold;
text-align: center;
background-color: rgb(96, 115, 165);
color: #ffffff;
padding:7px;
padding-right:4px;
padding-left:4px;
empty-cells: hide;
}
TABLE.resultats TD {
font-size:90%;
border: 1px solid rgb(226, 227, 228);
text-align: center;
color: #00008B;
padding-top:3px;
padding-bottom:3px;
}
TABLE.resultats TD.damier{
background-color: rgb(241, 242, 243);
}
TABLE.resultats TD.damierlight {
background-color: #f6f6f6;
}
TABLE.resultats TD.damieralign {
background-color: rgb(241, 242, 243);
text-align: $rightouleft;
padding:6;
}
TABLE.resultats TD.align {
text-align: $rightouleft;
padding:6;
}
TABLE.resultats TD.vide, TABLE.resultats TH.vide {
border-width: 0;
background-color: #ffffff;
}
TABLE.resultats TD.sansbordure {
border-width: 0;
text-align: $rightouleft;
}
TABLE.resultats TH EM {
display: block;
}
TABLE.resultats TD STRONG {
font-weight: bold;
}
TABLE.resultats .columndetail {
width: 15%;
}
TABLE.resultats TR.details {
padding:0;
margin:0;
}
TABLE TD.libelle {
text-align: left;
padding-left: 15px;
}
TABLE.resultats TR.expandcollapse {
cursor: pointer;
}
TABLE.resultats TR.expandcollapse TD {
font-weight: bold;
}
TABLE.resultats TR.selectedRow {
background-color: rgb(234, 245, 255) !important;
}
TABLE.resultats TR.expandcollapse:hover {
background-color: #f0f7ff !important;
}
TABLE.resultats IMG.expandcollapse:hover {
background-color: #f0f7ff;
margin-left: -15px;
}
TABLE.resultats TH.subLevel {
background-color: #fbc074 !important;
padding-left: 20px !important;
text-align: left !important;
color: #6f522d !important;
border-color: #fbc074 !important;
}
TABLE.resultats TR.details TD.subLevel, TABLE.resultats TR.details TD.subLevel1, TABLE.resultats TR.details TD.subLevel2, TABLE.resultats TR.details TD.subLevel3, TABLE.resultats TR.details TD.subLevel4, TABLE.resultats TR.details TD.subLevel5, TABLE.resultats TR.details TD.subLevel6, TABLE.resultats TR.details TD.subLevel7, TABLE.resultats TR.details TD.subLevel8, TABLE.resultats TR.details TD.subLevel9, TABLE.resultats TR.details TD.subLevel10 {
border-color: #fbc074 !important;
color: #6073a5 !important;
}
TABLE.resultats TR.details A {
color: #6073a5 !important;
}
TABLE.resultats TD.subLevel1, TABLE.resultats TD.subLevel2, TABLE.resultats TD.subLevel3, TABLE.resultats TD.subLevel4, TABLE.resultats TD.subLevel5, TABLE.resultats TD.subLevel6, TABLE.resultats TD.subLevel7, TABLE.resultats TD.subLevel8, TABLE.resultats TD.subLevel9, TABLE.resultats TD.subLevel10 {
text-align: left !important;
}
/* CMI : Ajax correction : padding-left: 2em !important; */
TABLE.resultats TD.subLevel1 {
width:80%;
}
TABLE.resultats TD.subLevel2 {
padding-left: 4em !important;
}
TABLE.resultats TD.subLevel3 {
padding-left: 6em !important;
}
TABLE.resultats TD.subLevel4 {
padding-left: 8em !important;
}
TABLE.resultats TD.subLevel5 {
padding-left: 10em !important;
}
TABLE.resultats TD.subLevel6 {
padding-left: 12em !important;
}
TABLE.resultats TD.subLevel7 {
padding-left: 14em !important;
}
TABLE.resultats TD.subLevel8 {
padding-left: 16em !important;
}
TABLE.resultats TD.subLevel9 {
padding-left: 18em !important;
}
TABLE.resultats TD.subLevel10 {
padding-left: 20em !important;
}
IMG.detail {
margin-top: 1em;
margin-bottom: 1em;
}
TABLE.resultats TD.nextpreview {
text-align: center !important;
}
/* Affichage des resultats positifs (vert en general) */
SPAN.positif {
direction: $direction;
color: #008000;
font-weight: bold;
}
/* Affichage des resultats negatifs (rouge en general) */
SPAN.negatif {
direction: $direction;
color: red;
font-weight: bold;
}
/* Menu d'administration */
#menuadmin {
width: 400px;
margin: auto;
text-align: center;
}
#menuadmin UL {
direction: $direction;
text-align: $rightouleft;
list-style-image: url('$theme_site/images/f3$direction.png');
}
#menuadmin LI {
padding: 0.5em;
}
/* Informations lors de modification dans la partie admin */
P.admininfos {
color: #000000;
font-weight: bold;
text-align: center;
}
P.admininfos positif {
color: #00FF00;
}
P.admininfos negatif {
color: #FF0000;
}
P.explenation {
color: red;
}
/* link Include / Exclude all population */
P.includexecludeall {
margin-left:470px;
margin-top:30px;
}
P.includexecludeall A {
color:#696a6c;
border-bottom: 2px dotted #F0F0F0;
}
A.moreinterrest {
display: block;
margin-left: 5em;
margin-top: 1em;
margin-bottom: 1em;
color:#696a6c;
}
A.help_pagename {
margin-left:70px;
font-size:80%;
color:#B9BBBE;
font-decoration:italic;
border-bottom: 1px dotted #E3E3E3;
}
/* details des Referers */
DIV.hiddendetails {
display: none;
}
A.movetop {
display: block;
margin-top: 2em;
}
/* Page de login */
#login {
background: #ffffff;
border: 1px solid #a2a2a2;
margin: 3em auto;
padding: 1.5em;
width: 23em;
}
#login input {
padding: 4px;
}
#login #log, #pwd {
font-size: 1.3em;
width: 60%;
}
#login #submit {
font-size: 1.4em;
}
#login .submit input, #login .submit input:focus {
background: url( $theme_site/images/background-submit.png );
border: 3px double #999;
border-left-color: #ccc;
border-top-color: #ccc;
color: #333;
padding: 0.25em;
}
#login .submit input:active {
background: #f4f4f4;
border: 3px double #ccc;
border-left-color: #999;
border-top-color: #999;
}
#login .submit {
margin-top: 2em;
text-align: right;
}
#login P {
color:#4472A5;
}
";
?>
