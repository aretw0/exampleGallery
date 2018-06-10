<!doctype html>
<html lang="pt-br">
<head>
	<base href="/exampleGallery/" />
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<title>System Upload = Home</title>
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
				<a class="nav-item nav-link active" href="./">Home <span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link" href="/exampleGallery/upload/">Upload</a>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-2">
				<h1>Gallery</h1>
			</div>
		</div>
		<div class="row text-center text-lg-left">
			<?php
			require_once('bdConnect.php');
			$sqlRead = "SELECT * FROM up_img";
			try {
				$sqlReady = $ConnPDO->prepare($sqlRead);
				$sqlReady->execute();
			}catch (PDOException$e){
				echo $e->getMessage();
			}
			while ( $rs = $sqlReady->fetch( PDO::FETCH_OBJ ) ) {
				?>
				<div class="col-lg-3 col-md-4 col-xs-6">
					<div class="card" style="width: 18rem;">
						<a data-fancybox="gallery" href="upload/up/<?php echo $rs->img_name; ?>"><img class="card-img-top" src="upload/up/<?php echo $rs->img_name; ?>" alt="<?php echo $rs->img_name; ?>"></a>
						<div class="card-body">
							<h5 class="card-title"><?php echo $rs->img_name; ?></h5>
							<p class="card-text"><?php echo $rs->img_text; ?></p>
							<a href="upload/edit/?img=<?php echo $rs->id; ?>" class="btn btn-primary">Editar</a>
							<a href="upload/remove/?img=<?php echo $rs->img_name; ?>" class="btn btn-primary">Apagar</a>
							<a href="upload/view/?img=<?php echo $rs->img_name; ?>" class="btn btn-primary">Visualizar</a>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>

	<footer class="py-5 bg-dark footer">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright © Your Website <?php echo date("Y");?></p>
		</div>
		<!-- /.container -->
	</footer>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.fancybox.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>