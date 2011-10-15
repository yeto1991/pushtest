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
		if (DB::isError($res)) {
			$this->backend->getLogger()->log(LOG_ERR, '検索Errorが発生しました。');
			$this->ae->addObject('error', $res);
			return $res;
		}
		$row = $res->fetchRow(DB_FETCHMODE_ASSOC);
		if($row['cnt'] != 0){
			return "DOUBLE_CHECK_NG";
		}
		return "DOUBLE_CHECK_OK";
	}

	/**
	* ユー情報検索画面 検索処理。
	*
	* @return array<string>：検索結果、null：データなし、DB::Error()：エラー
	*/
	function getUserInfoList($searchConditions) {
		$db = $this->backend->getDB();
		if($searchConditions != null){
			$sql = "select user_id, password, company_nm, division_dept_nm, user_nm,gender_cd, email, post_code, address, tel, fax, url, use_language_cd, regist_result_notice_cd, auth_gen, auth_user, auth_fair, idpass_notice_cd, del_flg, del_date, regist_user_id, regist_date, update_user_id, update_date from jm_user ".$searchConditions." order by user_id asc";
		}else{
			$sql = "select user_id, password, company_nm, division_dept_nm, user_nm,gender_cd, email, post_code, address, tel, fax, url, use_language_cd, regist_result_notice_cd, auth_gen, auth_user, auth_fair, idpass_notice_cd, del_flg, del_date, regist_user_id, regist_date, update_user_id, update_date from jm_user order by user_id asc";
		}
		$res = $db->query($sql);
		if (null == $res) {
			$this->backend->getLogger()->log(LOG_ERR, '検索結果が取得できません。');
			return null;
		}
		if (DB::isError($res)) {
			$this->backend->getLogger()->log(LOG_ERR, '検索Errorが発生しました。');
			$this->ae->addObject('', $res);
			return $res;
		}
		if (0 == $res->numRows()) {
			$this->backend->getLogger()->log(LOG_WARNING, '検索件数が0件です。');
			return null;
		}
		$i = 0;
		while ($tmp = $res->fetchRow(DB_FETCHMODE_ASSOC)) {
			$data[$i] = $tmp;
			$i ++;
		}
		return $data;
	}

	/**
	* ユー情報検索画面 検索処理 総件数取得。
	*
	* @return array<string>：検索結果件数、null：データなし、DB::Error()：エラー
	*/
	function getUserInfoListCount($searchConditions) {
		$db = $this->backend->getDB();
		if($searchConditions != null){
			$sql = "select count(*) cnt from jm_user ".$searchConditions." order by user_id asc";
		}else{
			$sql = 'select count(*) cnt from jm_user order by user_id asc';
		}
		$res = $db->query($sql);
		if (DB::isError($res)) {
			$this->backend->getLogger()->log(LOG_ERR, '検索Errorが発生しました。');
			$this->ae->addObject('error', $res);
			return $res;
		}
		$row = $res->fetchRow(DB_FETCHMODE_ASSOC);
		return $row['cnt'];
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
