<tr>
<th>No</th>
<th>Id pengaduan</th>
<th>Tanggal pengaduan</th>
<th>NIK</th>
<th>Isi Laporan</th>
<th>Foto</th>
<th>Status</th>
</thead>

<tbody>
<?php
$i = 1;
foreach($pengaduan as $pt) : ?>
<tr>
<td><?= $i; ?></td>
<td><?= $pt['id_pengaduan']; ?></td>
<td><?= $pt['tgl_pengaduan']; ?></td>
<td><?= $pt['nik']; ?></td>
<td><?= $pt['isi_laporan']; ?></td>
<td><img src="<?= base_url('assets/img/'.$pt['foto']); ?>" width="150" ></td>
<td><?= $pt['status']; ?></td>
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

