<!-- include file=admin/form.tpl -->
{include file=admin/form_header.tpl}
{literal}
<style type="text/css">
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
</style>
{/literal}
<div align="center">
<p class="texte">You can create PDF reports templates that will contain only the statistics you want!
On the left you have the different statistics available. You can click on the arrows to move the statistics to the right side, which is your PDF template. 
Once you've finished, click submit. You can now generate this PDF in the Statistics interface, by clicking on the menu near the PDF image button.</p>
	<form {$form_data.attributes}>
	<input type="hidden" name='form_site_admin' value="{$siteAdmin}">
	<input type="hidden" name='form_id' value="{$pdfId}">
	<script type="text/javascript" src="{$PMV_THEME}include/pdf_config.js"></script>

<script type="text/javascript">


var cleDstPage = "P";

var LIB_SHOW_INTEREST = "{'pdf_lib_show_interest'|translate}";
var LIB_HIDE_INTEREST = "{'pdf_lib_hide_interest'|translate}";
var LIB_SHOW_ALL = "{'pdf_lib_show_all'|translate}";
var LIB_HIDE_ALL = "{'pdf_lib_hide_all'|translate}";
var LIB_EDIT_TEXT = "{'pdf_lib_edit_text'|translate}";
var LIB_NEED_AT_LEAST_ONE_PAGE = "{'pdf_lib_need_at_least_one_page'|translate}";
var LIB_CAN_NOT_ADD_CHAPTER = "{'pdf_lib_can_not_add_chapter'|translate}";
var LIB_PDF_NAME_MANDATORY = "{'pdf_lib_pdf_name_mandatory'|translate}";

var tabSrc = new Array();
var tabDst = new Array();
var nbPageSelected = -1;
var nbPageDstKey = -1;

var tabSrcByKey = new Array();
var nbSrc = 0;
var nbDst = 0;

var langContinent = new Array;
var sepContinent = " ,";
var msgContinent = "Empty, eur, afr, asi, oce, ams, amn";

langContinent[""] = "Monde";
langContinent["eur"] = "{'eur'|translate}";
langContinent["afr"] = "{'afr'|translate}";
langContinent["asi"] = "{'asi'|translate}";
langContinent["oce"] = "{'oce'|translate}";
langContinent["ams"] = "{'ams'|translate}";
langContinent["amn"] = "{'amn'|translate}";

{foreach from=$choix_pdf item=raw name=boucle key=keyChapter}
	{if $raw.PAG=='true'}
{assign var=pageKey value=$keyChapter}
tabSrc[nbSrc++] = new ChoixChapter("{$keyChapter}", "{$keyChapter}", "{$raw.TIT|translate}", "false", "false", true, "{$raw.PAR1}");
	{else}
tabSrc[nbSrc++] = new ChoixChapter("{$pageKey}", "{$keyChapter}", "{$raw.TIT|translate}", "{$raw.ALL}", "{$raw.INT}", false, "{$raw.PAR1}");
	{/if}
tabSrcByKey["{$keyChapter}"] = tabSrc[nbSrc-1];
{/foreach}

{foreach from=$pdf->pdfParam item=raw key=keyChapter}
{if ($raw.0 != "0")}
if (tabSrcByKey["{$raw.0}"].isPage) nbPageSelected++; 
tabDst[nbDst++] = new ChoixChapter(cleDstPage+nbPageSelected,
		 "{$raw.0}", tabSrcByKey["{$raw.0}"].lib, 
		 "{$raw.1}",
		 "{$raw.2}", tabSrcByKey["{$raw.0}"].isPage,
		 "{$raw.3}");
{/if}
{/foreach}
nbPageDstKey = nbPageSelected;

//alert(tabDst[1].keyParent + " - " + tabDst[1].isPage);
//alert(tabDst[2].keyParent + " - " + tabDst[2].isPage);

</script>
<table class="resultats" width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class='align'><b>&nbsp;PDF Name :&nbsp;</b></td>
	<td class='align'><input type="text" name="form_name" value="{$pdf->pdfName}" size="80" maxlength="80"></td>
