<?php

/**
 * Factory para Encomienda
 *  
 * @author Marcos
 * @since 04-10-2013
 */
class EncomiendaFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Encomienda');
        $encomienda = parent::build($next);
        
        $factory = new MatriculadoFactory();
        $factory->setAlias( CPIQ_TABLE_MATRICULADO . "_" );
        $encomienda->setMatriculado( $factory->build($next) );

        $factory = new TipoEncomiendaFactory();
        $factory->setAlias( CPIQ_TABLE_TIPO_ENCOMIENDA . "_" );
        $encomienda->setTipoEncomienda( $factory->build($next) );
        
        $factory = new TipoDocumentoFactory();
        $factory->setAlias( CPIQ_TABLE_TIPO_DOCUMENTO . "_" );
        $encomienda->setTipoDocumento( $factory->build($next) );
        
        $factory = new LocalidadFactory();
        $factory->setAlias( CPIQ_TABLE_LOCALIDAD . "_" );
        $encomienda->setLocalidad( $factory->build($next) );
        
        $factory = new TipoEstadoEncomiendaFactory();
        $factory->setAlias( CPIQ_TABLE_TIPO_ESTADO_ENCOMIENDA. "_" );
        $encomienda->setTipoEstadoEncomienda( $factory->build($next) );
        
        $factory = new EncomiendaEstadoFactory();
        $factory->setAlias( CPIQ_TABLE_ENCOMIENDA_ESTADO . "_" );
        $encomienda->setEncomiendaEstado( $factory->build($next) );
        
    	if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$encomienda->setUser( $factory->build($next) );
		}
        
        
        
        return $encomienda;
    }
}
?>
