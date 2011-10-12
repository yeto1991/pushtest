<?php
/**
 *  Admin/LoginDo.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'Login.php';
require_once 'Jmesse_JmUser.php';

/**
 *  admin_loginDo Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_AdminLoginDo extends Jmesse_Form_AdminLogin
{
}

/**
 *  admin_loginDo action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_AdminLoginDo extends Jmesse_ActionClass
{
	/**
	 *  preprocess of admin_loginDo Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) {
			return 'admin_login';
		}

		return null;
	}

	/**
	 *  admin_loginDo action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		$this->backend->getLogger()->log(LOG_DEBUG, $this->af->get('email'));
		$this->backend->getLogger()->log(LOG_DEBUG, $this->af->get('password'));

		$login_ok = true;

		// ユーザ情報取得
		$user =& $this->backend->getObject('JmUser', 'email', $this->af->get('email'));

		// ユーザ認証
		if (null == $user || null == $user->get('user_id')) {
			$this->backend->getLogger()->log(LOG_DEBUG, 'ユーザが未登録');
			$login_ok = false;
		} else if ($this->af->get('password') != $user->get('password')) {
			$this->backend->getLogger()->log(LOG_DEBUG, 'パスワード相違');
			$login_ok = false;
		} else if ('1' != $user->get('auth_user') && '1' != $user->get('auth_fair')) {
			$this->backend->getLogger()->log(LOG_DEBUG, '管理権限なし');
			$login_ok = false;
		}

		if ($login_ok) {
			// ログに記録
			$mgr = $this->backend->getManager('adminCommon');
			$ret = $mgr->regLog($user->get('user_id'), '5', '3', 'login time');
			if (Ethna::isError($ret)) {
				$this->ae->addObject('error', $ret);
				return 'error';
			}

			// SESSIONに設定
			$this->session->start();
			$this->session->set('user_id', $user->get('user_id'));
			$this->session->set('auth_user', $user->get('auth_user'));
			$this->session->set('auth_fair', $user->get('auth_fair'));

			// TOP画面へ遷移
			$ret_view = 'admin_top';
		} else {
			// ログイン失敗画面へ遷移
			$this->ae->add(null, "ユーザ名またはパスワードが間違っています。");
			$ret_view = 'admin_login';
		}

		return $ret_view;
	}
}

?>
