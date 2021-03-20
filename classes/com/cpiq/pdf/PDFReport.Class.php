<?php
/**
 * Clase para construir reportes en PDF.
 *
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 *
 */
class PDFReport extends CdtPDFPrint {


	/**
	 * (non-PHPdoc)
	 * @see CdtPDFPrint#Header()
	 */
	function Header(){
		
		$maxWidth = ($this->w) - $this->lMargin - $this->rMargin;
		$y_comienzo = $this->tMargin;
		$this->y = $y_comienzo;
        $this->SetLineWidth(.4);
        $this->Cell($maxWidth, 38, '', 1, 0, 'C');
        
        
        $this->y = $y_comienzo;
        $this->Image(WEB_PATH . 'css/images/logo.jpg', $this->rMargin+2, $this->y + 2, 120, 35);
        
        $this->SetFontSize(10);
        $this->Ln(5);
        $this->Cell(185, 4, CdtUIUtils::encodeCharactersPDF('Av. Presidente Julio A. Roca 584 6ºpiso'), '', 0, 'R');
       	
       	$this->Ln(4);
        $this->Cell(185, 4, CdtUIUtils::encodeCharactersPDF('Ciudad Autónoma de Buenos Aires'), '', 0, 'R');
        $this->Ln(4);
        $this->Cell(185, 4, CdtUIUtils::encodeCharactersPDF('C1067ABN - Argentina'), '', 0, 'R');
        $this->Ln(4);
        $this->Cell(185, 4, CdtUIUtils::encodeCharactersPDF('E-mail: cpiq@cpiq.org.ar'), '', 0, 'R');
        $this->Ln(4);
        $this->Cell(185, 4, CdtUIUtils::encodeCharactersPDF('Teléfono: 011 4342-6677'), '', 0, 'R');
        $this->Ln(4);
        $this->Cell(185, 4, CdtUIUtils::encodeCharactersPDF('Fax: 011 4331-2304'), '', 0, 'R');
        $this->Ln(4);
        $this->Cell(185, 4, CdtUIUtils::encodeCharactersPDF('Web: www.cpiq.org.ar'), '', 0, 'R');
        
        
        
        

       
       
		
	
	}
	
function datosMatriculado(Matriculado $oMatriculado, $fecha){
		
		$maxWidth = ($this->w) - $this->lMargin - $this->rMargin;
                
       $this->SetFontSize(12);
		$this->Ln(9);
        $y_comienzo = $this->y;
        $this->SetLineWidth(.4);
    
        $this->Cell($maxWidth, CPIQ_REMITO_CUOTA_CUADRO, '', 1, 1, 'C');
                
        $this->SetLineWidth(.1);
        
         
        $this->Cell($maxWidth, CPIQ_REMITO_CUOTA_CUADRO, '', 0, 0, 'C');

         $this->y = $y_comienzo;
         	$this->Ln(8);
        $this->SetX(15);
        $this->Cell(25, 4, CPIQ_LBL_FECHA.':', 0, 0, 'L');
        $this->Cell(110, 4, CPIQUtils::formatDateToView($fecha), 0, 0, 'L');
       	$this->Ln(6);
        $this->SetX(15);
       	$this->Cell(25, 4, CdtUIUtils::encodeCharactersPDF(CPIQ_LBL_MATRICULADO).':', 0, 0, 'L');
        $this->Cell(110, 4, CdtUIUtils::encodeCharactersPDF($oMatriculado->getApellido().' '.$oMatriculado->getNombre()), 0, 0, 'L');
       	$this->Ln(6);
       	$this->SetX(15);
       	$this->Cell(25, 4, CdtUIUtils::encodeCharactersPDF(CPIQ_LBL_TITULO_MATRICULA).':', 0, 0, 'L');
       	$managerTitulo =  ManagerFactory::getTituloManager();
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
		$oCriteria->addFilter("tituloPrincipal", 1, "=" );
		$oTitulo = $managerTitulo->getEntity($oCriteria);
        if (!empty($oTitulo)) {
        	$this->Cell(110, 4, CdtUIUtils::encodeCharactersPDF($oTitulo->getTipoTitulo()->getSecuenciaTitulo()->getNombre().' '.$oTitulo->getMatricula()), 0, 0, 'L');
       		$this->Ln(6);
        }
		
		$this->SetX(15);
       	$this->Cell(25, 4, CdtUIUtils::encodeCharactersPDF(CPIQ_LBL_MATRICULADO_DOMICILIO).':', 0, 0, 'L');
       	$this->Cell(110, 4, CdtUIUtils::encodeCharactersPDF($oMatriculado->getDomicilio()), 0, 0, 'L');
       	$this->Ln(6);
	
	}

	public function parsearCabeceraRenglones() {
		$this->Ln(6);
       	$maxWidth = ($this->w) - $this->lMargin - $this->rMargin;
        $this->SetLineWidth(.4);
        //$this->columnsWidth = array(25, ($maxWidth) - 95, 35, 35);
        $columns = array(CPIQ_LBL_CUOTA_DETALLE, CPIQ_LBL_CUOTA_VALOR_IMPORTE);
        $this->SetFillColor(218, 218, 218);
        $this->SetX(10);
        $this->Cell(145, 8, $columns[0], 1, 0, 'C', 1);
        $this->Cell(45, 8, $columns[1], 1, 0, 'C', 1);
        
        //$this->SetFillColor(255, 255, 255);
        
        //$this->Ln();
        
    }
	
	public function parsearRenglones($detalle, $importe) {

		$this->Ln(6);

       	$maxWidth = ($this->w) - $this->lMargin - $this->rMargin;

        $this->SetLineWidth(.4);

        //$this->columnsWidth = array(25, ($maxWidth) - 95, 35, 35);

        $columns = array(CPIQ_LBL_CUOTA_DETALLE, CPIQ_LBL_CUOTA_VALOR_IMPORTE);

        $this->SetFillColor(218, 218, 218);

        $this->SetX(10);

        $this->Cell(145, 8, $columns[0], 1, 0, 'C', 1);

        $this->Cell(45, 8, $columns[1], 1, 0, 'C', 1);

        $this->Ln(8);

        //$this->SetFillColor(255, 255, 255);

        $this->Cell(145, 8, CdtUIUtils::encodeCharactersPDF($detalle), 1, 0, 'L');

        $this->Cell(45, 8, CPIQUtils::formatMontoToView($importe), 1, 0, 'C');

        //$this->Ln();

        

    }
    
    
	public function parsearRenglonesCuota($detalle, $importe) {
		$this->Ln(8);
        //$this->SetFillColor(255, 255, 255);
        $this->Cell(145, 8, CdtUIUtils::encodeCharactersPDF($detalle), 1, 0, 'L');
        $this->Cell(45, 8, CPIQUtils::formatMontoToView($importe), 1, 0, 'C');
        //$this->Ln();
        
    }
	
	/**
	 * (non-PHPdoc)
	 * @see CdtPDFPrint#Footer()
	 */
	function Footer(){
		//Posici�n: a 1,5 cm del final
		//$this->SetY(-15);
		//Arial italic 8
		//$this->SetFont('Arial','I',8);
		//t�tulo del listado
		//$this->Cell(10,10, CDT_UI_PDF_APP_NAME." / " . $this->title ,0,0,'L');
		//$this->Cell(0,10, $this->lblPage.' '.$this->PageNo() ,0,0,'C');
		//N�mero de p�gina
		//$this->Cell(0,10, $this->lblPage.' '.$this->PageNo() ,0,0,'R');
	}

	

}
