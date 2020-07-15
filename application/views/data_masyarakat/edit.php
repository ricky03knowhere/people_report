<div class="col-md-8">
	<div class="card mx-0 px-3 pt-3 pb-4 table-no-card tabdt" >

		<div class="row justify-content-center list-items-center">
		<div class="col-md-10">
		<?= form_open_multipart('data_masyarakat/edit_data/'.$masyarakat['nik']); ?>
		<?= $this ->session ->flashdata('error'); ?>
		<input type="number" name="nik" value="<?= $masyarakat['nik']; ?>" hidden ><br>
		
		<div class="row mt-2">
		<div class="col-6" >
		<div class="form-group">
		<label for="nik" class="control-label">NIK</label>
		<input class="form-control"  type="number" name="nik" value="<?= $masyarakat['nik']; ?>" disabled><br>
		</div>
		</div>
		<div class="col-6" >
		<div class="form-group">
		<label for="nama" class="control-label">Nama</label>
		<input class="form-control"  type="text" name="nama" value="<?= $masyarakat['nama']; ?>" required><br>
		</div>
		</div>
		</div>
		
		<div class="row" >
		<div class="col-6" >
		<div class="form-group">
		<label for="username" class="control-label mb-1">Username</label>
		<input class="form-control" name="username" id="username" value="<?= $masyarakat['username']; ?>" required>
		</div>
		</div>
		
		<div class="col-6" >
		<div class="form-group">
		<label for="password" class="control-label mb-1">Password</label>						
		<input class="form-control" name="password" id="password" value="<?= $masyarakat['password']; ?>" required>
		</div>
		</div>
		</div>
		
		<div class="row">
		<div class="col-6" >		
		<div class="form-group">
		<label for="telp" class="control-label mb-1">Telephone</label>						
		<input class="form-control" type="number" name="telp" id="telp" value="<?= $masyarakat['telp']; ?>" required>
		</div>
		<div class="form-group">
		<label for="foto" class="control-label mb-1">Foto</label><br>						
		<input class="form-control" type="file" name="picture" id="foto"><br>
		</div>
		</div>
		<div class="col-6">
		<img src="<?= base_url('assets/img/').$masyarakat['picture']; ?>" class="rounded my-4 justify-content-center" width="150" ><br>
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