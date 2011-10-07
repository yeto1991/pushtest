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
		if ($this->af->validate() > 0) {
			return 'admin_login';
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
		$jm_user =& $this->backend->getObject('JmUser');
		$jm_user->set('user_id', $this->af->get('userId'));
		$jm_user->set('password', $this->af->get('password'));
		$jm_user->set('company_nm', $this->af->get('companyNm'));
		$jm_user->set('division_dept_nm', $this->af->get('divisionDeptNm'));
		$jm_user->set('user_nm', $this->af->get('userNm'));
		$jm_user->set('gender_cd', $this->af->get('genderCd'));
		$jm_user->set('email', $this->af->get('email'));
		$jm_user->set('post_code', $this->af->get('postCode'));
		$jm_user->set('address', $this->af->get('address'));
		$jm_user->set('tel', $this->af->get('tel'));
		$jm_user->set('fax', $this->af->get('fax'));
		$jm_user->set('url', $this->af->get('url'));
		$jm_user->set('secret_question_cd', $this->af->get('secretQuestionCd'));
		$jm_user->set('secret_question_answer', $this->af->get('secretQuestionAnswer'));
		$jm_user->set('use_language_cd', $this->af->get('useLanguageCd'));
		$jm_user->set('regist_result_notice_cd', $this->af->get('registResultNoticeCd'));
		$jm_user->set('auth_gen', null);
		$jm_user->set('auth_user', $this->af->get('userAuthorityCd'));
		$jm_user->set('auth_fair', null);
		$jm_user->set('idpass_notice_cd', $this->af->get('idpassNoticeCd'));
		$jm_user->set('del_flg', '0');
		$jm_user->set('del_date', null);
		$jm_user->set('regist_user_id', $this->session->get('username'));//ログインセッションID
		$jm_user->set('regist_date', date('Y/m/d H:i:s'));//現在日付
		$jm_user->set('update_user_id', null);
		$jm_user->set('update_date', null);
		$ret = $jm_user->add();

		if (Ethna::isError($ret)) {
			return 'error';
		}
		return 'admin_top';
	}
}

?>
