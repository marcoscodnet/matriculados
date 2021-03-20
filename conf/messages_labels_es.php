<?php

/**
 * se definen los labels de las entidades.
 *
 * @author Bernardo
 * @since 27/02/2013
 *
 */

define('CDT_SECURE_LBL_CDTUSER_DS_USERNAME', 'Usuario ó DNI');
define('CDT_SECURE_LBL_CDTREGISTRATION_DS_USERNAME', 'DNI');

//Registración

//Entity
define('CPIQ_LBL_ENTITY_OID', 'Identificador', true);
define('CPIQ_LBL_FECHA', 'Fecha', true);

//Pais
define('CPIQ_LBL_PAIS', 'País', true);
define('CPIQ_LBL_PAIS_NOMBRE', 'Nombre', true);

//Provincia
define('CPIQ_LBL_PROVINCIA', 'Provincia', true);
define('CPIQ_LBL_PROVINCIA_NOMBRE', 'Nombre', true);
define('CPIQ_LBL_PROVINCIA_PAIS', CPIQ_LBL_PAIS, true);

//Localidad
define('CPIQ_LBL_LOCALIDAD', 'Localidad', true);
define('CPIQ_LBL_LOCALIDAD_NOMBRE', 'Nombre', true);

define('CPIQ_LBL_LOCALIDAD_PROVINCIA', CPIQ_LBL_PROVINCIA, true);

//Tipo documento
define('CPIQ_LBL_TIPO_DOCUMENTO', 'Tipo Doc.', true);
define('CPIQ_LBL_TIPO_DOCUMENTO_NOMBRE', 'Nombre', true);

//Sexo
define('CPIQ_LBL_SEXO', 'Sexo', true);
define('CPIQ_LBL_SEXO_FEMENINO', 'Femenino', true);
define('CPIQ_LBL_SEXO_MASCULINO', 'Masculino', true);

//Matriculado
define('CPIQ_LBL_MATRICULADO', 'Matriculado', true);
define('CPIQ_LBL_MATRICULADO_NOMBRE', 'Nombre', true);
define('CPIQ_LBL_MATRICULADO_APELLIDO', 'Apellido', true);
define('CPIQ_LBL_MATRICULADO_EMAIL', 'E-mail', true);
define('CPIQ_LBL_MATRICULADO_SEXO', CPIQ_LBL_SEXO, true);
define('CPIQ_LBL_MATRICULADO_FECHA_NACIMIENTO', 'Fecha de nacimiento', true);
define('CPIQ_LBL_MATRICULADO_LOCALIDAD', CPIQ_LBL_LOCALIDAD, true);
define('CPIQ_LBL_MATRICULADO_TIPO_DOCUMENTO', CPIQ_LBL_TIPO_DOCUMENTO, true);
define('CPIQ_LBL_MATRICULADO_NRO_DOCUMENTO', 'Nro Documento', true);
define('CPIQ_LBL_MATRICULADO_DOCUMENTO', 'Documento', true);
define('CPIQ_LBL_MATRICULADO_DOMICILIO', 'Domicilio', true);
define('CPIQ_LBL_MATRICULADO_CP', 'Código Postal', true);
define('CPIQ_LBL_MATRICULADO_TE_PARTICULAR', 'TE. Particular', true);
define('CPIQ_LBL_MATRICULADO_TE_LABORAL', 'TE. Laboral', true);
define('CPIQ_LBL_MATRICULADO_TE_MOVIL', 'TE. Movil', true);
define('CPIQ_LBL_MATRICULADO_FECHA_ULTIMA_MODIFICACION', 'Ultima Modificación', true);
define('CPIQ_LBL_MATRICULADO_USUARIO_ULTIMA_MODIFICACION', 'Usuario que modificó', true);

define('CPIQ_LBL_MATRICULADO_FECHA_NACIMIENTO_DESDE', 'Fecha de nacimiento desde', true);
define('CPIQ_LBL_MATRICULADO_FECHA_NACIMIENTO_HASTA', 'Fecha de nacimiento hasta', true);

//Entidad emisora
define('CPIQ_LBL_ENTIDAD_EMISORA', 'Entidad emisora', true);
define('CPIQ_LBL_ENTIDAD_EMISORA_NOMBRE', 'Nombre', true);

//Estado matriculado
define('CPIQ_LBL_ESTADO_MATRICULADO', 'Estado de matriculado', true);
define('CPIQ_LBL_ESTADO_MATRICULADO_NOMBRE', 'Nombre', true);

