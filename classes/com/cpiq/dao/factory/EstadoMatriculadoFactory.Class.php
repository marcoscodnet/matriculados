<?php

/**
 * Factory para EstadoMatriculado
 *  
 * @author Marcos
 * @since 07-06-2013
 */
class EstadoMatriculadoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('EstadoMatriculado');
        $estadoMatriculado = parent::build($next);

        return $estadoMatriculado;
    }

}
?>
