<?php

/**
 * Acción para pagar y exportar a pdf una cuota generada.
 *
 * @author Marcos
 * @since 01-08-2013
 *
 */
class PagarCuotaGeneradaAction extends CdtAction{

	
	/**
	 * orientaci�n de la hoja.
	 *    P or Portrait
	 *    L or Landscape
	 * @return string
	 */
	protected function getOrientation(){
		return "P";
	}
	
	/**
	 * retorna el tama�o default  de la fuente del pdf
	 * @return int
	 */
	protected function getFontSize(){
		return 10;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtListAction::getCdtSearchCriteria();
	 */
	protected function getCdtSearchCriteria(){
		
		//armamos el criteria
		$oCriteria = parent::getCdtSearchCriteria();

		//quitamos la paginaci�n.
		$oCriteria->setPage( null );
		$oCriteria->setRowPerPage( null );
		
		return $oCriteria;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtListAction::getActionList();
	 */
	protected  function getActionList(){
		return "";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtAction::execute()
	 */
	public function execute(){
		CdtDbManager::begin_tran();

         

         try{
         	$cuotasPagadas = new ItemCollection();
         	foreach ($_POST as $key => $value) {
         		if (strchr($key, 'importe_')) {
         			$oid_cuota = explode('_', $key);
		         	$managerCuotaGenerada =  ManagerFactory::getCuotaGeneradaManager();
					$oCuotaGenerada = $managerCuotaGenerada->getObjectByCode($oid_cuota[1]);
		         	
			       	$managerMatriculado =  ManagerFactory::getMatriculadoManager();
					$oMatriculado = $managerMatriculado->getObjectByCode($oCuotaGenerada->getMatriculado()->getOid());
					
		         	$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
		         	/*$oEstadoMatriculado = new EstadoMatriculado();
					$oEstadoMatriculado->setOid(CPIQ_ESTADO_MATRICULADO_ACTIVO);
					
					
					
					$oCriteria = new CdtSearchCriteria();
					$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
					$oCriteria->addFilter("tituloPrincipal", 1, "=" );
					$managerTitulo = new TituloManager();
					$oTitulo = $managerTitulo->getEntity($oCriteria);
					
					$managerMatriculado->cambiarEstado($oMatriculado, $oEstadoMatriculado, CPIQ_CAMBIO_ESTADO_ACTIVO);
		         	
					
					
		         	$managerCuota =  ManagerFactory::getCuotaManager();
					$cuotaValores = $managerCuota->getValoresCuota($oCuotaGenerada->getCuota()->getOid());
					$importe=0;
					foreach ($cuotaValores as $oCuotaValor) {
						if ((date(DB_DEFAULT_DATE_FORMAT)>=$oCuotaValor->getFechaDesde())&&(date(DB_DEFAULT_DATE_FORMAT)<=$oCuotaValor->getFechaHasta())) {
							$importe = ($oTitulo->getTipoTitulo()->getIngenieroLicenciado()==1)?$oCuotaValor->getImporteIngeniero():$oCuotaValor->getImporte();
						}
					}*/
					
					$oUser = CdtSecureUtils::getUserLogged();
					
					
					$oMovCtaCteDeuda = new MovCtaCte();
						
					
					$oMovCtaCteDeuda->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
					$oMovCtaCteDeuda->setMatriculado($oMatriculado);
					$oConcepto = new Concepto();
					$oConcepto->setOid(CPIQ_CONCEPTO_DEUDA_CUOTA_MATRICULA);
					$oMovCtaCteDeuda->setConcepto($oConcepto);
					$oMovCtaCteDeuda->setImporte($value);
					$oMovCtaCteDeuda->setUser($oUser);
					$oMovCtaCteDeuda->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
					/*if ($oCuotaGenerada->getMovCtaCteDeuda()->getOid()!=null) {
						$managerMovCtaCte->update($oMovCtaCteDeuda);
					}
					else*/
						$managerMovCtaCte->add($oMovCtaCteDeuda);
					
					$oMovCtaCte = new MovCtaCte();
					$oMovCtaCte->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
					$oMovCtaCte->setMatriculado($oMatriculado);
					
					$oConcepto = new Concepto();
					$oConcepto->setOid(CPIQ_CONCEPTO_PAGO_CUOTA_MATRICULA);
					$oMovCtaCte->setConcepto($oConcepto);
					/*$managerCuota =  ManagerFactory::getCuotaManager();
					$cuotaValores = $managerCuota->getValoresCuota($oCuotaGenerada->getCuota()->getOid());
					$importe=0;
					foreach ($cuotaValores as $oCuotaValor) {
						if ((date(DB_DEFAULT_DATE_FORMAT)>=$oCuotaValor->getFechaDesde())&&(date(DB_DEFAULT_DATE_FORMAT)<=$oCuotaValor->getFechaHasta())) {
							$importe = ($oTitulo->getTipoTitulo()->getIngenieroLicenciado()==1)?$oCuotaValor->getImporteIngeniero():$oCuotaValor->getImporte();
						}
					}*/
					$oMovCtaCte->setImporte($value);
					$oUser = CdtSecureUtils::getUserLogged();
					$oMovCtaCte->setUser($oUser);
					$oMovCtaCte->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
					$managerMovCtaCte->add($oMovCtaCte);
					
					$managerMovCaja =  ManagerFactory::getMovCajaManager();
					$oMovCaja = new MovCaja();
					$oMovCaja->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
					$oMovCaja->setMovCtaCte($oMovCtaCte);
					
					$oConcepto = new Concepto();
					$oConcepto->setOid(CPIQ_CONCEPTO_COBRO_CUOTA_MATRICULA);
					$oMovCaja->setConcepto($oConcepto);
					
					$oMovCaja->setImporte($value);
					$oMovCaja->setUser($oUser);
					$oMovCaja->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
					$managerMovCaja->add($oMovCaja);
					
					
					$oCuotaGenerada->setMovCtaCte($oMovCtaCte);
					$oCuotaGenerada->setMovCtaCteDeuda($oMovCtaCteDeuda);
					$managerCuotaGenerada->update($oCuotaGenerada);
		             CdtDbManager::save();
		             $oCuotaPaga = new CuotaGenerada();
		             $oCuotaPaga->setNombre($oCuotaGenerada->getNombre());
		             $oCuotaPaga->setCuotaValor($value);
		             $cuotasPagadas->addItem($oCuotaPaga);
         		}
         		
         	}
         	if ($cuotasPagadas->size()>0) {
         		$pdf = $this->getPDFReport();
		
		
				$pdf->title = CPIQ_MSG_CUOTA_COMPROBANTE_CUOTA_GENERADA.'-'.$oMatriculado->getOid().'-'.date(CPIQ_DATETIME_FORMAT_STRING);
				$pdf->SetFont('Arial','', $this->getFontSize());
				$pdf->AddPage();
				
				$pdf->datosMatriculado($oMatriculado, date(DB_DEFAULT_DATE_FORMAT));
				$total=0;
				$pdf->parsearCabeceraRenglones();
				foreach ($cuotasPagadas as $cuotaPaga) {
					$pdf->parsearRenglonesCuota($cuotaPaga->getNombre(),$cuotaPaga->getCuotaValor());
					$total +=$cuotaPaga->getCuotaValor();
				}
				$pdf->parsearRenglonesCuota('Total',$total);
				$fileName = APP_PATH.'pdfs/'.$pdf->title.'.pdf';
				$pdf->Output($fileName,'F');
				$result['info'] = $pdf->title.'.pdf';
		        /*$pdf->Output(); 	
		        $subjectMail = CDT_MVC_APP_TITLE.' '.CPIQ_MSG_CUOTA_COMPROBANTE_CUOTA_GENERADA;
				$bodyMail = CPIQ_MSG_CUOTA_COMPROBANTE_CUOTA_GENERADA_SUBJECT_MAIL;
				$attachs = array();
				$attachs[]=$fileName;
	         	if ($oMatriculado->getEmail() != "") {
					
	         		CPIQUtils::sendMail($oMatriculado->getApellido().' '.$oMatriculado->getNombre(), $oMatriculado->getEmail(), $subjectMail, $bodyMail, $attachs);
	         	}
	         	CPIQUtils::sendMail(CDT_POP_MAIL_FROM_NAME, CDT_POP_MAIL_FROM, $subjectMail, $bodyMail, $attachs);*/
	         	//$forward = null;
         	}
         	
         	echo json_encode( $result ); 
			return null;
         	
			
         }catch(GenericException $ex){
             //capturamos la excepción y la parseamos en el layout.
             
             //$layout->setException( $ex );
             $forward = $this->getForwardError();
             CdtDbManager::undo();
         }
		return $forward;
	}
	
	protected function getPDFReport(){
		return new PDFReport( $this->getOrientation() );
	}
	
	protected function getPDFTitle(  ){
		return CPIQ_MSG_CUOTA_PAGAR_CUOTA_GENERADA;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'pagar_cuotaGenerada_error';
	}

	
}