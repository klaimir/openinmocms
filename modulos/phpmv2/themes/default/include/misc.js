var phpmvRowsArray = new Array();
function getHTTPObject(elt,url,typeResponse,loadingRow) {
	var xmlhttp = false;
	/* Compilation conditionnelle d'IE */
		/*@cc_on
	@if (@_jscript_version >= 5)
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch (e) {
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch (E) {
			xmlhttp = false;
		}
	}
	@else
	xmlhttp = false;
	@end @*/
	/* on essaie de créer l'objet si ce n'est pas déjà  fait */
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		try {
			xmlhttp = new XMLHttpRequest();
		}
		catch (e) {
			xmlhttp = false;
		}
	}
	if (xmlhttp) {
		/* on définit ce qui doit se passer quand la page répondra */
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState == 4) {
				if (xmlhttp.status == 200 || xmlhttp.status == 304 ) {
					switch ( typeResponse ) {
						case 'xml':
							if (window.ActiveXObject){
								vXMLDoc = new ActiveXObject("Microsoft.XMLDOM");
								vXMLDoc.async = false;
								vXMLDoc.loadXML(xmlhttp.responseText);
							} else {
								var vParser = new DOMParser();
								vXMLDoc = vParser.parseFromString(xmlhttp.responseText, "text/xml");
							}
							traitementDOM(elt,vXMLDoc,url,loadingRow);
							//var parentElt = elt.parentNode;
							//if(parentElt) parentElt.removeChild(loadingRow);
							break;
						case 'html':
							phpmvRowsArray[url] = xmlhttp.responseText;
							elt.innerHTML = xmlhttp.responseText;
							break;
					}
				}
			}
		}
	}
	return xmlhttp;
}

function createLoadingRow (elt) {
	var myDocument = elt.ownerDocument;
	var loadingRow = myDocument.createElement('tr');
	var loadingCell = myDocument.createElement('td');
	setAttributeDom(loadingCell,'colspan', elt.getElementsByTagName("td").length);
	var txtNode = myDocument.createTextNode('Loading...');
	loadingCell.appendChild(txtNode);
	loadingRow.appendChild(loadingCell);
	insertAfterRow(elt,loadingRow);
	
	return loadingRow;
}

function viewRowsDetails(elt,url,p_changeImage) {
	// add or remove sub-row details
	var myDocument = elt.ownerDocument;
	var exp;
	// Change expand / collapse image
	if ((typeof(p_changeImage) == "undefined") || (p_changeImage)) {
		var myImgExpandCollapse = elt.getElementsByTagName("td")[0].getElementsByTagName("img");
		if (myImgExpandCollapse.length > 0) {
			exp = new RegExp(/(.*)(switch[a-b])(\..*)/);
			var tabElt = exp.exec(myImgExpandCollapse[0].getAttribute('src'));
			if (tabElt != null) {
				switchStr = (tabElt[2]=='switcha') ? 'switchb':'switcha';
				setAttributeDom(myImgExpandCollapse[0],'src',tabElt[1]+switchStr+tabElt[3]);
			}
		}
	}
	exp = new RegExp(/(.*)\sselectedRow/);
	// unselected all rows
	var allRows = myDocument.getElementsByTagName("tr");
	for (var i=0;i<allRows.length;i++) {
		tabClass = exp.exec(allRows[i].className);
		if (tabClass != null) {
			allRows[i].className = tabClass[1];
		}
	}
	// Verify if next row is detail
	if ((elt.nextSibling != null) // IE
		&& (typeof(elt.nextSibling) != "undefined")
		&& (elt.nextSibling.nodeName == 'TR')
		&& (elt.nextSibling.firstChild.firstChild.nodeName == 'TABLE')) {
		// Remove detail
		var v_parent = elt.parentNode;
		var v_toDelete = elt.nextSibling;
		v_parent.removeChild (v_toDelete);
	}
	else {
		if (phpmvRowsArray[url] == undefined) { // load detail from http
			// when row is selected for expand details
			if(elt.className != 'details') elt.className = elt.className + ' selectedRow';
			if (elt.getElementsByTagName("td")[0].getElementsByTagName("a").length == 0) {
				// add loading's row for information
				var loadingRow = createLoadingRow (elt);
				// *********************************
			} else {
				var loadingRow = elt.cloneNode(true)
				loadingRow.getElementsByTagName("td")[0].innerHTML = 'Loading...';
				insertAfterRow(elt,loadingRow);
				elt.parentNode.removeChild(elt);
				elt = loadingRow;
			}
			var xmlhttp = getHTTPObject(elt,url,'xml',loadingRow);
			xmlhttp.open("GET",url,true);
			xmlhttp.send( null );
		} else { // load detail from cache
			var loadingRow = createLoadingRow (elt);
			traitementDOM(elt,phpmvRowsArray[url],url,loadingRow);
		}
	}
}

