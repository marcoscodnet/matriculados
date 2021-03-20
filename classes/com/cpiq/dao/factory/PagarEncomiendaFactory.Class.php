<?php

/**
 * Factory para Pagar Encomienda
 *  
 * @author Marcos
 * @since 17-10-2013
 */
class PagarEncomiendaFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('PagarEncomienda');
        $pagarEncomienda = parent::build($next);

        $factory = new EncomiendaFactory();
        $factory->setAlias( CPIQ_TABLE_ENCOMIENDA . "_" );
        $pagarEncomienda->setEncomienda( $factory->build($next) );
        
   		$factory = new TipoPagoFactory();
        $factory->setAlias( CPIQ_TABLE_TIPO_PAGO . "_" );
        $pagarEncomienda->setTipoPago( $factory->build($next) );
         
    	$factory = new MovCtaCteFactory();
        $factory->setAlias( CPIQ_TABLE_MOV_CTACTE . "_" );
        $pagarEncomienda->setMovCtaCte( $factory->build($next) );
        
        $factory = new MovCtaCteFactory();
        $factory->setAlias( "DEUDA_" );
        $pagarEncomienda->setMovCtaCteDeuda( $factory->build($next) );
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$pagarEncomienda->setUser( $factory->build($next) );
		}
        
        return $pagarEncomienda;
    }
}
?>
