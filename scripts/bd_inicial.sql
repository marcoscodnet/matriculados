-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 14-06-2013 a las 09:34:23
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=119 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=99 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

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
INSERT INTO `cdt_menuoption` VALUES (36, 'Tipos de tÃ­tulo', 'doAction?action=list_tiposTitulo', 79, 3, 9, 'tiposTitulo', '');
INSERT INTO `cdt_menuoption` VALUES (37, 'Localidades', 'doAction?action=list_localidades', 59, 3, 10, 'localidades', '');
INSERT INTO `cdt_menuoption` VALUES (38, 'PaÃ­ses', 'doAction?action=list_paises', 64, 4, 10, 'paises', '');
INSERT INTO `cdt_menuoption` VALUES (39, 'Provincias', 'doAction?action=list_provincias', 69, 5, 10, 'paises', '');
INSERT INTO `cdt_menuoption` VALUES (40, 'Tipos de Documento', 'doAction?action=list_tiposDocumento', 74, 6, 10, 'tiposDocumento', '');
INSERT INTO `cdt_menuoption` VALUES (41, 'Entidades emisoras', 'doAction?action=list_entidadesEmisora', 49, 1, 10, 'entidadesEmisora', '');
INSERT INTO `cdt_menuoption` VALUES (42, 'Estados de matriculado', 'doAction?action=list_estadosMatriculado', 54, 2, 10, 'estadosMatriculado', '');
INSERT INTO `cdt_menuoption` VALUES (43, 'Secuencias de tÃ­tulo', 'doAction?action=list_secuenciasTitulo', 89, 2, 9, 'tiposTitulo', '');
INSERT INTO `cdt_menuoption` VALUES (44, 'TÃ­tulos', 'doAction?action=list_titulos', 93, 4, 9, 'tiposTitulo', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `cdt_usergroup`
-- 

INSERT INTO `cdt_usergroup` VALUES (1, 'Administrator');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=438 ;

-- 
-- Volcar la base de datos para la tabla `cdt_usergroup_function`
-- 

INSERT INTO `cdt_usergroup_function` VALUES (342, 1, 1);
INSERT INTO `cdt_usergroup_function` VALUES (343, 1, 2);
INSERT INTO `cdt_usergroup_function` VALUES (344, 1, 3);
INSERT INTO `cdt_usergroup_function` VALUES (345, 1, 4);
INSERT INTO `cdt_usergroup_function` VALUES (346, 1, 5);
INSERT INTO `cdt_usergroup_function` VALUES (347, 1, 6);
INSERT INTO `cdt_usergroup_function` VALUES (348, 1, 7);
INSERT INTO `cdt_usergroup_function` VALUES (349, 1, 8);
INSERT INTO `cdt_usergroup_function` VALUES (350, 1, 9);
INSERT INTO `cdt_usergroup_function` VALUES (351, 1, 10);
INSERT INTO `cdt_usergroup_function` VALUES (352, 1, 11);
INSERT INTO `cdt_usergroup_function` VALUES (353, 1, 12);
INSERT INTO `cdt_usergroup_function` VALUES (354, 1, 13);
INSERT INTO `cdt_usergroup_function` VALUES (355, 1, 14);
INSERT INTO `cdt_usergroup_function` VALUES (356, 1, 15);
INSERT INTO `cdt_usergroup_function` VALUES (357, 1, 16);
INSERT INTO `cdt_usergroup_function` VALUES (358, 1, 17);
INSERT INTO `cdt_usergroup_function` VALUES (359, 1, 18);
INSERT INTO `cdt_usergroup_function` VALUES (360, 1, 19);
INSERT INTO `cdt_usergroup_function` VALUES (361, 1, 20);
INSERT INTO `cdt_usergroup_function` VALUES (362, 1, 21);
INSERT INTO `cdt_usergroup_function` VALUES (363, 1, 22);
INSERT INTO `cdt_usergroup_function` VALUES (364, 1, 23);
INSERT INTO `cdt_usergroup_function` VALUES (365, 1, 24);
INSERT INTO `cdt_usergroup_function` VALUES (366, 1, 25);
INSERT INTO `cdt_usergroup_function` VALUES (367, 1, 26);
INSERT INTO `cdt_usergroup_function` VALUES (368, 1, 27);
INSERT INTO `cdt_usergroup_function` VALUES (369, 1, 28);
INSERT INTO `cdt_usergroup_function` VALUES (370, 1, 29);
INSERT INTO `cdt_usergroup_function` VALUES (371, 1, 30);
INSERT INTO `cdt_usergroup_function` VALUES (372, 1, 31);
INSERT INTO `cdt_usergroup_function` VALUES (373, 1, 32);
INSERT INTO `cdt_usergroup_function` VALUES (374, 1, 33);
INSERT INTO `cdt_usergroup_function` VALUES (375, 1, 34);
INSERT INTO `cdt_usergroup_function` VALUES (376, 1, 35);
INSERT INTO `cdt_usergroup_function` VALUES (377, 1, 36);
INSERT INTO `cdt_usergroup_function` VALUES (378, 1, 37);
INSERT INTO `cdt_usergroup_function` VALUES (379, 1, 38);
INSERT INTO `cdt_usergroup_function` VALUES (380, 1, 39);
INSERT INTO `cdt_usergroup_function` VALUES (381, 1, 40);
INSERT INTO `cdt_usergroup_function` VALUES (382, 1, 41);
INSERT INTO `cdt_usergroup_function` VALUES (383, 1, 44);
INSERT INTO `cdt_usergroup_function` VALUES (384, 1, 45);
INSERT INTO `cdt_usergroup_function` VALUES (385, 1, 46);
INSERT INTO `cdt_usergroup_function` VALUES (386, 1, 47);
INSERT INTO `cdt_usergroup_function` VALUES (387, 1, 48);
INSERT INTO `cdt_usergroup_function` VALUES (388, 1, 49);
INSERT INTO `cdt_usergroup_function` VALUES (389, 1, 50);
INSERT INTO `cdt_usergroup_function` VALUES (390, 1, 51);
INSERT INTO `cdt_usergroup_function` VALUES (391, 1, 52);
INSERT INTO `cdt_usergroup_function` VALUES (392, 1, 53);
INSERT INTO `cdt_usergroup_function` VALUES (393, 1, 54);
INSERT INTO `cdt_usergroup_function` VALUES (394, 1, 55);
INSERT INTO `cdt_usergroup_function` VALUES (395, 1, 56);
INSERT INTO `cdt_usergroup_function` VALUES (396, 1, 57);
INSERT INTO `cdt_usergroup_function` VALUES (397, 1, 58);
INSERT INTO `cdt_usergroup_function` VALUES (398, 1, 59);
INSERT INTO `cdt_usergroup_function` VALUES (399, 1, 60);
INSERT INTO `cdt_usergroup_function` VALUES (400, 1, 61);
INSERT INTO `cdt_usergroup_function` VALUES (401, 1, 62);
INSERT INTO `cdt_usergroup_function` VALUES (402, 1, 63);
INSERT INTO `cdt_usergroup_function` VALUES (403, 1, 64);
INSERT INTO `cdt_usergroup_function` VALUES (404, 1, 65);
INSERT INTO `cdt_usergroup_function` VALUES (405, 1, 66);
INSERT INTO `cdt_usergroup_function` VALUES (406, 1, 67);
INSERT INTO `cdt_usergroup_function` VALUES (407, 1, 68);
INSERT INTO `cdt_usergroup_function` VALUES (408, 1, 69);
INSERT INTO `cdt_usergroup_function` VALUES (409, 1, 70);
INSERT INTO `cdt_usergroup_function` VALUES (410, 1, 71);
INSERT INTO `cdt_usergroup_function` VALUES (411, 1, 72);
INSERT INTO `cdt_usergroup_function` VALUES (412, 1, 73);
INSERT INTO `cdt_usergroup_function` VALUES (413, 1, 74);
INSERT INTO `cdt_usergroup_function` VALUES (414, 1, 75);
INSERT INTO `cdt_usergroup_function` VALUES (415, 1, 76);
INSERT INTO `cdt_usergroup_function` VALUES (416, 1, 77);
INSERT INTO `cdt_usergroup_function` VALUES (417, 1, 78);
INSERT INTO `cdt_usergroup_function` VALUES (418, 1, 79);
INSERT INTO `cdt_usergroup_function` VALUES (419, 1, 80);
INSERT INTO `cdt_usergroup_function` VALUES (420, 1, 81);
INSERT INTO `cdt_usergroup_function` VALUES (421, 1, 82);
INSERT INTO `cdt_usergroup_function` VALUES (422, 1, 83);
INSERT INTO `cdt_usergroup_function` VALUES (423, 1, 84);
INSERT INTO `cdt_usergroup_function` VALUES (424, 1, 85);
INSERT INTO `cdt_usergroup_function` VALUES (425, 1, 86);
INSERT INTO `cdt_usergroup_function` VALUES (426, 1, 87);
INSERT INTO `cdt_usergroup_function` VALUES (427, 1, 88);
INSERT INTO `cdt_usergroup_function` VALUES (428, 1, 89);
INSERT INTO `cdt_usergroup_function` VALUES (429, 1, 90);
INSERT INTO `cdt_usergroup_function` VALUES (430, 1, 91);
INSERT INTO `cdt_usergroup_function` VALUES (431, 1, 92);
INSERT INTO `cdt_usergroup_function` VALUES (432, 1, 93);
INSERT INTO `cdt_usergroup_function` VALUES (433, 1, 94);
INSERT INTO `cdt_usergroup_function` VALUES (434, 1, 95);
INSERT INTO `cdt_usergroup_function` VALUES (435, 1, 96);
INSERT INTO `cdt_usergroup_function` VALUES (436, 1, 97);
INSERT INTO `cdt_usergroup_function` VALUES (437, 1, 98);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_estado_matriculado`
-- 


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

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
INSERT INTO `cpiq_localidad` VALUES (9, 'Tres Arroyos', 6);
INSERT INTO `cpiq_localidad` VALUES (10, 'TapalquÃ©', 6);
INSERT INTO `cpiq_localidad` VALUES (11, 'Necochea', 6);
INSERT INTO `cpiq_localidad` VALUES (13, 'La Plata', 6);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cpiq_matriculado`
-- 

CREATE TABLE `cpiq_matriculado` (
  `oid` bigint(20) NOT NULL auto_increment,
  `cd_user` int(11) NOT NULL,
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
  PRIMARY KEY  (`oid`),
  UNIQUE KEY `doc_unique` (`nroDocumento`,`tipoDocumento_oid`),
  KEY `localidad_oid` (`localidad_oid`),
  KEY `tipoDocumento_oid` (`tipoDocumento_oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_matriculado`
-- 

INSERT INTO `cpiq_matriculado` VALUES (1, 'Bernardo', 'Iribarne', 'ber.iribarne@gmail.com', '28070832', 4, NULL, '1981-03-17', 1, '-', '', '', '', NULL, 1, '2013-06-07 21:26:24', NULL);
INSERT INTO `cpiq_matriculado` VALUES (3, 'Jorgelina', NULL, 'gabriel@bati.com.ar', '90', 1, NULL, '1970-01-01', 0, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', NULL);
INSERT INTO `cpiq_matriculado` VALUES (4, 'Marta', NULL, 'gabrial@bati.com.ar', '99', 1, NULL, '1970-01-01', 0, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', NULL);
INSERT INTO `cpiq_matriculado` VALUES (5, 'Rodrigo', NULL, 'eldiego@maradona.com.ar', '8768', 1, NULL, '1970-01-01', 0, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', NULL);
INSERT INTO `cpiq_matriculado` VALUES (6, 'Gabriel Omar', NULL, 'gabriel@bati.com.ar', '0909', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', NULL);
INSERT INTO `cpiq_matriculado` VALUES (7, 'Ricardo', NULL, 'b@mail.com', '77', 1, 2, '2013-07-11', 0, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', NULL);

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

INSERT INTO `cpiq_secuencia_titulo` VALUES (1, 'AA', 26);
INSERT INTO `cpiq_secuencia_titulo` VALUES (2, 'AB', 15);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_tipo_titulo`
-- 

INSERT INTO `cpiq_tipo_titulo` VALUES (1, 'Ingeniero civil', 1, 1);
INSERT INTO `cpiq_tipo_titulo` VALUES (2, 'Analista de Sistemas', 1, 2);

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
  KEY `matriculado_oid` (`matriculado_oid`),
  KEY `tipoTitulo_oid` (`tipoTitulo_oid`),
  KEY `entidadEmisora_oid` (`entidadEmisora_oid`),
  KEY `user_oid` (`user_oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `cpiq_titulo`
-- 


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
-- Filtros para la tabla `cpiq_localidad`
-- 
ALTER TABLE `cpiq_localidad`
  ADD CONSTRAINT `cpiq_localidad_ibfk_1` FOREIGN KEY (`provincia_oid`) REFERENCES `cpiq_provincia` (`oid`);

-- 
-- Filtros para la tabla `cpiq_matriculado`
-- 
ALTER TABLE `cpiq_matriculado`
  ADD CONSTRAINT `cpiq_matriculado_ibfk_1` FOREIGN KEY (`localidad_oid`) REFERENCES `cpiq_localidad` (`oid`),
  ADD CONSTRAINT `cpiq_matriculado_ibfk_2` FOREIGN KEY (`tipoDocumento_oid`) REFERENCES `cpiq_tipo_documento` (`oid`),
  ADD CONSTRAINT `cpiq_matriculado_ibfk_3` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`),
   ADD CONSTRAINT `cpiq_matriculado_ibfk_4` FOREIGN KEY (`cd_user`) REFERENCES `cdt_user` (`cd_user`);

-- 
-- Filtros para la tabla `cpiq_provincia`
-- 
ALTER TABLE `cpiq_provincia`
  ADD CONSTRAINT `cpiq_provincia_ibfk_1` FOREIGN KEY (`pais_oid`) REFERENCES `cpiq_pais` (`oid`);

-- 
-- Filtros para la tabla `cpiq_tipo_titulo`
-- 
ALTER TABLE `cpiq_tipo_titulo`
  ADD CONSTRAINT `cpiq_tipo_titulo_ibfk_2` FOREIGN KEY (`secuenciaTitulo_oid`) REFERENCES `cpiq_secuencia_titulo` (`oid`),
  ADD CONSTRAINT `cpiq_tipo_titulo_ibfk_1` FOREIGN KEY (`claseTitulo_oid`) REFERENCES `cpiq_clase_titulo` (`oid`);

-- 
-- Filtros para la tabla `cpiq_titulo`
-- 
ALTER TABLE `cpiq_titulo`
  ADD CONSTRAINT `cpiq_titulo_ibfk_8` FOREIGN KEY (`user_oid`) REFERENCES `cdt_user` (`cd_user`),
  ADD CONSTRAINT `cpiq_titulo_ibfk_5` FOREIGN KEY (`matriculado_oid`) REFERENCES `cpiq_matriculado` (`oid`),
  ADD CONSTRAINT `cpiq_titulo_ibfk_6` FOREIGN KEY (`tipoTitulo_oid`) REFERENCES `cpiq_tipo_titulo` (`oid`),
  ADD CONSTRAINT `cpiq_titulo_ibfk_7` FOREIGN KEY (`entidadEmisora_oid`) REFERENCES `cpiq_entidad_emisora` (`oid`);
