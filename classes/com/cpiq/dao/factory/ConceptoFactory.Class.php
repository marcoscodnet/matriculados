<?php

/**
 * Factory para Concepto
 *  
 * @author Marcos
 * @since 25-07-2013
 */
class ConceptoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Concepto');
        $concepto = parent::build($next);

        $factory = new TipoAsignadoFactory();
        $factory->setAlias( CPIQ_TABLE_TIPO_ASIGNADO . "_" );
        $concepto->setTipoAsignado( $factory->build($next) );
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$concepto->setUser( $factory->build($next) );
		}
        
        
        return $concepto;
    }
}
?>
