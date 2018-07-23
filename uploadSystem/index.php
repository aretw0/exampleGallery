<!doctype html>
<html lang="pt-br">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">

	<title>System Upload - Upload</title>
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
		<a class="navbar-brand" href="../"><img src="../img/bootstrap-solid.svg" width="30" height="30" alt="Home"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="../">Home</a>
				<a class="nav-item nav-link active" href="../uploadSystem/">Upload <span class="sr-only">(current)</span></a>
			</div>
		</div>
	</nav>
	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-6">
				<h2>Upload De Imagens</h2>
			</div>
		</div>
		<div class="row justify-content-center">
			<class class="col-6">
				<form action="../uploadSystem/upload/" method="post" enctype="multipart/form-data" name="formUpload">
					<div id="radio">
						<label>Fazer Upload?</label>
						<label for="Yes">Yes</label>
						<!--	<input type="radio" name="archive_select" id="yes" value="yes" onclick="document.formUpload.archive.disabled=false"/> -->
						<input type="radio" name="archive_select" id="yes" value="yes" onclick="document.getElementById('arquivo').removeAttribute('disabled');"/>
						<label for="Yes">No</label>
						<!--<input type="radio" name="archive_select" id="no" value="no" checked="checked" onclick="document.formUpload.archive.disabled=true"/>
						-->
						<input type="radio" name="archive_select" id="no"  value="no" checked="checked" onclick="document.getElementById('arquivo').setAttribute('disabled','enabled');"/>
					</div>
					<label for="comment">Commentario:</label>
					<textarea class="form-control" rows="4" name="imgtext"></textarea>
					<!--	<input type="file" name="archive" disabled="enabled"/> -->
					<input type="file" name="archive[]" id="arquivo" disabled="enabled"  multiple="multiple"/>
					<div id="radio"> <input type="submit" name="bttsend" value="Upload"/> </div>
					<div class="g-recaptcha" data-theme="dark" data-sitekey="6LeIaQwUAAAAAA_kgBED0YnJU_pa7r1KUVXUpjfE"></div>
				</form>
			</class>
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
	<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>