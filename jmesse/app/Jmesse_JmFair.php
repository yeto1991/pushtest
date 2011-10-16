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
		$res = $db->db->execute($sql, $param);

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

	function getFairListConfirm($confirm_flag, $sort_list) {
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
		if ('' == $sort) {
			$sort = 'fair_title_jp asc';
		}
		$sql .= $sort;

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
			$data[$i] = $tmp;
			$i ++;
		}

		return $data;
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
