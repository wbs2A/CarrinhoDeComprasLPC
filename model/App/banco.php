<?php

/**
 * Class do Banco 
 *controla e retorna a instancia do banco
 */
class Banco{
	private $nome = "carrinho";
	private $user = "PW_user";
	private $password = "aula_userPw";
	private static $instance;
	public static function getInstance() {
        if ( !self::$instance ){
            self::$instance = new PDO('mysql:host=localhost;port=3306;dbname='.(new Banco)->getNome(),(new Banco)->getUser(),(new Banco)->getPassword());
        	self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
    public function getNome(){
    	return $this->nome;
    }
    public function getUser(){
    	return $this->user;
    }
    public function getPassword(){
    	return $this->password;
    }
}
?>