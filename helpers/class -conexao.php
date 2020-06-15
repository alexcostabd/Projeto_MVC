<?php


class ConexaoOracle
{

    public $host = "localhost"; 
    public $usuario = "USER_MVC";   
    public $senha = "alex";
    public $porta = "1521";
    public $conn = "";


    public function __construct($host, $usuario, $senha, $porta, $conn)
    {     

       try 
       {
            $conn = new PDO("oci:dbname=//$host:$porta", $usuario, $senha);
       } 
        catch (PDOException $e) {
            echo "Erro de Conexão: " . $e->getMessage() . "<\br>";
            exit;
       }

       unset($conn);
    }



    

    

}





?>

