<?php


/**
 * TipoComitente 
 *  
 * @author Marcos
 * @since 04-10-2013
 */

class TipoComitente {
    
    const FISICA = 1;
    const JURIDICA = 2;

    
    private static $items = array(  
    								   TipoComitente::FISICA=> CPIQ_LBL_TIPO_COMITENTE_FISICA,
    								   TipoComitente::JURIDICA=> CPIQ_LBL_TIPO_COMITENTE_JURIDICA,
    								   );
    
	public static function getItems(){
		return self::$items;
	}
	
	public static function getLabel($value){
		return self::$items[$value];
	}
					   
}
?>
