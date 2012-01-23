<?php
/*
 * jmesse-ini.php
*
* update:
*/
$config = array(
	// site
	'url'         => 'https://192.168.0.229/j-messe/',
	'url_pub'     => 'http://192.168.0.229/j-messe/',

	// base
	'base'        => 'https://www.jetro.go.jp/',
	'base_en'     => 'https://www.jetro.go.jp/',
	'base_pub'    => 'http://www.jetro.go.jp/',
	'base_pub_en' => 'http://www.jetro.go.jp/',

	// css,js,base
	'css_js_base'     => 'https://www.jetro.go.jp/',
	'css_js_base_pub' => 'http://www.jetro.go.jp/',

	// path
	'host_path'      => 'https://192.168.0.229',
	'img_path'       => 'img/user/',
	'img_tmp_path'   => 'img/user/tmp/',
	'flag_path'      => '/images/flag/',
	'photos_dir_max' => 10000,

	//JSONファイル作成格納場所
	'jsonfile_path' => '/home/j-messe/app/jmesse/www/jsonfile/',

	// JSONファイル名
	'r_jp'  => 'region_jp.json',
	'r_en'  => 'region_en.json',
	'i_jp'  => 'industry_jp.json',
	'i_en'  => 'industry_en.json',
	'n_jp'  => 'new-mihonichi_jp.json',
	'n_en'  => 'new-mihonichi_en.json',
	'r1_jp' => 'ranking1_jp.json',
	'r2_jp' => 'ranking2_jp.json',
	'r3_jp' => 'ranking3_jp.json',
	'r4_jp' => 'ranking4_jp.json',
	'r5_jp' => 'ranking5_jp.json',
	'r6_jp' => 'ranking6_jp.json',
	'r1_en' => 'ranking1_en.json',
	'r2_en' => 'ranking2_en.json',
	'r3_en' => 'ranking3_en.json',
	'r4_en' => 'ranking4_en.json',
	'r5_en' => 'ranking5_en.json',
	'r6_en' => 'ranking6_en.json',

	// 共通部分URL
	'header_url'           => 'http://192.168.0.229/j-messe/ja_header.html ',
 	'footer_url'           => 'http://192.168.0.229/j-messe/ja_footer.html',
 	'footer_script_rul'    => 'http://192.168.0.229/j-messe/ja_footer_script.html',
	'left_menu_url'        => 'http://192.168.0.229/j-messe/ja_left_menu.html',
	'header_url_en'        => 'http://192.168.0.229/j-messe/en_header.html',
 	'footer_url_en'        => 'http://192.168.0.229/j-messe/en_footer.html',
	'footer_script_rul_en' => 'http://192.168.0.229/j-messe/en_footer_script.html',
	'left_menu_url_en'     => 'http://192.168.0.229/j-messe/en_left_menu.html',
// 	'header_url'       => 'http://192.168.0.229/header.html',
// 	'footer_url'       => 'http://192.168.0.229/footer.html',
// 	'left_menu_url'    => 'http://192.168.0.229/j-messe/left_menu.html',
// 	'header_url_en'    => 'http://192.168.0.229/enHeader.html',
// 	'footer_url_en'    => 'http://192.168.0.229/enFooter.html',
// 	'left_menu_url_en' => 'http://192.168.0.229/j-messe/enLeft_menu.html',

	// debug
	// (to enable ethna_info and ethna_unittest, turn this true)
	'debug' => true,

	// db
	'dsn' => 'mysql://jmesse:idsjmesse@192.168.0.229/jmesse',
	// sample-1: single db
	// 'dsn' => 'mysql://user:password@server/database',
	//
	// sample-2: single db w/ multiple users
	// 'dsn'   => 'mysql://rw_user:password@server/database', // read-write
	// 'dsn_r' => 'mysql://ro_user:password@server/database', // read-only
	//
	// sample-3: multiple db (slaves)
	// 'dsn'   => 'mysql://rw_user:password@master/database', // read-write(master)
	// 'dsn_r' => array(
	//     'mysql://ro_user:password@slave1/database',         // read-only(slave)
	//     'mysql://ro_user:password@slave2/database',         // read-only(slave)
	// ),

	// log
	'log' => array(
		'file' => array(
			'level'  => 'debug',
			'option' => 'pid,function,pos',
			'mode'   => '666',
			'file'   => '/home/j-messe/app/jmesse/log/jmesse_'.date('Ymd').'.log',
		),
	),
	// sample-1: sigile facility
	//     'log_facility'          => 'echo',
	//     'log_level'             => 'debug',
	//     'log_option'            => 'pid,function,pos',
	//     'log_filter_do'         => '',
	//     'log_filter_ignore'     => 'Undefined index.*%%.*tpl',
	//
	// sample-2: mulitple facility
	//'log' => array(
	//    'echo'  => array(
	//        'level'         => 'warning',
	//    ),
	//    'file'  => array(
	//        'level'         => 'notice',
	//        'file'          => '/var/log/jmesse.log',
	//        'mode'          => 0666,
	//    ),
	//    'alertmail'  => array(
	//        'level'         => 'err',
	//        'mailaddress'   => 'alert@ml.example.jp',
	//    ),
	//),
	//'log_option'            => 'pid,function,pos',
	//'log_filter_do'         => '',
	//'log_filter_ignore'     => 'Undefined index.*%%.*tpl',

	// memcache
	// sample-1: single (or default) memcache
	// 'memcache_host' => 'localhost',
	// 'memcache_port' => 11211,
	// 'memcache_use_pconnect' => false,
	// 'memcache_retry' => 3,
	// 'memcache_timeout' => 3,
	//
	// sample-2: multiple memcache servers (distributing w/ namespace and ids)
	// 'memcache' => array(
	//     'namespace1' => array(
	//         0 => array(
	//             'memcache_host' => 'cache1.example.com',
	//             'memcache_port' => 11211,
	//         ),
	//         1 => array(
	//             'memcache_host' => 'cache2.example.com',
	//             'memcache_port' => 11211,
	//         ),
	//     ),
	// ),

	// i18n
	//'use_gettext' => false,

	// mail
	'mail_smtp_host' => '210.161.156.130',
	'mail_smtp_port' => '25',
	'mail_smtp_auth' => false,
	'mail_smtp_user' => '',
	'mail_smtp_pass' => '',

	'mail_from'        => mb_encode_mimeheader(mb_convert_encoding("J-messe 事務局", "ISO-2022-JP", "UTF-8"), "ISO-2022-JP").' <matsuura@ids.co.jp>',
// 	'mail_from'        => 'J-messe事務局 <matsuura@ids.co.jp>',
	'mail_from_en'     => 'J-messe Administrator <matsuura@ids.co.jp>',
	'mail_bcc'         => 'matsuura@ids.co.jp',
	'mail_return-path' => 'matsuura@ids.co.jp',
// 	'mail_from'        => 'J-messe事務局 <j-messe@jetro.go.jp>',
// 	'mail_from_en'     => 'J-messe Administrator <j-messe@jetro.go.jp>',
// 	'mail_bcc'         => 'j-messe@totec-net.com',
// 	'mail_return-path' => 'j-messe@jetro.go.jp',

	'mail_title_user_regist'  => 'J-messe 見本市ユーザ登録完了のお知らせ',
	'mail_title_user_change'  => 'J-messe 見本市ユーザ更新完了のお知らせ',
	'mail_title_user_confirm' => 'J-messe パスワード再発行のお知らせ',
	'mail_title_fair_regist'  => 'J-messe 見本市登録完了のお知らせ',
	'mail_title_fair_change'  => 'J-messe 見本市更新完了のお知らせ',
	'mail_title_user_regist_en'  => 'Notice of completion of your user registration for J-messe',
	'mail_title_user_change_en'  => 'Notice of completion of updating your user information for J-messe',
	'mail_title_user_confirm_en' => 'Notice of reissue of your password for J-messe',
	'mail_title_fair_regist_en'  => 'Notice of completion of your trade fair registration for J-messe',
	'mail_title_fair_change_en'  => 'Notice of completion of updating your registered trade fair for J-messe',

	'mail_imap_host' => 'imap.gmail.com',
	'mail_imap_port' => '993',
	'mail_imap_user' => '',
	'mail_imap_pass' => '',


	//'mail_func_workaround' => false,

	// Smarty
	//'renderer' => array(
	//    'smarty' => array(
	//        'left_delimiter' => '{',
	//        'right_delimiter' => '}',
	//    ),
	//),

	// csrf
	// 'csrf' => 'Session',
);
?>
