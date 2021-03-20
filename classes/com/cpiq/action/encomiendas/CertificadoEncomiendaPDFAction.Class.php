<?php

/**
 * Acción para exportar a pdf un certificado de encomienda.
 *
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 07-10-203
 *
 */
class CertificadoEncomiendaPDFAction extends CdtAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtAction::execute()
	 */
	public function execute(){

		//armamos el pdf con la data necesaria.
		$pdf = new CertificadoEncomiendaPDF();
		
		$oid = CdtUtils::getParam('id');
		$managerEncomienda = new EncomiendaManager();
		$oEncomienda = $managerEncomienda->getObjectByCode($oid);
		
		$pdf->setCodigoEncomienda($oEncomienda->getNumero());
		
		$managerMatriculado = new MatriculadoManager();
		$oMatriculado = $managerMatriculado->getObjectByCode($oEncomienda->getMatriculado()->getOid());
		$pdf->setCertificaQue($oMatriculado->getNombre().' '.$oMatriculado->getApellido());
		
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
		$oCriteria->addFilter("tituloPrincipal", 1, "=" );
		$managerTitulo = new TituloManager();
		$oTitulo = $managerTitulo->getEntity($oCriteria);
		
		$pdf->setTitulo($oTitulo->getTipoTitulo()->getNombre());
		
		$managerTipoDocumento = new TipoDocumentoManager();
		$oTipoDocumento = $managerTipoDocumento->getObjectByCode($oMatriculado->getTipoDocumento()->getOid());
		
		$pdf->setDocumento($oTipoDocumento->getNombre().' '.$oMatriculado->getNroDocumento());
		
		$pdf->setMatricula($oTitulo->getTipoTitulo()->getSecuenciaTitulo()->getNombre().' '.$oTitulo->getMatricula());
		
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('encomienda_oid', $oEncomienda->getOid(), '=');
		//profesionales.
		$profesionalesManager = new EncomiendaProfesionalManager();
		$oEncomienda->setProfesionales( $profesionalesManager->getEntities($oCriteria) );
		
		//especialidades.
		$especialidadesManager = new EncomiendaEspecialidadManager();
		$oEncomienda->setEspecialidades( $especialidadesManager->getEntities($oCriteria) );
		
		//registros.
		$registrosManager = new EncomiendaRegistroManager();
		$oEncomienda->setRegistros( $registrosManager->getEntities($oCriteria) );
		
		//observaciones.
		$observacionesManager = new EncomiendaObservacionManager();
		$oEncomienda->setObservaciones( $observacionesManager->getEntities($oCriteria) );
		
		
		$pdf->setRegistros($oEncomienda->getRegistros());
		$pdf->setEspecialidades($oEncomienda->getEspecialidades());
		$pdf->setObservaciones($oEncomienda->getObservaciones());
		$pdf->setPrimero($oEncomienda->getPrimero());
		$pdf->setSegundo($oEncomienda->getSegundo());
		$pdf->setTercero($oEncomienda->getTercero());
		$pdf->setCuarto($oEncomienda->getCuarto());
		$pdf->setQuinto($oEncomienda->getQuinto());
		
		$pdf->setPosFirmaComitente($oEncomienda->getPosFirmaComitente());
		$pdf->setSeguridadTexto($oEncomienda->getSeguridadTexto());
		$pdf->setPiePagina($oEncomienda->getPiePagina());
		$pdf->setProfesionales($oEncomienda->getProfesionales());
		$pdf->setCodigoVerificacion($oEncomienda->getSeguridad());
		$pdf->setNombreComitente($oEncomienda->getComitente());
		$pdf->setRepresentanteComitente($oEncomienda->getRepresentante());
		if ($oEncomienda->getTipoDocumento()->getOid()) {
			$managerTipoDocumento = new TipoDocumentoManager();
			$oTipoDocumento = $managerTipoDocumento->getObjectByCode($oEncomienda->getTipoDocumento()->getOid());
			$pdf->setDocumentoComitente($oTipoDocumento->getNombre().' '.$oEncomienda->getDocumento());
		}
		
		$pdf->setCuilComitente($oEncomienda->getCuil());
		$pdf->setDomicilioComitente($oEncomienda->getDomicilio());
		$managerLocalidad = new LocalidadManager();
		$oLocalidad = $managerLocalidad->getObjectByCode($oEncomienda->getLocalidad()->getOid());
		$pdf->setLocalidadComitente($oLocalidad->getNombre());
		$pdf->setCodigoPostalComitente($oEncomienda->getCp());
		$pdf->setTelefonoComitente($oEncomienda->getTelefono());
		$managerTipoEncomienda = new TipoEncomiendaManager();
		$oTipoEncomienda = $managerTipoEncomienda->getObjectByCode($oEncomienda->getTipoEncomienda()->getOid());
		$pdf->setTipoEncomienda($oTipoEncomienda->getNombre());

		//generamos el QRCode y le asignamos la url de la imagen al pdf.
		
		$texto  = "<encomienda>".$oEncomienda->getNumero()."</encomienda>";
		$texto .= "<codigo_verificacion>".$oEncomienda->getSeguridad()."</codigo_verificacion>";
		$texto .= "<matriculado>".$oMatriculado->getNombre()." ".$oMatriculado->getApellido()."</matriculado>";
		$texto .= "<tarea>".$oTipoEncomienda->getNombre()."</tarea>";
		$texto .= "<comitente>".$oEncomienda->getComitente()."</comitente>";
		$texto .= "<fecha>".$oEncomienda->getFecha()."</fecha>";
		$srcQRCode = CPIQUtils::generarQRCode($texto);
		$pdf->setSrcQRCode($srcQRCode);
		
		
		$pdf->title = CPIQ_MSG_CERTIFICADO_ENCOMIENDA_SUBJECT;
		$pdf->SetFont('Arial','', 10);
		
		// establecemos los márgenes
		$pdf->SetMargins(25, 20 , 25);
		$pdf->SetAutoPageBreak(true,90);
		$pdf->AddPage();

		//imprimimos el certificado.
		$pdf->printCertificado();
		
		$pdf->Output();

		//para que no haga el forward.
		$forward = null;

		return $forward;
	}


}