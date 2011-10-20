<?php
/**
 *  Jmesse_JmFair.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 82fb28d30e5eeac17975be5c2e3c1f3eb2c3efda $
 */

/**
 *  Jmesse_JmFairManager
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_JmFairManager extends Ethna_AppManager
{
	/**
	 * ソート方向
	 *
	 *  0:asc
	 *  1:desc
	 */
	var $sort_cond = array(' asc', ' desc');

	/**
	 * ソート項目
	 *
	 * 0:見本市番号
	 * 1:見本市名
	 * 2:見本市略称
	 * 3:会期
	 * 4:開催地
	 * 5:Eメール
	 * 6:申請年月日
	 * 7:登録日(承認日)
	 * 8:否認コメント
	 */
	var $sort_column = array(
		'mihon_no',
		'fair_title_jp',
		'abbrev_title',
		'concat(date_from_yyyy,date_from_mm,date_from_dd,date_to_yyyy,date_to_mm,date_to_dd)',
		"concat(region,'/',country,'/',city,'/',other_city_jp)",
		'email',
		'date_of_application',
		'date_of_registration',
		'negate_comment'
	);

	/**
	 * 見本市情報の全件数を取得する。
	 *
	 * @return int 見本市情報の全件数
	 */
	function getCountAll() {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = "select count(*) cnt from jm_fair";

		// QUERY実行
		$res = $db->query($sql);

		// 結果の判定
		if (null == $res) {
			$this->backend->getLogger()->log(LOG_ERR, '検索結果が取得できません。');
			return null;
		}
		if (DB::isError($res)) {
			$this->backend->getLogger()->log(LOG_ERR, '検索Errorが発生しました。');
			$this->ae->addObject('error', $res);
			return $res;
		}
		if (0 == $res->numRows()) {
			$this->backend->getLogger()->log(LOG_WARNING, '検索件数が0件です。');
			return null;
		}

		$row = $res->fetchRow(DB_FETCHMODE_ASSOC);
		return $row['cnt'];
	}

	/**
	 * 特定ユーザの見本市情報の件数を取得する。
	 *
	 * @param string $user_id ユーザID
	 * @return int 特定ユーザの見本市情報の件数
	 */
	function getCountUser($user_id) {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = "select count(*) cnt from jm_fair where user_id = ?";

		// Prepare Statement化
		$stmt =& $db->db->prepare($sql);

		// 検索条件をArray化
		$param = array($user_id);

		// SQLを実行
		$res = $db->db->execute($stmt, $param);

		// 結果の判定
		if (null == $res) {
			$this->backend->getLogger()->log(LOG_ERR, '検索結果が取得できません。');
			return null;
		}
		if (DB::isError($res)) {
			$this->backend->getLogger()->log(LOG_ERR, '検索Errorが発生しました。');
			$this->ae->addObject('error', $res);
			return $res;
		}
		if (0 == $res->numRows()) {
			$this->backend->getLogger()->log(LOG_WARNING, '検索件数が0件です。');
			return null;
		}

		$row = $res->fetchRow(DB_FETCHMODE_ASSOC);
		return $row['cnt'];
	}

	/**
	 * 承認フラグによる検索
	 *
	 * Enter description here ...
	 * @param unknown_type $confirm_flag
	 * @param unknown_type $sort_list
	 */
	function getFairListConfirm($offset, $limit, $ary_sort, $ary_sort_cond) {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = "select jf.mihon_no, jf.fair_title_jp, jf.fair_title_en, jf.abbrev_title, jf.date_from_yyyy, jf.date_from_mm, jf.date_from_dd, jf.date_to_yyyy, jf.date_to_mm, jf.date_to_dd, jf.region, jf.country, jf.city, jf.other_city_jp, jf.other_city_en, jf.user_id, jf.date_of_application, jf.date_of_registration, jf.negate_comment, ju.email, jcm_1.discription_jp region_jp, jcm_1.discription_en region_en, jcm_2.discription_jp country_jp, jcm_2.discription_en country_en, jcm_3.discription_jp city_jp, jcm_3.discription_en city_en from jm_fair jf, jm_user ju, (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_3 = '000' and kbn_4 = '000') jcm_1, (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_4 = '000') jcm_2, (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp, discription_en from jm_code_m where kbn_1 = '003') jcm_3 where jf.user_id = ju.user_id and jf.region = jcm_1.kbn_2 and jf.region = jcm_2.kbn_2 and jf.country = jcm_2.kbn_3 and jf.region = jcm_3.kbn_2 and jf.country = jcm_3.kbn_3 and jf.city = jcm_3.kbn_4 and jf.confirm_flag = ? order by ";

		// Prepare Statement化
		$stmt =& $db->db->prepare($sql);

		// 検索条件をArray化
		$param = array($confirm_flag);

		// ソート条件を追加
		$sort = '';
		for ($i = 0; $i < count($sort_list); $i++) {
			if (null != $sort_list[$i] && '' != $sort_list[$i]) {
				if ('' != $sort) {
					$sort .= ', ?';
				} else {
					$sort = '?';
				}
			}
			array_push($param, $sort_list[$i]);
		}

		// SQLを実行
		$res = $db->db->execute($stmt, $param);

		// 結果の判定
		if (null == $res) {
			$this->backend->getLogger()->log(LOG_ERR, '検索結果が取得できません。');
			return null;
		}
		if (DB::isError($res)) {
			$this->backend->getLogger()->log(LOG_ERR, '検索Errorが発生しました。');
			$this->ae->addObject('error', $res);
			return $res;
		}
		if (0 == $res->numRows()) {
			$this->backend->getLogger()->log(LOG_WARNING, '検索件数が0件です。');
			return null;
		}

		// リスト化
		$i = 0;
		while ($tmp = $res->fetchRow(DB_FETCHMODE_ASSOC)) {
			$list[$i] = $tmp;
			$i ++;
		}

		return $list;
	}

	/**
	 * 見本市リスト取得（表示用）。
	 *
	 * @param int $page ページ番号
	 * @return array 見本市リスト
	 */
	function getFairListSearch($offset, $limit, $ary_sort, $ary_sort_cond) {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		$sql = "select jf.confirm_flag, jf.mihon_no, jf.fair_title_jp, jf.abbrev_title, jf.date_from_yyyy, jf.date_from_mm, jf.date_from_dd, jf.date_to_yyyy, jf.date_to_mm, jf.date_to_dd, jf.region, jf.country, jf.city, jf.other_city_jp, jf.user_id, jf.date_of_application, jf.date_of_registration, jf.negate_comment, ju.email, jcm_1.discription_jp region_name, jcm_2.discription_jp country_name, jcm_3.discription_jp city_name from jm_fair jf left outer join jm_user ju on jf.user_id = ju.user_id left outer join (select kbn_2, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_3 = '000' and kbn_4 = '000') jcm_1 on jf.region = jcm_1.kbn_2 left outer join (select kbn_2, kbn_3, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_4 = '000') jcm_2 on jf.region = jcm_2.kbn_2 and jf.country = jcm_2.kbn_3 left outer join (select kbn_2, kbn_3, kbn_4, discription_jp, discription_en from jm_code_m where kbn_1 = '003') jcm_3 on jf.region = jcm_3.kbn_2 and jf.country = jcm_3.kbn_3 and jf.city = jcm_3.kbn_4";;

		// 入力値
		$data = array();

		// where句の取得
		$sql_ext =$this->_getWhere($data);

		// sort
		// 入力値を取得
		for ($i = 0; $i < count($ary_sort); $i++) {
			if ('' != $ary_sort[$i]) {
				if ('' == $sql_sort) {
					$sql_sort = ' order by ';
				} else {
					$sql_sort = ', ';
				}
				$sql_sort .= $this->sort_column[$ary_sort[$i]];
				$sql_sort .= $this->sort_cond[$ary_sort_cond[$i]];
			}
		}
		if ('' == $sql_sort) {
			// 見本市名(日) 昇順, 見本市番号 昇順
			$sql_sort = ' order by '.$this->sort_column['1'].$this->sort_cond['0'].', '.$this->sort_column['0'].$this->sort_cond['0'];
		}

		// ページング
		$sql_limit = ' limit '.$offset.', '.$limit;

		$this->backend->getLogger()->log(LOG_DEBUG, 'SQL : '.$sql.$sql_ext.$sql_sort.$sql_limit);

		// Prepare Statement化
		$stmt =& $db->db->prepare($sql.$sql_ext.$sql_sort.$sql_limit);

		// SQLを実行
		$res = $db->db->execute($stmt, $data);

		// 結果の判定
		if (null == $res) {
			$this->backend->getLogger()->log(LOG_ERR, '検索結果が取得できません。');
			return null;
		}
		if (DB::isError($res)) {
			$this->backend->getLogger()->log(LOG_ERR, '検索Errorが発生しました。');
			$this->ae->addObject('error', $res);
			return $res;
		}
		if (0 == $res->numRows()) {
			$this->backend->getLogger()->log(LOG_WARNING, '検索件数が0件です。');
			return null;
		}

		// リスト化
		$i = 0;
		while ($tmp =& $res->fetchRow(DB_FETCHMODE_ASSOC)) {
			$list[$i] = $tmp;
			$i ++;
		}

		return $list;
	}

	/**
	* 見本市リスト総件数取得（表示用）。
	*
	* @return int 見本市リスト総件数
	*/
	function getFairListSearchCnt() {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		$sql = "select jf.confirm_flag, jf.mihon_no, jf.fair_title_jp, jf.abbrev_title, jf.date_from_yyyy, jf.date_from_mm, jf.date_from_dd, jf.date_to_yyyy, jf.date_to_mm, jf.date_to_dd, jf.region, jf.country, jf.city, jf.other_city_jp, jf.user_id, jf.date_of_application, jf.date_of_registration, jf.negate_comment, ju.email, jcm_1.discription_jp region_name, jcm_2.discription_jp country_name, jcm_3.discription_jp city_name from jm_fair jf left outer join jm_user ju on jf.user_id = ju.user_id left outer join (select kbn_2, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_3 = '000' and kbn_4 = '000') jcm_1 on jf.region = jcm_1.kbn_2 left outer join (select kbn_2, kbn_3, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_4 = '000') jcm_2 on jf.region = jcm_2.kbn_2 and jf.country = jcm_2.kbn_3 left outer join (select kbn_2, kbn_3, kbn_4, discription_jp, discription_en from jm_code_m where kbn_1 = '003') jcm_3 on jf.region = jcm_3.kbn_2 and jf.country = jcm_3.kbn_3 and jf.city = jcm_3.kbn_4";;

		// 入力値
		$data = array();

		// where句の取得
		$sql_ext =$this->_getWhere($data);
		var_dump($data);

		$this->backend->getLogger()->log(LOG_DEBUG, 'SQL : select count(*) cnt from ('.$sql.$sql_ext.') t');

		// Prepare Statement化
		$stmt =& $db->db->prepare('select count(*) cnt from ('.$sql.$sql_ext.') t');

		// SQLを実行
		$res = $db->db->execute($stmt, $data);

		// 結果の判定
		if (null == $res) {
			$this->backend->getLogger()->log(LOG_ERR, '検索結果が取得できません。');
			return null;
		}
		if (DB::isError($res)) {
			$this->backend->getLogger()->log(LOG_ERR, '検索Errorが発生しました。');
			$this->ae->addObject('error', $res);
			return $res;
		}
		if (0 == $res->numRows()) {
			$this->backend->getLogger()->log(LOG_WARNING, '検索件数が0件です。');
			return null;
		}

		// 結果の取り出し
		$row =& $res->fetchRow(DB_FETCHMODE_ASSOC);
		return $row['cnt'];
	}

	/**
	* 見本市リスト取得（表示用）。
	*
	* @param int $page ページ番号
	* @return array 見本市リスト
	*/
	function getFairListDownload($ary_sort, $ary_sort_cond) {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		$sql = 'select user_id, date_of_application, date_of_registration, fair_title_jp, fair_title_en, abbrev_title, fair_url, mihon_no, profile_jp, profile_en, detailed_information_jp, detailed_information_en, date_from_yyyy, date_from_mm, date_from_dd, date_to_yyyy, date_to_mm, date_to_dd, frequency, main_industory_1, sub_industory_1, main_industory_2, sub_industory_2, main_industory_3, sub_industory_3, main_industory_4, sub_industory_4, main_industory_5, sub_industory_5, main_industory_6, sub_industory_6, exhibits_jp, exhibits_en, region, country, city, other_city_jp, other_city_en, venue_jp, venue_en, venue_url, gross_floor_area, transportation_jp, transportation_en, open_to, admission_ticket_1, admission_ticket_2, admission_ticket_3, admission_ticket_4, other_admission_ticket_jp, other_admission_ticket_en, year_of_the_trade_fair, total_number_of_visitor, number_of_foreign_visitor, total_number_of_exhibitors, number_of_foreign_exhibitors, net_square_meters, spare_field1, app_dead_yyyy, app_dead_mm, app_dead_dd, organizer_jp, organizer_en, organizer_tel, organizer_fax, organizer_email, organizer_addr, organizer_div, organizer_pers, agency_in_japan_jp, agency_in_japan_en, agency_in_japan_tel, agency_in_japan_fax, agency_in_japan_email, agency_in_japan_addr, agency_in_japan_div, agency_in_japan_pers, photos_1, photos_2, photos_3, select_language_info, report_link, venue_link, keyword, jetro_suport, jetro_suport_url, use_language_flag, web_display_type, regist_type, note_for_system_manager, note_for_data_manager, confirm_flag, negate_comment, mail_send_flag, del_flg, del_date, regist_user_id, regist_date, update_user_id, update_date from jm_fair';

		// 入力値
		$data = array();

		// where句の取得
		$sql_ext =$this->_getWhere($data);

		// sort
		// 入力値を取得
		for ($i = 0; $i < count($ary_sort); $i++) {
			if ('' != $ary_sort[$i]) {
				if ('' == $sql_sort) {
					$sql_sort = ' order by ';
				} else {
					$sql_sort = ', ';
				}
				$sql_sort .= $this->sort_column[$ary_sort[$i]];
				$sql_sort .= $this->sort_cond[$ary_sort_cond[$i]];
			}
		}
		if ('' == $sql_sort) {
			// 見本市名(日) 昇順, 見本市番号 昇順
			$sql_sort = ' order by '.$this->sort_column['1'].$this->sort_cond['0'].', '.$this->sort_column['0'].$this->sort_cond['0'];
		}

		// Prepare Statement化
		$stmt =& $db->db->prepare($sql.$sql_ext.$sql_sort);

		// SQLを実行
		$res = $db->db->execute($stmt, $data);

		// 結果の判定
		if (null == $res) {
			$this->backend->getLogger()->log(LOG_ERR, '検索結果が取得できません。');
			return null;
		}
		if (DB::isError($res)) {
			$this->backend->getLogger()->log(LOG_ERR, '検索Errorが発生しました。');
			$this->ae->addObject('error', $res);
			return $res;
		}
		if (0 == $res->numRows()) {
			$this->backend->getLogger()->log(LOG_WARNING, '検索件数が0件です。');
			return null;
		}

		// リスト化
		$i = 0;
		while ($tmp =& $res->fetchRow(DB_FETCHMODE_ASSOC)) {
			$list[$i] = $tmp;
			$i ++;
		}

		return $list;
	}

	/**
	 * 検索条件によるwhere句の作成。
	 *
	 * @param array $data 入力値
	 */
	function _getWhere(&$data) {

		// 入力値を取得
		$search_cond = $this->session->get('search_cond');

		// where句設定
		$sql_ext = '';
		$sql_tmp = '';

		// キーワード
		$sql_tmp = $this->_mkSqlKeyword($search_cond['phrases'], $search_cond['phrase_connection'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// Webページの表示／非表示
		$sql_tmp = $this->_mkSqlCheckBox1('web_display_type', $search_cond['web_display_type'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 承認フラグ
		$sql_tmp_1 = $this->_mkSqlCheckBox1('confirm_flag', $search_cond['confirm_flag'], $data);
		// 否認コメント
		$sql_tmp_2 = $this->_mkSqlText('negate_comment', $search_cond['negate_comment'], $search_cond['negate_comment_cond'], $search_cond['relation'], $data);
		// 同一項目なので
		$ary_sql = array($sql_tmp_1, $sql_tmp_2);
		$sql_tmp = $this->_addWhereRelation($ary_sql, $search_cond['relation']);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// メール送信フラグ
		$sql_tmp = $this->_mkSqlCheckBox1('mail_send_flag', $search_cond['mail_send_flag'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);
		// ユーザ使用言語フラグ
		$sql_tmp = $this->_mkSqlCheckBox1('use_language_flag', $search_cond['use_language_flag'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);
		// Eメール
		$sql_tmp = $this->_mkSqlText('email', $search_cond['email'], $search_cond['email_cond'], $search_cond['relation'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);
		// 申請年月日
		if ('' != $search_cond['date_of_application_y_from']) {
			$date_from = $search_cond['date_of_application_y_from'].'/'.$search_cond['date_of_application_m_from'].'/'.$search_cond['date_of_application_d_from'].' 00:00:00';
		} else {
			$date_from = '';
		}
		if ('' != $search_cond['date_of_application_y_to']) {
			$date_to = $search_cond['date_of_application_y_to'].'/'.$search_cond['date_of_application_m_to'].'/'.$search_cond['date_of_application_d_to'].' 23:59:59';
		} else {
			$date_to = '';
		}
		$sql_tmp = $this->_mkSqlDate1('date_of_application', $date_from, $date_to, $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);
		// 登録日(承認日)
		if ('' != $search_cond['date_of_registration_y_from']) {
			$date_from = $search_cond['date_of_registration_y_from'].'/'.$search_cond['date_of_registration_m_from'].'/'.$search_cond['date_of_registration_d_from'].' 00:00:00';
		} else {
			$date_from = '';
		}
		if ('' !=  $search_cond['date_of_registration_y_from']) {
			$date_to = $search_cond['date_of_registration_y_to'].'/'.$search_cond['date_of_registration_m_to'].'/'.$search_cond['date_of_registration_d_to'].' 23:59:59';
		} else {
			$date_to = '';
		}
		$sql_tmp = $this->_mkSqlDate1('date_of_registration', $date_from, $date_to, $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);
		// Web表示言語
		$sql_tmp = $this->_mkSqlCheckBox1('select_language_info', $search_cond['select_language_info'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);
		//見本市番号
		$sql_tmp = $this->_mkSqlNumber('mihon_no', $search_cond['mihon_no_from'], $search_cond['mihon_no_to'], $search_cond['mihon_no_cond'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 見本市名(日)
		$sql_tmp_1 = $this->_mkSqlText('fair_title_jp', $search_cond['fair_title_jp'], $search_cond['fair_title_jp_cond'], $search_cond['relation'], $data);
		// 見本市名(英)
		$sql_tmp_2 = $this->_mkSqlText('fair_title_en', $search_cond['fair_title_en'], $search_cond['fair_title_en_cond'], $search_cond['relation'], $data);
		// 同一項目なので
		$ary_sql = array($sql_tmp_1, $sql_tmp_2);
		$sql_tmp = $this->_addWhereRelation($ary_sql, $search_cond['relation']);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 見本市略称
		$sql_tmp = $this->_mkSqlText('abbrev_title', $search_cond['abbrev_title'], $search_cond['abbrev_title_cond'], $search_cond['relation'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);
		// 見本市URL
		$sql_tmp = $this->_mkSqlText('fair_url', $search_cond['fair_url'], $search_cond['fair_url_cond'], $search_cond['relation'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// キャッチフレーズ(日)
		$sql_tmp_1 = $this->_mkSqlText('profile_jp', $search_cond['profile_jp'], $search_cond['profile_jp_cond'], $search_cond['relation'], $data);
		// キャッチフレーズ(英)
		$sql_tmp_2 = $this->_mkSqlText('profile_en', $search_cond['profile_en'], $search_cond['profile_en_cond'], $search_cond['relation'], $data);
		// 同一項目なので
		$ary_sql = array($sql_tmp_1, $sql_tmp_2);
		$sql_tmp = $this->_addWhereRelation($ary_sql, $search_cond['relation']);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// ＰＲ・紹介文(日)
		$sql_tmp_1 = $this->_mkSqlText('detailed_information_jp', $search_cond['detailed_information_jp'], $search_cond['detailed_information_jp_cond'], $search_cond['relation'], $data);
		// ＰＲ・紹介文(英)
		$sql_tmp_2 = $this->_mkSqlText('detailed_information_en', $search_cond['detailed_information_en'], $search_cond['detailed_information_en_cond'], $search_cond['relation'], $data);
		// 同一項目なので
		$ary_sql = array($sql_tmp_1, $sql_tmp_2);
		$sql_tmp = $this->_addWhereRelation($ary_sql, $search_cond['relation']);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 会期
		if ('' != $search_cond['date_from_yyyy']) {
			$date_from = $search_cond['date_from_yyyy'].'/'.$search_cond['date_from_mm'].'/'.$search_cond['date_from_dd'].' 00:00:00';
		} else {
			$date_from = '';
		}
		if ('' != $search_cond['date_to_yyyy']) {
			$date_to = $search_cond['date_to_yyyy'].'/'.$search_cond['date_to_mm'].'/'.$search_cond['date_to_dd'].' 23:59:59';
		} else {
			$date_to = '';
		}
		$column_from = "concat(date_from_yyyy, '/', date_from_mm, '/', date_from_dd, ' 00:00:00')";
		$column_to = "concat(date_to_yyyy, '/', date_to_mm, '/', date_to_dd, ' 23:59:59')";
		$sql_tmp = $this->_mkSqlDate2($column_from, $column_to, $date_from, $date_to, $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 開催頻度
		$sql_tmp = $this->_mkSqlCheckBox1('frequency', $search_cond['frequency'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);
		// 業種
		$sql_tmp = $this->_mkSqlCheckBox1($search_cond['main_industory'], $search_cond['sub_industory'], $search_cond['relation'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 出品物(日)
		$sql_tmp_1 = $this->_mkSqlText('exhibits_jp', $search_cond['exhibits_jp'], $search_cond['exhibits_jp_cond'], $search_cond['relation'], $data);
		// 出品物(英)
		$sql_tmp_2 = $this->_mkSqlText('exhibits_en', $search_cond['exhibits_en'], $search_cond['exhibits_en_cond'], $search_cond['relation'], $data);
		// 同一項目なので
		$ary_sql = array($sql_tmp_1, $sql_tmp_2);
		$sql_tmp = $this->_addWhereRelation($ary_sql, $search_cond['relation']);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 開催地(地域)
		if ('' != $search_cond['region'] && '001' != $search_cond['region']) {
			$sql_tmp_1 = ' region = ? ';
			array_push($data, $search_cond['region']);
		} else {
			$sql_tmp_1 = '';
		}
		// 開催地(国・地域)
		if ('' != $search_cond['country'] && '001' != $search_cond['country']) {
			$sql_tmp_2 = ' country = ? ';
			array_push($data, $search_cond['country']);
		} else {
			$sql_tmp_2 = '';
		}
		// 開催地(都市)
		if ('' != $search_cond['city']) {
			$sql_tmp_3 = ' city = ? ';
			array_push($data, $search_cond['city']);
		} else {
			$sql_tmp_3 = '';
		}
		// 開催地(その他(日))
		$sql_tmp_4 = $this->_mkSqlText('other_city_jp', $search_cond['other_city_jp'], $search_cond['other_city_jp_cond'], $search_cond['relation'], $data);
		// 開催地(その他(英))
		$sql_tmp_5 = $this->_mkSqlText('other_city_en', $search_cond['other_city_en'], $search_cond['other_city_en_cond'], $search_cond['relation'], $data);
		// 同一項目なので
 		$ary_sql = array($sql_tmp_1, $sql_tmp_2, $sql_tmp_3, $sql_tmp_4, $sql_tmp_5);
 		$sql_tmp = $this->_addWhereRelation($ary_sql, $search_cond['relation']);
 		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 会場名(日)
		$sql_tmp_1 = $this->_mkSqlText('venue_jp', $search_cond['venue_jp'], $search_cond['venue_jp_cond'], $search_cond['relation'], $data);
		// 会場名(英)
		$sql_tmp_2 = $this->_mkSqlText('venue_en', $search_cond['venue_en'], $search_cond['venue_en_cond'], $search_cond['relation'], $data);
		// 同一項目なので
		$ary_sql = array($sql_tmp_1, $sql_tmp_2);
		$sql_tmp = $this->_addWhereRelation($ary_sql, $search_cond['relation']);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 同展示場で使用する面積（Ｎｅｔ）
		$sql_tmp = $this->_mkSqlNumber('gross_floor_area', $search_cond['gross_floor_area_from'], $search_cond['gross_floor_area_to'], $search_cond['gross_floor_area_cond'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 交通手段(日)
		$sql_tmp_1 = $this->_mkSqlText('transportation_jp', $search_cond['transportation_jp'], $search_cond['transportation_jp_cond'], $search_cond['relation'], $data);
		// 交通手段(英)
		$sql_tmp_2 = $this->_mkSqlText('transportation_en', $search_cond['transportation_en'], $search_cond['transportation_en_cond'], $search_cond['relation'], $data);
		// 同一項目なので
		$ary_sql = array($sql_tmp_1, $sql_tmp_2);
		$sql_tmp = $this->_addWhereRelation($ary_sql, $search_cond['relation']);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 入場資格
		$sql_tmp = $this->_mkSqlCheckBox1('open_to', $search_cond['open_to'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['open_to']);

		// チケットの入手方法
		$admissionTicketsColums = array('admission_ticket_1','admission_ticket_2','admission_ticket_3','admission_ticket_4');
		$admissionTickets = array($search_cond['admission_ticket_1'],$search_cond['admission_ticket_2'],$search_cond['admission_ticket_3'],$search_cond['admission_ticket_4']);
		$sql_tmp_1 = $this->_mkSqlCheckBox2($admissionTicketsColums, $admissionTickets, $search_cond['relation'], $data);
		// チケットの入手方法(その他)日本語
		$sql_tmp_2 = $this->_mkSqlText('other_admission_ticket_jp', $search_cond['other_admission_ticket_jp'], $search_cond['other_admission_ticket_jp_cond'], $search_cond['relation'], $data);
		// チケットの入手方法(その他)英語
		$sql_tmp_3 = $this->_mkSqlText('other_admission_ticket_en', $search_cond['other_admission_ticket_en'], $search_cond['other_admission_ticket_en_cond'], $search_cond['relation'], $data);
		// 同一項目なので
		$ary_sql = array($sql_tmp_1, $sql_tmp_2, $sql_tmp_3);
		$sql_tmp = $this->_addWhereRelation($ary_sql, $search_cond['relation']);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 過去の実績(年実績（西暦４桁）)
		$sql_tmp_1 = $this->_mkSqlText('year_of_the_trade_fair', $search_cond['year_of_the_trade_fair'], $search_cond['year_of_the_trade_fair_cond'], $search_cond['relation'], $data);
		// 過去の実績(入場者数)
		$sql_tmp_2 = $this->_mkSqlNumber('total_number_of_visitor', $search_cond['total_number_of_visitor_from'], $search_cond['total_number_of_visitor_to'], $search_cond['total_number_of_visitor_cond'], $data);
		// 過去の実績(うち海外から)
		$sql_tmp_3 = $this->_mkSqlNumber('number_of_foreign_visitor', $search_cond['number_of_foreign_visitor_from'], $search_cond['number_of_foreign_visitor_to'], $search_cond['number_of_foreign_visitor_cond'], $data);
		// 過去の実績(出展社数)
		$sql_tmp_4 = $this->_mkSqlNumber('total_number_of_exhibitors', $search_cond['total_number_of_exhibitors_from'], $search_cond['total_number_of_exhibitors_to'], $search_cond['total_number_of_exhibitors_cond'], $data);
		// 過去の実績(うち海外から)
		$sql_tmp_5 = $this->_mkSqlNumber('number_of_foreign_exhibitors', $search_cond['number_of_foreign_exhibitors_from'], $search_cond['number_of_foreign_exhibitors_to'], $search_cond['number_of_foreign_exhibitors_cond'], $data);
		// 過去の実績(展示面積)
		$sql_tmp_6 = $this->_mkSqlText('net_square_meters', $search_cond['net_square_meters'], $search_cond['net_square_meters_cond'], $search_cond['relation'], $data);
		// 過去の実績(認証機関)
		$sql_tmp_7 = $this->_mkSqlText('spare_field1', $search_cond['spare_field1'], $search_cond['spare_field1_cond'], $search_cond['relation'], $data);
		// 同一項目なので
		$ary_sql = array($sql_tmp_1, $sql_tmp_2, $sql_tmp_3, $sql_tmp_4, $sql_tmp_5, $sql_tmp_6, $sql_tmp_7);
		$sql_tmp = $this->_addWhereRelation($ary_sql, $search_cond['relation']);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 出展申込締切日
		if ('' != $search_cond['app_dead_yyyy_from']) {
			$date_from = $search_cond['app_dead_yyyy_from'].'/'.$search_cond['app_dead_mm_from'].'/'.$search_cond['app_dead_dd_from'].' 00:00:00';
		} else {
			$date_from = '';
		}
		if ('' != $search_cond['app_dead_yyyy_to']) {
			$date_to = $search_cond['app_dead_yyyy_to'].'/'.$search_cond['app_dead_mm_to'].'/'.$search_cond['app_dead_dd_to'].' 23:59:59';
		} else {
			$date_to = '';
		}
		$sql_tmp = $this->_mkSqlDate1("concat(app_dead_yyyy, '/', app_dead_mm, '/', app_dead_dd, ' 00:00:00')", $date_from, $date_to, $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 主催者・問合せ先(名称(日))
		$sql_tmp_1 = $this->_mkSqlText('organizer_jp', $search_cond['organizer_jp'], $search_cond['organizer_jp_cond'], $search_cond['relation'], $data);
		// 主催者・問合せ先(名称(英))
		$sql_tmp_2 = $this->_mkSqlText('organizer_en', $search_cond['organizer_en'], $search_cond['organizer_en_cond'], $search_cond['relation'], $data);
		// 主催者・問合せ先(ＴＥＬ)
		$sql_tmp_3 = $this->_mkSqlText('organizer_tel', $search_cond['organizer_tel'], $search_cond['organizer_tel_cond'], $search_cond['relation'], $data);
		// 主催者・問合せ先(ＦＡＸ)
		$sql_tmp_4 = $this->_mkSqlText('organizer_fax', $search_cond['organizer_fax'], $search_cond['organizer_fax_cond'], $search_cond['relation'], $data);
		// 主催者・問合せ先(Ｅ－Ｍａｉｌ)
		$sql_tmp_5 = $this->_mkSqlText('organizer_email', $search_cond['organizer_email'], $search_cond['organizer_email_cond'], $search_cond['relation'], $data);
		// 同一項目なので
		$ary_sql = array($sql_tmp_1, $sql_tmp_2, $sql_tmp_3, $sql_tmp_4, $sql_tmp_5);
		$sql_tmp = $this->_addWhereRelation($ary_sql, $search_cond['relation']);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 日本国内の照会先(名称(日))
		$sql_tmp_1 = $this->_mkSqlText('agency_in_japan_jp', $search_cond['agency_in_japan_jp'], $search_cond['agency_in_japan_jp_cond'], $search_cond['relation'], $data);
		// 日本国内の照会先(名称(英))
		$sql_tmp_2 = $this->_mkSqlText('agency_in_japan_en', $search_cond['agency_in_japan_en'], $search_cond['agency_in_japan_en_cond'], $search_cond['relation'], $data);
		// 日本国内の照会先(ＴＥＬ)
		$sql_tmp_3 = $this->_mkSqlText('agency_in_japan_tel', $search_cond['agency_in_japan_tel'], $search_cond['agency_in_japan_tel_cond'], $search_cond['relation'], $data);
		// 日本国内の照会先(ＦＡＸ)
		$sql_tmp_4 = $this->_mkSqlText('agency_in_japan_fax', $search_cond['agency_in_japan_fax'], $search_cond['agency_in_japan_fax_cond'], $search_cond['relation'], $data);
		// 日本国内の照会先(Ｅ－Ｍａｉｌ)
		$sql_tmp_5 = $this->_mkSqlText('agency_in_japan_email', $search_cond['agency_in_japan_email'], $search_cond['agency_in_japan_email_cond'], $search_cond['relation'], $data);
		// 同一項目なので
		$ary_sql = array($sql_tmp_1, $sql_tmp_2, $sql_tmp_3, $sql_tmp_4, $sql_tmp_5);
		$sql_tmp = $this->_addWhereRelation($ary_sql, $search_cond['relation']);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 見本市レポート／URL
		$sql_tmp = $this->_mkSqlText('report_link', $search_cond['report_link'], $search_cond['report_link_cond'], $search_cond['relation'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);
		// 世界の展示会場／URL
		$sql_tmp = $this->_mkSqlText('venue_link', $search_cond['venue_link'], $search_cond['venue_link_cond'], $search_cond['relation'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 展示会に係わる画像(3点)



		// システム管理者備考欄
		$sql_tmp = $this->_mkSqlText('note_for_system_manager', $search_cond['note_for_system_manager'], $search_cond['note_for_system_manager_cond'], $search_cond['relation'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);
		// データ管理者備考欄
		$sql_tmp = $this->_mkSqlText('note_for_data_manager', $search_cond['note_for_data_manager'], $search_cond['note_for_data_manager_cond'], $search_cond['relation'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		return $sql_ext;
	}

	/**
	* キーワード。
	*
	* @param string $phrases キーワード
	* @param string $phrase_connection 検索条件 'a': and  'o':or
	* @param array $data values
	* @return string 成功:作成SQL 失敗:空文字
	*/
	function _mkSqlKeyword($phrases, $phrase_connection, &$data) {
		if ('' == $phrases) {
			return '';
		}
		$sql = '';
		$value = explode(' ', $phrases);
		for ($i = 0; $i < count($value); $i++) {
			if ('' != $value[$i]) {
				if (0 < $i) {
					$sql .= ' '.$this->_changeRelation($relation).' ';
				}
				$sql .= " search_key like ? ";
				array_push($data, '%'.$value[$i].'%');
			}
		}

		return $sql;
	}

	/**
	 * テキスト入力、検索条件。
	 *
	 * @param string $column カラム名
	 * @param string $text 入力値
	 * @param string $cond 検索条件
	 * @param string $relation 項目内の関連
	 * @param array $data values
	 * @return string 成功:作成SQL 失敗:空文字
	 */
	function _mkSqlText($column, $text, $cond, $relation, &$data) {
		if ( '' == $text) {
			return '';
		}
		$sql = '';
		// ' '区切りを配列へ
		$value = explode(' ', $text);
		if ('1' == $cond) {
			// 一致
			for ($i = 0; $i < count($value); $i++) {
				if ('' != $value[$i]) {
					if ('' != $sql) {
						$sql .= ' '.$this->_changeRelation($relation).' ';
					}
					$sql .= $column.' = ? ';
					array_push($data, $value[$i]);
				}
			}
		} elseif ('2' == $cond) {
			// 不一致
			for ($i = 0; $i < count($value); $i++) {
				if ('' != $value[$i]) {
					if ('' != $sql) {
						$sql .= ' '.$this->_changeRelation($relation).' ';
					}
					$sql .= $column.' <> ? ';
					array_push($data, $value[$i]);
				}
			}
		} elseif ('3' == $cond) {
			// 前一致
			for ($i = 0; $i < count($value); $i++) {
				if ('' != $value[$i]) {
					if ('' != $sql) {
						$sql .= ' '.$this->_changeRelation($relation).' ';
					}
					$sql .= $column.' like ? ';
					array_push($data, $value[$i].'%');
				}
			}
		} elseif ('4' == $cond) {
			// 前不一
			for ($i = 0; $i < count($value); $i++) {
				if ('' != $value[$i]) {
					if ('' != $sql) {
						$sql .= ' '.$this->_changeRelation($relation).' ';
					}
					$sql .= $column.' not like ? ';
					array_push($data, $value[$i].'%');
				}
			}
		} elseif ('5' == $cond) {
			// 含む
			for ($i = 0; $i < count($value); $i++) {
				if ('' != $value[$i]) {
					if ('' != $sql) {
						$sql .= ' '.$this->_changeRelation($relation).' ';
					}
					$sql .= $column.' like ? ';
					array_push($data, '%'.$value[$i].'%');
				}
			}
		} elseif ('6' == $cond) {
			// 含まず
			for ($i = 0; $i < count($value); $i++) {
				if ('' != $value[$i]) {
					if ('' != $sql) {
						$sql .= ' '.$this->_changeRelation($relation).' ';
					}
					$sql .= $column.' not like ? ';
					array_push($data, '%'.$value[$i].'%');
				}
			}
		}

		return $sql;
	}

	/**
	 * チェックボックス、項目対入力値が1:nの場合。
	 *
	 * Webページの表示／非表示
	 * 承認フラグ
	 * メール送信フラグ
	 * ユーザ使用言語フラグ
	 * Web表示言語
	 * 開催頻度
	 * 入場資格
	 *
	 * @param string $column カラム名
	 * @param array $ary_text 入力値配列
	 * @param array $data values
	 * @return string 成功:作成SQL 失敗:空文字
	 */
	function _mkSqlCheckBox1($column, $ary_text, &$data) {
		if (0 == count($ary_text)) {
			return '';
		}
		$sql = '';
		for ($i = 0; $i < count($ary_text); $i++) {
			if ('' != $ary_text[$i]) {
				if ('' != $sql) {
					$sql .= ' or ';
				}
				$sql .= $column.' = ? ';
				array_push($data, $ary_text[$i]);
			}
		}

		return $sql;
	}

	/**
	 * チケットの入手方法、項目対入力値が1:1の場合。
	 *
	 * @param array $ary_column カラム名配列
	 * @param array $ary_text 入力項目配列
	 * @param string $relation 項目内の関連
	 * @param array $data values
	 * @return string 成功:作成SQL 失敗:空文字
	 */
	function _mkSqlCheckBox2($ary_column, $ary_text, $relation, &$data) {
		if (0 == count($ary_text)) {
			return '';
		}
		$sql = '';
		for ($i = 0; $i < count($ary_text); $i++) {
			if ('' != $ary_text[$i]) {
				if ('' != $sql) {
					$sql .= ' '.$this->_changeRelation($relation).' ';
				}
				$sql .= $ary_column[$i].' = ? ';
				array_push($data, $ary_text[$i]);
			}
		}

		return $sql;
	}

	/**
	 * 数値の範囲指定。
	 *
	 * 見本市番号
	 * 同展示場で使用する面積（Ｎｅｔ）
	 * 過去の実績(入場者数)
	 * 過去の実績(うち海外から)
	 * 過去の実績(出展社数)
	 * 過去の実績(うち海外から)
	 *
	 * @param string $column カラム名
	 * @param string $num_from 入力値小
	 * @param string $num_to 入力値大
	 * @param string $data values
	 * @return string 成功:作成SQL 失敗:空文字
	 */
	function _mkSqlNumber($column_from, $column_to, $num_from, $num_to, $cond, &$data) {
		$sql = '';
		if ('' != $num_from && '' != $num_to) {
			if ('1' == $cond) {
				// 一致
				$sql = " $column_from = ? and $column_to = ? ";
				array_push($data, $num_from, $num_to);
			} elseif ('2' == $cond) {
				// 不一致
				$sql = " $column_from <> ? and $column_to <> ? ";
				array_push($data, $num_from, $num_to);
			} elseif ('10' == $cond) {
				// 範囲
				$sql = " $column_from >= ? and $column_to <= ? ";
				array_push($data, $num_from, $num_to);
			} elseif ('11' == $cond) {
				// 範囲外
				$sql = " $column_from < ? and $column_to > ? ";
				array_push($data, $num_from, $num_to);
			}
		} elseif ('' != $num_from) {
			if ('1' == $cond) {
				// 一致
				$sql = " $column_from = ? ";
				array_push($data, $num_from);
			} elseif ('2' == $cond) {
				// 不一致
				$sql = " $column_from <> ? ";
				array_push($data, $num_from);
			} elseif ('10' == $cond) {
				// 範囲
				$sql = " $column_from >= ? ";
				array_push($data, $num_from);
			} elseif ('11' == $cond) {
				// 範囲外
				$sql = " $column_from < ? ";
				array_push($data, $num_from);
			}
		} elseif ('' != $num_to) {
			if ('1' == $cond) {
				// 一致
				$sql = " $column_to = ? ";
				array_push($data,  $num_to);
			} elseif ('2' == $cond) {
				// 不一致
				$sql = " $column_to <> ? ";
				array_push($data,  $num_to);
			} elseif ('10' == $cond) {
				// 範囲
				$sql = " $column_to <= ? ";
				array_push($data, $num_to);
			} elseif ('11' == $cond) {
				// 範囲外
				$sql = " $column_to > ? ";
				array_push($data, $num_to);
			}
		} else {
			return '';
		}
		return $sql;
	}

	/**
	 * 業種。
	 *
	 * @param string $main_industory 業種大分類
	 * @param string $sub_industory 業種小分類
	 * @param string $relation 項目内の関連
	 * @param array $data values
	 * @return string 成功:作成SQL 失敗:空文字
	 */
	function _mkSqlIndustory($main_industory, $sub_industory, $relation, &$data) {
		$sql = '';
		if ('' != $main_industory && '' != $sub_industory) {
			$sql .= " main_industory_1 = ? ".$this->_changeRelation($relation)." sub_industory_1 = ? or ";
			array_push($data, $main_industory, $sub_industory);
			$sql .= " main_industory_2 = ? ".$this->_changeRelation($relation)." sub_industory_2 = ? or ";
			array_push($data, $main_industory, $sub_industory);
			$sql .= " main_industory_3 = ? ".$this->_changeRelation($relation)." sub_industory_3 = ? or ";
			array_push($data, $main_industory, $sub_industory);
			$sql .= " main_industory_4 = ? ".$this->_changeRelation($relation)." sub_industory_4 = ? or ";
			array_push($data, $main_industory, $sub_industory);
			$sql .= " main_industory_5 = ? ".$this->_changeRelation($relation)." sub_industory_5 = ? or ";
			array_push($data, $main_industory, $sub_industory);
			$sql .= " main_industory_6 = ? ".$this->_changeRelation($relation)." sub_industory_6 = ? ";
			array_push($data, $main_industory, $sub_industory);
		} elseif ('' != $main_industory) {
			$sql .= " main_industory_1 = ? or ";
			array_push($data, $main_industory);
			$sql .= " main_industory_2 = ? or ";
			array_push($data, $main_industory);
			$sql .= " main_industory_3 = ? or ";
			array_push($data, $main_industory);
			$sql .= " main_industory_4 = ? or ";
			array_push($data, $main_industory);
			$sql .= " main_industory_5 = ? or ";
			array_push($data, $main_industory);
			$sql .= " main_industory_6 = ?";
			array_push($data, $main_industory);
		} elseif ('' != $sub_industory) {
			$sql .= " sub_industory_1 = ? or ";
			array_push($data, $main_industory, $sub_industory);
			$sql .= " sub_industory_2 = ? or ";
			array_push($data, $main_industory, $sub_industory);
			$sql .= " sub_industory_3 = ? or ";
			array_push($data, $main_industory, $sub_industory);
			$sql .= " sub_industory_4 = ? or ";
			array_push($data, $main_industory, $sub_industory);
			$sql .= " sub_industory_5 = ? or ";
			array_push($data, $main_industory, $sub_industory);
			$sql .= " sub_industory_6 = ?";
			array_push($data, $main_industory, $sub_industory);
		}
		return $sql;
	}

	/**
	 * 単一の日付が範囲内に存在するか？。
	 *
	 * 申請年月日
	 * 登録日(承認日)
	 * 出展申込締切日
	 * ※日付は yyyy/mm/dd 00:00:00 から yyyy/mm/dd 23:59:59 とする
	 *
	 * @param string $column_from カラム名
	 * @param string $num_from 入力値小
	 * @param string $num_to 入力値大
	 * @param string $data values
	 * @return string 成功:作成SQL 失敗:空文字
	 */
	function _mkSqlDate1($column, $date_from, $date_to, &$data) {
		$sql = '';
		if ('' != $date_from && '' != $date_to) {
			$sql = " $column >= ? and $column <= ? ";
			array_push($data, $date_from, $date_to);
		} elseif ('' != $date_from) {
			$sql = " $column >= ? ";
			array_push($data, $date_from);
		} elseif ('' != $date_to) {
			$sql = " $column <= ? ";
			array_push($data, $date_to);
		} else {
			return '';
		}
		return $sql;
	}

	/**
	 * 入力された日付の範囲に開催されているか？。
	 *
	 * 会期
	 * ※日付は yyyy/mm/dd 00:00:00 から yyyy/mm/dd 23:59:59 とする
	 *
	 * @param string $column_from カラム名小
	 * @param string $column_to カラム名大
	 * @param string $num_from 入力値小
	 * @param string $num_to 入力値大
	 * @param string $data values
	 * @return string 成功:作成SQL 失敗:空文字
	 */
	function _mkSqlDate2($column_from, $column_to, $date_from, $date_to, &$data) {
		$sql = '';
		if ('' != $date_from && '' != $date_to) {
			$sql = " $column_from <= ? and $column_to >= ? ";
			array_push($data, $date_to, $date_from);
		} elseif ('' != $date_from) {
			$sql = " $column_to >= ? ";
			array_push($data, $date_from);
		} elseif ('' != $date_to) {
			$sql = " $column_from <= ? ";
			array_push($data, $date_to);
		} else {
			return '';
		}
		return $sql;
	}

	/**
	 * 項目内の関連を変換する。
	 *
	 * @param string $relation 'a':and 'o':or
	 * @return string 'a':and 'o':or error:''
	 */
	function _changeRelation($relation) {
		if ('a' == $relation) {
			return ' and ';
		} elseif ('o') {
			return ' or ';
		}
		return '';
	}

	/**
	 * 項目内のSQLを連結する。
	 *
	 * @param array $ary_sql 各項目のSQL配列
	 * @param string $relation 項目内の関連
	 * @return string 作成SQL
	 */
	function _addWhereRelation($ary_sql, $relation) {

		$ary_tmp = array();
		$j = 0;
		for ($i = 0; $i < count($ary_sql); $i++) {
			if ('' != $ary_sql[$i]) {
				$ary_tmp[$j++] =  $ary_sql[$i];
			}
		}

		// 項目内のSQLが一つのみ（入力項目が一つのみ）
		if (1 == count($ary_tmp)) {
			return $ary_tmp[0];
		}

		$sql = '';
		for ($i = 0; $i < count($ary_tmp); $i++) {
			if ('' != $sql) {
				$sql .= ' '.$this->_changeRelation($relation).' ';
			}
			$sql .= '('.$ary_tmp[$i].')';
		}

		return $sql;
	}

	/**
	 * where句の連結
	 *
	 * @param string $sql_ext where句
	 * @param string $sql_tmp 追加のwhere句
	 * @param string $connection 項目間の関連
	 */
	function _addWhere($sql_ext, $sql_tmp, $connection) {
		if ('' != $sql_tmp) {
			if ('' == $sql_ext) {
				$sql_ext = ' where ';
			} else {
				$sql_ext .= ' '.$this->_changeRelation($connection).' ';
			}
			$sql_ext .= ' ( '.$sql_tmp.' ) ';
		}
		return $sql_ext;
	}
}

/**
 *  Jmesse_JmFair
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_JmFair extends Ethna_AppObject
{
	/**
	 *  @var    array   テーブル定義
	 */
	var $table_def = array(
		'jm_fair' => array(
			'primary' => true,
		),
	);

	/**
	 *  property display name getter.
	 *
	 *  @access public
	 */
	function getName($key)
	{
		return $this->get($key);
	}
}

?>
