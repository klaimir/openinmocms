<H1>Xml Api</H1>
<table id="centrer" border=0>
{foreach from=$XmlapiFunctionTab item=raw name=boucle key=keyChapter}
<tr>
<td><b>{$raw->fctApiName}</b></td>
</tr>
<tr>
<td>{$raw->fctComment}</td>
</tr>
<tr>
<td><i>Parameters</i></td>
</tr>
<tr>
<td>
<table border=1 cellpadding=5 cellspacing=0>
{foreach from=$raw->fctParameters item=rawParam}
<tr>
<td>{$rawParam->fctParamName}</td>
<td>{$rawParam->fctParamComment}</td>
</tr>
{/foreach}
</table>
</td>
</tr>
<tr>
<td>Url : {$PHPMV_URL}/{$url}&request=<b>{$raw->fctApiName}</b>{foreach from=$raw->fctParameters item=rawParam}&{$rawParam->fctParamName}=&lt;{$rawParam->fctParamName}&gt{/foreach}
</td>
</tr>
<tr>
<td>Test : <a target="_blank" href="{$PHPMV_URL}/{$url}&request={$raw->fctApiName}{foreach from=$raw->fctParameters item=rawParam}&{$rawParam->fctParamName}={$rawParam->fctParamDefaultValue}{/foreach}">Test</a>
</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
{/foreach}
</table>