<?php

/**
 * Factory para TipoEstadoEncomienda
 *  
 * @author Marcos
 * @since 03-10-2013
 */
class TipoEstadoEncomiendaFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('TipoEstadoEncomienda');
        $tipoEstadoEncomienda = parent::build($next);

        return $tipoEstadoEncomienda;
    }

}
?>
