<?php
	require("PHPMailer/src/PHPMailer.php");
    require("PHPMailer/src/SMTP.php");
    require("PHPMailer/src/Exception.php");
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	
    // Criando nossas variáveis para guardar as informações do formulário
    $nome= $_POST['nome'];
    $email= $_POST['email'];
    $msg= $_POST['comment'];
    // formatando nossa mensagem (que será envaida ao e-mail)
    $mensagem= 'Esta mensagem foi enviada através do formulário<br><br>';
    $mensagem.='<b>Nome: </b>'.$nome.'<br>';
    $mensagem.='<b>E-Mail:</b> '.$email.'<br>';
    $mensagem.='<b>Mensagem:</b><br> '.$msg;
    // abaixo as requisições do arquivo phpmailer
    
    // chamando a função do phpmailer

	$mail = new PHPMailer();
    $mail->isSMTP(); // Não modifique
    $mail->Host       = 'smtp.gmail.com';  // SEU HOST (HOSPEDAGEM)
    $mail->SMTPAuth   = true;                        // Manter em true
    $mail->Username   = 'toyanjugurung2001@gmail.com';   //SEU USUÁRIO DE EMAIL
    $mail->Password   = '123';                   //SUA SENHA DO EMAIL SMTP password
    $mail->Port       = 587;     //TCP PORT, VERIFICAR COM A HOSPEDAGEM
    $mail->CharSet = 'UTF-8';    //DEFINE O CHARSET UTILIZADO
    
    //Recipients
    $mail->setFrom('toyanjugurung2001@gmail.com');  //DEVE SER O MESMO EMAIL DO USERNAME
    $mail->addAddress('toyanjugurung2001@gmail.com');     // QUAL EMAIL RECEBERÁ A MENSAGEM!
    // $mail->addAddress('ellen@example.com');    // VOCÊ pode incluir quantos receptores quiser

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Restaurante-Contacts'; //ASSUNTO
    $mail->Body    = $mensagem;  //CORPO DA MENSAGEM

    // $mail->send();
    if(!$mail->Send()) {
        echo "<script>alert('Erro ao enviar o E-Mail');</script>";
     }else{
        echo "<script>alert('E-Mail enviado com sucesso!');</script>";
     }
     die
?>
