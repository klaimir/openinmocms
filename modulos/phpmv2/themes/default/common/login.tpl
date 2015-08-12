{include file="common/header.tpl" showLogin="false"}
{literal}
<script type="text/javascript">
function focusit() {
	document.getElementById('log').focus();
}
window.onload = focusit;
</script>
{/literal}
<div id="login">
<a href="http://www.phpmyvisites.us"><img src="{$PMV_THEME}images/logo-phpmyvisites.gif" alt="login" title="login" /></a>
<div class="both"></div>
{if $error_login==1}
	<h2>{'login_error'|translate}</h2>
{elseif $error_login==2}
	<h2>{'login_error_nopermission'|translate}</h2>
{/if}
{include file=admin/form_header.tpl}
<form {$form_data.attributes}>
<p>{'login_protected'|translate:$a_link_phpmv}</p>
<p><label>{'login_login'|translate|ucfirst}</label></p>
<p><input type="text" name="form_login" id="log" value="" size="20" tabindex="1" /></p>
<p><label>{'login_password'|translate|ucfirst}</label></p>
<p><input type="password" name="form_password" id="pwd" value="" size="20" tabindex="2" /></p>
<p class="submit">
{$form_data.hidden}
<input type="submit" name="submit" id="submit" value="Login &raquo;" tabindex="4" />
</p>
</form>
</div>
{include file="common/footer.tpl"}
