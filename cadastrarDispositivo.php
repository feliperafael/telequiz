<?php
require_once("classes/load.php");

	$login = new modelUserLogin();
	if($login->verificaLogado()){
		//echo 'Logado';
		
	}else{
		//echo 'Deslogado';
		//header("Location:login.php"); 
	
	
	}
			
	
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Graph</title>

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
	<?php include_once('template/menu_topo.php');?>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
	<?php include"template/menu_lateral.php"; ?>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">cadastrar dispositivo</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Cadastrar Dispositivo</h1>
			</div>
		</div><!--/.row-->			
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div id="msgAlerta">
						<?php
						if(isset($_POST['code'])&& is_int((int)$_POST['code'])){
							$m = new modelUser();
							if($m->associateMacWithUser($_POST['code'])){
								echo 'Cadastro efetuado com sucesso.';
							}
							echo '<div class="alert alert-warning alert-dismissible" role="alert" ><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'. $m->msg .'</div>';
					
							unset($_POST);
						}
					
						?>
				</div>
				<form method="POST">
					<div class="form-group">
						<label for="">Codigo de Validação</label>
						<input type="number" min="1000" max="10000" class="form-control" id="code" name="code" placeholder="9999" style="border:1px solid #CCC;">
					</div>
					<button type="submit" class="btn btn-default" style="background:#222;color:#DDD">Cadastrar Dispositivo</button>
				
				</form>
			</div><!--/.col-->
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


