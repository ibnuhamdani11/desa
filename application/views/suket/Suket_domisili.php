<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Domisili</title>
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
    	<p class="nama-surat">SURAT KETERANGAN DOMISILI</p>
    	<p class="nomor-surat">Nomor : 134/TU/Ds.2008/IV/2018</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan dibawah ini Kuwu Desa Penganjang Kecamatan Sindang Kabupaten Indramayu, menerangkan bahwa  :</p>

        <!-- <p class="name-perusahaan">“ CV. DANIAL PERKASA INDONESIA ”</p> -->
  		
        <div class="isi">
        	<table border="0">
        		<tr>
        			<td width="200">Nama</td>
        			<td>&nbsp;:&nbsp;</td>
        			<td><b><?=$data_cetak->name?></b></td>
        		</tr>
        		<tr>
        			<td>Tempat Tgl lahir</td>
        			<td>&nbsp;:&nbsp;</td>
        			<td><?= $data_cetak->tempat.", ".$data_cetak->tanggal_lahir?></td>
        		</tr>
        		<tr>
        			<td>Jenis Kelamin</td>
        			<td>&nbsp;:&nbsp;</td>
        			<td><?= $data_cetak->gender == 'L' ? 'Laki-laki' : 'Perempuan'?></td>
        		</tr>
        		<tr>
        			<td>Pekerjaan</td>
        			<td>&nbsp;:&nbsp;</td>
        			<td><?= $data_cetak->job?></td>
        		</tr>
        		<tr>
        			<td>Agama</td>
        			<td>&nbsp;:&nbsp;</td>
        			<td><?= $data_cetak->religion?></td>
        		</tr>
        		<tr>
        			<td>Alamat</td>
        			<td>&nbsp;:&nbsp;</td>
        			<td><?= $data_cetak->address?></td>
        		</tr>
        	</table>
        </div>
        
    <!-- </div> -->
    	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bersangkutan adalah benar Penduduk Desa Kami dan berdomisili di <?= $data_cetak->address?></p>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian Surat Keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan seperlunya.</p>

		<div class="ttd">
			<table border="">
				<tr>
					<td>Indramayu, <?= $date?></td>
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