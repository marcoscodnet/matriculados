<?php

/**
 * Factory para TipoAsignado
 *  
 * @author Marcos
 * @since 25-07-2013
 */
class TipoAsignadoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('TipoAsignado');
        $tipoAsignado = parent::build($next);

        return $tipoAsignado;
    }

}
?>
