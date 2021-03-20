<?php

/**
 * Factory para CuotaValor
 *  
 * @author bernardo
 * @since 01-07-2013
 */
class CuotaValorFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('CuotaValor');
        $cuota = parent::build($next);
        
        return $cuota;
    }
}
?>
