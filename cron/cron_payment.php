<?php

include_once 'conf/cron_config.php';

Logger::configure(CRON_PATH . "conf/log4php_payment.xml");

$controller = new CdtActionController();
$controller->execute('pay_to_member');
?>