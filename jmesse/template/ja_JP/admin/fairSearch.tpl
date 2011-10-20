<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
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
	var main_industory = document.getElementById('main_industory').options[document.getElementById('main_industory').selectedIndex].value;
	if (null != main_industory) {
		dynamicpulldownlist('?action_json_getSubIndustory=true&kbn_2='+main_industory+'&use_language_flag=0','','#sub_industory',document.getElementById('tmp_sub_industory').value);
	}

	}
	/**
	 * 業種関連。
	 */
	function set_sub_industory() {
		var main_industory = document.getElementById('main_industory').options[document.getElementById('main_industory').selectedIndex].value;
		dynamicpulldownlist('?action_json_getSubIndustory=true&search=1&kbn_2='+main_industory+'&use_language_flag=0','','#sub_industory',null);
	}
	function save_sub_industory() {
		document.getElementById('tmp_sub_industory').value = document.getElementById('sub_industory').options[document.getElementById('sub_industory').selectedIndex].value;
	}

	/**
	 * 開催地関連。
	 */
	function set_country() {
		var region = document.getElementById('region').options[document.getElementById('region').selectedIndex].value;
		dynamicpulldownlist('?action_json_getCountry=true&search=1&kbn_2='+region+'&use_language_flag=0','','#country',null);
	}
	function save_country() {
		document.getElementById('tmp_country').value = document.getElementById('country').options[document.getElementById('country').selectedIndex].value;
		document.getElementById('city_name').value = '';
		document.getElementById('city').value = '';
	}
	function open_select_city(url) {
		var region = document.getElementById('region').options[document.getElementById('region').selectedIndex].value;
		var country = document.getElementById('country').options[document.getElementById('country').selectedIndex].value;
		if ('' == region || '001' == region ||'' == country || '001' == country) {
			window.alert('地域と国・地域の両方を選択して下さい');
			return;
		}
		window.open("?action_admin_selectCity=1&kbn_2=" + region + "&kbn_3=" + country + "&use_language_flag=2", 'select_city', 'width=400, height=300, menubar=no, toolbar=no, location=no, status=no, scrollbars=yes');
	}



	// -->
{/literal}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body onload="init()">
	<form name="form_fairSearch" id="form_fairSearch" method="post" action="">
		<input type="hidden" name="action_admin_fairList" id="action_admin_fairList" value="dummy" />
		<input type="hidden" name="type" id="type" value="a" />
		<input type="hidden" name="tmp_sub_industory" id="tmp_sub_industory" value="{$form.tmp_sub_industory}" />
		<input type="hidden" name="tmp_country" id="tmp_country" value="{$form.tmp_country}" />
		<input type="hidden" name="city" id="city" value="{$form.city}" />
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

					<div align="center">検索画面</div>
					<input type="submit" value="検索実行" />
					<input type="reset" value="リセット" />

					<hr/>
					<dl>
						<!-- 全文検索 -->
						<dt>キーワード
						<dd><input type="text" name="phrases" id="phrases" value="{$form.phrases}" size="40" />
						<dd><input type="radio" name="phrase_connection" id="phrase_connection" value="a" {if ('or' != $form.phrase_connection)}checked{/if} />両方を含む（AND）
						<dd><input type="radio" name="phrase_connection" id="phrase_connection" value="o" {if ('or' == $form.phrase_connection)}checked{/if}>どちらかを含む（OR）
					</dl>
					<hr>

					項目検索
					<table border="1">
						<tr>
							<td nowrap>項目間の関連</td>
							<td nowrap>
								<input type="radio" name="connection" id="connection" value="a" {if ('or' != $form.connection)}checked{/if} />AND
								<input type="radio" name="connection" id="connection" value="o" {if ('or' == $form.connection)}checked{/if} />OR
							</td>
						</tr>
						<tr>
							<td nowrap>項目内の関連</td>
							<td nowrap>
								<input type="radio" name="relation" id="relation" value="a" {if ('and' == $form.relation)}checked{/if} />AND
								<input type="radio" name="relation" id="relation" value="o" {if ('and' != $form.relation)}checked{/if} />OR
							</td>
						</tr>

						<tr>
							<td nowrap>Webページの表示／非表示</td>
							<!-- Ｗｅｂページの表示／非表示 -->
							<td nowrap>
								<input type="checkbox" name="web_display_type[]" id="web_display_type[]" value="1" {if ('1' == $form.web_display_type)}checked{/if} />表示する
								<input type="checkbox" name="web_display_type[]" id="web_display_type[]" value="0" {if ('0' == $form.web_display_type)}checked{/if} />表示しない
							</td>
						</tr>

						<tr>
							<td nowrap>承認フラグ</td>
							<!-- 承認フラグ -->
							<!-- 否認コメント -->
							<td nowrap>
								<input type="checkbox" name="confirm_flag[]" id="confirm_flag[]" value="1" {if ('1' == $form.confirm_flag)}checked{/if} />承認
								<input type="checkbox" name="confirm_flag[]" id="confirm_flag[]" value="0" {if ('0' == $form.confirm_flag)}checked{/if} />承認待ち
								<input type="checkbox" name="confirm_flag[]" id="confirm_flag[]" value="2" {if ('2' == $form.confirm_flag)}checked{/if} />否認<br/>
								否認コメント：<input type="text" name="negate_comment" id="negate_comment" value="{$form.negate_comment}" size="50" />
								<select name="negate_comment_cond" id="negate_comment_cond">
									<option value="1" {if ('1' == $form.negate_comment_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.negate_comment_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.negate_comment_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.negate_comment_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.negate_comment_cond || '' == $form.negate_comment_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.negate_comment_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>

						<tr>
							<td nowrap>メール送信フラグ</td>
							<!-- メール送信フラグ -->
							<td nowrap>
								<input type="checkbox" name="mail_send_flag" id="mail_send_flag" value="1" {if ('1' == $form.mail_send_flag)}checked{/if} />送信しない
								<input type="checkbox" name="mail_send_flag" id="mail_send_flag" value="0" {if ('0' == $form.mail_send_flag)}checked{/if} />送信する
							</td>
						</tr>

						<tr>
							<td nowrap>ユーザ使用言語フラグ</td>
							<!-- ユーザ使用言語フラグ -->
							<td nowrap>
								<input type="checkbox" name="use_language_flag" id="use_language_flag" value="0" {if ('0' == $form.use_language_flag)}checked{/if} />日本語
								<input type="checkbox" name="use_language_flag" id="use_language_flag" value="1" {if ('1' == $form.use_language_flag)}checked{/if} />英語
							</td>
						</tr>

						<tr>
							<td nowrap>Eメール</td>
							<!-- Eメール -->
							<td nowrap>
								<input type="text" name="email" id="email" value="{$form.email}" size="50" />
								<select name="email_cond" id="email_cond">
									<option value="1" {if ('1' == $form.email_cond)}selected{/if}>一致</option>
									<option value="2" {if ('1' == $form.email_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('1' == $form.email_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('1' == $form.email_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('1' == $form.email_cond || '' == $form.email_cond)}selected{/if}>含む</option>
									<option value="6" {if ('1' == $form.email_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>

						<tr>
							<td nowrap>申請年月日</td>
							<!-- 申請年月日 -->
							<td nowrap>
								<input type="text" name="date_of_application_y_from" id="date_of_application_y_from" value="{$form.date_of_application_y_from}" maxlength="4" size="4" />年
								<input type="text" name="date_of_application_m_from" id="date_of_application_m_from" value="{$form.date_of_application_m_from}" maxlength="2" size="2" />月
								<input type="text" name="date_of_application_d_from" id="date_of_application_d_from" value="{$form.date_of_application_d_from}" maxlength="2" size="2" />日から&nbsp;
								<input type="text" name="date_of_application_y_to" id="date_of_application_y_to" value="{$form.date_of_application_y_to}" maxlength="4" size="4" />年
								<input type="text" name="date_of_application_m_to" id="date_of_application_m_to" value="{$form.date_of_application_m_to}" maxlength="2" size="2" />月
								<input type="text" name="date_of_application_d_to" id="date_of_application_d_to" value="{$form.date_of_application_d_to}" maxlength="2" size="2" />日まで
							</td>
						</tr>

						<tr>
							<td nowrap>登録日(承認日)</td>
							<!-- 登録日(承認日) -->
							<td nowrap>
								<input type="text" name="date_of_registration_y_from" id="date_of_registration_y_from" value="{$form.date_of_registration_y_from}" maxlength="4" size="4" />年
								<input type="text" name="date_of_registration_m_from" id="date_of_registration_m_from" value="{$form.date_of_registration_m_from}" maxlength="2" size="2" />月
								<input type="text" name="date_of_registration_d_from" id="date_of_registration_d_from" value="{$form.date_of_registration_d_from}" maxlength="2" size="2" />日から&nbsp;
								<input type="text" name="date_of_registration_y_to" id="date_of_registration_y_to" value="{$form.date_of_registration_y_to}" maxlength="4" size="4" />年
								<input type="text" name="date_of_registration_m_to" id="date_of_registration_m_to" value="{$form.date_of_registration_m_to}" maxlength="2" size="2" />月
								<input type="text" name="date_of_registration_d_to" id="date_of_registration_d_to" value="{$form.date_of_registration_d_to}" maxlength="2" size="2" />日まで
							</td>
						</tr>

						<tr>
							<td nowrap>Web表示言語</td>
							<!-- 言語選択情報 -->
							<td nowrap>
								<input type="checkbox" name="select_language_info" id="select_language_info" value="0" {if ('0' == $form.select_language_info)}checked{/if} />日本語
								<input type="checkbox" name="select_language_info" id="select_language_info" value="2" {if ('2' == $form.select_language_info)}checked{/if} />日本語・英語両方
								<input type="checkbox" name="select_language_info" id="select_language_info" value="1" {if ('1' == $form.select_language_info)}checked{/if} />英語
							</td>
						</tr>

						<tr>
							<td nowrap>見本市番号</td>
							<!-- 見本市番号 -->
							<td nowrap>
								<input type="text" name="mihon_no_from" id="mihon_no" value="{$form.mihon_no_from}" size=20 />～
								<input type="text" name="mihon_no_to" id="mihon_no" value="{$form.mihon_no_to}" size=20 />
								<select name="mihon_no_cond" id="mihon_no_cond">
									<option value="7" {if ('7' == $form.mihon_no_cond || '' == $form.mihon_no_cond)}selected{/if}>範囲</option>
									<option value="8" {if ('8' == $form.mihon_no_cond)}selected{/if}>範囲外</option>
									<option value="1" {if ('1' == $form.mihon_no_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.mihon_no_cond)}selected{/if}>不一致</option>
								</select>
							</td>
						</tr>
						<tr>
							<td nowrap rowspan="2">見本市名</td>
							<!-- 見本市名(日) -->
							<!-- 見本市名(英) -->
							<td nowrap>日：
								<input type="text" name="fair_title_jp" id="fair_title_jp" value="{$form.fair_title_jp}" size="50" />
								<select name="fair_title_jp_cond" id="fair_title_jp_cond">
									<option value="1" {if ('1' == $form.fair_title_jp)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.fair_title_jp)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.fair_title_jp)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.fair_title_jp)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.fair_title_jp || '' == $form.fair_title_jp)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.fair_title_jp)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>
						<tr>
							<td nowrap>英：
								<input type="text" name="fair_title_en" id="fair_title_en" value="{$form.fair_title_en}" size="50" />
								<select name="fair_title_en_cond" id="fair_title_en_cond">
									<option value="1" {if ('1' == $form.fair_title_en_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.fair_title_en_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.fair_title_en_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.fair_title_en_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.fair_title_en_cond || '' == $form.fair_title_en_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.fair_title_en_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>
						<tr>
							<td nowrap>見本市略称</td>
							<!-- 見本市略称(英) -->
							<td nowrap>
								<input type="abbrev_title" name="abbrev_title" id="abbrev_title" value="{$form.abbrev_title}" size="50" />
								<select name="abbrev_title_cond" id="abbrev_title_cond">
									<option value="1" {if ('1' == $form.abbrev_title_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.abbrev_title_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.abbrev_title_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.abbrev_title_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.abbrev_title_cond || '' == $form.abbrev_title_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.abbrev_title_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>
						<tr>
							<td nowrap>見本市URL</td>
							<!-- 見本市ＵＲＬ -->
							<td nowrap>
								<input type="text" name="fair_url" id="fair_url" value="{$form.fair_url}" size="50" />
								<select name="fair_url_cond" id="fair_url_cond">
									<option value="1" {if ('1' == $form.fair_url_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.fair_url_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.fair_url_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.fair_url_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.fair_url_cond || '' == $form.fair_url_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.fair_url_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="2">キャッチフレーズ</td>
							<!-- キャッチフレーズ(日) -->
							<!-- キャッチフレーズ(英) -->
							<td nowrap>日：
								<input type="text" name="profile_jp" id="profile_jp" value="{$form.profile_jp}" size="50" />
								<select name="profile_jp_cond" id="profile_jp_cond">
									<option value="1" {if ('1' == $form.profile_jp_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.profile_jp_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.profile_jp_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.profile_jp_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.profile_jp_cond || '' == $form.profile_jp_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.profile_jp_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>
						<tr>
							<td nowrap>英：
								<input type="text" name="profile_en" id="profile_en" value="{$form.profile_en}" size="50" />
								<select name="profile_en_cond" id="profile_en_cond">
									<option value="1" {if ('1' == $form.profile_en_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.profile_en_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.profile_en_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.profile_en_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.profile_en_cond || '' == $form.profile_en_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.profile_en_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>
						<tr>
							<td nowrap rowspan="2">ＰＲ・紹介文</td>
							<!-- ＰＲ・紹介文(日) -->
							<!-- ＰＲ・紹介文(英) -->
							<td nowrap>日：
								<input type="text" name="detailed_information_jp" id="detailed_information_jp" value="{$form.detailed_information_jp}" size="50" />
								<select name="detailed_information_jp_cond" id="detailed_information_jp_cond">
									<option value="1" {if ('1' == $form.detailed_information_jp_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.detailed_information_jp_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.detailed_information_jp_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.detailed_information_jp_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.detailed_information_jp_cond || '' == $form.detailed_information_jp_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.detailed_information_jp_cond)}selected{/if}>含まず</option>
									{*<option value="9" {if ('9' == $form.detailed_information_jp_cond)}selected{/if}>一致(全)</option>
									<option value="10" {if ('10' == $form.detailed_information_jp_cond)}selected{/if}>前一致(全)</option>
									<option value="11" {if ('11' == $form.detailed_information_jp_cond)}selected{/if}>含む(全)</option>*}
								</select>
							</td>
						</tr>
						<tr>
							<td nowrap>英：
								<input type="text" name="detailed_information_en" id="detailed_information_en" value="{$form.detailed_information_en}" size="50" />
								<select name="detailed_information_en_cond" id="detailed_information_en_cond">
									<option value="1" {if ('1' == $form.detailed_information_en_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.detailed_information_en_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.detailed_information_en_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.detailed_information_en_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.detailed_information_en_cond || '' == $form.detailed_information_en_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.detailed_information_en_cond)}selected{/if}>含まず</option>
									{*<option value="9" {if ('9' == $form.detailed_information_en_cond)}selected{/if}>一致(全)</option>
									<option value="10" {if ('10' == $form.detailed_information_en_cond)}selected{/if}>前一致(全)</option>
									<option value="11" {if ('11' == $form.detailed_information_en_cond)}selected{/if}>含む(全)</option>*}
								</select>
							</td>
						</tr>

						<tr>
							<td nowrap>会期</td>
							<!-- 開始年月 -->
							<!-- 開始日 -->
							<!-- 終了年月 -->
							<!-- 終了日 -->
							<td nowrap>
								<input type="text" name="date_from_yyyy" id="date_from_yyyy" value="{$form.date_from_yyyy}" maxlength="4" size="4" />年
								<input type="text" name="date_from_mm" id="date_from_mm" value="{$form.date_from_mm}" maxlength="2" size="2" />月
								<input type="text" name="date_from_dd" id="date_from_dd" value="{$form.date_from_dd}" maxlength="2" size="2" />日から&nbsp;
								<input type="text" name="date_to_yyyy" id="date_to_yyyy" value="{$form.date_to_yyyy}" maxlength="4" size="4" />年
								<input type="text" name="date_to_mm" id="date_to_mm" value="{$form.date_to_mm}" maxlength="2" size="2" />月
								<input type="text" name="date_to_dd" id="date_to_dd" value="{$form.date_to_dd}" maxlength="2" size="2" />日まで
							</td>
						</tr>

						<tr>
							<td nowrap>開催頻度</td>
							<!-- 開催頻度(日) -->
							<!-- 開催頻度(英) -->
							<td nowrap>
							<table>
								{section name=it loop=$app.frequency}
								{if (0 == (($smarty.section.it.index) % 5))}
								<tr>
								{/if}
									<td><input type="checkbox" name="frequency[]" id="frequency[]" value="{$app.frequency[it].kbn_2}" {if ($form.frequency == $app.frequency[it].kbn_2)}checked{/if} />{$app.frequency[it].discription_jp}</td>
								{if (0 == (($smarty.section.it.index + 1) % 5))}
								</tr>
								{/if}
								{/section}
							</table>
							</td>
						</tr>

						<tr>
							<td nowrap>業種</td>
							<!-- 業種大分類(日) -->
							<td nowrap>
								1.大分類
								<select name="main_industory" id="main_industory" style="width:200px;" onchange="set_sub_industory()">
									<option value="" {if ('' == $form.main_industory)}selected{/if}>すべて</option>
									{section name=it loop=$app.main_industory}
									<option value="{$app.main_industory[it].kbn_2}" {if ($form.main_industory_jp == $app.main_industory[it].kbn_2)}selected{/if} />{$app.main_industory[it].discription_jp}</option>
									{/section}
								</select>
								<br>
								2.小分類
								<select name="sub_industory" id="sub_industory" style="width:200px;" onchange="save_sub_industory()">
									<option value="" {if ('' == $form.sub_industory)}selected{/if}>すべて</option>
								</select>
								<br>
								<font size="-1">■ 1.大分類→2.小分類 の順に選択。</font>
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="2">出品物</td>
							<!-- 出品物(日) -->
							<!-- 出品物(英) -->
							<td nowrap>日：
								<input type="text" name="exhibits_jp" id="exhibits_jp" value="{$form.exhibits_jp}" size="50" />
								<select name="exhibits_jp_cond" id="exhibits_jp_cond">
									<option value="1" {if ('1' == $form.exhibits_jp_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.exhibits_jp_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.exhibits_jp_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.exhibits_jp_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.exhibits_jp_cond || '' == $form.exhibits_jp_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.exhibits_jp_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>
						<tr>
							<td nowrap>英：
								<input type="text" name="exhibits_en" id="exhibits_en" value="{$form.exhibits_en}" size="50" />
								<select name="exhibits_en_cond" id="exhibits_en">
									<option value="1" {if ('1' == $form.exhibits_en_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.exhibits_en_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.exhibits_en_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.exhibits_en_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.exhibits_en_cond || '' == $form.exhibits_en_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.exhibits_en_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>

						<tr>
							<td nowrap>開催地</td>
							<!-- 開催地域(日) -->
							<!-- 開催地域(英) -->
							<!-- 開催国(日) -->
							<!-- 開催国(英) -->
							<!-- 開催都市(日) -->
							<!-- 開催都市(英) -->
							<!-- その他の都市(日) -->
							<!-- その他の都市(英) -->
							<td nowrap>
								<table>
									<tr>
										<td>1.地域</td>
										<td>
											<select name="region" id="region" style="width:200px;" onchange="set_country()">
												{section name=it loop=$app.region}
												<option value="{$app.region[it].kbn_2}" {if ($form.region == $app.region[it].kbn_2)}selected{/if}>{$app.region[it].discription_jp}</option>
												{/section}
											</select>
										</td>
									</tr>
									<tr>
										<td>2.国・地域</td>
										<td>
											<select name="country" id="country" style="width:200px;" onchange="save_country()">
												{section name=it loop=$app.country}
												<option value="{$app.country[it].kbn_3}" {if ($form.country == $app.country[it].kbn_3)}selected{/if}>{$app.country[it].discription_jp}</option>
												{/section}
											</select>
										</td>
									</tr>
									<tr>
										<td>3.<a href="javascript:open_select_city('{$config.url}')">都市を選択</a></td>
										<td>
											<input type="text" name="city_name" id="city_name" size="35" value="{$form.city_name}" readonly />
										</td>
									</tr>
									<tr>
										<td rowspan="2">その他</td>
										<td>日：
											<input type="text" name="other_city_jp" id="other_city_jp" value="{$form.other_city_jp}" size="50" />
											<select name="other_city_jp_cond" id="other_city_jp_cond">
												<option value="1" {if ('1' == $form.other_city_jp_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.other_city_jp_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.other_city_jp_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.other_city_jp_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.other_city_jp_cond || '' == $form.other_city_jp_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.other_city_jp_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>英：
											<input type="text" name="other_city_en" id="other_city_en" value="{$form.other_city_en}" size="50" />
											<select name="other_city_en_cond" id="other_city_en_cond">
												<option value="1" {if ('1' == $form.other_city_en_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.other_city_en_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.other_city_en_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.other_city_en_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.other_city_en_cond || '' == $form.other_city_en_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.other_city_en_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
								</table> <font size="-1">■ 1.地域→2.国→3.都市 の順に選択。</font>
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="2">会場名</td>
							<!-- 会場名(日) -->
							<!-- 会場名(英) -->
							<td nowrap>日：
								<input type="text" name="venue_jp" id="venue_jp" value="{$form.venue_jp}" size="50" />
								<select name="venue_jp_cond" id="venue_jp_cond">
									<option value="1" {if ('1' == $form.venue_jp_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.venue_jp_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.venue_jp_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.venue_jp_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.venue_jp_cond || '' == $form.venue_jp_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.venue_jp_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>
						<tr>
							<td nowrap>英：
								<input type="text" name="venue_en" id="venue_en" value="{$form.venue_en}" size="50" />
								<select name="venue_en_cond" id="venue_en_cond">
									<option value="1" {if ('1' == $form.venue_en_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.venue_en_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.venue_en_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.venue_en_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.venue_en_cond || '' == $form.venue_en_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.venue_en_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>

						<tr>
							<td nowrap>同展示場で使用する面積（Ｎｅｔ）</td>
							<!-- 会場の展示面積 -->
							<td nowrap>
								<input type="text" name="gross_floor_area_from" id="gross_floor_area_from" value="{$form.gross_floor_area_from}" size=20>～<input type="text" name="gross_floor_area_to" id="gross_floor_area_to" value="{$form.gross_floor_area_to}" size=20>
								<select name="gross_floor_area_cond" id ="gross_floor_area_cond">
									<option value="7" {if ('7' == $form.gross_floor_area_cond || '' == $form.gross_floor_area_cond)}selected{/if}>範囲</option>
									<option value="8" {if ('8' == $form.gross_floor_area_cond)}selected{/if}>範囲外</option>
									<option value="1" {if ('1' == $form.gross_floor_area_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.gross_floor_area_cond)}selected{/if}>不一致</option>
								</select>
							</td>
						</tr>

						<tr>
							<td nowrap rowspan="2">交通手段</td>
							<!-- 交通手段(日) -->
							<!-- 交通手段(英) -->
							<td nowrap>日：
								<input type="text" name="transportation_jp" id="transportation_jp" value="{$form.transportation_jp}" size="50" />
								<select name="transportation_jp_cond" id="transportation_jp_cond">
									<option value="1" {if ('1' == $form.transportation_jp_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.transportation_jp_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.transportation_jp_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.transportation_jp_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.transportation_jp_cond || '' == $form.transportation_jp_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.transportation_jp_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>
						<tr>
							<td nowrap>英：
								<input type="text" name="transportation_en" id="transportation_en" value="{$form.transportation_en}" size="50" />
								<select name="transportation_en_cond" id="transportation_en_cond">
									<option value="1" {if ('1' == $form.transportation_en_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.transportation_en_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.transportation_en_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.transportation_en_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.transportation_en_cond || '' == $form.transportation_en_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.transportation_en_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>

						<tr>
							<td nowrap>入場資格</td>
							<!-- 入場資格(日) -->
							<!-- 入場資格(英) -->
							<td nowrap>
								{section name=it loop=$app.open_to}
								<input type="checkbox" name="open_to" id="open_to" value="{$app.open_to[it].kbn_2}" {if ($app.open_to[it].kbn_2 == $form.open_to)}checked{/if} />{$app.open_to[it].discription_jp}
								{/section}
							</td>
						</tr>

						<tr>
							<td nowrap>チケットの入手方法</td>
							<!-- チケットの入手方法(日) -->
							<!-- チケットの入手方法(英) -->
							<!-- その他のチケットの入手方法(日) -->
							<!-- その他のチケットの入手方法(英) -->
							<td nowrap>

								<table>
									<tr>
										<td><input type="checkbox" name="admission_ticket_1" id="admission_ticket_1" value="1" {if ("1" == $form.admission_ticket_1)}checked{/if} />登録の必要なし</td>
										<td><input type="checkbox" name="admission_ticket_2" id="admission_ticket_2" value="1" {if ("1" == $form.admission_ticket_2)}checked{/if} />WEBからの事前登録</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="admission_ticket_3" id="admission_ticket_3" value="1" {if ("1" == $form.admission_ticket_3)}checked{/if} />主催者・日本の照会先へ問い合わせ</td>
										<td><input type="checkbox" name="admission_ticket_4" id="admission_ticket_4" value="1" {if ("1" == $form.admission_ticket_4)}checked{/if} />当日会場で入手</td>
									</tr>
								</table>
								<table>
									<tr>
										<td rowspan="2"><input type="checkbox" name="admission_ticket_5" id="admission_ticket_5" value="1" {if ("1" == $form.admission_ticket_5)}checked{/if} /></td>
										<td>その他
											<input type="text" name="other_admission_ticket_jp" id="other_admission_ticket_jp" value="{$form.other_admission_ticket_jp}" size="50" />
											<select name="other_admission_ticket_jp_cond" id="other_admission_ticket_jp"/>
												<option value="1" {if ('1' == $form.other_admission_ticket_jp_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.other_admission_ticket_jp_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.other_admission_ticket_jp_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.other_admission_ticket_jp_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.other_admission_ticket_jp_cond || '' == $form.other_admission_ticket_jp_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.other_admission_ticket_jp_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Others
											<input type="text" name="other_admission_ticket_en" id="other_admission_ticket_en" value="{$form.other_admission_ticket_en}" size="50" />
											<select name="other_admission_ticket_en_cond" id="other_admission_ticket_en_cond"/>
												<option value="1" {if ('1' == $form.other_admission_ticket_en_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.other_admission_ticket_en_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.other_admission_ticket_en_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.other_admission_ticket_en_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.other_admission_ticket_en_cond || '' == $form.other_admission_ticket_en_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.other_admission_ticket_en_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
								</table>
							</td>
						</tr>

						<tr>
							<td nowrap>過去の実績</td>
							<!-- 実績年 -->
							<!-- 総入場者数(人) -->
							<!-- 海外からの入場者数(人) -->
							<!-- 総出典者数(社) -->
							<!-- 海外からの出典者数(社) -->
							<!-- 展示面積(㎡) -->
							<td nowrap>
								<table border="0">
									<tr>
										<td>年実績（西暦４桁）</td>
										<td>
											<input type="text" name="year_of_the_trade_fair" id="year_of_the_trade_fair" value="{$form.year_of_the_trade_fair}" size="50" />
											<select name="year_of_the_trade_fair_cond" id="year_of_the_trade_fair_cond">
												<option value="1" {if ('1' == $form.year_of_the_trade_fair_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.year_of_the_trade_fair_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.year_of_the_trade_fair_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.year_of_the_trade_fair_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.year_of_the_trade_fair_cond || '' == $form.year_of_the_trade_fair_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.year_of_the_trade_fair_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>入場者数</td>
										<td>
											<input type="text" name="total_number_of_visitor_from" id="total_number_of_visitor_from" value="{$form.total_number_of_visitor_from}" size="20" />～<input type="text" name="total_number_of_visitor_to" id="total_number_of_visitor_to" value="{$form.total_number_of_visitor_to}" size="20" />
											<select name="total_number_of_visitor_cond" id="total_number_of_visitor_cond">
												<option value="7" {if ('7' == $form.total_number_of_visitor_cond || '' == $form.total_number_of_visitor_cond)}selected{/if}>範囲</option>
												<option value="8" {if ('8' == $form.total_number_of_visitor_cond)}selected{/if}>範囲外</option>
												<option value="1" {if ('1' == $form.total_number_of_visitor_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.total_number_of_visitor_cond)}selected{/if}>不一致</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>（うち海外から</td>
										<td>
											<input type="text" name="number_of_foreign_visitor_from" id="number_of_foreign_visitor_form" value="{$form.number_of_foreign_visitor_from}" size="20" />～<input type="text" name="number_of_foreign_visitor_to" id="number_of_foreign_visitor_to" value="{$form.number_of_foreign_visitor_to}" size="20" />
											<select name="number_of_foreign_visitor_cond" id="number_of_foreign_visitor_cond">
												<option value="7" {if ('7' == $form.number_of_foreign_visitor_cond || '' == $form.number_of_foreign_visitor_cond)}selected{/if}>範囲</option>
												<option value="8" {if ('8' == $form.number_of_foreign_visitor_cond)}selected{/if}>範囲外</option>
												<option value="1" {if ('1' == $form.number_of_foreign_visitor_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.number_of_foreign_visitor_cond)}selected{/if}>不一致</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>出展社数</td>
										<td>
											<input type="text" name="total_number_of_exhibitors_from" id="total_number_of_exhibitors_from" value="{$form.total_number_of_exhibitors_from}" size=20>～<input type="text" name="total_number_of_exhibitors_to" id="total_number_of_exhibitors_to" value="{$form.total_number_of_exhibitors_to}" size="20" />
											<select name="total_number_of_exhibitors_cond" id="total_number_of_exhibitors_cond">
												<option value="7" {if ('7' == $form.total_number_of_exhibitors_cond || '' == $form.total_number_of_exhibitors_cond)}selected{/if}>範囲</option>
												<option value="8" {if ('8' == $form.total_number_of_exhibitors_cond)}selected{/if}>範囲外</option>
												<option value="1" {if ('1' == $form.total_number_of_exhibitors_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.total_number_of_exhibitors_cond)}selected{/if}>不一致</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>（うち海外から</td>
										<td>
											<input type="text" name="number_of_foreign_exhibitors_from" id="number_of_foreign_exhibitors_from" value="{$form.number_of_foreign_exhibitors_from}" size=20>～<input type="text" name="number_of_foreign_exhibitors_to" id="number_of_foreign_exhibitors_to" value="{$form.number_of_foreign_exhibitors_to}" size=20>
											<select name="number_of_foreign_exhibitors_cond" id="number_of_foreign_exhibitors_cond">
												<option value="7" {if ('7' == $form.number_of_foreign_exhibitors_cond || '' == $form.number_of_foreign_exhibitors_cond)}selected{/if}>範囲</option>
												<option value="8" {if ('8' == $form.number_of_foreign_exhibitors_cond)}selected{/if}>範囲外</option>
												<option value="1" {if ('1' == $form.number_of_foreign_exhibitors_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.number_of_foreign_exhibitors_cond)}selected{/if}>不一致</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>展示面積</td>
										<td>
											<input type="text" name="net_square_meters" id="net_square_meters" value="{$form.net_square_meters}" size="50" />
											<select name="net_square_meters_cond" id="net_square_meters_cond">
												<option value="1" {if ('1' == $form.net_square_meters_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.net_square_meters_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.net_square_meters_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.net_square_meters_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.net_square_meters_cond || '' == $form.net_square_meters_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.net_square_meters_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>認証機関</td>
										<td>
											<input type="text" name="spare_field1" id="spare_field1" value="{$form.spare_field1}" size="50" />
											<select name="spare_field1_cond" id="spare_field1_cond">
												<option value="1" {if ('1' == $form.spare_field1_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.spare_field1_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.spare_field1_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.spare_field1_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.spare_field1_cond || '' == $form.spare_field1_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.spare_field1_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
								</table>
							</td>
						</tr>

						<tr>
							<td nowrap>出展申込締切日</td>
							<!-- 出典申込締切日 -->
							<td nowrap>
								<input type="text" name="app_dead_yyyy_from" id="app_dead_yyyy_from" value="{$form.app_dead_yyyy_from}" maxlength="4" size="4" />年
								<input type="text" name="app_dead_mm_from" id="app_dead_mm_from" value="{$form.app_dead_mm_from}" maxlength="2" size="2" />月
								<input type="text" name="app_dead_dd_from" id="app_dead_dd_from" value="{$form.app_dead_dd_from}" maxlength="2" size="2" />日から&nbsp;
								<input type="text" name="app_dead_yyyy_to" id="app_dead_yyyy_to" value="{$form.app_dead_yyyy_to}" maxlength="4" size="4" />年
								<input type="text" name="app_dead_mm_to" id="app_dead_mm_to" value="{$form.app_dead_mm_to}" maxlength="2" size="2" />月
								<input type="text" name="app_dead_dd_to" id="app_dead_dd_to" value="{$form.app_dead_dd_to}" maxlength="2" size="2" />日まで
							</td>
						</tr>

						<tr>
							<td nowrap>主催者・問合せ先</td>
							<!-- 問合わせ先・運営機関名(日) -->
							<!-- 問合わせ先・運営機関名(英) -->
							<!-- 問合わせ先・運営機関ＴＥＬ -->
							<!-- 問合わせ先・運営機関ＦＡＸ -->
							<!-- 問合わせ先・運営機関Ｅ－ＭＡＩＬ -->
							<td nowrap>
								<table border="0">
									<tr>
										<td nowrap rowspan="2">名称</td>
										<td nowrap colspan="2">日：
										<input type="text" name="organizer_jp" id="organizer_jp" value="{$form.organizer_jp}" size="50" />
											<select name="organizer_jp_cond" id="organizer_jp_cond">
												<option value="1" {if ('1' == $form.organizer_jp_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.organizer_jp_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.organizer_jp_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.organizer_jp_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.organizer_jp_cond || '' == $form.organizer_jp_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.organizer_jp_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
									<tr>
										<td nowrap colspan="2">英：
											<input type="text" name="organizer_en" id="organizer_en" value="{$form.organizer_en}" size="50" />
											<select name="organizer_en_cond" id="organizer_en_cond">
												<option value="1" {if ('1' == $form.organizer_en_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.organizer_en_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.organizer_en_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.organizer_en_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.organizer_en_cond || '' == $form.organizer_en_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.organizer_en_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
									<tr>
										<td nowrap>ＴＥＬ</td>
										<td>
											<input type="text" name="organizer_tel" id="organizer_tel" value="{$form.organizer_tel}" size="50" />
											<select name="organizer_tel_cond" id="organizer_tel_cond">
												<option value="1" {if ('1' == $form.organizer_tel_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.organizer_tel_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.organizer_tel_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.organizer_tel_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.organizer_tel_cond || '' == $form.organizer_tel_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.organizer_tel_cond)}selected{/if}>含まず</option>
											</select>
										</td>
										<td>（半角数字）</td>
									</tr>
									<tr>
										<td nowrap>ＦＡＸ</td>
										<td>
											<input type="text" name="organizer_fax" id="organizer_fax" value="{$form.organizer_fax}" size="50" />
											<select name="organizer_fax_cond" id="organizer_fax_cond">
												<option value="1" {if ('1' == $form.organizer_fax_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.organizer_fax_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.organizer_fax_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.organizer_fax_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.organizer_fax_cond || '' == $form.organizer_fax_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.organizer_fax_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
									<tr>
										<td nowrap>Ｅ－Ｍａｉｌ</td>
										<td>
											<input type="text" name="organizer_email" id="organizer_email" value="{$form.organizer_email}" size="50" />
											<select name="organizer_email_cond" id="organizer_email_cond">
												<option value="1" {if ('1' == $form.organizer_email_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.organizer_email_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.organizer_email_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.organizer_email_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.organizer_email_cond || '' == $form.organizer_email_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.organizer_email_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
								</table>
							</td>
						</tr>

						<tr>
							<td nowrap>日本国内の照会先</td>
							<!-- 在日代理店名(日) -->
							<!-- 在日代理店名(英) -->
							<!-- 在日代理店ＴＥＬ -->
							<!-- 在日代理店ＦＡＸ -->
							<!-- 在日代理店Ｅ－ＭＡＩＬ -->
							<td nowrap>
								<table border="0">
									<tr>
										<td nowrap rowspan="2">名称</td>
										<td nowrap colspan="2">日：
											<input type="text" name="agency_in_japan_jp" id="agency_in_japan_jp" value="{$form.agency_in_japan_jp}" size="50" />
											<select name="agency_in_japan_jp_cond" id="agency_in_japan_jp_cond">
												<option value="1" {if ('1' == $form.agency_in_japan_jp_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.agency_in_japan_jp_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.agency_in_japan_jp_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.agency_in_japan_jp_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.agency_in_japan_jp_cond || '' == $form.agency_in_japan_jp_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.agency_in_japan_jp_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
									<tr>
										<td nowrap colspan="2">英：
											<input type="text" name="agency_in_japan_en" id="agency_in_japan_en" value="{$form.agency_in_japan_en}" size="50" />
											<select name="agency_in_japan_en_cond" id="agency_in_japan_en_cond">
												<option value="1" {if ('1' == $form.agency_in_japan_en_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.agency_in_japan_en_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.agency_in_japan_en_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.agency_in_japan_en_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.agency_in_japan_en_cond || '' == $form.agency_in_japan_en_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.agency_in_japan_en_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
									<tr>
										<td nowrap>ＴＥＬ</td>
										<td>
											<input type="text" name="agency_in_japan_tel" id="agency_in_japan_tel" value="{$form.agency_in_japan_tel}" size="50" />
											<select name="agency_in_japan_tel_cond" id="agency_in_japan_tel">
												<option value="1" {if ('1' == $form.agency_in_japan_tel_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.agency_in_japan_tel_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.agency_in_japan_tel_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.agency_in_japan_tel_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.agency_in_japan_tel_cond || '' == $form.agency_in_japan_tel_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.agency_in_japan_tel_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
									<tr>
										<td nowrap>ＦＡＸ</td>
										<td>
											<input type="text" name="agency_in_japan_fax" id="agency_in_japan_fax" value="{$form.agency_in_japan_fax}" size="50" />
											<select name="agency_in_japan_fax_cond" id="agency_in_japan_fax">
												<option value="1" {if ('1' == $form.agency_in_japan_fax_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.agency_in_japan_fax_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.agency_in_japan_fax_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.agency_in_japan_fax_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.agency_in_japan_fax_cond || '' == $form.agency_in_japan_fax_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.agency_in_japan_fax_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
									<tr>
										<td nowrap>Ｅ－Ｍａｉｌ</td>
										<td>
											<input type="text" name="agency_in_japan_email" id="agency_in_japan_email" value="{$form.agency_in_japan_email}" size="50" />
											<select name="agency_in_japan_email_cond" id="agency_in_japan_email_cond">
												<option value="1" {if ('1' == $form.agency_in_japan_email_cond)}selected{/if}>一致</option>
												<option value="2" {if ('2' == $form.agency_in_japan_email_cond)}selected{/if}>不一致</option>
												<option value="3" {if ('3' == $form.agency_in_japan_email_cond)}selected{/if}>前一致</option>
												<option value="4" {if ('4' == $form.agency_in_japan_email_cond)}selected{/if}>前不一</option>
												<option value="5" {if ('5' == $form.agency_in_japan_email_cond || '' == $form.agency_in_japan_email_cond)}selected{/if}>含む</option>
												<option value="6" {if ('6' == $form.agency_in_japan_email_cond)}selected{/if}>含まず</option>
											</select>
										</td>
									</tr>
								</table>
							</td>
						</tr>

						<tr>
							<td nowrap>見本市レポート／URL</td>
							<!-- 駐在員レポート／リンク -->
							<td nowrap>
								<input type="text" name="report_link" id="report_link" value="{$form.report_link}" size="50" />
								<select name="report_link_cond" id="report_link_cond">
									<option value="1" {if ('1' == $form.report_link_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.report_link_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.report_link_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.report_link_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.report_link_cond || '' == $form.report_link_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.report_link_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>
						<tr>
							<td nowrap>世界の展示会場／URL</td>
							<!-- 展示会場／リンク -->
							<td nowrap>
								<input type="text" name="venue_link" id="venue_link" value="{$form.venue_link}" size="50" />
								<select name="venue_link_cond" id="venue_link_cond">
									<option value="1" {if ('1' == $form.venue_link_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.venue_link_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.venue_link_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.venue_link_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.venue_link_cond || '' == $form.venue_link_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.venue_link_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>

						<tr>
							<td nowrap>展示会に係わる画像(3点)</td>
							<!-- 展示会に係わる画像(3点) -->
							<td nowrap>
								<input type="text" name="photos" id="photos" value="{$form.photos}" size="50" />
								<select name="photos_cond" id="photos_cond">
									<option value="1" {if ('1' == $form.photos_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.photos_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.photos_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.photos_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.photos_cond || '' == $form.photos_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.photos_cond)}selected{/if}>含まず</option>
									<option value="9" {if ('9' == $form.photos_cond)}selected{/if}>一致(全)</option>
									<option value="10" {if ('10' == $form.photos_cond)}selected{/if}>前一致(全)</option>
									<option value="11" {if ('11' == $form.photos_cond)}selected{/if}>含む(全)</option>
								</select>
							</td>
						</tr>

						<tr>
							<td nowrap>システム管理者備考欄</td>
							<!-- システム管理者備考欄 -->
							<td nowrap>
								<input type="text" name="note_for_system_manager" id="note_for_system_manager" value="{$form.note_for_system_manager}" size="50" />
								<select name="note_for_system_manager_cond" id="note_for_system_manager_cond">
									<option value="1" {if ('1' == $form.note_for_system_manager_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.note_for_system_manager_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.note_for_system_manager_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.note_for_system_manager_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.note_for_system_manager_cond || '' == $form.note_for_system_manager_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.note_for_system_manager_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>
						<tr>
							<td nowrap>データ管理者備考欄</td>
							<!-- データ管理者備考欄 -->
							<td nowrap>
								<input type="text" name="note_for_data_manager" id="note_for_data_manager" value="{$form.note_for_data_manager}" size="50" />
								<select name="note_for_data_manager_cond" id="note_for_data_manager_cond">
									<option value="1" {if ('1' == $form.note_for_data_manager_cond)}selected{/if}>一致</option>
									<option value="2" {if ('2' == $form.note_for_data_manager_cond)}selected{/if}>不一致</option>
									<option value="3" {if ('3' == $form.note_for_data_manager_cond)}selected{/if}>前一致</option>
									<option value="4" {if ('4' == $form.note_for_data_manager_cond)}selected{/if}>前不一</option>
									<option value="5" {if ('5' == $form.note_for_data_manager_cond || '' == $form.note_for_data_manager_cond)}selected{/if}>含む</option>
									<option value="6" {if ('6' == $form.note_for_data_manager_cond)}selected{/if}>含まず</option>
								</select>
							</td>
						</tr>

					</table>

					<hr />
					<input type="submit" value="検索実行" />
					<input type="reset" value="リセット" />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
