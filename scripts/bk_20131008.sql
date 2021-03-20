-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 08-10-2013 a las 09:06:31
-- Versión del servidor: 5.0.45
-- Versión de PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `cpiq_matriculados`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cdt_action_function`
-- 

CREATE TABLE `cdt_action_function` (
  `cd_actionfunction` int(11) NOT NULL auto_increment,
  `cd_function` int(11) NOT NULL,
  `ds_action` varchar(150) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`cd_actionfunction`),
  UNIQUE KEY `ds_action` (`ds_action`),
  KEY `fk_funtion` (`cd_function`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=199 ;

-- 
-- Volcar la base de datos para la tabla `cdt_action_function`
-- 

INSERT INTO `cdt_action_function` VALUES (1, 1, 'add_cdtactionfunction_init');
INSERT INTO `cdt_action_function` VALUES (2, 1, 'add_cdtactionfunction');
INSERT INTO `cdt_action_function` VALUES (3, 2, 'delete_cdtactionfunction');
INSERT INTO `cdt_action_function` VALUES (4, 3, 'view_cdtactionfunction');
INSERT INTO `cdt_action_function` VALUES (5, 4, 'update_cdtactionfunction');
INSERT INTO `cdt_action_function` VALUES (6, 4, 'update_cdtactionfunction_init');
INSERT INTO `cdt_action_function` VALUES (7, 5, 'list_cdtactionfunctions');
INSERT INTO `cdt_action_function` VALUES (8, 6, 'add_cdtfunction');
INSERT INTO `cdt_action_function` VALUES (9, 6, 'add_cdtfunction_init');
INSERT INTO `cdt_action_function` VALUES (10, 7, 'delete_cdtfunction');
INSERT INTO `cdt_action_function` VALUES (11, 8, 'view_cdtfunction');
INSERT INTO `cdt_action_function` VALUES (12, 9, 'update_cdtfunction');
INSERT INTO `cdt_action_function` VALUES (13, 9, 'update_cdtfunction_init');
INSERT INTO `cdt_action_function` VALUES (14, 10, 'list_cdtfunctions');
INSERT INTO `cdt_action_function` VALUES (15, 11, 'add_cdtmenugroup');
INSERT INTO `cdt_action_function` VALUES (16, 11, 'add_cdtmenugroup_init');
INSERT INTO `cdt_action_function` VALUES (17, 12, 'delete_cdtmenugroup');
INSERT INTO `cdt_action_function` VALUES (18, 13, 'view_cdtmenugroup');
INSERT INTO `cdt_action_function` VALUES (19, 14, 'update_cdtmenugroup');
INSERT INTO `cdt_action_function` VALUES (20, 14, 'update_cdtmenugroup_init');
INSERT INTO `cdt_action_function` VALUES (21, 15, 'list_cdtmenugroups');
INSERT INTO `cdt_action_function` VALUES (22, 16, 'add_cdtmenuoption');
INSERT INTO `cdt_action_function` VALUES (23, 16, 'add_cdtmenuoption_init');
INSERT INTO `cdt_action_function` VALUES (24, 17, 'delete_cdtmenuoption');
INSERT INTO `cdt_action_function` VALUES (25, 18, 'view_cdtmenuoption');
INSERT INTO `cdt_action_function` VALUES (26, 19, 'update_cdtmenuoption');
INSERT INTO `cdt_action_function` VALUES (27, 19, 'update_cdtmenuoption_init');
INSERT INTO `cdt_action_function` VALUES (28, 20, 'list_cdtmenuoptions');
INSERT INTO `cdt_action_function` VALUES (29, 21, 'add_cdtregistration');
INSERT INTO `cdt_action_function` VALUES (30, 21, 'add_cdtregistration_init');
INSERT INTO `cdt_action_function` VALUES (31, 22, 'delete _cdtregistration');
INSERT INTO `cdt_action_function` VALUES (32, 23, 'view_cdtregistration');
INSERT INTO `cdt_action_function` VALUES (33, 24, 'update_cdtregistration');
INSERT INTO `cdt_action_function` VALUES (34, 24, 'update_cdtregistration_init');
INSERT INTO `cdt_action_function` VALUES (35, 25, 'list_cdtregistrations');
INSERT INTO `cdt_action_function` VALUES (36, 26, 'add_cdtuser');
INSERT INTO `cdt_action_function` VALUES (37, 26, 'add_cdtuser_init');
INSERT INTO `cdt_action_function` VALUES (38, 27, 'delete _cdtuser');
INSERT INTO `cdt_action_function` VALUES (39, 28, 'view_cdtuser');
INSERT INTO `cdt_action_function` VALUES (40, 29, 'update_cdtuser');
INSERT INTO `cdt_action_function` VALUES (41, 29, 'update_cdtuser_init');
INSERT INTO `cdt_action_function` VALUES (42, 44, 'list_matriculados');
INSERT INTO `cdt_action_function` VALUES (43, 45, 'add_matriculado_init');
INSERT INTO `cdt_action_function` VALUES (44, 45, 'add_matriculado');
INSERT INTO `cdt_action_function` VALUES (45, 46, 'update_matriculado_init');
INSERT INTO `cdt_action_function` VALUES (46, 46, 'update_matriculado');
INSERT INTO `cdt_action_function` VALUES (47, 47, 'delete_matriculado');
INSERT INTO `cdt_action_function` VALUES (48, 48, 'view_matriculado');
INSERT INTO `cdt_action_function` VALUES (49, 49, 'list_entidadesEmisora');
INSERT INTO `cdt_action_function` VALUES (50, 50, 'add_entidadEmisora_init');
INSERT INTO `cdt_action_function` VALUES (51, 50, 'add_entidadEmisora');
INSERT INTO `cdt_action_function` VALUES (52, 51, 'update_entidadEmisora_init');
INSERT INTO `cdt_action_function` VALUES (53, 51, 'update_entidadEmisora');
INSERT INTO `cdt_action_function` VALUES (54, 52, 'delete_entidadEmisora');
INSERT INTO `cdt_action_function` VALUES (55, 53, 'view_entidadEmisora');
INSERT INTO `cdt_action_function` VALUES (56, 54, 'list_estadosMatriculado');
INSERT INTO `cdt_action_function` VALUES (57, 55, 'add_estadoMatriculado_init');
INSERT INTO `cdt_action_function` VALUES (58, 55, 'add_estadoMatriculado');
INSERT INTO `cdt_action_function` VALUES (59, 56, 'update_estadoMatriculado_init');
INSERT INTO `cdt_action_function` VALUES (60, 56, 'update_estadoMatriculado');
INSERT INTO `cdt_action_function` VALUES (61, 57, 'delete_estadoMatriculado');
INSERT INTO `cdt_action_function` VALUES (62, 58, 'view_estadoMatriculado');
INSERT INTO `cdt_action_function` VALUES (63, 59, 'list_localidades');
INSERT INTO `cdt_action_function` VALUES (64, 60, 'add_localidad_init');
INSERT INTO `cdt_action_function` VALUES (65, 60, 'add_localidad');
INSERT INTO `cdt_action_function` VALUES (66, 61, 'update_localidad_init');
INSERT INTO `cdt_action_function` VALUES (67, 61, 'update_localidad');
INSERT INTO `cdt_action_function` VALUES (68, 62, 'delete_localidad');
INSERT INTO `cdt_action_function` VALUES (69, 63, 'view_localidad');
INSERT INTO `cdt_action_function` VALUES (70, 64, 'list_paises');
INSERT INTO `cdt_action_function` VALUES (71, 65, 'add_pais_init');
INSERT INTO `cdt_action_function` VALUES (72, 65, 'add_pais');
INSERT INTO `cdt_action_function` VALUES (73, 66, 'update_pais_init');
INSERT INTO `cdt_action_function` VALUES (74, 66, 'update_pais');
INSERT INTO `cdt_action_function` VALUES (75, 67, 'delete_pais');
INSERT INTO `cdt_action_function` VALUES (76, 68, 'view_pais');
INSERT INTO `cdt_action_function` VALUES (77, 69, 'list_provincias');
INSERT INTO `cdt_action_function` VALUES (78, 70, 'add_provincia_init');
INSERT INTO `cdt_action_function` VALUES (79, 70, 'add_provincia');
INSERT INTO `cdt_action_function` VALUES (80, 71, 'update_provincia_init');
INSERT INTO `cdt_action_function` VALUES (81, 71, 'update_provincia');
INSERT INTO `cdt_action_function` VALUES (82, 72, 'delete_provincia');
INSERT INTO `cdt_action_function` VALUES (83, 73, 'view_provincia');
INSERT INTO `cdt_action_function` VALUES (84, 74, 'list_tiposDocumento');
INSERT INTO `cdt_action_function` VALUES (85, 75, 'add_tipoDocumento_init');
INSERT INTO `cdt_action_function` VALUES (86, 75, 'add_tipoDocumento');
INSERT INTO `cdt_action_function` VALUES (87, 76, 'update_tipoDocumento');
INSERT INTO `cdt_action_function` VALUES (88, 76, 'update_tipoDocumento_init');
INSERT INTO `cdt_action_function` VALUES (89, 77, 'delete_tipoDocumento');
INSERT INTO `cdt_action_function` VALUES (90, 78, 'view_tipoDocumento');
INSERT INTO `cdt_action_function` VALUES (91, 79, 'list_tiposTitulo');
INSERT INTO `cdt_action_function` VALUES (92, 80, 'add_tipoTitulo_init');
INSERT INTO `cdt_action_function` VALUES (93, 80, 'add_tipoTitulo');
INSERT INTO `cdt_action_function` VALUES (94, 81, 'update_tipoTitulo_init');
INSERT INTO `cdt_action_function` VALUES (95, 81, 'update_tipoTitulo');
INSERT INTO `cdt_action_function` VALUES (96, 82, 'delete_tipoTitulo');
INSERT INTO `cdt_action_function` VALUES (97, 83, 'view_tipoTitulo');
INSERT INTO `cdt_action_function` VALUES (98, 84, 'list_clasesTitulo');
INSERT INTO `cdt_action_function` VALUES (99, 85, 'add_claseTitulo_init');
INSERT INTO `cdt_action_function` VALUES (100, 85, 'add_claseTitulo');
INSERT INTO `cdt_action_function` VALUES (101, 86, 'update_claseTitulo_init');
INSERT INTO `cdt_action_function` VALUES (102, 86, 'update_claseTitulo');
INSERT INTO `cdt_action_function` VALUES (103, 87, 'delete_claseTitulo');
INSERT INTO `cdt_action_function` VALUES (104, 88, 'view_claseTitulo');
INSERT INTO `cdt_action_function` VALUES (105, 89, 'list_secuenciasTitulo');
INSERT INTO `cdt_action_function` VALUES (106, 90, 'add_secuenciaTitulo_init');
INSERT INTO `cdt_action_function` VALUES (107, 90, 'add_secuenciaTitulo');
INSERT INTO `cdt_action_function` VALUES (108, 91, 'update_secuenciaTitulo_init');
INSERT INTO `cdt_action_function` VALUES (109, 91, 'update_secuenciaTitulo');
INSERT INTO `cdt_action_function` VALUES (110, 92, 'delete_secuenciaTitulo');
INSERT INTO `cdt_action_function` VALUES (111, 93, 'view_secuenciaTitulo');
INSERT INTO `cdt_action_function` VALUES (112, 93, 'list_titulos');
INSERT INTO `cdt_action_function` VALUES (113, 94, 'add_titulo_init');
INSERT INTO `cdt_action_function` VALUES (114, 94, 'add_titulo');
INSERT INTO `cdt_action_function` VALUES (115, 95, 'update_titulo_init');
INSERT INTO `cdt_action_function` VALUES (116, 95, 'update_titulo');
INSERT INTO `cdt_action_function` VALUES (117, 96, 'delete_titulo');
INSERT INTO `cdt_action_function` VALUES (118, 97, 'view_titulo');
INSERT INTO `cdt_action_function` VALUES (119, 99, 'list_cuotas');
INSERT INTO `cdt_action_function` VALUES (120, 100, 'add_cuota_init');
INSERT INTO `cdt_action_function` VALUES (121, 100, 'add_cuota');
INSERT INTO `cdt_action_function` VALUES (122, 101, 'update_cuota_init');
INSERT INTO `cdt_action_function` VALUES (123, 101, 'update_cuota');
INSERT INTO `cdt_action_function` VALUES (124, 102, 'delete_cuota');
INSERT INTO `cdt_action_function` VALUES (125, 103, 'view_cuota');
INSERT INTO `cdt_action_function` VALUES (126, 104, 'masiva_cuotasGenerada');
INSERT INTO `cdt_action_function` VALUES (127, 105, 'list_registros');
INSERT INTO `cdt_action_function` VALUES (128, 106, 'add_registro_init');
INSERT INTO `cdt_action_function` VALUES (129, 106, 'add_registro');
INSERT INTO `cdt_action_function` VALUES (130, 107, 'update_registro_init');
INSERT INTO `cdt_action_function` VALUES (131, 107, 'update_registro');
INSERT INTO `cdt_action_function` VALUES (132, 108, 'delete_registro');
INSERT INTO `cdt_action_function` VALUES (133, 109, 'view_registro');
INSERT INTO `cdt_action_function` VALUES (134, 110, 'list_registrosCuota');
INSERT INTO `cdt_action_function` VALUES (135, 111, 'add_registroCuota_init');
INSERT INTO `cdt_action_function` VALUES (136, 111, 'add_registroCuota');
INSERT INTO `cdt_action_function` VALUES (137, 112, 'update_registroCuota_init');
INSERT INTO `cdt_action_function` VALUES (138, 112, 'update_registroCuota');
INSERT INTO `cdt_action_function` VALUES (139, 113, 'delete_registroCuota');
INSERT INTO `cdt_action_function` VALUES (140, 114, 'view_registroCuota');
INSERT INTO `cdt_action_function` VALUES (141, 115, 'list_conceptos');
INSERT INTO `cdt_action_function` VALUES (142, 116, 'add_concepto_init');
INSERT INTO `cdt_action_function` VALUES (143, 116, 'add_concepto');
INSERT INTO `cdt_action_function` VALUES (144, 117, 'update_concepto_init');
INSERT INTO `cdt_action_function` VALUES (145, 117, 'update_concepto');
INSERT INTO `cdt_action_function` VALUES (146, 118, 'delete_concepto');
INSERT INTO `cdt_action_function` VALUES (147, 119, 'view_concepto');
INSERT INTO `cdt_action_function` VALUES (148, 120, 'list_cuotasGenerada');
INSERT INTO `cdt_action_function` VALUES (149, 121, 'pagar_cuotaGenerada');
INSERT INTO `cdt_action_function` VALUES (150, 122, 'list_registrosMatriculado');
INSERT INTO `cdt_action_function` VALUES (151, 123, 'add_registroMatriculado_init');
INSERT INTO `cdt_action_function` VALUES (152, 123, 'add_registroMatriculado');
INSERT INTO `cdt_action_function` VALUES (153, 124, 'update_registroMatriculado_init');
INSERT INTO `cdt_action_function` VALUES (154, 124, 'update_registroMatriculado');
INSERT INTO `cdt_action_function` VALUES (155, 125, 'delete_registroMatriculado');
INSERT INTO `cdt_action_function` VALUES (156, 126, 'view_registroMatriculado');
INSERT INTO `cdt_action_function` VALUES (157, 127, 'list_incumbencias');
INSERT INTO `cdt_action_function` VALUES (158, 128, 'add_incumbencia_init');
INSERT INTO `cdt_action_function` VALUES (159, 128, 'add_incumbencia');
INSERT INTO `cdt_action_function` VALUES (160, 129, 'update_incumbencia_init');
INSERT INTO `cdt_action_function` VALUES (161, 129, 'update_incumbencia');
INSERT INTO `cdt_action_function` VALUES (162, 130, 'delete_incumbencia');
INSERT INTO `cdt_action_function` VALUES (163, 131, 'view_incumbencia');
INSERT INTO `cdt_action_function` VALUES (164, 132, 'list_incumbenciasTiposTitulo');
INSERT INTO `cdt_action_function` VALUES (165, 133, 'add_incumbenciaTipoTitulo_init');
INSERT INTO `cdt_action_function` VALUES (166, 133, 'add_incumbenciaTipoTitulo');
INSERT INTO `cdt_action_function` VALUES (167, 134, 'update_incumbenciaTipoTitulo_init');
INSERT INTO `cdt_action_function` VALUES (168, 134, 'update_incumbenciaTipoTitulo');
INSERT INTO `cdt_action_function` VALUES (169, 135, 'delete_incumbenciaTipoTitulo');
INSERT INTO `cdt_action_function` VALUES (170, 136, 'view_incumbenciaTipoTitulo');
INSERT INTO `cdt_action_function` VALUES (171, 137, 'list_tiposEncomienda');
INSERT INTO `cdt_action_function` VALUES (172, 138, 'add_tipoEncomienda_init');
INSERT INTO `cdt_action_function` VALUES (173, 138, 'add_tipoEncomienda');
INSERT INTO `cdt_action_function` VALUES (174, 139, 'update_tipoEncomienda_init');
INSERT INTO `cdt_action_function` VALUES (175, 139, 'update_tipoEncomienda');
INSERT INTO `cdt_action_function` VALUES (176, 140, 'delete_tipoEncomienda');
INSERT INTO `cdt_action_function` VALUES (177, 141, 'view_tipoEncomienda');
INSERT INTO `cdt_action_function` VALUES (178, 142, 'list_incumbenciasTiposEncomienda');
INSERT INTO `cdt_action_function` VALUES (179, 143, 'add_incumbenciaTipoEncomienda_init');
INSERT INTO `cdt_action_function` VALUES (180, 143, 'add_incumbenciaTipoEncomienda');
INSERT INTO `cdt_action_function` VALUES (181, 144, 'update_incumbenciaTipoEncomienda_init');
INSERT INTO `cdt_action_function` VALUES (182, 144, 'update_incumbenciaTipoEncomienda');
INSERT INTO `cdt_action_function` VALUES (183, 145, 'delete_incumbenciaTipoEncomienda');
INSERT INTO `cdt_action_function` VALUES (184, 146, 'view_incumbenciaTipoEncomienda');
INSERT INTO `cdt_action_function` VALUES (185, 147, 'list_tiposEstadoEncomienda');
INSERT INTO `cdt_action_function` VALUES (186, 148, 'add_tipoEstadoEncomienda_init');
INSERT INTO `cdt_action_function` VALUES (187, 148, 'add_tipoEstadoEncomienda');
INSERT INTO `cdt_action_function` VALUES (188, 149, 'update_tipoEstadoEncomienda_init');
INSERT INTO `cdt_action_function` VALUES (189, 149, 'update_tipoEstadoEncomienda');
INSERT INTO `cdt_action_function` VALUES (190, 150, 'delete_tipoEstadoEncomienda');
INSERT INTO `cdt_action_function` VALUES (191, 151, 'view_tipoEstadoEncomienda');
INSERT INTO `cdt_action_function` VALUES (192, 152, 'list_encomienda');
INSERT INTO `cdt_action_function` VALUES (193, 153, 'add_encomienda_init');
INSERT INTO `cdt_action_function` VALUES (194, 153, 'add_encomienda');
INSERT INTO `cdt_action_function` VALUES (195, 154, 'update_encomienda_init');
INSERT INTO `cdt_action_function` VALUES (196, 154, 'update_encomienda');
INSERT INTO `cdt_action_function` VALUES (197, 155, 'delete_encomienda');
INSERT INTO `cdt_action_function` VALUES (198, 156, 'view_encomienda');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cdt_audit`
-- 

