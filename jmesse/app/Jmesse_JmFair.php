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
		$db = $this->backend->getDB();
		$sql = "select count(*) cnt from jm_fair";
		$res = $db->query($sql);
		if (Ethna::isError($res)) {
			$this->ae->addObject('error', $res);
			return $res;
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
		$db = $this->backend->getDB();
		$sql = "select count(*) cnt from jm_fair where user_id = ?";
		$stmt =& $db->db->prepare($sql);
		$param = array($user_id);
		$res = $db->db->execute($sql, $param);
		if (Ethna::isError($res)) {
			$this->ae->addObject('error', $res);
			return $res;
		}
		$row = $res->fetchRow(DB_FETCHMODE_ASSOC);
		return $row['cnt'];
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
