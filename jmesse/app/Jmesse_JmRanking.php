<?php
/**
 *  Jmesse_JmRanking.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 82fb28d30e5eeac17975be5c2e3c1f3eb2c3efda $
 */

/**
 *  Jmesse_JmRankingManager
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_JmRankingManager extends Ethna_AppManager
{
	function countUp($mihon_no, $venue_kbn) {
		// DBオブジェクト取得
		$db = $this->backend->getDB();

		// トランザクション開始
		$db->db->autocommit(false);
		$db->begin();

		// 現在の年月
		$ranking_yyyymm = date('Ym');

		// SQL
		$sql = 'select count(*) cnt from jm_ranking where mihon_no = ? and ranking_yyyymm = ? and venue_kbn = ?';

		// Prepare Statement化
		$stmt =& $db->db->prepare($sql);

		// 検索条件をArray化
		$param = array((int)$mihon_no, $ranking_yyyymm, $venue_kbn);

		// SQLを実行
		$res = $db->db->execute($stmt, $param);

		// 結果の判定
		if (null == $res) {
			$this->backend->getLogger()->log(LOG_ERR, '検索結果が取得できません。');
			$db->rollback();
			return null;
		}
		if (DB::isError($res)) {
			$msg = '検索Errorが発生しました。';
			$this->backend->getLogger()->log(LOG_ERR, $msg);
			$this->backend->getActionError()->addObject('error', $res);
			$db->rollback();
			return null;
		}
		if (0 == $res->numRows()) {
			$this->backend->getLogger()->log(LOG_WARNING, '検索件数が0件です。');
			$db->rollback();
			return null;
		}

		// リスト化
		$row = $res->fetchRow(DB_FETCHMODE_ASSOC);
		if (0 == $row['cnt']) {
			// insert
			$jm_ranking =& $this->backend->getObject('JmRanking');
			$jm_ranking->set('mihon_no', $mihon_no);
			$jm_ranking->set('ranking_yyyymm', $ranking_yyyymm);
			$jm_ranking->set('venue_kbn', $venue_kbn);
			$jm_ranking->set('access_cnt', 1);
			$res_ins = $jm_ranking->add();
			if (Ethna::isError($res_ins)) {
				$msg = '登録Errorが発生しました。';
				$this->backend->getLogger()->log(LOG_ERR, $msg);
				$this->ae->add('error', $msg);
				$db->rollback();
				return null;
			}
		} elseif (1 == $row['cnt']) {
			// update
			$sql_up = "update jm_ranking set access_cnt = access_cnt + 1 where mihon_no = ? and ranking_yyyymm = ? and venue_kbn = ?";

			// Prepare Statement化
			$stmt_up =& $db->db->prepare($sql_up);

			// SQLを実行
			$res_up = $db->db->execute($stmt_up, $param);
			if (DB::isError($res_up)) {
				$msg = '更新Errorが発生しました。';
				$this->backend->getLogger()->log(LOG_ERR, $msg);
				$this->ae->add('error', $msg);
				$db->rollback();
				return null;
			}
		} else {
			$db->rollback();
			return null;
		}

		// コミット
		$db->commit();
	}
}

/**
 *  Jmesse_JmRanking
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_JmRanking extends Ethna_AppObject
{
	/**
	 *  @var    array   テーブル定義
	 */
	var $table_def = array(
		'jm_ranking' => array(
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
