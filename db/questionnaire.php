<?php

if(isset($_POST['submit'])){

    	$data = array ( $_POST['age'],$_POST['sex'], $_POST['education'],$_POST['marital'], $_POST['occupation'],$_POST['race'], $_POST['cig-stat'], $_POST['cig-stop'], $_POST['cig-years'], $_POST['cigar'], $_POST['cig-pd'], $_POST['filtered'], $_POST['pack-years'], $_POST['pipe'], $_POST['smoked-f'], $_POST['smoked-af'], $_POST['smoked-r'], $_POST['smoked-s'], $_POST['sisters'], $_POST['brothers'], $_POST['bmi'], $_POST['weight'], $_POST['height']);

        $email_data = array($_SESSION['username']);

    	$fp = fopen('dataset/temp.csv', 'a');

    	fputcsv($fp, $data);

    	fclose($fp);

        $fp1 = fopen('dataset/emails.csv', 'a');

        fputcsv($fp1, $email_data);

        fclose($fp1);

    
}

?>