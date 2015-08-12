<!-- lang selection -->
<div id="choixlangue">
<form action="{$url_lang}" method="post" name="form_lang" id="form_lang">
<fieldset>
	<legend> &nbsp; {'generique_langue'|translate}  &nbsp; </legend>
		<!-- select id="lang" name="lang" onchange="this.form.submit()" dir="{$dir}" -->
		<select id="lang" name="lang" onchange="pmvUrlOnChangeLang (this)" dir="{$dir}">
		   {html_options 
		   		options=$langs_available 	
		   		selected=$lang_selected
		   	}
		</select>
		<input type="text" id="langTmp" onfocus="blur()" style="display:none;width:130px" />
</fieldset>
</form>
</div>