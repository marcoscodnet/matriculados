<?php

/**
 * Factory para EncomiendaEstado
 *  
 * @author Marcos
 * @since 04-10-2013
 */
class EncomiendaEstadoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('EncomiendaEstado');
        $encomiendaEstado = parent::build($next);
        
    	$factory = new TipoEstadoEncomiendaFactory();
        $factory->setAlias( CPIQ_TABLE_TIPO_ESTADO_ENCOMIENDA. "_" );
        $encomiendaEstado->setTipoEstadoEncomienda( $factory->build($next) );
        
        
        
    	if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$encomiendaEstado->setUser( $factory->build($next) );
		}

        return $encomiendaEstado;
    }

}
?>
