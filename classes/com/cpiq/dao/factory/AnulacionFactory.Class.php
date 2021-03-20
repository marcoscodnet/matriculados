<?php

/**
 * Factory para Anulacion
 *  
 * @author Marcos
 * @since 01-11-2013
 */
class AnulacionFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Anulacion');
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
