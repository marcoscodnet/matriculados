<?php

/**
 * Factory para TipoEncomienda
 *  
 * @author Marcos
 * @since 27-09-2013
 */
class TipoEncomiendaFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('TipoEncomienda');
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
