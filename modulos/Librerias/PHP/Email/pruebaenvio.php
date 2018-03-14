<html>
<head>
<title>PHPMailer - SMTP basic test with authentication</title>
</head>
<body>

<?php

//error_reporting(E_ALL);
error_reporting(E_STRICT);
date_default_timezone_set('America/Lima');

$destinatario="jsalcedo@hdec.pe";
                            
                require_once 'class.phpmailer.php';
                
                $mail = new PHPMailer ();
                
                                
                
                $asunto="saludos";
				$cuerpo="prueba del mensaje";
                $mail -> From = "MUNICIPIA";
                $mail -> FromName = "MUNICIPIA-GESTION FINANCIERA"; 
                $mail -> AddAddress($destinatario);
                $mail -> Subject = $asunto;
                $mail -> Body = $cuerpo;
                $mail -> IsHTML(true);
                
                
               
                $contenido = " aver prueba peuba";
               //fclose($file);
                
                //$mail->AddStringAttachment($contenido, '{$archivo}.txt', 'base32', 'text/plain');
                //$mail->AddStringAttachment($contenido, "{$archivo}.txt");
        
                $mail->IsSMTP();
               
                        $mail->Host = 'ssl://smtp.gmail.com';
                        $mail->Port = 465;
                        $mail->SMTPAuth = true;
                        $mail->Username = 'sistemaqb2@gmail.com';
                        $mail->Password = 'sistemaqubos2';
                      
                $bien = $mail->Send();
                if($bien)
                {
                        echo "Mensaje Enviado a :$destinatario <br />";        
                }
				else{
						echo "Mensaje no enviado";
				}

             
                
        
        

?>

</body>
</html>
