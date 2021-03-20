<?php

/**
 * Utilidades para el sistema.
 *
 * @author bernardo
 * @since 27-02-2013
 */
class CPIQUtils {
	

	/**
	 * se formateo un monto a visualizar
	 * @param $monto
	 * @return string
	 */
	public static function formatMontoToView( $monto ){

		if( empty($monto) )
		$monto = 0;

		$res = $monto;
		//si es negativo, le quito el signo para agregarlo antes de la moneda.
		if( $monto < 0 ){
			$res = $res * (-1);
		}
			
		$res = number_format ( $res , CPIQ_DECIMALES , CPIQ_SEPARADOR_DECIMAL, CPIQ_SEPARADOR_MILES );

		if( CPIQ_MONEDA_POSICION_IZQ ){
			$res = CPIQ_MONEDA_SIMBOLO . $res;
				
		}else
		$res = $res. CPIQ_MONEDA_SIMBOLO ;

		//si es negativo lo mostramos rojo y le agrego el signo.
		if( $monto < 0 ){
			$res = "<span style='color:red;'>- $res</span>";
		}

		return $res;
	}


	//Formato fecha yyyy-mm-dd
	public static function differenceBetweenDates($fecha_fin, $fecha_Ini, $formato_salida = "d") {
		$f0 = strtotime($fecha_fin);
		$f1 = strtotime($fecha_Ini);
		if ($f0 < $f1) {
			$tmp = $f1;
			$f1 = $f0;
			$f0 = $tmp;
		}
		return date($formato_salida, $f0 - $f1);
	}


	public static function getFilterOptionItems($oManager, $valueProperty, $labelProperty, $ds_field="", $labelFilter="", $valueFilter="") {

		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addOrder($labelProperty, "ASC");
		if ($labelFilter!="") {
			$oCriteria->addFilter($labelFilter, $valueFilter, '=');
		}
		$entities = $oManager->getEntities($oCriteria);
		
		$items = array();
		foreach ($entities as $oEntity) {
			$value = CdtReflectionUtils::doGetter($oEntity, $valueProperty);
			if ($ds_field!="") {
				$labelProperty = $ds_field;
			}
			$label = CdtReflectionUtils::doGetter($oEntity, $labelProperty);
			$items[$value] = $label;
		}
		return $items;
	}
	
	public static function getFilterOptionCriteriaItems($oManager, $valueProperty, $labelProperty, $oCriteria) {

		
		$oCriteria->addOrder($labelProperty, "ASC");
		if ($labelFilter!="") {
			$oCriteria->addFilter($labelFilter, $valueFilter, '=');
		}
		$entities = $oManager->getEntities($oCriteria);
		
		$items = array();
		foreach ($entities as $oEntity) {
			$value = CdtReflectionUtils::doGetter($oEntity, $valueProperty);
			if ($ds_field!="") {
				$labelProperty = $ds_field;
			}
			$label = CdtReflectionUtils::doGetter($oEntity, $labelProperty);
			$items[$value] = $label;
		}
		return $items;
	}

	public static function getUserGroupItems() {

		return self::getFilterOptionItems(new CdtUserGroupManager(), "cd_usergroup", "ds_usergroup");
	}


	public static function getYesNoItems() {
		return array("false" => "No", "true" => "Si");
	}
	
	


	public static function formatDateToView($value) {

		if (!empty($value)) {
			$dt = date(CPIQ_DATE_FORMAT, strtotime($value));
		}else
		$dt = "";

		return $dt;
	}

	public static function formatDateToPersist($value) {
		$value = str_replace('/', '-', $value);
		if (!empty($value))
		$dt = date("Y-m-d H:i:s", strtotime($value));
		else
		$dt = "";

		return $dt;
	}

	public static function formatDateTimeToView($value) {

		if (!empty($value)) {
			$dt = date(CPIQ_DATETIME_FORMAT, strtotime($value));
		}else
		$dt = "";

		return $dt;
	}

	public static function formatDateTimeToPersist($value) {

		if (!empty($value))
		$dt = date("Y-m-d H:i:s", strtotime($value));
		else
		$dt = "";

		return $dt;
	}

	public static function addDays($date, $dateFormat, $days){

		$newDate = strtotime ( "+$days day" , strtotime ( $date ) ) ;
		$newDate = date ( $dateFormat , $newDate );

		return $newDate;
	}

	public static function substractDays($date, $dateFormat, $days){

		$newDate = strtotime ( "-$days day" , strtotime ( $date ) ) ;
		$newDate = date ( $dateFormat , $newDate );

		return $newDate;
	}

