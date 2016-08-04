	<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		
		  <div class="modal-dialog modal-sm">
			<div id="msg"></div>
			<div class="modal-content" style="padding:15px">
			  <p align="center"><strong>Acessar o meu cadastro</strong></p>			  
			  
				  <form class="form" align="center" method="post" name="formulario" id="formulario" action="" >
					  <div class="form-group">
						<label class="sr-only" for="exampleInputEmail3">Email address</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Email">
					  </div>
					  <div class="form-group">
						<label class="sr-only" for="exampleInputPassword3">Password</label>
						<input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
					  </div>
						<h6 style="float:right"><a href="">Esqueci a minha senha</a><h6>
						<button class="btn btn-default btn-lg" style="width:100%" >Entrar</button>
						<h6><span>Ainda não está cadastrado? </span><a href="cadastro.php">Cadastre-se</a><h6>
				</form>
				
			</div>
		  </div>
	</div>
	
	<script type="text/javascript">
	
		
jQuery('#formulario').submit(function(){
			var dados = jQuery( this ).serialize();
			jQuery.ajax({
				type: "POST",
				url: "logar.php",
				data: dados,
				success: function( json )
				{
					//alert(json);
					var obj = jQuery.parseJSON(json);
					logado = obj.logado;
					if(logado==1){
						 console.log('logado com sucesso');
						 $('#modalLogin').modal('hide');
						 //$('body').remove();
						// $('html').load( "index.php" );
						 window.location.replace("index.php");
					}else{
						 console.log('Erro ao logar');
					
							 $(".alert").fadeOut("slow");
							  $("#msg").append('<div class="alert alert-warning alert-dismissible" role="alert" ><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="glyphicon glyphicon-alert"></p>Combinação usuário/senha incorreta</div>');
						
						
						  // faça algo
						 
						setTimeout(function() {
							$(".alert").alert('close');
						}, 5000);
					}
				}
			});
			
			return false;
});

	</script>