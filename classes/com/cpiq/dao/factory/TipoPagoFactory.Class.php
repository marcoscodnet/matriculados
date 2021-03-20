<?php

/**
 * Factory para TipoPago
 *  
 * @author Marcos
 * @since 17-10-2013
 */
class TipoPagoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('TipoPago');
        $tipoPago = parent::build($next);

        return $tipoPago;
    }

}
?>
