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
		return 'admin_loginDo';
	}
}

?>