CREATE TABLE `cdt_audit` (
  `oid` bigint(20) NOT NULL auto_increment,
  `cd_user` int(11) NOT NULL,
  `ds_action` varchar(255) NOT NULL,
  `ds_host` varchar(50) NOT NULL,
  `dt_date` datetime NOT NULL,
  PRIMARY KEY  (`oid`),
  KEY `ds_action` (`ds_action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `cdt_audit`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cdt_function`
-- 

CREATE TABLE `cdt_function` (
  `cd_function` int(11) NOT NULL auto_increment,
  `ds_function` varchar(150) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`cd_function`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=157 ;

-- 
-- Volcar la base de datos para la tabla `cdt_function`
-- 

INSERT INTO `cdt_function` VALUES (1, 'Add CdtActionFunction');
INSERT INTO `cdt_function` VALUES (2, 'Delete CdtActionFunction');
INSERT INTO `cdt_function` VALUES (3, 'View CdtActionFunction');
INSERT INTO `cdt_function` VALUES (4, 'Update CdtActionFunction');
INSERT INTO `cdt_function` VALUES (5, 'List CdtActionFunction');
INSERT INTO `cdt_function` VALUES (6, 'Add CdtFunction');
INSERT INTO `cdt_function` VALUES (7, 'Delete CdtFunction');
INSERT INTO `cdt_function` VALUES (8, 'View CdtFunction');
INSERT INTO `cdt_function` VALUES (9, 'Update CdtFunction');
INSERT INTO `cdt_function` VALUES (10, 'List CdtFunction');
INSERT INTO `cdt_function` VALUES (11, 'Add CdtMenuGroup');
INSERT INTO `cdt_function` VALUES (12, 'Delete CdtMenuGroup');
INSERT INTO `cdt_function` VALUES (13, 'View CdtMenuGroup');
INSERT INTO `cdt_function` VALUES (14, 'Update CdtMenuGroup');
INSERT INTO `cdt_function` VALUES (15, 'List CdtMenuGroup');
INSERT INTO `cdt_function` VALUES (16, 'Add CdtMenuOption');
INSERT INTO `cdt_function` VALUES (17, 'Delete CdtMenuOption');
INSERT INTO `cdt_function` VALUES (18, 'View CdtMenuOption');
INSERT INTO `cdt_function` VALUES (19, 'Update CdtMenuOption');
INSERT INTO `cdt_function` VALUES (20, 'List CdtMenuOption');
INSERT INTO `cdt_function` VALUES (21, 'Add CdtRegistration');
INSERT INTO `cdt_function` VALUES (22, 'Delete CdtRegistration');
INSERT INTO `cdt_function` VALUES (23, 'View CdtRegistration');
INSERT INTO `cdt_function` VALUES (24, 'Update CdtRegistration');
INSERT INTO `cdt_function` VALUES (25, 'List CdtRegistration');
INSERT INTO `cdt_function` VALUES (26, 'Add CdtUser');
INSERT INTO `cdt_function` VALUES (27, 'Delete CdtUser');
INSERT INTO `cdt_function` VALUES (28, 'View CdtUser');
INSERT INTO `cdt_function` VALUES (29, 'Update CdtUser');
INSERT INTO `cdt_function` VALUES (30, 'List CdtUser');
INSERT INTO `cdt_function` VALUES (31, 'Add CdtUserGroup');
INSERT INTO `cdt_function` VALUES (32, 'Delete CdtUserGroup');
INSERT INTO `cdt_function` VALUES (33, 'View CdtUserGroup');
INSERT INTO `cdt_function` VALUES (34, 'Update CdtUserGroup');
INSERT INTO `cdt_function` VALUES (35, 'List CdtUserGroup');
INSERT INTO `cdt_function` VALUES (36, 'Add CdtUserGroupFunction');
INSERT INTO `cdt_function` VALUES (37, 'Delete CdtUserGroupFunction');
INSERT INTO `cdt_function` VALUES (38, 'View CdtUserGroupFunction');
INSERT INTO `cdt_function` VALUES (39, 'Update CdtUserGroupFunction');
INSERT INTO `cdt_function` VALUES (40, 'List CdtUserGroupFunction');
INSERT INTO `cdt_function` VALUES (41, 'Edit User Profile');
INSERT INTO `cdt_function` VALUES (44, 'Listar matriculados');
INSERT INTO `cdt_function` VALUES (45, 'Agregar matriculado');
INSERT INTO `cdt_function` VALUES (46, 'Modificar matriculado');
INSERT INTO `cdt_function` VALUES (47, 'Eliminar matriculado');
INSERT INTO `cdt_function` VALUES (48, 'Ver matriculado');
INSERT INTO `cdt_function` VALUES (49, 'Listar entidades emisoras');
INSERT INTO `cdt_function` VALUES (50, 'Agregar entidad emisora');
INSERT INTO `cdt_function` VALUES (51, 'Modificar entidad emisora');
INSERT INTO `cdt_function` VALUES (52, 'Eliminar entidad emisora');
INSERT INTO `cdt_function` VALUES (53, 'Ver entidad emisora');
INSERT INTO `cdt_function` VALUES (54, 'Listar estados de matriculado');
INSERT INTO `cdt_function` VALUES (55, 'Agregar estado de matriculado');
INSERT INTO `cdt_function` VALUES (56, 'Modificar estado de matriculado');
INSERT INTO `cdt_function` VALUES (57, 'Eliminar estado de matriculado');
INSERT INTO `cdt_function` VALUES (58, 'Ver estado de matriculado');
INSERT INTO `cdt_function` VALUES (59, 'Listar localidades');
INSERT INTO `cdt_function` VALUES (60, 'Agregar localidad');
INSERT INTO `cdt_function` VALUES (61, 'Modificar localidad');
INSERT INTO `cdt_function` VALUES (62, 'Eliminar localidad');
INSERT INTO `cdt_function` VALUES (63, 'Ver localidad');
INSERT INTO `cdt_function` VALUES (64, 'Listar paÃ­ses');
INSERT INTO `cdt_function` VALUES (65, 'Agregar paÃ­s');
INSERT INTO `cdt_function` VALUES (66, 'Modificar paÃ­s');
INSERT INTO `cdt_function` VALUES (67, 'Eliminar paÃ­s');
INSERT INTO `cdt_function` VALUES (68, 'Ver paÃ­s');
INSERT INTO `cdt_function` VALUES (69, 'Listar provincias');
INSERT INTO `cdt_function` VALUES (70, 'Agregar provincia');
INSERT INTO `cdt_function` VALUES (71, 'Modificar provincia');
INSERT INTO `cdt_function` VALUES (72, 'Eliminar provincia');
INSERT INTO `cdt_function` VALUES (73, 'Ver provincia');
INSERT INTO `cdt_function` VALUES (74, 'Listar tipos de documento');
INSERT INTO `cdt_function` VALUES (75, 'Agregar tipo de documento');
INSERT INTO `cdt_function` VALUES (76, 'Modificar tipo de documento');
INSERT INTO `cdt_function` VALUES (77, 'Eliminar tipo de documento');
INSERT INTO `cdt_function` VALUES (78, 'Ver tipo de documento');
INSERT INTO `cdt_function` VALUES (79, 'Listar tipos de tÃ­tulo');
INSERT INTO `cdt_function` VALUES (80, 'Agregar tipo de tÃ­tulo');
INSERT INTO `cdt_function` VALUES (81, 'Modificar tipo de tÃ­tulo');
INSERT INTO `cdt_function` VALUES (82, 'Eliminar tipo de tÃ­tulo');
INSERT INTO `cdt_function` VALUES (83, 'Ver tipo de tÃ­tulo');
INSERT INTO `cdt_function` VALUES (84, 'Listar clases de tÃ­tulo');
INSERT INTO `cdt_function` VALUES (85, 'Agregar clase de tÃ­tulo');
INSERT INTO `cdt_function` VALUES (86, 'Modificar clase de tÃ­tulo');
INSERT INTO `cdt_function` VALUES (87, 'Eliminar clase de tÃ­tulo');
INSERT INTO `cdt_function` VALUES (88, 'Ver clase de tÃ­tulo');
INSERT INTO `cdt_function` VALUES (89, 'Listar secuencias de tÃ­tulo');
INSERT INTO `cdt_function` VALUES (90, 'Agregar secuencia de tÃ­tulo');
INSERT INTO `cdt_function` VALUES (91, 'Modificar secuencia de tÃ­tulo');
INSERT INTO `cdt_function` VALUES (92, 'Eliminar secuencia de tÃ­tulo');
INSERT INTO `cdt_function` VALUES (93, 'Ver secuencia de tÃ­tulo');
INSERT INTO `cdt_function` VALUES (94, 'Listar tÃ­tulos');
INSERT INTO `cdt_function` VALUES (95, 'Agregar tÃ­tulo');
INSERT INTO `cdt_function` VALUES (96, 'Modificar tÃ­tulo');
INSERT INTO `cdt_function` VALUES (97, 'Eliminar tÃ­tulo');
INSERT INTO `cdt_function` VALUES (98, 'Ver tÃ­tulo');
INSERT INTO `cdt_function` VALUES (99, 'Listar cuotas');
INSERT INTO `cdt_function` VALUES (100, 'Agregar cuota');
INSERT INTO `cdt_function` VALUES (101, 'Modificar cuota');
INSERT INTO `cdt_function` VALUES (102, 'Eliminar cuota');
INSERT INTO `cdt_function` VALUES (103, 'Ver cuota');
INSERT INTO `cdt_function` VALUES (104, 'GneraciÃ³n masiva de cuotas');
INSERT INTO `cdt_function` VALUES (105, 'Listar registros');
INSERT INTO `cdt_function` VALUES (106, 'Agregar registro');
INSERT INTO `cdt_function` VALUES (107, 'Modificar registro');
INSERT INTO `cdt_function` VALUES (108, 'Eliminar registro');
INSERT INTO `cdt_function` VALUES (109, 'Ver registro');
INSERT INTO `cdt_function` VALUES (110, 'Listar cuotas de registro');
INSERT INTO `cdt_function` VALUES (111, 'Agregar cuota a registro');
INSERT INTO `cdt_function` VALUES (112, 'Modificar cuota a registro');
INSERT INTO `cdt_function` VALUES (113, 'Eliminar cuota a registro');
INSERT INTO `cdt_function` VALUES (114, 'Ver cuota a registro');
INSERT INTO `cdt_function` VALUES (115, 'Listar conceptos');
INSERT INTO `cdt_function` VALUES (116, 'Agregar concepto');
INSERT INTO `cdt_function` VALUES (117, 'Modificar concepto');
INSERT INTO `cdt_function` VALUES (118, 'Eliminar concepto');
INSERT INTO `cdt_function` VALUES (119, 'Ver concepto');
INSERT INTO `cdt_function` VALUES (120, 'Listar cuotas generadas');
INSERT INTO `cdt_function` VALUES (121, 'Pagar cuota generada');
INSERT INTO `cdt_function` VALUES (122, 'Listar registros del matriculado');
INSERT INTO `cdt_function` VALUES (123, 'Agregar registro del matriculado');
INSERT INTO `cdt_function` VALUES (124, 'Modificar registro del matriculado');
INSERT INTO `cdt_function` VALUES (125, 'Eliminar registro del matriculado');
INSERT INTO `cdt_function` VALUES (126, 'Ver registro del matriculado');
INSERT INTO `cdt_function` VALUES (127, 'Listar incumbencias');
INSERT INTO `cdt_function` VALUES (128, 'Agregar incumbencia');
INSERT INTO `cdt_function` VALUES (129, 'Modificar incumbencia');
INSERT INTO `cdt_function` VALUES (130, 'Eliminar incumbencia');
INSERT INTO `cdt_function` VALUES (131, 'Ver incumbencia');
INSERT INTO `cdt_function` VALUES (132, 'Listar tipos de tÃ­tulos en incumbencias');
INSERT INTO `cdt_function` VALUES (133, 'Agregar tipo de tÃ­tulo de la incumbencia');
INSERT INTO `cdt_function` VALUES (134, 'Modificar tipo de tÃ­tulo de la incumbencia');
INSERT INTO `cdt_function` VALUES (135, 'Eliminar tipo de tÃ­tulo de la incumbencia');
INSERT INTO `cdt_function` VALUES (136, 'Ver tipo de tÃ­tulo de la incumbencia');
INSERT INTO `cdt_function` VALUES (137, 'Listar tipos de encomienda');
INSERT INTO `cdt_function` VALUES (138, 'Agregar tipo de encomienda');
INSERT INTO `cdt_function` VALUES (139, 'Modificar tipo de encomienda');
INSERT INTO `cdt_function` VALUES (140, 'Eliminar tipo de encomienda');
INSERT INTO `cdt_function` VALUES (141, 'Ver tipo de encomienda');
INSERT INTO `cdt_function` VALUES (142, 'Listar incumbencias de tipo de encomienda');
INSERT INTO `cdt_function` VALUES (143, 'Agregar incumbencia de tipo deencomienda');
INSERT INTO `cdt_function` VALUES (144, 'Modificar incumbencia de tipo deencomienda');
INSERT INTO `cdt_function` VALUES (145, 'Eliminar incumbencia de tipo deencomienda');
INSERT INTO `cdt_function` VALUES (146, 'Ver incumbencia de tipo deencomienda');
INSERT INTO `cdt_function` VALUES (147, 'Listar tipos de estados de encomienda');
INSERT INTO `cdt_function` VALUES (148, 'Agregar tipo de estado de encomienda');
INSERT INTO `cdt_function` VALUES (149, 'Modificar tipo de estado de encomienda');
INSERT INTO `cdt_function` VALUES (150, 'Eliminar tipo de estado de encomienda');
INSERT INTO `cdt_function` VALUES (151, 'Ver tipo de estado de encomienda');
INSERT INTO `cdt_function` VALUES (152, 'Listar encomiendas');
INSERT INTO `cdt_function` VALUES (153, 'Agregar encomienda');
INSERT INTO `cdt_function` VALUES (154, 'Modificar encomienda');
INSERT INTO `cdt_function` VALUES (155, 'Eliminar encomienda');
INSERT INTO `cdt_function` VALUES (156, 'Ver encomienda');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cdt_menugroup`
-- 

CREATE TABLE `cdt_menugroup` (
  `cd_menugroup` int(11) NOT NULL auto_increment,
  `nu_order` int(11) NOT NULL,
  `nu_width` int(11) NOT NULL,
  `ds_name` varchar(100) character set latin1 NOT NULL,
  `ds_action` varchar(50) character set latin1 default NULL,
  `ds_cssclass` varchar(50) character set latin1 default NULL,
  PRIMARY KEY  (`cd_menugroup`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

-- 
-- Volcar la base de datos para la tabla `cdt_menugroup`
-- 

INSERT INTO `cdt_menugroup` VALUES (1, 1, 65, 'Acceso', 'panel_control&currentMenuGroup=1', 'accesos');
INSERT INTO `cdt_menugroup` VALUES (9, 3, 80, 'Matriculados', 'panel_control&currentMenuGroup=9', 'escritorio');
INSERT INTO `cdt_menugroup` VALUES (10, 2, 80, 'AdministraciÃ³n', 'panel_control&currentMenuGroup=10', 'config');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cdt_menuoption`
-- 

CREATE TABLE `cdt_menuoption` (
  `cd_menuoption` int(11) NOT NULL auto_increment,
  `ds_name` varchar(100) character set latin1 NOT NULL,
  `ds_href` varchar(255) character set latin1 NOT NULL,
  `cd_function` int(11) default NULL,
  `nu_order` int(11) default NULL,
  `cd_menugroup` int(11) default NULL,
  `ds_cssclass` varchar(50) character set latin1 default NULL,
  `ds_description` varchar(50) character set latin1 default NULL,
  PRIMARY KEY  (`cd_menuoption`),
  KEY `cd_function` (`cd_function`),
  KEY `fk_menuoption_menugroup1` (`cd_menugroup`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

-- 
-- Volcar la base de datos para la tabla `cdt_menuoption`
-- 

INSERT INTO `cdt_menuoption` VALUES (1, 'CdtActionFunctions', 'doAction?action=list_cdtactionfunctions', 5, 5, 1, 'cdtactionfunctions', 'Acciones de FunciÃ³n');
INSERT INTO `cdt_menuoption` VALUES (2, 'CdtFunctions', 'doAction?action=list_cdtfunctions', 10, 5, 1, 'cdtfunctions', 'Funciones');
INSERT INTO `cdt_menuoption` VALUES (3, 'CdtMenuGroups', 'doAction?action=list_cdtmenugroups', 15, 5, 1, 'cdtmenugroups', 'Grupos de MenÃº');
INSERT INTO `cdt_menuoption` VALUES (4, 'CdtMenuOptions', 'doAction?action=list_cdtmenuoptions', 20, 5, 1, 'cdtmenuoptions', 'Opciones de MenÃº');
INSERT INTO `cdt_menuoption` VALUES (5, 'Registrations', 'doAction?action=list_cdtregistrations', 25, 5, 1, 'cdtregistrations', 'Registraciones');
INSERT INTO `cdt_menuoption` VALUES (6, 'Users', 'doAction?action=list_cdtusers', 30, 5, 1, 'cdtusers', 'Usuarios');
INSERT INTO `cdt_menuoption` VALUES (7, 'Usergroups', 'doAction?action=list_cdtusergroups', 35, 5, 1, 'cdtusergroups', 'Grupos de usuario');
INSERT INTO `cdt_menuoption` VALUES (8, 'CdtUserGroupFunctions', 'doAction?action=list_cdtusergroupfunctions', 40, 5, 1, 'cdtusergroupfunctions', 'Funciones de Grupos de Usuario');
INSERT INTO `cdt_menuoption` VALUES (29, 'Matriculados', 'doAction?action=list_matriculados', 44, 2, 9, 'matriculados', '');
INSERT INTO `cdt_menuoption` VALUES (36, 'Tipos de tÃ­tulo', 'doAction?action=list_tiposTitulo', 79, 5, 9, 'tiposTitulo', '');
INSERT INTO `cdt_menuoption` VALUES (37, 'Localidades', 'doAction?action=list_localidades', 59, 3, 10, 'localidades', '');
INSERT INTO `cdt_menuoption` VALUES (38, 'PaÃ­ses', 'doAction?action=list_paises', 64, 4, 10, 'paises', '');
INSERT INTO `cdt_menuoption` VALUES (39, 'Provincias', 'doAction?action=list_provincias', 69, 5, 10, 'paises', '');
INSERT INTO `cdt_menuoption` VALUES (40, 'Tipos de Documento', 'doAction?action=list_tiposDocumento', 74, 6, 10, 'tiposDocumento', '');
INSERT INTO `cdt_menuoption` VALUES (41, 'Entidades emisoras', 'doAction?action=list_entidadesEmisora', 49, 1, 10, 'entidadesEmisora', '');
INSERT INTO `cdt_menuoption` VALUES (42, 'Estados de matriculado', 'doAction?action=list_estadosMatriculado', 54, 2, 10, 'estadosMatriculado', '');
INSERT INTO `cdt_menuoption` VALUES (43, 'Secuencias de tÃ­tulo', 'doAction?action=list_secuenciasTitulo', 89, 4, 9, 'tiposTitulo', '');
INSERT INTO `cdt_menuoption` VALUES (44, 'TÃ­tulos', 'doAction?action=list_titulos', 93, 6, 9, 'tiposTitulo', '');
INSERT INTO `cdt_menuoption` VALUES (45, 'Cuotas', 'doAction?action=list_cuotas', 99, 1, 9, 'tiposTitulo', '');
INSERT INTO `cdt_menuoption` VALUES (46, 'Registros', 'doAction?action=list_registros', 105, 3, 9, 'tiposTitulo', '');
INSERT INTO `cdt_menuoption` VALUES (47, 'Conceptos', 'doAction?action=list_conceptos', 99, 1, 10, 'tiposTitulo', '');
INSERT INTO `cdt_menuoption` VALUES (48, 'Incumbencias', 'doAction?action=list_incumbencias', 127, 2, 9, 'tiposTitulo', '');
INSERT INTO `cdt_menuoption` VALUES (49, 'Tipos de encomienda', 'doAction?action=list_tiposEncomienda', 127, 2, 9, 'tiposTitulo', '');
INSERT INTO `cdt_menuoption` VALUES (50, 'Tipos de Estados de Encomienda', 'doAction?action=list_tiposEstadoEncomienda', 147, 8, 10, 'tiposDocumento', '');
INSERT INTO `cdt_menuoption` VALUES (51, 'Encomiendas', 'doAction?action=list_encomiendas', 152, 2, 9, 'tiposTitulo', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cdt_my_filter`
-- 

CREATE TABLE `cdt_my_filter` (
  `id` int(11) NOT NULL auto_increment,
  `cd_user` int(11) NOT NULL,
  `filter_name` varchar(255) NOT NULL,
  `filter_values` varchar(255) NOT NULL,
  `filter_id` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `cdt_my_filter`
-- 

INSERT INTO `cdt_my_filter` VALUES (1, 1, 'filter', 'nombre=''Bernar'',sexos=F,M', 'filter');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cdt_registration`
-- 

CREATE TABLE `cdt_registration` (
  `cd_registration` int(11) NOT NULL auto_increment,
  `ds_activationcode` varchar(150) collate utf8_unicode_ci NOT NULL,
  `dt_date` varchar(8) collate utf8_unicode_ci NOT NULL,
  `ds_username` varchar(150) collate utf8_unicode_ci NOT NULL,
  `ds_name` varchar(150) collate utf8_unicode_ci default NULL,
  `ds_email` varchar(150) collate utf8_unicode_ci default NULL,
  `ds_password` varchar(150) collate utf8_unicode_ci NOT NULL,
  `ds_phone` varchar(50) collate utf8_unicode_ci default NULL,
  `ds_address` varchar(255) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`cd_registration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `cdt_registration`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cdt_user`
-- 

CREATE TABLE `cdt_user` (
  `cd_user` int(11) NOT NULL auto_increment,
  `ds_username` varchar(150) collate utf8_unicode_ci NOT NULL,
  `ds_name` varchar(150) collate utf8_unicode_ci default NULL,
  `ds_email` varchar(150) collate utf8_unicode_ci default NULL,
  `ds_password` varchar(150) collate utf8_unicode_ci default NULL,
  `cd_usergroup` int(11) NOT NULL,
  `ds_phone` varchar(50) collate utf8_unicode_ci default NULL,
  `ds_address` varchar(255) collate utf8_unicode_ci default NULL,
  `ds_ips` varchar(25) collate utf8_unicode_ci NOT NULL,
  `nu_attemps` int(11) NOT NULL,
  PRIMARY KEY  (`cd_user`),
  KEY `fk_usergroup` (`cd_usergroup`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `cdt_user`
-- 

INSERT INTO `cdt_user` VALUES (1, 'admin', 'CODNET', 'info@codnet.com.ar', 'aab87325369d132b5ccd67503d65e75c', 1, '', '', '', 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cdt_usergroup`
-- 

CREATE TABLE `cdt_usergroup` (
  `cd_usergroup` int(11) NOT NULL auto_increment,
  `ds_usergroup` varchar(150) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`cd_usergroup`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `cdt_usergroup`
-- 

INSERT INTO `cdt_usergroup` VALUES (1, 'Administrator');
INSERT INTO `cdt_usergroup` VALUES (2, 'Matriculado');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cdt_usergroup_function`
-- 

CREATE TABLE `cdt_usergroup_function` (
  `cd_usergroup_function` int(11) NOT NULL auto_increment,
  `cd_usergroup` int(11) NOT NULL,
  `cd_function` int(11) NOT NULL,
  PRIMARY KEY  (`cd_usergroup_function`),
  KEY `fk_usergroup` (`cd_usergroup`),
  KEY `fk_function` (`cd_function`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2125 ;

-- 
-- Volcar la base de datos para la tabla `cdt_usergroup_function`
-- 

INSERT INTO `cdt_usergroup_function` VALUES (1813, 2, 152);
INSERT INTO `cdt_usergroup_function` VALUES (1814, 2, 153);
INSERT INTO `cdt_usergroup_function` VALUES (1815, 2, 154);
INSERT INTO `cdt_usergroup_function` VALUES (1816, 2, 155);
INSERT INTO `cdt_usergroup_function` VALUES (1817, 2, 156);
INSERT INTO `cdt_usergroup_function` VALUES (1971, 1, 1);
INSERT INTO `cdt_usergroup_function` VALUES (1972, 1, 2);
INSERT INTO `cdt_usergroup_function` VALUES (1973, 1, 3);
INSERT INTO `cdt_usergroup_function` VALUES (1974, 1, 4);
INSERT INTO `cdt_usergroup_function` VALUES (1975, 1, 5);
INSERT INTO `cdt_usergroup_function` VALUES (1976, 1, 6);
INSERT INTO `cdt_usergroup_function` VALUES (1977, 1, 7);
INSERT INTO `cdt_usergroup_function` VALUES (1978, 1, 8);
INSERT INTO `cdt_usergroup_function` VALUES (1979, 1, 9);
INSERT INTO `cdt_usergroup_function` VALUES (1980, 1, 10);
INSERT INTO `cdt_usergroup_function` VALUES (1981, 1, 11);
INSERT INTO `cdt_usergroup_function` VALUES (1982, 1, 12);
INSERT INTO `cdt_usergroup_function` VALUES (1983, 1, 13);
INSERT INTO `cdt_usergroup_function` VALUES (1984, 1, 14);
INSERT INTO `cdt_usergroup_function` VALUES (1985, 1, 15);
INSERT INTO `cdt_usergroup_function` VALUES (1986, 1, 16);
INSERT INTO `cdt_usergroup_function` VALUES (1987, 1, 17);
INSERT INTO `cdt_usergroup_function` VALUES (1988, 1, 18);
INSERT INTO `cdt_usergroup_function` VALUES (1989, 1, 19);
INSERT INTO `cdt_usergroup_function` VALUES (1990, 1, 20);
INSERT INTO `cdt_usergroup_function` VALUES (1991, 1, 21);
INSERT INTO `cdt_usergroup_function` VALUES (1992, 1, 22);
INSERT INTO `cdt_usergroup_function` VALUES (1993, 1, 23);
INSERT INTO `cdt_usergroup_function` VALUES (1994, 1, 24);
INSERT INTO `cdt_usergroup_function` VALUES (1995, 1, 25);
INSERT INTO `cdt_usergroup_function` VALUES (1996, 1, 26);
INSERT INTO `cdt_usergroup_function` VALUES (1997, 1, 27);
INSERT INTO `cdt_usergroup_function` VALUES (1998, 1, 28);
INSERT INTO `cdt_usergroup_function` VALUES (1999, 1, 29);
INSERT INTO `cdt_usergroup_function` VALUES (2000, 1, 30);
INSERT INTO `cdt_usergroup_function` VALUES (2001, 1, 31);
INSERT INTO `cdt_usergroup_function` VALUES (2002, 1, 32);
INSERT INTO `cdt_usergroup_function` VALUES (2003, 1, 33);
INSERT INTO `cdt_usergroup_function` VALUES (2004, 1, 34);
INSERT INTO `cdt_usergroup_function` VALUES (2005, 1, 35);
INSERT INTO `cdt_usergroup_function` VALUES (2006, 1, 36);
INSERT INTO `cdt_usergroup_function` VALUES (2007, 1, 37);
INSERT INTO `cdt_usergroup_function` VALUES (2008, 1, 38);
INSERT INTO `cdt_usergroup_function` VALUES (2009, 1, 39);
INSERT INTO `cdt_usergroup_function` VALUES (2010, 1, 40);
INSERT INTO `cdt_usergroup_function` VALUES (2011, 1, 41);
INSERT INTO `cdt_usergroup_function` VALUES (2012, 1, 44);
INSERT INTO `cdt_usergroup_function` VALUES (2013, 1, 45);
INSERT INTO `cdt_usergroup_function` VALUES (2014, 1, 46);
INSERT INTO `cdt_usergroup_function` VALUES (2015, 1, 47);
INSERT INTO `cdt_usergroup_function` VALUES (2016, 1, 48);
INSERT INTO `cdt_usergroup_function` VALUES (2017, 1, 49);
INSERT INTO `cdt_usergroup_function` VALUES (2018, 1, 50);
INSERT INTO `cdt_usergroup_function` VALUES (2019, 1, 51);
INSERT INTO `cdt_usergroup_function` VALUES (2020, 1, 52);
INSERT INTO `cdt_usergroup_function` VALUES (2021, 1, 53);
INSERT INTO `cdt_usergroup_function` VALUES (2022, 1, 54);
INSERT INTO `cdt_usergroup_function` VALUES (2023, 1, 55);
INSERT INTO `cdt_usergroup_function` VALUES (2024, 1, 56);
INSERT INTO `cdt_usergroup_function` VALUES (2025, 1, 57);
INSERT INTO `cdt_usergroup_function` VALUES (2026, 1, 58);
INSERT INTO `cdt_usergroup_function` VALUES (2027, 1, 59);
INSERT INTO `cdt_usergroup_function` VALUES (2028, 1, 60);
INSERT INTO `cdt_usergroup_function` VALUES (2029, 1, 61);
INSERT INTO `cdt_usergroup_function` VALUES (2030, 1, 62);
INSERT INTO `cdt_usergroup_function` VALUES (2031, 1, 63);
INSERT INTO `cdt_usergroup_function` VALUES (2032, 1, 64);
INSERT INTO `cdt_usergroup_function` VALUES (2033, 1, 65);
INSERT INTO `cdt_usergroup_function` VALUES (2034, 1, 66);
INSERT INTO `cdt_usergroup_function` VALUES (2035, 1, 67);
INSERT INTO `cdt_usergroup_function` VALUES (2036, 1, 68);
INSERT INTO `cdt_usergroup_function` VALUES (2037, 1, 69);
INSERT INTO `cdt_usergroup_function` VALUES (2038, 1, 70);
INSERT INTO `cdt_usergroup_function` VALUES (2039, 1, 71);
INSERT INTO `cdt_usergroup_function` VALUES (2040, 1, 72);
INSERT INTO `cdt_usergroup_function` VALUES (2041, 1, 73);
INSERT INTO `cdt_usergroup_function` VALUES (2042, 1, 74);
INSERT INTO `cdt_usergroup_function` VALUES (2043, 1, 75);
INSERT INTO `cdt_usergroup_function` VALUES (2044, 1, 76);
INSERT INTO `cdt_usergroup_function` VALUES (2045, 1, 77);
INSERT INTO `cdt_usergroup_function` VALUES (2046, 1, 78);
INSERT INTO `cdt_usergroup_function` VALUES (2047, 1, 79);
INSERT INTO `cdt_usergroup_function` VALUES (2048, 1, 80);
INSERT INTO `cdt_usergroup_function` VALUES (2049, 1, 81);
INSERT INTO `cdt_usergroup_function` VALUES (2050, 1, 82);
INSERT INTO `cdt_usergroup_function` VALUES (2051, 1, 83);
INSERT INTO `cdt_usergroup_function` VALUES (2052, 1, 84);
INSERT INTO `cdt_usergroup_function` VALUES (2053, 1, 85);
INSERT INTO `cdt_usergroup_function` VALUES (2054, 1, 86);
INSERT INTO `cdt_usergroup_function` VALUES (2055, 1, 87);
INSERT INTO `cdt_usergroup_function` VALUES (2056, 1, 88);
INSERT INTO `cdt_usergroup_function` VALUES (2057, 1, 89);
INSERT INTO `cdt_usergroup_function` VALUES (2058, 1, 90);
INSERT INTO `cdt_usergroup_function` VALUES (2059, 1, 91);
INSERT INTO `cdt_usergroup_function` VALUES (2060, 1, 92);
INSERT INTO `cdt_usergroup_function` VALUES (2061, 1, 93);
INSERT INTO `cdt_usergroup_function` VALUES (2062, 1, 94);
INSERT INTO `cdt_usergroup_function` VALUES (2063, 1, 95);
INSERT INTO `cdt_usergroup_function` VALUES (2064, 1, 96);
INSERT INTO `cdt_usergroup_function` VALUES (2065, 1, 97);
INSERT INTO `cdt_usergroup_function` VALUES (2066, 1, 98);
INSERT INTO `cdt_usergroup_function` VALUES (2067, 1, 99);
INSERT INTO `cdt_usergroup_function` VALUES (2068, 1, 100);
INSERT INTO `cdt_usergroup_function` VALUES (2069, 1, 101);
INSERT INTO `cdt_usergroup_function` VALUES (2070, 1, 102);
INSERT INTO `cdt_usergroup_function` VALUES (2071, 1, 103);
INSERT INTO `cdt_usergroup_function` VALUES (2072, 1, 104);
INSERT INTO `cdt_usergroup_function` VALUES (2073, 1, 105);
INSERT INTO `cdt_usergroup_function` VALUES (2074, 1, 106);
INSERT INTO `cdt_usergroup_function` VALUES (2075, 1, 107);
INSERT INTO `cdt_usergroup_function` VALUES (2076, 1, 108);
INSERT INTO `cdt_usergroup_function` VALUES (2077, 1, 109);
INSERT INTO `cdt_usergroup_function` VALUES (2078, 1, 110);
INSERT INTO `cdt_usergroup_function` VALUES (2079, 1, 111);
INSERT INTO `cdt_usergroup_function` VALUES (2080, 1, 112);
INSERT INTO `cdt_usergroup_function` VALUES (2081, 1, 113);
INSERT INTO `cdt_usergroup_function` VALUES (2082, 1, 114);
INSERT INTO `cdt_usergroup_function` VALUES (2083, 1, 115);
INSERT INTO `cdt_usergroup_function` VALUES (2084, 1, 116);
INSERT INTO `cdt_usergroup_function` VALUES (2085, 1, 117);
INSERT INTO `cdt_usergroup_function` VALUES (2086, 1, 118);
INSERT INTO `cdt_usergroup_function` VALUES (2087, 1, 119);
INSERT INTO `cdt_usergroup_function` VALUES (2088, 1, 120);
INSERT INTO `cdt_usergroup_function` VALUES (2089, 1, 121);
INSERT INTO `cdt_usergroup_function` VALUES (2090, 1, 122);
INSERT INTO `cdt_usergroup_function` VALUES (2091, 1, 123);
INSERT INTO `cdt_usergroup_function` VALUES (2092, 1, 124);
INSERT INTO `cdt_usergroup_function` VALUES (2093, 1, 125);
INSERT INTO `cdt_usergroup_function` VALUES (2094, 1, 126);
INSERT INTO `cdt_usergroup_function` VALUES (2095, 1, 127);
INSERT INTO `cdt_usergroup_function` VALUES (2096, 1, 128);
INSERT INTO `cdt_usergroup_function` VALUES (2097, 1, 129);
INSERT INTO `cdt_usergroup_function` VALUES (2098, 1, 130);
INSERT INTO `cdt_usergroup_function` VALUES (2099, 1, 131);
INSERT INTO `cdt_usergroup_function` VALUES (2100, 1, 132);
INSERT INTO `cdt_usergroup_function` VALUES (2101, 1, 133);
INSERT INTO `cdt_usergroup_function` VALUES (2102, 1, 134);
INSERT INTO `cdt_usergroup_function` VALUES (2103, 1, 135);
INSERT INTO `cdt_usergroup_function` VALUES (2104, 1, 136);
INSERT INTO `cdt_usergroup_function` VALUES (2105, 1, 137);
INSERT INTO `cdt_usergroup_function` VALUES (2106, 1, 138);
INSERT INTO `cdt_usergroup_function` VALUES (2107, 1, 139);
INSERT INTO `cdt_usergroup_function` VALUES (2108, 1, 140);
INSERT INTO `cdt_usergroup_function` VALUES (2109, 1, 141);
INSERT INTO `cdt_usergroup_function` VALUES (2110, 1, 142);
INSERT INTO `cdt_usergroup_function` VALUES (2111, 1, 143);
INSERT INTO `cdt_usergroup_function` VALUES (2112, 1, 144);
INSERT INTO `cdt_usergroup_function` VALUES (2113, 1, 145);
INSERT INTO `cdt_usergroup_function` VALUES (2114, 1, 146);
INSERT INTO `cdt_usergroup_function` VALUES (2115, 1, 147);
INSERT INTO `cdt_usergroup_function` VALUES (2116, 1, 148);
INSERT INTO `cdt_usergroup_function` VALUES (2117, 1, 149);
INSERT INTO `cdt_usergroup_function` VALUES (2118, 1, 150);
INSERT INTO `cdt_usergroup_function` VALUES (2119, 1, 151);
INSERT INTO `cdt_usergroup_function` VALUES (2120, 1, 152);
INSERT INTO `cdt_usergroup_function` VALUES (2121, 1, 153);
INSERT INTO `cdt_usergroup_function` VALUES (2122, 1, 154);
INSERT INTO `cdt_usergroup_function` VALUES (2123, 1, 155);
INSERT INTO `cdt_usergroup_function` VALUES (2124, 1, 156);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_anulacion`
-- 

CREATE TABLE `cpiq_anulacion` (
  `oid` bigint(20) NOT NULL auto_increment,
  `fecha` datetime default NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_anulacion`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_clase_titulo`
-- 

CREATE TABLE `cpiq_clase_titulo` (
  `oid` bigint(20) NOT NULL auto_increment,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY  (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_clase_titulo`
-- 

INSERT INTO `cpiq_clase_titulo` VALUES (1, 'Grado');
INSERT INTO `cpiq_clase_titulo` VALUES (2, 'Posgrado');
INSERT INTO `cpiq_clase_titulo` VALUES (3, 'Especialidad');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_concepto`
-- 

CREATE TABLE `cpiq_concepto` (
  `oid` bigint(20) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `coeficiente` int(2) NOT NULL COMMENT '1=Ingreso, -1=egreso',
  `tipoAsignado_oid` int(11) NOT NULL COMMENT '1=todos,2=cpiq,3=matriculado',
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `user_oid` (`user_oid`),
  KEY `asignado_oid` (`tipoAsignado_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_concepto`
-- 

INSERT INTO `cpiq_concepto` VALUES (1, 'Pago Cuota MatrÃ­cula', -1, 3, 1, '2013-07-29 13:44:55');
INSERT INTO `cpiq_concepto` VALUES (2, 'Cobro Cuota MatrÃ­cula', 1, 2, 1, '2013-08-01 10:52:45');
INSERT INTO `cpiq_concepto` VALUES (3, 'Registro Matriculado', -1, 3, 1, '2013-09-19 14:14:18');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_cuota`
-- 

CREATE TABLE `cpiq_cuota` (
  `oid` bigint(20) NOT NULL auto_increment,
  `nombre` varchar(200) NOT NULL,
  `year` int(11) NOT NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_cuota`
-- 

INSERT INTO `cpiq_cuota` VALUES (8, 'Primer cuota', 2013, 1, '2013-08-08 13:24:34');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_cuota_generada`
-- 

CREATE TABLE `cpiq_cuota_generada` (
  `oid` bigint(20) NOT NULL auto_increment,
  `nombre` varchar(200) NOT NULL,
  `cuota_oid` bigint(20) default NULL,
  `matriculado_oid` bigint(20) default NULL,
  `movCtaCte_oid` bigint(20) default NULL,
  `fechaCarga` date default NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `matriculado_oid` (`matriculado_oid`),
  KEY `cuota_oid` (`cuota_oid`),
  KEY `movCtaCte_oid` (`movCtaCte_oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_cuota_generada`
-- 

INSERT INTO `cpiq_cuota_generada` VALUES (3, 'Primer cuota Proceso masivo', 8, 2, 3, '2013-07-03', 1, '2013-07-03 17:01:30');
INSERT INTO `cpiq_cuota_generada` VALUES (6, 'Cuota MatrÃ­cula  2013', 8, 7, NULL, '2013-08-02', 1, '2013-08-02 16:19:59');
INSERT INTO `cpiq_cuota_generada` VALUES (7, 'Cuota MatrÃ­cula  2013', 8, 15, 6, '2013-08-02', 1, '2013-08-02 19:54:19');
INSERT INTO `cpiq_cuota_generada` VALUES (8, 'Cuota MatrÃ­cula  2013', 8, 16, 7, '2013-08-08', 1, '2013-08-08 13:58:13');
INSERT INTO `cpiq_cuota_generada` VALUES (9, 'Cuota MatrÃ­cula  2013', 8, 17, NULL, '2013-08-27', 1, '2013-08-27 13:28:35');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_cuota_valor`
-- 

CREATE TABLE `cpiq_cuota_valor` (
  `oid` bigint(20) NOT NULL auto_increment,
  `cuota_oid` bigint(20) default NULL,
  `fechaDesde` date default NULL,
  `fechaHasta` date default NULL,
  `importe` float default NULL,
  PRIMARY KEY  (`oid`),
  KEY `cuota_oid` (`cuota_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_cuota_valor`
-- 

INSERT INTO `cpiq_cuota_valor` VALUES (7, 8, '2013-01-01', '2013-04-30', 250);
INSERT INTO `cpiq_cuota_valor` VALUES (8, 8, '2013-05-01', '2013-08-31', 300);
INSERT INTO `cpiq_cuota_valor` VALUES (9, 8, '2013-09-01', '2013-12-31', 350);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_encomienda`
-- 

CREATE TABLE `cpiq_encomienda` (
  `oid` bigint(20) NOT NULL auto_increment,
  `matriculado_oid` bigint(20) default NULL,
  `numero` varchar(255) default NULL,
  `tipoEncomienda_oid` bigint(20) default NULL,
  `fecha` datetime default NULL,
  `comitente` varchar(255) default NULL,
  `tipoComitente` int(2) default NULL COMMENT '1=persona fisica, 2=persona juridica u organismo',
  `representante` varchar(255) default NULL,
  `documento` varchar(20) default NULL,
  `cuil` int(2) default NULL,
  `domicilio` varchar(255) default NULL,
  `localidad_oid` int(11) default NULL,
  `cp` varchar(20) default NULL,
  `telefono` varchar(50) default NULL,
  `seguridad` int(11) NOT NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `primero` text,
  `segundo` text,
  `tercero` text,
  `cuarto` text,
  `quinto` text,
  `posFirmaComitente` text,
  `seguridadTexto` text,
  `piePagina` text,
  `tipoDocumento_oid` int(11) default NULL,
  PRIMARY KEY  (`oid`),
  KEY `matriculado_oid` (`matriculado_oid`),
  KEY `tipoEncomienda_oid` (`tipoEncomienda_oid`),
  KEY `localidad_oid` (`localidad_oid`),
  KEY `user_oid` (`user_oid`),
  KEY `tipoDocumento_oid` (`tipoDocumento_oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_encomienda`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_encomienda_especialidad`
-- 

CREATE TABLE `cpiq_encomienda_especialidad` (
  `oid` bigint(20) NOT NULL auto_increment,
  `encomienda_oid` bigint(20) default NULL,
  `titulo_oid` int(20) default NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `encomienda_oid` (`encomienda_oid`),
  KEY `titulo_oid` (`titulo_oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_encomienda_especialidad`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_encomienda_estado`
-- 

CREATE TABLE `cpiq_encomienda_estado` (
  `oid` bigint(20) NOT NULL auto_increment,
  `encomienda_oid` bigint(20) default NULL,
  `tipoEstadoEncomienda_oid` int(20) default NULL,
  `fechaDesde` datetime default NULL,
  `fechaHasta` datetime default NULL,
  `motivo` varchar(200) NOT NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `encomienda_oid` (`encomienda_oid`),
  KEY `tipoEstadoEncomienda_oid` (`tipoEstadoEncomienda_oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_encomienda_estado`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_encomienda_observacion`
-- 

CREATE TABLE `cpiq_encomienda_observacion` (
  `oid` bigint(20) NOT NULL auto_increment,
  `encomienda_oid` bigint(20) default NULL,
  `observacion` text,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `encomienda_oid` (`encomienda_oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_encomienda_observacion`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_encomienda_profesional`
-- 

CREATE TABLE `cpiq_encomienda_profesional` (
  `oid` bigint(20) NOT NULL auto_increment,
  `encomienda_oid` bigint(20) default NULL,
  `consejo` varchar(255) default NULL,
  `profesional` varchar(255) default NULL,
  `matricula` varchar(255) default NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `encomienda_oid` (`encomienda_oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_encomienda_profesional`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_encomienda_registro`
-- 

CREATE TABLE `cpiq_encomienda_registro` (
  `oid` bigint(20) NOT NULL auto_increment,
  `encomienda_oid` bigint(20) default NULL,
  `registroMatriculado_oid` int(20) default NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `encomienda_oid` (`encomienda_oid`),
  KEY `registroMatriculado_oid` (`registroMatriculado_oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_encomienda_registro`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_entidad_emisora`
-- 

CREATE TABLE `cpiq_entidad_emisora` (
  `oid` bigint(20) NOT NULL auto_increment,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY  (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_entidad_emisora`
-- 

INSERT INTO `cpiq_entidad_emisora` VALUES (1, 'U.N.L.P.');
INSERT INTO `cpiq_entidad_emisora` VALUES (2, 'U.B.A.');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_estado_matriculado`
-- 

CREATE TABLE `cpiq_estado_matriculado` (
  `oid` bigint(20) NOT NULL auto_increment,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY  (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_estado_matriculado`
-- 

INSERT INTO `cpiq_estado_matriculado` VALUES (1, 'Activo');
INSERT INTO `cpiq_estado_matriculado` VALUES (2, 'Suspendido');
INSERT INTO `cpiq_estado_matriculado` VALUES (3, 'Baja');
INSERT INTO `cpiq_estado_matriculado` VALUES (4, 'Vitalicio');
INSERT INTO `cpiq_estado_matriculado` VALUES (5, 'Anulado');
INSERT INTO `cpiq_estado_matriculado` VALUES (6, 'Fallecido');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_historico_estado`
-- 

CREATE TABLE `cpiq_historico_estado` (
  `oid` bigint(20) NOT NULL auto_increment,
  `matriculado_oid` bigint(20) default NULL,
  `estadoMatriculado_oid` bigint(20) default NULL,
  `fechaDesde` datetime default NULL,
  `fechaHasta` datetime default NULL,
  `motivo` varchar(200) NOT NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `matriculado_oid` (`matriculado_oid`),
  KEY `estadoMatriculado_oid` (`estadoMatriculado_oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_historico_estado`
-- 

INSERT INTO `cpiq_historico_estado` VALUES (1, 2, 1, '2013-06-14 18:01:27', NULL, 'Alta de matriculado', 1, '2013-06-14 18:01:27');
INSERT INTO `cpiq_historico_estado` VALUES (6, 7, 1, '2013-07-24 13:51:42', NULL, 'Alta de matriculado', 1, '2013-07-24 13:51:42');
INSERT INTO `cpiq_historico_estado` VALUES (14, 15, 1, '2013-08-02 19:54:50', NULL, 'Pago de matrÃ­cula', 1, '2013-08-02 19:54:50');
INSERT INTO `cpiq_historico_estado` VALUES (15, 16, 1, '2013-08-08 14:00:36', NULL, 'Pago de matrÃ­cula', 1, '2013-08-08 14:00:36');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_incumbencia`
-- 

CREATE TABLE `cpiq_incumbencia` (
  `oid` bigint(20) NOT NULL auto_increment,
  `nombre` varchar(150) default NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_incumbencia`
-- 

INSERT INTO `cpiq_incumbencia` VALUES (1, 'Ingenieros QuÃ­micos', 1, '2013-09-27 13:26:59');
INSERT INTO `cpiq_incumbencia` VALUES (2, 'Encomienda 1', 1, '2013-09-27 14:27:02');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_incumbencia_tipo_encomienda`
-- 

CREATE TABLE `cpiq_incumbencia_tipo_encomienda` (
  `oid` bigint(20) NOT NULL auto_increment,
  `incumbencia_oid` bigint(20) default NULL,
  `tipoEncomienda_oid` bigint(20) default NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  UNIQUE KEY `incumbencia_oid_2` (`incumbencia_oid`,`tipoEncomienda_oid`),
  KEY `incumbencia_oid` (`incumbencia_oid`),
  KEY `tipoEncomienda_oid` (`tipoEncomienda_oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_incumbencia_tipo_encomienda`
-- 

INSERT INTO `cpiq_incumbencia_tipo_encomienda` VALUES (1, 1, 2, 1, '2013-09-27 17:14:35');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_incumbencia_tipo_titulo`
-- 

CREATE TABLE `cpiq_incumbencia_tipo_titulo` (
  `oid` bigint(20) NOT NULL auto_increment,
  `incumbencia_oid` bigint(20) default NULL,
  `tipoTitulo_oid` bigint(20) default NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  UNIQUE KEY `incumbencia_oid_2` (`incumbencia_oid`,`tipoTitulo_oid`),
  KEY `incumbencia_oid` (`incumbencia_oid`),
  KEY `tipoTitulo_oid` (`tipoTitulo_oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_incumbencia_tipo_titulo`
-- 

INSERT INTO `cpiq_incumbencia_tipo_titulo` VALUES (1, 1, 3, 1, '2013-09-27 13:36:26');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_localidad`
-- 

CREATE TABLE `cpiq_localidad` (
  `oid` int(11) NOT NULL auto_increment,
  `nombre` varchar(50) NOT NULL,
  `provincia_oid` int(11) default NULL,
  PRIMARY KEY  (`oid`),
  KEY `localidad_oid` (`provincia_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_localidad`
-- 

INSERT INTO `cpiq_localidad` VALUES (1, 'Azul', 6);
INSERT INTO `cpiq_localidad` VALUES (2, 'Tandil', 6);
INSERT INTO `cpiq_localidad` VALUES (3, 'Lamadrid', 6);
INSERT INTO `cpiq_localidad` VALUES (4, 'hinojo', 6);
INSERT INTO `cpiq_localidad` VALUES (5, 'OlavarrÃ­a', 6);
INSERT INTO `cpiq_localidad` VALUES (6, 'Pergamino', 6);
INSERT INTO `cpiq_localidad` VALUES (7, 'Mataderos', 6);
INSERT INTO `cpiq_localidad` VALUES (8, 'Benito Juarez', 6);
INSERT INTO `cpiq_localidad` VALUES (10, 'TapalquÃ©', 6);
INSERT INTO `cpiq_localidad` VALUES (11, 'Necochea', 6);
INSERT INTO `cpiq_localidad` VALUES (13, 'La Plata', 6);
INSERT INTO `cpiq_localidad` VALUES (14, 'Mar del plata', 6);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_matriculado`
-- 

CREATE TABLE `cpiq_matriculado` (
  `oid` bigint(20) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) default NULL,
  `email` varchar(100) default NULL,
  `nroDocumento` varchar(10) default NULL,
  `tipoDocumento_oid` int(11) default NULL,
  `localidad_oid` int(11) default NULL,
  `fechaNacimiento` date default NULL,
  `sexo` int(1) default NULL,
  `domicilio` varchar(255) default NULL,
  `teParticular` varchar(30) default NULL,
  `teLaboral` varchar(30) default NULL,
  `teMovil` varchar(30) default NULL,
  `fechaCarga` timestamp NULL default CURRENT_TIMESTAMP,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default '0000-00-00 00:00:00',
  `codigoPostal` varchar(30) default NULL,
  `cd_user` int(11) default NULL,
  PRIMARY KEY  (`oid`),
  UNIQUE KEY `doc_unique` (`nroDocumento`,`tipoDocumento_oid`),
  KEY `localidad_oid` (`localidad_oid`),
  KEY `tipoDocumento_oid` (`tipoDocumento_oid`),
  KEY `user_oid` (`user_oid`),
  KEY `cpiq_matriculado_ibfk_4` (`cd_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_matriculado`
-- 

INSERT INTO `cpiq_matriculado` VALUES (2, 'Marcos', 'PiÃ±ero', 'marcosp@codnet.com.ar', '25174805', 1, 13, '1976-01-13', 1, '8 nro. 1479', '423-6350', '423-6816', '570-1741', '2013-06-14 14:55:22', 1, '2013-06-14 18:01:27', '1900', NULL);
INSERT INTO `cpiq_matriculado` VALUES (7, 'nombre', 'apellido', '', '25174806', 1, 1, NULL, 1, 'domicilio', '', '', '', '2013-07-24 10:45:50', 1, '2013-07-24 14:15:54', '', NULL);
INSERT INTO `cpiq_matriculado` VALUES (15, 'Diego', 'Maradona', '', '10211830', 1, 13, NULL, 1, 'Segurola y la Habana', '', '', '', '2013-08-02 16:46:30', 1, '2013-08-02 19:53:09', '', NULL);
INSERT INTO `cpiq_matriculado` VALUES (16, 'MarÃ­a JosÃ©', 'Novillo', 'marcospinero@yahoo.com.ar', '27388858', 1, 13, NULL, 2, 'D', '', '', '', '2013-08-08 10:51:47', 1, '2013-08-08 13:57:09', '', NULL);
INSERT INTO `cpiq_matriculado` VALUES (17, 'Ruben', 'PiÃ±ero', '', '5217110', 1, 13, NULL, 0, 'Libertad 4532', '', '', '', '2013-08-27 10:20:35', 1, '2013-08-27 13:26:08', '', NULL);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_mov_caja`
-- 

CREATE TABLE `cpiq_mov_caja` (
  `oid` bigint(20) NOT NULL auto_increment,
  `fechaCarga` datetime default NULL,
  `importe` float default NULL,
  `observaciones` text,
  `movCtaCte_oid` bigint(20) default NULL,
  `concepto_oid` bigint(20) default NULL,
  `anulacion_oid` bigint(20) default NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `movctacte_oid` (`movCtaCte_oid`),
  KEY `concepto_oid` (`concepto_oid`),
  KEY `anulacion_oid` (`anulacion_oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_mov_caja`
-- 

INSERT INTO `cpiq_mov_caja` VALUES (2, '2013-08-02 12:29:39', 300, '', 3, 2, NULL, 1, '2013-08-02 12:29:39');
INSERT INTO `cpiq_mov_caja` VALUES (5, '2013-08-02 19:54:50', 300, '', 6, 2, NULL, 1, '2013-08-02 19:54:50');
INSERT INTO `cpiq_mov_caja` VALUES (6, '2013-08-08 14:00:37', 300, '', 7, 2, NULL, 1, '2013-08-08 14:00:37');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_mov_ctacte`
-- 

CREATE TABLE `cpiq_mov_ctacte` (
  `oid` bigint(20) NOT NULL auto_increment,
  `fechaCarga` datetime default NULL,
  `importe` float default NULL,
  `matriculado_oid` bigint(20) default NULL,
  `concepto_oid` bigint(20) default NULL,
  `anulacion_oid` bigint(20) default NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `matriculado_oid` (`matriculado_oid`),
  KEY `concepto_oid` (`concepto_oid`),
  KEY `anulacion_oid` (`anulacion_oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_mov_ctacte`
-- 

INSERT INTO `cpiq_mov_ctacte` VALUES (1, '2013-08-01 18:43:15', 300, 2, 1, NULL, 1, '2013-08-01 18:43:15');
INSERT INTO `cpiq_mov_ctacte` VALUES (3, '2013-08-02 12:29:39', 300, 2, 1, NULL, 1, '2013-08-02 12:29:39');
INSERT INTO `cpiq_mov_ctacte` VALUES (6, '2013-08-02 19:54:50', 300, 15, 1, NULL, 1, '2013-08-02 19:54:50');
INSERT INTO `cpiq_mov_ctacte` VALUES (7, '2013-08-08 14:00:37', 300, 16, 1, NULL, 1, '2013-08-08 14:00:37');
INSERT INTO `cpiq_mov_ctacte` VALUES (11, '2013-09-20 18:01:55', 250.5, 2, 3, NULL, 1, '2013-09-20 18:01:55');
INSERT INTO `cpiq_mov_ctacte` VALUES (12, '2013-10-03 21:07:30', 250.5, 2, 3, NULL, 1, '2013-10-03 21:07:30');
INSERT INTO `cpiq_mov_ctacte` VALUES (13, '2013-10-03 21:20:13', 250.5, 16, 3, NULL, 1, '2013-10-03 21:20:13');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_pais`
-- 

CREATE TABLE `cpiq_pais` (
  `oid` int(11) NOT NULL auto_increment,
  `nombre` varchar(150) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_pais`
-- 

INSERT INTO `cpiq_pais` VALUES (1, 'Argentina');
INSERT INTO `cpiq_pais` VALUES (2, 'Chile');
INSERT INTO `cpiq_pais` VALUES (3, 'Uruguay');
INSERT INTO `cpiq_pais` VALUES (4, 'Paraguay');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_provincia`
-- 

CREATE TABLE `cpiq_provincia` (
  `oid` int(11) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `pais_oid` int(11) NOT NULL,
  PRIMARY KEY  (`oid`),
  KEY `pais_oid` (`pais_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_provincia`
-- 

INSERT INTO `cpiq_provincia` VALUES (2, 'NeuquÃ©n', 1);
INSERT INTO `cpiq_provincia` VALUES (3, 'RÃ­o Negro', 1);
INSERT INTO `cpiq_provincia` VALUES (4, 'CÃ³rdoba', 1);
INSERT INTO `cpiq_provincia` VALUES (6, 'Buenos Aires', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_registro`
-- 

CREATE TABLE `cpiq_registro` (
  `oid` bigint(20) NOT NULL auto_increment,
  `nombre` varchar(200) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_registro`
-- 

INSERT INTO `cpiq_registro` VALUES (1, 'Primer Registro', 'PR', 1, '2013-07-04 19:53:29');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_registro_cuota`
-- 

CREATE TABLE `cpiq_registro_cuota` (
  `oid` bigint(20) NOT NULL auto_increment,
  `year` int(11) NOT NULL,
  `importe` float default NULL,
  `registro_oid` bigint(20) default NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  UNIQUE KEY `year` (`year`),
  KEY `registro_oid` (`registro_oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_registro_cuota`
-- 

INSERT INTO `cpiq_registro_cuota` VALUES (2, 2013, 250.5, 1, 1, '2013-07-04 22:35:03');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_registro_matriculado`
-- 

CREATE TABLE `cpiq_registro_matriculado` (
  `oid` bigint(20) NOT NULL auto_increment,
  `fecha` date default NULL,
  `matriculado_oid` bigint(20) default NULL,
  `registroCuota_oid` bigint(20) default NULL,
  `movCtaCte_oid` bigint(20) default NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `matriculado_oid` (`matriculado_oid`),
  KEY `movCtaCte_oid` (`movCtaCte_oid`),
  KEY `user_oid` (`user_oid`),
  KEY `registroCuota_oid` (`registroCuota_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_registro_matriculado`
-- 

INSERT INTO `cpiq_registro_matriculado` VALUES (3, '2013-09-20', 2, 2, 11, 1, '2013-09-20 18:01:55');
INSERT INTO `cpiq_registro_matriculado` VALUES (4, '2013-10-03', 2, 2, 12, 1, '2013-10-03 21:07:30');
INSERT INTO `cpiq_registro_matriculado` VALUES (5, '2013-10-03', 16, 2, 13, 1, '2013-10-03 21:20:13');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_secuencia_titulo`
-- 

CREATE TABLE `cpiq_secuencia_titulo` (
  `oid` bigint(20) NOT NULL auto_increment,
  `nombre` varchar(50) NOT NULL,
  `ultMatricula` int(11) default NULL,
  PRIMARY KEY  (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_secuencia_titulo`
-- 

INSERT INTO `cpiq_secuencia_titulo` VALUES (1, 'AA', 34);
INSERT INTO `cpiq_secuencia_titulo` VALUES (2, 'AB', 23);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_tipo_asignado`
-- 

CREATE TABLE `cpiq_tipo_asignado` (
  `oid` int(20) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  PRIMARY KEY  (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_tipo_asignado`
-- 

INSERT INTO `cpiq_tipo_asignado` VALUES (1, 'Todos');
INSERT INTO `cpiq_tipo_asignado` VALUES (2, 'CPIQ');
INSERT INTO `cpiq_tipo_asignado` VALUES (3, 'Matriculado');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_tipo_documento`
-- 

CREATE TABLE `cpiq_tipo_documento` (
  `oid` int(20) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  PRIMARY KEY  (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_tipo_documento`
-- 

INSERT INTO `cpiq_tipo_documento` VALUES (1, 'DNI');
INSERT INTO `cpiq_tipo_documento` VALUES (2, 'LC');
INSERT INTO `cpiq_tipo_documento` VALUES (3, 'LE');
INSERT INTO `cpiq_tipo_documento` VALUES (4, 'Pasaporte');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_tipo_encomienda`
-- 

CREATE TABLE `cpiq_tipo_encomienda` (
  `oid` bigint(20) NOT NULL auto_increment,
  `nombre` varchar(255) default NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_tipo_encomienda`
-- 

INSERT INTO `cpiq_tipo_encomienda` VALUES (2, 'Encomienda 1', 1, '2013-09-27 16:57:29');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_tipo_estado_encomienda`
-- 

CREATE TABLE `cpiq_tipo_estado_encomienda` (
  `oid` int(20) NOT NULL auto_increment,
  `nombre` varchar(255) default NULL,
  PRIMARY KEY  (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_tipo_estado_encomienda`
-- 

INSERT INTO `cpiq_tipo_estado_encomienda` VALUES (1, 'Solicitada');
INSERT INTO `cpiq_tipo_estado_encomienda` VALUES (2, 'Generada');
INSERT INTO `cpiq_tipo_estado_encomienda` VALUES (3, 'Certificada');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_tipo_titulo`
-- 

CREATE TABLE `cpiq_tipo_titulo` (
  `oid` bigint(20) NOT NULL auto_increment,
  `nombre` varchar(50) NOT NULL,
  `claseTitulo_oid` bigint(20) NOT NULL,
  `secuenciaTitulo_oid` bigint(20) NOT NULL,
  PRIMARY KEY  (`oid`),
  KEY `claseTitulo_oid` (`claseTitulo_oid`),
  KEY `secuenciaTitulo_oid` (`secuenciaTitulo_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_tipo_titulo`
-- 

INSERT INTO `cpiq_tipo_titulo` VALUES (1, 'Ingeniero civil', 1, 1);
INSERT INTO `cpiq_tipo_titulo` VALUES (2, 'Analista de Sistemas', 1, 2);
INSERT INTO `cpiq_tipo_titulo` VALUES (3, 'Ingeniero QuÃ­mico', 1, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_titulo`
-- 

CREATE TABLE `cpiq_titulo` (
  `oid` bigint(20) NOT NULL auto_increment,
  `matriculado_oid` bigint(20) default NULL,
  `tipoTitulo_oid` bigint(20) default NULL,
  `entidadEmisora_oid` bigint(20) default NULL,
  `fechaExpedicion` date default NULL,
  `fechaMatriculacion` date default NULL,
  `matricula` int(11) default NULL,
  `tituloPrincipal` int(1) default NULL,
  `user_oid` int(11) NOT NULL,
  `fechaUltModificacion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`oid`),
  UNIQUE KEY `matriculado_oid_2` (`matriculado_oid`,`tipoTitulo_oid`,`entidadEmisora_oid`),
  KEY `matriculado_oid` (`matriculado_oid`),
  KEY `tipoTitulo_oid` (`tipoTitulo_oid`),
  KEY `entidadEmisora_oid` (`entidadEmisora_oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_titulo`
-- 

INSERT INTO `cpiq_titulo` VALUES (12, 15, 1, 1, '2004-08-06', '2013-08-02', 31, 1, 1, '2013-08-02 19:54:03');
INSERT INTO `cpiq_titulo` VALUES (13, 16, 1, 1, '2008-08-07', '2013-08-08', 32, 0, 1, '2013-08-27 12:58:02');
INSERT INTO `cpiq_titulo` VALUES (14, 17, 1, 1, '2005-09-08', '2013-08-27', 33, 1, 1, '2013-08-27 13:27:38');
INSERT INTO `cpiq_titulo` VALUES (15, 16, 3, 1, '2005-09-01', '2013-08-27', 34, 1, 1, '2013-08-27 16:05:05');

-- 
-- Filtros para las tablas descargadas (dump)
-- 

-- 
-- Filtros para la tabla `cdt_action_function`
-- 
ALTER TABLE `cdt_action_function`
  ADD CONSTRAINT `cdt_action_function_ibfk_1` FOREIGN KEY (`cd_function`) REFERENCES `cdt_function` (`cd_function`);

-- 
-- Filtros para la tabla `cdt_menuoption`
-- 
ALTER TABLE `cdt_menuoption`
  ADD CONSTRAINT `cdt_menuoption_ibfk_1` FOREIGN KEY (`cd_function`) REFERENCES `cdt_function` (`cd_function`),
  ADD CONSTRAINT `cdt_menuoption_ibfk_2` FOREIGN KEY (`cd_menugroup`) REFERENCES `cdt_menugroup` (`cd_menugroup`);

-- 
-- Filtros para la tabla `cdt_user`
-- 
ALTER TABLE `cdt_user`
  ADD CONSTRAINT `cdt_user_ibfk_1` FOREIGN KEY (`cd_usergroup`) REFERENCES `cdt_usergroup` (`cd_usergroup`);

-- 
-- Filtros para la tabla `cdt_usergroup_function`
-- 
ALTER TABLE `cdt_usergroup_function`
  ADD CONSTRAINT `cdt_usergroup_function_ibfk_1` FOREIGN KEY (`cd_usergroup`) REFERENCES `cdt_usergroup` (`cd_usergroup`),
  ADD CONSTRAINT `cdt_usergroup_function_ibfk_2` FOREIGN KEY (`cd_function`) REFERENCES `cdt_function` (`cd_function`);

-- 
-- Filtros para la tabla `cpiq_concepto`
-- 
ALTER TABLE `cpiq_concepto`
  ADD CONSTRAINT `cpiq_concepto_ibfk_2` FOREIGN KEY (`tipoAsignado_oid`) REFERENCES `cpiq_tipo_asignado` (`oid`),
  ADD CONSTRAINT `cpiq_concepto_ibfk_3` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`);

-- 
-- Filtros para la tabla `cpiq_cuota`
-- 
ALTER TABLE `cpiq_cuota`
  ADD CONSTRAINT `cpiq_cuota_ibfk_1` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`);

-- 
-- Filtros para la tabla `cpiq_cuota_generada`
-- 
ALTER TABLE `cpiq_cuota_generada`
  ADD CONSTRAINT `cpiq_cuota_generada_ibfk_4` FOREIGN KEY (`cuota_oid`) REFERENCES `cpiq_cuota` (`oid`),
  ADD CONSTRAINT `cpiq_cuota_generada_ibfk_5` FOREIGN KEY (`matriculado_oid`) REFERENCES `cpiq_matriculado` (`oid`),
  ADD CONSTRAINT `cpiq_cuota_generada_ibfk_6` FOREIGN KEY (`movCtaCte_oid`) REFERENCES `cpiq_mov_ctacte` (`oid`),
  ADD CONSTRAINT `cpiq_cuota_generada_ibfk_7` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`);

-- 
-- Filtros para la tabla `cpiq_cuota_valor`
-- 
ALTER TABLE `cpiq_cuota_valor`
  ADD CONSTRAINT `cpiq_cuota_valor_ibfk_1` FOREIGN KEY (`cuota_oid`) REFERENCES `cpiq_cuota` (`oid`);

-- 
-- Filtros para la tabla `cpiq_encomienda`
-- 
ALTER TABLE `cpiq_encomienda`
  ADD CONSTRAINT `cpiq_encomienda_ibfk_5` FOREIGN KEY (`tipoDocumento_oid`) REFERENCES `cpiq_tipo_documento` (`oid`),
  ADD CONSTRAINT `cpiq_encomienda_ibfk_1` FOREIGN KEY (`matriculado_oid`) REFERENCES `cpiq_matriculado` (`oid`),
  ADD CONSTRAINT `cpiq_encomienda_ibfk_2` FOREIGN KEY (`tipoEncomienda_oid`) REFERENCES `cpiq_tipo_encomienda` (`oid`),
  ADD CONSTRAINT `cpiq_encomienda_ibfk_3` FOREIGN KEY (`localidad_oid`) REFERENCES `cpiq_localidad` (`oid`),
  ADD CONSTRAINT `cpiq_encomienda_ibfk_4` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`);

-- 
-- Filtros para la tabla `cpiq_encomienda_especialidad`
-- 
ALTER TABLE `cpiq_encomienda_especialidad`
  ADD CONSTRAINT `cpiq_encomienda_especialidad_ibfk_3` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`),
  ADD CONSTRAINT `cpiq_encomienda_especialidad_ibfk_1` FOREIGN KEY (`encomienda_oid`) REFERENCES `cpiq_encomienda` (`oid`),
  ADD CONSTRAINT `cpiq_encomienda_especialidad_ibfk_2` FOREIGN KEY (`titulo_oid`) REFERENCES `cpiq_tipo_estado_encomienda` (`oid`);

-- 
-- Filtros para la tabla `cpiq_encomienda_estado`
-- 
ALTER TABLE `cpiq_encomienda_estado`
  ADD CONSTRAINT `cpiq_encomienda_estado_ibfk_3` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`),
  ADD CONSTRAINT `cpiq_encomienda_estado_ibfk_1` FOREIGN KEY (`encomienda_oid`) REFERENCES `cpiq_encomienda` (`oid`),
  ADD CONSTRAINT `cpiq_encomienda_estado_ibfk_2` FOREIGN KEY (`tipoEstadoEncomienda_oid`) REFERENCES `cpiq_tipo_estado_encomienda` (`oid`);

-- 
-- Filtros para la tabla `cpiq_encomienda_observacion`
-- 
ALTER TABLE `cpiq_encomienda_observacion`
  ADD CONSTRAINT `cpiq_encomienda_observacion_ibfk_2` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`),
  ADD CONSTRAINT `cpiq_encomienda_observacion_ibfk_1` FOREIGN KEY (`encomienda_oid`) REFERENCES `cpiq_encomienda` (`oid`);

-- 
-- Filtros para la tabla `cpiq_encomienda_profesional`
-- 
ALTER TABLE `cpiq_encomienda_profesional`
  ADD CONSTRAINT `cpiq_encomienda_profesional_ibfk_2` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`),
  ADD CONSTRAINT `cpiq_encomienda_profesional_ibfk_1` FOREIGN KEY (`encomienda_oid`) REFERENCES `cpiq_encomienda` (`oid`);

-- 
-- Filtros para la tabla `cpiq_encomienda_registro`
-- 
ALTER TABLE `cpiq_encomienda_registro`
  ADD CONSTRAINT `cpiq_encomienda_registro_ibfk_3` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`),
  ADD CONSTRAINT `cpiq_encomienda_registro_ibfk_1` FOREIGN KEY (`encomienda_oid`) REFERENCES `cpiq_encomienda` (`oid`),
  ADD CONSTRAINT `cpiq_encomienda_registro_ibfk_2` FOREIGN KEY (`registroMatriculado_oid`) REFERENCES `cpiq_tipo_estado_encomienda` (`oid`);

-- 
-- Filtros para la tabla `cpiq_historico_estado`
-- 
ALTER TABLE `cpiq_historico_estado`
  ADD CONSTRAINT `cpiq_historico_estado_ibfk_1` FOREIGN KEY (`matriculado_oid`) REFERENCES `cpiq_matriculado` (`oid`),
  ADD CONSTRAINT `cpiq_historico_estado_ibfk_2` FOREIGN KEY (`estadoMatriculado_oid`) REFERENCES `cpiq_estado_matriculado` (`oid`),
  ADD CONSTRAINT `cpiq_historico_estado_ibfk_3` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`);

-- 
-- Filtros para la tabla `cpiq_incumbencia`
-- 
ALTER TABLE `cpiq_incumbencia`
  ADD CONSTRAINT `cpiq_incumbencia_ibfk_1` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`);

-- 
-- Filtros para la tabla `cpiq_incumbencia_tipo_encomienda`
-- 
ALTER TABLE `cpiq_incumbencia_tipo_encomienda`
  ADD CONSTRAINT `cpiq_incumbencia_tipo_encomienda_ibfk_1` FOREIGN KEY (`incumbencia_oid`) REFERENCES `cpiq_incumbencia` (`oid`),
  ADD CONSTRAINT `cpiq_incumbencia_tipo_encomienda_ibfk_2` FOREIGN KEY (`tipoEncomienda_oid`) REFERENCES `cpiq_tipo_encomienda` (`oid`),
  ADD CONSTRAINT `cpiq_incumbencia_tipo_encomienda_ibfk_3` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`);

-- 
-- Filtros para la tabla `cpiq_incumbencia_tipo_titulo`
-- 
ALTER TABLE `cpiq_incumbencia_tipo_titulo`
  ADD CONSTRAINT `cpiq_incumbencia_tipo_titulo_ibfk_1` FOREIGN KEY (`incumbencia_oid`) REFERENCES `cpiq_incumbencia` (`oid`),
  ADD CONSTRAINT `cpiq_incumbencia_tipo_titulo_ibfk_2` FOREIGN KEY (`tipoTitulo_oid`) REFERENCES `cpiq_tipo_titulo` (`oid`),
  ADD CONSTRAINT `cpiq_incumbencia_tipo_titulo_ibfk_3` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`);

-- 
-- Filtros para la tabla `cpiq_localidad`
-- 
ALTER TABLE `cpiq_localidad`
  ADD CONSTRAINT `cpiq_localidad_ibfk_1` FOREIGN KEY (`provincia_oid`) REFERENCES `cpiq_provincia` (`oid`);

-- 
-- Filtros para la tabla `cpiq_matriculado`
-- 
ALTER TABLE `cpiq_matriculado`
  ADD CONSTRAINT `cpiq_matriculado_ibfk_4` FOREIGN KEY (`cd_user`) REFERENCES `cdt_user` (`cd_user`),
  ADD CONSTRAINT `cpiq_matriculado_ibfk_1` FOREIGN KEY (`localidad_oid`) REFERENCES `cpiq_localidad` (`oid`),
  ADD CONSTRAINT `cpiq_matriculado_ibfk_2` FOREIGN KEY (`tipoDocumento_oid`) REFERENCES `cpiq_tipo_documento` (`oid`),
  ADD CONSTRAINT `cpiq_matriculado_ibfk_3` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`);

-- 
-- Filtros para la tabla `cpiq_mov_caja`
-- 
ALTER TABLE `cpiq_mov_caja`
  ADD CONSTRAINT `cpiq_mov_caja_ibfk_1` FOREIGN KEY (`movCtaCte_oid`) REFERENCES `cpiq_mov_ctacte` (`oid`),
  ADD CONSTRAINT `cpiq_mov_caja_ibfk_2` FOREIGN KEY (`concepto_oid`) REFERENCES `cpiq_concepto` (`oid`),
  ADD CONSTRAINT `cpiq_mov_caja_ibfk_3` FOREIGN KEY (`anulacion_oid`) REFERENCES `cpiq_anulacion` (`oid`),
  ADD CONSTRAINT `cpiq_mov_caja_ibfk_4` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`);

-- 
-- Filtros para la tabla `cpiq_mov_ctacte`
-- 
ALTER TABLE `cpiq_mov_ctacte`
  ADD CONSTRAINT `cpiq_mov_ctacte_ibfk_1` FOREIGN KEY (`matriculado_oid`) REFERENCES `cpiq_matriculado` (`oid`),
  ADD CONSTRAINT `cpiq_mov_ctacte_ibfk_2` FOREIGN KEY (`concepto_oid`) REFERENCES `cpiq_concepto` (`oid`),
  ADD CONSTRAINT `cpiq_mov_ctacte_ibfk_3` FOREIGN KEY (`anulacion_oid`) REFERENCES `cpiq_anulacion` (`oid`),
  ADD CONSTRAINT `cpiq_mov_ctacte_ibfk_4` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`);

-- 
-- Filtros para la tabla `cpiq_provincia`
-- 
ALTER TABLE `cpiq_provincia`
  ADD CONSTRAINT `cpiq_provincia_ibfk_1` FOREIGN KEY (`pais_oid`) REFERENCES `cpiq_pais` (`oid`);

-- 
-- Filtros para la tabla `cpiq_registro`
-- 
ALTER TABLE `cpiq_registro`
  ADD CONSTRAINT `cpiq_registro_ibfk_1` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`);

-- 
-- Filtros para la tabla `cpiq_registro_cuota`
-- 
ALTER TABLE `cpiq_registro_cuota`
  ADD CONSTRAINT `cpiq_registro_cuota_ibfk_1` FOREIGN KEY (`registro_oid`) REFERENCES `cpiq_registro` (`oid`),
  ADD CONSTRAINT `cpiq_registro_cuota_ibfk_2` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`);

-- 
-- Filtros para la tabla `cpiq_registro_matriculado`
-- 
ALTER TABLE `cpiq_registro_matriculado`
  ADD CONSTRAINT `cpiq_registro_matriculado_ibfk_4` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`),
  ADD CONSTRAINT `cpiq_registro_matriculado_ibfk_1` FOREIGN KEY (`matriculado_oid`) REFERENCES `cpiq_matriculado` (`oid`),
  ADD CONSTRAINT `cpiq_registro_matriculado_ibfk_2` FOREIGN KEY (`registroCuota_oid`) REFERENCES `cpiq_registro_cuota` (`oid`),
  ADD CONSTRAINT `cpiq_registro_matriculado_ibfk_3` FOREIGN KEY (`movCtaCte_oid`) REFERENCES `cpiq_mov_ctacte` (`oid`);

-- 
-- Filtros para la tabla `cpiq_tipo_encomienda`
-- 
ALTER TABLE `cpiq_tipo_encomienda`
  ADD CONSTRAINT `cpiq_tipo_encomienda_ibfk_1` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`);

-- 
-- Filtros para la tabla `cpiq_tipo_titulo`
-- 
ALTER TABLE `cpiq_tipo_titulo`
  ADD CONSTRAINT `cpiq_tipo_titulo_ibfk_1` FOREIGN KEY (`claseTitulo_oid`) REFERENCES `cpiq_clase_titulo` (`oid`),
  ADD CONSTRAINT `cpiq_tipo_titulo_ibfk_2` FOREIGN KEY (`secuenciaTitulo_oid`) REFERENCES `cpiq_secuencia_titulo` (`oid`);

-- 
-- Filtros para la tabla `cpiq_titulo`
-- 
ALTER TABLE `cpiq_titulo`
  ADD CONSTRAINT `cpiq_titulo_ibfk_5` FOREIGN KEY (`matriculado_oid`) REFERENCES `cpiq_matriculado` (`oid`),
  ADD CONSTRAINT `cpiq_titulo_ibfk_6` FOREIGN KEY (`tipoTitulo_oid`) REFERENCES `cpiq_tipo_titulo` (`oid`),
  ADD CONSTRAINT `cpiq_titulo_ibfk_7` FOREIGN KEY (`entidadEmisora_oid`) REFERENCES `cpiq_entidad_emisora` (`oid`),
  ADD CONSTRAINT `cpiq_titulo_ibfk_8` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`);
