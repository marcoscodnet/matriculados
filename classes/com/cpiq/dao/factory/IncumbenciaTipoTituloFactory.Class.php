<?php

/**
 * Factory para Incumbencia TipoTitulo
 *  
 * @author Marcos
 * @since 26-09-2013
 */
class IncumbenciaTipoTituloFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('IncumbenciaTipoTitulo');
        $incumbencia = parent::build($next);

        $factory = new IncumbenciaFactory();
        $factory->setAlias( CPIQ_TABLE_INCUMBENCIA . "_" );
        $incumbencia->setIncumbencia( $factory->build($next) );
        
        $factory = new TipoTituloFactory();
        $factory->setAlias( CPIQ_TABLE_TIPO_TITULO . "_" );
        $incumbencia->setTipoTitulo( $factory->build($next) );
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$incumbencia->setUser( $factory->build($next) );
		}
        
        
        return $incumbencia;
    }
}
?>
