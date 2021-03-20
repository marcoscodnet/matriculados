<?php

/**
 * Factory para Incumbencia TipoEncomienda
 *  
 * @author Marcos
 * @since 27-09-2013
 */
class IncumbenciaTipoEncomiendaFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('IncumbenciaTipoEncomienda');
        $incumbencia = parent::build($next);

        $factory = new IncumbenciaFactory();
        $factory->setAlias( CPIQ_TABLE_INCUMBENCIA . "_" );
        $incumbencia->setIncumbencia( $factory->build($next) );
        
        $factory = new TipoEncomiendaFactory();
        $factory->setAlias( CPIQ_TABLE_TIPO_ENCOMIENDA . "_" );
        $incumbencia->setTipoEncomienda( $factory->build($next) );
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$incumbencia->setUser( $factory->build($next) );
		}
        
        
        return $incumbencia;
    }
}
?>
