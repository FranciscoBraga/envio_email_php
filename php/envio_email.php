<?php

	/**
	 * 
	 */
	class Email 
	{
		private $para = null;
		private $assunto = null;
		private $mensagem = null;
		
		 public function __set($atrr, $value)
		{
			$this->$atrr = $value;
		}

		public function EmailValidao()
		{
			if(empty($this->para) || empty($this->assunto) ||empty($this->mensagem)){
				return false;
			}
			else{
				return true;
			}
		}
	}


	$novoEmail = new Email();

	$novoEmail->__set('para',$_POST['para']);
	$novoEmail->__set('assunto',$_POST['assunto']);
	$novoEmail->__set('mensagem',$_POST['mensagem']);

	if($novoEmail->EmailValidao()){
		echo "Email válido";
	}else
	{
		echo "Email Inválido";
	}