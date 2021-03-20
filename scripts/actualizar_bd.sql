-- 
-- Estructura de tabla para la tabla cpiq_historico_estado
-- 

CREATE TABLE cpiq_historico_estado (
  oid bigint(20) NOT NULL auto_increment,
  matriculado_oid bigint(20) default NULL,
  estadoMatriculado_oid bigint(20) default NULL,
  fechaDesde datetime default NULL,
  fechaHasta datetime default NULL,
  motivo varchar(200) NOT NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY matriculado_oid (matriculado_oid),
  KEY estadoMatriculado_oid (estadoMatriculado_oid),
  KEY user_oid (user_oid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

ALTER TABLE cpiq_historico_estado ADD FOREIGN KEY ( matriculado_oid ) REFERENCES cpiq_matriculado (
oid
);

ALTER TABLE cpiq_historico_estado ADD FOREIGN KEY ( estadoMatriculado_oid ) REFERENCES cpiq_estado_matriculado (
oid
);

ALTER TABLE cpiq_historico_estado ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

 ALTER TABLE cpiq_titulo ADD UNIQUE (
matriculado_oid ,
tipoTitulo_oid ,
entidadEmisora_oid
) 

-- Estructura de tabla para la tabla cpiq_historico_estado
-- 

CREATE TABLE cpiq_cuota (
  oid bigint(20) NOT NULL auto_increment,
  nombre varchar(200) NOT NULL,
  year int(11) NOT NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY user_oid (user_oid)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
 
 ALTER TABLE cpiq_cuota ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

 
INSERT INTO cdt_function VALUES (NULL, 'Listar cuotas');
INSERT INTO cdt_function VALUES (NULL, 'Agregar cuota');
INSERT INTO cdt_function VALUES (NULL, 'Modificar cuota');
INSERT INTO cdt_function VALUES (NULL, 'Eliminar cuota');
INSERT INTO cdt_function VALUES (NULL, 'Ver cuota');

INSERT INTO cdt_menuoption VALUES (NULL, 'Cuotas', 'doAction?action=list_cuotas', 99, 1, 9, 'cuotas', '');

INSERT INTO cdt_action_function VALUES (NULL, 99, 'list_cuotas');
INSERT INTO cdt_action_function VALUES (NULL, 100, 'add_cuota_init');
INSERT INTO cdt_action_function VALUES (NULL, 100, 'add_cuota');
INSERT INTO cdt_action_function VALUES (NULL, 101, 'update_cuota_init');
INSERT INTO cdt_action_function VALUES (NULL, 101, 'update_cuota');
INSERT INTO cdt_action_function VALUES (NULL, 102, 'delete_cuota');
INSERT INTO cdt_action_function VALUES (NULL, 103, 'view_cuota');

CREATE TABLE cpiq_cuota_valor (
  oid bigint(20) NOT NULL auto_increment,
  cuota_oid bigint(20) default NULL,
  
  fechaDesde date default NULL,
  fechaHasta date default NULL,
  importe float default NULL,
  
  
  PRIMARY KEY  (oid),
  
  KEY cuota_oid (cuota_oid)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

ALTER TABLE cpiq_cuota_valor ADD FOREIGN KEY ( cuota_oid ) REFERENCES cpiq_cuota (
oid
);

CREATE TABLE cpiq_cuota_generada (
  oid bigint(20) NOT NULL auto_increment,
  nombre varchar(200) NOT NULL,
  cuota_oid bigint(20) default NULL,
  matriculado_oid bigint(20) default NULL,
  movCtaCte_oid bigint(20) default NULL,
  fechaCarga date default NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY matriculado_oid (matriculado_oid),
  KEY cuota_oid (cuota_oid),
  KEY movCtaCte_oid (movCtaCte_oid),
  KEY user_oid (user_oid)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
 
 ALTER TABLE cpiq_cuota_generada ADD FOREIGN KEY ( cuota_oid ) REFERENCES cpiq_cuota (
oid
);

ALTER TABLE cpiq_cuota_generada ADD FOREIGN KEY ( matriculado_oid ) REFERENCES cpiq_matriculado (
oid
);

ALTER TABLE cpiq_cuota_generada ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

CREATE TABLE cpiq_registro (
  oid bigint(20) NOT NULL auto_increment,
  nombre varchar(200) NOT NULL,
  sigla varchar(10) NOT NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY user_oid (user_oid)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
 
INSERT INTO cdt_function (cd_function, ds_function) VALUES

(104, 'Gneración masiva de cuotas');

INSERT INTO cdt_action_function (cd_actionfunction, cd_function, ds_action) VALUES
(126, 104, 'masiva_cuotasGenerada');


INSERT INTO cdt_function VALUES (NULL, 'Listar registros');
INSERT INTO cdt_function VALUES (NULL, 'Agregar registro');
INSERT INTO cdt_function VALUES (NULL, 'Modificar registro');
INSERT INTO cdt_function VALUES (NULL, 'Eliminar registro');
INSERT INTO cdt_function VALUES (NULL, 'Ver registro');

INSERT INTO cdt_menuoption VALUES (NULL, 'Registros', 'doAction?action=list_registros', 105, 3, 9, 'tiposTitulo', '');

INSERT INTO cdt_action_function VALUES (NULL, 105, 'list_registros');
INSERT INTO cdt_action_function VALUES (NULL, 106, 'add_registro_init');
INSERT INTO cdt_action_function VALUES (NULL, 106, 'add_registro');
INSERT INTO cdt_action_function VALUES (NULL, 107, 'update_registro_init');
INSERT INTO cdt_action_function VALUES (NULL, 107, 'update_registro');
INSERT INTO cdt_action_function VALUES (NULL, 108, 'delete_registro');
INSERT INTO cdt_action_function VALUES (NULL, 109, 'view_registro');

CREATE TABLE cpiq_registro_cuota (
  oid bigint(20) NOT NULL auto_increment,
  year int(11) NOT NULL,
  importe float default NULL,
  registro_oid bigint(20) default NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY registro_oid (registro_oid),
  KEY user_oid (user_oid)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
 
 ALTER TABLE cpiq_registro_cuota ADD FOREIGN KEY ( registro_oid ) REFERENCES cpiq_registro (
oid
);

ALTER TABLE cpiq_registro_cuota ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

ALTER TABLE cpiq_registro ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

 ALTER TABLE cpiq_registro_cuota ADD UNIQUE (
year
); 

INSERT INTO cdt_function VALUES (NULL, 'Listar cuotas de registro');
INSERT INTO cdt_function VALUES (NULL, 'Agregar cuota a registro');
INSERT INTO cdt_function VALUES (NULL, 'Modificar cuota a registro');
INSERT INTO cdt_function VALUES (NULL, 'Eliminar cuota a registro');
INSERT INTO cdt_function VALUES (NULL, 'Ver cuota a registro');



INSERT INTO cdt_action_function VALUES (NULL, 110, 'list_registrosCuota');
INSERT INTO cdt_action_function VALUES (NULL, 111, 'add_registroCuota_init');
INSERT INTO cdt_action_function VALUES (NULL, 111, 'add_registroCuota');
INSERT INTO cdt_action_function VALUES (NULL, 112, 'update_registroCuota_init');
INSERT INTO cdt_action_function VALUES (NULL, 112, 'update_registroCuota');
INSERT INTO cdt_action_function VALUES (NULL, 113, 'delete_registroCuota');
INSERT INTO cdt_action_function VALUES (NULL, 114, 'view_registroCuota');

CREATE TABLE cpiq_mov_ctacte (
  oid bigint(20) NOT NULL auto_increment,
  fechaCarga datetime default NULL,
  importe float default NULL,
  matriculado_oid bigint(20) default NULL,
  concepto_oid bigint(20) default NULL,
  anulacion_oid bigint(20) default NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY matriculado_oid (matriculado_oid),
  KEY concepto_oid (concepto_oid),
  KEY anulacion_oid (anulacion_oid),
  KEY user_oid (user_oid)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
 
 CREATE TABLE cpiq_mov_caja (
  oid bigint(20) NOT NULL auto_increment,
  fechaCarga datetime default NULL,
  importe float default NULL,
  observaciones text default NULL,
  movCtaCte_oid bigint(20) default NULL,
  concepto_oid bigint(20) default NULL,
  anulacion_oid bigint(20) default NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY movctacte_oid (movctacte_oid),
  KEY concepto_oid (concepto_oid),
  KEY anulacion_oid (anulacion_oid),
  KEY user_oid (user_oid)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
 
 CREATE TABLE cpiq_concepto (
  oid bigint(20) NOT NULL auto_increment,
  nombre varchar(100) NOT NULL,
  coeficiente int(2) NOT NULL COMMENT '1=ingreso, -1=egreso',
  bloqueado int(2) NOT NULL DEFAULT '0' COMMENT '0=no bloqueado, 1=bloqueado',
  tipoAsignado_oid int(11) default NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY tipoAsignado_oid (tipoAsignado_oid),
  KEY user_oid (user_oid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE cpiq_anulacion (
  oid bigint(20) NOT NULL auto_increment,
  fecha datetime default NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY user_oid (user_oid)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
 
 ALTER TABLE cpiq_cuota_generada ADD FOREIGN KEY ( movCtaCte_oid ) REFERENCES cpiq_mov_ctacte (
oid
);

ALTER TABLE cpiq_concepto ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

ALTER TABLE cpiq_mov_caja ADD FOREIGN KEY ( movCtaCte_oid ) REFERENCES cpiq_mov_ctacte (
oid
);

ALTER TABLE cpiq_mov_caja ADD FOREIGN KEY ( concepto_oid ) REFERENCES cpiq_concepto (
oid
);

ALTER TABLE cpiq_mov_caja ADD FOREIGN KEY ( anulacion_oid ) REFERENCES cpiq_anulacion (
oid
);

ALTER TABLE cpiq_mov_caja ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

ALTER TABLE cpiq_mov_ctacte ADD FOREIGN KEY ( matriculado_oid ) REFERENCES cpiq_matriculado (
oid
);

ALTER TABLE cpiq_mov_ctacte ADD FOREIGN KEY ( concepto_oid ) REFERENCES cpiq_concepto (
oid
);

ALTER TABLE cpiq_mov_ctacte ADD FOREIGN KEY ( anulacion_oid ) REFERENCES cpiq_anulacion (
oid
);

ALTER TABLE cpiq_mov_ctacte ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

INSERT INTO cdt_function VALUES (NULL, 'Listar conceptos');
INSERT INTO cdt_function VALUES (NULL, 'Agregar concepto');
INSERT INTO cdt_function VALUES (NULL, 'Modificar concepto');
INSERT INTO cdt_function VALUES (NULL, 'Eliminar concepto');
INSERT INTO cdt_function VALUES (NULL, 'Ver concepto');

INSERT INTO cdt_menuoption VALUES (NULL, 'Conceptos', 'doAction?action=list_conceptos', 115, 1, 10, 'cuotas', '');

INSERT INTO cdt_action_function VALUES (NULL, 115, 'list_conceptos');
INSERT INTO cdt_action_function VALUES (NULL, 116, 'add_concepto_init');
INSERT INTO cdt_action_function VALUES (NULL, 116, 'add_concepto');
INSERT INTO cdt_action_function VALUES (NULL, 117, 'update_concepto_init');
INSERT INTO cdt_action_function VALUES (NULL, 117, 'update_concepto');
INSERT INTO cdt_action_function VALUES (NULL, 118, 'delete_concepto');
INSERT INTO cdt_action_function VALUES (NULL, 119, 'view_concepto');

CREATE TABLE cpiq_tipo_asignado (
  oid int(20) NOT NULL auto_increment,
  nombre varchar(45) default NULL,
  PRIMARY KEY  (oid)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



INSERT INTO cpiq_tipo_asignado VALUES (1, 'Todos');
INSERT INTO cpiq_tipo_asignado VALUES (2, 'CPIQ');
INSERT INTO cpiq_tipo_asignado VALUES (3, 'Matriculado');

ALTER TABLE cpiq_concepto ADD FOREIGN KEY ( tipoAsignado_oid ) REFERENCES cpiq_tipo_asignado (
oid
);

INSERT INTO cdt_function VALUES (NULL, 'Listar cuotas generadas');
INSERT INTO cdt_function VALUES (NULL, 'Pagar cuota generada');

INSERT INTO cdt_action_function VALUES (NULL, 120, 'list_cuotasGenerada');
INSERT INTO cdt_action_function VALUES (NULL, 121, 'pagar_cuotaGenerada');

CREATE TABLE cpiq_registro_matriculado (
  oid bigint(20) NOT NULL auto_increment,
  fecha date default NULL,
  matriculado_oid bigint(20) default NULL,
  registroCuota_oid bigint(20) default NULL,	
  movCtaCte_oid bigint(20) default NULL,	
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY matriculado_oid (matriculado_oid),
  KEY movCtaCte_oid (movCtaCte_oid),
  KEY user_oid (user_oid),
  KEY registroCuota_oid (registroCuota_oid)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
 
 ALTER TABLE cpiq_registro_matriculado ADD FOREIGN KEY ( matriculado_oid ) REFERENCES cpiq_matriculado (
oid
);

ALTER TABLE cpiq_registro_matriculado ADD FOREIGN KEY ( registroCuota_oid ) REFERENCES cpiq_registro_cuota (
oid
);

ALTER TABLE cpiq_registro_matriculado ADD FOREIGN KEY ( movCtaCte_oid ) REFERENCES cpiq_mov_ctacte (
oid
);

ALTER TABLE cpiq_registro_matriculado ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

ALTER TABLE cpiq_registro_matriculado ADD UNIQUE (
matriculado_oid ,
registroCuota_oid
); 

INSERT INTO cdt_function VALUES (NULL, 'Listar registros del matriculado');
INSERT INTO cdt_function VALUES (NULL, 'Agregar registro del matriculado');
INSERT INTO cdt_function VALUES (NULL, 'Modificar registro del matriculado');
INSERT INTO cdt_function VALUES (NULL, 'Eliminar registro del matriculado');
INSERT INTO cdt_function VALUES (NULL, 'Ver registro del matriculado');

INSERT INTO cdt_action_function VALUES (NULL, 122, 'list_registrosMatriculado');
INSERT INTO cdt_action_function VALUES (NULL, 123, 'add_registroMatriculado_init');
INSERT INTO cdt_action_function VALUES (NULL, 123, 'add_registroMatriculado');
INSERT INTO cdt_action_function VALUES (NULL, 124, 'update_registroMatriculado_init');
INSERT INTO cdt_action_function VALUES (NULL, 124, 'update_registroMatriculado');
INSERT INTO cdt_action_function VALUES (NULL, 125, 'delete_registroMatriculado');
INSERT INTO cdt_action_function VALUES (NULL, 126, 'view_registroMatriculado');

CREATE TABLE cpiq_incumbencia (
  oid bigint(20) NOT NULL auto_increment,
  nombre varchar(150) default NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY user_oid (user_oid)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE cpiq_incumbencia ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);


CREATE TABLE cpiq_incumbencia_tipo_titulo (
  oid bigint(20) NOT NULL auto_increment,
  incumbencia_oid bigint(20) default NULL,
  tipoTitulo_oid bigint(20) default NULL,	
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY incumbencia_oid (incumbencia_oid),
  KEY tipoTitulo_oid (tipoTitulo_oid),
  KEY user_oid (user_oid)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE cpiq_incumbencia_tipo_titulo ADD FOREIGN KEY ( incumbencia_oid ) REFERENCES cpiq_incumbencia (
oid
);

ALTER TABLE cpiq_incumbencia_tipo_titulo ADD FOREIGN KEY ( tipoTitulo_oid ) REFERENCES cpiq_tipo_titulo (
oid
);

ALTER TABLE cpiq_incumbencia_tipo_titulo ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

ALTER TABLE cpiq_incumbencia_tipo_titulo ADD UNIQUE (
incumbencia_oid ,

tipoTitulo_oid
) ;

INSERT INTO cdt_function VALUES (NULL, 'Listar incumbencias');
INSERT INTO cdt_function VALUES (NULL, 'Agregar incumbencia');
INSERT INTO cdt_function VALUES (NULL, 'Modificar incumbencia');
INSERT INTO cdt_function VALUES (NULL, 'Eliminar incumbencia');
INSERT INTO cdt_function VALUES (NULL, 'Ver incumbencia');

INSERT INTO cdt_menuoption VALUES (NULL, 'Incumbencias', 'doAction?action=list_incumbencias', 127, 2, 9, 'incumbencias', '');

INSERT INTO cdt_action_function VALUES (NULL, 127, 'list_incumbencias');
INSERT INTO cdt_action_function VALUES (NULL, 128, 'add_incumbencia_init');
INSERT INTO cdt_action_function VALUES (NULL, 128, 'add_incumbencia');
INSERT INTO cdt_action_function VALUES (NULL, 129, 'update_incumbencia_init');
INSERT INTO cdt_action_function VALUES (NULL, 129, 'update_incumbencia');
INSERT INTO cdt_action_function VALUES (NULL, 130, 'delete_incumbencia');
INSERT INTO cdt_action_function VALUES (NULL, 131, 'view_incumbencia');


INSERT INTO cdt_function VALUES (NULL, 'Listar tipos de títulos en incumbencias');
INSERT INTO cdt_function VALUES (NULL, 'Agregar tipo de título de la incumbencia');
INSERT INTO cdt_function VALUES (NULL, 'Modificar tipo de título de la incumbencia');
INSERT INTO cdt_function VALUES (NULL, 'Eliminar tipo de título de la incumbencia');
INSERT INTO cdt_function VALUES (NULL, 'Ver tipo de título de la incumbencia');



INSERT INTO cdt_action_function VALUES (NULL, 132, 'list_incumbenciasTiposTitulo');
INSERT INTO cdt_action_function VALUES (NULL, 133, 'add_incumbenciaTipoTitulo_init');
INSERT INTO cdt_action_function VALUES (NULL, 133, 'add_incumbenciaTipoTitulo');
INSERT INTO cdt_action_function VALUES (NULL, 134, 'update_incumbenciaTipoTitulo_init');
INSERT INTO cdt_action_function VALUES (NULL, 134, 'update_incumbenciaTipoTitulo');
INSERT INTO cdt_action_function VALUES (NULL, 135, 'delete_incumbenciaTipoTitulo');
INSERT INTO cdt_action_function VALUES (NULL, 136, 'view_incumbenciaTipoTitulo');


CREATE TABLE cpiq_tipo_encomienda (
  oid bigint(20) NOT NULL auto_increment,
  nombre varchar(255) default NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY user_oid (user_oid)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE cpiq_tipo_encomienda ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

INSERT INTO cdt_function VALUES (NULL, 'Listar tipos de encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Agregar tipo de encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Modificar tipo de encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Eliminar tipo de encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Ver tipo de encomienda');

INSERT INTO cdt_menuoption VALUES (NULL, 'Tipos de Encomienda', 'doAction?action=list_tiposEncomienda', 137, 7, 9, 'encomiendas', '');

INSERT INTO cdt_action_function VALUES (NULL, 137, 'list_tiposEncomienda');
INSERT INTO cdt_action_function VALUES (NULL, 138, 'add_tipoEncomienda_init');
INSERT INTO cdt_action_function VALUES (NULL, 138, 'add_tipoEncomienda');
INSERT INTO cdt_action_function VALUES (NULL, 139, 'update_tipoEncomienda_init');
INSERT INTO cdt_action_function VALUES (NULL, 139, 'update_tipoEncomienda');
INSERT INTO cdt_action_function VALUES (NULL, 140, 'delete_tipoEncomienda');
INSERT INTO cdt_action_function VALUES (NULL, 141, 'view_tipoEncomienda');

CREATE TABLE cpiq_incumbencia_tipo_encomienda (
  oid bigint(20) NOT NULL auto_increment,
  incumbencia_oid bigint(20) default NULL,
  tipoEncomienda_oid bigint(20) default NULL,	
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY incumbencia_oid (incumbencia_oid),
  KEY tipoEncomienda_oid (tipoEncomienda_oid),
  KEY user_oid (user_oid)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE cpiq_incumbencia_tipo_encomienda ADD FOREIGN KEY ( incumbencia_oid ) REFERENCES cpiq_incumbencia (
oid
);

ALTER TABLE cpiq_incumbencia_tipo_encomienda ADD FOREIGN KEY ( tipoEncomienda_oid ) REFERENCES cpiq_tipo_encomienda (
oid
);



ALTER TABLE cpiq_incumbencia_tipo_encomienda ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

ALTER TABLE cpiq_incumbencia_tipo_encomienda ADD UNIQUE (
incumbencia_oid ,

tipoEncomienda_oid
); 

INSERT INTO cdt_function VALUES (NULL, 'Listar incumbencias de tipo de encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Agregar incumbencia de tipo de encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Modificar incumbencia de tipo de encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Eliminar incumbencia de tipo de encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Ver incumbencia de tipo de encomienda');

INSERT INTO cdt_action_function VALUES (NULL, 142, 'list_incumbenciasTiposEncomienda');
INSERT INTO cdt_action_function VALUES (NULL, 143, 'add_incumbenciaTipoEncomienda_init');
INSERT INTO cdt_action_function VALUES (NULL, 143, 'add_incumbenciaTipoEncomienda');
INSERT INTO cdt_action_function VALUES (NULL, 144, 'update_incumbenciaTipoEncomienda_init');
INSERT INTO cdt_action_function VALUES (NULL, 144, 'update_incumbenciaTipoEncomienda');
INSERT INTO cdt_action_function VALUES (NULL, 145, 'delete_incumbenciaTipoEncomienda');
INSERT INTO cdt_action_function VALUES (NULL, 146, 'view_incumbenciaTipoEncomienda');


CREATE TABLE cpiq_tipo_estado_encomienda (
  oid int(20) NOT NULL auto_increment,
  nombre varchar(255) default NULL,
  PRIMARY KEY  (oid)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO cdt_function VALUES (NULL, 'Listar tipos de estados de encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Agregar tipo de estado de encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Modificar tipo de estado de encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Eliminar tipo de estado de encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Ver tipo de estado de encomienda');

INSERT INTO cdt_action_function VALUES (NULL, 147, 'list_tiposEstadoEncomienda');
INSERT INTO cdt_action_function VALUES (NULL, 148, 'add_tipoEstadoEncomienda_init');
INSERT INTO cdt_action_function VALUES (NULL, 148, 'add_tipoEstadoEncomienda');
INSERT INTO cdt_action_function VALUES (NULL, 149, 'update_tipoEstadoEncomienda_init');
INSERT INTO cdt_action_function VALUES (NULL, 149, 'update_tipoEstadoEncomienda');
INSERT INTO cdt_action_function VALUES (NULL, 150, 'delete_tipoEstadoEncomienda');
INSERT INTO cdt_action_function VALUES (NULL, 151, 'view_tipoEstadoEncomienda');

INSERT INTO cdt_menuoption VALUES (NULL, 'Tipos de Estados de Encomienda', 'doAction?action=list_tiposEstadoEncomienda', 147, 8, 10, 'encomiendas', '');

INSERT INTO cpiq_tipo_estado_encomienda VALUES (1, 'Solicitada');
INSERT INTO cpiq_tipo_estado_encomienda VALUES (2, 'Generada');
INSERT INTO cpiq_tipo_estado_encomienda VALUES (3, 'Certificada');
INSERT INTO cpiq_tipo_estado_encomienda VALUES (4, 'Cancelada');

CREATE TABLE cpiq_encomienda (
  oid bigint(20) NOT NULL auto_increment,
  matriculado_oid bigint(20) default NULL,	
  numero varchar(255) default NULL,
  tipoEncomienda_oid bigint(20) default NULL,	
  fecha datetime default NULL,
  comitente varchar(255) default NULL,
  tipoComitente int(2) default NULL COMMENT '1=persona fisica, 2=persona juridica u organismo',
  representante varchar(255) default NULL,
  tipoDocumento_oid int(11) default NULL,
  documento varchar(20) default NULL,
  cuil int(2) default NULL,
  domicilio varchar(255) default NULL,
  localidad_oid int(11) default NULL,
  cp varchar(20) default NULL,
  telefono varchar(50) default NULL,
  seguridad varchar(50) default NULL,
  primero text default NULL,
  segundo text default NULL,
  tercero text default NULL,
  cuarto text default NULL,
  quinto text default NULL,
  posFirmaComitente text default NULL,
  seguridadTexto text default NULL,
  piePagina text default NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY matriculado_oid (matriculado_oid),
  KEY tipoEncomienda_oid (tipoEncomienda_oid),
  KEY localidad_oid (localidad_oid),
  KEY user_oid (user_oid)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE cpiq_encomienda ADD FOREIGN KEY ( matriculado_oid ) REFERENCES cpiq_matriculado (
oid
);

ALTER TABLE cpiq_encomienda ADD FOREIGN KEY ( tipoEncomienda_oid ) REFERENCES cpiq_tipo_encomienda (
oid
);

ALTER TABLE cpiq_encomienda ADD FOREIGN KEY ( tipoDocumento_oid ) REFERENCES cpiq_tipo_documento (
oid
);

ALTER TABLE cpiq_encomienda ADD FOREIGN KEY ( localidad_oid ) REFERENCES cpiq_localidad (
oid
);

ALTER TABLE cpiq_encomienda ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

INSERT INTO cdt_function VALUES (NULL, 'Listar encomiendas');
INSERT INTO cdt_function VALUES (NULL, 'Agregar encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Modificar encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Eliminar encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Ver encomienda');

INSERT INTO cdt_action_function VALUES (NULL, 152, 'list_encomiendas');
INSERT INTO cdt_action_function VALUES (NULL, 153, 'add_encomienda_init');
INSERT INTO cdt_action_function VALUES (NULL, 153, 'add_encomienda');
INSERT INTO cdt_action_function VALUES (NULL, 154, 'update_encomienda_init');
INSERT INTO cdt_action_function VALUES (NULL, 154, 'update_encomienda');
INSERT INTO cdt_action_function VALUES (NULL, 155, 'delete_encomienda');
INSERT INTO cdt_action_function VALUES (NULL, 156, 'view_encomienda');

INSERT INTO cdt_menuoption VALUES (NULL, 'Encomiendas', 'doAction?action=list_encomiendas', 152, 2, 9, 'encomiendas', '');

CREATE TABLE cpiq_encomienda_estado (
  oid bigint(20) NOT NULL auto_increment,
  encomienda_oid bigint(20) default NULL,
  tipoEstadoEncomienda_oid int(20) default NULL,
  fechaDesde datetime default NULL,
  fechaHasta datetime default NULL,
  motivo varchar(200) NOT NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY encomienda_oid (encomienda_oid),
  KEY tipoEstadoEncomienda_oid (tipoEstadoEncomienda_oid),
  KEY user_oid (user_oid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

ALTER TABLE cpiq_encomienda_estado ADD FOREIGN KEY ( encomienda_oid ) REFERENCES cpiq_encomienda (
oid
);

ALTER TABLE cpiq_encomienda_estado ADD FOREIGN KEY ( tipoEstadoEncomienda_oid ) REFERENCES cpiq_tipo_estado_encomienda (
oid
);

ALTER TABLE cpiq_encomienda_estado ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

CREATE TABLE cpiq_encomienda_registro (
  oid bigint(20) NOT NULL auto_increment,
  encomienda_oid bigint(20) default NULL,
  registroMatriculado_oid bigint(20) default NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY encomienda_oid (encomienda_oid),
  KEY registroMatriculado_oid (registroMatriculado_oid),
  KEY user_oid (user_oid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

ALTER TABLE cpiq_encomienda_registro ADD FOREIGN KEY ( encomienda_oid ) REFERENCES cpiq_encomienda (
oid
);

ALTER TABLE cpiq_encomienda_registro ADD FOREIGN KEY ( registroMatriculado_oid ) REFERENCES cpiq_registro_matriculado (
oid
);

ALTER TABLE cpiq_encomienda_registro ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

CREATE TABLE cpiq_encomienda_observacion (
  oid bigint(20) NOT NULL auto_increment,
  encomienda_oid bigint(20) default NULL,
  observacion text default NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY encomienda_oid (encomienda_oid),
  KEY user_oid (user_oid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

ALTER TABLE cpiq_encomienda_observacion ADD FOREIGN KEY ( encomienda_oid ) REFERENCES cpiq_encomienda (
oid
);

ALTER TABLE cpiq_encomienda_observacion ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

CREATE TABLE cpiq_encomienda_especialidad (
  oid bigint(20) NOT NULL auto_increment,
  encomienda_oid bigint(20) default NULL,
  titulo_oid bigint(20) default NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY encomienda_oid (encomienda_oid),
  KEY titulo_oid (titulo_oid),
  KEY user_oid (user_oid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

ALTER TABLE cpiq_encomienda_especialidad ADD FOREIGN KEY ( encomienda_oid ) REFERENCES cpiq_encomienda (
oid
);

ALTER TABLE cpiq_encomienda_especialidad ADD FOREIGN KEY ( titulo_oid ) REFERENCES cpiq_titulo (
oid
);

ALTER TABLE cpiq_encomienda_especialidad ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

CREATE TABLE cpiq_encomienda_profesional (
  oid bigint(20) NOT NULL auto_increment,
  encomienda_oid bigint(20) default NULL,
  consejo varchar(255) default NULL,
  profesional varchar(255) default NULL,
  matricula varchar(255) default NULL,
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY encomienda_oid (encomienda_oid),
  KEY user_oid (user_oid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

ALTER TABLE cpiq_encomienda_profesional ADD FOREIGN KEY ( encomienda_oid ) REFERENCES cpiq_encomienda (
oid
);

ALTER TABLE cpiq_encomienda_profesional ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

INSERT INTO cdt_function VALUES (NULL, 'Listar observaciones de la encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Agregar observación de la encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Modificar observación de la encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Eliminar observación de la encomienda');
INSERT INTO cdt_function VALUES (NULL, 'Ver observación de la encomienda');

INSERT INTO cdt_action_function VALUES (NULL, 157, 'list_encomiendasObservacion');
INSERT INTO cdt_action_function VALUES (NULL, 158, 'add_encomiendaObservacion_init');
INSERT INTO cdt_action_function VALUES (NULL, 158, 'add_encomiendaObservacion');
INSERT INTO cdt_action_function VALUES (NULL, 159, 'update_encomiendaObservacion_init');
INSERT INTO cdt_action_function VALUES (NULL, 159, 'update_encomiendaObservacion');
INSERT INTO cdt_action_function VALUES (NULL, 160, 'delete_encomiendaObservacion');
INSERT INTO cdt_action_function VALUES (NULL, 161, 'view_encomiendaObservacion');

INSERT INTO cdt_function VALUES (NULL, 'Cambiar estado de encomienda');
INSERT INTO cdt_action_function VALUES (NULL, 162, 'cambiarEstadoEncomienda_init');
INSERT INTO cdt_action_function VALUES (NULL, 162, 'cambiarEstadoEncomienda');

INSERT INTO `cpiq_concepto` (`oid`, `nombre`, `coeficiente`, `bloqueado`, `tipoAsignado_oid`, `user_oid`, `fechaUltModificacion`) VALUES
	(1, 'Pago Cuota Matrícula', -1, 1, 3, 1, '2013-07-29 13:44:55'),
	(2, 'Cobro Cuota Matrícula', 1, 1, 2, 1, '2013-08-01 10:52:45'),
	(3, 'Registro Matriculado', -1, 1, 3, 1, '2013-09-19 14:14:18'),
	(4, 'Pago Encomienda', -1, 3, 1, 1, NULL),
	(5, 'Cobro Encomienda', 1, 2, 1, 1, NULL);
	
CREATE TABLE cpiq_tipo_pago (
  oid int(20) NOT NULL auto_increment,
  nombre varchar(255) default NULL,
  entidad int(2) default NULL,
  cheque int(2) default NULL,
  PRIMARY KEY  (oid)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



INSERT INTO cpiq_tipo_pago VALUES (1, 'Efectivo',0,0);
INSERT INTO cpiq_tipo_pago VALUES (2, 'Tarjeta',1,1);
INSERT INTO cpiq_tipo_pago VALUES (3, 'Cheque',1,1);

INSERT INTO cdt_function VALUES (NULL, 'Pagar encomienda');
INSERT INTO cdt_action_function VALUES (NULL, 163, 'pagarEncomienda_init');
INSERT INTO cdt_action_function VALUES (NULL, 163, 'pagarEncomienda');

CREATE TABLE cpiq_encomienda_tipo_pago (
  oid bigint(20) NOT NULL auto_increment,
  encomienda_oid bigint(20) default NULL,
  tipoPago_oid int(20) default NULL,
  movCtaCte_oid bigint(20) default NULL,
  entidad varchar(255) default NULL,
  nroCheque varchar(255) default NULL,
  
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY encomienda_oid (encomienda_oid),
  KEY tipoPago_oid (tipoPago_oid),
  KEY movCtaCte_oid (movCtaCte_oid),
  KEY user_oid (user_oid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

ALTER TABLE cpiq_encomienda_tipo_pago ADD FOREIGN KEY ( encomienda_oid ) REFERENCES cpiq_encomienda (
oid
);

ALTER TABLE cpiq_encomienda_tipo_pago ADD FOREIGN KEY ( tipoPago_oid ) REFERENCES cpiq_tipo_pago (
oid
);

ALTER TABLE cpiq_encomienda_tipo_pago ADD FOREIGN KEY ( movCtaCte_oid ) REFERENCES cpiq_mov_ctacte (
oid
);

ALTER TABLE cpiq_encomienda_tipo_pago ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

INSERT INTO `cdt_menugroup` VALUES (2, 4, 80, 'Movimientos', 'panel_control&currentMenuGroup=2', 'accounts');

INSERT INTO cdt_function VALUES (NULL, 'Listar movimientos de matriculado');


INSERT INTO cdt_menuoption VALUES (NULL, 'Movimientos de Matriculado', 'doAction?action=list_movCtaCtes', 164, 1, 2, 'tiposTitulo', '');

INSERT INTO cdt_action_function VALUES (NULL, 164, 'list_movCtaCtes');


INSERT INTO cdt_function VALUES (NULL, 'Listar movimientos de caja');


INSERT INTO cdt_menuoption VALUES (NULL, 'Movimientos de Caja', 'doAction?action=list_movCajas', 165, 2, 2, 'tiposTitulo', '');

INSERT INTO cdt_action_function VALUES (NULL, 165, 'list_movCajas');

INSERT INTO cpiq_tipo_estado_encomienda VALUES (5, 'Anulada');

INSERT INTO `cpiq_concepto` (`oid`, `nombre`, `coeficiente`, `bloqueado`, `tipoAsignado_oid`, `user_oid`, `fechaUltModificacion`) VALUES
	(6, 'Movimiento anulado', 1, 1, 1, 1, NULL);
	
ALTER TABLE cpiq_mov_caja ADD FOREIGN KEY ( anulacion_oid ) REFERENCES cpiq_anulacion (
oid
);

ALTER TABLE cpiq_mov_ctacte ADD FOREIGN KEY ( anulacion_oid ) REFERENCES cpiq_anulacion (
oid
);

CREATE TABLE cpiq_incumbencia_registro (
  oid bigint(20) NOT NULL auto_increment,
  incumbencia_oid bigint(20) default NULL,
  registro_oid bigint(20) default NULL,	
  user_oid int(11) NOT NULL,
  fechaUltModificacion timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (oid),
  KEY incumbencia_oid (incumbencia_oid),
  KEY registro_oid (registro_oid),
  KEY user_oid (user_oid)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE cpiq_incumbencia_registro ADD FOREIGN KEY ( incumbencia_oid ) REFERENCES cpiq_incumbencia (
oid
);

ALTER TABLE cpiq_incumbencia_registro ADD FOREIGN KEY ( registro_oid ) REFERENCES cpiq_registro (
oid
);

ALTER TABLE cpiq_incumbencia_registro ADD FOREIGN KEY ( user_oid ) REFERENCES cdt_user (
cd_user
);

ALTER TABLE cpiq_incumbencia_registro ADD UNIQUE (
incumbencia_oid ,

registro_oid
) ;

INSERT INTO cdt_function VALUES (NULL, 'Listar registros en incumbencias');
INSERT INTO cdt_function VALUES (NULL, 'Agregar registro de la incumbencia');
INSERT INTO cdt_function VALUES (NULL, 'Modificar registro de la incumbencia');
INSERT INTO cdt_function VALUES (NULL, 'Eliminar registro de la incumbencia');
INSERT INTO cdt_function VALUES (NULL, 'Ver registro de la incumbencia');



INSERT INTO cdt_action_function VALUES (NULL, 166, 'list_incumbenciasRegistro');
INSERT INTO cdt_action_function VALUES (NULL, 167, 'add_incumbenciaRegistro_init');
INSERT INTO cdt_action_function VALUES (NULL, 167, 'add_incumbenciaRegistro');
INSERT INTO cdt_action_function VALUES (NULL, 168, 'update_incumbenciaRegistro_init');
INSERT INTO cdt_action_function VALUES (NULL, 168, 'update_incumbenciaRegistro');
INSERT INTO cdt_action_function VALUES (NULL, 169, 'delete_incumbenciaRegistro');
INSERT INTO cdt_action_function VALUES (NULL, 170, 'view_incumbenciaRegistro');

ALTER TABLE `cpiq_registro_matriculado`
	ADD COLUMN `movCtaCteDeuda_oid` BIGINT(20) NULL AFTER `movCtaCte_oid`;
ALTER TABLE cpiq_registro_matriculado ADD FOREIGN KEY ( movCtaCteDeuda_oid ) REFERENCES cpiq_mov_ctacte (
oid
);

ALTER TABLE `cpiq_cuota_generada`
	ADD COLUMN `movCtaCteDeuda_oid` BIGINT(20) NULL AFTER `movCtaCte_oid`;
ALTER TABLE cpiq_cuota_generada ADD FOREIGN KEY ( movCtaCteDeuda_oid ) REFERENCES cpiq_mov_ctacte (
oid
);

ALTER TABLE `cpiq_encomienda_tipo_pago`
	ADD COLUMN `movCtaCteDeuda_oid` BIGINT(20) NULL AFTER `movCtaCte_oid`;
ALTER TABLE cpiq_encomienda_tipo_pago ADD FOREIGN KEY ( movCtaCteDeuda_oid ) REFERENCES cpiq_mov_ctacte (
oid
);

INSERT INTO `cpiq_concepto` (`oid`, `nombre`, `coeficiente`, `bloqueado`, `tipoAsignado_oid`, `user_oid`, `fechaUltModificacion`) VALUES
	(7, 'Deuda Cuota Matrícula', -1, 1, 3, 1, NULL);
INSERT INTO `cpiq_concepto` (`oid`, `nombre`, `coeficiente`, `bloqueado`, `tipoAsignado_oid`, `user_oid`, `fechaUltModificacion`) VALUES
	(8, 'Deuda Registro Matriculado', -1, 1, 3, 1, NULL);
INSERT INTO `cpiq_concepto` (`oid`, `nombre`, `coeficiente`, `bloqueado`, `tipoAsignado_oid`, `user_oid`, `fechaUltModificacion`) VALUES
	(9, 'Deuda Encomienda', -1, 1, 3, 1, NULL);
	
UPDATE `cpiq_concepto` SET `coeficiente`=1 WHERE  `oid`=1;
UPDATE `cpiq_concepto` SET `coeficiente`=1 WHERE  `oid`=4;
UPDATE `cpiq_concepto` SET `coeficiente`=1 WHERE  `oid`=3;
	
INSERT INTO `cpiq_tipo_documento` (`nombre`) VALUES ('CI');

INSERT INTO `cpiq_provincia` (oid, `nombre`, `pais_oid`) VALUES (2,'Buenos Aires', 1);
INSERT INTO `cpiq_provincia` (oid,`nombre`, `pais_oid`) VALUES (1,'Capital Federal', 1);
INSERT INTO `cpiq_provincia` (oid,`nombre`, `pais_oid`) VALUES (3,'R�o Negro', 1);
INSERT INTO `cpiq_provincia` (oid,`nombre`, `pais_oid`) VALUES (4,'Santa Fe', 1);
INSERT INTO `cpiq_provincia` (oid,`nombre`, `pais_oid`) VALUES (5,'C�rdoba', 1);
INSERT INTO `cpiq_provincia` (oid,`nombre`, `pais_oid`) VALUES (6,'Neuqu�n', 1);
INSERT INTO `cpiq_provincia` (oid,`nombre`, `pais_oid`) VALUES (7,'Chubut', 1);
INSERT INTO `cpiq_provincia` (oid,`nombre`, `pais_oid`) VALUES (8,'Tierra del Fuego', 1);
INSERT INTO `cpiq_provincia` (oid,`nombre`, `pais_oid`) VALUES (9,'Salta', 1);
INSERT INTO `cpiq_provincia` (oid,`nombre`, `pais_oid`) VALUES (10,'San Juan', 1);
INSERT INTO `cpiq_provincia` (oid,`nombre`, `pais_oid`) VALUES (11,'Mendoza', 1);
INSERT INTO `cpiq_provincia` (oid,`nombre`, `pais_oid`) VALUES (12,'San Luis', 1);
INSERT INTO `cpiq_provincia` (oid,`nombre`, `pais_oid`) VALUES (13,'Entre R�os', 1);
INSERT INTO `cpiq_provincia` (oid,`nombre`, `pais_oid`) VALUES (14,'Santa Cruz', 1);

INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (1,'CABA', 1);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (2,'Avellaneda', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (3,'Adrogue', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (4,'9 de Julio', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (5,'Azul', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (6,'J. M. Gutierrez', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (7,'Bah�a Blanca', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (8,'Banfield', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (9,'Beccar', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (10,'Bella Vista', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (11,'Berazategui', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (12,'Berisso', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (13,'Bernal', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (14,'Billinghurst', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (15,'Boulogne', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (16,'Burzaco', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (17,'Campana', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (18,'Carapachay', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (19,'Caseros', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (20,'Cipolletti', 3);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (21,'City Bell', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (22,'Ciudad Madera', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (23,'Ciudadela', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (24,'Don Bosco', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (25,'Don Torcuato', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (26,'El Palomar', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (27,'Ensenada', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (28,'Escobar', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (29,'Esperanza', 4);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (30,'Ezpeleta', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (31,'Fatima', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (32,'Francisco Alvarez', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (33,'Florencio Varela', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (34,'Florida', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (35,'General Roca', 3);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (36,'Gonnet', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (37,'General Deheza', 5);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (38,'Haedo', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (39,'Hurlingham', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (40,'Ingeniero Maschwitz', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (41,'Ituzaingo', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (42,'La Lucila', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (43,'La Plata', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (44,'Lan�s', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (45,'Lomas de Zamora', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (46,'Lomas del Mirador', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (47,'Luis Guillon', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (48,'Luj�n', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (49,'Mar del Plata', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (50,'Martin Coronado', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (51,'Mart�nez', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (52,'Mercedes', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (53,'Monte Grande', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (54,'Mor�n', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (55,'Munro', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (56,'Mu�iz', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (57,'Necochea', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (58,'Neuqu�n', 6);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (59,'Olivos', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (60,'Pilar', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (61,'Playa Uni�n', 7);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (62,'Puerto Madryn', 7);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (63,'Punta Alta', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (64,'Plaza Huincul', 6);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (65,'Quilmes', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (66,'Remedios de Escalada', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (67,'Rafaela', 4);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (68,'Ramos Mej�a', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (69,'R�o Grande', 8);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (70,'Rosario', 4);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (71,'Saenz Pe�a', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (72,'Salta', 9);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (73,'San Andr�s', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (74,'San Isidro', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (75,'San Juan', 10);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (76,'San Justo', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (77,'San Lorenzo', 4);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (78,'San Mart�n', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (79,'San Miguel', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (80,'San Miguel', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (81,'San Rafael', 11);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (82,'Santa Fe', 4);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (83,'Sarand�', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (84,'Tapiales', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (85,'Temperley', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (86,'Tigre', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (87,'Tolosa', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (88,'Ushuaia', 8);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (89,'Villa Mercedes', 12);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (90,'Villa Adelina', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (91,'Villa Mar�a', 5);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (92,'Vicente L�pez', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (93,'Victoria', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (94,'Villa Ballester', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (95,'Villa Celina', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (96,'Villa Elisa', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (97,'Villa Sarmiento', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (98,'Wilde', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (99,'Z�rate', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (100,'General Guti�rrez', 11);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (101,'Catriel', 3);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (102,'Claypole', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (103,'General Pacheco', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (104,'La Tablada', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (105,'Loma Hermosa', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (106,'Moreno', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (107,'Tolhuin', 8);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (108,'Villa Tessei', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (109,'Bariloche', 3);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (110,'Bragado', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (111,'Rada Tilly', 7);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (112,'Jos� Le�n Su�rez', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (113,'Viedma', 3);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (114,'Villa Martelli', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (115,'Chacabuco', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (116,'Chivilcoy', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (117,'Concordia', 13);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (118,'Glew', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (119,'Jauregui', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (120,'Olavarr�a', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (121,'Tandil', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (122,'Velent�n Alsina', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (123,'Baradero', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (124,'Caleta Olivia', 14);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (125,'San Antonio de Padua', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (126,'Merlo', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (127,'Almirante Brown', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (128,'Benavidez', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (129,'Col�n', 13);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (130,'Castelar', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (131,'R�o Gallegos', 14);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (132,'San Nicol�s', 2);
INSERT INTO `cpiq_localidad` (oid,`nombre`, `provincia_oid`) VALUES (133,'Ezeiza', 2);


ALTER TABLE `cpiq_entidad_emisora`
	CHANGE COLUMN `nombre` `nombre` VARCHAR(100) NOT NULL AFTER `oid`;
	
#########################################19/02/2015########################################
ALTER TABLE `cpiq_tipo_titulo`
	ADD COLUMN `ingenieroLicenciado` INT(1) NOT NULL DEFAULT '0' AFTER `secuenciaTitulo_oid`;
	
	
UPDATE cpiq_tipo_titulo SET ingenieroLicenciado = 1 WHERE nombre LIKE '%INGENIERO%' OR nombre LIKE '%LICENCIADO%';

ALTER TABLE `cpiq_cuota_valor`
	ADD COLUMN `importeIngeniero` FLOAT NULL DEFAULT NULL AFTER `importe`;
	
#########################################14/08/2015########################################
truncate table cpiq_historico_estado;
truncate table cpiq_matriculado;
#########################################Actualizar cpiq_matriculado########################################
INSERT INTO cpiq_matriculado (nombre, apellido, sexo, domicilio, codigoPostal, localidad_oid, teParticular, teMovil, email, tipoDocumento_oid, nroDocumento, user_oid)
SELECT A.nombre, A.apellido, A.sexo, A.calle, A.cp, A.localidad, A.telefono, A.celular, A.mail, A.tipo_doc, A.documento, 1 FROM `aux_nuevos` A WHERE NOT EXISTS (SELECT M.`nroDocumento` FROM `cpiq_matriculado` M WHERE M.nroDocumento = A.`documento`)

UPDATE cpiq_matriculado p
INNER JOIN aux_nacimiento pp ON pp. documento = p.nroDocumento
SET p.fechaNacimiento = pp.nacimiento

INSERT INTO cpiq_historico_estado (matriculado_oid, estadoMatriculado_oid, fechaDesde, user_oid)
SELECT M.oid, A.estado, now(), 1 FROM `aux_estado` A INNER JOIN cpiq_matriculado M ON A.documento = M.nroDocumento WHERE A.estado != 0 AND NOT EXISTS (SELECT E.matriculado_oid FROM `cpiq_historico_estado` E WHERE M.oid = E.matriculado_oid)

UPDATE `aux_estado` A INNER JOIN cpiq_matriculado M ON A.documento = M.nroDocumento INNER JOIN cpiq_historico_estado E ON M.oid = E.matriculado_oid
SET E.fechaHasta = now()
WHERE A.estado != 0 AND A.estado != E.estadoMatriculado_oid 

INSERT INTO cpiq_historico_estado (matriculado_oid, estadoMatriculado_oid, fechaDesde, user_oid)
SELECT M.oid, A.estado, now(), 1 FROM `aux_estado` A INNER JOIN cpiq_matriculado M ON A.documento = M.nroDocumento INNER JOIN cpiq_historico_estado E ON M.oid = E.matriculado_oid WHERE A.estado != 0 AND A.estado != E.estadoMatriculado_oid 

SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO cpiq_titulo (matriculado_oid, tipoTitulo_oid, entidadEmisora_oid, fechaExpedicion, fechaMatriculacion, matricula, tituloPrincipal, user_oid, fechaUltModificacion)
SELECT M.oid, A.titulo, A.entidad, A.fecha_egreso, A.fecha_matricula, A.matricula, A.principal, 1, now() FROM `aux_titulo` A INNER JOIN cpiq_matriculado M ON A.documento = M.nroDocumento ;
SET FOREIGN_KEY_CHECKS = 1;

SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO cpiq_titulo (matriculado_oid, tipoTitulo_oid, entidadEmisora_oid, fechaExpedicion, user_oid, fechaUltModificacion)
SELECT M.oid, A.especialidad, A.entidad_especialidad, A.fecha_especialidad, 1, now() FROM `aux_titulo` A INNER JOIN cpiq_matriculado M ON A.documento = M.nroDocumento WHERE  A.especialidad != 0;
SET FOREIGN_KEY_CHECKS = 1;

#########################################20/03/2017########################################
RENAME TABLE `cpiq_registro_matriculado` TO `cpiq_registro_cuota_matriculado`;

CREATE TABLE `cpiq_registro_matriculado` (
	`oid` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`fecha` DATE NULL DEFAULT NULL,
	`matriculado_oid` BIGINT(20) NULL DEFAULT NULL,
	`registro_oid` BIGINT(20) NULL DEFAULT NULL,
	numero varchar(20) NULL,
	`user_oid` INT(11) NOT NULL,
	`fechaUltModificacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	
	PRIMARY KEY (`oid`),
	UNIQUE INDEX `matriculado_oid_2` (`matriculado_oid`, `registro_oid`),
	INDEX `matriculado_oid` (`matriculado_oid`),
	
	INDEX `user_oid` (`user_oid`),
	INDEX `registro_oid` (`registro_oid`),

	CONSTRAINT `cpiq_registro_matriculado_ibfk_1` FOREIGN KEY (`matriculado_oid`) REFERENCES `cpiq_matriculado` (`oid`),
	CONSTRAINT `cpiq_registro_matriculado_ibfk_2` FOREIGN KEY (`registro_oid`) REFERENCES `cpiq_registro` (`oid`),
	
	CONSTRAINT `cpiq_registro_matriculado_ibfk_4` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;

INSERT INTO `cpiq_concepto` (`oid`, `nombre`, `coeficiente`, `tipoAsignado_oid`, `user_oid`, `fechaUltModificacion`, `bloqueado`) VALUES (11, 'Cobro Registro Matriculado', 1, 2, 1, '2017-03-20 17:41:15', 1);

UPDATE `cpiq_concepto` SET `nombre`='Pago Registro Matriculado' WHERE  `oid`=3;




