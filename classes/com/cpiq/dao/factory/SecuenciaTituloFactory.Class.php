<?php

/**
 * Factory para SecuenciaTitulo
 *  
 * @author Marcos
 * @since 10-06-2013
 */
class SecuenciaTituloFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('SecuenciaTitulo');
        $secuenciaTitulo = parent::build($next);

        return $secuenciaTitulo;
    }

}
?>
