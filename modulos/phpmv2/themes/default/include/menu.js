sfHover = function() {
	if (document.getElementById("menu")) 
	{		
		var sfEls = document.getElementById("menu").getElementsByTagName("LI");
		for (var i=0; i<sfEls.length; i++) 
		{
			sfEls[i].onmouseover = function() {
				this.className+=" sfhover";
				hideSelectBox();
			}
			sfEls[i].onmouseout=function() {
				this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
				showSelectBox();
			}
		}
	}
	if (document.getElementById("menuPDF")) 
	{
		var sfEls = document.getElementById("menuPDF").getElementsByTagName("LI");
		for (var i=0; i<sfEls.length; i++) 
		{
			sfEls[i].onmouseover = function() {
				this.className+=" sfhover";
				hideSelectBox();
			}
			sfEls[i].onmouseout=function() {
				this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
				showSelectBox();
			}
		}
	}
	if (document.getElementById("lang")) {
		var elemLang = document.getElementById("lang");
		var elemLangTmp = document.getElementById("langTmp");
		elemLangTmp.value = elemLang.options[elemLang.selectedIndex].text;
		var max = 0;
		var imax = -1;
		var i = 0;
		for (i=0; i < elemLang.options.length; i++) {
			if (elemLang.options[i].text.length > max) {
				max = elemLang.options[i].text.length;
				imax = i;
			}
		}
		//alert(js_direction);
		//alert(elemLang.size);
		//elemLangTmp.style.width = elemLang.style.width - 20;
	}
}
function hideSelectBox(e) {
	if ((document.getElementById("lang"))
		&& (((js_direction=="rtl") && (event.clientX < 300))
			|| ((js_direction=="ltr") && (event.clientX > 710)))) {
			document.getElementById("lang").style.display="none";
			document.getElementById("langTmp").style.display="";
	}
}
function showSelectBox (e) {
	if (document.getElementById("lang")) {
		document.getElementById("lang").style.display="";
		document.getElementById("langTmp").style.display="none";
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);