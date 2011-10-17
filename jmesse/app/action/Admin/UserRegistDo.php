<?php
/**
 *  Admin/UserRegistDo.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'UserRegist.php';

/**
 *  admin_userRegistDo Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_AdminUserRegistDo extends Jmesse_Form_AdminUserRegist
{
}

/**
 *  admin_userRegistDo action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_AdminUserRegistDo extends Jmesse_ActionClass
{
	/**
	 *  preprocess of admin_userRegistDo Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		// ログインチェック
		if (!$this->backend->getManager('adminCommon')->isLoginUser()) {
			$this->backend->getLogger()->log(LOG_ERR, '未ログイン');
			return 'admin_Login';
		}
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
			}
			//パスワード
			if($this->af->get('password') != null && $this->af->get('password') != ''){
				if(!(preg_match("/^[!-~]+$/", $this->af->get('password')))){
					$this->ae->add(null, "パスワードは半角英数字、半角記号で入力してください");
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
			return 'admin_userRegist';
		}
		//重複チェック
		$jmUserMgr = $this->backend->getManager('jmUser');
		$emailCheck = $jmUserMgr->getEmailForDoubleCheck($this->af->get('email'));
		if (Ethna::isError($emailCheck)) {
			$this->backend->getLogger()->log(LOG_ERR, 'ユーザ登録 Eメール重複チェックエラー');
			return 'error';
		}
		if($emailCheck == "DOUBLE_CHECK_NG"){
			$this->ae->add(null, "入力されたEメールは既に使用されています。");
			$this->backend->getLogger()->log(LOG_ERR, 'ユーザ登録 Eメール重複エラー');
			return 'admin_userRegist';
		}
		return null;
	}

	/**
	 *  admin_userRegistDo action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		if (Ethna_Util::isDuplicatePost()) {
			// 二重POSTの場合
			$this->backend->getLogger()->log(LOG_WARNING, '二重POST');
			header('Location: '.$this->config->get('url').'?action_admin_userChange=true');
			return null;
		}
		$jm_user =& $this->backend->getObject('JmUser');
		$jm_user->set('email', strtolower($this->af->get('email'))); //メールアドレスを小文字変換
		$jm_user->set('password', $this->af->get('password'));
		$jm_user->set('company_nm', $this->af->get('companyNm'));
		$jm_user->set('division_dept_nm', $this->af->get('divisionDeptNm'));
		$jm_user->set('user_nm', $this->af->get('userNm'));
		$jm_user->set('gender_cd', $this->af->get('genderCd'));
		$jm_user->set('post_code', $this->af->get('postCode'));
		$jm_user->set('address', $this->af->get('address'));
		$jm_user->set('tel', $this->af->get('tel'));
		$jm_user->set('fax', $this->af->get('fax'));
		$jm_user->set('url', $this->af->get('url'));
		$jm_user->set('use_language_cd', $this->af->get('useLanguageCd'));
		$jm_user->set('regist_result_notice_cd', $this->af->get('registResultNoticeCd'));
		if ($this->af->get('authGen') == '1') {
			$jm_user->set('auth_gen', $this->af->get('authGen'));
		}else{
			$jm_user->set('auth_gen', '0');
		}
		if ($this->af->get('authUser') == '1') {
			$jm_user->set('auth_user', $this->af->get('authUser'));
		}else{
			$jm_user->set('auth_user', '0');
		}
		if ($this->af->get('authFair') == '1') {
			$jm_user->set('auth_fair', $this->af->get('authFair'));
		}else{
			$jm_user->set('auth_fair', '0');
		}
		$jm_user->set('idpass_notice_cd', $this->af->get('idpassNoticeCd'));
		$jm_user->set('del_flg', $this->af->get('delFlg'));
		if ($this->af->get('delFlg') == '1') {
			$jm_user->set('del_date', date('Y/m/d H:i:s'));
		}else{
			$jm_user->set('del_date', null);
		}
		$jm_user->set('regist_user_id', $this->session->get('user_id'));
		$jm_user->set('regist_date', date('Y/m/d H:i:s'));

		// INSERT処理実行
		$ret = $jm_user->add();
		if (Ethna::isError($ret)) {
			$this->backend->getLogger()->log(LOG_ERR, 'ユーザ新規登録エラー');
			$this->ae->addObject('error', $ret);
			return 'error';
		}

		// ログテーブルに登録
		$mgr = $this->backend->getManager('adminCommon');
		// 登録したユーザ情報取得
		$user =& $this->backend->getObject('JmUser', 'email', $this->af->get('email'));
		$ret = $mgr->regLog($this->session->get('user_id'), '2', '1', strtolower($this->af->get('email')).'('.$user->get('user_id').')');
		if (Ethna::isError($ret)) {
			$this->ae->addObject('error', $ret);
			return 'error';
		}
		// 更新画面へ遷移
		header('Location: '.$this->config->get('url').'?action_admin_userChange=true&user_id='.$user->get('user_id').'&mode=change&success=1');
		return null;
	}
}

?>
