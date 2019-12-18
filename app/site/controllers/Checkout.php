<?php

namespace App\site\controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
	
require "vendor/autoload.php";

if(!defined('URL')){
    header("location: /");
    exit();
}

class Checkout{
    public function index(){
	    if(isset($_SESSION['user'])){
	    	if(!empty($_SESSION['carrinho'])){
		    	$verEndereco = new \Site\models\Endereco();
		        $this->dados['endereco'] = $verEndereco->verEndereco("", true);

		        $carregarView = new \Config\ConfigView("checkout/index", $this->dados);
		        $carregarView->renderizar();
		    }
	        else{
				$_SESSION['msg'] = "<div id='message_div' class='alert alert-danger container'>Não ha produtos no carrinho!</div>";
				$urlDestino = URL . 'carrinho/index';
        		header("Location: $urlDestino");	
			}
	    }
	    else{
	    	$urlDestino = URL . 'carrinho/index';
        	header("Location: $urlDestino");
	    	echo '<script>
	    			$(function () {
			            document.getElementById("loginModal").style.display="block";
			        });
			    </script>';
			$carregarView = new \Config\ConfigView("checkout/index");
	        $carregarView->renderizar();
	    }
	}
	public function finalizarCompra(){
		$this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		if(isset($_SESSION['user'])){
			$verEndereco = new \Site\models\Endereco();
	        $this->dados['endereco'] = $verEndereco->verEndereco("", true);

	        $this->dados['idEndereco'] = $this->dados['endereco'][0]['idEndereco'];
	        unset($this->dados['endereco'], $this->dados['paymentMethod']);

	        $addPedido = new \Site\models\Pedido($this->dados);
			$addPedido->addPedido($this->dados);

			$urlDestino = URL . 'listarPedidosCliente/index';
			header("Location: $urlDestino");

	    }
	    else{
	    	$urlDestino = URL . 'home/index';
        	header("Location: $urlDestino");
	    }
	}
	
	public function sendEmail(){
		$mail = new PHPMailer();
		try {
			//Server settings
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'renangomespoggian@gmail.com';                     // SMTP username
			$mail->Password   = 'renanebruna';                               // SMTP password
			$mail->SMTPSecure = 'tls';      // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail->Port       = 587;                                    // TCP port to connect to

			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
					)
				);
		
			//Recipients
			$mail->setFrom('nicepoggian@gmail.com', 'Valdenice');
			$mail->addReplyTo('renanpoggiangomes@hotmail.com');
			$mail->addAddress('renanpoggiangomes@gmail.com', 'Renan');     // Add a recipient
			
			$usuario = strtolower($_SESSION['user']);
			$mail->addAttachment('./assets/img/usuario/'.$_SESSION['id'].'/'.$usuario.'.jpg', 'fotoPerfil.jpg');

			echo './assets/img/usuario/'.$_SESSION['id'].'/'.$usuario.'.jpg', 'fotoPerfil.jpg';

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Teste PHPMailer';
			$mail->Body    = 'Olá '.$_SESSION['user'].'!';
			$mail->AltBody = 'Este email é um <strong>TESTE</strong>';
		
			$mail->send();
			echo 'Message has been sent';
			exit();
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
}