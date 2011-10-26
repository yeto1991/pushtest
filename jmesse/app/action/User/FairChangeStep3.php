<?php
/**
 *  User/FairChangeStep3.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'FairRegistStep3.php';

/**
 *  user_fairChangeStep3 Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserFairChangeStep3 extends Jmesse_Form_UserFairRegistStep3
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
	var $form = array(

	//Form定義

    );
}

/**
 *  user_fairChangeStep3 action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserFairChangeStep3 extends Jmesse_ActionClass
{
    /**
     *  preprocess of user_fairChangeStep3 Action.
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
     *  user_fairChangeStep3 action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
		return 'user_fairRegistStep3';
    }
}

?>
