<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myemail extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
    }


////////////////////////////////////////////////////////////////////////////////////////

	public function mailRegistro($usr)
	{
		//cargamos la libreria email de ci
		$this->load->library("email");
 
		$this->email->set_mailtype("html");
		$this->email->from('no-reply@aprovechando.com', 'Aprovechando');
		$this->email->to('aprovechando@hotmail.com');
		$this->email->cc('aprovechando@gmail.com'); 
		$this->email->bcc('luiceron@hotmail.com'); 
		$this->email->subject('Nuevo registro de estudiante!');

		
		$this->email->message('
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Correo de registro en saprovechando.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		</head>
		<body style="margin: 0; padding: 0;">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">	
				<tr>
					<td style="padding: 10px 0 30px 0;">
					  <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
							<tr>
								<td align="center" bgcolor="#98AE00" style="padding: 15px 0 15px 0; color: #153643; font-size: 18px; font-weight: bold; font-family: Arial, sans-serif;">&nbsp;</td>
							</tr>
							<tr>
								<td height="150" bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;"><b>Nuevo registro de estudiante!</b></td>
										</tr>
										<tr>
											<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
											<p>Hola, el estudiante <strong>'.$usr['nombres'].'</strong> con id número <strong>'.$usr['id_estudiante'].'</strong> se ha registrado en el sistema.</p>    
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td height="78" bgcolor="#ee4c50" style="padding: 15px 30px 15px 30px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
												&reg; aprovechando.com, copyrigh '.date('Y').'<br/></td>
											<td align="right" width="25%">
												<table border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">&nbsp;</td>
														<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
														<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">&nbsp;</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</body>
		</html>');
		$this->email->send();
		//con esto podemos ver el resultado
		return $this->email->print_debugger();
	}	

////////////////////////////////////////////////////////////////////////////////////////

	public function mailRegistroUsuario($usr)
	{
		//cargamos la libreria email de ci
		$this->load->library("email");
 
		$this->email->set_mailtype("html");
		$this->email->from('no-reply@aprovechando.com', 'Aprovechando');
		$this->email->to($usr['_username']);
		$this->email->subject('Registro exitoso!');

		
		$this->email->message('
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Correo de registro en solucionesvidacolombia.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		</head>
		<body style="margin: 0; padding: 0;">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">	
				<tr>
					<td style="padding: 10px 0 30px 0;">
					  <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
							<tr>
								<td align="center" bgcolor="#98AE00" style="padding: 15px 0 15px 0; color: #153643; font-size: 18px; font-weight: bold; font-family: Arial, sans-serif;">&nbsp;</td>
							</tr>
							<tr>
								<td height="150" bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;"><b>Registro exitoso!</b></td>
										</tr>
										<tr>
											<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
											<p>Hola <strong>'.$usr['nombres'].'</strong>, Bienvenido a Aprovechando.com</p>
								            <ul>
								                <li>Ahora podrá obtener acceso a nuestras ofertas.  <br>

								                </li>
								            </ul>    
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td height="78" bgcolor="#ee4c50" style="padding: 15px 30px 15px 30px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
												&reg; aprovechando.com, copyrigh '.date('Y').'<br/></td>
											<td align="right" width="25%">
												<table border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">&nbsp;</td>
														<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
														<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">&nbsp;</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</body>
		</html>');
		$this->email->send();
		//con esto podemos ver el resultado
		return $this->email->print_debugger();
	}	


////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////////////

	public function mailInfo()
	{
		//cargamos la libreria email de ci
		$this->load->library("email");
		
		/*
				//configuracion para gmail
				$configGmail = array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.gmail.com',
					'smtp_port' => 465,
					'smtp_user' => 'donceron@gmail.com',
					'smtp_pass' => 'cuentagmail',
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'newline' => "\r\n"
				);    
		 
				//cargamos la configuración para enviar con gmail
				$this->email->initialize($configGmail);
		*/

		$this->email->set_mailtype("html");
		$this->email->from('no-reply@solucionesvidacolombia.com', 'Soluciones Vida Colombia');
		$this->email->to('luiceron@hotmail.com');
		$this->email->subject('Registro exitoso.');


		$this->email->subject('Correo de Prueba');
		
		$this->email->message('
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Correo de registro en solucionesvidacolombia.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		</head>
		<body style="margin: 0; padding: 0;">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">	
				<tr>
					<td style="padding: 10px 0 30px 0;">
					  <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
							<tr>
								<td align="center" bgcolor="#98AE00" style="padding: 15px 0 15px 0; color: #153643; font-size: 18px; font-weight: bold; font-family: Arial, sans-serif;">&nbsp;</td>
							</tr>
							<tr>
								<td height="150" bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;"><b>Registro exitoso!</b></td>
										</tr>
										<tr>
											<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
											<p>Saludos <strong></strong>, para continuar con su examen en linea, usted debe completar los siguientes pasos:</p>
								            <ul>
								                <li>Realizar el proceso de pago.  <br>

								                    Consignación en efecty de $20.000 mas valor del envío a nombre de Jose Elber Garzon C.C. 93.290.131 a la ciudad de Armenia.<br><br>
								                </li>
								                <li>Enviar el comprobante de pago al correo electrónico solucionesvidacolombia@hotmail.com</li>
								            </ul>    
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td height="78" bgcolor="#ee4c50" style="padding: 15px 30px 15px 30px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
												&reg; sulucionesvidacolombia, copyrigh 2015<br/></td>
											<td align="right" width="25%">
												<table border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">&nbsp;</td>
														<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
														<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">&nbsp;</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</body>
		</html>');
		$this->email->send();
		
		//con esto podemos ver el resultado
		//var_dump($this->email->print_debugger());

		return $this->email->print_debugger();
	}	

	
}


