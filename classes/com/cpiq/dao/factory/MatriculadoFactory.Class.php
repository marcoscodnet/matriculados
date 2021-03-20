<?php

/**
 * Factory para Matriculado
 *  
 * @author Bernardo
 * @since 21-05-2013
 */
class MatriculadoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Matriculado');
        $matriculado = parent::build($next);

        $factory = new TipoDocumentoFactory();
        $factory->setAlias( CPIQ_TABLE_TIPO_DOCUMENTO . "_" );
        $matriculado->setTipoDocumento( $factory->build($next) );
        
        $factory = new LocalidadFactory();
        $factory->setAlias( CPIQ_TABLE_LOCALIDAD . "_" );
        $matriculado->setLocalidad( $factory->build($next) );
        
        $factory = new EstadoMatriculadoFactory();
        $factory->setAlias( CPIQ_TABLE_ESTADO_MATRICULADO . "_" );
        $matriculado->setEstadoMatriculado( $factory->build($next) );
        
    	if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$matriculado->setUser( $factory->build($next) );
		}
		
    	if(array_key_exists('U_user_name',$next)){
			
			$factory = new CdtUserFactory();
        	$factory->setAliasUser( "U" );
        	$matriculado->setCdtUser( $factory->build($next) );
		}
        
        
        
        return $matriculado;
    }
}
?>
