<?php

/**
 * Factory para Localidad
 *  
 * @author Bernardo
 * @since 23-05-2013
 */
class LocalidadFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Localidad');
        $localidad = parent::build($next);
        
        $factory = new ProvinciaFactory();
        $factory->setAlias( CPIQ_TABLE_PROVINCIA . "_" );
        $localidad->setProvincia( $factory->build($next) );

        return $localidad;
    }

}
?>