	public static function isSameDay( $dt_date, $dt_another){

		$dt_dateAux = strtotime ( $dt_date ) ;
		$dt_dateAux = date ( "Ymd" , $dt_dateAux );

		$dt_anotherAux = strtotime ( $dt_another ) ;
		$dt_anotherAux = date ( "Ymd" , $dt_anotherAux );

		return $dt_dateAux == $dt_anotherAux ;
	}


	public static function validateEntity( $dao, $entity, $msg ){

		if( $entity == null || $entity->getOid()==null )
		throw new GenericException( $msg);

		$entity = $dao->getEntityById($entity->getOid());
		if( $entity == null )
		throw new GenericException( $msg );
			
		return $entity;
	}

			
	public static function getTiposTituloItems() {

		return self::getFilterOptionItems( ManagerFactory::getTipoTituloManager(), "oid", "nombre");

	}
	
	public static function getRegistrosItems($matriculado_oid) {
		 $tRegistro = DAOFactory::getRegistroDAO()->getTableName();
		return self::getFilterOptionItems( ManagerFactory::getRegistroMatriculadoManager(), "oid", "$tRegistro.nombre", "registro.nombre","matriculado_oid",$matriculado_oid);

	}
	
	public static function getTitulosItems($matriculado_oid) {
		 $tTipoTitulo = DAOFactory::getTipoTituloDAO()->getTableName();
		return self::getFilterOptionItems( ManagerFactory::getTituloManager(), "oid", "$tTipoTitulo.nombre", "tipoTitulo.nombre","matriculado_oid",$matriculado_oid);

	}
	
	public static function getTiposDocumentoItems() {

		
		
		$options = self::getFilterOptionItems( ManagerFactory::getTipoDocumentoManager(), "oid", "nombre");
		
		return $options;

	}
	
	public static function getClasesTituloItems() {
		
		$options = self::getFilterOptionItems( ManagerFactory::getClaseTituloManager(), "oid", "nombre");
		
		return $options;

	}
	
	public static function getTiposEstadoEncomiendaItems() {
		
		$options = self::getFilterOptionItems( ManagerFactory::getTipoEstadoEncomiendaManager(), "oid", "nombre");
		
		return $options;

	}
	
	public static function getTiposPagoItems() {
		
		$options = self::getFilterOptionItems( ManagerFactory::getTipoPagoManager(), "oid", "nombre");
		
		return $options;

	}
	
	public static function getSecuenciasTituloItems() {
		
		$options = self::getFilterOptionItems( ManagerFactory::getSecuenciaTituloManager(), "oid", "nombre");
		
		return $options;

	}
	
		
	public static function getTiposAsignadoItems() {

		
		
		$options = self::getFilterOptionItems( ManagerFactory::getTipoAsignadoManager(), "oid", "nombre");
		
		return $options;

	}
	
	public static function getEstadosMatriculadoItems() {
		
		$options = self::getFilterOptionItems( ManagerFactory::getEstadoMatriculadoManager(), "oid", "nombre");
		
		return $options;

	}
	
	public static function getConceptosItems() {
		
		$options = self::getFilterOptionItems( ManagerFactory::getConceptoManager(), "oid", "nombre");
		
		return $options;

	}
	
	public static function getConceptosSinBloquearItems() {
		$oCriteria = new CdtSearchCriteria();
		
		$oCriteria->addFilter("bloqueado", 0, "=" );
		$options = self::getFilterOptionCriteriaItems( ManagerFactory::getConceptoManager(), "oid", "nombre", $oCriteria);
		
		return $options;

	}
	
	public static function sendMailPop($nameTo, $to, $subject, $msg, $attachs=array()) {


        require_once(CDT_EXTERNAL_LIB_PATH . "mailer/class.phpmailer.php");
        require_once(CDT_EXTERNAL_LIB_PATH . "mailer/class.smtp.php");


        //para que no de la salida del mailer.
        ob_start();

        $mail = new PHPMailer();

        $mail->From = CDT_POP_MAIL_FROM;
        $mail->FromName = CDT_POP_MAIL_FROM_NAME;
        $mail->Host = CDT_POP_MAIL_HOST;
        $mail->Mailer = CDT_POP_MAIL_MAILER;
        $mail->Username = CDT_POP_MAIL_USERNAME;
        $mail->Password = CDT_POP_MAIL_PASSWORD;
        $mail->SMTPAuth = true;
        $mail->Subject = $subject;
        
        $mail->PluginDir = CDT_EXTERNAL_LIB_PATH."/mailer/";
		$mail->Sender = CDT_POP_MAIL_FROM;
		$mail->AddReplyTo(CDT_POP_MAIL_FROM);
		$mail->IsHTML(true);
		
		$body = $msg;

        $mail->Body = $body;
        $mail->AltBody = $body;

        $mail->AddAddress($to, $nameTo);
		/*if ($attach!="") {
			$mail->AddAttachment($attach);
		}*/
        foreach ($attachs as $attach) {
        	$mail->AddAttachment($attach);
        }
        
        if (!$mail->Send())
            throw new GenericException("Ocurriï¿½ un error en el envï¿½o del mail a $nameTo <$to>");

        // Clear all addresses and attachments for next loop
        $mail->ClearAddresses();
        $mail->ClearAttachments();

        //para que no de la salida del mailer.
        ob_end_clean();
    }

