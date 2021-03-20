<?php

/**
 * Manager para Pagar Encomienda
 *  
 * @author Marcos
 * @since 17-10-2013
 */
class PagarEncomiendaManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getPagarEncomiendaDAO();
	}

	public function add(Entity $entity) {
    	
		parent::add($entity);
		$this->enviarPDFS($entity);
    }	
    
	public function enviarPDFS(Entity $entity) {
    	$managerEncomienda = new EncomiendaManager();
		$oEncomienda = $managerEncomienda->getObjectByCode($entity->getEncomienda()->getOid());
		
		$matriculadoEncomienda = new MatriculadoManager();
		$oMatriculado = $matriculadoEncomienda->getObjectByCode($oEncomienda->getMatriculado()->getOid());
		
		$managerTipoEncomienda = new TipoEncomiendaManager();
		$oTipoEncomienda = $managerTipoEncomienda->getObjectByCode($oEncomienda->getTipoEncomienda()->getOid());
		
		$pdf = new PDFReport( 'P' );
		
		
		$pdf->title = CPIQ_MSG_PAGAR_ENCOMIENDA_ENCOMIENDA_GENERADA.'-'.$oMatriculado->getOid().'-'.date(CPIQ_DATETIME_FORMAT_STRING);
		$pdf->SetFont('Arial','', 10);
		$pdf->AddPage();
			
		$pdf->datosMatriculado($oMatriculado, date(DB_DEFAULT_DATE_FORMAT));
		$pdf->parsearRenglones($oTipoEncomienda->getNombre().' '.$oEncomienda->getNumero(),$importe);
		$fileName = APP_PATH.'pdfs/'.$pdf->title.'.pdf';;
		$pdf->Output($fileName,'F');
	    //$pdf->Output(); 	
	    $attachs = array();
		$attachs[]=$fileName;
	    
		$pdf = new CertificadoEncomiendaPDF();
		
		$oid = $oEncomienda->getOid();
		
		
		$pdf->setCodigoEncomienda($oEncomienda->getNumero());
		
		
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
		
		$pdf->setMatricula($oTitulo->getMatricula());
		
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
		if ($oEncomienda->getTipoDocumento()->getOid()!=null) {
			$managerTipoDocumento = new TipoDocumentoManager();
			$oTipoDocumento = $managerTipoDocumento->getObjectByCode($oEncomienda->getTipoDocumento()->getOid());
			$pdf->setDocumentoComitente($oTipoDocumento->getNombre().' '.$oEncomienda->getDocumento());
		}
		else $pdf->setDocumentoComitente('');
		
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
		
		$fileName = APP_PATH.'pdfs/'.$pdf->title.'.pdf';;
		$pdf->Output($fileName,'F');
		$attachs[]=$fileName;
		
		$subjectMail = CDT_MVC_APP_TITLE.' '.CPIQ_MSG_PAGAR_ENCOMIENDA_ENCOMIENDA_GENERADA;
		$bodyMail = CPIQ_MSG_CUOTA_COMPROBANTE_CUOTA_GENERADA_SUBJECT_MAIL;
        if ($oMatriculado->getEmail() != "") {
				
         	CPIQUtils::sendMail($oMatriculado->getApellido().' '.$oMatriculado->getNombre(), $oMatriculado->getEmail(), $subjectMail, $bodyMail, $attachs);
        }
        CPIQUtils::sendMail(CDT_POP_MAIL_FROM_NAME, CDT_POP_MAIL_FROM, $subjectMail, $bodyMail, $attachs);
		
		
    }

    
    
    
	
	
	
	
}
?>
