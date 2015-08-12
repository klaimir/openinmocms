<form action="#" method="get" id="form_injector">
<script type="text/javascript">
var CST_NID = "{$PARAM_URL_NEWSLETTER}";
var CST_PID = "{$PARAM_URL_PARTNER}";
var CST_COOKIE = "{$COOKIE_PMVLOG_NAME}";
var CST_URL = '{$PHPMV_URL}/phpmyvisites.php';

var tabNID = new Array();
var tabPID = new Array();

{foreach from=$newsletters_available key=id item=info}
tabNID[{$id}]= new Array();
{foreach from=$info key=idInfo item=val}
tabNID[{$id}][{$idInfo}]= "{$val}";
{/foreach}
{/foreach}

{foreach from=$partners_available key=id item=info}
tabPID[{$id}]= new Array();
{foreach from=$info key=idInfo item=val}
tabPID[{$id}][{$idInfo}]= "{$val}";
{/foreach}
{/foreach}

{literal}
function injChangeSite(p_idSite) {
	var v_tmpNID = tabNID[p_idSite];
	var v_tmpPID = tabPID[p_idSite];
	var v_form = getForm ();
	var i;
	var a;
	var v_lst;
	v_lst = v_form.inj_nid.options;
	//empty list
	v_lst.length = 0;
	// Populate list
	for (i in v_tmpNID){
		a = new Option (v_tmpNID[i], i);
		v_lst[v_lst.length] = a;
	}
	v_form.inj_gen_nid.value = '';
	v_lst = v_form.inj_pid.options;
	//empty list
	v_lst.length = 0;
	// Populate list
	for (i in v_tmpPID){
		a = new Option (v_tmpPID[i], i);
		v_lst[v_lst.length] = a;
	}
	v_form.inj_gen_pid.value = '';
	
	v_form.inj_gen_simple.value = '';
	v_form.inj_gen_search.value = '';
}

function delSiteCookie(p_idSite) {
	document.cookie = CST_COOKIE + p_idSite + "=;expires=-1";
}


function getBooleanValue(p_fld) {
	var i;
	var v_res = "";
	for (i=0; i < p_fld.length; i++) {
		if (p_fld[i].checked == true) {
			v_res = p_fld[i].value;
		}
	}
	if (v_res == "") {
		v_res = "0";
	}
	else if (v_res == "2") {
		v_res = Math.round(Math.random()) % 2;
	}
	return v_res;
} 

function getForm() {
	return document.getElementById("form_injector");
}

function init() {
	var v_form = getForm();
	var v_da = new Date();
	v_form.inj_res.value = screen.width+'x'+screen.height;
	v_form.inj_col.value = screen.colorDepth;
	v_form.inj_h.value = v_da.getHours();
	v_form.inj_m.value = v_da.getMinutes();
	v_form.inj_s.value = v_da.getSeconds();
	
	v_form.inj_ref.value = location.href;
	injChangeSite(v_form.inj_id.value);
}

function getResValue() {
	var v_form = getForm ();
	//	1024x768
	return v_form.inj_res.value;
}

function getInjectorUrlString(p_pageName, p_urlRef, p_paramURL) {
	var v_form = getForm();
	if (v_form.genrateAutoHour.checked) {
		var v_da = new Date();
		v_form.inj_h.value = v_da.getHours();
		v_form.inj_m.value = v_da.getMinutes();
		v_form.inj_s.value = v_da.getSeconds();
	}
	var v_ret = "";
	var v_url = 'http://injector.phpmv.com/url_injector';
	if (typeof(p_paramURL) != "undefined") {
		v_url += p_paramURL;
	}
	v_ret += '?url='+escape(v_url);
	
	v_ret +='&pagename='+escape(p_pageName);
	
	// Variable 
	v_ret +='&id='+v_form.inj_id.value;
	v_ret +='&res='+getResValue ();
	v_ret +='&col='+v_form.inj_col.value;
	v_ret +='&h='+v_form.inj_h.value;
	v_ret +='&m='+v_form.inj_m.value;
	v_ret +='&s='+v_form.inj_s.value;
	v_ret +='&flash='+getBooleanValue(v_form.inj_flash);
	v_ret +='&director='+getBooleanValue(v_form.inj_director);
	v_ret +='&quicktime='+getBooleanValue(v_form.inj_quicktime);
	v_ret +='&realplayer='+getBooleanValue(v_form.inj_realplayer);
	v_ret +='&pdf='+getBooleanValue(v_form.inj_pdf);
	v_ret +='&windowsmedia='+getBooleanValue(v_form.inj_windowsmedia);
	v_ret +='&java='+getBooleanValue(v_form.inj_java);
	v_ret +='&cookie='+getBooleanValue(v_form.inj_cookie);
	if (p_urlRef != "") {
		v_ret += '&ref='+escape(p_urlRef);
	}
	
	return v_ret;
}

