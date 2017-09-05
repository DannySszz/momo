<?php

	include("koneksi.php");

	$data='';
	$myfile = fopen("note.txt", "r") or die("Unable to open file!");
	$data = fread($myfile,filesize("note.txt"));
	$data = str_replace('.', ' ', $data);
	$data = preg_replace('/[^A-Za-z0-9\ ]/', '', $data);
	fclose($myfile);

	$info = new SplFileInfo('note.txt');
	$judul=$info->getFilename();

	$isi = array();
	$isi2= array();

	$isi = explode(" ",$data);
	sort($isi);

	echo $judul."<br>";

	if(sizeof($isi)>0){
		$b=0;
		for($a=0;$a<sizeof($isi);$a++){
			if (in_array($isi[$a], $isi2)==false && $isi[$a]!="" && $isi[$a]!=" ") {
			    $isi2[$b] = $isi[$a];
			    $b++;
			    echo $isi[$a]." = <br>";
			}
		}
	}

	//echo $info->getFilename() . "<br>";

	//echo $data;

	// $sql = "INSERT INTO MASTER VALUES ('$judul')";

	// if ($conn->query($sql) === TRUE) {
	//     echo "New record created successfully in Master";
	// } else {
	//     echo "Error: " . $sql . "<br>" . $conn->error;
	// }



	// $sql = "INSERT INTO MASTER VALUES ('$judul')";

	// if ($conn->query($sql) === TRUE) {
	//     echo "New record created successfully in Master";
	// } else {
	//     echo "Error: " . $sql . "<br>" . $conn->error;
	// }

?>