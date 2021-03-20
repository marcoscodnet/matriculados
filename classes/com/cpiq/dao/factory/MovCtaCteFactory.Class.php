<?php

/**
 * Factory para Mov CtaCte
 *  
 * @author Marcos
 * @since 01-08-2013
 */
class MovCtaCteFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('MovCtaCte');
        $movCtaCte = parent::build($next);

        $factory = new ConceptoFactory();
        $factory->setAlias( CPIQ_TABLE_CONCEPTO . "_" );
        $movCtaCte->setConcepto( $factory->build($next) );
        
        $factory = new MatriculadoFactory();
        $factory->setAlias( CPIQ_TABLE_MATRICULADO . "_" );
        $movCtaCte->setMatriculado( $factory->build($next) );
        
        $factory = new AnulacionFactory();
        $factory->setAlias( CPIQ_TABLE_ANULACION . "_" );
        $movCtaCte->setAnulacion( $factory->build($next) );
        
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$movCtaCte->setUser( $factory->build($next) );
		}
        
        
        return $movCtaCte;
    }
}
?>
