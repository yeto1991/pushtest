<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Dummy Top Page</title>
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

<h1>This page is dummy.</h1>

<table>
<tr valign="top">
<td>
<b>■Area■</b><br/>
<ul class="icon_arrow" id="venue">
</ul>
</td>
<td>
<b>■Industry■</b><br/>
<ul class="icon_arrow" id="industory">
</ul>
</td>
<td>
<b>■Search condition■</b><br/>
<form name="form_en_dummy_top" id="form_en_dummy_top" method="post" action="">
<input type="hidden" name="action_enFairListSearch" id="action_enFairListSearch" value="dummy" />
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
		<th>Date</th>
		<td>
			<input type="radio" name="year" id="year_u" value="u" {if ('u' == $form.year || '' == $form.year)}checked{/if} />Upcoming Trade Fairs View All<br />
			<input type="radio" name="year" id="year_a" value="a" {if ('a' == $form.year)}checked{/if} />Including Past Trade Fairs View All<br/>
			<input type="radio" name="year" id="year_e" value="e" {if ('e' == $form.year)}checked{/if} />Select Date<br/>
			&nbsp;&nbsp;&nbsp;
			<select name="date_from_yyyy" id="date_from_yyyy">
				<option value=""></option>
				{section name=it loop=$app.year_list}
				<option value="{$app.year_list[it]}" {if ($app.year_list[it] == $form.date_from_yyyy)}selected{/if}>{$app.year_list[it]}</option>
				{/section}
			</select>/
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
			</select>～<br />
			&nbsp;&nbsp;&nbsp;
			<select name="date_to_yyyy" id="date_to_yyyy">
				<option value=""></option>
				{section name=it loop=$app.year_list}
				<option value="{$app.year_list[it]}" {if ($app.year_list[it] == $form.date_to_yyyy)}selected{/if}>{$app.year_list[it]}</option>
				{/section}
			</select>/
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
			</select><br/>
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
		<th>Keywords</th>
		<td><input type="text" name="keyword" id="keyword" value="{$form.keyword}" size="30" /></td>
	</tr>
</table>
<input type="submit" value="Search" />
</form>
</td>
</tr>
</table>

<br/>
<b>■Registration Page■</b><br/>
・<a href="{$config.url}?action_user_enLogin=true">Login page</a><br/>
<br/>
<b>■Japanese page■</b><br/>
・<a href="{$config.url_pub}?action_top=true">Top page</a><br/>
・<a href="{$config.url}?action_user_login=true">Login page</a><br/>
<br/>


<b>■Recently Added■</b><br/>
<ul class="icon_arrow" id="new_entry">
</ul>
<br/>

<b>■Monthly Ranking■</b><br/>
<table>
<tr valign="top">
<td>
<b>November 2011 (Japan)</b><br/>
<ul class="icon_arrow" id="ranking1">
</ul>
</td>
<td>
<b>Novemver 2011 (World)</b><br/>
<ul class="icon_arrow" id="ranking4">
</ul>
</td>
</tr>
<tr valign="top">
<td>
<b>October 2011 (Javapn)</b><br/>
<ul class="icon_arrow" id="ranking2">
</ul>
</td>
<td>
<b>October 2011 (World)</b><br/>
<ul class="icon_arrow" id="ranking5">
</ul>
</td>
</tr>
<tr valign="top">
<td>
<b>September 2011 (Japan)</b><br/>
<ul class="icon_arrow" id="ranking3">
</ul>
</td>
<td>
<b>September 2011 (World)</b><br/>
<ul class="icon_arrow" id="ranking6">
</ul>
</td>
</tr>
</table>

</body>

