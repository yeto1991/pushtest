<?php
/**
 *  User/FairRegistStep3.php
 *
 *  @author     {$author}
 *  @package    Jmesse
 *  @version    $Id: 6dbb28cac61a23f06dba884c38c304aed3dcc84b $
 */

/**
 *  user_fairRegistStep3 Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Form_UserFairRegistStep3 extends Jmesse_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
	var $form = array(
		'mode' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_HIDDEN, // Form type
			'name'        => '登録モード',    // Display name
			'required'    => true,            // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => null,            // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => 'checkHalfWidthChar', // Optional method name which
		),
		'email' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXT,  // Form type
			'name'        => 'Eメール',      // Display name
			'required'    => false,            // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 255,             // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => 'checkHalfWidthChar', // Optional method name which
		),
		'mihon_no' => array(
			'type'        => VAR_TYPE_INT,    // Input type
			'form_type'   => FORM_TYPE_TEXT,  // Form type
			'name'        => '見本市番号',    // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => null,            // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'select_language_info' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_RADIO, // Form type
			'name'        => '言語選択情報',  // Display name
			'required'    => true,            // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => null,            // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'fair_title_en' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXT,  // Form type
			'name'        => '見本市名（英）', // Display name
			'required'    => true,            // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 255,             // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => 'checkHalfWidthChar', // Optional method name which
		),
		'profile_en' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXTAREA, // Form type
			'name'        => 'キャッチフレーズ（英）', // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 500,             // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => 'checkHalfWidthChar', // Optional method name which
		),
		'detailed_information_en' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXTAREA,  // Form type
			'name'        => 'ＰＲ・紹介文（英）', // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 1000,            // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => 'checkHalfWidthChar', // Optional method name which
		),
		'exhibits_en' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXTAREA, // Form type
			'name'        => '出品物(英)',    // Display name
			'required'    => true,            // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 300,             // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => 'checkHalfWidthChar', // Optional method name which
		),
		'othercity_en' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_CHECKBOX,  // Form type
			'name'        => '開催地その他（英）', // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => null,            // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'other_city_en' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXT,  // Form type
			'name'        => '開催地その他（英）', // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 100,             // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => 'checkHalfWidthChar', // Optional method name which
		),
		'venue_en' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXT,  // Form type
			'name'        => '会場名(英)',    // Display name
			'required'    => true,            // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 255,             // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => 'checkHalfWidthChar', // Optional method name which
		),
		'transportation_en' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXT,  // Form type
			'name'        => '交通手段(英)',  // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 500,             // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => 'checkHalfWidthChar', // Optional method name which
		),
		'admission_ticket_5_en' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_CHECKBOX,  // Form type
			'name'        => 'Others',        // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => null,            // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => null,            // Optional method name which
		),
		'other_admission_ticket_en' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXT,  // Form type
			'name'        => 'その他のチケットの入手方法(英)', // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 500,             // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => 'checkHalfWidthChar', // Optional method name which
		),
		'organizer_en' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXT,  // Form type
			'name'        => '主催者・問合せ先名称（英）', // Display name
			'required'    => true,            // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 500,             // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => 'checkHalfWidthChar', // Optional method name which
		),
		'agency_in_japan_en' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXT,  // Form type
			'name'        => '日本国内の照会先名称（英）', // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 255,             // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => 'checkHalfWidthChar', // Optional method name which
		),
		'spare_field1' => array(
			'type'        => VAR_TYPE_STRING, // Input type
			'form_type'   => FORM_TYPE_TEXT,  // Form type
			'name'        => '過去の実績認証機関', // Display name
			'required'    => false,           // Required Option(true/false)
			'min'         => null,            // Minimum value
			'max'         => 255,             // Maximum value
			'regexp'      => null,            // String by Regexp
			'mbregexp'    => null,            // Multibype string by Regexp
			'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp
			'filter'      => null,            // Optional Input filter to convert input
			'custom'      => 'checkHalfWidthChar', // Optional method name which
		),
    );
}

/**
 *  user_fairRegistStep3 action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Jmesse
 */
class Jmesse_Action_UserFairRegistStep3 extends Jmesse_ActionClass
{
    /**
     *  preprocess of user_fairRegistStep3 Action.
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
     *  user_fairRegistStep3 action implementation.
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
