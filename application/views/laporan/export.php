<tr>
<td>No</td>
<td>NIK</td>
<td>Nama</td>
<td>Username</td>
<td>Password</td>
<td>Telephone</td>
<td>Picture</td>
</tr>
</thead>
<tbody>
<?php
$i = 1;
foreach($masyarakat as $pt) : ?>
	<tr>
	<td><?= $i; ?></td>
	<td><?= $pt['nik']; ?></td>
	<td><?= $pt['nama']; ?></td>
	<td><?= $pt['username']; ?></td>
	<td><?= $pt['password']; ?></td>
	<td><?= $pt['telp']; ?></td>
    <td><img src="<?= base_url('assets/img/'.$pt['picture']); ?>" width="100" ></td>
	</tr>
<?php
$i++;	
endforeach;
?>
</tbody>
</table>

<span class="count" ><b>Jumlah Data : <?= $total; ?></b></span><br><br>

<b><?php echo date('l, d F Y'); ?></b>

</body>
</html>