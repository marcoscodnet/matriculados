<?php

/**
 * Factory para Título
 *  
 * @author Marcos
 * @since 12-06-2013
 */
class TituloFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Titulo');
        $titulo = parent::build($next);

        $factory = new TipoTituloFactory();
        $factory->setAlias( CPIQ_TABLE_TIPO_TITULO . "_" );
        $titulo->setTipoTitulo( $factory->build($next) );
        
        $factory = new MatriculadoFactory();
        $factory->setAlias( CPIQ_TABLE_MATRICULADO . "_" );
        $titulo->setMatriculado( $factory->build($next) );
        
    	$factory = new EntidadEmisoraFactory();
        $factory->setAlias( CPIQ_TABLE_ENTIDAD_EMISORA . "_" );
        $titulo->setEntidadEmisora( $factory->build($next) );
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$titulo->setUser( $factory->build($next) );
		}
        
        
        return $titulo;
    }
}
?>