function generateSimple() {
	var v_form = getForm ();
	var v_ret = "";

	//if ((pmv_typeClick) && (pmv_typeClick != "")) pmv_src += '&type='+escape(pmv_typeClick);
	v_ret += getInjectorUrlString (v_form.inj_pagename.value, v_form.inj_ref.value);
	
	v_form.inj_gen_simple.value = CST_URL + v_ret;
	
}
function generateNid() {
	var v_form = getForm ();
	if (v_form.inj_nid.value != '') {
		var v_ret = getInjectorUrlString (
				'Injector/Newsletter/'+CST_NID+' : '+v_form.inj_nid.value,
				'http://injector.phpmv.com/refererNid.html',
				'?'+CST_NID+'='+v_form.inj_nid.value);
		
		v_form.inj_gen_nid.value = CST_URL + v_ret;
	}
	else {
		v_form.inj_gen_nid.value = '';
	}
}
function generatePid() {
	var v_form = getForm ();
	if (v_form.inj_pid.value != '') {
		var v_ret = getInjectorUrlString (
				'Injector/Partner/'+CST_PID+' : '+v_form.inj_pid.value,
				'http://injector.phpmv.com/refererPid.html',
				'?'+CST_PID+'='+v_form.inj_pid.value);
		
		v_form.inj_gen_pid.value = CST_URL + v_ret;
	}
	else {
		v_form.inj_gen_pid.value = '';
	}
}

function generateSearch() {
	var v_form = getForm ();
	var v_url = v_form.inj_engine.value+v_form.inj_query.value;
	var v_tabName = v_url.split("?");
	var v_ret = getInjectorUrlString (
			'Injector/SearchEngine/'+v_tabName[0]+'/'+v_tabName[1],
			'http://'+v_url);
	
	v_form.inj_gen_search.value = CST_URL + v_ret;
}

function goSimple() {
	var v_form = getForm ();
//	var v_img = new Image();
	if (v_form.genrateAutoSimple.checked) {
		generateSimple();
	}

	if (v_form.inj_gen_simple.value == '') {
		alert('url vide');
	}
	else {
		delSiteCookie(v_form.inj_id.value);
		var v_img = v_form.imgSimple;
		v_img.src = v_form.inj_gen_simple.value;
	}
}
function goNid() {
	var v_form = getForm ();
//	var v_img = new Image();
	if (v_form.genrateAutoNid.checked) {
		generateNid();
	}

	if (v_form.inj_gen_nid.value == '') {
		alert('url vide');
	}
	else {
		delSiteCookie(v_form.inj_id.value);
		var v_img = v_form.imgNid;
		v_img.src = v_form.inj_gen_nid.value;
	}
}
function goPid() {
	var v_form = getForm ();
//	var v_img = new Image();
	if (v_form.genrateAutoPid.checked) {
		generatePid();
	}

	if (v_form.inj_gen_pid.value == '') {
		alert('url vide');
	}
	else {
		delSiteCookie(v_form.inj_gen_pid.value);
		var v_img = v_form.imgPid;
		v_img.src = v_form.inj_gen_pid.value;
	}
}
function goSearch() {
	var v_form = getForm ();
//	var v_img = new Image();
	if (v_form.genrateAutoSearch.checked) {
		generateSearch();
	}

	if (v_form.inj_gen_search.value == '') {
		alert('url vide');
	}
	else {
		delSiteCookie(v_form.inj_id.value);
		var v_img = v_form.imgSearch;
		v_img.src = v_form.inj_gen_search.value;
	}
}
{/literal}
// -->
</script>

<h1>phpMyVisites Injector</h1>
<p class="texte">Select the options and the website on which you want to generate fake statistics, 
click on "Generate" to get the counter url and then click on "Go" to call the counter
("Generate auto" will always call "generate" before call the counter)."</p>

