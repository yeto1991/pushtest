<?php
/**
 *  Jmesse_JmFairTemp.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 82fb28d30e5eeac17975be5c2e3c1f3eb2c3efda $
 */

/**
 *  Jmesse_JmFairTempManager
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_JmFairTempManager extends Ethna_AppManager
{
}

/**
 *  Jmesse_JmFairTemp
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_JmFairTemp extends Ethna_AppObject
{
	/**
	 *  @var    array   テーブル定義
	 */
	var $table_def = array(
		'jm_fair_temp' => array(
		'primary' => true,
		),
	);

	/**
	 *  property display name getter.
	 *
	 *  @access public
	 */
	function getName($key)
	{
		return $this->get($key);
	}
}

?>
