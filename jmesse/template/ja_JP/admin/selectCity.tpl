<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
{literal}
<script type="text/javascript">
<!--
	function set_city() {
		for (i = 0; i < document.getElementsByName('city').length; i++) {
			if (document.getElementsByName('city')[i].checked) {
				city = document.getElementsByName('city')[i].value.split(':');
				window.opener.document.getElementById('city_jp').value = city[0];
				window.opener.document.getElementById('city_name_jp').value = city[1];
				break;
			}
		}
		window.close();
	}
// -->
</script>
{/literal}
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
	<form name="form_selectCity" id="form_selectCity" method="post" action="">
		<input type="button" value="決定" onclick="set_city()" />
		<input type="button" value="閉じる" onclick="window.close();" />
		<hr />
		<table border="1">
			{if "0" == $app.use_language_flag}
			{section name=it loop=$app.city}
			<tr>
				<td><input type="radio" name="city" id="city" value="{$app.city[it].kbn_4}:{$app.city[it].discription_jp}" /></td>
				<td>{$app.city[it].discription_jp}</td>
			</tr>
			{/section}
			{else}
			{section name=it loop=$app.city}
			<tr>
				<td><input type="radio" name="city" id="city" value="{$app.city[it].kbn_4}:{$app.city[it].discription_en}" /></td>
				<td>{$app.city[it].discription_en}</td>
			</tr>
			{/section}
			{/if}
		</table>
		<hr />
		<input type="button" value="決定" onclick="set_city()" />
		<input type="button" value="閉じる" onclick="window.close();" />
	</form>
</body>
</html>
