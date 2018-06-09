<!doctype html>
<html lang="pt-br">
<head>
	<base href="../../" />
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="./css/bootstrap.min.css">

	<title>System Upload = View</title>
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
				<a class="nav-item nav-link active" href="./upload/view/?img=<?php echo $_GET['img']; ?>">View <span class="sr-only">(current)</span></a>
			</div>
		</div>
	</nav>
	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-2">
				<h2>Informações</h2>
			</div>
		</div>
		<?php 
		require_once('../../bdConnect.php');
		try{
			$search_Img = $ConnPDO->prepare("SELECT * FROM up_img WHERE img_name=:img_name");
			$search_Img->bindValue(':img_name', $_GET['img'], PDO::PARAM_STR);
			$search_Img->execute();
			if ( $search_Img->rowCount() ) {
				?>
				<div class="row justify-content-center">
					<div class="col-lg-3 col-md-4 col-xs-6" wfd-id="14">
						<img class="img-fluid img-thumbnail" width="400" height="300" src="upload/up/<?php echo $_GET['img'];?>" alt="<?php echo $_GET['img'];?>">
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-3 col-md-4 col-xs-6" wfd-id="14">
						Compartilhe a sua imagem:
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-3 col-md-4 col-xs-6" wfd-id="14">
						<?php 
						$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://'; 
						?>
						<input style="width: 100%" 	type="text" value="<?php echo $protocol.$_SERVER['HTTP_HOST']."/exampleGallery/upload/up/".$_GET['img'];?>">
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-3 col-md-4 col-xs-6" wfd-id="14">
						<a href="./"><button type="button">Voltar para Home</button></a>
					</div>
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
	</div>

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