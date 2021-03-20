<?php

/**
 * Factory para Mov Caja
 *  
 * @author Marcos
 * @since 01-08-2013
 */
class MovCajaFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('MovCaja');
        $movCaja = parent::build($next);

        $factory = new ConceptoFactory();
        $factory->setAlias( CPIQ_TABLE_CONCEPTO . "_" );
        $movCaja->setConcepto( $factory->build($next) );
        
        $factory = new MovCtaCteFactory();
        $factory->setAlias( CPIQ_TABLE_MOV_CTACTE . "_" );
        $movCaja->setMovCtaCte( $factory->build($next) );
        
        $factory = new MatriculadoFactory();
        $factory->setAlias( CPIQ_TABLE_MATRICULADO . "_" );
        $movCaja->setMatriculado( $factory->build($next) );
        
        $factory = new AnulacionFactory();
        $factory->setAlias( CPIQ_TABLE_ANULACION . "_" );
        $movCaja->setAnulacion( $factory->build($next) );
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$movCaja->setUser( $factory->build($next) );
		}
        
        
        return $movCaja;
    }
}
?>
