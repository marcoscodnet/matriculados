<?php

/**
 * Factory para Registro Matriculado
 *  
 * @author Marcos
 * @since 19-09-2013
 */
class RegistroMatriculadoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('RegistroMatriculado');
        $registroMatriculado = parent::build($next);

        $factory = new MatriculadoFactory();
        $factory->setAlias( CPIQ_TABLE_MATRICULADO . "_" );
        $registroMatriculado->setMatriculado( $factory->build($next) );
        
   		
        
        $factory = new RegistroFactory();
        $factory->setAlias( CPIQ_TABLE_REGISTRO . "_" );
        $registroMatriculado->setRegistro( $factory->build($next) );
        
        $factory = new TituloFactory();
        $factory->setAlias( CPIQ_TABLE_TITULO . "_" );
        $registroMatriculado->setTitulo( $factory->build($next) );
        
    	
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$registroMatriculado->setUser( $factory->build($next) );
		}
        
        return $registroMatriculado;
    }
}
?>
