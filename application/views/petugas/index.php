<div class="col-md-9">


							<div class="card p-4 user_dash" >
								<div class="row" >
								            				
        
								<div class="col-md-4 col-sm-6" 
									     	  		onclick="window.location.href='<?= base_url('index.php/data_pengaduan'); ?>'">
								<div class="card overview-item--c3" >
								<i class="fas fa-envelope overview-item--c3" ></i>
								</div>
								<div class="back" ></div>
							<h5><span class="text-primary h4 font-weight-bold" ><?= $blm_dtnggp; ?></span> Belum Ditanggapi</h5>
								</div>            				
								
      
								<div class="col-md-4 col-sm-6" 
									 onclick="window.location.href='<?= base_url('index.php/data_tanggapan/'); ?>'">
								<div class="card overview-item--c2" >
								<i class="fas fa-envelope-open-text overview-item--c2" ></i>
								</div>
								<div class="back" ></div>
								<h5><span class="text-primary h4 font-weight-bold" ><?= $tlh_dtnggp; ?></span> Telah Ditanggapi</h5>
								</div>
								
								<div class="col-md-4 col-sm-6" 
									 data-toggle="modal" data-target="#mediumModal">
								<div class="card overview-item--c1 plus" >
								<i class="fas fa-file-signature overview-item--c1" ></i>
								</div>
								<div class="back" ></div>
								<h5>Tanggapi Pengaduan</h5>
								</div>
		
								</div>
							</div>
							
    <div class="row my-0">
    <div class="col-sm-6 col-md-4">
    <div class="overview-item overview-item--c3 py-4"
    	  		onclick="window.location.href='<?= base_url('index.php/data_pengaduan/'); ?>'">
    <div class="overview__inner">
    <div class="overview-box clearfix">
    <div class="icon mb-3">
    <i class="fas fa-newspaper"></i>
    </div>
    <div class="text">
    <h2><?= $pengaduan; ?></h2>
    <span>Pengaduan Masuk</span>
    </div>
    </div>
    
    </div>
    </div>
    </div>
    <div class="col-sm-6 col-md-4">
    <div class="overview-item overview-item--c1 py-4"
    	  		onclick="window.location.href='<?= base_url('index.php/data_pengaduan/index/0/belum'); ?>'">
    <div class="overview__inner">
    <div class="overview-box clearfix">
    <div class="icon mb-3">
    <i class="fas fa-question-circle"></i>
    </div>
    <div class="text">
    <h2><?= $belum; ?></h2>
    <span>Belum Terverifikasi</span>
    </div>
    </div>

    </div>
    </div>
    </div>
    <div class="col-sm-6 col-md-4">
    <div class="overview-item overview-item--c2 py-4"
    	  		onclick="window.location.href='<?= base_url('index.php/data_pengaduan/index/0/terverifikasi'); ?>'">
    <div class="overview__inner">
    <div class="overview-box clearfix">
    <div class="icon mb-3">
    <i class="fas fa-check-circle"></i>
    </div>
    <div class="text">
    <h2><?= $terverifikasi; ?></h2>
    <span>Telah Terverifikasi</span>
    </div>
    </div>
						
								</div>
    </div>
    </div>
                          </div>
    
    <div class="row justify-content-center actx" >
	<div class="col-md-9"
		 		onclick="window.location.href='<?= base_url('index.php/data_pengaduan/'); ?>'">		  
	<div class="overview-item bg-info py-3">
    <div class="overview__inner">
    <div class="overview-box ver">
    <div class="icon">
    <i class="fas fa-file-contract"></i>
    </div>
    <div class="text">                  
    <h2>Verifikasi Pengaduan</h2>
    </div>
    </div>
           
    </div>
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
				<?php foreach($pengaduan_dt as $pt) : ?>
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