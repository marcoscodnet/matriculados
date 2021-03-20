<?php

/*
 define ( 'APP_NAME', 'mdc/' );
 define ( 'APP_PATH', '/var/www/' );
 define ( 'WEB_PATH', 'http://192.168.1.121' );
 include_once APP_PATH . APP_NAME . '/conf/init.php';
 include (APP_PATH . APP_NAME . '/conf/constants.php');
 include (APP_PATH . APP_NAME . '/conf/modules.php');
 include (APP_PATH . APP_NAME . '/conf/bbdd_config.php');
 include (APP_PATH . APP_NAME . '/conf/tables.php');
 include (APP_PATH . APP_NAME . '/conf/templates.php');
 include (APP_PATH . APP_NAME . '/conf/messages.php');
 */

define ( 'APP_NAME', '/mdc/' );
define ( 'APP_PATH', '/var/www/' . APP_NAME );
define ( 'WEB_PATH', 'http://www.ivda.biz/mdc' );

include_once APP_PATH . 'conf/constants.php';
include_once APP_PATH . 'conf/modules.php';
include_once APP_PATH . 'conf/tables.php';
include_once APP_PATH . 'conf/bbdd_config.php';
include_once APP_PATH . 'conf/templates.php';
include_once APP_PATH . 'conf/messages.php';


define ( 'CRON_PATH', APP_PATH . '/cron/' );

Logger::configure(CRON_PATH . "conf/log4php.xml");

?>