<?php

/**
 * Factory para Cuota Generada
 *  
 * @author Marcos
 * @since 02-07-2013
 */
class CuotaGeneradaFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('CuotaGenerada');
        $cuotaGenerada = parent::build($next);

        $factory = new CuotaFactory();
        $factory->setAlias( CPIQ_TABLE_CUOTA . "_" );
        $cuotaGenerada->setCuota( $factory->build($next) );
        
        $factory = new MatriculadoFactory();
        $factory->setAlias( CPIQ_TABLE_MATRICULADO . "_" );
        $cuotaGenerada->setMatriculado( $factory->build($next) );
        
        $factory = new CuotaValorFactory();
        $factory->setAlias( CPIQ_TABLE_CUOTA_VALOR . "_" );
        $cuotaGenerada->setCuotaValor( $factory->build($next) );
        
        $factory = new TituloFactory();
        $factory->setAlias( CPIQ_TABLE_TITULO . "_" );
        $cuotaGenerada->setTitulo( $factory->build($next) );
        
    	$factory = new MovCtaCteFactory();
        $factory->setAlias( CPIQ_TABLE_MOV_CTACTE . "_" );
        $cuotaGenerada->setMovCtaCte( $factory->build($next) );
        
        $factory = new MovCtaCteFactory();
        $factory->setAlias( "DEUDA_" );
        $cuotaGenerada->setMovCtaCteDeuda( $factory->build($next) );
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$cuotaGenerada->setUser( $factory->build($next) );
		}
        
        
        return $cuotaGenerada;
    }
}
?>
