<?php

ini_set('memory_limit', '-1');
ini_set('max_execution_time', '0');
ini_set('display_errors', '0');



define('CDT_UI_LANGUAGE', 'es');


/* FORMATOS */

//números
define('CPIQ_DECIMALES', '2');
define('CPIQ_SEPARADOR_DECIMAL', ',');
define('CPIQ_SEPARADOR_MILES', '.');

//moneda.
define('CPIQ_MONEDA_SIMBOLO', '$');
define('CPIQ_MONEDA_ISO', 'ARS');
define('CPIQ_MONEDA_NOMBRE', 'Pesos Argentinos');
define('CPIQ_MONEDA_POSICION_IZQ', 1);



//env�o de emails.




//desarrollo.
define('CDT_POP_MAIL_FROM', 'test@codnet.net');
define('CDT_POP_MAIL_FROM_NAME', 'CONSEJO PROFESIONAL DE INGENIERÍA QUÍMICA');
define('CDT_POP_MAIL_HOST', 'mail.codnet.net');
//define('CDT_POP_MAIL_PORT', '465');
define('CDT_POP_MAIL_MAILER', 'smtp');
define('CDT_POP_MAIL_USERNAME', 'test@codnet.net');
define('CDT_POP_MAIL_PASSWORD', 'test0149');
define('CDT_MAIL_ENVIO_POP', true);

define("CDT_DEBUG_LOG", true);
define("CDT_ERROR_LOG", true);
define("CDT_MESSAGE_LOG", true);

define('CPIQ_DATE_FORMAT', 'd/m/Y');
define('CPIQ_DATETIME_FORMAT', 'd/m/y H:i:s');
define('CPIQ_DATETIME_FORMAT_STRING', 'YmdHis');

define('CPIQ_ESTADO_MATRICULADO_ACTIVO', 1);
define('CPIQ_ESTADO_MATRICULADO_SUSPENDIDO', 2);
define('CPIQ_ESTADO_MATRICULADO_BAJA', 3);
define('CPIQ_ESTADO_MATRICULADO_VITALICIO', 4);
define('CPIQ_ESTADO_MATRICULADO_ANULADO', 5);
define('CPIQ_ESTADO_MATRICULADO_FALLECIDO', 6);
define('CPIQ_ESTADO_MATRICULADO_CANCELADO', 7);
define('CPIQ_ESTADO_MATRICULADO_JUBILADO', 8);
define('CPIQ_ESTADO_MATRICULADO_EXTERIOR', 9);
define('CPIQ_ESTADO_MATRICULADO_DOCENTE', 10);
define('CPIQ_ESTADO_MATRICULADO_NOVEL1', 11);
define('CPIQ_ESTADO_MATRICULADO_NOVEL2', 12);

define('CPIQ_CAMBIO_ESTADO_ACTIVO', 'Pago de matrícula');


define('CPIQ_NRO_VALORES_CUOTA', 3);

define('CPIQ_CONCEPTO_PAGO_CUOTA_MATRICULA', 1);	
define('CPIQ_CONCEPTO_COBRO_CUOTA_MATRICULA', 2);	
define('CPIQ_CONCEPTO_PAGO_REGISTRO_MATRICULADO', 3);	
define('CPIQ_CONCEPTO_PAGO_ENCOMIENDA', 4);	
define('CPIQ_CONCEPTO_COBRO_ENCOMIENDA', 5);	
define('CPIQ_CONCEPTO_CONTRA_ASIENTO', 6);	
define('CPIQ_CONCEPTO_DEUDA_CUOTA_MATRICULA', 7);	
define('CPIQ_CONCEPTO_DEUDA_REGISTRO_MATRICULADO', 8);	
define('CPIQ_CONCEPTO_DEUDA_ENCOMIENDA', 9);	
define('CPIQ_CONCEPTO_COBRO_REGISTRO_MATRICULADO', 11);


define('CPIQ_REMITO_CUOTA_CUADRO', 38);


