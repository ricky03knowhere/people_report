<div class="col-md-8">
	<div class="card mx-0 px-3 pt-3 pb-4 table-no-card tabdt" >

		<div class="row justify-content-center list-items-center">
		<div class="col-md-10">
		<?= form_open_multipart('data_pengaduan/edit_data/'.$pengaduan_edit['id_pengaduan']); ?>
<?= $this ->session ->flashdata('error'); ?>
		<form class="mt-3 mb-3">		
		<input type="number" name="id_pengaduan" value="<?= $pengaduan_edit['id_pengaduan']; ?>" hidden ><br>
		
		<div class="row mb-0">
		<div class="col-6">
		<div class="form-group">
		<label for="id_pengaduan_edit" class="control-label mb-1">ID Pengaduan</label>
		<input class="form-control"  type="number" name="id_pengaduan" value="<?= $pengaduan_edit['id_pengaduan']; ?>" disabled><br>
		</div>
		</div>
		<div class="col-6">
		<div class="form-group">
		<label for="tgl_pengaduan_edit" class="control-label mb-1">Tanggal Pengaduan</label>
		<input class="form-control"  type="date" name="tgl_pengaduan" value="<?= $pengaduan_edit['tgl_pengaduan']; ?>"><br>
		</div>
		</div>
		</div>
		
		<div class="row">
		<div class="col-6">
		<div class="form-group">
		<label for="nik" class="control-label mb-1">NIK</label>
		<select class="form-control" name="nik" id="nik">
		<?php foreach($masyarakat as $pt) : ?>
		<option value="<?= $pt['nik']; ?>" 
		<?php if($pt['nik'] == $pengaduan_edit['nik']) {
		echo "selected";
		} ?>
		><?= $pt['nik']; ?></option>
		<?php endforeach; ?>
		</select>
		</div>
		</div>
		
		<div class="col-6">
		<div class="form-group">
		<label for="status" class="control-label mb-1">Status</label>						
		<select class="form-control" id="status" name="status"
		<?php
		if($user['level'] == "masyarakat"){
			echo "disabled";
		}
		?>
		>
		<option value="0" ></option>
		<option value="proses" 
		<?php if($pengaduan_edit['status'] == "proses") {
		echo "selected";
		} ?>
		>Proses</option>
		<option value="terverifikasi" 
		<?php if($pengaduan_edit['status'] == "terverifikasi") {
		echo "selected";
		} ?>
		>Terverifikasi</option>
		</select>
		</div>
		</div>
		
		</div>
		
		<div class="row mt-1">
		<div class="col-md-6">
		<div class="form-group">	
				<label for="foto" class="control-label mb-1">Foto</label><br>						
		<img src="<?= base_url('assets/img/').$pengaduan_edit['foto']; ?>" class="rounded my-2" width="150" ><br>				
		<input class="form-control" type="file" name="foto" id="foto"><br>
		</div>
		</div>
		
		<div class="col-md-6">
		<div class="form-group">
		<label for="isi_laporan" class="control-label mb-1">Laporan</label>						
		<input type="text" class="form-control" name="isi_laporan" id="isi_laporan" value="<?= $pengaduan_edit['isi_laporan']; ?>" >
		</div>
		</div>
		</div>
		
		<div>
		<button id="insert-button" type="submit" class="btn btn-lg btn-info btn-block">
		<i class="fa fa-edit fa-lg mr-1"></i>&nbsp;
		<span id="payment-button-amount">Edit</span>
		<span id="payment-button-sending" style="display:none;">Sending…</span>
		</button>
		</div>
		</form>
                     </div>          
</div>
</div>
</div>

</div>
</div>
</div>
</div>
            <!-- END BREADCRUMB-->
</div>