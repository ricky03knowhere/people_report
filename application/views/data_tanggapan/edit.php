<div class="col-md-8">
	<div class="card mx-0 px-3 pt-3 pb-4 table-no-card tabdt" >

		<div class="row justify-content-center list-items-center">
		<div class="col-md-10">
		<?= form_open_multipart('data_tanggapan/edit_data/'.$tanggapan['id_tanggapan']); ?>
		<?= $this ->session ->flashdata('error'); ?>
		<input type="number" name="id_tanggapan" value="<?= $tanggapan['id_tanggapan']; ?>" hidden ><br>
		
	<div class="row mt-2">
		<div class="col-6" >
		<div class="form-group">
		<label for="id_tanggapan" class="control-label mb-1">ID Tanggapan</label>
		<input class="form-control"  type="number" name="id_tanggapan" value="<?= $tanggapan['id_tanggapan']; ?>" disabled><br>
		</div>
		</div>
		<div class="col-6" >
		<div class="form-group">
		<label for="id_Pengaduan" class="control-label mb-1">ID Pengaduan</label>
		<select class="form-control" name="id_pengaduan" required>
		<?php foreach($pengaduan as $pt) : ?>
		<option value="<?= $pt['id_pengaduan']; ?>" 
		<?php
		if($tanggapan['id_pengaduan'] == $pt['id_pengaduan']){
		echo "selected";
		}
		?>
		>
		<?= $pt['id_pengaduan']; ?></option>
		<?php endforeach; ?>
		</select>
		</div>
		</div>
		</div>
		
		<div class="row" >
		<div class="col-6" >
		<div class="form-group">
		<label for="tgl_tanggapan" class="control-label mb-1">Tanggal</label>
		<input class="form-control" type="date"  name="tgl_tanggapan" id="tgl_tanggapan" value="<?= $tanggapan['tgl_tanggapan']; ?>" required>
		</div>
		</div>
		
		<div class="col-6" >
		<div class="form-group">
		<label for="id_petugas" class="control-label mb-1">ID Petugas</label>						
		<select class="form-control" name="id_petugas" required>
		<?php foreach($petugas as $pt) : ?>
		<option value="<?= $pt['id_petugas']; ?>" 
		<?php if($tanggapan['id_petugas'] == $pt['id_petugas']) {
		echo "selected";
		} ?>
		><?= $pt['id_petugas']; ?></option>
		<?php endforeach; ?>
		</select>
		</div>
		</div>
		</div>
		
		<div class="form-group">
		<label for="tanggapan" class="control-label mb-1">Tanggapan</label>						
		<input class="form-control" name="tanggapan" id="tanggapan" value="<?= $tanggapan['tanggapan']; ?>" required>
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