define('CPIQ_ESTADO_ENCOMIENDA_SOLICITADA', 1);
define('CPIQ_ESTADO_ENCOMIENDA_GENERADA', 2);
define('CPIQ_ESTADO_ENCOMIENDA_CERTIFICADA', 3);
define('CPIQ_ESTADO_ENCOMIENDA_CANCELADA', 4);
define('CPIQ_ESTADO_ENCOMIENDA_ANULADA', 5);

define('CPIQ_ENCOMIENDA_TEXTO_PRIMERO', 'Está inscripto y condiciones de ejercer las funciones atinentes a su título.');
define('CPIQ_ENCOMIENDA_TEXTO_SEGUNDO', 'Ha dado cumplimiento a las disposiciones legales y reglamentaciones, y demás disposiciones dictadas en consecuencia. ');
define('CPIQ_ENCOMIENDA_TEXTO_TERCERO', 'Desempeñará la tarea profesional siguiente');
define('CPIQ_ENCOMIENDA_TEXTO_CUARTO', 'Actúa/n profesional/es de distinta matrícula a los cuales el CPIQ autoriza a realizar ejercicios de simulacros conforme la reglamentación de la Superintendencia de Riesgos del Trabajo (SRT)');
define('CPIQ_ENCOMIENDA_TEXTO_QUINTO', 'Se hace constar que el profesional precedentemente identificado, en (2), al que se le ha encomendado la tarea detallada, está facultado al seguimiento administrativo de las actuaciones, solicitar, recibir y/o suministrar información mediante las vistas y peticiones necesarias. A tal fin, le otorgo por la presente suficiente mandato y he tomado conocimiento de las disposiciones que rigen el ejercicio profesional, de acuerdo con el Decreto Ley 6070/58, ratificado por la Ley 14.467 y el Código de Ética Profesional dictado por el Poder Ejecutivo Nacional como Decreto N° 1099/84.');
define('CPIQ_ENCOMIENDA_TEXTO_POS_FIRMA_COMITENTE', 'La presente conformará el Certificado de Acervo Profesional CAP una vez devuelto al Consejo Profesional de Ingeniería Química, conforme a la Resolución nro.: xxxxx/2013, para ser incorporado en la base de datos del profesional matriculado. La información suministrada en la misma estará sometida a la Ley de protección de datos nro.: xxxxxxx.');
define('CPIQ_ENCOMIENDA_TEXTO_SEGURIDAD', 'Certificado de Encomienda conformado en base a la Solicitud de Encomienda # ');
define('CPIQ_ENCOMIENDA_TEXTO_PIE_PAGINA', 'NOTA
(1)	LA PRESENTE ENCOMIENDA CONSTA DE DOS (2) HOJAS Y SE EMITEN TRES (3) EJEMPLARES DE LA MISMA.
(2)	IDENTIFICACIÓN DEL MATRICULADO RESPONSABLE DE LA ENCOMIENDA.
(3)	SE HACE CONSTAR POR EL COMITENTE - QUIEN, A TAL FIN SUSCRIBE LA PRESENTE EN CARÁCTER DE DECLARACIÓN JURADA -, QUE TODOS LOS DATOS TÉCNICO/LEGALES QUE SE SUMUNISTRAN SE AJUSTAN A LA REALIDAD.
(4)	LLENAR SÓLO EN CASO DE PERSONA JURÍDICA U ORGANISMO.
(5)	Documento NO VÁLIDO sin el Ticket de Verificación de Firma que se obtiene en http://www.cpiq.org.ar/verificacion.html
');

define("CDT_TEST_MODE", 0);
define("CDT_MAIL_TO_IN_TEST_MODE", "marcosp@codnet.com.ar");

define('CPIQ_NRO_DIGITOS_ENCOMIENDA', 8);
define('CPIQ_NRO_DIGITOS_MATRICULADO', 8);
define('CPIQ_NRO_DIGITOS_SEGURIDAD', 8);
define('CPIQ_NRO_DIGITOS_VERSION', 4);

define('CPIQ_PERSONA_FISICA', 1);
define('CPIQ_PERSONA_JURIDICA', 2);
?>