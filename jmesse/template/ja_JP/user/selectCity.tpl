<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--テスト用-->
<base href="http://dev.jetro.go.jp" />
<!--/テスト用-->
<title>都市選択 - 世界の見本市・展示会(J-messe) -ジェトロ</title>
<script type="text/javascript">
{literal}
<!--
	function set_city() {
		for (i = 0; i < document.getElementsByName('city').length; i++) {
			if ('0' == document.getElementById('use_language_flag').value) {
				window.opener.document.getElementById('city_jp').value = '';
				window.opener.document.getElementById('city_name_jp').value = '';
			} else if ('1' == document.getElementById('use_language_flag').value) {
				window.opener.document.getElementById('city_en').value = '';
				window.opener.document.getElementById('city_name_en').value = '';
			} else {
				window.opener.document.getElementById('city').value = '';
				window.opener.document.getElementById('city_name').value = '';
			}
			if (document.getElementsByName('city')[i].checked) {
				city = document.getElementsByName('city')[i].value.split(':');
				if ('0' == document.getElementById('use_language_flag').value) {
					window.opener.document.getElementById('city_jp').value = city[0];
					window.opener.document.getElementById('city_name_jp').value = city[1];
				} else if ('0' == document.getElementById('use_language_flag').value) {
					window.opener.document.getElementById('city_en').value = city[0];
					window.opener.document.getElementById('city_name_en').value = city[1];
				} else {
					window.opener.document.getElementById('city').value = city[0];
					window.opener.document.getElementById('city_name').value = city[1];
				}
				break;
			}
		}
		window.close();
	}
// -->
{/literal}
</script>
</head>

<body>
	<form name="form_selectCity" id="form_selectCity" method="post" action="">
		<input type="hidden" name="use_language_flag" id="use_language_flag" value="{$app.use_language_flag}" />
		<input type="button" value="OK" onclick="set_city()" />
		<input type="button" value="Close" onclick="window.close();" />
		<hr />
		<table border="1">
			{if "0" == $app.use_language_flag}
			{section name=it loop=$app.city}
			<tr>
				<td><input type="radio" name="city" id="city" value="{$app.city[it].kbn_4}:{$app.city[it].discription_jp}" /></td>
				<td align="left">{$app.city[it].discription_jp}</td>
			</tr>
			{/section}
			{elseif "1" == $app.use_language_flag}
			{section name=it loop=$app.city}
			<tr>
				<td><input type="radio" name="city" id="city" value="{$app.city[it].kbn_4}:{$app.city[it].discription_en}" /></td>
				<td align="left">{$app.city[it].discription_en}</td>
			</tr>
			{/section}
			{else}
			{section name=it loop=$app.city}
			<tr>
				<td><input type="radio" name="city" id="city" value="{$app.city[it].kbn_4}:{$app.city[it].discription_jp}" /></td>
				<td align="left">{$app.city[it].discription_jp}</td>
			</tr>
			{/section}
			{/if}
		</table>
		<hr />
		<input type="button" value="OK" onclick="set_city()" />
		<input type="button" value="Close" onclick="window.close();" />
	</form>
</body>
</html>