//Clase título
define('CPIQ_LBL_CLASE_TITULO', 'Clase de título', true);
define('CPIQ_LBL_CLASE_TITULO_NOMBRE', 'Nombre', true);

//Secuencia título
define('CPIQ_LBL_SECUENCIA_TITULO', 'Secuencia de título', true);
define('CPIQ_LBL_SECUENCIA_TITULO_NOMBRE', 'Nombre', true);
define('CPIQ_LBL_SECUENCIA_TITULO_ULT_MATRICULA', 'Ultima matrícula', true);

//Tipo de título
define('CPIQ_LBL_TIPO_TITULO', 'Tipo de Título', true);
define('CPIQ_LBL_TIPO_TITULO_NOMBRE', 'Nombre', true);
define('CPIQ_LBL_TIPO_TITULO_CLASE_TITULO', CPIQ_LBL_CLASE_TITULO, true);
define('CPIQ_LBL_TIPO_TITULO_SECUENCIA_TITULO', CPIQ_LBL_SECUENCIA_TITULO, true);
define('CPIQ_LBL_TIPO_TITULO_INGENIERO_LICENCIADO', 'Ingeniero ó Licenciado', true);

//Títulos
define('CPIQ_LBL_TITULO', 'Título', true);
define('CPIQ_LBL_TITULO_TIPO_TITULO', CPIQ_LBL_TIPO_TITULO, true);
define('CPIQ_LBL_TITULO_MATRICULADO', CPIQ_LBL_MATRICULADO, true);
define('CPIQ_LBL_TITULO_ENTIDAD_EMISORA', CPIQ_LBL_ENTIDAD_EMISORA, true);
define('CPIQ_LBL_TITULO_MATRICULA', 'Matrícula', true);
define('CPIQ_LBL_TITULO_PRINCIPAL', 'Principal', true);
define('CPIQ_LBL_TITULO_FECHA_EXPEDICION', 'F. de expedición', true);
define('CPIQ_LBL_TITULO_FECHA_MATRICULACION', 'F. de matriculación', true);
define('CPIQ_LBL_TITULOS', 'Títulos', true);


define('CPIQ_LBL_TITULO_FECHA_ULTIMA_MODIFICACION', 'Ultima Modificación', true);
define('CPIQ_LBL_TITULO_USUARIO_ULTIMA_MODIFICACION', 'Usuario que modificó', true);

//Historico estado
define('CPIQ_LBL_HISTORICO_ESTADO', 'Histórico estado', true);
define('CPIQ_LBL_HISTORICO_ESTADO_MATRICULADO', CPIQ_LBL_MATRICULADO, true);
define('CPIQ_LBL_HISTORICO_ESTADO_ESTADO', CPIQ_LBL_ESTADO_MATRICULADO, true);
define('CPIQ_LBL_HISTORICO_ESTADO_FECHA_DESDE', 'F. desde', true);
define('CPIQ_LBL_HISTORICO_ESTADO_FECHA_HASTA', 'F. hasta', true);
define('CPIQ_LBL_HISTORICO_ESTADO_MOTIVO', 'Motivo', true);
define('CPIQ_LBL_HISTORICO_ESTADO_FECHA_ULTIMA_MODIFICACION', 'Ultima Modificación', true);
define('CPIQ_LBL_HISTORICO_ESTADO_USUARIO_ULTIMA_MODIFICACION', 'Usuario que modificó', true);

define('CPIQ_LBL_HISTORICO_ESTADO_FECHA_DESDE_DESDE', 'Inicio desde', true);
define('CPIQ_LBL_HISTORICO_ESTADO_FECHA_DESDE_HASTA', 'Inicio hasta', true);
define('CPIQ_LBL_HISTORICO_ESTADO_FECHA_HASTA_DESDE', 'Fin desde', true);
define('CPIQ_LBL_HISTORICO_ESTADO_FECHA_HASTA_HASTA', 'Fin hasta', true);

//Cuotas
define('CPIQ_LBL_CUOTA', 'Cuota', true);

define('CPIQ_LBL_CUOTA_NOMBRE', 'Nombre', true);
define('CPIQ_LBL_CUOTA_YEAR', 'Año', true);

define('CPIQ_LBL_CUOTA_DETALLE', 'Detalle', true);


//Valores cuotas
define('CPIQ_LBL_CUOTA_VALOR', 'Valor cuota', true);

