<?php
/**
 *  User/UserChangeDone.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'UserChangeDo.php';

/**
 *  user_userChangeDone Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserUserChangeDone extends Jmesse_Form_UserUserChangeDo
{
}

/**
 *  user_userChangeDo action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserUserChangeDone extends Jmesse_ActionClass
{
	/**
	 *  preprocess of user_userChangeDone Action.
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
		return null;
	}

	/**
	 *  user_userChangeDone action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		if (Ethna_Util::isDuplicatePost()) {
			// 二重POSTの場合
			$this->backend->getLogger()->log(LOG_WARNING, '二重POST');
			header('Location: '.$this->config->get('url').'?action_user_userChange=true');
			return null;
		}
		$jm_user =& $this->backend->getObject('JmUser', 'user_id', $this->af->get('user_id'));
		if (Ethna::isError($jm_user)) {
			$this->ae->addObject('error', $jm_user);
			return 'error';
		}
		//退会希望の場合
		if($this->af->get('delFlg') == '1'){
			$jm_user->set('del_flg', $this->af->get('delFlg'));
			$jm_user->set('del_date', date('Y/m/d H:i:s'));
			$jm_user->set('update_user_id', $this->session->get('user_id'));
			$jm_user->set('update_date', date('Y/m/d H:i:s'));
			// UPDATE処理実行
			$ret = $jm_user->update();
			if (Ethna::isError($ret)) {
				$this->ae->addObject('error', $ret);
				$this->backend->getLogger()->log(LOG_ERR, 'ユーザ登録 更新エラー');
				$db->rollback();
				return 'error';
			}
			// ログテーブル登録
			$mgr = $this->backend->getManager('userCommon');
			$ret = $mgr->regLog($this->session->get('user_id'), '4', '1', $jm_user->get('email').'('.$this->af->get('user_id').')');
			if (Ethna::isError($ret)) {
				$this->ae->addObject('error', $ret);
				$db->rollback();
				return 'error';
			}
			// SESSIONの破棄。
			$this->session->set('user_id', '');
			$this->session->set('auth_gen', '');
			$this->session->destroy();

			//退会モードで完了画面へ
			return user_userRegistDone;
		}
		//新規登録の場合（Eメール重複チェック対象Eメールが削除済みである場合物理レコード削除）
		if($this->af->get('emailCheckFlg') == "DOUBLE_CHECK_DEL_FLG1"){
			// 削除対象ユーザ情報取得
			$user =& $this->backend->getObject('JmUser', 'email', $this->af->get('email'));
			$user_id_target = $user->get('user_id');

			//jm_userテーブル
			$jm_user_del = $this->backend->getObject('JmUser','email',strtolower($this->af->get('email')));
			$userdel = $jm_user_del->remove();
			if (Ethna::isError($userdel)) {
				$this->backend->getLogger()->log(LOG_ERR, 'ユーザ情報テーブル物理削除エラー');
				$this->ae->addObject('error', $userdel);
				$db->rollback();
				return 'error';
			}
			//jm_fairテーブル
			$jm_fair_del = $this->backend->getObject('JmFair','user_id',$user_id_target);
			$fairdel = $jm_fair_del->remove();
			if (Ethna::isError($fairdel)) {
				$this->backend->getLogger()->log(LOG_ERR, '見本市情報テーブル物理削除エラー');
				$this->ae->addObject('error', $fairdel);
				$db->rollback();
				return 'error';
			}
			//jm_fair_tempテーブル
			$jm_fair_temp_del = $this->backend->getObject('JmFairTemp','user_id',$user_id_target);
			$fairtempdel = $jm_fair_temp_del->remove();
			if (Ethna::isError($fairtempdel)) {
				$this->backend->getLogger()->log(LOG_ERR, '見本市情報一時保存テーブル物理削除エラー');
				$this->ae->addObject('error', $fairtempdel);
				$db->rollback();
				return 'error';
			}
			//新規登録
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
			//Sessionデータ再設定（ユーザIDのみ）
			$this->session->set('user_id', $user->get('user_id'));
			//更新モードで完了画面へ
			$this->af->set('mode', 'change');
			return user_userRegistDone;
		}else{
			//通常更新の場合
			$jm_user =& $this->backend->getObject('JmUser', 'user_id', $this->af->get('user_id'));
			if (Ethna::isError($jm_user)) {
				$this->ae->addObject('error', $jm_user);
				return 'error';
			}
			//更新項目 設定
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
			$jm_user->set('update_user_id', $this->session->get('user_id'));
			$jm_user->set('update_date', date('Y/m/d H:i:s'));
			// UPDATE処理実行
			$ret = $jm_user->update();
			if (Ethna::isError($ret)) {
				$this->ae->addObject('error', $ret);
				$this->backend->getLogger()->log(LOG_ERR, 'ユーザ登録 更新エラー');
				$db->rollback();
				return 'error';
			}
			$this->af->setApp('user_id', $jm_user->get('user_id'));
			// ログテーブル登録
			$mgr = $this->backend->getManager('adminCommon');
			$ret = $mgr->regLog($this->session->get('user_id'), '3', '1', strtolower($this->af->get('email').'('.$this->af->get('user_id').')'));
			if (Ethna::isError($ret)) {
				$this->ae->addObject('error', $ret);
				$db->rollback();
				return 'error';
			}
			//更新モードで完了画面へ
			$this->af->set('mode', 'change');
			return user_userRegistDone;
		}
	}
}

?>