    public static function sendMail($nameTo, $to, $subject, $msg, $attachs=array()) {

    	//FIXME para tests todos los mails me los envï¿½o a mi.
    	//$to = "marcospinero@yahoo.com.ar";
    	
        if (CDT_MAIL_ENVIO_POP)
            self::sendMailPop($nameTo, $to, $subject, $msg, $attachs);
        else {

            //para que no de la salida del mailer.
            ob_start();

            $to2 = $nameTo . " <" . $to . ">";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: " . CDT_POP_MAIL_FROM;

            if (!mail($to2, $subject, $msg, $headers)){
                self::log_error("Ocurriï¿½ un error en el envï¿½o del mail a $to2") ;
            	throw new GenericException("Ocurriï¿½ un error en el envï¿½o del mail a $to2");
            }
            //para que no de la salida del mailer.
            ob_end_clean();
        }
    }
	
	/**
	 * dado un texto se genera un cÃ³digo QR
	 * 
	 * @param string $texto informaciÃ³n para el cÃ³digo QR
	 * @return nombre del archivo png generado
	 */
    public static function generarQRCode($texto){
    	
    	include_once CDT_EXTERNAL_LIB_PATH . "/phpqrcode/qrlib.php";
    	
    	$tempDir = APP_PATH . "qrcode_temp/";
	    $webTempDir = WEB_PATH . "qrcode_temp/";
		$fileName = time() . ".png";
		
	    //generamos el png
	    QRcode::png($texto, $tempDir.$fileName, QR_ECLEVEL_L, 2);
	    
	    //retornamos la url de la imagen generada.
	    return $webTempDir. $fileName; 
	
	} 
	
	public static function login(Matriculado $oMatriculado) {
    	/*
    	session_start();
		$newsessid =  mt_rand(0, 99999);
		session_id($newsessid);
    	*/
        $_SESSION [APP_NAME]["ds_nombre"] = $oMatriculado->getNombre();
        $_SESSION [APP_NAME]["ds_apellido"] = $oMatriculado->getApellido();
        $_SESSION [APP_NAME]["cd_matriculado"] = $oMatriculado->getOid();
       
    }

   
    
    public static function logout() {
        $_SESSION [APP_NAME]['cd_matriculado'] = null;
        unset($_SESSION [APP_NAME]['cd_matriculado']);
        unset($_SESSION [APP_NAME]['ds_matriculado']);
       
    }

    public static function getMatriculadoLogged() {
        
    	$data = CdtUtils::getParamSESSION( APP_NAME );
    	
    	$oMatriculado = new Matriculado();
        $oMatriculado->setOid($data["cd_matriculado"]);
        $oMatriculado->setNombre($data["ds_nombre"]);
        $oMatriculado->setApellido($data["ds_apellido"]);
       
        return $oMatriculado;
    }

    public static function isMatriculadoLogged() {
    	
    	$data = CdtUtils::getParamSESSION(APP_NAME);
		
		$logueado =  ($data != "");
		
		if( $logueado ){
			$logueado = isset($data["cd_matriculado"]) && !empty($data["cd_matriculado"]); 
		}
		
		return $logueado;
    }
    
	public static function edad($hoy, $edad){
		CdtUtils::log('Hoy: '.$hoy.' - Matriculacion: '.$edad); 
		list($anio,$mes,$dia) = explode("-",$edad);
		list($anioH,$mesH,$diaH) = explode("-",$hoy);
		$anio_dif = $anioH - $anio;
		$mes_dif = $mesH - $mes;
		$dia_dif = $diaH - $dia;
		if ($dia_dif < 0 || $mes_dif < 0)
		$anio_dif--;
		CdtUtils::log('Años: '.$anio_dif);
		return $anio_dif;
	}
}