define('CPIQ_LBL_CUOTA_VALOR_FECHA_DESDE', 'Fecha desde', true);
define('CPIQ_LBL_CUOTA_VALOR_FECHA_HASTA', 'Fecha hasta', true);
define('CPIQ_LBL_CUOTA_VALOR_IMPORTE', 'Importe', true);
define('CPIQ_LBL_CUOTA_VALOR_IMPORTE_OTROS', 'Importe otros', true);
define('CPIQ_LBL_CUOTA_VALOR_IMPORTE_INGENIERO', 'Imp. Ing. ó Lic.', true);



//Cuota generada
define('CPIQ_LBL_CUOTA_GENERADA', 'Cuota generada', true);
define('CPIQ_LBL_CUOTA_GENERADA_NOMBRE', 'Nombre', true);
define('CPIQ_LBL_CUOTA_GENERADA_CUOTA', CPIQ_LBL_CUOTA, true);
define('CPIQ_LBL_CUOTA_GENERADA_MATRICULADO', CPIQ_LBL_MATRICULADO, true);
define('CPIQ_LBL_CUOTA_GENERADA_MOV_CTA_CTE', '', true);
define('CPIQ_LBL_CUOTA_GENERADA_NOMBRE', 'Nombre', true);
define('CPIQ_LBL_CUOTA_GENERADA_FECHA_CARGA', 'F. de carga', true);


define('CPIQ_LBL_CUOTA_GENERADA_FECHA_ULTIMA_MODIFICACION', 'Ultima Modificación', true);
define('CPIQ_LBL_CUOTA_GENERADA_USUARIO_ULTIMA_MODIFICACION', 'Usuario que modificó', true);

define('CPIQ_LBL_CUOTA_GENERADA_MASIVA', 'Generación de cuotas masivas', true);
define('CPIQ_LBL_CUOTA_GENERADA_MASIVA_FILE', 'Generacion_masiva', true);
define('CPIQ_LBL_CUOTA_GENERADA_PROCESADOS', 'Matriculados procesados', true);

define('CPIQ_LBL_CUOTA_GENERADA_ESTADO', 'Estado', true);

//Registro
define('CPIQ_LBL_REGISTRO', 'Registro', true);
define('CPIQ_LBL_REGISTRO_NOMBRE', 'Nombre', true);
define('CPIQ_LBL_REGISTRO_SIGLA', 'Sigla', true);


define('CPIQ_LBL_REGISTRO_FECHA_ULTIMA_MODIFICACION', 'Ultima Modificación', true);
define('CPIQ_LBL_REGISTRO_USUARIO_ULTIMA_MODIFICACION', 'Usuario que modificó', true);

//Registro cuota
define('CPIQ_LBL_REGISTRO_CUOTA', 'Cuota del Registro', true);
define('CPIQ_LBL_REGISTRO_CUOTA_YEAR', 'Año', true);
define('CPIQ_LBL_REGISTRO_CUOTA_IMPORTE', 'Importe', true);
define('CPIQ_LBL_REGISTRO_CUOTA_REGISTRO', CPIQ_LBL_REGISTRO, true);

define('CPIQ_LBL_REGISTRO_CUOTA_FECHA_ULTIMA_MODIFICACION', 'Ultima Modificación', true);
define('CPIQ_LBL_REGISTRO_CUOTA_USUARIO_ULTIMA_MODIFICACION', 'Usuario que modificó', true);

//Registro matriculado
define('CPIQ_LBL_REGISTRO_MATRICULADO', 'Registro del Matriculado', true);
define('CPIQ_LBL_REGISTRO_MATRICULADO_FECHA', 'Fecha', true);
define('CPIQ_LBL_REGISTRO_MATRICULADO_NUMERO', 'Número', true);
define('CPIQ_LBL_REGISTRO_MATRICULADO_MATRICULADO', CPIQ_LBL_MATRICULADO, true);
define('CPIQ_LBL_REGISTRO_MATRICULADO_REGISTRO_CUOTA', CPIQ_LBL_REGISTRO_CUOTA, true);

define('CPIQ_LBL_REGISTRO_MATRICULADO_FECHA_ULTIMA_MODIFICACION', 'Ultima Modificación', true);
define('CPIQ_LBL_REGISTRO_MATRICULADO_USUARIO_ULTIMA_MODIFICACION', 'Usuario que modificó', true);

//Conceptos
define('CPIQ_LBL_CONCEPTO', 'Concepto', true);

define('CPIQ_LBL_CONCEPTO_NOMBRE', 'Nombre', true);
define('CPIQ_LBL_CONCEPTO_COEFICIENTE', 'Coeficiente', true);
define('CPIQ_LBL_CONCEPTO_ASIGNADO', 'Asignado', true);

