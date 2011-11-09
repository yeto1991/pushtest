<?php
/**
 *  User/EnReissuePasswordDo.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'EnReissuePassword.php';
require_once 'Jmesse_JmUser.php';

/**
 *  user_enReissuePasswordDo Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserEnReissuePasswordDo extends Jmesse_Form_UserEnReissuePassword
{
}

/**
 *  user_enReissuePasswordDo action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserEnReissuePasswordDo extends Jmesse_ActionClass
{
	/**
	 *  preprocess of user_enReissuePasswordDo Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) {
			$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
			return 'user_enReissuePassword';
		}else{
			//入力チェック詳細
			//Eメール
			if($this->af->get('email') != null && $this->af->get('email') != ''){
				//Eメール
				if(substr($this->af->get('email'), 0, 1) == "@" || substr($this->af->get('email'), -1) == "@"){
					$this->ae->add('email', "Eメール 「@」の位置が不正です");
					return 'user_enReissuePassword';
				}
				if(substr_count($this->af->get('email'),"@") != 1){
					$this->ae->add('email', "Eメール 「@」は必ず１文字のみ入力してください。");
					return 'user_enReissuePassword';
				}
			}
		}
		return null;
	}

	/**
	 *  user_enReissuePasswordDo action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		// ユーザ情報取得
		$user =& $this->backend->getObject('JmUser', 'email', $this->af->get('email'));

		//ユーザ情報確認
		if (null == $user || null == $user->get('user_id')) {
			$this->ae->add('email', '入力された登録メールアドレスは存在しません。');
			return 'user_enReissuePassword';
		} else if ($user->get('del_flg') == '1') {
			$this->ae->add('email', '入力された登録メールアドレスをもつユーザ情報は削除されています。');
			return 'user_enReissuePassword';
		}

		// パスワード取得
		$this->af->set('email',$user->get('password'));

		//TODO メール送信処理
// 		$ary_value = array('mail_send_user_password' => $user->get('password'));
// 		$mail_mgr =& $this->backend->getManager('mail');
// 		$mail_mgr->sendmailEnUserConfirm(strtolower($this->af->get('email')), $ary_value);

		return 'user_enReissuePasswordDo';
	}
}

?>
