<?php
/*
 * jmesse-ini.php
*
* update:
*/
$config = array(
	// site
	'url' => 'http://localhost/jmesse/www/',

	// path
	'host_path' => 'http://localhost',
	'img_path' => 'img/',
	'flag_path' => 'img/flag/',

	//JSONファイル作成格納場所
	'jsonfile_path' => 'C:/Program Files/Apache Software Foundation/Apache2.2/htdocs/jmesse/www/json/',

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
			'level' => 'debug',
			'option' => 'pid,function,pos',
			'mode' => '666',
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
	'mail_smtp_host' => 'tokyo',
	'mail_smtp_port' => '25',
	'mail_smtp_user' => '',
	'mail_smtp_pass' => '',
	'mail_from' => 'J-messe事務局 <m.sasaki@ids.co.jp>',
	'mail_bcc' => 'matsuura@ids.co.jp',
// 	'mail_from' => 'J-messe事務局 <j-messe@jetro.go.jp>',
// 	'mail_bcc' => 'j-messe@totec-net.com',
	'mail_title_user_regist'  => 'J-messe見本市ユーザ登録完了のお知らせ',
	'mail_title_user_change'  => 'J-messe見本市ユーザ更新完了のお知らせ',
	'mail_title_user_confirm' => 'J-messe見本市ユーザのお知らせ',
	'mail_title_fair_regist'  => 'J-messe見本市登録完了のお知らせ',
	'mail_title_fair_change'  => 'J-messe見本市更新完了のお知らせ',
	'mail_title_user_regist_en'  => 'J-messe見本市ユーザ登録完了のお知らせ(英語)',
	'mail_title_user_change_en'  => 'J-messe見本市ユーザ更新完了のお知らせ(英語)',
	'mail_title_user_confirm_en' => 'J-messe見本市ユーザのお知らせ(英語)',
	'mail_title_fair_regist_en'  => 'J-messe見本市登録完了のお知らせ(英語)',
	'mail_title_fair_change_en'  => 'J-messe見本市更新完了のお知らせ(英語)',

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
