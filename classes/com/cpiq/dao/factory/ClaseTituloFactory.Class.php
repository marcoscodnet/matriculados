<?php

/**
 * Factory para ClaseTitulo
 *  
 * @author Marcos
 * @since 10-06-2013
 */
class ClaseTituloFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('ClaseTitulo');
        $claseTitulo = parent::build($next);

        return $claseTitulo;
    }

}
?>
