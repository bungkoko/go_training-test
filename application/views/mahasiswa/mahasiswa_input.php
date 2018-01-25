<?php if ($warning != ""): ?>
	<p><?php echo $warning; ?></p>
<?php endif;?>
<table border='0'>
	<form action="<?php echo current_url(); ?>" method="post">

		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><input type="text" name="mahasiswa_nim"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="mahasiswa_nm"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td>
				<select name="mahasiswa_jeniskelamin">
					<option value="L">Laki-Laki</option>
					<option value="P">Perempuan</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Agama</td>
			<td>:</td>
			<td>
				<select name="mahasiswa_agama">
					<option value="islam">Islam</option>
					<option value="katolik">Katolik</option>
					<option value="protestan">Protestan</option>
					<option value="hindu">Hindu</option>
					<option value="buddha">Buddha</option>
					<option value="konghucu">Konghucu	</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Dosen Pembimbing</td>
			<td>:</td>
			<td>
				<select name="dosen_dosen_nip">
					<?php foreach ($get_dosen->result() as $dosen): ?>
					<option value="<?php echo $dosen->dosen_nip ?>"><?php echo $dosen->dosen_nm; ?></option>
					<<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><textarea name="mahasiswa_alamat" cols='60'></textarea></td>
		</tr>
		<tr>
			<td colspan='3'><input type="submit" name='submit' value="Simpan"></td>
		</tr>

	</form>
</table>


<table border='1'>
	<tr>
		<td>NIM</td>
		<td>NAMA</td>
		<td>JENIS KELAMIN</td>
		<td>AGAMA</td>
		<td>Dosen Pembimbing</td>
		<td>Aksi</td>
	</tr>
	<?php foreach ($get_mahasiswa->result() as $mhs): ?>
	<tr>
		<td><?php echo $mhs->mahasiswa_nim; ?></td>
		<td><?php echo $mhs->mahasiswa_nm; ?></td>
		<td><?php echo $mhs->mahasiswa_jeniskelamin; ?></td>
		<td><?php echo $mhs->mahasiswa_agama; ?></td>
		<td><?php echo $mhs->dosen_nm; ?></td>
		<td>
			<a href="<?php echo site_url('Go_training/update_mahasiswa').'/'.$mhs->mahasiswa_nim; ?>">Ubah</a>
			<a href="<?php echo site_url('Go_training/delete_mahasiswa').'/'.$mhs->mahasiswa_nim; ?>">Hapus</a>
		</td>

	</tr>
	<?php endforeach;?>

</table>