<h1>Mahasiswa Yang Mengambil Matakuliah dan Dosen yang mengampu</h1>
<table border='1'>
	<tr>
		<td>NIM</td>
		<td>Nama</td>
		<td>Mata Kuliah</td>
		<td>Dosen Pengampu</td>
	</tr>
	<?php foreach ($gtmhs_has_matkul->result() as $mhs): ?>
	<tr>
		<td><?php echo $mhs->mahasiswa_nim; ?></td>
		<td><?php echo $mhs->mahasiswa_nm; ?></td>
		<td><?php echo $mhs->matakuliah_nm; ?></td>		
		<td><?php echo $mhs->dosen_nm ?></td>

	</tr>
	<?php endforeach;?>

</table>