<?php
/**
 *  User/EnFairDel.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

/**
 *  user_enFairDel Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserEnFairDel extends Jmesse_ActionForm
{
	/**
	 *  @access private
	 *  @var    array   form definition.
	 */
	var $form = array(
		'mihon_no' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_HIDDEN, // Form type
			'name'        => '見本市番号',    // Display name
			'required'    => true,            // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => null,            // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
	);
}

/**
 *  user_enFairDel action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserEnFairDel extends Jmesse_ActionClass
{
	/**
	 *  preprocess of user_enFairDel Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		// ログインチェック
		if (!$this->backend->getManager('userCommon')->isLoginUser()) {
			$this->backend->getLogger()->log(LOG_ERR, '未ログイン');
			$this->af->set('function', '');
			return 'user_enLogin';
		}

		// 入力チェック（必須）
		if ($this->af->validate() > 0) {
			$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
			return 'error';
		}

		return null;
	}

	/**
	 *  user_enFairDel action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		// トランザクション開始
		$db = $this->backend->getDB();
		$db->db->autocommit(false);
		$db->begin();

		// オブジェクトの取得
		$jm_fair_obj = $this->backend->getObject('JmFair', 'mihon_no', $this->af->get('mihon_no'));
		if (null == $jm_fair_obj) {
			$this->backend->getLogger()->log(LOG_DEBUG, '■見本市情報が存在しません。');
			$this->ae->add('error', '見本市情報が存在しません');
			return 'error';
		}
		if ($this->session->get('user_id') != $jm_fair_obj->get('user_id')) {
			$this->backend->getLogger()->log(LOG_DEBUG, '■他人の見本市情報です。'.$this->session->get('user_id').' '.$jm_fair_obj->get('user_id'));
			$this->ae->add('error', '他人の見本市情報なので編集できません');
			return 'error';
		}

		$jm_fair_obj->set('del_flg', '1');
		$jm_fair_obj->set('del_date', date('Y/m/d H:i:s'));
		$jm_fair_obj->set('update_user_id', $this->session->get('user_id'));
		$jm_fair_obj->set('update_date', date('Y/m/d H:i:s'));

		// UPDATE
		$ret = $jm_fair_obj->update();
		if (Ethna::isError($ret)) {
			$msg = 'JM_FAIRテーブルへの更新に失敗しました。';
			$this->backend->getLogger()->log(LOG_ERR, $msg);
			$this->ae->add('error', $msg);
			$db->rollback();
			return 'error';
		}

		// LOGに記録
		$mgr =& $this->backend->getManager('userCommon');
		$ret = $mgr->regLog($this->session->get('user_id'), '4', '2', $this->af->get('mihon_no'));
		if (Ethna::isError($ret)) {
			$msg = 'JM_LOGテーブルへの登録に失敗しました。';
			$this->backend->getLogger()->log(LOG_ERR, $msg);
			$this->ae->add('error', $msg);
			$db->rollback();
			return 'error';
		}

		// COMMIT
		$db->commit();

		// エラー判定
		if (0 < $this->ae->count()) {
			$this->backend->getLogger()->log(LOG_ERR, 'システムエラー');
			return 'error';
		}

		// 画面遷移
		$url = $this->config->get('url').'?action_user_enFairRegistFinish=true&msg=d';
		header('Location: '.$url);
		return null;
	}
}

?>
