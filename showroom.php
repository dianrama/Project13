<!DOCTYPE html>
<html>
<head>
	<title>Form Dealer Mobil</title>
</head>
<body bgcolor="aqua">

<center><h2>Form Dealer Mobil</h2></center>
<marquee><h5>Dealer mobil terpercaya dan terjamin mutunya</h5></marquee>
<hr>
<center>
	<form method="post"	action="" class="dealer">
	<table border="0">
	<tr>
		<td>Id_Mobil</td>
		<td>:</td>
		<td colspan="7"><input type="text" name="id_mobil" size="30"></td>
	</tr>
	<tr>
		<td>Merk</td>
		<td>:</td>
		<td colspan="7"><input type="text" name="merk" size="30"></td>
	</tr>
	<tr>
		<td>Model</td>
		<td>:</td>
		<td colspan="7"><input type="text" name="model" size="30"></td>
	</tr>
	<tr>
		<td>Tipe</td>
		<td>:</td>
		<td colspan="7"><input type="text" name="tipe" size="30"></td>
	</tr>
	<tr>
		<td>Pintu</td>
		<td>:</td>
		<td colspan="7"><input type="text" name="pintu" size="30"></td>
	</tr>
	<tr>
		<td>Tahun Produksi</td>
		<td>:</td>
		<td colspan="7"><input type="text" name="tahun_produksi" size="30"></td>
	</tr>
	<tr>
		<td>Negara Pembuat</td>
		<td>:</td>
		<td colspan="7"><input type="text" name="negara_pembuat" size="30"></td>
	</tr>
	<tr>
		<td>Jenis Produksi</td>
		<td>:</td>
		<td colspan="7"><input type="text" name="jenis_produksi" size="30"></td>
	</tr>
	<tr>
		<td><input type="submit" name="tambah" value="Tambah" href="tambah.php">
			<input type="submit" name="edit" value="Edit">
			<input type="submit" name="hapus" value="Hapus">
			<input type="submit" name="cari" value="Cari">
			<input type="submit" name="tampil" value="Tampil Data">
		</td>
	</tr>	

	</table>
	<hr>
	<?php 
	error_reporting(1);
	include "koneksi.php";
  $id_mobil = $_POST['id_mobil'];
  $merk = $_POST['merk'];
  $model = $_POST['model'];
  $tipe = $_POST['tipe'];
  $pintu = $_POST['pintu'];
  $tahun_produksi = $_POST['tahun_produksi'];
  $negara_pembuat = $_POST['negara_pembuat'];
  $jenis_produksi = $_POST['jenis_produksi'];

  if (isset($_POST['tambah'])) {
   $sql = "INSERT INTO `mobil`(`Id_Mobil`, `Merk`, `Model`, `Tipe`, `Pintu`, `Tahun_Produksi`, `Negara_Pembuat`, `Jenis_Produksi`) VALUES ('$id_mobil','$merk','$model','$tipe','$pintu','$tahun_produksi','$negara_pembuat','$jenis_produksi')";
   $exe = mysql_query($sql);
  }elseif (isset($_POST['edit'])) {
   $sql = "UPDATE mobil SET `Merk`='$merk',`Model`='$model',`Tipe`='$tipe',`Pintu`='$pintu',`Tahun_Produksi`='$tahun_produksi',`Negara_Pembuat`='$negara_pembuat',`Jenis_Produksi`='$jenis_produksi' WHERE `Id_Mobil`='$id_mobil'";
   $exe = mysql_query($sql);
  }elseif (isset($_POST['hapus'])) {
   $sql = "DELETE FROM mobil WHERE `Id_Mobil`='$id_mobil'";
   $exe = mysql_query($sql);
  }elseif (isset($_POST['cari'])) {
   $sql = "SELECT * FROM mobil WHERE `Id_Mobil`='$id_mobil'";
   $exe = mysql_query($sql);
   echo "<table>\n";
   while($line = mysql_fetch_array($exe, MYSQL_NUM)){
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
     echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
   }
   echo "</table>\n";
  }
  elseif (isset($_POST['tampil'])) {
  	$query = 'SELECT * FROM mobil';
	$result = mysql_query($query) or die('Query failed :' . mysql_error());
  	echo "<table border='1'>\n";
	while ($line=mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo "\t<tr>\n";
		foreach ($line as $col_value) {
			echo "\t\t\t<td>$col_value</td>\n";
		}
		echo "\t</tr>";
	}
	echo "</table>\n";

	//free resultset
	mysql_free_result($result);

	//closing connection
	mysql_close($link);
  }
	?>
</form>
</center>
</body>
</html>