function searchTagInParent (p_elt, p_tag) {
	var v_tmpElt = p_elt.parentNode;
	while ((v_tmpElt != null) && (v_tmpElt.nodeName != p_tag)) {
		v_tmpElt = v_tmpElt.parentNode;
	}
	return v_tmpElt;
}

function viewNextPreviousRowsDetailsXX(elt,url) {
	// view next rows details, for all table, or sub-rows only
	var tmpElt = elt;
	var replaceAll = false;
	while (tmpElt.tagName != 'TR') {
		tmpElt = tmpElt.parentNode;
	}
	var curTable = tmpElt.parentNode;
	// Is the link in a cell ?
	if (tmpElt != null && tmpElt.getElementsByTagName("td")[0].attributes.getNamedItem('class').value.indexOf('subLevel')==-1) replaceAll = true;
	if (!replaceAll) { // if we haven't row contain link
		viewRowsDetails(tmpElt,url);
	} else {
		alert("changeDetail");
		changeDetails(elt,url);
	}
}

function viewNextPreviousRowsDetails(elt,url) {
	// Search Detail table
	var v_tmpTableDetail = searchTagInParent (elt, 'TABLE');
	if (v_tmpTableDetail.id != "detail") {
		changeDetails(elt,url);
	}
	else {
		var v_tmpTD = searchTagInParent (v_tmpTableDetail, 'TD');
		if (phpmvRowsArray[url] == undefined) {
			elt.parentNode.innerHTML = 'Loading...';
			var xmlhttp = getHTTPObject(v_tmpTD,url,'html');
			xmlhttp.open("GET",url,true);
			xmlhttp.send( null );
		} else {
			v_tmpTD.innerHTML = phpmvRowsArray[url];
		}

/*		
		// Search TR which contains detail table
		var v_tmpTRLoading = searchTagInParent (v_tmpTableDetail, 'TR');
		// Get parent of TR
		var v_tmpTRParent = v_tmpTRLoading.parentNode;
		// Get TR of parent
		var v_tmpTR = v_tmpTRLoading.previousSibling;
		// Removing old data
		v_tmpTRParent.removeChild (v_tmpTRLoading);
		// Load data
		viewRowsDetails(v_tmpTR,url, false);
*/
	}
}

function traitementDOM (elt,response,url,loadingRow) {
	var v_content = "";
	var v_doc = loadingRow.ownerDocument;
	//removeChild
	var v_TD = loadingRow.firstChild;
	var v_TxtLoad = loadingRow.firstChild.firstChild;
	// Set data in cache
	phpmvRowsArray[url] = response;
	// Add element
	traiteHTML (v_doc, loadingRow.firstChild, response.firstChild, false, 0, "12");
	// Remove Loading.. text
	v_TD.removeChild(v_TxtLoad);
}



