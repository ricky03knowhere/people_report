<?php
	if($user['level'] == "masyarakat"){
		echo "<style>
				.unmove {
					 visibility:hidden;
				 }
			  </style>";
	}
?>
<div class="col-md-9">
    <div class="card px-1 py-3 table-no-card tabdt" >
    <div class="my-2 mr-2 contU">
    
    <button class="btn btn-primary utility" data-toggle="modal" data-target="#mediumModal"
    <?php
    if($user['level'] == "masyarakat"){
    	echo "style ='visibility:hidden;background:black;'";
    }
    ?>
    >
    <i class="fa fa-plus"></i>
    </button>
    <button class="btn btn-warning utility mx-2"
    <?php
    if($user['level'] == "masyarakat"){
    	echo "style ='visibility:hidden;background:black;'";
    }
    ?>
    >
    <i class="fa fa-share text-white"></i>
    </button>
    
    <div class="export">
    
    <button class="btn btn-danger mx-2 unmove" > <a href="<?= base_url('index.php/laporan/header/tanggapan/0/print'); ?>"><i class="fa fa-file-pdf" ></i></a></button>
    <button class="btn btn-primary mx-2 unmove"><a href="<?= base_url('index.php/laporan/header/tanggapan/0/doc'); ?>" ><i class="fa fa-file-word" ></i></a></button>
    <button class="btn btn-success mx-2 unmove"><a href="<?= base_url('index.php/laporan/header/tanggapan/0/spread'); ?>" ><i class="fa fa-file-excel" ></i></a></button>
    </div>
    
    
    </div>
    <div class="table-responsive m-b-3 bg-white">
    <table class="table table-borderless table-striped table-earning my-4 mx-1" id="dataTable" >
    <thead>
    <tr>
    <th>No</th>
    <th>ID Tanggapan</th>
    <th>ID Pengaduan</th>
    <th class="text-center" >Tanggal Tanggapan</th>
    <th>Tanggapan</th>
    <th>ID Petugas</th>
    <th>Aksi</th>
    </tr>
    </thead>
    
    <tbody>
    <?php
    $i = 1;
    
    if(!$tanggapan) :
    	echo "<h3 class='text-center pb-4'>Data Kosong!</h3>";
    else :
	    foreach($tanggapan as $pt) : ?>
    <tr>
    <td><?= $i; ?></td>
    <td><?= $pt['id_tanggapan']; ?></td>
    <td><?= $pt['id_pengaduan']; ?></td>
    <td><?= $pt['tgl_tanggapan']; ?></td>
    <td><?= $pt['tanggapan']; ?></td>
    <td><?= $pt['id_petugas']; ?></td>
    <td><a class="btn edit btn-info px-2"  href="<?= base_url('index.php/data_tanggapan/index/'.$pt['id_tanggapan']); ?>">Edit</a>
   		 <a class="btn delete btn-danger px-2 ml-1" href="<?= base_url('index.php/data_tanggapan/delete/'.$pt['id_tanggapan']); ?>">Delete</a></td>
    </tr>
    
    <?php
    $i++;	
    endforeach;
    endif;
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

		
				<h3 class="text-center title-2 mt-2">Tanggapan</h3>

				<hr>
				<?= form_open_multipart('data_tanggapan/input'); ?>
	
				
				<?= $this ->session ->flashdata('error'); ?>
				
				<div class="row mt-5">
				<div class="col-6" >
				<div class="form-group">
				<label for="id_tanggapan" class="control-label mb-1">ID Tanggapan</label>
				<input class="form-control"  type="number" name="id_tanggapan" required><br>
				</div>
				</div>
				<div class="col-6" >
				<div class="form-group">
				<label for="id_pengaduan" class="control-label mb-1">ID Pengaduan</label>
				<select class="form-control" name="id_pengaduan" required>
				<?php foreach($pengaduan as $pt) : ?>
				<option value="<?= $pt['id_pengaduan']; ?>" ><?= $pt['id_pengaduan']; ?></option>
				<?php endforeach; ?>
				</select>
				</div>
				</div>
				</div>
				
				<div class="row" >
				<div class="col-6" >
				<div class="form-group">
				<label for="tgl_tanggapan" class="control-label mb-1">Tanggal</label>
				<input type="date" class="form-control" name="tgl_tanggapan" id="tgl_tanggapan" required>
				</div>
				</div>
				
				<div class="col-6" >
				<div class="form-group">
				<label for="id_petugas" class="control-label mb-1">ID Petugas</label>						
				<select class="form-control" name="id_petugas" id="id_petugas" required>
				<?php foreach($petugas as $pt) : ?>
				<option value="<?= $pt['id_petugas']; ?>" 
				<?php if($pt['id_petugas'] == $user['id_petugas']) {
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
				<input class="form-control" name="tanggapan" id="tanggapan" required>
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