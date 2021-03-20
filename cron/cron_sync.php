<?php

include_once 'conf/cron_config.php';

//configuramos el path del logger.
//TODO ver si se puede configurar para que envíe mails.
Logger::configure(CRON_PATH . "conf/log4php_sync.xml");
$controller = new CdtActionController();
$controller->execute('sync');
?>