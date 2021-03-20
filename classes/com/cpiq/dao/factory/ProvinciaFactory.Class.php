<?php

/**
 * Factory para Provincia
 *  
 * @author Marcos
 * @since 28-05-2013
 */
class ProvinciaFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Provincia');
        $provincia = parent::build($next);
		
        $factory = new PaisFactory();
        $factory->setAlias( CPIQ_TABLE_PAIS . "_" );
        $provincia->setPais( $factory->build($next) );
        
        return $provincia;
    }

}
?>