//Coeficiente
define('CPIQ_LBL_COEFICIENTE', 'Coeficiente', true);
define('CPIQ_LBL_COEFICIENTE_INGRESO', 'Ingreso', true);
define('CPIQ_LBL_COEFICIENTE_EGRESO', 'Egreso', true);

//Incumbencia
define('CPIQ_LBL_INCUMBENCIA', 'Incumbencia', true);
define('CPIQ_LBL_INCUMBENCIA_NOMBRE', 'Nombre', true);


define('CPIQ_LBL_INCUMBENCIA_FECHA_ULTIMA_MODIFICACION', 'Ultima Modificación', true);
define('CPIQ_LBL_INCUMBENCIA_USUARIO_ULTIMA_MODIFICACION', 'Usuario que modificó', true);

//Incumbencia TipoTitulo
define('CPIQ_LBL_INCUMBENCIA_TIPO_TITULO', 'T. título de la incumbencia', true);
define('CPIQ_LBL_INCUMBENCIA_TIPO_TITULO_INCUMBENCIA', CPIQ_LBL_INCUMBENCIA, true);
define('CPIQ_LBL_INCUMBENCIA_TIPO_TITULO_TIPO_TITULO', CPIQ_LBL_TIPO_TITULO, true);

define('CPIQ_LBL_INCUMBENCIA_TIPO_TITULO_FECHA_ULTIMA_MODIFICACION', 'Ultima Modificación', true);
define('CPIQ_LBL_INCUMBENCIA_TIPO_TITULO_USUARIO_ULTIMA_MODIFICACION', 'Usuario que modificó', true);

//Tipo Encomienda
define('CPIQ_LBL_TIPO_ENCOMIENDA', 'Tarea profesional', true);
define('CPIQ_LBL_TIPO_ENCOMIENDA_NOMBRE', 'Nombre', true);


define('CPIQ_LBL_TIPO_ENCOMIENDA_FECHA_ULTIMA_MODIFICACION', 'Ultima Modificación', true);
define('CPIQ_LBL_TIPO_ENCOMIENDA_USUARIO_ULTIMA_MODIFICACION', 'Usuario que modificó', true);

//Incumbencia TipoEncomienda
define('CPIQ_LBL_INCUMBENCIA_TIPO_ENCOMIENDA', 'Incumb. de T. Prof.', true);
define('CPIQ_LBL_INCUMBENCIA_TIPO_ENCOMIENDA_NOMBRE', 'Nombre', true);


define('CPIQ_LBL_INCUMBENCIA_TIPO_ENCOMIENDA_FECHA_ULTIMA_MODIFICACION', 'Ultima Modificación', true);
define('CPIQ_LBL_INCUMBENCIA_TIPO_ENCOMIENDA_USUARIO_ULTIMA_MODIFICACION', 'Usuario que modificó', true);

//Tipo documento
define('CPIQ_LBL_TIPO_ESTADO_ENCOMIENDA', 'Estado de encomienda', true);
define('CPIQ_LBL_TIPO_ESTADO_ENCOMIENDA_NOMBRE', 'Nombre', true);

//Encomienda
define('CPIQ_LBL_ENCOMIENDA', 'Encomienda', true);
define('CPIQ_LBL_ENCOMIENDA_NUMERO', 'Número', true);
define('CPIQ_LBL_ENCOMIENDA_MATRICULADO', CPIQ_LBL_MATRICULADO, true);
define('CPIQ_LBL_ENCOMIENDA_TIPO_ENCOMIENDA', CPIQ_LBL_TIPO_ENCOMIENDA, true);
define('CPIQ_LBL_ENCOMIENDA_FECHA', 'Fecha', true);
define('CPIQ_LBL_ENCOMIENDA_COMITENTE', 'Comitente', true);
define('CPIQ_LBL_ENCOMIENDA_TIPO_COMITENTE', 'Tipo comitente', true);
define('CPIQ_LBL_ENCOMIENDA_REPRESENTANTE', 'Representante', true);
define('CPIQ_LBL_ENCOMIENDA_LOCALIDAD', CPIQ_LBL_LOCALIDAD, true);
define('CPIQ_LBL_ENCOMIENDA_NRO_CUIL', 'C.U.I.L./C.U.I.T.', true);
define('CPIQ_LBL_ENCOMIENDA_CUIL', 'CUIL', true);
define('CPIQ_LBL_ENCOMIENDA_CUIT', 'CUIT', true);
define('CPIQ_LBL_ENCOMIENDA_TIPO_DOCUMENTO', CPIQ_LBL_TIPO_DOCUMENTO, true);
define('CPIQ_LBL_ENCOMIENDA_DOCUMENTO', 'Documento', true);
define('CPIQ_LBL_ENCOMIENDA_DOMICILIO', 'Domicilio', true);
define('CPIQ_LBL_ENCOMIENDA_CP', 'Código Postal', true);
define('CPIQ_LBL_ENCOMIENDA_TELEFONO', 'Teléfono', true);
define('CPIQ_LBL_ENCOMIENDA_SEGURIDAD', 'Nro. de Seguridad', true);
define('CPIQ_LBL_ENCOMIENDA_FECHA_ULTIMA_MODIFICACION', 'Ultima Modificación', true);
define('CPIQ_LBL_ENCOMIENDA_USUARIO_ULTIMA_MODIFICACION', 'Usuario que modificó', true);

