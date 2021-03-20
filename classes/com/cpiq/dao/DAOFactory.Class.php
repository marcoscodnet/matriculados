<?php

/**
 * Factory para DAOs
 *
 * @author Bernardo
 * @since 17-05-2013
 */
class DAOFactory{

	public static function getTipoTituloDAO(){
		return new TipoTituloDAO();
	}

	public static function getTipoDocumentoDAO(){
		return new TipoDocumentoDAO();
	}
	

	public static function getMatriculadoDAO(){
		return new MatriculadoDAO();
	}
	
	public static function getLocalidadDAO(){
		return new LocalidadDAO();
	}

	public static function getPaisDAO(){
		return new PaisDAO();
	}
	
	public static function getProvinciaDAO(){
		return new ProvinciaDAO();
	}
	
	public static function getEntidadEmisoraDAO(){
		return new EntidadEmisoraDAO();
	}
	
	public static function getEstadoMatriculadoDAO(){
		return new EstadoMatriculadoDAO();
	}
	
	public static function getClaseTituloDAO(){
		return new ClaseTituloDAO();
	}
	
	public static function getSecuenciaTituloDAO(){
		return new SecuenciaTituloDAO();
	}
	
	public static function getTituloDAO(){
		return new TituloDAO();
	}
	
	public static function getHistoricoEstadoDAO(){
		return new HistoricoEstadoDAO();
	}
	
	public static function getCuotaDAO(){
		return new CuotaDAO();
	}
	
	public static function getCuotaValorDAO(){
		return new CuotaValorDAO();
	}
	
	public static function getCuotaGeneradaDAO(){
		return new CuotaGeneradaDAO();
	}
	
	public static function getRegistroDAO(){
		return new RegistroDAO();
	}
	
	public static function getRegistroCuotaDAO(){
		return new RegistroCuotaDAO();
	}
	
	public static function getRegistroMatriculadoDAO(){
		return new RegistroMatriculadoDAO();
	}
	
	public static function getRegistroCuotaMatriculadoDAO(){
		return new RegistroCuotaMatriculadoDAO();
	}
	
	public static function getConceptoDAO(){
		return new ConceptoDAO();
	}
	
	public static function getTipoAsignadoDAO(){
		return new TipoAsignadoDAO();
	}
	
	public static function getMovCtaCteDAO(){
		return new MovCtaCteDAO();
	}
	
	public static function getMovCajaDAO(){
		return new MovCajaDAO();
	}
	
	public static function getIncumbenciaDAO(){
		return new IncumbenciaDAO();
	}
	
	public static function getIncumbenciaTipoTituloDAO(){
		return new IncumbenciaTipoTituloDAO();
	}
	
	public static function getTipoEncomiendaDAO(){
		return new TipoEncomiendaDAO();
	}
	
	public static function getIncumbenciaTipoEncomiendaDAO(){
		return new IncumbenciaTipoEncomiendaDAO();
	}
	
	public static function getTipoEstadoEncomiendaDAO(){
		return new TipoEstadoEncomiendaDAO();
	}
	
	public static function getEncomiendaEstadoDAO(){
		return new EncomiendaEstadoDAO();
	}
	
	public static function getEncomiendaDAO(){
		return new EncomiendaDAO();
	}
	
	public static function getEncomiendaRegistroDAO(){
		return new EncomiendaRegistroDAO();
	}
	
	public static function getEncomiendaEspecialidadDAO(){
		return new EncomiendaEspecialidadDAO();
	}
	
	public static function getEncomiendaProfesionalDAO(){
		return new EncomiendaProfesionalDAO();
	}
	
	public static function getEncomiendaObservacionDAO(){
		return new EncomiendaObservacionDAO();
	}
	
	public static function getTipoPagoDAO(){
		return new TipoPagoDAO();
	}
	
	public static function getPagarEncomiendaDAO(){
		return new PagarEncomiendaDAO();
	}
	
	public static function getAnulacionDAO(){
		return new AnulacionDAO();
	}
	
	public static function getIncumbenciaRegistroDAO(){
		return new IncumbenciaRegistroDAO();
	}
}
?>
