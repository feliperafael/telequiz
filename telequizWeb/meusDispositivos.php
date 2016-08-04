<?php
require_once("classes/load.php");

	$login = new modelUserLogin();
	if($login->verificaLogado()){
		//echo 'Logado';
		
	}else{
		//echo 'Deslogado';
		//header("Location:login.php"); 
	
	
	}
	unset($_POST);
	
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
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Tele</span>Quiz</a>
				<?php 
					if(isset($login) && $login->verificaLogado() ){
				?>
				<ul class="user-menu">
							<li class="dropdown pull-right">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Perfil</a></li>
									<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Configurações</a></li>
									<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
								</ul>
							</li>
						</ul>
				
				<?php
					}else{
				?>				
						<a class="navbar-brand" href="" style="float:right;margin-right:15px;color:#FFF" data-toggle="modal" data-target="#modalLogin">Entrar <span class="glyphicon glyphicon-log-in"></span></a>	
				<?php
					}
				
				?>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<?php include"template/menu_lateral.php"; ?>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">meus dispositivos</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Meus Dispositivos</h1>
			</div>
		</div><!--/.row-->
		
			
			<div class="col-xs-12 col-md-6 col-lg-3">
				<?php
					$m = new modelUser();
					
					if(isset($_GET['acao']) && $_GET['acao']== "deletar" && isset($_GET['id']) && is_numeric($_GET['id'])){
							
							$m->deleteDevice((int)$_GET['id']);
					}
					
					$dados = $m->getMyDevices();
					if($dados!=null){
				
				?>
				<table class="table table-condensed">
					<thead>
					  <tr>
						<th>Id</th>
						<th>MAC</th>
						<th>Data Cadastro</th>
						<th></th>
					  </tr>
					</thead>
					<tbody>
					<?php 
						//print_r($dados);
						foreach($dados as $atual){
							echo '
							 <tr>
								<td>'.$atual['id'].'</td>
								<td>'.$atual['mac'].'</td>
								<td>'.$atual['time_stamp'].'</td>
								<th><a href="?acao=deletar&id='.$atual['id'].'"> <icon class="glyphicon glyphicon-remove"></icon></a></th>
							 </tr>
							
							';
							
						}
					
					?>
					 
					</tbody>
				</table>
				
				<?php 
					}else{
							echo 'Você ainda não tem nenhum dispositivo vinculado';
						
					}
				?>
				<svg class="glyph stroked tv"><use xlink:href="#stroked-tv"></use></svg>
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


