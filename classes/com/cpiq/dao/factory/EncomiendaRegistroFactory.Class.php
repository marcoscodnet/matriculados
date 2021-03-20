<?php

/**
 * Factory para Encomienda Registro
 *  
 * @author Marcos
 * @since 09-10-2013
 */
class EncomiendaRegistroFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('EncomiendaRegistro');
        $encomiendaRegistro = parent::build($next);

        $factory = new EncomiendaFactory();
        $factory->setAlias( CPIQ_TABLE_ENCOMIENDA . "_" );
        $encomiendaRegistro->setEncomienda( $factory->build($next) );
        
   		$factory = new RegistroMatriculadoFactory();
        $factory->setAlias( CPIQ_TABLE_REGISTRO_MATRICULADO . "_" );
        $encomiendaRegistro->setRegistroMatriculado( $factory->build($next) );
        
        
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$encomiendaRegistro->setUser( $factory->build($next) );
		}
        
        return $encomiendaRegistro;
    }
}
?>
