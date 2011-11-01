<?php
/**
 *  User/ReissuePasswordDo.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'ReissuePassword.php';
require_once 'Jmesse_JmUser.php';

/**
 *  user_reissuePasswordDoDo Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserReissuePasswordDo extends Jmesse_Form_UserReissuePassword
{
}

/**
 *  user_reissuePasswordDoDo action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserReissuePasswordDo extends Jmesse_ActionClass
{
	/**
	 *  preprocess of user_reissuePasswordDoDo Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) {
			return 'user_reissuePasswordDo';
		}
		return null;
	}

	/**
	 *  user_reissuePasswordDoDo action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{

		//TODO メール送信処理


		return 'user_reissuePasswordDo';
	}
}

?>
