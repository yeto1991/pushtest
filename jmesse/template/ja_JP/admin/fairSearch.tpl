<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
	<form name="form_fairSearch" id="form_fairSearch" method="post" action="">
		<input type="hidden" name="action_admin_fairList" id="action_admin_fairList" value="dummy" />
		<input type="hidden" name="type" id="type" value="any" />
		<table style="width: 100%;">
			<tr>
				<td valign="top" style="width: 200px;">{include file="admin/menu.tpl"}</td>
				<td valign="top">

					<div align="center">
						<font size="5"><b>見本市ＤＢ 管理者用</b></font>
					</div>
					<hr>
					<div align="center">検索画面</div>
					<input type="submit" value="検索実行" onClick=""> <input type="reset" value="リセット"> <input type="submit" name="$Docclass" value="メニュー画面"> <!-- input type="hidden" name="Operator22" value="1"><input type="hidden" name="Field22" value="" --> <!-- input type="hidden" name="Operator24" value="1"><input type="hidden" name="Field24" value="" --> <input type="hidden" name="Operator6" value="7"><input type="hidden" name="Field6" value=""><input type="hidden" name="Field6" value=""> <input type="hidden" name="Operator7" value="7"><input type="hidden" name="Field7" value=""><input type="hidden" name="Field7" value=""> <input type="hidden" name="Operator16" value="7"><input type="hidden" name="Field16" value=""><input type="hidden" name="Field16" value=""> <input type="hidden" name="Operator17" value="7"><input type="hidden" name="Field17" value=""><input
					type="hidden" name="Field17" value=""> <input type="hidden" name="Operator18" value="7"><input type="hidden" name="Field18" value=""><input type="hidden" name="Field18" value=""> <input type="hidden" name="Operator19" value="7"><input type="hidden" name="Field19" value=""><input type="hidden" name="Field19" value=""> <input type="hidden" name="Operator52" value="7"><input type="hidden" name="Field52" value=""><input type="hidden" name="Field52" value="">

					<dt>
						<hr>
						キーワード
						<!-- 全文検索 -->
					<dd>
						<input type="text" name="Phrases" value="" size="40">
					<dd>
						<input type="radio" name="PhraseConnection" value="And" checked>両方を含む（AND）
					<dd>
						<input type="radio" name="PhraseConnection" value="Or">どちらかを含む（OR）
					<dt>

						<hr>
						項目検索
						<table border="1">
							<tr>
								<td nowrap>項目間の関連</td>
								<td nowrap><input type="radio" name="Connection" value="And" checked>AND <input type="radio" name="Connection" value="Or">OR</td>
							</tr>
							<tr>
								<td nowrap>項目内の関連</td>
								<td nowrap><input type="radio" name="Relation" value="And">AND <input type="radio" name="Relation" value="Or" checked>OR</td>
							</tr>

							<tr>
								<td nowrap>Webページの表示／非表示</td>
								<!-- Ｗｅｂページの表示／非表示 -->
								<td nowrap><input type="hidden" name="Operator65" value="1"><input type="hidden" name="Field65" value=""></td>
							</tr>

							<tr>
								<td nowrap>承認フラグ</td>
								<!-- 承認フラグ -->
								<!-- 否認コメント -->
								<td nowrap><input type="hidden" name="Operator68" value="1"><input type="hidden" name="Field68" value=""> 否認コメント：<input type="text" name="Field71" value="" size=50><select name="Operator71" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
							</tr>

							<tr>
								<td nowrap>メール送信フラグ</td>
								<!-- メール送信フラグ -->
								<td nowrap><input type="hidden" name="Operator69" value="1"><input type="hidden" name="Field69" value=""></td>
							</tr>

							<tr>
								<td nowrap>ユーザ使用言語フラグ</td>
								<!-- 予備フラグ３ -->
								<td nowrap><input type="hidden" name="Operator74" value="1"><input type="hidden" name="Field74" value=""></td>
							</tr>

							<tr>
								<td nowrap>ユーザID</td>
								<!-- ユーザＩＤ -->
								<td nowrap><input type="text" name="Field5" value="" size=50><select name="Operator5" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
							</tr>

							<tr>
								<td nowrap>申請年月日</td>
								<!-- 申請年月日 -->
								<td nowrap></td>
							</tr>

							<tr>
								<td nowrap>登録日(承認日)</td>
								<!-- 登録日(承認日) -->
								<td nowrap></td>
							</tr>

							<tr>
								<td nowrap>Web表示言語</td>
								<!-- 言語選択情報 -->
								<td nowrap><input type="hidden" name="Operator8" value="3"><input type="hidden" name="Field8" value=""></td>
							</tr>

							<tr>
								<td nowrap>見本市番号</td>
								<!-- 見本市番号 -->
								<td nowrap><input type="text" name="Field4" value="" size=20>～<input type="text" name="Field4" value="" size=20><select name="Operator4" size=1><option selected value="7">範囲
										<option value="8">範囲外
										<option value="1">一致
										<option value="2">不一致</select></td>
							</tr>
							<tr>
								<td nowrap rowspan="2">見本市名</td>
								<!-- 見本市名(日) -->
								<!-- 見本市名(英) -->
								<td nowrap>日：<input type="text" name="Field3" value="" size=50><select name="Operator3" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
							</tr>
							<tr>
								<td nowrap>英：<input type="text" name="Field9" value="" size=50><select name="Operator9" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
							</tr>
							<tr>
								<td nowrap>見本市略称</td>
								<!-- 見本市略称(英) -->
								<td nowrap><input type="text" name="Field10" value="" size=50><select name="Operator10" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
							</tr>
							<tr>
								<td nowrap>見本市URL</td>
								<!-- 見本市ＵＲＬ -->
								<td nowrap><input type="text" name="Field11" value="" size=50><select name="Operator11" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
							</tr>

							<tr>
								<td nowrap rowspan="2">キャッチフレーズ</td>
								<!-- キャッチフレーズ(日) -->
								<!-- キャッチフレーズ(英) -->
								<td nowrap>日：<input type="text" name="Field12" value="" size=50><select name="Operator12" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select><br>
							</tr>
							<tr>
								<td nowrap>英：<input type="text" name="Field13" value="" size=50><select name="Operator13" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select><br>
								</td>
							</tr>
							<tr>
								<td nowrap rowspan="2">ＰＲ・紹介文</td>
								<!-- ＰＲ・紹介文(日) -->
								<!-- ＰＲ・紹介文(英) -->
								<td nowrap>日：<input type="text" name="Field14" value="" size=50><select name="Operator14" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず
										<option value="9">一致(全)
										<option value="10">前一致(全)
										<option value="11">含む(全)</select></td>
							</tr>
							<tr>
								<td nowrap>英：<input type="text" name="Field15" value="" size=50><select name="Operator15" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず
										<option value="9">一致(全)
										<option value="10">前一致(全)
										<option value="11">含む(全)</select></td>
								</td>
							</tr>

							<tr>
								<td nowrap>会期</td>
								<!-- 開始年月 -->
								<!-- 開始日 -->
								<!-- 終了年月 -->
								<!-- 終了日 -->
								<td nowrap></td>
							</tr>

							<tr>
								<td nowrap>開催頻度</td>
								<!-- 開催頻度(日) -->
								<!-- 開催頻度(英) -->
								<td nowrap><input type="hidden" name="Operator20" value="1"><input type="hidden" name="Field20" value=""></td>
							</tr>

							<tr>
								<td nowrap>業種</td>
								<!-- 業種大分類(日) -->
								<td nowrap><input type="hidden" name="Operator22" value="5">1.大分類 <br> <input type="hidden" name="Operator24" value="5">2.小分類 <br> <font size="-1">■ 1.大分類→2.小分類 の順に選択。</font></td>
							</tr>

							<tr>
								<td nowrap rowspan="2">出品物</td>
								<!-- 出品物(日) -->
								<!-- 出品物(英) -->
								<td nowrap>日：<input type="text" name="Field26" value="" size=50><select name="Operator26" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
							</tr>
							<tr>
								<td nowrap>英：<input type="text" name="Field27" value="" size=50><select name="Operator27" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
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
											<td><input type="hidden" name="Operator28" value="5"></td>
										</tr>
										<tr>
											<td>2.国・地域</td>
											<td><input type="hidden" name="Operator30" value="1"></td>
										</tr>
										<tr>
											<td>3.<a href="">都市を選択</a></td>
											<td><input type="hidden" name="Operator32" value="5"><input type "text" name="Field32" size="35" value=""></td>
										</tr>
										<tr>
											<td rowspan="2">その他</td>
											<td>日：<input type="text" name="Field34" value="" size=50><select name="Operator34" size=1><option value="1">一致
													<option value="2">不一致
													<option value="3">前一致
													<option value="4">前不一
													<option selected value="5">含む
													<option value="6">含まず</select></td>
										</tr>
										<tr>
											<td>英：<input type="text" name="Field35" value="" size=50><select name="Operator35" size=1><option value="1">一致
													<option value="2">不一致
													<option value="3">前一致
													<option value="4">前不一
													<option selected value="5">含む
													<option value="6">含まず</select></td>
										</tr>
									</table> <font size="-1">■ 1.地域→2.国→3.都市 の順に選択。</font>




								</td>
							</tr>

							<tr>
								<td nowrap rowspan="2">会場名</td>
								<!-- 会場名(日) -->
								<!-- 会場名(英) -->
								<td nowrap>日：<input type="text" name="Field36" value="" size=50><select name="Operator36" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
							</tr>
							<tr>
								<td nowrap>英：<input type="text" name="Field37" value="" size=50><select name="Operator37" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
							</tr>


							<!--  2007.07.10 add [START]  -->
							<tr>
								<td nowrap>同展示場で使用する面積（Ｎｅｔ）</td>
								<!-- 会場の展示面積 -->
								<td nowrap><input type="text" name="Field104" value="" size=20>～<input type="text" name="Field104" value="" size=20><select name="Operator104" size=1><option selected value="7">範囲
										<option value="8">範囲外
										<option value="1">一致
										<option value="2">不一致</select></td>
							</tr>
							<!--  2007.07.10 add [ END ]  -->


							<tr>
								<td nowrap rowspan="2">交通手段</td>
								<!-- 交通手段(日) -->
								<!-- 交通手段(英) -->
								<td nowrap>日：<input type="text" name="Field38" value="" size=50><select name="Operator38" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
							</tr>
							<tr>
								<td nowrap>英：<input type="text" name="Field39" value="" size=50><select name="Operator39" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
							</tr>

							<tr>
								<td nowrap>入場資格</td>
								<!-- 入場資格(日) -->
								<!-- 入場資格(英) -->
								<td nowrap><input type="hidden" name="Operator40" value="1"><input type="hidden" name="Field40" value=""></td>
							</tr>

							<tr>
								<td nowrap>チケットの入手方法</td>
								<!-- チケットの入手方法(日) -->
								<!-- チケットの入手方法(英) -->
								<!-- その他のチケットの入手方法(日) -->
								<!-- その他のチケットの入手方法(英) -->
								<td nowrap><input type="hidden" name="Operator42" value="1"><input type="hidden" name="Field42" value=""></td>
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
											<td><input type="text" name="Field46" value="" size=50><select name="Operator46" size=1><option value="1">一致
													<option value="2">不一致
													<option value="3">前一致
													<option value="4">前不一
													<option selected value="5">含む
													<option value="6">含まず</select></td>
										</tr>
										<tr>
											<td>入場者数</td>
											<td><input type="text" name="Field47" value="" size=20>～<input type="text" name="Field47" value="" size=20><select name="Operator47" size=1><option selected value="7">範囲
													<option value="8">範囲外
													<option value="1">一致
													<option value="2">不一致</select></td>
										</tr>
										<tr>
											<td>（うち海外から</td>
											<td><input type="text" name="Field48" value="" size=20>～<input type="text" name="Field48" value="" size=20><select name="Operator48" size=1><option selected value="7">範囲
													<option value="8">範囲外
													<option value="1">一致
													<option value="2">不一致</select></td>
										</tr>
										<tr>
											<td>出展社数</td>
											<td><input type="text" name="Field49" value="" size=20>～<input type="text" name="Field49" value="" size=20><select name="Operator49" size=1><option selected value="7">範囲
													<option value="8">範囲外
													<option value="1">一致
													<option value="2">不一致</select></td>
										</tr>
										<tr>
											<td>（うち海外から</td>
											<td><input type="text" name="Field50" value="" size=20>～<input type="text" name="Field50" value="" size=20><select name="Operator50" size=1><option selected value="7">範囲
													<option value="8">範囲外
													<option value="1">一致
													<option value="2">不一致</select></td>
										</tr>
										<tr>
											<td>展示面積</td>
											<td><input type="text" name="Field51" value="" size=50><select name="Operator51" size=1><option value="1">一致
													<option value="2">不一致
													<option value="3">前一致
													<option value="4">前不一
													<option selected value="5">含む
													<option value="6">含まず</select></td>
										</tr>
										<tr>
											<td>認証機関</td>
											<td><input type="text" name="Field79" value="" size=50><select name="Operator79" size=1><option value="1">一致
													<option value="2">不一致
													<option value="3">前一致
													<option value="4">前不一
													<option selected value="5">含む
													<option value="6">含まず</select></td>
										</tr>
									</table>
								</td>
							</tr>

							<tr>
								<td nowrap>出展申込締切日</td>
								<!-- 出典申込締切日 -->
								<td nowrap></td>
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
											<td nowrap colspan="2">日：<input type="text" name="Field53" value="" size=50><select name="Operator53" size=1><option value="1">一致
													<option value="2">不一致
													<option value="3">前一致
													<option value="4">前不一
													<option selected value="5">含む
													<option value="6">含まず</select></td>
										</tr>
										<tr>
											<td nowrap colspan="2">英：<input type="text" name="Field54" value="" size=50><select name="Operator54" size=1><option value="1">一致
													<option value="2">不一致
													<option value="3">前一致
													<option value="4">前不一
													<option selected value="5">含む
													<option value="6">含まず</select></td>
										</tr>
										<tr>
											<td nowrap>ＴＥＬ</td>
											<td><input type="text" name="Field55" value="" size=50><select name="Operator55" size=1><option value="1">一致
													<option value="2">不一致
													<option value="3">前一致
													<option value="4">前不一
													<option selected value="5">含む
													<option value="6">含まず</select></td>
											<td>（半角数字）</td>
										</tr>
										<tr>
											<td nowrap>ＦＡＸ</td>
											<td><input type="text" name="Field56" value="" size=50><select name="Operator56" size=1><option value="1">一致
													<option value="2">不一致
													<option value="3">前一致
													<option value="4">前不一
													<option selected value="5">含む
													<option value="6">含まず</select></td>
										</tr>
										<tr>
											<td nowrap>Ｅ－Ｍａｉｌ</td>
											<td><input type="text" name="Field57" value="" size=50><select name="Operator57" size=1><option value="1">一致
													<option value="2">不一致
													<option value="3">前一致
													<option value="4">前不一
													<option selected value="5">含む
													<option value="6">含まず</select></td>
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
											<td nowrap colspan="2">日：<input type="text" name="Field58" value="" size=50><select name="Operator58" size=1><option value="1">一致
													<option value="2">不一致
													<option value="3">前一致
													<option value="4">前不一
													<option selected value="5">含む
													<option value="6">含まず</select></td>
										</tr>
										<tr>
											<td nowrap colspan="2">英：<input type="text" name="Field59" value="" size=50><select name="Operator59" size=1><option value="1">一致
													<option value="2">不一致
													<option value="3">前一致
													<option value="4">前不一
													<option selected value="5">含む
													<option value="6">含まず</select></td>
										</tr>
										<tr>
											<td nowrap>ＴＥＬ</td>
											<td><input type="text" name="Field60" value="" size=50><select name="Operator60" size=1><option value="1">一致
													<option value="2">不一致
													<option value="3">前一致
													<option value="4">前不一
													<option selected value="5">含む
													<option value="6">含まず</select></td>
										</tr>
										<tr>
											<td nowrap>ＦＡＸ</td>
											<td><input type="text" name="Field61" value="" size=50><select name="Operator61" size=1><option value="1">一致
													<option value="2">不一致
													<option value="3">前一致
													<option value="4">前不一
													<option selected value="5">含む
													<option value="6">含まず</select></td>
										</tr>
										<tr>
											<td nowrap>Ｅ－Ｍａｉｌ</td>
											<td><input type="text" name="Field62" value="" size=50><select name="Operator62" size=1><option value="1">一致
													<option value="2">不一致
													<option value="3">前一致
													<option value="4">前不一
													<option selected value="5">含む
													<option value="6">含まず</select></td>
										</tr>
									</table>
								</td>
							</tr>

							<tr>
								<td nowrap>見本市レポート／URL</td>
								<!-- 駐在員レポート／リンク -->
								<td nowrap><input type="text" name="Field63" value="" size=50><select name="Operator63" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
							</tr>
							<tr>
								<td nowrap>世界の展示会場／URL</td>
								<!-- 展示会場／リンク -->
								<td nowrap><input type="text" name="Field64" value="" size=50><select name="Operator64" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
							</tr>

							<tr>
								<td nowrap>展示会に係わる画像(3点)</td>
								<!-- 展示会に係わる画像(3点) -->
								<td nowrap><input type="text" name="Field2" value="" size=50><select name="Operator2" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず
										<option value="12">有り
										<option value="13">無し
										<option value="9">一致(全)
										<option value="10">前一致(全)
										<option value="11">含む(全)</select></td>
							</tr>

							<tr>
								<td nowrap>システム管理者備考欄</td>
								<!-- システム管理者備考欄 -->
								<td nowrap><input type="text" name="Field66" value="" size=50><select name="Operator66" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
							</tr>
							<tr>
								<td nowrap>データ管理者備考欄</td>
								<!-- データ管理者備考欄 -->
								<td nowrap><input type="text" name="Field67" value="" size=50><select name="Operator67" size=1><option value="1">一致
										<option value="2">不一致
										<option value="3">前一致
										<option value="4">前不一
										<option selected value="5">含む
										<option value="6">含まず</select></td>
							</tr>

						</table>

						<hr/>
						<input type="submit" value="検索実行" onClick=""> <input type="reset" value="リセット"> <input type="submit" name="$Docclass" value="メニュー画面">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
