<?php

/**
 * Formato para renderizar un monto con coeficiente en las grillas
 *
 * @author Marcos
 * @since 31-10-2013
 *
 */
class GridMontoCoeficienteValueFormat extends GridValueFormat {

	public function __construct() {

		parent::__construct();
	}

	public function format($value, $item=null) {

		$value = $item->getConcepto()->getCoeficiente()*$value;
		$res = CPIQUtils::formatMontoToView( $value );
		 
		return $res ;
	}

}