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
	* フロントサイト（My展示会一覧情報取得用）
	*
	* @param user_id ログインユーザID
	* @return list 検索情報結果
	*/
	function getMyFairInfoList($user_id) {
		// DBオブジェクト取得
		$db = $this->backend->getDB();
		$sql = " select ";
		$sql .= " jf.user_id, jf.fair_title_jp, jf.fair_title_en, jf.abbrev_title, jf.mihon_no, jf.date_from_yyyy, jf.date_from_mm, jf.date_from_dd, jf.date_to_yyyy, jf.date_to_mm, ";
		$sql .= " jf.date_to_dd, jf.main_industory_1, jf.sub_industory_1, jf.main_industory_2, jf.sub_industory_2, jf.main_industory_3, jf.sub_industory_3, jf.main_industory_4, jf.sub_industory_4, jf.main_industory_5, jf.sub_industory_5, jf.main_industory_6, jf.sub_industory_6, ";
		$sql .= " jf.exhibits_jp, jf.exhibits_en, jf.region, jf.country, jf.city, jf.other_city_jp, jf.other_city_en, jf.confirm_flag, jf.regist_date, jf.update_date, jcm_1.discription_jp region_name, jcm_2.discription_jp country_name, jcm_3.discription_jp city_name, ";
		$sql .= " jcm_4_1.discription_jp main_indust_name1, jcm_4_2.discription_jp main_indust_name2, jcm_4_3.discription_jp main_indust_name3, jcm_4_4.discription_jp main_indust_name4, jcm_4_5.discription_jp main_indust_name5, jcm_4_6.discription_jp main_indust_name6, ";
		$sql .= " jcm_5_1.discription_jp sub_indust_name1, jcm_5_2.discription_jp sub_indust_name2, jcm_5_3.discription_jp sub_indust_name3, jcm_5_4.discription_jp sub_indust_name4, jcm_5_5.discription_jp sub_indust_name5, jcm_5_6.discription_jp sub_indust_name6 ";
		$sql .= " from jm_fair jf left outer join jm_user ju on jf.user_id = ju.user_id ";
		$sql .= " left outer join ( select kbn_2, discription_jp, discription_en from jm_code_m where kbn_1 = ? and kbn_3 = ? and kbn_4 = ? ) jcm_1 on jf.region = jcm_1.kbn_2 "; //(?-1)kbn_1 = '003' (?-2) kbn_3 = '000' (?-3) kbn_4 = '000'
		$sql .= " left outer join ( select kbn_2, kbn_3, discription_jp, discription_en from jm_code_m where kbn_1 = ? and kbn_4 = ? ) jcm_2 on jf.region = jcm_2.kbn_2 and jf.country = jcm_2.kbn_3 "; //(?-1)kbn_1 = '003' (?-2) kbn_4 = '000'
		$sql .= " left outer join ( select kbn_2, kbn_3, kbn_4, discription_jp, discription_en from jm_code_m where kbn_1 = ? ) jcm_3 on jf.region = jcm_3.kbn_2 and jf.country = jcm_3.kbn_3 and jf.city = jcm_3.kbn_4 "; //(?-1)kbn_1 = '003'
		$sql .= " left outer join ( select kbn_2, discription_jp, discription_en from jm_code_m where kbn_1 = ? and kbn_3 = ? and kbn_4 = ? ) jcm_4_1 on jf.main_industory_1 = jcm_4_1.kbn_2 "; //(?-1)kbn_1 = '002' (?-2) kbn_3 = '000' (?-3) kbn_4 = '000'
		$sql .= " left outer join ( select kbn_2, discription_jp, discription_en from jm_code_m where kbn_1 = ? and kbn_3 = ? and kbn_4 = ? ) jcm_4_2 on jf.main_industory_2 = jcm_4_2.kbn_2 "; //(?-1)kbn_1 = '002' (?-2) kbn_3 = '000' (?-3) kbn_4 = '000'
		$sql .= " left outer join ( select kbn_2, discription_jp, discription_en from jm_code_m where kbn_1 = ? and kbn_3 = ? and kbn_4 = ? ) jcm_4_3 on jf.main_industory_3 = jcm_4_3.kbn_2 "; //(?-1)kbn_1 = '002' (?-2) kbn_3 = '000' (?-3) kbn_4 = '000'
		$sql .= " left outer join ( select kbn_2, discription_jp, discription_en from jm_code_m where kbn_1 = ? and kbn_3 = ? and kbn_4 = ? ) jcm_4_4 on jf.main_industory_4 = jcm_4_4.kbn_2 "; //(?-1)kbn_1 = '002' (?-2) kbn_3 = '000' (?-3) kbn_4 = '000'
		$sql .= " left outer join ( select kbn_2, discription_jp, discription_en from jm_code_m where kbn_1 = ? and kbn_3 = ? and kbn_4 = ? ) jcm_4_5 on jf.main_industory_5 = jcm_4_5.kbn_2 "; //(?-1)kbn_1 = '002' (?-2) kbn_3 = '000' (?-3) kbn_4 = '000'
		$sql .= " left outer join ( select kbn_2, discription_jp, discription_en from jm_code_m where kbn_1 = ? and kbn_3 = ? and kbn_4 = ? ) jcm_4_6 on jf.main_industory_6 = jcm_4_6.kbn_2 "; //(?-1)kbn_1 = '002' (?-2) kbn_3 = '000' (?-3) kbn_4 = '000'
		$sql .= " left outer join ( select kbn_2, kbn_3, discription_jp, discription_en from jm_code_m where kbn_1 = ? and kbn_4 = ? ) jcm_5_1 on jf.main_industory_1 = jcm_5_1.kbn_2 and jf.sub_industory_1 = jcm_5_1.kbn_3 "; //(?-1)kbn_1 = '002' (?-2) kbn_4 = '000'
		$sql .= " left outer join ( select kbn_2, kbn_3, discription_jp, discription_en from jm_code_m where kbn_1 = ? and kbn_4 = ? ) jcm_5_2 on jf.main_industory_2 = jcm_5_2.kbn_2 and jf.sub_industory_2 = jcm_5_2.kbn_3 "; //(?-1)kbn_1 = '002' (?-2) kbn_4 = '000'
		$sql .= " left outer join ( select kbn_2, kbn_3, discription_jp, discription_en from jm_code_m where kbn_1 = ? and kbn_4 = ? ) jcm_5_3 on jf.main_industory_3 = jcm_5_3.kbn_2 and jf.sub_industory_3 = jcm_5_3.kbn_3 "; //(?-1)kbn_1 = '002' (?-2) kbn_4 = '000'
		$sql .= " left outer join ( select kbn_2, kbn_3, discription_jp, discription_en from jm_code_m where kbn_1 = ? and kbn_4 = ? ) jcm_5_4 on jf.main_industory_4 = jcm_5_4.kbn_2 and jf.sub_industory_4 = jcm_5_4.kbn_3 "; //(?-1)kbn_1 = '002' (?-2) kbn_4 = '000'
		$sql .= " left outer join ( select kbn_2, kbn_3, discription_jp, discription_en from jm_code_m where kbn_1 = ? and kbn_4 = ? ) jcm_5_5 on jf.main_industory_5 = jcm_5_5.kbn_2 and jf.sub_industory_5 = jcm_5_5.kbn_3 "; //(?-1)kbn_1 = '002' (?-2) kbn_4 = '000'
		$sql .= " left outer join ( select kbn_2, kbn_3, discription_jp, discription_en from jm_code_m where kbn_1 = ? and kbn_4 = ? ) jcm_5_6 on jf.main_industory_6 = jcm_5_6.kbn_2 and jf.sub_industory_6 = jcm_5_6.kbn_3 "; //(?-1)kbn_1 = '002' (?-2) kbn_4 = '000'
		$sql .= " where jf.user_id = ? and jf.del_flg = ? order by concat( jf.date_from_yyyy, '/', jf.date_from_mm, '/', jf.date_from_dd) desc ";
		// Prepare Statement化
		$stmt =& $db->db->prepare($sql);
		// 検索条件をArray化
		$param = array('003','000','000','003','000','003','002','000','000','002','000','000','002','000','000','002','000','000','002','000','000','002','000','000','002','000','002','000','002','000','002','000','002','000','002','000',$user_id,'0');
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
		while ($tmp =& $res->fetchRow(DB_FETCHMODE_ASSOC)) {
			$list[$i] = $tmp;
			$i ++;
		}
		return $list;
	}

	/**
	* フロントサイト（My展示会一覧情報 総件数取得用）
	*
	* @param user_id ログインユーザID
	* @return list 検索情報結果
	*/
	function getMyFairInfoListCount($user_id) {
		// DBオブジェクト取得
		$db = $this->backend->getDB();
		$sql = " select count(*) cnt from jm_fair where user_id = ? and del_flg = ? ";
		// Prepare Statement化
		$stmt =& $db->db->prepare($sql);
		// 検索条件をArray化
		$param = array($user_id,'0');
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
	 * 見本市詳細情報取得SQL。
	 *
	 * @var string
	 */
	var $sql_get_fair_detail = "select jf.mihon_no, jf.keyword, jf.abbrev_title, jf.fair_title_jp, jf.fair_title_en, jf.profile_jp, jf.fair_url, jf.date_from_yyyy, jf.date_from_mm, jf.date_from_dd, jf.date_to_yyyy, jf.date_to_mm, jf.date_to_dd, jf.frequency, jf.region, jf.country, jf.city, jf.other_city_jp, jf.venue_jp, jf.venue_en, jf.gross_floor_area, jf.transportation_jp, jf.exhibits_jp, jf.open_to, jf.admission_ticket_1, jf.admission_ticket_2, jf.admission_ticket_3, jf.admission_ticket_4, jf.other_admission_ticket_jp, jf.detailed_information_jp, jf.organizer_jp, jf.organizer_addr, jf.organizer_div, jf.organizer_pers, jf.organizer_tel, jf.organizer_fax, jf.organizer_email, jf.agency_in_japan_jp, jf.agency_in_japan_addr, jf.agency_in_japan_div, jf.agency_in_japan_pers, jf.agency_in_japan_tel, jf.agency_in_japan_fax, jf.agency_in_japan_email, jf.main_industory_1, jf.sub_industory_1, jf.main_industory_2, jf.sub_industory_2, jf.main_industory_3, jf.sub_industory_3, jf.main_industory_4, jf.sub_industory_4, jf.main_industory_5, jf.sub_industory_5, jf.main_industory_6, jf.sub_industory_6, jf.year_of_the_trade_fair, jf.total_number_of_visitor, jf.number_of_foreign_visitor, jf.total_number_of_exhibitors, jf.number_of_foreign_exhibitors, jf.net_square_meters, jf.spare_field1, jf.photos_1, jf.photos_2, jf.photos_3, jf.regist_date, jf.update_date, jcm_v1.discription_jp region_name, jcm_v2.discription_jp country_name, jcm_v3.discription_jp city_name, jcm_v2.reserve_4 flag_image, jcm_o.discription_jp open_to_name, jcm_mi1.discription_jp main_industory_name_1, jcm_si1.discription_jp sub_industory_name_1, jcm_mi2.discription_jp main_industory_name_2, jcm_si2.discription_jp sub_industory_name_2, jcm_mi3.discription_jp main_industory_name_3, jcm_si3.discription_jp sub_industory_name_3, jcm_mi4.discription_jp main_industory_name_4, jcm_si4.discription_jp sub_industory_name_4, jcm_mi5.discription_jp main_industory_name_5, jcm_si5.discription_jp sub_industory_name_5, jcm_mi6.discription_jp main_industory_name_6, jcm_si6.discription_jp sub_industory_name_6, jcm_fq.discription_jp frequency_name from jm_fair jf left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '003' and kbn_3 = '000' and kbn_4 = '000') jcm_v1 on jf.region = jcm_v1.kbn_2 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp, reserve_4 from jm_code_m where kbn_1 = '003' and kbn_4 = '000') jcm_v2 on jf.region = jcm_v2.kbn_2 and jf.country = jcm_v2.kbn_3 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '003') jcm_v3 on jf.region = jcm_v3.kbn_2 and jf.country = jcm_v3.kbn_3 and jf.city = jcm_v3.kbn_4 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '004' and kbn_3 = '000' and kbn_4 = '000') jcm_o on jf.open_to = jcm_o.kbn_2 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '002' and kbn_3 = '000' and kbn_4 = '000') jcm_mi1 on jf.main_industory_1 = jcm_mi1.kbn_2 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '002' and kbn_4 = '000') jcm_si1 on jf.main_industory_1 = jcm_si1.kbn_2 and jf.sub_industory_1 = jcm_si1.kbn_3 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '002' and kbn_3 = '000' and kbn_4 = '000') jcm_mi2 on jf.main_industory_2 = jcm_mi2.kbn_2 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '002' and kbn_4 = '000') jcm_si2 on jf.main_industory_2 = jcm_si2.kbn_2 and jf.sub_industory_2 = jcm_si2.kbn_3 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '002' and kbn_3 = '000' and kbn_4 = '000') jcm_mi3 on jf.main_industory_3 = jcm_mi3.kbn_2 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '002' and kbn_4 = '000') jcm_si3 on jf.main_industory_3 = jcm_si3.kbn_2 and jf.sub_industory_3 = jcm_si3.kbn_3 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '002' and kbn_3 = '000' and kbn_4 = '000') jcm_mi4 on jf.main_industory_4 = jcm_mi4.kbn_2 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '002' and kbn_4 = '000') jcm_si4 on jf.main_industory_4 = jcm_si4.kbn_2 and jf.sub_industory_4 = jcm_si4.kbn_3 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '002' and kbn_3 = '000' and kbn_4 = '000') jcm_mi5 on jf.main_industory_5 = jcm_mi5.kbn_2 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '002' and kbn_4 = '000') jcm_si5 on jf.main_industory_5 = jcm_si5.kbn_2 and jf.sub_industory_5 = jcm_si5.kbn_3 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '002' and kbn_3 = '000' and kbn_4 = '000') jcm_mi6 on jf.main_industory_6 = jcm_mi6.kbn_2 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '002' and kbn_4 = '000') jcm_si6 on jf.main_industory_6 = jcm_si6.kbn_2 and jf.sub_industory_6 = jcm_si6.kbn_3 left outer join (select kbn_1, kbn_2, kbn_3, kbn_4, discription_jp from jm_code_m where kbn_1 = '001' and kbn_3 = '000' and kbn_4 = '000') jcm_fq on jf.frequency = jcm_fq.kbn_2 where jf.del_flg = '0' and jf.web_display_type = '1' and jf.select_language_info in ('0', '2') and jf.confirm_flag = '1' and mihon_no = ?";

	function getFairDetail($mihon_no) {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = $this->sql_get_fair_detail;

		// Prepare Statement化
		$stmt =& $db->db->prepare($sql);

		// 検索条件をArray化
		$param = array((int)$mihon_no);

		$this->backend->getLogger()->log(LOG_DEBUG, '■SQL : '.$sql);

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

		return $res->fetchRow(DB_FETCHMODE_ASSOC);
	}

	/**
	 * 見本市情報リスト取得SQL。
	 */
	var $sql_get_fair_list = "select jf.mihon_no, jf.fair_title_jp, abbrev_title, jf.fair_title_en, jf.date_from_yyyy, jf.date_from_mm, jf.date_from_dd, jf.date_to_yyyy, jf.date_to_mm, jf.date_to_dd, jf.region, jf.country, jf.city, jf.other_city_jp, jf.date_of_application, jf.date_of_registration, jf.negate_comment, jf.exhibits_jp, jf.exhibits_en, jcm_1.discription_jp region_name, jcm_2.discription_jp country_name, jcm_3.discription_jp city_name, jcm_1.discription_en region_name_en, jcm_2.discription_en country_name_en, jcm_3.discription_en city_name_en from jm_fair jf left outer join jm_user ju on jf.user_id = ju.user_id left outer join (select kbn_2, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_3 = '000' and kbn_4 = '000') jcm_1 on jf.region = jcm_1.kbn_2 left outer join (select kbn_2, kbn_3, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_4 = '000') jcm_2 on jf.region = jcm_2.kbn_2 and jf.country = jcm_2.kbn_3 left outer join (select kbn_2, kbn_3, kbn_4, discription_jp, discription_en from jm_code_m where kbn_1 = '003') jcm_3 on jf.region = jcm_3.kbn_2 and jf.country = jcm_3.kbn_3 and jf.city = jcm_3.kbn_4 where jf.select_language_info in ('0', '2') and jf.web_display_type = '1' and jf.confirm_flag = '1' and jf.del_flg = '0'";

	/**
	 * すべての有効な見本市情報の取得。
	 *
	 * @param unknown_type $offset
	 * @param unknown_type $limit
	 * @param unknown_type $sort
	 */
	function getFairListAll($offset, $limit, $sort) {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = $this->sql_get_fair_list;
		$sql .= " and concat(jf.date_to_yyyy, '/', jf.date_to_mm, '/', jf.date_to_dd, ' 00:00:00') > now() ";

		// SORT条件
		if ('1' == $sort) {
			$sql .= ' order by date_of_registration desc ';
		} elseif ('2' == $sort) {
			$sql .= ' order by fair_title_jp asc ';
		}

		// OFFSET、LIMIT
		$sql .= ' limit ?, ? ';

		// Prepare Statement化
		$stmt =& $db->db->prepare($sql);

		// 検索条件をArray化
		$param = array((int)$offset, (int)$limit);

		$this->backend->getLogger()->log(LOG_DEBUG, '■SQL : '.$sql);

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
	 * すべての有効な見本市情報の件数を取得。
	 *
	 */
	function getFairListAllCnt() {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = $this->sql_get_fair_list;
		$sql .= " and concat(jf.date_to_yyyy, '/', jf.date_to_mm, '/', jf.date_to_dd, ' 00:00:00') > now() ";
		$sql = 'select count(*) cnt from ('.$sql.') t';

		$this->backend->getLogger()->log(LOG_DEBUG, '■SQL : '.$sql);

		// SQLを実行
		$res = $db->db->query($sql);

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

	function getFairList($offset, $limit, $sort) {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = $this->sql_get_fair_list;

		// WHERE句追加
		$data = array();
		$sql_ext = $this->_makeWhere($data);

		// SORT条件
		if ('1' == $sort) {
			$sql_sort = ' order by date_of_registration desc ';
		} else {
			$sql_sort = ' order by fair_title_jp asc ';
		}

		// OFFSET、LIMIT
		$sql_limit = ' limit ?, ? ';
		array_push($data, (int)$offset, (int)$limit);

		// Prepare Statement化
		$sql .= ' and ('.$sql_ext.')'.$sql_sort.$sql_limit;
		$stmt =& $db->db->prepare($sql);

		$this->backend->getLogger()->log(LOG_DEBUG, '■SQL : '.$sql);

		// SQLを実行
		$res = $db->db->execute($stmt, $data);
		// var_dump($data);

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

	function getFairListCnt() {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = $this->sql_get_fair_list;

		// WHERE句追加
		$data = array();
		$sql_ext = $this->_makeWhere($data);

		$sql = 'select count(*) cnt from ('.$sql.' and ('.$sql_ext.')) t';

		$this->backend->getLogger()->log(LOG_DEBUG, '■SQL : '.$sql);

		$stmt =& $db->db->prepare($sql);

		// SQLを実行
		$res = $db->db->execute($stmt, $data);
		// var_dump($data);

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
	 * 見本市情報一覧検索条件WHERE句作成。
	 *
	 * @param array $data
	 * @return string WHERE句
	 */
	function _makeWhere(&$data) {
		$sql_ext = '';
		$search_cond = $this->session->get('search_cond');

		// 各リンク
		$sql_tmp_l = '';
		if ('i1' == $search_cond['type']) {
			// 業種（大分類）
			$sql_tmp_lmi = '';
			if ('' != $search_cond['i_2']) {
				$sql_tmp_lmi .= ' main_industory_1 = ? or ';
				$sql_tmp_lmi .= ' main_industory_2 = ? or ';
				$sql_tmp_lmi .= ' main_industory_3 = ? or ';
				$sql_tmp_lmi .= ' main_industory_4 = ? or ';
				$sql_tmp_lmi .= ' main_industory_5 = ? or ';
				$sql_tmp_lmi .= ' main_industory_6 = ? ';
				array_push($data, $search_cond['i_2']);
				array_push($data, $search_cond['i_2']);
				array_push($data, $search_cond['i_2']);
				array_push($data, $search_cond['i_2']);
				array_push($data, $search_cond['i_2']);
				array_push($data, $search_cond['i_2']);
			}

			// 業種（小分類）
			$sql_tmp_lsi = '';
			if ('' != $search_cond['i_3']) {
				$sql_tmp_lsi .= ' sub_industory_1 = ? or ';
				$sql_tmp_lsi .= ' sub_industory_2 = ? or ';
				$sql_tmp_lsi .= ' sub_industory_3 = ? or ';
				$sql_tmp_lsi .= ' sub_industory_4 = ? or ';
				$sql_tmp_lsi .= ' sub_industory_5 = ? or ';
				$sql_tmp_lsi .= ' sub_industory_6 = ? ';
				array_push($data, $search_cond['i_3']);
				array_push($data, $search_cond['i_3']);
				array_push($data, $search_cond['i_3']);
				array_push($data, $search_cond['i_3']);
				array_push($data, $search_cond['i_3']);
				array_push($data, $search_cond['i_3']);
			}

			// ANDで連結
			$ary_sql = array($sql_tmp_lmi, $sql_tmp_lsi);
			$sql_tmp_l = $this->_addWhereRelation($ary_sql, 'a');

		} elseif ('v1' == $search_cond['type'] || 'v2' == $search_cond['type']) {
			// 地域
			$sql_tmp_lr = '';
			if ('' != $search_cond['v_2']) {
				$sql_tmp_lr .= ' region = ? ';
				array_push($data, $search_cond['v_2']);
			}

			// 国・地域
			$sql_tmp_lc = '';
			if ('' != $search_cond['v_3']) {
				$sql_tmp_lc .= ' country = ? ';
				array_push($data, $search_cond['v_3']);
			}

			// 都市
			$sql_tmp_lt = '';
			if ('' != $search_cond['v_4']) {
				$sql_tmp_lt .= ' city = ? ';
				array_push($data, $search_cond['v_4']);
			}

			// ANDで連結
			$ary_sql = array($sql_tmp_lr, $sql_tmp_lc, $sql_tmp_lt);
			$sql_tmp_l = $this->_addWhereRelation($ary_sql, 'a');
		}

		// 各種チェックボックス
		$sql_tmp_c = '';
		if ('i1' == $search_cond['type']) {
			// 業種（小分類）
			$sql_tmp_csi = '';
			$check_sub_industory = $search_cond['check_sub_industory'];
			for ($i = 0; $i < count($check_sub_industory); $i++) {
				if ('' != $check_sub_industory[$i]) {
					if ('' != $sql_tmp_csi) {
						$sql_tmp_csi .= ' or ';
					}
					$sql_tmp_csi .= ' sub_industory_1 = ? or ';
					$sql_tmp_csi .= ' sub_industory_2 = ? or ';
					$sql_tmp_csi .= ' sub_industory_3 = ? or ';
					$sql_tmp_csi .= ' sub_industory_4 = ? or ';
					$sql_tmp_csi .= ' sub_industory_5 = ? or ';
					$sql_tmp_csi .= ' sub_industory_6 = ? ';
					array_push($data, $check_sub_industory[$i]);
					array_push($data, $check_sub_industory[$i]);
					array_push($data, $check_sub_industory[$i]);
					array_push($data, $check_sub_industory[$i]);
					array_push($data, $check_sub_industory[$i]);
					array_push($data, $check_sub_industory[$i]);
				}
			}

			// 地域
			$sql_tmp_cr = '';
			$check_region = $search_cond['check_region'];
			for ($i = 0; $i < count($check_region); $i++) {
				if ('' != $check_region[$i]) {
					if ('' != $sql_tmp_cr) {
						$sql_tmp_cr .= ',';
					}
					$sql_tmp_cr .= " ? ";
					array_push($data, $check_region[$i]);
				}
			}
			if ('' != $sql_tmp_cr) {
				$sql_tmp_cr = ' region in ('.$sql_tmp_cr.') ';
			}

			// 国・地域
			$sql_tmp_cc = '';
			$check_region_country = $search_cond['check_region_country'];
			for ($i = 0; $i < count($check_region_country); $i++) {
				if ('' != $check_region_country[$i]) {
					$region_country = explode('_', $check_region_country[$i]);
					if ('' != $sql_tmp_cc) {
						$sql_tmp_cc .= ' or ';
					}
					$sql_tmp_cc .= " (region = ? and country = ?) ";
					array_push($data, $region_country[0], $region_country[1]);
				}
			}

			// 地域と国はOR
			$ary_sql = array($sql_tmp_cr, $sql_tmp_cc);
			$sql_tmp = $this->_addWhereRelation($ary_sql, 'o');

			// 業種（小）とはAND
			$ary_sql = array($sql_tmp_csi, $sql_tmp);
			$sql_tmp_c = $this->_addWhereRelation($ary_sql, 'a');

		} elseif ('v1' == $search_cond['type']) {
			// 国・地域
			$sql_tmp_cc = '';
			$check_country = $search_cond['check_country'];
			for ($i = 0; $i < count($check_country); $i++) {
				if ('' != $check_country[$i]) {
					if ('' != $sql_tmp_cc) {
						$sql_tmp_cc .= ',';
					}
					$sql_tmp_cc .= " ? ";
					array_push($data, $check_country[$i]);
				}
			}
			if ('' != $sql_tmp_cc) {
				$sql_tmp_cc = ' country in ('.$sql_tmp_cc.') ';
			}

			// 業種（大分類）
			$sql_tmp_cmi = '';
			$check_main_industory = $search_cond['check_main_industory'];
			for ($i = 0; $i < count($check_main_industory); $i++) {
				if ('' != $check_main_industory[$i]) {
					if ('' != $sql_tmp_cmi) {
						$sql_tmp_cmi .= ' or ';
					}
					$sql_tmp_cmi .= ' main_industory_1 = ? or ';
					$sql_tmp_cmi .= ' main_industory_2 = ? or ';
					$sql_tmp_cmi .= ' main_industory_3 = ? or ';
					$sql_tmp_cmi .= ' main_industory_4 = ? or ';
					$sql_tmp_cmi .= ' main_industory_5 = ? or ';
					$sql_tmp_cmi .= ' main_industory_6 = ? ';
					array_push($data, $check_main_industory[$i]);
					array_push($data, $check_main_industory[$i]);
					array_push($data, $check_main_industory[$i]);
					array_push($data, $check_main_industory[$i]);
					array_push($data, $check_main_industory[$i]);
					array_push($data, $check_main_industory[$i]);
				}
			}

			$ary_sql = array($sql_tmp_cc, $sql_tmp_cmi);
			$sql_tmp_c = $this->_addWhereRelation($ary_sql, 'a');
		} elseif ('v2' == $search_cond['type']) {
			// 都市
			$sql_tmp_ct = '';
			$check_city = $search_cond['check_city'];
			for ($i = 0; $i < count($check_city); $i++) {
				if ('' != $check_city[$i]) {
					if ('' != $sql_tmp_ct) {
						$sql_tmp_ct .= ',';
					}
					$sql_tmp_ct .= " ? ";
					array_push($data, $check_city[$i]);
				}
			}
			if ('' != $sql_tmp_ct) {
				$sql_tmp_ct = ' city in ('.$sql_tmp_ct.') ';
			}

			// 業種（大分類）
			$sql_tmp_cmi = '';
			$check_main_industory = $search_cond['check_main_industory'];
			for ($i = 0; $i < count($check_main_industory); $i++) {
				if ('' != $check_main_industory[$i]) {
					if ('' != $sql_tmp_cmi) {
						$sql_tmp_cmi .= ' or ';
					}
					$sql_tmp_cmi .= ' main_industory_1 = ? or ';
					$sql_tmp_cmi .= ' main_industory_2 = ? or ';
					$sql_tmp_cmi .= ' main_industory_3 = ? or ';
					$sql_tmp_cmi .= ' main_industory_4 = ? or ';
					$sql_tmp_cmi .= ' main_industory_5 = ? or ';
					$sql_tmp_cmi .= ' main_industory_6 = ? ';
					array_push($data, $check_main_industory[$i]);
					array_push($data, $check_main_industory[$i]);
					array_push($data, $check_main_industory[$i]);
					array_push($data, $check_main_industory[$i]);
					array_push($data, $check_main_industory[$i]);
					array_push($data, $check_main_industory[$i]);
				}
			}

			$ary_sql = array($sql_tmp_ct, $sql_tmp_cmi);
			$sql_tmp_c = $this->_addWhereRelation($ary_sql, 'a');
		}

		// キーワード
		$sql_tmp_kw = '';
		$keyword = $search_cond['keyword'];
		if ('' != $keyword) {
			$ary_keyword = explode(' ', $keyword);
			for ($i = 0; $i < count($ary_keyword); $i++) {
				if ('' != $ary_keyword[$i]) {
					if ('' != $sql_tmp_kw) {
						$sql_tmp_kw .= ' or ';
					}
					$sql_tmp_kw .= ' search_key like ? ';
					array_push($data, '%'.$ary_keyword[$i].'%');
				}
			}
		}

		// これから or 含む過去
		$sql_tmp_y = '';
		if ('a' != $search_cond['year']) {
			$sql_tmp_y .= " concat(date_to_yyyy, '/', date_to_mm, '/', date_to_dd, ' 00:00:00') > now() ";
		}

		// リンク、チェックボックス、キーワード、これから？をAND
		$ary_sql = array($sql_tmp_l, $sql_tmp_c, $sql_tmp_kw, $sql_tmp_y);
		$sql_ext = $this->_addWhereRelation($ary_sql, 'a');

		return $sql_ext;
	}

	/**
	 * ソート方向（管理画面）
	 *
	 *  0:asc
	 *  1:desc
	 */
	var $sort_cond = array(' asc', ' desc');

	/**
	 * ソート項目（管理 展示会検索結果一覧画面）
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
	* ソート項目（管理 展示会集計画面）
	*
	* "0" :ユーザID
	* "1" :Webページの表示／非表示
	* "2" :承認フラグ
	* "3" :否認コメント
	* "4" :メール送信フラグ
	* "5" :ユーザ使用言語フラグ
	* "6" :Eメール
	* "7" :申請年月日
	* "8" :登録日(承認日)
	* "9" :言語選択情報
	* "10":見本市番号
	* "11":見本市名(日)
	* "12":見本市名(英)
	* "13":見本市略称
	* "14":見本市URL
	* "15":キャッチフレーズ(日)
	* "16":キャッチフレーズ(英)
	* "17":ＰＲ・紹介文(日)
	* "18":ＰＲ・紹介文(英)
	* "19":会期開始年
	* "20":会期開始月
	* "21":会期開始日
	* "22":会期終了年
	* "23":会期終了月
	* "24":会期終了日
	* "25":開催頻度
	* "26":業種大分類(1)
	* "27":業種小分類(1)
	* "28":業種大分類(2)
	* "29":業種小分類(2)
	* "30":業種大分類(3)
	* "31":業種小分類(3)
	* "32":業種大分類(4)
	* "33":業種小分類(4)
	* "34":業種大分類(5)
	* "35":業種小分類(5)
	* "36":業種大分類(6)
	* "37":業種小分類(6)
	* "38":出品物(日)
	* "39":出品物(英)
	* "40":開催地地域
	* "41":開催地国地域
	* "42":開催地都市
	* "43":開催地その他(日)
	* "44":開催地その他(英)
	* "45":会場名(日)
	* "46":会場名(英)
	* "47":開催予定規模
	* "48":入場資格
	* "49":チケットの入手方法(1)
	* "50":チケットの入手方法(2)
	* "51":チケットの入手方法(3)
	* "52":チケットの入手方法(4)
	* "53":チケットの入手方法その他(日)
	* "54":チケットの入手方法Others(英)
	* "55":過去の実績年実績
	* "56":過去の実績来場者数
	* "57":過去の実績海外来場者数
	* "58":過去の実績出展社数
	* "59":過去の実績海外出展社数
	* "60":過去の実績開催規模
	* "61":過去の実績認証機関
	* "62":主催者・問合せ先名称(日)
	* "63":主催者・問合せ先名称(英)
	* "64":主催者・問合せ先TEL
	* "65":主催者・問合せ先FAX
	* "66":主催者・問合せ先Email
	* "67":主催者・問合せ先住所
	* "68":主催者・問合せ先担当部課
	* "69":主催者・問合せ先担当者
	* "70":日本国内の照会先名称(日)
	* "71":日本国内の照会先名称(英)
	* "72":日本国内の照会先TEL
	* "73":日本国内の照会先FAX
	* "74":日本国内の照会先Email
	* "75":日本国内の照会先住所
	* "76":日本国内の照会先担当部課
	* "77":日本国内の照会先担当者
	* "78":見本市レポートURL
	* "79":世界の展示会場URL
	* "80":展示会に係わる画像名称1
	* "81":展示会に係わる画像名称2
	* "82":展示会に係わる画像名称3
	* "83":システム管理者備考欄
	* "84":データ管理者備考欄
	* "85":削除フラグ
	* "86":登録者ID
	* "87":更新者ID
	* "88":削除日時
	* "89":登録日
	* "90":更新日
	*/
	var $sort_summary_column = array(
		'user_id',
		'web_display_type',
		'confirm_flag',
		'negate_comment',
		'mail_send_flag',
		'use_language_flag',
		'email',
		'date_of_application',
		'date_of_registration',
		'select_language_info',
		'mihon_no',
		'fair_title_jp',
		'fair_title_en',
		'abbrev_title',
		'fair_url',
		'profile_jp',
		'profile_en',
		'detailed_information_jp',
		'detailed_information_en',
		'date_from_yyyy',
		'date_from_mm',
		'date_from_dd',
		'date_to_yyyy',
		'date_to_mm',
		'date_to_dd',
		'frequency',
		'main_industory_1',
		'sub_industory_1',
		'main_industory_2',
		'sub_industory_2',
		'main_industory_3',
		'sub_industory_3',
		'main_industory_4',
		'sub_industory_4',
		'main_industory_5',
		'sub_industory_5',
		'main_industory_6',
		'sub_industory_6',
		'exhibits_jp',
		'exhibits_en',
		'region',
		'country',
		'city',
		'other_city_jp',
		'other_city_en',
		'venue_jp',
		'venue_en',
		'gross_floor_area',
		'open_to',
		'admission_ticket_1',
		'admission_ticket_2',
		'admission_ticket_3',
		'admission_ticket_4',
		'other_admission_ticket_jp',
		'other_admission_ticket_en',
		'year_of_the_trade_fair',
		'total_number_of_visitor',
		'number_of_foreign_visitor',
		'total_number_of_exhibitors',
		'number_of_foreign_exhibitors',
		'net_square_meters',
		'spare_field1',
		'organizer_jp',
		'organizer_en',
		'organizer_tel',
		'organizer_fax',
		'organizer_email',
		'organizer_addr',
		'organizer_div',
		'organizer_pers',
		'agency_in_japan_jp',
		'agency_in_japan_en',
		'agency_in_japan_tel',
		'agency_in_japan_fax',
		'agency_in_japan_email',
		'agency_in_japan_addr',
		'agency_in_japan_div',
		'agency_in_japan_pers',
		'report_link',
		'venue_link',
		'photos_1',
		'photos_2',
		'photos_3',
		'note_for_system_manager',
		'note_for_data_manager',
		'del_flg',
		'regist_user_id',
		'update_user_id',
		'del_date',
		'regist_date',
		'update_date'
	);

	/**
	* 削除済みユーザデータ削除
	*
	* @param string $user_id 登録するEメール情報を持つ削除済みユーザID
	* @return string 結果
	*/
	function deleteUserInfo($user_id) {
		$db = $this->backend->getDB();
		$sql = "delete from jm_fair where user_id = ?";
		$stmt =& $db->db->prepare($sql);
		$param = array($user_id);
		$res = $db->db->execute($stmt, $param);
		if (DB::isError($res)) {
			$this->backend->getLogger()->log(LOG_ERR, 'jm_fair削除Errorが発生しました。');
			$this->ae->addObject('error', $res);
			return "NG";
		}
		return null;
	}

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

		// 検索条件をArray化
		$param = array($confirm_flag);

		// ソート条件を追加
		$sql_sort = '';
		for ($i = 0; $i < count($sort_list); $i++) {
			if (null != $sort_list[$i] && '' != $sort_list[$i]) {
				if ('' != $sort) {
					$sql_sort .= ', ? ';
				} else {
					$sql_sort = ' ? ';
				}
			}
			array_push($param, $sort_list[$i]);
		}

		// ページング
		$sql_limit = ' limit ?, ? ';
		array_push($param, (int)$offset, (int)$limit);

		// Prepare Statement化
		$stmt =& $db->db->prepare($sql.$sql_sort.$sql_limit);

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

		$sql = "select jf.confirm_flag, jf.mihon_no, jf.fair_title_jp, jf.abbrev_title, jf.date_from_yyyy, jf.date_from_mm, jf.date_from_dd, jf.date_to_yyyy, jf.date_to_mm, jf.date_to_dd, jf.region, jf.country, jf.city, jf.other_city_jp, jf.user_id, jf.date_of_application, jf.date_of_registration, jf.negate_comment, ju.email, jcm_1.discription_jp region_name, jcm_2.discription_jp country_name, jcm_3.discription_jp city_name from jm_fair jf left outer join jm_user ju on jf.user_id = ju.user_id left outer join (select kbn_2, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_3 = '000' and kbn_4 = '000') jcm_1 on jf.region = jcm_1.kbn_2 left outer join (select kbn_2, kbn_3, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_4 = '000') jcm_2 on jf.region = jcm_2.kbn_2 and jf.country = jcm_2.kbn_3 left outer join (select kbn_2, kbn_3, kbn_4, discription_jp, discription_en from jm_code_m where kbn_1 = '003') jcm_3 on jf.region = jcm_3.kbn_2 and jf.country = jcm_3.kbn_3 and jf.city = jcm_3.kbn_4";

		// 入力値
		$data = array();

		// where句の取得
		$sql_ext =$this->_getWhere($data);

		// sort
		// 入力値を取得
		$sql_sort = '';
		for ($i = 0; $i < count($ary_sort); $i++) {
			if ('' != $ary_sort[$i]) {
				if ('' == $sql_sort) {
					$sql_sort .= ' order by ';
				} else {
					$sql_sort .= ', ';
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
		$sql_limit = ' limit ?, ? ';
		array_push($data, (int)$offset, (int)$limit);

		$this->backend->getLogger()->log(LOG_DEBUG, 'SQL : '.$sql.$sql_ext.$sql_sort.$sql_limit);

		// Prepare Statement化
		$stmt =& $db->db->prepare($sql.$sql_ext.$sql_sort.$sql_limit);

		// SQLを実行
		$res = $db->db->execute($stmt, $data);
		// var_dump($data);

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

		$sql = "select jf.confirm_flag, jf.mihon_no, jf.fair_title_jp, jf.abbrev_title, jf.date_from_yyyy, jf.date_from_mm, jf.date_from_dd, jf.date_to_yyyy, jf.date_to_mm, jf.date_to_dd, jf.region, jf.country, jf.city, jf.other_city_jp, jf.user_id, jf.date_of_application, jf.date_of_registration, jf.negate_comment, ju.email, jcm_1.discription_jp region_name, jcm_2.discription_jp country_name, jcm_3.discription_jp city_name from jm_fair jf left outer join jm_user ju on jf.user_id = ju.user_id left outer join (select kbn_2, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_3 = '000' and kbn_4 = '000') jcm_1 on jf.region = jcm_1.kbn_2 left outer join (select kbn_2, kbn_3, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_4 = '000') jcm_2 on jf.region = jcm_2.kbn_2 and jf.country = jcm_2.kbn_3 left outer join (select kbn_2, kbn_3, kbn_4, discription_jp, discription_en from jm_code_m where kbn_1 = '003') jcm_3 on jf.region = jcm_3.kbn_2 and jf.country = jcm_3.kbn_3 and jf.city = jcm_3.kbn_4";

		// 入力値
		$data = array();

		// where句の取得
		$sql_ext =$this->_getWhere($data);

		$this->backend->getLogger()->log(LOG_DEBUG, 'SQL : select count(*) cnt from ('.$sql.$sql_ext.') t');

		// Prepare Statement化
		$stmt =& $db->db->prepare('select count(*) cnt from ('.$sql.$sql_ext.') t');

		// SQLを実行
		$res = $db->db->execute($stmt, $data);
		// var_dump($data);

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
	* 入力された追加集計項目の範囲設定
	*
	* ※日付は yyyy/mm/dd 00:00:00 から yyyy/mm/dd 23:59:59 とする
	*
	* @param string $cond 範囲条件
	* @param string $column カラム
	* @param string $num_from 入力値小
	* @param string $num_to 入力値大
	* @param string $data values
	* @return string 成功:作成SQL 失敗:空文字
	*/
	function _mkSqlAddSummary($cond, $column, $date_from, $date_to, &$data) {
		$sql = '';
		if('10' == $cond){
			//範囲内の場合
			if ('' != $date_from && '' != $date_to) {
				$sql = " $column <= ? and $column >= ? ";
				array_push($data, $date_to, $date_from);
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
		}elseif('11' == $cond){
			//範囲外の場合
			if ('' != $date_from && '' != $date_to) {
				$sql = " $column >= ? and $column <= ? ";
				array_push($data, $date_to, $date_from);
			} elseif ('' != $date_from) {
				$sql = " $column <= ? ";
				array_push($data, $date_from);
			} elseif ('' != $date_to) {
				$sql = " $column >= ? ";
				array_push($data, $date_to);
			} else {
				return '';
			}
			return $sql;
		}
	}

	/**
	 * チケット入手方法集計先
	 */
	var $sum_ticket_name = array(
		'',
		'登録の必要なし',
		'WEBからの事前登録',
		'主催者・日本の登録先へ問合せ',
		'当日会場で入手',
		'その他'
	);

	/**
	* 集計対象リスト総件数取得  //TODO
	*
	* @return int 集計対象リスト総件数
	*/
	function getFairSummarySearchCnt() {
		$db = $this->backend->getDB();
		$sql = "select jf.confirm_flag, jf.mihon_no, jf.fair_title_jp, jf.abbrev_title, jf.date_from_yyyy, jf.date_from_mm, jf.date_from_dd, jf.date_to_yyyy, jf.date_to_mm, jf.date_to_dd, jf.region, jf.country, jf.city, jf.other_city_jp, jf.user_id, jf.date_of_application, jf.date_of_registration, jf.negate_comment, ju.email, jcm_1.discription_jp region_name, jcm_2.discription_jp country_name, jcm_3.discription_jp city_name from jm_fair jf left outer join jm_user ju on jf.user_id = ju.user_id left outer join (select kbn_2, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_3 = '000' and kbn_4 = '000') jcm_1 on jf.region = jcm_1.kbn_2 left outer join (select kbn_2, kbn_3, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_4 = '000') jcm_2 on jf.region = jcm_2.kbn_2 and jf.country = jcm_2.kbn_3 left outer join (select kbn_2, kbn_3, kbn_4, discription_jp, discription_en from jm_code_m where kbn_1 = '003') jcm_3 on jf.region = jcm_3.kbn_2 and jf.country = jcm_3.kbn_3 and jf.city = jcm_3.kbn_4";

		$data = array();
		$sql_ext =$this->_getWhere($data);

		// 集計期間項目 追加条件
		// YYYY/MM/DDに形成
		if ('' != $search_cond['summary_value_from_yyyy']) {
			$date_from = $search_cond['summary_value_from_yyyy'].'/'.$search_cond['summary_value_from_mm'].'/'.$search_cond['summary_value_from_dd'].' 00:00:00';
		} else {
			$date_from = '';
		}
		if ('' != $search_cond['summary_value_to_yyyy']) {
			$date_to = $search_cond['summary_value_to_yyyy'].'/'.$search_cond['summary_value_to_mm'].'/'.$search_cond['summary_value_to_dd'].' 23:59:59';
		} else {
			$date_to = '';
		}
		$column = $this->sort_summary_column[$this->af->get('summary_value')];

		$sql_tmp = $this->_mkSqlAddSummary($search_cond['summary_value_hani_cond'], $column, $date_from, $date_to, $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);
		// Prepare Statement化
		$stmt =& $db->db->prepare('select count(*) cnt from ('.$sql.$sql_ext.') t');


		$this->backend->getLogger()->log(LOG_DEBUG, '$column★★★★★★★★★★★★ : '.$column);
		$this->backend->getLogger()->log(LOG_DEBUG, '$sql_tmp★★★★★★★★★★★★ : '.$sql_tmp);
		$this->backend->getLogger()->log(LOG_DEBUG, '$sql_ext★★★★★★★★★★★★ : '.$sql_ext);
		$this->backend->getLogger()->log(LOG_DEBUG, '$stmt★★★★★★★★★★★★ : '.$stmt);
		$res = $db->db->execute($stmt, $data);
		// 結果の判定
		if (null == $res) {
			$this->backend->getLogger()->log(LOG_ERR, '検索結果が取得できません。');
			return null;
		}
		if (DB::isError($res)) {
			$msg = '検索Errorが発生しました。';
			$this->backend->getLogger()->log(LOG_ERR, $msg);
			$this->ae->add('error', $msg);
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
	* 集計対象リスト取得（表示用）。  //TODO
	*
	* @return array 見本市リスト
	*/
	function getFairSummarySearch($offset, $limit, $ary_sort, $ary_sort_cond) {
		$db = $this->backend->getDB();

		//SELECT句 集計キーによって可変
		$sql_select = '';
		for ($i = 0; $i < count($ary_sort); $i++) {
			if ('' != $ary_sort[$i]) {
				if ('' == $sql_select) {
					$sql_select .= ' select ';
				} else {
					$sql_select .= ' , ';
				}
				$sql_select .= $this->sort_summary_column[$ary_sort[$i]];
			}
		}

		//$sql = "select jf.confirm_flag, jf.mihon_no, jf.fair_title_jp, jf.abbrev_title, jf.date_from_yyyy, jf.date_from_mm, jf.date_from_dd, jf.date_to_yyyy, jf.date_to_mm, jf.date_to_dd, jf.region, jf.country, jf.city, jf.other_city_jp, jf.user_id, jf.date_of_application, jf.date_of_registration, jf.negate_comment, ju.email, jcm_1.discription_jp region_name, jcm_2.discription_jp country_name, jcm_3.discription_jp city_name from jm_fair jf left outer join jm_user ju on jf.user_id = ju.user_id left outer join (select kbn_2, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_3 = '000' and kbn_4 = '000') jcm_1 on jf.region = jcm_1.kbn_2 left outer join (select kbn_2, kbn_3, discription_jp, discription_en from jm_code_m where kbn_1 = '003' and kbn_4 = '000') jcm_2 on jf.region = jcm_2.kbn_2 and jf.country = jcm_2.kbn_3 left outer join (select kbn_2, kbn_3, kbn_4, discription_jp, discription_en from jm_code_m where kbn_1 = '003') jcm_3 on jf.region = jcm_3.kbn_2 and jf.country = jcm_3.kbn_3 and jf.city = jcm_3.kbn_4";
		$sql = $sql_select." from jm_fair ";
		$data = array();
		$sql_ext =$this->_getWhere($data);

		// 集計期間項目 追加条件
		if ('' != $search_cond['summary_value_from_yyyy']) {
			$date_from = $search_cond['summary_value_from_yyyy'].'/'.$search_cond['summary_value_from_mm'].'/'.$search_cond['summary_value_from_dd'].' 00:00:00';
		} else {
			$date_from = '';
		}
		if ('' != $search_cond['summary_value_to_yyyy']) {
			$date_to = $search_cond['summary_value_to_yyyy'].'/'.$search_cond['summary_value_to_mm'].'/'.$search_cond['summary_value_to_dd'].' 23:59:59';
		} else {
			$date_to = '';
		}
		$column = $this->sort_summary_column[$this->af->get('summary_value')];
		$sql_tmp = $this->_mkSqlAddSummary($search_cond['summary_value_hani_cond'], $column, $date_from, $date_to, $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		//Group By
		$sql_groupby = '';
		for ($i = 0; $i < count($ary_sort); $i++) {
			if ('' != $ary_sort[$i]) {
				if ('' == $sql_groupby) {
					$sql_groupby .= ' group by ';
				} else {
					$sql_groupby .= ', ';
				}
				$sql_groupby .= $this->sort_summary_column[$ary_sort[$i]];
			}
		}

		//Order By
		$sql_sort = '';
		for ($i = 0; $i < count($ary_sort); $i++) {
			if ('' != $ary_sort[$i]) {
				if ('' == $sql_sort) {
					$sql_sort .= ' order by ';
				} else {
					$sql_sort .= ', ';
				}
				$sql_sort .= $this->sort_summary_column[$ary_sort[$i]];
				$sql_sort .= $this->sort_cond[$ary_sort_cond[$i]];
			}
		}

		// ページング
		$sql_limit = ' limit ?, ? ';
		array_push($data, (int)$offset, (int)$limit);

		$this->backend->getLogger()->log(LOG_DEBUG, 'SQL★★★★★★★★★★★★★★ : '.$sql.$sql_ext.$sql_groupby.$sql_sort.$sql_limit);

		$stmt =& $db->db->prepare($sql.$sql_ext.$sql_groupby.$sql_sort.$sql_limit);

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
	 * 見本市リスト取得（ダウンロード用）。
	 *
	 * @param array $ary_sort ソート項目
	 * @param array $ary_sort_cond ソート方法
	 * @return array 見本市リスト
	 */
	function getFairListDownload($ary_sort, $ary_sort_cond) {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		$sql = 'select jf.user_id, jf.date_of_application, jf.date_of_registration, jf.fair_title_jp, jf.fair_title_en, jf.abbrev_title, jf.fair_url, jf.mihon_no, jf.profile_jp, jf.profile_en, jf.detailed_information_jp, jf.detailed_information_en, jf.date_from_yyyy, jf.date_from_mm, jf.date_from_dd, jf.date_to_yyyy, jf.date_to_mm, jf.date_to_dd, jf.frequency, jf.main_industory_1, jf.sub_industory_1, jf.main_industory_2, jf.sub_industory_2, jf.main_industory_3, jf.sub_industory_3, jf.main_industory_4, jf.sub_industory_4, jf.main_industory_5, jf.sub_industory_5, jf.main_industory_6, jf.sub_industory_6, jf.exhibits_jp, jf.exhibits_en, jf.region, jf.country, jf.city, jf.other_city_jp, jf.other_city_en, jf.venue_jp, jf.venue_en, jf.venue_url, jf.gross_floor_area, jf.transportation_jp, jf.transportation_en, jf.open_to, jf.admission_ticket_1, jf.admission_ticket_2, jf.admission_ticket_3, jf.admission_ticket_4, jf.other_admission_ticket_jp, jf.other_admission_ticket_en, jf.year_of_the_trade_fair, jf.total_number_of_visitor, jf.number_of_foreign_visitor, jf.total_number_of_exhibitors, jf.number_of_foreign_exhibitors, jf.net_square_meters, jf.spare_field1, jf.app_dead_yyyy, jf.app_dead_mm, jf.app_dead_dd, jf.organizer_jp, jf.organizer_en, jf.organizer_tel, jf.organizer_fax, jf.organizer_email, jf.organizer_addr, jf.organizer_div, jf.organizer_pers, jf.agency_in_japan_jp, jf.agency_in_japan_en, jf.agency_in_japan_tel, jf.agency_in_japan_fax, jf.agency_in_japan_email, jf.agency_in_japan_addr, jf.agency_in_japan_div, jf.agency_in_japan_pers, jf.photos_1, jf.photos_2, jf.photos_3, jf.select_language_info, jf.report_link, jf.venue_link, jf.keyword, jf.jetro_suport, jf.jetro_suport_url, jf.use_language_flag, jf.web_display_type, jf.regist_type, jf.note_for_system_manager, jf.note_for_data_manager, jf.confirm_flag, jf.negate_comment, jf.mail_send_flag, jf.del_flg, jf.del_date, jf.regist_user_id, jf.regist_date, jf.update_user_id, jf.update_date from jm_fair jf left outer join jm_user ju on jf.user_id = ju.user_id';

		// 入力値
		$data = array();

		// where句の取得
		$sql_ext =$this->_getWhere($data);

		// sort
		// 入力値を取得
		for ($i = 0; $i < count($ary_sort); $i++) {
			if ('' != $ary_sort[$i]) {
				if ('' == $sql_sort) {
					$sql_sort .= ' order by ';
				} else {
					$sql_sort .= ', ';
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
		// var_dump($data);

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
	 * 見本市リスト取得（詳細ページング用）。
	 *
	 * @param array $ary_sort ソート項目
	 * @param array $ary_sort_cond ソート方法
	 * @return array 見本市リスト
	 */
	function getFairListDetailPaging($ary_sort, $ary_sort_cond) {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		$sql = 'select jf.mihon_no from jm_fair jf left outer join jm_user ju on jf.user_id = ju.user_id';

		// 入力値
		$data = array();

		// where句の取得
		$sql_ext =$this->_getWhere($data);

		// sort
		// 入力値を取得
		for ($i = 0; $i < count($ary_sort); $i++) {
			if ('' != $ary_sort[$i]) {
				if ('' == $sql_sort) {
					$sql_sort .= ' order by ';
				} else {
					$sql_sort .= ', ';
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
		// var_dump($data);

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
		// 見本市番号
		$sql_tmp = $this->_mkSqlNumber('mihon_no', 'mihon_no',$search_cond['mihon_no_from'], $search_cond['mihon_no_to'], $search_cond['mihon_no_cond'], $data);
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
		$sql_tmp = $this->_mkSqlIndustory($search_cond['main_industory'], $search_cond['sub_industory'], 'a', $data);
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
 		// 開催地は常にand
 		$sql_tmp = $this->_addWhereRelation($ary_sql, 'a');
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
		$sql_tmp = $this->_mkSqlNumber('gross_floor_area', 'gross_floor_area', $search_cond['gross_floor_area_from'], $search_cond['gross_floor_area_to'], $search_cond['gross_floor_area_cond'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

		// 入場資格
		$sql_tmp = $this->_mkSqlCheckBox1('open_to', $search_cond['open_to'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

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
		$sql_tmp_2 = $this->_mkSqlNumber('total_number_of_visitor', 'total_number_of_visitor', $search_cond['total_number_of_visitor_from'], $search_cond['total_number_of_visitor_to'], $search_cond['total_number_of_visitor_cond'], $data);
		// 過去の実績(うち海外から)
		$sql_tmp_3 = $this->_mkSqlNumber('number_of_foreign_visitor', 'number_of_foreign_visitor', $search_cond['number_of_foreign_visitor_from'], $search_cond['number_of_foreign_visitor_to'], $search_cond['number_of_foreign_visitor_cond'], $data);
		// 過去の実績(出展社数)
		$sql_tmp_4 = $this->_mkSqlNumber('total_number_of_exhibitors', 'total_number_of_exhibitors', $search_cond['total_number_of_exhibitors_from'], $search_cond['total_number_of_exhibitors_to'], $search_cond['total_number_of_exhibitors_cond'], $data);
		// 過去の実績(うち海外から)
		$sql_tmp_5 = $this->_mkSqlNumber('number_of_foreign_exhibitors', 'number_of_foreign_exhibitors', $search_cond['number_of_foreign_exhibitors_from'], $search_cond['number_of_foreign_exhibitors_to'], $search_cond['number_of_foreign_exhibitors_cond'], $data);
		// 過去の実績(展示面積)
		$sql_tmp_6 = $this->_mkSqlText('net_square_meters', $search_cond['net_square_meters'], $search_cond['net_square_meters_cond'], $search_cond['relation'], $data);
		// 過去の実績(認証機関)
		$sql_tmp_7 = $this->_mkSqlText('spare_field1', $search_cond['spare_field1'], $search_cond['spare_field1_cond'], $search_cond['relation'], $data);
		// 同一項目なので
		$ary_sql = array($sql_tmp_1, $sql_tmp_2, $sql_tmp_3, $sql_tmp_4, $sql_tmp_5, $sql_tmp_6, $sql_tmp_7);
		$sql_tmp = $this->_addWhereRelation($ary_sql, $search_cond['relation']);
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
 		$sql_tmp = $this->_mkSqlPhotos($search_cond['photos_cond']);
// 		$sql_tmp = $this->_mkSqlPhotos($search_cond['photos'], $search_cond['photos_cond'], $search_cond['relation'], $data);
		$sql_ext = $this->_addWhere($sql_ext, $sql_tmp, $search_cond['connection']);

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
					$sql .= ' '.$this->_changeRelation($phrase_connection).' ';
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
			// 一致の時は完全一致
			$sql .= $column.' = ? ';
			array_push($data, $text);
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql) {
// 						$sql .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql .= $column.' = ? ';
// 					array_push($data, $value[$i]);
// 				}
// 			}
		} elseif ('2' == $cond) {
			// 不一致
			// 不一致の時も完全不一致
			$sql .= $column.' <> ? ';
			array_push($data, $text);
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql) {
// 						$sql .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql .= $column.' <> ? ';
// 					array_push($data, $value[$i]);
// 				}
// 			}
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
			$sql .= " (main_industory_1 = ? ".$this->_changeRelation($relation)." sub_industory_1 = ?) or ";
			array_push($data, $main_industory, $sub_industory);
			$sql .= " (main_industory_2 = ? ".$this->_changeRelation($relation)." sub_industory_2 = ?) or ";
			array_push($data, $main_industory, $sub_industory);
			$sql .= " (main_industory_3 = ? ".$this->_changeRelation($relation)." sub_industory_3 = ?) or ";
			array_push($data, $main_industory, $sub_industory);
			$sql .= " (main_industory_4 = ? ".$this->_changeRelation($relation)." sub_industory_4 = ?) or ";
			array_push($data, $main_industory, $sub_industory);
			$sql .= " (main_industory_5 = ? ".$this->_changeRelation($relation)." sub_industory_5 = ?) or ";
			array_push($data, $main_industory, $sub_industory);
			$sql .= " (main_industory_6 = ? ".$this->_changeRelation($relation)." sub_industory_6 = ?) ";
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
			array_push($data, $sub_industory);
			$sql .= " sub_industory_2 = ? or ";
			array_push($data, $sub_industory);
			$sql .= " sub_industory_3 = ? or ";
			array_push($data, $sub_industory);
			$sql .= " sub_industory_4 = ? or ";
			array_push($data, $sub_industory);
			$sql .= " sub_industory_5 = ? or ";
			array_push($data, $sub_industory);
			$sql .= " sub_industory_6 = ?";
			array_push($data, $sub_industory);
		}
		return $sql;
	}

	/**
	 * 単一の日付が範囲内に存在するか？。
	 *
	 * 申請年月日
	 * 登録日(承認日)
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
	 * 展示会に係わる画像(3点)
	 *
	 * Enter description here ...
	 * @param string $photos 入力値
	 * @param string $photos_cond 検索条件
	 * @param string_type $relation 項目内の関連
	 * @param array $data values
	 * @return string 成功:作成SQL 失敗:空文字
	 */
	function _mkSqlPhotos($photos_cond) {
		if ('12' == $photos_cond) {
			$sql = " photos_1 <> '' or photos_2 <> '' or photos_3 <> '' ";
		} elseif ('13' == $photos_cond) {
			$sql = " photos_1 = '' and photos_2 = '' and photos_3 = '' ";
		}

		return $sql;

	}
// 	function _mkSqlPhotos($photos, $photos_cond, $relation, &$data) {
// 		if ('' == $photos && '12' != $photos_cond && '13' != $photos_cond) {
// 			return '';
// 		}

// 		$value = explode(' ', $photos);

// 		$sql ='';
// 		if ('1' == $photos_cond) {
// 			$sql_1 = '';
// 			$sql_2 = '';
// 			$sql_3 = '';
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_1) {
// 						$sql_1 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_1 .= ' photos_1 = ? ';
// 					array_push($data, $value[$i]);
// 				}
// 			}
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_2) {
// 						$sql_2 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_2 .= ' photos_2 = ? ';
// 					array_push($data, $value[$i]);
// 				}
// 			}
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_3) {
// 						$sql_3 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_3 .= ' photos_3 = ? ';
// 					array_push($data, $value[$i]);
// 				}
// 			}
// 			$sql = '('.$sql_1.') or ('.$sql_2.') or ('.$sql_3.')';
// 		} elseif ('2' == $photos_cond) {
// 			$sql_1 = '';
// 			$sql_2 = '';
// 			$sql_3 = '';
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_1) {
// 						$sql_1 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_1 .= ' photos_1 <> ? ';
// 					array_push($data, $value[$i]);
// 				}
// 			}
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_2) {
// 						$sql_2 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_2 .= ' photos_2 <> ? ';
// 					array_push($data, $value[$i]);
// 				}
// 			}
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_3) {
// 						$sql_3 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_3 .= ' photos_3 <> ? ';
// 					array_push($data, $value[$i]);
// 				}
// 			}
// 			$sql = '('.$sql_1.') or ('.$sql_2.') or ('.$sql_3.')';
// 		} elseif ('3' == $photos_cond) {
// 			$sql_1 = '';
// 			$sql_2 = '';
// 			$sql_3 = '';
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_1) {
// 						$sql_1 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_1 .= ' photos_1 like ? ';
// 					array_push($data, $value[$i].'%');
// 				}
// 			}
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_2) {
// 						$sql_2 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_2 .= ' photos_2 like ? ';
// 					array_push($data, $value[$i].'%');
// 				}
// 			}
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_3) {
// 						$sql_3 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_3 .= ' photos_3 like ? ';
// 					array_push($data, $value[$i].'%');
// 				}
// 			}
// 			$sql = '('.$sql_1.') or ('.$sql_2.') or ('.$sql_3.')';
// 		} elseif ('4' == $photos_cond) {
// 			$sql_1 = '';
// 			$sql_2 = '';
// 			$sql_3 = '';
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_1) {
// 						$sql_1 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_1 .= ' photos_1 not like ? ';
// 					array_push($data, $value[$i].'%');
// 				}
// 			}
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_2) {
// 						$sql_2 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_2 .= ' photos_2 not like ? ';
// 					array_push($data, $value[$i].'%');
// 				}
// 			}
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_3) {
// 						$sql_3 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_3 .= ' photos_3 not like ? ';
// 					array_push($data, $value[$i].'%');
// 				}
// 			}
// 			$sql = '('.$sql_1.') or ('.$sql_2.') or ('.$sql_3.')';
// 		} elseif ('5' == $photos_cond) {
// 			$sql_1 = '';
// 			$sql_2 = '';
// 			$sql_3 = '';
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_1) {
// 						$sql_1 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_1 .= ' photos_1 like ? ';
// 					array_push($data, '%'.$value[$i].'%');
// 				}
// 			}
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_2) {
// 						$sql_2 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_2 .= ' photos_2 like ? ';
// 					array_push($data, '%'.$value[$i].'%');
// 				}
// 			}
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_3) {
// 						$sql_3 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_3 .= ' photos_3 like ? ';
// 					array_push($data, '%'.$value[$i].'%');
// 				}
// 			}
// 			$sql = '('.$sql_1.') or ('.$sql_2.') or ('.$sql_3.')';
// 		} elseif ('6' == $photos_cond) {
// 			$sql_1 = '';
// 			$sql_2 = '';
// 			$sql_3 = '';
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_1) {
// 						$sql_1 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_1 .= ' photos_1 not like ? ';
// 					array_push($data, '%'.$value[$i].'%');
// 				}
// 			}
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_2) {
// 						$sql_2 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_2 .= ' photos_2 not like ? ';
// 					array_push($data, '%'.$value[$i].'%');
// 				}
// 			}
// 			for ($i = 0; $i < count($value); $i++) {
// 				if ('' != $value[$i]) {
// 					if ('' != $sql_3) {
// 						$sql_3 .= ' '.$this->_changeRelation($relation).' ';
// 					}
// 					$sql_3 .= ' photos_3 not like ? ';
// 					array_push($data, '%'.$value[$i].'%');
// 				}
// 			}
// 			$sql = '('.$sql_1.') or ('.$sql_2.') or ('.$sql_3.')';
// 		} elseif ('7' == $photos_cond) {
// 		} elseif ('8' == $photos_cond) {
// 		} elseif ('9' == $photos_cond) {
// 		} elseif ('12' == $photos_cond) {
// 			$sql = " photos_1 <> '' or photos_2 <> '' or photos_3 <> '' ";
// 		} elseif ('13' == $photos_cond) {
// 			$sql = " photos_1 = '' and photos_2 = '' and photos_3 = '' ";
// 		}

// 		return $sql;
// 	}

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


	function getFairDateVenue($date_from, $date_to, $venue) {

		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL
		$sql = "select mihon_no, fair_title_jp, fair_title_en, concat(date_from_yyyy, date_from_mm, date_from_dd) date_from, concat(date_to_yyyy, date_to_mm, date_to_dd) date_to, concat(region, country, city) venue, concat(main_industory_1, sub_industory_1) industory_1, concat(main_industory_2, sub_industory_2) industory_2, concat(main_industory_3, sub_industory_3) industory_3, concat(main_industory_4, sub_industory_4) industory_4, concat(main_industory_5, sub_industory_5) industory_5, concat(main_industory_6, sub_industory_6) industory_6 from jm_fair jf where del_flg <> '1' and concat(date_from_yyyy, date_from_mm, date_from_dd) = ? and concat(date_to_yyyy, date_to_mm, date_to_dd) = ? and concat(region, country, city) = ? order by regist_date desc";

		// Array化
		$param = array($date_from, $date_to, $venue);

		// Prepare Statement化
		$this->backend->getLogger()->log(LOG_DEBUG, '■sql : '.$sql);
		$stmt =& $db->db->prepare($sql);

		// SQLを実行
		$res = $db->db->execute($stmt, $param);

		// 結果の判定
		if (null == $res) {
			$this->backend->getLogger()->log(LOG_ERR, '検索結果が取得できません。');
			return null;
		}
		if (DB::isError($res)) {
			$msg = '検索Errorが発生しました。';
			$this->backend->getLogger()->log(LOG_ERR, $msg);
			$this->ae->add('error', $msg);
			return null;
		}
		if (0 == $res->numRows()) {
			$this->backend->getLogger()->log(LOG_WARNING, '検索件数が0件です。');
			return null;
		}

		// リスト化
		$i = 0;
		while ($row =& $res->fetchRow(DB_FETCHMODE_ASSOC)) {
			$list[$i] = $row;
			$i++;
		}

		return $list;
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
