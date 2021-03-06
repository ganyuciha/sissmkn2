<?php
$siteurl = 'http://localhost:8080/sissmkn2';
require ($_SERVER['DOCUMENT_ROOT']."/sissmkn2/config/Database.php");
require ($_SERVER['DOCUMENT_ROOT']."/sissmkn2/config/pendaftaranonline.php");

$conn = new PendaftaranOnline();
$panggil = $conn->tampilpendaftarantidakditerima();

$content = '<!DOCTYPE html>
<html>
<head>
	<title>Data Seleksi Pendaftaran</title>
</head>
<body>
<table style="width: 100%; text-align: center; font-size: 14px;">
	<tr>
		<td style="width: 7%" rowspan="4">
			<img src="C:\xampp\htdocs\sissmkn2\images\logo_smk2.png" alt="Logo" width="80" height="78">
		</td>
		<td style="width: 93%">
			Data Seleksi Pendaftaran
		</td>
	</tr>
	<tr>
		<td style="font-size: 20px; font-weight: bold;">
			SMK NEGERI 2 MALANG
		</td>
	</tr>
	<tr>
		<td style="font-size: 12px;">
			Jl. Veteran No. 17 Malang, Telp. (0341)551504, Faks. (0341)551504 Malang 65145
		</td>
	</tr>
	<tr>
		<td style="font-size: 12px;">
			Website : http://www.smkn2malang.sch.id | Email : smkn2malang@gmail.com
		</td>
	</tr>
	<tr>
		<td colspan="2"><hr></td>
	</tr>
</table><br>
<table border="1" align="center">
	<thead style="text-align: center;">
		<tr style="background-color: #faba97;">
			<th>NO.</th>                               
                                    <th>ID</th>
                                    <th>No Pendaftaran</th> 
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Jurusan</th>
                                    <th>Status</th>
		</tr>
	</thead>
	<tbody>';
		$no = 1;
		foreach ($panggil as $item) {
			$content.='
                    <tr>
                        <td scope="row">'.$no++.'</td>
                        <td>'.$item['user_id'].'</td>
                        <td>'.$item['no_daftar'].'</td>
                        <td>'.$item['no_induk'].'</td>
                        <td>'.$item['nama'].'</td>
                        <td>'.$item['sis_dtrm_prog_khlian'].'</td>
                        <td>'.$item['status'].'</td>
                    </tr>
                    ';
		}
$content.='</tbody>
</table>
</body>
</html>';

ob_start();
require_once('../../../html2pdf/html2pdf.class.php');
try {
	$html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15');
	$html2pdf->WriteHTML($content, isset($_GET['vuehtml']));
	ob_end_clean();
	$html2pdf->Output('Seleksi.pdf');
} catch(HTML2PDF_exception $e) {
	echo $e;
}
        
        
        

?>

