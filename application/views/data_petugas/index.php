<div class="col-md-9">
    <div class="card px-1 py-3 table-no-card tabdt" >
    <div class="my-2 mr-2 contU">
    
    <button class="btn btn-primary utility" data-toggle="modal" data-target="#mediumModal">
    <i class="fa fa-plus"></i>
    </button>
    <button class="btn btn-warning utility mx-2">
    <i class="fa fa-share text-white"></i>
    </button>
    
    <div class="export" >
    
<button class="btn btn-danger mx-2 unmove" > <a href="<?= base_url('index.php/laporan/header/petugas/0/print'); ?>"><i class="fa fa-file-pdf" ></i></a></button>
<button class="btn btn-primary mx-2 unmove"><a href="<?= base_url('index.php/laporan/header/petugas/0/doc'); ?>" ><i class="fa fa-file-word" ></i></a></button>
<button class="btn btn-success mx-2 unmove"><a href="<?= base_url('index.php/laporan/header/petugas/0/spread'); ?>" ><i class="fa fa-file-excel" ></i></a></button>
    </div>
    
    
    </div>
    <div class="table-responsive m-b-3 bg-white">
    <table class="table table-borderless table-striped table-earning my-4 mx-1" id="dataTable" >
    <thead>
    <tr>
    <th>No</th>
    <th>Id Petugas</th>
    <th>Nama Petugas</th>
    <th class="text-center" >Username</th>
    <th>Password</th>
    <th>Telephone</th>
    <th>Foto</th>
    <th>Level</th>
    <th>Aksi</th>
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
    <td><img src="<?= base_url('assets/img/'.$pt['picture']); ?>" width="150" ></td>
    <td><?= $pt['level']; ?></td>
    <td><a class="btn edit btn-info px-2"  href="<?= base_url('index.php/data_petugas/index/'.$pt['id_petugas']); ?>">Edit</a>
   		 <a class="btn delete btn-danger px-2 ml-1" href="<?= base_url('index.php/data_petugas/delete/'.$pt['id_petugas']); ?>">Delete</a></td>
    </tr>
    
    <?php
    $i++;	
    endforeach;
    ?>
    </tbody> 
    </table>
    
    
    
    </div>
    </div>
    

</div>
</div>
</div>
</div>
</div>
            <!-- END BREADCRUMB-->
</div>


<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" data-show="true" >
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="mediumModalLabel">Input Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

		
				<h3 class="text-center title-2 mt-2">petugas</h3>

				<hr>
				<?= form_open_multipart('data_petugas/input'); ?>
	
				
				<?= $this ->session ->flashdata('error'); ?>
				
				<div class="row mt-5">
				<div class="col-6" >
				<div class="form-group">
				<label for="id_petugas" class="control-label mb-1">ID Petugas</label>
				<input class="form-control"  type="number" name="id_petugas" required><br>
				</div>
				</div>
				<div class="col-6" >
				<div class="form-group">
				<label for="nama_petugas" class="control-label mb-1">Nama Petugas</label>
				<input class="form-control"  type="text" name="nama_petugas" required><br>
				</div>
				</div>
				</div>
				
				<div class="row" >
				<div class="col-6" >
				<div class="form-group">
				<label for="username" class="control-label mb-1">Username</label>
				<input class="form-control" name="username" id="username" required>
				</div>
				</div>
				
				<div class="col-6" >
				<div class="form-group">
				<label for="password" class="control-label mb-1">Password</label>						
				<input class="form-control" type="password"  name="password" id="password" required>
				</div>
				</div>
				</div>
				
				<div class="row">
				<div class="col-6" >
				<div class="form-group">
				<label for="telp" class="control-label mb-1">Telephone</label>						
				<input class="form-control" type="number" name="telp" id="telp" required>
				</div>
				</div>
				<div class="col-6">
				<div class="form-group">
				<label for="level" class="control-label mb-1">Level</label>
				<select class="form-control" name="level" id="level">
				<option value="admin" >Admin</option>
				<option value="petugas" >Petugas</option>
				<option value="masyarakat" >Masyarakat</option>
				</select>
				</div>
				</div>
				
				</div>
				
				<div class="form-group">
				<label for="foto" class="control-label mb-1">Foto</label>						
				<input class="form-control" type="file" name="picture" id="foto" required><br>
				</div>				
				
				<div>
				<button id="insert-button" type="submit" class="btn btn-lg btn-info btn-block">
				<i class="fa fa-edit fa-lg mr-1"></i>&nbsp;
				<span id="payment-button-amount">Insert</span>
				<span id="payment-button-sending" style="display:none;">Sending…</span>
				</button>
				</div>
				</form>

			</div>
		</div>
	</div>
</div>