<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.dynamicselect.js"></script>
<script type="text/javascript" src="js/jquery.dynamicselectforjson.js"></script>
<script type="text/javascript">
{literal}
<!--
	/**
	 * 初期表示。
	 */
	function init() {
		// 業種関連
		var main_industory = document.getElementById('main_industory_jp').options[document.getElementById('main_industory_jp').selectedIndex].value;
		if (null != main_industory) {
			dynamicpulldownlist('?action_json_getSubIndustory=true&kbn_2='+main_industory+'&use_language_flag=0','','#sub_industory_jp',document.getElementById('sub_industory').value);
		}
		main_industory = document.getElementById('main_industory_en').options[document.getElementById('main_industory_en').selectedIndex].value;
		if (null != main_industory) {
			dynamicpulldownlist('?action_json_getSubIndustory=true&kbn_2='+main_industory+'&use_language_flag=1','','#sub_industory_en',document.getElementById('sub_industory').value);
		}

		// 開催地関連
		var region = document.getElementById('region_jp').options[document.getElementById('region_jp').selectedIndex].value;
		if (null != region) {
			dynamicpulldownlist('?action_json_getCountry=true&kbn_2='+region+'&use_language_flag=0','','#country_jp',document.getElementById('country').value);
		}
		region = document.getElementById('region_en').options[document.getElementById('region_en').selectedIndex].value;
		if (null != region) {
			dynamicpulldownlist('?action_json_getCountry=true&kbn_2='+region+'&use_language_flag=1','','#country_en',document.getElementById('country').value);
		}
	}
	/**
	 * 業種関連。
	 */
	function set_sub_industory_jp() {
		var main_industory = document.getElementById('main_industory_jp').options[document.getElementById('main_industory_jp').selectedIndex].value;
		dynamicpulldownlist('?action_json_getSubIndustory=true&kbn_2='+main_industory+'&use_language_flag=0','','#sub_industory_jp',null);
	}
	function set_sub_industory_en() {
		var main_industory = document.getElementById('main_industory_en').options[document.getElementById('main_industory_en').selectedIndex].value;
		dynamicpulldownlist('?action_json_getSubIndustory=true&kbn_2='+main_industory+'&use_language_flag=1','','#sub_industory_en',null);
	}
	function save_sub_industory_jp() {
		document.getElementById('sub_industory').value = document.getElementById('sub_industory_jp').options[document.getElementById('sub_industory_jp').selectedIndex].value;
	}
	function save_sub_industory_en() {
		document.getElementById('sub_industory').value = document.getElementById('sub_industory_en').options[document.getElementById('sub_industory_en').selectedIndex].value;
	}
	/**
	 * 開催地関連。
	 */
	function set_country_jp() {
		var region = document.getElementById('region_jp').options[document.getElementById('region_jp').selectedIndex].value;
		dynamicpulldownlist('?action_json_getCountry=true&kbn_2='+region+'&use_language_flag=0','','#country_jp',null);
	}
	function set_country_en() {
		var region = document.getElementById('region_en').options[document.getElementById('region_en').selectedIndex].value;
		dynamicpulldownlist('?action_json_getCountry=true&kbn_2='+region+'&use_language_flag=1','','#country_en',null);
	}
	function save_country_jp() {
		document.getElementById('country').value = document.getElementById('country_jp').options[document.getElementById('country_jp').selectedIndex].value;
	}
	function save_country_en() {
		document.getElementById('country').value = document.getElementById('country_en').options[document.getElementById('country_en').selectedIndex].value;
	}
	function open_select_city_jp() {
		var region = document.getElementById('region_jp').options[document.getElementById('region_jp').selectedIndex].value;
		var country = document.getElementById('country_jp').options[document.getElementById('country_jp').selectedIndex].value;
		window.open("?action_admin_selectCity=1&kbn_2=" + region + "&kbn_3=" + country + "&use_language_flag=0", null);
	}
	function open_select_city_en() {
		var region = document.getElementById('region_en').options[document.getElementById('region_en').selectedIndex].value;
		var country = document.getElementById('country_en').options[document.getElementById('country_en').selectedIndex].value;
		window.open("?action_admin_selectCity=1&kbn_2=" + region + "&kbn_3=" + country + "&use_language_flag=1", null);
	}
	function delete_city() {
		document.getElementById('city_jp').value = "";
		document.getElementById('city_name_jp').value = "";
		document.getElementById('city_en').value = "";
		document.getElementById('city_name_en').value = "";
	}
