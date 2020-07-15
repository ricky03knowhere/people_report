
                           <div class="col-md-9">

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
                               
                               <div class="row act" >
								<div class="col-sm-6 col-md-6" id="msy" >
								  <div class="overview-item bg-info py-4"
								  	   onclick="window.location.href='<?= base_url('index.php/data_pengaduan/'); ?>'">
                               <div class="overview__inner">
                               <div class="overview-box clearfix">
                               <div class="icon">
                               <i class="fas fa-file-contract"></i>
                               </div>
                               <div class="text tx">                  
                               <h2>Verifikasi Pengaduan</h2>
                               </div>
                               </div>
           
                               </div>
                               </div>
                               </div>
                               
                               <div class="col-sm-6 col-md-6" >
                               <div class="overview-item bg-danger py-4">
                               <div class="overview__inner">
                               <div class="overview-box clearfix">
                               <div class="icon">
                               <i class="fas fa-file-export"></i>
                               </div>
                               <div class="text tx">
                               <h2>Generate Laporan</h2>                  
                               </div>
                               </div>
                               
                               </div>
                               </div>
                               </div>
                               
                               
                               </div>
            
            							<div class="card bg-dark pt-4 user" >            				 
            								<div class="row" >
            								            				
            								<div class="col-md-3 col-sm-6" 
            								   	onclick="window.location.href='<?= base_url('index.php/data_petugas/'); ?>'">
            								<div class="card overview-item--c1" >
            									<i class="fas fa-user-cog" ></i>
            								</div>
            								<h5 class="text-white" ><span class="tex-info h4 font-weight-bold" ><?= $admin; ?></span> Admin</h5>
            								</div>
        
            								<div class="col-md-3 col-sm-6" 
            								     onclick="window.location.href='<?= base_url('index.php/data_petugas/'); ?>'">
            								<div class="card overview-item--c4" >
            								<i class="fas fa-user-tie" ></i>
            								</div>
            							<h5 class="text-white" ><span class="text-prary h4 font-weight-bold" ><?= $petugas; ?></span> Petugas</h5>
            								</div>            				
            								
      
            								<div class="col-md-3 col-sm-6" 
            									onclick="window.location.href='<?= base_url('index.php/data_petugas/'); ?>'">
            								<div class="card overview-item--c3 msyc" >
            								<i class="fas fa-users" ></i>
            								</div>
            								<h5 class="text-white msy" ><span class="text-gay h4 font-weight-bold" ><?= $masyarakat; ?></span> Masyarakat</h5>
            								</div>
            								
            								<div class="col-md-3 col-sm-6" data-toggle="modal" data-target="#mediumModal">
            								<div class="card overview-item--c2 plus" >
            								<i class="fas fa-user-plus " ></i>
            								</div>
            								<h5 class="text-white mt-1" >Tambah User</h5>
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

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" >
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
				
				<div class="row mt-4 mb-0" >
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
				
				<div class="row mt-0" >
				<div class="col-6" >
				<div class="form-group">
				<label for="username" class="control-label mb-1">Username</label>
				<input class="form-control" name="username" id="username" required>
				</div>
				</div>
				
				<div class="col-6" >
				<div class="form-group">
				<label for="password" class="control-label mb-1">Password</label>						
				<input class="form-control" type="password" name="password" id="password">
				</div>
				</div>
				</div>
				
				<div class="row">
				<div class="col-6" >
				<div class="form-group">
				<label for="telp" class="control-label mb-1">Telephone</label>						
				<input class="form-control" type="number"  name="telp" id="telp">
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