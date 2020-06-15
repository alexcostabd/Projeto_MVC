
<?php

// classes base 
require_once ('system/class.Controller.mvc.php'); 
require_once ('system/class.Model.mvc.php'); 
require_once ('system/class.View.mvc.php'); 

// models
require_once ('app/model/class.LoginModel.mvc.php'); 
require_once ('app/model/class.ProdutoModel.mvc.php'); 
require_once ('app/model/class.FabricanteModel.mvc.php'); 
require_once ('app/model/class.LinhaModel.mvc.php'); 

// controllers 
require_once("app/controller/class.IndexController.mvc.php"); 
require_once("app/controller/class.ProdutoController.mvc.php"); 
require_once("app/controller/class.LoginController.mvc.php");


// classes obrigatórias
require_once ('helpers/class.BD.mvc.php'); 
require_once ('helpers/class.TemplatePower.mvc.php'); 
require_once ('helpers/class.Upload.mvc.php');


// configuração sistema 
require_once ('system/config.mvc.php');


// controlador e método default
$classe = "IndexController"; 
$metodo = "Index"; 


// ou aqueles que forem informados 
if(isset($_REQUEST['controlador'])) { 
    $controlador = $_REQUEST['controlador']; 
    $classe = $controlador . 'Controller'; 
    if(isset($_REQUEST['metodo'])) { 
        $metodo = $_REQUEST['metodo']; 
    } 
}


// Executa o controlador 
$controlador = new $classe(); 
$controlador->$metodo();




?>