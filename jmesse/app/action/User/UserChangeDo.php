<?php
/**
 *  User/UserChangeDo.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'UserChange.php';

/**
 *  user_userChangeDo Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserUserChangeDo extends Jmesse_Form_UserUserChange
{
}

/**
 *  user_userUserDo action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserUserChangeDo extends Jmesse_ActionClass
{
	/**
	 *  preprocess of user_userUserDo Action.
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
			$this->af->set('function', $this->config->get('host_path').$_SERVER[REQUEST_URI]);
			return 'user_Login';
		}
		if($this->af->get('delFlg') != '1'){
			//入力値チェック
			if ($this->af->validate() > 0) {
				$this->backend->getLogger()->log(LOG_ERR, 'バリデーションエラー');
				//入力チェック詳細
				//Eメール
				if($this->af->get('email') != null && $this->af->get('email') != ''){
					//Eメール
					if(substr($this->af->get('email'), 0, 1) == "@" || substr($this->af->get('email'), -1) == "@"){
						$this->ae->add(null, "Eメール 「@」の位置が不正です");
					}
					if(substr_count($this->af->get('email'),"@") != 1){
						$this->ae->add(null, "Eメール 「@」は必ず１文字のみ入力してください。");
					}
					if(!(preg_match("/^[!-~]+$/", $this->af->get('email')))){
						$this->ae->add(null, "Eメールは半角英数字、半角記号で入力してください");
					}
					if($this->af->get('email2') != null && $this->af->get('email2') != ''){
						if($this->af->get('email') != $this->af->get('email2')){
							$this->ae->add(null, "入力されたEメールが合致していません。");
						}
					}
				}
				//パスワード
				if($this->af->get('password') != null && $this->af->get('password') != ''){
					if(!(preg_match("/^[!-~]+$/", $this->af->get('password')))){
						$this->ae->add(null, "パスワードは半角英数字、半角記号で入力してください");
					}
					if($this->af->get('password2') != null && $this->af->get('password2') != ''){
						if($this->af->get('password') != $this->af->get('password2')){
							$this->ae->add(null, "入力されたパスワードが合致していません。");
						}
					}
				}
				//郵便番号
				if($this->af->get('postCode') != null && $this->af->get('postCode') != ''){
					if(!(preg_match("/^[!-~]+$/", $this->af->get('postCode')))){
						$this->ae->add(null, "郵便番号は半角英数字、半角記号で入力してください");
					}
				}
				//TEL
				if($this->af->get('tel') != null && $this->af->get('tel') != ''){
					if(!(preg_match("/^[!-~]+$/", $this->af->get('tel')))){
						$this->ae->add(null, "TELは半角英数字、半角記号で入力してください");
					}
				}
				//FAX
				if($this->af->get('fax') != null && $this->af->get('fax') != ''){
					if(!(preg_match("/^[!-~]+$/", $this->af->get('fax')))){
						$this->ae->add(null, "FAXは半角英数字、半角記号で入力してください");
					}
				}
				//URL
				if($this->af->get('url') != null && $this->af->get('url') != ''){
					if (0 !== strpos($this->af->get('url'), 'http')) {
						$this->ae->add(null, "URLは「http」から入力してください");
					}
					if(!(preg_match("/^[!-~]+$/", $this->af->get('url')))){
						$this->ae->add(null, "URLは半角英数字、半角記号で入力してください");
					}
				}
				return 'user_userRegist';
			}
		}
		if($this->af->get('delFlg') != '1'){
			//重複チェック
			$jmUserMgr = $this->backend->getManager('jmUser');
			$emailCheck = $jmUserMgr->getEmailForDoubleCheckForFront($this->af->get('user_id'),$this->af->get('email'));
			if (Ethna::isError($emailCheck)) {
				$this->backend->getLogger()->log(LOG_ERR, 'ユーザ登録 Eメール重複チェックエラー');
				return 'error';
			}
			if($emailCheck == "DOUBLE_CHECK_NG"){
				$this->ae->add(null, "入力されたEメールは既に使用されています。");
				$this->backend->getLogger()->log(LOG_ERR, 'ユーザ登録 Eメール重複エラー');
				return 'user_userRegist';
			}
			//チェックフラグ Formに設定
			$this->af->set('emailCheckFlg', $emailCheck);
		}
		return null;
	}

	/**
	 *  user_userChangeDo action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		if($this->af->get('delFlg') == '1'){
			//削除の場合
			$this->af->set('mode', 'delete');
		}
		// 確認画面へ遷移
		return user_userRegistDo;
	}
}

?>