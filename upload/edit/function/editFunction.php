<?php 
require_once('../../../bdConnect.php');
if(isset($_POST['oldNameImg']) && isset($_POST['nomeImg']) && isset($_POST['infoImg']) && isset($_POST['idImg'])){
	try{
		$update_Img = $ConnPDO->prepare("UPDATE up_img SET img_name=:img_name, img_text=:img_text WHERE id=:id");
		$update_Img->bindValue(':id', $_POST['idImg'], PDO::PARAM_INT);
		$update_Img->bindValue(':img_name', $_POST['nomeImg'], PDO::PARAM_STR);
		$update_Img->bindValue(':img_text', $_POST['infoImg'], PDO::PARAM_STR);
		rename( "../../../upload/up/".$_POST['oldNameImg'], "../../../upload/up/".$_POST['nomeImg']);
		$update_Img->execute();		
		header("location: ../../../");
	}catch(PDOException $e) {
		echo $e->getCode()." ".$e->getMessage();
	}
}
?>
