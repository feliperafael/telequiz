<?php
require_once("classes/load.php");

	$login = new modelUserLogin();
	if($login->verificaLogado()){
		//echo 'Logado';
		
	}else{
		//echo 'Deslogado';
		//header("Location:login.php"); 
	
	
	}
	//unset($_POST);
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TeleQuiz</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php include_once("template/menu_topo.php");?>
		
	
		
	<div class="col-sm-6 col-sm-offset-3 col-lg-8 col-lg-offset-2 main">			
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Cadastro</h1>
			</div>
			<div class="col-lg-4">
				<form method="POST">
					<div class="form-group">
						<label for="">Nome</label>
						<input type="text" class="form-control" id="nome" name="nome" placeholder="nome" style="border:1px solid #CCC;">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="email@email.com" style="border:1px solid #CCC;">
					</div>
					<div class="form-group">
						<label for="">Senha</label>
						<input type="password" class="form-control" id="pass" name="pass" placeholder="********" style="border:1px solid #CCC;">
					</div>
					<button type="submit" class="btn btn-default" style="background:#222;color:#DDD">Cadastrar</button>
				<?php
						
						if(isset($_POST)){
							//echo 'teste';
							$m = new modelUser();
							$m->registerUser($_POST);
							//unset($_POST);
						}

					
				?>
				</form>
			</div>
			
			
		</div><!--/.row-->
		
			
			
	
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/easypiechart.js"></script>
	<script type="text/javascript" src="//kit.glyphs.co/4uq709.js"></script>
	
	
	<script>
	
	</script>	
</body>
<?php include_once("login.php");?>
</html>


