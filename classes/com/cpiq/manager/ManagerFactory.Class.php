<?php

/**
 * Factory para Managers
 *  
 * @author Bernardo
 * @since 17-05-2013
 */
class ManagerFactory{

	public static function getTipoDocumentoManager(){
		return new TipoDocumentoManager();
	}
	
	public static function getMatriculadoManager(){
		return new MatriculadoManager();
	}
	
	public static function getTipoTituloManager(){
		return new TipoTituloManager();
	}
	
	public static function getSexoManager(){
		return new SexoManager();
	}
	
	public static function getLocalidadManager(){
		return new LocalidadManager();
	}
	
	public static function getPaisManager(){
		return new PaisManager();
	}
	
	public static function getProvinciaManager(){
		return new ProvinciaManager();
	}
	
	public static function getEntidadEmisoraManager(){
		return new EntidadEmisoraManager();
	}
	
	public static function getEstadoMatriculadoManager(){
		return new EstadoMatriculadoManager();
	}
	
	public static function getClaseTituloManager(){
		return new ClaseTituloManager();
	}
	
	public static function getSecuenciaTituloManager(){
		return new SecuenciaTituloManager();
	}
	
	public static function getTituloManager(){
		return new TituloManager();
	}
	
	public static function getHistoricoEstadoManager(){
		return new HistoricoEstadoManager();
	}
	
	public static function getCuotaManager(){
		return new CuotaManager();
	}
	
	public static function getCuotaGeneradaManager(){
		return new CuotaGeneradaManager();
	}
	
	public static function getRegistroManager(){
		return new RegistroManager();
	}
	
	public static function getRegistroCuotaManager(){
		return new RegistroCuotaManager();
	}
	
	public static function getRegistroMatriculadoManager(){
		return new RegistroMatriculadoManager();
	}
	
	public static function getRegistroCuotaMatriculadoManager(){
		return new RegistroCuotaMatriculadoManager();
	}
	
	public static function getConceptoManager(){
		return new ConceptoManager();
	}
	
	public static function getTipoAsignadoManager(){
		return new TipoAsignadoManager();
	}
	
	public static function getMovCtaCteManager(){
		return new MovCtaCteManager();
	}
	
	public static function getMovCajaManager(){
		return new MovCajaManager();
	}
	
	public static function getIncumbenciaManager(){
		return new IncumbenciaManager();
	}
	
	public static function getIncumbenciaTipoTituloManager(){
		return new IncumbenciaTipoTituloManager();
	}
	
	public static function getTipoEncomiendaManager(){
		return new TipoEncomiendaManager();
	}
	
	public static function getIncumbenciaTipoEncomiendaManager(){
		return new IncumbenciaTipoEncomiendaManager();
	}
	
	public static function getTipoEstadoEncomiendaManager(){
		return new TipoEstadoEncomiendaManager();
	}
	
	public static function getEncomiendaManager(){
		return new EncomiendaManager();
	}
	
	public static function getEncomiendaEstadoManager(){
		return new EncomiendaEstadoManager();
	}
	
	public static function getEncomiendaRegistroManager(){
		return new EncomiendaRegistroManager();
	}
	
	public static function getEncomiendaEspecialidadManager(){
		return new EncomiendaEspecialidadManager();
	}
	
	public static function getEncomiendaProfesionalManager(){
		return new EncomiendaProfesionalManager();
	}
	
	public static function getEncomiendaObservacionManager(){
		return new EncomiendaObservacionManager();
	}
	
	public static function getTipoPagoManager(){
		return new TipoPagoManager();
	}
	
	public static function getPagarEncomiendaManager(){
		return new PagarEncomiendaManager();
	}
	
	public static function getAnulacionManager(){
		return new AnulacionManager();
	}
	
	public static function getIncumbenciaRegistroManager(){
		return new IncumbenciaRegistroManager();
	}
	
	
}

?>