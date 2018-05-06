<?php
$email_message = "Detalles del  de contacto:\n\n";
$email_message .= "Nombre: " . $_POST['nombre'] . "\n";
$email_message .= "Telefono: " . $_POST['telefono'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
$email_message .= "Mensaje: " . $_POST['mensaje'] . "\n\n";
$email_remitente= $_POST['email'];

if(empty($_POST)){
 echo "Mensaje no enviado";
	echo "<script languaje=javascript>alert('Manera incorrecta de consultar al SOPORTE de APLICACIONES LC')
       window.location.href='contacto.html';	</script>";
}else{

//$mail = "Prueba de mensaje";
//Titulo
$titulo = "INFORMES APLICACIONES LC";
//cabecera
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From:<". $email_remitente .">\r\n";
//Enviamos el mensaje a tu_dirección_email 
$bool = mail("aplicaciones.1lc@gmail.com,soporte_alc@aplicacioneslc.xyz",$titulo,$email_message,$headers);
if($bool){
    echo "Mensaje enviado";
	echo "<script languaje=javascript>alert('Tu Consulta fue enviada en breve APLICACIONES LC se pondra en contacto'); 
	window.location.href='index.html'; </script>";
}else{
    echo "Mensaje no enviado";
	echo "<script languaje=javascript>alert('Tu Consulta no fue enviada vuelve a intentar de lo contrario comunicate a los correos mostrados')
       window.location.href='contacto.html';	</script>";
}
}
?>