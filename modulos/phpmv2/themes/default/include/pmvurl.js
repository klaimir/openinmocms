var pmvUrl_Parameters = new Array;
var pmvUrl_anchor = "";

function pmvUrlGetUrlParameters () {
	var ch = "";
	for (var i in pmvUrl_Parameters){
		if (ch != "") {
			ch += "&";
		}
		ch += i + "=" + pmvUrl_Parameters[i];
	}
	if (pmvUrl_anchor != "") {
		ch += "#"+pmvUrl_anchor;
	}
	return ch;
}
function pmvUrlOnChangeLang (p_obj) {
	idTmp=p_obj.options[p_obj.options.selectedIndex].value;
	pmvUrl_Parameters["lang"] = idTmp;
	pmvUrlLoadUrl ();
}
//	<select name="site" onchange="idTmp=this.options[this.options.selectedIndex].value;location.href='{$url_site}&amp;site='+idTmp+'&amp;adminsite='+idTmp" dir="{$dir}">

function pmvUrlOnChangeSite (p_obj) {
	idTmp=p_obj.options[p_obj.options.selectedIndex].value;
	pmvUrl_Parameters["site"] = idTmp;
	pmvUrl_Parameters["adminsite"] = idTmp;
	pmvUrlLoadUrl ();
}
function pmvUrlOpenModule (p_module) {
	pmvUrl_Parameters["mod"] = p_module;
	pmvUrlLoadUrl ();
}
function pmvUrlOnChangeMonth (p_obj) {
	idTmp=p_obj.options[p_obj.options.selectedIndex].value;
	pmvUrl_Parameters["date"] = idTmp;
	pmvUrlLoadUrl ();
}
function pmvUrlOnChangeDay (p_date) {
	pmvUrl_Parameters["date"] = p_date;
	pmvUrlLoadUrl ();
}
function pmvUrlOnChangePeriod (p_period) {
	pmvUrl_Parameters["period"] = p_period;
	pmvUrlLoadUrl ();
}
function pmvUrlLoadUrl () {
	location.href="./index.php?"+pmvUrlGetUrlParameters ();
}
function pmvUrlAddParameter (p_nom, p_value) {
	pmvUrl_Parameters[p_nom] = p_value;
}