define('CPIQ_LBL_ENCOMIENDA_FECHA_DESDE', 'Fecha desde', true);
define('CPIQ_LBL_ENCOMIENDA_FECHA_HASTA', 'Fecha hasta', true);

//Tipo comitente
define('CPIQ_LBL_TIPO_COMITENTE', 'Tipo comitente', true);
define('CPIQ_LBL_TIPO_COMITENTE_FISICA', 'Persona física', true);
define('CPIQ_LBL_TIPO_COMITENTE_JURIDICA', 'Persona Jurídica u Organismo', true);

//Encomienda profesionales
define('CPIQ_LBL_ENCOMIENDA_PROFESIONALES', 'Profesionales', true);
define('CPIQ_LBL_ENCOMIENDA_PROFESIONALES_PROFESIONAL', 'Profesional', true);
define('CPIQ_LBL_ENCOMIENDA_PROFESIONALES_CONSEJO', 'Consejo Profesional', true);
define('CPIQ_LBL_ENCOMIENDA_PROFESIONALES_MATRICULA', 'Matrícula', true);

//Encomienda especialidades
define('CPIQ_LBL_ENCOMIENDA_ESPECIALIDADES', 'Especialidades', true);
define('CPIQ_LBL_ENCOMIENDA_ESPECIALIDADES_TITULO', 'Título', true);

//Encomienda registros
define('CPIQ_LBL_ENCOMIENDA_REGISTROS', 'Registros', true);
define('CPIQ_LBL_ENCOMIENDA_REGISTROS_REGISTRO', 'Registro', true);

//Encomienda observaciones
define('CPIQ_LBL_ENCOMIENDA_OBSERVACION', 'Observaciones', true);
define('CPIQ_LBL_ENCOMIENDA_OBSERVACION_ENCOMIENDA', 'Encomienda', true);
define('CPIQ_LBL_ENCOMIENDA_OBSERVACION_OBSERVACION', 'Observación', true);

//Tipo pago
define('CPIQ_LBL_TIPO_PAGO', 'Tipo de pago', true);
define('CPIQ_LBL_TIPO_PAGO_NOMBRE', 'Nombre', true);

//Pagar encomienda
define('CPIQ_LBL_PAGAR_ENCOMIENDA_ENTIDAD', 'Banco/Tarjeta', true);
define('CPIQ_LBL_PAGAR_ENCOMIENDA_CHEQUE', 'Nro. Cheque/Tarjeta', true);
define('CPIQ_LBL_PAGAR_ENCOMIENDA_IMPORTE', 'Importe', true);

//MovCtaCte
define('CPIQ_LBL_MOVCTACTE_SALDO', 'Saldo', true);

//MovCaja
define('CPIQ_LBL_MOVCAJA', 'Movimiento de Caja', true);
define('CPIQ_LBL_MOVCAJA_DETALLE', 'Detalle', true);
define('CPIQ_LBL_MOVCAJA_ANULADO', 'Anulado', true);
define('CPIQ_LBL_MOVCAJA_OBSERVACIONES', 'Observaciones', true);

//Incumbencia Registro
define('CPIQ_LBL_INCUMBENCIA_REGISTRO', 'Registro de la incumbencia', true);
define('CPIQ_LBL_INCUMBENCIA_REGISTRO_INCUMBENCIA', CPIQ_LBL_INCUMBENCIA, true);
define('CPIQ_LBL_INCUMBENCIA_REGISTRO_REGISTRO', CPIQ_LBL_REGISTRO, true);

define('CPIQ_LBL_INCUMBENCIA_REGISTRO_FECHA_ULTIMA_MODIFICACION', 'Ultima Modificación', true);
define('CPIQ_LBL_INCUMBENCIA_REGISTRO_USUARIO_ULTIMA_MODIFICACION', 'Usuario que modificó', true);

?>