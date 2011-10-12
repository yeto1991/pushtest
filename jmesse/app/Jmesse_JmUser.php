<?php
/**
 *  Jmesse_JmUser.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 82fb28d30e5eeac17975be5c2e3c1f3eb2c3efda $
 */

/**
 *  Jmesse_JmUserManager
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_JmUserManager extends Ethna_AppManager
{
	/**
	* Eメール重複チェック用データ取得
	*
	* @param string $email 登録するEメール
	* @return string 取得結果（重複エラーの場合[DOUBLE_CHECK_OK],重複エラーではない場合[DOUBLE_CHECK_NG]）
	*/
	function getEmailForDoubleCheck($email) {
		$db = $this->backend->getDB();
		$sql = "select count(*) cnt from jm_user where email = ?";
		$stmt =& $db->db->prepare($sql);
		$param = array($email);
		$res = $db->db->execute($sql, $param);
		if (Ethna::isError($res)) {
			$this->backend->getLogger()->log(LOG_ERROR, '検索Errorが発生しました。');
			$this->ae->addObject('error', $res);
			return $res;
		}
		$row = $res->fetchRow(DB_FETCHMODE_ASSOC);
		if($row['cnt'] != 0){
			return "DOUBLE_CHECK_NG";
		}
		return "DOUBLE_CHECK_OK";
	}

}

/**
 *  Jmesse_JmUser
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_JmUser extends Ethna_AppObject
{

	/**
	 *  @var    array   テーブル定義
	 */
	var $table_def = array(
		'jm_user' => array(
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
