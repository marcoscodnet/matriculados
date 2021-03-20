<?php

/**
 * Certificado de encomienda profesional
 * 
 * @author bernardo
 * @since 07/10/2103
 */
class CertificadoEncomiendaPDF extends CdtPDFPrint{

	private $codigoEncomienda = "";
	private $codigoVerificacion = "";
	private $certificaQue = "";
	private $titulo = "";
	private $documento = "";
	private $matricula = "";
	private $profesionales;
	private $registros;
	private $especialidades;
	private $observaciones;
	private $primero;
	
	private $segundo;
	
	private $tercero;
	
	private $cuarto;
	
	private $quinto;
	
	private $posFirmaComitente;
	
	private $seguridadTexto;
	
	private $piePagina;
	
	private $tipoEncomienda;
	
	private $nroLeyProteccionDatos = "";
	private $nombreComitente;
	private $documentoComitente;
	private $domicilioComitente;
	private $dniComitente;
	private $cuilComitente;
	private $localidadComitente;
	private $codigoPostalComitente;
	private $telefonoComitente;	
	private $representanteComitente;
	private $srcQRCode;
	
	
	public function __construct(){
		
		parent::__construct();
		
		$this->setRegistros(new ItemCollection());
		$this->setEspecialidades(new ItemCollection());
		$this->setProfesionales(new ItemCollection());
		$this->setSrcQRCode( WEB_PATH . "css/smile/images/blank.gif");
		
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtPDFPrint#Header()
	 */
	function Header(){
		
		$this->SetTextColor(222, 234, 247);
		$this->SetDrawColor(1,1,1);
		$this->SetLineWidth(.1);
		$this->SetFont('Arial','B',36);
		$this->RotatedText($this->lMargin, $this->h - 10, $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_CPIQ_TITLE), 60);
		
		//$this->SetY(20);
		
		$this->Image(WEB_PATH . 'css/images/logo_200.jpg', $this->rMargin+2, $this->y + 2);//, 60, 20);
	
		$this->y = $this->y + 20;
		$this->SetX($this->lMargin);
		$maxWidth = ($this->w) - $this->lMargin - $this->rMargin;
	
		$this->initFontLabel();
		$this->Cell(110,5, $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_TITLE) ,1,0,'C');
		$this->Cell(15,5, $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_SUBTITLE) ,1,0,'C');
		$this->Cell($maxWidth-125,5, $this->encodeCharacters($this->codigoEncomienda) ,1,0,'C');
		
		//Line break
		$this->Ln(10);
	}
	
	function printCertificado(  ){
	
		
		$maxWidth = ($this->w) - $this->lMargin - $this->rMargin;		
			
		
		$this->initFontLabel();
		$this->Cell($maxWidth,5, $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PAGE1_TITLE) ,1,0,'C');
		$this->Ln();
		
		$anchoColumna = $maxWidth/3;
		
		$this->initFontLabel();
		$this->Cell( $anchoColumna,5, $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PAGE1_CERTIFICA) ,1,0,'L');
		$this->initFontValue();
		$this->Cell( $anchoColumna*2,5, $this->encodeCharacters($this->getCertificaQue()) ,1,0,'C',true);
		$this->Ln();
		
		$this->initFontLabel();
		$this->Cell( $anchoColumna,5, $this->encodeCharacters(strtoupper(CPIQ_LBL_TITULO)) ,1,0,'C');
		$this->Cell( $anchoColumna,5, $this->encodeCharacters(strtoupper(CPIQ_LBL_MATRICULADO_DOCUMENTO)) ,1,0,'C');
		$this->Cell( $anchoColumna,5, $this->encodeCharacters(strtoupper(CPIQ_LBL_TITULO_MATRICULA)) ,1,0,'C');
		$this->Ln();
		
		$this->initFontValue();
		$this->Cell($anchoColumna,5, $this->encodeCharacters($this->getTitulo()) ,1,0,'C',true);
		$this->Cell($anchoColumna,5, $this->encodeCharacters($this->getDocumento()) ,1,0,'C',true);
		$this->Cell($anchoColumna,5, $this->encodeCharacters($this->getMatricula()) ,1,0,'C',true);
		$this->Ln();
		
		$this->initFontLabel();
		/*$this->Cell($anchoColumna,5, $this->encodeCharacters(strtoupper(CPIQ_LBL_ENCOMIENDA_ESPECIALIDADES)) ,1,0,'C');
		$this->Cell($anchoColumna,5, $this->encodeCharacters(strtoupper(CPIQ_LBL_ENCOMIENDA_REGISTROS)) ,1,0,'C');
		$this->Cell($anchoColumna,5, $this->encodeCharacters(strtoupper(CPIQ_LBL_ENCOMIENDA_OBSERVACION)) ,1,0,'C');
		$this->Ln();*/
		
		$this->SetWidths(array($anchoColumna, $anchoColumna, $anchoColumna));
		$this->SetAligns(array('C', 'C', 'C'));
		$this->row(array($this->encodeCharacters(strtoupper(CPIQ_LBL_ENCOMIENDA_ESPECIALIDADES)),$this->encodeCharacters(strtoupper(CPIQ_LBL_ENCOMIENDA_REGISTROS)), $this->encodeCharacters(strtoupper(CPIQ_LBL_ENCOMIENDA_OBSERVACION))));
		
	 	$this->SetAligns(array('C', 'C', 'C'));
		
		
		
		$cantidadRegistros = $this->getRegistros()->size();
		$cantidadEspecialidades= $this->getEspecialidades()->size();
		$cantidadObservaciones= $this->getObservaciones()->size();
		//miro cuál tiene mayor cantidad entre especialidades y registros para armar los renglones.
		//$cantidadRenglones = ( $cantidadRegistros > $cantidadEspecialidades )?$cantidadRegistros:$cantidadRegistros;
		
		$cantidadRenglones = max($cantidadRegistros,$cantidadEspecialidades,$cantidadObservaciones);
		
		//mínimo mostramos un renglón
		if($cantidadRenglones<1)
			$cantidadRenglones = 1;
		
		for ($indice = 0; $indice < $cantidadRenglones; $indice++) {

			$this->initFontValue();
			
			$especialidad = "";
			if( $indice < $cantidadEspecialidades ){
				
				
				$titulo = $this->getEspecialidades()->getObjectByIndex($indice)->getTitulo();
				$managerTitulo =  ManagerFactory::getTituloManager();
				$oTitulo = $managerTitulo->getObjectByCode($titulo->getOid());
				$especialidad = $oTitulo->getTipoTitulo()->getNombre();
				
			}
			
			$registro = "";
			if( $indice < $cantidadRegistros ){
				$registroMatriculado = $this->getRegistros()->getObjectByIndex($indice)->getRegistroMatriculado();
				$managerRegistroMatriculado =  ManagerFactory::getRegistroMatriculadoManager();
				$oRegistroMatriculado = $managerRegistroMatriculado->getObjectByCode($registroMatriculado->getOid());
				$registro = $oRegistroMatriculado->getRegistro()->getNombre();
			}
			
			$observacion = "";
			if( $indice < $cantidadObservaciones ){
				
				$observacion = $this->getObservaciones()->getObjectByIndex($indice)->getObservacion();
			}
				

			/*$this->Cell($anchoColumna,5, $this->encodeCharacters($especialidad) ,1,0,'C',true);
			$this->Cell($anchoColumna,5, $this->encodeCharacters($registro),1,0,'C',true);
			$this->Cell($anchoColumna,5, $this->encodeCharacters($observacion) ,1,0,'C',true);//están es observaciones no sé de dónde se saca.
			$this->Ln();*/
			$this->row(array($this->encodeCharacters($especialidad),$this->encodeCharacters($registro), $this->encodeCharacters($observacion)),true);
			
		}
		
		
		$this->initFontLabel();
		$this->Cell( 30,5, $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PRIMERO) ,1,0,'C');
		$this->initFontValue();
		$this->Cell( $maxWidth-30,5, $this->encodeCharacters($this->getPrimero()) ,1,0,'L');
		$this->Ln();
		
		$this->initFontLabel();
		$this->Cell( 30,10, $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_SEGUNDO) ,1,0,'C');
		$this->initFontValue();
		$xanterior = $this->x ;
		$yanterior = $this->y ;
		$this->MultiCell( $maxWidth-30,5, $this->encodeCharacters($this->getSegundo()) ,0,'J');
		$this->x = $xanterior;
		$this->y = $yanterior;
		$this->Cell( $maxWidth-30,10, "" ,1,0,'L');//esto lo hago para el recuadro del multicell.
		$this->Ln();
		
		$this->initFontLabel();
		$this->Cell( 30,5, $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_TERCERO) ,1,0,'C');
		$this->initFontValue();
		$this->Cell( $maxWidth-30,5, $this->encodeCharacters($this->getTercero()) ,1,0,'L');
		$this->Ln();
		
		$this->initFontValue();
		$this->Cell( $maxWidth,40, $this->encodeCharacters( $this->getTipoEncomienda() ),1,0,'J',true);
		$this->Ln();

		/*
		 * imprimimos los profesionales.
		 */
		//si está vacío, escribo al menos un renglón
		if( $this->getProfesionales()->isEmpty() ){
		
			$encomiendaProfesional = new EncomiendaProfesional();
			$encomiendaProfesional->setProfesional("");
			$encomiendaProfesional->setConsejo("");
			$encomiendaProfesional->setMatricula("");
			$this->getProfesionales()->addItem( $encomiendaProfesional );
			$this->getProfesionales()->addItem( $encomiendaProfesional );
				
		}
		
		$cantidadProfesionales = $this->getProfesionales()->size();
		
		
		$this->initFontLabel();
		$this->Cell( 30,20 + (5 * $cantidadProfesionales), $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_CUARTO) ,1,0,'C');
		$this->initFontValue();
		$xanterior = $this->x ;
		$yanterior = $this->y ;
		$this->MultiCell( $maxWidth-30,5, $this->encodeCharacters($this->getCuarto()) ,0,'J');
		$this->x = $xanterior;
		$this->y = $yanterior;
		$this->Cell( $maxWidth-30,15, "" ,1,0,'L');//esto lo hago para el recuadro del multicell.
		$this->Ln();
		$this->x = $xanterior;
		$anchoColumnaCuarto = ($maxWidth-30)/3;
		$this->initFontLabel();
		$this->Cell( $anchoColumnaCuarto, 5, $this->encodeCharacters(CPIQ_LBL_ENCOMIENDA_PROFESIONALES_CONSEJO) ,1,0,'C');
		$this->Cell( $anchoColumnaCuarto,5, $this->encodeCharacters(CPIQ_LBL_ENCOMIENDA_PROFESIONALES_PROFESIONAL) ,1,0,'C');
		$this->Cell( $anchoColumnaCuarto,5, $this->encodeCharacters(CPIQ_LBL_ENCOMIENDA_PROFESIONALES_MATRICULA) ,1,0,'C');
		$this->Ln();
		
		
		foreach ($this->getProfesionales() as $encomiendaProfesional) {
			$this->x = $xanterior;
			$this->initFontValue();
			$this->Cell( $anchoColumnaCuarto,5, $this->encodeCharacters($encomiendaProfesional->getConsejo()) ,1,0,'L', true);
			$this->Cell( $anchoColumnaCuarto,5, $this->encodeCharacters($encomiendaProfesional->getProfesional()) ,1,0,'L', true);
			$this->Cell( $anchoColumnaCuarto,5, $this->encodeCharacters($encomiendaProfesional->getMatricula()) ,1,0,'L', true);
			$this->Ln();		
		}
		
		
		/**
		 * datos del comitente.
		 */
		$this->AddPage();
		$this->initFontLabel();
		$this->Cell($maxWidth,5, $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PAGE2_DATOS) ,1,0,'C');
		$this->Ln();
		
		$this->initFontLabel();
		$xanterior = $this->x ;
		$yanterior = $this->y ;
		$anchoLabelComitente = 50 ;
		$anchoValueComitente = $maxWidth-50 ;
		$this->MultiCell($anchoLabelComitente,5, $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PAGE2_RAZON) ,1,'C');
		$this->x = $anchoLabelComitente + $this->lMargin;
		$this->y = $yanterior;
		$this->initFontValue();
		$this->Cell( $anchoValueComitente,10, $this->encodeCharacters($this->getNombreComitente()) ,1,0,'L', true);
		$this->Ln();
		
		$this->initFontLabel();
		$this->Cell( $anchoLabelComitente,5, $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PAGE2_REPRESENTANTE) ,1,0,'C');
		$this->initFontValue();
		$this->Cell( $anchoValueComitente,5, $this->encodeCharacters($this->getRepresentanteComitente()) ,1,0,'L', true);
		$this->Ln();

		$this->initFontLabel();
		$this->Cell( $anchoLabelComitente,5, $this->encodeCharacters(CPIQ_LBL_ENCOMIENDA_DOCUMENTO) ,1,0,'C');
		$this->initFontValue();
		$this->Cell( $anchoLabelComitente-5,5, $this->encodeCharacters($this->getDocumentoComitente()) ,1,0,'L', true);
		$this->initFontLabel();
		$this->Cell( 12,5, $this->encodeCharacters(CPIQ_LBL_ENCOMIENDA_CUIT) ,1,0,'C');
		$this->Cell( 12,5, $this->encodeCharacters(CPIQ_LBL_ENCOMIENDA_CUIL) ,1,0,'C');
		$this->initFontValue();
		$this->Cell( $anchoValueComitente-$anchoLabelComitente-19,5, $this->encodeCharacters($this->getCuilComitente()) ,1,0,'L', true);
		$this->Ln();
		
		$this->initFontLabel();
		$this->Cell( $anchoLabelComitente,5, $this->encodeCharacters(CPIQ_LBL_ENCOMIENDA_DOMICILIO) ,1,0,'C');
		$this->initFontValue();
		$this->Cell( $anchoValueComitente,5, $this->encodeCharacters($this->getDomicilioComitente()) ,1,0,'L', true);
		$this->Ln();
		
		$this->initFontLabel();
		$this->Cell( $anchoLabelComitente,5, $this->encodeCharacters(CPIQ_LBL_ENCOMIENDA_LOCALIDAD) ,1,0,'C');
		$this->initFontValue();
		$this->Cell( $anchoValueComitente,5, $this->encodeCharacters($this->getLocalidadComitente()) ,1,0,'L', true);
		$this->Ln();
		
		$this->initFontLabel();
		$this->Cell( $anchoLabelComitente,5, $this->encodeCharacters(CPIQ_LBL_ENCOMIENDA_CP) ,1,0,'C');
		$this->initFontValue();
		$this->Cell( $anchoValueComitente,5, $this->encodeCharacters($this->getCodigoPostalComitente()) ,1,0,'L', true);
		$this->Ln();
		
		$this->initFontLabel();
		$this->Cell( $anchoLabelComitente,5, $this->encodeCharacters(CPIQ_LBL_ENCOMIENDA_TELEFONO) ,1,0,'C');
		$this->initFontValue();
		$this->Cell( $anchoValueComitente,5, $this->encodeCharacters($this->getTelefonoComitente()) ,1,0,'L', true);
		$this->Ln();
		
		$this->initFontLabel();
		$this->Cell( $anchoLabelComitente,(5 * 9), $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_QUINTO) ,1,0,'C');
		$this->initFontValue();
		$this->MultiCell( $anchoValueComitente,5, $this->encodeCharacters($this->getQuinto()) ,1,'J');
		
		//$this->Ln();

		$this->initFontLabel();
		$this->Cell( 60,20, $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PAGE2_FIRMA) ,1,0,'C');
		$this->initFontValue();
		$this->Cell( $maxWidth-60,20, "" ,1,0,'L');
		$this->Ln();
		
		$this->initFontValue();
		$this->MultiCell( $maxWidth,5, $this->encodeCharacters($this->getPosFirmaComitente()." ".$this->getNroLeyProteccionDatos()) ,1,'J');
		
		$this->Ln();
		
		
		
	}		
	

	/**
	 * (non-PHPdoc)
	 * @see CdtPDFPrint#Footer()
	 */
	function Footer(){
		
		$this->SetY(-90);
		
		
		$maxWidth = ($this->w) - $this->lMargin - $this->rMargin;
		
		//QR code + firma matriculado.
		$this->initFontLabel();
		$this->Cell(40,5, $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_BUENOS_AIRES) ,1,0,'L');
		$this->Cell($maxWidth-40,5, "" ,1,0,'L');
		$this->Ln();
		$this->Image( $this->getSrcQRCode(), ($maxWidth/4)+10, $this->y );//, 60, 20);
		$this->Cell($maxWidth/2,30, "" ,1,0,'L');
		$this->Cell($maxWidth/2,30, "" ,1,0,'L');
		$this->Ln();
		$this->Cell($maxWidth/2,5, $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PIE_CODIGO." ". $this->codigoVerificacion) ,1,0,'C');
		$this->Cell($maxWidth/2,5, $this->encodeCharacters(CPIQ_MSG_CERTIFICADO_ENCOMIENDA_PIE_FIRMA)  ,1,0,'C');
		$this->Ln();
		$this->initFontValue();
		$this->Cell($maxWidth,5, $this->encodeCharacters($this->getSeguridadTexto()." ". $this->codigoEncomienda)  ,1,0,'L');
		$this->Ln();
		$this->Ln();
		
		
		//Arial italic 8
		$this->SetFont('Arial','',8);

		//notas
		$this->multiCell($maxWidth,3, $this->encodeCharacters($this->getPiePagina()) ,0,'L');
		$this->Ln();
		
		/*$this->imprimirNota(1, CPIQ_MSG_CERTIFICADO_ENCOMIENDA_NOTA_1);
		$this->imprimirNota(2, CPIQ_MSG_CERTIFICADO_ENCOMIENDA_NOTA_2);
		$this->imprimirNota(3, CPIQ_MSG_CERTIFICADO_ENCOMIENDA_NOTA_3);
		$this->imprimirNota(4, CPIQ_MSG_CERTIFICADO_ENCOMIENDA_NOTA_4);
		$this->imprimirNota(5, CPIQ_MSG_CERTIFICADO_ENCOMIENDA_NOTA_5);*/
		
	}

	function imprimirNota($numero, $texto){
		$maxWidth = ($this->w) - $this->lMargin - $this->rMargin;
		
		$this->SetFillColor(218,218,218);
		$this->SetTextColor(1,1,1);
		$this->SetDrawColor(192,192,192);
		$this->SetLineWidth(.1);
		$this->SetFont('Arial','',8);
		$this->Cell(8,3, "($numero)" ,0,0,'L');
		
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('Arial','',8);
		$this->MultiCell($maxWidth-8,3, $this->encodeCharacters( $texto ),0,'J');
		$this->Ln(1);
		
	}
	
	function initFontLabel(){
		$this->SetFillColor(218,218,218);
		$this->SetTextColor(0);
		$this->SetDrawColor(1,1,1);
		$this->SetLineWidth(.1);
		$this->SetFont('Arial','B',11);
	}
	
	function initFontValue(){
		$this->SetFillColor(245);
		$this->SetTextColor(0);
		$this->SetFont('Arial','',10);
		
	}

	function addLineaLabelValue( $label, $value, $label_align="R", $value_align="L" ){

		$this->initFontLabel();
		   
	    $this->Cell(50,5, $label . ": ",1,0, $label_align);
	    
		$this->initFontValue();				
		$this->Cell(50,5, $value,1,0,$value_align);
	    $this->Ln();
	    
		//$this->LabelValue(50,10, $label, $value, $border=0, $align="R");
		
	}


	public function getCodigoEncomienda()
	{
	    return $this->codigoEncomienda;
	}

	public function setCodigoEncomienda($codigoEncomienda)
	{
	    $this->codigoEncomienda = $codigoEncomienda;
	}

	public function getCodigoVerificacion()
	{
	    return $this->codigoVerificacion;
	}

	public function setCodigoVerificacion($codigoVerificacion)
	{
	    $this->codigoVerificacion = $codigoVerificacion;
	}

	public function getCertificaQue()
	{
	    return $this->certificaQue;
	}

	public function setCertificaQue($certificaQue)
	{
	    $this->certificaQue = $certificaQue;
	}

	public function getTitulo()
	{
	    return $this->titulo;
	}

	public function setTitulo($titulo)
	{
	    $this->titulo = $titulo;
	}

	public function getDocumento()
	{
	    return $this->documento;
	}

	public function setDocumento($documento)
	{
	    $this->documento = $documento;
	}

	public function getMatricula()
	{
	    return $this->matricula;
	}

	public function setMatricula($matricula)
	{
	    $this->matricula = $matricula;
	}

	public function getProfesionales()
	{
	    return $this->profesionales;
	}

	public function setProfesionales($profesionales)
	{
	    $this->profesionales = $profesionales;
	}

	public function getRegistros()
	{
	    return $this->registros;
	}

	public function setRegistros($registros)
	{
	    $this->registros = $registros;
	}

	public function getEspecialidades()
	{
	    return $this->especialidades;
	}

	public function setEspecialidades($especialidades)
	{
	    $this->especialidades = $especialidades;
	}

	public function getTercero()
	{
	    return $this->tercero;
	}

	public function setTercero($tercero)
	{
	    $this->tercero = $tercero;
	}

	public function getNroLeyProteccionDatos()
	{
	    return $this->nroLeyProteccionDatos;
	}

	public function setNroLeyProteccionDatos($nroLeyProteccionDatos)
	{
	    $this->nroLeyProteccionDatos = $nroLeyProteccionDatos;
	}

	public function getNombreComitente()
	{
	    return $this->nombreComitente;
	}

	public function setNombreComitente($nombreComitente)
	{
	    $this->nombreComitente = $nombreComitente;
	}

	public function getDocumentoComitente()
	{
	    return $this->documentoComitente;
	}

	public function setDocumentoComitente($documentoComitente)
	{
	    $this->documentoComitente = $documentoComitente;
	}

	public function getDomicilioComitente()
	{
	    return $this->domicilioComitente;
	}

	public function setDomicilioComitente($domicilioComitente)
	{
	    $this->domicilioComitente = $domicilioComitente;
	}

	public function getDniComitente()
	{
	    return $this->dniComitente;
	}

	public function setDniComitente($dniComitente)
	{
	    $this->dniComitente = $dniComitente;
	}

	public function getCuilComitente()
	{
	    return $this->cuilComitente;
	}

	public function setCuilComitente($cuilComitente)
	{
	    $this->cuilComitente = $cuilComitente;
	}

	public function getLocalidadComitente()
	{
	    return $this->localidadComitente;
	}

	public function setLocalidadComitente($localidadComitente)
	{
	    $this->localidadComitente = $localidadComitente;
	}

	public function getCodigoPostalComitente()
	{
	    return $this->codigoPostalComitente;
	}

	public function setCodigoPostalComitente($codigoPostalComitente)
	{
	    $this->codigoPostalComitente = $codigoPostalComitente;
	}

	public function getTelefonoComitente()
	{
	    return $this->telefonoComitente;
	}

	public function setTelefonoComitente($telefonoComitente)
	{
	    $this->telefonoComitente = $telefonoComitente;
	}

	public function getRepresentanteComitente()
	{
	    return $this->representanteComitente;
	}

	public function setRepresentanteComitente($representanteComitente)
	{
	    $this->representanteComitente = $representanteComitente;
	}

	public function getSrcQRCode()
	{
	    return $this->srcQRCode;
	}

	public function setSrcQRCode($srcQRCode)
	{
	    $this->srcQRCode = $srcQRCode;
	}

	public function getPrimero()
	{
	    return $this->primero;
	}

	public function setPrimero($primero)
	{
	    $this->primero = $primero;
	}

	public function getSegundo()
	{
	    return $this->segundo;
	}

	public function setSegundo($segundo)
	{
	    $this->segundo = $segundo;
	}

	public function getCuarto()
	{
	    return $this->cuarto;
	}

	public function setCuarto($cuarto)
	{
	    $this->cuarto = $cuarto;
	}

	public function getQuinto()
	{
	    return $this->quinto;
	}

	public function setQuinto($quinto)
	{
	    $this->quinto = $quinto;
	}

	public function getPosFirmaComitente()
	{
	    return $this->posFirmaComitente;
	}

	public function setPosFirmaComitente($posFirmaComitente)
	{
	    $this->posFirmaComitente = $posFirmaComitente;
	}

	public function getSeguridadTexto()
	{
	    return $this->seguridadTexto;
	}

	public function setSeguridadTexto($seguridadTexto)
	{
	    $this->seguridadTexto = $seguridadTexto;
	}

	public function getPiePagina()
	{
	    return $this->piePagina;
	}

	public function setPiePagina($piePagina)
	{
	    $this->piePagina = $piePagina;
	}

	public function getTipoEncomienda()
	{
	    return $this->tipoEncomienda;
	}

	public function setTipoEncomienda($tipoEncomienda)
	{
	    $this->tipoEncomienda = $tipoEncomienda;
	}

	public function getObservaciones()
	{
	    return $this->observaciones;
	}

	public function setObservaciones($observaciones)
	{
	    $this->observaciones = $observaciones;
	}
}