</tr>
<tr>
	<td class='align'><b>&nbsp;Public PDF :&nbsp;</b></td>
	<td class='align'><input type="radio" name="form_public_pdf" value="yes" {if $pdf->isPublic}checked{/if} />Yes 
	<input type="radio" name="form_public_pdf" value="no" {if ! $pdf->isPublic}checked{/if}/> No
	</td>
</tr>
</table>
<br>
<table border="0" width="100%" cellpaddin=0 cellspacing=5>
<TR>
	<TD align="center"><input title="Open all" type="button" value="{'pdf_lib_pdf_expand_all'|translate}" onclick="openAll(tabSrc, cleFldSrc)">&nbsp;&nbsp;&nbsp;<input title="Close all" type="button" value="{'pdf_lib_pdf_collapse_all'|translate}" onclick="closeAll(tabSrc, cleFldSrc)"></TD>
	<TD>&nbsp;</TD>
	<TD align="center"><!-- input title="Open all" type="button" value="{'pdf_lib_pdf_expand_all'|translate}" onclick="openAll(tabDst, cleFldDst)">&nbsp;&nbsp;&nbsp;<input title="Close all" type="button" value="{'pdf_lib_pdf_collapse_all'|translate}" onclick="closeAll(tabDst, cleFldDst)" --></TD>
	<TD>&nbsp;</TD>
</TR>
<TR>
	<TD valign="top" width="50%">
	<table class="resultats" width="100%" cellpadding="0" cellspacing="0">
	<tbody id="srcTabBody">
	</tbody>
	</table>
	</TD>
	
	<!-- space -->
	<TD>&nbsp;&nbsp;&nbsp;</TD>
	
	<TD valign="top" width="50%">
	<table class="resultats" width="100%">
	<tbody id="dstTabBody">
	</tbody>
	</table>
	</TD>
	
	<TD align="center">
	<input type="button" value=" Up " onClick="upLine ()"><br><br>
	<input type="button" value=" Down " onClick="downLine ()">
	</TD>
</TR>
<TR>
	<TD align="center"><input title="Open all" type="button" value="{'pdf_lib_pdf_expand_all'|translate}" onclick="openAll(tabSrc, cleFldSrc)">&nbsp;&nbsp;&nbsp;<input title="Close all" type="button" value="{'pdf_lib_pdf_collapse_all'|translate}" onclick="closeAll(tabSrc, cleFldSrc)"></TD>
	<TD>&nbsp;</TD>
	<TD align="center"><!-- input title="Open all" type="button" value="{'pdf_lib_pdf_expand_all'|translate}" onclick="openAll(tabDst, cleFldDst)">&nbsp;&nbsp;&nbsp;<input title="Close all" type="button" value="{'pdf_lib_pdf_collapse_all'|translate}" onclick="closeAll(tabDst, cleFldDst)" --></TD>
	<TD>&nbsp;</TD>
</TR>
</TABLE>

<script type="text/javascript">
writeTab ("srcTabBody", tabSrc, cleFldSrc);
writeTab ("dstTabBody", tabDst, cleFldDst);

closeAll(tabSrc, cleFldSrc);
//closeAll(tabDst, cleFldDst);
</script>
	<!-- textarea id="param_pdf_result" name="param_pdf_result" cols="120" rows="10"></textarea -->
	<input id="param_pdf_result" name="param_pdf_result" type="hidden" />
<br>
	<div class="boutonsAction">
	<input name="btsubmit" value="{'install_valider'|translate}" type="button" onclick="submitPdfConfig()"/>
	<input name="default" value="Default" type="button" onclick="if (confirm('Do you want to set default pdf ?')) location.href='./index.php?mod=admin_site_pdf_config&action={$action}&idPdf={$pdfId}&adminsite={$siteAdmin}&default=true';"/>
	<!-- input name="test" value="Test" type="button" onclick="writeResult()"/ -->
	{if $mod=='admin'}
	{$form_data.back.html}
	{/if}
	</div>
	</form> 
</div>
