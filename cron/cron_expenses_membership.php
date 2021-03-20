<?php

include_once 'conf/cron_config.php';

Logger::configure(CRON_PATH . "conf/log4php_membership.xml");

$controller = new CdtActionController();
$controller->execute('expenses_for_membership');
?>