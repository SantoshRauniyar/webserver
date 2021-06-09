<?php
$con=mysqli_connect('localhost','root','12345','test');
if(isset($_POST['submit'])){
	$file=$_FILES['doc']['tmp_name'];
	
	$ext=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
	if($ext=='xlsx'){
		require('PHPExcel/PHPExcel.php');
		require('PHPExcel/PHPExcel/IOFactory.php');
		
		$obj=PHPExcel_IOFactory::load($file);
		foreach($obj->getWorksheetIterator() as $sheet){
			 $getHighestRow=$sheet->getHighestRow();
			for($i=2;$i<=$getHighestRow;$i++){
				  $noc=trim(addslashes($sheet->getCellByColumnAndRow(0,$i)->getValue()));//English
				  $noc1=trim(addslashes($sheet->getCellByColumnAndRow(1,$i)->getValue()));//Hindi
				  $noc2=trim(addslashes($sheet->getCellByColumnAndRow(2,$i)->getValue()));//Nepali
				  $noc3=trim(addslashes($sheet->getCellByColumnAndRow(3,$i)->getValue()));//Punjabi
				  $noc4=trim(addslashes($sheet->getCellByColumnAndRow(4,$i)->getValue()));//Spanish
				  $noc5=trim(addslashes($sheet->getCellByColumnAndRow(5,$i)->getValue()));//Telugu
				  
				//echo "<br>";
				  /*$noc1=trim(addslashes($sheet->getCellByColumnAndRow(3,$i)->getValue()));
				 $noc2=trim(addslashes($sheet->getCellByColumnAndRow(4,$i)->getValue()));
				 $noc3=trim(addslashes($sheet->getCellByColumnAndRow(5,$i)->getValue()));
				 $noc4=trim(addslashes($sheet->getCellByColumnAndRow(6,$i)->getValue()));
				 $noc5=trim(addslashes($sheet->getCellByColumnAndRow(7,$i)->getValue()));
				 $noc6=trim(addslashes($sheet->getCellByColumnAndRow(8,$i)->getValue()));
				 $noc7=trim(addslashes($sheet->getCellByColumnAndRow(9,$i)->getValue()));
				 $noc8=trim(addslashes($sheet->getCellByColumnAndRow(10,$i)->getValue()));
				 $noc9=trim(addslashes($sheet->getCellByColumnAndRow(11,$i)->getValue()));
				 $noc10=trim(addslashes($sheet->getCellByColumnAndRow(12,$i)->getValue()));
					*/
				if($noc!='')
				{
					//echo $noc."--".$noc1;
				mysqli_query($con,"INSERT INTO `vocabulary_list`(`english_words`, `hindi_words`,`nepali_words`,`punjabi_words`,`spanish_words`,`telugu_words`) VALUES ('$noc','$noc1','$noc2','$noc3','$noc4','$noc5')");
				}
			}
		}
		echo "uploaded Successfully !"; 
			
	}
	else
	{
		echo "Invalid file format";
	}
}
?>
<form method="post" enctype="multipart/form-data">
	<input type="file" name="doc"/>
	<input type="submit" name="submit"/>
</form>