<table border="1" cellpadding="3" cellspacing="0">
<tr>
<td>Page name ({$CATEGORY_DELIMITER} is categories' delimiter) : </td>
<td><input type="text" id="inj_pagename" value="Cat1/Cat1.1/Page 1" size="50" /></td>
</tr>
<tr>
<td>Id site : </td><td>
<select name="inj_id" onchange="injChangeSite(this.value)">
	   {foreach from=$sites_view_available key=id item=info}
	   		<option label="{$info}" value="{$id}" {if $site_selected==$id} selected="selected"{/if}>{$info}</option>
	   {/foreach}
</select>
</td>
</tr>
<tr>
<td>Resolution (width + "x" + height) : </td><td><input type="text" id="inj_res" /></td>
</tr>
<tr>
<td>colorDepth : </td><td><input type="text" id="inj_col" /></td>
</tr>
<tr>
<td>Hour : </td><td><input type="text" id="inj_h" size="2" />
<input type="checkbox" value="C" id="genrateAutoHour" checked="true" /> Compute time auto
</td>
</tr>
<tr>
<td>Minute : </td><td><input type="text" id="inj_m" size="2" /></td>
</tr>
<tr>
<td>Second : </td><td><input type="text" id="inj_s" size="2" /></td>
</tr>
<tr>
<td>Flash : </td><td>
<input type="radio" name="inj_flash" id="inj_flash" value="0" /> No
<input type="radio" name="inj_flash" id="inj_flash" value="1" /> Yes
<input type="radio" name="inj_flash" id="inj_flash" value="2" checked="true" /> Random
</td>
</tr>
<tr>
<td>director : </td><td>
<input type="radio" name="inj_director" id="inj_director" value="0" /> No
<input type="radio" name="inj_director" id="inj_director" value="1" /> Yes
<input type="radio" name="inj_director" id="inj_director" value="2" checked="true" /> Random
</td>
</tr>
<tr>
<td>quicktime : </td><td>
<input type="radio" name="inj_quicktime" id="inj_quicktime" value="0" /> No
<input type="radio" name="inj_quicktime" id="inj_quicktime" value="1" /> Yes
<input type="radio" name="inj_quicktime" id="inj_quicktime" value="2" checked="true" /> Random
</td>
</tr>
<tr>
<td>realplayer : </td><td>
<input type="radio" name="inj_realplayer" id="inj_realplayer" value="0" /> No
<input type="radio" name="inj_realplayer" id="inj_realplayer" value="1" /> Yes
<input type="radio" name="inj_realplayer" id="inj_realplayer" value="2" checked="true" /> Random
</td>
</tr>
<tr>
<td>pdf : </td><td>
<input type="radio" name="inj_pdf" id="inj_pdf" value="0" /> No
<input type="radio" name="inj_pdf" id="inj_pdf" value="1" /> Yes
<input type="radio" name="inj_pdf" id="inj_pdf" value="2" checked="true" /> Random
</td>
</tr>
<tr>
<td>windowsmedia : </td><td>
<input type="radio" name="inj_windowsmedia" id="inj_windowsmedia" value="0" /> No
<input type="radio" name="inj_windowsmedia" id="inj_windowsmedia" value="1" /> Yes
<input type="radio" name="inj_windowsmedia" id="inj_windowsmedia" value="2" checked="true" /> Random
</td>
</tr>
<tr>
<td>java : </td><td>
<input type="radio" name="inj_java" id="inj_java" value="0" /> No
<input type="radio" name="inj_java" id="inj_java" value="1" /> Yes
<input type="radio" name="inj_java" id="inj_java" value="2" checked="true" /> Random
</td>
</tr>
<tr>
<td>cookie : </td><td>
<input type="radio" name="inj_cookie" id="inj_cookie" value="0" /> No
<input type="radio" name="inj_cookie" id="inj_cookie" value="1" /> Yes
<input type="radio" name="inj_cookie" id="inj_cookie" value="2" checked="true" /> Random
</td>
</tr>
<!-- tr>
<td>type : </td><td>
<input type="radio" name="inj_type" id="inj_type" value="" /> Page
<input type="radio" name="inj_type" id="inj_type" value="FILE" /> File
<input type="radio" name="inj_type" id="inj_type" value="RSS" /> Rss
</td>
</tr -->
<tr>
<td>ref : </td><td><input type="text" id="inj_ref" size="50" /></td>
</tr>
<tr>
<td><input type="button" onclick="generateSimple()" value="Generate" />
<img src="./plugins/injector/images/pixel.gif" id="imgSimple" /> : </td><td><input type="text" id="inj_gen_simple" size="50" />
<input type="button" onclick="goSimple()" value="Go" />
<input type="checkbox" value="C" id="genrateAutoSimple" checked="true" /> Generate auto
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>Newsletter : </td><td>
<select name="inj_nid">
</select>
</td>
</tr>
<tr>
<td><input type="button" onclick="generateNid()" value="Generate" />
<img src="./plugins/injector/images/pixel.gif" id="imgNid" /> : </td><td><input type="text" id="inj_gen_nid" size="50" />
<input type="button" onclick="goNid()" value="Go" />
<input type="checkbox" value="C" id="genrateAutoNid" checked="true" /> Generate auto
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>Partner : </td><td>
<select name="inj_pid">
</select>
</td>
</tr>
<tr>
<td><input type="button" onclick="generatePid()" value="Generate" />
<img src="./plugins/injector/images/pixel.gif" id="imgPid" /> : </td><td><input type="text" id="inj_gen_pid" size="50" />
<input type="button" onclick="goPid()" value="Go" />
<input type="checkbox" value="C" id="genrateAutoPid" checked="true" /> Generate auto
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>Search Engine : </td><td>
<select name="inj_engine">
	{foreach from=$searchEngines_available key=id item=info}
   		<option label="{$info[0]}" value="{$id}?{$info[1]}=">{$info[0]} ({$id}?{$info[1]}=)</option>
	{/foreach}
</select>
</td>
</tr>
<tr>
<td>Search word : </td><td><input type="text" id="inj_query" value="test"/></td>
</tr>
<tr>
<tr>
<td><input type="button" onclick="generateSearch()" value="Generate" />
<img src="./plugins/injector/images/pixel.gif" id="imgSearch" /> : </td><td><input type="text" id="inj_gen_search" size="50" />
<input type="button" onclick="javascript:goSearch()" value="Go" />
<input type="checkbox" value="C" id="genrateAutoSearch" checked="true" /> Generate auto
</td>
</tr>
</table>
</form>

<script type="text/javascript">
init();
</script>