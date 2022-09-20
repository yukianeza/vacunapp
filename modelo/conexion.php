<?php 

class Db {
    private $hostname = "localhost";
    private $database = "vacunapp";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";

    function conectar(){

      try{

        $conexion = "mysql:host=".$this->hostname.";dbname=".$this->database.";charset=utf8";
        $options = [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $pdo = new PDO($conexion,$this->username,$this->password,$options);

        return $pdo;

      } catch(PDOException $e){

        echo 'Error conexion' . $e->getMessage();

      }


    }
}

?>