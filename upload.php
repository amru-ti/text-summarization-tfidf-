<?php
if($_FILES) {
    $namaFile = $_FILES['file']['name'];
    $tmpFile = $_FILES['file']['tmp_name'];
   
 	$uploadKe = "corpus/{$namaFile}";
    if(move_uploaded_file($tmpFile, $uploadKe)){
		
			echo "[removed]alert('Sukses menambahkan data');[removed]";
		
			header("location:index.php");
    }else{
		
			echo "[removed]alert('Gagal Menambahkan Data');[removed]";
		
			header("location:index.php");
    }
}
?>