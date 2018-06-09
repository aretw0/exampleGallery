<?php
require_once('../../bdConnect.php');
if ( isset( $_POST[ 'bttsend' ] ) || isset( $_POST[ 'bttsendadm' ] ) ) {
	$image = @$_FILES["archive"];
	$img_text = $_POST['imgtext'];
	if ($image != NULL){  
		$nomea = $_FILES['archive']['name'];
		foreach($nomea as $f => $nome) {
			$formato = $_FILES[ 'archive' ][ 'type' ][$f];
			if($_FILES['archive']['size'][$f] == 0){
				echo( "<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Faça Upload De Algo!')
					window.location.href='../';
					</SCRIPT>
					<NOSCRIPT>
					<a href='../'>Faça Upload De Algo!</a>
					</NOSCRIPT>");
				exit();
			}				
			if (!isset($_POST['bttsendadm'])){					
				$nome = strtolower($nome);
				if (file_exists("../up/$nome")){
					echo $nome.", Arquivo com esse nome já existe";
					header("refresh: 2; ../");
					exit();
				}
				if (move_uploaded_file($_FILES["archive"]["tmp_name"][$f], "../up/".$nome)){
					try {
						$InsertPDO = "INSERT INTO up_img (img_name, img_text) VALUES (:img_name, :img_text)";
						$insertBD = $ConnPDO->prepare($InsertPDO);
						$insertBD->bindParam(':img_name', $nome, PDO::PARAM_STR);
						$insertBD->bindParam(':img_text', $img_text, PDO::PARAM_STR);
						$insertBD->execute();
					} catch(PDOException $e) {
						echo $e->getCode().$e->getMessage();	
					}
					echo "Sucesso";
					header("refresh: 2; ../");
					exit();
				} else {
					echo "Falha";
					exit();
				}
			}
		}
	}
}
?>
