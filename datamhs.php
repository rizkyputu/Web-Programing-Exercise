<!DOCTYPE html>
<html>
<head>
<title> DATA MAHASISWA </title>
</head>
<body>
<p> DATA MAHASISWA </P>
<table border="1">
  <th>NIM</th>
  <th>Nama</th>
  <th>Tanggal Lahir</th>
  <th>Tempat Lahir</th>
  <th>Usia</th>
<?php 
 
$file_handle = fopen("datamhs.dat", "rb");

function hitungUsia($tgl1, $tgl2){

  // memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
  // dari tanggal pertama

  $pecah1 = explode("-", $tgl1);
  $date1 = $pecah1[2];
  $month1 = $pecah1[1];
  $year1 = $pecah1[0];

  // memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
  // dari tanggal kedua

  $pecah2 = explode("-", $tgl2);
  $date2 = $pecah2[2];
  $month2 = $pecah2[1];
  $year2 =  $pecah2[0];

  // menghitung JDN dari masing-masing tanggal

  $jd1 = GregorianToJD($month1, $date1, $year1);
  $jd2 = GregorianToJD($month2, $date2, $year2);

  // hitung selisih tahun kedua tanggal

  $usia = ceil(($jd2 - $jd1) / 365);
  return $usia;
}

$i=0;
while (!feof($file_handle) ) {
    $line_of_text = fgets($file_handle);
    $parts = explode('|', $line_of_text);
    hitungUsia($parts[2], "2021-04-16");
    echo "<tr><td height='119'>$parts[0]</td>
    <td>$parts[1]</td>
    <td>$parts[2]</td>
    <td>$parts[3]</td>
    <td>".hitungUsia($parts[2], date("Y-m-d"));"</td>
    </tr>";
    $i++;
}

fclose($file_handle);
?>  

</table>
<?php
echo "<br>";
echo "Jumlah Data :" .$i;
?>

</body>
</html> 