<?php

/**
 * Factory para EntidadEmisora
 *  
 * @author Marcos
 * @since 06-06-2013
 */
class EntidadEmisoraFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('EntidadEmisora');
        $entidadEmisora = parent::build($next);

        return $entidadEmisora;
    }

}
?>
