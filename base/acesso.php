<?php	
	try {
	    ///$db = new PDO("mysql:host=127.0.0.1;dbname=gestor", "gsyst796_elias");
			//$db = new PDO("mysql:host=br782.hostgator.com.br;port=3306;dbname=gsyst796_gestor;charset=utf8", "gsyst796_elias2", "123456");
		$db = new PDO("mysql:host=50.116.87.138;port=3306;dbname=gsyst796_gestor;", "gsyst796_elias2", "#Zx32vb200");
	} catch (PDOException $e) {
	    echo 'Connection failed: ' . $e->getMessage();
	    exit();
	}
 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	date_default_timezone_set('America/Sao_Paulo');

	$db->exec("set names utf8");
	$db->exec("set character_set_results=utf8");
	$db->exec("set character_set_client=utf8");
	$db->exec("set character_set_connection=utf8");

	/**
	* Função para gerar senhas aleatórias
	*
	* @author    Thiago Belem <contato@thiagobelem.net>
	*
	* @param integer $tamanho Tamanho da senha a ser gerada
	* @param boolean $maiusculas Se terá letras maiúsculas
	* @param boolean $numeros Se terá números
	* @param boolean $simbolos Se terá símbolos
	*
	* @return string A senha gerada
	*/
	
	function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
	{
		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '1234567890';
		$simb = '!@#$%*-';
		$retorno = '';
		$caracteres = '';
		$caracteres .= $lmin;
		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		if ($simbolos) $caracteres .= $simb;
		$len = strlen($caracteres);
		for ($n = 1; $n <= $tamanho; $n++) {
			$rand = mt_rand(1, $len);
			$retorno .= $caracteres[$rand-1];
		}
		return $retorno;
	}

	function encrypt($data, $key){
		$salt = 'A3jdh$4D8gkb#2T7&sM40bn4A7fvv35cf=b48On=84c!623Vvf6vi37vb34@3kf%';
		$key = substr(hash('sha256', $salt.$key.$salt), 0, 32);
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $data, MCRYPT_MODE_ECB, $iv));
		return $encrypted;
	}

	function decrypt($data, $key){
		$salt = 'A3jdh$4D8gkb#2T7&sM40bn4A7fvv35cf=b48On=84c!623Vvf6vi37vb34@3kf%';
		$key = substr(hash('sha256', $salt.$key.$salt), 0, 32);
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($data), MCRYPT_MODE_ECB, $iv);
		return $decrypted;
	}
?>