function traitementDOMxx (elt,response,url,loadingRow) {
	// adding new content with DOM gestion
	var newphpmvRowsArray = new Array();
	elt = removeOldRows(elt,url);
	var level = elt;
	var eltTD;
	var attrName;
	var myDocument = elt.ownerDocument;
	eltTD = elt.getElementsByTagName("td")[0]; // cell contain link detail
	if (eltTD.attributes.getNamedItem('class') && eltTD.attributes.getNamedItem('class').value.indexOf('subLevel')!=-1) { // if not first level detail
		level = eltTD.attributes.getNamedItem('class').value;
		level = 'subLevel' + (parseInt(level.substr(8))+1);
	} else { // if first detail detail
		level = 'subLevel1';
	}
	newphpmvRowsArray[0] = "level" + level;
	var allRows = response.getElementsByTagName("tr");
	for (var i=allRows.length;i>0;i--) {
		var isInterrest = false; // if the rows details is in table with header
		if (response.getElementsByTagName("th").length>0) isInterrest = true; // we are in table with header cells
		var newRow = myDocument.createElement('tr');
		if (allRows[i-1].getAttributeNode('onclick')!=null) { // add attributes for the new row
  			setAttributeDom(newRow,'onclick',allRows[i-1].attributes.getNamedItem('onclick').value);
			setAttributeDom(newRow,'class','expandcollapse');			
		} else if (isInterrest) {
			setAttributeDom(newRow,'class','details');
		}
		// add header's details cells
		var myRow = allRows[i-1].getElementsByTagName("th");
		for (var j=0;j<myRow.length;j++) {
			var newCell = myDocument.createElement('th');
			setAttributeDom(newCell,'class','subLevel');
			for (var k=0;k<myRow[j].attributes.length;k++) {
				setAttributeDom(newCell,myRow[j].attributes[k].name,myRow[j].attributes[k].value);
			}
			contentNode(newCell,myRow[j]);
			newRow.appendChild(newCell);
		}
		insertAfterRow(elt,newRow);
		// add rows details
		var myRow = allRows[i-1].getElementsByTagName("td");
		for (var j=0;j<myRow.length;j++) {
			var newCell = myDocument.createElement('td');
			if (j==0) { // add class for the new cell
				setAttributeDom(newCell,'class',level);
			} else {
				setAttributeDom(newCell,'class','subLevel');
			}
			for (var k=0;k<myRow[j].attributes.length;k++) { // add attributes for the new cell
				attrName = myRow[j].attributes[k].name;
				if (newCell.attributes.getNamedItem(attrName) != null) {
					setAttributeDom(newCell,attrName,newCell.attributes.getNamedItem(attrName).value+' '+myRow[j].attributes[k].value);
				} else {
					setAttributeDom(newCell,attrName,myRow[j].attributes[k].value);
				}
			}
			contentNode(newCell,myRow[j]);
			newRow.appendChild(newCell);
		}
		insertAfterRow(elt,newRow)
		newphpmvRowsArray[i] = newRow;
	}
	var sum = 0;
	for (var toto in phpmvRowsArray) sum++;
	setAttributeDom(elt,'id','rowElt'+sum);
	phpmvRowsArray[url] = newphpmvRowsArray;
}
function insertAfterRow(elt,newRow) {
	// insert row after reference row
	var currentTable;
	if (elt.tagName == 'TABLE' || elt.tagName == 'TBODY') {
		elt.appendChild(newRow);
	} else {
		currentTable = elt.parentNode;
		if(elt.nextSibling) currentTable.insertBefore(newRow, elt.nextSibling);
			else currentTable.appendChild(newRow);
	}
}
function contentNode(newCell,myContent) {
	// add all child of myContent to the new cell newCell
	var myDocument = newCell.ownerDocument;
	for (var i=0;i<myContent.childNodes.length;i++) {
		if (myContent.childNodes[i].tagName) {
			var tmpNode = myDocument.createElement(myContent.childNodes[i].tagName);
			for (var j=0;j<myContent.childNodes[i].attributes.length;j++) {
	                    setAttributeDom(tmpNode,myContent.childNodes[i].attributes[j].name,myContent.childNodes[i].attributes[j].value);
			}
			contentNode(tmpNode,myContent.childNodes[i]);
		        newCell.appendChild(tmpNode);
		} else {
			var tmpNode = myDocument.createTextNode(myContent.childNodes[i].nodeValue);
			newCell.appendChild(tmpNode);
		}
	}
}
function removeDetails(elt,url) {
	// remove all details's elt
	var parentElt = elt.parentNode;
	for (var i=1;i<phpmvRowsArray[url].length;i++) {
		if (phpmvRowsArray[url][i].parentNode != null) {
			//if (phpmvRowsArray[url][i].attributes.getNamedItem('id')) { // with row's datails (visible or hidden)
			if (phpmvRowsArray[url][i].getAttribute('id') != '' && phpmvRowsArray[url][i].getAttribute('id') != null) { // with row's datails (visible or hidden)
				// test if img is collapse
				var myImgExpandCollapse = phpmvRowsArray[url][i].getElementsByTagName("td")[0].getElementsByTagName("img");
				if (myImgExpandCollapse.length > 0) {
					exp = new RegExp(/(.*)(switch[a-b])(\..*)/);
					var tabElt = exp.exec(myImgExpandCollapse[0].getAttribute('src'));
					if (tabElt != null) {
						if (tabElt[2]=='switchb') setAttributeDom(myImgExpandCollapse[0],'src',tabElt[1]+'switcha'+tabElt[3]);
					}
				}
				var exp = /.*(\(this,')(.*)('\)).*/;
				//var curURL = exp.exec(phpmvRowsArray[url][i].attributes.getNamedItem('onclick').value);
				var curURL = exp.exec(phpmvRowsArray[url][i].getAttribute('onclick'));
				if (curURL != null) curURL = curURL[2];
				removeDetails(phpmvRowsArray[url][i],curURL);
			}
			parentElt.removeChild(phpmvRowsArray[url][i]);
		}
	}
}
function displayInterest( curElt ) {
	// display complet table for more information	
	exp = new RegExp(/(.*<span>)(.*)(<\/span>.*)/i);
	var tabElt = exp.exec(curElt.innerHTML);
	switchStr = (tabElt[2]=='+') ? '-':'+';
	curElt.innerHTML = tabElt[1] + switchStr + tabElt[3]; // switch '+' and '-' when expand/collapse
	var tmpElt = curElt.nextSibling;
	while (tmpElt.tagName != 'DIV') {
		tmpElt = tmpElt.nextSibling;
	}
	if (tmpElt.style.display == 'block') tmpElt.style.display = 'none';
		else tmpElt.style.display = 'block';
}

