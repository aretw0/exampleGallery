<?php
require_once('../../bdConnect.php');
if (isset($_GET['img'])) {
	try{
		$search_Img = $ConnPDO->prepare("SELECT * FROM up_img WHERE img_name=:img_name");
		$search_Img->bindValue(':img_name', $_GET['img'], PDO::PARAM_STR);
		$search_Img->execute();
		if ($search_Img->rowCount()) {
			$sqlDel = "DELETE FROM up_img WHERE img_name=:img_name";
			try {
				$del = $ConnPDO->prepare($sqlDel);
				$del->bindValue(":img_name", $_GET['img'], PDO::PARAM_STR);
				if ($del->execute()) {
					unlink("../up/".$_GET['img']);
					header("location: ../../");
				} else {
					echo "Erro ao apagar arquivo!";
					exit();
				}
			} catch ( PDOException $e ) {
				echo $e->getMessage();
			}
		}else{
			echo '<h2 style="color: red;">Imagem não existe!</h2>';
			header("refresh: 3; ../../");
		}
	}catch(PDOException $e) {
		echo $e->getCode()." ".$e->getMessage();
	}
}
?>
