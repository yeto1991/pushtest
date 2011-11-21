<?php
/**
 *  User/Login.php
 *
 *  @author     m.sasaki
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

/**
 *  user_login Form implementation.
 *
 *  @author     m.sasaki
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserLogin extends Jmesse_ActionForm
{
	/**
	 *  @access private
	 *  @var    array   form definition.
	 */
	var $form = array(
		'email' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXT,  // Form type
			'name'        => 'Eメール',       // Display name
			'required'    => true,
			'min'         => null,
			'max'         => 255,
			'regexp'      => '/^[!-~]+$/',
			'mbregexp'    => null,
			'mbregexp_encoding' => 'UTF-8',
			'filter'      => null,
			'custom'      => null,
		),
		'password' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_PASSWORD, // Form type
			'name'        => 'パスワード',
			'required'    => true,
			'min'         => 4,
			'max'         => 8,
			'regexp'      => '/^[!-~]+$/',
			'mbregexp'    => null,
			'mbregexp_encoding' => 'UTF-8',
			'filter'      => null,
			'custom'      => null,
		),
		'function' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_PASSWORD, // Form type
			'name'        => '転送先',        // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => null,            // Maximum value
			'regexp'      => '/^[!-~]+$/',    // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
	);
}

/**
 *  user_login action implementation.
 *
 *  @author     m.sasaki
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserLogin extends Jmesse_ActionClass
{
	/**
	 *  preprocess of user_login Action.
	 *
	 *  @access public
	 *  @return string    forward name(null: success.
	 *                                false: in case you want to exit.)
	 */
	function prepare()
	{
		// "https"判定
		if ('on' != $_SERVER['HTTPS']) {
			header('Location: https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
		}

		return null;
	}

	/**
	 *  user_login action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		if (null != $this->af->get('function') && '' != $this->af->get('function')) {
			$this->af->set('function', $this->af->get('function'));
		}
		return 'user_login';
	}
}

?>
