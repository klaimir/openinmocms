function myGetHTTPObject(p_tab, p_id, p_url, p_loading, p_typeResponse) {
	var v_xmlhttp = false;
	/* Compilation conditionnelle d'IE */
		/*@cc_on
	@if (@_jscript_version >= 5)
	try {
		v_xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch (e) {
		try {
			v_xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch (E) {
			v_xmlhttp = false;
		}
	}
	@else
	v_xmlhttp = false;
	@end @*/
	/* on essaie de creer l'objet si ce n'est pas deja  fait */
	if (!v_xmlhttp && typeof XMLHttpRequest != 'undefined') {
		try {
			v_xmlhttp = new XMLHttpRequest();
		}
		catch (e) {
			v_xmlhttp = false;
		}
	}
	if (v_xmlhttp) {
		/* on definit ce qui doit se passer quand la page repondra */
		v_xmlhttp.open("GET",p_url,true);
		v_xmlhttp.onreadystatechange=function() {
			if (v_xmlhttp.readyState == 4) {
				if (v_xmlhttp.status == 200 || v_xmlhttp.status == 304 ) {
					var vXMLDoc;
					if (window.ActiveXObject){
						vXMLDoc = new ActiveXObject("Microsoft.XMLDOM");
						vXMLDoc.async = false;
						vXMLDoc.loadXML(v_xmlhttp.responseText);
					} else {
					    var vParser = new DOMParser();
						vXMLDoc = vParser.parseFromString(v_xmlhttp.responseText, "text/xml");
					}
					tabXML[p_url] = vXMLDoc;
					updatePageList(p_tab, p_id, p_url, p_loading, vXMLDoc);
				}
			}
		}
		v_xmlhttp.send( null );
	}
	return v_xmlhttp;
}

var tabXML = new Array();
var tabChild = new Array();
var tabNumTR = new Array();

function loadDetailXML (p_tab, p_elt, p_url, e) {

	var v_doc = p_elt.ownerDocument;
	var v_table =p_elt.parentNode;
	var v_trNext = p_elt.nextSibling;
	
	// Verify if event is for me (firefox)
	if (typeof (e) != "undefined") {
		if (e.target.nodeName == "SPAN") {
			return;
		}
	}
	// Verify if event is for me (IE)
	if (typeof (event) != "undefined") {
		if (event.srcElement.nodeName == "SPAN") {
			return;
		}
	}
	
	// Change function for close
	p_elt.onclick = function (e) {closeDetail (p_tab, this, p_url, e); }
	
	// Change expand / collapse image
	changeExpandCollapseImage(p_elt);
	
	//Create loading
	var loadingRow = v_doc.createElement('tr');
	var loadingCell = v_doc.createElement('td');
	mySetAttribute(loadingCell,'colspan', p_elt.getElementsByTagName("td").length);
	var txtNode = v_doc.createTextNode('Loading...');
	loadingCell.appendChild (txtNode);
	loadingRow.appendChild (loadingCell);
	var v_loading = v_table.insertBefore(loadingRow, v_trNext);

	if (tabXML[p_url]) {
		// Already loaded
		updatePageList(p_tab, p_elt.id, p_url, v_loading, tabXML[p_url]);
	}
	else {
		// Not loaded
		if (typeof(tabChild[p_tab]) == "undefined") {
			tabChild[p_tab] = new Array();
			tabNumTR[p_tab] = 0;
		}
		if (p_elt.id) {
			v_id = p_elt.id;
		}
		else {
			v_id = p_tab+"."+tabNumTR[p_tab];
			p_elt.id = v_id;
			tabNumTR[p_tab] ++;
		}

		myGetHTTPObject(p_tab, v_id, p_url, v_loading, "rien");
	}
}

function changeExpandCollapseImage(p_elt) {
	// Change expand / collapse image
	var myImgExpandCollapse = p_elt.getElementsByTagName("td")[0].getElementsByTagName("img");
	if (myImgExpandCollapse.length > 0) {
		var exp = new RegExp(/(.*)(switch[a-b])(\..*)/);
		var tabElt = exp.exec(myImgExpandCollapse[0].getAttribute('src'));
		if (tabElt != null) {
			var switchStr = (tabElt[2]=='switcha') ? 'switchb':'switcha';
			setAttributeDom(myImgExpandCollapse[0],'src',tabElt[1]+switchStr+tabElt[3]);
		}
	}
}

function closeDetail (p_tab, p_elt, p_url, e) {
	var i;
	var v_child;
	var v_parent = p_elt.parentNode;
	var v_id = p_elt.id;

	// Verify if event is for me (firefox)
	if (typeof (e) != "undefined") {
		if (e.target.nodeName == "SPAN") {
			return;
		}
	}
	// Verify if event is for me (IE)
	if (typeof (event) != "undefined") {
		if (event.srcElement.nodeName == "SPAN") {
			return;
		}
	}
	
	if (p_url) {
		p_elt.onclick = function (e) {loadDetailXML (p_tab, this, p_url, e);}
		// Change expand / collapse image
		changeExpandCollapseImage(p_elt);
	}
	
	// Verify if there is child
	if (tabChild[p_tab][v_id]) {
		for (var i=0; i < tabChild[p_tab][v_id].length; i++) {
			v_child = document.getElementById(tabChild[p_tab][v_id][i]);
			if (v_child) {
				if (v_child.id) {
					closeDetail (p_tab, v_child);
				}
				v_parent = v_child.parentNode;
				if (v_child) {
					v_parent.removeChild(v_child);
				}
			}
		}
	}
}

