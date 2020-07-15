<tr>
<th>No</th>
<th>ID Tanggapan</th>
<th>ID Pengaduan</th>
<th>Tanggal Tanggapan</th>
<th>Tanggapan</th>
<th>ID Petugas</th>
</tr>
</thead>

<tbody>
<?php
$i = 1;
foreach($tanggapan as $pt) : ?>
<tr>
<td><?= $i; ?></td>
<td><?= $pt['id_tanggapan']; ?></td>
<td><?= $pt['id_pengaduan']; ?></td>
<td><?= $pt['tgl_tanggapan']; ?></td>
<td><?= $pt['tanggapan']; ?></td>
<td><?= $pt['id_petugas']; ?></td>
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