// -->
{/literal}
</script>
<title>見本市ＤＢ 管理者用</title>
</head>
<body onload="init()">
	<table style="width: 100%;">
		<tr>
			<td valign="top" style="width: 200px;">{include file="admin/menu.tpl"}</td>
			<td valign="top">
				<div align="center">
					<font size="5"><b>見本市ＤＢ 管理者用</b></font>
				</div>
				<hr>

				{* エラー表示 *}
				{if count($errors)}
				<ul>
					{foreach from=$errors item=error}
					<li><font color="#ff0000">{$error}</font></li>
					{/foreach}
				</ul>
				{/if}

				<form name="form_admin_fairRegist" method="post" action="">
					<input type="hidden" name="action_admon_fairRegistDo" id="action_admon_fairRegistDo" value="dummy"> <font color="#CC3333">●</font>印は入力必須項目、<font color="#CC3333">○</font>は入力推奨項目です。<br> 言語選択で「日本語のみ」をつけた時は、原則 翻訳入力は必要ありません<br> （英語インターフェースでの検索対象となりません）
					<!-- 業種（小分類） -->
					<input type="hidden" name="sub_industory" id="sub_industory" value="{$form.sub_industory}" />
					<!-- 国・地域 -->
					<input type="hidden" name="country" id="country" value="{$form.country}" />

					<table border="1">

						<tr>
							<td nowrap>新規登録／コピー更新登録</td>
							<!-- 新規登録／コピー更新登録 -->
							<td nowrap>
								<input type="radio" name="copy" id="copy" value="0" checked />新規登録
								<input type="radio" name="copy" id="copy" value="1" />コピー編集登録
							</td>
						</tr>

						<tr>
							<td nowrap>Webページの表示／非表示 <font color="#CC3333">●</font></td>
							<!-- Ｗｅｂページの表示／非表示 -->
							<td nowrap>
								<input type="radio" name="web_display_type" id="web_display_type" value="1" {if ("1" == $form.web_display_type)}checked{/if} />表示する
								<input type="radio" name="web_display_type" id="web_display_type" value="0" {if ("0" == $form.web_display_type)}checked{/if} />表示しない
							</td>
						</tr>

						<tr>

							<td nowrap>承認フラグ <font color="#CC3333">●</font></td>
							<!-- 承認フラグ -->
							<!-- 否認コメント -->
							<td nowrap>
								<input type="radio" name="confirm_flag" id="confirm_flag" value="1" {if ("1" == $form.confirm_flag)}checked{/if} />承認
								<input type="radio" name="confirm_flag" id="confirm_flag" value="0" {if ("0" == $form.confirm_flag)}checked{/if} />承認待ち
								<input type="radio" name="confirm_flag" id="confirm_flag" value="2" {if ("2" == $form.confirm_flag)}checked{/if} />否認<br />
								否認コメント： <input type="text" name="negate_comment" id="negate_comment" value="{$form.negate_comment}" size="120" />
							</td>
						</tr>

						<tr>
							<td nowrap>メール送信フラグ <font color="#CC3333">●</font></td>
							<!-- メール送信フラグ -->
							<td nowrap>
								<input type="radio" name="mail_send_flag" id="mail_send_flag" value="0" {if ("0" == $form.mail_send_flag)}checked{/if} />送信しない
								<input type="radio" name="mail_send_flag" id="mail_send_flag" value="1" {if ("0" == $form.mail_send_flag)}checked{/if} />送信する
							</td>
						</tr>

						<tr>
							<td nowrap>ユーザ使用言語フラグ <font color="#CC3333">●</font></td>
							<!-- 予備フラグ３ -->
							<td nowrap>
								<input type="radio" name="use_language_flag" id="use_language_flag" value="0" {if ("0" == $form.use_language_flag)}checked{/if} />日本語
								<input type="radio" name="use_language_flag" id="use_language_flag" value="1" {if ("1" == $form.use_language_flag)}checked{/if} />英語
							</td>
						</tr>

						<tr>
							<td nowrap>ユーザID <font color="#CC3333">●</font></td>
							<!-- ユーザＩＤ -->
							<td nowrap><input type="text" name="user_id" id="user_id" value="{if (null == $form.user_id || 0 == count($form.user_id))}{$session.username}{else}{$form.user_id}{/if}" maxlength="28" size="28" />（半角英数）</td>
						</tr>

						<tr>
							<td nowrap>申請年月日 <font color="#CC3333">●</font></td>
							<!-- 申請年月日 -->
							<td nowrap>
								<input type="text" name="date_of_application_y" id="date_of_application_y" value="{if (null == $form.date_of_application_y || 0 == count($form.date_of_application_y))}{$app.year}{else}{$form.date_of_application_y}{/if}" maxlength="4" size="4" />年
								<input type="text" name="date_of_application_m" id="date_of_application_m" value="{if (null == $form.date_of_application_m || 0 == count($form.date_of_application_m))}{$app.month}{else}{$form.date_of_application_m}{/if}" maxlength="2" size="2" />月
								<input type="text" name="date_of_application_d" id="date_of_application_d" value="{if (null == $form.date_of_application_d || 0 == count($form.date_of_application_d))}{$app.day}{else}{$form.date_of_application_d}{/if}" maxlength="2" size="2" />日
							</td>
						</tr>

						<tr>
							<td nowrap>登録日(承認日) <font color="#CC3333">●</font></td>
							<!-- 登録日(承認日) -->
							<td nowrap>
								<input type="text" name="date_of_registration_y" id="date_of_registration_y" value="{if (null == $form.date_of_registration_y || 0 == count($form.date_of_registration_y))}{$app.year}{else}{$form.date_of_registration_y}{/if}" maxlength="4" size="4" />年
								<input type="text" name="date_of_registration_m" id="date_of_registration_m" value="{if (null == $form.date_of_registration_m || 0 == count($form.date_of_registration_m))}{$app.month}{else}{$form.date_of_registration_m}{/if}" maxlength="2" size="2" />月
								<input type="text" name="date_of_registration_d" id="date_of_registration_d" value="{if (null == $form.date_of_registration_d || 0 == count($form.date_of_registration_d))}{$app.day}{else}{$form.date_of_registration_d}{/if}" maxlength="2" size="2" />日
							</td>
						</tr>

						<tr>
							<td nowrap>言語選択情報 <font color="#CC3333">●</font></td>
							<!-- 言語選択情報 -->
							<td nowrap>
								<input type="radio" name="select_language_info" id="select_language_info" value="0" {if ("0" == $form.select_language_info)}checked{/if} />日本語
								<input type="radio" name="select_language_info" id="select_language_info" value="2" {if ("2" == $form.select_language_info)}checked{/if} />日本語・英語両方
								<input type="radio" name="select_language_info" id="select_language_info" value="1" {if ("1" == $form.select_language_info)}checked{/if} />英語
							</td>
						</tr>

						<tr>
							<td nowrap>見本市番号</td>
							<!-- 見本市番号 -->
							<td nowrap><input type="text" name="mihon_no" id="mihon_no" value="{$form.mihon_no}" maxlength="10" size="10" /></td>
						</tr>

						<tr>
							<td nowrap rowspan="2">見本市名 <font color="#CC3333">●</font></td>
							<!-- 見本市名(日) -->
							<!-- 見本市名(英) -->
							<td nowrap>日：<input type="text" name="fair_title_jp" id="fair_title_jp" value="{$form.fair_title_jp}" maxlength="255" size="120" /></td>
						</tr>
						<tr>
							<td nowrap>英：<input type="text" name="fair_title_en" id="fair_title_en" value="{$form.fair_title_en}" maxlength="255" size="120" /></td>
						</tr>
						<tr>
							<td nowrap>見本市略称</td>
							<!-- 見本市略称(英) -->
							<td nowrap>英：<input type="text" name="abbrev_title" id="abbrev_title" value="{$form.abbrev_title}" maxlength="100" size="100" /><br> <font size="-1">■日本語は文字化けが発生するため、入力しないでください。</font>

							</td>
						</tr>
						<tr>
							<td nowrap>見本市URL</td>
							<!-- 見本市ＵＲＬ -->
							<td nowrap><input type="text" name="fair_url" id="fair_url" value="{$form.fair_url}" maxlength="255" size="120" /></td>
						</tr>

						<tr>
							<td nowrap rowspan="2">キャッチフレーズ</td>
							<!-- キャッチフレーズ(日) -->
							<!-- キャッチフレーズ(英) -->
							<td nowrap>日：<br /> <textarea name="profile_jp" id="profile_jp" cols="100" rows="7">{$form.profile_jp}</textarea><br />
						</tr>
						<tr>
							<td nowrap>英：<font color="#CC3333">（翻訳）</font><br /> <textarea name="profile_en" id="profile_en" cols="100" rows="7">{$form.profile_en}</textarea><br />
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="2">ＰＲ・紹介文</td>
							<!-- ＰＲ・紹介文(日) -->
							<!-- ＰＲ・紹介文(英) -->
							<td nowrap>日：<br> <textarea name="detailed_infomation_jp" id="detailed_infomation_jp" cols="100" rows="7">{$form.detailed_infomation_jp}</textarea></td>
						</tr>
						<tr>
							<td nowrap>英：<br> <textarea name="detailed_infomation_en" id="detailed_infomation_en" cols="100" rows="7">{$form.detailed_infomation_en}</textarea></td>
						</tr>

						<tr>
							<td nowrap>会期 <font color="#CC3333">●</font></td>
							<!-- 開始年月 -->
							<!-- 開始日 -->
							<!-- 終了年月 -->
							<!-- 終了日 -->
							<td>
								<input type="text" name="date_from_yyyy" id="date_from_yyyy" value="{$form.date_from_yyyy}" maxlength="4" size="4" />年
								<input type="text" name="date_from_mm" id="date_from_mm" value="{$form.date_from_mm}" maxlength="2" size="2" />月
								<input type="text" name="date_from_dd" id="date_from_dd" value="{$form.date_from_dd}" maxlength="2" size="2" />日から
								<input type="text" name="date_to_yyyy" id="date_to_yyyy" value="{$form.date_to_yyyy}" maxlength="4" size="4" />年
								<input type="text" name="date_to_mm" id="date_to_mm" value="{$form.date_to_mm}" maxlength="2" size="2" />月
								<input type="text" name="date_to_dd" id="date_to_dd" value="{$form.date_to_dd}" maxlength="2" size="2" />日まで<br>
								<font size="-1">■例：2002年8月1日の場合には半角数字で、2002 08 01 と入力してください。</font>
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="3">開催頻度 <font color="#CC3333">●</font></td>
							<!-- 開催頻度(日) -->
							<!-- 開催頻度(英) -->
							<td bgcolor="#FFFFAA">この項目の選択はユーザ使用言語フラグで選択（日本語・英語）した方を修正して下さい。</td>
						</tr>
						<tr>
							<td nowrap>日：<br/>
							<table>
								{section name=it loop=$app.frequency}
								{if (0 == (($smarty.section.it.index) % 5))}
								<tr>
								{/if}
									<td><input type="radio" name="frequency_jp" id="frequency_jp" value="{$app.frequency[it].kbn_2}" {if ($form.frequency_jp == $app.frequency[it].kbn_2)}checked{/if} />{$app.frequency[it].discription_jp}</td>
								{if (0 == (($smarty.section.it.index + 1) % 5))}
								</tr>
								{/if}
								{/section}
							</table>
							</td>
						</tr>
						<tr>
							<td nowrap>英：<br/>
							<table>
								{section name=it loop=$app.frequency}
								{if (0 == (($smarty.section.it.index) % 5))}
								<tr>
								{/if}
									<td><input type="radio" name="frequency_en" id="frequency_en" value="{$app.frequency[it].kbn_2}"  {if ($form.frequency_en == $app.frequency[it].kbn_2)}checked{/if} />{$app.frequency[it].discription_en}</td>
								{if (0 == (($smarty.section.it.index + 1) % 5))}
								</tr>
								{/if}
								{/section}
							</table>
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="3">業種 <font color="#CC3333">●</font></td>
							<!-- 業種大分類(日) -->
							<td bgcolor="#FFFFAA">この項目の選択はユーザ使用言語フラグで選択（日本語・英語）した方を修正して下さい。</td>
						</tr>
						<tr>
							<td nowrap>日：
								<table>
									<tr>
										<td colspan="2"><font size="-1">1. 大分類 → 小分類の順に選択してください。</font></td>
									</tr>
									<tr>
										<td colspan="2">大分類<br/>
											<select name="main_industory_jp" id="main_industory_jp" style="width:200px;" onchange="set_sub_industory_jp()">
												<option value="">...</option>
											{section name=it loop=$app.main_industory}
												<option value="{$app.main_industory[it].kbn_2}" {if ($form.main_industory_jp == $app.main_industory[it].kbn_2)}selected{/if} />{$app.main_industory[it].discription_jp}</option>
											{/section}
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2">小分類<br/>
											<select name="sub_industory_jp" id="sub_industory_jp" style="width:200px;" onchange="save_sub_industory_jp()">
												<option value="">...</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2"><font size="-1">2.「登録」ボタンをクリックして下さい。</font></td>
									</tr>
									<tr>
										<td><select name="industory_list_jp" id="industory_list_jp" size="4"></select></td>
										<td><input type="button" name="ind_add" value="登録" onClick="" /><br /> <br /> <input type="button" name="ind_del" value="削除" onClick="" /></td>
									</tr>
								</table> <font size="-1">■ 業種は6つまで登録可能です。業種を追加したい場合には1、2の作業を繰り返して下さい。 </font>
							</td>
						</tr>
						<tr>
							<td nowrap>英： <!--  2002.10.24 add [ start ] infocom  -->
								<table>
									<tr>
										<td colspan="2"><font size="-1">1. 大分類 → 小分類の順に選択してください。</font></td>
									</tr>
									<tr>
										<td colspan="2">大分類<br/>
											<select name="main_industory_en" id="main_industory_en" style="width:200px;" onchange="set_sub_industory_en()">
												<option value="">...</option>
											{section name=it loop=$app.main_industory}
												<option value="{$app.main_industory[it].kbn_2}">{$app.main_industory[it].discription_en}</option>
											{/section}
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2">小分類<br/>
											<select name="sub_industory_en" id="sub_industory_en" style="width:200px;" onchange="save_sub_industory_en()">
												<option value="">...</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2"><font size="-1">2.「登録」ボタンをクリックして下さい。</font></td>
									</tr>
									<tr>
										<td><select name="industory_list_jp" id="industory_list_jp" size="4"></select></td>
										<td><input type="button" name="ind_add" value="登録" onClick="" /><br /> <br /> <input type="button" name="ind_del" value="削除" onClick="" /></td>
									</tr>
								</table> <font size="-1">■ 業種は6つまで登録可能です。業種を追加したい場合には1、2の作業を繰り返して下さい。 </font> <!--  2002.10.24 add [  end  ] infocom  -->
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="2">出品物 <font color="#CC3333">●</font></td>
							<!-- 出品物(日) -->
							<!-- 出品物(英) -->
							<td nowrap>日：<br/>
							<textarea name="exhibits_jp" id="exhibits_jp" cols="100" rows="7">{$form.exhibits_jp}</textarea>
							<br>
							</td>
						</tr>
						<tr>
							<td nowrap>英：<font color="#CC3333">（翻訳）</font><br>
							<textarea name="exhibits_en" id="exhibits_en" cols="100" rows="7">{$form.exhibits_en}</textarea>
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="3">開催地 <font color="#CC3333">●</font></td>
							<!-- 開催地域(日) -->
							<!-- 開催地域(英) -->
							<!-- 開催国(日) -->
							<!-- 開催国(英) -->
							<!-- 開催都市(日) -->
							<!-- 開催都市(英) -->
							<!-- その他の都市(日) -->
							<!-- その他の都市(英) -->
							<td bgcolor="#FFFFAA">この項目の選択はユーザ使用言語フラグで選択（日本語・英語）した方を修正して下さい。</td>
						</tr>
						<tr>
							<td nowrap>日：
								<table border="0">
									<tr>
										<td colspan="4"><font size="-1">1.地域 → 2.国 → 3.都市の順に選択してください。</font></td>
									</tr>
									<tr>
										<td>1.</td>
										<td>地域</td>
										<td>
										<select name="region_jp" id="region_jp" style="width:200px;" onchange="set_country_jp()">
											<option value="">...</option>
										{section name=it loop=$app.region}
											<option value="{$app.region[it].kbn_2}" {if ($form.region_jp == $app.region[it].kbn_2)}selected{/if}>{$app.region[it].discription_jp}</option>
										{/section}
										</select>
										</td>
										<td colspan="2"></td>
									</tr>
									<tr>
										<td>2.</td>
										<td>国・地域</td>
										<td>
										<select name="country_jp" id="country_jp" style="width:200px;" onchange="save_country_jp()">
											<option value="">...</option>
										</select>
										</td>
										<td colspan="2"></td>
									</tr>
									<tr>
										<td>3.</td>
										<td>都市</td>

										<td colspan="2">
											<a href="javascript:open_select_city_jp();">都市を選択</a>
											<input type="text" name="city_name_jp" id="city_name_jp" value="{$form.city_name_jp}" readonly/>
											<input type="hidden" name="city_jp" id="city_jp" value="{$form.city_jp}" />
											<input type="button" value="削除" onClick="delete_city()"></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><input type="checkbox" name="othercity_jp" value="その他" onFocus=""> その他</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td></td>
									</tr>
								</table> <font size="-1">■「都市を選択」をクリックして表示される一覧に、開催都市がない場合は「その他」にチェックをし、都市名を入力して下さい。</font>

							</td>
						</tr>
						<tr>
							<td nowrap>英：


								<table border="0">
									<tr>
										<td colspan="4"><font size="-1">1.地域 → 2.国 → 3.都市の順に選択してください。</font></td>
									</tr>

									<tr>
										<td>1.</td>
										<td>地域</td>
										<td>
										<select name="region_en" id="region_en" style="width:200px;" onchange="set_country_en()">
											<option value="">...</option>
										{section name=it loop=$app.region}
											<option value="{$app.region[it].kbn_2}" {if ($form.region_en == $app.region[it].kbn_2)}selected{/if}>{$app.region[it].discription_en}</option>
										{/section}
										</select>
										</td>
										<td colspan="2"></td>
									</tr>

									<tr>
										<td>2.</td>
										<td>国・地域</td>
										<td>
										<select name="country_en" id="country_en" style="width:200px;" onchange="save_country_en()">
											<option value="">...</option>
										</select>
										</td>
										<td colspan="2"></td>
									</tr>
									<tr>
										<td>3.</td>
										<td>都市</td>
										<td colspan="2"><a href="javascript:open_select_city_en();">都市を選択</a>
										<input type="text" name="city_name_en" id="city_name_en" value="{$form.city_name_en}" readonly/>
										<input type="hidden" name="city_en" id="city_en" value="{$form.city_en}" />
										<input type="button" value="削除" onClick=""></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><input type="checkbox" name="othercity_en" value="Other" onFocus=""> Others</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td><font color="#CC3333">（翻訳）</font></td>
									</tr>
								</table> <font size="-1">■「都市を選択」をクリックして表示される一覧に、開催都市がない場合は「その他」にチェックをし、都市名を入力して下さい。</font> <!--  2002.10.24 add [  end  ] infocom  -->
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="2">会場名 <font color="#CC3333">●</font></td>
							<!-- 会場名(日) -->
							<!-- 会場名(英) -->
							<td nowrap>日：<input type="text" name="venus_jp" id="venus_jp" value="{$form.venus_jp}" maxlength="255" size="120" /></td>
						</tr>
						<tr>
							<td nowrap>英：<input type="text" name="venus_en" id="venus_en" value="{$form.venus_en}" maxlength="255" size="120" /></td>
						</tr>

						<tr>
							<td nowrap>展示会で使用する面積（Ｎｅｔ） <font color="#CC3333">○</font></td>
							<!-- 会場の展示面積 -->
							<td nowrap><input type="text" name="gross_floor_area" id="gross_floor_area" value="{$form.gross_floor_area}" maxlength="10" /><br> <font size="-1">■半角数字で入力して下さい。","(カンマ)は使用しないで下さい。例：1000</font></td>
						</tr>

						<tr>
							<td nowrap rowspan="2">交通手段</td>
							<!-- 交通手段(日) -->
							<!-- 交通手段(英) -->
							<td nowrap>日：<input type="text" name="transportation_jp" id="transportation_jp" value="{$form.transportation_jp}" maxlength="255" size="120" /><br> <font size="-1">■例：成田空港からA12バスで30分</font>
							</td>
						</tr>
						<tr>
							<td nowrap>英：<input type="text" name="transportation_en" id="transportation_en" value="{$form.transportation_en}" maxlength="255" size="120" /></td>
						</tr>

						<tr>
							<td nowrap rowspan="3">入場資格 <font color="#CC3333">●</font></td>
							<!-- 入場資格(日) -->
							<!-- 入場資格(英) -->
							<td bgcolor="#FFFFAA">この項目の選択はユーザ使用言語フラグで選択（日本語・英語）した方を修正して下さい。</td>
						</tr>
						<tr>
							<td nowrap>日：<br/>
							{section name=it loop=$app.open_to}
							<input type="radio" name="open_to_jp" id="open_to_jp" value="{$app.open_to[it].kbn_2}" {if ($app.open_to[it].kbn_2 == $form.open_to_jp)}checked{/if} />{$app.open_to[it].discription_jp}
							{/section}
							</td>
						</tr>
						<tr>
							<td nowrap>英：<br/>
							{section name=it loop=$app.open_to}
							<input type="radio" name="open_to_en" id="open_to_en" value="{$app.open_to[it].kbn_2}" {if ($app.open_to[it].kbn_2 == $form.open_to_en)}checked{/if} />{$app.open_to[it].discription_en}
							{/section}
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="3">チケットの入手方法</td>
							<!-- チケットの入手方法(日) -->
							<!-- チケットの入手方法(英) -->
							<!-- その他のチケットの入手方法(日) -->
							<!-- その他のチケットの入手方法(英) -->
							<td bgcolor="#FFFFAA">この項目の選択はユーザ使用言語フラグで選択（日本語・英語）した方を修正して下さい。</td>
						</tr>
						<tr>
							<td nowrap>日：z<br/>
							<table>
							<tr>
							<td><input type="checkbox" name="admission_ticket_1_jp" id="admission_ticket_1_jp" value="1" {if ("1" == $form.admission_ticket_1_jp)}checked{/if} />登録の必要なし</td>
							<td><input type="checkbox" name="admission_ticket_2_jp" id="admission_ticket_2_jp" value="1" {if ("1" == $form.admission_ticket_2_jp)}checked{/if} />WEBからの事前登録</td>
							</tr>
							<tr>
							<td><input type="checkbox" name="admission_ticket_3_jp" id="admission_ticket_3_jp" value="1" {if ("1" == $form.admission_ticket_3_jp)}checked{/if} />主催者・日本の照会先へ問い合わせ</td>
							<td><input type="checkbox" name="admission_ticket_4_jp" id="admission_ticket_4_jp" value="1" {if ("1" == $form.admission_ticket_4_jp)}checked{/if} />当日会場で入手</td>
							</tr>
							<tr>
							<td colspan="2"><input type="checkbox" name="admission_ticket_5_jp" id="admission_ticket_5_jp" value="1" {if ("1" == $form.admission_ticket_5_jp)}checked{/if} />その他 <input type="text" name="other_admission_ticket_jp" id="other_admission_ticket_jp" value="{$form.other_admission_ticket_jp}" maxlenth="100" size="100" /></td>
							</table>
							</td>
						</tr>
						<tr>
							<td nowrap>英：<br/>
							<table>
							<tr>
							<td><input type="checkbox" name="admission_ticket_1_en" id="admission_ticket_1_en" value="1" {if ("1" == $form.admission_ticket_1_en)}checked{/if} />Free</td>
							<td><input type="checkbox" name="admission_ticket_2_en" id="admission_ticket_2_en" value="1" {if ("1" == $form.admission_ticket_2_en)}checked{/if} />Web Registration</td>
							</tr>
							<tr>
							<td><input type="checkbox" name="admission_ticket_3_en" id="admission_ticket_3_en" value="1" {if ("1" == $form.admission_ticket_3_en)}checked{/if} />Contact to the Organizer/Agency in Japan</td>
							<td><input type="checkbox" name="admission_ticket_4_en" id="admission_ticket_4_en" value="1" {if ("1" == $form.admission_ticket_4_en)}checked{/if} />Available at the Gate</td>
							</tr>
							<tr>
							<td colspan="2"><input type="checkbox" name="admission_ticket_5_en" id="admission_ticket_5_en" value="1" {if ("1" == $form.admission_ticket_5_en)}checked{/if} />Others <input type="text" name="other_admission_ticket_en" id="other_admission_ticket_en" value="{$form.other_admission_ticket_jp}" maxlenth="100" size="100" /></td>
							</table>
							</td>
						</tr>

						<tr>
							<td nowrap>過去の実績 <font color="#CC3333">○</font></td>
							<!-- 実績年 -->
							<!-- 総入場者数(人) -->
							<!-- 海外からの入場者数(人) -->
							<!-- 総出典者数(社) -->
							<!-- 海外からの出典者数(社) -->
							<!-- 展示面積(㎡) -->
							<!-- 予備域１ -->
							<td nowrap>
								<table border="0">
									<tr>

										<td>&nbsp;</td>
										<td colspan="2"><input type="text" name="app_dead_yyyy" id="app_dead_yyyy" value="{$form.app_dead_yyyy}" maxlength="4" size="10" /> 年実績（西暦４桁）</td>
										<td colspan="2">&nbsp;</td>
									</tr>
									<tr>
										<td>来場者数</td>
										<td><input type="text" name="total_number_of_visitor" id="total_number_of_visitor" value="{$form.total_number_of_visitor}" maxlength="10" size="10" /> 人</td>
										<td>（うち海外から</td>
										<td><input type="text" name="number_of_foreign_visitor" id="number_of_foreign_visitor" value="{$form.number_of_foreign_visitor}" maxlength="10" size="10" /> 人）</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td>出展者数</td>
										<td><input type="text" name="total_number_of_exhibitors"  id="total_number_of_exhibitors" value="{$form.total_number_of_exhibitors}" maxlength="10" size="10"> 社</td>
										<td>（うち海外から</td>
										<td><input type="text" name="number_of_foreign_exhibitors" id="number_of_foreign_exhibitors" value="{$form.number_of_foreign_exhibitors}" maxlength="10" size="10"> 社）</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td>展示面積</td>
										<td colspan="4"><input type="text" name="net_square_meters" id="net_square_meters" value="{$form.net_square_meters}" maxlength="10" size="20">㎡</td>
									</tr>
									<tr>
										<td>承認機関</td>
										<td colspan="4">英：<input type="text" name="spare_field1" id="spare_field1" value="{$form.spare_field1}" maxlength="255" size="120" /></td>
									</tr>
								</table> <font size="-1">■出展者数の多いデータが検索結果で上位に表示されます。</font>
							</td>
						</tr>
						<tr>
							<td nowrap>出展申込締切日</td>
							<!-- 出典申込締切日 -->
							<td><input type="text" name="app_dead_yyyy" id="app_dead_yyyy" value="{$form.app_dead_yyyy}" maxlength="4" size="4" />年<input type="text" name="app_dead_mm" id="app_dead_mm" value="{$form.app_dead_mm}" maxlength="2" size="2" />月<input type="text" name="app_dead_dd" id="app_dead_dd" value="{$form.app_dead_dd}" maxlength="2" size="2" />日<br>
							<font size="-1">■例：2002年8月1日の場合には半角数字で、2002 08 01 と入力してください。</font></td>
						</tr>

						<tr>
							<td nowrap>主催者・問合せ先 <font color="#CC3333">●</font></td>
							<!-- 問合わせ先・運営機関名(日) -->
							<!-- 問合わせ先・運営機関名(英) -->
							<!-- 問合わせ先・運営機関ＴＥＬ -->
							<!-- 問合わせ先・運営機関ＦＡＸ -->
							<!-- 問合わせ先・運営機関Ｅ－ＭＡＩＬ -->
							<td>
								<table border="0">
									<tr>
										<td nowrap>名称（日）</td>
										<td nowrap><input type="text" name="organizer_jp" id="organizer_jp" value="{$form.organizer_jp}" maxlength="255" size="120" /></td>
									</tr>
									<tr>
										<td nowrap>名称（英）</td>
										<td nowrap><input type="text" name="organizer_en" id="organizer_en" value="{$form.organizer_en}" maxlength="255" size="120" /><font color="#CC3333">（翻訳）</font></td>
									</tr>
									<tr>
										<td nowrap>住所</td>
										<td><input type="text" name="organizer_addr" id="organizer_addr" value="{$form.organizer_addr}" maxlength="225" size="120" /></td>
									</tr>
									<tr>
										<td nowrap>担当部課</td>
										<td><input type="text" name="organizer_div" id="organizer_div" value="{$form.organizer_div}" maxlength="225" size="120" /></td>
									</tr>
									<tr>
										<td nowrap>担当者</td>
										<td><input type="text" name="organizer_pers" id="organizer_pers" value="{$form.organizer_pers}" maxlength="100" size="50" /></td>
									</tr>
									<tr>
										<td nowrap>ＴＥＬ</td>
										<td><input type="text" name="organizer_tel" id="organizer_tel" value="{$form.organizer_tel}" maxlength="20" size="30" /> （半角数字）</td>
									</tr>
									<tr>
										<td nowrap>ＦＡＸ</td>
										<td><input type="text" name="organizer_fax" id="organizer_fax" value="{$form.organizer_fax}" maxlength="20" size="30" /> （半角数字）</td>
									</tr>
									<tr>
										<td nowrap>Ｅ－Ｍａｉｌ</td>
										<td nowrap><input type="text" name="organizer_email" id="organizer_email" value="{$form.organizer_email}" maxlength="255" size="110" /> （半角英数）</td>
									</tr>
								</table> <font size="-1"> ■TEL・FAX はハイフン区切り、国番号から入力してください。 <br> 例：東京の場合 +81-3-1234-5678 <br> ■TEL、FAX、E-mailのどれか一つは必ず入力願います。
							</font>
							</td>
						</tr>

						<tr>
							<td nowrap>日本国内の照会先</td>
							<!-- 在日代理店名(日) -->
							<!-- 在日代理店名(英) -->
							<!-- 在日代理店ＴＥＬ -->
							<!-- 在日代理店ＦＡＸ -->
							<!-- 在日代理店Ｅ－ＭＡＩＬ -->
							<td>
								<table border="0">
									<tr>
										<td nowrap>名称（日）</td>
										<td nowrap><input type="text" name="agency_in_japan_jp" id="agency_in_japan_jp" value="{$form.agency_in_japan_jp}" maxlength="255" size="120" /></td>
									</tr>
									<tr>
										<td nowrap>名称（英）</td>
										<td nowrap><input type="text" name="agency_in_japan_en" id="agency_in_japan_en" value="{$form.agency_in_japan_en}" maxlength="255" size="120" /><font color="#CC3333">（翻訳）</font></td>
									</tr>
									<tr>
										<td nowrap>住所</td>
										<td><input type="text" name="agency_in_japan_addr" id="agency_in_japan_addr" value="{$form.agency_in_japan_addr}" maxlength="255" size="120" /></td>
									</tr>
									<tr>
										<td nowrap>担当部課</td>
										<td><input type="text" name="agency_in_japan_div" id="agency_in_japan_div" value="{$form.agency_in_japan_div}" maxlength="255" size="120" /></td>
									</tr>
									<tr>
										<td nowrap>担当者</td>
										<td><input type="text" name="agency_in_japan_pers" id="agency_in_japan_pers" value="{$form.agency_in_japan_pers}" maxlength="100" size="50" /></td>
									</tr>
									<tr>
										<td nowrap>ＴＥＬ</td>
										<td><input type="text" name="agency_in_japan_tel" id="agency_in_japan_tel" value="{$form.agency_in_japan_tel}" maxlength="20" size="30" /> （半角数字）</td>
									</tr>
									<tr>
										<td nowrap>ＦＡＸ</td>
										<td><input type="text" name="agency_in_japan_fax" id="agency_in_japan_fax" value="{$form.agency_in_japan_fax}" maxlength="20" size="30" /> （半角数字）</td>
									</tr>
									<tr>
										<td nowrap>Ｅ－Ｍａｉｌ</td>
										<td nowrap><input type="text" name="agency_in_japan_email" id="agency_in_japan_email" value="{$form.agency_in_japan_email}" maxlength="255" size="110" /> （半角英数）</td>
									</tr>
								</table> <font size="-1"> ■海外で開催される見本市で、日本国内に問合せ先がある場合のみ入力してください。 <br> ■TEL・FAX はハイフン区切り、国番号から入力してください。 <br> 例：東京の場合 +81-3-1234-5678
							</font>
							</td>
						</tr>

						<tr>
							<td nowrap>見本市レポート／URL</td>
							<!-- 駐在員レポート／リンク -->
							<td nowrap><input type="text" name="report_link" id="report_link" value="{$form.report_link}" maxlength="255" size="120" /></td>
						</tr>

						<tr>
							<td nowrap>世界の展示会場／URL</td>
							<!-- 展示会場／リンク -->
							<td nowrap><input type="text" name="venue_link" id="venue_link" value="{$form.venue_link}" maxlength="255" size="120" /></td>
						</tr>

						<tr>
							<td nowrap>展示会に係わる画像(3点)</td>
							<!-- 展示会に係わる画像(3点) -->
							<td><font size="-1">1.「参照」ボタンをクリックして登録する画像ファイルを選択してください。最大3つまで登録できます。（JPEG, GIF, TIFF 形式のみ）</font><br/><br/>
							<input type="file" name="photos_1" id="photos_1" size=50 onBlur=""><br/>
							<input type="file" name="photos_2" id="photos_2" size=50 onBlur=""><br/>
							<input type="file" name="photos_3" id="photos_3" size=50 onBlur=""><br/>
							<font size="-1">2. 登録された画像ファイル名が以下に表示されます。表示されない時は画面上をクリックしてください。</font><br/>
							<input type="button" value="上へ" onClick="">&nbsp;<input type="button" value="下へ" onClick="">&nbsp;<input type="button" value="削除" onClick=""><br>
							<select name="filelist2" size=5><option></select>
							<input type="hidden" name="values2" value=""> <br/>
							<font size="-1">登録されているイメージの順番は上から1番目です。<br>
							詳細表示するときには左から1番目を表示します。</font>
							</td>
						</tr>

						<tr>
							<td nowrap>システム管理者備考欄</td>
							<!-- システム管理者備考欄 -->
							<td nowrap><input type="text" name="note_for_system_manager" id="note_for_system_manager" value="{$form.note_for_system_manager}" maxlength="400" size="120" /></td>
						</tr>

						<tr>
							<td nowrap>データ管理者備考欄:</td>
							<!-- データ管理者備考欄 -->
							<td nowrap><input type="text" name="note_for_data_manager" id="note_for_data_manager" value="{$form.note_for_data_manager}" maxlength="400" size="120" /></td>
						</tr>
					</table>
					<hr>

					<input type="button" value="登録" onclick="" />
				</form>
			</td>
		</tr>
	</table>
</body>
</html>
