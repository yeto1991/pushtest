<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>

{* エラー表示 *}
{if count($errors)}
<ul>
	{foreach from=$errors item=error}
	<li><font color="#ff0000">{$error}</font></li>
	{/foreach}
</ul>
{/if}

<b>■Industry■</b><br/>
{section name=it loop=$app.main_industory_cnt}
	{if (0 == $app.main_industory_cnt[it].fair_cnt)}
・{$app.main_industory_cnt[it].discription_en} (0)
	{else}
・<a href="?action_enFairList=true&type=i1&i_2={$app.main_industory_cnt[it].kbn_2}">{$app.main_industory_cnt[it].discription_en} ({$app.main_industory_cnt[it].fair_cnt})</a>
	{/if}
{/section}
<br/>
<br/>
<b>■Area■</b><br/>
{section name=it loop=$app.region_cnt}
	{if (0 == $app.region_cnt[it].fair_cnt)}
・{$app.region_cnt[it].discription_en} (0)
	{else}
・<a href="?action_enFairList=true&type=v1&v_2={$app.region_cnt[it].kbn_2}">{$app.region_cnt[it].discription_en} ({$app.region_cnt[it].fair_cnt})</a>
	{/if}
{/section}

</body>
</html>
