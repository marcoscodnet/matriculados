<?php

/**
 * Formato para renderizar un detalle en las grillas
 *
 * @author Marcos
 * @since 01-11-2013
 *
 */
class GridTituloPrincipalValueFormat extends GridValueFormat {

	public function __construct() {

		parent::__construct();
	}

	public function format($value, $item=null) {

		//$id= $item->getIdQueBuscas();
		
		
		 $res = ($value==1)?'Si':'No';
		return $res ;
	}

}