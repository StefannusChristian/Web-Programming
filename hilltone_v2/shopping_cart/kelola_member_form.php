<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Member</title>
	<link type="text/css" rel="stylesheet" href="css/kelola_member.css">
</head>
<body>
	<div class="title ">Data Member</div>
	<hr>
	<?php
 
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data berhasil di input.";
		}else if($pesan == "update"){
			echo "Data berhasil di update.";
		}else if($pesan == "hapus"){
			echo "Data berhasil di hapus.";
		}
	}

	require_once('./koneksi.php');

	$query = "select * from member order by id";
	$result = mysqli_query($conn, $query);

	if ($result){
	?>

		<form action="./delete.php" method="post">

			<table border="1">
			<tr>
				<th >User ID</th>
				<th >Nama</th>
				<th >Password</th>
				<th colspan="2" class="center" width="100">Aksi</th>		
			</tr>
			<?php
			while ($row = mysqli_fetch_row($result)) {
			?>
			<tr><?php
			
				$id = $row[0];
				$nama = $row[1];
				$pass = $row[2];
			?>
				<td><?php echo $id;?></td>
				<td><?php echo $nama;?></td>
				<td><?php echo $pass;?></td>
				<td>
					<div class="button"><input type="button" onclick="location.href='./update_member.php?id=<?php echo $id;?>';" value="Edit"/></div>
					<div class="button"><input type="button" onclick="location.href='./delete.php?nama=<?php echo $nama;?>';" value="Hapus"/></div>
				</td>
				</tr>
			<?php 
			
			} 
			?>
			</table>
			</br>
			<div class="button"><input type="button" onclick="location.href='./form_insert.php?id=<?php echo $id;?>';" value="Tambahkan Member"/></div>
			<div class="button"><input type="button" onclick="location.href='./admin.php';" value="Kembali"/></div>
		</form>
		<?php
		mysqli_free_result($result);
	}
	mysqli_close($conn);
	?>
</body>
</html>

