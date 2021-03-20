<?php

/**
 * Factory para Cuota
 *  
 * @author Marcos
 * @since 27-06-2013
 */
class CuotaFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Cuota');
        $cuota = parent::build($next);

        
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$cuota->setUser( $factory->build($next) );
		}
        
        
        return $cuota;
    }
}
?>
