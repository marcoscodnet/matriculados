<?php

/**
 * Factory para Encomienda Especialidad
 *  
 * @author Marcos
 * @since 09-10-2013
 */
class EncomiendaEspecialidadFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('EncomiendaEspecialidad');
        $encomiendaEspecialidad = parent::build($next);

        $factory = new EncomiendaFactory();
        $factory->setAlias( CPIQ_TABLE_ENCOMIENDA . "_" );
        $encomiendaEspecialidad->setEncomienda( $factory->build($next) );
        
   		$factory = new TituloFactory();
        $factory->setAlias( CPIQ_TABLE_TITULO . "_" );
        $encomiendaEspecialidad->setTitulo( $factory->build($next) );
        
        $factory = new TipoTituloFactory();
        $factory->setAlias( CPIQ_TABLE_TIPO_TITULO . "_" );
        $encomiendaEspecialidad->setTipoTitulo( $factory->build($next) );
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$encomiendaEspecialidad->setUser( $factory->build($next) );
		}
        
        return $encomiendaEspecialidad;
    }
}
?>
