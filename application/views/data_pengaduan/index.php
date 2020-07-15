<?php
	if($user['level'] != "admin"){
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
    	if(($user['level'] == "admin") || ($user['level'] == "petugas")){
    		echo "style ='visibility:hidden;'";
    	}
    ?>
    >
    <i class="fa fa-plus"></i>
    </button>
    <button class="btn btn-warning utility mx-2"
    <?php
    	if($user['level'] != "admin"){
    		echo "style ='visibility:hidden;'";
    	}
    ?>>
    <i class="fa fa-share text-white"></i>
    </button>
    
    <div class="export">
    <?php 
    if($status == "belum"){
		echo '
		<button class="btn btn-danger mx-2 unmove" > <a href="'.base_url('index.php/laporan/header/pengaduan/belum/print').'"><i class="fa fa-file-pdf" ></i></a></button>
		<button class="btn btn-primary mx-2 unmove"><a href="'.base_url('index.php/laporan/header/pengaduan/belum/doc').'" ><i class="fa fa-file-word" ></i></a></button>
		<button class="btn btn-success mx-2 unmove"><a href="'.base_url('index.php/laporan/header/pengaduan/belum/spread').'" ><i class="fa fa-file-excel" ></i></a></button>';
    }
    else if($status == "terverifikasi"){
    	echo '
    	<button class="btn btn-danger mx-2 unmove" > <a href="'.base_url('index.php/laporan/header/pengaduan/terverifikasi/print').'"><i class="fa fa-file-pdf" ></i></a></button>
    	<button class="btn btn-primary mx-2 unmove"><a href="'.base_url('index.php/laporan/header/pengaduan/terverifikasi/doc').'" ><i class="fa fa-file-word" ></i></a></button>
    	<button class="btn btn-success mx-2 unmove"><a href="'.base_url('index.php/laporan/header/pengaduan/terverifikasi/spread').'" ><i class="fa fa-file-excel" ></i></a></button>';
    }else{
		echo '
		<button class="btn btn-danger mx-2 unmove" > <a href="'.base_url('index.php/laporan/header/pengaduan/0/print').'"><i class="fa fa-file-pdf" ></i></a></button>
		<button class="btn btn-primary mx-2 unmove"><a href="'.base_url('index.php/laporan/header/pengaduan/0/doc').'" ><i class="fa fa-file-word" ></i></a></button>
		<button class="btn btn-success mx-2 unmove"><a href="'.base_url('index.php/laporan/header/pengaduan/0/spread').'" ><i class="fa fa-file-excel" ></i></a></button>';
    }
    ?>
    </div>
    
    
    </div>
    <div class="table-responsive m-b-3 bg-white">
    <table class="table table-borderless table-striped table-earning my-4 mx-1" id="dataTable" >
    <thead>
    <tr>
    <th>No</th>
    <th>Id pengaduan</th>
    <th>Tanggal pengaduan</th>
    <th class="text-center" >NIK</th>
    <th>Isi Laporan</th>
    <th>Foto</th>
    <th>Status</th>
    <?php
    if(($user['level'] == "masyarakat") || ($user['level'] == "petugas")){
    	
    	echo '<th class="text-center" >Aksi</th>';
    }
    ?>
    </tr>
    </thead>
    
    <tbody>
    <?php
    $i = 1;

    if(!$pengaduan) :
    	echo "<h3 class='text-center pb-4'>Data Kosong!</h3>";
    else :
   		foreach($pengaduan as $pt) :
	?>
    <tr class="pt-2" >
    <td><?= $i; ?></td>
    <td><?= $pt['id_pengaduan']; ?></td>
    <td><?= $pt['tgl_pengaduan']; ?></td>
    <td><?= $pt['nik']; ?></td>
    <td><?= $pt['isi_laporan']; ?></td>
    <td><img src="<?= base_url('assets/img/'.$pt['foto']); ?>" width="150" ></td>
    <td><?= $pt['status']; ?></td>
    <?php
    if(($user['level'] == "masyarakat") || ($user['level'] == "petugas")){
    
    echo '<td><a class="btn edit btn-info px-2"  href="'.base_url('index.php/data_pengaduan/index/'.$pt['id_pengaduan']).'">Edit</a>
    	<a class="btn delete btn-danger px-2 ml-1" href="'.base_url('index.php/data_pengaduan/delete/'.$pt['id_pengaduan']).'">Delete</a></td>';
    }
    
    ?>
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

		
				<h3 class="text-center title-2 mt-2">Pengaduan</h3>

				<hr>
				<?= form_open_multipart('data_pengaduan/input'); ?>
				<form class="mt-5 mb-3">
				
				<?= $this ->session ->flashdata('error'); ?>
				<div class="row">
				<div class="col-6" >
				<div class="form-group">
				<label for="id_pengaduan" class="control-label mb-1">ID Pengaduan</label>
				<input class="form-control"  type="number" name="id_pengaduan" required><br>
				</div>
				</div>
				<div class="col-6" >
				<div class="form-group">
				<label for="tgl_pengaduan" class="control-label mb-1">Tanggal Pengaduan</label>
				<input class="form-control"  type="date" name="tgl_pengaduan" required><br>
				</div>
				</div>
				</div>
				
				<div class="row">
				<div class="col-6" >
				<div class="form-group">
				<label for="nik" class="control-label mb-2">NIK</label>
				<select class="form-control" name="nik" id="nik" required>
				<?php foreach($masyarakat as $pt) : ?>
				<option value="<?= $pt['nik']; ?>" ><?= $pt['nik']; ?></option>
				<?php endforeach; ?>
				</select>
				</div>
				</div>
				<div class="col-6" >
				<div class="form-group">
				<label for="foto" class="control-label mb-1">Foto</label>						
				<input class="form-control" type="file" name="foto" id="foto" required><br>
				</div>
				</div>
				</div>
				<div class="form-group">
				<label for="isi_laporan" class="control-label">Laporan</label>						
				<textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="9" ></textarea></br>
				</div>		
				
				<input type="text" name="status" value="0" hidden="hidden" ><br>
				
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