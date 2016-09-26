<?php
ob_start();
session_start();
// login
if(!isset($_SESSION['usuarioTeste']) && (!isset($_SESSION['senhaTeste']))){
	header("Location: index.php?acao=negado");exit;
}

if($_SESSION['nivelUse'] < 2){
	echo '<div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert">×</button>
         <strong>Acesso não pernitido!</strong> Seu nivel não tem permição.
         </div>';
	header("Location: ../index.php?acao=negado");exit;
}

	include("conexao/conecta.php");
	include("includes/logout.php");

	
	$usuarioLogado = $_SESSION['usuarioTeste'];
	$senhaLogado = $_SESSION['senhaTeste'];
	
// seleciona a usuario logado
		$selecionaLogado = "SELECT * from login WHERE usuario=:usuarioLogado AND senha=:senhaLogado";
		try{
			$result = $conexao->prepare($selecionaLogado);	
			$result->bindParam('usuarioLogado',$usuarioLogado, PDO::PARAM_STR);		
			$result->bindParam('senhaLogado',$senhaLogado, PDO::PARAM_STR);		
			$result->execute();
			$contar = $result->rowCount();	
			
			if($contar =1){
				$loop = $result->fetchAll();
				foreach ($loop as $show){
					$nomeLogado = $show['nome'];
					$userLogado = $show['usuario'];
					$emailLogado = $show['email'];
					$senhaLogado = $show['senha'];
					$nivelLogado = $show['nivel'];
				}
				
				$_SESSION['nivelUse'] = $nivelLogado;

			}
			
			}catch (PDOWException $erro){ echo $erro;}
	
?>

<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<title>SKYHUB System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<script src="js/jquery-1.7.2.min.js"></script>     
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>