function changeDetails(curElt,url) {
	// load complete content with cache
	var tmpElt = curElt.parentNode;
	while (tmpElt.tagName != 'DIV') {
		tmpElt = tmpElt.parentNode;
	}
	if (phpmvRowsArray[url] == undefined) {
		curElt.parentNode.innerHTML = 'Loading...';
		var xmlhttp = getHTTPObject(tmpElt,url,'html');
		xmlhttp.open("GET",url,true);
		xmlhttp.send( null );
	} else {
		tmpElt.innerHTML = phpmvRowsArray[url];
	}
}

function removeOldRows(tmpElt,url) {
	var curTable = tmpElt.parentNode;
	var myTmpRow;
	var myTmpElt = tmpElt;
	while (!attributeExist(myTmpElt,'id') && !attributeExist(myTmpElt,'onclick')) { // search for parent rows wich contain link
		myTmpRow = myTmpElt;
		myTmpElt = myTmpElt.previousSibling;
		curTable.removeChild(myTmpRow);
		if (myTmpElt == null) {
			break;
		}
	}
	exp = new RegExp(/(.*')(.*)('.*)/);
	var tabElt = exp.exec(myTmpElt.getAttribute('onclick'));
	if (myTmpElt.onclick != null) {
	//setAttributeDom(tmpElt,'onclick','javascript:alert('+tabElt[1]+url+tabElt[2]+')');
	if (url != tabElt[2]) {
          	setAttributeDom(tmpElt,'onclick',tabElt[1]+url+tabElt[3]);
	}
        }
	return myTmpElt;
}
function setAttributeDom(myElt,attributeName,attributeValue) {
	var testWithOnlyOneCharacter = 'test'+attributeValue; // indexOf don't work with only 1 character :-(
	if (attributeName == 'colspan' && testWithOnlyOneCharacter.indexOf(' ') != -1) {
		attributeValue = attributeValue.substring(attributeValue.lastIndexOf(' '),attributeValue.length);
	}
	z = document.createAttribute(attributeName);
	z.value = attributeValue;
//SS
	myElt.setAttributeNode(z);
	myElt.setAttribute(attributeName,attributeValue);
	if (attributeName=='onclick') {
		myElt.onclick = function() { eval(attributeValue) }
	}
}
function attributeExist(myElt,attrName) {
        // test if an element has the specified attribute, because hasAttribute DOM's function is buggy
       	if (myElt.getAttributeNode(attrName) != null) {
          if (myElt.getAttributeNode(attrName).value == 'null' || myElt.getAttributeNode(attrName).value == '') { //saloperie d'IE !
            return false;
          } else {
            return true;
          }
        } else {
          return false;
        }
}
// Ajout CMI

function inverseSpan( cur ) {
	if(cur.innerHTML == '&nbsp;-&nbsp;')
		cur.innerHTML = '&nbsp;+&nbsp;';
	else
		cur.innerHTML = '&nbsp;-&nbsp;';
}
function getDisplay( i )
{
	d = i.style.display;
	if(d == 'none') return 'none';
	else return '';
}
function inverseDisplay( i )
{
	if(getDisplay(i)=='')
	{
		newD = 'none';
		returned = false;
	}
	else
	{
		newD = '';
		returned = true;
	}
	setDisplay(i, newD);
	return returned;
}
function setDisplay(i, d)
{
	i.style.display = d;
}
function findFirstChildWithType( targetNode, type )
{
	  for(var i = 0; i < targetNode.childNodes.length; i++)
        {
            var child = targetNode.childNodes[i];
            if (child.nodeName == type )
                return child;
        }
      return false;
}
function pointer( current )
{
	current.style.cursor = 'pointer';
}
function loadUrl( url )
{
	window.location = url;
}
function hideIt(current)
{
	inverseDisplay(current);
}
function displayVariables( cur )
{
	hideIt( findFirstChildWithType( cur, 'DIV') );
	
	spanToInverse = findFirstChildWithType( cur, 'SPAN');
	inverseSpan( spanToInverse );
	
}