<tr>
<th>No</th>
<th>Id Petugas</th>
<th>Nama Petugas</th>
<th>Username</th>
<th>Password</th>
<th>Telephone</th>
<th>Foto</th>
<th>Level</th>
</tr>
</thead>

<tbody>
<?php
$i = 1;
foreach($petugas as $pt) : ?>
<tr>
<td><?= $i; ?></td>
<td><?= $pt['id_petugas']; ?></td>
<td><?= $pt['nama_petugas']; ?></td>
<td><?= $pt['username']; ?></td>
<td><?= $pt['password']; ?></td>
<td><?= $pt['telp']; ?></td>
<td><img src="<?= base_url('assets/img/'.$pt['picture']); ?>" width="100" ></td>
<td><?= $pt['level']; ?></td>
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