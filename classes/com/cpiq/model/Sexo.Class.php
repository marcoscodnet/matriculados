<?php


/**
 * Sexo 
 *  
 * @author Bernardo
 * @since 27-05-2013
 */

class Sexo {
    
    const MASCULINO = 1;
    const FEMENINO = 2;

    
    private static $items = array(  
    								   Sexo::MASCULINO=> CPIQ_LBL_SEXO_MASCULINO,
    								   Sexo::FEMENINO=> CPIQ_LBL_SEXO_FEMENINO,
    								   );
    
	public static function getItems(){
		return self::$items;
	}
	
	public static function getLabel($value){
		return self::$items[$value];
	}
					   
}
?>
