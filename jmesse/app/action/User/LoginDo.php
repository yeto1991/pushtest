<?php
/**
 *  User/LoginDo.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'Login.php';
require_once 'Jmesse_JmUser.php';

/**
 *  user_loginDo Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserLoginDo extends Jmesse_Form_UserLogin
{
}

/**
 *  user_loginDo action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserLoginDo extends Jmesse_ActionClass
{
	/**
	 *  preprocess of user_loginDo Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) {
			return 'user_login';
		}

		return null;
	}

	/**
	 *  user_loginDo action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
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
		} else if ('1' != $user->get('auth_gen')) {
			$this->backend->getLogger()->log(LOG_DEBUG, '管理権限なし');
			$login_ok = false;
		} else if ('1' == $user->get('del_flg')) {
			$this->backend->getLogger()->log(LOG_DEBUG, '削除済みユーザ');
			$login_ok = false;
		}

		$mgr = $this->backend->getManager('userCommon');
		if ($login_ok) {
			// ログに記録
			$ret = $mgr->regLog($user->get('user_id'), '5', '3', 'Successful login.');
			if (Ethna::isError($ret)) {
				$this->ae->addObject('error', $ret);
				return 'error';
			}

			// SESSIONに設定
			$this->session->start();
			$this->session->set('user_id', $user->get('user_id'));
			$this->session->set('auth_gen', $user->get('auth_gen'));
			$ret_view = 'user_top';
		} else {
			// ログイン失敗画面へ遷移
			$ret = $mgr->regLog('0', '5', '3', 'Login failed.('.$this->af->get('email').':'.$_SERVER['REMOTE_ADDR'].')');
			if (Ethna::isError($ret)) {
				$this->ae->addObject('error', $ret);
				return 'error';
			}
			$this->ae->add('error', 'Eメールまたはパスワードが間違っています。');
			return 'user_login';
		}

		// 転送
		if (null != $this->af->get('function') && '' != $this->af->get('function')) {
			header('Location: '.$this->af->get('function'));
		}

		// TOP画面へ遷移
		return $ret_view;
	}
}

?>
