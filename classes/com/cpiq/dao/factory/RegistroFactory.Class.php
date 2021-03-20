<?php

/**
 * Factory para Registro
 *  
 * @author Marcos
 * @since 04-07-2013
 */
class RegistroFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Registro');
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
