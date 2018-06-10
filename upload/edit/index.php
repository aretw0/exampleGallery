<!doctype html>
<html lang="pt-br">
<head>
	<base href="../../" />
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="./css/bootstrap.min.css">

	<title>System Upload - Editar</title>
	<style>
	.footer {
		position: fixed;
		left: 0;
		bottom: 0;
		width: 100%;
		color: white;
		text-align: center;
	}
</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="./"><img src="img/bootstrap-solid.svg" width="30" height="30" alt="Home"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="./">Home</a>
				<a class="nav-item nav-link" href="./upload/">Upload</a>
				<a class="nav-item nav-link active" href="upload/edit/?img=<?php echo $_GET['img'];?>">Edit <span class="sr-only">(current)</span></a>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-3">
				<h2>Editar Imagem</h2>
			</div>
		</div>
		<?php 
		require_once('../../bdConnect.php');
		try{
			$search_Img = $ConnPDO->prepare("SELECT * FROM up_img WHERE id=:id");
			$search_Img->bindValue(':id', $_GET['img'], PDO::PARAM_STR);
			$search_Img->execute();
			$rs = $search_Img->fetch( PDO::FETCH_OBJ );
			if ( $search_Img->rowCount() ) {
				?>
				<div class="row justify-content-center">
					<div class="col-lg-3 col-md-4 col-xs-6">
						<img class="img-fluid img-thumbnail" width="400" height="300" src="upload/up/<?php echo $rs->img_name;?>" alt="">
					</div>
				</div>
				<form action="upload/edit/function/editFunction.php" method="POST">
					<div class="row justify-content-center">
						<div class="col-lg-3 col-md-4 col-xs-6">
							<label>Nome:</label>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-lg-3 col-md-4 col-xs-6">
							<input type="text" name="nomeImg" value="<?php echo $rs->img_name;?>">
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-lg-3 col-md-4 col-xs-6">
							<label>Comentario: *</label>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-lg-3 col-md-4 col-xs-6">
							<input type="text" name="infoImg" value="<?php echo $rs->img_text;?>">
						</div>
					</div>
					<br>
					<div class="row justify-content-center">
						<div class="col-lg-3 col-md-4 col-xs-6">
							<input type="submit">
						</div>
					</div>
					<input type="hidden" name="idImg" value="<?php echo $_GET['img'];?>">
					<input type="hidden" name="oldNameImg" value="<?php echo $rs->img_name;?>">
				</form>
			</div>
			<?php 
		}else{
			?>
			<div class="row justify-content-center">
				<div class="col-lg-3 col-md-4 col-xs-6" wfd-id="14">
					<h2 style="color: red;">Imagem não existe!</h2>
				</div>
			</div>
			<?php
			header("refresh: 3; ../../");
		}
	}catch(PDOException $e) {
		echo $e->getCode()." ".$e->getMessage();
	}
	?>

	<footer class="py-5 bg-dark footer">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright © Your Website <?php echo date("Y");?></p>
		</div>
		<!-- /.container -->
	</footer>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>