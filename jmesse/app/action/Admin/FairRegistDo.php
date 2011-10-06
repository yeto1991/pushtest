<?php
/**
 *  Admin/FairRegistDo.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

require_once 'FairReigst.php';

/**
 *  admin_fairRegistDo Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_AdminFairRegistDo extends Jmesse_Form_AdminFairRegist
{
}

/**
 *  admin_fairRegistDo action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_AdminFairRegistDo extends Jmesse_ActionClass
{
    /**
     *  preprocess of admin_fairRegistDo Action.
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
     *  admin_fairRegistDo action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        return 'admin_fairRegistDo';
    }
}

?>
