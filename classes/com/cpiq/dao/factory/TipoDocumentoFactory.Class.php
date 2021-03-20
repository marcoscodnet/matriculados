<?php

/**
 * Factory para TipoDocumento
 *  
 * @author Bernardo
 * @since 27-02-2013
 */
class TipoDocumentoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('TipoDocumento');
        $tipoDocumento = parent::build($next);

        return $tipoDocumento;
    }

}
?>
