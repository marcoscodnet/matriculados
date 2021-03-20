<?php


/**
 * Coeficiente 
 *  
 * @author Marcos
 * @since 29-07-2013
 */

class Coeficiente {
    
    const EGRESO = -1;
    const INGRESO = 1;

    
    private static $items = array(  
    								   Coeficiente::EGRESO=> CPIQ_LBL_COEFICIENTE_EGRESO,
    								   Coeficiente::INGRESO=> CPIQ_LBL_COEFICIENTE_INGRESO,
    								   );
    
	public static function getItems(){
		return self::$items;
	}
	
	public static function getLabel($value){
		return self::$items[$value];
	}
					   
}
?>
