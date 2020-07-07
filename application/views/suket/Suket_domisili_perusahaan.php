<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Domisili Perusahaan</title>
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
	    }
	    .nama-surat {
	    	font-size: 14px;
	    	text-decoration: underline;
	    	font-weight: bold;
	    	text-align: center;
	    }
	    .nomor-surat {
	    	font-size: 12px;
	    	font-weight: bold;
	    	text-align: center;
	    	padding-top: -15px;
	    	margin-bottom: 30px;
	    }
	    .isi {
	    	margin-top: 30px;
	    	margin-left: 30px;
	    	margin-bottom: 30px;
	    }
	    .name-perusahaan {
	    	margin-top: 40px;
	    	text-align: center;
	    	font-weight: bold;
	    	font-size: 16px;
	    	text-justify: inter-word;
	    }
	    .ttd {
	    	margin-left: 65%;
	    	margin-top: 90px;
	    }
		.table {
		    border-collapse: collapse;
		    width: 100%;
		    margin: 0 auto;
		    font-family: times-new-roman;
		}
		/*.table td, th{
		    border:15px solid #D8D8D8;
		    padding: 5px;
		    font-family: times-new-roman;
		}*/
                 
    </style>
</head>
<body>
  
<!-- <div id="container"> -->
    <img src="<?= base_url('/public/img_surat/header.png')?>">
  
    <div id="body">
    	<p class="nama-surat">SURAT KETERANGAN DOMISILI PERUSAHAAN</p>
    	<p class="nomor-surat">Nomor : 22/TU/Ds.2008/V/2018</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan dibawah ini Kuwu Desa Penganjang Kecamatan Sindang Kabupaten Indramayu, menerangkan bahwa  :</p>

        <p class="name-perusahaan">“ <?= strtoupper($data_cetak->name_lembaga)?> ”</p>
  		
        <div class="isi">
        	<table border="0">
        		<tr>
        			<td width="200">BERDOMISILI DI</td>
        			<td>&nbsp;:&nbsp;</td>
        			<td><?= strtoupper($data_cetak->domisili)?></td>
        		</tr>
        		<tr>
        			<td>DESA</td>
        			<td>&nbsp;:&nbsp;</td>
        			<td><?= strtoupper($data_cetak->desa)?></td>
        		</tr>
        		<tr>
        			<td>KECAMATAN</td>
        			<td>&nbsp;:&nbsp;</td>
        			<td><?= strtoupper($data_cetak->kecamatan)?></td>
        		</tr>
        		<tr>
        			<td>KABUPATEN</td>
        			<td>&nbsp;:&nbsp;</td>
        			<td><?= strtoupper($data_cetak->kabupaten)?></td>
        		</tr>
        	</table>
        </div>
        
    <!-- </div> -->
    	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Atas penelitian dan sepengetahuan Kami, bahwa benar “<b><?= strtoupper($data_cetak->name_lembaga)?></b>” berdomisili di Alamat tersebut di atas. Di Desa Penganjang Kecamatan Sindang Kabupaten Indramayu.</p>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian Surat Keterangan Domisili  ini Kami buat dengan sebenarnya dan untuk dapat dipergunakan sebagaimana mestinya.</p>

		<div class="ttd">
			<table border="">
				<tr>
					<td>Indramayu, 27 April 2018</td>
				</tr>
				<tr>
					<td><center>Kuwu Penganjang</center></td>
				</tr>
				<tr>
					<td height="100"></td>
				</tr>
				<tr>
					<td><b><u><center>Drs. DARSONO, M.Si</center></u></b></td>
				</tr>
			</table>
		</div>
  
</div>
  
</body>
</html>