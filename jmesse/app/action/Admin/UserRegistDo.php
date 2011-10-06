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
		$jm_user =& $this->backend->getObject('JmUser');
		$jm_user->set('user_id', '日本語');
		$jm_user->set('password', 'xxxxx');
		$jm_user->set('company_nm', 'xxxxx');
		$jm_user->set('division_dept_nm', 'xxxxx');
		$jm_user->set('user_nm', 'xxxxx');
		$jm_user->set('gender_cd', 'xxxxx');
		$jm_user->set('email', 'xxxxx');
		$jm_user->set('post_code', 'xxxxx');
		$jm_user->set('address', 'xxxxx');
		$jm_user->set('tel', 'xxxxx');
		$jm_user->set('fax', 'xxxxx');
		$jm_user->set('url', 'xxxxx');
		$jm_user->set('secret_question_cd', 'xxxxx');
		$jm_user->set('secret_question_answer', 'xxxxx');
		$jm_user->set('use_language_cd', 'xxxxx');
		$jm_user->set('regist_result_notice_cd', 'xxxxx');
		$jm_user->set('auth_gen', 'xxxxx');
		$jm_user->set('auth_user', 'xxxxx');
		$jm_user->set('auth_fair', 'xxxxx');
		$jm_user->set('idpass_notice_cd', 'xxxxx');
		$jm_user->set('del_flg', '0');
		$jm_user->set('del_date', null);
		$jm_user->set('regist_user_id', 'xxxxx');
		$jm_user->set('regist_date', '2011/10/05');
		$jm_user->set('update_user_id', 'xxxxx');
		$jm_user->set('update_date', '2011/10/05');

		$ret = $jm_user->add();


		if (Ethna::isError($r)) {
			echo 'ERROR!!!';
			return 'error';
		}

		return 'admin_userRegistDo';
	}
}

?>
