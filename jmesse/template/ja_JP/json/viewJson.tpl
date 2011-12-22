<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
{if 'menu'==$app.mode}
<ul>
<li>新着見本市情報</li>
	<ul>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=new-mihonichi_jp.json">日本語</a></li>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=new-mihonichi_en.json">英語</a></li>
	</ul>
<li>月刊ランキング情報</li>
	<ul>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=ranking1_jp.json">先月のランキング(日本語/国内)</a></li>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=ranking2_jp.json">2ヵ月前のランキング(日本語/国内)</a></li>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=ranking3_jp.json">3ヵ月前のランキング(日本語/国内)</a></li>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=ranking4_jp.json">先月のランキング(日本語/海外)</a></li>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=ranking5_jp.json">2ヵ月前のランキング(日本語/海外)</a></li>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=ranking6_jp.json">3ヵ月前のランキング(日本語/海外)</a></li>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=ranking1_en.json">先月のランキング(英語/国内)</a></li>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=ranking2_en.json">2ヵ月前のランキング(英語/国内)</a></li>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=ranking3_en.json">3ヵ月前のランキング(英語/国内)</a></li>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=ranking4_en.json">先月のランキング(英語/海外)</a></li>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=ranking5_en.json">2ヵ月前のランキング(英語/海外)</a></li>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=ranking6_en.json">3ヵ月前のランキング(英語/海外)</a></li>
	</ul>
<li>地域毎件数情報</li>
	<ul>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=region_jp.json">日本語</a></li>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=region_en.json">英語</a></li>
	</ul>
<li>業種（大分類）毎件数情報</li>
	<ul>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=industry_jp.json">日本語</a></li>
	<li><a href="{config.url_pub}?action_json_viewJson=true&f=industry_en.json">英語</a></li>
	</ul>
</ul>
{else}
{section name="it" loop=$app.list}
[{$smarty.section.it.index}]<br/>
<table border="1">
	{section name="it2" loop=$app.list[it]}
	<tr>
		<td>{$app.list[it][it2].col}</td>
		<td>{$app.list[it][it2].value}</td>
	</tr>
	{/section}
</table>
<br/>
{/section}
{/if}
</body>
</html>
