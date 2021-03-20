<?php

/**
 * se definen los mensajes del sistema en espa�ol.
 *
 * @author modelBuilder
 *
 */


include_once('messages_labels_es.php');


define('CPIQ_MSG_ASIGNAR', 'Asignar', true);
define('CPIQ_MSG_CERRAR', 'Cerrar', true);

//solicitar clave.
define( "CDT_SECURE_MSG_FORGOT_PASSWORD", "Si olvidó su password y quiere cambiarla, ingrese su usuario, DNI o e-mail y le enviaremos una nueva");
define( "CDT_SECURE_LBL_FORGOT_PASSWORD_EMAIL", "Usuario, DNI o e-mail");
define( "CDT_SECURE_MSG_FORGOT_PASSWORD_FILL_EMAIL", "Usuario, DNI o e-mail requerido");

//* REGISTRACION */
define( "CDT_SECURE_MSG_USERNAME_REQUIRED", 'DNI requerido');

define( "CDT_SECURE_MSG_REGISTRATION_USERNAME_DUPLICATED",  'El DNI ya fue registrado');

define('CPIQ_SECURE_MSG_REGISTRATION_MATRICULADO_CONTROL_ERROR', 'El DNI no se encuentra registrado como Matriculado en el CPIQ', true);
define('CPIQ_SECURE_MSG_REGISTRATION_MATRICULADO_CONTROL_1', 'Si usted es ', true);
define('CPIQ_SECURE_MSG_REGISTRATION_MATRICULADO_CONTROL_2', ' continue con el registro', true);
define("CPIQ_SECURE_MSG_ACTIVATION_MATRICULADO_ERROR",  "Su DNI no se encuentra registrado como Matriculado en el CPIQ", true );

/* PAISES */

