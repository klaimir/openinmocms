var cleFldSrc = "src";
var cleFldDst = "dst";
var classSelected = "pdfTrSelected";
var classNotSelected = "";

var selSrcPos = -1; // Selected line in src tab
var selDstPos = -1; // Selected line in dst tab
var tabOpenPage = new Array();
tabOpenPage[cleFldSrc] = new Array();
tabOpenPage[cleFldDst] = new Array();

function toStringChapter() {
  return this.keyParent + "#" + this.key + "#" + this.all + "#" + this.interest;
}

function ChoixChapter(keyParent, key, lib, all, interest, isPage, param) {
	this.key = key;
	this.lib = lib;
	this.all = all;
	this.interest = interest;
    this.keyParent = keyParent;
	this.isPage = isPage;
	if (param) {
		this.param = param;
	}
	else {
		this.param = "";
	}
	
	this.toString = toStringChapter;
}

function openClosePage(p_obj, p_cleFld) {
	if (p_cleFld == cleFldSrc) {
		p_tab = tabSrc;
		p_selPos = selSrcPos; //p_obj.parentNode.parentNode.parentNode.parentNode.id.substr(p_cleFld.length);
	}
	else {
		p_tab = tabDst;
		p_selPos = selDstPos; //p_obj.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id.substr(p_cleFld.length);
	}
	if (p_selPos >= 0) {
		if (p_tab[p_selPos].isPage) {
			if (tabOpenPage[p_cleFld][p_tab[p_selPos].keyParent]) {
				txt = "none";
				//p_obj.value = "+";
			}
			else {
				txt = "";
				//p_obj.value = "-";
			}
			tabOpenPage[p_cleFld][p_tab[p_selPos].keyParent] = (! tabOpenPage[p_cleFld][p_tab[p_selPos].keyParent]);
			showHidePageElem (p_tab, p_cleFld, p_tab[p_selPos].keyParent, txt);
			// Recuperation de la balise TD
			rewriteTD (p_obj, p_cleFld, p_selPos);
		}
	}
}

function srcSelect(p_obj) {
	var p_num = -1;
	/*
	if (p_obj) {
		p_num = p_obj.id.substr(cleFldSrc.length);
	}
	else {
	*/
		p_num = this.id.substr(cleFldSrc.length);
	//}

	if (selSrcPos >= 0) {
		elem = document.getElementById(cleFldSrc+selSrcPos);
		elem.className = classNotSelected;
	}
  
	selSrcPos = p_num;
	elem = document.getElementById(cleFldSrc+selSrcPos);
	elem.className = classSelected;
	
	if (p_obj) { // For FF
		if (typeof(p_obj.target.type) != "string") {
			openClosePage(elem, cleFldSrc)
		}
	}
	else if (event) { // For IE
		if (typeof(event.srcElement.type) != "string") {
			openClosePage(elem, cleFldSrc)
		}
	}
	else {
		openClosePage(elem, cleFldSrc)
	}
	
}

function showHidePageElem (p_tab, p_cleFld, p_keyPage, p_val) {
	for (i=0; i < p_tab.length; i ++) {
		elem = document.getElementById(p_cleFld+i);
		if ((! p_tab[i].isPage) && (p_tab[i].keyParent == p_keyPage)) {
			elem.style.display = p_val;
		}
	}
}

function dstSelect(p_obj) {
	var p_num = -1;
	/*
	if (p_obj) {
		p_num = p_obj.id.substr(cleFldDst.length);
	}
	else {
	*/
		p_num = this.id.substr(cleFldDst.length);
	//}
	if (selDstPos >= 0) {
		elem = document.getElementById(cleFldDst+selDstPos);
		elem.className = classNotSelected;
	}
  
	selDstPos = p_num;
	elem = document.getElementById(cleFldDst+selDstPos);
	elem.className = classSelected;

	if (p_obj) { // For FF
		if (typeof(p_obj.target.type) != "string") {
			openClosePage(elem, cleFldDst)
		}
	}
	else if (event) { // For IE
		if (typeof(event.srcElement.type) != "string") {
			openClosePage(elem, cleFldDst)
		}
	}
	else {
		openClosePage(elem, cleFldDst)
	}
	
}

