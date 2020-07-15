<div class="col-md-8">
	<div class="card mx-0 px-3 pt-3 pb-4 table-no-card tabdt" >

		<div class="row justify-content-center list-items-center">
		<div class="col-md-10">
		<?= form_open_multipart('data_petugas/edit_data/'.$petugas['id_petugas']); ?>
<?= $this ->session ->flashdata('error'); ?>
		<input type="number" name="id_petugas" value="<?= $petugas['id_petugas']; ?>" hidden ><br>
		
<div class="row mt-2">
		<div class="col-6" >
		<div class="form-group">
		<label for="id_petugas" class="control-label mb-1">ID Petugas</label>
		<input class="form-control"  type="number" name="id_petugas" value="<?= $petugas['id_petugas']; ?>" disabled><br>
		</div>
		</div>
		<div class="col-6" >
		<div class="form-group">
		<label for="nama_petugas" class="control-label mb-1">Nama Petugas</label>
		<input class="form-control"  type="text" name="nama_petugas" value="<?= $petugas['nama_petugas']; ?>" required><br>
		</div>
		</div>
		</div>
		
		<div class="row" >
		<div class="col-6" >
		<div class="form-group">
		<label for="username" class="control-label mb-1">Username</label>
		<input class="form-control" name="username" id="username" value="<?= $petugas['username']; ?>" required>
		</div>
		</div>
		
		<div class="col-6" >
		<div class="form-group">
		<label for="password" class="control-label mb-1">Password</label>						
		<input class="form-control" name="password" id="password" value="<?= $petugas['password']; ?>" required>
		</div>
		</div>
		</div>
		
		<div class="row">
		<div class="col-6" >
		<div class="form-group">
		<label for="telp" class="control-label mb-1">Telephone</label>						
		<input class="form-control" type="number" name="telp" id="telp" value="<?= $petugas['telp']; ?>" required>
		</div>
		</div>
		<div class="col-6">
		<div class="form-group">
		<label for="level" class="control-label mb-1">Level</label>
		<select class="form-control" name="level" id="level">
		<option value="admin" 
		<?php if($petugas['level'] == "admin") {
		echo "selected";
		} ?>
		>Admin</option>
		<option value="petugas" 
		<?php if($petugas['level'] == "petugas") {
		echo "selected";
		} ?>
		>Petugas</option>
		<option value="masyarakat" 
		<?php if($petugas['level'] == "masyarakat") {
		echo "selected";
		} ?>
		>Masyarakat</option>
		</select>
		</div>
		</div>
		
		</div>
		<div class="row">
		<div class="col-6" >
		<div class="form-group">
		<label for="foto" class="control-label mb-1">Foto</label><br>						
		<input class="form-control mt-3" type="file" name="picture" id="foto"><br>
		</div>
		</div>
		<div class="col-6" >
		<img src="<?= base_url('assets/img/').$petugas['picture']; ?>" class="rounded my-2" width="150" ><br>
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