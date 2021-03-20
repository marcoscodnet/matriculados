<?php

/**
 * Factory para Encomienda Profesional
 *  
 * @author Marcos
 * @since 09-10-2013
 */
class EncomiendaProfesionalFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('EncomiendaProfesional');
        $encomiendaProfesional = parent::build($next);

        $factory = new EncomiendaFactory();
        $factory->setAlias( CPIQ_TABLE_ENCOMIENDA . "_" );
        $encomiendaProfesional->setEncomienda( $factory->build($next) );
        
   		
        
        
        
   		if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CPIQ_TABLE_CDT_USER . "_" );
        	$encomiendaProfesional->setUser( $factory->build($next) );
		}
        
        return $encomiendaProfesional;
    }
}
?>
