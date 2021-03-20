<?php

/**
 * Formato para renderizar un coeficiente en las grillas
 *
 * @author Marcos
 * @since 29-07-2013
 *
 */
class GridCoeficienteValueFormat extends GridValueFormat {

	public function __construct() {

		parent::__construct();
	}

	public function format($value, $item=null) {

		$res = Coeficiente::getLabel( $value );
		 
		return $res ;
	}

}