<script type="text/javascript" src="{$config.css_js_base_pub}js/jquery.js"></script>
<script type="text/javascript">
{literal}
$(function(){
	/**
	 * JSONデータをサーバーから取得し、指定したDOMにHTML加工してから挿入する関数
	 *
	 * @parameter url: jsonリソースを得られるURL
	 * @parameter jQueryTargetObj:HTMLにしたJSONをinnerHTMLに入れられるDOM
	 * @parameter convertFunc:JSONのデータ構造に対して、HTML変換を実装する関数
	 * @return : void
	 */
	function insertHTMLContentFromUserJSON(url, jQueryTargetObj, convertFunc){
		//ajax
		$.ajax({
			"url":url,
			"dataType":"json",
			"success":function(data){
				var content_data = convertFunc(data);
				jQueryTargetObj.html(content_data);
			}
		});
	}

	/**
	 * 開催地表示。
	 *
	 * @parameter data: JSONデータ
	 * @return : JSONデータを加工したHTML文字列
	 */
	var region_ConvertJSONtoHTML = function(data){
		//variables
		var content_data ='';
		var content_length = data.length;
		var temp_loop_ref = null;
		//core logic
		for(var i=0; i<content_length; ++i){
			temp_loop_ref = data[i];
			content_data += '<li><a href="' + temp_loop_ref["url"] + '">' + temp_loop_ref["region"] + '（' + temp_loop_ref["count"] + '）</a></li>';
		}
		return content_data;
	};

	/**
	 * 業種（大分類）表示。
	 *
	 * @parameter data: JSONデータ
	 * @return : JSONデータを加工したHTML文字列
	 */
	var industory_ConvertJSONtoHTML = function(data){
		//variables
		var content_data ='';
		var content_length = data.length;
		var temp_loop_ref = null;
		//core logic
		for(var i=0; i<content_length; ++i){
			temp_loop_ref = data[i];
			content_data += '<li><a href="' + temp_loop_ref["url"] + '">' + temp_loop_ref["industory"] + '（' + temp_loop_ref["count"] + '）</a></li>';
		}
		return content_data;
	};

	/**
	 * 新着表示。
	 *
	 * @parameter data: JSONデータ
	 * @return : JSONデータを加工したHTML文字列
	 */
	var new_entry_ConvertJSONtoHTML = function(data){
		//variables
		var content_data ='';
		var content_length = data.length;
		var temp_loop_ref = null;
		//core logic
		for(var i=0; i<content_length; ++i){
			temp_loop_ref = data[i];
			content_data += '<li><a href="' + temp_loop_ref["url"] + '">' + temp_loop_ref["name"] + '</a><br/>' + temp_loop_ref["start"] + '～' + temp_loop_ref["end"] + '<br/>' + temp_loop_ref["country"] + '/' + temp_loop_ref["city"] + '</li>';
		}
		return content_data;
	};

	/**
	 * ランキング表示。
	 *
	 * @parameter data: JSONデータ
	 * @return : JSONデータを加工したHTML文字列
	 */
	var ranking_ConvertJSONtoHTML = function(data){
		//variables
		var content_data ='';
		var content_length = data.length;
		var temp_loop_ref = null;
		//core logic
		for(var i=0; i<content_length; ++i){
			temp_loop_ref = data[i];
			content_data += '<li><a href="' + temp_loop_ref["url"] + '">' + temp_loop_ref["name"] + '</a><br/>' + temp_loop_ref["start"] + '～' + temp_loop_ref["end"] + '<br/>' + temp_loop_ref["venue"] + '</li>';
		}
		return content_data;
	};

	insertHTMLContentFromUserJSON( "jsonfile/region_en.json", $('#venue'), region_ConvertJSONtoHTML);
	insertHTMLContentFromUserJSON( "jsonfile/industry_en.json", $('#industory'), industory_ConvertJSONtoHTML);
	insertHTMLContentFromUserJSON( "jsonfile/new-mihonichi_en.json", $('#new_entry'), new_entry_ConvertJSONtoHTML);
	insertHTMLContentFromUserJSON( "jsonfile/ranking1_en.json", $('#ranking1'), ranking_ConvertJSONtoHTML);
	insertHTMLContentFromUserJSON( "jsonfile/ranking2_en.json", $('#ranking2'), ranking_ConvertJSONtoHTML);
	insertHTMLContentFromUserJSON( "jsonfile/ranking3_en.json", $('#ranking3'), ranking_ConvertJSONtoHTML);
	insertHTMLContentFromUserJSON( "jsonfile/ranking4_en.json", $('#ranking4'), ranking_ConvertJSONtoHTML);
	insertHTMLContentFromUserJSON( "jsonfile/ranking5_en.json", $('#ranking5'), ranking_ConvertJSONtoHTML);
	insertHTMLContentFromUserJSON( "jsonfile/ranking6_en.json", $('#ranking6'), ranking_ConvertJSONtoHTML);

});
{/literal}
</script>

</html>