define('CPIQ_MSG_PAIS_TITLE_LIST', 'Paises', true);
define('CPIQ_MSG_PAIS_TITLE_ADD', 'Agregar ' . CPIQ_LBL_PAIS, true);
define('CPIQ_MSG_PAIS_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_PAIS , true);
define('CPIQ_MSG_PAIS_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_PAIS , true);
define('CPIQ_MSG_PAIS_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_PAIS , true);

define('CPIQ_MSG_PAIS_NOMBRE_REQUIRED', CPIQ_LBL_PAIS_NOMBRE . ' es requerido', true);


/* PROVINCIAS */

define('CPIQ_MSG_PROVINCIA_TITLE_LIST', 'Provincias', true);
define('CPIQ_MSG_PROVINCIA_TITLE_ADD', 'Agregar ' . CPIQ_LBL_PROVINCIA, true);
define('CPIQ_MSG_PROVINCIA_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_PROVINCIA , true);
define('CPIQ_MSG_PROVINCIA_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_PROVINCIA , true);
define('CPIQ_MSG_PROVINCIA_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_PROVINCIA , true);

define('CPIQ_MSG_PROVINCIA_NOMBRE_REQUIRED', CPIQ_LBL_PROVINCIA_NOMBRE . ' es requerido', true);
define('CPIQ_MSG_PROVINCIA_PAIS_REQUIRED', CPIQ_LBL_PAIS . ' es requerido', true);

/* LOCALIDADES */

define('CPIQ_MSG_LOCALIDAD_TITLE_LIST', 'Localidades', true);
define('CPIQ_MSG_LOCALIDAD_TITLE_ADD', 'Agregar ' . CPIQ_LBL_LOCALIDAD, true);
define('CPIQ_MSG_LOCALIDAD_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_LOCALIDAD , true);
define('CPIQ_MSG_LOCALIDAD_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_LOCALIDAD , true);
define('CPIQ_MSG_LOCALIDAD_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_LOCALIDAD , true);

define('CPIQ_MSG_LOCALIDAD_NOMBRE_REQUIRED', CPIQ_LBL_LOCALIDAD_NOMBRE . ' es requerido', true);
define('CPIQ_MSG_LOCALIDAD_PROVINCIA_REQUIRED', CPIQ_LBL_PROVINCIA . ' es requerido', true);


/* TIPOS DE TITULO */

define('CPIQ_MSG_TIPO_TITULO_TITLE_LIST', 'Tipos de título', true);
define('CPIQ_MSG_TIPO_TITULO_TITLE_ADD', 'Agregar ' . CPIQ_LBL_TIPO_TITULO, true);
define('CPIQ_MSG_TIPO_TITULO_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_TIPO_TITULO , true);
define('CPIQ_MSG_TIPO_TITULO_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_TIPO_TITULO , true);
define('CPIQ_MSG_TIPO_TITULO_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_TIPO_TITULO , true);

define('CPIQ_MSG_TIPO_TITULO_NOMBRE_REQUIRED', CPIQ_LBL_TIPO_TITULO_NOMBRE . ' es requerido', true);
define('CPIQ_MSG_TIPO_TITULO_CLASE_TITULO_REQUIRED', CPIQ_LBL_CLASE_TITULO . ' es requerido', true);
define('CPIQ_MSG_TIPO_TITULO_SECUENCIA_TITULO_REQUIRED', CPIQ_LBL_SECUENCIA_TITULO . ' es requerido', true);

/* TIPOS DE DOCUMENTO */

define('CPIQ_MSG_TIPO_DOCUMENTO_TITLE_LIST', 'Tipos de documento', true);
define('CPIQ_MSG_TIPO_DOCUMENTO_TITLE_ADD', 'Agregar ' . CPIQ_LBL_TIPO_DOCUMENTO, true);
define('CPIQ_MSG_TIPO_DOCUMENTO_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_TIPO_DOCUMENTO , true);
define('CPIQ_MSG_TIPO_DOCUMENTO_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_TIPO_DOCUMENTO , true);
define('CPIQ_MSG_TIPO_DOCUMENTO_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_TIPO_DOCUMENTO , true);

define('CPIQ_MSG_TIPO_DOCUMENTO_NOMBRE_REQUIRED', CPIQ_LBL_TIPO_DOCUMENTO_NOMBRE . ' es requerido', true);


/* MATRICULADOS */

define('CPIQ_MSG_MATRICULADO_TITLE_LIST', 'Matriculados', true);
define('CPIQ_MSG_MATRICULADO_TITLE_ADD', 'Agregar ' . CPIQ_LBL_MATRICULADO, true);
define('CPIQ_MSG_MATRICULADO_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_MATRICULADO , true);
define('CPIQ_MSG_MATRICULADO_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_MATRICULADO , true);
define('CPIQ_MSG_MATRICULADO_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_MATRICULADO , true);

define('CPIQ_MSG_MATRICULADO_NOMBRE_REQUIRED', CPIQ_LBL_MATRICULADO_NOMBRE . ' es requerido', true);
define('CPIQ_MSG_MATRICULADO_APELLIDO_REQUIRED', CPIQ_LBL_MATRICULADO_APELLIDO . ' es requerido', true);
define('CPIQ_MSG_MATRICULADO_NRO_DOCUMENTO_REQUIRED', CPIQ_LBL_MATRICULADO_NRO_DOCUMENTO . ' es requerido', true);
define('CPIQ_MSG_MATRICULADO_TIPO_DOCUMENTO_REQUIRED', CPIQ_LBL_MATRICULADO_TIPO_DOCUMENTO . ' es requerido', true);
define('CPIQ_MSG_MATRICULADO_EMAIL_REQUIRED', CPIQ_LBL_MATRICULADO_EMAIL . ' es requerido', true);
define('CPIQ_MSG_MATRICULADO_LOCALIDAD_REQUIRED', CPIQ_LBL_MATRICULADO_LOCALIDAD . ' es requerida', true);
define('CPIQ_MSG_MATRICULADO_DOMICILIO_REQUIRED', CPIQ_LBL_MATRICULADO_DOMICILIO . ' es requerido', true);
define('CPIQ_MSG_MATRICULADO_LOCALIDAD_REQUIRED', CPIQ_LBL_LOCALIDAD . ' es requerido', true);

define('CPIQ_MSG_MATRICULADO_NO_ACTIVO', 'El matriculado no posee estado activo por lo que esta operación no puede continuar', true);
define('CPIQ_MSG_MATRICULADO_SIN_CUOTA_AL_DIA', 'El matriculado no posee la cuota al día por lo que esta operación no puede continuar', true);
define('CPIQ_MSG_MATRICULADO_SIN_INCUMBENCIAS', 'El matriculado no posee las incumbencias necesarias por lo que esta operación no puede continuar', true);
define('CPIQ_MSG_MATRICULADO_SANCIONES_ESTICAS', 'No puede realizar esta operación, por favor póngase en contacto con el CPIQ', true);

/* ENTIDADES EMISORAS */

define('CPIQ_MSG_ENTIDAD_EMISORA_TITLE_LIST', 'Entidades emisoras', true);
define('CPIQ_MSG_ENTIDAD_EMISORA_TITLE_ADD', 'Agregar ' . CPIQ_LBL_ENTIDAD_EMISORA, true);
define('CPIQ_MSG_ENTIDAD_EMISORA_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_ENTIDAD_EMISORA , true);
define('CPIQ_MSG_ENTIDAD_EMISORA_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_ENTIDAD_EMISORA , true);
define('CPIQ_MSG_ENTIDAD_EMISORA_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_ENTIDAD_EMISORA , true);

define('CPIQ_MSG_ENTIDAD_EMISORA_NOMBRE_REQUIRED', CPIQ_LBL_ENTIDAD_EMISORA_NOMBRE . ' es requerido', true);

/* ESTADOS MATRICULADOS */

define('CPIQ_MSG_ESTADO_MATRICULADO_TITLE_LIST', 'Estados de matriculado', true);
define('CPIQ_MSG_ESTADO_MATRICULADO_TITLE_ADD', 'Agregar ' . CPIQ_LBL_ESTADO_MATRICULADO, true);
define('CPIQ_MSG_ESTADO_MATRICULADO_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_ESTADO_MATRICULADO , true);
define('CPIQ_MSG_ESTADO_MATRICULADO_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_ESTADO_MATRICULADO , true);
define('CPIQ_MSG_ESTADO_MATRICULADO_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_ESTADO_MATRICULADO , true);

define('CPIQ_MSG_ESTADO_MATRICULADO_NOMBRE_REQUIRED', CPIQ_LBL_ESTADO_MATRICULADO_NOMBRE . ' es requerido', true);

/* CLASES TITULOS */

define('CPIQ_MSG_CLASE_TITULO_TITLE_LIST', 'Clases de título', true);
define('CPIQ_MSG_CLASE_TITULO_TITLE_ADD', 'Agregar ' . CPIQ_LBL_CLASE_TITULO, true);
define('CPIQ_MSG_CLASE_TITULO_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_CLASE_TITULO , true);
define('CPIQ_MSG_CLASE_TITULO_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_CLASE_TITULO , true);
define('CPIQ_MSG_CLASE_TITULO_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_CLASE_TITULO , true);

define('CPIQ_MSG_CLASE_TITULO_NOMBRE_REQUIRED', CPIQ_LBL_CLASE_TITULO_NOMBRE . ' es requerido', true);

/* SECUENCIAS TITULOS */

define('CPIQ_MSG_SECUENCIA_TITULO_TITLE_LIST', 'Secuencias de título', true);
define('CPIQ_MSG_SECUENCIA_TITULO_TITLE_ADD', 'Agregar ' . CPIQ_LBL_SECUENCIA_TITULO, true);
define('CPIQ_MSG_SECUENCIA_TITULO_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_SECUENCIA_TITULO , true);
define('CPIQ_MSG_SECUENCIA_TITULO_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_SECUENCIA_TITULO , true);
define('CPIQ_MSG_SECUENCIA_TITULO_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_SECUENCIA_TITULO , true);

define('CPIQ_MSG_SECUENCIA_TITULO_NOMBRE_REQUIRED', CPIQ_LBL_SECUENCIA_TITULO_NOMBRE . ' es requerido', true);
define('CPIQ_MSG_SECUENCIA_TITULO_ULT_MATRICULA_REQUIRED', CPIQ_LBL_SECUENCIA_TITULO_ULT_MATRICULA . ' es requerido', true);

/* TITULOS */

define('CPIQ_MSG_TITULO_TITLE_LIST', 'Títulos', true);
define('CPIQ_MSG_TITULO_TITLE_ADD', 'Agregar ' . CPIQ_LBL_TITULO, true);
define('CPIQ_MSG_TITULO_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_TITULO , true);
define('CPIQ_MSG_TITULO_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_TITULO , true);
define('CPIQ_MSG_TITULO_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_TITULO , true);

define('CPIQ_MSG_TITULO_MATRICULADO_REQUIRED', CPIQ_LBL_MATRICULADO . ' es requerido', true);
define('CPIQ_MSG_TITULO_TIPO_TITULO_REQUIRED', CPIQ_LBL_TIPO_TITULO . ' es requerido', true);
define('CPIQ_MSG_TITULO_ENTIDAD_EMISORA_REQUIRED', CPIQ_LBL_ENTIDAD_EMISORA . ' es requerido', true);
define('CPIQ_MSG_TITULO_MATRICULA_REQUIRED', CPIQ_LBL_TITULO_MATRICULA . ' es requerido', true);
define('CPIQ_MSG_TITULO_FECHA_EXPEDICION_REQUIRED', CPIQ_LBL_TITULO_FECHA_EXPEDICION . ' es requerido', true);
define('CPIQ_MSG_TITULO_FECHA_MATRICULACION_REQUIRED', CPIQ_LBL_TITULO_FECHA_MATRICULACION . ' es requerido', true);

define('CPIQ_MSG_TITULO_FECHA_EXPEDICION_MAYOR', CPIQ_LBL_TITULO_FECHA_EXPEDICION . ' es mayor que la fecha actual', true);
define('CPIQ_MSG_TITULO_FECHA_MATRICULACION_MAYOR', CPIQ_LBL_TITULO_FECHA_MATRICULACION . ' es mayor que la fecha actual', true);

define('CPIQ_MSG_AGREGAR_OTRO_TITULO', 'Desea agregar otro título?', true);

/* CUOTAS */

define('CPIQ_MSG_CUOTA_TITLE_LIST', 'Cuotas', true);
define('CPIQ_MSG_CUOTA_TITLE_ADD', 'Agregar ' . CPIQ_LBL_CUOTA, true);
define('CPIQ_MSG_CUOTA_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_CUOTA , true);
define('CPIQ_MSG_CUOTA_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_CUOTA , true);
define('CPIQ_MSG_CUOTA_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_CUOTA , true);


define('CPIQ_MSG_CUOTA_NOMBRE_REQUIRED', 'Nombre es requerido', true);

define('CPIQ_MSG_CUOTA_YEAR_REQUIRED', 'Año es requerido', true);

define('CPIQ_MSG_CUOTA_INEXISTENTE', 'No existen cuotas', true);

define('CPIQ_MSG_CUOTA_MATRICULA', 'Cuota Matrícula', true);

/* VALORES CUOTAS */
define('CPIQ_MSG_CUOTA_VALOR_FECHA_DESDE_REQUIRED', 'F. desde es requerido', true);
define('CPIQ_MSG_CUOTA_VALOR_FECHA_HASTA_REQUIRED', 'F. hasta es requerido', true);
define('CPIQ_MSG_CUOTA_VALOR_IMPORTE_REQUIRED', 'Importe otros es requerido', true);
define('CPIQ_MSG_CUOTA_VALOR_IMPORTE_INGENIERO_REQUIRED', 'Importe Ing. ó Lic. es requerido', true);

define('CPIQ_MSG_CUOTA_VALOR_FECHA_MAYOR', ' es mayor que ', true);
define('CPIQ_MSG_CUOTA_VALOR_FECHA_MENOR', ' es menor que ', true);

/* CUOTAS GENERADAS */

define('CPIQ_MSG_CUOTA_GENERADA_TITLE_LIST', 'Cuotas Generadas', true);
define('CPIQ_MSG_CUOTA_GENERADA_TITLE_ADD', 'Agregar ' . CPIQ_LBL_CUOTA_GENERADA, true);
define('CPIQ_MSG_CUOTA_GENERADA_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_CUOTA_GENERADA , true);
define('CPIQ_MSG_CUOTA_GENERADA_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_CUOTA_GENERADA , true);
define('CPIQ_MSG_CUOTA_GENERADA_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_CUOTA_GENERADA , true);
define('CPIQ_MSG_CUOTA_GENERADA_TITLE_MASIVA', 'Generar cuotas masivas', true);


define('CPIQ_MSG_CUOTA_GENERADA_MATRICULADO_REQUIRED', CPIQ_LBL_MATRICULADO . ' es requerido', true);
define('CPIQ_MSG_CUOTA_GENERADA_CUOTA_REQUIRED', CPIQ_LBL_CUOTA . ' es requerido', true);
define('CPIQ_MSG_CUOTA_GENERADA_MOV_CTA_CTE_REQUIRED', CPIQ_LBL_MOV_CTA_CTE . ' es requerido', true);
define('CPIQ_MSG_CUOTA_GENERADA_NOMBRE_REQUIRED', CPIQ_LBL_TITULO_NOMBRE . ' es requerido', true);
define('CPIQ_MSG_CUOTA_GENERADA_FECHA_CARGA_REQUIRED', CPIQ_LBL_TITULO_FECHA_CARGA . ' es requerido', true);

define('CPIQ_MSG_CUOTA_GENERADA_PROCESO_MASIVO', 'Proceso masivo', true);

define('CPIQ_MSG_CUOTA_PAGAR_CUOTA_GENERADA', 'Asentar-pago', true);

define('CPIQ_MSG_CUOTA_COMPROBANTE_CUOTA_GENERADA', 'Comprobante-Pago', true);

define('CPIQ_MSG_CUOTA_GENERADA_PAGA', 'Pagada', true);
define('CPIQ_MSG_CUOTA_GENERADA_IMPAGA', 'Impaga', true);
define('CPIQ_MSG_CUOTA_GENERADA_PAGAR_PROHIBIDO', 'La cuota ya fue pagada', true);

define('CPIQ_MSG_CUOTA_COMPROBANTE_CUOTA_GENERADA_SUBJECT_MAIL', 'En el PDF adjunto se encuentra el comprobante de pago', true);

define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PRIMERO', 'PRIMERO', true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_SEGUNDO', 'SEGUNDO', true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_TERCERO', 'TERCERO', true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_CUARTO', 'CUARTO', true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_QUINTO', 'QUINTO', true);


define('CPIQ_MSG_CERTIFICADO_CPIQ_TITLE', 'CONSEJO PROFESIONAL DE INGENIERÍA QUÍMICA');
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_TITLE', 'CERTIFICADO DE ENCOMIENDA PROFESIONAL (1)', true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_SUBTITLE', 'NRO.', true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_NOTA_1', 'LA PRESENTE ENCOMIENDA CONSTA DE DOS (2) HOJAS Y SE EMITEN TRES (3) EJEMPLARES DE LA MISMA.', true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_NOTA_2', 'IDENTIFICACIÓN DEL MATRICULADO RESPONSABLE DE LA ENCOMIENDA.', true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_NOTA_3', 'SE HACE CONSTAR POR EL COMITENTE - QUIEN, A TAL FIN SUSCRIBE LA PRESENTE EN CARÁCTER DE DECLARACIÓN JURADA -, QUE TODOS LOS DATOS TÉCNICO/LEGALES QUE SE SUMUNISTRAN SE AJUSTAN A LA REALIDAD.', true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_NOTA_4', 'LLENAR SÓLO EN CASO DE PERSONA JURÍDICA U ORGANISMO.', true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_NOTA_5', 'Documento NO VÁLIDO sin el Ticket de Verificación de Firma que se obtiene en http://www.cpiq.org.ar/verificacion.html', true);

define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PAGE1_TITLE', 'CONSEJO PROFESIONAL DE INGENIERÍA QUÍMICA', true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PAGE1_CERTIFICA', 'CERTIFICA QUE (2)', true);

define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PAGE2_DATOS', "DATOS DEL COMITENTE (3)", true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PAGE2_RAZON', "NOMBRE O RAZÓN SOCIAL", true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PAGE2_REPRESENTANTE', "REPRESENTANTE(4)", true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PAGE2_FIRMA', "FIRMA DEL COMITENTE", true);

define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_BUENOS_AIRES', "BUENOS AIRES", true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PIE_FIRMA', "FIRMA DEL MATRICULADO", true);
define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PIE_CODIGO', "Código de verificación:", true);

define('CPIQ_MSG_CERTIFICADO_ENCOMIENDA_SUBJECT', 'CERTIFICADO DE ENCOMIENDA PROFESIONAL', true);

/* REGISTROS */

define('CPIQ_MSG_REGISTRO_TITLE_LIST', 'Registros', true);
define('CPIQ_MSG_REGISTRO_TITLE_ADD', 'Agregar ' . CPIQ_LBL_REGISTRO, true);
define('CPIQ_MSG_REGISTRO_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_REGISTRO , true);
define('CPIQ_MSG_REGISTRO_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_REGISTRO , true);
define('CPIQ_MSG_REGISTRO_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_REGISTRO , true);

define('CPIQ_MSG_REGISTRO_NOMBRE_REQUIRED', CPIQ_LBL_REGISTRO_NOMBRE . ' es requerido', true);
define('CPIQ_MSG_REGISTRO_SIGLA_REQUIRED', CPIQ_LBL_REGISTRO_SIGLA . ' es requerido', true);

/* REGISTRO MATRICULADO */

define('CPIQ_MSG_REGISTRO_MATRICULADO_TITLE_LIST', 'Registros del Matriculado', true);
define('CPIQ_MSG_REGISTRO_MATRICULADO_TITLE_ADD', 'Agregar ' . CPIQ_LBL_REGISTRO_MATRICULADO, true);
define('CPIQ_MSG_REGISTRO_MATRICULADO_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_REGISTRO_MATRICULADO , true);
define('CPIQ_MSG_REGISTRO_MATRICULADO_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_REGISTRO_MATRICULADO , true);
define('CPIQ_MSG_REGISTRO_MATRICULADO_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_REGISTRO_MATRICULADO , true);


define('CPIQ_MSG_REGISTRO_MATRICULADO_MATRICULADO_REQUIRED', CPIQ_LBL_MATRICULADO . ' es requerido', true);

define('CPIQ_MSG_REGISTRO_MATRICULADO_REGISTRO_CUOTA_REQUIRED', CPIQ_LBL_REGISTRO_CUOTA . ' es requerido', true);
define('CPIQ_MSG_REGISTRO_MATRICULADO_FECHA_REQUIRED', CPIQ_LBL_REGISTRO_MATRICULADO_FECHA . ' es requerido', true);

define('CPIQ_MSG_REGISTRO_MATRICULADO_NUMERO_REQUIRED', CPIQ_LBL_REGISTRO_MATRICULADO_NUMERO . ' es requerido', true);

define('CPIQ_MSG_REGISTRO_MATRICULADO_REGISTRO_REQUIRED', CPIQ_LBL_REGISTRO. ' es requerido', true);

define('CPIQ_MSG_REGISTRO_MATRICULADO_CUOTA_TITLE_LIST', 'Cuotas_Registro', true);

/* REGISTROS CUOTAS */

define('CPIQ_MSG_REGISTRO_CUOTA_TITLE_LIST', 'Cuotas de Registro', true);
define('CPIQ_MSG_REGISTRO_CUOTA_TITLE_ADD', 'Agregar ' . CPIQ_LBL_REGISTRO_CUOTA, true);
define('CPIQ_MSG_REGISTRO_CUOTA_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_REGISTRO_CUOTA , true);
define('CPIQ_MSG_REGISTRO_CUOTA_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_REGISTRO_CUOTA , true);
define('CPIQ_MSG_REGISTRO_CUOTA_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_REGISTRO_CUOTA , true);

define('CPIQ_MSG_REGISTRO_CUOTA_YEAR_REQUIRED', CPIQ_LBL_REGISTRO_CUOTA_YEAR . ' es requerido', true);
define('CPIQ_MSG_REGISTRO_CUOTA_IMPORTE_REQUIRED', CPIQ_LBL_REGISTRO_CUOTA_IMPORTE . ' es requerido', true);
define('CPIQ_MSG_REGISTRO_CUOTA_REGISTRO_REQUIRED', CPIQ_LBL_REGISTRO_CUOTA_REGISTRO . ' es requerido', true);

/* CONCEPTOS */

define('CPIQ_MSG_CONCEPTO_TITLE_LIST', 'Conceptos', true);
define('CPIQ_MSG_CONCEPTO_TITLE_ADD', 'Agregar ' . CPIQ_LBL_CONCEPTO, true);
define('CPIQ_MSG_CONCEPTO_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_CONCEPTO , true);
define('CPIQ_MSG_CONCEPTO_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_CONCEPTO , true);
define('CPIQ_MSG_CONCEPTO_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_CONCEPTO , true);

define('CPIQ_MSG_CONCEPTO_NOMBRE_REQUIRED', 'Nombre es requerido', true);
define('CPIQ_MSG_CONCEPTO_COEFICIENTE_REQUIRED', 'Coeficiente es requerido', true);
define('CPIQ_MSG_CONCEPTO_ASIGNADO_REQUIRED', 'Asignado es requerido', true);

/* INCUMBENCIAS */

define('CPIQ_MSG_INCUMBENCIA_TITLE_LIST', 'Incumbencias', true);
define('CPIQ_MSG_INCUMBENCIA_TITLE_ADD', 'Agregar ' . CPIQ_LBL_INCUMBENCIA, true);
define('CPIQ_MSG_INCUMBENCIA_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_INCUMBENCIA , true);
define('CPIQ_MSG_INCUMBENCIA_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_INCUMBENCIA , true);
define('CPIQ_MSG_INCUMBENCIA_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_INCUMBENCIA , true);

define('CPIQ_MSG_INCUMBENCIA_NOMBRE_REQUIRED', CPIQ_LBL_INCUMBENCIA_NOMBRE . ' es requerido', true);



/* INCUMBENCIAS TIPOS TITULOS */

define('CPIQ_MSG_INCUMBENCIA_TIPO_TITULO_TITLE_LIST', 'Títulos de la Incumbencia', true);
define('CPIQ_MSG_INCUMBENCIA_TIPO_TITULO_TITLE_ADD', 'Agregar ' . CPIQ_LBL_INCUMBENCIA_TIPO_TITULO, true);
define('CPIQ_MSG_INCUMBENCIA_TIPO_TITULO_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_INCUMBENCIA_TIPO_TITULO , true);
define('CPIQ_MSG_INCUMBENCIA_TIPO_TITULO_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_INCUMBENCIA_TIPO_TITULO , true);
define('CPIQ_MSG_INCUMBENCIA_TIPO_TITULO_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_INCUMBENCIA_TIPO_TITULO , true);

define('CPIQ_MSG_INCUMBENCIA_TIPO_TITULO_INCUMBENCIA_REQUIRED', CPIQ_LBL_INCUMBENCIA_TIPO_TITULO_INCUMBENCIA . ' es requerido', true);
define('CPIQ_MSG_INCUMBENCIA_TIPO_TITULO_TIPO_TITULO_REQUIRED', CPIQ_LBL_INCUMBENCIA_TIPO_TITULO_TIPO_TITULO . ' es requerido', true);

/* TIPOS DE ENCOMIENDA */

define('CPIQ_MSG_TIPO_ENCOMIENDA_TITLE_LIST', 'Tareas profesionales', true);
define('CPIQ_MSG_TIPO_ENCOMIENDA_TITLE_ADD', 'Agregar ' . CPIQ_LBL_TIPO_ENCOMIENDA, true);
define('CPIQ_MSG_TIPO_ENCOMIENDA_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_TIPO_ENCOMIENDA , true);
define('CPIQ_MSG_TIPO_ENCOMIENDA_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_TIPO_ENCOMIENDA , true);
define('CPIQ_MSG_TIPO_ENCOMIENDA_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_TIPO_ENCOMIENDA , true);

define('CPIQ_MSG_TIPO_ENCOMIENDA_NOMBRE_REQUIRED', CPIQ_LBL_TIPO_ENCOMIENDA_NOMBRE . ' es requerido', true);



/* INCUMBENCIAS DE TIPOS DE ENCOMIENDA */

define('CPIQ_MSG_INCUMBENCIA_TIPO_ENCOMIENDA_TITLE_LIST', 'Incumb. de T. Prof.', true);
define('CPIQ_MSG_INCUMBENCIA_TIPO_ENCOMIENDA_TITLE_ADD', 'Agregar ' . CPIQ_LBL_INCUMBENCIA_TIPO_ENCOMIENDA, true);
define('CPIQ_MSG_INCUMBENCIA_TIPO_ENCOMIENDA_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_INCUMBENCIA_TIPO_ENCOMIENDA , true);
define('CPIQ_MSG_INCUMBENCIA_TIPO_ENCOMIENDA_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_INCUMBENCIA_TIPO_ENCOMIENDA , true);
define('CPIQ_MSG_INCUMBENCIA_TIPO_ENCOMIENDA_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_INCUMBENCIA_TIPO_ENCOMIENDA , true);

define('CPIQ_MSG_INCUMBENCIA_TIPO_ENCOMIENDA_INCUMBENCIA_REQUIRED', CPIQ_LBL_INCUMBENCIA_TIPO_ENCOMIENDA_INCUMBENCIA . ' es requerido', true);
define('CPIQ_MSG_INCUMBENCIA_TIPO_ENCOMIENDA_TIPO_ENCOMIENDA_REQUIRED', CPIQ_LBL_INCUMBENCIA_TIPO_ENCOMIENDA_TIPO_ENCOMIENDA . ' es requerido', true);

/* TIPOS DE ESTADOS DE ENCOMIENDA */

define('CPIQ_MSG_TIPO_ESTADO_ENCOMIENDA_TITLE_LIST', 'Estados de encomienda', true);
define('CPIQ_MSG_TIPO_ESTADO_ENCOMIENDA_TITLE_ADD', 'Agregar ' . CPIQ_LBL_TIPO_ESTADO_ENCOMIENDA, true);
define('CPIQ_MSG_TIPO_ESTADO_ENCOMIENDA_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_TIPO_ESTADO_ENCOMIENDA , true);
define('CPIQ_MSG_TIPO_ESTADO_ENCOMIENDA_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_TIPO_ESTADO_ENCOMIENDA , true);
define('CPIQ_MSG_TIPO_ESTADO_ENCOMIENDA_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_TIPO_ESTADO_ENCOMIENDA , true);



define('CPIQ_MSG_TIPO_ESTADO_ENCOMIENDA_NOMBRE_REQUIRED', CPIQ_LBL_TIPO_ESTADO_ENCOMIENDA_NOMBRE . ' es requerido', true);

/* ENCOMIENDAS */

define('CPIQ_MSG_ENCOMIENDA_TITLE_LIST', 'Encomiendas', true);
define('CPIQ_MSG_ENCOMIENDA_TITLE_ADD', 'Agregar ' . CPIQ_LBL_ENCOMIENDA, true);
define('CPIQ_MSG_ENCOMIENDA_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_ENCOMIENDA , true);
define('CPIQ_MSG_ENCOMIENDA_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_ENCOMIENDA , true);
define('CPIQ_MSG_ENCOMIENDA_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_ENCOMIENDA , true);

define('CPIQ_MSG_ENCOMIENDA_CAMBIAR_ESTADO', 'Cambiar estado', true);
define('CPIQ_MSG_ENCOMIENDA_PAGAR', 'Pagar encomienda', true);


define('CPIQ_MSG_ENCOMIENDA_NUMERO_REQUIRED', CPIQ_LBL_ENCOMIENDA_NUMERO . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_MATRICULADO_REQUIRED', CPIQ_LBL_ENCOMIENDA_MATRICULADO . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_TIPO_ENCOMIENDA_REQUIRED', CPIQ_LBL_ENCOMIENDA_TIPO_ENCOMIENDA . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_FECHA_REQUIRED', CPIQ_LBL_ENCOMIENDA_FECHA . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_COMITENTE_REQUIRED', CPIQ_LBL_ENCOMIENDA_COMITENTE . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_LOCALIDAD_REQUIRED', CPIQ_LBL_ENCOMIENDA_LOCALIDAD . ' es requerida', true);
define('CPIQ_MSG_ENCOMIENDA_DOMICILIO_REQUIRED', CPIQ_LBL_ENCOMIENDA_DOMICILIO . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_TIPO_COMITENTE_REQUIRED', CPIQ_LBL_ENCOMIENDA_TIPO_COMITENTE . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_REPRESENTANTE_REQUIRED', CPIQ_LBL_ENCOMIENDA_REPRESENTANTE . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_NRO_CUIL_REQUIRED', CPIQ_LBL_ENCOMIENDA_NRO_CUIL . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_DOCUMENTO_REQUIRED', CPIQ_LBL_ENCOMIENDA_DOCUMENTO . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_TIPO_DOCUMENTO_REQUIRED', CPIQ_LBL_ENCOMIENDA_TIPO_DOCUMENTO . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_CP_REQUIRED', CPIQ_LBL_ENCOMIENDA_CP . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_TELEFONO_REQUIRED', CPIQ_LBL_ENCOMIENDA_TELEFONO . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_SEGURIDAD_REQUIRED', CPIQ_LBL_ENCOMIENDA_SEGURIDAD . ' es requerido', true);

define('CPIQ_MSG_ENCOMIENDA_SIN_MATRICULADO', 'No puede crear la encomienda, no es matriculado', true);
define('CPIQ_MSG_ENCOMIENDA_ELIMINAR_PROHIBIDO', 'Sólo se pueden eliminar las encomiendas con estado SOLICITADA', true);
define('CPIQ_MSG_ENCOMIENDA_MODIFICAR_PROHIBIDO', 'Sólo se pueden modificar las encomiendas con estado SOLICITADA', true);
define('CPIQ_MSG_ENCOMIENDA_PAGAR_PROHIBIDO', 'Sólo se pueden pagar las encomiendas con estado SOLICITADA', true);

define('CPIQ_MSG_ENCOMIENDA_SOLICITADA', 'Encomienda solicitada', true);
define('CPIQ_MSG_ENCOMIENDA_SOLICITADA_SUBJECT_MAIL', 'La encomienda fue cargada exitosamente', true);

define('CPIQ_MSG_PAGAR_ENCOMIENDA', 'Pagar encomienda', true);

define('CPIQ_MSG_CAMBIAR_ESTADO_ENCOMIENDA_ESTADO_REQUIRED', CPIQ_LBL_TIPO_ESTADO_ENCOMIENDA . ' es requerido', true);
define('CPIQ_MSG_PAGAR_ENCOMIENDA_TIPO_PAGO_REQUIRED', CPIQ_LBL_TIPO_PAGO . ' es requerido', true);
define('CPIQ_MSG_PAGAR_ENCOMIENDA_ENTIDAD_REQUIRED', CPIQ_LBL_PAGAR_ENCOMIENDA_ENTIDAD . ' es requerido', true);
define('CPIQ_MSG_PAGAR_ENCOMIENDA_CHEQUE_REQUIRED', CPIQ_LBL_PAGAR_ENCOMIENDA_CHEQUE . ' es requerido', true);
define('CPIQ_MSG_PAGAR_ENCOMIENDA_IMPORTE_REQUIRED', CPIQ_LBL_PAGAR_ENCOMIENDA_IMPORTE . ' es requerido', true);

define('CPIQ_MSG_PAGAR_ENCOMIENDA_ENCOMIENDA_GENERADA', 'Comprobante-Pago', true);

/* ENCOMIENDAS ESPECIALIDADES*/
define('CPIQ_MSG_ENCOMIENDA_ESPECIALIDAD_TITULO_REQUIRED', CPIQ_LBL_TITULO . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_ESPECIALIDADES_REQUIRED', 'Debe asignar al menos una especialidad', true);


define('CPIQ_MSG_ENCOMIENDA_ESPECIALIDADES_ASIGNAR', 'Asignar Especialidad', true);
define('CPIQ_MSG_ENCOMIENDA_ESPECIALIDADES', "Indique las especialidades para la encomienda", true);

/* ENCOMIENDAS REGISTROS*/
define('CPIQ_MSG_ENCOMIENDA_REGISTROS_REGISTRO_REQUIRED', CPIQ_LBL_ENCOMIENDA_REGISTROS_REGISTRO . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_REGISTROS_REQUIRED', 'Debe asignar al menos un registro', true);

define('CPIQ_MSG_ENCOMIENDA_REGISTROS_ASIGNAR', 'Asignar Registro', true);
define('CPIQ_MSG_ENCOMIENDA_REGISTROS', "Indique los registros para la encomienda", true);

/* ENCOMIENDAS PROFESIONALES*/
define('CPIQ_MSG_ENCOMIENDA_PROFESIONALES_CONSEJO_REQUIRED', CPIQ_LBL_ENCOMIENDA_PROFESIONALES_CONSEJO . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_PROFESIONALES_PROFESIONAL_REQUIRED', CPIQ_LBL_ENCOMIENDA_PROFESIONALES_PROFESIONAL . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_PROFESIONALES_MATRCIULA_REQUIRED', CPIQ_LBL_ENCOMIENDA_PROFESIONALES_MATRICULA . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_PROFESIONALES_REQUIRED', 'Debe asignar al menos un profesional', true);

define('CPIQ_MSG_ENCOMIENDA_PROFESIONALES_ASIGNAR', 'Asignar Profesional', true);
define('CPIQ_MSG_ENCOMIENDA_PROFESIONALES', "Indique los profesionales para la encomienda", true);


/* OBSERVACIONES DE ENCOMIENDA */

define('CPIQ_MSG_ENCOMIENDA_OBSERVACION_TITLE_LIST', 'Observaciones de la encomienda', true);
define('CPIQ_MSG_ENCOMIENDA_OBSERVACION_TITLE_ADD', 'Agregar ' . CPIQ_LBL_ENCOMIENDA_OBSERVACION, true);
define('CPIQ_MSG_ENCOMIENDA_OBSERVACION_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_ENCOMIENDA_OBSERVACION , true);
define('CPIQ_MSG_ENCOMIENDA_OBSERVACION_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_ENCOMIENDA_OBSERVACION , true);
define('CPIQ_MSG_ENCOMIENDA_OBSERVACION_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_ENCOMIENDA_OBSERVACION , true);

define('CPIQ_MSG_ENCOMIENDA_OBSERVACION_ENCOMIENDA_REQUIRED', CPIQ_LBL_ENCOMIENDA_OBSERVACION_ENCOMIENDA . ' es requerido', true);
define('CPIQ_MSG_ENCOMIENDA_OBSERVACION_OBSERVACION_REQUIRED', CPIQ_LBL_ENCOMIENDA_OBSERVACION_OBSERVACION . ' es requerido', true);

/* HISTORICO ESTADO */

define('CPIQ_MSG_HISTORICO_ESTADO_TITLE_LIST', 'Estados históricos', true);

define('CPIQ_MSG_HISTORICO_ESTADO_CAMBIAR_ESTADO', 'Cambiar estado', true);
define('CPIQ_MSG_HISTORICO_ESTADO_CAMBIAR_ESTADO_ESTADO_REQUIRED', CPIQ_LBL_ESTADO_MATRICULADO . ' es requerido', true);


/* MOVIMIENTOS CTA CTE*/

define('CPIQ_MSG_MOVCTACTE_TITLE_LIST', 'Movimientos de matriculado', true);

/* MOVIMIENTOS CAJA*/

define('CPIQ_MSG_MOVCAJA_TITLE_LIST', 'Movimientos de caja', true);
define('CPIQ_MSG_MOVCAJA_TITLE_ADD', 'Agregar ' . CPIQ_LBL_MOVCAJA, true);
define('CPIQ_MSG_MOVCAJA_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_MOVCAJA , true);
define('CPIQ_MSG_MOVCAJA_ANULAR', 'Anular', true);

define('CPIQ_MSG_MOVCAJA_CONCEPTO_REQUIRED', CPIQ_LBL_CONCEPTO . ' es requerido', true);

define( 'CPIQ_MSGP_GRID_MSG_CONFIRM_ANULATE_QUESTION',  'Confirma anular el item $1?', true  );
define('CPIQ_MSG_MOVCAJA_ANULAR_PROHIBIDO', 'El movimiento ya fue anulado', true);
define('CPIQ_MSG_MOVCAJA_ANULACION_MOVIMIENTO', 'Anulación del movimiento: ', true);

define( 'CPIQ_MSGP_GRID_MSG_ANULAR',  'Anular', true  );

//TODO falta en los mensajes de cdt secure, lo agregué acá para no cambiar la versión del otro...queda pendiente.
define('CDT_SECURE_MSG_CDTUSER_TITLE_UNBLOCK', 'Desbloquear', true);

/* INCUMBENCIAS REGISTROS */

define('CPIQ_MSG_INCUMBENCIA_REGISTRO_TITLE_LIST', 'Registros de la Incumbencia', true);
define('CPIQ_MSG_INCUMBENCIA_REGISTRO_TITLE_ADD', 'Agregar ' . CPIQ_LBL_INCUMBENCIA_REGISTRO, true);
define('CPIQ_MSG_INCUMBENCIA_REGISTRO_TITLE_UPDATE', 'Modificar ' . CPIQ_LBL_INCUMBENCIA_REGISTRO , true);
define('CPIQ_MSG_INCUMBENCIA_REGISTRO_TITLE_VIEW', 'Visualizar ' . CPIQ_LBL_INCUMBENCIA_REGISTRO , true);
define('CPIQ_MSG_INCUMBENCIA_REGISTRO_TITLE_DELETE', 'Borrar ' . CPIQ_LBL_INCUMBENCIA_REGISTRO , true);

define('CPIQ_MSG_INCUMBENCIA_REGISTRO_INCUMBENCIA_REQUIRED', CPIQ_LBL_INCUMBENCIA_REGISTRO_INCUMBENCIA . ' es requerido', true);
define('CPIQ_MSG_INCUMBENCIA_REGISTRO_REGISTRO_REQUIRED', CPIQ_LBL_INCUMBENCIA_REGISTRO_REGISTRO . ' es requerido', true);
?>