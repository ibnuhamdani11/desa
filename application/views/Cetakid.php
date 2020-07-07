<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cetak Kartu Absen <?= $data_cetak->username;?></title>
    <style type='text/css'>
	    @font-face {
	       	font-family: times-new-roman;
	        src: url(<?= base_url(); ?>public/font/times-new-roman.ttf);
	    }
	    .body {
	        font-family: times-new-roman;
	        font-size: 12px;
	        text-align: justify;
  			text-justify: inter-word;
  			margin-top: -50px;
	    }
	    .photo {
	    	width: 100px;
	    	height: 100px;
	    	margin-left: 25px;
	    }
	    .idcard {
	    	font-size: 20px;
	    	font-weight: bold;
	    	margin-left: -2px;
	    }
                 
    </style>
    <?php
        

            include "./public/assets/phpqrcode/qrlib.php"; 

            $tempdir = "./public/qrid_user/"; //Nama folder tempat menyimpan file qrcode
            if (!file_exists($tempdir)) //Buat folder bername temp
            mkdir($tempdir);

            //isi qrcode jika di scan
            $codeContents = $data_cetak->username;
            //nama file qrcode yang akan disimpan
            $namaFile=$data_cetak->username.".png";
            //ECC Level
            $level=QR_ECLEVEL_H;
            //Ukuran pixel
            $UkuranPixel=10;
            //Ukuran frame
            $UkuranFrame=2;

            QRcode::png($codeContents, $tempdir.$namaFile, $level, $UkuranPixel, $UkuranFrame); 

            // echo '<img src="'.$tempdir.$namaFile.'" />';  

        ?>
</head>
<body>
  
<!-- <div id="container"> -->
    <!-- <img src="<?= base_url('/public/img_surat/header.png')?>"> -->
  
    <div id="body">
    	<!-- <img class="photo" src= "<?= base_url('/public/upload/user/'.$data_cetak->photo);?>"> -->
    	<div class="idcard">KARTU ABSEN</div>
    	<img style="width: 190px; height: 190px;" src= "<?= $tempdir.$namaFile;?>">
    	<div style="text-align: center; font-weight: bold; font-size: 16px;"><?= $data_cetak->username;?></div>

	</div>
  
</body>
</html>