function writeTab (p_tabBody, p_tab, p_cleFld) {
	var ch = "";
	// tbody
	var tb =  document.getElementById(p_tabBody);
	
	for (i=0; i < p_tab.length; i ++) {
	
		myTR = document.createElement("TR");
		myTR.id = p_cleFld + i;
		//setDisplay(myTR, 'none');
		myTD = document.createElement("TD");
		myTD.className = "align";
		//myTD.colSpan = 4;
		//myTD.className = 'tc';
		
		if (p_tab[i].isPage) {
			tabOpenPage[p_cleFld][p_tab[i].keyParent] = true;
		}
		
		// Set content and event if it is a page
		if (p_cleFld == cleFldSrc) {
			myTD.innerHTML = writeSrcLine(i);
			myTR.onclick = srcSelect;	
		}
		else {
			if (p_tab[i].isPage) {
				nbPageSelected ++;
			}
			myTD.innerHTML = writeDstLine (i);
			myTR.onclick = dstSelect;
		}
		// add td
		myTR.appendChild(myTD);

		tb.appendChild(myTR);
	}
}

function searchLastPage () {
	var ret = -1;
	for (i=0; i < tabDst.length; i++) {
		if (tabDst[i].isPage) {
			elem = document.getElementById(cleFldDst+i);
			if (elem.style.display == "") { // Show
				ret = tabDst[i].keyParent;
			}
		}
	}
	return ret;
}

function addOneElement (p_elem) {
	tabDst[tabDst.length] = p_elem;

	myTR = document.createElement("TR");
	//setDisplay(myTR, 'none');
	myTD = document.createElement("TD");
	//myTD.colSpan = 4;
	//myTD.className = 'tc';
	myTD.innerHTML = writeDstLine (tabDst.length-1);
	myTD.className = "align";
	// add td
	myTR.appendChild(myTD);
	// tbody
	myCurrent =  document.getElementById("dstTabBody");

	//tb = myCurrent.parentNode;
	// add tr
	//myNewTR = tb.insertBefore(myTR, myCurrent.nextSibling);
	myCurrent.appendChild(myTR);
	
	myTR.id = cleFldDst + (tabDst.length -1);
	myTR.onclick = dstSelect;

}

function addLine (p_obj, p_allSection) {
    if (typeof p_obj != "undefined") {
		p_selPos = p_obj.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id.substr(cleFldSrc.length);
	}
	else {
		p_selPos  = selSrcPos;
	}
	if (p_selPos >= 0) {
		var srcElem = tabSrc[p_selPos];
		if ((nbPageSelected < 0) && (! srcElem.isPage)) {
			alert(LIB_NEED_AT_LEAST_ONE_PAGE);
		}
		else {
			var allSection = false;
			if (srcElem.isPage) {
				var allSection = false;
				if (typeof p_allSection == 'undefined') {
					allSection = confirm("Do you want to select this pages and its content ?");
				}
				else {
					allSection = p_allSection;
				}
				nbPageSelected ++;
				nbPageDstKey ++;
				clePage = cleDstPage+nbPageDstKey;
				tabOpenPage[cleFldDst][clePage] = true;
			}
			else {
				clePage = searchLastPage ();
			}
			var newElem = new ChoixChapter(	clePage, srcElem.key, srcElem.lib, "false", "false", srcElem.isPage);
			addOneElement (newElem);
			if (allSection) {
				// Copy all elem of the page
				var i = (p_selPos*1)+1;
				while ((i < tabSrc.length) && (tabSrc[i].keyParent == srcElem.key)) {
					tmpElem = tabSrc[i];
					newElem = new ChoixChapter(	clePage, tmpElem.key, tmpElem.lib, "false", "false", tmpElem.isPage);
					addOneElement (newElem);
					i++;
				}
			}
		}
	}
}

function removeLine (p_obj) {
    if (typeof p_obj != "undefined") {
		p_selPos = p_obj.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id.substr(cleFldDst.length);
	}
	else {
		p_selPos  = selDstPos;
	}
	if (p_selPos >= 0) {
		tb = document.getElementById("dstTabBody");
		var dstElem = tabDst[p_selPos];
		var allRemove = true;
		if (dstElem.isPage) {
			if (confirm("Do you confirm to unselect page and all its content ?")) {
				var i = (p_selPos*1);
				var clePage = dstElem.keyParent;
				tabOpenPage[cleFldDst][clePage] = false;
				nbPageSelected --;
				var nbRemove = 0;
				while ((i < tabDst.length) && (tabDst[i].keyParent == clePage)) {
					//Remove graphical elem
					elem = document.getElementById(cleFldDst+(i+ nbRemove));
					tb.removeChild(elem);
					//Remove data elem
					tabDst.splice(i, 1);
					nbRemove++;
				}
				
			}			
		}
		else {
			//Remove graphical elem
			elem = document.getElementById(cleFldDst+p_selPos);
			tb.removeChild(elem);
			tabDst.splice(p_selPos, 1);
		}
		//Reset all
		selDstPos = -1;
		resetTRId ();
	}
}

