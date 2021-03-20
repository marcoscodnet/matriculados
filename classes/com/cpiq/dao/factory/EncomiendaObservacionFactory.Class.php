<?php

/**
 * Factory para observaciones de la encomienda
 *  
 * @author Marcos
 * @since 10-10-2013
 */
class EncomiendaObservacionFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('EncomiendaObservacion');
        $incumbencia = parent::build($next);

        $factory = new EncomiendaFactory();
        $factory->setAlias( CPIQ_TABLE_ENCOMIENDA . "_" );
        $incumbencia->setEncomienda( $factory->build($next) );
        
        
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$incumbencia->setUser( $factory->build($next) );
		}
        
        
        return $incumbencia;
    }
}
?>
