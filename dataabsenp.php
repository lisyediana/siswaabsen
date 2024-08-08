<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  background-color:grey;
  color: azure;
}

th {
  border: 1px solid black;
  text-align: center;
  padding: 8px;
  background-color: darkolivegreen;
}
td {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
}
.link{
        font-size: 15pt;
}
.link:hover{
	color: red;
}
.link:link{
	color: white;
}
.link:active{
	color: green;
}
.edit-button {
    background-color: #007BFF; /* Warna biru */
    color: white; /* Warna teks putih */
    border: none; /* Tanpa border */
    padding: 10px 20px; /* Padding tombol */
    font-size: 16px; /* Ukuran font */
    cursor: pointer; /* Kursor pointer saat hover */
    border-radius: 5px; /* Sudut tombol yang melengkung */
    transition: background-color 0.3s; /* Animasi transisi untuk background-color */
}

.edit-button:hover {
    background-color: #0056b3; /* Warna biru lebih gelap saat hover */
}
.edit-button1 {
    background-color: #FF6347; /* Warna biru */
    color: white; /* Warna teks putih */
    border: none; /* Tanpa border */
    padding: 10px 20px; /* Padding tombol */
    font-size: 16px; /* Ukuran font */
    cursor: pointer; /* Kursor pointer saat hover */
    border-radius: 5px; /* Sudut tombol yang melengkung */
    transition: background-color 0.3s; /* Animasi transisi untuk background-color */
}

.edit-button1:hover {
    background-color: red; /* Warna biru lebih gelap saat hover */
}

</style>
</head>
<body>
	
	<br/>
	<br/>
	<table>
		<tr>
			<th>No</th>
			<th>NAMA PIKET</th>
			<th>NAMA SISWA</th>
			<th>KELAS</th>
			<th>HARI</th>
			<th>TANGGAL</th>
			<th>KETERANGAN</th>
			<th>OPSI</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"SELECT absen.IDABSEN, 
		user.NAMAUSER AS NAMAUSER, siswa.NAMA AS NAMA, absen.KELAS,
		 absen.HARI, absen.TANGGAL, absen.KETERANGAN
        FROM absen 
        JOIN user ON absen.ID = user.ID 
        JOIN siswa ON absen.IDSISWA = siswa.IDSISWA");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['NAMAUSER']; ?></td>
				<td><?php echo $d['NAMA']; ?></td>
				<td><?php echo $d['KELAS']; ?></td>
				<td><?php echo $d['HARI']; ?></td>
				<td><?php echo $d['TANGGAL']; ?></td>
				<td><?php echo $d['KETERANGAN']; ?></td>
				<td>
					<a class="edit-button" href="halamanpiket.php?page=editabsen&id=<?php echo $d['IDABSEN']; ?>">EDIT</a>
					<a class="edit-button1" href="hapusabsenp.php?id=<?php echo $d['IDABSEN']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
	
 
</body>
</html>