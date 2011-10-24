<?php
/**
 *  Jmesse_JmFairCnt.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 82fb28d30e5eeac17975be5c2e3c1f3eb2c3efda $
 */

/**
 *  Jmesse_JmFairCntManager
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_JmFairCntManager extends Ethna_AppManager
{
	/**
	 * 業種（大分類）の集計値リストを取得する。
	 *
	 * @return array 集計値リスト
	 */
	function getFairCntListMainIndustory() {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = "select jcm.kbn_1, jcm.kbn_2, jcm.kbn_3, jcm.kbn_4, jcm.discription_jp, jcm.discription_en, jcm.disp_cd, jcm.disp_num, jcm.reserve_1, jcm.reserve_2, jcm.reserve_3, jcm.reserve_4, jcm.reserve_5, jcm.reserve_6, jfc.venue_kbn, ifnull(jfc.fair_cnt, 0) fair_cnt from jm_code_m jcm left outer join jm_fair_cnt jfc on jcm.kbn_1 = jfc.kbn_1 and jcm.kbn_2 = jfc.kbn_2 and jfc.kbn_3 = jcm.kbn_3 and jfc.kbn_4 = jcm.kbn_4 where jcm.kbn_1 = '002' and jcm.kbn_3 = '000' and jcm.kbn_4 = '000' order by jcm.kbn_2 asc";

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

		// リスト化
		$i = 0;
		while ($tmp = $res->fetchRow(DB_FETCHMODE_ASSOC)) {
			$list[$i] = $tmp;
			$i ++;
		}

		return $list;
	}

	/**
	 * kbn_3の集計リストを取得する。
	 *
	 * 業種（小分類）
	 *
	 * @param string $kbn_2 区分2
	 * @return array 集計値リスト
	 */
	function getFairCntListSubIndustory($kbn_2) {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = "select jcm.kbn_1, jcm.kbn_2, jcm.kbn_3, jcm.kbn_4, jcm.discription_jp, jcm.discription_en, jcm.disp_cd, jcm.disp_num, jcm.reserve_1, jcm.reserve_2, jcm.reserve_3, jcm.reserve_4, jcm.reserve_5, jcm.reserve_6, jfc.venue_kbn, ifnull(jfc.fair_cnt, 0) fair_cnt from jm_code_m jcm left outer join jm_fair_cnt jfc on jcm.kbn_1 = jfc.kbn_1 and jcm.kbn_2 = jfc.kbn_2 and jfc.kbn_3 = jcm.kbn_3 and jfc.kbn_4 = jcm.kbn_4 where jcm.kbn_1 = '002' and jcm.kbn_2 = ? and jcm.kbn_3 <> '000' and jcm.kbn_4 = '000' order by kbn_3 asc";

		// Prepare Statement化
		$stmt =& $db->db->prepare($sql);

		// 検索条件をArray化
		$param = array($kbn_2);

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
	 * 地域の集計値リストを取得する。
	 *
	 * @return array 集計値リスト
	 */
	function getFairCntListRegion() {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = "select jcm.kbn_1, jcm.kbn_2, jcm.kbn_3, jcm.kbn_4, jcm.discription_jp, jcm.discription_en, jcm.disp_cd, jcm.disp_num, jcm.reserve_1, jcm.reserve_2, jcm.reserve_3, jcm.reserve_4, jcm.reserve_5, jcm.reserve_6, jfc.venue_kbn, ifnull(jfc.fair_cnt, 0) fair_cnt from jm_code_m jcm left outer join jm_fair_cnt jfc on jcm.kbn_1 = jfc.kbn_1 and jcm.kbn_2 = jfc.kbn_2 and jfc.kbn_3 = jcm.kbn_3 and jfc.kbn_4 = jcm.kbn_4 where jcm.kbn_1 = '003' and jcm.kbn_2 <> '001' and jcm.kbn_3 = '000' and jcm.kbn_4 = '000' order by kbn_2 asc";

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

		// リスト化
		$i = 0;
		while ($tmp = $res->fetchRow(DB_FETCHMODE_ASSOC)) {
			$list[$i] = $tmp;
			$i ++;
		}

		return $list;
	}

	/**
	 * 国・地域の集計リストを取得する。
	 *
	 * @param string $kbn_2 区分2
	 * @return array 集計値リスト
	 */
	function getFairCntListCountry($kbn_2) {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = "select jcm.kbn_1, jcm.kbn_2, jcm.kbn_3, jcm.kbn_4, jcm.discription_jp, jcm.discription_en, jcm.disp_cd, jcm.disp_num, jcm.reserve_1, jcm.reserve_2, jcm.reserve_3, jcm.reserve_4, jcm.reserve_5, jcm.reserve_6, jfc.venue_kbn, ifnull(jfc.fair_cnt, 0) fair_cnt from jm_code_m jcm left outer join jm_fair_cnt jfc on jcm.kbn_1 = jfc.kbn_1 and jcm.kbn_2 = jfc.kbn_2 and jfc.kbn_3 = jcm.kbn_3 and jfc.kbn_4 = jcm.kbn_4 where jcm.kbn_1 = '003' and jcm.kbn_2 = ? and jcm.kbn_3 not in ('000', '001') and jcm.kbn_4 = '000' order by kbn_3 asc";

		// Prepare Statement化
		$stmt =& $db->db->prepare($sql);

		// 検索条件をArray化
		$param = array($kbn_2);

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
	 * 都市の集計値リストを取得する。
	 *
	 * @param string $kbn_2 区分2
	 * @param string $kbn_3 区分3
	 * @return array 集計値リスト
	 */
	function getFairCntListCity($kbn_2, $kbn_3) {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = "select jcm.kbn_1, jcm.kbn_2, jcm.kbn_3, jcm.kbn_4, jcm.discription_jp, jcm.discription_en, jcm.disp_cd, jcm.disp_num, jcm.reserve_1, jcm.reserve_2, jcm.reserve_3, jcm.reserve_4, jcm.reserve_5, jcm.reserve_6, jfc.venue_kbn, ifnull(jfc.fair_cnt, 0) fair_cnt from jm_code_m jcm left outer join jm_fair_cnt jfc on jcm.kbn_1 = jfc.kbn_1 and jcm.kbn_2 = jfc.kbn_2 and jfc.kbn_3 = jcm.kbn_3 and jfc.kbn_4 = jcm.kbn_4 where jcm.kbn_1 = '003' and jcm.kbn_2 = ? and jcm.kbn_3 = ? and jcm.kbn_4 <> '000' order by kbn_4 asc";

		// Prepare Statement化
		$stmt =& $db->db->prepare($sql);

		// 検索条件をArray化
		$param = array($kbn_2, $kbn_3);

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
	 * 産業別リスト時に表示する国・地域。
	 *
	 * @return array 集計値リスト
	 */
	function getFairCntListCountryDisp() {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = "select jcm.kbn_2, jcm.kbn_3, jcm.kbn_4, jcm.discription_jp, jcm.discription_en, jcm.disp_cd, jcm.disp_num, jfc.venue_kbn, ifnull(jfc.fair_cnt, 0) fair_cnt from (select * from jm_code_m where kbn_1 = '003') jcm left outer join (select * from jm_fair_cnt where kbn_1 = '003') jfc on jcm.kbn_2 = jfc.kbn_2 and jcm.kbn_3 = jfc.kbn_3 and jcm.kbn_4 = jfc.kbn_4 where jcm.kbn_2 <> '001' and jcm.kbn_3 not in ('000', '001') and jcm.kbn_4 = '000' and jcm.disp_cd = '1' order by jcm.kbn_2 asc, jcm.disp_num asc";

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

		// リスト化
		$i = 0;
		while ($tmp = $res->fetchRow(DB_FETCHMODE_ASSOC)) {
			$list[$i] = $tmp;
			$i ++;
		}

		return $list;
	}

	/**
	 * 産業別リスト時に隠す国・地域。
	 *
	 * @return array 集計値リスト
	 */
	function getFairCntListCountryClose() {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = "select jcm.kbn_2, jcm.kbn_3, jcm.kbn_4, jcm.discription_jp, jcm.discription_en, jcm.disp_cd, jcm.disp_num, jfc.venue_kbn, ifnull(jfc.fair_cnt, 0) fair_cnt from (select * from jm_code_m where kbn_1 = '003') jcm left outer join (select * from jm_fair_cnt where kbn_1 = '003') jfc on jcm.kbn_2 = jfc.kbn_2 and jcm.kbn_3 = jfc.kbn_3 and jcm.kbn_4 = jfc.kbn_4 where jcm.kbn_2 <> '001' and jcm.kbn_3 not in ('000', '001') and jcm.kbn_4 = '000' and jcm.disp_cd = '0' order by jcm.kbn_2 asc, jcm.disp_num asc";

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

		// リスト化
		$i = 0;
		while ($tmp = $res->fetchRow(DB_FETCHMODE_ASSOC)) {
			$list[$i] = $tmp;
			$i ++;
		}

		return $list;
	}

	/**
	* 産業別リスト時に隠す国・地域の数を含む地域のリスト。
	*
	* @return array 集計値リスト
	*/
	function getFairCntListRegionIndustory() {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// SQL作成
		$sql = "select t1.kbn_1, t1.kbn_2, t1.kbn_3, t1.kbn_4, t1.discription_jp, t1.discription_en, t1.disp_cd, t1.disp_num, t1.reserve_1, t1.reserve_2, t1.reserve_3, t1.reserve_4, t1.reserve_5, t1.reserve_6, t1.venue_kbn, t1.fair_cnt, ifnull(sum(t2.cnt), 0) cnt from (select jcm.kbn_1, jcm.kbn_2, jcm.kbn_3, jcm.kbn_4, jcm.discription_jp, jcm.discription_en, jcm.disp_cd, jcm.disp_num, jcm.reserve_1, jcm.reserve_2, jcm.reserve_3, jcm.reserve_4, jcm.reserve_5, jcm.reserve_6, jfc.venue_kbn, ifnull(jfc.fair_cnt, 0) fair_cnt from jm_code_m jcm left outer join jm_fair_cnt jfc on jcm.kbn_1 = jfc.kbn_1 and jcm.kbn_2 = jfc.kbn_2 and jfc.kbn_3 = jcm.kbn_3 and jfc.kbn_4 = jcm.kbn_4 where jcm.kbn_1 = '003' and jcm.kbn_2 <> '001' and jcm.kbn_3 = '000' and jcm.kbn_4 = '000' order by kbn_2 asc) t1 left outer join (select kbn_2, count(*) cnt from jm_code_m where kbn_1 = '003' and kbn_2 not in ('000', '001') and kbn_3 not in ('000', '001') and kbn_4 = '000' and disp_cd = '0' group by kbn_2) t2 on t1.kbn_2 = t2.kbn_2 group by t1.kbn_2";

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

		// リスト化
		$i = 0;
		while ($tmp = $res->fetchRow(DB_FETCHMODE_ASSOC)) {
			$list[$i] = $tmp;
			$i ++;
		}

		return $list;
	}

}

/**
 *  Jmesse_JmFairCnt
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_JmFairCnt extends Ethna_AppObject
{
	/**
	 *  @var    array   テーブル定義
	 */
	var $table_def = array(
		'jm_fair_cnt' => array(
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
