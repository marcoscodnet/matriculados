<?php
/**
 * se definen la configuración para la conexión
 * a la base de datos.
 *
 * @author bernardo
 * @since 27/02/2013
 *
 */



/* DESARROLLO */
//define('DB_CLASS', 'AuditMySQL');
define('DB_CLASS', 'MySQL');
define('DB_HOST', '163.10.35.34');
define('DB_USER', 'root');
define('DB_PASSWORD', 'secyt');
define('DB_NAME', 'cpiq_matriculados');
define('ROW_PER_PAGE', 15);
define('DB_DEFAULT_DATE_FORMAT', "Y-m-d");
define('DB_DEFAULT_DATETIME_FORMAT', "Y-m-d H:i:s");

/* PREPRODUCCIÓN
 define('DB_CLASS', 'MySQL');
 define('DB_HOST', '192.168.1.121');
 define('DB_USER', 'root');
 define('DB_PASSWORD', 'codnet');
 define('DB_NAME', 'cpiq_matriculados');
 define('ROW_PER_PAGE', 15);
 */

/* PRODUCCIÓN
 define('DB_CLASS', 'MySQL');
 define('DB_HOST', '192.168.1.121');
 define('DB_USER', 'root');
 define('DB_PASSWORD', 'codnet');
 define('DB_NAME', 'cpiq_matriculados');
 define('ROW_PER_PAGE', 15);
 */
?>
