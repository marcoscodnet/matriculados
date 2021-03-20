<?php

/**
 * Factory para Incumbencia
 *  
 * @author Marcos
 * @since 26-09-2013
 */
class IncumbenciaFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Incumbencia');
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
