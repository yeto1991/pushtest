<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ダミーTopページ</title>
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

<h1>このページはダミーです。</h1>

<b>■業種■</b><br/>
{section name=it loop=$app.main_industory_cnt}
	{if (0 == $app.main_industory_cnt[it].fair_cnt)}
・{$app.main_industory_cnt[it].discription_jp} (0)
	{else}
・<a href="{$config.url_pub}?action_fairList=true&type=i1&i_2={$app.main_industory_cnt[it].kbn_2}">{$app.main_industory_cnt[it].discription_jp} ({$app.main_industory_cnt[it].fair_cnt})</a>
	{/if}
{/section}
<br/>
<br/>
<b>■地域■</b><br/>
{section name=it loop=$app.region_cnt}
	{if (0 == $app.region_cnt[it].fair_cnt)}
・{$app.region_cnt[it].discription_jp} (0)
	{else}
・<a href="{$config.url_pub}?action_fairList=true&type=v1&v_2={$app.region_cnt[it].kbn_2}">{$app.region_cnt[it].discription_jp} ({$app.region_cnt[it].fair_cnt})</a>
	{/if}
{/section}
<br/>
<br/>
<b>■検索条件■</b><br/>
<form name="form_dummy_top" id="form_dummy_top" method="post" action="">
<input type="hidden" name="action_fairListSearch" id="action_fairListSearch" value="dummy" />
<input type="hidden" name="type" id="type" value="" />
<input type="hidden" name="detail" id="detail" value="1" />
<input type="hidden" name="i_2" id="i_2" value="" />
<input type="hidden" name="i_3" id="i_3" value="" />
<input type="hidden" name="v_2" id="v_2" value="" />
<input type="hidden" name="v_3" id="v_3" value="" />
<input type="hidden" name="v_4" id="v_4" value="" />
<input type="hidden" name="industory_selected" id="industory_selected" value="" />
<input type="hidden" name="venue_selected" id="venue_selected" value="" />
<table border="1">
	<tr>
		<th>会期</th>
		<td>
			<input type="radio" name="year" id="year_u" value="u" {if ('u' == $form.year || '' == $form.year)}checked{/if} />これから開催のもの<br />
			<input type="radio" name="year" id="year_a" value="a" {if ('a' == $form.year)}checked{/if} />過去のものを含む<br/>
			<input type="radio" name="year" id="year_e" value="e" {if ('e' == $form.year)}checked{/if} />期間を選択する<br/>
			&nbsp;&nbsp;&nbsp;
			<select name="date_from_yyyy" id="date_from_yyyy">
				<option value=""></option>
				{section name=it loop=$app.year_list}
				<option value="{$app.year_list[it]}" {if ($app.year_list[it] == $form.date_from_yyyy)}selected{/if}>{$app.year_list[it]}</option>
				{/section}
			</select>年
			<select name="date_from_mm" id="date_from_mm">
				<option value=""></option>
				<option value="01" {if ('01' == $form.date_from_mm)}selected{/if}>1</option>
				<option value="02" {if ('02' == $form.date_from_mm)}selected{/if}>2</option>
				<option value="03" {if ('03' == $form.date_from_mm)}selected{/if}>3</option>
				<option value="04" {if ('04' == $form.date_from_mm)}selected{/if}>4</option>
				<option value="05" {if ('05' == $form.date_from_mm)}selected{/if}>5</option>
				<option value="06" {if ('06' == $form.date_from_mm)}selected{/if}>6</option>
				<option value="07" {if ('07' == $form.date_from_mm)}selected{/if}>7</option>
				<option value="08" {if ('08' == $form.date_from_mm)}selected{/if}>8</option>
				<option value="09" {if ('09' == $form.date_from_mm)}selected{/if}>9</option>
				<option value="10" {if ('10' == $form.date_from_mm)}selected{/if}>10</option>
				<option value="11" {if ('11' == $form.date_from_mm)}selected{/if}>11</option>
				<option value="12" {if ('12' == $form.date_from_mm)}selected{/if}>12</option>
			</select>月～<br/>
			&nbsp;&nbsp;&nbsp;
			<select name="date_to_yyyy" id="date_to_yyyy">
				<option value=""></option>
				{section name=it loop=$app.year_list}
				<option value="{$app.year_list[it]}" {if ($app.year_list[it] == $form.date_to_yyyy)}selected{/if}>{$app.year_list[it]}</option>
				{/section}
			</select>年
			<select name="date_to_mm" id="date_to_mm">
				<option value=""></option>
				<option value="01" {if ('01' == $form.date_to_mm)}selected{/if}>1</option>
				<option value="02" {if ('02' == $form.date_to_mm)}selected{/if}>2</option>
				<option value="03" {if ('03' == $form.date_to_mm)}selected{/if}>3</option>
				<option value="04" {if ('04' == $form.date_to_mm)}selected{/if}>4</option>
				<option value="05" {if ('05' == $form.date_to_mm)}selected{/if}>5</option>
				<option value="06" {if ('06' == $form.date_to_mm)}selected{/if}>6</option>
				<option value="07" {if ('07' == $form.date_to_mm)}selected{/if}>7</option>
				<option value="08" {if ('08' == $form.date_to_mm)}selected{/if}>8</option>
				<option value="09" {if ('09' == $form.date_to_mm)}selected{/if}>9</option>
				<option value="10" {if ('10' == $form.date_to_mm)}selected{/if}>10</option>
				<option value="11" {if ('11' == $form.date_to_mm)}selected{/if}>11</option>
				<option value="12" {if ('12' == $form.date_to_mm)}selected{/if}>12</option>
			</select>月<br/>
			{if is_error('date_from_yyyy')}
			<span class="error-message">{message name="date_from_yyyy"}</span><br />
			{/if}
			{if is_error('date_from_mm')}
			<span class="error-message">{message name="date_from_mm"}</span><br />
			{/if}
			{if is_error('date_to_yyyy')}
			<span class="error-message">{message name="date_to_yyyy"}</span><br />
			{/if}
			{if is_error('date_to_mm')}
			<span class="error-message">{message name="date_to_mm"}</span><br />
			{/if}
		</td>
	</tr>
	<tr>
		<th>キーワード</th>
		<td><input type="text" name="keyword" id="keyword" value="{$form.keyword}" size="30" /></td>
	</tr>
</table>
<input type="submit" value="検索" />
</form>
<br/>
<b>■登録ページ■</b><br/>
・<a href="{$^config.url_pub}?action_user_login=true">ログインページ</a><br/>
<br/>
<b>■英語ページ■</b><br/>
・<a href="{$^config.url_pub}?action_enTop=true">TOPページ</a><br/>
・<a href="{$^config.url_pub}?action_user_enLogin=true">ログインページ</a><br/>

</body>
</html>
