<?php
/**
 *  User/UserRegistDo.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'UserRegist.php';

/**
 *  user_userRegistDo Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserUserRegistDo extends Jmesse_Form_UserUserRegist
{
}

/**
 *  user_userRegistDo action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserUserRegistDo extends Jmesse_ActionClass
{
	/**
	 *  preprocess of user_userRegistDo Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		//入力値チェック
		if ($this->af->validate() > 0) {
			$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
			return 'user_userRegist';
		}else{
			//入力チェック詳細
			//Eメール
			if($this->af->get('email') != null && $this->af->get('email') != ''){
				//Eメール
				if(substr($this->af->get('email'), 0, 1) == "@" || substr($this->af->get('email'), -1) == "@"){
					$this->ae->add('email', "Eメール 「@」の位置が不正です");
					return 'user_userRegist';
				}
				if(substr_count($this->af->get('email'),"@") != 1){
					$this->ae->add('email', "Eメール 「@」は必ず１文字のみ入力してください。");
					return 'user_userRegist';
				}
			}
			//Eメール確認
			if($this->af->get('email2') != null && $this->af->get('email2') != ''){
				//Eメール
				if(substr($this->af->get('email2'), 0, 1) == "@" || substr($this->af->get('email2'), -1) == "@"){
					$this->ae->add('email2', "Eメール(確認) 「@」の位置が不正です");
					return 'user_userRegist';
				}
				if(substr_count($this->af->get('email2'),"@") != 1){
					$this->ae->add('email2', "Eメール(確認) 「@」は必ず１文字のみ入力してください。");
					return 'user_userRegist';
				}
			}
			//URL
			if($this->af->get('url') != null && $this->af->get('url') != ''){
				if (0 !== strpos($this->af->get('url'), 'http')) {
					$this->ae->add('url', "URLは「http」から入力してください");
					return 'user_userRegist';
				}
			}
			//Eメール2重登録チェック
			if($this->af->get('email') != $this->af->get('email2')){
				$this->ae->add('email2', "入力されたEメールと合致していません。");
				return 'user_userRegist';
			}
			//パスワード2重登録チェック
			if($this->af->get('password') != $this->af->get('password2')){
				$this->ae->add('password2', "入力されたパスワードと合致していません。");
				return 'user_userRegist';
			}
			//重複チェック
			$jmUserMgr = $this->backend->getManager('jmUser');
			$emailCheck = $jmUserMgr->getEmailForDoubleCheckForFront('',$this->af->get('email'));
			if (Ethna::isError($emailCheck)) {
				$this->backend->getLogger()->log(LOG_ERR, 'ユーザ登録 Eメール重複チェックエラー');
				return 'error';
			}
			if($emailCheck == "DOUBLE_CHECK_NG"){
				$this->ae->add('email', "入力されたEメールは既に使用されています。");
				$this->backend->getLogger()->log(LOG_ERR, 'ユーザ登録 Eメール重複エラー');
				return 'user_userRegist';
			}
			//チェックフラグ Formに設定
			$this->af->set('emailCheckFlg', $emailCheck);
			return null;
		}
	}

	/**
	 *  user_userRegistDo action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		// 確認画面へ遷移
		return user_userRegistDo;
	}
}

?>
