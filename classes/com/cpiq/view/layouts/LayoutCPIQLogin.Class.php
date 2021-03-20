<?php

/**
 * Representa el layout para el login de Gestión
 *
 * @author Bernardo
 * @since 25-02-2013
 */
class LayoutCPIQLogin extends LayoutSmileLogin{


	protected function parseStyles($xtpl) {
			
		parent::parseStyles($xtpl);
			
		/*
		 $xtpl->assign('css', WEB_PATH . "css/mdc-login-box.css");
		 $xtpl->parse('main.estilo');
		 */
	}


}
