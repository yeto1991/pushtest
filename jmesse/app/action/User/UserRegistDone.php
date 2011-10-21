<?php
/**
 *  User/UserRegistDone.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'UserRegistDo.php';

/**
 *  user_userRegistDone Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserUserRegistDone extends Jmesse_Form_UserUserRegistDo
{
}

/**
 *  user_userRegistDo action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserUserRegistDone extends Jmesse_ActionClass
{
	/**
	 *  preprocess of user_userRegistDone Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
// 		// ログインチェック
// 		if (!$this->backend->getManager('userCommon')->isLoginUser()) {
// 			$this->backend->getLogger()->log(LOG_ERR, '未ログイン');
// 			$this->af->set('function', $this->config->get('host_path').$_SERVER[REQUEST_URI]);
// 			return 'user_Login';
// 		}
		//重複チェック
		$jmUserMgr = $this->backend->getManager('jmUser');
		$emailCheck = $jmUserMgr->getEmailForDoubleCheckForFront($this->af->get('email'));
		if (Ethna::isError($emailCheck)) {
			$this->backend->getLogger()->log(LOG_ERR, 'ユーザ登録 Eメール重複チェックエラー');
			return 'error';
		}
		if($emailCheck == "DOUBLE_CHECK_NG"){
			$this->ae->add(null, "入力されたEメールは既に使用されています。");
			$this->backend->getLogger()->log(LOG_ERR, 'ユーザ登録 Eメール重複エラー');
			return 'user_userRegist';
		}
		return null;
	}

	/**
	 *  user_userRegistDone action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		if (Ethna_Util::isDuplicatePost()) {
			// 二重POSTの場合
			$this->backend->getLogger()->log(LOG_WARNING, '二重POST');
			header('Location: '.$this->config->get('url').'?action_user_userRegist=true');
			return null;
		}

		if($this->af->get('emailCheckFlg') == "DOUBLE_CHECK_DEL_FLG1"){
			//Eメール重複チェック対象Eメールが削除済みである場合物理レコード削除
			// 削除対象ユーザ情報取得
			$user =& $this->backend->getObject('JmUser', 'email', $this->af->get('email'));
			$user_id_target = $user->get('user_id');

			//jm_userテーブル
			$jm_user_del = $this->backend->getObject('JmUser','email',strtolower($this->af->get('email')));
			$userdel = $jm_user_del->remove();
			if (Ethna::isError($retdel)) {
				$this->backend->getLogger()->log(LOG_ERR, 'ユーザ情報テーブル物理削除エラー');
				$this->ae->addObject('error', $userdel);
				$db->rollback();
				return 'error';
			}
			//jm_fairテーブル
			$jm_fair_del = $this->backend->getObject('JmFair','user_id',$user_id_target);
			$fairdel = $jm_fair_del->remove();
			if (Ethna::isError($retdel)) {
				$this->backend->getLogger()->log(LOG_ERR, '見本市情報テーブル物理削除エラー');
				$this->ae->addObject('error', $fairdel);
				$db->rollback();
				return 'error';
			}
			//jm_fair_tempテーブル
			$jm_fair_temp_del = $this->backend->getObject('JmFairTemp','user_id',$user_id_target);
			$fairtempdel = $jm_fair_temp_del->remove();
			if (Ethna::isError($retdel)) {
				$this->backend->getLogger()->log(LOG_ERR, '見本市情報一時保存テーブル物理削除エラー');
				$this->ae->addObject('error', $fairtempdel);
				$db->rollback();
				return 'error';
			}
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
		$jm_user->set('use_language_cd', '0');
		$jm_user->set('regist_result_notice_cd', '0');
		$jm_user->set('auth_gen', '1');
		$jm_user->set('auth_user', '0');
		$jm_user->set('auth_fair', '0');
		$jm_user->set('idpass_notice_cd', '0');
		$jm_user->set('del_flg', '0');
		$jm_user->set('regist_user_id', '0');
		$jm_user->set('regist_date', date('Y/m/d H:i:s'));
		// INSERT処理実行
		$ret = $jm_user->add();
		if (Ethna::isError($ret)) {
			$this->backend->getLogger()->log(LOG_ERR, 'ユーザ新規登録エラー');
			$this->ae->addObject('error', $ret);
			$db->rollback();
			return 'error';
		}
		// ログテーブルに登録
		$mgr = $this->backend->getManager('userCommon');
		// 登録したユーザ情報取得
		$user =& $this->backend->getObject('JmUser', 'email', $this->af->get('email'));
		$ret = $mgr->regLog($user->get('user_id'), '2', '1', strtolower($this->af->get('email')).'('.$user->get('user_id').')');
		if (Ethna::isError($ret)) {
			$this->ae->addObject('error', $ret);
			$db->rollback();
			return 'error';
		}
		//メール送信処理
		mb_language("Ja") ;
		mb_internal_encoding("UTF-8") ;
		$mailto= strtolower($this->af->get('email'));
		$subject="Jmesse登録完了メール";
		$content="ユーザ登録されました。 \n ログインEメール：".strtolower($this->af->get('email'))." \n ログインパスワード：".$this->af->get('password')." です。";
		$mailfrom="From:Jmesse";
		mb_send_mail($mailto,$subject,$content,$mailfrom);

		// 完了画面へ遷移
		//session情報設定
		// SESSIONに設定
		$this->session->start();
		$this->session->set('user_id', $user->get('user_id'));
		$this->session->set('auth_gen', $user->get('auth_gen'));
		return user_userRegistDone;
	}
}

?>
