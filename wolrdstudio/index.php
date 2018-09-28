<?php 
	require_once("cabecalho.php");
	require_once("logica-usuario.php");
?>
		<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">	
						<ul class="nav navbar-nav">
							<li><h2>Bem vindo a </h2></li>
							<li><h1> WolrdStudio</h1></li>
						</ul>
<?php
	if(usuarioEstaLogado()) {
?>
		<div id="logout">
			<form action="logout.php">
				<input class="logout" 
					type="submit" value="Sair" name="enviar">
			</form>
		</div>
		<dir class="search">
  			<input type="text" class="form-control" name="q" placeholder="Encontre o salão mais próximo">
		</dir>
<?php
	} else {
?>
		<div id="login">
			<form action="login.php" method="post">
				<input class="form-control" type="text" name="email">
				<input class="form-control" type="password" name="senha">
				<input class="btn btn-primary" type="submit" value="Entrar">
			</form>
		</div>
<?php } ?>

			</div>
		</div>
	</div>
	<div class="container">

<?php 
	if(usuarioEstaLogado()){
		require_once("menu.php");
	};
	require_once("rodape.php");
?>