function resetTRId () {
	tb = document.getElementById("dstTabBody");
	i = 0;
	elem = tb.firstChild;
	while (elem != null) {
		if (elem.nodeName == "TR") {
			elem.id = cleFldDst + i;
			if (i < tabDst.length) {
				if (tabDst[i].isPage) {
					elem.onclick = dstSelect;
				}
			}
			else {
				// Debug message
				alert("object en dehors du tableau : "+i);
			}
			i ++;
		}
		elem = elem.nextSibling;
	}
}

function writeSrcLine (p_num) {
	var newElem = tabSrc[p_num];
	
	var ret = "<table class='pdfTableLine' cellpadding=0 cellspacing=0 width='100%'>"
		+"<tr><td class='align' width='100%'>";
	var libTitle = "Add this chapter";
	if (newElem.isPage) {
		var libTitle = "Add only this page";
		if (tabOpenPage[cleFldSrc][newElem.keyParent]) {
			txt = "-";
		}
		else {
			txt = "+";
		}
		//ret += ("&nbsp;&nbsp;<input class=\"pdfPlusMoins\" type=\"button\" value=\""+txt+"\" onclick=\"openClosePage(this,'"+cleFldSrc+"')\">&nbsp;&nbsp;");
		//ret += ("<a href=\"javascript:openClosePage(this,'"+cleFldSrc+"')\"><b>&nbsp;"+txt+"&nbsp;"+tabSrc[i].lib+"</b></a>");
		ret += ("<b>&nbsp;"+txt+"&nbsp;"+newElem.lib+"</b>");
		ret += "</td><td class='align' nowrap>&nbsp;<input title='Add this page and its content' type='button' value='>>>' onclick='addLine (this, true)'>&nbsp;"
	}
	else {
		ret += ("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+newElem.lib);
	}
	ret += "</td><td class='align' nowrap>&nbsp;<input title='"+libTitle+"' class='pdfBtAddRemove' type='button' value='>>' onclick='addLine (this, false)'>&nbsp;"
	ret += "</td></tr></table>";
	return ret;
}

function writeDstLine (p_num) {
	var newElem = tabDst[p_num];
	var refElem = tabSrcByKey[newElem.key];
	
	var ret = "<table class='pdfTableLine' cellpadding=0 cellspacing=0 width='100%'><tr>";
	var libTitle = "Remove this chapter";
	if (newElem.isPage) {
		libTitle = "Remove this page and its content";
	}
	ret += "</td><td valign='top' nowrap>&nbsp;<input title='"+libTitle+"' type='button' value='<<' onclick='removeLine (this)'>&nbsp;</td>"

	if ((refElem.param == "txt") && (newElem.param != "")) {
		lib = newElem.param;
	}
	else if (refElem.param == "cont") {
		lib = newElem.lib +" <a class=\"pdfAction\" href=\"javascript:changeContinent(this)\">("+langContinent[newElem.param]+")</a>";
	}
	else {
		lib = newElem.lib;
	}
	if (newElem.isPage) {
		if (tabOpenPage[cleFldDst][newElem.keyParent]) {
			txt = "-";
		}
		else {
			txt = "+";
		}
		ret += "<td class='align' width='100%'>&nbsp;";
		ret += "<br />";
		ret += ("<b>&nbsp;"+txt+"&nbsp;"+lib+"</b>");
	}
	else {
		//ret += "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
		ret += "<td class='align' width='100%'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		ret += lib;
		ret += "<br />";
	}
	if (refElem.param == "txt") {
		ret += "&nbsp;&nbsp;<a class=\"pdfAction\" href=\"javascript:changeTxt(this)\">("+LIB_EDIT_TEXT+")</a>";
		ret += "<br />";
	}
	if (refElem.all == "true") {
		if (newElem.all == "true") {
			ret += "&nbsp;<a class=\"pdfAction\" href=\"javascript:changeAll(this, 'false')\">("+LIB_SHOW_ALL+")</a>";
		}
		else {
			ret += "&nbsp;<a class=\"pdfAction\" href=\"javascript:changeAll(this, 'true')\">("+LIB_HIDE_ALL+")</a>";
		}
		ret += "<br />";
	}
	if (refElem.interest == "true") {
		if (newElem.interest == "true") {
			ret += "&nbsp;<a class=\"pdfAction\" href=\"javascript:changeInterest(this, 'false')\">("+LIB_SHOW_INTEREST+")</a>";
		}
		else {
			ret += "&nbsp;<a class=\"pdfAction\" href=\"javascript:changeInterest(this, 'true')\">("+LIB_HIDE_INTEREST+")</a>";
		}
		ret += "&nbsp;&nbsp;&nbsp;";
	}
	ret += "</td></tr></table>";
	return ret;
}

function changeAll (p_obj, p_val) {
	//p_num = p_obj.id.substr(cleFldSrc.length);
	p_num = selDstPos;
	elem = document.getElementById(cleFldDst+p_num); // TR
	elem = elem.firstChild; // TD
	tabDst[p_num].all = p_val;
	elem.innerHTML = writeDstLine (p_num);
}

function changeInterest (p_obj, p_val) {
	//p_num = p_obj.id.substr(cleFldSrc.length);
	p_num = selDstPos;
	elem = document.getElementById(cleFldDst+p_num); // TR
	elem = elem.firstChild; // TD
	tabDst[p_num].interest = p_val;
	elem.innerHTML = writeDstLine (p_num);
}

function changeTxt (p_obj) {
	//p_num = p_obj.id.substr(cleFldSrc.length);
	p_num = selDstPos;
	elem = document.getElementById(cleFldDst+p_num); // TR
	elem = elem.firstChild; // TD
	if (tabDst[p_num].param == "") {
		defTxt = tabDst[p_num].lib;
	}
	else {
		defTxt = tabDst[p_num].param;
	}
	txt = prompt("Text to display in PDF :", defTxt);
	if ((txt) && (txt != "")) {
		tabDst[p_num].param = txt;
	}
	elem.innerHTML = writeDstLine (p_num);
}

function changeContinent (p_obj) {
	//p_num = p_obj.id.substr(cleFldSrc.length);
	p_num = selDstPos;
	elem = document.getElementById(cleFldDst+p_num); // TR
	elem = elem.firstChild; // TD
	do {
		txt = prompt("Input continent key : "+msgContinent, tabDst[p_num].param);
	} while ((txt != null) && (! langContinent[txt]));
	if (txt != null) {
		tabDst[p_num].param = txt;
	}
	elem.innerHTML = writeDstLine (p_num);
}

function moveUpPage (p_keyParent, p_idTopElem, p_idBottomElem) {
	prevElem = document.getElementById(cleFldDst+p_idTopElem);
	tb = prevElem.parentNode;
	// Move data elem
	k = (p_idBottomElem*1);
	nbmove = 0;
	while ((k < tabDst.length) && (p_keyParent == tabDst[k].keyParent)) {
		tmpElem = tabDst[k];
		for (j=k; j > (p_idTopElem + nbmove); j--) {
			tabDst[j] = tabDst[j-1];
		}
		tabDst[p_idTopElem+nbmove] = tmpElem;
		// Move UI
		elem = document.getElementById(cleFldDst+k);
		myNewTR = tb.insertBefore(elem, prevElem);
		k++;
		nbmove++;
	}
	return nbmove;
}

function upLine() {
	if (selDstPos > 0) {
		dstElem = tabDst[selDstPos];
		if (dstElem.isPage) {
			// update all page and is content
			// Search previous page
			i = selDstPos - 1;
			while ((i >= 0) && (! tabDst[i].isPage)) {
				i--;
			}
			if (i >= 0) {
				// Reset selected color
				elem = document.getElementById(cleFldDst+selDstPos);
				elem.className = classNotSelected;
				// Move page
				moveUpPage (dstElem.keyParent, i, selDstPos);
				selDstPos = i;
				resetTRId ();
				// Set selected color
				elem = document.getElementById(cleFldDst+selDstPos);
				elem.className = classSelected;
			}
		}
		else {
			// Update only one chapter
			
			// Verify if there is page
			if (selDstPos <= 1) {
				alert(LIB_CAN_NOT_ADD_CHAPTER);
			}
			else {
				// Previous elem
				futurPrevDstElem = tabDst[selDstPos-2];
				if (futurPrevDstElem.keyParent != dstElem.keyParent) {
					dstElem.keyParent = futurPrevDstElem.keyParent;
				}
				// Move  data elem
				tmpElem = tabDst[selDstPos-1];
				tabDst[selDstPos-1] = dstElem;
				tabDst[selDstPos] = tmpElem;
				// Move UI
				elem = document.getElementById(cleFldDst+selDstPos);
				tb = elem.parentNode;
				myNewTR = tb.insertBefore(elem, elem.previousSibling);
				selDstPos--;
				resetTRId ();
			}
		}
	}
}

function downLine() {
	if (selDstPos < (tabDst.length -1)) {
		dstElem = tabDst[selDstPos];
		if (dstElem.isPage) {
			// update all page and is content
			// Search next page
			i = (selDstPos*1) + 1;
			while ((i < tabDst.length) && (! tabDst[i].isPage)) {
				i++;
			}
			if (i < tabDst.length) {
				// Reset selected color
				elem = document.getElementById(cleFldDst+selDstPos);
				elem.className = classNotSelected;
				// Move page
				nbmove = moveUpPage (tabDst[i].keyParent, (selDstPos*1), i);
				selDstPos = (selDstPos*1) + nbmove;
				resetTRId ();
				// Set selected color
				elem = document.getElementById(cleFldDst+selDstPos);
				elem.className = classSelected;
			}
		}
		else {
			// Update only one chapter
			
			// Next  elem
			futurNextDstElem = tabDst[(selDstPos*1)+1];
			if (futurNextDstElem.keyParent != dstElem.keyParent) {
				dstElem.keyParent = futurNextDstElem.keyParent;
			}
			// Deplace data elem
			tmpElem = tabDst[(selDstPos*1)+1];
			tabDst[(selDstPos*1)+1] = dstElem;
			tabDst[selDstPos] = tmpElem;
			// Deplace UI
			elem = document.getElementById(cleFldDst+selDstPos);
			tb = elem.parentNode;
			myNewTR = tb.insertBefore(elem, elem.nextSibling.nextSibling);
			selDstPos++;
			resetTRId ();
		}
	}
}

function unselectSrc () {
	if (selSrcPos >= 0) {
		elem = document.getElementById(cleFldSrc+selSrcPos);
		elem.className = classNotSelected;
		selSrcPos = -1;
	}
}

function rewriteTD (p_elemTR, p_cleFld, p_num) {
	var elem = p_elemTR.firstChild;
	var elemTD = null;
	while ((elem != null) && (elemTD == null)) {
		if (elem.nodeName == "TD") {
			elemTD = elem;
		}
		elem = elem.nextSibling;
	}
	if (elemTD != null) {
		if (p_cleFld == cleFldSrc) {
			elemTD.innerHTML = writeSrcLine (p_num);
		}
		else {
			elemTD.innerHTML = writeDstLine (p_num);
		}
	}
}

function closeAll(p_tab, p_cleFld) {
	for (i=0; i < p_tab.length; i ++) {
		elem = document.getElementById(p_cleFld+i);
		if (p_tab[i].isPage) {
			elem.style.display="";
			tabOpenPage[p_cleFld][p_tab[i].keyParent] = false;
			// Recuperation de la balise TD
			rewriteTD (elem, p_cleFld, i);
		}
		else {
			elem.style.display="none";
		}
	}
}

function openAll(p_tab, p_cleFld) {
	for (i=0; i < p_tab.length; i ++) {
		elem = document.getElementById(p_cleFld+i);
		if (p_tab[i].isPage) {
			elem.style.display="";
			tabOpenPage[p_cleFld][p_tab[i].keyParent] = true;
			// Recuperation de la balise TD
			rewriteTD (elem, p_cleFld, i);
		}
		else {
			elem.style.display="";
		}
	}
}

function writeResult() {
	var elem = document.getElementById("param_pdf_result");
	var writeLibel = false;
	var sepLine = "@@";
	var sepInfo = "#";
	var ch = "";
	for (i=0; i < tabDst.length; i ++) {
		if (i > 0) {
			ch += (writeLibel ? "\n": sepLine);
		}
		ch += (writeLibel ? i+"#"+tabDst[i].keyParent : "");
		ch += (writeLibel ? "#key:" : "") + tabDst[i].key ;
		ch += (writeLibel ? "#lib:"+ tabDst[i].lib : "") ;
		ch += (writeLibel ? "#all:" : sepInfo) + tabDst[i].all;
		ch += (writeLibel ? "#interest:" : sepInfo) + tabDst[i].interest;
		ch += (writeLibel ? "#isPage:" + tabDst[i].isPage : "");
		if (tabDst[i].param != "") {
			ch += (writeLibel ? "#param:" : sepInfo)+tabDst[i].param;
		}
	}
	elem.value = ch;
}

function submitPdfConfig() {
	if (document.form_phpmv.form_name.value == "") {
		document.form_phpmv.form_name.focus();
		alert(LIB_PDF_NAME_MANDATORY);
	}
	else {
		writeResult();
		document.form_phpmv.submit();
	}
}
