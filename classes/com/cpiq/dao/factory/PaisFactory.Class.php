<?php

/**
 * Factory para Pais
 *  
 * @author Marcos
 * @since 28-05-2013
 */
class PaisFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Pais');
        $pais = parent::build($next);

        return $pais;
    }

}
?>