function updatePageList(p_tab, p_id, p_url, p_loading, p_xml) {
	var i;
	var v_child;
	var v_doc = p_loading.ownerDocument;
	var v_table = p_loading.parentNode;
	
	// Save xml in cache
	tabChild[p_tab][p_id] = new Array();
	var nbTr = 0;
	for (i=0; i < p_xml.firstChild.childNodes.length; i++) {
		v_child = p_xml.firstChild.childNodes[i];
		if (v_child.nodeName == "tr") {
			//alert(p_id+"."+nbTr);
			tabChild[p_tab][p_id][nbTr] = p_id+"."+nbTr;
			traiteHTML (v_doc, v_table, v_child, true, p_loading, p_id+"."+nbTr);
			nbTr ++;
		}
	}
	v_table.removeChild(p_loading);
}


function mySetAttribute (p_elt, p_name, p_value) {
	var v_name = p_name.toLowerCase();
	if  (v_name=='class') {
		p_elt.className = p_value;
	}
	else if  (v_name=='colspan') {
		p_elt.colSpan = p_value;
	}
	else if (v_name=='onclick') {
		p_elt.onclick = function() { eval(p_value) }
	}
	else if (v_name=='onmouseover') {
		p_elt.onmouseover = function() { eval(p_value) }
	}
	else if (v_name=='style') {
		p_elt.style.cssText = p_value;
	}
	else {
		p_elt.setAttribute(p_name,p_value);
	}
}

function replaceAllSpace (p_str) {
	var v_ch = p_str.replace(/ /g,'');
	v_ch = v_ch.replace(/\t/g,'');
	v_ch = v_ch.replace(/\n/g,'');
	return v_ch;
}

function myTrim (p_str) {
	var v_ch = p_str.replace(/\n/g,' ');
	v_ch = v_ch.replace(/\t/g,' ');
	v_ch = v_ch.replace(/  /g,' ');
	return v_ch;
}

function getIndent (p_nb) {
	var i;
	var ch ="";
	for (i=0; i < p_nb-2; i++) {
		ch = ch + '&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	return ch;
}

function traiteHTML (p_doc, p_parent, p_node, p_first, p_trNext, p_id) {
	var i;
	var ch = "";
	var v_cur;
	if (p_node.nodeType != 3) {
		// Create node
		v_cur = p_doc.createElement (p_node.nodeName);
		if (p_first) {
			v_cur.id = p_id;
		}
		// Attribut of node
		var v_attr;
		if (p_node.attributes) {
			for (i=0; i < p_node.attributes.length; i++) {
				v_attr = p_node.attributes[i];
				mySetAttribute(v_cur, v_attr.name, v_attr.value);
			}
		}
		if ((p_node.nodeName == "td") && (! p_first) && (p_trNext > 0)) {
			mySetAttribute(v_cur, "style", "padding-left:"+((p_trNext-1)*15)+"px;");
		}
		
		var v_curForChild = v_cur;
		if (p_node.nodeName == 'table') { // For IE create tbody
			v_curForChild = p_doc.createElement ("tbody");
			v_cur.appendChild(v_curForChild);
		}

		// Process childs
		var v_child;
		var v_firstTD = true;
		var v_firstText = true;
		if (p_node.childNodes) {
			for (i=0; i < p_node.childNodes.length; i++) {
				v_child = p_node.childNodes[i];
				if (((v_child.nodeType == 3) || (v_child.nodeName == 'img')) && (p_node.nodeName == "td") && (v_firstText)) {
					v_firstText = false;
					ch += traiteHTML (p_doc, v_curForChild, v_child, false, p_trNext, p_id);
				}
				else if ((p_first) && (v_firstTD) && (v_child.nodeName == 'td')) {
					v_firstTD = false;
					ch += traiteHTML (p_doc, v_curForChild, v_child, false, p_id.split(".").length, p_id);
				}
				else {
					ch += traiteHTML (p_doc, v_curForChild, v_child, false, 0, p_id);
				}
			}
		}
	}
	else {
		if (replaceAllSpace (p_node.nodeValue) != "") {
			v_cur = p_doc.createTextNode (myTrim(p_node.nodeValue));
		}
		else {
			v_cur = p_doc.createTextNode (" ");
		}
	}
	if (p_first) {
		p_parent.insertBefore(v_cur, p_trNext);
	}
	else  {
		p_parent.appendChild(v_cur);
	}
}

